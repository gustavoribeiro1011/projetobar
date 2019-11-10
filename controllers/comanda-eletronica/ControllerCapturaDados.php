<script>
var data = "";
$.ajax({
	type: "POST",
	url: '../../models/comanda-eletronica/ModelVerificaPedido.php',
	data: {
		data:data
	},
	success: function(data) {	
		var num_pedido = data['num_pedido'];
		$('#spanPedido').text(num_pedido);
		$('#inputPedido').val(num_pedido);
	},
	dataType:"json"
});

</script>
<script id="scriptControllerCapturaDados">





$(".btnMesa").click(function(){

	setTimeout(function() {
		$("#cardMesa").fadeOut();
	}, 150);
	setTimeout(function() {
		$("#cardCategoria").fadeIn();
	}, 600	);

	var num_mesa =  $(this).attr('num_mesa');
	document.getElementById("inputMesa").value = num_mesa;	







});

$("#btn-voltar-mesa").click(function(){

	setTimeout(function() {
		$("#cardCategoria").fadeOut();
	}, 150);
	setTimeout(function() {
		$("#cardMesa").fadeIn();
	}, 600	);

});



$(".btnCategoria").click(function(){

	var id_categoria=  $(this).attr('id_categoria');
	var categoria=  $(this).attr('categoria');
	document.getElementById("inputIdCategoria").value = id_categoria;
	document.getElementById("inputCategoria").value = categoria;


	$.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/Produtos.php",
	{
		id_categoria:id_categoria
	},
	function (resultado){
		$('#includeDivProdutos').html(resultado);
		eval(document.getElementById('scriptControllerCapturaDados').innerHTML);  
		setTimeout(function() {
			$("#cardCategoria").fadeOut();
		}, 150);
		setTimeout(function() {
			$("#cardProduto").fadeIn();
		}, 600	);



	});

});

$(".btn-voltar-categoria").click(function(){
	
	setTimeout(function() {
		$("#cardProduto").fadeOut();
	}, 150);

	  setTimeout(function() {
		$("#cardResumoPedido").fadeOut();
	}, 500	);

	setTimeout(function() {
		$("#cardCategoria").fadeIn();
	}, 1000	);
});

$(".btnProduto").click(function(){

    setTimeout(function() {
        	$("#cardProduto").fadeOut();
        }, 200);
	
	var num_pedido = $("#inputPedido").val();
	var num_mesa      = document.getElementById("inputMesa").value;
	var id_categoria  =  document.getElementById("inputIdCategoria").value;
	var categoria     =  document.getElementById("inputCategoria").value;
	var id_produto=  $(this).attr('id_produto');
	var produto=  $(this).attr('produto');
	var preco =  $(this).attr('preco');
	$("#inputIdProduto").val(id_produto);
	$("#inputProduto").val(produto);
	$("#inputPreco").val(preco);

//Agora precisa fazer o insert de tudo que esta no formulario.
$.ajax({
	type: "POST",
	url: '../../models/comanda-eletronica/ModelCadastraItem.php',
	data: {
		num_pedido:num_pedido,
		num_mesa:num_mesa,
		id_categoria:id_categoria,
		categoria:categoria,
		id_produto:id_produto,
		produto:produto,
		preco:preco
	},
	success: function(data) {

		if(data == 'sucesso'){			

			$("#alertaItemSucessoCadastrar").fadeIn().show();
			setTimeout(function() {
				$("#alertaItemSucessoCadastrar").fadeOut();
			}, 1000);

			//exibe o resumo do pedido

$.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/ResumoPedido.php",
{
	num_pedido:$("#inputPedido").val()
},
function (resultado){
	$('#includeResumoPedido').html(resultado);
	eval(document.getElementById('scriptControllerCapturaDados').innerHTML);  
	eval(document.getElementById('scriptDataTable').innerHTML); 

});
  setTimeout(function() {
		$("#cardResumoPedido").fadeIn();
	}, 600	);



        //depois precisa setar os values do formulario
        $("#inputIdCategoria").val("");
        $("#inputCategoria").val("");
        $("#inputIdProduto").val("");
        $("#inputProduto").val("");
        $("#inputPreco").val("");

    

    

		}else if (data == 'falha'){

			$("#alertaItemFalhaCadastrar").fadeIn().show();
			setTimeout(function() {
				$("#alertaItemFalhaCadastrar").fadeOut();
			}, 1000);

		}

	}

});



  



});

</script>