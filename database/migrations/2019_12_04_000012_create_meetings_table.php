<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->time('time');

            $table->date('date');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
