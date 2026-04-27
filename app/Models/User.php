<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'parent_id',
        'referral_code',
        'uuid',
        'phone',
        'username',
        'gender',
        'dob',
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
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user','role_id','user_id');
    }

    public function address()
    {
        return $this->hasOne(UserAddress::class);
    }

    public function bankAccounts()
    {
        return $this->hasOne(BankAccounts::class);
    }

    public function documents()
    {
        return $this->hasMany(UserDocuments::class);
    }

    public function getDocumentByType($type)
    {
        return $this->documents->firstWhere('document_type', $type);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id');
    }

    public function creditRequests()
    {
        return $this->hasMany(CreditRequest::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function referralBonuses()
    {
        return $this->hasMany(ReferralBonus::class, 'referrer_id', 'user_id');
    }
}
