@extends('dashboard.layout')
@section('head')
    <title>پنل کاربری | اضافه کردن کاربر</title>
    <style>
        body {
            padding-right: 0px !important;
        }

        .nav-link {
            transform: scale(0.9);
        }

        .badge {
            transition: all 0.1s linear;
        }

        .badge:hover {
            cursor: pointer;
            transform: scale(1.1);
        }

        .bg-warning-gradient {
            color: #ffffff !important;
        }

        .bg-warning-gradient:hover {
            color: #1F2D3D !important;
        }

        .small-box:hover {
            cursor: pointer;
        }

        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 17px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #0d6efd;
            border-color: #0d6efd;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(13px);
            -ms-transform: translateX(13px);
            transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>مدیریت</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    @can('create-user')
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-warning-gradient py-3" data-toggle="modal"
                                 data-target="#createNewUser">
                                <div class="inner">
                                    <p>ایجاد کاربر</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Modal create user -->
                        <div style="z-index: 9999!important;" class="modal fade " id="createNewUser" tabindex="-1"
                             role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="modal-body my-1 py-1">
                                            <form action="{{route('create-user')}}" method="POST">
                                                @csrf
                                                <label for="name">نام</label>
                                                <div class="input-group mb-3">
                                                    <input id="name" name="name" type="text" class="form-control"
                                                           placeholder="نام">
                                                    <div class="input-group-append">
                                                        <span class="fa fa-user px-3 input-group-text"></span>
                                                    </div>
                                                </div>
                                                <label for="PersonalNumber">شماره پرسنلی</label>
                                                <div class="input-group mb-3">
                                                    <input id="PersonalNumber" name="personalNumber" type="text"
                                                           class="form-control"
                                                           placeholder="شماره پرسنلی">
                                                    <div class="input-group-append">
                                                        <span class="fa fa-id-card-o input-group-text"></span>
                                                    </div>
                                                </div>
                                                <label for="password">رمز عبور</label>
                                                <div class="input-group mb-3">
                                                    <input id="password" name="password" type="password"
                                                           class="form-control"
                                                           placeholder="رمز عبور کاربر">
                                                    <div class="input-group-append">
                                                        <span class="fa fa-lock px-3 input-group-text"></span>
                                                    </div>
                                                </div>
                                                <label for="department">نام مجموعه</label>
                                                <div class="input-group mb-3">
                                                    <select id="department" name="department" class="form-control">
                                                        @can('access-all-departments')
                                                            @foreach(\App\Models\Department::all() as $d)
                                                                <option value="{{$d->id}}">{{$d->label}}</option>
                                                            @endforeach
                                                        @else
                                                            <option value="{{auth()->user()->department_id}}">
                                                                {{\App\Models\Department::find(auth()->user()->department_id)->label}}
                                                            </option>
                                                        @endcan
                                                    </select>
                                                    <div class="input-group-append">
                                                        <span class="fa fa-users input-group-text"></span>
                                                    </div>
                                                </div>
                                                <label for="role">نقش</label>
                                                <div class="input-group mb-3">
                                                    <select id="role" name="role" class="form-control">
                                                        @foreach(\App\Models\Role::all() as $role)
                                                            <option value="{{$role->id}}">{{$role->label}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <span class="fa fa-briefcase input-group-text"></span>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center "
                                                     style="border-top: 1px solid #e9ecef;">
                                                    <!-- /.col -->
                                                    <div class="col-10 mt-2">
                                                        <button type="submit"
                                                                class="btn btn-primary btn-block btn-flat">{{__('ایجاد کاربر')}}</button>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    @endcan
                    @can('create-department')
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-success-gradient py-3" data-toggle="modal"
                                 data-target="#createNewDepartment">
                                <div class="inner">

                                    <p>ایجاد مجموعه </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-stalker"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Modal create Department -->
                        <div class="modal fade" id="createNewDepartment" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form action="{{route('create-department')}}" method="POST">
                                            @csrf
                                            <label class="label" for="name">نام مجموعه</label>
                                            <div class="input-group mb-4">
                                                <input id="name" type="text" class="form-control"
                                                       placeholder="نام مجموعه"
                                                       name="label">
                                            </div>
                                            <div class="row justify-content-center "
                                                 style="border-top: 1px solid #e9ecef;">
                                                <!-- /.col -->
                                                <div class="col-10 mt-2">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-block btn-flat">{{__('ایجاد مجموعه')}}</button>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    @endcan
                    @can('create-role')
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-info-gradient py-3" data-toggle="modal"
                                 data-target="#createNewRole">
                                <div class="inner">

                                    <p>ایجاد وظیفه </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-briefcase"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Modal create role -->
                        <div class="modal fade" id="createNewRole" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('create-role')}}" method="POST">
                                            @csrf
                                            <label class="label" for="name">نام وظیفه</label>
                                            <div class="input-group mb-4">
                                                <input id="name" type="text" class="form-control"
                                                       placeholder="نام وظیفه"
                                                       name="label">
                                            </div>
                                            <div class="input-group" id="permissions">
                                                <label for="permissions">دسترسی ها</label>
                                                <div class="row">
                                                    @foreach(\App\Models\Permission::all() as $p)
                                                        <div class="col-4  shadow-sm border" style="border-radius:5px;">
                                                            <div class="py-2">
                                                                <p class="d-inline">{{$p->label}}</p>
                                                                <label class="switch float-left">
                                                                    <input type="checkbox" name="permissions[]"
                                                                           value="{{$p->id}}">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row justify-content-center "
                                                 style="border-top: 1px solid #e9ecef;">
                                                <!-- /.col -->
                                                <div class="col-10 mt-2">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-block btn-flat">{{__('ایجاد وظیفه')}}</button>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Modal-->
                    @endcan
                </div>


                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <ul class="nav nav-pills col-lg-5 col-8 mb-1" style="border-radius: 5px;">
                            <li class="nav-item bg-white shadow-sm"><a class="nav-link active" href="#users"
                                                                       data-toggle="tab">کاربران</a>
                            </li>
                            <li class="nav-item bg-white shadow-sm"><a class="nav-link" href="#roles" data-toggle="tab">وظایف</a>
                            </li>
                            <li class="nav-item bg-white shadow-sm"><a class="nav-link" href="#departments"
                                                                       data-toggle="tab">مجموعه
                                    ها</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="users">
                                @livewire('user-search')
                            </div>
                            <div class="tab-pane" id="roles">
                                @livewire('search-roles')
                            </div>
                            <div class="tab-pane" id="departments">
                                @livewire('search-department')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(session('message'))
            <div id="success" class="container " style="position: fixed;left:10px; bottom: 10px">
                <div class="row justify-content-end px-3">
                    <div class="col-5 alert alert-success alert-dismissible ">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> توجه!</h5>
                        {{session('message')}}
                    </div>
                </div>
            </div>
        @endif
        @foreach($errors->manageError->all() as $error)
            <div id="success" class="container " style="position: fixed;left:10px; bottom: 10px">
                <div class="row justify-content-end px-3">
                    <div class="col-5 alert alert-danger alert-dismissible ">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{$error}}
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
@section('js')
    <script>
        let hash = location.hash;
        if (hash) {
            $('.active').removeClass('active');
            $(hash).addClass('active');
            $(`a[href$="${hash}"]`).addClass('active');
        }
    </script>

@endsection
