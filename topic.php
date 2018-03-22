<link rel="stylesheet" type="text/css" href="css/topic.css"/>
<?php
include('header.php');


$listeTopics = array("htmlcss", "php", "js", "bdd", "c", "csharp", "python", "batch", "perl", "ruby", "vbnet", "phpframework",
"jsframework", "linux", "windows", "mobile", "anglais", "francais", "maths", "algo", "reseaux", "management", "economie");

if (isset($_GET['page'])) {

  if (in_array($_GET['page'], $listeTopics)) {
    $pageTemp = $_GET['page'];
  } else {
    header('Location: forum.php');
  }

}

switch ($pageTemp) {
  case "htmlcss":
  $page = "HTML & CSS";
  $desc = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
  break;
  case "php":
  $page = "PHP";
  break;
  case "js":
  $page = "Javascript";
  break;
  case "bdd":
  $page = "Base de données";
  break;
  case "c":
  $page = "C & C++";
  break;
  case "csharp":
  $page = "C#";
  break;
  case "python":
  $page = "Python";
  break;
  case "batch":
  $page = "Batch";
  break;
  case "perl":
  $page = "Perl";
  break;
  case "ruby":
  $page = "Ruby";
  break;
  case "vbnet":
  $page = "VisualBasic & Microsoft .NET";
  break;
  case "phpframework":
  $page = "Frameworks PHP";
  break;
  case "jsframework":
  $page = "Frameworks Javascript";
  break;
  case "linux":
  $page = "Linux";
  break;
  case "windows":
  $page = "Windows";
  break;
  case "mobile":
  $page = "Développement applications mobile";
  break;
  case "anglais":
  $page = "Anglais";
  break;
  case "francais":
  $page = "Français";
  break;
  case "maths":
  $page = "Mathématiques";
  break;
  case "algo":
  $page = "Algorithmie";
  break;
  case "reseaux":
  $page = "Réseaux";
  break;
  case "management":
  $page = "Management";
  break;
  case "economie":
  $page = "Economie";
  break;
}
$desc = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";


// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['form_nouveau_sujet'])) {

  // On vérifie qu'aucun champ ne soit vide (doublecheck du required) :
  if (!empty($_POST['post_titre']) AND !empty($_POST['post_message'])) {

    // On récupère les informations :
    $post_titre = $_POST['post_titre'];
    $post_message = $_POST['post_message'];
    $auteur_id = $_SESSION['uti_id'];

    // On vérifie que les champs ne dépasse pas la taille acceptée par la BDD :
    if (strlen($post_titre) < 50) {
      if (strlen($post_message) < 5000) {

        // Tout est bon : on insert le message dans la bdd :
        $req_inser_post = $bdd -> prepare("INSERT INTO post(post_titre, post_message, post_forum, post_auteur, post_datecreation, post_estorigine, post_statut) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $req_inser_post -> execute(array($post_titre, $post_message, $_GET['page'], $auteur_id, date('Y-m-d H:i:s'), 1, 1));

        // On incrémente le nombre de messages de l'utilisateur :
        $req_incre = $bdd -> prepare("UPDATE utilisateur SET uti_messages_envoyes = uti_messages_envoyes + 1 WHERE uti_id = ?");
        $req_incre -> execute(array($auteur_id));

      } else {
        $erreur = "Le message ne doit pas dépasser 5000 caractères";
      }
    } else {
      $erreur = "Le titre ne doit pas dépasser 50 caractères";
    }

  }

}

?>

<!-- Modal création de post -->
<div data-show="false" class="modal" id="modalNouveauPost" role="dialog">

  <div class="modal-dialog">
    <form method="POST" class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nouveau sujet</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Titre</label>
          <input name="post_titre" placeholder="Indiquez un titre" required="" value="<?php if(isset($post_titre)){ echo $post_titre; }?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Message</label>
          <textarea style="min-width: 100%; max-width: 100%;" name="post_message" required="" class="form-control" placeholder="5000 caractères maximum"  value="<?php if(isset($post_message)){ echo $post_message; }?>" rows="5" id="comment"></textarea>
        </div>


        <button name='form_nouveau_sujet' type='submit' class='btn btn-primary'>Poster</button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>

    </form>
  </div>

