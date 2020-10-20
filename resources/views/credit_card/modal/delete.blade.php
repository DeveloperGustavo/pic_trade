
<div class="modal fade" id="delete_credit_card_{{ $card->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Deletar Cartão de Crédito</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir o cartão de número <strong>{{ $card->number }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <form action="{{ route('credit_card.destroy', ['credit_card' => $card]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

