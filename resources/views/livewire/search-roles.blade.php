<div>
    <input type="text" wire:model="query" class="form-control mb-1" placeholder="جستوجو">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 text-center">
            <table class="table">
                <tr>
                    <th>نام</th>
                    <th><i class="ion ion-gear-b"></i></th>
                </tr>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->label}}</td>
                        <td>
                            <label for="edit-{{$role->id}}" class="badge badge-warning"><i
                                    class=" ion ion-edit"></i></label>
                            <input onclick="processChange();modalName='showEdit';" wire:model="check"
                                   value="{{$role->id}}" id="edit-{{$role->id}}" type="radio" style="display: none;">
                            <a href="{{route('delete-role',$role->id)}}" class=" badge bg-danger"><i
                                    class=" ion ion-close-round"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->

    </div>

    <!-- Modal show permissions -->
    <div class="modal fade" id="showPermissions" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @if($permissions != 0)
                        @foreach($permissions as $p)
                            <ul class="list-group text-center">
                                <li class="list-group-item">{{$p->label}}</li>
                            </ul>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal show role edit -->
    <div class="modal fade" id="showEdit" tabindex="-2" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('edit-role')}}" method="POST">
                        @csrf
                        <label class="label" for="name">نام وظیفه</label>
                        <div class="input-group mb-4">
                            <input id="name" type="text" class="form-control" placeholder="نام وظیفه" name="label" @if($permissions != 0)value="{{\App\Models\Role::find($check)->label}}"@endif>
                            <input type="range" name="id" value="{{$check}}" style="display: none;">
                        </div>
                        <div class="input-group" id="permissions">
                            <label for="permissions">دسترسی ها</label>
                            <div class="row">
                                @if($permissions != 0)
                                    @foreach(\App\Models\Permission::all() as $p)
                                        <div class="col-4  shadow-sm border" style="border-radius:5px;">
                                            <div class="py-2">
                                                <p class="d-inline">{{$p->label}}</p>
                                                <label class="switch float-left">
                                                    <input type="checkbox" @foreach($permissions as $c) @if($p->id==$c->id) checked @endif @endforeach name="permissions[]" value="{{$p->id}}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center " style="border-top: 1px solid #e9ecef;">
                            <!-- /.col -->
                            <div class="col-10 mt-2">
                                <button type="submit"
                                        class="btn btn-primary btn-block btn-flat">{{__('ویرایش وظیفه')}}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
</div>
