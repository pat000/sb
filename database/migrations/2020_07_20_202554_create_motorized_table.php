<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorizedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorized', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('case_no');
            $table->string('operator_name');
            $table->text('address');
            $table->string('motor_name');
            $table->string('motor_no');
            $table->string('motor_chassic');
            $table->string('plate_number');
            $table->date('date_issued');
            $table->string('vice_mayor');
            $table->integer('age');
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
       
        Schema::dropIfExists('legalizations');
        
    }
}
