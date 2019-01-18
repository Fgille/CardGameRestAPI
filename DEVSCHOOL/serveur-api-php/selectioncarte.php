<?php
include('template.php');

if( !empty($_GET['id1'])) {
	//Si toutes les données sont saisie par le client

	$requete = $pdo->prepare("INSERT INTO `carteschoisi` (`id`) VALUES (:id);");
	$requete->bindParam(':id', $_GET['id1']);


	if( $requete->execute() ){
		$success = true;
		$msg = 'Les cartes ont bien été ajouté';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);


/*<?php
include('template.php');

if( !empty($_GET['id1']) && !empty($_GET['id2'])){
	//Si toutes les données sont saisie par le client

	$requete = $pdo->prepare("INSERT INTO `carteschoisi` (`id`) VALUES (:id);");
	$requete->bindParam(':id', $_GET['id1']);

	$requete2 = $pdo->prepare("INSERT INTO `carteschoisi` (`id`) VALUES (:id);");
	$requete2->bindParam(':id', $_GET['id2']);

	if( $requete->execute() && $requete2->execute()){
		$success = true;
		$msg = 'Les cartes ont bien été ajouté';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);*/