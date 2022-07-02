<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->integer('PNumber')->unique();
            $table->string('password');
            $table->integer('role_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement(
            'ALTER TABLE users ADD FULLTEXT fulltext_index(name, email)'
        );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('departments');

    }
}
