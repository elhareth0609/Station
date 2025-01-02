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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('driver_id')->constrained('users')->onDelete('cascade');

            // Pickup details
            $table->string('place_pickup');
            $table->decimal('longitude_pickup', 10, 7);
            $table->decimal('latitude_pickup', 10, 7);
            $table->timestamp('pickup_at')->nullable();

            // Delivery details
            $table->string('place_delivery');
            $table->decimal('longitude_delivery', 10, 7);
            $table->decimal('latitude_delivery', 10, 7);
            $table->timestamp('delivered_at')->nullable();

            // Contact details
            $table->string('sender_phone');
            $table->string('receiver_phone');

            // Order details
            $table->decimal('amount', 10, 2);
            $table->string('image')->nullable();
            $table->decimal('distance', 10, 2);
            $table->decimal('driver_distance', 10, 2);
            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
