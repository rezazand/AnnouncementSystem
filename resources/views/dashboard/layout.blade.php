<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('head')
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-rtl.min.css')}}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{asset('dist/css/custom-style.css')}}">
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<!-- ./wrapper -->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
        <!-- Notifications Dropdown Menu -->
        <x-notifications-dropdown/>

        <li class="nav-item">
            <a title="خروج از سایت" class="nav-link" href="{{route('logout')}}"
               onclick="event.preventDefault();document.getElementById('signout-form').submit();"><i
                    class="fa fa-sign-out"></i></a>
        </li>
        <form id="signout-form" action="{{route('logout')}}" method="post" style="display: none;">@csrf</form>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل کاربری</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img
                        src="{{'/'.auth()->user()->avatar}}"
                        class="img-circle elevation-2" style="width: 35px;height: 35px;" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{route('profile')}}" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}"
                           class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard') active @endif"
                           id="dash">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>
                    @can('management')
                        <li class="nav-item" id="manage">
                            <a href="{{route('manage')}}"
                               class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'manage') active @endif">
                                <i class="nav-icon fa fa-superpowers" aria-hidden="true"></i>
                                <p>
                                    مدیریت
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('create-message')
                        <li class="nav-item has-treeview
                        @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'message.index' or  \Illuminate\Support\Facades\Route::currentRouteName() =='message.create') menu-open @endif
                        "
                            id="messages">
                            <a href="#"
                               class="nav-link
                               @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'message.index' or \Illuminate\Support\Facades\Route::currentRouteName() =="message.create") active @endif
                               ">
                                <i class="nav-icon fa fa-envelope-o"></i>
                                <p>
                                    مکاتبات
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('message.index')}}"
                                       class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'message.index') active @endif"
                                       id="inbox">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>صندوق</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('message.create')}}"
                                       class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName() == "message.create") active @endif"
                                       id="create">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>ایجاد</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{route('message.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-envelope-o"></i>
                                <p>
                                    مکاتبات
                                </p>
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="calender">
                            <i class="nav-icon fa fa-calendar"></i>
                            <p>
                                تقویم
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>

@yield('content')

<footer class="main-footer">
    <strong>CopyRight &copy; 2022 <a href="https://iut.ac.ir">دانشگاه صنعتی اصفهان</a>.</strong>
</footer>
@livewireScripts
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script !src="">
    const processChange = debounce(() => invokeModal(modalName));


    function debounce(func, timeout = 1000) {
        let timer;
        return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(this, args);
            }, timeout);
        };
    }

    function invokeModal(name) {
        $(`#${name}`).modal('show');
    }
    setTimeout(function(){
        $('#success').remove();
    }, 5000);
</script>
@yield('js')
</body>
</html>
