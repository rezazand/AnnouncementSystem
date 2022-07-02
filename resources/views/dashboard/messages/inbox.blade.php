@extends('dashboard.messages.layout')
@section('messages-content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">{{\Route::currentRouteName() =='inbox'? 'دریافت شده':'ارسال شده'}}</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                        class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i
                            class="fa fa-trash-o"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i>
                    </button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i>
                </button>

                <div class="float-left">
                    {{$messages->links('paginate')}}
                </div>
                <!-- /.float-right -->
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover hover text-center text-sm">
                    <tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        @if(\Route::currentRouteName() =='inbox')
                            <th>فرستنده</th>
                        @else
                            <th>گیرنده</th>
                        @endif
                        <th>عنوان ابلاغیه</th>
                        <th>تاریخ</th>
                        <th>گردش کار</th>
                    </tr>
                    @foreach($messages as $message)
                        <tr @if(\Route::currentRouteName() =='inbox' and $message->status) class="text-bold" @endif>
                            <td><input type="checkbox"></td>
                            <td class="mailbox-star"><a href="#"><i
                                        class="fa fa-star-o text-warning"></i></a></td>
                            <td class="mailbox-name">{{\Route::currentRouteName() =='inbox'?\App\Models\User::find($message->user_id)->name:\App\Models\User::find($message->to)->name}}
                                @if(\Route::currentRouteName() =='inbox' and $message->status) <span
                                    class="badge badge-pill badge-warning py-1">جدید</span>@endif</td>
                            <td class="mailbox-subject"><a
                                    href="{{route('inbox').'/'."$message->id"}}">{{substr($message->subject,0,60)}}@if(strlen($message->subject) >60)
                                        ...@endif</a></td>
                            <td class="mailbox-date">{{$message->created_at}}</td>
                            <td class="mailbox-date"><a href="{{route('workflow',"$message->id")}}"><i
                                        class="fa fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer p-0">
            <div class="mailbox-controls">
                <div class="float-left">
                    {{$messages->links('paginate')}}
                </div>
            </div>
        </div>
    </div>
    <!-- /. box -->
@endsection
@section('js')
    <script src="{{asset('../../plugins/iCheck/icheck.min.js')}}"></script>
    <!-- Page Script -->
    <script>
        $(function () {
            //Enable iCheck plugin for checkboxes
            //iCheck for checkbox and radio inputs
            $('.mailbox-messages input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            })

            //Enable check and uncheck all functionality
            $('.checkbox-toggle').click(function () {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    //Uncheck all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').iCheck('uncheck')
                    $('.fa', this).removeClass('fa-check-square-o').addClass('fa-square-o')
                } else {
                    //Check all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').iCheck('check')
                    $('.fa', this).removeClass('fa-square-o').addClass('fa-check-square-o')
                }
                $(this).data('clicks', !clicks)
            })

            //Handle starring for glyphicon and font awesome
            $('.mailbox-star').click(function (e) {
                e.preventDefault()
                //detect type
                var $this = $(this).find('a > i')
                var glyph = $this.hasClass('glyphicon')
                var fa = $this.hasClass('fa')

                //Switch states
                if (glyph) {
                    $this.toggleClass('glyphicon-star')
                    $this.toggleClass('glyphicon-star-empty')
                }

                if (fa) {
                    $this.toggleClass('fa-star')
                    $this.toggleClass('fa-star-o')
                }
            })
        });
        let element = document.getElementById('inbox');
        let tree = document.getElementById('messages');
        element.classList.add('active');
        tree.classList.add('menu-open');
        tree.children[0].style.background = '#007bff';
    </script>
@endsection
