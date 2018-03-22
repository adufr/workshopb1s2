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
                    <td><span class='label label-warning'>Prénom</span></td>
                    <td>".$prenom_info['uti_prenom']." ".$prenom_info['uti_nom']."</td>
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
            <td><span class='label label-info'>Nom</span></td>
            <td>".$nom_info['uti_prenom']." ".$nom_info['uti_nom']."</td>
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
                    <td>".$titre_info['post_titre']."</td>
                    <td><a href='discussion.php?id=".$titre_info['post_id']."'>Accéder</a></td>
                  </tr>";
          }
        } ?>

        </tbody>
      </table>
    </div>

    <?php
  }

}


include('footer.php');

?>