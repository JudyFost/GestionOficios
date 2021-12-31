<!--Cabecera-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="../images/tesjo.png" width="45" height="45"><br>
      <!--<a class="navbar-brand" href="index_administradores.php">TESJo</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<?php  
  //  $tipo=$_SESSION["tipo"];
   //     include("conexion.php");
        	echo '    <li><a href="../administradores/index_administradores.php?p=registrar">Registrar</a>';
			echo '    <li><a href="../administradores/index_administradores.php?p=buscar">Buscar</a>';
			echo '    <li><a href="../administradores/index_administradores.php?p=reportes">Reporte</a>';
               // echo '    <li><a href="../administradores/index_administradores.php?p=consultar">Consultar</a>';
?>
 </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Hola, 
          <?php
                          include("../includes/conexion.php"); 
                            if(!isset($_SESSION['usuario'])){
                                header("Location: ../index.php");
                              }
                              else{
                                 echo '<b>'.$_SESSION['usuario'].'</b>';
                                  }              
                        ?>
        </a></li>  
        <li>
          <a data-toggle="dropdown" href="#">
              <i class="fa fa-chevron-down" aria-hidden="true"></i>   
          </a>
              <ul class="dropdown-menu">
               <!-- <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Editar</a></li>-->
                <li class="divider"></li>
               <!-- <li><a href="../administradores/index_administradores.php?p=cuenta">Mi cuenta</a></li>-->
                <li><a href="../proces/cerrar_sesion.php"><i class="fa fa-times-circle" aria-hidden="true"></i> Salir</a></li>
              </ul>
        </li>               
      </ul>
    </div>
  </div>
</nav>  
