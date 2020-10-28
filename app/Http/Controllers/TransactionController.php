<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\{Account, Transaction, Transformation};
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct(Transformation $transformation, Transaction $transaction)
    {
        $this->transformation   = $transformation;
        $this->transaction      = $transaction;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extract = $this->transaction->extract(Auth::id());
        return view('pages.extract', compact('extract'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $money = $this->transformation->money($request->transaction_value);
//        Verifica se há saldo para pagamento
        try {
            if ($this->transaction->bankInformation(Auth::id()) <= 0 or $this->transaction->bankInformation(Auth::id()) < $money) {
                Toastr::error('Você não possui saldo para pagamento.', 'Ops!');
                return back();
            }
        }
        catch (\Exception $e) {
            Toastr::error('Houve um erro ao tentar realizar o pagamento. Entre em contato com o administrador.' . $e->getMessage(), 'Ops!');
            return back();
        }

//        Inicia processo de transação
        $request->merge([
            'transaction_value' => $money,
            'user_from_id'      => Auth::id()
        ]);
        try {
            Transaction::create($request->all());
            Toastr::success('Pagamento realizado com sucesso!', 'Parabéns!');
            return redirect()->route('home');
        }
        catch (\Exception $e) {
            Toastr::error('Erro ao tentar realizar o pagamento.' . $e->getMessage(), 'Ops!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
