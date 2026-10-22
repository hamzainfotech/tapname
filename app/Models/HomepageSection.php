<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HomepageSection extends Model
{
    protected $fillable = [
        'key', 'type', 'title', 'subtitle', 'body', 'image_path',
        'button_text', 'button_url', 'data', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'data' => 'array',
        'is_active' => 'boolean',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(HomepageItem::class)->orderBy('sort_order');
    }

    public function activeItems()
    {
        return $this->items()->where('is_active', true);
    }
}