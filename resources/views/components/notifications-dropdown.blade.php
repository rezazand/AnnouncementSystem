<li class="nav-item dropdown">
    <a title="اعلانات" class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-bell-o"></i>
        <span class="badge badge-warning navbar-badge">
                    {{$newMessages + $newReplies}}
                </span>

    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
        <span class="dropdown-item dropdown-header">{{$newMessages + $newReplies}} اعلان</span>

        @if($newMessages != 0)
            <div class="dropdown-divider"></div>
            <a href="{{route('message.index').'#receive'}}" class="dropdown-item">
                <i class="fa fa-envelope ml-2"></i> {{$newMessages}} ابلاغیه جدید جدید
                {{--                <span class="float-left text-muted text-sm">3 دقیقه</span>--}}
            </a>
        @endif

        @if($newReplies != 0)
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fa fa-file ml-2"></i> {{$newReplies}} ارجاع جدید
                {{--            <span class="float-left text-muted text-sm">2 روز</span>--}}
            </a>
        @endif

        @if($newMessages + $newReplies == 0)
            <div class="dropdown-divider"></div>
            <span class="dropdown-item text-center">
                <i class="fa fa-bell-slash-o"></i>  اعلان جدیدی وجود ندارد
                {{--            <span class="float-left text-muted text-sm">2 روز</span>--}}
                {{--TODO--}}
            </span>
        @else
            <div class="dropdown-divider"></div>
            <a href="{{route('message.index')}}" class="dropdown-item dropdown-footer">مشاهده همه اعلانات</a>
        @endif
    </div>
</li>
