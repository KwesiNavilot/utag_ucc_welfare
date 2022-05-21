<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->set('status', ['Pending', 'Under Review', 'Reviewed', 'Approved'])
                ->default('Pending')
                ->after('request_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('requests', 'status')) {
            Schema::table('request', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
}
