@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

    <style>
        .google-map iframe {
            height: 400px;
            width: 100%;

        }

        .btn {
            background-color: {{ $appSetting->color ?? ' ' }}
        }
    </style>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container d-flex">
        <div class="row">
            <div class="row mt-5 mb-5">
                <div class="col-md-12">
                    <p style="font-size: 20px;"><b>CONTACT US</b></p>
                    <h2 style="font-size: 35px;"><b>Reach out to us today!</b></h2>
                    <p style="font-size: 16px; color:rgb(134, 134, 134);">If you have any queries or ideas, we would love to
                        hear you.</p>
                    <p style="font-size: 20px;"><b>{{ $appSetting->phone1 ?? 'phone1' }}</b></p>
                    <p style="font-size: 20px;"><b>{{ $appSetting->email1 ?? 'email1' }}</b></p>
                    <p style="font-size: 20px;"><b>{{ $appSetting->address ?? 'address' }}</b></p>
                </div>
                <div class="d-flex">
                    @if ($appSetting->facebook)
                        <a style="margin-left: 0px;color:{{ $appSetting->color ?? ' ' }};"
                            href="{{ $appSetting->facebook }}" target="_blank"> <i style="font-size: 25px"
                                class="fa fa-facebook"></i></a>
                    @endif
                    @if ($appSetting->twitter)
                        <a style="margin-left: 20px;color:{{ $appSetting->color ?? ' ' }};"
                            href="{{ $appSetting->twitter }}" target="_blank"> <i style="font-size: 25px"
                                class="fa fa-twitter"></i></a>
                    @endif
                    @if ($appSetting->instagram)
                        <a style="margin-left: 20px;color:{{ $appSetting->color ?? ' ' }};"
                            href="{{ $appSetting->instagram }}" target="_blank"> <i style="font-size: 25px"
                                class="fa fa-instagram"></i></a>
                    @endif
                    @if ($appSetting->youtube)
                        <a style="margin-left: 20px;color:{{ $appSetting->color ?? ' ' }};"
                            href="{{ $appSetting->youtube }}" target="_blank"> <i style="font-size: 25px"
                                class="fa fa-youtube"></i></a>
                    @endif
                </div>
            </div>

        </div>








        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ url('admin/contact/store') }}" method="POST">
                @csrf
                <div class="row mt-5 mb-5 p-0">
                    <div class="colmd-6 offset-md-1 contact-form">

                        <form>
                            <div class="row mb-12">
                                <div class="col-6">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name"
                                        name="name" required>
                                </div>
                                <div class="col-6">
                                    <label for="email" class="form-label">Your Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email"
                                        name="email" required>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="subject" class="form-label">Your Subject</label>
                                <input type="text" class="form-control" id="subject" placeholder="Enter your subject"
                                    name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message"
                                    maxlength="300" required></textarea>
                            </div>
                            <button type="submit" class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Include the Google Maps API script with your API key -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer> --}}
    {{-- </script> --}}

    <div class="google-map">
        <iframe src=" {{ $appSetting->map ?? 'map' }}" frameborder="1">

        </iframe>

    </div>


@endsection
