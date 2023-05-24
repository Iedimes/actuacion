<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impressions', function (Blueprint $table) {
            $table->id();
            $table->integer('doc_id');
            $table->foreign('doc_id')->references('id')->on('documents');
            $table->integer('cli_id');
            $table->foreign('cli_id')->references('id')->on('customers');
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
        Schema::dropIfExists('impressions');
    }
}
