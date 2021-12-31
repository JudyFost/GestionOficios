<?php
include("../includes/conexion.php");
?>
<style>
#form_articulo{
margin:20px;	
}
#ayudaboton{
      padding: 5px;
      margin: 10px;
      padding-bottom: 5px;
    }
	#ayuda{
      text-align: justify;
      margin: 20px;

    }
</style>
<?php
                  if(isset($_SESSION['proceso'])){
                      if($_SESSION['proceso']=="Y"){
                           echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h5 style="text-align:center;"><b>Oficio guardo correctamente, gracias . . .</b></h5>';
                          echo '  </div>';   
                      }
                      if($_SESSION['proceso']=="F"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h5 style="text-align:center;"><b>Algo acurrio mal durante su peticion consulte con el administrador, gracias . . .</b></h5>';
                          echo '  </div>';       
                      }
                      unset($_SESSION['proceso']);
                  }       
            ?>

<!--<div class="panel panel-default">-->

<div class="container">
  <!--<h2>Gestionar oficios</h2>-->
  <div class="panel panel-default">
    <div class="panel-body">

       <div class="panel-body"><b><center><h3>Registro de Oficio</h3></b></center></div>
	 <center>
		 <form class="form-inline" method="post" action="../proces/guardar_nuevo_oficio.php" id="form_oficio">
                  <div class="text-right">
		   <div class="form-group">
			<label for="noconsecutivo">Turno:</label>
			<?php 
									$sqlconsecutivo=mysql_query("SELECT MAX(idoficio) AS idoficio FROM oficio;");
									while($rowconsecutivo = mysql_fetch_array($sqlconsecutivo))
									{
										$numero=$rowconsecutivo['idoficio'];
										if($numero==NULL OR $numero==0){
											$numero=1;
											//echo $numero;
										}
										else{
											$numero=$numero+1;
											//echo $numero;
										}
									}
									//$numero=$numero+1;
									echo '<input type="text" size="5" name="consecutivo"'.'value="'.$numero.'" disabled required style="text-align:right;">';
                                                                        echo '<input type="text" size="5" name="consecutivo"'.'value="'.$numero.'" style="display:none;">';
									// debe destar solo coulto para ser leido echo '<input type="text" size="5" name="consecutivo"'.'value="'.$numero.'" disabled required style="text-align:right;">';
									?> 
			<select name="turno" >
				<option value="">- Selecciona -</option>
				<option value="-A">A</option>
				<option value="-B">B</option>				 
				<option value="-C">C</option>
				 <option value="-D">D</option>
			</select> 						
			
		  </div></div><br>
                  <div class="text-left">
                    <div class="form-group">
			<!--<label for="notesjo">Número TESJo:</label>-->
                        <label for="notesjo">No. OFICIO:</label>
			<input type="text" class="form-control" name="notesjo" size="30" maxlength="30" placeholder="205X.." style="text-transform:uppercase" />
		    </div>
                  </div><br>
                  <div class="text-left">
		   <div class="form-group">
			<!--<label for="fecha_registro">Fecha de Registro:</label>-->
                        <label for="fecha_registro">FECHA:</label>
			<input type="date" class="form-control" name="fecha_registro" required />
		   </div></div><br>
                  <div class="text-left">
		   <div class="form-group">
			<label for="estado">Estado del Oficio:</label>
			<?php 
									$sqlestado=mysql_query("SELECT * FROM estado WHERE idestado='1' ORDER BY idestado");
									while($rowestado = mysql_fetch_array($sqlestado))
									{
									echo $rowestado['nombre'].":  ";
									echo '<input type="radio" name="estado" value="'.$rowestado['idestado'].'" required checked/>';
									echo '<br>';
									}
									?> 
		  </div></div><br>
                 <div class="text-left">
		  <div class="form-group">
			<label for="procedencia">Procedencia:</label>
                        <input type="text" class="form-control" name="procedencia" size="100" maxlength="100" required />
			<!--<select class="form-control input-sm" id="procedencia" name="procedencia" required>
								  <?php 
										/*	$sqlprocedencia=mysql_query("SELECT * FROM departamento ORDER BY iddepartamento");
											 echo'<OPTION VALUE="">'.'- Seleccionar -'.'</OPTION>';
											while($rowprocedencia = mysql_fetch_array($sqlprocedencia))
									{
									echo'<OPTION VALUE="'.$rowprocedencia['iddepartamento'].'">'.$rowprocedencia['nombre'].'</OPTION>';
									}*/
									?> 
			</select>-->
		  </div></div><br>
                  
               <div class="text-left">
                       <label for="tipo_oficio">Tipo de Oficio:</label>
                        <select name="tipo_oficio" >
				<option value="">- Selecciona -</option>
				<option value="No. de Oficio:">No. de Oficio</option>
				<option value="Circular:">Circular</option>				 
				<option value="CORREO ELECTRONICO">Correo Electronico</option>
                                <option value="RENUNCIA">RENUNCIA</option>
                                <option value="Renuncia y Finiquito">Renuncia y Finiquito</option>
			</select> 
               </div><br>



                  <div class="text-left">
		   <div class="form-group">
			<label for="de">De:</label>
			<select class="form-control input-sm" id="emisor" name="emisor" required>
								  <?php 
											$sqlemisor=mysql_query("SELECT * FROM departamento WHERE iddepartamento='2'");
											 //echo'<OPTION VALUE="">'.'- Seleccionar -'.'</OPTION>';
											while($rowemisor = mysql_fetch_array($sqlemisor))
									{
									echo'<OPTION VALUE="'.$rowemisor['iddepartamento'].'">'.utf8_encode($rowemisor['nombre']).'</OPTION>';
									}
									?> 
			</select>
		  </div>
		 <div class="form-group">
			<label for="para">Para:</label>
                        <input type="text" class="form-control" name="receptor" size="100" maxlength="500" required />
			<!--<select class="form-control input-sm" id="receptor" name="receptor" required>
								  <?php 
											/*$sqlreceptor=mysql_query("SELECT * FROM departamento ORDER BY iddepartamento");
											 echo'<OPTION VALUE="">'.'- Seleccionar -'.'</OPTION>';
											while($rowreceptor = mysql_fetch_array($sqlreceptor))
									{
									echo'<OPTION VALUE="'.$rowreceptor['iddepartamento'].'">'.$rowreceptor['nombre'].'</OPTION>';
									}*/
									?> 
			</select>-->
		  </div></div><br><br>
                  <div class="text-left">
		   <div class="form-group">
		     <label for="asunto">Asunto:</label>
			<textarea class="form-control" id="asunto" name="asunto" rows="3"  cols="125" required></textarea>
		  </div></div><br><br>
                  <div class="text-left">
		    <div class="form-group">
			<label for="encalidadde">En calidad de:</label>
			<select class="form-control input-sm" id="uso" name="uso" required>
								  <?php 
											$sqluso=mysql_query("SELECT * FROM uso ORDER BY iduso");
											 echo'<OPTION VALUE="">'.'- Seleccionar -'.'</OPTION>';
											while($rowuso = mysql_fetch_array($sqluso))
									{
									echo'<OPTION VALUE="'.$rowuso['iduso'].'">'.utf8_encode($rowuso['nombre']).'</OPTION>';
									}
									?> 
			</select>
		  </div></div><br><br>
                  <div class="text-left">	
		   <div class="form-group">
			<label for="diasrestantes">Dias restantes para su atencion:</label>
			<input type="number" name="dias_atencion" min="1" max="5" value="5" required>
		  </div></div><br><br>
		  <button type="submit" class="btn btn-success">Guardar</button>
		  <button type="reset" class="btn btn-warning">Limpiar</button>
		</form> 			   
	</center>



    </div>
  </div>
</div>


  
<!--</div>-->	



