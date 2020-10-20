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
                <h3>Realizar transfrência</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        @foreach($users as $user)
                            @if($user->id == Auth::id())
                            @else
                                <div class="col-md-3">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            </p><div class="author">
                                                <div class="block block-one"></div>
                                                <div class="block block-two"></div>
                                                <div class="block block-three"></div>
                                                <div class="block block-four"></div>
                                                <a href="#">
                                                    <img class="avatar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQq2nCYcpvp7zv81gos09TJ3Z_-HpoqFjHJaw&usqp=CAU" alt="">
                                                    <h5 class="title">{{ $user->name }}</h5>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="m-2">
                                            <div class="form-check form-check-radio form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Clique para pagar
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="transaction_value">Valor (R$)</label>
                                                <input type="text" class="form-control money" id="transaction_value" name="transaction_value">
                                                <small id="emailHelp" class="form-text text-muted">Informe o valor para pagamento.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
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
