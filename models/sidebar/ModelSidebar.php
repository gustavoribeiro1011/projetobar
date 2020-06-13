<?php
session_start();
include ('../../config.php');

$status = $_POST['status'];


$sqlConsultaStatus = "SELECT * FROM sidebar WHERE id_usuario ='".$_SESSION['id'.$app_token]."' LIMIT 1 "; 
$resultStatus=mysqli_query($conecta,$sqlConsultaStatus);
$ConsultaStatus=mysqli_fetch_assoc($resultStatus);


if ($ConsultaStatus['id']>1) { // se ja existir status cadastrado

	if ($ConsultaStatus['status'] == 'toggled'){
		$agora = ('Y-m-d H:i:s');
		$updateStatus = "UPDATE sidebar SET status='', cadastro='$agora' WHERE id_usuario =".$_SESSION['id'.$app_token]." "; 

		if ($conecta->query($updateStatus) === TRUE) {
			echo "sucesso 1";
		} else {
			echo "falha 1";
		}


	} else {
		$agora = ('Y-m-d H:i:s');
		$updateStatus = "UPDATE sidebar SET status='toggled', cadastro='$agora' WHERE id_usuario =".$_SESSION['id'.$app_token]." "; 

		if ($conecta->query($updateStatus) === TRUE) {
			echo "sucesso 2";
		} else {
			echo "falha 2";
		}
	}

} else {
$agora = ('Y-m-d H:i:s');
	$insereStatus = "INSERT INTO  sidebar (id_usuario,status,cadastro) VALUES ('".$_SESSION['id'.$app_token]."','".$status."', '$agora')"; 

	if ($conecta->query($insereStatus) === TRUE) {
		echo "sucesso 3";
	} else {
		echo "falha 3";
	}



}












