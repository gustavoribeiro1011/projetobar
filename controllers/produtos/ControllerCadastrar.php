<script>
var url = 'templates/FormularioExibir.php';
var contentExibirProdutos = document.getElementById("contentExibirProdutos");

$("#botaoCadastrarProduto").click(function(){

  var button = document.querySelector("#botaoCadastrarProduto"); 
  
  button.setAttribute("class","btn btn-primary disabled"); // desativando o botao enquanto processa

  var produto = document.getElementById("produto").value;

  if (!produto){ // se variavel for vazia

   $("#alert-warning").fadeIn().show();  

   setTimeout(function() {
     $("#alert-warning").fadeOut();
   }, 4000);

   button.setAttribute("class","btn btn-primary");


 }else{

  $.ajax({
    type: "POST",
    url: '../../models/produtos/ModelCadastrar.php',
    data: {
      produto:produto
    },

    success: function(data) {

     if (data == 'sucesso'){

      var request = new XMLHttpRequest();
      request.open("GET", url, true);
      request.addEventListener("readystatechange", function (event) {
        if (request.readyState == 4 && request.status == 200) {
          contentExibirProdutos.innerHTML = request.responseText
          eval(document.getElementById('scriptDataTable').innerHTML);
          eval(document.getElementById('scriptControllerEditar').innerHTML);          
        }
      });
      request.send();

      $("#alert-success").fadeIn().show();  

      setTimeout(function() {
       $("#alert-success").fadeOut();
     }, 4000);

      button.setAttribute("class","btn btn-primary");



    } else if (data == 'falha'){

      $("#alert-danger").fadeIn().show();  

      setTimeout(function() {
       $("#alert-danger").fadeOut();
     }, 4000);

      button.setAttribute("class","btn btn-primary");

    }

  } 


});

button.setAttribute("class","btn btn-primary");


}



});
</script>




  