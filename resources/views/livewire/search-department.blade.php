<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <input type="text" wire:model="query" class="form-control mb-1" placeholder="جستوجو">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 text-center">
            <table class="table">
                <tr>
                    <th>نام</th>
                    <th><i class="ion ion-gear-b"></i></th>
                </tr>
                @foreach($departments as $department)
                    <tr>
                        <td>{{$department->label}}</td>
                        <td>
                            @can('edit-department')
                                <label for="editDep-{{$department->id}}" class="badge badge-warning"><i
                                        class=" ion ion-edit"></i></label>
                                <input onclick="processChange();modalName='showDepartmentEdit';" wire:model="check"
                                       value="{{$department->id}}" id="editDep-{{$department->id}}" type="radio"
                                       style="display: none;">
                            @endcan
                            @can('delete-department')
                                <a href="{{route('delete-department',$department->id)}}" class=" badge bg-danger"><i
                                        class=" ion ion-close-round"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$departments->links('paginate')}}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- Modal edit Department -->
    @can('edit-department')
        <div class="modal fade" id="showDepartmentEdit" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{route('edit-department')}}" method="POST">
                            @csrf
                            <label class="label" for="name">نام زیرمجموعه</label>
                            <div class="input-group mb-4">
                                <input id="name" type="text" class="form-control" placeholder="نام زیرمجموعه" name="label"
                                       @if($check)value="{{\App\Models\Department::find($check)->label}}"@endif>
                                <input type="range" name="id" value="{{$check}}" style="display: none;">
                            </div>
                            <div class="row justify-content-center " style="border-top: 1px solid #e9ecef;">
                                <!-- /.col -->
                                <div class="col-10 mt-2">
                                    <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">{{__('ویرایش زیرمجموعه')}}</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan

</div>
