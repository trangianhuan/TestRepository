<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('hisNo');
            $table->integer('hisNum');
            $table->integer('tickedNo')->unsigned();
            $table->string('memberUpdate');
            $table->text('contentUpdate');
            $table->timestamps();
            //$table->foreign('memberUpdate')->references('memberNo')->on('Member');
        });
        Schema::table('histories', function (Blueprint $table) {
            $table->foreign('memberUpdate')->references('memberNo')->on('Members');
            $table->foreign('tickedNo')->references('tickedNo')->on('tickeds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
