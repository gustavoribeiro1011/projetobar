



<?php

if(!@include_once('../../../config.php')) {
  // do something
}


$verificaMesasExistente = "SELECT count(id) count FROM mesas";
$result=mysqli_query($conecta,$verificaMesasExistente);
$qtd_mesas=mysqli_fetch_assoc($result);


if ( $qtd_mesas['count'] > 0 ) {


  $sql="SELECT * FROM mesas ORDER BY num_mesa ASC";

  if ($result=mysqli_query($conecta,$sql))

  {


    ?>

    <!-- Formulario Exibir Mesas -->

    <div class="card shadow mb-12">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Todas as mesas</h6>

      </div>

      <div class="card-body">

        <div class="row">

          <?php  while ($row=mysqli_fetch_assoc($result)) { ?>

          <div class="col-3 col-sm-4  col-md-4 col-lg-4 col-xl-2 py-1"> 

            <button class="btn btn-success btn-block">

              Mesa

              <h3><b><?=$row['num_mesa'];?></b></h3>

            </button>    

          </div>

          <?php } ?>

        </div> 

      </div>

      <div class="card-footer py-3">

       <button class="btn btn-sm btn-light" id="btnAdicionarMesa"><i class="fas fa-plus"></i></button>

       <button class="btn btn-sm btn-light" id="btnRemoverMesa"><i class="fas fa-minus"></i></button>

     </div>

   </div>


   <?php
     // mysqli_free_result($result);


 } 

} else {
  ?>


  <!-- Formulario Exibir Mesas -->

  <div class="card shadow col-sm-4 col-mb-4 col-xl-4">

    <div class="card-body">

      <div class="row">

        <h5>Nenhuma mesa cadastrada</h5>

      </div> 

      <div class="row">

        <button class="btn btn btn-light font-weight-bold text-primary" id="btnAdicionarMesa">Clique aqui para adicionar mesas</button>

      </div> 

    </div>



  </div>



  <?php
}