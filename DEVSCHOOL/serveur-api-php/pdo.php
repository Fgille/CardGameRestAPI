<?php
$hote = 'flaviengzudev.mysql.db';
$port = "3306";
$nom_bdd = 'flaviengzudev';
$utilisateur = 'flaviengzudev';
$mot_de_passe ='39fYKn5e';

try {
	//On test la connexion à la base de donnée
    $pdo = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bdd, $utilisateur, $mot_de_passe);

} catch(Exception $e) {
	//Si la connexion n'est pas établie, on stop le chargement de la page.
	reponse_json($success, $data, 'Echec de la connexion à la base de données');
    exit();

}