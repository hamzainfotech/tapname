<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardLead extends Model
{
    protected $fillable = [
        'nfc_card_id',
        'name',
        'email',
        'phone',
        'message',
        'ip',
        'user_agent',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(NfcCard::class, 'nfc_card_id');
    }
}