<!-- SCRIPT: Controller Transicao Editar -->
<script type="text/javascript" id="scriptControllerTransicaoEditar">
//SCRIPT: Controller Transicao Editar 
$(".botaoEditarProdutoTransicao").click(function(){




  $('#optionTempCategoria').remove(); 
  $('#optionTempUnidadeMedida').remove(); 

  $(".FormularioCadastrarProduto").css('display','none');
  $(".FormularioEditarProduto").css('display','block'); 
  var idproduto = $(this).attr('idproduto'); 
  $.ajax({
    type: "POST",
    url: '../../models/produtos/ModelTransicaoEditar.php',
    data: {
      idproduto:idproduto
    },
    success: function(data) {

      var formato = { minimumFractionDigits: 2 }

      document.getElementById("id_editar").value = data['id'];
      document.getElementById("produto_editar").value = data['produto'];
      document.getElementById("preco_editar").value = (parseFloat(data['preco'])).toLocaleString('pt-BR',formato); //converte para formato brasileiro ex. 9.999,99
      document.getElementById("medida_editar").value = data['medida'];


            // Categoria (FK) 
            var categoriaIdFK   = data['categoria'];      
            var categoriaFK   = data['categoria_nome']; 
            $("#option_categoria").attr('value',categoriaIdFK);
            if(categoriaFK == undefined){categoria = "-- SELECIONE --";}else{categoria = categoriaFK;}    
            $('#option_categoria').prepend('<option id="optionTempCategoria">'+categoria+'</option>');


            // Unidade de Medida (FK) 
            var id_unidade_medida_FK   = data['id_unidade_medida'];      
            var unidade_medida_FK   = data['unidade_medida']; 
            $("#option_unidade_medida").attr('value',id_unidade_medida_FK);
            if(unidade_medida_FK == undefined){unidade_medida = "-- SELECIONE --";}else{unidade_medida = unidade_medida_FK;}    
            $('#option_unidade_medida').prepend('<option id="optionTempUnidadeMedida">'+unidade_medida.toUpperCase()+'</option>');

            

          },
          dataType:"json"
        });
});

</script>


<script type="text/javascript" id="scriptControllerEditarCancelar">
$(".botaoCancelarProduto").click(function(){
  $(".FormularioCadastrarProduto").css('display','block');
  $(".FormularioEditarProduto").css('display','none');  
});
</script>

<!-- SCRIPT: Controller Editar -->
<script type="text/javascript" id="scriptControllerEditar">
//SCRIPT: Controller Editar 
$(".botaoEditarProduto").click(function(){
  var url = 'templates/TemplateMasterUpdateContent.php';
  var contentTemplateMaster = document.getElementById("contentTemplateMaster");
  var idproduto = document.getElementById("id_editar").value;
  var produto =  document.getElementById("produto_editar").value;
  var categoria =  document.getElementById("categoria_editar").value;
  var preco =  $('#preco_editar').val().replace(".", "").replace(",","."); // converte para formato americano ex. 9999.99
  var unidade_medida =  document.getElementById("unidade_medida_editar").value;
  var medida = document.getElementById("medida_editar").value;


if(!produto){ // se variavel é vazia
  alertify.warning('<font color="#6D6F76">O campo <b>produto</b> precisa ser preenchido</font>');
} else {
  $.ajax({
    type: "POST",
    url: '../../models/produtos/ModelEditar.php',
    data: {
      idproduto:idproduto,
      produto:produto,
      categoria:categoria,
      preco:preco,
      unidade_medida:unidade_medida,
      medida:medida
    },
    success: function(data) {
      if(data == 'sucesso'){
        var request = new XMLHttpRequest();
        request.open("GET", url, true);
        request.addEventListener("readystatechange", function (event) {
          if (request.readyState == 4 && request.status == 200) {
            contentTemplateMaster.innerHTML = request.responseText
            eval(document.getElementById('scriptControllerMain').innerHTML);             
            eval(document.getElementById('scriptMaskMoney').innerHTML); 
            eval(document.getElementById('scriptDataTable').innerHTML);  
            eval(document.getElementById('scriptControllerTransicaoEditar').innerHTML); 
            eval(document.getElementById('scriptControllerEditar').innerHTML);  
            eval(document.getElementById('scriptControllerEditarCancelar').innerHTML);   
            eval(document.getElementById('scriptControllerCadastrar').innerHTML);   
            eval(document.getElementById('scriptControllerExcluir').innerHTML);  
            eval(document.getElementById('scriptControllerExcluirTransicao').innerHTML);    
          }
        });
        request.send(); 
        alertify.success('<font color="white">Editado com sucesso</font>');
      }else if (data == 'falha'){
        alertify.error('<font color="white">Falha ao editar</font>');
      }
    }   
  });
}
});
</script>

