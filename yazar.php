<?php 
include('vt.php');
$yazar = $_GET['kim'];
$sql1 = $db->prepare("SELECT * FROM yazarlar WHERE kuladi= ?");
						$sql1->execute(array(
							$yazar
						));
						$row = $sql1->fetch(PDO::FETCH_ASSOC);
$veri = $db->query("select * from entryler where yazar='{$yazar}' Order By id DESC")->fetchAll(PDO::FETCH_ASSOC);
						
						

?>

<div class="icerik">
		<div class="baslik">
			<h2><a class="h3" href=""><?php echo $yazar ?> Yazar Profili</a></h2>
		</div>
		<div class="entryler">
		<div class="entry" id="1">
			<div class="entryicerik">Entry Sayısı: <?php echo $row['entry'] ?> <br /><br> Başlık Sayısı: <?php echo $row['baslik'] ?><br><br>
			<b>Son Entry Yazdığı Başlıklar:</b><br>
			<?php
			foreach($veri as $satir){
				$baslikid = $satir["baslikid"];
				$sql = $db->prepare("SELECT * FROM basliklar WHERE id= ?");
						$sql->execute(array(
							$baslikid
						));
						$row = $sql->fetch(PDO::FETCH_ASSOC);
				echo '<a href="'.$adres.'/?id='.$baslikid.'&getir=baslik">'.$row['isim'].'</a><br>';
			}
			?>
			</div>
			
		</div>
		</div>
	</div>