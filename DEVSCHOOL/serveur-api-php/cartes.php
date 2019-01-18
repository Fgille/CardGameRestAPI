<?php
include('template.php');

if( !empty($_GET['id']) ){
	//Si le client a saisi une id de carte, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `listecarte` WHERE `id` LIKE :carte");
	$requete->bindParam(':carte', $_GET['id']);
} else {
	//Sinon on affiche toutes les cartes
	$requete = $pdo->prepare("SELECT * FROM `listecarte` WHERE `choisi` like 'NON' ");
}


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['listecarte'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);