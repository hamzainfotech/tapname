<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('display_name')->nullable()->after('name');
            $table->string('job_title')->nullable()->after('email');
            $table->string('company')->nullable()->after('job_title');
            $table->text('bio')->nullable()->after('company');
            $table->string('phone', 50)->nullable()->after('bio');
            $table->string('website')->nullable()->after('phone');
            $table->string('google_review_url', 2048)->nullable()->after('website');
            $table->string('theme')->default('default')->after('google_review_url');
            $table->json('links')->nullable()->after('theme');
            $table->string('avatar_path')->nullable()->after('links');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'display_name', 'job_title', 'company', 'bio', 'phone',
                'website', 'google_review_url', 'theme', 'links', 'avatar_path',
            ]);
        });
    }
};