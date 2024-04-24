@extends('layouts.app')

@section('title', 'Thank You for Shopping')

@section('content')




    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">

                    @if (session('message'))
                        <h4 class="alert alert-success">{{ session('message') }}</h4>
                    @endif
                    <div class="p-4 shadow bg-white">
                        <h1>😊</h1>
                        <h4>Thank You For Shopping With Vijaycards</h4>
                        <a href="{{ url('collections') }}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
