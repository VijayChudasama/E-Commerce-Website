@extends('layouts.admin')

@section('title', ' Edit User')

@section('content')



    <style>
        select {
            --selectHoverCol: {{ $appSetting->color ?? ' ' }};
            --selectedCol: {{ $appSetting->color ?? ' ' }};
            width: 100%;
            font-size: 1em;
            padding: 0.3em;

        }

        select:focus {
            border-radius: 0px;
            border-color: rgb(7, 7, 7);
            background: #fff;
            outline: none;
        }

        .select-wrap {
            position: relative;
        }

        .select-wrap:focus-within select {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 10;
        }

        option:hover {
            background-color: var(--selectHoverCol);
            color: #fff;
        }

        option:checked {
            box-shadow: 0 0 1em 100px var(--selectedCol) inset;
        }
    </style>






    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif


            @if ($errors->any())
                <ul class="arlert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Edit User
                        <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm text-white float-end">
                            Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{ url('admin/users/' . $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 md-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">Email</label>
                                <input type="text" name="email" readonly value="{{ $user->email }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">Profile Image</label>
                                <input type="file" name="profile_img" class="form-control">
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">Select Role</label>
                                <select type="text" name="role_as" class="selectHovercolor">
                                    <option value="">Select Role</option>
                                    <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn"
                                    style="background-color: {{ $appSetting->color ?? ' ' }}">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
