<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $table->string('staff_id')->primary();
            $table->set('title', ['Mr.', 'Mrs.', 'Dr.', 'Prof.', 'Ing.'])->default('Mr.');
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->string('email')->unique();
            $table->string('phonenumber', 10);
            $table->string('department');
            $table->date('date_of_birth')->nullable();
            $table->string('position')->nullable();
            $table->date('date_joined');
            $table->set('ignited', ['yes', 'no'])->default('no');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'staff_id' => '00000001',
            'firstname' => 'Andy',
            'lastname' => 'Martin',
            'email' => 'martinandy349@gmail.com',
            'phonenumber' => '0541173963',
            'department' => 'dcsit',
            'date_joined' => now(),
            'password' => Hash::make('password1')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
