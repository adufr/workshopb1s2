<!DOCTYPE html><html class='no-js'>
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
          <a class="navbar-brand police2" href="accueil.php">My HELPSI</a>
        </div>


        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a class="police2" href="accueil.php">Accueil</a></li>
            <li><a class="police2" href="forum.php">Forum</a></li>
            <?php
            if (isset($_SESSION['uti_mail'])) {
              echo"<li><a class='police2' href='messages.php'>Mes messages</a></li>";
            }?>
          </ul>


          <?php
          if (isset($_SESSION['uti_mail'])) {
            echo "
            <ul class='nav navbar-nav navbar-right'>
            <li><a class='police2' href='compte.php'><span class='glyphicon glyphicon-user'></span>  ".$_SESSION['uti_prenom']." ".$_SESSION['uti_nom']."</a></li>
            <li><a class='police2' href='deconnexion.php'><span class='glyphicon glyphicon-log-in'></span> Se déconnecter</a></li>
            </ul>
            ";
          } else {
            echo "
            <ul class='nav navbar-nav navbar-right'>
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




























<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/message.css">
<!-- Include the above in your HEAD tag ---------->

<script src="https://use.typekit.net/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

<?php

  if (isset($_SESSION['uti_id'])) {

  }else {
    header("Location: accueil.php");
  }

 ?>
 <?php




     $idemmeteur = $_SESSION['uti_id'];
     $req = $bdd->prepare('SELECT uti_nom, uti_prenom FROM utilisateur WHERE uti_id = ?');
     $req -> execute(array($idemmeteur));
     $emmeteurs = $req->fetchAll();

     if (isset($_GET['id_uti'])) {
     $iddest = $_GET['id_uti'];
     $req = $bdd->prepare('SELECT uti_nom, uti_prenom FROM utilisateur WHERE uti_id = ?');
     $req -> execute(array($iddest));
     $destinataires = $req->fetchAll();
}
  ?>

<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<img id="profile-img" src="<?php echo $_SESSION['uti_pdp']; ?>" class="online" alt="" />
				<p class="police"><?php echo $_SESSION['uti_nom'];?> <?php echo $_SESSION['uti_prenom'];?></p>

			</div>
		</div>
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" placeholder="Search contacts..." />
		</div>
		<div id="contacts">
			<ul>

<?php

  $req = $bdd->prepare('SELECT DISTINCT uti_id_destinataire FROM messages2 WHERE uti_id_emmeteur = ?');
  $req -> execute(array($idemmeteur));
  $utilisateursmess = $req->fetchAll();

  foreach ($utilisateursmess as $utimess){
    $req2 = $bdd->prepare('SELECT  uti_id, uti_nom, uti_prenom, uti_pdp FROM utilisateur WHERE uti_id = ?');
    $req2 -> execute(array($utimess['uti_id_destinataire']));
    $utiinfos = $req2->fetchAll();

foreach ($utiinfos as $utiinfo) {
  $req3 = $bdd->prepare('SELECT message FROM messages2 WHERE uti_id_emmeteur = ? AND uti_id_destinataire = ? AND id_message = (SELECT MAX(id_message) FROM messages2) ');
  $req3 -> execute(array($idemmeteur, $utiinfo['uti_id']));
  $derniermess = $req3->fetch();
    echo "<a style='color: white; text-decoration: none;' href='message.php?id_uti=".$utiinfo['uti_id']."'>
    <li class='contact'>
      <div class='wrap'>
        <span class='contact-status online'></span>
        <img src='".$utiinfo['uti_pdp']."' alt='' />
        <div class='meta'>
          <p class='name police'>".$utiinfo['uti_nom']." ".$utiinfo['uti_prenom']."</p>
          <p class='preview police'>".$derniermess['message']."</p>
        </div>
      </div>
    </li>
    </a>";
  }
  }





    ?>




			</ul>
		</div>

	</div>
	<div class="content">
		<div class="contact-profile">
      <?php
      $req2 = $bdd->prepare('SELECT DISTINCT  uti_id, uti_nom, uti_prenom, uti_pdp FROM utilisateur WHERE uti_id = ?');
      $req2 -> execute(array($_GET['id_uti']));
      $utiinfos = $req2->fetchAll();

  foreach ($utiinfos as $utiinfo) {

		echo "	<img src=".$utiinfo['uti_pdp']." alt='' />
			<p class='police'>".$utiinfo['uti_nom']." ".$utiinfo['uti_prenom']."</p>";
  }

?>
<div class="social-media">
      <a href="message.php?id_uti=<?php echo $_GET['id_uti']; ?>"><img src="images/refresh.png"></a>
    </div>
  </div>
		<div class="messages">
			<ul>

        <?php

        $req = $bdd->prepare('SELECT uti_id_emmeteur, uti_id_destinataire, message, date_heure_message FROM messages2 WHERE (uti_id_emmeteur = ? OR uti_id_emmeteur = ?) AND (uti_id_destinataire = ? OR uti_id_destinataire = ?) ORDER BY date_heure_message');
        $req -> execute(array($idemmeteur, $iddest, $idemmeteur, $iddest));
        $messages = $req->fetchAll();

        foreach ($messages as $message):

          if ($message['uti_id_emmeteur'] == $idemmeteur) {
            $req2 = $bdd->prepare('SELECT DISTINCT  uti_id, uti_nom, uti_prenom, uti_pdp FROM utilisateur WHERE uti_id = ?');
            $req2 -> execute(array($idemmeteur));
            $utiinfos = $req2->fetchAll();

        foreach ($utiinfos as $utiinfo) {
            echo "<li class='sent'>
              <img src='".$utiinfo['uti_pdp']."' alt='' />
              <p class='police'>".$message['message']."</p>
            </li>";
          }
          }elseif ($message['uti_id_emmeteur'] == $iddest) {
            $req2 = $bdd->prepare('SELECT DISTINCT  uti_id, uti_nom, uti_prenom, uti_pdp FROM utilisateur WHERE uti_id = ?');
            $req2 -> execute(array($iddest));
            $utiinfos = $req2->fetchAll();

        foreach ($utiinfos as $utiinfo) {
            echo "<li class='replies'>
              <img src='".$utiinfo['uti_pdp']."' alt='' />
              <p class='police'>".$message['message']."</p>
            </li>";
          }
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
</body>

</html>
