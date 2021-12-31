	<div id="paginador" >
	<center>
		<?php
		  /*TRAER TODAS LAS SOLICITUDES PARA VERLAS EN FORMATO TABLA*/
		  include("../includes/conexion.php");
		  /*Sacar el numero total de solicitudes*/
		  $total_sol="SELECT COUNT(*) AS total FROM gestionoficios.consulta_oficio";
		  $rstotal=mysql_query($total_sol);
		  $respuesta=mysql_fetch_array($rstotal);
		  $total=$respuesta['total'];
		  
		  /**/
		  $rango=20; //rango para paginar
		  $paginador=1; //pagina número 1
		  $n_paginas=ceil($total/$rango); //numero de paginas a indexar 
		  //ceil redondea hacia arriba si no fue entero 
		   /*para la primera carga*/
		   $pagina_menor_uno=$total-$rango;
		   echo '<body onload="document:consulta_solicitudes('.$paginador.','.$total.','.$pagina_menor_uno.','.')">'.'</body>';
		   /*sacando rango para generar paginas*/
		echo '  <h5>Páginas:</h5>';
		  while($paginador<=$n_paginas){ 
				  //echo ';Pagina mayor:'.$total;
				  $pagina_menor=$total-$rango; //restado para sacar el rango
				  
				  if($pagina_menor < 0){
					  $pagina_menor=0;
				  }
				  
				/*crear formularios para mandar a traer datos*/
				echo '<input type="button"  onclick="javascript:consulta_solicitudes('.$paginador.','.$total.','.$pagina_menor.','.')" class="btn btn-pag btn-info btn-sm" name="pagina"'.'value='.$paginador.'>'.' ';
				  /*sacar rango que número de paginas con for ??*/
				  $total=$pagina_menor;
				  
				 // echo 'Pagina menor:'.$pagina_menor;
				  $paginador++;	 
			}
		  ?>
		  </center>
		  <br>
		</div>
	<div id="tbl_solicitudes">
	</div>

<script>
    function consulta_solicitudes($paginador,$numero_mayor,$numero_menor){
		$pagina= $paginador; 
		$mayor= $numero_mayor;  	
		$menor= $numero_menor;  		   
                   $.ajax({
                    //dataType: "json",
					//alert ($numero_pagina);
                    data: {"pagina": $pagina,"mayor": $mayor,"menor": $menor},
                    url:   '../reporte/funciones/consultar.php',
                    type:  'post',
                    beforeSend: function(){
                      //Lo que se hace antes de enviar el formulario
                      },
                    success: function(respuesta){
                      //lo que se si el destino devuelve algo
                      $("#tbl_solicitudes").html(respuesta);
                    },
                    error:  function(xhr,err){ 
                      alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
                    }
                  }); 
	} 
</script> 
