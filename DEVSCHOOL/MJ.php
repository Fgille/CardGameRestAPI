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

<div class="py-5 text-center">
  <div class="container">
    <div class="row">
      <div class="offset-3 col-md-6 card text-center card-body">
        <h4 class="card-title"> Insérer une nouvelle carte dans le jeu </h4>
        <form>
          <input type="text" name="fTitre" id="fTitre" placeholder="Titre">
          <input type="text" name="fTexte" id="fTexte" placeholder="Texte de la carte">
          <input type="text" name="feffetstat1oui" id="feffetstat1oui" placeholder="Effet sur Stat1 si OUI">
          <input type="text" name="feffetstat1non" id="feffetstat1non" placeholder="Effet sur Stat1 si NON">
          <input type="text" name="feffetstat2oui" id="feffetstat2oui" placeholder="Effet sur Stat2 si OUI">
          <input type="text" name="feffetstat2non" id="feffetstat2non" placeholder="Effet sur Stat2 si NON">
          <input type="text" name="feffetstat3oui" id="feffetstat3oui" placeholder="Effet sur Stat3 si OUI">
          <input type="text" name="feffetstat3non" id="feffetstat3non" placeholder="Effet sur Stat3 si NON">
          <input type="text" name="feffetstat4oui" id="feffetstat4oui" placeholder="Effet sur Stat4 si OUI">
          <input type="text" name="feffetstat4non" id="feffetstat4non" placeholder="Effet sur Stat4 si NON">

           <div class="row">
          <button type="button" class="btn btn-primary offset-3 col-md-6" onclick="ajouterUneCarte()">Ajouter la carte</button>
          </div>
        </form>

      </div>
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

function chargercarte(id) {

  var url ="http://flaviengille.fr/DEVSCHOOL/serveur-api-php/selectioncarte.php?id1=" + id;

  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", url, true);
  xhttp.send();
}

function supprimerCarte(id) {

  var url ="http://flaviengille.fr/DEVSCHOOL/serveur-api-php/suppCarte.php?id=" + id;

  var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", url, true);
  xhttp.send();

  var element = document.getElementById("cartes");
  while (element.firstChild) {
    element.removeChild(element.firstChild);
  }

  firstrun = true;

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

  
    //détermine si c'est son tour :
    function actualiseTour(){

      afficheLaLOOSE();
      actualiseStat();

      ajaxGet("http://flaviengille.fr/DEVSCHOOL/serveur-api-php/montour.php?user=MJ", function (reponse) {
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
                   ajaxGet("http://flaviengille.fr/DEVSCHOOL/serveur-api-php/cartes.php", function (reponse) {
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
                      lienCarte.className="btn btn-info col-md-12";
                      lienCarte.value="Choisir";

                      lienCarte.onclick=function(){chargercarte(carte.id)};

                      var lienCarteSup = document.createElement("input");
                      lienCarteSup.className="btn btn-danger col-md-12";
                      lienCarteSup.value="Supprimer";

                      lienCarteSup.onclick=function(){supprimerCarte(carte.id)};

                      var divrow = document.createElement("div")
                      divrow.className="row";

                      var divcol = document.createElement("div")
                      divcol.className="col-md-6";

                      var divcol2 = document.createElement("div")
                      divcol2.className="col-md-6";

                      cartesElt.appendChild(divcarte);
                      divcarte.appendChild(titreCarte);
                      divcarte.appendChild(contenuCarte);
                      divcarte.appendChild(divrow);
                      divrow.appendChild(divcol);
                      divrow.appendChild(divcol2);
                      divcol.appendChild(lienCarte);
                      divcol2.appendChild(lienCarteSup);

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


  <script>
    function ajouterUneCarte(){
      var fTitre = document.getElementById("fTitre").value;
      var fTexte = document.getElementById("fTexte").value;
      var feffetstat1oui = document.getElementById("feffetstat1oui").value;
      var feffetstat2oui = document.getElementById("feffetstat2oui").value;
      var feffetstat3oui = document.getElementById("feffetstat3oui").value;
      var feffetstat4oui = document.getElementById("feffetstat4oui").value;

      var feffetstat1non = document.getElementById("feffetstat1non").value;
      var feffetstat2non = document.getElementById("feffetstat2non").value;
      var feffetstat3non = document.getElementById("feffetstat3non").value;
      var feffetstat4non = document.getElementById("feffetstat4non").value;


      var url ="http://flaviengille.fr/DEVSCHOOL/serveur-api-php/addcarte.php?Titre=" + fTitre + "&Texte=" + fTexte + "&effetstat1oui=" + feffetstat1oui + "&effetstat2oui=" + feffetstat2oui + "&effetstat3oui=" + feffetstat3oui + "&effetstat4oui=" + feffetstat4oui + "&effetstat1non=" + feffetstat1non + "&effetstat2non=" + feffetstat2non + "&effetstat3non=" + feffetstat3non + "&effetstat4non=" + feffetstat4non + "";

      console.log(url);
    
      var xhttp = new XMLHttpRequest();
      
      xhttp.open("GET", url, true);
      xhttp.send();

      var element = document.getElementById("cartes");
      while (element.firstChild) {
        element.removeChild(element.firstChild);
      }

      firstrun = true;
    }

  </script>



</body>
</html>