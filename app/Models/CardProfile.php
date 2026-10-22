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
    ];

    protected $casts = [
        'links' => 'array',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(NfcCard::class, 'nfc_card_id');
    }
}