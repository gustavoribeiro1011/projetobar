<?php
/**
 *
 *	Model Transicao Editar Produto
 *
 */ 
session_start();
include ('../../config.php');

$idproduto = $_POST['idproduto'];
$_SESSION["idproduto".$app_token] = $idproduto;

$consultarProduto = "
select 
a.id,
a.produto,
a.categoria,
b.categoria as categoria_nome,
a.preco
FROM produtos a 
LEFT JOIN categorias b on (a.categoria=b.id)
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
			"preco" => $row['preco']
				
			);

		
		echo json_encode($array);


	}
}


