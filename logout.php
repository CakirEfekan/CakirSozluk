<?php
include('vt.php');
	session_start();
	 
	 
	session_destroy();
	 
	echo "Çıkış Yaptınız.Ana Sayfaya Yönlendiriliyorsunuz";
?>
					<script type="text/javascript">
					window.location.href= "<?php echo $adres ?>";
					</script>
		