<?php 
require('vt.php');
	function temiz($veri)
{
$veri =str_replace("`","",$veri);
$veri =str_replace("=","",$veri);
$veri =str_replace("&","",$veri);
$veri =str_replace("%","",$veri);
$veri =str_replace("!","",$veri);
$veri =str_replace("#","",$veri);
$veri =str_replace("<","",$veri);
$veri =str_replace(">","",$veri);
$veri =str_replace("'","",$veri);
$veri =str_replace("*","",$veri);
$veri =str_replace("And","",$veri);
$veri =str_replace("chr(34)","",$veri);
$veri =str_replace("chr(39)","",$veri);
return $veri;


}
function MakeUnique($length=16) {
           $salt       = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
           $len        = strlen($salt);
           $makepass   = '';
           mt_srand(10000000*(double)microtime());
           for ($i = 0; $i < $length; $i++) {
               $makepass .= $salt[mt_rand(0,$len - 1)];
           }
       return $makepass;
}
$kod = MakeUnique();
if($_POST['gonder']){
	if($_POST['gonder']== "Kayıt ol" ){
	$kuladi = $_POST['yazar'];
	$sifre = $_POST['sifre'];
	$eposta = $_POST['eposta'];
$query = $db -> query('select * from yazarlar where kuladi like "%'. $kuladi .'%"', PDO::FETCH_ASSOC);
$query1 = $db -> query('select * from yazarlar where eposta like "%'. $eposta .'%"', PDO::FETCH_ASSOC);

if($query->rowCount()){
	echo "Kullanıcı adı var";
}
elseif($query1->rowCount()){
	echo "eposta var";
}
else {
	$kuladi = temiz($kuladi);
		$sql = $db->prepare('INSERT INTO yazarlar (kuladi,sifre,eposta,epostakod) VALUES (?,?,?,?)');
    $ekle = $sql->execute(array(
 
        $kuladi,
        $sifre,
        $eposta,
		$kod,
        ));
     
    $hata = $sql->errorInfo();

	echo "Oldu oldu bal gibi oldu."; ?>
	<script type="text/javascript">
	
	window.location.href = "/?kayit=basarili"
	
	</script>
	
	<?php
	}
	}
	else{
		echo "Value sıkıntı";
	}
}
else{
	
	echo "Gönderme sıkıntılı.";
	
}

?>