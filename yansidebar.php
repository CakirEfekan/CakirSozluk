<link rel="stylesheet" href="<?php echo $adres ?>/css/style.css"/>
<center>
		<?php
			if(!isset($_SESSION["login"])){
				if($_GET['kayit']=="basarili"){
		?>
		<!-- <b>Lütfen epostanı teyit eyle.</b> -->
		<?php } ?>
		<div class="yansidebar">
			<form action="/login.php" method="post">
				<label><input placeholder="Yazar İsmi" name="yazar" type="text"/></label>
				<label><input placeholder="Şifre" name="sifre" type="password"/></label>
				<label><input type="submit" value="Gönder"/></label>
			</form>
			<a style="cursor:pointer;" onclick="kayit()">Kayıt Ol</a>
			<div id="kayit" style="display:none" class="kayitformu">
			<form action="/kayit.php" method="post">
			<label><input placeholder="Yazar İsmi" name="yazar" type="text" required></label>
			<label><input placeholder="Eposta" name="eposta" type="email" required></label>
			<label><input placeholder="Şifre" name="sifre" type="password" required></label>
			<input name="gonder" type="submit" value="Kayıt ol">
			</form>
			</div>
			</div>
			<script type="text/javascript">
			function kayit(){
				document.getElementById('kayit').style.display = "block";
				
				
			}
			
			</script>
			<?php 
			}
			else{
				$yazarlink = preg_replace('# #', '-', $_SESSION["user"]);
				echo 'Hoşgeldin <a href="'.$adres.'/yazar/'.$yazarlink.'">'.$_SESSION["user"].'</a>';
				echo '<br /><a href="logout.php">Çıkış</a>';
			}
			?>
			
		</center>
