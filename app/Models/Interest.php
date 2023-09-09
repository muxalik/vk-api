<?php

namespace App\Models;

use App\Enums\InterestTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interest extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'content',
        'user_id',
    ];

    protected $casts = [
        'type' => InterestTypes::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