</div>




<div class="container">

  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar" class="navcotes">

      <div class="sidebar-header">
        <h3>Utilisateurs compétants en <?php echo $_GET['page']; ?></h3>
        <h5>Accedez à leurs profils pour leurs envoyer un messsage privé !</h5>
      </div>

      <ul class="list-unstyled components" style='float: right;'>


        <?php

        $nomcomp = $_GET['page'];
        $req2 = $bdd -> prepare('SELECT DISTINCT comp_id FROM competence WHERE comp_nom = ?');
        $req2 -> execute(array($nomcomp));
        $idcomps = $req2->fetchAll();

        foreach ($idcomps as $idcomp) {
          $req = $bdd -> prepare('SELECT * FROM affecter WHERE comp_id = ? ORDER BY niv_competence DESC');
          $req -> execute(array($idcomp['comp_id']));
          $infoscomps = $req->fetchAll();

          foreach ($infoscomps as $infoscomp) {
            $req2 = $bdd->prepare('SELECT  uti_id, uti_nom, uti_prenom, uti_pdp FROM utilisateur WHERE uti_id = ?');
            $req2 -> execute(array($infoscomp['uti_id']));
            $utiinfos = $req2->fetchAll();

            foreach ($utiinfos as $utiinfo) {
              echo "
              <li class='active'>
              <img src=''>
              <a href='profil.php?id=".$utiinfo['uti_id']."'><p>".$utiinfo['uti_nom']." ".$utiinfo['uti_prenom']."</p></a>
              </li>";
            }
          }
        }


        ?>


      </ul>

    </nav>
  </div>

  <div class="row">
    <div class="col-12 col-md-8">
      <h1 id="topic_titre"><?php echo $page; ?></h1>
    </div>

    <div class="col-6 col-md-4">
      <?php if (isset($_SESSION['uti_id'])) { ?>
        <button id="topic_boutton_nouveau" type="button" class="btn btn-primary btn-lg" data-toggle='modal' href="#modalNouveauPost">Nouveau sujet</button>
      <?php } ?>
    </div>
  </div>


  <div class="row">
    <h3 id="topic_description"><?php echo $desc; ?></h3>
  </div>

</br></br>



<?php

$req_post = $bdd -> prepare("SELECT * FROM post WHERE post_forum = ? AND post_estorigine = 1 ORDER BY post_datecreation DESC");
$req_post -> execute(array($pageTemp));
$post_nombretotal = $req_post->rowCount();
$post_infos = $req_post->fetchAll();



// On affiche tout les topics :
foreach ($post_infos as $post_info) {

  $req_uti = $bdd -> prepare("SELECT * FROM utilisateur WHERE uti_id = ?");
  $req_uti -> execute(array($post_info["post_auteur"]));
  $uti_infos = $req_uti->fetch();



  ?>
  <a href="discussion.php?id=<?php echo $post_info['post_id']; ?>">
    <div id="topic_container" class="row">
      <!--Statut du topic-->
      <?php
      if ($post_info["post_statut"] == 2) {
        echo "<div class='topicgreen glyphicon glyphicon-ok' id='topic_etat' class='col'></div>";
      } else {
        echo "<div class='topicred glyphicon glyphicon-remove' id='topic_etat' class='col'></div>";
      }
      ?>

      <!--Informations récentes-->
      <?php $date = strtotime($post_info["post_datecreation"]); ?>
      <div id="topic_recent" class="col">
        <?php echo $uti_infos['uti_prenom']." ".substr($uti_infos['uti_nom'], 0, 1)."."; ?> <?php echo date('H', $date)."h".date('i', $date)."</br>".date('d', $date)."/".date('m', $date); ?>
      </div>

      <!--Titre du message-->
      <div id="topic_resume" class="col">
        <?php echo "<p id='topic_sujet_titre' class='topic_truncate'>".substr($post_info['post_titre'], 0, 40)."</p>"; ?>
        <?php echo "\n<p id='topic_sujet_message' class='topic_truncate'>".substr($post_info['post_message'], 0, 50)."</p>"; ?>
      </div>
    </div>
  </a>


<?php } ?>
</div>

<link rel="stylesheet" type="text/css" href="css/compte.css"/>






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
