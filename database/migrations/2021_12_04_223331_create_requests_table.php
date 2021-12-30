<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->string('request_id', 17)->primary();
            $table->string('staff_id', 10);
            $table->set('request_type', ['Child Birth', 'Death of Parent', 'Death of Spouse']);
            $table->date('child_dob')->nullable();
            $table->string('child_name', 60)->nullable();
            $table->date('funeral_date')->nullable();
            $table->string('spouse_name', 60)->nullable();
            $table->string('parent_name', 60)->nullable();
            $table->set('relation', ['husband', 'wife', 'father', 'mother'])->nullable();
            $table->set('publish', ['yes', 'no'])->default('no')->nullable();
            $table->string('media');
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
        Schema::dropIfExists('requests');
    }
}
