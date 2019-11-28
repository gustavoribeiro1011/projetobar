<?php

$id_categoria = $_POST['id_categoria'];


?>

<div class="row">
 <div class="col-sm-12" id="cardProduto"  style="display:none;">
  <div class="card shadow">
    <div class="card-header py-3">
      <div class="progress" style="height: 2px;">
        <div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>

    <div class="card-header py-3">
      <div class="row">
        <div class="col-xl-6 col-lg-7">
          <h6 class="m-0 font-weight-bold text-primary">Selecione um item</h6>
        </div>
        <div class="col-xl-6 col-lg-7" align="right">
         <button class="btn btn-sm btn-primary btn-voltar-categoria"><i class="fas fa-arrow-left"></i> Voltar</button>
         <button class="btn btn-sm btn-primary"> <i class="fas fa-th-large"></i></button>
         <button class="btn btn-sm btn-primary"><i class="fas fa-list"></i></button> 
       </div>
     </div>    
   </div>

   <div class="card-body">

    <div class="row" style="max-width: 100%">

      <?php
      if(!@include_once('../../../config.php')) {

      }
      //$sql="SELECT * FROM produtos ORDER BY id";
      $sql="
      select 
      a.id,
      a.produto,
      a.categoria,     
      a.usuario,
      a.cadastro,
      a.modificado 
      from produtos a
      WHERE a.categoria=".$id_categoria." ORDER BY a.produto ASC";

      if ($result=mysqli_query($conecta,$sql))
      {
        while ($row=mysqli_fetch_assoc($result))
        {

          ?>
          <div class="col-md-3">
           <div class="card">  
            <button class="btn btn-primary btn-block btnProduto"
            id_produto="<?php echo $row['id']; ?>"
            produto="<?php echo $row['produto']; ?>">
            <div align="left">
              <?=strtoupper($row['produto']);?>
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


