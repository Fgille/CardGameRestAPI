# CardGameRestAPI
Projet Etudiant, jeux multijoueur sur architecture rest

L'objectif est de faire jouer 2 joueurs.
Un Maître du Jeu, et un aventurier.

Le Maître du jeu distribue les cartes 1 a 1 a l'aventurier.
Chaque carte a des effets en fonction de si on accepte ou non la carte.

L'aventurier a 4 statistiques VIE, FORCE, MANA, ARGENT.
Son objectif est de maintenir ses 4 statistiques entre 1 et 9. Si il dépasse ou tombe en dessous il perd.

La partie prend fin dans 2 situations :
- L'aventurier a jouer toutes les cartes du jeux en maintenant ses statistiques a un bon niveau.
- L'aventurier n'a pas réussi a maintenir ses statistiques.

# Démonstration 
http://flaviengille.fr/DEVSCHOOL/


# Installation : 

### Créer une base de données avec le fichier rest.sql
### Mettre a jour le fichier de config pdo.php (DEVSCHOOL/serveur-api-php/pdo.php)
### Mettre déplacer l'intégralité du dossier DEVSCHOOL dans un localhost
### Commencer une partie en vous rendant sur le lien 
  http://localhost/DEVSCHOOL/
