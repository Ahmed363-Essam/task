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
            <a style="margin-left: 15px" href="{{ route('products.index') }}" class="btn btn-sm btn-primary ml-10">
                Back
            </a>
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


                    <div class="row mb-5">

                        <div class="col-md-12 col-lg-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $productsImages->name }}</h5>
                                    <h6 class="card-subtitle text-muted">Category - {{ $productsImages->category->name }}
                                    </h6>
                                </div>
                                @if (isset($productsImages->imagables[0]))
                                    <img class="img-fluid"
                                        src="{{ asset('assets/product/' . $productsImages->imagables[0]->images_name) }}"
                                        alt="Card image cap" />
                                @else
                                    <img class="card-img card-img-left"
                                        src="{{ asset('assets/product/No_image_available.svg.png') }}" alt="Card image" />
                                @endif

                                <div class="card-body">
                                    <p class="card-text">{{ $productsImages->description }}.</p>
                                    <a href="javascript:void(0);" class="card-link"> {{ $productsImages->price }} $</a>
                                    <a href="javascript:void(0);" class="card-link" href="{{ route('products.create') }}">
                                        Create Product </a>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>





@endsection

@section('scripts')


@endsection
