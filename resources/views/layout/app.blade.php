
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('layout.partials.head')
    
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
            <a href="{{route('index')}} " class="ms-5 mt-5"><img src="assets/images/logo/bey.jpg" width="170px" height="170px"></a>
                
            
            
    <div class="sidebar-menu">
        
    @include('layout.partials.navbar')
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <div class="row">
        <div class="col-xl-10">
            <div class="card ">
                <div class="card-body">
                    HOSGELDİN <span class="text-warning text-uppercase"><b>{{Auth::user()->name}}</b></span>
                </div>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="card">
                <div class="card-body">
                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                        <b><i class="bi bi-box-arrow-right text-danger"></i></b>
                        <span class="text-danger"><b>Çıkış</b></span>
                    </a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                                @csrf</form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
        @yield('content')
    
</div>

            <footer>
            @include('layout.partials.footer')
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
    <script src="assets/js/mazer.js"></script>

   

</body>


</html>
