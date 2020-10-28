@extends('layouts.app', ['pageSlug' => 'dashboard.dashboard'])

@section('content')
    <div class="row">
        <div class="card">
            <div style="margin-left: 10px; margin-top: 10px">
                <h3>Cadastrar Cartão de Crédito</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('credit_card.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @if($errors->get('number')) has-danger @endif">
                                <label for="number">Número do cartão</label>
                                <input type="number" class="form-control @if($errors->get('number')) form-control-danger @endif" id="number" name="number" value="{{ old('number') }}" placeholder="Informe os números do cartão" maxlength="12">
                            </div>
                            @foreach($errors->get('number') as $error)
                                <p style="color: #ec250d">{{ $error }}</p>
                            @endforeach

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group @if($errors->get('expiration_date')) has-danger @endif">
                                <label for="expiration_date">Data de validade</label>
                                <input type="date" class="form-control @if($errors->get('expiration_date'))  form-control-danger @endif" id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}">
                            </div>
                            @foreach($errors->get('expiration_date') as $error)
                                <p style="color: #ec250d">{{ $error }}</p>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @if($errors->get('cvv')) has-danger @endif">
                                <label for="cvv">CVV</label>
                                <input type="number" class="form-control @if($errors->get('cvv'))  form-control-danger @endif" id="cvv" name="cvv" maxlength="3" value="{{ old('cvv') }}">
                            </div>
                            @foreach($errors->get('cvv') as $error)
                                <p style="color: #ec250d">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
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
