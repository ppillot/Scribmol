<?php
ob_start();
//connexion à la bdd
	$db = new PDO('sqlite:scribmol.sqlite');
	
		//stockage dans la base de données
		$sql = $db->prepare("SELECT molecules.molID AS molID, group_concat(synonymes.molName,\", \") AS molNames ". 
							"FROM molecules LEFT OUTER JOIN synonymes ON molecules.molID=synonymes.molID ".
							"GROUP BY molecules.molID ".
							"ORDER BY molNames");
		$sql->execute();
	
	$result ="";	
	while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
		$result .= '<li onclick="chargeMol('.$row['molID'].')">'.$row['molNames'].'</li>';
	}
	
	
	
	header('Content-Type: text/html; charset=utf-8');
	echo $result;
	/*echo "\nPDOStatement::errorInfo():\n";
$arr = $sql->errorInfo();
print_r($arr);*/

?>