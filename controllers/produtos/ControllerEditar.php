<script type="text/javascript" id="scriptControllerTransicaoEditar">

$('.moedaBRL').maskMoney({
thousands: '.', //separador milhar
decimal: ',' // separador decimal
});

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

      var preco = Number(data['preco']).toLocaleString('pt-br', {minimumFractionDigits: 2});    
     

      document.getElementById("id_editar").value = data['id'];

      document.getElementById("produto_editar").value = data['produto'];

      document.getElementById("preco_editar").value = preco;

     // Categoria (FK) 
     var categoriaIdFK   = data['categoria'];     

     var categoriaFK   = data['categoria_nome']; 

     $("#option_categoria").attr('value',categoriaIdFK);

     if(categoriaFK == undefined){categoria = "-- SELECIONE --";}else{categoria = categoriaFK;}  

     $('#option_categoria').prepend('<option id="optionTempCategoria">'+categoria+'</option>');
    
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

  var preco =  document.getElementById("preco_editar").value.replace(".", "").replace(",","."); // replace: converte para formato americano ex. 9999.99;


 
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

      preco:preco  
      
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