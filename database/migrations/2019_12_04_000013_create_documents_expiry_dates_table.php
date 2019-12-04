<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsExpiryDatesTable extends Migration
{
    public function up()
    {
        Schema::create('documents_expiry_dates', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->unique();

            $table->datetime('expiry_date');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
