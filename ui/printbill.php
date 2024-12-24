<?php 

//call the fpdf libaray//addwith:219mm
require('fpdf/fpdf.php');


include_once"connectdb.php";

$id=$_GET["id"];

$select=$pdo->prepare("select * from tbl_invoice where invoice_id=$id");
$select->execute();
$row=$select->fetch(PDO::FETCH_OBJ);







//A4 width :219
//default margin  :10mm each side
//writable horizontal :219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm',array(80,200));



//string orientation (p or l) - portrait or landscape
//string unit (pt,mm,cm,in) - measure unit
//mixed format (A3,A4,A5,Letter,Legal) - format of page






//add a page
$pdf->AddPage();


$pdf->SetFont('Arial','B',16);
$pdf->Cell(60,8,'NEEMATTECH VEN.',1,1,'C');


$pdf->SetFont('Arial','B',8);
$pdf->Cell(60,5,'PHONE NUMBER : 09028995245.',0,1,'C');
$pdf->Cell(60,5,'WEBSITE : WWW.NEEMATTECH.COM.',0,1,'C');






//line 1
$pdf->Line(7,28,72,28);
$pdf->Ln(1);  


$pdf->SetFont('Arial','BI',8);
$pdf->Cell(20,4,'Bill No:',0,0,'');

$pdf->SetFont('Courier','BI',8);
$pdf->Cell(40,4,$row->invoice_id,0,1,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(20,4,'Date:',0,0,'');


$pdf->SetFont('Courier','BI',8);
$pdf->Cell(40,4,$row->order_date,0,1,'');


$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
$pdf->Cell(24,5,'PRODUCT',1,0,'C');
$pdf->Cell(8,5,'QTY',1,0,'C');
$pdf->Cell(15,5,'PRC',1,0,'C');
$pdf->Cell(18,5,'TOTAL',1,1,'C');



$select=$pdo->prepare("select * from tbl_invoice_details where invoice_id=$id");
$select->execute();

while($product=$select->fetch(PDO::FETCH_OBJ)){

$pdf->SetX(7);
$pdf->SetFont('Helvetica','B',8);
$pdf->Cell(24,5,$product->product_name,1,0,'C');
$pdf->Cell(8,5,$product->qty,1,0,'C');
$pdf->Cell(15,5,$product->rate,1,0,'C');
$pdf->Cell(18,5,$product->rate*$product->qty,1,1,'C');





}


$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
// $pdf->Cell(20,5,'',0,0,'L');//190
$pdf->Cell(20,5,'SUBTOTAL(NG)',0,0,'C');
$pdf->Cell(20,5,$row->subtotal,0,1,'C');

$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
// $pdf->Cell(20,5,'',0,0,'L');//190
$pdf->Cell(20,5,'DISCOUNT($)',0,0,'C');
$pdf->Cell(20,5,$row->discount,0,1,'C');

$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
// $pdf->Cell(20,5,'',0,0,'L');//190
$pdf->Cell(20,5,'TOTAL(NG)',0,0,'C');
$pdf->Cell(20,5,$row->total,0,1,'C');


$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
// $pdf->Cell(20,5,'',0,0,'L');//190
$pdf->Cell(20,5,'PAID(NG)',0,0,'C');
$pdf->Cell(20,5,$row->paid,0,1,'C');


$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
// $pdf->Cell(20,5,'',0,0,'L');//190
$pdf->Cell(20,5,'DUE(NG)',0,0,'C');
$pdf->Cell(20,5,$row->due,0,1,'C');



$pdf->Cell(20,5,'',0,1,'');


$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
$pdf->Cell(20,5,'Importanct Notice',0,1,'');//190

$pdf->SetX(7);
$pdf->SetFont('Arial','',5);
$pdf->Cell(75,2,'No refund of product without receipt',0,1,'');

$pdf->SetX(7);
$pdf->SetFont('Arial','',5);
$pdf->Cell(75,2,'Refund is only available on valid and importance reasons',0,1,'');

$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
$pdf->Cell(20,5,'',0,0,'L');//190
$pdf->Cell(20,5,'Thanks for your patronage ',0,0,'l');



$pdf->Output();




?>