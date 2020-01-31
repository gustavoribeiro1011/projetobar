<?php
/**
 *
 *	Model Transicao Editar Categoria
 *
 */ 
session_start();
include ('../../config.php');

$idcategoria = $_POST['idcategoria'];

$consultarCategoria = "
select 
a.id,
a.categoria,
a.icone,
a.usuario,
a.cadastro,
a.modificado
from categorias a 
where a.id='".$idcategoria."'"; 

if ($result=mysqli_query($conecta,$consultarCategoria))

{

	while ($row=mysqli_fetch_assoc($result))

	{
		$array= array(
			"id" => $row['id'],
			"categoria" => $row['categoria'],
			"icone" => $row['icone']
		);

		
		echo json_encode($array);


	}
}


