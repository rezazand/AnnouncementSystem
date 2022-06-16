<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Reply;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(3)->create();
         User::factory(10)->create();
         Message::factory(100)->create();
         Reply::factory(123)->create();
    }
}
