<?php
include('template.php');

if( !empty($_POST['Titre']) && !empty($_POST['Texte'])){
	//Si toutes les données sont saisie par le client
	$requete = $pdo->prepare("INSERT INTO `listecarte` (`titre`, `texte`, `img`,`effetstat1oui`, `effetstat2oui`, `effetstat3oui`, `effetstat4oui`, `effetstat1non`, `effetstat2non`, `effetstat3non`, `effetstat4non`) VALUES (:titre, :texte, :img,:effetstat1oui, :effetstat2oui, :effetstat3oui, :effetstat4oui, :effetstat1non, :effetstat2non, :effetstat3non, :effetstat4non);");
	$requete->bindParam(':titre', $_POST['Titre']);
	$requete->bindParam(':texte', $_POST['Texte']);
	$requete->bindParam(':img', $_POST['img']);
	$requete->bindParam(':effetstat1oui', $_POST['effetstat1oui']);
	$requete->bindParam(':effetstat2oui', $_POST['effetstat2oui']);
	$requete->bindParam(':effetstat3oui', $_POST['effetstat3oui']);
	$requete->bindParam(':effetstat4oui', $_POST['effetstat4oui']);

	$requete->bindParam(':effetstat1non', $_POST['effetstat1non']);
	$requete->bindParam(':effetstat2non', $_POST['effetstat2non']);
	$requete->bindParam(':effetstat3non', $_POST['effetstat3non']);
	$requete->bindParam(':effetstat4non', $_POST['effetstat4non']);

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