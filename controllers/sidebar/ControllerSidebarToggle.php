<?php 

$sqlCosultaToggle="SELECT * FROM sidebar WHERE id_usuario = '".$_SESSION['id'.$app_token]."' LIMIT 1";
$resultCosultaToggle=mysqli_query($conecta,$sqlCosultaToggle);

// Associative array
$CosultaToggle=mysqli_fetch_assoc($resultCosultaToggle);

