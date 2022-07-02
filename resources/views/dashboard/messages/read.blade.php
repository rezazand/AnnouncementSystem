@extends('dashboard.messages.layout')
@section('messages-content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'read')
                <h3 class="card-title d-inline">خواندن ابلاغیه</h3>
            @else
                <h3 class="card-title d-inline">خواندن متن ارجاع</h3>
            @endif
            <a class="btn btn-primary float-left" href="{{redirect()->back()->getTargetUrl()}}">بازگشت <i
                    class="fa fa-arrow-left"></i> </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <h5 class="mb-1">فرستنده : {{\App\Models\User::find($message->user_id)->name}} <span
                        style="transform: scale(0.8)"
                        class="badge badge-info">{{\App\Models\User::find($message->user_id)->role->label}}</span>
                    <span class="mailbox-read-time float-left">{{$message->created_at}}</span></h5>
                <h7>موضوع : {{$message->subject}}</h7>
            </div>
            <div class="mailbox-read-message">
                {!! $message->body !!}

            </div>
            <!-- /.mailbox-read-message -->
        </div>
    <!-- /.card-body -->
        <div class="card-footer bg-white">
            <ul class="mailbox-attachments clearfix">
                @foreach($message->attachments()->get() as $attach)
                    <li>
                        <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                        <div class="mailbox-attachment-info">
                            <p  class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                {{$attach->filename}}</p>
                            <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="{{route('download',$attach->id)}}" class="btn btn-default btn-sm float-left"><i class="fa fa-cloud-download"></i></a>
                        </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
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
