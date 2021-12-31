<?php 
session_start();
if(!isset($_SESSION["usuario"])){
header("Location: ../index.php"); 
}
 ?>
<!DOCTYPE html>
<html>
<script src="/js/jquery.js"></script>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<script>
	document.getElementById('formulario').style.display = 'none';
		function mostrarform(){
			 document.getElementById('formulario').style.display = 'block';
		}
	 $(document).ready(function(){
	        //ocultar resultado cierto tiempo
	        setTimeout(function(){
	                $(".resultado").fadeOut(1300);
	              },1300);
	        });
 function verificar_password_actual(){
                  $passactual= $("#passant").val();   
                  $.ajax({
                    //dataType: "json",
                    data: {"passactual": $passactual},
                    url:   '../funciones/consultas_cuenta.php',
                    type:  'post',
                    beforeSend: function(){
                      },
                    success: function(respuesta){
                    //  alert($passactual);
                      $("#ver_pass_actual").html(respuesta);
                    },
                    error:  function(xhr,err){ 
                      alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
                    }
                  }); 
      } 
      function verificar_password_iguales(){
                  $passnue= $("#passnue").val();   
                  $passnuer= $("#passnuer").val(); 
                  $.ajax({
                    //dataType: "json",
                    data: {"passnue": $passnue,"passnuer": $passnuer},
                    url:   '../funciones/consultas_cuenta.php',
                    type:  'post',
                    beforeSend: function(){
                      },
                    success: function(respuesta){
                    //  alert($passactual);
                      $("#ver_pass_repetir").html(respuesta);
                    },
                    error:  function(xhr,err){ 
                      alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
                    }
                  }); 
      } 
       function actualizarcontrasena(){
                  $passactual= $("#passant").val();   
                  $passnue= $("#passnue").val();  
                  $passnuer= $("#passnuer").val();
                  $.ajax({
                    //dataType: "json",
                    data: {"passactual": $passactual,"passnue": $passnue,"passnuer": $passnuer},
                    url:   '../proces/actualizar_password.php',
                    type:  'post',
                    beforeSend: function(){
                      },
                    success: function(respuesta){
                    //  alert($passactual);
                      $("#resultadoactualizar").html(respuesta);
                    },
                    error:  function(xhr,err){ 
                      alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
                    }
                  }); 
      } 
 </script>
<body>
	<div id="titulo"><center><b><h3>Modificar Password</center></b></h3></div>
  <br>
  <br>
    <center>
		<form action="#" method="POST" >
			<table id="table-form" border="0">
				<tr>
                 <td id="textcampo">
                   Password Actual:
                 </td>
                 <td>
                   <input name="passant" id="passant" type="password" title="Contrasena Anterior" required onblur="verificar_password_actual()">
                 </td>
                 <td>
                 	<div id="ver_pass_actual"></div>
                 </td>
               </tr>
               <tr>
                 <td id="textcampo">
                   Password Nueva:
                 </td>
                 <td>
                   <input  name="passnue" id="passnue" type="password" title="Contrasena Anterior" required onblur="verificar_password_iguales()">
                 </td>
               </tr>
               <tr>
                 <td id="textcampo">
                   Repetir Password:
                 </td>
                 <td>
                  <input name="passnuer" id="passnuer" type="password" title="Contrasena Anterior" required onblur="verificar_password_iguales()">
                 </td>
                 <td>
                 	<div id="ver_pass_repetir"></div>
                 </td>
               </tr>
               <tr>
                 <td id="textcampo">
                 </td>
                 <td><br>
                  	<input type="button" value="Actualizar" id="boton" onclick="actualizarcontrasena()">
                 </td>
               </tr>
			</table>
		</form>
	</div>
  <br>
  <br>
	<div id="nota">
  <b>Tome en cuenta que:</b><br> 
		* Al modificar el Paasword el sistema pedira nuevamente su verifiacion al mismo.<br>
		* Modifique su password con el fin de tener mas seguridad del mismo. <br>
		* En caso de olvido consulte con el departamento en cuestion.
	</div>
	<div class="resultado">
         <?php
          if (isset($_SESSION['estadouser'])){
           $estado=$_SESSION['estadouser'];
           echo "Estado de password".$estado;
            if($estado=="si"){
              $_SESSION['estadouser']='';
                session_destroy();
                header("Location: ../index.php"); 
            }
            if($estado=="no"){
             // $_SESSION['estadouser']='';
              //include("fallo.php");
            }
          } 
          ?>
       </div>
<div id="resultadoactualizar">
</div>
</body>
</html>

 