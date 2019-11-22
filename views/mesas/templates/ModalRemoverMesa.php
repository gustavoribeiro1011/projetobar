<!-- Modal Remover Mesa -->
<div class="modal fade" id="modalRemoverMesa" tabindex="-1" role="dialog" aria-labelledby="modalRemoverMesa" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRemoverMesa">Quantas mesas deseja remover?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group row">
        <label class="col-sm-3 col-form-label">Quantidade:</label>
        <div class="col-sm-3">
          <input type="number" id="qtdMesasRemover" class="form-control" min="1" max="200" value="1">
        </div>
        <div class="col-sm-3">
          <button type="button" class="btn btn-primary" id="botaoRemoverMesaModal" data-dismiss="modal">Remover</button>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <button class="btn btn-danger btn-sm" id="btnTransicaoRemoverTodasMesas">Remover todas as mesas</button>
       </div>
     </div>
   </div>
<!--   <div class="modal-footer">
</div>-->
</div>
</div>
</div>