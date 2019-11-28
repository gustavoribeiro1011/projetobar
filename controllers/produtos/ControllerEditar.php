<script type="text/javascript" id="scriptControllerTransicaoEditar">

var qtdeCamposEditar = 0;

var qtdeVariacaoEditar = 0;

function addCamposEditar() {

  var objPaiEditar = document.getElementById("campoPaiEditar");

var objFilhoEditar = document.createElement("div"); //Criando o elemento DIV;

objFilhoEditar.setAttribute("id","filhoEditar"+qtdeCamposEditar); //Definindo atributos ao objFilhoEditar:

objPaiEditar.appendChild(objFilhoEditar); //Inserindo o elemento no pai:

document.getElementById("filhoEditar"+qtdeCamposEditar).innerHTML = 

"<div class='card border-left-primary shadow h-100 py-0'>"+

"<div class='card-body'>"+

"<div class='text-right'>"+

"<button type='button' class='btn btn-light' onClick='removerCampoEditar("+qtdeCamposEditar+")'><i class='fas fa-minus'></i></button>"+

"</div>"+

"<label>Unidade de medida</label>"+//Unidade de Medida

"<div class='input-group mb-3'>"+

"<input type='text' class='form-control' id='medida"+qtdeCamposEditar+"' name='medida_adicionar[]'>" +

"<div class='col-5'><select class='form-control' name='unidade_medida_adicionar[]'>"+

"<option value='un'>UN</option>"+

"<option value='l'>L</option>"+

"<option value='ml'>ML</option></select></div>" +

"<div class='input-group-prepend'>"+

"</div></div>"+

"<label>Preço</label>"+//Preco

"<div class='input-group mb-3'>"+

"<div class='input-group-prepend'>"+

"<span class='input-group-text'>R$</span>"+

"</div>"+

"<input type='text' class='form-control moedaBRL' name='preco_adicionar[]' aria-label='Preço'>"+

"</div>"+

"</div></div><br>";

qtdeCamposEditar++; //Escrevendo algo no filho recém-criado:

qtdeVariacaoEditar++;

$('.moedaBRL').maskMoney({
thousands: '.', //separador milhar
decimal: ',' // separador decimal
});

} 

function removerCampoEditar(id) {

  var objPaiEditar = document.getElementById("campoPaiEditar");

  var objFilhoEditar = document.getElementById("filhoEditar"+id);

var removido = objPaiEditar.removeChild(objFilhoEditar); //Removendo o DIV com id específico do nó-pai:

qtdeVariacaoEditar--;

}// fim adicionar variantes

var url = 'templates/TemplateMasterUpdateContent.php';

var contentTemplateMaster = document.getElementById("contentTemplateMaster");

