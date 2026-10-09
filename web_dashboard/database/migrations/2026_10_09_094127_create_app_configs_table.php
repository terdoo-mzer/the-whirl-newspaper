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
       Schema::create('app_config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tagline');
            $table->text('description');
            $table->string('logo_url');
            $table->string('favicon_url')->nullable();
            $table->string('primary_color');
            $table->string('secondary_color');
            $table->string('background_color');
            $table->string('text_color');
            $table->string('heading_font');
            $table->string('body_font');
            $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_config');
    }
};
