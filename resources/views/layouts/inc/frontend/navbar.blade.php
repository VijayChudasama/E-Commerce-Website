<style>
    .nav-link i:hover {
        color: rgb(171, 171, 171);
        border-radius: 8px;
    }

    .nav-link i {
        font-size: 25px;
        border-radius: 8px;
    }

    .main-navbar .top-navbar .dropdown-menu .dropdown-item {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        border: none;
        border-radius: 8px
    }

    .main-navbar .top-navbar .dropdown-menu {
        border-radius: 8px;
        width: 210px;
        padding: 10px;
        height: 330px;
    }

    #search-icon {
        cursor: pointer;
        border: none;
        background: none;
        color: rgb(255, 255, 255);
        padding: 0px;
        margin: 0px;
    }

    .main-navbar .top-navbar .nav-link {
        font-size: 14px;
    }

    #search-box {
        width: 100%;
    }

    .nav-bar:hover {
        background-color: rgb(199, 222, 225);
        border-radius: 21px;
    }
</style>


<div class="main-navbar shadow-sm sticky-top">

    <div class="top-navbar" style="background-color: {{ $appSetting->color ?? ' ' }}">

        {{-- this is a colour style  --}}




        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <a href="{{ url('/') }}">
                        <h5 class="brand-name">
                            @if (asset($appSetting->website_logo))
                                <img style="width: 335px; height:45px;" src="{{ asset($appSetting->website_logo) }}"
                                    alt="Website Logo" class="img-fluid">
                            @else
                                <h5 class="brand-name">{{ $appSetting->website_name ?? 'website name' }}</h5>
                            @endif
                        </h5>
                    </a>
                </div>

                <div class="col-md-5 my-auto">
                    <form action="{{ url('search') }}" method="GET" role="search">
                        <div class="input-group">
                            <input id="search-box" type="search" name="search" value="{{ Request::get('search') }}"
                                placeholder="Search your product" class="form-control" style="display: none;" />

                            <i class="fa" id="remove-icon"
                                style="display: none;
                                    position: absolute;
                                    left: 582px;
                                    top: 11px;cursor: pointer;">&#xf00d;</i>


                        </div>
                    </form>

                    <nav class="navbar-expand-lg">
                        <div class="container-fluid">
                            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                                VijayCard
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-bar">
                                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-bar">
                                        <a class="nav-link" href="{{ url('/about_us') }}">About-Us</a>
                                    </li>
                                    <li class="nav-bar">
                                        <a class="nav-link" href="{{ url('/collections') }}">All Categories</a>
                                    </li>
                                    {{-- <li class="nav-bar">
                                        <a class="nav-link" href="{{ url('/new-arrivals') }}">New Arrivals</a>
                                    </li>
                                    <li class="nav-bar">
                                        <a class="nav-link" href="{{ url('/featured-products') }}">Featured
                                            Products</a>
                                    </li> --}}
                                    <li class="nav-bar">
                                        <a class="nav-link" href="{{ url('/contact_us') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="col-md-3 my-auto">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <button id="search-icon" class="nav-link" type="submit">
                                <i class="fa fa-search"
                                    style="font-size: 17px;
                                    margin-top: 11px;
                                    margin-right: 13px;"></i>
                            </button>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cart') }}">
                                <i class="fa fa-shopping-cart" style="font-size:16px;"></i>
                                (<livewire:frontend.cart.cart-count />)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('wishlist') }}">
                                <i class="fa fa-heart" style="font-size:16px;"></i>
                                (<livewire:frontend.wishlist-cont />)
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fa fa-user-circle-o" style="font-size:16px;"></i> {{ __('login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user" style="font-size:16px;"></i>
                                    {{-- {{ Auth::user()->name }} --}}

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    {{-- <li><a style="height:80px;" class="dropdown-item" href="{{ 'profile' }}">
                                            <img src="{{ Auth::user()->profile_img }}" alt="img"
                                                style="width: 60px;
                                                height: 60px;
                                                border-radius: 50%;
                                                position: absolute;
                                                top: 18px;
                                                left: 15px;">
                                            <span
                                                style="position: absolute;
                                            left: 89px;
                                            top: 29px;"><b>{{ Auth::user()->name }}</b></span>
                                            <span>
                                                <p
                                                    style="position: absolute;
                                                left: 83px;
                                                top: 51px;
                                                margin: 0px;
                                                font-size: 11px;">
                                                    Web development</p>
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a style="height:80px;" class="dropdown-item" href="{{ route('profile') }}">
                                            @if (Auth::user()->profile_img)
                                                <img src="{{ asset('storage/' . Auth::user()->profile_img) }}"
                                                    alt="Profile Image"
                                                    style="width: 60px; height: 60px; border-radius: 50%; position: absolute; top: 18px; left: 15px;">
                                            @else
                                                <img src="{{ asset('storage/default_profile_image.jpg') }}"
                                                    alt="Default Profile Image"
                                                    style="width: 60px; height: 60px; border-radius: 50%; position: absolute; top: 18px; left: 15px;">
                                            @endif
                                            <span
                                                style="position: absolute; left: 89px; top: 29px;"><b>{{ Auth::user()->name }}</b></span>
                                            <span>
                                                <p
                                                    style="position: absolute; left: 83px; top: 51px; margin: 0px; font-size: 11px;">
                                                    Web development</p>
                                            </span>
                                        </a>
                                    </li>

                                    <hr>
                                    <li><a class="dropdown-item" href="{{ 'profile' }}"><i
                                                style="color: rgb(176, 176, 176); font-size:20px" class="fa fa-user"></i>
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-list"
                                                style="color: rgb(176, 176, 176); font-size:20px"></i> My Orders</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-heart"
                                                style="color: rgb(176, 176, 176); font-size:20px"></i> My Wishlist</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"
                                                style="color: rgb(176, 176, 176); font-size:20px"></i> My
                                            Cart</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"
                                                style="color: rgb(176, 176, 176);"></i>{{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>




<script>
    // document.getElementById("search-icon").addEventListener("click", function() {
    //     var searchBox = document.getElementById("search-box");
    //     var removeIcon = document.getElementById("remove-icon");

    //     if (searchBox.style.display === "none") {
    //         searchBox.style.display = "block";
    //         removeIcon.style.display = "block";
    //     } else {
    //         searchBox.style.display = "none";
    //         removeIcon.style.display = "none";
    //     }
    // });

    // document.getElementById("remove-icon").addEventListener("click", function() {
    //     var searchBox = document.getElementById("search-box");
    //     var removeIcon = document.getElementById("remove-icon");

    //     searchBox.style.display = "none";
    //     removeIcon.style.display = "none";
    // });


    document.getElementById("search-icon").addEventListener("click", function() {
        var searchBox = document.getElementById("search-box");
        var removeIcon = document.getElementById("remove-icon");
        var menuItems = document.querySelectorAll(".nav-bar");

        if (searchBox.style.display === "none" || searchBox.style.display === "") {
            searchBox.style.display = "block";
            removeIcon.style.display = "block";
            menuItems.forEach(function(item) {
                item.style.display = "none";
            });
        } else {
            searchBox.style.display = "none";
            removeIcon.style.display = "none";
            menuItems.forEach(function(item) {
                item.style.display = "block";
            });
        }
    });

    document.getElementById("remove-icon").addEventListener("click", function() {
        var searchBox = document.getElementById("search-box");
        var removeIcon = document.getElementById("remove-icon");
        var menuItems = document.querySelectorAll(".nav-bar");

        searchBox.style.display = "none";
        removeIcon.style.display = "none";
        menuItems.forEach(function(item) {
            item.style.display = "block";
        });
    });
</script>
