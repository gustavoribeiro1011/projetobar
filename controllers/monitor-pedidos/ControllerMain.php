<script>

$(".btnAlteraStatusParaConcluido").click(function(){ 

	var instrucao = 'alterar status para concluido';
	var num_pedido	  =  $(this).attr('num_pedido');

	$.ajax({
		type: "POST",
		url: '../../models/monitor-pedidos/ModelProcessaInstrucoes.php',
		data: {
			instrucao:instrucao,
			num_pedido:num_pedido	
		},
		success: function(data) {

			if (data == 'sucesso'){

    	alertify.success('<font color="white">Status alterado com sucesso</font>');
    	location.reload(); // dar um reload na página

    }else if (data == 'falha'){

    	alertify.error('<font color="white">Falha ao alterar status</font>');

    } else {

    	alertify.error('<font color="white">Erro desconhecido</font>');
    }
}

});//fim ajax


});
</script>