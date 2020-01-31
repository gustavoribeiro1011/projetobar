         
<?php


$icone = '"';
$icone.="<a href='javascript:void(0);' class='badge badge-primary link_icone' attr_ico_name=''>Nenhum</a> 	";

$array = array(
	'fas fa-hamburger',
	'fas fa-pizza-slice',
	'fas fa-ice-cream',
	'fas fa-beer',
	'fas fa-wine-glass',
	'fas fa-coffee',
	'fas fa-cocktail',
	'fas fa-hotdog'
);

$keys = array_keys($array);

$size = count($array);


for ($i = 0; $i < $size; $i++) {
	$key   = $keys[$i];
	$value = $array[$key];

	$icone.= "<a href='javascript:void(0);' class='badge badge-primary link_icone' attr_ico_name='".$value."'><i class='".$value."'></i></a> ";

}


$icone.='"+';


echo $icone;    