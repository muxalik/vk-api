<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Devices;
use App\Enums\FamilyMembers;
use App\Enums\Genders;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar_id',
        'first_name',
        'last_name',
        'gender',
        'nickname',
        'status',
        'is_online',
        'device',
        'last_online_at',
        'birthday',
        'email',
        'city_id',
        'home_id',
        'alt_phone',
        'skype',
        'website',
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
        'gender' => Genders::class,
        'is_online' => 'bool',
        'device' => Devices::class,
        'last_online_at' => 'datetime',
        'birthday' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function (self $user) {
            if ($user->isDirty('password')) {
                $user->attributes['password'] = bcrypt($user->password);
            }
        });
    }

    public function avatar(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function home(): HasOne
    {
        return $this->hasOne(Place::class, 'home_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

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
            ->wherePivot('type', FamilyMembers::GRANDPARENTS)
            ->orderByPivot('created_at');
    }

    public function parents(): BelongsToMany
    {
        return $this->familyMembers()
            ->wherePivot('type', FamilyMembers::PARENTS)
            ->orderByPivot('created_at');
    }

    public function siblings(): BelongsToMany
    {
        return $this->familyMembers()
            ->wherePivot('type', FamilyMembers::SIBLINGS)
            ->orderByPivot('created_at');
    }

    public function children(): BelongsToMany
    {
        return $this->familyMembers()
            ->wherePivot('type', FamilyMembers::CHILDREN)
            ->orderByPivot('created_at');
    }

    public function grandchildren(): BelongsToMany
    {
        return $this->familyMembers()
            ->wherePivot('type', FamilyMembers::GRANDCHILDREN)
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

    public function stickerPacks(): BelongsToMany
    {
        return $this->belongsToMany(StickerPack::class)
            ->withTimestamps();
    }

    public function gifts(): HasMany
    {
        return $this->hasMany(SentGift::class, 'recipient_id');
    }

    public function sentGifts(): HasMany
    {
        return $this->hasMany(SentGift::class, 'sender_id');
    }

    public function getRouteKeyName(): string
    {
        return 'nickname';
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name + ' ' + $this->last_name;
    }
}
