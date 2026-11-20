<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistTracksTable extends Migration
{
    public function up()
    {
        Schema::create('playlist_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->string('artist', 200);
            $table->string('album', 200)->default('');
            $table->integer('duration_seconds')->default(180);
            $table->integer('position')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('playlist_tracks');
    }
}
