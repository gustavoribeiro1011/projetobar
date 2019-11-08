<div class="col-sm-12" id="cardCategoria" style="display:none;">
  <div class="card shadow">
    <div class="card-header py-3">
      <div class="progress" style="height: 2px;">
        <div class="progress-bar" role="progressbar" style="width: 66.66%;" aria-valuenow="66.66" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>

    <div class="card-header py-3">
      <div class="row">
        <div class="col-xl-6 col-lg-7">
          <h6 class="m-0 font-weight-bold text-primary">Selecione uma categoria</h6>
        </div>
        <div class="col-xl-6 col-lg-7" align="right">
         <button class="btn btn-sm btn-primary" id="btn-voltar-mesa"><i class="fas fa-arrow-left"></i> Voltar</button>
         <button class="btn btn-sm btn-primary"> <i class="fas fa-th-large"></i></button>
         <button class="btn btn-sm btn-primary"><i class="fas fa-list"></i></button> 
       </div>
     </div>    
   </div>

   <div class="card-body">

    <div class="row" style="max-width: 100%">

      <?php
      if(!@include_once('../../../config.php')) {
  // do something
      }

      $sql="SELECT * FROM categorias ORDER BY id";

      if ($result=mysqli_query($conecta,$sql))
      {
        while ($row=mysqli_fetch_assoc($result))
        {

          ?>
          <div class="col-md-3">
           <div class="card">
            <button class="btn btn-primary btn-block btnCategoria" 
            id_categoria="<?php echo $row['id']; ?>"
            categoria="<?php echo $row['categoria']; ?>"
            ><?php echo $row['categoria']; ?></button>
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


