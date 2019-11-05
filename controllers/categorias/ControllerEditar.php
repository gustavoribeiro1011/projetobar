<!-- SCRIPT: Controller Transicao Editar -->
<script type="text/javascript" id="scriptControllerTransicaoEditar">
	$(".botaoEditarCategoriaTransicao").click(function(){
		$(".FormularioCadastrarCategoria").css('display','none');
		$(".FormularioEditarCategoria").css('display','block');  
		var idcategoria = $(this).attr('idcategoria'); 
		$.ajax({
			type: "POST",
			url: '../../models/categorias/ModelTransicaoEditar.php',
			data: {
				idcategoria:idcategoria
			},
			success: function(data) {
				var idcategoria = data['id'];
				var categoria = data['categoria'];
				document.getElementById("id_editar").value = idcategoria;
				document.getElementById("categoria_editar").value = categoria;
			},
			dataType:"json"
		});
	});
</script>


<script type="text/javascript" id="scriptControllerEditarCancelar">
	$(".botaoCancelarCategoria").click(function(){
		$(".FormularioCadastrarCategoria").css('display','block');
		$(".FormularioEditarCategoria").css('display','none');  
	});
</script>

<!-- SCRIPT: Controller Editar -->
<script type="text/javascript" id="scriptControllerEditar">
	$(".botaoEditarCategoria").click(function(){
		var url = 'templates/TemplateMasterUpdateContent.php';
		var contentTemplateMaster = document.getElementById("contentTemplateMaster");
	//$(".FormularioCadastrarCategoria").css('display','none');
	//$(".FormularioEditarCategoria").css('display','block');  
	var idcategoria = document.getElementById("id_editar").value;
	var categoria =  document.getElementById("categoria_editar").value;
if(!categoria){ // se variavel é vazia
	$("#alertaAvisoEditar").fadeIn().show();  
	setTimeout(function() {
		$("#alertaAvisoEditar").fadeOut();
	}, 4000);
} else {
	$.ajax({
		type: "POST",
		url: '../../models/categorias/ModelEditar.php',
		data: {
			idcategoria:idcategoria,
			categoria:categoria
		},
		success: function(data) {
			if(data == 'sucesso'){
				var request = new XMLHttpRequest();
				request.open("GET", url, true);
				request.addEventListener("readystatechange", function (event) {
					if (request.readyState == 4 && request.status == 200) {
						contentTemplateMaster.innerHTML = request.responseText
						eval(document.getElementById('scriptDataTable').innerHTML);  
						eval(document.getElementById('scriptControllerTransicaoEditar').innerHTML); 
						eval(document.getElementById('scriptControllerEditar').innerHTML);  
						eval(document.getElementById('scriptControllerEditarCancelar').innerHTML);   
						eval(document.getElementById('scriptControllerCadastrar').innerHTML);  
						eval(document.getElementById('scriptControllerVerificaProdutosVinculados').innerHTML);   
						eval(document.getElementById('scriptControllerExcluir').innerHTML);  
						eval(document.getElementById('scriptControllerExcluirTransicao').innerHTML);    
					}
				});
				request.send();				
				$("#alertaSucessoEditar").fadeIn().show();  
				setTimeout(function() {
					$("#alertaSucessoEditar").fadeOut();
				}, 4000);
			}else if (data == 'falha'){
				$("#alertaFalhaEditar").fadeIn().show();  
				setTimeout(function() {
					$("#alertaFalhaEditar").fadeOut();
				}, 4000);
			}
		}		
	});
}
});
</script>

