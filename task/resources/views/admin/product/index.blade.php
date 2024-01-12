@extends('admin.master')

@section('Categoies-active', 'active')
@section('title', 'Categoies')

@section('content')




    <div class="removeproducts container-xxl flex-grow-1 container-p-y">
        @if (session()->has('deleteproducts'))
            <div class="alert alert-danger my-danger-alert">
                {{ session('deleteproducts') }}
            </div>
        @endif

        <div>
            <h4 style="display: inline-block" class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Products
            </h4>
            <a style="margin-left: 15px" href="{{ route('products.create') }}" class="btn btn-sm btn-primary ml-10">
                Add Products
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-body ">
                <div>

                    <div>

                        <form action="" class="row" method="get">
                            <div class="col-lg-8">
                                <select class="form-control" name="car_searh_id" id="">
                                    @foreach ($Categories as $Category)
                                        <option value="{{ $Category->id }}"> {{ $Category->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <button style="margin-left: 15px" type="submit" class="btn btn-sm btn-primary ml-10">
                                    Search
                                </button>
                            </div>

                            <div class="col-lg-2">
                                <a style="margin-left: 15px" href="{{ route('products.index') }}"
                                    style="color: white !important" class="btn btn-sm btn-success ml-10">
                                    Reset....
                                </a>
                            </div>



                        </form>

                    </div>

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


                    <div class="table-responsive text-nowrap">

                        @if (count($Products) > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">Id</th>
                                        <th style="width: 15%">Name</th>
                                        <th style="width: 15%">Price</th>
                                        <th style="width: 15%">Category Name</th>
                                        <th style="width: 15%">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="table-border-bottom-0">
                                    @forelse ($Products as $product)
                                        <tr>
                                            <td> {{ $product->id }} </td>
                                            <td><strong>{{ $product->name }}</strong></td>
                                            <td>{{ $product->price }}</td>

                                            <td> {{ $product->category->name }} </td>

                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-edit-alt me-1"></i>
                                                            Edit</a>

                                                        <a href="{{ route('products.show', $product->id) }}"
                                                            class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-show-alt me-1"></i>
                                                            Show Product Images</a>

                                                        <a href="#" class="btn " data-bs-toggle="modal"
                                                            data-bs-target="#modalToggle{{ $product->id }}"> <i
                                                                class="bx bx-trash me-1"></i>
                                                            Delete</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- <x-delete-modal-component  :cat_id="$products->id"> Are You Sure You Want To delete This products?</x-delete-modal-component> --}}

                                        @include('admin.product.includes.delete', [
                                            'product_id' => $product->id,
                                        ])
                                    @empty

                                        <div>
                                            <p class="text-danger"> The Products Table Is Empty </p>
                                        </div>
                                    @endforelse

                                </tbody>

                            </table>
                        @else
                            <div>
                                <p class="text-danger"> The Products Table Is Emplty </p>
                            </div>
                        @endif
                        <br>
                        <br>

                        {{ $Products->links() }}
                    </div>


                </div>

            </div>

        </div>

    </div>





@endsection

@section('scripts')


@endsection
