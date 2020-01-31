<div class="container-fluid"><?php if ($_POST){ $id_produto = $_POST['id_produto']; ?>
	<div class="row">
<div class="col-sm-12" id="cardVariante"  style="display:none;">
<div class="card shadow">
<div class="card-body">
<div class="row" style="max-width: 100%">
<?php


if(!@include_once('../../../config.php')) {}

$sql="
select
c.produto,
a.medida,
a.unidade_medida,
b.preco,

c.id id_produto,
a.id id_unidade_medida,
b.id id_preco

from unidade_medida a
left join precos b on (
a.id_produto=b.id_produto and
a.variacao=b.variacao
)
left join produtos c on (a.id_produto=c.id) 
where c.id = ".$id_produto;

if ($result=mysqli_query($conecta,$sql))
{
	?>

        <div class="col-md-6 col-xl-3">
         <div class="card">  
          <button class="btn btn-primary btn-block btnVoltarParaProduto">
          <div align="left"><i class="fas fa-arrow-left"></i> VOLTAR</div>
        </button>
      </div>
    </div>

	<?php
while ($row=mysqli_fetch_assoc($result))
{
?>
<div class="col-md-6 col-xl-3">
<div class="card">  
<button class="btn btn-primary btn-block btnVariante"
id_unidade_medida="<?=$row['id_unidade_medida'];?>"
unidade_medida="<?=$row['unidade_medida'];?>"
medida="<?=$row['medida'];?>"
id_preco="<?=$row['id_preco'];?>"
preco="<?=$row['preco'];?>"
>
<div align="left">
<b><?=$row['medida'];?> <?=strtoupper($row['unidade_medida']);?></b> 
</div>
<div align="right">
R$ <?= number_format($row['preco'], 2, ',', '.');?>
</div>
</button>
</div>
</div>
<?php     }
mysqli_free_result($result);
}

}// if post
?>
</div>
</div>
</div>
</div>
</div>