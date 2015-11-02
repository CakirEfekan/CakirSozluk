<div class="icerik">
<div class="baslik">
			<h2>Entry Meselesi Var Dediler Geldik</h2>
		</div>
		<div class="entryler">
<?php if(isset($_SESSION["login"])){
	$user = $_SESSION['user']; 
	$sql = $db->prepare("SELECT * FROM entryler WHERE id= ?");
		$entryid = $_POST['id'];
						$sql->execute(array(
							$entryid
						));
						$row=$sql->fetch(PDO::FETCH_ASSOC);
	if($user == $row['yazar']){
	if($_POST['gonder']){
		
		if($_POST['gonder']=='yenidenyarat'){
		
	
	
	
		
						
						
		?>
		
		<?php
		
		
		?>

		
		<form action="" method="post">
			<label>Entry: <textarea style="width:100%;height:300px;" name="entry"><?php echo $row['entry'] ?></textarea></label>
			<input type="hidden" name="islem" value="edit">
			<input type="hidden" name="id" value="<?php echo $entryid ?>">
			<input class="btn btn-primary" type="submit" value="Tamamdır mesele halloldu">
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
}
elseif($_POST['gonder']=='yoket'){
	$del = $db->prepare("DELETE FROM entryler WHERE id = ?");
	$del->execute(array(
    $entryid
	));
	$hata = $del->errorInfo();
echo empty($hata[2]) ?  "Ooo Meseleyi Kökten Çözdük" : $hata[2];
	?>
	
	
	
	<?php
	
	
}
}
elseif($_POST['islem']){
	$guncelle = $db->prepare("UPDATE entryler SET entry=? WHERE id = ?");
$guncelle->execute(array($_POST['entry'], $entryid));
$hata = $guncelle->errorInfo();
echo empty($hata[2]) ?  "Ayar verdiğin iyi oldu haketmişti." : $hata[2];

}
}
else {
				?>
				<script type="text/javascript">
				window.history.go(-1)
				</script>
				<?php
			}
			}
?>
		
		</div>
	</div>