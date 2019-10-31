
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




    $sql="SELECT * FROM mesas ORDER BY id";

    if ($result=mysqli_query($conecta,$sql))
    {
      $i='0';

      echo '<div class="row">';

      while ($row=mysqli_fetch_row($result))
      {
        $i++;

        echo '<div class="col-3 col-sm-4  col-md-4 col-lg-4 col-xl-2 py-1">';        
        echo '<button class="btn btn-primary btn-block">';
        echo $i;  
        echo '</button>';    
        echo '</div>';

      }
      echo '</div>'; 

      mysqli_free_result($result);
    }


    ?>

  </div>
</div>
