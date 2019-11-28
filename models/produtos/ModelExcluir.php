<?php
/**
 *
 *	Model Excluir Produto
 *
 */ 
session_start();

include ('../../config.php');

$instrucao = $_POST['instrucao']; // pega a instrucao passada via post

if ( $instrucao == 'remover variacao' ){ // se a instrucao é 'remover variacao' faz a exclusao da 'unidade de medida' e 'preco'

$id_unidade_medida = $_POST['id_unidade_medida']; // pega o valor enviado via post

$id_preco = $_POST['id_preco']; // pega o valor enviado via post
  
$excluirUnidadeMedida = "DELETE FROM unidade_medida WHERE id=".$id_unidade_medida; // sql que executa a exclusao da unidade de medida

$excluirPreco = "DELETE FROM precos WHERE id=".$id_preco;  // sql que executa a exclusao do preco
 
		if ($conecta->query($excluirUnidadeMedida) === TRUE AND $conecta->query($excluirPreco)) { // se o sql que faz a exclusao der certo envia msg de sucesso

			echo "sucesso";

		} else { // se caso o sql que faz a exclusao der erro envia msg de falha

			echo "falha";

		}

} else if ( $instrucao == 'remover produto' ){ // se caso nao vier nenhuma instrução 

$idproduto = $_POST['idproduto']; // pega o valor enviado via post

$excluirProduto = "DELETE FROM produtos WHERE id='".$idproduto."'"; // sql que executa a exclusao do produto 

$excluirUnidadeMedida = "DELETE FROM unidade_medida WHERE id_produto=".$idproduto; // sql que executa a exclusao da unidade de medida

$conecta->query($excluirUnidadeMedida);

$excluirPreco = "DELETE FROM precos WHERE id_produto=".$idproduto;  // sql que executa a exclusao do preco

$conecta->query($excluirPreco);

		if ($conecta->query($excluirProduto) === TRUE) {

			echo "sucesso";

		} else {

			echo "falha";
		}

}