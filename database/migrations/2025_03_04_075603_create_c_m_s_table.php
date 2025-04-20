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
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();            
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->longText('description')->nullable();
            $table->longText('button_text')->nullable();
            $table->string('button_title_one')->nullable();
            $table->string('button_subtitle_one')->nullable();
            $table->string('button_title_two')->nullable();
            $table->string('button_subtitle_two')->nullable();
            $table->string('button_title_three')->nullable();
            $table->string('button_subtitle_three')->nullable();
            $table->string('explore_title_one')->nullable();
            $table->string('explore_description_one')->nullable();
            $table->string('explore_title_two')->nullable();
            $table->string('explore_description_two')->nullable();
            $table->string('explore_title_three')->nullable();
            $table->string('explore_description_three')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_m_s');
    }
};
