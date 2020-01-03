



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
     $i='0';


    ?>

    <!-- Formulario Exibir Mesas -->

    <div class="card shadow mb-12">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Todas as mesas</h6>

      </div>

      <div class="card-body">
        

        <div class="row">
<?php
          while ($row=mysqli_fetch_assoc($result))
          {
            $i++;

            if ($row['status'] == 'disponivel'){
              ?>

              <!-- Desktop/Tablet-->
              <div class=" desktop" align="center">
                <div class="card">
                  <button class="btn btn-success  btn-block btnMesa" num_mesa="<?=$row['num_mesa'];?>" disabled>
                    <span>Mesa</span>            
                    <div style="font-size:30px"><b><?php echo $row['num_mesa']; ?></b></div> 
                  </button>
                </div>
              </div>

              <!-- Mobile -->
              <div class="mobile" align="center">
                <div class="card">
                  <button class="btn btn-success  btn-block btnMesa" num_mesa="<?=$row['num_mesa'];?>" disabled>
                    <span style="font-size:10px;">Mesa</span> 
                    <div style="font-size:15px;"><b><?php echo $row['num_mesa']; ?></b></div> 
                  </button>
                </div>
              </div>
              <?php
            } else if ($row['status'] == 'indisponivel'){
              ?>
              
              <!-- Desktop/Tablet-->
              <div class="desktop" align="center">
                <div class="card">
                  <button class="btn btn-danger btn-block btnResumoMesa" num_mesa="<?=$row['num_mesa'];?>" disabled>
                    <span>Mesa</span>            
                    <div style="font-size:30px"><b><?php echo $row['num_mesa']; ?></b></div> 
                  </button>
                </div>
              </div>

              <!-- Mobile -->
              <div class="mobile" align="center">
                <div class="card">
                  <button class="btn btn-danger  btn-block btnResumoMesa" num_mesa="<?=$row['num_mesa'];?>" disabled>
                    <span style="font-size:10px;">Mesa</span>
                    <div style="font-size:15px;"><b><?php echo $row['num_mesa']; ?></b></div> 
                  </button>
                </div>
              </div>


              <?php
            }
            
          }



  ?>

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