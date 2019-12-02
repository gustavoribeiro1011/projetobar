<div class="col-sm-12" id="cardCategoria" style="display:none;">
  <div class="card shadow">


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
            >
            <div align="left">
              <?php echo strtoupper($row['categoria']);?>
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


