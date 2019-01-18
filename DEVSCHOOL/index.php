<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Card Game API REST</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery-3.3.1.min.js"></script>
    <style type="text/css">
progress {
   width: 300px;
   margin: 1em auto;
   padding: 4px;
   border: 0 none;
   background: #444;
   border-radius: 14px;
   box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5),
               0px 1px 0px rgba(255,255,255,0.2);
}
progress::-moz-progress-bar {
   background: #FFF;
   border-radius: 12px;
   box-shadow: inset 0 -2px 4px rgba(0,0,0,0.4),
               0 2px 5px 0px rgba(0,0,0,0.3);
}
    </style>
</head>
<body>

	<progress class="stat" id="stat1" max="10"></progress>
	<progress class="stat" id="stat2" max="10"></progress>
	<progress class="stat" id="stat3" max="10"></progress>
	<progress class="stat" id="stat4" max="10"></progress>
	


  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
  	// Exécute un appel AJAX GET
// Prend en paramètres l'URL cible et la fonction callback appelée en cas de succès
function ajaxGet(url, callback) {
    var req = new XMLHttpRequest();
    req.open("GET", url);
    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {
            // Appelle la fonction callback en lui passant la réponse de la requête
            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL " + url);
    });
    req.send(null);
}
  	function actualiseStat(){
  		ajaxGet("http://localhost/DEVSCHOOL/serveur-api-php/stats.php", function (reponse) {
    		// Transforme la réponse en un tableau d'articles
    		var stats = JSON.parse(reponse);
    		stats.stats.forEach(function (stat) {
    		    // Ajout du titre et du contenu de chaque article
    		    document.getElementById("stat1").value = stat.stat1;
    		    document.getElementById("stat2").value = stat.stat2;
    		    document.getElementById("stat3").value = stat.stat3;
    		    document.getElementById("stat4").value = stat.stat4;
    		}); 
		});
	setTimeout(actualiseStat,2000);
  	}

  	actualiseStat();

  </script>
</body>
</html>