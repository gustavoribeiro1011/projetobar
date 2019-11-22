<?php
/**
 *
 *	Model Transicao Editar Produto
 *
 */ 
session_start();
include ('../../config.php');

$idproduto = $_POST['idproduto'];

$consultarProduto = "
SELECT 
a.id,
a.produto,
a.preco,
a.categoria,
a.unidade_medida id_unidade_medida,
a.medida,
b.categoria categoria_nome,
c.unidade_medida,
c.unidade_medida_abreviado
FROM produtos a
LEFT JOIN categorias b on (a.categoria=b.id) 
LEFT JOIN unidade_medida c on (a.unidade_medida=c.id) 
WHERE a.id='".$idproduto."'"; 

if ($result=mysqli_query($conecta,$consultarProduto))

{

	while ($row=mysqli_fetch_assoc($result))

	{
		$array= array(
			"id"      => $row['id'],
			"produto" => $row['produto'],
			"categoria" => $row['categoria'],
			"categoria_nome" => $row['categoria_nome'],
			"preco" => $row['preco'],
			"id_unidade_medida" => $row['id_unidade_medida'],
			"unidade_medida" => $row['unidade_medida'],
			"medida" => $row['medida']
			);

		
		echo json_encode($array);


	}
}


