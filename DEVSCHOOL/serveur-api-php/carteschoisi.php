<?php
include('template.php');

$requete = $pdo->prepare("SELECT * FROM `carteschoisi`");

if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['carteschoisi'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);
