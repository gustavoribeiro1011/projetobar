<?php

$id_categoria = $_POST['id_categoria'];


?>

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


