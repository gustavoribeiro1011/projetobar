<!-- SCRIPT: Controller Verifica PRodutos Vinculados -->
<script type="text/javascript" id="scriptControllerVerificaProdutosVinculados">
	$(".botaoVerificaProdutosVinculados").click(function(){
		var idcategoria = $(this).attr('idcategoria'); 
		
		$.ajax({
			type: "POST",
			url: '../../models/categorias/ModelVerificaProdutosVinculados.php',
			data: {
				idcategoria:idcategoria
			},
			success: function(data) {
				
				var msg = data['msg'];


				if(data['msg'] =='existe produtos vinculados'){

					var resultado = data['resultado'];
					var nomeCategoria = data['nome_categoria'];

					if(resultado>1){
						document.getElementById("spanResultado").innerHTML = "<b>" + resultado + "</b>" + " produtos estão vinculados";
					} else {
						document.getElementById("spanResultado").innerHTML = "<b>" + resultado + "</b>" + " produto está vinculado";
					}
					
					document.getElementById("spanNomeCategoria").innerHTML = nomeCategoria;
					document.getElementById("resgataIDcategoria").value = idcategoria;


					$('#ModalVerificaProdutosVinculados').modal('show');

					

				} else if (data['msg'] =='nao existe produtos vinculados'){

					document.getElementById("resgataIDcategoria").value = idcategoria;
					$('#modalExcluirCategoria').modal('show');

				} else if (data['msg'] =='falha'){
					$("#alertaFalhaExcluir").fadeIn().show();  
					setTimeout(function() {
						$("#alertaFalhaExcluir").fadeOut();
					}, 4000);
				}
			},
			dataType:"json"
		});
	});
</script>

<!-- SCRIPT: Controller Excluir -->
<script type="text/javascript" id="scriptControllerExcluirTransicao">
	$(".botaoExcluirCategoriaTransicao").click(function(){
		var idcategoria = $(this).attr('idcategoria'); 
		document.getElementById("resgataIDcategoria").value = idcategoria;
	});
</script>

<script type="text/javascript" id="scriptControllerExcluir">
	var url = 'templates/TemplateMasterUpdateContent.php';
	var contentTemplateMaster = document.getElementById("contentTemplateMaster");
	$(".botaoExcluirCategoriaModal").click(function(){
		var idcategoria = document.getElementById("resgataIDcategoria").value

		$.ajax({
			type: "POST",
			url: '../../models/categorias/ModelExcluir.php',
			data: {
				idcategoria:idcategoria
			},
			success: function(data) {
				if (data == 'sucesso'){
					var request = new XMLHttpRequest();
					request.open("GET", url, true);
					request.addEventListener("readystatechange", function (event) {
						if (request.readyState == 4 && request.status == 200) {
							contentTemplateMaster.innerHTML = request.responseText
							

							eval(document.getElementById('scriptDataTable').innerHTML);  
							eval(document.getElementById('scriptControllerCadastrar').innerHTML);  
							eval(document.getElementById('scriptControllerTransicaoEditar').innerHTML);  
							eval(document.getElementById('scriptControllerEditar').innerHTML); 
							eval(document.getElementById('scriptControllerEditarCancelar').innerHTML);  
							eval(document.getElementById('scriptControllerVerificaProdutosVinculados').innerHTML);  
							eval(document.getElementById('scriptControllerExcluir').innerHTML);  
							eval(document.getElementById('scriptControllerExcluirTransicao').innerHTML);    
						}
					});
					request.send();
					$("#alertaSucessoExcluir").fadeIn().show();  
					setTimeout(function() {
						$("#alertaSucessoExcluir").fadeOut();
					}, 4000);

				} else if (data == 'falha'){
					$("#alertaFalhaExcluir").fadeIn().show();  
					setTimeout(function() {
						$("#alertaFalhaExcluir").fadeOut();
					}, 4000);
				}
			}		
		});
	});
</script>