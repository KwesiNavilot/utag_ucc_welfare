<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->string('admin_id')->primary();
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->string('email')->unique();
//            $table->set('position', ['President', 'Secretary', 'Treasurer', 'Organizer']);
            $table->string('position', 50);
            $table->string('phonenumber', 10);
            $table->set('role', ['webmaster', 'president', 'secretary', 'executive'])->default('executive');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('admins')->insert([
            'admin_id' => 'AIDXXXXXXX',
            'firstname' => 'Andrews',
            'lastname' => 'Ankomahene',
            'email' => 'andrewskwesiankomahene@gmail.com',
            'position' => 'webmaster',
            'phonenumber' => '0541173963',
            'role' => 'webmaster',
            'password' => Hash::make('God1stnmum')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
