<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Interfaces\Admin\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $category;
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        return $this->category->index();
    }
    public function create()
    {
        return $this->category->create();
    }
    public function store(CategoryCreateRequest $request)
    {
        return $this->category->store($request);
    }
    public function show($id)
    {

        return $this->category->show($id);
    }

    public function edit($id)
    {

        return $this->category->edit($id);
    }

    public function update(CategoryUpdateRequest $request)
    {
        return $this->category->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->category->destroy($request);
    }
}
