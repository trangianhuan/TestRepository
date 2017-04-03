<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('tempNo');
            $table->integer('trackerNo')->unsigned();
            $table->string('subject');
            $table->text('descript');
            $table->timestamps();
            //$table->foreign('typeNo')->references('typeNo')->on('TypeProperties');
        });
        Schema::table('templates', function (Blueprint $table) {
            
            $table->foreign('trackerNo')->references('trackerNo')->on('Trackers');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
