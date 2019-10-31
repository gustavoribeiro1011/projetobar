<script>
var url = 'templates/FormularioExibir.php';
var contentExibirMesas = document.getElementById("contentExibirMesas");

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

  $.ajax({
    type: "POST",
    url: '../../models/mesas/ModelCadastrar.php',
    data: {
      qtd_mesas:qtd_mesas
    },

    success: function(data) {

     if (data == 'sucesso'){

      var request = new XMLHttpRequest();
      request.open("GET", url, true);
      request.addEventListener("readystatechange", function (event) {
        if (request.readyState == 4 && request.status == 200) {
          contentExibirMesas.innerHTML = request.responseText
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