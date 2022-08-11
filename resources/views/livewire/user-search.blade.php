<div>
    <input type="text" wire:model="query" class="form-control mb-1" placeholder="جستوجو">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 text-center">
            <table class="table">
                <tr>
                    <th>شماره پرسنلی</th>
                    <th>نام</th>
                    <th>وظیفه</th>
                    <th><i class="ion ion-gear-b"></i></th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->PNumber}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role->label}}</td>
                        <td>
                            @can('edit-user')
                                <label title="ویرایش" for="u-{{$user->id}}" class="badge badge-warning"><i
                                        class=" ion ion-edit"></i></label>
                                <input type="radio" id="u-{{$user->id}}" onclick="processChange();modalName='editUser';"
                                       wire:model="check"
                                       value="{{$user->id}}" style="display: none;">
                            @endcan
                            @can('delete-user')
                                <a title="حذف" href="{{route('delete-user',"$user->id")}}" class=" badge bg-danger"><i
                                        class=" ion ion-close-round"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @can('edit-user')
        <!-- Modal edit user -->
        @if($userE and $departments)
            <div style="z-index: 9999!important;" class="modal fade " id="editUser" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="row justify-content-center">
                            <div class="modal-body my-1 py-1">
                                <form action="{{route('edit-user')}}" method="POST">
                                    @csrf
                                    <input type="range" name="id" value="{{$userE->id}}" style="display: none;">
                                    <label for="name">نام</label>
                                    <div class="input-group mb-3">
                                        <input id="name" name="name" type="text" class="form-control"
                                               placeholder="نام" value="{{$userE->name}}">
                                        <div class="input-group-append">
                                            <span class="fa fa-user px-3 input-group-text"></span>
                                        </div>
                                    </div>
                                    <label for="PersonalNumber">شماره پرسنلی</label>
                                    <div class="input-group mb-3">
                                        <input id="PersonalNumber" name="personalNumber" type="text"
                                               class="form-control"
                                               placeholder="شماره پرسنلی" value="{{$userE->PNumber}}">
                                        <div class="input-group-append">
                                            <span class="fa fa-id-card-o input-group-text"></span>
                                        </div>
                                    </div>
                                    <label for="password"></label>
                                    <label for="department">نام زیرمجموعه</label>
                                    <div class="input-group mb-3">
                                        <select id="department" name="department" class="form-control">
                                            @foreach($departments as $d)
                                                <option @if($d->id == $userE->department_id) selected
                                                        @endif value="{{$d->id}}">{{$d->label}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <span class="fa fa-users input-group-text"></span>
                                        </div>
                                    </div>
                                    <label for="role">نقش</label>
                                    <div class="input-group mb-3">
                                        <select id="role" name="role" class="form-control">
                                            @foreach($roles as $role)
                                                <option @if($role->id == $userE->role_id) selected
                                                        @endif value="{{$role->id}}">{{$role->label}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <span class="fa fa-briefcase input-group-text"></span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center " style="border-top: 1px solid #e9ecef;">
                                        <!-- /.col -->
                                        <div class="col-10 mt-2">
                                            <button type="submit"
                                                    class="btn btn-primary btn-block btn-flat">{{__('ویرایش کاربر')}}</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- end Modal -->
    @endcan

</div>
