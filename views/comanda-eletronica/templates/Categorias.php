<div class="col-sm-12 md-6" id="cardCategoria" style="display:none;">
  <div class="card shadow">


   <div class="card-body">

    <div class="row" style="max-width: 100%">

      <?php
      if(!@include_once('../../../config.php')) {
  // do something
      }

      $sql="SELECT * FROM categorias ORDER BY id";

      if ($result=mysqli_query($conecta,$sql))
      {
        ?>


        <?php if ( $_SESSION['cardresumomesa'.$app_token] == 'ativo' ) {?>
        <!-- volta para resumo mesa -->
          <div class="col-md-6 col-xl-3">
           <div class="card">
            <button class="btn btn-primary btn-block btnVoltarParaResumoMesa">
              <div align="left"><i class="fas fa-arrow-left"></i> VOLTAR  resumo mesa</div>
            </button>
          </div>
        </div>

      <?php } else if ( $_SESSION['cardresumopedido'.$app_token] == 'ativo' ) {?>
        <!-- volta para resumo pedido -->
          <div class="col-md-6 col-xl-3">
           <div class="card">
            <button class="btn btn-primary btn-block btnVoltarParaTelaResumoPedido">
              <div align="left"><i class="fas fa-arrow-left"></i> VOLTAR resumo pedido</div>
            </button>
          </div>
        </div>
     <?php } else { ?>
         <!-- volta para mesas -->
        <div class="col-md-6 col-xl-3">
         <div class="card">
          <button class="btn btn-primary btn-block btnVoltarParaMesas">
            <div align="left"><i class="fas fa-arrow-left"></i> VOLTAR padrão</div>
          </button>
        </div>
      </div>
    <?php } ?>

    <?php
    while ($row=mysqli_fetch_assoc($result))
    {

      if( !isset($row['icone'])){
        $icone="";
      }else {
        $icone="<i class='".$row['icone']."'></i>";
        $icone.=" ";
      }

      ?>
      <div class="col-md-6 col-xl-3">
       <div class="card">
        <button class="btn btn-primary btn-block btnCategoria" 
        id_categoria="<?php echo $row['id']; ?>"
        categoria="<?php echo $row['categoria']; ?>"
        >
        <div align="left">
          <?php echo $icone.strtoupper($row['categoria']);?>
        </div>
      </button>
    </div>
  </div>

<?php     }


mysqli_free_result($result);
}


?>
</div>


</div>
</div>
</div>

<script>

  $(".btnVoltarParaResumoMesa").click(function(){ 

    StopAtualizaDados();     


    setTimeout(function() {
      $("#cardMesa").fadeOut();
    }, 150  );

    setTimeout(function() {
      $("#cardCategoria").fadeOut();
    }, 150  );

    setTimeout(function() {
      $(".cardNumeroPedido").fadeOut();
    }, 150  );


    var num_pedido = $("#inputPedido").val();
    var num_mesa =  $("#inputMesa").val();
       


          //exibe o resumo mesa
          $.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/ResumoMesa.php",
          {
            num_mesa:num_mesa
          },
          function (resultado){
            $('#includeResumoMesa').html(resultado);
            eval(document.getElementById('scriptControllerCapturaDados').innerHTML);  
            eval(document.getElementById('scriptDataTable').innerHTML); 

          });


          // cadastra mesa na tabela pedidos na coluna principal do pedido.
          var instrucao = 'cadastra mesa';
          $.ajax({
            type: "POST",
            url: '../../models/comanda-eletronica/ModelCadastraMesa.php',
            data: {
              num_pedido:num_pedido,
              num_mesa:num_mesa,
              instrucao:instrucao
            },
            success: function(data) {

              if (data == 'sucesso'){

      //alertify.success('<font color="white">"num_mesa" cadastrada com sucesso</font>');

    }else if (data == 'falha'){

      //alertify.error('<font color="white">Falha ao cadastrar "num_mesa" na tabela "pedidos"</font>');

    } else {

      alertify.error('<font color="white">Erro desconhecido ao cadastrar numero da mesa na tabela pedidos</font>');
    }
  }

});//fim ajax




          setTimeout(function() {
            $("#cardResumoMesa").fadeIn();
          }, 650  );


        });


    $(".btnVoltarParaTelaResumoPedido").click(function(){ 

       StopAtualizaDados(); 

          setTimeout(function() {
      $("#cardCategoria").fadeOut();
    }, 150  );


      var num_pedido = $("#inputPedido").val();
      var num_mesa = $("#inputMesa").val();

      $('#spanMesa').text(num_mesa);
      $('#inputPedido').val(num_pedido);
      $('#inputMesa').val(num_mesa);


//exibe o resumo do pedido
$.post("<?php echo BASEURL; ?>views/comanda-eletronica/templates/ResumoPedido.php",
{
  num_pedido:num_pedido
},
function (resultado){
  $('#includeResumoPedido').html(resultado);
  eval(document.getElementById('scriptControllerCapturaDados').innerHTML);  
  eval(document.getElementById('scriptDataTable').innerHTML); 

});

$("#spanPedido").html(num_pedido);

setTimeout(function() {
  $("#cardResumoPedido").fadeIn();
}, 600  );




});




      </script>


