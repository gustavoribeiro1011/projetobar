
<script>

			        //script que atualiza mesa de tempos em tempos -INICIO


		    var tempo = 2000; //1000ms = 1s

			
			    			
			setTimeout(function() {
				$("#cardMesa").fadeIn();
			}, 200	);

    	
            //chama a função atualizaDados 
            window.setTimeout(atualizaDados, 1);

            function atualizaDados() {

            //carrega o conteúdo do arquivo "ajax.php" para dentro da div#devolucoes-pendentes
            $("#divMesas").load("<?php echo BASEURL;?>views/comanda-eletronica/templates/Mesas.php");

            setTimeout(function() {
				$("#cardMesa").fadeIn();
			}, 0	);
           
            // para perpetuar a chamada da função 
            tempoAtualiza = window.setTimeout(atualizaDados, tempo);

            }

            function StopAtualizaDados() {
 			clearTimeout(tempoAtualiza);
			}


		  
           //script que atualiza mesa de tempos em tempos -FIM

	var data = "1";
	$.ajax({
		type: "POST",
		url: '../../models/comanda-eletronica/ModelVerificaPedido.php',
		data: {
			data:data
		},
		success: function(data) {	

		//alert(data['status']);
		$('#inputStatus').val(data['status']);

		var id_num_pedido = data['id_num_pedido'];
		var num_pedido = data['num_pedido'];
		var num_mesa = data['num_mesa'];
		var data_hora_cadastro_pedido = data['cadastro'];
		

		



		if (data['status'] == '1'){

//alert("1 - Inclusao do primeiro pedido.");


			

			var id_num_pedido = data['id_num_pedido'];
			
			
			
			$('#spanPedido').text(num_pedido);
			
			$('#inputPedido').val(num_pedido);

			$('#inputDataHoraCadastroPedido').val(data_hora_cadastro_pedido);

			
		} else 	if (data['status'] == '2'){ //2 - Existe 1 pedido sem finaliza


		
			

			//alert(' Existe 1 pedido sem finalizar');
			var id_num_pedido = data['id_num_pedido'];		
			var data_hora_cadastro_pedido = data['cadastro'];
			var num_comanda = data['num_comanda'];
			var num_mesa = data['num_mesa'];
			
			$('#inputIdComanda').val(num_comanda);





           // aLtera status da mesa para disponivel
                 $.ajax({
                 	type: "POST",
                 	url: '../../models/comanda-eletronica/ModelAlteraStatusMesa.php',
                 	data: {
                 		instrucao:'disponivel',
                 		num_mesa:num_mesa,
                 		num_pedido:num_pedido,
                 		data_hora_cadastro_pedido:data_hora_cadastro_pedido,
                 		num_comanda:num_comanda
                 	},
                 	success: function(data) {
        		//alert(data);
        		if(data == 'sucesso'){

              //alert("status alterado para disponivel");

            

				$.ajax({
					type: "POST",
					url: '../../models/comanda-eletronica/ModelDescartaPedido.php',
					data: {
						num_pedido:num_pedido											
					},
					success: function(data) {

						if(data == 'sucesso'){	
        
    //recarrega a página
                                     location.reload();

                                 }else if (data == 'falha'){

                                 	alertify.error('<font color="white">Falha ao descartar pedido</font>');

                                 }

                             }

                         });
                               
                                 }else 	if(data == 'falha'){
                                 	alertify.error('<font color="white">Falha ao alterar status da mesa</font>');
                                 } else {
                                 	alertify.error('<font color="white">Erro desconhecido (#1) (data: '+data+')</font>');

                                 }
                             }                                     
                                     });//fim ajax




			



//		$(".btnRetomarPedido").click(function(){ 

//	//exibe o resumo do pedido
//	$.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/ResumoPedido.php",
//	{
//		num_pedido:num_pedido
//	},
//	function (resultado){
//		$('#includeResumoPedido').html(resultado);
//		eval(document.getElementById('scriptControllerCapturaDados').innerHTML);  
//		eval(document.getElementById('scriptDataTable').innerHTML); 

//	});

//	$("#spanPedido").html(num_pedido);
//	$("#spanMesa").html(num_mesa);

//	setTimeout(function() {
//		$("#cardResumoPedido").fadeIn();
//	}, 200	);



//     //depois precisa setar os values do formulario
//     $("#inputPedido").val(num_pedido);
//     $("#inputMesa").val(num_mesa);




// });



//
//			$('#spanNumPedido').html(num_pedido);
//
//			$(document).ready(function() {
//				$('#modaoPedidoExistente').modal('show');
//			})
//




		} else 	if (data['status'] == '3'){

	//alert("3 - Existe mais de 1 pedido sem finalizar");

} else if (data['status'] == '4'){

	$(document).ready(function() {
		$('#modalMesaInexistente').modal('show');
	})

		} else 	if (data['status'] == '5'){ //5 - Cadastro de novo item

			var num_pedido = data['num_pedido'];
			var num_mesa = data['num_mesa'];

			$('#spanPedido').text(num_pedido);
			$('#spanMesa').text(num_mesa);


			$('#inputPedido').val(num_pedido);
			$('#inputMesa').val(num_mesa);

			setTimeout(function() {
				$("#cardCategoria").fadeIn();
			}, 50	);
			
			// reset param_1
			var instrucao = 'reset param_1';
			$.ajax({
				type: "POST",
				url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
				data: {
					instrucao:instrucao,
					num_pedido:num_pedido	
				},
				success: function(data) {

					if (data == 'sucesso'){} else

						if (data == 'falha'){

							alertify.error('<font color="white">Falha ao setar Param_1</font>');

						} else {

							alertify.error('<font color="white">Erro desconhecido (#2)</font>');
						}
					}

});//fim ajax

			
		}

		else if (data['status'] == '6'){ //6 - voltar para tela resumo de pedidos

			var num_pedido = data['num_pedido'];
			var num_mesa = data['num_mesa'];

			$('#spanMesa').text(num_mesa);
			$('#inputPedido').val(num_pedido);
			$('#inputMesa').val(num_mesa);


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

			// reset param_1
			var instrucao = 'reset param_1';
			$.ajax({
				type: "POST",
				url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
				data: {
					instrucao:instrucao,
					num_pedido:num_pedido	
				},
				success: function(data) {

					if (data == 'sucesso'){} else

						if (data == 'falha'){

							alertify.error('<font color="white">Falha ao setar Param_1</font>');

						} else {

							alertify.error('<font color="white">Erro desconhecido (#3)</font>');
						}
					}

});//fim ajax

			
		}

				else if (data['status'] == '7'){ //7 - voltar para tela categorias

					var num_pedido = data['num_pedido'];
					var num_mesa = data['num_mesa'];


					// passa valores para o formulário
					$('#inputPedido').val(num_pedido);
					$('#inputMesa').val(num_mesa);


					setTimeout(function() {
						$("#cardCategoria").fadeIn();
					    //exibe valores no cabeçalho
					    $("#spanPedido").html(num_pedido).fadeIn();
					    $("#spanMesa").html(num_mesa).fadeIn();
					}, 600	);



					

			// reset param_1
			var instrucao = 'reset param_1';
			$.ajax({
				type: "POST",
				url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
				data: {
					instrucao:instrucao,
					num_pedido:num_pedido	
				},
				success: function(data) {

					if (data == 'sucesso'){} else

						if (data == 'falha'){

							alertify.error('<font color="white">Falha ao setar Param_1</font>');

						} else {

							alertify.error('<font color="white">Erro desconhecido (#4)</font>');
						}
					}

});//fim ajax

			
		}
	else if (data['status'] == '8'){ //8 - voltar para tela produtos

		var num_pedido = data['num_pedido'];
		var num_mesa = data['num_mesa'];
		var id_categoria  = data['id_categoria'];
		var categoria  = data['categoria'];


					//$('#spanPedido').text(num_pedido);
					$('#inputPedido').val(num_pedido);
					$('#inputMesa').val(num_mesa);
					$('#inputIdCategoria').val(id_categoria);
					$('#inputCategoria').val(categoria);
					


					$.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/Produtos.php",
					{
						id_categoria:id_categoria
					},
					function (resultado){
						$('#includeDivProdutos').html(resultado);

						eval(document.getElementById('scriptControllerCapturaDados').innerHTML);  

						setTimeout(function() {
							$("#cardProduto").fadeIn();
							$("#spanPedido").html(num_pedido).fadeIn();
							$("#spanMesa").html(num_mesa).fadeIn();
						}, 600	);



					});					

			// reset param_1
			var instrucao = 'reset param_1';
			$.ajax({
				type: "POST",
				url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
				data: {
					instrucao:instrucao,
					num_pedido:num_pedido	
				},
				success: function(data) {

					if (data == 'sucesso'){} else

						if (data == 'falha'){

							alertify.error('<font color="white">Falha ao setar Param_1</font>');

						} else {

							alertify.error('<font color="white">Erro desconhecido (#5)</font>');
						}
					}

});//fim ajax

			
		}

			else if (data['status'] == '9'){ //9 - voltar para tela mesas

				var num_pedido = data['num_pedido'];
				var num_mesa = data['num_pedido'];



				$('#spanPedido').text(num_pedido);
				$('#inputPedido').val(num_pedido);
				
			//$("#spanPedido").html(num_pedido);


			// reset param_1
			var instrucao = 'reset param_1';
			$.ajax({
				type: "POST",
				url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
				data: {
					instrucao:instrucao,
					num_pedido:num_pedido	
				},
				success: function(data) {

					if (data == 'sucesso'){


					} else

					if (data == 'falha'){

						alertify.error('<font color="white">Falha ao setar Param_1</font>');

					} else {

						alertify.error('<font color="white">Erro desconhecido (#5)</font>');
					}
				}

});//fim ajax
alert("instancia car mesa emm 200mms");
				setTimeout(function() {
				$("#cardMesa").fadeIn();
			}, 200	);

			
		}

					else if (data['status'] == '10'){ //10 - novo pedido

				StopAtualizaDados()	 

						var num_pedido = data['num_pedido'];
						var num_mesa = data['num_mesa'];



						$('#spanPedido').text(num_pedido);
						$('#spanMesa').text(num_mesa);
						$('#inputPedido').val(num_pedido);
						$('#inputMesa').val(num_mesa);

					//$("#spanPedido").html(num_pedido);

					setTimeout(function() {
						$("#cardCategoria").fadeIn();
					}, 200	);



			// reseta as colunas de parametros
			var instrucao = 'reset param_1';
			$.ajax({
				type: "POST",
				url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
				data: {
					instrucao:instrucao,
					num_pedido:num_pedido	
				},
				success: function(data) {

					if (data == 'sucesso'){


					} else

					if (data == 'falha'){

						alertify.error('<font color="white">Falha ao setar Param_1</font>');

					} else {

						alertify.error('<font color="white">Erro desconhecido (#6)</font>');
					}
				}

});//fim ajax

			
		}





	},
	dataType:"json"
});

