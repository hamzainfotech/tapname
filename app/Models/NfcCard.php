<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NfcCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'label',
        'is_active',
        'tap_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tap_count' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(CardProfile::class);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(CardLead::class, 'nfc_card_id');
    }

    public function taps(): HasMany
    {
        return $this->hasMany(CardTap::class);
    }

    public static function generateUniqueCode(): string
    {
        do {
            $code = strtolower(\Illuminate\Support\Str::random(6));
        } while (static::where('code', $code)->exists());

        return $code;
    }
}