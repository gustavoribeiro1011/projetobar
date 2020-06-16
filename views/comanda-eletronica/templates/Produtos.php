<?php

$id_categoria = $_POST['id_categoria'];


?>
<div class="container-fluid">
<div class="row">
 <div class="col-sm-12" id="cardProduto"  style="display:none;">
  <div class="card shadow">
   <div class="card-body">

    <div class="row" style="max-width: 100%">

      <?php
      if(!@include_once('../../../config.php')) {

      }
      //$sql="SELECT * FROM produtos ORDER BY id";
      $sql="
      select 
      id,
      produto,
      categoria,  
      preco,   
      usuario,
      cadastro,
      modificado 
      from produtos 
      WHERE categoria=".$id_categoria." ORDER BY produto ASC";

      if ($result=mysqli_query($conecta,$sql))
      {
        ?>
        <div class="col-md-6 col-xl-3">
         <div class="card">  
          <button class="btn btn-primary btn-block btnVoltarParaCategoria">
          <div align="left"><i class="fas fa-arrow-left"></i> VOLTAR</div>
        </button>
      </div>
    </div>
    <?php
    while ($row=mysqli_fetch_assoc($result))
    {

      ?>
<div class="col-md-6 col-xl-3">
      <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo BASEURL; ?>img/200x200.png" class="card-img" alt="<?=strtoupper($row['produto']);?>" >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h6 class="card-title"><?=strtoupper($row['produto']);?></h6>
        <p class="card-text">R$<?=number_format($row['preco'],2,",",".");?></p>       
      </div>
    </div>
  </div>
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


</div>