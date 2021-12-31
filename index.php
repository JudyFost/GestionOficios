<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/font-awesome.css"> 
	<link rel="stylesheet" href="css/bootstrap.css"> 
	<link rel="stylesheet" href="css/index.css"> 
	<title>Gestion Oficios - DG</title>
</head>
<style type="text/css">
	.form-control{
		padding: 5px;
		margin-top: 0px;
	}
	.btn{
		padding: 5px;
		margin-top: 5px;	
	}
	.fa{
		padding: 20px;
	}
</style>
<body>
<?php
	//header
	include ("./includes/header.php");
?>
<div class="container-fluid">
	<div class="panel panel-info">
	    <div class="panel-heading">Bienvenido a tu portal para continuar inicia sesión.<br> 
	    </div>
	     <?php
			include ("./forms/form_login_user.php");
			?>
	</div>
</div>
<?php
//	include ("./includes/footer.php");
?>	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>
