<!-- Template Master Mesas -->
<?php



$ModalAdicionarMesa = $_SERVER['DOCUMENT_ROOT'];
$ModalAdicionarMesa .= BASEURL . "views/mesas/templates/ModalAdicionarMesa.php";

$ModalRemoverMesa = $_SERVER['DOCUMENT_ROOT'];
$ModalRemoverMesa .= BASEURL . "views/mesas/templates/ModalRemoverMesa.php";

$FormularioExibir = $_SERVER['DOCUMENT_ROOT'];
$FormularioExibir .= BASEURL . "views/mesas/templates/FormularioExibir.php";


?>

<!-- Modal Adicionar Mesa -->
<?php include ($ModalAdicionarMesa); ?>

<!-- Modal Remover Mesa -->
<?php include ($ModalRemoverMesa); ?>

<div class="row">

	<div class="col-xl-12 col-lg-12">

		<!-- Formulario  Exibir Mesas -->	
		<?php include ($FormularioExibir); ?>


