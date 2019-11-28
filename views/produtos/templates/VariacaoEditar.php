
<?php

session_start();


if(!@include_once('../../../config.php')) {

}

$id_produto= $_SESSION["idproduto".$app_token];


$sql = "
SELECT
a.id id_unidade_medida,
a.id_produto id_produto_unidade_medida,
a.variacao variacao_unidade_medida,
a.medida,
a.unidade_medida,
a.cadastro cadastro_unidade_medida,
a.modificado modificado_unidade_medida,
b.id id_preco,
b.id_produto id_produto_preco,
b.variacao variacao_preco,
b.preco,
b.cadastro cadastro_preco,
b.modificado modificado_preco

FROM unidade_medida a
LEFT JOIN precos b ON (a.id_produto=b.id_produto and a.variacao=b.variacao) 
WHERE a.id_produto= $id_produto";

$result=mysqli_query($conecta,$sql);


if ($result=mysqli_query($conecta,$sql)){

  $cont="";
  while ($row=mysqli_fetch_assoc($result)) { 
    $cont++;
    ?>


    <div class='card border-left-primary shadow h-100 py-0' id="cardVariacao<?=$cont;?>">
      <div class='card-body' id="cardVariacao">
        <div class='text-right'>
          <button type='button' class='btn btn-light btn-sm btnRemoverCampo' 
         id_card_variacao="<?=$cont;?>"
         id_unidade_medida="<?=$row['id_unidade_medida'];?>"
         id_preco="<?=$row['id_preco'];?>"
         ><i class='fas fa-minus'></i></button>
       </div>
       <label>Unidade de medida</label>
       <div class='input-group mb-3'>
         <input type='text' class='form-control' id='medida"+qtdeCampos+"' name='medida_editar[]' id_medida='<?=$row['id_unidade_medida'];?>' value='<?=$row['medida'];?>'>
         <div class='col-5'>
          <select class='form-control' name='unidade_medida_editar[]'>
           <option value="<?=$row['unidade_medida'];?>"><?=strtoupper($row['unidade_medida']);?></option>
           <option value='l'>L</option>
           <option value='ml'>ML</option>
         </select></div>
         <div class='input-group-prepend'>
         </div></div>
         <label>Preço</label>
         <div class='input-group mb-3'>
           <div class='input-group-prepend'>
            <span class='input-group-text'>R$</span>
          </div>
          <input type='text' class='form-control moedaBRL' name='preco_editar[]' value="<?=number_format($row['preco'],2,",",".");?>" id_preco='<?=$row['id_preco'];?>' aria-label='Preço'>
        </div>
      </div></div><br>


      <?php
    }
  }