<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            'number',
            'expiration_date',
            'cvv',
            'user_id'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
