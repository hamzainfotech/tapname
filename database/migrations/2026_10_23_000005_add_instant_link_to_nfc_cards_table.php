<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nfc_cards', function (Blueprint $table) {
            $table->boolean('instant_link_enabled')->default(false)->after('leads_enabled');
            $table->string('instant_link_url', 2048)->nullable()->after('instant_link_enabled');
        });
    }

    public function down(): void
    {
        Schema::table('nfc_cards', function (Blueprint $table) {
            $table->dropColumn(['instant_link_enabled', 'instant_link_url']);
        });
    }
};