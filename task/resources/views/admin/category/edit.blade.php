@extends('admin.master')

@section('Categoies-active', 'active')
@section('title', 'Categoies')

@section('content')

    <div class="removecategory container-xxl flex-grow-1 container-p-y">
        @if (session()->has('deletecategory'))
            <div class="alert alert-danger my-danger-alert">
                {{ session('deletecategory') }}
            </div>
        @endif

        <div>
            <h4 style="display: inline-block" class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Categoies
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

                    <form action="{{ route('category.update') }}" method="post">
                        @csrf

                        <input type="hidden" value="{{ $category->id }}" name="id">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nameWithTitle" class="form-label">category</label>
                                <input name="name" value="{{ $category->name }}" type="text" class="form-control" placeholder="Enter category" />

                                <br>
                                @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror


                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="nameWithTitle" class="form-label">Description</label>
                                <textarea  value="{{ $category->description }}"  name="description" rows="5" class="form-control">
                                 {{ $category->description }}
                                </textarea>
                                <br>
                                @error('description')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror


                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button style="margin-left: 15px" type="submit" href="{{ route('category.store') }}"
                                class="btn btn-sm btn-primary ml-10">
                                Edit Categoies
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
