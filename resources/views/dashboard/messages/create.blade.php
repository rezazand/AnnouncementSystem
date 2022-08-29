@extends('dashboard.layout')
@section('head')
    <title>پنل کاربری | ایجاد ابلاغیه</title>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> مکاتبات</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item "><a href="{{route('dashboard')}}">خانه</a></li>
                            <li class="breadcrumb-item "><a href="{{route('message.index')}}">مکاتبات</a></li>
                            <li class="breadcrumb-item active">ایجاد</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-md-10 mt-2">
                    <form action="{{route('message.store')}}" method="POST" class="card card-primary card-outline"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">ایجاد ابلاغیه جدید</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            @livewire('search-users')
                            <div class="form-group">
                                <input name="subject" class="form-control" placeholder="عنوان ابلاغیه :"
                                       autocomplete="off" value="{{old('subject')}}">
                                @error('subject')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="compose-textarea"
                                          class="form-control">{{old('body')}}</textarea>
                                @error('body')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"></i> فایل ضمیمه
                                    <input id="attachment" dirname="attachment" type="file" name="attachment">
                                    <label for="attachment" style="border-radius: 8px"
                                           class="text-sm d-inline border input-group px-2 py-1 my-1f ">there is no
                                        file...
                                    </label>
                                </div>
                                <p class="help-block">حداکثر 32MB</p>
                                @error('attachment')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-left">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ارسال
                                </button>
                            </div>
                            <a href="{{route('message.index')}}" class="btn btn-default"><i class="fa fa-times"></i> لغو</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
