<script>

$(".periodoExibicao").click(function(){ 
	var periodoExibicao = $(this).attr('periodoExibicao');

	var instrucao = 'periodoExibicao';

	$.ajax({
		type: "POST",
		url: '../../models/monitor-pedidos/ModelProcessaInstrucoes.php',
		data: {
			instrucao:instrucao,
			periodoExibicao:periodoExibicao		
		},
		success: function(data) {

			if (data == 'sucesso'){

				location.reload();

			}else if (data == 'falha'){

				alertify.error('<font color="white">Falha</font>');

			} else {

				alertify.error('<font color="white">Falha desconhecida</font>');
			}
		}

});//fim ajax


});

$('#formPeriodoExibicao').on('submit', function () {
	var instrucao = 'periodoExibicao';
	var periodoExibicao = 'personalizado';
	var d1 = $(this).find('input[id=d1]').val();
	var d2 = $(this).find('input[id=d2]').val();


	$.ajax({
		type: "POST",
		url: '../../models/monitor-pedidos/ModelProcessaInstrucoes.php',
		data: {
			instrucao:instrucao,
			periodoExibicao:periodoExibicao,
			d1:d1,
			d2:d2		
		},
		success: function(data) {

			if (data == 'sucesso'){

				location.reload();

			}else if (data == 'falha'){

				alertify.error('<font color="white">Falha</font>');

			} else {

				alertify.error('<font color="white">Falha desconhecida</font>');
			}
		}

});//fim ajax



});



</script>