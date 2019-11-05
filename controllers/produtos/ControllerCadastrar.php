<!-- SCRIPT: Controller Cadastrar -->
<script id="scriptControllerCadastrar">

var url = 'templates/TemplateMasterUpdateContent.php';
var contentTemplateMaster = document.getElementById("contentTemplateMaster");

$("#botaoCadastrarProduto").click(function(){

  var button = document.querySelector("#botaoCadastrarProduto"); 

  button.setAttribute("class","btn btn-primary disabled"); // desativando o botao enquanto processa

  var produto = document.getElementById("produto").value;
  var categoria = document.getElementById("categoria").value;
  var preco = document.getElementById("preco").value;
  
  if (!produto){ // se variavel for vazia

   $("#alertaAvisoCadastrar").fadeIn().show();  
   setTimeout(function() {
     $("#alertaAvisoCadastrar").fadeOut();
   }, 4000);
   button.setAttribute("class","btn btn-primary");

 }else{

  if (!categoria){ // se variavel for vazia

    $("#alertaAviso2Cadastrar").fadeIn().show();  
    setTimeout(function() {
     $("#alertaAviso2Cadastrar").fadeOut();
   }, 4000);
    button.setAttribute("class","btn btn-primary");

  } else{


    $.ajax({
      type: "POST",
      url: '../../models/produtos/ModelCadastrar.php',
      data: {
        produto:produto,
        categoria:categoria,
        preco:preco
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
        $("#alertaSucessoCadastrar").fadeIn().show();
        setTimeout(function() {
         $("#alertaSucessoCadastrar").fadeOut();
       }, 4000);
        button.setAttribute("class","btn btn-primary");
      } else if (data == 'falha'){
        $("#alertaFalhaCadastrar").fadeIn().show();  
        setTimeout(function() {
         $("#alertaFalhaCadastrar").fadeOut();
       }, 4000);
        button.setAttribute("class","btn btn-primary");
      }
    } 
  });
button.setAttribute("class","btn btn-primary");

}


}


});
</script>




