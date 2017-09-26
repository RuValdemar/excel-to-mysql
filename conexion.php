<!--<meta charset = "utf-8">-->
<?php 

require_once "config.php"; 

function conexionMySQL(){
	$conexion = new mysqli(SERVER,USER,PASS,DB);

	if ($conexion->connect_error) {
		$error = "<div class='error'>Error de conexión N° <b>%d</b> Mensaje del error: <mark>%s</mark></div>";
		printf($error,$conexion->connect_errno,$conexion->connect_error);

	}

	$conexion -> query("SET CHARACTER SET UTF8"); 
	return $conexion;
}
?>