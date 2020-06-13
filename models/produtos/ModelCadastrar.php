<?php
/**
 *
 *	Model Cadastra Produto
 *
 */ 
session_start();

include ('../../config.php');

$produto = $_POST['produto']; // resgata post

$categoria = $_POST['categoria']; // resgata post

$cadastrarProduto = "INSERT INTO produtos (produto,categoria,usuario,cadastro) 
VALUES ('$produto','$categoria',".$_SESSION['id'.$app_token].", now() ) ";

if ( $conecta->query($cadastrarProduto) ) {

if ( (!empty($_POST['precos'])) OR (!empty($_POST['medidas'])) OR (!empty($_POST['unidades_medidas']))){ 

$precos = $_POST['precos']; //array 

$medidas = $_POST['medidas']; //array

$unidades_medidas = $_POST['unidades_medidas']; //array

$id_produto = mysqli_insert_id($conecta);

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
    $agora = ('Y-m-d H:i:s');
	$cadastrarUnidadeMedida = "INSERT INTO unidade_medida (id_produto,variacao,medida,unidade_medida,cadastro) VALUES ($id_produto,$variacao_unidade_medida,$v1,'$v2','$agora' )"; 
	
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

} else { // se nao tiver variantes

	echo "sucesso";

}

} else {

	echo "falha";

}