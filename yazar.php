<?php 
include('vt.php');
function replace_tr($text) {
$text = trim($text);
$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ', '\'');
$replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-','-');
$new_text = str_replace($search,$replace,$text);
return $new_text;
} 
$yazar = $_GET['kim'];
$yazar = preg_replace('#-#', ' ', $yazar);
$sql1 = $db->prepare("SELECT * FROM yazarlar WHERE kuladi= ?");
						$sql1->execute(array(
							$yazar
						));
						$row = $sql1->fetch(PDO::FETCH_ASSOC);
$veri = $db->query("select * from entryler where yazar='{$yazar}' Order By id DESC")->fetchAll(PDO::FETCH_ASSOC);
						
						

?>

<div class="icerik">
		<div class="baslik">
			<h2><a class="h3" style="color:#337AB7;" href=""><?php echo $yazar ?> Yazar Profili</a></h2>
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
						 $link = replace_tr($row['isim']);
				echo '<a href="'.$adres.'/baslik/'.$link.'--'.$baslikid.'/">'.$row['isim'].'</a> <br />';
			}
			?>
			</div>
			
		</div>
		</div>
	</div>