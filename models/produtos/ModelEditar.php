<?php
session_start();
include ('../../config.php');

$idproduto = $_POST['idproduto'];

$consultarProduto = "SELECT * FROM produtos WHERE id='".$idproduto."'"; 

if ($result=mysqli_query($conecta,$consultarProduto))

{

	while ($row=mysqli_fetch_assoc($result))

	{
		$array= array("id" => $row['id'],"produto" => $row['produto']);

		
		echo json_encode($array);
        

	}
}


