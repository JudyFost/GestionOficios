<div class="col-sm-12">

<!-- Header -->
	<!--<header id="header">
	   <div style="position:absolute; top:20px; left:0px; visibility:visible z-index:1">  
	      <img src="images/tesjo.png" width="130">									 
           </div>								
	   <div style="position:absolute; top:17px; left:1800px; visibility:visible z-index:1"> 
             <img src="images/lobo_tesjo.png" width="100"> 
           </div>
           <hr/>								   
	   <strong><h4 align="center"> INICIAR SESION </h4></strong>
	</header>
        <hr/>-->

    <center>

	<!--<strong><h4 align="center"> INICIAR SESIÓN </h4></strong>-->
	<hr/>
	<img src="images/Logo-TESJo.png" width="300"><br><br><br>	
       <!--<i id="user" class="fa fa-user fa-5x"></i>-->
    </center>
    <center>   
            <form id="login" action="./proces/valida_login.php" method="post" class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-5" for="usuario"></label>
                  <div class="col-sm-2">
                    <input type="text" name="user" placeholder="Usuario" class="form-control" maxlength="20" size="20" required="Se requiere usuario">
                  </div>
               </div>   
               <div class="form-group">
                  <label class="control-label col-sm-5" for="password"></label>
                  <div class="col-sm-2">
                    <input type="password" name="pass" placeholder="Contraseña"  class="form-control" maxlength="40" size="40" required="Se requiere password">
                  </div>
               </div>    
              <div class=" form-group">
                  <label class="control-label col-sm-5" for="login"></label>
                  <div class="col-sm-2">    
                    <input type="submit" name="login" class="btn btn-success"" value="Ingresar">
                  </div>
                </div> <br><br>
              <hr/>
                <?php
                  if(isset($_SESSION["validacion"])){
                    if($_SESSION["validacion"]=='F'){
                      echo '<div class="alert alert-danger">';
                      echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                         echo '<center><span style="color:#DF0101"><b><i class="fa fa-times fa-1x"></i> Verifique sus datos</b></span></center>';
                       	echo '<p>'.'Si haz olvidado tu contraseña o usuario contacta al administrador . . .'.'</p>';
                      echo '</div> ';   
                    }
                    unset($_SESSION["validacion"]);  
                  }  
                  ?>                  
            </form>
    </center>
</div>
