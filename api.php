<?php 
require "vt.php";
$term = $_GET['term'];

$query = $db -> query('select * from basliklar where isim like "%'. $term .'%"', PDO::FETCH_ASSOC);

if ($query->rowCount()){
	
	$data = array();
	
	foreach ($query as $row){
		
		$data[] = array(
		'value' => $row['isim'],
		'baslik_id' => $row['id'],
		'baslik_isim' => $row['isim'],
		'entry_adedi' => $row['entryadedi'],
		
		);
		
	}
	
	echo json_encode($data);
}

?>