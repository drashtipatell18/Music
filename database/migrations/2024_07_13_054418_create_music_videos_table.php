<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('music_videos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('artist_name');
            $table->string('album_name');
            $table->string('category');
            $table->string('language');
            $table->string('icons');
            $table->string('type');
            $table->string('url');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music_videos');
    }
};
