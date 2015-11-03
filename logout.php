<?php
include('vt.php');
	session_start();
	 ?>
	 
	 <?php 
	require('vt.php');
	include('header.php');
?>

	<div class="menu">
	<div class="menuic">
	<div onclick="window.location.href = '<?php echo $adres ?>'" class="logo">
	<div style="float:left;" class="h1"><?php echo $kalinisim ?></div><div style="float:left;" class="h3">&nbsp;<?php echo $inceisim ?></div>
	
	</div>
		<div class="icmenu">
		<input placeholder="Başlık Ara..." id="search" type="text" style="height:25px;width:200px;"> 

		<?php if(isset($_SESSION['user'])){ ?>
		<a class="btn btn-primary" href="<?php echo $adres ?>/baslikac">Başlık Aç</a>
		<?php } ?>
		</div>
	</div>
	</div>
	<script>
function yenile() {
     $("#solyan").delay(5000).load("<?php echo $adres ?>/sidebar.php");
	$("#yenilen").stop(true,true).fadeIn("slow",function(){ 
setTimeout($("#yenilen").stop(true,true).fadeOut("fast"),5000); }); 
}
$(document).ready(function() {
	 $("#solyan").load("<?php echo $adres ?>/sidebar.php");
});
</script>
<div id="solyan" class="sidebar"></div>
<div class="home">
	<?php
	$getir = $_GET['getir'];
	switch ($getir){
		case 'baslik';
		include('baslik.php');
		break;
		case 'entry';
		include('entry.php');
		break;
		case 'baslikac';
		include('baslikac.php');
		break;
		case 'entrymeselesi';
		include('entryduzeni.php');
		break;
		case 'yazar';
		include('yazar.php');
		break;
		default:
		include('home.php');
	}
	?>

<div class="sagkisim">
<?php
	include('yansidebar.php');
?>
</div>
</div>
<?php
	include('footer.php');
?>

	 
	 <?php
	 
	session_destroy();
	 
	echo "Çıkış Yaptınız.Ana Sayfaya Yönlendiriliyorsunuz";
?>
					<script type="text/javascript">
					window.location.href= "<?php echo $adres ?>";
					</script>
		