<?php 
error_reporting(E_ALL ^ E_DEPRECATED); //omitir error de mysql viejo al nuevo ms
					if (!($link=mysql_connect("localhost","root","josediaz")))
	      { 
         echo "Error conectando a la base de datos."; 
         exit(); 
      } 
if (!mysql_select_db("gestionoficios")) 
   { 
	      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
?> 
