@extends('admin.master')

@section('Categoies-active', 'active')
@section('title', 'Categoies')

@section('content')

    <div class="removecategory container-xxl flex-grow-1 container-p-y">


        <div>
            <h4 style="display: inline-block" class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Products
            </h4>

        </div>

        <div class="card mb-4">
            <div class="card-body ">
                <div>

                    <div class="row mb-4">

                        <div class="col-lg-6" style="display: flex">

                            <!-- Button trigger modal -->
                            {{-- <button
                          style="margin-left: 15px"
                          type="button"
                          class="btn btn-primary ml-10"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                        >
                          Add Categoies
                        </button> --}}
                        </div>

                    </div>

                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nameWithTitle" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter Product" />

                                <br>
                                @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror

                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="nameWithTitle" class="form-label">category</label>
                                <select name="cat_id" class="form-control" name="" id="">
                                    <option value=""> Select The Category</option>
                                    @foreach ($Categories as $Category)
                                        <option value="{{ $Category->id }}"> {{ $Category->id }} -- {{ $Category->name }}
                                        </option>
                                    @endforeach

                                </select>
                                <br>
                                @error('cat_id')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nameWithTitle" class="form-label">price</label>
                                <input name="price" type="text" class="form-control" placeholder="Enter category" />

                                <br>
                                @error('price')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror

                            </div>



                            <div class="col-md-12 mb-3">
                                <label for="nameWithTitle" class="form-label">Image</label>
                                <input name="image" type="file" class="form-control" placeholder="Enter category" />

                                <br>
                                @error('image')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror

                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="nameWithTitle" class="form-label">Description</label>
                                <textarea name="description" rows="5" class="form-control">

                                </textarea>
                                <br>
                                @error('description')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror

                            </div>


                        </div>

                        <div class="col-lg-12">
                            <button style="margin-left: 15px" type="submit" class="btn btn-sm btn-primary ml-10">
                                Add Products
                            </button>
                        </div>

                    </form>




                </div>

            </div>

        </div>

    </div>





@endsection

@section('scripts')

@endsection
