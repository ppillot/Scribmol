<?php
ob_start();
//paramètre de recherche :
$q = $_REQUEST["term"];
//connexion à la bdd
	$db = new PDO('sqlite:scribmol.sqlite');
	
		//stockage dans la base de données
		$sql = $db->prepare("SELECT molecules.molID AS molID, group_concat(synonymes.molName,\", \") AS molNames ". 
							"FROM molecules LEFT OUTER JOIN synonymes ON molecules.molID=synonymes.molID ".
							"WHERE synonymes.molName LIKE ?".
							"GROUP BY molecules.molID ".
							"ORDER BY molNames");
		$sql->execute(array("%".$q."%"));
	
	$result = array();	
	while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
		array_push($result,array("label"=>$row['molNames'],"molId"=>$row['molID']));
	}
	
	
	
	header('Content-Type: text/javascript; charset=utf-8');
	echo json_encode($result);
	/*echo "\nPDOStatement::errorInfo():\n";
$arr = $sql->errorInfo();
print_r($arr);*/
?>