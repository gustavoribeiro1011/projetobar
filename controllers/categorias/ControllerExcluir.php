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