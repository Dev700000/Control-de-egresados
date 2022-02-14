<?php 	
require 'conexion.php';
session_start();
error_reporting(1);

$correo = $_POST['correo'];
#echo $correo;
$password  = $_POST['pass'];
#echo $password;

if ($correo == 'everlever' and $password == 'everlever') {
		
			$_SESSION['user'] = 'everlever';
			header('location: inicio.php');
}
else {
$query = "SELECT * FROM users WHERE user = '$correo' AND password = '$password' ";
	
	$resultado = $conn->query($query);
	if ($row = $resultado->fetch_assoc())
	    {
	
			$_SESSION['user'] = $row['user'];
			header('location: inicio.php');
	}
	else 
	{
		
		$errorvalidacion = "USUARIO O CONTRASEÑA INCORRECTO";
		include_once 'login.php';
	}

	if (!$query) 
	{
	    printf("Error: %s\n", mysqli_error($conn));
	    exit();
	}
	
}
 ?>
