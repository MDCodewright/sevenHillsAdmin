<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDocumentsExpiryDatesTable extends Migration
{
    public function up()
    {
        Schema::table('documents_expiry_dates', function (Blueprint $table) {
            $table->unsignedInteger('owner_id');

            $table->foreign('owner_id', 'owner_fk_691110')->references('id')->on('users');
        });
    }
}
