<!-- Template Master Produto -->
<?php

require('../../../config.php');


$ModalExcluir = $_SERVER['DOCUMENT_ROOT'];
$ModalExcluir .= BASEURL . "views/produtos/templates/ModalExcluir.php";

$FormularioCadastrar = $_SERVER['DOCUMENT_ROOT'];
$FormularioCadastrar .= BASEURL . "views/produtos/templates/FormularioCadastrar.php";

$FormularioEditar = $_SERVER['DOCUMENT_ROOT'];
$FormularioEditar .= BASEURL . "views/produtos/templates/FormularioEditar.php";

$FormularioExibir = $_SERVER['DOCUMENT_ROOT'];
$FormularioExibir .= BASEURL . "views/produtos/templates/FormularioExibir.php";


$VariacaoEditar = $_SERVER['DOCUMENT_ROOT'];
$VariacaoEditar .= BASEURL . "views/produtos/templates/VariacaoEditar.php";

?>

<!-- Content Row -->
<div class="row">

<div class="col-xl-4 col-lg-5">

<!-- Formulario  Cadastrar Produtos -->          
<?php include ($ModalExcluir); ?>

<!-- Formulario  Cadastrar Produtos -->
<div></div>          
<?php include ($FormularioCadastrar); ?>

<!-- Formulario  Editar Produtos -->          
<?php include ($FormularioEditar); ?>



</div>

<div class="col-xl-8 col-lg-7">

<!-- Formulario  Exibir Produtos -->
<?php include ($FormularioExibir); ?>
