@extends('layouts.app', ['page' => __('Extrato'), 'pageSlug' => 'extract'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Extrato</h4>
                            <p class="card-category">Extrato das transações</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Data
                                        </th>
                                        <th>
                                            Valor (R$)
                                        </th>
                                        <th>
                                            Cartão de crédito
                                        </th>
                                        <th>
                                            Enviado para
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($bank_information['transactions'] as $key => $value)
                                            @foreach($value as $transaction)
                                                <tr>
                                                    <td>{{ date('d/m/Y', strtotime($transaction->created_at)) }}</td>
                                                    <td>R$ {{ number_format($transaction->transaction_value, 2, ',', '.') }}</td>
                                                    <td>{{ $transaction->number }}</td>
                                                    <td>{{ $transaction->name }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
