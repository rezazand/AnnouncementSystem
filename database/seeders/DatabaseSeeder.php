<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Reply;
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
         User::factory(10)->create();
         Message::factory(15)->create();
         Reply::factory(4)->create();
    }
}
