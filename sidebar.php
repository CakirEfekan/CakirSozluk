<?php require('vt.php'); ?>

<link rel="stylesheet" href="css/style.css"/>
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
						 
					?>
						<li>
							<div ><a class="buton" href="?id=<?php echo $roww['id'] ?>&getir=baslik"><?php echo $roww['isim']; ?></a></div>
							
						</li>
					<?php	
					} 
					}
				?>
			</ul>
			<div style="clear:both;"></div>
		</div>
	</div>
