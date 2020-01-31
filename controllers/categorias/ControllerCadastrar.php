<!-- SCRIPT: Controller Cadastrar -->
<script id="scriptControllerCadastrar">
  var url = 'templates/TemplateMasterUpdateContent.php';
  var contentTemplateMaster = document.getElementById("contentTemplateMaster");
  $("#botaoCadastrarCategoria").click(function(){
    var button = document.querySelector("#botaoCadastrarCategoria"); 
  button.setAttribute("class","btn btn-primary disabled"); // desativando o botao enquanto processa
  var categoria = document.getElementById("categoria").value;
  var icone = document.getElementById("inputIconeEditar").value; 
  if (!categoria){ // se variavel for vazia
   $("#alert-warning").fadeIn().show();  
   setTimeout(function() {
     $("#alert-warning").fadeOut();
   }, 4000);
   button.setAttribute("class","btn btn-primary");
 }else{

  //alert("antes de cadastrar vou te passar o nome do icone,lá vai...");
  //alert(icone);
  
  $.ajax({
    type: "POST",
    url: '../../models/categorias/ModelCadastrar.php',
    data: {
      categoria:categoria,
      icone:icone      
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
          eval(document.getElementById('scriptControllerVerificaProdutosVinculados').innerHTML);            
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



  $( "#divPaiCollapseCadastrar" ).append(
    "<div id='divFilhoCollapseCadastrar'>"+
    "<h1 id='labelAdicionarIcone'><a class='btn btn-light' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample'>"+
    "<i class='fas fa-plus'></i> Adicionar ícone"+
    "</a></h1>"+
    "</p>"+
    "<div class='collapse' id='collapseExample'>"+
    "<div class='card card-body'>"+
    "<h3>"+
    <?php include('../../views/categorias/icones/icones.php');?>           
    "</h3>"+
    "</div>"+
    "</div>"+
    "<input type='text' id='inputIconeEditar' class='form-control' style='display:none;'>"+
    "</div>"
    );

  $(".link_icone").click(function(){

    if(document.getElementById("labelAdicionarIcone") !== null)
    {

          document.getElementById('labelAdicionarIcone').remove(); // remove a label: '+ Adicionar Icone'
        }

        if(document.getElementById("iconeEscolhido") !== null)
        {

          document.getElementById('iconeEscolhido').remove(); 
        }
        
        var ico_name_editar=$(this).attr('attr_ico_name');

        $("#inputIconeEditar").val(ico_name_editar);

        $('.collapse').collapse('hide');

        $( "#divPaiCollapseCadastrar" ).append("<h1 id='iconeEscolhido'><a class='btn btn-primary' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample'>"+
          "<i class='"+ico_name_editar+"'></i>"+
          "</a></h1>");

      });




    </script>




