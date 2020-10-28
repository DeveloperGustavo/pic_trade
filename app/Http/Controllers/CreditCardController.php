<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditCardRequest;
use App\Models\CreditCard;
use App\Models\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditCardController extends Controller
{

    protected $transaction;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = CreditCard::where('user_id', Auth::id())->get();
        return view('credit_card.list', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank_information = $this->transaction->bankInformation(Auth::id());
        return view('credit_card.create', compact('bank_information'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreditCardRequest $request)
    {
        try
        {
            $request->merge([
                'user_id'   => Auth::id()
            ]);
            CreditCard::create($request->all());
            Toastr::success('Cartão criado com sucesso!', 'Parabéns!');
            return redirect()->route('home');
        }
        catch (\Exception $e)
        {
            Toastr::error('Erro ao tentar cadastrar cartão de crédito!' . $e->getMessage(), 'Ops!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreditCard  $creditCard
     * @return \Illuminate\Http\Response
     */
    public function show(CreditCard $creditCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreditCard  $creditCard
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditCard $creditCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreditCard  $creditCard
     * @return \Illuminate\Http\Response
     */
    public function update(CreditCardRequest $request, CreditCard $creditCard)
    {
        try
        {
            $request->merge([
                'user_id'   => Auth::id()
            ]);
            $creditCard->update($request->all());
            Toastr::success('Cartão alterado com sucesso!', 'Parabéns!');
            return redirect()->route('credit_card.index');
        }
        catch (\Exception $e)
        {
            Toastr::error('Erro ao tentar alterar cartão de crédito!' . $e->getMessage(), 'Ops!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreditCard  $creditCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditCard $creditCard)
    {
        try
        {
            $creditCard->delete();
            Toastr::success('Cartão excluído com sucesso!', 'Parabéns!');
            return redirect()->route('credit_card.index');
        }
        catch (\Exception $e)
        {
            Toastr::error('Erro ao tentar excluir cartão de crédito!' . $e->getMessage(), 'Ops!');
            return back();
        }
    }
}
