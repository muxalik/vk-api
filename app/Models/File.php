<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
    ];

    public function getFullPathAttribute(): string 
    {
        return public_path('storage/' . $this->path . '/' . $this->name);
    }

    public function createFake(): void 
    {
        
    }
}
