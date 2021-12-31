<?php
  session_start();
  unset($_SESSION["usuario"]); 
  //unset($_SESSION["nombre_cliente"]);
  session_destroy();
  header("Location: ../index.php");
  //exit;
?>