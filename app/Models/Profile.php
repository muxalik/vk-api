<?php

namespace App\Models;

use App\Enums\Relationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'hometown',
        'cover',
        'brief_info',
        'relationship',
        'user_id',
    ];

    protected $casts = [
        'relationship' => Relationships::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cover(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
