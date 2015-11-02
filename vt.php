<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=VERİTABANI;charset=utf8", "USERNAME", "PASS");
} catch ( PDOException $e ){
     print $e->getMessage();
}


$adres = "http://sozluk.cakirefekan.com";
$kalinisim = "Cakir" ;
$inceisim = "Sözlük" ;
$title = "CakirSözlük - Sözlük Denemesi";
?>
