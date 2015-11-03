<?php 
require "vt.php";
function replace_tr($text) {
$text = trim($text);
$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ', '\'');
$replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-','-');
$new_text = str_replace($search,$replace,$text);
return $new_text;
} 
$term = $_GET['term'];

$query = $db -> query('select * from basliklar where isim like "%'. $term .'%"', PDO::FETCH_ASSOC);

if ($query->rowCount()){
	
	$data = array();
	
	foreach ($query as $row){
		
		$data[] = array(
		'value' => $row['isim'],
		'baslik_id' => $row['id'],
		'baslik_isim' => $row['isim'],
		'baslik_link' => replace_tr($row['isim']),
		'entry_adedi' => $row['entryadedi'],
		
		);
		
	}
	
	echo json_encode($data);
}

?>