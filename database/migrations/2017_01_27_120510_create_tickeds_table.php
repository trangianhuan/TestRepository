<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTickedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickeds', function (Blueprint $table) {
            $table->increments('tickedNo');
            $table->string('subject');
            $table->integer('statusNo')->unsigned();
            $table->integer('trackerNo')->unsigned();// bug1 bug2 QA
            $table->string('priority');
            $table->string('assigneMemberNo');
            $table->string('author');
            $table->dateTime('startDate');
            $table->dateTime('dueDate');
            $table->text('descript');
            $table->timestamps();
            //$table->foreign('statusNo')->references('typeNo')->on('TypeProperties');
            //$table->foreign('assigneMemberNo')->references('memberNo')->on('Member');
        });
        Schema::table('tickeds', function (Blueprint $table) {
            $table->foreign('assigneMemberNo')->references('memberNo')->on('Members');
            $table->foreign('trackerNo')->references('trackerNo')->on('Trackers');
            $table->foreign('author')->references('memberNo')->on('Members');
            $table->foreign('statusNo')->references('statusNo')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickeds');
    }
}
