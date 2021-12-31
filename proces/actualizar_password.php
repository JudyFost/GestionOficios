<?php 
include("../includes/conexion.php");
session_start();
$usuario = $_SESSION["usuario"];
echo '<br><br><br>';
if($_POST['passactual']==NULL or $_POST['passnue']==NULL or $_POST['passnuer']==NULL){
	echo '<div class="alert alert-danger alert-dismissable">';
    echo '	<a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>';
    echo 'Faltan datos para continuar con su solicitud (verifique).';
  	echo '	</div>';
	echo '</div>';
	exit();
}
else{
$passant=$_POST['passactual'];
$passnuev=$_POST['passnue'];
$passnuevr=$_POST['passnuer'];
$pass=md5($passant);	
}
$consult = "SELECT * FROM usuarios WHERE idusuario='$usuario'";
$rs=mysql_query($consult);
//$row=mysql_fetch_object($rs);
$nr=mysql_num_rows($rs);
while ($row = mysql_fetch_array($rs)){ 
$passdb=$row['password'];
}
///////////////////////////////////primera validacion
//variable de verificacion
$verificacion1=false;
$verificacion2=false;
if($passdb==$pass){
    //echo ' Password valido ';
 	$verificacion1=1;
}
else {
	///password diferente al dela base de datos, echo ' Password erroneo';
	$verificacion1=0;
	//$_SESSION['estadouser']="no";
	//header("Location: menuprincipal.php?p=formmodificarusuario.php");
	echo '<div class="alert alert-danger alert-dismissable">';
    echo '	<a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>';
    echo 'Revise su password actual no coincide  (verifique) que no tenga X, no se procedera con su colicitud ...';
  	echo '	</div>';
	echo '</div>';
	exit();
}
///////////////////////////////// segunda validacion de contraseñas nuevas iguales 
if($passnuev==$passnuevr){
	//echo 'Passwords Iguales';
	$verificacion2=1;
}
else{
	//echo 'Passwords Distintas';
	$verificacion1=0;
	//$_SESSION['estadouser']="no";
	//header("Location: menuprincipal.php?p=formmodificarusuario.php");
	echo '<div class="alert alert-danger alert-dismissable">';
    echo '	<a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>';
    echo 'No coinciden sus passwords nuevas (verifique) que no tenga X, no se procedera con su colicitud ...';
  	echo '	</div>';
	echo '</div>';
	exit();	
}
/////////////////////////////// ya validado se va a guardar la contraseña nueva dentro del campo password con md5
///
if ($verificacion1==1 and $verificacion2==1) {
	
	///sql para almacenar contraseña
	$sql = "UPDATE usuarios SET password=md5('$passnuev') WHERE idusuario='$usuario'";
	$rs=mysql_query($sql);
    if($rs){
    //echo 'Se aplicaron cambios Respalde su Password';
  //unset($_SESSION["nombre_cliente"]);
    //$_SESSION['estadouser']="si";
    session_destroy();
    mysql_close();	
     echo '<script language="JavaScript">';
	 echo 'location.reload();';
	 echo '</script>';
  	//session_destroy();
 	//header("Location: ../index.php");	
    }
}
else{
	echo '<div class="alert alert-danger alert-dismissable">';
    echo '	<a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>';
    echo 'Ocurrio un error al procesar su solicitud consulte con el Administrador...';
  	echo '	</div>';
	echo '</div>';
}

 ?>