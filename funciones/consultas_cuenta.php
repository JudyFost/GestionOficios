<?php
session_start();
include("../includes/conexion.php");
//$link=Conectarse();
//verificando password actual contra la BD
if(isset($_POST['passactual'])){
	$passactual=md5($_POST['passactual']);
	$user=$_SESSION["usuario"];
	$sql="SELECT password FROM usuarios WHERE idusuario='$user';";
	$rs=mysql_query($sql);
	//$rowpass = mysql_fetch_array($rs); 
		while ($rowpass = mysql_fetch_array($rs)){ 
			$passbd=$rowpass['password'];
		}	
		if($passbd==$passactual){
			$_SESSION['vald1']='1';
			echo '<i class="fa fa-check fa-2x" aria-hidden="true"  style="color:green"></i>';
		}  
		else{
			echo '<i class="fa fa-times fa-2x" aria-hidden="true"  style="color:red"></i>';
			$_SESSION['vald1']='0';
		}
}
//verificando passwords iguales
if(isset($_POST['passnue']) AND isset($_POST['passnuer'])){
		if($_POST['passnue']==$_POST['passnuer']){
			$_SESSION['vald2']='1';
			echo '<i class="fa fa-check fa-2x" aria-hidden="true"  style="color:green"></i>';
		}
		else{
			$_SESSION['vald2']='0';
			echo '<i class="fa fa-times fa-2x" aria-hidden="true"  style="color:red"></i>';
		}
}	
mysql_close();
?>
