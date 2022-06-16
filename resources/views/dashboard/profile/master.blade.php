@extends('dashboard.layout')
@section('title')
    <title>پنل مدیریت | پروفایل</title>
@endsection
@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>پروفایل</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
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
                                             src="{{auth()->user()->getMedia()->last()? auth()->user()->getMedia()->last()->getUrl():'/avatar.png'}}"
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
                                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">تغییر
                                                پسورد</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">

                                        <div class="tab-pane" id="timeline">
                                            <!-- The timeline -->
                                            <ul class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <li class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                                                </li>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <li>
                                                    <i class="fa fa-envelope bg-primary"></i>

                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent
                                                            you an email</h3>

                                                        <div class="timeline-body">
                                                            Etsy doostang zoodles disqus groupon greplin oooj voxy
                                                            zoodles,
                                                            weebly ning heekya handango imeem plugg dopplr jibjab,
                                                            movity
                                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo
                                                            kaboodle
                                                            quora plaxo ideeli hulu weebly balihoo...
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <li>
                                                    <i class="fa fa-user bg-info"></i>

                                                    <div class="timeline-item">
                                                        <span class="time"><i
                                                                class="fa fa-clock-o"></i> 5 mins ago</span>

                                                        <h3 class="timeline-header no-border"><a href="#">Sarah
                                                                Young</a> accepted your friend request
                                                        </h3>
                                                    </div>
                                                </li>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <li>
                                                    <i class="fa fa-comments bg-warning"></i>

                                                    <div class="timeline-item">
                                                        <span class="time"><i
                                                                class="fa fa-clock-o"></i> 27 mins ago</span>

                                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented
                                                            on your post</h3>

                                                        <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                                comment</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->
                                                <li class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                                                </li>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <li>
                                                    <i class="fa fa-camera bg-purple"></i>

                                                    <div class="timeline-item">
                                                        <span class="time"><i
                                                                class="fa fa-clock-o"></i> 2 days ago</span>

                                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded
                                                            new photos</h3>

                                                        <div class="timeline-body">
                                                            <img src="http://placehold.it/150x100" alt="..."
                                                                 class="margin">
                                                            <img src="http://placehold.it/150x100" alt="..."
                                                                 class="margin">
                                                            <img src="http://placehold.it/150x100" alt="..."
                                                                 class="margin">
                                                            <img src="http://placehold.it/150x100" alt="..."
                                                                 class="margin">
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- END timeline item -->
                                                <li>
                                                    <i class="fa fa-clock-o bg-gray"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane active " id="settings">
                                            <form action="{{route('user-profile-information.update')}}" method="post"
                                                  enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <!-- START LOCK SCREEN ITEM -->
                                                <div class="mx-auto col-3">
                                                    <label for="file-input">
                                                        <img class="profile-user-img img-circle"
                                                             src="{{auth()->user()->getMedia()->last()? auth()->user()->getMedia()->last()->getUrl():'/avatar.png'}}"
                                                             alt="User Image">
                                                    </label>
                                                    <input id="file-input" type="file" name="avatar"
                                                           style="display: none;"><br>
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
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>CopyLeft &copy; 2018 <a href="http://github.com/hesammousavi/">حسام موسوی</a>.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
@endsection
@section('js')
    <script></script>
@endsection
