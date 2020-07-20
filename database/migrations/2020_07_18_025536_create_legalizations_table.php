<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legalizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('legalization_number');
            $table->longText('title');
            $table->date('date_approved');
            $table->boolean('status');
            $table->integer('category_id');
            $table->longText('uploaded_file');
            $table->integer('uploaded_by');
            $table->string('sponsor');
            
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
