<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type" />
  <title>Librairie de molécules - Scribmol</title>
  <style type="text/css" >
  	body {
  		background: #eee;
  	}
	#header {
		background: #004466;
		border-radius: 10px;
		-moz-border-radius: 10px;
		background: -webkit-gradient( linear, 0 50%, 0 100%, from(#046), to(#035) ); 
		background: -moz-linear-gradient( top, #046, #046, #035 );
		height: 65px;
		width: 800px;
		margin: 20px auto 20px auto;
		-moz-box-shadow: 1px 1px 10px #444;  
  		-webkit-box-shadow: 1px 1px 10px #444;  
 		 box-shadow: 1px 1px 10px #444;
	}
	#header img{
		float: left;
	}
	#header h1 {
		display: inline;
		padding: 0 0 0 5px;
		font: bold 18pt Verdana, Geneva, Arial, Helvetica, sans-serif;
		color: #fff;
	}
	#header h2 {
		display: inline;
		text-align: left;
		padding: 0 0 0 5px;
		font: italic 10pt Verdana, Geneva, Arial, Helvetica, sans-serif;
		color: #fff;
	}
	
  	#content {
  		background: #fff;
  		width: 800px;
		margin-left: auto;
		margin-right:auto;
		margin-top: 20px;
		margin-bottom: 10px;
		padding: 0px;
  		-moz-border-radius: 10px; 
  		-webkit-border-radius: 10px; 
  		border-radius: 10px;
		-moz-box-shadow: 1px 1px 10px #444;  
  -webkit-box-shadow: 1px 1px 10px #444;  
  box-shadow: 1px 1px 10px #444; 
  
  	}
#couverture {
	margin: 2em auto 2em auto;
	display:block;
}
h1,h2 {
	padding-top: 20px;
	text-align:center;
	color: #046;
}
h2 {
	padding-top: 0px;
	font: 10pt;
}
hr {
	width:0;
	color: #046;
	border:solid;
	margin:0;
}
.vignette {
	width: 340px;
	border: solid 1px #888;
	margin: 22px;
	float: left;
	padding: 5px;
	border-radius: 4px;
	-moz-border-radius: 4px;
}
.vignette:hover {
	background: #eeeeff;
	-moz-box-shadow: 1px 1px 10px #444;  
  -webkit-box-shadow: 1px 1px 10px #444;  
  box-shadow: 1px 1px 10px #444;
}
.vignette img {
	float: left;
	margin-right: 4px;
	/*border: solid 1px #666;*/
	border-radius: 4px;
	-moz-border-radius: 4px;
}
.titre {
	color: #046;
	font-size: 12pt;
	font-weight: bold;
}
li {
	list-style-type:square;
	color: #046;
}
body{
	font: 10pt Helvetica, Arial, sans-serif;
	color: #006
}
a {
	text-decoration: none;
	border: none;
	color: #006
}
a img {
	border:none;
}
.sous_titre {
	text-align: center;
	font-weight: bold;
	color: #366097;
	font-size: 12pt;
}
.avertissement {
	
	margin: 20px;
	border: dashed 1px #888888;
	padding: 4px;
	color: #366097;
}
.avertissement b {
	color: #bb6666;
}
.credits {
	color: #888;
	text-align: center;
}
.credits a {
	color: #666;
	font-weight: bold;
}
.credits a:hover {
	color: #003355;
}
  </style>
</head>

<body>
	
	<a href="http://www.librairiedemolecules.education.fr">
		<div id="header">
			<img src="img/libmol.png" alt="" /><hr>
		<h1>Librairie de molécules</h1>
		<br />
		<h2>Site national coopératif - Banques de données et outils pour l'enseignement</h2>
	</div></a>
<div id="content">
<h1>Scribmol</h1>
<div class="sous_titre">Outils en ligne pour la construction, l'analyse et la comparaison <br />
	des molécules et de leurs formules chimiques</div>
<a href="scrib.html">
<div class="vignette">
	<div class="titre">Construction de molécules</div>
	<img src="img/scribmol.png" alt="" />
	Constuire des molécules en 2D (formule développée) et en 3D (modèle moléculaire).
	
</div></a>
<a href="comp.html">
<div class="vignette">
	<div class="titre">Comparaison de molécules</div>
	<img src="img/logo_comp.png" alt="" />
	Affichage de molécules prédéfinies, comparaison, répérage et légende de structures remarquables
</div></a>


<br />
<br />
<br />
<hr style="clear: both; border:none;">
	<div class="avertissement"><b>Avertissement</b> : Ce site et les outils qu'il contient sont en cours de conception. Ils sont proposés en l'état, à des fins de test. <br />
		Certains modules peuvent être utilisés en classe dès à présent (merci de nous faire part de vos retours d'expérience),
		cependant les outils sont susceptibles d'évoluer dans leur présentation et leurs fonctionnalités.</div>
		<hr style="clear: both; border:none;">
		<br />
</div>
<br />
<div class="credits">
    Programmation : <a href="mailto: paul.pillot@retirer.cette.partie.de.l.adresse.pour.ecrire.cimf.ca">Paul Pillot</a> - Licence libre
	<br />
	Applications en ligne réalisées grâce aux logiciels libres suivants : <br />
	<a href="http://www.jmol.org" target="_blank">JSmol</a> - <a href="http://web.chemdoodle.com/" target="_blank">Chemdoodle Web Components</a> - <a href="http://www.jquery.com" target="_blank">Jquery</a> <br />
    2011 - 2017<br />
	</div>
</body>

<?php
//compteur de visites

define("_BBC_PAGE_NAME", "Scribmol");

define("_BBCLONE_DIR", "../../statistiques/");

define("COUNTER", _BBCLONE_DIR."mark_page.php");

if (is_readable(COUNTER)) include_once(COUNTER);



?></html>