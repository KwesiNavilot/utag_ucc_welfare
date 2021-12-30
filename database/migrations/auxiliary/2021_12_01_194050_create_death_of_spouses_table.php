<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathOfSpousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('death_of_spouses', function (Blueprint $table) {
            $table->string('request_id', 17)->primary();
            $table->string('staff_id', 10);
            $table->date('funeral_date');
            $table->string('spouse_name', 60);
            $table->set('relation', ['husband', 'wife'])->nullable();
            $table->set('publish', ['yes', 'no'])->default('no');
            $table->string('poster');
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
        Schema::dropIfExists('death_of_spouses');
    }
}
