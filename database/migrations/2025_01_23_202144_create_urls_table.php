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
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('short_url');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('clicks')->default(0); // Number of clicks
            $table->boolean('active')->default(true); // If the URL is active or not
            $table->string('password')->nullable(); // Password to access the URL
            $table->string('description')->nullable(); // Description of the URL
            $table->string('title')->nullable(); // Title of the URL
            $table->string('image')->nullable(); // URL to image
            $table->string('type')->nullable(); // video, article, etc.
            $table->timestamp('last_clicked_at')->nullable(); // Last time the URL was clicked
            $table->timestamp('expires_at')->nullable(); // Date to expire the URL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
