<?php
require_once "elemento.php";

class cuerpo extends elemento
{
	
	//En este caso no tendrá titulo
	function __construct()
	{
		$this->setTitulo("");	
	}

	//Funcion que define el titulo
	function setTexto($titulo,$texto){
		$str=$titulo;
		$this->setTitulo("<h1>".$titulo."</h1>");	

		$str="<p>".$texto."</p>";
		$this->setContenido($str);
		}
		
	//Funcion que define la tabla
	
	function setTabla($filas,$columnas)
	{
		$str="";
		$contador=1;
		
		$str="<table border='3'>";
		for($i=1;$i<=$filas;$i++)
		{
			$str=$str."<tr>";
			for($j=1;$j<=$columnas;$j++)
			{
				$str=$str."<td><img src='Imagenes/foto0".$contador.".jpg'".$contador++."</td>";
			}
			$str=$str."</tr>";
		}
		$str=$str."</table>";
		
		$this->setContenido($str);
	}
	
}
?>