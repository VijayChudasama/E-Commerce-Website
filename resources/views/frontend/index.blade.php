@extends('layouts.app')

@section('title0', 'Home Page')

@section('content')
    <style>
        .underline {
            background-color: {{ $appSetting->color ?? ' ' }};
        }

        .product-name a {
            color: {{ $appSetting->color ?? ' ' }};
        }

        .carousel-item {
            width: 100%;
            height: 600px;
            background-color: rgb(0, 24, 178)
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(1);
            }
        }

        .animated.fadeInUp {
            animation: fadeInUp 1s ease-in-out;
        }
        .product-card {
            height: 380px;
            background-color: #fff;
            border: 1px solid #ccc;
            margin-bottom: 24px;
            border-radius: 10px;
        }
        .product-card .product-card-img img {
            border-radius: 10px;
        }
        .product-card:hover{
            box-shadow: 0px 5px 5px 5px rgb(165, 165, 165);

        }
    </style>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            @foreach ($sliders as $key => $slidersitem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @if ($slidersitem->image)
                        <img style="height: 590px; width:600px;position: absolute;top: 1px;left: 757px;"
                            src="{{ asset("$slidersitem->image") }}" class="animated fadeInUp" alt="...">
                    @endif

                    {{-- <div class="carousel-caption d-none d-md-block">

                        <div class="custom-carousel-content">
                            <h1>
                                {!! $slidersitem->title !!}
                            </h1>
                            <p>{!! $slidersitem->description !!}</p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content animated fadeInUp">
                            <h1>{!! $slidersitem->title !!}</h1>
                            <p>{!! $slidersitem->description !!}</p>
                            <div>
                                <a href="#" class="btn btn-slider">Get Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to Vijaycards of Web IT E-Commerce</h4>
                    <div class="underline mx-auto"></div>
                    <div class="col-md-12 text-center">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, repudiandae. Quod
                            esse
                            sunt commodi, hic omnis nemo eum reprehenderit quibusdam fuga voluptatibus magni molestiae
                            nisi
                            autem atque numquam minima velit, fugiat officia temporibus odio eius deleniti impedit
                            inventore. Deleniti optio asperiores non.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4>Trending products</h4>
                    <div class="underline mb-4"></div>
                </div>

                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($trendingProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">

                                            <label class="stock bg-success">New</label>


                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productItem->selling_price }}</span>
                                                <span class="original-price">${{ $productItem->original_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available </h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>



    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4>New Arrivals
                        <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">View More</a>

                    </h4>
                    <div class="underline mb-4"></div>
                </div>

                @if ($newArrivalsProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($newArrivalsProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">

                                            <label class="stock bg-success">New</label>


                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productItem->selling_price }}</span>
                                                <span class="original-price">${{ $productItem->original_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No New Arrivals Available </h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>





    <div class="py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4>Featured Products
                        <a href="{{ url('featured-products') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>

                @if ($featuredProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($featuredProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">

                                            <label class="stock bg-success">New</label>


                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productItem->selling_price }}</span>
                                                <span class="original-price">${{ $productItem->original_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Featured Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection



@section('script')

    <script>
        $('.four-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            dotsEach: 3, // Show 3 dots at a time
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>

@endsection
