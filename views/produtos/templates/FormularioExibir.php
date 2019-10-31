<!-- Formulário Exibir Produto -->
<style>
  #acoes{
    display: none;
  }

  tr:hover #acoes {
   display: inline;

 }
</style>
<!-- Formulario Exibir Mesas -->
<div class="card shadow mb-12">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Todas os produtos</h6>
  </div>
  <div class="card-body">


    <?php

    if(!@include_once('../../../config.php')) {
  // do something
    }




    $sql="SELECT * FROM produtos ORDER BY produto ASC";

    if ($result=mysqli_query($conecta,$sql))

    {



      ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table cell-border table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr style="display:none;">
                <th>Produto</th>
                <th></th>                              
              </tr>
              <tr>
                <th colspan="2">Produto</th>
                
                
              </tr>
            </thead>
            <tfoot>
              <tbody>
                <?php  
                $i=0;
                while ($row=mysqli_fetch_assoc($result))

                {
                 $i++;
                 ?>

                 <tr>
                  <td>                   
                    <?php echo $row['produto'];?>           
                  </td>
                  <td align="right">
                    <span id="acoes">
                      <button class="btn btn-warning btn-circle btn-sm botaoEditarProdutoTransicao" idproduto="<?=$row['id']?>" ><i class="fas fa-pencil-alt"></i></button>
                      <button class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash"></i> 
                      </span>
                    </td>
                  </tr>                 

                  <?php    

                }

                ?>

              </tbody>
            </table>
          </div>
        </div>


        <?php

        mysqli_free_result($result);
      }

      ?>

    </div>
  </div>

