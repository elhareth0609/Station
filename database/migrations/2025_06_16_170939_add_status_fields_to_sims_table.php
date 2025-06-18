<?php

// In the new migration file
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sims', function (Blueprint $table) {
            $table->string('connection_status')->nullable()->after('status');
            $table->string('network_type')->nullable()->after('connection_status');
            $table->string('signal_strength')->nullable()->after('network_type');
            $table->integer('unread_messages')->default(0)->after('signal_strength');
            $table->timestamp('last_seen_at')->nullable()->after('updated_at');
        });
    }

    public function down(): void
    {
        Schema::table('sims', function (Blueprint $table) {
            $table->dropColumn(['connection_status', 'network_type', 'signal_strength', 'unread_messages', 'last_seen_at']);
        });
    }
};
