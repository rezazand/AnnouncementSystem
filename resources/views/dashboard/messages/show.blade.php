@extends('dashboard.layout')
@section('head')
    <title>پنل کاربری | مشاهده ابلاغیه</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10 mt-2">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title d-inline">مشاهده ابلاغیه</h3>
                            <a class="btn btn-primary float-left" href="{{redirect()->back()->getTargetUrl()}}">بازگشت
                                <i
                                    class="fa fa-arrow-left"></i> </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h5
                                    @if($message->user_id == auth()->id())
                                        class="mb-1">گیرنده : {{$message->receiver->name}}
                                    <span style="transform: scale(0.8)"
                                          class="badge badge-info">{{$message->receiver->role->label}}
                                    </span>
                                    @else
                                        class="mb-1">فرستنده : {{$message->user->name}}
                                        <span style="transform: scale(0.8)"
                                              class="badge badge-info">{{$message->user->role->label}}
                                    </span>
                                    @endif
                                    <span class="mailbox-read-time float-left">{{$message->created_at}}</span>
                                </h5>
                                <h7>موضوع : {{$message->subject}}</h7>
                            </div>
                            <div class="mailbox-read-message">
                                {!! $message->body !!}
                            </div>

                            <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.card-body -->
                        @if($message->attachments)
                            <div class="card-footer bg-white">
                                <ul class="mailbox-attachments clearfix">
                                    @foreach($message->attachments()->get() as $attach)
                                        <li>
                                            <span class="mailbox-attachment-icon ">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </span>
                                            <div class="mailbox-attachment-info">
                                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                                    {{$attach->filename}}</p>
                                                <span class="mailbox-attachment-size">
                                                    <a href="{{route('download',$attach->id)}}"
                                                       class="btn btn-default btn-sm float-left">
                                                        <i class="fa fa-cloud-download"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- form -->
                        @if($message->user->id == auth()->id())
                            <div class="card card-white  collapsed-card" style="margin-bottom: 0px!important;">
                                <div class="card-header">
                                    <div class="">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                            ثبت ارجاع
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" >
                                    @php $status = true @endphp
                                    @if($message->replies != null)
                                        <div class="table-responsive mailbox-messages">
                                            <table class="table table-hover hover text-center text-sm">
                                                <tr>
                                                    <th>نام کار</th>
                                                    <th>نوع کار</th>
                                                    <th>نتیجه</th>
                                                    <th>تاریخ ارجاع</th>
                                                </tr>
                                                    <tr >
                                                        @foreach($message->replies as $reply)
                                                            @if($reply->user_id == auth()->id())
                                                                <td >
                                                                    {{$reply->type}}
                                                                </td>
                                                                <td >
                                                                    {{$reply->name}}
                                                                </td>
                                                                <td >
                                                                    {{$reply->body}}
                                                                </td>
                                                            <td>
                                                                {{$reply->created_at}}
                                                            </td>
                                                                @php $status = false @endphp
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                            </table>
                                        </div>
                                    @endif
                                    @if($status)
                                        <form action="{{route('reply',$message->id)}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">نام کار</label>
                                                <input id="name" class=" form-control" name="name" type="text"
                                                       value="{{old('name')}} " placeholder='نام کار'>
                                            </div>
                                            <div class="form-group">
                                                <label for="type">نوع کار</label>
                                                <input id="type" class="form-control" name="type" type="text"
                                                       value="{{old('type')}} " placeholder='نوع کار'>
                                            </div>
                                            <div class="form-group">
                                                <label for="body">متن ارجاع</label>
                                                <textarea id="body" name="body" class="form-control"
                                                          autocomplete="off"
                                                          placeholder="متن ارجاع">{{old('body')}}</textarea>
                                                @error('body')
                                                <p class="text-danger mt-2">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">ثبت ارجاع</button>
                                        </form>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

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
