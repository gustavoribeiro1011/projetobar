<!-- Modal Mesa Inexistente-->
<div class="modal fade" id="modalMesaInexistente" tabindex="-1" role="dialog" aria-labelledby="modalMesaInexistente" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalMesaInexistente">Nenhuma mesa cadastrada</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Não é possível fazer pedidos sem ter mesa cadastrada.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<a href="<?php echo BASEURL;?>views/mesas/Cadastrar.php"  class="btn btn-primary" >Cadastrar mesas agora</a>
			</div>
		</div>
	</div>
</div>