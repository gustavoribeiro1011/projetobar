<div class="col-sm-12" id="cardMesa" style="display:none;">
  <div class="card shadow">
    <div class="card-header py-3">
      <div class="progress" style="height: 2px;">
        <div class="progress-bar" role="progressbar" style="width: 33.33%;" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
    <div class="card-header py-3">
      <div class="row">
        <div class="col-xl-6 col-lg-7">
          <h6 class="m-0 font-weight-bold text-primary">Selecione uma mesa</h6>
        </div>
        <div class="col-xl-6 col-lg-7" align="right">
         <button class="btn btn-sm btn-primary"> <i class="fas fa-th-large"></i></button>
         <button class="btn btn-sm btn-primary"><i class="fas fa-list"></i></button> 
       </div>
     </div>    
   </div>
   <div class="card-body">
    <div class="col-xl-12">
    <div class="row" >
      <?php
      if(!@include_once('../../../config.php')) {
      }

      $sql="SELECT * FROM mesas ORDER BY id";
      if ($result=mysqli_query($conecta,$sql))
      {
        $i='0';
        echo '<div class="row">';
        while ($row=mysqli_fetch_assoc($result))
        {
          $i++;
          ?>
          
           <div class="col-4 col-md-4 col-xl-2" align="center">
            <div class="card">
            <button class="btn btn-primary  btn-block btnMesa" num_mesa="<?php echo $i; ?>">
              Mesa
              <h3><b><?php echo $i; ?></b></h3> 
              <span class="badge badge-success" id="txtStatusMesa">Disponível</span>
            </button>
        </div>
        </div>
      <?php     }
      echo '</div>'; 
      mysqli_free_result($result);
    }
    ?>
      </div>
  </div>
</div>
</div>
</div>

