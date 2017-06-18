<?php
ob_start();
if (isset($_REQUEST["smiles"]) && isset($_REQUEST["type"])) {
	if ($_REQUEST["type"]=="3D") {
		$urlMol3D = "https://cactus.nci.nih.gov/chemical/structure/".$_REQUEST["smiles"]."/sdf?get3d=true";
		$mol = file_get_contents($urlMol3D);
	}elseif ($_REQUEST["type"]=="2D") {
		$urlMol = "https://cactus.nci.nih.gov/chemical/structure/".$_REQUEST["smiles"]."/file?format=mol";
		$mol = file_get_contents($urlMol);
	}
	
	
	header('Content-Type: text/html; charset=utf-8');
	echo $mol;
}
?>