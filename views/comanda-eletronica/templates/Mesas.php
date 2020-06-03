<div class="col-sm-12" id="cardMesa" style="display:none;">
  <div class="card shadow">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-xl-6 col-lg-7">
          <h6 class="m-0 font-weight-bold text-primary">Selecione uma mesa</h6>
        </div>
     </div>    
   </div>
   <div class="card-body">
    <div class="col-auto">
      <div class="row" >
        <?php
        if(!@include_once('../../../config.php')) {
        }

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
                <div class="card">
                  <button class="btn btn-success  btn-block btnMesa" num_mesa="<?=$row['num_mesa'];?>">
                    <span>Mesa</span>            
                    <div style="font-size:30px"><b><?php echo $row['num_mesa']; ?></b></div> 
                    <span>Disponível</span>
                  </button>
                </div>
              </div>

              <!-- Mobile -->
              <div class="mobile" align="center">
                <div class="card">
                  <button class="btn btn-success  btn-block btnMesa" num_mesa="<?=$row['num_mesa'];?>">
                    <span style="font-size:10px;">Mesa</span> 
                    <div style="font-size:15px;"><b><?php echo $row['num_mesa']; ?></b></div> 
                    <span style="font-size:10px;">Disp.</span>
                  </button>
                </div>
              </div>
              <?php
            } else if ($row['status'] == 'indisponivel'){

        
              if ( ($row['id']) == ( $_SESSION['id'.$app_token] ) ){
                ?>
       


              <!-- Desktop/Tablet-->
              <div class="desktop" align="center">
                <div class="card">
                  <button class="btn btn-warning btn-block btnResumoMesa" num_mesa="<?=$row['num_mesa'];?>">
                    <span>Mesa</span>            
                    <div style="font-size:30px"><b><?php echo $row['num_mesa']; ?></b></div>
                    <span>você está atendendo</span> 
                  </button>
                </div>
              </div>

              <!-- Mobile -->
              <div class="mobile" align="center">
                <div class="card">
                  <button class="btn btn-warning  btn-block btnResumoMesa" num_mesa="<?=$row['num_mesa'];?>">
                    <span style="font-size:10px;">Mesa</span>
                    <div style="font-size:15px;"><b><?php echo $row['num_mesa']; ?></b></div> 
                      <span style="font-size:10px;">você</span> 
                  </button>
                </div>
              </div>


              <?php
              } else {

?>


              <!-- Desktop/Tablet-->
              <div class="desktop" align="center">
                <div class="card">
                  <button class="btn btn-danger btn-block btnResumoMesa" num_mesa="<?=$row['num_mesa'];?>" disabled>
                    <span>Mesa</span>            
                    <div style="font-size:30px"><b><?php echo $row['num_mesa']; ?></b></div>
                    <span><i class="fas fa-user"></i> <?=ucfirst(strtolower($row['nome']));?></span> 
                  </button>
                </div>
              </div>

              <!-- Mobile -->
              <div class="mobile" align="center">
                <div class="card">
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

