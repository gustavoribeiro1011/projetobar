<!-- Modal Verifica Produtos Vinculados -->
<div class="modal fade" id="ModalVerificaProdutosVinculados" tabindex="-1" role="dialog" aria-labelledby="ModalVerificaProdutosVinculados" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalVerificaProdutosVinculados">Atenção!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="spanResultado">...</span> a categoria <b><span id="spanNomeCategoria">...</span></b>.<br>
        Deseja mesmo excluir?

          <input type="text" id="resgataIDcategoria" disabled style="display:none;"/>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button type="button" class="btn btn-primary botaoExcluirCategoriaModal" data-dismiss="modal">Sim</button>
      </div>
    </div>
  </div>
</div>