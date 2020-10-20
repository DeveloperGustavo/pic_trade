
<div class="modal fade" id="edit_credit_card_{{ $card->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Editar Cartão de Crédito</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('credit_card.update', ['credit_card' => $card]) }}" method="POST">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @if($errors->get('number')) has-danger @endif">
                                <label for="number">Número do cartão</label>
                                <input type="number" class="form-control @if($errors->get('number')) form-control-danger @endif" id="number" name="number" value="{{ $card->number }}" placeholder="Informe os números do cartão" maxlength="12">
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
                                <input type="date" class="form-control @if($errors->get('expiration_date'))  form-control-danger @endif" id="expiration_date" name="expiration_date" value="{{ $card->expiration_date }}">
                            </div>
                            @foreach($errors->get('expiration_date') as $error)
                                <p style="color: #ec250d">{{ $error }}</p>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @if($errors->get('cvv')) has-danger @endif">
                                <label for="cvv">CVV</label>
                                <input type="number" class="form-control @if($errors->get('cvv'))  form-control-danger @endif" id="cvv" name="cvv" maxlength="3" value="{{ $card->cvv }}">
                            </div>
                            @foreach($errors->get('cvv') as $error)
                                <p style="color: #ec250d">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

