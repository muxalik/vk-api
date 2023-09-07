<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'district',
        'street',
        'name',
        'house_number',
    ];

    public function contactInfo(): HasOne
    {
        return $this->hasOne(ContactInfo::class, 'home_id');
    }
}
