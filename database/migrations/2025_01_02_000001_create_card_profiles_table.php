<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('card_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nfc_card_id')->constrained('nfc_cards')->cascadeOnDelete()->unique();
            $table->string('display_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->text('bio')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('avatar_path')->nullable();
            $table->string('google_review_url', 2048)->nullable();
            $table->string('theme')->default('default');
            $table->json('links')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_profiles');
    }
};