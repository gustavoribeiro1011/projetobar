<?php
/**
 *
 *	Model Transicao Editar Categoria
 *
 */ 
session_start();
include ('../../config.php');

$idcategoria = $_POST['idcategoria'];

$consultarCategoria = "SELECT * FROM categorias WHERE id='".$idcategoria."'"; 

if ($result=mysqli_query($conecta,$consultarCategoria))

{

	while ($row=mysqli_fetch_assoc($result))

	{
		$array= array("id" => $row['id'],"categoria" => $row['categoria']);

		
		echo json_encode($array);
        

	}
}


