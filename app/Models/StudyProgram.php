<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudyProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'faculty_id',
    ];

    public function faculty(): BelongsToMany
    {
        return $this->belongsToMany(Faculty::class)->withTimestamps();
    }
}
