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
            $table->string('staff_id')->primary();
            $table->set('title', ['Mr.', 'Mrs.', 'Dr.', 'Prof.', 'Ing.'])->default('Mr.');
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->string('email')->unique();
            $table->string('phonenumber', 10);
            $table->string('department');
            $table->string('position')->nullable();
            $table->date('date_joined');
            $table->set('ignited', ['yes', 'no'])->default('no');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
