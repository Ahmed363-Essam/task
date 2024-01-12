@extends('front.master')

@section('title')
    index
@endsection
@section('index-active', 'active')

@section('content')


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <div class="">

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
                            <a style="margin-left: 15px" href="{{ route('front.index') }}" style="color: white !important"
                                class="btn btn-sm btn-success ml-10">
                                Reset....
                            </a>
                        </div>


                    </form>

                    <br>

                    <br>

                </div>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        @foreach ($Categories as $Category)
                            <li class="mx-2" data-filter=".{{ $Category->id }}">{{ $Category->name }}</li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">


                @foreach ($Products as $Product)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $Product->category->id }} wow fadeInUp"
                        data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                @if (isset($Product->imagables[0]))
                                    <img class="img-fluid w-100" style="height: 350px"
                                        src="{{ asset('assets/product/' . $Product->imagables[0]->images_name) }}"
                                        alt="">
                                @else
                                    <img class="card-img card-img-left"
                                        src="{{ asset('assets/product/No_image_available.svg.png') }}" alt="Card image" />
                                @endif
                                <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1"
                                        href="{{ asset('front-assets') }}/img/portfolio-1.jpg" data-lightbox="portfolio"><i
                                            class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i
                                            class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">{{ $Product->category->name }}</p>
                                <h5 class="lh-base mb-0">
                                    {{ implode(' ', array_slice(str_word_count($Product->description, 2), 0, 10)) . (str_word_count($Product->description, 0) > 10 ? '...' : '....') }}

                                    </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <br>
            <br>
            {{ $Products->links() }}
        </div>
    </div>
    <!-- Projects End -->


@endsection
