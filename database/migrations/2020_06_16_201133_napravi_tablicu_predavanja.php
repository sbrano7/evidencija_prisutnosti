<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NapraviTablicuPredavanja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predavanja', function (Blueprint $table) {
            $table->id();
            $table->string('naziv', 100);
            $table->text('opis')->nullable();
            $table->dateTime('vrijeme');
            $table->bigInteger('kolegij_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('kolegij_id')->references('id')->on('kolegiji');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predavanja');
    }
}
