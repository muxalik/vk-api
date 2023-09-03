<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HigherEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'education_place_id',
        'faculty_id',
        'study_program_id',
        'graduation_year',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function educationPlace(): BelongsTo
    {
        return $this->belongsTo(EducationPlace::class);
    }

    
}
