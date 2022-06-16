@extends('dashboard.messages.layout')
@section('messages-content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">خواندن نامه</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <h5>{{$message->subject}}</h5>
                <h6>از : {{\App\Models\User::find($message->user_id)->email}}
                    <span class="mailbox-read-time float-left">15 دی 1397 ساعت 12:00</span></h6>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                            data-container="body" title="حذف">
                        <i class="fa fa-trash-o"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                            data-container="body" title="پاسخ">
                        <i class="fa fa-share"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                            data-container="body" title="جلو">
                        <i class="fa fa-reply"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                        title="پرینت">
                    <i class="fa fa-print"></i></button>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                {{$message->body}}
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-white">
            <ul class="mailbox-attachments clearfix">
                <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                            Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-sm float-left"><i class="fa fa-cloud-download"></i></a>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <div class="float-left">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> پاسخ
                </button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> جلو
                </button>
            </div>
            <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> حذف</button>
            <button type="button" class="btn btn-default"><i class="fa fa-print"></i> پرینت</button>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /. box -->
@endsection
@section('js')
    <script>
        let element = document.getElementById('inbox');
        let tree = document.getElementById('messages');
        element.classList.add('active');
        tree.classList.add('menu-open');
        tree.children[0].style.background = '#007bff';
    </script>
@endsection
