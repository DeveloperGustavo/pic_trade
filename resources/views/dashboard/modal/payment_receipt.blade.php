
<div class="modal fade" id="payment_receipt" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Comprovante de pagamento</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(isset($transaction))
                    <p><b>Transação: </b>{{ $transaction->id }}</p>
                    <p><b>Data: </b>{{ date('d/m/Y h:m:s', strtotime($transaction->created_at)) }}</p>
                    <p><b>Pagamento feito para: </b>{{ $user_to->name }}</p>
                    <p><b>Pagamento feito de: </b>{{ $user_from->name }}</p>
                    <hr>
                    <p><b>Cartão: </b> {{ str_pad($credit_card->number, 5, STR_PAD_LEFT) }}</p>
                    <p><b>Valor: </b>R$ {{ number_format(abs($transaction->transaction_value), 2, ',', '.')  }}</p>
                    <hr>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

