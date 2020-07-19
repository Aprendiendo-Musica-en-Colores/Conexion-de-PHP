<?php
$hostname = "localhost";
$database = "musicapp";
$username = "root";
$password = "";

$json = array();

if ( isset( $_GET[ "username" ] ) && isset( $_GET[ "pass" ] ) ) {
	$user = $_GET[ 'username' ];
        $pass = $_GET[ 'pass' ];

	$conexion = mysqli_connect( $hostname, $username, $password, $database );

	$buscar = "SELECT * FROM usuario WHERE username= '{$user}' and pass= '".md5($pass)."'";

	$resultado = mysqli_query( $conexion, $buscar );

	if ( $registro = mysqli_fetch_array( $resultado ) ) {
		$json[ 'usuario' ][] = $registro;

	} else {
		$resulta[ "Run" ] = "No Registra";
		$resulta[ "Nombre" ] = "NO registra";
		$resulta[ "ApPaterno" ] = "NO registra";
		$resulta[ "ApMaterno" ] = "NO registra";
		$resulta[ "Direccion" ] = "NO registra";
		$resulta[ "Email" ] = "NO registra";
		$resulta[ "Nacimiento" ] = "NO registra";
		$resulta[ "username" ] = "NO registra";
		$resulta[ "pass" ] = "NO registra";
		$resulta[ "Perfil" ][] = "NO registra";
	}
	mysqli_close( $conexion );
	echo json_encode( $json );
} else {
	$resulta[ "Success" ] = 0;
	$resulta[ "Message" ] = "WS NO retorna";
	$json[ 'usuario' ] = $resulta;
	echo json_encode( $json );
}
?>