<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'home_id',
        'alt_phone',
        'skype',
        'website',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function home(): HasOne
    {
        return $this->hasOne(Place::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
