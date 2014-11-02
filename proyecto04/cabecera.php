<?php
require_once "elemento.php";

class cabecera extends elemento
{
	
	//En este caso no tendrá titulo
	function __construct()
	{
		$this->setTitulo("");	
	}
	
	// Menu en array 
	private $menu=array(
	"home"=>array(
		"txt"=>"Inicio",
		"url"=>"http://192.168.1.42/proyecto04/"
		),
	"fotos"=>array(
		"txt"=>"Fotos",
		"url"=>"http://192.168.1.42/proyecto04/fotos.php"
		),
	"facebook"=>array(
		"txt"=>"Facebook",
		"url"=>"http://facebook.es"
		),
		"base"=>array(
		"txt"=>"Base",
		"url"=>"http://192.168.1.42/proyecto04/base.php"
		)
	);
	
		// Direccion del menu
	function setDireccion($elementoMenu,$direccionWeb){
		$elemento=$this->menu[$elementoMenu];
		$elemento["url"]=$direccionWeb;
		}
		
		// Constructor del menu
	function construirMenu(){
		$menu="<div id='cssmenu'><ul>";
		foreach($this->menu as $elementos){
			$menu=$menu."<li><a href=".$elementos["url"].">".$elementos["txt"]."</a></li>";
			}
			$menu=$menu."</ul></div>";
			$this->setContenido($menu);
		}
}

?>