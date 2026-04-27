<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditRequest extends Model
{
    use HasFactory;

    protected $fillable = ['request_id','user_id','request_type','amount','reason','status','admin_id','admin_notes','processed_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
