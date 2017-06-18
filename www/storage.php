<?php
ob_start();

function checkSynonyme($r){
	$names = explode(",",$r['molNames']);
		if(array_search($_REQUEST['molName'],$names)!==false){
			//oui, c'est un doublon
			$GLOBALS["txt"] = "Ce modèle existe déjà, sous le même nom";
		} else { //c'est un synonyme
			$GLOBALS["txt"] = 'Confirmez-vous que '.$_REQUEST['molName'].' est bien un synonyme de '.$r['molNames'].' ?'.$r['molID'];
		}
}

if (isset($_REQUEST["smiles"])) {
	//connexion à la bdd
	$db = new PDO('sqlite:scribmol.sqlite');
	
	//le modèle existe-t-il déjà dans la base de données ?
	$sql = $db->prepare("select group_concat(synonymes.molName) AS molNames,synonymes.molID FROM molecules LEFT OUTER JOIN synonymes ON (molecules.molID=synonymes.molID) WHERE smile=(?) GROUP BY molecules.molID");
	$sql->execute(array($_REQUEST["smiles"]));
	if($row = $sql->fetch(PDO::FETCH_ASSOC)) {
		//le modèle existe bien dans la bdd
		//on vérifie s'il est présent sous le même nom ou non...
		checkSynonyme($row);
	} else { //c'est un nouveau modèle
		//il faut vérifier qu'il ne s'agit pas d'un doublon grâce au resolver
		$urlInChIKey = "http://cactus.nci.nih.gov/chemical/structure/".$_REQUEST["smiles"]."/stdinchikey";
		$InChIKey = file_get_contents($urlInChIKey);
		
		if ($InChIKey=="") {
			$txt = "pas de message reçu du resolver";
		}
		else {
			//on a obtenu le InChIKey, on vérifie qu'il n'existe pas déjà dans la base de données
			$sql = $db->prepare("select group_concat(synonymes.molName) AS molNames,synonymes.molID FROM molecules LEFT OUTER JOIN synonymes ON (molecules.molID=synonymes.molID) WHERE InChIKey=(?) GROUP BY molecules.molID");
			$sql->execute(array($InChIKey));
			if($row = $sql->fetch(PDO::FETCH_ASSOC)) { //on a bien le même modèle déjà en base de données
				checkSynonyme($row);				
			} else { //c'est vraiment un nouveau !
				$urlMol3D = "http://cactus.nci.nih.gov/chemical/structure/".$_REQUEST["smiles"]."/sdf?get3d=true";
				$mol3D = file_get_contents($urlMol3D);
					
				$urlMol2D = "http://cactus.nci.nih.gov/chemical/structure/".$_REQUEST["smiles"]."/file?format=mol";
				$mol2D = file_get_contents($urlMol2D);
				
				//stockage dans la base de données
				$sql = $db->prepare("INSERT INTO molecules (molName,smile,molFile3D,molFile2D,InChIKey,userID,validation) VALUES (?,?,?,?,?,1,0)");
				$sql->execute(array(strtolower($_REQUEST["molName"]),$_REQUEST["smiles"],$mol3D,$mol2D,$InChIKey));
				$molID = $db->lastInsertId();
				$txt = "Enregistrement n°".$db->lastInsertId()." correctement inséré dans la base de données";
				
				$sql = $db->prepare("INSERT INTO synonymes (molName,molID) VALUES (?,?)");
				$sql->execute(array($_REQUEST["molName"],$molID));
			}
			
		
		}	
	}
	
	
	header('Content-Type: text/html; charset=utf-8');
	echo $txt;
	/*echo "\nPDOStatement::errorInfo():\n";
	$arr = $sql->errorInfo();
	print_r($arr);*/
}
?>