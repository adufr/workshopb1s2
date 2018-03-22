<?php
include('header.php');


// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['form_recherche'])) {

  // On vérifie qu'aucun champ ne soit vide (doublecheck du required) :
  if (!empty($_POST['recherche'])) { ?>

    <div class="container">
      <h2>Résultat de votre recherche</h2>
      <p>Résultats trouvés parmis les prénoms et noms d'utilisateurs, ainsi que les titres des sujets...</br></br></br></p>
      <table class="table">
        <thead>
          <tr>
            <th>Type</th>
            <th>Information complète</th>
            <th>Accéder</th>
          </tr>
        </thead>
        <tbody>

        <?php
        // On regarde dans la table utilisateur si quelqu'un a ce prénom :
        $req_prenom = $bdd -> prepare("SELECT * FROM utilisateur WHERE uti_prenom LIKE ?");
        $req_prenom -> execute(array('%'.$_POST['recherche'].'%'));
        $prenom_nombre = $req_prenom -> rowCount();
        if ($prenom_nombre > 0) {

          $prenom_infos = $req_prenom -> fetchAll();

          foreach($prenom_infos as $prenom_info) {
            echo "<tr class='success'>
                    <td><span class='label label-danger'>Utilisateur</span></td>
                    <td><b><u>Nom :</u></b> ".$prenom_info['uti_prenom']." ".$prenom_info['uti_nom']."</td>
                    <td><a href=profil.php?id=".$prenom_info['uti_id'].">Son profil</a></td>
                  </tr>";
          }
        }

        // On regarde dans la table utilisateur si quelqu'un a ce nom :
        $req_nom = $bdd -> prepare("SELECT * FROM utilisateur WHERE uti_nom LIKE ?");
        $req_nom -> execute(array('%'.$_POST['recherche'].'%'));
        $nom_nombre = $req_nom -> rowCount();
        if ($nom_nombre > 0) {

          $nom_infos = $req_nom -> fetchAll();

          foreach($nom_infos as $nom_info) {
            echo "<tr class='success'>
            <td><span class='label label-danger'>Utilisateur</span></td>
            <td><b><u>Nom :</u></b> ".$nom_info['uti_prenom']." ".$nom_info['uti_nom']."</td>
            <td><a href=profil.php?id=".$prenom_info['uti_id'].">Son profil</a></td>
            </tr>";
          }

        }


        // On regarde dans la table post si un sujet à ce titre:
        $req_titre = $bdd -> prepare("SELECT * FROM post WHERE post_estorigine = 1 AND post_titre LIKE ?");
        $req_titre -> execute(array('%'.$_POST['recherche'].'%'));
        $titre_nombre = $req_titre -> rowCount();
        if ($titre_nombre > 0) {

          $titre_infos = $req_titre -> fetchAll();

          foreach($titre_infos as $titre_info) {
            echo "<tr class='success'>
                    <td><span class='label label-primary'>Sujet</span></td>
                    <td><b><u>Titre :</u></b> ".$titre_info['post_titre']."</td>
                    <td><a href='discussion.php?id=".$titre_info['post_id']."'>Accéder</a></td>
                  </tr>";
          }
        }


        // On regarde dans la table des compétences :
        $nomcomp = '%'.$_POST['recherche'].'%';
        $req2 = $bdd -> prepare('SELECT DISTINCT comp_id FROM competence WHERE comp_nom LIKE ?');
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
              $req3 = $bdd -> prepare('SELECT DISTINCT comp_nom FROM competence WHERE comp_id = ?');
              $req3 -> execute(array($idcomp['comp_id']));
              $idcompss = $req3->fetchAll();

              foreach ($idcompss as $idcomp2) {
                if ($infoscomp['niv_competence'] > 0) {
                  echo "<tr class='success'>
                          <td><span class='label label-danger'>Utilisateur</span></td>
                          <td><b><u>Nom :</u></b> ".$utiinfo['uti_prenom']." ".$utiinfo['uti_nom']." <b><u>".strtoupper($idcomp2['comp_nom'])." :</u></b> "."".$infoscomp['niv_competence']."/5"."</td>
                          <td><a href=profil.php?id=".$utiinfo['uti_id'].">Son profil</a></td>
                        </tr>";
                }
            }
          }
        }
}

        ?>

        </tbody>
      </table>
    </div>

    <?php
  }

}


include('footer.php');

?>