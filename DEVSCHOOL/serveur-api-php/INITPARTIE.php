<?php
include('template.php');

$requete = $pdo->prepare("UPDATE listecarte SET choisi = 'NON'");
$requete->execute();

$requete2 = $pdo->prepare("DELETE FROM carteschoisi");
$requete2->execute();

$requete3 = $pdo->prepare("UPDATE stat SET stat1 = 5, stat2 = 5, stat3 = 5, stat4 = 5");
$requete3->execute();

$success = true;
$data['Initialisation'] = true;
reponse_json($success, $data);