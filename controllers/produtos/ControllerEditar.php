<!-- Transição de dados da 'tabela' para 'formulário' Editar-->

<script type="text/javascript">
	// var url = 'templates/FormularioExibir.php';
	// var contentExibirProdutos = document.getElementById("contentExibirProdutos");
	$("#botaoEditarProduto\\.entry\\[<?php echo $i; ?>\\]").click(function(){

		var idproduto = $(this).attr('idproduto'); 

		

		$.ajax({
			type: "POST",
			url: '../../models/produtos/ModelEditar.php',
			data: {
				idproduto:idproduto
			},


			success: function(data) {

				var idproduto = data['id'];
				var produto = data['produto'];

				document.getElementById("id_editar").value = idproduto;
				document.getElementById("produto_editar").value = produto;

			},
			dataType:"json"
		});


	});
</script>

