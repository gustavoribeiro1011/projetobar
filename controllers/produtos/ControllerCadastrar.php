
<!-- SCRIPT: Controller Cadastrar -->
<script id="scriptControllerCadastrar">
$(function() {
  $('.moedaBRL').maskMoney({
      thousands: '.', //separador milhar
      decimal: ',' // separador decimal
    });
})

var url = 'templates/TemplateMasterUpdateContent.php';
var contentTemplateMaster = document.getElementById("contentTemplateMaster");

$("#botaoCadastrarProduto").click(function(){

  var button = document.querySelector("#botaoCadastrarProduto"); 

  button.setAttribute("class","btn btn-primary disabled"); // desativando o botao enquanto processa



  var produto = $('#produto').val();
  var categoria = $('#categoria').val();
  var preco = $('#preco').val().replace(".", "").replace(",","."); // converte para formato americano ex. 9999.99


  if (!produto){ // se variavel for vazia
    alertify.warning('<font color="#6D6F76">O campo <b>produto</b> precisa ser preenchido</font>');
    button.setAttribute("class","btn btn-primary");

  }else{

  if (!categoria){ // se variavel for vazia

    alertify.warning('<font color="#6D6F76">O campo <b>categoria</b> precisa ser preenchido</font>');
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
            eval(document.getElementById('scriptControllerMain').innerHTML);              
            eval(document.getElementById('scriptMaskMoney').innerHTML); 
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
        alertify.success('<font color="white">Produto cadastrado</font>');
        button.setAttribute("class","btn btn-primary");
      } else if (data == 'falha'){
        alertify.error('<font color="white">Falha ao editar</font>');
        button.setAttribute("class","btn btn-primary");
      }
    } 
  });
button.setAttribute("class","btn btn-primary");

}


}


});
</script>




