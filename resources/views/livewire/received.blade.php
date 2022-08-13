<div>
    <div class="card-header">
        <h3 class="card-title">دریافت شده</h3>
    </div>
    <div class="card-body p-0">
        <div class="mailbox-controls">
            <!-- Check all button -->
            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                    class="fa fa-square-o"></i>
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm"><i
                        class="fa fa-trash-o"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i
                        class="fa fa-reply"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm"><i
                        class="fa fa-share"></i>
                </button>
            </div>
            <!-- /.btn-group -->
            <button type="button" class="btn btn-default btn-sm"><i
                    class="fa fa-refresh"></i>
            </button>

            <div class="float-left">
                {{$messages->links('paginate')}}
            </div>
            <!-- /.float-right -->
        </div>
    </div>
    <div class="table-responsive mailbox-messages">
        <table class="table table-hover hover text-center text-sm">
            <tbody>
            <tr>

                <th>فرستنده</th>
                <th>عنوان ابلاغیه</th>
                <th>تاریخ</th>
            </tr>
            @foreach($messages as $message)
                <tr @if($message->status) class="text-bold" @endif>
                    <td class="mailbox-name">
                        <p class="d-inline">{{$message->sender()->name}}</p>
                        @if( $message->status)
                            <span class="float-left badge badge-pill badge-warning ">جدید</span>
                        @endif
                    </td>

                    <td class="mailbox-subject"><a
                            href="{{route('message.show',$message->id)}}">{{$message->subject}}</a></td>
                    <td class="mailbox-date">{{$message->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- /.table -->
    </div>
    <div class="card-footer p-0">
        <div class="mailbox-controls">
            <div class="float-left">
                {{$messages->links('paginate')}}
            </div>
        </div>
    </div>
</div>
