<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sticker extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'sticker_pack_id',
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
