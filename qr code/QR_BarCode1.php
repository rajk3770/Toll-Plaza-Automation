<?php
// include QR_BarCode class 
include "QR_BarCode.php"; 
include "C:/wamp64/www/Raj/Random.php";
//include 'C:/wamp64/www/Raj/json_demo_db_post_copy.php';
// QR_BarCode object 
//function wrapper(){ 
$qr = new QR_BarCode(); 
$x=randStrGen(10);
// create text QR code 
$qr->text('$x'); 

// display QR code image
$qr->qrCode();
//}
?>
