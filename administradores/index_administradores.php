<?php
session_start();
if(!isset($_SESSION["tipo"])){
  header("Location: ../index.php");
}
header("Content-Type: text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/font-awesome.css"> 
	<link rel="stylesheet" href="../css/bootstrap.css"> 
	<link rel="stylesheet" href="../css/index.css"> 
	<title>Gestion Oficios</title>
</head>
<body>
<?php
	//header
         // comentario a borrar
	include ("../includes/header_administradores.php");
?>
 <?php
                error_reporting(0);
                  if(isset($_GET['p'])){
                         $pagina = $_GET['p'];
                         if($pagina=="registrar"){
                          include("../forms/form_nuevo_oficio.php");

                         }
                          if($pagina=="buscar"){
                         include("../forms/form_buscar_oficio.php");

                         }
						 if($pagina=="reportes"){
                         include("../reporte/ver.php");

                         }
                   } 
                     
                     else { 
					  include("../forms/form_nuevo_oficio.php");
                         // include("../forms/form_buscar_alumno.php");   
                      }
                      
                ?>

	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
</body>
</html>
