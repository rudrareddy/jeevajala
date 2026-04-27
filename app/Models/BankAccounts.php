<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','account_holder_name','bank_name','account_number','ifsc_code','account_type','branch_name'];
}
