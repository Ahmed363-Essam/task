<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\ProductInterface;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;



use App\Traits\ImageTraint;


class ProductRepository implements ProductInterface
{
    use ImageTraint;

    public function index($request)
    {

        $Categories = Category::all();
        $Products =  Product::with('category')->checkauth()->when($request->car_searh_id, function ($query) use ($request) {

            return $query->where('cat_id', $request->car_searh_id);
        })->paginate(5);

        return view('admin.product.index', compact('Products', 'Categories'));
    }
    public function create()
    {

        $Categories = Category::all();
        return view('admin.product.create', compact('Categories'));
    }
    public function store($request)
    {

        $input = $request->only(['name', 'description', 'price', 'cat_id']);
        $input['admin_id'] = auth('admin')->user()->id;

        $product = Product::create($input);
        if ($request->has('image')) {

            $file = $request->file('image');
            $image_name = $request->name . '' . $file->getClientOriginalName();
            Image::create([
                'images_name' => $image_name,
                'images_id' => $product->id,
                'images_type' => 'App\Models\Product'
            ]);
            $this->StoreImage('product', $request, 'product');
        }


        return redirect()->route('products.index');
    }
    public function show($id)
    {
        $productsImages  =  Product::with(['category', 'imagables'])->where('id', $id)->first();

        return view('admin.product.show', compact('productsImages'));
    }
    public function edit($id)
    {

        $products =  Product::with(['category', 'imagables'])->where('id', $id)->first();
        $Categories = Category::all();

        return view('admin.product.edit', compact('products', 'Categories'));
    }
    public function update($request, $id)
    {
        $input = $request->only(['name', 'description', 'price', 'cat_id']);
        $input['admin_id'] = auth('admin')->user()->id;
        $product = Product::where('id', $id)->first();

        if ($product) {

            if ($request->hasFile('image')) {


                $images = Image::where([
                    'images_id' => $product->id,
                    'images_type' => 'App\Models\Product'
                ])->first();
                $this->DeleteImage($images->images_name, 'assets/product/');

                $file = $request->file('image');
                $image_name = $request->name . '' . $file->getClientOriginalName();

                $images->update([
                    'images_name' => $image_name,
                    'images_id' => $product->id,
                    'images_type' => 'App\Models\Product'
                ]);
                $this->StoreImage('product', $request, 'product');
            }
            $product->update($input);
        }


        return redirect()->route('products.index');
    }
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}
