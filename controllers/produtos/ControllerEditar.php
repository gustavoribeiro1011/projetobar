<!-- Transição de dados da 'tabela' para 'formulário' Editar-->

<script type="text/javascript" id="scriptControllerTransicaoEditar">
$(".botaoEditarProdutoTransicao").click(function(){


	$(".FormularioCadastrarProduto").css('display','none');
	$(".FormularioEditarProduto").css('display','block');  

	var idproduto = $(this).attr('idproduto'); 



	$.ajax({
		type: "POST",
		url: '../../models/produtos/ModelTransicaoEditar.php',
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


<script type="text/javascript">

$(".botaoCancelarProduto").click(function(){
	$(".FormularioCadastrarProduto").css('display','block');
	$(".FormularioEditarProduto").css('display','none');  
});

$(".botaoEditarProduto").click(function(){

var url = 'templates/FormularioExibir.php';
var contentExibirProdutos = document.getElementById("contentExibirProdutos");

	//$(".FormularioCadastrarProduto").css('display','none');
	//$(".FormularioEditarProduto").css('display','block');  

	var idproduto = document.getElementById("id_editar").value;
	var produto =  document.getElementById("produto_editar").value;

if(!produto){ // se variavel é vazia

	$("#alertaAvisoEditar").fadeIn().show();  
	setTimeout(function() {
		$("#alertaAvisoEditar").fadeOut();
	}, 4000);

} else {

	$.ajax({
		type: "POST",
		url: '../../models/produtos/ModelEditar.php',
		data: {
			idproduto:idproduto,
			produto:produto
		},
		success: function(data) {

			if(data == 'sucesso'){


				var request = new XMLHttpRequest();
				request.open("GET", url, true);
				request.addEventListener("readystatechange", function (event) {
					if (request.readyState == 4 && request.status == 200) {
						contentExibirProdutos.innerHTML = request.responseText
						eval(document.getElementById('scriptDataTable').innerHTML);
						eval(document.getElementById('scriptControllerTransicaoEditar').innerHTML);          
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

