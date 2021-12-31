<?php
include("../includes/conexion.php");
//valores actuales
$idusuario=$_POST['usuario'];
$semestre=$_POST['semestre'];
$actividad=$_POST['actividad'];
$grupo=$_POST['grupo'];

$sql = "DELETE FROM curso  WHERE semestre='$semestre' AND grupo='$grupo' AND actividad_id='$actividad' AND usuarios_idusuario='$idusuario';";
  $rs=mysql_query($sql);
  if ($rs){
      //echo "New record created ";
      session_start();
	  $_SESSION['proceso']="Y";
	  header("Location: ../administradores/index_administradores.php?p=cursos");
  } else {
    // echo "Error: " . $sql . "<br>" . mysql_error();
      session_start();
	  $_SESSION['proceso']="F";
	  header("Location: ../administradores/index_administradores.php?p=cursos");		
  }
  mysql_close();
  
?>