<?php

namespace App\Models;

use App\Enums\FamilyMembers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'family_member_id',
        'name',
        'type',
    ];

    protected $casts = [
        'type' => FamilyMembers::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function familyMember(): BelongsTo
    {
        return $this->belongsTo(User::class, 'family_member_id');
    }
}
