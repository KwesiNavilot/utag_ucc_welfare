<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->string('parent_id', 10)->primary();
            $table->string('member_id', 10);
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->set('relation', ['father', 'mother'])->nullable();
            $table->set('gender', ['male', 'female']);
            $table->set('status', ['alive', 'deceased']);
            $table->string('phonenumber', 10)->nullable();
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
        Schema::dropIfExists('parents');
    }
}
