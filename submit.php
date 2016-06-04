<?php 

include('conexion.php');

$dbh = new PDO($cadena,$user,$pass);

$sentenciaInsertUsuario = $dbh->prepare("INSERT INTO usuarios (`codUsuario`, `nombre`, `apellidoUno`, `apellidoDos`, `fechaNacimiento`, `codDatoPersonal`) VALUES (:cedula, :nombre, :primerApellido, :segundoApellido, :fechaNacimiento, :email)");

$sentenciaInsertDatosPer = $dbh->prepare("INSERT INTO datospersonales (`codDatoPersonal`, `direccionUno`, `direccionDos`, `telefono`, `celular`, `codLocalidad`) VALUES (:email, :direccionUno, :direccionDos, :telefono, :celular, 1)");


if(isset($_POST['registrarUsuario'])){
	$cedula = $_POST['cedulaI'];	
	$name = $_POST['nombreI'];
	$primerApellido = $_POST['apellidoUnoI'];
	$segundoApellido = $_POST['apellidoDosI'];
	$fechaNacimiento = $_POST['fechaNacimientoI'];
	$email = $_POST['emailI'];
	$primeraDireccion = $_POST['direccionUnoI'];
	$segundaDireccion = $_POST['direccionDosI'];
	$telefono = $_POST['telefonoI'];
	$celular = $_POST['celularI'];

	$sentenciaInsertUsuario->bindParam(':cedula', $cedula);
	$sentenciaInsertUsuario->bindParam(':nombre', $name);
	$sentenciaInsertUsuario->bindParam(':primerApellido', $primerApellido);
	$sentenciaInsertUsuario->bindParam(':segundoApellido', $segundoApellido);
	$sentenciaInsertUsuario->bindParam(':fechaNacimiento', $fechaNacimiento);
	$sentenciaInsertUsuario->bindParam(':email', $email);
	$sentenciaInsertUsuario->execute();

	$sentenciaInsertDatosPer->bindParam(':email', $email);
	$sentenciaInsertDatosPer->bindParam(':direccionUno', $primeraDireccion);
	$sentenciaInsertDatosPer->bindParam(':direccionDos', $segundaDireccion);
	$sentenciaInsertDatosPer->bindParam(':telefono', $telefono);
	$sentenciaInsertDatosPer->bindParam(':celular', $celular);
	$sentenciaInsertDatosPer->execute();

	header('Location: index.php'); 
	exit();
}

?>