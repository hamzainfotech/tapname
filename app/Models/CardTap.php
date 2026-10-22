<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardTap extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nfc_card_id',
        'ip',
        'user_agent',
        'tapped_at',
    ];

    protected $casts = [
        'tapped_at' => 'datetime',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(NfcCard::class, 'nfc_card_id');
    }
}