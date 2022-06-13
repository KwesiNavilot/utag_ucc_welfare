<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spouse', function (Blueprint $table) {
            $table->string('spouse_id', 5)->primary();
            $table->string('member_id', 10);
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->set('gender', ['male', 'female']);
            $table->set('status', ['alive', 'deceased']);
            $table->string('phonenumber', 10);
            $table->string('alt_phonenumber', 10)->nullable();
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
        Schema::dropIfExists('spouse');
    }
}
