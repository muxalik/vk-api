<?php

namespace App\Models;

use App\Enums\ImportantQualities;
use App\Enums\PersonalPriorities;
use App\Enums\PersonalViews;
use App\Enums\PoliticalViews;
use App\Enums\Religions;
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
        'political_views' => PoliticalViews::class,
        'religion' => Religions::class,
        'personal_priority' => PersonalPriorities::class,
        'important_in_others' => ImportantQualities::class,
        'smoking' => PersonalViews::class,
        'alcohol' => PersonalViews::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
