<?php require('vt.php');

function replace_tr($text) {
$text = trim($text);
$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ', '\'');
$replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-','-');
$new_text = str_replace($search,$replace,$text);
return $new_text;
} 

 ?>

<link rel="stylesheet" href="<?php echo $adres ?>/css/style.css"/>
	<div class="icsidebar">
		<div class="entryliste">
			<div class="listeyenile"><a id="yenile" class="btn btn-primary" style="cursor:pointer;" onclick="yenile()">Yenile</a><img class="yuklen" height="32px" src="http://www.conax.com.tr/img/loading.gif" id="yenilen"></img></div>
			<ul>
				<?php		
					$veri = $db->query("select * from entryler Order By id DESC")->fetchAll(PDO::FETCH_ASSOC);
					$liste ="";
					foreach($veri as $row){
						
						$baslikid = $row["baslikid"];
						
						preg_match("#_{$baslikid}-#", $liste, $listeara);
						
						if(!$listeara == null){}
						else{
						$liste = '_'.$baslikid.'-'.$liste;
						$sql = $db->prepare("SELECT * FROM basliklar WHERE id= ?");
						$sql->execute(array(
							$baslikid
						));
						$roww=$sql->fetch(PDO::FETCH_ASSOC);
						$isim = htmlspecialchars($roww['isim']);
						 $link = replace_tr($isim);
						
					?>
						<li>
							<div ><a class="buton" href="/baslik/<?php echo $link ?>--<?php echo $roww['id'] ?>/"><?php echo $isim; ?></a></div>
							
						</li>
					<?php	
					} 
					}
				?>
			</ul>
			<div style="clear:both;"></div>
		</div>
	</div>
