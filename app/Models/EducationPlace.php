<?php

namespace App\Models;

use App\Enums\EducationTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EducationPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'city_id',
    ];

    protected $casts = [
        'type' => EducationTypes::class,
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function faculties(): BelongsToMany
    {
        return $this->belongsToMany(Faculty::class)->withTimestamps();
    }
}
