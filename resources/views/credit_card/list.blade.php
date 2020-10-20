@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total em pagamentos</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Saldo em conta</h5>
                    <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500€</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total recebido</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div style="margin-left: 10px; margin-top: 10px">
                <h3>Cadastrar Cartão de Crédito</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($cards as $card)
                        <div class="col-md-3">
                            <div class="card card-user">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group @if($errors->get('number')) has-danger @endif">
                                                <label for="number">Número do cartão</label>
                                                <input type="number" class="form-control @if($errors->get('number')) form-control-danger @endif" id="number" name="number" value="{{ $card->number }}" placeholder="Informe os números do cartão" maxlength="12" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group @if($errors->get('expiration_date')) has-danger @endif">
                                                <label for="expiration_date">Data de validade</label>
                                                <input type="date" class="form-control @if($errors->get('expiration_date'))  form-control-danger @endif" id="expiration_date" name="expiration_date" value="{{ $card->expiration_date }}" disabled>
                                            </div>
                                            @foreach($errors->get('expiration_date') as $error)
                                                <p style="color: #ec250d">{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group @if($errors->get('cvv')) has-danger @endif">
                                                <label for="cvv">CVV</label>
                                                <input type="number" class="form-control @if($errors->get('cvv'))  form-control-danger @endif" id="cvv" name="cvv" maxlength="3" value="{{ $card->cvv }}" disabled>
                                            </div>
                                            @foreach($errors->get('cvv') as $error)
                                                <p style="color: #ec250d">{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_credit_card_{{ $card->id }}">
                                        <i class="tim-icons icon-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete_credit_card_{{ $card->id }}">
                                        <i class="tim-icons icon-trash-simple"></i>
                                    </button>
                                    @include('credit_card/modal/edit')
                                    @include('credit_card/modal/delete')
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
            demo.initDashboardPageCharts();
        });
    </script>
@endpush
