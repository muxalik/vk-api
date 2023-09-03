<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function studyPrograms(): BelongsToMany
    {
        return $this->belongsToMany(StudyProgram::class)->withTimestamps();
    }

    public function educationPlaces(): BelongsToMany
    {
        return $this->belongsToMany(EducationPlace::class)->withTimestamps();
    }
}
