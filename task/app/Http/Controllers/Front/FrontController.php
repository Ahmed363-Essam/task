<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {

        $Categories = Category::take(4)->get();
        $Products =  Product::with(['category', 'imagables'])->when($request->car_searh_id, function ($query) use ($request) {

            return $query->where('cat_id', $request->car_searh_id);
        })->paginate(6);



        return view('front.index', compact('Products', 'Categories'));
    }
}
