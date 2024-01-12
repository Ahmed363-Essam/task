<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class DahboardAdmin extends Controller
{
    public function index()
    {

        $products = Product::count();
        $cats = Category::count();

        return view('admin.index', compact('products', 'cats'));
    }
}
