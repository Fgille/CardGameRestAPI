<?php
include('template.php');
if( !empty($_GET['id']) ){
	//Si le client a saisis un id
	$requete = $pdo->prepare("DELETE FROM `listecarte` WHERE `id` = :id");
	$requete->bindParam(':id', $_GET['id']);
	if( $requete->execute() ){
		$success = true;
		$msg = 'La carte est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}
reponse_json($success, $data, $msg);