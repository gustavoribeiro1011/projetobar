<!-- SCRIPT: Controller Cadastrar -->
<script id="scriptControllerCadastrar">
  var url = 'templates/TemplateMasterUpdateContent.php';
  var contentTemplateMaster = document.getElementById("contentTemplateMaster");
  $("#botaoCadastrarCategoria").click(function(){
    var button = document.querySelector("#botaoCadastrarCategoria"); 
  button.setAttribute("class","btn btn-primary disabled"); // desativando o botao enquanto processa
  var categoria = document.getElementById("categoria").value;
  if (!categoria){ // se variavel for vazia
   $("#alert-warning").fadeIn().show();  
   setTimeout(function() {
     $("#alert-warning").fadeOut();
   }, 4000);
   button.setAttribute("class","btn btn-primary");
 }else{
  $.ajax({
    type: "POST",
    url: '../../models/categorias/ModelCadastrar.php',
    data: {
      categoria:categoria
    },
    success: function(data) {
     if (data == 'sucesso'){
      var request = new XMLHttpRequest();
      request.open("GET", url, true);
      request.addEventListener("readystatechange", function (event) {
        if (request.readyState == 4 && request.status == 200) {
          contentTemplateMaster.innerHTML = request.responseText
          eval(document.getElementById('scriptDataTable').innerHTML);  
          eval(document.getElementById('scriptControllerCadastrar').innerHTML);  
          eval(document.getElementById('scriptControllerTransicaoEditar').innerHTML);  
          eval(document.getElementById('scriptControllerEditar').innerHTML); 
          eval(document.getElementById('scriptControllerEditarCancelar').innerHTML);           
          eval(document.getElementById('scriptControllerExcluir').innerHTML);  
          eval(document.getElementById('scriptControllerExcluirTransicao').innerHTML);    
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



