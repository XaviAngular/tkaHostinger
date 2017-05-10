<?php
//Para comprobar si se recibe un post desde un ajax
if ($_SERVER['REQUEST_METHOD']==='GET'){	
	$sql = "SELECT * FROM categoria";
	$mysqli = new mysqli('mysql.hostinger.es', 'u320028818_tka', '123456789', 'u320028818_tka');
	mysqli_set_charset($mysqli,"utf8");
	if ($mysqli) {
		$query=$mysqli->query($sql);
		$mysqli->close();
		
		$rows= Array();
	while ($row=$query->fetch_assoc()){
		$rows[] = $row;
	}   		
		}
	if ($query) {
	echo json_encode([
		"query" 	=> $rows,
		"error"		=> 0,	
		"resultado" => "se ha cargado"
		]);	
	}
	else {
		echo json_encode([
		"query" 	=> $query,
		"error"		=> 1,
		"resultado" => "NO se ha cargado!!"
		]);	
	}
}
else {
echo json_encode([
		"query" => "KO",
		"error"		=> 1,
		"resultado"	=> "no hay"
	]);
}
?>