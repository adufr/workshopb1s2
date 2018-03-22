<?php
include('header.php');


// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['form_modif_email'])) {

  // On vérifie qu'aucun champ ne soit vide (doublecheck du required) :
  if (!empty($_POST['uti_mail']) AND !empty($_POST['uti_mail2'])) {

    $uti_mail = $_POST['uti_mail'];
    $uti_mail2 = $_POST['uti_mail2'];

    // Vérification confirmation du mdp :
    if ($uti_mail == $uti_mail2) {

      // Vérification taille de l'email :
      if (strlen($uti_mail < 50)) {

        // On vérifie que l'adresse mail n'est pas déjà enregistré dans la bdd :
        $req_mail = $bdd -> prepare("SELECT * FROM UTILISATEUR WHERE uti_mail = ?");
        $req_mail -> execute(array($uti_mail));
        $mail_existe = $req_mail -> rowCount();
        if ($mail_existe == 0) {

          // Tout est bon : on insert l'utilisateur dans la bdd :
          $req_inser = $bdd -> prepare("UPDATE UTILISATEUR set uti_mail = ? WHERE uti_id = ? ");
          $req_inser -> execute(array($uti_mail, $_SESSION['uti_id']));

          // Mise à jour de la variable de sesssion :
          $_SESSION['uti_mail'] = $uti_mail;

          $erreur = "Votre adresse mail a bien été mise à jour !";

        } else {
          $erreur = "Cette adresse mail n'est pas disponible";
        }

      } else {
        $erreur = "Veuillez rentrer un email ne dépassant pas 50 caractères";
      }

    } else {
      $erreur = "Veuillez rentrer deux fois le même mail";
    }

  } else {
    $erreur = "Vous devez remplir tout les champs";
  }
}


// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['form_modif_mdp'])) {

  // On vérifie qu'aucun champ ne soit vide (doublecheck du required) :
  if (!empty($_POST['uti_mdp']) AND !empty($_POST['uti_newmdp']) AND !empty($_POST['uti_newmdp2'])) {

    $uti_mdp_old = $_POST['uti_mdp'];
    $uti_mdp = $_POST['uti_newmdp'];
    $uti_mdp2 = $_POST['uti_newmdp2'];

    if ($uti_mdp == $uti_mdp2) {

      // Vérification taille de l'email :
      if (strlen($uti_mdp < 25)) {

        // On vérifie que l'ancien mdp est valide :
        $req_uti = $bdd -> prepare("SELECT * FROM UTILISATEUR WHERE uti_mail = ? AND uti_mdp = ?");
        $req_uti -> execute(array($_SESSION['uti_mail'], $uti_mdp_old));
        $uti_existe = $req_uti -> rowCount();
        if ($uti_existe == "1") {

          // Tout est bon : on insert l'utilisateur dans la bdd :
          $req_inser = $bdd -> prepare("UPDATE UTILISATEUR set uti_mdp = ? WHERE uti_id = ? ");
          $req_inser -> execute(array($uti_mdp, $_SESSION['uti_id']));

          $erreur = "Votre mot de passe a bien été mis à jour !";

        } else {
          $erreur = "Mot de passe incorrect";
        }

      } else {
        $erreur = "Veuillez rentrer un mot de passe ne dépassant pas 25 caractères";
      }

    } else {
      $erreur = "Veuillez rentrer deux fois le même mot de passe";
    }

  } else {
    $erreur = "Vous devez remplir tout les champs";
  }
}

if (isset($erreur)) {
  echo "<div>$erreur</div>";
}
?>

<link rel="stylesheet" type="text/css" href="css/compte.css"/>
<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar">

    <div class="sidebar-header">
      <?php echo "<h3>".$_SESSION['uti_prenom']." ".$_SESSION['uti_nom']."</h3>";?>
      <?php echo "<strong>".substr($_SESSION['uti_prenom'], 0, 1).substr($_SESSION['uti_nom'], 0, 1)."</strong>";?>
    </div>

    <ul class="list-unstyled components">
      <li>
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
          <i class="glyphicon glyphicon-briefcase"></i>
          Profil
        </a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
          <li><a data-toggle='modal' href='#modifEmail'>Modifier email</a></li>
          <li><a data-toggle='modal' href="#modifMdp">Modifier mot de passe</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class="glyphicon glyphicon-tasks"></i>
          Matières
        </a>
      </li>
      <li>
        <a href="#">
          <i class="glyphicon glyphicon-comment"></i>
          Messages privés
        </a>
      </li>
      <li class="active">
        <a href="accueil.php">
          <i class="glyphicon glyphicon-home"></i>
          Accueil
        </a>
      </li>
    </ul>

  </nav>
