<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('card_profiles', function (Blueprint $table) {
            $table->string('lead_heading')->nullable()->after('links');
            $table->string('lead_subheading')->nullable()->after('lead_heading');
            $table->string('social_instagram')->nullable()->after('lead_subheading');
            $table->string('social_facebook')->nullable()->after('social_instagram');
            $table->string('social_x')->nullable()->after('social_facebook');
            $table->string('social_linkedin')->nullable()->after('social_x');
            $table->string('social_tiktok')->nullable()->after('social_linkedin');
            $table->string('social_youtube')->nullable()->after('social_tiktok');
        });
    }

    public function down(): void
    {
        Schema::table('card_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'lead_heading', 'lead_subheading',
                'social_instagram', 'social_facebook', 'social_x',
                'social_linkedin', 'social_tiktok', 'social_youtube',
            ]);
        });
    }
};