<?php
include('template.php');

if( !empty($_GET["id"]) && !empty($_GET["choix"])){

	if($_GET['choix'] == 'OUI')
	{
		$req = $pdo->prepare("UPDATE stat SET stat1 = stat1 + (SELECT effetstat1oui FROM listecarte WHERE id = :id), stat2 = stat2 + (SELECT effetstat2oui FROM listecarte WHERE id=:id), stat3 = stat3 + (SELECT effetstat3oui FROM listecarte WHERE id=:id), stat4 = stat4 + (SELECT effetstat4oui FROM listecarte WHERE id=:id)");
		$req->bindParam(':id', $_GET["id"]);
		$req->execute();
		$success = true;
		$msg = 'Effet Affirmatif propagé';
	}

	if($_GET["choix"] == 'NON')
	{
		$req = $pdo->prepare("UPDATE stat SET stat1 = stat1 + (SELECT effetstat1non FROM listecarte WHERE id = :id), stat2 = stat2 + (SELECT effetstat2non FROM listecarte WHERE id=:id), stat3 = stat3 + (SELECT effetstat3non FROM listecarte WHERE id=:id), stat4 = stat4 + (SELECT effetstat4non FROM listecarte WHERE id=:id)");
		$req->bindParam(':id', $_GET["id"]);
		$req->execute();
		$success = true;
		$msg = 'Effet Négatif propagé';
	}

	$requete = $pdo->prepare("DELETE FROM `carteschoisi` WHERE `id` = :id");
	$requete->bindParam(':id', $_GET['id']);
	$requete->execute();

	$requete2 = $pdo->prepare("UPDATE listecarte SET choisi ='NON' WHERE `id` = :id");
	$requete2->bindParam(':id', $_GET['id']);
	$requete2->execute();

	$data = '';


} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);
