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
            $table->string('member_id', 10);
            $table->set('request_type', ['Child Birth', 'Death of Parent', 'Death of Spouse', 'Death of Member', 'Retirement']);
            $table->set('status', ['Pending', 'Under Review', 'Reviewed', 'Approved'])->default('Pending');
            $table->string('child_id', 60)->nullable();
            $table->string('spouse_id', 60)->nullable();
            $table->string('parent_id', 60)->nullable();
            $table->date('funeral_date')->nullable();
            $table->date('retirement_date')->nullable();
            $table->set('publish', ['yes', 'no'])->default('no')->nullable();
            $table->set('published', ['yes', 'no'])->default('no');
            $table->string('media')->default("retirements");
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
