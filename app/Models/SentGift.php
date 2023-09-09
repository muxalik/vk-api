<?php

namespace App\Models;

use App\Enums\Currencies;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SentGift extends Model
{
    use HasFactory;

    protected $fillable = [
        'gift_id',
        'recipient_id',
        'sender_id',
        'message',
        'is_private',
        'price',
        'currency',
    ];

    protected $casts = [
        'is_private' => 'bool',
        'currency' => Currencies::class,
    ];

    public function gift(): BelongsTo
    {
        return $this->belongsTo(Gift::class);
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
