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





// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['forum_modif_pdp'])) {

  // Constantes
  define('TARGET', 'images/');    // Repertoire cible
  define('MAX_SIZE', 25000000);    // Taille max en octets du fichier
  define('WIDTH_MAX', 5000);    // Largeur max de l'image en pixels
  define('HEIGHT_MAX', 5000);    // Hauteur max de l'image en pixels


  // Tableaux de donnees
  $tabExt = array('png','jpg','gif','jpeg');    // Extensions autorisees
  $infosImg = array();

  // Variables
  $nomfichier = md5(uniqid());
  $extension = '';
  $message = '';
  $nomImage = '';

  /************************************************************
   * Creation du repertoire cible si inexistant
   *************************************************************/
  if( !is_dir(TARGET) ) {
    if( !mkdir(TARGET, 0755) ) {
      exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
    }
  }


  // Recuperation de l'extension du fichier
  $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

  // On verifie l'extension du fichier
  if(in_array(strtolower($extension),$tabExt)) {

    // On recupere les dimensions du fichier
    $infosImg = getimagesize($_FILES['fichier']['tmp_name']);

    // On verifie le type de l'image
    if($infosImg[2] >= 1 && $infosImg[2] <= 50) {

      // On verifie les dimensions et taille de l'image
      if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE)) {

        // Parcours du tableau d'erreurs
        if(isset($_FILES['fichier']['error']) && UPLOAD_ERR_OK === $_FILES['fichier']['error']) {

          // On renomme le fichier
          $nomImage = $nomfichier.".".$extension;

          // Si c'est OK, on teste l'upload
          if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage)) {

            // Tout est bon : on insert l'utilisateur dans la bdd :
            $req_inser = $bdd -> prepare("UPDATE utilisateur SET uti_pdp = ? WHERE uti_id = ? ");
            $req_inser -> execute(array("images/".$nomfichier, $_SESSION['uti_id']));

          } else {
            // Sinon on affiche une erreur systeme
            $message = 'Problème lors de l\'upload !';
          }

        } else {
          $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
        }

      } else {
        // Sinon erreur sur les dimensions et taille de l'image
        $message = 'Erreur dans les dimensions de l\'image !';
      }

    } else {
      // Sinon erreur sur le type de l'image
      $message = 'Image trop grande !';
    }

  } else {
    // Sinon on affiche une erreur pour l'extension
    $message = 'L\'extension du fichier est incorrecte !';
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
          <li><a data-toggle='modal' href="#modifPdp">Modifier photo de profil</a></li>
        </ul>
      </li>
      <li>
        <a href="competences.php">
          <i class="glyphicon glyphicon-tasks"></i>
          Matières
        </a>
      </li>
      <li>
        <a href="message.php?id_uti=<?php
          $req = $bdd -> prepare('SELECT * FROM messages2 WHERE uti_id_destinataire = (SELECT MAX(uti_id_destinataire) FROM messages2 WHERE uti_id_emmeteur = ?)');
          $req -> execute(array($idemmeteur));
          $resulat = $req -> fetch();
          echo $resultat['uti_id_destinataire'];
         ?>">
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




<!-- Modal modification mot de passe -->
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




<!-- Modal modification photo de profil -->
<div data-show="false" class="modal" id="modifPdp" role="dialog">

  <div class="modal-dialog">
    <form method="POST" class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modification photo de profil</h4>
      </div>

      <div class="modal-body">

        <div class="form-group">
          <label style="margin-left: 36%;" class="btn btn-primary">Choisir un fichier&hellip; <input name="uti_pdp" type="file" style="display: none;"></label>
        </div>

        <button name="form_modif_pdp" type="submit" class="btn btn-primary">Confirmer</button>
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


<?php include('footer.php'); ?>
