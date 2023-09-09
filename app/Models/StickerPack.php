<?php

namespace App\Models;

use App\Enums\Currencies;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StickerPack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_id',
        'price',
        'currency',
        'condition',
    ];

    protected $casts = [
        'currency' => Currencies::class,
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }
}
