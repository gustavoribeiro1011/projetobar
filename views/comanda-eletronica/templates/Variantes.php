<?php if ($_POST){ $id_produto = $_POST['id_produto']; ?>
<div class="col-sm-12" id="cardVariante"  style="display:none;">
<div class="card shadow">
<div class="card-header py-3">
<div class="progress" style="height: 2px;">
<div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<div class="card-header py-3">
<div class="row">
<div class="col-xl-6 col-lg-7">
<h6 class="m-0 font-weight-bold text-primary">Selecione uma variante</h6>
</div>
<div class="col-xl-6 col-lg-7" align="right">
<button class="btn btn-sm btn-primary btn-voltar-variante"><i class="fas fa-arrow-left"></i> Voltar</button>
<button class="btn btn-sm btn-primary"> <i class="fas fa-th-large"></i></button>
<button class="btn btn-sm btn-primary"><i class="fas fa-list"></i></button> 
</div>
</div>    
</div>
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
while ($row=mysqli_fetch_assoc($result))
{
?>
<div class="col-md-3">
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