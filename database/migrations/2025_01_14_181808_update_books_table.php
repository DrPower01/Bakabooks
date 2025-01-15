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
        Schema::table('books', function (Blueprint $table) {
            $table->string('Title')->nullable()->change();
            $table->string('Author')->nullable()->change();
            $table->string('Publisher')->nullable()->change();
            $table->string('Year')->nullable()->change();
            $table->string('Genre')->nullable()->change();
            $table->string('Status')->default('available')->change();
            $table->string('Language')->nullable()->change();
            $table->string('Pages')->nullable()->change();
            $table->integer('Quantity')->default(0)->change();
            $table->string('Description')->nullable()->change();
            $table->string('Image')->nullable()->change();
            $table->integer('Views')->default(0)->change();
            $table->integer('Likes')->default(0)->change();
            $table->string('Library'); // Add Library field
            $table->unique(['Library', 'ISBN']); // Add unique constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropUnique(['Library', 'ISBN']); // Drop unique constraint
            $table->dropColumn('Library'); // Drop Library field
            $table->string('Title')->nullable(false)->change();
            $table->string('Author')->nullable(false)->change();
            $table->string('Publisher')->nullable(false)->change();
            $table->string('Year')->nullable(false)->change();
            $table->string('Genre')->nullable(false)->change();
            $table->string('Status')->default(null)->change();
            $table->string('Language')->nullable(false)->change();
            $table->string('Pages')->nullable(false)->change();
            $table->integer('Quantity')->default(null)->change();
            $table->string('Description')->nullable(false)->change();
            $table->string('Image')->nullable(false)->change();
            $table->integer('Views')->default(null)->change();
            $table->integer('Likes')->default(null)->change();
        });
    }
};