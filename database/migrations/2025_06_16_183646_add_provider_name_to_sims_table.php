<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('sims', function (Blueprint $table) {
            // Add the new column to store the real network name
            $table->string('provider_name')->nullable()->after('name');
        });
    }

    public function down(): void {
        Schema::table('sims', function (Blueprint $table) {
            $table->dropColumn('provider_name');
        });
    }
};
