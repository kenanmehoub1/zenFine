<?php
// database/migrations/2024_01_01_000000_create_videos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان الفيديو
            $table->string('youtube_url'); // رابط اليوتيوب
            $table->string('youtube_id')->nullable(); // معرف الفيديو من اليوتيوب
            $table->integer('order')->default(0); // ترتيب الفيديو
            $table->boolean('is_active')->default(true); // حالة الفيديو
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('videos');
    }
}