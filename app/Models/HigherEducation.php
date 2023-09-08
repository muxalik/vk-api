<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HigherEducation extends Model
{
    use HasFactory;

    protected $table = 'higher_educations';

    protected $fillable = [
        'city_id',
        'education_place_id',
        'faculty_id',
        'study_program_id',
        'graduation_year',
        'user_id',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function educationPlace(): BelongsTo
    {
        return $this->belongsTo(EducationPlace::class);
    }    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
