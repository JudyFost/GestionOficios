<?php
include("../includes/conexion.php");
$tipousuario=false;
$user=$_POST["user"];
$pass=md5($_POST["pass"]);
$rs=mysql_query("SELECT * FROM usuario WHERE idusuario='$user' and password='$pass'");
$nr=mysql_num_rows($rs);
while ($row = mysql_fetch_array($rs)){ 
	$tipousuario=$row['tipo_usuario_idtipo'];
}
	if($nr==1){ //usuario valido
		session_start();
		$_SESSION["usuario"]=$_POST["user"];
		$_SESSION["tipo"]=$tipousuario;
  		///MANDAR A LA CARPETA DEPENDIENDO DEL TIPO DE USUARIO
			if($tipousuario=='2'){ //ASISTENTE PERSONAL 
				header("Location: ../administradores/index_administradores.php");
			}
		}			 
	if($nr==0){ //usuario no valido
	    session_start();
		$_SESSION["validacion"]='F';
	    header("Location: ../index.php");			
	}
mysql_close();	
?>
