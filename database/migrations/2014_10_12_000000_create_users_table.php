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
            $table->string('member_id', 10)->primary();
            $table->string('staff_id', 5)->nullable();
            $table->set('title', ['Mr.', 'Mrs.', 'Dr.', 'Prof.', 'Ing.'])->default('Mr.')->nullable();
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->string('other_names', 50)->nullable();
            $table->string('email')->unique();
            $table->string('phonenumber', 10)->nullable();
            $table->string('alt_phonenumber', 10)->nullable();
            $table->string('department')->nullable();
            $table->date('date_of_birth')->nullable();
//            $table->string('dept_position')->nullable();
            $table->date('date_joined')->nullable();
            $table->set('ignited_profile', ['yes', 'no'])->default('no');
            $table->set('ignited_children', ['yes', 'no'])->default('no');
            $table->set('ignited_spouse', ['yes', 'no'])->default('no');
            $table->set('ignited_parents', ['yes', 'no'])->default('no');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

//        DB::table('users')->insert([
//            'staff_id' => '0001',
//            'firstname' => 'Andy',
//            'lastname' => 'Martin',
//            'email' => 'martinandy349@gmail.com',
//            'phonenumber' => '0541173963',
//            'department' => 'dcsit',
//            'date_joined' => now(),
//            'password' => Hash::make('password1')
//        ]);
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
