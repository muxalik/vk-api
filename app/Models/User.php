<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\FamilyMemberType;
use App\Enums\Gender;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'nickname',
        'birthday',
        'email',
        'notification_email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gender' => Gender::class,
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class)->withTimestamps();
    }

    public function familyMembers(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->using(FamilyMember::class);
    }

    public function grandparents(): BelongsToMany
    {
        return $this->familyMembers()
            ->wherePivot('type', FamilyMemberType::GRANDPARENTS)
            ->orderByPivot('created_at');
    }

    public function parents(): BelongsToMany
    {
        return $this->familyMembers()
            ->wherePivot('type', FamilyMemberType::PARENTS)
            ->orderByPivot('created_at');
    }

    public function siblings(): BelongsToMany
    {
        return $this->familyMembers()
            ->wherePivot('type', FamilyMemberType::SIBLINGS)
            ->orderByPivot('created_at');
    }

    public function children(): BelongsToMany
    {
        return $this->familyMembers()
            ->wherePivot('type', FamilyMemberType::CHILDREN)
            ->orderByPivot('created_at');
    }

    public function grandchildren(): BelongsToMany
    {
        return $this->familyMembers()
            ->wherePivot('type', FamilyMemberType::GRANDCHILDREN)
            ->orderByPivot('created_at');
    }

    public function contactInfo(): HasOne
    {
        return $this->hasOne(ContactInfo::class);
    }

    public function interests(): HasMany
    {
        return $this->hasMany(Interest::class);
    }

    public function defaultEducations(): HasMany
    {
        return $this->hasMany(DefaultEducation::class);
    }

    public function higherEducations(): HasMany
    {
        return $this->hasMany(HigherEducation::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id')
            ->withTimestamps();
    }

    public function following(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id')
            ->withTimestamps();
    }

    public function communities(): BelongsToMany
    {
        return $this->belongsToMany(Community::class)
            ->withTimestamps();
    }

    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends')
            ->where(function (Builder $query) {
                $query->where('user_id', $this->id)
                    ->orWhere('friend_id', $this->id);
            });
    }

    public function getRouteKeyName(): string
    {
        return 'nickname';
    }
}
