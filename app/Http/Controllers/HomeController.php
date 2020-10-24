<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\CreditCard;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        $account = Account::where('user_id', Auth::id())->first();
        $payments = Transaction::where('user_from_id', Auth::id())->sum('transaction_value');
        $received = Transaction::where('user_to_id', Auth::id())->sum('transaction_value');
        $balance = $received - $payments;
        $credit_cards = CreditCard::where('user_id', Auth::id())->get();
        return view('dashboard', compact('users', 'account', 'balance', 'payments', 'received', 'credit_cards'));
    }
}
