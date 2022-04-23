<?php
    require("../librerias/fpdf182/fpdf.php");
    include("../config/conexion.php");
    $pid=$_GET['pid'];
    $query="select * from partners where id='$pid'";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_array($res);
    $query2="select * from accounts where pid='$pid'";
    $res2=mysqli_query($link,$query2);
    
    

    
 // Arial bold 15
 
$hoy=getdate();

 $pdf = new FPDF();
$pdf->AddPage();
$pdf->SetY(15);
$pdf->SetX(25);

 
 //fecha
 $pdf->SetFont('Arial','',15);
 $pdf->SetY(38);
 $pdf->SetX(158);
 $pdf->Cell(40,10,''.$hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']);
 $pdf->Ln(10);
 //socio

 $pdf->SetY(65);

 $pdf->SetFont('Arial','',10);
 $pdf->SetX(30); 
 $pdf->Cell(40,10,'Socio: '.$row[1].' ');
 $pdf->Ln(5);
 $pdf->SetX(30); 
 $pdf->Cell(40,10,utf8_decode('N° de socio: ').$row[0].' ');
 $pdf->Ln(5);
 $pdf->SetX(30); 
 $pdf->Cell(40,10,'IVA: Consumidor Final  ');
 $pdf->SetX(100); 
 $pdf->Cell(40,10,'CUIT: 99-99999999-99');
 $pdf->Ln(8);
 //detalle




 $pdf->SetFont('Arial','B',8);
 $pdf->SetX(30); 
 $pdf->Cell(40,10,'Detalle');
 $pdf->SetX(65); 
 $pdf->Cell(40,10,'Fecha');
 $pdf->SetX(90); 
 $pdf->Cell(40,10,'Precio');
 $pdf->SetX(105);
 $pdf->Cell(40,10,'vencimiento');
 $pdf->SetX(135);
 $pdf->Cell(40,10,'socio');
 $pdf->Ln(3);
 $total=0;
 $pdf->SetFont('Arial','I',8);
 $pdf->SetX(30); 

 //importes
 while($row2=mysqli_fetch_array($res2)){
    $total+=$row2[3];
    $pdf->SetX(30); 
    $pdf->Cell(40,10,$row2[2]);
    $pdf->SetX(65); 
    $vencimiento=explode('/',$row2[4]);
    if(intval($vencimiento[1]+1)==13){
        $vencimiento[1]=0;
        $vencimiento[2]+=1;
      }
    $pdf->Cell(40,10,$row2[4]);
    $pdf->SetX(90); 
    $pdf->Cell(40,10,'$'.$row2[3]);
    $pdf->SetX(105);
    $pdf->Cell(40,10,$vencimiento[0].'/'.intval($vencimiento[1]+1).'/'.$vencimiento[2]);
    $pdf->SetX(135);
    $pdf->Cell(40,10,$row[1]);
    $pdf->Ln(3);
 }
$pdf->SetFont('Arial','B',16);
$pdf->Ln(10);
$pdf->SetY(122); 
$pdf->SetX(50); 

//total
$pdf->Cell(40,10,'$'.$total);











$query="select * from partners where id='$pid'";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_array($res);
    $query2="select * from accounts where pid='$pid'";
    $res2=mysqli_query($link,$query2);
//copia
//fecha
$pdf->SetFont('Arial','',15);
$pdf->SetY(196);
$pdf->SetX(158);
$pdf->Cell(40,10,''.$hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']);
$pdf->Ln(10);
//socio

$pdf->SetY(226);
$pdf->SetFont('Arial','',10);
$pdf->SetX(30); 
$pdf->Cell(40,10,'Socio: '.$row[1].' ');
$pdf->Ln(5);
$pdf->SetX(30); 
$pdf->Cell(40,10,utf8_decode('N° de socio: ').$row[0].' ');
$pdf->Ln(5);
$pdf->SetX(30); 
$pdf->Cell(40,10,'IVA: Consumidor Final  ');
$pdf->SetX(100); 
$pdf->Cell(40,10,'CUIT: 99-99999999-99');
$pdf->Ln(8);
//detalle



$pdf->SetFont('Arial','B',8);
$pdf->SetX(30); 
$pdf->Cell(40,10,'Detalle');
$pdf->SetX(65); 
$pdf->Cell(40,10,'Fecha');
$pdf->SetX(90); 
$pdf->Cell(40,10,'Precio');
$pdf->SetX(105);
$pdf->Cell(40,10,'vencimiento');
$pdf->SetX(135);
$pdf->Cell(40,10,'socio');
$pdf->Ln(3);
$total=0;
$pdf->SetFont('Arial','I',8);
$pdf->SetX(30); 


while($row2=mysqli_fetch_array($res2)){
   $total+=$row2[3];
    $pdf->SetX(30); 
   $pdf->Cell(40,10,$row2[2]);
   $pdf->SetX(65); 
   $vencimiento=explode('/',$row2[4]);
   if(intval($vencimiento[1]+1)==13){
       $vencimiento[1]=0;
       $vencimiento[2]+=1;
     }
   $pdf->Cell(40,10,$row2[4]);
   $pdf->SetX(90); 
   $pdf->Cell(40,10,'$'.$row2[3]);
   $pdf->SetX(105);
   $pdf->Cell(40,10,$vencimiento[0].'/'.intval($vencimiento[1]+1).'/'.$vencimiento[2]);
   $pdf->SetX(135);
   $pdf->Cell(40,10,$row[1]);
   $pdf->Ln(3);
}
$pdf->SetFont('Arial','B',16);
$pdf->SetY(266); 
$pdf->SetX(50); 

$pdf->Cell(40,10,'$'.$total);







 


 
$pdf->Output();
    ?>
