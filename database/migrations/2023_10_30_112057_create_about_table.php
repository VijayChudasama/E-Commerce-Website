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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title1')->nullable();
            $table->string('description1', 600)->nullable();
            $table->string('image1');

            $table->string('title2')->nullable();
            $table->string('description2', 600)->nullable();
            $table->string('image2');

            $table->string('card_title')->nullable();
            $table->string('card_description', 600)->nullable();
            $table->string('card_image');

            $table->string('card_title1')->nullable();
            $table->string('card_description1')->nullable();
            $table->string('card_image1');

            $table->string('card_title2')->nullable();
            $table->string('card_description2', 600)->nullable();
            $table->string('card_image2');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
