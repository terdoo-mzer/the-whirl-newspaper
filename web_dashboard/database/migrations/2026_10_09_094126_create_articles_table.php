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
     Schema::create('articles', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('author_id');
    $table->unsignedBigInteger('category_id');
    $table->uuid('reviewed_by')->nullable();
    $table->uuid('published_by')->nullable();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('excerpt');
    $table->longText('body');
    $table->string('featured_image');
    $table->enum('content_type', ['free', 'premium']);
    $table->enum('status', ['draft', 'in_review', 'published', 'rejected', 'archived'])->default('draft');
    $table->dateTime('reviewed_at')->nullable();
    $table->text('rejection_reason')->nullable();
    $table->dateTime('published_at')->nullable();
    $table->timestamps();

    $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('set null');
    $table->foreign('published_by')->references('id')->on('users')->onDelete('set null');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
