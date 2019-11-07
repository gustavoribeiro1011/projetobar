<script id="scriptControllerCapturaDados">

	$(".btnMesa").click(function(){
		$("#cardMesa").css('display','none');
		$("#cardCategoria").css('display','block'); 
		var num_mesa =  $(this).attr('num_mesa');
		document.getElementById("inputMesa").value = num_mesa;	
	});

	$(".btnCategoria").click(function(){
		$("#cardCategoria").css('display','none');
		$("#cardProduto").css('display','block');  	
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


		});

	});


	$(".btnProduto").click(function(){

		var num_mesa      = document.getElementById("inputMesa").value;
		var id_categoria  =  document.getElementById("inputIdCategoria").value;
		var categoria     =  document.getElementById("inputCategoria").value;
		var id_produto=  $(this).attr('id_produto');
		var produto=  $(this).attr('produto');

		document.getElementById("inputIdProduto").value = id_produto;
		document.getElementById("inputProduto").value = produto;	


	});

</script>