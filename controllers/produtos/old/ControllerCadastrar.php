<script id="scriptControllerCadastrar">

var url = 'templates/TemplateMasterUpdateContent.php';

var contentTemplateMaster = document.getElementById("contentTemplateMaster");

$("#botaoCadastrarProduto").click(function(){

  var button = document.querySelector("#botaoCadastrarProduto"); 

  button.setAttribute("class","btn btn-primary disabled"); // desativando o botao enquanto processa

  var produto = $('#produto').val();

  var categoria = $('#categoria').val();

  var precos = new Array();

  $("input[name='preco[]']").each(function(){
  precos.push($(this).val().replace(".", "").replace(",",".")); // replace: converte para formato americano ex. 9999.99
});

  var medidas = new Array();

  $("input[name='medida[]']").each(function(){
    medidas.push($(this).val());
  });

  var unidades_medidas = new Array();

  $("select[name='unidade_medida[]']").each(function(){
    unidades_medidas.push($(this).val());
  });

  //alert("Medida: " + medidas + " | Uni. Med.: " + unidades_medidas + " | Preços: " + precos);

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

        precos:precos,

        medidas:medidas,
        
        unidades_medidas:unidades_medidas

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

<script id="scriptVariacaoCadastrar">

var qtdeCampos = 0;

var qtdeVariacao = 0;


   $('.moedaBRL').maskMoney({ // Plugin mask money para formatar moeda

      thousands: '.', //separador milhar

      decimal: ',' // separador decimal

    });


function addCampos() {
 
  var objPai = document.getElementById("campoPai");

var objFilho = document.createElement("div"); //Criando o elemento DIV;

objFilho.setAttribute("id","filho"+qtdeCampos); //Definindo atributos ao objFilho:

objPai.appendChild(objFilho); //Inserindo o elemento no pai:

document.getElementById("filho"+qtdeCampos).innerHTML = 

"<div class='card border-left-primary shadow h-100 py-0'>"+

"<div class='card-body'>"+

"<div class='text-right'>"+

"<button type='button' class='btn btn-light' onClick='removerCampo("+qtdeCampos+")'><i class='fas fa-minus'></i></button>"+

"</div>"+

"<label>Unidade de medida</label>"+ //Unidade de Medida

"<div class='input-group mb-3'>"+

"<input type='text' class='form-control' id='medida"+qtdeCampos+"' name='medida[]'>" +

"<div class='col-5'><select class='form-control' name='unidade_medida[]'>"+

"<option value='un'>UN</option>"+

"<option value='l'>L</option>"+

"<option value='ml'>ML</option></select></div>" +

"<div class='input-group-prepend'>"+

"</div></div>"+

"<label>Preço</label>"+ //Preco

"<div class='input-group mb-3'>"+

"<div class='input-group-prepend'>"+

"<span class='input-group-text'>R$</span>"+

"</div>"+

"<input type='text' class='form-control moedaBRL' name='preco[]' aria-label='Preço'>"+

"</div>"+

"</div></div><br>";

qtdeCampos++; //Escrevendo algo no filho recém-criado:

qtdeVariacao++;

 } 

 function removerCampo(id) {

  var objPai = document.getElementById("campoPai");

  var objFilho = document.getElementById("filho"+id);

var removido = objPai.removeChild(objFilho); //Removendo o DIV com id específico do nó-pai:

qtdeVariacao--;

}

</script>




