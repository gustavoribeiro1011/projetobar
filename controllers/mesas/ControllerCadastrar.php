<script id="scriptControllerCadastrar">
var url = 'templates/TemplateMasterUpdateContent.php';
var contentTemplateMaster = document.getElementById("contentTemplateMaster");


$("#btnAdicionarMesa").click(function(){
  $('#modalAdicionarMesa').modal('show');
});

$("#botaoAdicionarMesaModal").click(function(){

  var instrucao = "cadastrar mais mesas";
  var qtd_mesas = $("#qtdMesasAdicionar").val();

  $.ajax({
    type: "POST",
    url: '../../models/mesas/ModelCadastrar.php',
    data: {
      instrucao:instrucao,
      qtd_mesas:qtd_mesas
    },
    success: function(data) {
      if(data == 'sucesso'){ 


        if(qtd_mesas==1){alertify.success('<font color="white">Mesa adicionada</font>');}
        else if (qtd_mesas>1){alertify.success('<font color="white">Mesas adicionadas</font>');}



        var request = new XMLHttpRequest();
        request.open("GET", url, true);
        request.addEventListener("readystatechange", function (event) {
          if (request.readyState == 4 && request.status == 200) {
            contentTemplateMaster.innerHTML = request.responseText
            eval(document.getElementById('scriptControllerCadastrar').innerHTML);  
          }
        });
        request.send();

      }else if (data == 'falha'){
        alertify.error('<font color="white">Falha ao adicionar mesas</font>');
      }
    }
  });
  //fim do ajax

});

$("#btnRemoverMesa").click(function(){
  $('#modalRemoverMesa').modal('show');
});

$("#botaoRemoverMesaModal").click(function(){

  var instrucao = "remover mesas";
  var qtd_mesas = $("#qtdMesasRemover").val();

  $.ajax({
    type: "POST",
    url: '../../models/mesas/ModelRemover.php',
    data: {
      instrucao:instrucao,
      qtd_mesas:qtd_mesas
    },
    success: function(data) {
      if(data == 'sucesso'){ 


        if(qtd_mesas==1){alertify.success('<font color="white">Mesa removida</font>');}
        else if (qtd_mesas>1){alertify.success('<font color="white">Mesas removidas</font>');}



        var request = new XMLHttpRequest();
        request.open("GET", url, true);
        request.addEventListener("readystatechange", function (event) {
          if (request.readyState == 4 && request.status == 200) {
            contentTemplateMaster.innerHTML = request.responseText
            eval(document.getElementById('scriptControllerCadastrar').innerHTML);  
          }
        });
        request.send();

      }else if (data == 'falha'){
        alertify.error('<font color="white">Falha ao remover mesas</font>');
      }
    }
  });
  //fim do ajax

});

$("#btnTransicaoRemoverTodasMesas").click(function(){

  $('#modalRemoverMesa').modal('toggle');

 $('#modalRemoverTodasMesas').modal('show');

});

$("#btnCancelarModalRemoverTodasMesas").click(function(){

   $('#modalRemoverTodasMesas').modal('toggle');

});

$("#btnRemoverTodasMesas").click(function(){

  $('#modalRemoverTodasMesas').modal('toggle');

  $.ajax({
    type: "POST",
    url: '../../models/mesas/ModelRemover.php',
    data: {
      instrucao:'remover todas as mesas'
    },
    success: function(data) {

      if(data == 'sucesso'){ 


        alertify.success('<font color="white">Todas as mesas foram removidas</font>');
        

        var request = new XMLHttpRequest();
        request.open("GET", url, true);
        request.addEventListener("readystatechange", function (event) {
          if (request.readyState == 4 && request.status == 200) {
            contentTemplateMaster.innerHTML = request.responseText
            eval(document.getElementById('scriptControllerCadastrar').innerHTML);  
          }
        });
        request.send();

      } else if (data == 'falha'){

        alertify.error('<font color="white">Falha ao remover as mesas</font>');

      } else{

        alertify.error('<font color="white">Erro desconhecido</font>');

      }
    }
  });
  //fim do ajax

});





$("#form-cad-mesa").click(function(){

  var button = document.querySelector("#form-cad-mesa"); 
  
  button.setAttribute("class","btn btn-success btn-circle disabled");

  var qtd_mesas = document.getElementById("qtd_mesas").value;

  if (qtd_mesas > 200){

   $("#alert-warning").fadeIn().show();  

   setTimeout(function() {
     $("#alert-warning").fadeOut();
   }, 4000);

   button.setAttribute("class","btn btn-success btn-circle");


 }else{
  var instrucao = 'cadastrar mesa'; 
  $.ajax({
    type: "POST",
    url: '../../models/mesas/ModelCadastrar.php',
    data: {
      qtd_mesas:qtd_mesas,
      instrucao:instrucao
    },

    success: function(data) {

     if (data == 'sucesso'){


      var request = new XMLHttpRequest();
      request.open("GET", url, true);
      request.addEventListener("readystatechange", function (event) {
        if (request.readyState == 4 && request.status == 200) {
          contentTemplateMaster.innerHTML = request.responseText
          eval(document.getElementById('scriptControllerCadastrar').innerHTML);  
        }
      });
      request.send();

      $("#alert-success").fadeIn().show();  

      setTimeout(function() {
       $("#alert-success").fadeOut();
     }, 4000);

      button.setAttribute("class","btn btn-success btn-circle");



    } else if (data == 'falha'){

      $("#alert-danger").fadeIn().show();  

      setTimeout(function() {
       $("#alert-danger").fadeOut();
     }, 4000);

      button.setAttribute("class","btn btn-success btn-circle");

    }

  } 


});

button.setAttribute("class","btn btn-success btn-circle");


}



});
</script>