<!-- SCRIPT: Controller Transicao Editar -->
<script type="text/javascript" id="scriptControllerTransicaoEditar">
$(".botaoEditarProdutoTransicao").click(function(){

	$('#optionTemp').remove(); 

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

			var formato = { minimumFractionDigits: 2 }

			document.getElementById("id_editar").value = data['id'];
			document.getElementById("produto_editar").value = data['produto'];
			document.getElementById("preco_editar").value = (parseFloat(data['preco'])).toLocaleString('pt-BR',formato); //converte para formato brasileiro ex. 9.999,99
			

            // Categoria (FK) 
            var categoriaIdFK   = data['categoria'];      
            var categoriaFK   = data['categoria_nome']; 
            $("#teste").attr('value',categoriaIdFK);
            if(categoriaFK == undefined){categoria = "-- Selecione --";}else{categoria = categoriaFK;}		
            $('#teste').prepend('<option id="optionTemp">'+categoria+'</option>');

        },
        dataType:"json"
    });
});
</script>


<script type="text/javascript" id="scriptControllerEditarCancelar">
$(".botaoCancelarProduto").click(function(){
	$(".FormularioCadastrarProduto").css('display','block');
	$(".FormularioEditarProduto").css('display','none');  
});
</script>

<!-- SCRIPT: Controller Editar -->
<script type="text/javascript" id="scriptControllerEditar">
$(".botaoEditarProduto").click(function(){
	var url = 'templates/TemplateMasterUpdateContent.php';
	var contentTemplateMaster = document.getElementById("contentTemplateMaster");
	var idproduto = document.getElementById("id_editar").value;
	var produto =  document.getElementById("produto_editar").value;
	var categoria =  document.getElementById("categoria_editar").value;
	var preco =  $('#preco_editar').val().replace(".", "").replace(",","."); // converte para formato americano ex. 9999.99

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
			produto:produto,
			categoria:categoria,
			preco:preco
		},
		success: function(data) {
			if(data == 'sucesso'){
				var request = new XMLHttpRequest();
				request.open("GET", url, true);
				request.addEventListener("readystatechange", function (event) {
					if (request.readyState == 4 && request.status == 200) {
						contentTemplateMaster.innerHTML = request.responseText
						eval(document.getElementById('scriptMaskMoney').innerHTML); 
						eval(document.getElementById('scriptDataTable').innerHTML);  
						eval(document.getElementById('scriptControllerTransicaoEditar').innerHTML); 
						eval(document.getElementById('scriptControllerEditar').innerHTML);  
						eval(document.getElementById('scriptControllerEditarCancelar').innerHTML);   
						eval(document.getElementById('scriptControllerCadastrar').innerHTML);   
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

