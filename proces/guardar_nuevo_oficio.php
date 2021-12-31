<?php
 include("../includes/conexion.php");
 
$notesjo=strtoupper($_POST['notesjo']);
$consecutivo=$_POST['consecutivo'];
$turno=$_POST['turno'];
$fecha_registro=$_POST['fecha_registro'];
$estado=$_POST['estado'];
$procedencia=utf8_decode($_POST['procedencia']);
$emisor=$_POST['emisor'];
$receptor=utf8_decode($_POST['receptor']);
$asunto=utf8_decode($_POST['asunto']);
$uso=$_POST['uso'];
$dias_atencion=utf8_decode($_POST['dias_atencion']);
$tipo_oficio=$_POST['tipo_oficio'];

///$usuario=$_POST['usuario'];
//el susuario no es automatico es karla por que solo ella lo usa si se requiere tomar de idsession, iduser
$sql="INSERT INTO oficio (idoficio, no_oficio, fecha, emisor, receptor, procedencia, asunto, dias_respuesta, estado_idestado, tipo_oficio_idtipo, uso_iduso, usuario_idusuario, turno, tipo_oficio) 
VALUES ('$consecutivo', '$notesjo', '$fecha_registro', '$emisor', '$receptor', '$procedencia', '$asunto', '$dias_atencion', '$estado', '1', '$uso', 'karla', '$turno', '$tipo_oficio');";

	//echo $sql;
	if(mysql_query($sql)){		
		//echo "almacenado con exito";
		session_start();
		$_SESSION['proceso']="Y";
		header("Location: ../administradores/index_administradores.php?p=registrar");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['proceso']="F";
		header("Location: ../administradores/index_administradores.php?p=registrar");
	}

mysql_close();
?>

    
