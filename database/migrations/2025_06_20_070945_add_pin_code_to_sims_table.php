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
        Schema::table('sims', function (Blueprint $table) {
            // Add a nullable column to store the SIM's transaction PIN
            // We make it nullable because some SIMs might not have a PIN
            $table->string('pin_code')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sims', function (Blueprint $table) {
            $table->dropColumn('pin_code');
        });
    }
};
