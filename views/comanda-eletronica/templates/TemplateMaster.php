<!-- Template Master Produto -->
<?php

$Mesas = $_SERVER['DOCUMENT_ROOT'];
$Mesas .= BASEURL . "views/comanda-eletronica/templates/Mesas.php";

$Categorias = $_SERVER['DOCUMENT_ROOT'];
$Categorias .= BASEURL . "views/comanda-eletronica/templates/Categorias.php";

$Produtos = $_SERVER['DOCUMENT_ROOT'];
$Produtos .= BASEURL . "views/comanda-eletronica/templates/Produtos.php";

?>


<div class="container-fluid">
<!-- Content Row -->
<div class="row">
	<?php include ($Mesas); ?>

	<?php include ($Categorias); ?>
	
</div>
	

</div>
<div class="container-fluid" id="includeDivProdutos"></div> 


<!-- Início: Formulário para cadastro de pedido -->
<div class="container-fluid" style="display:none;">
  <div class="row">
  <div class="col-sm-12">
    <div class="card shadow">
      <div class="card-header py-3">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <form>
              <h6 class="m-0 font-weight-bold text-primary">Dados da comanda eletronica para cadastrar pedido no BD:</h6>
              <label for="">Nº Mesa:</label>  <input type='text' class="form-control" id="inputMesa" disabled></input>
              <label for="">ID Categoria:</label>   <input type='text' class="form-control" id="inputIdCategoria" disabled></input>
              <label for="">Categoria:</label>  <input type='text' class="form-control" id="inputCategoria" disabled></input>
              <label for="">ID Produto:</label>   <input type='text' class="form-control" id="inputIdProduto" disabled></input>
              <label for="">Produto:</label>  <input type='text' class="form-control" id="inputProduto" disabled></input>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="col-xl-8 col-lg-7">

