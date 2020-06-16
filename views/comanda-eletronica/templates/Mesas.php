      <?php
      session_start();

      

        if(!@include_once('../../../config.php')) {
        }

       //SETA TODOS OS CARDS PARA INATIVO
       $_SESSION['cardresumomesa'.$app_token] = 'inativo';
       $_SESSION['cardresumopedido'.$app_token] = 'inativo';


$valor = isset( $_SESSION['cardmesa'.$app_token] ) ?  : $_SESSION['cardmesa'.$app_token] = 'ativo' ;


        if ( $_SESSION['cardmesa'.$app_token] == 'ativo'){

  ?>
<div class="col-xl-12 col-lg-12" id="cardMesa" >
  <div class="card shadow mb-4">

         <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Selecione uma mesa</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fas fa-circle" id="iconeAtualizando" style="display:none;"></i> 
          </a>
        </div>
      </div>

   <div class="card-body">
    <div class="col-auto">
      <div class="row" >
  
<?php
        $sql="SELECT * FROM mesas a 
        left join usuarios b on a.usuario=b.id ORDER BY a.num_mesa ASC";
        if ($result=mysqli_query($conecta,$sql))
        {
          $i='0';

          while ($row=mysqli_fetch_assoc($result))
          {
            $i++;

            if ($row['status'] == 'disponivel'){
              ?>

              <!-- Desktop/Tablet-->
              <div class=" desktop" align="center">
                <div class="card" style="width:180px;">
                  <button class="btn btn-success  btn-block btnMesa" num_mesa="<?=$row['num_mesa'];?>">
                    <span>Mesa</span>            
                    <div style="font-size:30px"><b><?php echo $row['num_mesa']; ?></b></div> 
                    <span>Disponível</span>
                  </button>
                </div>
              </div>

              <!-- Mobile -->
              <div class="mobile" align="center">
                <div class="card" style="width:110px;">
                  <button class="btn btn-success  btn-block btnMesa" num_mesa="<?=$row['num_mesa'];?>">
                    <span style="font-size:10px;">Mesa</span> 
                    <div style="font-size:15px;"><b><?php echo $row['num_mesa']; ?></b></div> 
                    <span style="font-size:10px;">Disponível</span>
                  </button>
                </div>
              </div>
              <?php
            } else if ($row['status'] == 'indisponivel'){

        
              if ( ($row['id']) == ( $_SESSION['id'.$app_token] ) ){
                ?>
       


              <!-- Desktop/Tablet-->
              <div class="desktop" align="center">
                <div class="card" style="width:180px;">
                  <button class="btn btn-primary btn-block btnResumoMesa" num_mesa="<?=$row['num_mesa'];?>">
                   <span>Mesa</span>            
                    <div style="font-size:30px"><b><?php echo $row['num_mesa']; ?></b></div>
                    <span><i class="fas fa-user"></i> <?=ucfirst(strtolower($_SESSION['login_nome'.$app_token]));?></span> 
                  </button>
                </div>
              </div>

              <!-- Mobile -->
              <div class="mobile" align="center">
                <div class="card" style="width:110px;">
                  <button class="btn btn-primary  btn-block btnResumoMesa" num_mesa="<?=$row['num_mesa'];?>">
                    <span style="font-size:10px;">Mesa</span>
                    <div style="font-size:15px;"><b><?php echo $row['num_mesa']; ?></b></div> 
                      <span style="font-size:10px;"><i class="fas fa-user"></i> <?=ucfirst(strtolower($row['nome']));?></span> 
                  </button>
                </div>
              </div>


              <?php
              } else {

?>


              <!-- Desktop/Tablet-->
              <div class="desktop" align="center">
                <div class="card" style="width:180px;">
                  <button class="btn btn-danger btn-block btnResumoMesa" num_mesa="<?=$row['num_mesa'];?>" disabled>
                    <span>Mesa</span>            
                    <div style="font-size:30px"><b><?php echo $row['num_mesa']; ?></b></div>
                    <span><i class="fas fa-user"></i> <?=ucfirst(strtolower($row['nome']));?></span> 
                  </button>
                </div>
              </div>

              <!-- Mobile -->
              <div class="mobile" align="center">
                <div class="card" style="width:110px;">
                  <button class="btn btn-danger  btn-block btnResumoMesa" num_mesa="<?=$row['num_mesa'];?>" disabled>
                    <span style="font-size:10px;">Mesa</span>
                    <div style="font-size:15px;"><b><?php echo $row['num_mesa']; ?></b></div> 
                    <span style="font-size:10px;"><i class="fas fa-user"></i> <?=ucfirst(strtolower($row['nome']));?></span> 
                  </button>
                </div>
              </div>


              <?php }

              ?>
              



              <?php
            }
            
          }

          mysqli_free_result($result);
        }
        ?>
      </div>
    </div>
  </div>
</div>
</div>


<?php }  //fim  de carmesa ativo 
 else {}?>
<script id="scriptControllerCapturaDadosMesas">
  
  
  setTimeout(function() {
      $("#iconeAtualizando").fadeIn();
    }, 500  );

  $(".btnMesa").click(function(){ 

 StopAtualizaDados(); 
 
    setTimeout(function() {
      $("#cardMesa").fadeOut();
    }, 20);
    setTimeout(function() {
      $("#cardCategoria").fadeIn();
    }, 480  );

    var num_mesa =  $(this).attr('num_mesa');
    var num_pedido = $('#inputPedido').val();
    var data_hora_cadastro_pedido = $('#inputDataHoraCadastroPedido').val();
    $("#inputMesa").val(num_mesa);
    $('#spanMesa').text(num_mesa);





// cadastra mesa na tabela pedidos na coluna principal do pedido.
var instrucao = '';
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


// aLtera status da mesa para indisponivel
$.ajax({
  type: "POST",
  url: '../../models/comanda-eletronica/ModelAlteraStatusMesa.php',
  data: {
    instrucao:'indisponivel',
    num_pedido:num_pedido,
    num_mesa:num_mesa,
    data_hora_cadastro_pedido:data_hora_cadastro_pedido
  },
  success: function(data) {
  
    
  }

});//fim ajax

});


    $(".btnResumoMesa").click(function(){ 

    StopAtualizaDados(); 

    var num_pedido = $("#inputPedido").val();
    var num_mesa =  $(this).attr('num_mesa');
    $("#inputMesa").val(num_mesa);
        

    setTimeout(function() {
      $("#cardMesa").fadeOut();
    }, 150  );

    setTimeout(function() {
      $(".cardNumeroPedido").fadeOut();
    }, 150  );

    var num_mesa =  $(this).attr('num_mesa');

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
</script>




