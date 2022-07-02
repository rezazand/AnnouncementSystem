@extends('dashboard.layout')
@section('head')
    <title>پنل کاربری | ابلاغیه ها</title>
    @yield('head')
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> مشاهده ابلاغیه ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item "><a href="{{route('dashboard')}}">خانه</a></li>
                            @if(Route::currentRouteName() =='inbox')
                                <li class="breadcrumb-item active">صندوق</li>
                                <li class="breadcrumb-item active">دریافت شده</li>
                            @elseif(Route::currentRouteName() =='sent')
                                <li class="breadcrumb-item active">صندوق</li>
                                <li class="breadcrumb-item active">ارسال شده</li>

                            @elseif(Route::currentRouteName() =='read')
                                <li class="breadcrumb-item active"><a href="{{route('inbox')}}">صندوق</a></li>
                                <li class="breadcrumb-item active">خواندن</li>
                            @elseif(Route::currentRouteName() == 'write')
                                <li class="breadcrumb-item active"><a href="{{route('inbox')}}">صندوق</a></li>
                                <li class="breadcrumb-item active">ایجاد ابلاغیه</li>
                            @else
                                <li class="breadcrumb-item active"><a href="{{route('inbox')}}">صندوق</a></li>
                                <li class="breadcrumb-item active">گردش کار</li>
                            @endif

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
                            <a href="{{route('inbox')}}" class="btn btn-primary btn-block mb-3">برگشت <i
                                    class="fa fa-share"></i></button>
                            </a>
                        @else
                            <a href="{{route('write')}}" class="btn btn-primary btn-block mb-3">ایجاد ابلاغیه جدید
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
                                                <span class="badge bg-primary float-left">{{auth()->user()->messages('to')->where('status',1)->count()}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('sent')}}" class="nav-link">
                                            <i class="fa fa-envelope-o"></i> ارسال شده
                                        </a>
                                    </li>
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link">--}}
{{--                                            <i class="fa fa-file-text-o"></i> پیش نویس--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link">--}}
{{--                                            <i class="fa fa-trash-o"></i> سطل زباله--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /. box -->
                        {{--<div class="card">
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
                        </div>--}}
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
@endsection
@section('js')
    @yield('js')
@endsection

