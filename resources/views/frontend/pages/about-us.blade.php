@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

    <style>
        .underline {
            background-color: {{ $appSetting->color ?? ' ' }};
        }

        .mt-5{
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }
        .card-title{
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 style="font-size:24px">About page</h4>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 about-image">
                <img class="card-img" src={{ asset($about->image1) }} alt="About Us Image">
            </div>
            <div class="col-md-6">
                <h2 class="mt-5">{{ $about->title1 ?? 'About title' }}</h2>
                <div class="underline mb-4"></div>

                <p style="font-size:20px"> {{ $about->description1 ?? 'About description1' }} </p>

            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mt-5">{{ $about->title2 ?? 'About title2' }}</h2>
                <div class="underline mb-4"></div>

                <p style="font-size:20px">{{ $about->description2 ?? 'About title' }}</p>
            </div>
            <div class="col-md-6 about-image">
                <img class="card-img" src={{ asset($about->image2) }} alt="About Us Image">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5 mb-5">
                <div class="card" style="height: 30rem;">
                    <img class="card-img-top" src={{ asset($about->card_image) }} class="card-img-top" alt="Card_Image1">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $about->card_title ?? 'card title' }}</b></h5>
                        <div class="underline mb-4"></div>

                        <p class="card-text">{{ $about->card_description ?? 'About card_description' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 mb-5">
                <div class="card" style="height: 30rem;">
                    <img class="card-img-top" src={{ asset($about->card_image1) }} class="card-img-top" alt="Card_Image2">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $about->card_title1 ?? 'About card_title1' }}</b></h5>
                        <div class="underline mb-4"></div>

                        <p class="card-text">{{ $about->card_description1 ?? 'About card_description1' }}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 mb-5">
                <div class="card" style="height: 30rem;">
                    <img class="card-img-top" src={{ asset($about->card_image2) }} class="card-img-top" alt="Card_Image3">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $about->card_title2 ?? 'About card_title2' }}</b></h5>
                        <div class="underline mb-4"></div>

                        <p class="card-text">{{ $about->card_description2 ?? 'About card_description2' }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- </div> --}}


@endsection
