<?php
    require("../librerias/fpdf182/fpdf.php");
    include("../config/conexion.php");
    $pid=$_GET['pid'];
    $query="select * from partners where id='$pid'";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_array($res);
    $query2="select * from accounts where pid='$pid'";
    $res2=mysqli_query($link,$query2);
    
    

    
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
 $pdf->Cell(40,10,'Socio titular: '.$row[1].' ');
 $pdf->Ln(10);
 $pdf->Cell(40,10,utf8_decode('N° de socio: ').$row[0].' ');
 $pdf->Ln(15);

 $pdf->SetFont('Arial','B',16);
 $pdf->Cell(40,10,'IVA: Consumidor Final  ');
 $pdf->SetX(120); 
 $pdf->Cell(40,10,'CUIT: 99-99999999-99');
 $pdf->Ln(12);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(40,10,'Detalle');
 $pdf->SetX(65); 
 $pdf->Cell(40,10,'Fecha');
 $pdf->SetX(90); 
 $pdf->Cell(40,10,'Precio');
 $pdf->SetX(105);
 $pdf->Cell(40,10,'vencimiento');
 $pdf->SetX(135);
 $pdf->Cell(40,10,'socio');
 $pdf->Ln(7);
 $total=0;
 $pdf->SetFont('Arial','I',12);
 $icon=138;
 while($row2=mysqli_fetch_array($res2)){
    $total+=$row2[3];
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
    $pdf->Ln(5);
 }
 $query="select f.headline, f.associated, p.partner from families as f inner join partners as p on p.id=f.associated where f.headline='$pid'";
 $res=mysqli_query($link,$query);
 if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
        $aid=$row[1];
        $query2="select * from accounts where pid='$aid'";
        $res2=mysqli_query($link,$query2);
        if(mysqli_num_rows($res2)>0){
            while($row2=mysqli_fetch_array($res2)){
                $icon+=5;

                $total+=$row2[3];
                $pdf->Cell(40,10,$row2[2]);
                $pdf->SetX(65); 
                $vencimiento=explode('/',$row2[4]);
                $pdf->Cell(40,10,$row2[4]);
                $pdf->SetX(90); 
                $pdf->Cell(40,10,'$'.$row2[3]);
                $pdf->SetX(105);
                $pdf->Cell(40,10,$vencimiento[0].'/'.intval($vencimiento[1]+1).'/'.$vencimiento[2]);
                $pdf->SetX(135);
                $pdf->Cell(40,10,$row[2]);
                $pdf->Ln(5);
            }
        }
    }
 }
 




$pdf->SetFont('Arial','B',16);
$pdf->Ln(10);
$pdf->Cell(40,10,'TOTAL = $'.$total.' ');

 

$pdf->Ln(25);

$pdf->SetFont('Arial','I',70);
$i=0;
while($i<211){
    $pdf->Cell(40,10,'-');
    $pdf->SetX($i);
    $i+=11;
}

$pdf->Ln(25);





$query="select * from partners where id='$pid'";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_array($res);
    $query2="select * from accounts where pid='$pid'";
    $res2=mysqli_query($link,$query2);

$pdf->SetX(25);
$pdf->SetFont('Arial','I',16);
 $pdf->Cell(40,10,'Club Atletico Ferrocarril Midland');
$pdf->SetX(155);
 

$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,''.$hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']);
$pdf->Image('../img/midland.png' , 10 ,$icon, 15 , 15,'PNG');
 

 $pdf->Ln(15);
 $pdf->Cell(40,10,'Socio: '.$row[1].' ');
 $pdf->Ln(10);
 $pdf->Cell(40,10,utf8_decode('N° de socio: ').$pid.' ');
 $pdf->Ln(15);

 $pdf->SetFont('Arial','B',16);
 $pdf->Cell(40,10,'IVA: Consumidor Final  ');
 $pdf->SetX(120); 
 $pdf->Cell(40,10,'CUIT: 99-99999999-99');
 $pdf->Ln(12);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(40,10,'Detalle');
 $pdf->SetX(65); 
 $pdf->Cell(40,10,'Fecha');
 $pdf->SetX(90); 
 $pdf->Cell(40,10,'Precio');
 $pdf->SetX(105);
 $pdf->Cell(40,10,'vencimiento');
 $pdf->SetX(135);
 $pdf->Cell(40,10,'socio');
 $pdf->Ln(7);
 $total=0;
 $pdf->SetFont('Arial','I',12);
















$total=0;
 $pdf->SetFont('Arial','I',12);

 while($row2=mysqli_fetch_array($res2)){
    $total+=$row2[3];
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
    $pdf->Ln(5);
 }
 $query="select f.headline, f.associated, p.partner from families as f inner join partners as p on p.id=f.associated where f.headline='$pid'";
 $res=mysqli_query($link,$query);
 if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
        $aid=$row[1];
        $query2="select * from accounts where pid='$aid'";
        $res2=mysqli_query($link,$query2);
        if(mysqli_num_rows($res2)>0){
            while($row2=mysqli_fetch_array($res2)){
                $total+=$row2[3];
                $pdf->Cell(40,10,$row2[2]);
                $pdf->SetX(65); 
                $vencimiento=explode('/',$row2[4]);
                $pdf->Cell(40,10,$row2[4]);
                $pdf->SetX(90); 
                $pdf->Cell(40,10,'$'.$row2[3]);
                $pdf->SetX(105);
                $pdf->Cell(40,10,$vencimiento[0].'/'.intval($vencimiento[1]+1).'/'.$vencimiento[2]);
                $pdf->SetX(135);
                $pdf->Cell(40,10,$row[2]);
                $pdf->Ln(5);
            }
        }
    }
 }
 




$pdf->SetFont('Arial','B',16);
$pdf->Ln(10);
$pdf->Cell(40,10,'TOTAL = $'.$total.' ');
 
$pdf->Output();
    ?>
