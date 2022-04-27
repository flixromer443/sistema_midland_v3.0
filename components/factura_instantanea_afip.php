<?php
    require("../librerias/fpdf182/fpdf.php");
    include("../config/conexion.php");
    $query="SELECT date_format(now(),'%d/%m/%y')";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_array($res);
    
    $fecha=$row[0];
    
    $partner=$_GET['partner'];
    $partner=strtoupper($partner);
    $pid=$_GET['pid'];
    $codes=$_GET['codes'];
    $prices=$_GET['prices'];
    $dates=$_GET['dates'];

    $codes_separated=explode(',',$codes);
    $number_of_codes=count($codes_separated);
    
    $prices_separated=explode(',',$prices);
    $number_of_prices=count($prices_separated);

    $dates_separated=explode(',',$dates);
    $number_of_dates=count($dates_separated);


    
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
 $pdf->Cell(40,10,'Socio: '.$partner.' ');
 $pdf->Ln(5);
 $pdf->SetX(30); 
 $pdf->Cell(40,10,utf8_decode('N° de socio: ').$pid.' ');
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
 $pdf->SetFont('Arial','',8);
 $pdf->SetX(30); 

 $query="select * from partners where id='$pid'";
 $res=mysqli_query($link,$query);
 $row=mysqli_fetch_array($res);
 $query2="select * from accounts where pid='$pid'";
 $res2=mysqli_query($link,$query2);

 while($number_of_codes>0){
    $number_of_codes--;
    $code= $codes_separated[$number_of_codes]."<br>";
    $price= $prices_separated[$number_of_codes];
    $date= $dates_separated[$number_of_codes];


    $query2="select * from activities where id='$code'";
    $res2=mysqli_query($link,$query2); 
    while($row2=mysqli_fetch_array($res2)){
        $total+=intval($price);
        $vencimiento=explode("/",$date);

        if(intval($vencimiento[1]+1)==13){
            $vencimiento[1]=0;
            $vencimiento[2]+=1;
          }
        $pdf->SetX(30); 
        $pdf->Cell(40,10,$row2[1]);
        $pdf->SetX(65); 
        $pdf->Cell(40,10,$date);
        $pdf->SetX(90); 
        $pdf->Cell(40,10,'$'.$price);
        $pdf->SetX(105);
        $pdf->Cell(40,10,$vencimiento[0].'/'.intval($vencimiento[1]+1).'/'.$vencimiento[2]);
        $pdf->SetX(135);
        $pdf->Cell(40,10,$partner);
        $pdf->Ln(3);
     }
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
$pdf->Cell(40,10,'Socio: '.$partner.' ');
$pdf->Ln(5);
$pdf->SetX(30); 
$pdf->Cell(40,10,utf8_decode('N° de socio: ').$pid.' ');
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
$pdf->SetFont('Arial','',8);
$pdf->SetX(30); 


$codes=$_GET['codes'];
 $prices=$_GET['prices'];

 $codes_separated=explode(',',$codes);
 $number_of_codes=count($codes_separated);
 
 $prices_separated=explode(',',$prices);
 $number_of_prices=count($prices_separated);

 while($number_of_codes>0){
    $number_of_codes--;
    $code= $codes_separated[$number_of_codes]."<br>";
    $price= $prices_separated[$number_of_codes];
    $date= $dates_separated[$number_of_codes];



    $query2="select * from activities where id='$code'";
    $res2=mysqli_query($link,$query2); 
    while($row2=mysqli_fetch_array($res2)){
        $total+=intval($price);
        $vencimiento=explode("/",$date);

        if(intval($vencimiento[1]+1)==13){
            $vencimiento[1]=0;
            $vencimiento[2]+=1;
          }
        $pdf->SetX(30); 
        $pdf->Cell(40,10,$row2[1]);
        $pdf->SetX(65); 
        $pdf->Cell(40,10,$date);
        $pdf->SetX(90); 
        $pdf->Cell(40,10,'$'.$price);
        $pdf->SetX(105);
        $pdf->Cell(40,10,$vencimiento[0].'/'.intval($vencimiento[1]+1).'/'.$vencimiento[2]);
        $pdf->SetX(135);
        $pdf->Cell(40,10,$partner);
        $pdf->Ln(3);
     }
    
}

$pdf->SetFont('Arial','B',16);
$pdf->SetY(266); 
$pdf->SetX(50); 

$pdf->Cell(40,10,'$'.$total);







 


 
$pdf->Output();
    ?>
