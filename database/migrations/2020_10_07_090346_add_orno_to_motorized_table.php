<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrnoToMotorizedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motorized', function (Blueprint $table) {
            //
            $table->string('or_no')->nullable()->after('signed_form');
            $table->date('date_or')->nullable()->after('or_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motorized', function (Blueprint $table) {
            //
        });
    }
}
