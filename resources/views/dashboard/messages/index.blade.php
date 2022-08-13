@extends('dashboard.layout')
@section('head')
    <title>پنل کاربری | ابلاغیه ها</title>
    <style>
        body {
            padding-right: 0px !important;
        }

        .fa-eye {
            color: #0d6efd;
            transition: all 0.1s linear;
        }

        .fa-eye:hover {
            cursor: pointer;
            transform: scale(1.1);
        }
    </style>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>مکاتبات</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item "><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">مکاتبات</li>
                            <li class="breadcrumb-item active">صندوق</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 tab-content">
                        <div class="tab-pane active" id="received">
                            <div class="card card-primary card-outline">
                                @livewire('received')
                            </div>
                        </div>
                        <div class="tab-pane" id="sent">
                            <div class="card card-primary card-outline">

                                @livewire('sent')
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3">

                        <a href="{{route('message.create')}}" class="btn btn-primary btn-block mb-3">ایجاد ابلاغیه
                            جدید
                        </a>

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
                                    <li class="nav-item">
                                        <a href="#received" class="nav-link active" data-toggle="tab">
                                            <i class="fa fa-inbox"></i> دریافت شده
                                            <span
                                                class="badge bg-primary float-left">{{auth()->user()->messages()->where('action','receive')->where('status',1)->count()}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sent" class="nav-link" data-toggle="tab">
                                            <i class="fa fa-envelope-o"></i> ارسال شده
                                        </a>
                                    </li>

                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fa fa-file-text-o"></i> پیش نویس--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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

