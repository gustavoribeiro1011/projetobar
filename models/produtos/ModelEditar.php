<?php
/**
 *
 *	Model Editar Produto
 *
 */ 
session_start();
include ('../../config.php');

$idproduto = $_POST['idproduto'];
$produto = $_POST['produto'];
$categoria = $_POST['categoria'];

$id_medidas = $_POST['id_medidas']; //array
$arr_medidas = $_POST['arr_medidas']; //array
$arr_unidades_medidas = $_POST['arr_unidades_medidas']; //array

$id_precos = $_POST['id_precos']; //array
$arr_precos = $_POST['arr_precos']; //array




$editarProduto = "UPDATE produtos SET 
produto='$produto', 
categoria='$categoria',
modificado=now() WHERE id='".$idproduto."'"; 

if ($conecta->query($editarProduto) === TRUE) {


/**
 *
 * Callback
 *
 */

function insertMedidasCallback($v1,$v2,$v3) {
//$v1 = $id_medidas , $v2 = $arr_medidas , $v3 = $arr_unidades_medidas

global $conecta;
global $id_produto;

//Calback: Unidade de Medida
$alteraMedidas= "UPDATE unidade_medida SET medida=$v2, unidade_medida='$v3', modificado=now() WHERE id=$v1";
$conecta->query($alteraMedidas);

};

array_map("insertMedidasCallback",$id_medidas,$arr_medidas,$arr_unidades_medidas);



function insertPrecosCallback($v1,$v2) {
//$v1 = $id_precos , $v2 = $arr_precos 

global $conecta;
global $id_produto;

//Calback: Unidade de Medida
$alteraPrecos= "UPDATE precos SET preco=$v2, modificado=now() WHERE id=$v1";
$conecta->query($alteraPrecos);

};

array_map("insertPrecosCallback",$id_precos,$arr_precos);






echo "sucesso";
} else {
	echo "falha";
}


