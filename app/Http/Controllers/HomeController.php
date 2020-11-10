<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\CreditCard;
use App\Models\Transaction;
use App\Models\User;
use http\Client\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $transaction;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->middleware('auth');
        $this->transaction = $transaction;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        $bank_information = $this->transaction->bankInformation(Auth::id());
        return view('dashboard.dashboard', compact('users', 'bank_information'));
    }

    public function paymentIndex($transaction)
    {
        $payment = true;
        $users = User::all();
        $bank_information = $this->transaction->bankInformation(Auth::id());
        $user_to = User::where('id', $transaction->user_to_id)->first();
        $user_from = User::where('id', $transaction->user_id)->first();
        $credit_card = CreditCard::where('id', $transaction->credit_card_id)->first();
        return view('dashboard.dashboard', compact('users', 'bank_information', 'payment', 'transaction',
            'user_to', 'user_from', 'credit_card'));
    }
}
