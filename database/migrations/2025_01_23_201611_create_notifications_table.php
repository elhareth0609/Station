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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the notification
            $table->text('content'); // Content of the notification
            $table->string('type'); // info, warning, error, success
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('read_at')->nullable(); // Date the notification was read
            $table->string('url')->nullable(); // URL to redirect
            $table->string('icon')->nullable(); // Icon of the notification
            $table->string('image')->nullable(); // Image of the notification
            $table->boolean('active')->default(true); // If the notification is active or not
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
