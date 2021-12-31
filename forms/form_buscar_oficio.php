<script>
      function buscar_historial_respuesta_oficio(){
                  $numero_oficio= $("#numero_oficio").val();   
                  $.ajax({
                    //dataType: "json",
                    data: {"numero_oficio": $numero_oficio},
                    url:   '../funciones/consultas_oficios.php',
                    type:  'post',
                    beforeSend: function(){
                   
                      //Lo que se hace antes de enviar el formulario
                      },
                    success: function(respuesta){
                      //lo que se si el destino devuelve algo
                      //alert($numero_oficio);
                      $("#respuesta_oficio").html(respuesta);
                    },
                    error:  function(xhr,err){ 
                      alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
                    }
                  }); 
      }
</script>     
<?php	
if (isset($_GET['id'])){
  echo '<body onload="document.buscarrespuesta_oficio.submit()">';
}
else{
  echo '<body>'; 
}
?> 

	<div class="alert alert-info">
		<strong>Para buscar  un oficio, escriba su número consecutivo en el siguiente campo . . .</strong> 
	</div>
  <?php
         /* echo '<center>';
              echo '<form  action="javascript:buscar_historial_respuesta_oficio();" method="post" name="buscarrespuesta_oficio">';
              echo '  <input type="text" style="text-align:right" name="numero_oficio" id="numero_oficio" size="30" maxlength="30" required title="Se require numero_oficio" style="text-transform:uppercase">';
              echo '  <input type="submit"  class="btn btn-success btn-md" name="buscar"  value="Consultar">';
              echo '</form> ';
              echo '</center>';   */  
			  //search noumero de control automatico;
      if (isset($_GET['id'])){
          $buscar=$_GET['id'];
          echo '<center>';
              echo '<form  action="javascript:buscar_historial_respuesta_oficio();" method="post" name="buscarrespuesta_oficio">';
			  echo '  <input type="text" style="text-align:right" name="numero_oficio" id="numero_oficio" size="30" maxlength="30" required title="Se require numero_oficio" value='.$buscar.'>';
             // echo '  <input type="text" name="control" id="control" size="14" maxlength="14" required title="Se require control" 
              echo '  <input type="submit"  class="btn btn-success btn-md" name="buscar"  value="Consultar">';
              echo '</form> ';
              echo '</center>';
              
      }
      else{
              echo '<center>';
              echo '<form  action="javascript:buscar_historial_respuesta_oficio();" method="post" name="buscarrespuesta_oficio">';
			  echo '  <input type="text" style="text-align:right" name="numero_oficio" id="numero_oficio" size="30" maxlength="30" required title="Se require numero_oficio" style="text-transform:uppercase">';
              echo '  <input type="submit"  class="btn btn-success btn-md" name="buscar"  value="Consultar">';
              echo '</form> ';
              echo '</center>';
      }
  ?>
  
  
<div class="container-fluid">
<center>
    <label id="respuesta_oficio"></label> 
</center>
</div> 
  