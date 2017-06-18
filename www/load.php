<?php
ob_start();
//connexion à la bdd
	$db = new PDO('sqlite:scribmol.sqlite');
	
		//stockage dans la base de données
		$sql = $db->prepare("SELECT molName AS titre,molID,molFile2D,molFile3D FROM molecules WHERE molID = (?)");
		$sql->execute(array($_REQUEST['molID']));
	
		$sql->execute();
	
		$mol = $sql->fetch(PDO::FETCH_ASSOC);
	
	
	
	
	header('Content-Type: text/javascript; charset=utf-8');
	echo json_encode($mol);
	/*echo "\nPDOStatement::errorInfo():\n";
$arr = $sql->errorInfo();
print_r($arr);*/

?>