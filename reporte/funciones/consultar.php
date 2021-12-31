<?php
/*obtencion de datos*/
$pagina=$_POST['pagina'];
$mayor=$_POST['mayor'];
$menor=$_POST['menor'];

/* consulta de solicitudes*/
include("../../includes/conexion.php");
$sql="SELECT * FROM consulta_oficio WHERE idoficio<=$mayor AND idoficio>$menor ORDER BY idoficio DESC;";

$rs=mysql_query($sql);
	echo '<table class="table">';
	echo '    <thead>';
	echo '      <tr>';
	echo '        <th>No.</th>';
	echo '        <th>Dirgido a:</th>';
	echo '        <th>Procedencia:</th>';
	echo '        <th>Asunto:</th>';
	echo '        <th>Elaborada:</th>';
	echo '        <th>Situacion:</th>';
	echo '        <th>Acciones:</th>';
	echo '       </tr>';
	echo '     </thead>';
		echo '     <tbody>';
		while ($row = mysql_fetch_array($rs)){
			if($row['estado_idestado']==2){
				echo '<tr bgcolor="#33ffa8">';
			}
			if($row['estado_idestado']==1){
				echo '<tr>';
			}
				echo '<td>'.$row['idoficio'].'</td>';
				echo '<td >'.utf8_encode($row['receptor']).'</td>';
				echo '<td>'.utf8_encode($row['procedencia']).'</td>';
				echo '<td>'.utf8_encode($row['asunto']).'</td>';
				//echo '<td>'.utf8_encode($row['fecha']).'</td>';
				echo '<td>'.date('d-m-Y', strtotime($row['fecha'])).'</td>'; 
				echo '<td>'.utf8_encode($row['nombre_estado']).'</td>';
				echo '<td> <a href="./index_administradores.php?p=buscar&id='.$row['idoficio'].'">Ver más </a></td>';
				//echo '<td> Editar </td>';
				echo '</tr> ';
			}
		echo '</tbody>';
	echo '  </table>';		 
?>

