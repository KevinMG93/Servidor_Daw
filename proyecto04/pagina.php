<?php
//Ponemos las herencias
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";

//Iniciamos la clase
class pagina
{
	//Ponemos las variables
	public $titulo="TITULO DE LA PAGINA";
	private $cabecera,$cuerpo,$pie;
	
	//Empezamos el function y le ponesmos que nos pida las flias y columnas
	function __construct()
	{
		$this->cabecera = new cabecera();
		$this->cabecera->construirMenu();
		$this->cuerpo = new cuerpo;
	}
	function indice($titulo,$texto){
				$this->cuerpo->setTexto($titulo,$texto);
}
	function fotos($filas,$columnas){
				$this->cuerpo->setTabla($filas,$columnas);
}
	function getPagina()
	{
		echo $this->cabecera.$this->cuerpo;
	}
	function getPie()
	{
		$this->pie = new pie;
		$this->pie->setPie();
		echo $this->pie;
	}
	
}
?>