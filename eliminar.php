<?php
$hostname="localhost";
$database="prueba2";
$username="root";
$password="";

$json=array();
 if(isset($_GET["Run"])){
 
  $rut=$_GET['Run'];

$conexion=new mysqli($hostname,$username,$password,$database);

	 
$eliminar ="DELETE FROM usuario WHERE Run='".$rut."'";

  if($conexion->query($eliminar)===TRUE){
   
   mysqli_close($conexion);
   echo json_encode($json);
   
  }else{
	  $resulta["idUsuario"]="NO elimina";
	  $resulta["Run"]="NO elimina";
   	  $resulta["Nombre"]="NO elimina";
   	  $resulta["ApPaterno"]="NO elimina";
	  $resulta["ApMaterno"]="NO elimina";
	  $resulta["Direccion"]="NO elimina";
	  $resulta["Email"]="NO elimina";
	  $resulta["Nacimiento"]="NO elimina";
	  $resulta["user"]="NO elimina";
	  $resulta["pass"]="NO elimina";
	  $resulta["Perfil"]="NO elimina";

   $json['usuario'][]=$resulta;
   echo json_encode($json);
  }
 }else{
	  $resulta["Run"]="WS NO retorna";
   	  $resulta["Nombre"]="WS NO retorna";
   	  $resulta["ApPaterno"]="WS NO retorna";
	  $resulta["ApMaterno"]="WS NO retorna";
	  $resulta["Direccion"]="WS NO retorna";
	  $resulta["Email"]="WS NO retorna";
	  $resulta["Nacimiento"]="WS NO retorna";
	  $resulta["user"]="WS NO retorna";
	  $resulta["pass"]="WS NO retorna";
	  $resulta["Perfil"]="WS NO retorna";
  $json['usuario'][]=$resulta;
  echo json_encode($json);
 }
?>

