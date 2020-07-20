<?php
$hostname="localhost";
$database="prueba2";
$username="root";
$password="";

$json=array();
 if(isset($_GET["Run"]) && isset($_GET["Nombre"]) && isset($_GET["ApPaterno"]) && isset($_GET["ApMaterno"]) && isset($_GET["Direccion"]) && isset($_GET["Email"]) && isset($_GET["Nacimiento"]) && isset($_GET["user"]) && isset($_GET["pass"])&& isset($_GET["Perfil"])){
	 
  $rut=$_GET['Run'];
  $nombre=$_GET['Nombre'];
  $ApPaterno=$_GET['ApPaterno'];
  $ApMaterno=$_GET['ApMaterno'];
  $direccion=$_GET['Direccion'];
  $mail=$_GET['Email'];
  $nacimiento=$_GET['Nacimiento'];
  $user=$_GET['user'];
  $pass=$_GET['pass'];
  $perfil=$_GET['Perfil'];

$conexion=new mysqli($hostname,$username,$password,$database);

	 
$insert ="INSERT INTO usuario (Run,Nombre,ApPaterno,ApMaterno,Direccion,Email, Nacimiento,user,pass,Perfil) values ('{$rut}','{$nombre}','{$ApPaterno}','{$ApMaterno}','{$direccion}','{$mail}','{$nacimiento}','{$user}','".$pass."','{$perfil}')";

  if($conexion->query($insert)===TRUE){
   
   
   $resultado = $conexion->query("SELECT * FROM usuario WHERE Run = '".$rut."'");
  
   if($registro=mysqli_fetch_array($resultado)){
    $json['usuario'][]=$registro;
   }
   mysqli_close($conexion);
   echo json_encode($json);
   
  }else{
	  $resulta["Run"]="No Registra";
   	  $resulta["Nombre"]="NO registra";
   	  $resulta["ApPaterno"]="NO registra";
	  $resulta["ApMaterno"]="NO registra";
	  $resulta["Direccion"]="NO registra";
	  $resulta["Email"]="NO registra";
	  $resulta["Nacimiento"]="NO registra";
	  $resulta["user"]="NO registra";
	  $resulta["pass"]="NO registra";
	  $resulta["Perfil"]="NO registra";
	  
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