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
        Schema::create('ussds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sim_id');
            $table->string('ussd_code');
            $table->enum('status', ['completed', 'in progress', 'rejected'])->default('in progress');
            $table->timestamps();

            $table->foreign('sim_id')->references('id')->on('sims')->onDelete('cascade'); // Cascade on delete

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ussds');
    }
};
