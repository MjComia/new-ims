<?php

require __DIR__ . "/dompdf/dompdf/autoload.inc.php";
    use Dompdf\Dompdf;

$dompdf = new Dompdf;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$customer_id = $_POST['customer_id'];    
$customer_name = $_POST['customer_name'];
$customer_address = $_POST['customer_address'];
$contact_number  = $_POST['contact_number'];
$isle_number = $_POST['isle_number'];
$shelf_number = $_POST['shelf_number'];

}


$html = '<h1>Customer Information</h1>';
$html .='<div>Customer ID: ' . htmlspecialchars($customer_id). ' </div> ';
$html .='<div>Customer name: '.$customer_name.' </div>';
$html .='<div>Address: '.$customer_address.' </div>';
$html .='<div>Contact Number: '.$contact_number.' </div>';
$html .='<div>Isle - Shelf: '.$isle_number.' - '.$shelf_number.' </div>';




$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();


$dompdf->stream("invoice.pdf", ["Attachment" => false]);

?>
