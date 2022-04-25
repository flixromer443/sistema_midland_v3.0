<?php
    require("../librerias/fpdf182/fpdf.php");
    $name=$_GET['name'];
    $document=$_GET['document'];
    $activitie=$_GET['activitie'];
    if(isset($_GET['percentage'])){
        if(empty($_GET['percentage'])){
            $percentage=0;
        }else{
            $percentage=$_GET['percentage'];
        }
    }
    if(isset($_GET['amount'])){
        if(empty($_GET['amount'])){
            $amount=0;
        }else{
            $amount=$_GET['amount'];
        }
    }
     
    

    $interest=$amount * $percentage/100;
    $net=$amount - $interest;
    
    
$pdf = new FPDF();
 // Arial bold 15
 
$hoy=getdate();

$pdf->AddPage();

$pdf->SetY(15);
$pdf->SetX(25);
$pdf->SetFont('Arial','I',16);
 $pdf->Cell(40,10,'Club Atletico Ferrocarril Midland');
$pdf->SetX(155);
 

$pdf->SetFont('Arial','',14);
$pdf->Cell(40,10,''.$hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']);
$pdf->SetY(20);
$pdf->Image('../img/midland.png' , 10 ,10, 15 , 15,'PNG');
 

 $pdf->Ln(10);
 $pdf->Cell(40,10,utf8_decode('A los '));
 $pdf->SetX(23);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(40,10,utf8_decode($hoy['mday']));
 $pdf->SetX(30);
 $pdf->SetFont('Arial','',14);
 $pdf->Cell(40,10,utf8_decode('dias del mes'));
 $pdf->SetX(60);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(40,10,utf8_decode($hoy['mon']));
 $pdf->SetX(67);
 $pdf->SetFont('Arial','',14);
 $pdf->Cell(40,10,utf8_decode('del año'));
 $pdf->SetX(86);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(40,10,utf8_decode($hoy['year']));
 $pdf->SetX(100);
 $pdf->SetFont('Arial','',14);
 $pdf->Cell(40,10,utf8_decode('yo, '));
 $pdf->SetX(110);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(40,10,utf8_decode(strtoupper($name)));
 $pdf->Ln(10);
 $pdf->SetFont('Arial','',14);

 $pdf->Cell(40,10,utf8_decode('N° de documento'));
 $pdf->SetX(50);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(40,10,utf8_decode($document));
 $pdf->SetX(72);
 $pdf->SetFont('Arial','',14);
 $pdf->Cell(40,10,utf8_decode(', recibo conforme la suma de '));
 $pdf->SetX(138);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(40,10,utf8_decode($net));
 $pdf->SetX(156);
 $pdf->SetFont('Arial','',14);
 $pdf->Cell(40,10,utf8_decode('pesos por parte del'));
 $pdf->Ln(10);
 $pdf->Cell(40,10,utf8_decode('Club Atletico Ferrocarril Midland correspondientes a '));
 $pdf->SetX(126);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(40,10,utf8_decode(strtoupper($activitie)));
 $pdf->Ln(10);
 $pdf->SetFont('Arial','',14);
 $pdf->Cell(40,10,utf8_decode('detallada en la siguiente.'));
 $pdf->Ln(10);
 

 $pdf->SetFont('Arial','B',12);

 $pdf->SetX(65); 
 $pdf->Cell(40,10,'Detalle');
 $pdf->SetX(115);
 $pdf->Cell(40,10,'Monto');
 $pdf->Ln(5);

 $pdf->SetFont('Arial','',12);
 $pdf->SetX(65); 
 $pdf->Cell(40,10,'Monto bruto');
 $pdf->SetX(115);
 $pdf->Cell(40,10,'$'.$amount);
 $pdf->Ln(5);

 $pdf->SetFont('Arial','',12);
 $pdf->SetX(65); 
 $pdf->Cell(40,10,$percentage.'% de interes');
 $pdf->SetX(115);
 $pdf->Cell(40,10,'-$'.$interest);
 $pdf->Ln(7);

 $pdf->SetFont('Arial','B',13);
 $pdf->SetX(65); 
 $pdf->Cell(40,10,'TOTAL');
 $pdf->SetX(115);
 $pdf->Cell(40,10,'$'.$net);
 $pdf->Ln(5);


 $total=0;
 $pdf->SetFont('Arial','I',12);
 $icon=228;
 
$pdf->SetFont('Arial','B',16);
$pdf->Ln(15);
$pdf->SetX(130); 

$pdf->Cell(40,10,'...............................');
$pdf->Ln(5);
$pdf->SetX(135); 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,utf8_decode('Firma y Aclaración'));
$pdf->Ln(20);

 



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
 

