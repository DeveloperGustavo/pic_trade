<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\CreditCard;
use App\Models\Transaction;
use App\Models\User;
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
        return view('dashboard', compact('users', 'bank_information'));
    }
}
