<?php 
error_reporting(0);
if(!$_POST['entry'] == null){
	$zaman = date('d.m.Y H:i:s');
	$baslikid = $_GET['id'];
	$entry = $_POST['entry'];
	$entry=strtolower($entry);
	$yazar = $_SESSION['user'];
 $sql = $db->prepare('INSERT INTO entryler (baslikid,entry,yazar,tarih) VALUES (?,?,?,?)');
    $ekle = $sql->execute(array(
 
        $baslikid,
        $entry,
        $yazar,
		$zaman,
        ));
     
    $hata = $sql->errorInfo();
    echo empty($hata[2]) ?  "" : $hata[2];
	$sql1 = $db->prepare("SELECT * FROM yazarlar WHERE kuladi= ?");
						$sql1->execute(array(
							$yazar
						));
						$row = $sql1->fetch(PDO::FETCH_ASSOC);
						$entry = $row['entry'];
						$entry = $entry + 1;
	$guncelle = $db->prepare("UPDATE yazarlar SET entry=? WHERE kuladi = ?");
$guncelle->execute(array($entry, $yazar));
$hata = $guncelle->errorInfo();
echo empty($hata[2]) ?  "" : $hata[2];
}
else{ }
?>
<?php
	$sql = $db->prepare("SELECT * FROM basliklar WHERE id= ?");
	$sql->execute(array(
		$_GET['id']
	));
	$satir=$sql->fetch(PDO::FETCH_ASSOC);
	$veri = $db->prepare("SELECT * FROM entryler WHERE baslikid= ?");
	$veri->execute(array(
		$_GET['id']
	));
	$satirlar=$veri->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="icerik">
		<div class="baslik">
			<a href="?id=<?php echo $_GET['id'] ?>&getir=baslik"><h2><?php echo $satir['isim'] ?></h2></a>
		</div>
		<div class="entryler">
		<?php 
			$id = 0;
			foreach($satirlar as $row){
			
			$id++;
		?>
		<div class="entry" id="<?php echo $id ?>">
			<div class="entryicerik"><div class="numero"><b><?php echo $id ?></b>.</div> <?php echo $row['entry'] ?>
			</div>
			<div class="entrybilgi">
				<div class="entrytarih"><a href=""><?php echo $row['tarih'] ?></a></div>
				<div class="entryyazar"><a href="<?php echo $adres ?>/?getir=yazar&kim=<?php echo $row['yazar'] ?>"><?php echo $row['yazar'] ?></a></div>
			</div>
			<?php if($row['yazar']==$_SESSION['user']){?>
					<div class="entrykontrol"><form action="index.php?getir=entrymeselesi" method="post"><input type="hidden" name="id" value="<?php echo $row['id'] ?>"><button class="btn btn-bs" name="gonder" value="yoket" href="">Sil</button> <button name="gonder" value="yenidenyarat" class="btn btn-bs" href="">Edit</button></form></div>
				<?php } ?>
		</div>
		
		<div style="margin-top:60px;"></div>
		<?php } ?>
		<?php if(isset($_SESSION["login"])){
		?>
		<form class="entryekle" action="" method="post">
		<textarea style="width:100%;height:auto;max-width:100%" name="entry"></textarea>
		<input class="btn btn-primary" type="submit" name="yolla" value="Yolla Paşam" />
		</form>
		<script type="text/javascript">

function countLines(strtocount, cols) {
  var hard_lines = 1;
  var last = 0;
  while ( true ) {
    last = strtocount.indexOf("\n", last+1);
    hard_lines ++;
    if ( last == -1 ) break;
  }
  var soft_lines = Math.round(strtocount.length / (cols-1));
  var hard = eval("hard_lines  " + unescape("%3e") + "soft_lines;");
  if ( hard ) soft_lines = hard_lines;
  return soft_lines;
}

function cleanForm() {
  for(var no=0;no<document.forms.length;no++){
    var the_form = document.forms[no];
    for( var x in the_form ) {
      if ( ! the_form[x] ) continue;
      if( typeof the_form[x].rows != "number" ) continue;

      if(!the_form[x].onkeyup) {the_form[x].onkeyup=function()
      {this.rows = countLines(this.value,this.cols)+1;};the_form[x].rows =
      countLines(the_form[x].value,the_form[x].cols) +1;}
    }
  }
}

// Multiple onload function created by: Simon Willison
// http://simon.incutio.com/archive/2004/05/26/addLoadEvent
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}

addLoadEvent(function() {
  cleanForm();
});
</script>
		<?php
		}	?>
		</div>
	</div>