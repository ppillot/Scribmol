<?php
ob_start();
if (isset($_REQUEST["molName"])&&isset($_REQUEST["molID"])) {
	//connexion à la bdd
	$db = new PDO('sqlite:scribmol.sqlite');
	
	//requête pour ajout à la base des synonymes
	$sql = $db->prepare("INSERT INTO synonymes (molName,molID) VALUES (?,?)");
	$sql->execute(array($_REQUEST["molName"],$_REQUEST["molID"]));
	$txt = "Enregistrement n°".$db->lastInsertId()." correctement inséré dans la base de données";
	
	
	
	header('Content-Type: text/html; charset=utf-8');
	echo $txt;
	/*echo "\nPDOStatement::errorInfo():\n";
	$arr = $sql->errorInfo();
	print_r($arr);*/
}
?>