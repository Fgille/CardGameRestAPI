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

  <div class="container">
    <div class="row" id="cartes">

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

function afficheLaLOOSE(){
 ajaxGet("http://localhost//DEVSCHOOL/serveur-api-php/finpartie.php", function (reponse) {
   // Transforme la réponse en un tableau d'articles
        var msg = JSON.parse(reponse);
        console.log('partie encore en cours');
        if(msg.finpartie == 'OUI')
        {
         window.location.href="gameover.html";
        }
    });}

function chargercarte(id) {

  var url ="http://localhost//DEVSCHOOL/serveur-api-php/selectioncarte.php?id1=" + id;

  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", url, true);
  xhttp.send();
}

 function actualiseStat(){
  ajaxGet("http://localhost//DEVSCHOOL/serveur-api-php/stats.php", function (reponse) {
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

  
    //détermine si c'est son tour :
    function actualiseTour(){

      afficheLaLOOSE();
      actualiseStat();

      ajaxGet("http://localhost//DEVSCHOOL/serveur-api-php/montour.php?user=MJ", function (reponse) {
        // Transforme la réponse en un tableau d'articles
        var tour = JSON.parse(reponse);
          if(tour.Tour == "NON")
          {
            console.log("NON pas ton tour");
                  var element = document.getElementById("cartes");
                  while (element.firstChild) {
                    element.removeChild(element.firstChild);
                  }

                  firstrun = true;

          }
          if(tour.Tour == "OUI" && firstrun == true)
          {
            console.log("OUI c'est ton tour");
              
                  var cartesElt = document.getElementById("cartes");
                   ajaxGet("http://localhost//DEVSCHOOL/serveur-api-php/cartes.php", function (reponse) {
                  // Transforme la réponse en un tableau de cartes
                  var cartes = JSON.parse(reponse);
                  cartes.listecarte.forEach(function (carte) {
                      // Ajout du titre et du contenu de chaque article
                      var divcarte = document.createElement("div")
                      divcarte.className="col-md-3 card text-center card-body";
                      var titreCarte = document.createElement("h5");
                      titreCarte.className="card-title";
                      titreCarte.textContent = carte.titre;
                      var contenuCarte = document.createElement("p");
                      contenuCarte.className="card-text";
                      contenuCarte.innerText = carte.texte;
                      var lienCarte = document.createElement("input");
                      lienCarte.className="btn btn-info";
                      lienCarte.value="Choisir cette Carte";
                      lienCarte.onclick=function(){chargercarte(carte.id)};
                      cartesElt.appendChild(divcarte);
                      divcarte.appendChild(titreCarte);
                      divcarte.appendChild(contenuCarte);
                      divcarte.appendChild(lienCarte);
                  });
              });
              
              firstrun = false;

          }
          if(tour.Tour == "OUI" && firstrun == false)
          {
            console.log("OUI c'est ton tour et tu traines");
          }
        }); 
  setTimeout(actualiseTour,500);
    }

    actualiseTour();

  

  </script>
</body>
</html>