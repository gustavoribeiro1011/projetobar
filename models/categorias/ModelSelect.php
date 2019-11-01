<?php 
/**
 *
 *  Model Select Categoria
 *
 */ 

$consultarCategoria = "SELECT * FROM categorias"; 

if ($result=mysqli_query($conecta,$consultarCategoria))

{
	echo "<option value=''>-- Selecione --</option>";

	while ($row=mysqli_fetch_assoc($result))

	{

		echo "<option value='$row[id]'>$row[categoria]</option>";

	}

}
