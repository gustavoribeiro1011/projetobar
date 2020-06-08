<!-- Template Master Produto -->
<?php

$Mesas = $_SERVER['DOCUMENT_ROOT'];
$Mesas .= BASEURL . "views/comanda-eletronica/templates/Mesas.php";

$Categorias = $_SERVER['DOCUMENT_ROOT'];
$Categorias .= BASEURL . "views/comanda-eletronica/templates/Categorias.php";

$Produtos = $_SERVER['DOCUMENT_ROOT'];
$Produtos .= BASEURL . "views/comanda-eletronica/templates/Produtos.php";

$FimPedido = $_SERVER['DOCUMENT_ROOT'];
$FimPedido .= BASEURL . "views/comanda-eletronica/templates/FimPedido.php";

?>


<div class="container-fluid">
  <!-- Content Row -->
  <div class="row">

   <?php// include ($Mesas); ?>

   <div id="divMesas"></div>

   <?php include ($Categorias); ?>


   <?php include ($FimPedido); ?>

 </div>

</div>
<div id="includeDivProdutos"></div> 

<div id="includeDivVariantes"></div>

<div class="container-fluid" id="includeResumoPedido"></div>

<div class="container-fluid" id="includeResumoMesa"></div>


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
                Agora: <u><?php echo $agora = date("d/m/Y H:i:s");?></u><br>
                <label for="">Nº Pedido:</label>  <input type='text' class="form-control" id="inputPedido" disabled></input>
                <label for="">Data/Hora cadastro do pedido:</label>  <input type='text' class="form-control" id="inputDataHoraCadastroPedido" disabled></input>
                <label for="">Num Comanda:</label>  <input type='text' class="form-control" id="inputIdComanda" disabled></input>
                <label for="">Mesa:</label>  <input type='text' class="form-control" id="inputMesa" disabled></input>
                <label for="">ID Categoria:</label>   <input type='text' class="form-control" id="inputIdCategoria" disabled></input>
                <label for="">Categoria:</label>  <input type='text' class="form-control" id="inputCategoria" disabled></input>
                <label for="">ID Produto:</label>   <input type='text' class="form-control" id="inputIdProduto" disabled></input>
                <label for="">Produto:</label>  <input type='text' class="form-control" id="inputProduto" disabled></input>
                <label for="">ID Preco:</label>  <input type='text' class="form-control" id="inputIdPreco" disabled></input>
                <label for="">Preco:</label>  <input type='text' class="form-control" id="inputPreco" disabled></input>
                <label for="">ID Unidade de Medida:</label>  <input type='text' class="form-control" id="inputIdUnidadeMedida" disabled></input>
                <label for="">Unidade de Medida:</label>  <input type='text' class="form-control" id="inputUnidadeMedida" disabled></input>
                <label for="">Medida:</label>  <input type='text' class="form-control" id="inputMedida" disabled></input>
                <label for="">Data/Hora mesa aberta:</label>  <input type='text' class="form-control" id="inputDataHoraMesaAberta" disabled></input>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <div class="col-xl-8 col-lg-7">