$pdf->SetFont('Arial','',14);
$pdf->Cell(40,10,''.$hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']);
$pdf->Image('../img/midland.png' , 10 ,152, 15 , 15,'PNG');
$pdf->Ln(15);

$pdf->Cell(40,10,utf8_decode('A los '));
$pdf->SetX(23);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,utf8_decode($hoy['mday']));
$pdf->SetX(30);
$pdf->SetFont('Arial','',14);
$pdf->Cell(40,10,utf8_decode('dias del mes'));
$pdf->SetX(60);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,utf8_decode($hoy['mon']));
$pdf->SetX(67);
$pdf->SetFont('Arial','',14);
$pdf->Cell(40,10,utf8_decode('del año'));
$pdf->SetX(86);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,utf8_decode($hoy['year']));
$pdf->SetX(100);
$pdf->SetFont('Arial','',14);
$pdf->Cell(40,10,utf8_decode('yo, '));
$pdf->SetX(110);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,utf8_decode(strtoupper($name)));
$pdf->Ln(10);
$pdf->SetFont('Arial','',14);

$pdf->Cell(40,10,utf8_decode('N° de documento'));
$pdf->SetX(50);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,utf8_decode($document));
$pdf->SetX(72);
$pdf->SetFont('Arial','',14);
$pdf->Cell(40,10,utf8_decode(', recibo conforme la suma de '));
$pdf->SetX(138);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,utf8_decode($net));
$pdf->SetX(156);
$pdf->SetFont('Arial','',14);
$pdf->Cell(40,10,utf8_decode('pesos por parte del'));
$pdf->Ln(10);
$pdf->Cell(40,10,utf8_decode('Club Atletico Ferrocarril Midland correspondientes a '));
$pdf->SetX(126);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,utf8_decode(strtoupper($activitie)));
$pdf->Ln(10);
$pdf->SetFont('Arial','',14);
$pdf->Cell(40,10,utf8_decode('detallada en la siguiente.'));
$pdf->Ln(10);


$pdf->SetFont('Arial','B',12);

$pdf->SetX(65); 
$pdf->Cell(40,10,'Detalle');
$pdf->SetX(115);
$pdf->Cell(40,10,'Monto');
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);
$pdf->SetX(65); 
$pdf->Cell(40,10,'Monto bruto');
$pdf->SetX(115);
$pdf->Cell(40,10,'$'.$amount);
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);
$pdf->SetX(65); 
$pdf->Cell(40,10,$percentage.'% de interes');
$pdf->SetX(115);
$pdf->Cell(40,10,'-$'.$interest);
$pdf->Ln(7);

$pdf->SetFont('Arial','B',13);
$pdf->SetX(65); 
$pdf->Cell(40,10,'TOTAL');
$pdf->SetX(115);
$pdf->Cell(40,10,'$'.$net);
 $pdf->Ln(5);


 $total=0;
 $pdf->SetFont('Arial','I',12);
 $icon=228;
 
$pdf->SetFont('Arial','B',16);
$pdf->Ln(15);
$pdf->SetX(130); 

$pdf->Cell(40,10,'...............................');
$pdf->Ln(5);
$pdf->SetX(135); 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,utf8_decode('Firma y Aclaración'));
$pdf->Ln(20);

 
$pdf->Output();
    ?>
