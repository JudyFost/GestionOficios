<?php
 include("../includes/conexion.php");
 
$idfolio=$_POST['consecutivo_actualizar'];
$estado=$_POST['estado_actualizado'];
//el usuario no es automatico es karla por que solo ella lo usa si se requiere tomar de idsession, iduser

//$sql="UPDATE oficio SET estado_idestado='$esta' WHERE idoficio='$conse' and no_oficio='$notec' and emisor='$emis' and estado_idestado='$esta' and tipo_oficio_idtipo='1' and uso_iduso='$us' and usuario_idusuario='karla';";
echo $idfolio;
echo $estado;
if($estado=="si"){
	$sql="UPDATE oficio SET estado_idestado='2' WHERE idoficio='$idfolio'";
	if(mysql_query($sql)){		
		//echo "almacenado con exito";
		session_start();
		$_SESSION['proceso']="Y";
		//header("Location: ../administradores/index_administradores.php?p=buscar");
		$url="../administradores/index_administradores.php?p=buscar";
		$url=$url."&search=".$idfolio;
		header("Location: $url");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['proceso']="F";
		//header("Location: ../administradores/index_administradores.php?p=buscar");
		$url="../administradores/index_administradores.php?p=buscar";
		$url=$url."&search=".$idfolio;
		header("Location: $url");
	}
}
else{
	//header("Location: ../administradores/index_administradores.php?p=buscar");
	$url="../administradores/index_administradores.php?p=buscar";
	$url=$url."&search=".$idfolio;
	header("Location: $url");
}
mysql_close();
?>

    
