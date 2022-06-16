@extends('dashboard.layout')
@section('title')
    <title>پنل مدیریت | پیام ها</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>خواندن پیام</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">خواندن پیام</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        @if(\Route::currentRouteName() !=('inbox' or 'sent'))
                        <a href="{{route('inbox')}}" class="btn btn-primary btn-block mb-3">برگشت <i class="fa fa-share"></i></button>
                        </a>
                        @else
                            <a href="{{route('write')}}" class="btn btn-primary btn-block mb-3">ایجاد پیام جدید <i class="fa fa-share"></i></button>
                            </a>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">پوشه‌ها</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item active">
                                        <a href="{{route('inbox')}}" class="nav-link">
                                            <i class="fa fa-inbox"></i> دریافت شده
                                            @if($unread!= 0)
                                            <span class="badge bg-primary float-left">{{$unread}}</span>
                                            @endif
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('sent')}}" class="nav-link">
                                            <i class="fa fa-envelope-o"></i> ارسال شده
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-file-text-o"></i> پیش نویس
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-trash-o"></i> سطل زباله
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /. box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">برچسبب‌ها</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o text-danger"></i>
                                            مهم
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o text-warning"></i> شخصی
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o text-primary"></i>
                                            شبکه اجتماعی
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        @yield('messages-content')
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>CopyLeft &copy; 2018 <a href="http://github.com/hesammousavi/">حسام موسوی</a>.</strong>
    </footer>
    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
@endsection
@section('js')
    @yield('js')
@endsection

