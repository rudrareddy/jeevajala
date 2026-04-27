<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_id', 'user_id', 'type', 'category', 
        'amount', 'balance_after', 'description', 'reference_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}