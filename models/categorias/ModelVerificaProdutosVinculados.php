<?php
/**
 *
 *	Model Verifica Produtos Vinculados à Categoria
 *
 */ 
session_start();
include ('../../config.php');

$idcategoria = $_POST['idcategoria'];

$verificaProdutosVinculados = "
SELECT 
count(a.id) as resultado,
b.categoria as nome_categoria
FROM produtos a
LEFT JOIN categorias b on (a.categoria=b.id)

WHERE a.categoria = '".$idcategoria."'"; 

if ($result=mysqli_query($conecta,$verificaProdutosVinculados))
{

	$row=mysqli_fetch_assoc($result);

	if($row['resultado'] >0){
		$array= array("resultado" => $row['resultado'],"msg" => "existe produtos vinculados","nome_categoria" => $row['nome_categoria']);		
		echo json_encode($array);
	} else {
		$array= array("msg" => "nao existe produtos vinculados");		
		echo json_encode($array);
	}

	
}
else{
	
	$array= array("msg" => "falha");

	echo json_encode($array);

	
}

