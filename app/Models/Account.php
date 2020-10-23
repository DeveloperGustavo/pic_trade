<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency',
        'account_number',
        'account_dg',
        'balance',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
