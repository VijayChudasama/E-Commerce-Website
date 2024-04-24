<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('assets\images\favicon.png') }}">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    {{-- <link rel="shortcut icon" type="png" href=""/> --}}


    {{-- {{ asset('\images\favicon .png') }} --}}




    @livewireStyles
</head>

<body>

    <div class="container-scroller">


        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('content')

                </div>

            </div>


        </div>

    </div>


    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>


    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>


    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>


    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/data-table.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}"></script>

    {{-- @if (session('alert'))
        <div id="alert" class="alert alert-{{ session('alert')['type'] }}">
            {{ session('alert')['message'] }}
        </div>

        <script>
            // Use setTimeout to close the alert after 2 seconds
            setTimeout(function() {
                document.getElementById('alert').style.display = 'none';
            }, 10000); // 2000 milliseconds = 2 seconds
        </script>
    @endif --}}


    @yield('scripts')

    @livewireScripts()
    @stack('script')



    <script>
        setSelectHover();

    function setSelectHover(selector = "select") {
      let selects = document.querySelectorAll(selector);
      selects.forEach((select) => {
        let selectWrap = select.parentNode.closest(".select-wrap");
        // wrap select element if not previously wrapped
        if (!selectWrap) {
          selectWrap = document.createElement("div");
          selectWrap.classList.add("select-wrap");
          select.parentNode.insertBefore(selectWrap, select);
          selectWrap.appendChild(select);
        }
        // set expanded height according to options
        let size = select.querySelectorAll("option").length;

        // adjust height on resize
        const getSelectHeight = () => {
          selectWrap.style.height = "auto";
          let selectHeight = select.getBoundingClientRect();
          selectWrap.style.height = selectHeight.height + "px";
        };
        getSelectHeight(select);
        window.addEventListener("resize", (e) => {
          getSelectHeight(select);
        });

        /**
         * focus and click events will coincide
         * adding a delay via setTimeout() enables the handling of
         * clicks events after the select is focused
         */
        let hasFocus = false;
        select.addEventListener("focus", (e) => {
          select.setAttribute("size", size);
          setTimeout(() => {
            hasFocus = true;
          }, 150);
        });

        // close select if already expanded via focus event
        select.addEventListener("click", (e) => {
          if (hasFocus) {
            select.blur();
            hasFocus = false;
          }
        });

        // close select if selection was set via keyboard controls
        select.addEventListener("keydown", (e) => {
          if (e.key === "Enter") {
            select.removeAttribute("size");
            select.blur();
          }
        });

        // collapse select
        select.addEventListener("blur", (e) => {
          select.removeAttribute("size");
          hasFocus = false;
        });
      });
    }
    </script>



</body>

</html>
