<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nfc_card_id',
        'display_name',
        'job_title',
        'company',
        'bio',
        'phone',
        'email',
        'website',
        'avatar_path',
        'google_review_url',
        'theme',
        'links',
        'lead_heading',
        'lead_subheading',
        'social_instagram',
        'social_facebook',
        'social_x',
        'social_linkedin',
        'social_tiktok',
        'social_youtube',
    ];

    protected $casts = [
        'links' => 'array',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(NfcCard::class, 'nfc_card_id');
    }
}