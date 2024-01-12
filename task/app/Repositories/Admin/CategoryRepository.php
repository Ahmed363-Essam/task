<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\CategoryInterface;
use App\Models\Category;


class CategoryRepository implements CategoryInterface
{
    public function index()
    {

        $Categoies = Category::checkauth()->paginate(5);

        return view('admin.category.index', compact('Categoies'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store($request)
    {

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'admin_id' => auth('admin')->user()->id
        ]);

        return redirect()->route('category.index');
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update($request)
    {

        $category =  Category::findorfail($request->id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index');
    }

    public function destroy($request)
    {
        Category::findOrFail($request->id)->delete();
        return redirect()->route('category.index');
    }
}
