<?php
  include('header.php');
?>

<link rel="stylesheet" type="text/css" href="css/discussion.css"/>


<?php
  // Informations sur le post :
  $req_post = $bdd -> prepare("SELECT * FROM post WHERE post_id = ?");
  $req_post -> execute(array($_GET['id']));
  $post_infos = $req_post->fetch();
  $postforumorigine = $post_infos['post_forum'];
  $postidorigine = $post_infos['post_id'];

  // Informations sur l'auteur :
  $req_auteur = $bdd -> prepare("SELECT * FROM utilisateur WHERE uti_id = ?");
  $req_auteur -> execute(array($post_infos['post_auteur']));
  $auteur_infos = $req_auteur->fetch();
?>


<div class="container">

  <div class="row">
    <div class="col-12 col-md-8">
      <h1 id="discussion_titre"><?php echo $post_infos['post_titre']; ?></h1>
    </div>

    <div class="col-6 col-md-4">
      <?php if (isset($_SESSION['uti_id'])) { ?>
        <button id="discussion_boutton_repondre" type="button" class="btn btn-primary btn-lg" data-toggle='modal' href="#modalNouvelleReponse">Répondre</button>
      <?php } ?>
    </div>
  </div>

  <div class="row">
    <?php $date = strtotime($post_infos['post_datecreation']);?>
    <h4 id="discussion_description"><?php echo "Créé par ".$auteur_infos['uti_prenom']." ".$auteur_infos['uti_nom'].", le ".date('d', $date)."/".date('m', $date)."/".date('y', $date)." à ".date('H', $date)."h".date('i', $date); ?></h4>
  </div>

  </br></br>




  <!--Affichage du post d'origine -->
  <div class="row">


    <div id="discussion_container" class="row">

      <p id="discussion_message_message" class="discussion_truncate">
        <!--Statut du topic-->
        <div id="discussion_message_auteur" class="col">
          <img id="discussion_message_auteur_pdp" src='images/profil.png' />
          <?php echo $auteur_infos['uti_prenom']." ".$auteur_infos['uti_nom']; ?>
          <?php echo "</br><span id='discussion_message_date'>Le ".date('d', $date)."/".date('m', $date)."/".date('y', $date)." à ".date('H', $date)."h".date('i', $date)."</span>"; ?>
        </div>
      <p> <?php echo $post_infos['post_message']; ?></p>
      </p>
    </div>

  </div>





  <?php

  // On récupère les réponses
  $req_rep = $bdd -> prepare("SELECT * FROM post WHERE post_estreponsea = ? AND post_forum = ?");
  $req_rep -> execute(array($post_infos["post_id"], $postforumorigine));
  $rep_infos = $req_rep->fetchAll();

  // On affiche toute les réponses :
  foreach ($rep_infos as $rep_info) {

    // Informations sur l'auteur :
    $req_auteur = $bdd -> prepare("SELECT * FROM utilisateur WHERE uti_id = ?");
    $req_auteur -> execute(array($rep_info['post_auteur']));
    $auteur_infos = $req_auteur->fetch();
    ?>

    <!--Affichage du post d'origine -->
    <div class="row">
      <div id="discussion_container" class="row">

        <p id="discussion_message_message" class="discussion_truncate">
          <!--Statut du topic-->
          <div id="discussion_message_auteur" class="col">
            <img id="discussion_message_auteur_pdp" src='images/profil.png' />
            <?php echo $auteur_infos['uti_prenom']." ".$auteur_infos['uti_nom']; ?>
            <?php echo "</br><span id='discussion_message_date'>Le ".date('d', $date)."/".date('m', $date)."/".date('y', $date)." à ".date('H', $date)."h".date('i', $date)."</span>"; ?>
          </div>
        <p> <?php echo $rep_info['post_message']; ?></p>
        </p>
      </div>

    </div>

  <?php }


  // On vérifie que le formulaire ai été envoyé :
  if (isset($_POST['form_nouvelle_reponse'])) {

    // On vérifie qu'aucun champ ne soit vide (doublecheck du required) :
    if (!empty($_POST['post_message'])) {

      // On récupère les informations :

      $post_message = $_POST['post_message'];
      $auteur_id = $_SESSION['uti_id'];

      // On vérifie que les champs ne dépasse pas la taille acceptée par la BDD :

      if (strlen($post_message) < 5000) {

        $postorigine = $_GET['id'];

        // Tout est bon : on insert le message dans la bdd :
        $req_inser_post = $bdd -> prepare("INSERT INTO post(post_message, post_forum, post_auteur, post_datecreation, post_estorigine, post_statut, post_estreponsea) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $req_inser_post -> execute(array($post_message, $postforumorigine, $auteur_id, date('Y-m-d H:i:s'), 0, 1, $postorigine));

        sleep(0.2);
        echo "<meta http-equiv='refresh' content='0'>";

      } else {
        $erreur = "Le message ne doit pas dépasser 5000 caractères";
      }

    }

  }
  ?>
  <!-- Modal réponse -->
  <div data-show="false" class="modal" id="modalNouvelleReponse" role="dialog">

    <div class="modal-dialog">
      <form method="POST" class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Répondre</h4>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label for="exampleInputPassword1">Message</label>
            <textarea style="min-width: 100%; max-width: 100%;" name="post_message" required="" class="form-control" placeholder="5000 caractères maximum"  value="<?php if(isset($post_message)){ echo $post_message; }?>" rows="5" id="comment"></textarea>
          </div>


          <button name='form_nouvelle_reponse' type='submit' class='btn btn-primary'>Poster</button>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        </div>

      </form>
    </div>

  </div>



</div>



<?php include('footer.php'); ?>