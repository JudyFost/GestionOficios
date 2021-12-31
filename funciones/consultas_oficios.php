<?php
	include("../includes/conexion.php");
	session_start();
	// header('Content-Type: text/html; charset=UTF-8'); 
	$tipose=$_SESSION["tipo"];
   // echo $_POST["numero_oficio"];
	$buscar=$_POST["numero_oficio"];
	//buscando oficio en la B.D.
    $sql="SELECT * FROM consulta_oficio WHERE idoficio='$buscar';";
	$rs=mysql_query($sql);
	//$rowpass = mysql_fetch_array($rs); 
	//llenando formulario
	echo '<br><br>';
		while ($row = mysql_fetch_array($rs)){ 
		echo '<div class="container">';
		echo '<!--<h2>Gestionar oficios</h2>-->';
		echo '<div class="panel panel-default">';
		echo '<div class="panel-body">';
        echo '<div class="panel-body"><center><h5>Oficio Número Consecutivo:'.'<b>'.'  '.$row['idoficio'].$row['turno'].'</h5></b></center></div>';
		     //generacion de formulario para buscar solicitud
			echo '<form class="form-inline" method="post" action="../documents/generar_pdf.php" id="form_oficio">';
			echo '<input type="text" size="5" name="consecutivo"'.'value="'.$row['idoficio'].'" style="display:none;">';
            echo '     <div class="text-left">';
            echo '<b><h5>Número Tesjo del Oficio:</b>'.' '.$row['no_oficio'].'</h5>';
			echo ' </div>';
            echo '      <div class="text-left">';
			echo '<b><h5>Fecha:</b>'.' '.$row['fecha'].'</h5>';
		    echo '</div>';
            echo '     <div class="text-left">';
			echo '      <div class="text-left">';
			echo '<b><h5>Situación del Oficio:</b>'.' '.$row['nombre_estado'].'</h5>';
			echo ' </div>';
			echo '       <div class="text-left">';
			echo '<b><h5>Procendencia:</b>'.' '.utf8_encode($row['procedencia']).'</h5>';
			echo '  </div>';
			echo '       <div class="text-left">';
			echo '<b><h5>De:</b>'.' '.utf8_encode($row['emisor_nombre']).'</h5>';
			echo ' </div>';
			echo '       <div class="text-left">';
			echo '<b><h5>Para:</b>'.' '.utf8_encode($row['receptor']).'</h5>';
			echo ' </div>';
			echo '<div class="text-left">';
			echo '<b><h5>Asunto:</b>'.' '.utf8_encode($row['asunto']).'</h5>';
			echo '</div>';
			echo '        <div class="text-left">';
			echo '<b><h5>En calidad de:</b>'.' '.utf8_encode($row['uso_nombre']).'</h5>';
			echo '</div>';
			echo '        <div class="text-left">	';
			echo '<b><h5>Dias restantes para su atención:</b>'.' '.utf8_encode($row['dias_respuesta']).'</h5>';
			echo ' </div>';
			echo '        <div class="text-right">	';
			if($row['estado_idestado']=='1'){
			echo '<a href="#modificar_solicitud" data-toggle="collapse"> <button type="submit" class="btn btn-success">Modificar Situacion</button></a>';
			}
			echo ' <button type="submit" class="btn btn-warning" formtarget="_blank">Generar PDF</button>';
			echo '</div>';
			echo '</form>'; 
			echo '</div>';
			echo '</div>';
			echo '</div>';
			//fin de generacion de formulario de buscar numero de solicitud
			/////////////////////////////////////////////////////
		/////aqui es donde se genera el formulario de editar estatus
				echo '<div id="modificar_solicitud" class="collapse">';
				echo '<div class="panel panel-default">';
                echo '               <form method="post" action="../proces/editar_solicitud.php">';
                echo '<input type="text" size="5" name="consecutivo_actualizar"'.'value="'.$row['idoficio'].'" style="display:none;">';
				echo '      <div class="text-center">';
				echo '¿Concluido?:  ';
				echo '   '.'<input type="checkbox" value="si" name="estado_actualizado">';
                                /*echo '¿Pendiente?:  ';
				echo '   '.'<input type="checkbox" value="no" name="estado_actualizado">';*/

				echo '             <button type="submit" class="btn btn-default">Guardar</button>';
                echo '               </form>';
				echo ' </div>';
				echo '</div>';
				echo '</div>';
		///////////////////////////////////////////////////	
		}			
?>     

