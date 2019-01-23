<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Card Game API REST</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="jquery-3.3.1.min.js"></script>
</head>
<body>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-12" style="">
          <h1 class="display-3">REST CARD GAME</h1>
          <p class="lead text-muted">Jeux multijoueur sur une architecture REST</p>
          <a href="" onclick="initPartie()"> Réinitialiser la partie </a>
        </div>
      </div>
    </div>
  </div>
	
  <div class="container text-center">
    <div class="row" id="cartes">
    	<div class="col-md-2">
    	</div>

    	<div class="col-md-4 card card-body">
    		<h5 class="card-title"> Maître du Jeu</h5>
    		<p class="card-text"> Vous organiserez le déroulement de la partie, l'aventurier devra vous répondre</p>
    		<a href="MJ.php" class="btn btn-info">Incarnez le MJ</a>
    	</div>

    	<div class="col-md-1">
    	</div>

    	<div class="col-md-4 card card-body">
    		<h5 class="card-title"> Aventurier</h5>
    		<p class="card-text"> Vous devrez prendre les bonnes décisions dans l'ordre que le MJ vous imposeras</p>
			<a href="Joueur.php" class="btn btn-info">Incarnez l'Aventurier</a>
    	</div>

  </div>
</div>	

<script type="text/javascript">
  
  function initPartie() {
    
      var url ="http://flaviengille.fr/DEVSCHOOL/serveur-api-php/INITPARTIE.php";
    
      var xhttp = new XMLHttpRequest();
      
      xhttp.open("GET", url, true);
      xhttp.send();
      window.location.href="index.php";
    }
</script>


</body>
</html>