$(".botaoEditarProdutoTransicao").click(function(){ // quando clicar no botao editar produto

  $(".cardVariacaoEditar").css('display','block'); // exibe o formulário de variações de produto

  $(".FormularioCadastrarProduto").css('display','none'); // oculta o formulário de cadastro

  $(".FormularioEditarProduto").css('display','block'); // exibe o formulário de edição

  $('#optionTempCategoria').remove(); // se existir algum option com esse id, faz a remoção para nao dar conflito

  $('#optionTempUnidadeMedida').remove(); // se existir algum option com esse id, faz a remoção para nao dar conflito

  var idproduto = $(this).attr('idproduto');  // resgata o 'id' do produto que é passado via atributo no 'botao editar'

  $.ajax({ // faz a transição para preencher os inputs 

    type: "POST", // usamos o método post para enviar o 'id' do produto 

    url: '../../models/produtos/ModelTransicaoEditar.php', // caminho no server para o 'Modelo de Transicao do Form. Editar'

    data: { 

      idproduto:idproduto // aqui é os parametros a ser enviado

    },

    success: function(data) {

      var formato = { minimumFractionDigits: 2 }

      document.getElementById("id_editar").value = data['id'];

      document.getElementById("produto_editar").value = data['produto'];

     // Categoria (FK) 
     var categoriaIdFK   = data['categoria'];     

     var categoriaFK   = data['categoria_nome']; 

     $("#option_categoria").attr('value',categoriaIdFK);

     if(categoriaFK == undefined){categoria = "-- SELECIONE --";}else{categoria = categoriaFK;}  

     $('#option_categoria').prepend('<option id="optionTempCategoria">'+categoria+'</option>');

      //exibe Variaçao Editar
      $.post("<?php echo BASEURL; ?>views/produtos/templates/VariacaoEditar.php",
      {
        idproduto:idproduto
      },
      function (resultado){

        $('#includeVariacaoEditar').html(resultado); // faz a inclusao do template Variacao Editar

        $('.moedaBRL').maskMoney({
      thousands: '.', //separador milhar
      decimal: ',' // separador decimal
    });

        $(".btnRemoverCampo").click(function(){  // quando clicar no botao de remove campo no form. da variacao

         var id_card_variacao =  $(this).attr('id_card_variacao');

         var id_unidade_medida = $(this).attr('id_unidade_medida');

         var id_preco = $(this).attr('id_preco');

         //alert('id_unidade_medida=> ' + id_unidade_medida + " | id_card_variacao=> " + id_card_variacao + " | id_preco=> "+id_preco)

         //roda o ajax que faz a remoção no banco de dados

         var instrucao = "remover variacao";

         $.ajax({

          type: "POST",

          url: '../../models/produtos/ModelExcluir.php',

          data: {

            instrucao:instrucao,

            id_unidade_medida:id_unidade_medida,

            id_preco:id_preco

          },

          success: function(data) {

            if(data == 'sucesso'){  

             $('#cardVariacao'+id_card_variacao).remove();

             alertify.success('<font color="white">Variação de produto excluído</font>'); 

           }else if (data == 'falha'){

            alertify.error('<font color="white">Falha ao remover item</font>');

          }

        }

  });//fim do ajax

       });

});

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

<script type="text/javascript" id="scriptControllerEditar">

$(".botaoEditarProduto").click(function(){

  var url = 'templates/TemplateMasterUpdateContent.php';

  var contentTemplateMaster = document.getElementById("contentTemplateMaster");

  //Resgatando os valores dos inputs do formulário

  var idproduto = document.getElementById("id_editar").value;

  var produto =  document.getElementById("produto_editar").value;

  var categoria =  document.getElementById("categoria_editar").value;

//UPDATE
var id_medidas = new Array();

var arr_medidas = new Array();

var arr_unidades_medidas = new Array();

var id_precos = new Array();

var arr_precos = new Array();

$("input[id_medida]").each(function(){
  id_medidas.push($(this).attr("id_medida")); // replace: converte para formato americano ex. 9999.99
});  

$("input[name='medida_editar[]']").each(function(){
  arr_medidas.push($(this).val()); // replace: converte para formato americano ex. 9999.99
});
$("select[name='unidade_medida_editar[]']").each(function(){
  arr_unidades_medidas.push($(this).val()); // replace: converte para formato americano ex. 9999.99
});

$("input[id_preco]").each(function(){
  id_precos.push($(this).attr("id_preco")); // replace: converte para formato americano ex. 9999.99
});  

$("input[name='preco_editar[]']").each(function(){
  arr_precos.push($(this).val().replace(".", "").replace(",",".")); // replace: converte para formato americano ex. 9999.99
});

  //INSERT

  var arr_medidas_adicionar = new Array();

  var arr_unidades_medidas_adicionar = new Array();

  var arr_precos_adicionar = new Array();

  $("input[name='medida_adicionar[]']").each(function(){
  arr_medidas_adicionar.push($(this).val()); // replace: converte para formato americano ex. 9999.99
});

  $("select[name='unidade_medida_adicionar[]']").each(function(){
  arr_unidades_medidas_adicionar.push($(this).val()); // replace: converte para formato americano ex. 9999.99
});

  $("input[name='preco_adicionar[]']").each(function(){
  arr_precos_adicionar.push($(this).val().replace(".", "").replace(",",".")); // replace: converte para formato americano ex. 9999.99
});

if (arr_medidas_adicionar.length === 0){ /*se nao foi adicinado nenhuma variante*/ } else {

//se foi adicionado nova variante roda ajax que cadastra nova variante

$.ajax({

  type: "POST",

  url: '../../models/produtos/ModelCadastrarVariante.php',

  data: {

    idproduto:idproduto, 

    arr_medidas_adicionar:arr_medidas_adicionar,

    arr_unidades_medidas_adicionar:arr_unidades_medidas_adicionar,

    arr_precos_adicionar:arr_precos_adicionar   

  },
  success: function(data) {     

    if(data == 'sucesso'){} else if (data == 'falha'){

      alertify.error('<font color="white">Falha ao adicionar variante</font>');

    }
  }   
});

}


if(!produto){ // se variavel 'produto' é vazio

  alertify.warning('<font color="#6D6F76">O campo <b>produto</b> precisa ser preenchido</font>');

} else {

  $.ajax({

    type: "POST",

    url: '../../models/produtos/ModelEditar.php',

    data: {

      idproduto:idproduto,

      produto:produto,

      categoria:categoria,

      id_medidas:id_medidas,

      arr_medidas:arr_medidas,

      arr_unidades_medidas:arr_unidades_medidas,

      id_precos:id_precos,

      arr_precos:arr_precos   
      
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