<?php
include('template.php');

$requete = $pdo->prepare("SELECT * FROM `stat` WHERE `id` = 1");

if( $requete->execute() ){
	$resultats = $requete->fetchAll();

	} else {
	$msg = "Une erreur s'est produite";
}



if(!empty($resultats))
{
	if($resultats['0']['stat1'] <=0 || $resultats['0']['stat1'] >= 10 || $resultats['0']['stat2'] <=0 || $resultats['0']['stat2'] >= 10 || $resultats['0']['stat3'] <=0 || $resultats['0']['stat3'] >= 10 || $resultats['0']['stat4'] <=0 || $resultats['0']['stat4'] >= 10){
		$data['finpartie'] = 'OUI';
	}
	else {
		$data['finpartie'] = 'NON';
	}
}

reponse_json($success, $data);
