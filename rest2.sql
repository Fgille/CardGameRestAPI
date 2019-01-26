-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `carteschoisi`;
CREATE TABLE `carteschoisi` (
  `cle` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`cle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `listecarte`;
CREATE TABLE `listecarte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `choisi` varchar(255) NOT NULL DEFAULT 'NON',
  `titre` varchar(255) DEFAULT NULL,
  `texte` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `effetstat1oui` int(11) DEFAULT NULL,
  `effetstat2oui` int(11) NOT NULL,
  `effetstat3oui` int(11) NOT NULL,
  `effetstat4oui` int(11) NOT NULL,
  `effetstat1non` int(11) NOT NULL,
  `effetstat2non` int(11) NOT NULL,
  `effetstat3non` int(11) NOT NULL,
  `effetstat4non` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `listecarte` (`id`, `choisi`, `titre`, `texte`, `img`, `effetstat1oui`, `effetstat2oui`, `effetstat3oui`, `effetstat4oui`, `effetstat1non`, `effetstat2non`, `effetstat3non`, `effetstat4non`) VALUES
(17,	'NON',	'Masque',	'Tu as trouvÃ© un masque. Souhaites-tu l\'Ã©quiper ?',	'img/mask-joker.png',	1,	2,	-1,	3,	0,	0,	0,	0),
(18,	'NON',	'Chapeau',	'Tu as trouvÃ© un chapeau. Souhaites-tu l\'Ã©quiper ?',	'img/hat-joker.png',	2,	-1,	2,	-1,	0,	1,	0,	2),
(19,	'NON',	'Un Dragon',	'Un dangereux dragon te barre la route. Vas-tu l\'affronter ?',	'img/image.webp',	-4,	0,	0,	0,	0,	0,	0,	0),
(20,	'NON',	'Une Ã©pÃ©e',	'Tu viens de tomber sur une Ã©pÃ©e. Tu veux la ramasser ?',	'img/Sword.png',	0,	0,	2,	0,	0,	0,	-2,	2),
(21,	'NON',	'Un DÃ©tective',	'Un dÃ©tective mondialement reconnu te bloque la route. Il pense que tu as tuÃ© des gens dans un bar. Est-ce vrai ?',	'img/Detective_Pikachu.png',	0,	0,	0,	-10,	0,	0,	0,	2),
(22,	'NON',	'Une Princesse',	'Tu rencontres une superbe princesse. L\'embrasses-tu ?',	'img/Princesse.png',	2,	2,	2,	-3,	0,	0,	0,	0),
(23,	'NON',	'Mana',	'Tu tombes sur une potion de mana. Tu la bois ?',	'img/potionMana.png',	0,	2,	0,	0,	0,	0,	0,	1),
(24,	'NON',	'Potion Ã©trange',	'Tu trouves une potion Ã©trange. La bois-tu ?',	'img/PotionEtrange.png',	0,	0,	10,	0,	0,	0,	0,	0),
(25,	'NON',	'Raton Laveur',	'Tu tombes sur un Ã©trange raton laveur. Le tuer pour vendre sa fourrure ?',	'img/Tanooki.png',	-7,	-7,	0,	7,	2,	2,	0,	-2),
(26,	'NON',	'Un trÃ©sor',	'Tu tombes sur un trÃ©sor immense. Le prends tu pour tout utiliser a la taverne ?',	'img/coffre.png',	0,	0,	0,	10,	2,	0,	0,	0),
(27,	'NON',	'Art de Rue',	'Un artiste danse dans la rue. Lui donner de l\'argent ?',	'img/danseur.png',	2,	2,	2,	-3,	-2,	-2,	-2,	3),
(28,	'NON',	'Potion de Vie',	'Tu tombes sur une potion de vie. La boire ?',	'img/PotionVie.png',	3,	0,	0,	0,	-1,	0,	0,	1),
(30,	'NON',	'Le baton',	'Tu tombes sur une Ã©trange crÃ©ature qui te tend un baton pour jouer, le lancer ?',	'https://static.mmzstatic.com/wp-content/uploads/2015/06/petit-dinosaure-cinema-24-juin-2015.jpg',	1,	0,	-1,	0,	-2,	0,	0,	0),
(31,	'NON',	'Un repas gratuit ?',	'Ce petit personnage te propose un repas qui \"ne coÃ»te rien\" , le suis tu ?',	'http://static.hitek.fr/img/actualite/2013/12/27/w_kirby.jpg',	-2,	-1,	1,	0,	0,	0,	0,	0),
(32,	'NON',	'It\'s a trap',	'Quelqu\'un vous cris de ne pas aller dans la rue sombre vers laquelle vous vous dirigÃ© car \"it\'s a trap\", y aller quand mÃªme ?',	'https://i.kym-cdn.com/entries/icons/original/000/000/157/itsatrap.jpg',	-1,	-1,	-1,	1,	0,	0,	0,	1);

DROP TABLE IF EXISTS `stat`;
CREATE TABLE `stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stat1` int(11) DEFAULT '5',
  `stat2` int(11) DEFAULT '5',
  `stat3` int(11) DEFAULT '5',
  `stat4` int(11) DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `stat` (`id`, `stat1`, `stat2`, `stat3`, `stat4`) VALUES
(1,	5,	5,	5,	5);

-- 2019-01-26 17:22:21
