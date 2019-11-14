<script>
var data = "";
$.ajax({
	type: "POST",
	url: '../../models/comanda-eletronica/ModelVerificaPedido.php',
	data: {
		data:data
	},
	success: function(data) {	
		
		//alert(data['status']);


		var num_pedido = data['num_pedido'];
		var num_mesa = data['num_mesa'];

		 
       
		if (data['status'] == '1'){

			//alert("1 - Inclusao do primeiro pedido.");
			
			$('#spanPedido').text(num_pedido);

			$('#inputPedido').val(num_pedido);

			setTimeout(function() {
				$("#cardMesa").fadeIn();
			}, 200	);

		} else 	if (data['status'] == '2'){ //2 - Existe 1 pedido sem finaliza

			$(".btnDescartarPedido").click(function(){


				//exclui o pedido
				$.ajax({
					type: "POST",
					url: '../../models/comanda-eletronica/ModelDescartaPedido.php',
					data: {num_pedido:num_pedido},
					success: function(data) {

						if(data == 'sucesso'){	
                                   

                                     // aLtera status da mesa para indisponivel
                                     $.ajax({
                                     type: "POST",
                                     url: '../../models/comanda-eletronica/ModelAlteraStatusMesa.php',
                                     data: {
                                     	instrucao:'disponivel',
                                     	num_mesa:num_mesa
                                     },
                                     success: function(data) {
                                     if(data == 'sucesso'){

                                     	//alert("status alterado para disponivel");

                                     //recarrega a página
                                     location.reload();

                                     }else 	if(data == 'falha'){
                                     alertify.error('<font color="white">Falha ao alterar status da mesa</font>');
                                     } else {
                                     alertify.error('<font color="white">Erro desconhecido</font>');

                                     }
                                     }                                     
                                     });//fim ajax
                                     


						}else if (data == 'falha'){

							alertify.error('<font color="white">Falha ao descartar pedido</font>');


						}

					}

				});

			});

			$(".btnRetomarPedido").click(function(){

		//exibe o resumo do pedido
		$.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/ResumoPedido.php",
		{
			num_pedido:num_pedido
		},
		function (resultado){
			$('#includeResumoPedido').html(resultado);
			eval(document.getElementById('scriptControllerCapturaDados').innerHTML);  
			eval(document.getElementById('scriptDataTable').innerHTML); 

		});

		$("#spanPedido").html(num_pedido);

		setTimeout(function() {
			$("#cardResumoPedido").fadeIn();
		}, 600	);



        //depois precisa setar os values do formulario
        $("#inputPedido").val(num_pedido);
        $("#inputMesa").val(mesa);




    });


			$('#spanNumPedido').html(num_pedido);

			$(document).ready(function() {
				$('#modaoPedidoExistente').modal('show');
			})





		} else 	if (data['status'] == '3'){

			alert("3 - Existe mais de 1 pedido sem finalizar");
		}



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
	var num_pedido = $('#inputPedido').val();
	$("#inputMesa").val(num_mesa);

	


// cadastra mesa na tabela pedidos na coluna principal do pedido.

$.ajax({
	type: "POST",
	url: '../../models/comanda-eletronica/ModelCadastraMesa.php',
	data: {
    num_pedido:num_pedido,
	num_mesa:num_mesa
	},
	success: function(data) {

		if (data == 'sucesso'){

    	//alertify.success('<font color="white">"num_mesa" cadastrada com sucesso</font>');

		}else if (data == 'falha'){

    	//alertify.error('<font color="white">Falha ao cadastrar "num_mesa" na tabela "pedidos"</font>');

		} else {

    	alertify.error('<font color="white">Erro desconhecido ao cadastrar numero da mesa na tabela pedidos</font>');
		}
	}

});//fim ajax


// aLtera status da mesa para indisponivel
$.ajax({
	type: "POST",
	url: '../../models/comanda-eletronica/ModelAlteraStatusMesa.php',
	data: {
		instrucao:'indisponivel',
		num_mesa:num_mesa
	},
	success: function(data) {
		
	}

});//fim ajax






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

			alertify.success('<font color="white">Item adicionado</font>');	

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

    	alertify.error('<font color="white">Falha ao adicionar item</font>');


    }

}

});


});


$(".btnRemoverItem").click(function(){
	var item =  $(this).attr('item');
	var num_pedido = $(this).attr('num_pedido');
	$.ajax({
		type: "POST",
		url: '../../models/comanda-eletronica/ModelExcluiItem.php',
		data: {item:item},
		success: function(data) {
			if(data == 'sucesso'){	
				alertify.error('<font color="white">Item removido</font>');
            // [INICIO / INCLUINDO A TELA RESUMO PEDIDO DEPOIS DA EXCLUSAO DO ITEM]
            $.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/ResumoPedido.php",
            	{num_pedido:num_pedido},
            	function (resultado){
            		$( "#cardResumoPedido" ).remove();
            		$('#includeResumoPedido').html(resultado);
            		eval(document.getElementById('scriptControllerCapturaDados').innerHTML);  
            		eval(document.getElementById('scriptDataTable').innerHTML); 
            		setTimeout(function() {
            			$("#cardResumoPedido").fadeIn();
            		}, 600	);
            	});
            // [FIM / INCLUINDO A TELA RESUMO PEDIDO DEPOIS DA EXCLUSAO DO ITEM]
        }else if (data == 'falha'){
        	alertify.error('<font color="white">Falha ao remover item</font>');
        }
    }
	});//fim do ajax
});


</script>