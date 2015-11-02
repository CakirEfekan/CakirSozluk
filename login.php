<?php 
ob_start();
session_start();
?>
<?php
require "vt.php";
if(isset($_POST['yazar'])){
if($yazar=$_POST['yazar']){
	
	$sql = $db->prepare("SELECT * FROM yazarlar WHERE kuladi= ?");
	$sql->execute(array(
							$yazar
						));
						$row=$sql->fetch(PDO::FETCH_ASSOC);
						
		if($row['kuladi']){
			if($sifre = $_POST['sifre']){
				if($sifre == $row['sifre']){
					echo "Giriş Başarılı";
					$_SESSION["login"] = "true";
					$_SESSION["user"] = $row['kuladi'];
					$_SESSION["pass"] = $row['sifre'];
					?>
					 <script type="text/javascript">
					window.location.href= "<?php echo $adres ?>";
					</script>
					<?php
				}
				else{
					echo "Şifre Yanlış!";
				}
			}
			else{
				echo "Lütfen Bir Şifre Girin.";
			}
		}
		else{
			echo "Böyle bir yazar bulunamadı.";
		}
	
}
else{
	
	echo "olmadı be kardeş";
}
}
ob_end_flush();
?>