<?php
$hostname = "localhost";
$database = "musicapp";
$username = "root";
$password = "";

	$conexion = mysqli_connect( $hostname, $username, $password, $database );

	$rut = $_POST[ 'Run' ];
	$nombre = $_POST[ 'Nombre' ];
	$ApPaterno = $_POST[ 'ApPaterno' ];
	$ApMaterno = $_POST[ 'ApMaterno' ];
	$direccion = $_POST[ 'Direccion' ];
	$mail = $_POST[ 'Email' ];
	$nacimiento = $_POST[ 'Nacimiento' ];
	$user = $_POST[ 'username' ];
	$pass = $_POST[ 'pass' ];
	$perfil = $_POST[ 'Perfil' ];

	$sql = "UPDATE usuario SET Nombre= ? , ApPaterno= ? , ApMaterno= ?, Direccion= ?, Email= ? , Nacimiento = ? , username = ? , pass = ? , Perfil = ? WHERE Run = ?";

$stm=$conexion->prepare($sql);
$stm->bind_param('sssssssssi',$nombre,$ApPaterno,$ApMaterno,$direccion,$mail,$nacimiento,$user,$pass,$perfil,$rut);

	if ( $stm->execute()) {

		echo "actualiza";

	} else {

		echo "no Actualiza";
	}
mysqli_close($conexion);

?>