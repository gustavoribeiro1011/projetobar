<?php 
/**
 *
 *  Model Select Unidade Medida
 *
 */ 

$consultarUnidadeMedida = "SELECT * FROM unidade_medida"; 

if ($result=mysqli_query($conecta,$consultarUnidadeMedida))

{
	echo "<option value=''>-- SELECIONE --</option>";

	while ($row=mysqli_fetch_assoc($result))

	{

		echo "<option value='".$row['id']."' id='option-uninidade-medida'>".strtoupper($row['unidade_medida'])."</option>";

	}

}
