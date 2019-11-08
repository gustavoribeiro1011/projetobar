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

$("#btn-voltar-categoria").click(function(){
	setTimeout(function() {
		$("#cardProduto").fadeOut();
	}, 150);
	setTimeout(function() {
		$("#cardCategoria").fadeIn();
	}, 500	);
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