</script>
<script id="scriptControllerCapturaDados">








	$(".btnVoltarParaMesas").click(function(){ 

	location.reload(); // dar um reload na página

	});




	$(".btnVoltarParaResumoPedido").click(function(){ 

		var num_pedido	  =  $("#inputPedido").val();
		var num_mesa	  =  $("#inputMesa").val();

		var instrucao = 'voltar para tela resumo de pedidos';

		$.ajax({
			type: "POST",
			url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
			data: {
				instrucao:instrucao,
				num_pedido:num_pedido	
			},
			success: function(data) {
				location.reload(); // dar um reload na página

				if (data == 'sucesso'){

    	
    	

    }else if (data == 'falha'){

    	alertify.error('<font color="white">Falha</font>');

    } else {

    	alertify.error('<font color="white">Erro desconhecido (#8)</font>');
    }
}

});//fim ajax


	});

	$(".btnVoltarParaCategoria").click(function(){ 

		var num_pedido = $("#inputPedido").val();

		var instrucao = 'voltar para tela categorias';

		$.ajax({
			type: "POST",
			url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
			data: {
				instrucao:instrucao,
				num_pedido:num_pedido	
			},
			success: function(data) {

				if (data == 'sucesso'){

    	//alertify.success('<font color="white">Sucesso</font>');
    	location.reload(); // dar um reload na página

    }else if (data == 'falha'){

    	alertify.error('<font color="white">Falha</font>');

    } else {

    	alertify.error('<font color="white">Erro desconhecido (#9)</font>');
    }
}

});//fim ajax


	});

	$(".btnVoltarParaProduto").click(function(){ 

		var num_pedido = $("#inputPedido").val();

		var instrucao = 'voltar para tela produtos';
		var id_categoria  =  $("#inputIdCategoria").val();
		var categoria = $("#inputCategoria").val();

		$.ajax({
			type: "POST",
			url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
			data: {
				instrucao:instrucao,
				num_pedido:num_pedido,
				id_categoria:id_categoria,
				categoria:categoria	
			},
			success: function(data) {

				if (data == 'sucesso'){

    	//alertify.success('<font color="white">Sucesso</font>');
    	location.reload(); // dar um reload na página

    }else if (data == 'falha'){

    	alertify.error('<font color="white">Falha</font>');

    } else {

    	alertify.error('<font color="white">Erro desconhecido (#10)</font>');
    }
}

});//fim ajax


	});

	$(".btn-voltar-variante").click(function(){ 

		setTimeout(function() {
			$("#cardVariante").fadeOut();
		}, 150);

		setTimeout(function() {
			$("#cardProduto").fadeIn();
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

	$(".btnAdicionarItem").click(function(){ 

		
		var num_pedido	  =  $("#inputPedido").val();
		var num_mesa = $("#inputMesa").val();


// enviar 'numero do pedido' para o arquivo "ModelProcessaInstrucoes"
var instrucao = 'novo pedido';
$.ajax({
	type: "POST",
	url: '../../models/comanda-eletronica/ModelProcessaInstrucoes.php',
	data: {
		instrucao:instrucao,
		num_pedido:num_pedido,
		num_mesa:num_mesa	
	},
	success: function(data) {

		if (data == 'sucesso'){

    	//alertify.success('<font color="white">Sucesso</font>');
    	location.reload(); // dar um reload na página

    }else if (data == 'falha'){

    	alertify.error('<font color="white">Falha</font>');

    } else {

    	alertify.error('<font color="white">Erro desconhecido (#11)</font>');
    }
}

});//fim ajax


});

	$(".btn-voltar-variante").click(function(){ 

		setTimeout(function() {
			$("#cardVariante").fadeOut();
		}, 150);

		setTimeout(function() {
			$("#cardProduto").fadeIn();
		}, 600	);

	});

	$(".btnProduto").click(function(){ 

		var num_pedido	  =  $("#inputPedido").val();
		var num_mesa      =  $("#inputMesa").val();
		var id_categoria  =  $("#inputIdCategoria").val();
		var categoria     =  $("#inputCategoria").val();
		var id_produto    =  $(this).attr('id_produto');
		var produto       =  $(this).attr('produto');

		$("#inputIdProduto").val(id_produto);
		$("#inputProduto").val(produto);

		$.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/Variantes.php",
		{
			id_produto:id_produto
		},
		function (resultado){
			$('#includeDivVariantes').html(resultado);
			eval(document.getElementById('scriptControllerCapturaDados').innerHTML);  
			setTimeout(function() {
				$("#cardProduto").fadeOut();
			}, 200);
			setTimeout(function() {
				$("#cardVariante").fadeIn();
			}, 600	);

		});

	});

	$(".btnVariante").click(function(){ 

	//resgatando os valores do formulario que já foram definidos até o momento
	var num_pedido	  =  $("#inputPedido").val();
	var num_mesa      =  $("#inputMesa").val();
	var id_categoria  =  $("#inputIdCategoria").val();
	var categoria     =  $("#inputCategoria").val();
	var id_produto    =  $("#inputIdProduto").val();
	var produto       =  $("#inputProduto").val();

	//pegando os novos atributos do <button class="btnVariante">
	var id_preco	        =    $(this).attr('id_preco');
	var preco	            =    $(this).attr('preco');
	var id_unidade_medida	=    $(this).attr('id_unidade_medida');
	var unidade_medida	    =    $(this).attr('unidade_medida');
	var medida	            =    $(this).attr('medida');	

    //passando os aribuitos para os inputs do formulário
    $("#inputIdPreco").val(id_preco);
    $("#inputPreco").val(preco);
    $("#inputIdUnidadeMedida").val(id_unidade_medida);
    $("#inputUnidadeMedida").val(unidade_medida);
    $("#inputMedida").val(medida);

//insert de tudo que esta no formulario para a tabela 'pedidos'
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
		id_preco:id_preco,
		preco:preco,
		id_unidade_medida:id_unidade_medida,
		unidade_medida:unidade_medida,
		medida:medida

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
				$("#cardVariante").fadeOut();
			}, 150	);


			setTimeout(function() {
				$("#cardResumoPedido").fadeIn();
			}, 600	);



        //depois precisa setar os values do formulario
        $("#inputIdCategoria").val("");
        $("#inputCategoria").val("");
        $("#inputIdProduto").val("");
        $("#inputProduto").val("");


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




$(".btnDetalhesPedido").click(function(){ 

var num_pedido = $(this).attr('num_pedido'); 

$("#spanModalNumPedido").text(num_pedido);
	
  // faz a inclusão do arq. 'IncludeDetalhesPedido.php' dentro da div div '.includeDetalhesPedido'
  	$.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/IncludeDetalhesPedido.php",
     { 
       num_pedido:num_pedido    
     },
     function(resultado){
         	
       $('.includeDetalhesPedido').html(resultado);
       //eval(document.getElementById('scriptModalDetalhesPedido').innerHTML); 

      
     });


      $('#modalDetalhesPedido').modal('show');

});



	$(".btnFinalizarPedido").click(function(){ 

		setTimeout(function() {
			$(".cardNumeroPedido").fadeOut();
		}, 200	);

		var num_pedido = $(this).attr('num_pedido');



		$.ajax({
			type: "POST",
			url: '../../models/comanda-eletronica/ModelFinalizarPedido.php',
			data: {num_pedido:num_pedido},
			success: function(data) {
				if(data == 'sucesso'){	
					alertify.success('<font color="white">Pedido finalizado</font>');	

					setTimeout(function() {
						$("#cardResumoPedido").fadeOut();
					}, 200	);



					$('#numeroPedido').html(num_pedido);
					setTimeout(function() {
						$("#cardFimPedido").fadeIn();
					}, 600	);



// dar um reload na pagina


}else if (data == 'falha'){
	
	alertify.error('<font color="white">Falha ao finalizar pedido</font>');
}
}
	});//fim do ajax



	});

	$(".btnFecharMesa").click(function(){ 

var num_mesa = $("#inputMesa").val();
var data_hora_mesa_aberto = $('#spanDataHoraMesaAberta').text();


$("#inputDataHoraMesaAberta").val(data_hora_mesa_aberto);

//alert(num_mesa + "...." + data_hora_mesa_aberto);

$.ajax({
	type: "POST",
	url: '../../models/comanda-eletronica/ModelFecharMesa.php',
	data: {
		num_mesa:num_mesa,
		data_hora_mesa_aberto:data_hora_mesa_aberto
	},
	success: function(data) {

		if(data['msg'] == 'sucesso'){	
			alertify.success('<font color="white">Mesa '+ num_mesa +' fechada</font>');	
            // dar um reload na pagina
            location.reload();}

		else if (data['msg'] == 'falha'){
			alertify.error('<font color="white">Falha ao fechar mesa '+ num_mesa +'</font>');
		}

		else if (data['msg'] == 'tem pedido em aberto'){
	
		//abre modal 
		$(document).ready(function() {
		$('#modalPedidoEmProducao').modal('show');
		$("#spanQtdPedidosEmProducao").text(data['qtdPedidosEmProducao']);
		})

}

},
dataType:"json"
 	});//fim do ajax



});



</script>

