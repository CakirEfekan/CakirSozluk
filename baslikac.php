<?php if(isset($_SESSION["login"])){
		?>
<div class="icerik">
		<div class="baslik">
			<h2>Başlık Açımı</h2>
		</div>
		<div class="entryler">
		<form action="" method="post">
			<label>Başlık: <input type="text" name="baslik"></label><br><br>
			<label>Entry: <textarea style="width:100%;height:300px;" name="entry"></textarea></label>
			<input type="submit" value="Göndeeeer">
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

if(!$_POST['entry'] == null){
	$query = $db -> query('select * from basliklar where isim like "%'. $_POST['baslik'] .'%"', PDO::FETCH_ASSOC);
	$say = $query->rowCount();
	if($say == null){
	$zaman = date('d.m.Y H:i:s');
	$entry = $_POST['entry'];
	
	$baslik = $_POST['baslik'];
	$baslik = mb_strtolower($baslik , 'UTF8');
	
	
	function temiz($veri)
{
$veri =str_replace("`","",$veri);
$veri =str_replace("=","",$veri);
$veri =str_replace("&","",$veri);
$veri =str_replace("%","",$veri);
$veri =str_replace("!","",$veri);
$veri =str_replace("#","",$veri);
$veri =str_replace("<","",$veri);
$veri =str_replace(">","",$veri);
$veri =str_replace("*","",$veri);
$veri =str_replace("And","",$veri);
$veri =str_replace("chr(34)","",$veri);
$veri =str_replace("chr(39)","",$veri);
return $veri;


}

$baslik = temiz($baslik);
	
	
	$entry= mb_strtolower($entry, 'UTF8');
	$yazar = $_SESSION['user'];
	$vt = $db->prepare('INSERT INTO basliklar (isim,baslatan) VALUES (?,?)');
	$eklevt = $vt->execute(array(
 
        $baslik,
        $yazar
        ));
		
	$sqll = $db->prepare("SELECT * FROM basliklar WHERE isim= ?");
						$sqll->execute(array(
							$baslik
						));
						$rowcek=$sqll->fetch(PDO::FETCH_ASSOC);
 $sql = $db->prepare('INSERT INTO entryler (baslikid,entry,yazar,tarih) VALUES (?,?,?,?)');
    $ekle = $sql->execute(array(
 
        $rowcek['id'],
        $entry,
        $yazar,
		$zaman,
        ));
     
    $hata = $sql->errorInfo();
    echo empty($hata[2]) ?  "Başarılı Bir Şekilde Çalıştı." : $hata[2];
	echo $rowcek['id'].'<br>'.$baslik;

	
	$sql1 = $db->prepare("SELECT * FROM yazarlar WHERE kuladi= ?");
						$sql1->execute(array(
							$yazar
						));
						$row = $sql1->fetch(PDO::FETCH_ASSOC);
						$baslik = $row['baslik'];
						$baslik = $baslik + 1;
						
	$guncelle = $db->prepare("UPDATE yazarlar SET baslik=? WHERE kuladi = ?");
$guncelle->execute(array($baslik, $yazar));
$hata = $guncelle->errorInfo();
echo empty($hata[2]) ?  "" : $hata[2];
	
	
}
}
else{
	echo "Bu başlık daha önce açılmış dostum.";
}
?>

		<?php
		}
			else {
				?>
				<script type="text/javascript">
				window.history.go(-1)
				</script>
				<?php
			}?>
		
		</div>
	</div>