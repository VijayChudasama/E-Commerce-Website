@extends('layouts.app')

@section('title', 'Featured Products')

@section('content')




    <style>
        .product-name a {
            color: {{ $appSetting->color ?? ' ' }}
        }

        .underline {
            background-color: {{ $appSetting->color ?? ' ' }};
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
    <div class="py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4>Featured Arrivsls</h4>
                    <div class="underline mb-4"></div>
                </div>

                @forelse($featuredProducts as $productItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">

                                <label class="stock bg-success">New</label>


                                @if ($productItem->productImages->count() > 0)
                                    <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                            alt="{{ $productItem->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
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

                @empty
                    <div class="col-md-12 p-2">
                        <h4>No Featured Products Available </h4>
                    </div>
                @endforelse

                <div class="text-center">
                    <a href="{{ url('collections') }}" class="btn btn-warning px-3">Shop Now</a>
                </div>

            </div>
        </div>
    </div>

@endsection
