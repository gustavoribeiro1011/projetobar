<?php
/**
 *
 *	Model Cadastra Produto
 *
 */ 
session_start();
include ('../../config.php');

$id_produto = $_POST['idproduto'];
$precos = $_POST['arr_precos_adicionar']; //array 
$medidas = $_POST['arr_medidas_adicionar']; //array
$unidades_medidas = $_POST['arr_unidades_medidas_adicionar']; //array


/**
 *
 * Callback
 *
 */
function insertCallback($v1,$v2,$v3) {
/* Callback é tipicamente passado como argumento de outra função e/ou chamado quando um evento for acontecido, 
 * nesse caso, após o insert. */

global $conecta;
global $id_produto;

//Calback: Unidade de Medida
$verificaVariacaoUnidadeMedida = "SELECT * FROM unidade_medida WHERE id_produto = $id_produto ORDER BY variacao DESC LIMIT 1";
$conecta->query($verificaVariacaoUnidadeMedida);
$row_unidade_medida=mysqli_fetch_assoc(mysqli_query($conecta,$verificaVariacaoUnidadeMedida));
$variacao_unidade_medida=$row_unidade_medida["variacao"];
if( $variacao_unidade_medida == 0){
	$variacao_unidade_medida=1;

$cadastrarUnidadeMedida = "INSERT INTO unidade_medida (id_produto,variacao,medida,unidade_medida,cadastro) VALUES ($id_produto,$variacao_unidade_medida,$v1,'$v2',now() )"; 
$conecta->query($cadastrarUnidadeMedida);
} else {
$variacao_unidade_medida=$variacao_unidade_medida+1;

$cadastrarUnidadeMedida = "INSERT INTO unidade_medida (id_produto,variacao,medida,unidade_medida,cadastro) VALUES ($id_produto,$variacao_unidade_medida,$v1,'$v2',now() )"; 
$conecta->query($cadastrarUnidadeMedida);
}

//Calback: Preco
$verificaVariacaoPreco = "SELECT * FROM precos WHERE id_produto = $id_produto ORDER BY variacao DESC LIMIT 1";
$conecta->query($verificaVariacaoPreco);
$row_preco=mysqli_fetch_assoc(mysqli_query($conecta,$verificaVariacaoPreco));
$variacao_preco=$row_preco["variacao"];
if( $variacao_preco == 0){
	$variacao_preco=1;

$cadastrarPreco = "INSERT INTO precos (id_produto,variacao,preco,cadastro) VALUES ($id_produto,$variacao_preco,$v3,now() )"; 
$conecta->query($cadastrarPreco);
} else {
$variacao_preco=$variacao_preco+1;

$cadastrarPreco = "INSERT INTO precos (id_produto,variacao,preco,cadastro) VALUES ($id_produto,$variacao_preco,$v3,now() )"; 
$conecta->query($cadastrarPreco);
}




};

array_map("insertCallback",$medidas,$unidades_medidas,$precos);

echo "sucesso";




