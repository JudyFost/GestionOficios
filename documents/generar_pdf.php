<?php
set_time_limit(3600);
//session_start();
require('../fpdf/fpdf.php');
include("../includes/conexion.php"); 
$pdf=new FPDF('P','cm',array(27.94,21.59));
/////////////////////////////////////////
$idoficio=$_POST["consecutivo"];
$pdf->AddPage();
			    $sql="SELECT * FROM consulta_oficio WHERE idoficio='$idoficio';"; 
                $rs = mysql_query($sql);	
        		while ($row = mysql_fetch_array($rs)){
						$pdf->Image('../images/gobierno.png' , 1,1,5.8,1.8,'PNG');
                        $pdf->Ln(3);
                        $pdf->Image('../images/logo_tesjo.png' , 10,1,1.8,1.8,'PNG');
						$pdf->Image('../images/edomex.png' ,15,1,5.8,2,'PNG');
						$pdf->SetFont('Arial','B',14);
						$pdf->Cell(20,0,utf8_decode('CONTROL DE GESTIÓN'),0,1,'C');
						$pdf->SetFont('Arial','B',12);	
						$pdf->Ln(.5);
						$fecha=$row['fecha'];
						$fecha = explode("-", $fecha);
                        $pdf->Cell(18,.8,utf8_decode('Fecha:  ').$fecha[2].' '.'/ '.$fecha[1].' '.'/ '.$fecha[0],0,0,'R');
						$pdf->Ln(1);
						$pdf->Cell(18,.8,utf8_decode('Turno:  ').$row['idoficio'].$row['turno'],0,0,'R');
						$pdf->Ln(1);	
                        //Dirigido a
						$longitud = $row['receptor'];
						$longitud= strlen($longitud);
						if($longitud>55){
							$salto=$longitud/150;
							$pdf->MultiCell(18,$salto,utf8_decode('Dirigido a:  ').$row['receptor'],0,'J'); 
						}
						else{
							$pdf->MultiCell(20,1,utf8_decode('Dirigido a:  ').$row['receptor'],0,'J');  	
						}
						$pdf->Ln(.5);		
						$pdf->Cell(20,0,utf8_decode('').$row['tipo_oficio'].' '.$row['no_oficio'],0,0,'L');
						$pdf->Ln(.7);
						///Procedencia
						$longitud_procedencia = $row['procedencia'];
						$longitud_procedencia= strlen($longitud_procedencia);
						if($longitud_procedencia>55){
							$salto_procedencia=$longitud_procedencia/200;
							$pdf->MultiCell(18,$salto_procedencia,utf8_decode('Procedencia:  ').$row['procedencia'],0,'J');
						}
						else{
							$pdf->MultiCell(18,.5,utf8_decode('Procedencia:  ').$row['procedencia'],0,'J');	
						}
						$pdf->Ln(.5);
						////Asunto
						$longitud_asunto = $row['asunto'];
						$longitud_asunto= strlen($longitud_asunto);
						if($longitud_asunto<=55){
							$salto_asunto=$longitud_asunto/200;
							$pdf->MultiCell(18,$salto_asunto,utf8_decode('Asunto:  ').$row['asunto'],0,'J');
						}
						elseif ($longitud_asunto!=55){
							$pdf->MultiCell(18,.8,utf8_decode('Asunto:  ').$row['asunto'],0,'J');	
						}
						$pdf->Ln(.5);
						//$pdf->Rect(20,20,W);
						$pdf->MultiCell(18,1.2,utf8_decode('Instrucciones:  ')."\n".utf8_decode('- Para su atención procedente:').$pdf->Image('../images/cuadro.png',$pdf->GetX()+6.5,$pdf->GetY()+1.4,.7,.7)."\n".utf8_decode('- Para acuerdo con el Director General:').$pdf->Image('../images/cuadro.png',$pdf->GetX()+8.2,$pdf->GetY()+2.6,.7,.7)."\n".utf8_decode('- Para someterlo en la próxima Junta Directiva:').$pdf->Image('../images/cuadro.png',$pdf->GetX()+9.7,$pdf->GetY()+3.8,.7,.7)."\n".utf8_decode('- Para elaborar nota al Director General:').$pdf->Image('../images/cuadro.png',$pdf->GetX()+8.2,$pdf->GetY()+5,.7,.7)."\n".utf8_decode('- Para su conocimiento:').$pdf->Image('../images/cuadro.png',$pdf->GetX()+5,$pdf->GetY()+6.2,.7,.7).' '."\n",1,'J');
                        $pdf->Ln(.5);
                        $pdf->SetFont('Arial','B',10);
						 $pdf->MultiCell(18.5,.5,'Se solicita atentamente su respuesta a mas tardar en'.' '.$row['dias_respuesta'].' '.utf8_decode('dias informando de ello a la dirección general.'),0,'C');	
						 $pdf->Image('../images/firma_dg.png',2.8,23,16,4,'PNG');
						//$pdf->Cell(18,.5,utf8_decode('     Se solicita atentamente su respuesta a mas tardar en ').$row['dias_respuesta'],0,0,'L');
                        //$pdf->Ln(.5);
                       // $pdf->Cell(20,0,utf8_decode('dias informando de ello a la dirección general.'),0,0,'R');
						//$pdf->Ln(1.5);
                        //$pdf->Ln(1);
		
				}
$pdf->Output();
?>
