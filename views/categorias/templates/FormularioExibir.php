<!-- Formulário Exibir Categoria -->
<div class="card shadow mb-12">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Todas as categorias</h6>
  </div>
  <div class="card-body">
    <?php

    if(!@include_once('../../../config.php')) {
  // do something
    }

    $sql="SELECT * FROM categorias ORDER BY categoria ASC";

    if ($result=mysqli_query($conecta,$sql))

    {


      ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table cell-border table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr style="display:none;">
                <th>Categoria</th>
                <th></th>                              
              </tr>
              <tr>
                <th colspan="2">Categoria</th>           
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
                    <?php echo $row['categoria'];?>           
                  </td>
                  <td align="right">
                    <span id="acoes">
                      <button class="btn btn-secondary btn-circle btn-sm botaoEditarCategoriaTransicao" idcategoria="<?=$row['id']?>">
                        <i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-secondary btn-circle btn-sm botaoExcluirCategoriaTransicao" data-toggle="modal" data-target="#modalExcluirCategoria" idcategoria="<?=$row['id']?>"> <i class="fas fa-trash"></i> 
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

