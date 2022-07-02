@extends('dashboard.messages.layout')
@section('messages-content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title d-inline">گردش کار</h3>
            <a class="btn btn-primary float-left" href="{{route('inbox')}}">بازگشت <i class="fa fa-arrow-left"></i> </a>
        </div>
        <div class="card-body table-responsive p-0 text-right text-sm">
            <table class="table ">
                <tr>
                    <th>ارجاع دهنده</th>
                    <th>موضوع</th>
                    <th>تاریخ ابلاغ</th>
                    <th>نتیجه</th>
                    <th>تاریخ ارجاع</th>
                </tr>


                @foreach($replies as $reply)
                    <tr>
                        <td>
                           {{\App\Models\User::find($reply->user_id)->name}}<span class="badge badge-info" style="transform: scale(0.8)">{{\App\Models\User::find($message->user_id)->role->label}}</span>
                        </td>
                        <td>{{$reply->subject}}</td>
                        <td>{{$message->created_at}}</td>
                        <td><a href={{route('check',$reply->id)}}>{{substr($reply->body,0,50).'...'}}</a></td>
                        <td>{{$reply->created_at}}</td>
                    </tr>
                @endforeach

            </table>
        </div>

    </div>
@endsection
