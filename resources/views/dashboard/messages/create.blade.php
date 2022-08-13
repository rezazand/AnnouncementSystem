@extends('dashboard.layout')
@section('head')
    <title>پنل کاربری | ایجاد ابلاغیه</title>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
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
@endsection
@section('js')
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

        })
    </script>
    <!-- iCheck -->
    <script src="{{asset('../../plugins/iCheck/icheck.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('../../plugins/ckeditor/ckeditor.js')}}"></script>

    <!-- Page Script -->
    <script>

        $('#attachment').change(function () {
            let i = $(this).next('label').clone();
            let file = $('#attachment')[0].files[0].name;
            let mb = 1048576;
            if (this.files[0].size > 32 * mb) {
                alert("فال ضمیمه نباید بیشتر از 32 مگابایت باشد!");
                this.value = "";
            } else {
                $(this).next('label').text(file);
            }
        });

        $("input[list='search']").change(function () {
            $("input[name='subject']").focus();
        })

        $(function () {
            ClassicEditor
                .create(document.querySelector('#compose-textarea'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                })
        })
        let element = document.getElementById('write');
        let tree = document.getElementById('messages');
        element.classList.add('active');
        tree.classList.add('menu-open');
        tree.children[0].style.background = '#007bff';
    </script>

@endsection
