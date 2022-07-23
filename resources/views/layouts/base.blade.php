@include('includes.head')
<style>
    .back-color {
        background-color: #090909 !important;


    }
    .text-white{
        color: #fff !important;
    }
</style>
    <div class="screen-overlay"></div>
@include('includes.sidebar')

    <main class="main-wrap ">
        <header class="main-header navbar">
            <div class="col-search">

            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
                <ul class="nav">

                    <li class="nav-item">
                        <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                    </li>

                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{asset('assets/imgs/people/avatar2.jpg')}}" alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{route(('logout'))}}"><i class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <section class="content-main">
            @yield('content')
        </section> <!-- content-main end// -->
        <footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> ©, growacademy - Decouverte .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        All rights reserved
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="{{asset('/assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendors/select2.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendors/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('/assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendors/chart.js')}}"></script>
    <script src="{{asset('/assets/js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/js/custom-chart.js')}}" type="text/javascript"></script>
    @yield('scripts')
</body>

</html>
