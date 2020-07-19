<?php
$hostname = "localhost";
$database = "musicapp";
$username = "root";
$password = "";



$conexion = mysqli_connect( $hostname, $username, $password, $database );

$buscar = "SELECT * FROM score";

$resultado = mysqli_query( $conexion, $buscar );
$registro = mysqli_fetch_array( $resultado );
$json = array($registro);

mysqli_close( $conexion );
for ( $x = 0; $x < count( $json ); $x++ ) {
	echo json_encode( $json [$x] );
}
?>