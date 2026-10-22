<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('card_taps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nfc_card_id')->constrained('nfc_cards')->cascadeOnDelete();
            $table->string('ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('tapped_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_taps');
    }
};