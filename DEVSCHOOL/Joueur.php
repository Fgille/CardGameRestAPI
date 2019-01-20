<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Card Game API REST</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery-3.3.1.min.js"></script>
        <style type="text/css">
progress {
   width: 95%;
   margin: 5%;
   padding: 4px;
   background: #444;
   border-radius: 14px;
}

    </style>
</head>
<body>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-12" style="">
          <h1 class="display-3">REST CARD GAME</h1>
          <p class="lead text-muted">Jeux multijoueur sur une architecture REST</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h1 class="text-center">Stat 1</h1>
        </div>
        <div class="col-md-3">
          <div class="col-md-12">
            <h1 class="text-center">Stat 2</h1>
          </div>
        </div>
        <div class="col-md-3">
          <div class="col-md-12">
            <h1 class="text-center">Stat 3</h1>
          </div>
        </div>
        <div class="col-md-3">
          <div class="col-md-12">
            <h1 class="text-center">Stat 4</h1>
          </div>
        </div>
        <div class="col-md-3 ">
            <progress  id="stat1" max="10"></progress>
        </div>
        <div class="col-md-3">
              <progress  id="stat2" max="10"></progress>
        </div>
        <div class="col-md-3">
              <progress  id="stat3" max="10"></progress>
        </div>
        <div class="col-md-3">
            <progress  id="stat4" max="10"></progress>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center">
    <div class="row" id="carte">
    	 <div class="col-md-4 ">
    	 </div>

  </div>
</div>	


  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    	// Exécute un appel AJAX GET
// Prend en paramètres l'URL cible et la fonction callback appelée en cas de succès
var firstrun = true;

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
  ajaxGet("http://flaviengille.fr/DEVSCHOOL/serveur-api-php/stats.php", function (reponse) {
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
}

function afficheLaLOOSE(){
ajaxGet("http://flaviengille.fr/DEVSCHOOL/serveur-api-php/finpartie.php", function (reponse) {
  // Transforme la réponse en un tableau d'articles
       var msg = JSON.parse(reponse);
       console.log('partie encore en cours');
       if(msg.finpartie == 'OUI')
       {
        window.location.href="gameover.html";
       }
   });}

function validerchoix(id, choix) {

  var url ="http://flaviengille.fr/DEVSCHOOL/serveur-api-php/validerchoix.php?id=" + id + "&choix=" + choix;

  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", url, true);
  xhttp.send();
}




  
//détermine si c'est son tour :
function actualiseTour(){
  actualiseStat();
  afficheLaLOOSE();

  ajaxGet("http://flaviengille.fr/DEVSCHOOL/serveur-api-php/montour.php?user=JOUEUR", function (reponse) {
    // Transforme la réponse en un tableau d'articles
    var tour = JSON.parse(reponse);
      if(tour.Tour == "NON")
      {
        console.log("NON pas ton tour");

        var element = document.getElementById("carte");
        while (element.firstChild) {
          element.removeChild(element.firstChild);
        }

        firstrun = true;

      }
      if(tour.Tour == "OUI" && firstrun == true)
      {
        console.log("OUI c'est ton tour");

         ajaxGet("http://flaviengille.fr/DEVSCHOOL/serveur-api-php/carteschoisi.php", function (reponse) {
		    // Transforme la réponse en un tableau d'articles
		    var cartesElt = document.getElementById("carte");
		    var carte = JSON.parse(reponse);
		    carte.carteschoisi.forEach(function (carte) {
		    	ajaxGet("http://flaviengille.fr/DEVSCHOOL/serveur-api-php/cartes.php?id=" + carte.id, function (reponse) {
		    		var cartes = JSON.parse(reponse);
                  	cartes.listecarte.forEach(function (carte) {
                    // Ajout du titre et du contenu de chaque article
                    var divcarte2 = document.createElement("div")

                    var divcarte = document.createElement("div")

                    divcarte.className="col-md-4 card text-center card-body";
                    divcarte2.className="col-md-4";
                    var titreCarte = document.createElement("h5");
                    titreCarte.className="card-title";
                    titreCarte.textContent = carte.titre;

                    var contenuCarte = document.createElement("p");
                    contenuCarte.className="card-text";
                    contenuCarte.innerText = carte.texte;

                    var lienCarte = document.createElement("input");
                    lienCarte.className="btn btn-success col-md-12";
                    lienCarte.value="Affirmatif";
                    lienCarte.onclick=function(){validerchoix(carte.id, "OUI")};

                    var lienCarte2 = document.createElement("input");
                    lienCarte2.className="btn btn-danger col-md-12";
                    lienCarte2.value="Négatif";
                    lienCarte2.onclick=function(){validerchoix(carte.id, "NON")};

                    var divrow = document.createElement("div")
                    divrow.className="row";

                    var divcol = document.createElement("div")
                    divcol.className="col-md-6";

                    var divcol2 = document.createElement("div")
                    divcol2.className="col-md-6";

                    cartesElt.appendChild(divcarte2);
                    cartesElt.appendChild(divcarte);
                    divcarte.appendChild(titreCarte);
                    divcarte.appendChild(contenuCarte);

                    divcarte.appendChild(divrow);
                    divrow.appendChild(divcol);
                    divrow.appendChild(divcol2);

                    divcol.appendChild(lienCarte);
                    divcol2.appendChild(lienCarte2);
					});
				});
		    });
		});

        firstrun = false;

      }
      if(tour.Tour == "OUI" && firstrun == false)
      {
        console.log("OUI c'est ton tour et tu traines");


      }
    }); 
 setTimeout(actualiseTour,200);
}

    actualiseTour();

  

  </script>
</body>
</html>