<?php

namespace App\Models;

use App\Enums\Currencies;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'sticker_pack_id',
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

    public function stickerPack(): BelongsTo
    {
        return $this->belongsTo(StickerPack::class);
    }
}
