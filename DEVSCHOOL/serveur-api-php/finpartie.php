<?php
include('template.php');

$pdo2 = $pdo;

$requete = $pdo->prepare("SELECT * FROM `stat` WHERE `id` = 1");

if( $requete->execute() ){
	$resultats = $requete->fetchAll();

	} else {
	$msg = "Une erreur s'est produite";
}



if(!empty($resultats))
{
	if($resultats['0']['stat1'] <=0){
		$data['finpartie'] = 'OUI';
		$data['message'] = "L'aventurier ne sait donc pas vaincre le Maître.... 
		L'aventurier n'a plus de vie";
	}

	else if($resultats['0']['stat1'] >= 10){
		$data['finpartie'] = 'OUI';
		$data['message'] = "L'aventurier ne sait donc pas vaincre le Maître....";
	}

	else if($resultats['0']['stat2'] <=0){
		$data['finpartie'] = 'OUI';
		$data['message'] = "L'aventurier ne sait donc pas vaincre le Maître....";
	}

	else if($resultats['0']['stat2'] >= 10){
		$data['finpartie'] = 'OUI';
		$data['message'] = "L'aventurier ne sait donc pas vaincre le Maître....";
	}

	else if($resultats['0']['stat3'] <=0){
		$data['finpartie'] = 'OUI';
		$data['message'] = "L'aventurier ne sait donc pas vaincre le Maître....";
	}

	else if($resultats['0']['stat3'] >= 10){
		$data['finpartie'] = 'OUI';
		$data['message'] = "L'aventurier ne sait donc pas vaincre le Maître....";
	}

	else if($resultats['0']['stat4'] <=0){
		$data['finpartie'] = 'OUI';
		$data['message'] = "L'aventurier ne sait donc pas vaincre le Maître....";
	}

	else if($resultats['0']['stat4'] >= 10){
		$data['finpartie'] = 'OUI';
		$data['message'] = "L'aventurier ne sait donc pas vaincre le Maître....";
	}



	else {

		$req = $pdo2->prepare("SELECT * FROM `listecarte` WHERE `choisi` like 'NON'");
		$req->execute();
		$result=$req->fetchAll();

		$data['nombre'] = count($result);
	
		if($data['nombre'] <= 0)
		{
			$data['finpartie'] = 'OUI';
			$data['message'] = "L'aventurier semble donc meilleur que le Maître !";
		}
		else
		{
			$data['finpartie'] = 'NON';
		}

	}
}

reponse_json($success, $data);