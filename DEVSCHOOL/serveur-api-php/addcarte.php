<?php
include('template.php');

if( !empty($_GET['Titre']) && !empty($_GET['Texte'])){
	//Si toutes les données sont saisie par le client
	$requete = $pdo->prepare("INSERT INTO `listecarte` (`titre`, `texte`, `effetstat1oui`, `effetstat2oui`, `effetstat3oui`, `effetstat4oui`, `effetstat1non`, `effetstat2non`, `effetstat3non`, `effetstat4non`) VALUES (:titre, :texte, :effetstat1oui, :effetstat2oui, :effetstat3oui, :effetstat4oui, :effetstat1non, :effetstat2non, :effetstat3non, :effetstat4non);");
	$requete->bindParam(':titre', $_GET['Titre']);
	$requete->bindParam(':texte', $_GET['Texte']);
	$requete->bindParam(':effetstat1oui', $_GET['effetstat1oui']);
	$requete->bindParam(':effetstat2oui', $_GET['effetstat2oui']);
	$requete->bindParam(':effetstat3oui', $_GET['effetstat3oui']);
	$requete->bindParam(':effetstat4oui', $_GET['effetstat4oui']);

	$requete->bindParam(':effetstat1non', $_GET['effetstat1non']);
	$requete->bindParam(':effetstat2non', $_GET['effetstat2non']);
	$requete->bindParam(':effetstat3non', $_GET['effetstat3non']);
	$requete->bindParam(':effetstat4non', $_GET['effetstat4non']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'La carte a bien été ajouté';
		$data['succes'] = $msg;
	} else {
		$msg = "Une erreur s'est produite";
		$data['succes'] = $msg;
	}
} else {
	$msg = "Il manque des informations";
	$data['succes'] = $msg;
}
reponse_json($success, $data, $msg);