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
        Schema::create('musicvideo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('album_id')->nullable();
            $table->unsignedBigInteger('artist_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->string('icons')->nullable();
            $table->string('type')->nullable();
            $table->string('url')->nullable();
            $table->string('status')->nullable();

            $table->foreign('album_id')->references('id')->on('albums')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('artist_id')->references('id')->on('artists')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('languages')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicvideo');
    }
};
