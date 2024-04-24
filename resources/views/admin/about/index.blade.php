@extends('layouts.admin')

@section('title', 'About')

@section('content')


    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif


            <form action="{{ url('admin/about_us') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3">
                    <div class="card-header" style="background-color: {{ $appSetting->color ?? ' ' }}">
                        <div class="text-white mv-0">About First (1) Blog</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">

                                <label>Blog Title_1</label>
                                <input value="{{ $about->title1 ?? '' }}" name="title1" type="text"
                                    class="form-control">
                                {{-- <input type="text" name="website_name"  value="{{ $setting->website_name }} " class="form-control" /> --}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Blog Description_1</label>
                                <textarea name="description1" rows="5" class="form-control">{{ $about->description1 ?? '' }}</textarea>

                                {{-- <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}"  class="form-control" /> --}}
                            </div>
                            <div class="form-group">
                                <label for="website_logo">Blog Image_1</label>
                                <input value="{{ $about->image1 ?? '' }}" type="file" class="form-control" name="image1">
                            </div>


                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn text-white" style="background-color: {{ $appSetting->color ?? ' ' }}">Update</button>
                        </div>
                    </div>
                </div>
            </form>



            <form action="{{ url('/admin/about_us') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3">
                    <div class="card-header" style="background-color: {{ $appSetting->color ?? ' ' }}">
                        <div class="text-white mv-0">About Second (2) Blog</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Blog Title_2</label>
                                <input value="{{ $about->title2 ?? '' }}" type="text" name="title2"
                                    class="form-control">
                                {{-- <input type="text" name="website_name"  value="{{ $setting->website_name }} " class="form-control" /> --}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Blog Description_2</label>
                                <textarea name="description2" rows="5" class="form-control">{{ $about->description2 ?? '' }}</textarea>

                                {{-- <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}"  class="form-control" /> --}}
                            </div>
                            <div class="form-group">
                                <label for="website_logo">Blog Image_2</label>
                                <input value="{{ $about->image2 ?? '' }}" type="file" class="form-control" name="image2"
                                    id="image2">
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn text-white" style="background-color: {{ $appSetting->color ?? ' ' }}">Update</button>
                        </div>
                    </div>
                </div>
            </form>



            <div class="card mb-3">
                <div class="card-header" style="background-color: {{ $appSetting->color ?? ' ' }}">
                    <div class="text-white mv-0 text-center"><b>ALL CARDS</b></div>
                </div>
                <div class="row">
                    <div class="card-body d-flex">

                        <form action="{{ url('/admin/about_us') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-11">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Card Image_1</label>
                                                <input value="{{ $about->card_image ?? '' }}" type="file"
                                                    class="form-control" name="card_image" id="card_image">

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Card Title_1</label>
                                                <input value="{{ $about->card_title ?? '' }}" type="text"
                                                    class="form-control" name="card_title">

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label>Card Decription_1</label>
                                                <textarea name="card_description" rows="5" class="form-control">{{ $about->card_description ?? '' }}</textarea>

                                            </div>

                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn text-white" style="background-color: {{ $appSetting->color ?? ' ' }}">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="{{ url('/admin/about_us') }}" method="POST" style="margin-left: 20px"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-11" style="margin-left: 20px">
                                <div class="card mb-3">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Card Image_2</label>
                                                <input value="{{ $about->card_image1 ?? '' }}" type="file"
                                                    class="form-control" id="card_image1" name="card_image1">

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Card Title_2</label>
                                                <input value="{{ $about->card_title1 ?? '' }}" type="text"
                                                    name="card_title1" class="form-control">

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label>Card Decription_2</label>
                                                <textarea name="card_description1" rows="5" class="form-control">{{ $about->card_description1 ?? '' }}</textarea>

                                            </div>

                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn text-white" style="background-color: {{ $appSetting->color ?? ' ' }}">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>





                    <div class="card-body d-flex">
                        <form action="{{ url('/admin/about_us') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-7">
                                <div class="card mb-3">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Card Image_3</label>
                                                <input value="{{ $about->card_image2 ?? '' }}" type="file"
                                                    class="form-control" id="card_image2" name="card_image2">

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Card Title_3</label>
                                                <input value="{{ $about->card_title2 ?? '' }}" type="text"
                                                    name="card_title2" class="form-control">

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label>Card Decription_3</label>
                                                <textarea name="card_description2" rows="5" class="form-control">{{ $about->card_description2 ?? '' }}</textarea>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn text-white" style="background-color: {{ $appSetting->color ?? ' ' }}">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
