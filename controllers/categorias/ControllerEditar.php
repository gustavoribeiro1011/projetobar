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
				var icone = data['icone'];
				document.getElementById("id_editar").value = idcategoria;
				document.getElementById("categoria_editar").value = categoria;



				if(document.getElementById("divFilhoCollapseCadastrar") !== null)
				{

					document.getElementById('divFilhoCollapseCadastrar').remove(); 
				}




			if (icone == ""){//se for vazio

				

				document.getElementById('divFilhoCollapseEditar').remove();
				


				$( "#divPaiCollapseEditar" ).append(
					"<div id='divFilhoCollapseEditar'>"+
					"<h1 id='labelAdicionarIcone'><a class='btn btn-light' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample'>"+
					"<i class='fas fa-plus'></i> Adicionar ícone"+
					"</a></h1>"+
					"</p>"+
					"<div class='collapse' id='collapseExample'>"+
					"<div class='card card-body'>"+
					"<h3>"+
					<?php include('../../views/categorias/icones/icones.php');?>       
					"</h3>"+
					"</div>"+
					"</div>"+
					"<input type='text' id='inputIconeEditar' class='form-control' style='display:none;'>"+
					"</div>"
					);





			} else {

				document.getElementById('divFilhoCollapseEditar').remove();


				$( "#divPaiCollapseEditar" ).append(
					"<div id='divFilhoCollapseEditar'>"+
					"<h1 id='labelAdicionarIcone'><a class='btn btn-primary' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample'>"+
					"<i class='"+icone+"'></i>"+
					"</a></h1> "+
					"</p>"+
					"<div class='collapse' id='collapseExample'>"+
					"<div class='card card-body'>"+
					"<h3>"+

					<?php include('../../views/categorias/icones/icones.php');?>

					"</h3>"+
					"</div>"+
					"</div>"+
					"<input type='text' id='inputIconeEditar' class='form-control' style='display:none;'>"+
					"</div>"
					);
			}

			$(".link_icone").click(function(){

				if(document.getElementById("labelAdicionarIcone") !== null)
				{

					document.getElementById('labelAdicionarIcone').remove(); // remove a label: '+ Adicionar Icone'
				}

				if(document.getElementById("iconeEscolhido") !== null)
				{

					document.getElementById('iconeEscolhido').remove(); 
				}
				
				var ico_name_editar=$(this).attr('attr_ico_name');

				$("#inputIconeEditar").val(ico_name_editar);

				$('.collapse').collapse('hide');

				$( "#divPaiCollapseEditar" ).append("<h1 id='iconeEscolhido'><a class='btn btn-primary' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample'>"+
					"<i class='"+ico_name_editar+"'></i>"+
					"</a></h1>");

			});

		},
		dataType:"json"
	});
	});
</script>


<script type="text/javascript" id="scriptControllerEditarCancelar">
	$(".botaoCancelarCategoria").click(function(){
		  location.reload();
		//$(".FormularioCadastrarCategoria").css('display','block');
		//$(".FormularioEditarCategoria").css('display','none');  
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
	var icone = document.getElementById("inputIconeEditar").value;

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
			categoria:categoria,
			icone:icone
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

