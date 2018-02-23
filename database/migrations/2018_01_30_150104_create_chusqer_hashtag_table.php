<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChusqerHashtagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chusqer_hashtag', function (Blueprint $table) {
            // Definimos los campos
            $table->integer('chusqer_id')->unsigned();
            $table->integer('hashtag_id')->unsigned();

            // Definimos la clave principal
            $table->primary(['chusqer_id', 'hashtag_id']);

            // Definimos las claves foráneas
            $table->foreign('chusqer_id')->references('id')->on('chusqers')->onDelete('cascade');
            $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chusqer_hashtag');
    }
}
