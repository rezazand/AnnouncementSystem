<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="card-header">
        <h3 class="card-title">ارسال شده</h3>
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
                <th>گیرنده</th>
                <th>عنوان ابلاغیه</th>
                <th>تاریخ</th>
                <th>گردش کار</th>
            </tr>
            @foreach($messages as $message)
                <tr>
                    <td class="mailbox-name">
                        {{$message->receiver()->name}}
                    </td>

                    <td class="mailbox-subject"><a
                            href="{{route('message.show',$message->id)}}">{{$message->subject}}</a></td>
                    <td class="mailbox-date">{{$message->created_at}}</td>
                    <td class="mailbox-date">
                        <label for="w-{{$message->id}}"><i
                                class="fa fa-eye"></i></label>
                    </td>
                    <input type="radio" id="w-{{$message->id}}" onclick="processChange();modalName='workflow';"
                           wire:model="messageId"
                           value="{{$message->id}}" style="display: none;">
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- /.table -->
    </div>
    <!-- modal -->
    <div class="modal fade" id="workflow" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card-body table-responsive p-0 text-right text-sm">
                        <table class="table ">
                            <tr>
                                <th>ارجاع دهنده</th>
                                <th>نام کار</th>
                                <th>نوع کار</th>
                                <th>تاریخ ابلاغ</th>
                                <th>نتیجه</th>
                                <th>تاریخ ارجاع</th>
                            </tr>
                            @if($replies)
                                @foreach($replies as $reply)
                                    <tr>
                                        <td>
                                            {{$reply->user->name}}<span
                                                class="badge badge-info"
                                                style="transform: scale(0.8)">{{$reply->user->role->label}}</span>
                                        </td>
                                        <td>{{$reply->name}}</td>
                                        <td>{{$reply->type}}</td>
                                        <td>{{$message->created_at}}</td>
                                        <td>
                                            {{$reply->body}}
                                        </td>
                                        <td>{{$reply->created_at}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->

    <div class="card-footer p-0">
        <div class="mailbox-controls">
            <div class="float-left">
                {{$messages->links('paginate')}}
            </div>
        </div>
    </div>
</div>
