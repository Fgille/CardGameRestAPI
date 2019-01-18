<?php
include('template.php');

$requete = $pdo->prepare("SELECT * FROM `carteschoisi`");

if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$nombre = count($resultats);

	if(!empty($_GET['user']))
	{
		if($_GET['user']=='MJ')
		{
			if($nombre>0)
			{
				$data['Tour'] = 'NON';
			}
			else {
				$data['Tour'] = 'OUI';
			}
		}
		else
		{
			if($nombre>0)
			{
				$data['Tour'] = 'OUI';
			}
			else {
				$data['Tour'] = 'NON';
			}
		}
	}
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);
