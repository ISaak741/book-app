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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('genre',['Anime', 'Histoire', 'Romane', 'Horor','Enfant']);
            $table->enum('language', ['ar', 'en', 'fr', 'esp']);
            $table->longText('description');
            $table->string('file');
            $table->string('picture');
            $table->integer('writer_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
