<!-- SCRIPT: Controller Excluir -->
<script type="text/javascript" id="scriptControllerExcluirTransicao">
$(".botaoExcluirProdutoTransicao").click(function(){
	var idproduto = $(this).attr('idproduto'); 
	document.getElementById("resgataIDproduto").value = idproduto;
});
</script>

<script type="text/javascript" id="scriptControllerExcluir">
var url = 'templates/TemplateMasterUpdateContent.php';
var contentTemplateMaster = document.getElementById("contentTemplateMaster");
$(".botaoExcluirProdutoModal").click(function(){
	var instrucao = 'remover produto';
	var idproduto = document.getElementById("resgataIDproduto").value

	$.ajax({
		type: "POST",
		url: '../../models/produtos/ModelExcluir.php',
		data: {
			instrucao:instrucao,
			idproduto:idproduto
		},
		success: function(data) {


			if (data == 'sucesso'){
				var request = new XMLHttpRequest();
				request.open("GET", url, true);
				request.addEventListener("readystatechange", function (event) {
					if (request.readyState == 4 && request.status == 200) {
						eval(document.getElementById('scriptMaskMoney').innerHTML); 
						contentTemplateMaster.innerHTML = request.responseText
						eval(document.getElementById('scriptControllerMain').innerHTML);              
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
				alertify.success('<font color="white">Produto excluído</font>');


			} else if (data == 'falha'){
				alertify.error('<font color="white">Falha ao excluir produto</font>');

			}
		}		
	});
});
</script>