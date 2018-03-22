<?php
session_start();
include('bdd.php');

// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['form_connexion'])) {

  // On vérifie qu'aucun champ ne soit vide (doublecheck du required) :
  if (!empty($_POST['uti_mail']) AND !empty($_POST['uti_mdp'])) {

    $uti_mail = $_POST['uti_mail'];
    $uti_mdp_crypte = $_POST['uti_mdp'];

    // On vérifie que le couple email / mot de passe existe dans la bdd :
    $req_uti = $bdd -> prepare("SELECT * FROM utilisateur WHERE uti_mail = ? AND uti_mdp = ?");
    $req_uti -> execute(array($uti_mail, $uti_mdp_crypte));
    $uti_existe = $req_uti -> rowCount();
    if ($uti_existe == "1") {

      // Tout est bon on initialise les variables de session :
      $uti_infos = $req_uti -> fetch();
      $_SESSION['uti_id'] = $uti_infos['uti_id'];
      $_SESSION['uti_mail'] = $uti_infos['uti_mail'];
      $_SESSION['uti_prenom'] = $uti_infos['uti_prenom'];
      $_SESSION['uti_nom'] = $uti_infos['uti_nom'];
      $_SESSION['uti_estadmin'] = $uti_infos['uti_estadmin'];
      $_SESSION['uti_classe'] = $uti_infos['uti_classe'];
      $_SESSION['uti_sexe'] = $uti_infos['uti_sexe'];
      $_SESSION['uti_campus'] = $uti_infos['uti_campus'];
      $_SESSION['uti_messages_envoyes'] = $uti_infos['uti_messages_envoyes'];
      $_SESSION['uti_derniere_connexion'] = $uti_infos['uti_derniere_connexion'];
			$_SESSION['uti_pdp'] = $uti_infos['uti_pdp'];

      // Redirection page d'accueil
      //header("Location: accueil.php");

    } else {
      $erreur = "Identifiants incorrects";
    }

  } else {
      $erreur = "Vous devez remplir tout les champs";
  }
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!--Importation des Polices-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<link rel="stylesheet" type="text/css" href="css/header.css"/>

</head>
<body>
  <header>

    <nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="accueil.php">My HELPSI</a>
        </div>


        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="accueil.php">Accueil</a></li>
            <li><a href="forum.php">Forum</a></li>
          </ul>


          <?php
          if (isset($_SESSION['uti_mail'])) {
            echo "
            <ul class='nav navbar-nav navbar-right'>
            <form method='POST' action='recherche.php' class='navbar-form navbar-left'>
              <div class='input-group'>
                <input style='background-color: #fff; color: black;' type='text' name='recherche' class='form-control' placeholder='Rechercher'>
                <div class='input-group-btn'>
                  <button style='background-color: #fff; height: 34px;' class='btn btn-default' name='form_recherche' type='submit'><i class='glyphicon glyphicon-search'></i></button>
                </div>
              </div>
            </form>
            <li><a href='compte.php'><span class='glyphicon glyphicon-user'></span>  ".$_SESSION['uti_prenom']." ".$_SESSION['uti_nom']."</a></li>
            <li><a href='deconnexion.php'><span class='glyphicon glyphicon-log-in'></span> Se déconnecter</a></li>
            </ul>
            ";
          } else {
            echo "
            <ul class='nav navbar-nav navbar-right'>
            <form method='POST' action='recherche.php' class='navbar-form navbar-left'>
              <div class='input-group'>
                <input style='background-color: #fff; color: black;' type='text' name='recherche' class='form-control' placeholder='Rechercher'>
                <div class='input-group-btn'>
                  <button style='background-color: #fff; height: 34px;' class='btn btn-default' name='form_recherche' type='submit'><i class='glyphicon glyphicon-search'></i></button>
                </div>
              </div>
            </form>
            <li><a href='inscription.php'><span class='glyphicon glyphicon-user'></span>  Inscription</a></li>
            <li><a data-toggle='modal' href='#connexion'><span class='glyphicon glyphicon-log-in'></span>  Connexion</a></li>
            </ul>
            ";
          }
          ?>

      </div>
    </nav> </br> </br></br></br>

  </header>
</div>



<!-- Modal de connexion -->
<div data-show="false" class="modal" id="connexion" role="dialog">

  <div class="modal-dialog">
    <form method="POST" class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Connexion</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Adresse mail</label>
          <input name="uti_mail" placeholder="Entrez votre email" required="" value="<?php if(isset($uti_mail)){ echo $uti_mail; }?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Mot de passe</label>
          <input name="uti_mdp" placeholder="Entrez votre mot de passe" required="" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
        </div>

        <button name='form_connexion' type='submit' class='btn btn-primary'>Connexion</button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>

    </form>
  </div>

</div>