</div>



<!--TRUCS MOCHES D'ALEXANDRE -->
<!--TRUCS MOCHES D'ALEXANDRE -->
<!--TRUCS MOCHES D'ALEXANDRE -->
<!--TRUCS MOCHES D'ALEXANDRE -->
<!--TRUCS MOCHES D'ALEXANDRE -->
<!--TRUCS MOCHES D'ALEXANDRE -->
<link rel="stylesheet" href="css/testmess.css">

<div id="frame">
  <div id="sidepanel">
    <div id="profile">
      <div class="wrap">
        <img id="profile-img" src="<?php echo $_SESSION['uti_pdp']; ?>" class="online" alt="" />
        <p><?php echo $_SESSION['uti_nom'];?> <?php echo $_SESSION['uti_prenom'];?></p>

      </div>
    </div>
    <div id="search">
      <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
      <input type="text" placeholder="Search contacts..." />
    </div>
    <div id="contacts">
      <ul>

        <?php

        $req3 = $bdd->prepare('SELECT message FROM messages2 WHERE uti_id_emmeteur = ? AND uti_id_destinataire = ? AND id_message = (SELECT MAX(id_message) FROM messages2) ');
        $req3 -> execute(array($idemmeteur, $iddest));
        $derniermess = $req3->fetch();

        $req = $bdd->prepare('SELECT DISTINCT uti_id_destinataire FROM messages2 WHERE uti_id_emmeteur = ?');
        $req -> execute(array($idemmeteur));
        $utilisateursmess = $req->fetchAll();

        foreach ($utilisateursmess as $utimess){
          $req2 = $bdd->prepare('SELECT  uti_id, uti_nom, uti_prenom, uti_pdp FROM utilisateur WHERE uti_id = ?');
          $req2 -> execute(array($utimess['uti_id_destinataire']));
          $utiinfos = $req2->fetchAll();

          foreach ($utiinfos as $utiinfo) {
            echo "<li class='contact'>
            <div class='wrap'>
            <span class='contact-status online'></span>
            <img src='".$utiinfo['uti_pdp']."' alt='' />
            <div class='meta'>
            <p class='name'>".$utiinfo['uti_nom']." ".$utiinfo['uti_prenom']."</p>
            <p class='preview'>".$derniermess."</p>
            </div>
            </div>
            </li>";
          }
        }





        ?>




      </ul>
    </div>
    <div id="bottom-bar">
      <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
    </div>
  </div>
  <div class="content">
    <div class="contact-profile">
      <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
      <p></p>
    </div>

    <div class="messages">
      <ul>

        <?php

        $req = $bdd->prepare('SELECT uti_id_emmeteur, uti_id_destinataire, message, date_heure_message FROM messages2 WHERE (uti_id_emmeteur = ? OR uti_id_emmeteur = ?) AND (uti_id_destinataire = ? OR uti_id_destinataire = ?) ORDER BY date_heure_message');
        $req -> execute(array($idemmeteur, $iddest, $idemmeteur, $iddest));
        $messages = $req->fetchAll();

        foreach ($messages as $message):

          if ($message['uti_id_emmeteur'] == $idemmeteur) {
            echo "<li class='sent'>
            <img src='../images/pdp.png' alt='' />
            <p>".$message['message']."</p>
            </li>";
          }elseif ($message['uti_id_emmeteur'] == $iddest) {
            echo "<li class='replies'>
            <img src='../images/pdp.png' alt='' />
            <p>".$message['message']."</p>
            </li>";
          }

          ?>

        <?php endforeach; ?>

      </ul>
    </div>
    <form method="post">
      <div class="envoimessage">
        <div class="wrap">

          <input type="text" name="envoimess" placeholder="Écrivez votre message..." />
          <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
          <button class="submit" name="bouttonenvoi"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>

        </form>
      </div>
    </div>
    <?php

    $datemess = date('Y-m-d H:i:s');

    if (isset($_POST['bouttonenvoi'])) {
      $envoimess = $_POST['envoimess'];
      echo $envoimess;
      echo $_POST['envoimess'];
      $req_inser = $bdd -> prepare("INSERT INTO messages2(uti_id_emmeteur, uti_id_destinataire, message, date_heure_message) VALUES (?,?,?,?)");
      $req_inser -> execute(array($idemmeteur, $iddest, $envoimess, $datemess));
    }

    ?>


  </div>
