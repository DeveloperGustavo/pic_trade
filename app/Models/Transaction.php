<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            'transaction_value',
            'credit_card_id',
            'user_to_id',
            'user_id'
        ];

    public function extractVerify($user_id): int
    {
        $payments = Transaction::where('user_id', $user_id)->sum('transaction_value');
        $received = Transaction::where('user_to_id', $user_id)->sum('transaction_value');
        return $balance = $received - $payments;
    }

    public function bankInformation($user_id)
    {

        $account = Account::where('user_id', $user_id)->first();
        $payments = Transaction::where('user_id', $user_id)->sum('transaction_value');
        $received = Transaction::where('user_to_id', $user_id)->sum('transaction_value');
        $balance = $received - $payments;
        $credit_cards = (array) CreditCard::where('user_id', $user_id)->get();
        $transactions = (array) Transaction::where('transactions.user_id', $user_id)
                                    ->leftJoin('credit_cards as cc', 'cc.id', '=', 'transactions.credit_card_id')
                                    ->leftJoin('users as u', 'u.id', '=', 'transactions.user_id')
                                    ->get();
        return compact('account', 'payments', 'received', 'balance', 'credit_cards', 'transactions');
    }

    public function creditCard()
    {
        $this->hasOne(CreditCard::class);
    }

    public function user()
    {
        $this->hasOne(User::class);
    }
}
