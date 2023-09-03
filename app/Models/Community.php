<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'description',
        'website',
    ];

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'community_contact', 'community_id', 'contact_id')
            ->withTimestamps();
    }

    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Place::class, 'community_address', 'community_id', 'place_id');
    }
}
