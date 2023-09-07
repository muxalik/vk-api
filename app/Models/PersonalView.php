<?php

namespace App\Models;

use App\Enums\ImportantQuality;
use App\Enums\PersonalPriority;
use App\Enums\PersonalView as EnumsPersonalView;
use App\Enums\PoliticalView;
use App\Enums\ReligionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'political_views',
        'religion',
        'personal_priority',
        'important_in_others',
        'smoking',
        'alcohol',
        'inspired_by',
    ];

    protected $casts = [
        'political_views' => PoliticalView::class,
        'religion' => ReligionType::class,
        'personal_priority' => PersonalPriority::class,
        'important_in_others' => ImportantQuality::class,
        'smoking' => EnumsPersonalView::class,
        'alcohol' => EnumsPersonalView::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
