@extends('layouts.admin')

@section('title', 'Admin Setting')

@section('content')


    <style>
        #my-input {
            width: 300px;
            position: relative;
        }

        #my-input::before {
            content: "#";
            position: absolute;
            left: 0;
            top: 0;
            color: gray;
        }

        #my-input-2 {
            width: 300px;
            position: relative;
        }

        #my-input-2::before {
            content: "#";
            position: absolute;
            left: 0;
            top: 0;
            color: gray;
        }
    </style>

    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif


            <form action="{{ url('/admin/settings') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card mb-3">
                    <div class="card-header" style="background-color: {{ $appSetting->color ?? ' ' }}">
                        <div class="text-white mv-0">Website</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Website Name</label>
                                <input type="text" name="website_name" value="{{ $setting->website_name }} "
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website URL</label>
                                <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}"
                                    class="form-control" />
                            </div>
                            {{-- <div class="col-md-12 mb-3">
                                <label>Website LOGO IMAGE</label>
                                <input type="file" name="website_logo"  value="{{ $setting->website_logo ?? '' }} " class="form-control" />
                            </div> --}}
                            <div class="form-group">
                                <label for="website_logo">Website Logo</label>
                                <input type="file" class="form-control" id="website_logo" name="website_logo">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Page Title</label>
                                <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="3">{{ $setting->meta_keyword ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_decription" class="form-control" rows="3">{{ $setting->meta_decription ?? '' }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header" style="background-color: {{ $appSetting->color ?? ' ' }}">
                        <div class="text-white mv-0">Website - Information</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? '' }}</textarea>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 1 *</label>
                                <input type="text" name="phone1" value="{{ $setting->phone1 ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone No. 2</label>
                                <input type="text" name="phone2" value="{{ $setting->phone2 ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Id 1*</label>
                                <input type="text" name="email1" value="{{ $setting->email1 ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Id 2</label>
                                <input type="text" name="email2" value="{{ $setting->email2 ?? '' }}"
                                    class="form-control" />
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header" style="background-color: {{ $appSetting->color ?? ' ' }}">
                        <div class="text-white mv-0">Website - Social Media</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook (Optional)</label>
                                <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter (Optional)</label>
                                <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram (Optional)</label>
                                <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>YouTube (Optional)</label>
                                <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header" style="background-color: {{ $appSetting->color ?? ' ' }}">
                        <div class="text-white mv-0">Color</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Enter Your Website navbar and footer</label>
                                <input type="text" name="color" class="form-control" id="my-input"
                                    value="{{ $colorSetting->color ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="card-header" style="background-color: {{ $appSetting->color ?? ' ' }}">
                        <div class="text-white mv-0">MAP</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Enter Your Embed a map</label>
                                <input type="text" name="map" value="{{ $appSetting->map ?? 'map' }}" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn text-white"
                            style="background-color: {{ $appSetting->color ?? ' ' }}">Save Setting</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const myInput = document.getElementById("my-input");
        myInput.value = "#";
    </script>
@endsection
