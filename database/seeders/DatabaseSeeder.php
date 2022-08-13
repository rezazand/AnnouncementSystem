<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Message;
use App\Models\Permission;
use App\Models\Reply;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'admin',
            'label' => 'مدیریت'
        ]);
        DB::table('permissions')->insert([
            'name' => 'create-user',
            'label' => 'ایجاد کاربر'
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete-user',
            'label' => 'حذف کاربر'
        ]);
        DB::table('permissions')->insert([
            'name' => 'edit-user',
            'label' => 'ویرایش کاربر'
        ]);
        DB::table('permissions')->insert([
            'name' => 'create-department',
            'label' => 'ایجاد زیرمجموعه'
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete-department',
            'label' => 'حذف زیرمجموعه'
        ]);
        DB::table('permissions')->insert([
            'name' => 'edit-department',
            'label' => 'ویرایش زیرمجموعه'
        ]);
        DB::table('permissions')->insert([
            'name' => 'create-role',
            'label' => 'ایجاد وظیفه'
        ]);
        DB::table('permissions')->insert([
            'name' => 'edit-role',
            'label' => 'ویرایش وظیفه'
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete-role',
            'label' => 'حذف وظیفه'
        ]);

        $role = Role::factory()->create(['label' => 'مدیر سایت']);

        $role->permissions()->sync(Permission::all());
        DB::table('roles')->insert([
            'label' => 'مدیر'
        ]);
        DB::table('departments')->insert([
            'label' => 'فناوری'
        ]);
        DB::table('departments')->insert([
            'label' => 'حراست'
        ]);
        DB::table('departments')->insert([
            'label' => 'مدیریت'
        ]);
        DB::table('departments')->insert([
            'label' => 'حسابداری'
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role_id' => 1,
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'PNumber' => rand(9000000, 1000000),
            'department_id' => 1,
        ]);

//        Message::factory(100)
//            ->hasReplies(3)
//            ->hasAttached(
//            User::factory()->count(2),
//            new Sequence(
//                ['action','send'],
//                ['action','receive']
//            )
//        )->create();

    }
}
