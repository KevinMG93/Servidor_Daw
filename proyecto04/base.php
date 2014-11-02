<?php
	require_once "db.php";
	require "pagina.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="styles.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Base</title>
</head>
	<?php
		$pagina = new pagina();
		$pagina->indice("Base","");
		$pagina->getPagina();
		$db=new db();
		$db->conectar_base_datos();
		echo $db->getLugares();
		$pagina->getPie();
	?>
<body>
</body>
</html>