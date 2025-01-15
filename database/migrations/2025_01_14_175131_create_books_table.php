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
            $table->string('ISBN');
            $table->string('Library');
            $table->string('Title');
            $table->string('Author');
            $table->string('Publisher');
            $table->string('Year');
            $table->string('Genre');
            $table->string('Status');
            $table->string('Language');
            $table->string('Pages');
            $table->integer('Quantity');
            $table->string('Description');
            $table->string('Image');
            $table->integer('Views');
            $table->integer('Likes');
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
