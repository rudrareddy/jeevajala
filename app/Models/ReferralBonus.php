<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralBonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'referrer_id', 'referred_id', 'bonus_amount', 'status', 'credited_at','request_id'
    ];

    protected $casts = [
        'credited_at' => 'datetime',
    ];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'user_id');
    }

    public function referred()
    {
        return $this->belongsTo(User::class, 'referred_id', 'user_id');
    }
}
