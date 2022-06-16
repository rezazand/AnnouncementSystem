<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | پروفایل</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="../../dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="../../dist/css/custom-style.css">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a class="mr-5" href="../../index2.html"><b>پروفایل کاربری</b></a>
    </div>

    <div class="login-box">
        <!-- /.login-logo -->
        <form action="{{route('user-profile-information.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
                <label class="lockscreen-image" for="file-input">
                    <img src="{{auth()->user()->getMedia()->last()? auth()->user()->getMedia()->last()->getUrl():'/avatar.png'}}" alt="User Image">
                </label >
                <input id="file-input" type="file" name="avatar" style="display: none;">
                <div class="lockscreen-credentials text-center pt-2 pb-1 font-weight-bold">{{auth()->user()->name}} {{auth()->user()->lastname}}</div>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" placeholder="نام"
                               value="{{old() ? old():auth()->user()->name}}">
                        <div class="input-group-append">
                            <span class="fa fa-user input-group-text"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="ایمیل"
                               value="{{auth()->user()->email? auth()->user()->email:old()}}">
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
                </div>
                <!-- /.login-card-body -->
            </div>
        </form>

    </div>

</div>
<!-- /.center -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
