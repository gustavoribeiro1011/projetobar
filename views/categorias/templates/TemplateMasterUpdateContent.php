<!-- Template Master Update Content Categoria -->
<?php    

require('../../../config.php');

$ModalVerificaProdutosVinculados= $_SERVER['DOCUMENT_ROOT'];
$ModalVerificaProdutosVinculados.= BASEURL . "views/categorias/templates/ModalVerificaProdutosVinculados.php";

$ModalExcluir = $_SERVER['DOCUMENT_ROOT'];
$ModalExcluir .= BASEURL . "views/categorias/templates/ModalExcluir.php";

$FormularioCadastrar = $_SERVER['DOCUMENT_ROOT'];
$FormularioCadastrar .= BASEURL . "views/categorias/templates/FormularioCadastrar.php";

$FormularioEditar = $_SERVER['DOCUMENT_ROOT'];
$FormularioEditar .= BASEURL . "views/categorias/templates/FormularioEditar.php";

$FormularioExibir = $_SERVER['DOCUMENT_ROOT'];
$FormularioExibir .= BASEURL . "views/categorias/templates/FormularioExibir.php";

?>



<!-- Content Row -->
<div class="row">

<div class="col-xl-4 col-lg-5">

<!-- $Modal Verifica Produtos Vinculados -->          
<?php include ($ModalVerificaProdutosVinculados); ?>

<!-- Modal Excluir -->          
<?php include ($ModalExcluir); ?>

<!-- Formulario  Cadastrar -->          
<?php include ($FormularioCadastrar); ?>

<!-- Formulario  Editar -->          
<?php include ($FormularioEditar); ?>

</div>

<div class="col-xl-8 col-lg-7">

<!-- Formulario  Exibir Categorias -->
<?php include ($FormularioExibir); ?>

