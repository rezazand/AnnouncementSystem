@extends('dashboard.messages.layout')
@section('messages-content')
    <form action="{{route('create')}}" method="POST" class="card card-primary card-outline">
        @csrf
        <div class="card-header">
            <h3 class="card-title">ایجاد نامه جدید</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <input name="to" class="form-control" placeholder="ارسال به :">
            </div>
            <div class="form-group">
                <input name="subject" class="form-control" placeholder="عنوان نامه :">
            </div>
            <div class="form-group">
                    <textarea name="body" id="compose-textarea" class="form-control" style="height: 300px">

                    </textarea>
            </div>
            <div class="form-group">
                <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> فایل ضمیمه
                    <input dirname="atachment" type="file" name="attachment">
                </div>
                <p class="help-block">حداکثر 32MB</p>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="float-left">
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ارسال</button>
            </div>
            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> لغو</button>
        </div>
        <!-- /.card-footer -->
    </form>
@endsection
@section('js')
    <!-- iCheck -->
    <script src="{{asset('../../plugins/iCheck/icheck.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('../../plugins/ckeditor/ckeditor.js')}}"></script>

    <!-- Page Script -->
    <script>
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
