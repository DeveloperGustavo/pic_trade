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
                {{--Form de pesquisa--}}
                <form action="">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Faça sua pesquisa">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="button" onclick="enable_loader()"><i class="tim-icons icon-zoom-split"></i></button>
                        </div>
                    </div>
                </form>
                {{--Fim do form de pesquisa--}}
                <form action="" method="POST">
                    <div class="loader"></div>
                    @csrf
                    <div class="row mx-auto my-auto">
                        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                            <div id="carousel_user" class="carousel-inner w-100" role="listbox">
                                @for($i = 0; $i < count($users); $i++)
                                    @if($users[$i]->id == Auth::id())
                                    @else
                                        {{--carousel-item--}}
                                        <div class="carousel-item @if($i <= 1) active @endif">
                                            <div class="col-md-4">
                                                <div class="card card-body">
                                                    <div class="col-md-12">
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
                                                                        <h5 class="title">{{ $users[$i]->name }}</h5>
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
                                                </div>
                                            </div>
                                        </div>
                                        {{--end carousel-item--}}
                                    @endif
                                @endfor
                            </div>
                            <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('/js/carousel.js') }}"></script>
    <script>
        $(document).ready(function() {
            demo.initDashboardPageCharts();
        });

        function enable_loader()
        {
            $('.loader').show();
            $('#carousel_user').hide();
            var param = $('#search').val();
            $.ajax({
                method: "GET",
                url: '{{ route('users.index') }}',
                data:
                    {
                        "param": param
                    },
                success: function (e)
                {
                    var i = 0;
                    const div = document.getElementById('carousel_user');
                    $.each(e, function()
                    {
                        div.innerHTML =
                            '<div class="carousel-item @if($i <= 1) active @endif">' +
                            '   <div class="col-md-4">' +
                            '      <div class="card card-body">' +
                            '         <div class="col-md-12">' +
                            '            <div class="card card-user">' +
                            '               <div class="card-body">' +
                            '                  <p class="card-text">' +
                            '                  </p>' +
                            '                  <div class="author">' +
                            '                     <div class="block block-one"></div>' +
                            '                     <div class="block block-two"></div>' +
                            '                     <div class="block block-three"></div>' +
                            '                     <div class="block block-four"></div>' +
                            '                     <a href="#">' +
                            '                        <img class="avatar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQq2nCYcpvp7zv81gos09TJ3Z_-HpoqFjHJaw&usqp=CAU" alt="">' +
                            '                        <h5 class="title">' + e[0].name + '</h5>' +
                            '                     </a>' +
                            '                  </div>' +
                            '               </div>' +
                            '               <div class="m-2">' +
                            '                  <div class="form-check form-check-radio form-check-inline">' +
                            '                     <label class="form-check-label">' +
                            '                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Clique para pagar' +
                            '                     <span class="form-check-sign"></span>' +
                            '                     </label>' +
                            '                  </div>' +
                            '                  <br><br>' +
                            '                  <div class="form-group">' +
                            '                     <label for="transaction_value">Valor (R$)</label>' +
                            '                     <input type="text" class="form-control money" id="transaction_value" name="transaction_value">' +
                            '                     <small id="emailHelp" class="form-text text-muted">Informe o valor para pagamento.</small>' +
                            '                  </div>' +
                            '               </div>' +
                            '            </div>' +
                            '         </div>' +
                            '      </div>' +
                            '   </div>' +
                            '</div>';
                        i++;
                    });
                    $('.loader').hide();
                    $('#carousel_user').show();
                    console.log(div);
                },
                error: function(e) {
                    console.log('Erro na chamada ' . e);
                }
            })

        }

    </script>
@endpush
