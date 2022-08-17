@extends('dashboard.layout')
@section('head')
    <title>پنل مدیریت | پروفایل</title>
    <style>
        .image_area:hover{
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 " >
                        <div class="col-sm-6">
                            <h1>پروفایل</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">خانه</a></li>
                                <li class="breadcrumb-item active">پروفایل کاربری</li>
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

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{auth()->user()->avatar}}"
                                             alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                                    <p class="text-muted text-center">{{auth()->user()->role->label}}</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#settings"
                                                                data-toggle="tab">تنظیمات</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">

                                        <div class="tab-pane active " id="settings">
                                            <form action="{{route('profile.update')}}" method="post"
                                                  enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <!-- START LOCK SCREEN ITEM -->
                                                <div class="mx-auto col-2">
                                                    <label for="file-input" class="image_area">
                                                        <img  id="preview" class="profile-user-img img-circle"
                                                             src="{{auth()->user()->avatar}}"
                                                             alt="User Image">
                                                        <input id="file-input" type="file" name="avatar"
                                                               style="display: none;">
                                                    </label>
                                                </div>
                                                <label for="name">نام</label>
                                                <div class="input-group mb-3">
                                                    <input id="name" name="name" type="text" class="form-control"
                                                           placeholder="نام"
                                                           value="{{old() ? old():auth()->user()->name}}">
                                                    <div class="input-group-append">
                                                        <span class="fa fa-user input-group-text"></span>
                                                    </div>
                                                </div>
                                                <label  for="email">ایمیل</label>
                                                <div class="input-group mb-3">
                                                    <input id="email" name="email" type="email" class="form-control"
                                                           placeholder="ایمیل"
                                                           value="{{auth()->user()->email? auth()->user()->email:''}}">
                                                    <div class="input-group-append">
                                                        <span class="fa fa-envelope input-group-text"></span>
                                                    </div>
                                                    @error('email')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                                <div class="row justify-content-center">
                                                    <!-- /.col -->
                                                    <div class="col-10">
                                                        <button type="submit"
                                                                class="btn btn-primary btn-block btn-flat">{{__('ثبت تغییرات')}}</button>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
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
        </div>
        <!-- /.content-wrapper -->
    </div>
@endsection
@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file-input").change(function(){
            readURL(this);
        });
    </script>
@endsection
