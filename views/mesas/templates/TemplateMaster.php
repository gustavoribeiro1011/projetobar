<!-- Template Master Mesas -->
<?php

$FormularioCadastrar = $_SERVER['DOCUMENT_ROOT'];
$FormularioCadastrar .= BASEURL . "views/mesas/templates/FormularioCadastrar.php";


$FormularioExibir = $_SERVER['DOCUMENT_ROOT'];
$FormularioExibir .= BASEURL . "views/mesas/templates/FormularioExibir.php";


?>
<div class="row">

	<div class="col-xl-4 col-lg-5">

		<!-- Formulario  Cadastrar Mesas -->
		<?php include ($FormularioCadastrar); ?>

	</div>

	<div class="col-xl-8 col-lg-7">

		<!-- Formulario  Exibir Mesas -->	
		<?php include ($FormularioExibir); ?>


