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

    















    //$query="select * from partners where id='$pid'";
    //$res=mysqli_query($link,$query);
    //$row=mysqli_fetch_array($res);
    //$query2="select * from accounts where pid='$pid'";
    //$res2=mysqli_query($link,$query2);
    
    //$number_of_codes--;
    //$code= $codes_separated[$number_of_codes]."<br>";
    //$query2="select a.id,a.pid,a.activitie,a.price,a.fecha,p.partner from accounts as a inner join partners as p on p.id=a.pid where a.id='$code'";
    //$res2=mysqli_query($link,$query2); 

    
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
 $pdf->Cell(40,10,'Socio: '.$partner.' ');
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
 $icon=128;
 while($number_of_codes>0){
    $number_of_codes--;
    $code= $codes_separated[$number_of_codes]."<br>";
    $price= $prices_separated[$number_of_codes];
    $date= $dates_separated[$number_of_codes];



    $query2="select * from activities where id='$code'";
    $res2=mysqli_query($link,$query2); 
    if(mysqli_num_rows($res2)>0){
        while($row2=mysqli_fetch_array($res2)){
            $icon+=5;
            $total+=intval($price);
            $vencimiento=explode("/",$date);
    
            if(intval($vencimiento[1]+1)==13){
                $vencimiento[1]=0;
                $vencimiento[2]+=1;
              }
    
            $pdf->Cell(40,10,$row2[1]);
            $pdf->SetX(65); 
            $pdf->Cell(40,10,$date);
            $pdf->SetX(90); 
            $pdf->Cell(40,10,'$'.$price);
            $pdf->SetX(105);
            $pdf->Cell(40,10,$vencimiento[0].'/'.intval($vencimiento[1]+1).'/'.$vencimiento[2]);
            $pdf->SetX(135);
            $pdf->Cell(40,10,$partner);
            $pdf->Ln(5);
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









$pdf->SetX(25);
$pdf->SetFont('Arial','I',16);
 $pdf->Cell(40,10,'Club Atletico Ferrocarril Midland');
$pdf->SetX(155);
 

$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,''.$hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']);
$pdf->Image('../img/midland.png' , 10 ,$icon, 15 , 15,'PNG');
 

 $pdf->Ln(15);
 $pdf->Cell(40,10,'Socio: '.$partner.' ');
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

        $pdf->Cell(40,10,$row2[1]);
        $pdf->SetX(65); 
        $pdf->Cell(40,10,$date);
        $pdf->SetX(90); 
        $pdf->Cell(40,10,'$'.$price);
        $pdf->SetX(105);
        $pdf->Cell(40,10,$vencimiento[0].'/'.intval($vencimiento[1]+1).'/'.$vencimiento[2]);
        $pdf->SetX(135);
        $pdf->Cell(40,10,$partner);
        $pdf->Ln(5);
     }
    
}




$pdf->SetFont('Arial','B',16);
$pdf->Ln(10);
$pdf->Cell(40,10,'TOTAL = $'.$total.' ');
$pdf->Ln(25);















 









 
$pdf->Output();
    ?>