</div>



<!DOCTYPE html><html class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

  <script src="https://use.typekit.net/hoy3lrg.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

  <?php

  $bdd = new PDO('mysql:host=localhost;dbname=workshopb1s2', 'root', '');

  ?>
  <?php
  $idemmeteur = '6';
  $req = $bdd->prepare('SELECT uti_nom, uti_prenom FROM utilisateur WHERE uti_id = ?');
  $req -> execute(array($idemmeteur));
  $emmeteurs = $req->fetchAll();

  $iddest = '1';
  $req = $bdd->prepare('SELECT uti_nom, uti_prenom FROM utilisateur WHERE uti_id = ?');
  $req -> execute(array($iddest));
  $destinataires = $req->fetchAll();

  ?>

  <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

  $("#profile-img").click(function() {
    $("#status-options").toggleClass("active");
  });

  $(".expand-button").click(function() {
    $("#profile").toggleClass("expanded");
    $("#contacts").toggleClass("expanded");
  });

  $("#status-options ul li").click(function() {
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");

    if($("#status-online").hasClass("active")) {
      $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
      $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
      $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
      $("#profile-img").addClass("offline");
    } else {
      $("#profile-img").removeClass();
    };

    $("#status-options").removeClass("active");
  });

  function newMessage() {
    message = $(".message-input input").val();
    if($.trim(message) == '') {
      return false;
    }
    $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
    $('.message-input input').val(null);
    $('.contact.active .preview').html('<span>You: </span>' + message);
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");
  };

  $('.submit').click(function() {
    newMessage();
  });

  $(window).on('keydown', function(e) {
    if (e.which == 13) {
      newMessage();
      return false;
    }
  });
  //# sourceURL=pen.js
</script>







<!-- Modal modification email -->
<div data-show="false" class="modal" id="modifEmail" role="dialog">

  <div class="modal-dialog">
    <form method="POST" class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Changement d'adresse mail</h4>
      </div>

      <div class="modal-body">

        <div class="form-group">
          <label for="exampleInputEmail1">Nouvelle adresse mail</label>
          <input name="uti_mail" placeholder="Entrez votre email" required="" value="<?php if(isset($uti_mail)){ echo $uti_mail; }?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Confirmation nouvelle adresse mail</label>
          <input name="uti_mail2" placeholder="Entrez une seconde fois votre email" required="" value="<?php if(isset($uti_mail2)){ echo $uti_mail2; }?>"type="email" class="form-control" id="exampleInputPassword1">
        </div>

        <button name="form_modif_email" type="submit" class="btn btn-primary">Confirmer</button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>

    </form>
  </div>

</div>




<!-- Modal modification mot de passe-->
<div data-show="false" class="modal" id="modifMdp" role="dialog">

  <div class="modal-dialog">
    <form method="POST" class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Changement mot de passe</h4>
      </div>

      <div class="modal-body">

        <div class="form-group">
          <label for="exampleInputEmail1">Mot de passe actuel</label>
          <input name="uti_mdp" placeholder="Entrez votre mot de passe" required="" value="" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Nouveau mot de passe</label>
          <input name="uti_newmdp" placeholder="Entrez votre nouveau mot de passe" required="" value="" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Confirmation nouveau mot de passe</label>
          <input name="uti_newmdp2" placeholder="Entrez une seconde fois votre nouveau mot de passe" required="" value="" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button name="form_modif_mdp" type="submit" class="btn btn-primary">Confirmer</button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>

    </form>
  </div>

</div>




<!--Script JQuery pour affichage du menu -->
<script type="text/javascript">
$(document).ready(function () {
  $('#sidebar').hover(function () {
    $('#sidebar').toggleClass('active');
  });
  $('#sidebar').toggleClass('active');
});
</script>

