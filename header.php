<!DOCTYPE html>

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
    $req_uti = $bdd -> prepare("SELECT * FROM UTILISATEUR WHERE uti_mail = ? AND uti_mdp = ?");
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

      $erreur = "Vous êtes connecté !";
      // Redirection page d'accueil
      //header("Location: index.php");

    } else {
      $erreur = "Ces identifiants sont incorrects";
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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <!--Importation des Modals-->
  <link type="text/css" rel="stylesheet" href="css/modal.css" media="screen,projection"/>
  <script type="text/javascript" src="js/modal.js"></script>
  <!--Importation de Materialize-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--Importation de Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--Importation de JQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--Importation de Popper.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>




<link rel="stylesheet" type="text/css" href="css/header.css"/>

</head>
<body>
  <header>

    <nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">MY HELPSI</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Accueil</a></li>
          <li><a href="forum.php">Forum</a></li>
          <?php
          if (isset($_SESSION['uti_mail'])) {
            echo"<li><a href='moncompte.php?q=messages'>Mes messages</a></li>";
          }?>
        </ul>


        <?php
        if (isset($_SESSION['uti_mail'])) {
          echo "
          <ul class='nav navbar-nav navbar-right'>
          <li><a href='moncompte.php'><span class='glyphicon glyphicon-user'></span>  ".$_SESSION['uti_prenom']." ".$_SESSION['uti_nom']."</a></li>
          <li><a class='modal-trigger' href='deconnexion.php'><span class='glyphicon glyphicon-log-in'></span> Se déconnecter</a></li>
          </ul>
          ";
        } else {
          echo "
          <ul class='nav navbar-nav navbar-right'>
          <li><a href='inscription.php'><span class='glyphicon glyphicon-user'></span>  Inscription</a></li>
          <li><a class='modal-trigger' href='#connexion'><span class='glyphicon glyphicon-log-in'></span>  Connexion</a></li>
          </ul>
          ";
        }
        ?>

      </div>
    </nav> </br> </br></br></br>

  </header>
</div>



<!-- Modal de connexion -->
<div id="connexion" class="modal modalConnexion">
  <form method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Adresse mail</label>
      <input name="uti_mail" placeholder="Entrez votre email" required="" value="<?php if(isset($uti_mail)){ echo $uti_mail; }?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">De préférence votre adresse mail EPSI ou WIS.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input name="uti_mdp" placeholder="Entrez votre mot de passe" required="" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button name="form_connexion" type="submit" class="btn btn-primary">Connexion</button>
  </form>
</div>
