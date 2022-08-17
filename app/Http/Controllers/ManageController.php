<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isNull;


class ManageController extends Controller
{
    public function index()
    {
        return view('dashboard.manage.manage');
    }

    public function createUser(Request $input)
    {
        Validator::make($input->all(), [
            'name' => ['required', 'string'],
            'department' => [
                'required',
                'string',
            ],
            'role' => ['required', 'string'],
            'personalNumber' => ['required', 'integer'],
            'password' => ['required', 'min:8']
        ])->validateWithBag('manageError');

        $user = new User();
        $user->forceFill([
            'name' => $input->name,
            'PNumber' => $input->personalNumber,
            'password' => bcrypt($input->password),
            'role_id' => $input->role,
            'department_id' => $input->department
        ])->save();
        return redirect()->to(URL::previous() . '#users')->with('message','کاربر مورد نظر با موفقیت ایجاد شد.');
    }

    public function editUser(Request $input)
    {

        Validator::make($input->all(), [
            'name' => ['required', 'string'],
            'id'=>['required','integer'],
            'department' => [
                'required',
                'string',
            ],
            'role' => ['required', 'string'],
            'personalNumber' => ['required', 'integer'],
        ])->validateWithBag('manageError');
        $user = User::find($input->id);
        $user->forceFill([
            'name' => $input->name,
            'PNumber' => $input->personalNumber,
            'role_id' => $input->role,
            'department_id' => $input->department
        ])->save();

        return redirect()->to(URL::previous().'#users')->with('message','کاربر مورد نظر با موفقیت ویرایش شد.');

    }

    public function createRole(Request $input)
    {
        Validator::make($input->all(), [
            'label' => ['required', 'string'],
        ])->validateWithBag('manageError');
        $role = new Role();
        $role->forceFill(['label' => $input->label])->save();
        $role->permissions()->sync($input->permissions);

        return redirect()->to(URL::previous() . '#roles')->with('message','نقش جدید با موفقیت ایجاد شد.');
    }
    public function createDepartment(Request $input)
    {
        Validator::make($input->all(), [
            'label' => ['required', 'string'],
        ])->validateWithBag('manageError');

        $department = new Department();
        $department->forceFill(['label' => $input->label])->save();
        return redirect()->to(URL::previous() . '#departments')->with('message','زیرمجموعه جدید با موفقیت ایجاد شد.');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('message','کاربر مورد نظر با موفقیت حذف شد.');
    }

    public function deleteRole(Role $role)
    {
        $role->delete();
        return redirect()->to(URL::previous() . '#roles')->with('message','نقش مورد نظر با موفقیت حذف شد.');
    }

    public function deleteDepartment(Department $department)
    {
        $department->delete();
        return redirect()->to(URL::previous() . '#departments')->with('message','زیرمجموعه مورد نظر با موفقیت حذف شد.');
    }

    public function editRole(Request $input)
    {
        Validator::make($input->all(), [
            'id' => ['required', 'integer'],
            'label' => ['required', 'string'],
            'permissions' => ['array']
        ])->validateWithBag('manageError');

        $role = Role::find($input->id);

        if ($role->label != $input->label) {
            $role->forceFill(['label' => $input->label,])->save();
        }
        $role->permissions()->sync($input->permissions);

        return redirect()->to(URL::previous() . '#roles')->with('message','نقش مورد نظر با موفقیت حذف شد.');
    }

    public function editDepartment(Request $input)
    {

        Validator::make($input->all(),[
            'label'=>['required','string'],
            'id'=>['required','integer']
        ])->validateWithBag('manageError');

        $department = Department::find($input->id);
        if ($department->label != $input->label){
            $department->forceFill(['label'=>$input->label])->save();
        }
        return redirect()->to(URL::previous() . '#departments')->with('message','زیرمجموعه مورد نظر با موفقیت ویرایش شد.');
    }

}
