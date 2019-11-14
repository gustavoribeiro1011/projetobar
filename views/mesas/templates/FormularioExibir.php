
<!-- Formulario Exibir Mesas -->
<div class="card shadow mb-12">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Todas as mesas</h6>
  </div>
  <div class="card-body">


    <?php

    if(!@include_once('../../../config.php')) {
  // do something
    }




    $sql="SELECT * FROM mesas ORDER BY num_mesa ASC";

    if ($result=mysqli_query($conecta,$sql))
    {
      $i='0';

      echo '<div class="row">';

      while ($row=mysqli_fetch_assoc($result))
      {
        $i++;

        echo '<div class="col-3 col-sm-4  col-md-4 col-lg-4 col-xl-2 py-1">';        
        echo '<button class="btn btn-success btn-block">';
        echo 'Mesa';
        echo '<h3><b>'.$row['num_mesa'].'</b></h3>';  
        echo '</button>';    
        echo '</div>';

      }
      echo '</div>'; 

      mysqli_free_result($result);
    }


    ?>

  </div>
 <div class="card-footer py-3">
   <button class="btn btn-sm btn-light" id="btnAdicionarMesa"><i class="fas fa-plus"></i></button>
      <button class="btn btn-sm btn-light" id="btnRemoverMesa"><i class="fas fa-minus"></i></button>

  </div>
</div>
