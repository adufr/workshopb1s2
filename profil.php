<?php
include('header.php');

echo "<link rel='stylesheet' type='text/css' href='css/profil.css'/>";


// Vérification URL :
if (isset($_GET['id'])) {

  $req_uti = $bdd -> prepare("SELECT * FROM utilisateur WHERE uti_id = ?");
  $req_uti -> execute(array($_GET['id']));
  $uti_existe = $req_uti -> rowCount();
  $uti_infos = $req_uti -> fetch();
  if ($uti_existe == "1") {

    ?>

    <div id="profil" class="container">
      <div class="row">

        <div >
          <img id="profil_pdp" src="<?php echo $uti_infos['uti_pdp']; ?>" alt="Photo de profil" class="img-rounded img-responsive" />
        </div>

        <div>
          <h1><?php echo $uti_infos['uti_prenom']." ".$uti_infos['uti_nom']; ?></h1></br>
          <!--<small><cite>San Francisco, USA <i class="glyphicon glyphicon-map-marker"></i></cite></small>-->
          <p id='profil_texte'>
            <i class="glyphicon glyphicon-envelope profilicon"></i><?php echo $uti_infos['uti_mail']; ?>
          </br>
          <i class="glyphicon glyphicon-home profilicon"></i><?php echo "Campus de ".$uti_infos['uti_campus']; ?>
        </br>
        <i class="glyphicon glyphicon-user profilicon"></i><?php echo "Actuellement en ".$uti_infos['uti_classe']; ?>
      </br>
      <i class="glyphicon glyphicon-list profilicon"></i>
      <?php
      if (isset($uti_infos['uti_messages_envoyes'])) {
        echo "A posté ".$uti_infos['uti_messages_envoyes']." messages</br></br>";
      } else {
        echo "Erreur</br></br>";
      }
      ?>
      <?php

      $iduti = $uti_infos['uti_id'];
      $req2 = $bdd -> prepare('SELECT * FROM affecter WHERE uti_id = ?');
      $req2 -> execute(array($iduti));
      $infoscomps = $req2->fetchAll();

      foreach ($infoscomps as $infoscomp) {

        $req3 = $bdd -> prepare('SELECT DISTINCT comp_nom FROM competence WHERE comp_id = ?');
        $req3 -> execute(array($infoscomp['comp_id']));
        $idcomps = $req3->fetchAll();

        foreach ($idcomps as $idcomp) {
          if ($infoscomp['niv_competence'] > 0) {
            $niveauComp = $infoscomp['niv_competence'];
            echo "</br><i class='glyphicon glyphicon-list-alt profilicon'></i>".strtoupper($idcomp['comp_nom'])." : ".$niveauComp."/5";
          }

        }
      }
      ?>

    </p>

    <div class="btn-group">
      <a href="message.php?id_uti=<?php echo $uti_infos['uti_id']; ?>"><button type="button" class="btn btn-primary btn-large">Envoyer un message privé</button></a>
    </br>
  </br>
</div>

</div>

</div>
</div>
<?php
} else {
  echo "Cet utilisateur n'a pas été trouvé";
}
} else {

  echo "Veuillez spécifier un utilisateur";

}
include('footer.php');
?>
