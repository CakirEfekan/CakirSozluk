<?php

if($_POST['gonder']=="kur"){
if(!file_exists('../vt.php')) {


try {
     $db = new PDO("mysql:host={$_POST['sunucu']};dbname={$_POST['veritabani']};charset=utf8", "{$_POST['verikul']}", "{$_POST['verisif']}");
} catch ( PDOException $e ){
     print $e->getMessage();
}

	if(isset($db)){


$dosya = fopen('../vt.php', 'w');
$vt = '<?php
try {
     $db = new PDO("mysql:host='. $_POST['sunucu'] .';dbname='. $_POST['veritabani'] .';charset=utf8", "'. $_POST['verikul'] .'", "'. $_POST['verisif'] .'");
} catch ( PDOException $e ){
     print $e->getMessage();
}


$adres = "'. $_POST['siteadres'] .'";
$kalinisim = "'. $_POST['kalinisim'] .'" ;
$inceisim = "'. $_POST['inceisim'] .'" ;
$title = "'. $_POST['title'] .'";
?>
';

fwrite($dosya, $vt);
fclose($dosya);
echo "<center>Bilgilerinizi doğru girdiyseniz kurulum başarılı şekilde yapıldı. Şimdi sitenizin ana dizininde yer alan vt.sql dosyasını mysql sunucunuze aktarın. Lütfen dizininizde yer alan kur klasörünü silin.</center>";
}
else{
	
	echo "Mysql bağlantısı kurulamadı.";
	include('index.php');
	
}
} else {
   echo 'Bu siteye daha önce kurulum yapılmış.';
}
}
else {
	?>
	<center>
	<form method="post" action="">
	<h3>Veritabanı</h3>
	<input name="sunucu" placeholder="localhost" type="text"> <br><br>
	<input name="veritabani" placeholder="veritabanı ismi" type="text"> <br><br>
	<input name="verikul" placeholder="kullanıcı adı" type="text"> <br><br>
	<input name="verisif" placeholder="kullanıcı şifresi" type="password"> <br><br>
	<h3>Site </h3>
	<input name="siteadres" placeholder="Site Adresi" type="text"> <br><br>
	<input name="kalinisim" placeholder="Kalın isim, örnek: Cakir" type="text"><br><br> 
	<input name="inceisim" placeholder="İnce isim, örnek: Sözlük" type="text"> <br><br>
	<input name="title" placeholder="Site Başlığı" type="text"> <br><br>
	<input name="gonder" placeholder="" value="kur" type="submit"> <br><br>
	</center>
	<?php

}

 ?>