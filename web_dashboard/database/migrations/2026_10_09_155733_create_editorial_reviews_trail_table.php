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
        Schema::create('editorial_reviews_trail', function (Blueprint $table) {
            $table->id();
            $table->uuid('article_id');
            $table->uuid('acted_by');
            $table->enum('article_state', ['draft', 'in_review', 'published', 'rejected', 'archived']);
            $table->longText('actor_comments');
            $table->timestamps();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('acted_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editorial_reviews_trail');
    }
};
