<link rel="stylesheet" href="css/style.css"/>
<center>
		<?php
			if(!isset($_SESSION["login"])){
				if($_GET['kayit']=="basarili"){
		?>
		<b>Lütfen epostanı teyit eyle.</b>
		<?php } ?>
			<form action="/login.php" method="post">
				<label>Yazar:<input name="yazar" type="text"/></label>
				<label>Şifre<input name="sifre" type="password"/></label>
				<label><input type="submit" value="Gönder"/></label>
			</form>
			<a style="cursor:pointer;" onclick="kayit()">Kayıt Ol</a>
			<div id="kayit" style="display:none" class="kayitformu">
			<form action="/kayit.php" method="post">
			<label>Yazar: <input name="yazar" type="text" required></label>
			<label>Eposta: <input name="eposta" type="email" required></label>
			<label>Şifre: <input name="sifre" type="password" required></label>
			<input name="gonder" type="submit" value="Kayıt ol">
			</form>
			
			</div>
			<script type="text/javascript">
			function kayit(){
				document.getElementById('kayit').style.display = "block";
				
				
			}
			
			</script>
			<?php 
			}
			else{
				echo 'Hoşgeldin '.$_SESSION["user"];
				echo '<br /><a href="logout.php">Çıkış</a>';
			}
			?>
			
		</center>
