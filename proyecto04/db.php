<?php
	/**
	* db
	*
	* Gestor de Bases de datos utilizando la nueva api mejorada de php mysqli orientada a objetos
	*
	* @author Paco Gómez
	* @author http://es.linkedin.com/pub/paco-gomez-arnal/7/387/807/
	*
	* @version 1.0
	*/
class db
{
	/**
	* string del servidor
	*/
	private $servidor="localhost";
	/**
	* string del usuario
	*/
	private $usuario="root";
	/**
	* string del password
	*/
	private $pass="broyer93";
	/**
	* string de la base de datos
	*/
	private $base_datos="Lugares";
	/**
	* descriptor a la conexión con la base de datos
	*/
	private $descriptor;
	/**
	* boolean que nos indica si ha habido exito al conectar o no
	*/
	private $conectado;
	/**
	* información del error o conexión habilitada
	*/
	private $info;
	/*function __construct()
	{
		echo "Numero de argumentos: ".func_num_args();
		if(func_num_args()==1){
			$this->usuario = func_get_arg(0);
			$this->conectado=false;
			$this->info="";
		}elseif(func_num_args()==2){
			$this->usuario = func_get_arg(0);
			$this->pass = func_get_arg(1);
			$this->conectado=false;
			$this->info="";			
		}
	}
	*/
	/**
		* Realiza la conexión con la base de datos devolviendo el estado de la misma
		*
		* @return conectado boolean
	*/	
	public function conectar_base_datos()
	{
		$this->descriptor = new mysqli($this->servidor, $this->usuario, $this->pass, $this->base_datos);
		if ($this->descriptor->connect_errno) {
    		$this->$info="Fallo al contenctar a MySQL: (" . $this->descriptor->connect_errno . ") " . $this->descriptor->connect_error;
			$this->conectado=false;
		}else{
			$this->info="Conectado al servidor MySQL: " .$this->descriptor->host_info;
			$this->conectado=true;
		}
		
		return $this->conectado;
	}
	
	/**
		* Devuelve el estado de la conexión actual
		*
		* @return info string
	*/	
	public function getInfo(){
		return $this->info;
	}

	/**
		* Devuelve una tabla con todos los lugares almacenados en la tabla de la base de datos lugares
		*
		* @return str string
	*/	
	public function getLugares(){
		$str="";
		if($resultado = $this->descriptor->query("SELECT * FROM Lugares")){
			$str=$str."<table border=1><tr bgcolor='#dddddd'><td>ID</td><td>Lugar</td><td>Descripción</td><td>Fecha</td></tr>";
			for ($num_fila = 0; $num_fila < $resultado->num_rows; $num_fila++) {
				$resultado->data_seek($num_fila);
				$fila = $resultado->fetch_assoc();
				$str=$str."<tr>";
				$str=$str."<td>".$fila['ID']."</td>";
				$str=$str."<td>".$fila['Nombre']."</td>";
				$str=$str."<td>".$fila['Descripcion']."</td>";
				$str=$str."<td>".$fila['Fecha']."</td>";
				$str=$str."</tr>";
			}
			$str=$str."</table>";
		}else{
			 printf("Error: %s\n", $this->descriptor->error);
		}
		return $str;
	}
	
	public function setLugar($Lugar,$Descripcion,$Fecha){
		if($resultado = $this->descriptor->query("INSERT INTO Lugares (Nombre,Descripcion,Fecha) VALUES 
		('$Nombre','$Descripcion','$Fecha')")){
			echo "OK<br>";
		}else{
			echo "ERROR<br>";
			 printf("Error: %s\n", $this->descriptor->error);
		}
	}
}