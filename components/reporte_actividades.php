<?php
    require("../librerias/fpdf182/fpdf.php");
    include("../config/conexion.php");
    //

    $aid=$_GET['aid'];
    $query="select * from activities where id='$aid'";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_array($res);
    $actividad=$row[1];
    
    $query2="select * from partners_activities where aid='$aid'";
    $res2=mysqli_query($link,$query2);
    $cantidad=mysqli_num_rows($res2);
    
    
        //select * from accounts where pid=21102 and activitie='TKD';

    $query="select pa.pid, p.partner from partners_activities as pa inner join partners as p on pa.pid=p.id  where pa.aid='$aid'";
    $res=mysqli_query($link,$query);
    $deudores=0;
    while($row=mysqli_fetch_array($res)){
       $pid=$row[0];
       $query5="select * from accounts where pid='$pid' and activitie='$actividad'";
       $res5=mysqli_query($link,$query5);
       if(mysqli_num_rows($res5)>0){
           $deudores++;
       }
    }
   
    
$pdf = new FPDF();
 // Arial bold 15
 
$hoy=getdate();

 $pdf = new FPDF();
$pdf->AddPage();
$pdf->SetY(15);
$pdf->SetX(25);
$pdf->SetFont('Arial','I',16);
 $pdf->Cell(40,10,'Club Atletico Ferrocarril Midland');
$pdf->SetX(155);
 

$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,''.$hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']);
$pdf->SetY(20);
$pdf->Image('../img/midland.png' , 10 ,10, 15 , 15,'PNG');
 $pdf->Ln(10);
 $pdf->Cell(40,10,'Actividad: '.$actividad.' ');
 $pdf->Ln(10);
 $pdf->Cell(40,10,'Cantidad de alumnos: '.$cantidad.' ');
 $pdf->Ln(10);
 
 $pdf->Cell(40,10,'Alumnos al dia: ');
 $pdf->SetX(48);
 $pdf->SetTextColor(0, 200, 83);
 $pdf->Cell(40,10,$cantidad - $deudores);
 $pdf->SetX(110);
 $pdf->SetTextColor(0,0,0);
 $pdf->Cell(40,10,'Alumnos deudores: ');
 $pdf->SetX(157);
 $pdf->SetTextColor(255, 23, 68);
 $pdf->Cell(40,10,$deudores);

 $pdf->Ln(15);   

 $pdf->SetTextColor(0, 0, 0);
 $pdf->SetFont('Arial','B',16);
 $pdf->SetX(120); 
 $pdf->Ln(12);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(40,10,utf8_decode('N° de socio'));
 $pdf->SetX(65); 
 $pdf->Cell(40,10,'Nombre y apellido');
 $pdf->SetX(160); 
 $pdf->Cell(40,10,'Estado');
 
 $pdf->Ln(7);
 $total=0;
 $pdf->SetFont('Arial','',12);
 
 $query="select pa.pid, p.partner from partners_activities as pa inner join partners as p on pa.pid=p.id  where pa.aid='$aid'";
    $res=mysqli_query($link,$query);
    $deudores=0;

 while($row=mysqli_fetch_array($res)){
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(40,10,$row[0]);
    $pdf->SetX(65); 
    $pdf->Cell(40,10,$row[1]);
    
    $pid=$row[0];
    $query3="select * from accounts where pid='$pid' and activitie='$actividad'";
    $res3=mysqli_query($link,$query3);
    $count_cuotas=mysqli_num_rows($res3);

    if($count_cuotas>0){
        if($count_cuotas===1){
            $pdf->SetX(160);
            $pdf->SetTextColor(255, 23, 68);
            $pdf->Cell(40,10,'DEBE UNA CUOTA');
            $pdf->Ln(7); 
            $deudores+=1;
            
        }else{
            $deudores+=1;
            $pdf->SetX(160);
            $pdf->SetTextColor(255, 23, 68);
            $pdf->Cell(40,10,'DEBE '.$count_cuotas.' CUOTAS');
            $pdf->Ln(7); 
        }
    }else{
        $pdf->SetX(160);
        $pdf->SetTextColor(0, 200, 83);
        $pdf->Cell(40,10,'AL DIA');
        $pdf->Ln(7);
    }   
    
 }










$pdf->Output();
    ?>
