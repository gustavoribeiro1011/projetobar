<!-- Modal Excluir Produto-->
<div class="modal fade" id="modaoPedidoExistente" tabindex="-1" role="dialog" aria-labelledby="modaoPedidoExistente" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaoPedidoExistente">Pedido nº <span id="spanNumPedido"></span> em aberto</h5>
      </button>
    </div>
    <div class="modal-body">
      O que deseja fazer?

      <input type="text" id="resgataIDproduto" disabled style="display:none;"/>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-warning btnDescartarPedido" data-dismiss="modal">Descartar pedido</button>
      <button type="button" class="btn btn-primary btnRetomarPedido" data-dismiss="modal">Retomar pedido</button>
    </div>
  </div>
</div>
</div>