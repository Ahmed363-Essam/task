<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ProductInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductsController extends Controller
{
    public $Product;
    public function __construct(ProductInterface $Product)
    {
        $this->Product = $Product;
    }
    public function index(Request $request)
    {
        return $this->Product->index($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Product->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        return $this->Product->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        return $this->Product->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->Product->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        return $this->Product->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->Product->destroy($id);
    }
}
