@extends('dashboard.messages.layout')
@section('head')
    @livewireStyles
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">

@endsection
@section('messages-content')
    <form action="{{route('create')}}" method="POST" class="card card-primary card-outline" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <h3 class="card-title">ایجاد ابلاغیه جدید</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

                @livewire('search-users')
                <div class="form-group">
                    <input name="subject" class="form-control" placeholder="عنوان ابلاغیه :">
                </div>
                <div class="form-group">
                    <textarea name="body" id="compose-textarea" class="form-control" style="height: 300px">

                    </textarea>
                </div>
                <div class="form-group">
                    <div class="btn btn-default btn-file">
                        <i class="fa fa-paperclip"></i> فایل ضمیمه
                        <input id="attachment" dirname="atachment" type="file" name="attachment">
                        <label for="attachment" style="border-radius: 8px" class="text-sm d-inline border input-group px-2 py-1 my-1f ">there is no
                            file...
                        </label>
                    </div>
                    <p class="help-block">حداکثر 32MB</p>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ارسال</button>
                </div>
                <a href="{{route('inbox')}}" class="btn btn-default"><i class="fa fa-times"></i> لغو</a>
            </div>
            <!-- /.card-footer -->
    </form>

@endsection
@section('js')
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>

    @livewireScripts
    <script >
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
            var i = $(this).next('label').clone();
            var file = $('#attachment')[0].files[0].name;
            $(this).next('label').text(file);
        });
        $(function () {
            //Add text editor
            ClassicEditor
                .create(document.querySelector('#compose-textarea'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                })

//    $('#compose-textarea').wysihtml5()
        })
        let element = document.getElementById('write');
        let tree = document.getElementById('messages');
        element.classList.add('active');
        tree.classList.add('menu-open');
        tree.children[0].style.background = '#007bff';
    </script>

@endsection
