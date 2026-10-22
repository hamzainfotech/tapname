<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nfc_cards', function (Blueprint $table) {
            $table->boolean('leads_enabled')->default(true)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('nfc_cards', function (Blueprint $table) {
            $table->dropColumn('leads_enabled');
        });
    }
};