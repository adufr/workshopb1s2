<html class="no-js">
<?php
include('bdd.php');
include('header.php');



// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['form_inscription'])) {

	// On vérifie qu'aucun champ ne soit vide (doublecheck du required) :
	if (!empty($_POST['uti_prenom']) AND !empty($_POST['uti_nom']) AND !empty($_POST['uti_sexe'])
	AND !empty($_POST['uti_classe']) AND !empty($_POST['uti_mdp']) AND !empty($_POST['uti_mdp2']) AND !empty($_POST['uti_mail'])
	AND !empty($_POST['uti_campus'])) {

		// On récupère les informations :
		$uti_prenom = htmlspecialchars($_POST['uti_prenom']);
		$uti_nom = htmlspecialchars($_POST['uti_nom']);
		$uti_sexe = htmlspecialchars($_POST['uti_sexe']);
		$uti_classe = htmlspecialchars($_POST['uti_classe']);
		$uti_campus = htmlspecialchars($_POST['uti_campus']);
		$uti_mdp = $_POST['uti_mdp'];
		$uti_mdp2 = $_POST['uti_mdp2'];
		$uti_mail = $_POST['uti_mail'];

		// On vérifie que les listes ne sont pas vides :
		if ($_POST['uti_classe'] != "null" AND $_POST['uti_campus'] != "null" AND $_POST['uti_sexe'] != "null") {

			// On vérifie que les champs ne dépasse pas la taille acceptée par la BDD :
			if (strlen($uti_prenom) < 25) {
				if (strlen($uti_nom) < 25) {
					if (strlen($uti_sexe) < 25) {
						if (strlen($uti_classe) < 25) {
							if (strlen($uti_mdp) < 25) {
								if (strlen($uti_mail) < 50) {
									if (strlen($uti_campus) < 25) {

										// On vérifie que les deux mdp sont identiques :
										if ($uti_mdp == $uti_mdp2) {
											// On vérifie que l'email est bien valide :
											if (filter_var($uti_mail, FILTER_VALIDATE_EMAIL)) {

												// On vérifie que l'adresse mail n'est pas déjà enregistré dans la bdd :
												$req_mail = $bdd -> prepare("SELECT * FROM UTILISATEUR WHERE uti_mail = ?");
			                  $req_mail -> execute(array($uti_mail));
			                  $mail_existe = $req_mail -> rowCount();
			                  if ($mail_existe == 0) {

													// Tout est bon : on insert l'utilisateur dans la bdd :
													$req_inser = $bdd -> prepare("INSERT INTO UTILISATEUR(uti_nom, uti_prenom, uti_mail, uti_sexe, uti_classe, uti_campus, uti_mdp) VALUES(?, ?, ?, ?, ?, ?, ?)");
			                    $req_inser -> execute(array($uti_nom, $uti_prenom, $uti_mail, $uti_sexe, $uti_classe, $uti_campus, $uti_mdp));
			                    $erreur = '';

													// On attend 0.5 secondes :
													sleep(0.5);


													// On vérifie que le couple email / mot de passe existe dans la bdd :
													$req_uti = $bdd -> prepare("SELECT * FROM UTILISATEUR WHERE uti_mail = ? AND uti_mdp = ?");
													$req_uti -> execute(array($uti_mail, $uti_mdp));
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

														sleep(0.5);
														header('Location: index.php');

													} else {
														$erreur = "Un problème est survenu";
													}

												} else {
													$erreur = "Cette adresse mail est déjà utilisée";
												}

											} else {
												$erreur = "Votre adresse mail n'est pas valide";
											}
										} else {
											$erreur = "Les mots de passe rentrés ne correspondent pas";
										}

									} else {
										$erreur = "Le nom du campus ne doit pas être changé";
									}
								} else {
									$erreur = "Votre email ne doit pas dépasser 50 caractères";
								}
							} else {
								$erreur = "Votre mot de passe ne doit pas dépasser 25 caractères";
							}
						} else {
							$erreur = "La classe ne doit pas être changée";
						}
					} else {
						$erreur = "Le sexe ne doit pas être changé";
					}
				} else {
					$erreur = "Votre nom ne doit pas dépasser 25 caractères";
				}
			} else {
				$erreur = "Votre prénom ne doit pas dépasser 25 caractères";
			}
		}
	}

}

?>


<div class="container pb-lg">
	<div class="row">
		<div align="center" class="form-group col-md-12"><h1>Créez votre compte</h1></div>

		</br></br></br></br></br>	</br>

		<div class="col-md-1 col-xs-2 col-sm-2"></div>

		<div class="col-md-10 col-xs-8 col-sm-8">
			<form method="POST">
  		<div class="form-row">
    		<div class="form-group col-md-6">
      		<label for="inputEmail4">Nom</label>
      		<input type="text" name="uti_nom" required="" class="form-control" id="inputEmail4" placeholder="Dubois" value="<?php if(isset($uti_nom)){ echo $uti_nom; }?>">
    		</div>

    		<div class="form-group col-md-6">
      		<label for="inputPassword4">Prénom</label>
					<input type="text" name="uti_prenom" required="" class="form-control" id="inputPassword4" placeholder="Alain" value="<?php if(isset($uti_prenom)){ echo $uti_prenom; }?>">
    		</div>
  		</div>

  		<div class="form-group col-md-12">
    		<label for="inputAddress">Adresse Mail</label>
    		<input type="email" name="uti_mail" required="" class="form-control" id="inputAddress" placeholder="alain.dubois@epsi.fr" value="<?php if(isset($uti_mail)){ echo $uti_mail; }?>">
  		</div>

			<div class="form-group col-md-6">
				<label for="inputEmail4">Mot de Passe</label>
				<input type="password" name="uti_mdp" required="" class="form-control" id="inputEmail4">
			</div>

			<div class="form-group col-md-6">
				<label for="inputPassword4">Confirmation du mot de passe</label>
				<input type="password" name="uti_mdp2" required="" class="form-control" id="inputPassword4">
			</div>

		  <div class="form-row">
				<div class="form-group col-md-4">
		      <label for="inputState">Statut</label>
		      <select name="uti_classe" id="inputState" class="form-control">
						<option value="null" <?php if (isset($uti_classe) && $uti_classe == "null"){echo "selected";} ?>>--Sélectionnez votre statut--
						<option value="B1" <?php if (isset($uti_classe) && $uti_classe == "B1"){echo "selected";} ?>>B1
						<option value="B2" <?php if (isset($uti_classe) && $uti_classe == "B2"){echo "selected";} ?>>B2
						<option value="B3" <?php if (isset($uti_classe) && $uti_classe == "B3"){echo "selected";} ?>>B3
						<option value="I4" <?php if (isset($uti_classe) && $uti_classe == "I4"){echo "selected";} ?>>I4
						<option value="I5" <?php if (isset($uti_classe) && $uti_classe == "I5"){echo "selected";} ?>>I5
						<option value="WIS1" <?php if (isset($uti_classe) && $uti_classe == "WIS1"){echo "selected";} ?>>WIS1
						<option value="WIS2" <?php if (isset($uti_classe) && $uti_classe == "WIS2"){echo "selected";} ?>>WIS2
						<option value="WIS3" <?php if (isset($uti_classe) && $uti_classe == "WIS3"){echo "selected";} ?>>WIS3
						<option value="Enseignant" <?php if (isset($uti_classe) && $uti_classe == "Enseignant"){echo "selected";} ?>>Enseignant
		      </select>
    		</div>

    		<div class="form-group col-md-4">
		      <label for="inputState">Sexe</label>
		      <select name="uti_sexe" id="inputState" class="form-control">
						<option value="null" <?php if (isset($uti_sexe) && $uti_sexe == "null"){echo "selected";} ?>>--Sélectionnez votre sexe--
						<option value="Homme" <?php if (isset($uti_sexe) && $uti_sexe == "Homme"){echo "selected";} ?>>Homme
						<option value="Femme" <?php if (isset($uti_sexe) && $uti_sexe == "Femme"){echo "selected";} ?>>Femme
						<option value="Autre" <?php if (isset($uti_sexe) && $uti_sexe == "Autre"){echo "selected";} ?>>Autre
		      </select>
		    </div>

				<div class="form-group col-md-4">
		      <label for="inputState">Campus</label>
		      <select name="uti_campus" id="inputState" class="form-control">
						<option value="null" <?php if (isset($uti_campus) && $uti_campus == "null"){echo "selected";} ?>>--Sélectionnez votre campus--
						<option value="Lyon" <?php if (isset($uti_campus) && $uti_campus == "Lyon"){echo "selected";} ?>>Lyon
						<option value="Paris" <?php if (isset($uti_campus) && $uti_campus == "Paris"){echo "selected";} ?>>Paris
						<option value="Lille" <?php if (isset($uti_campus) && $uti_campus == "Lille"){echo "selected";} ?>>Lille
						<option value="Arras" <?php if (isset($uti_campus) && $uti_campus == "Arras"){echo "selected";} ?>>Arras
						<option value="Bordeaux" <?php if (isset($uti_campus) && $uti_campus == "Bordeaux"){echo "selected";} ?>>Bordeaux
						<option value="Brest" <?php if (isset($uti_campus) && $uti_campus == "Brest"){echo "selected";} ?>>Brest
						<option value="Grenoble" <?php if (isset($uti_campus) && $uti_campus == "Grenoble"){echo "selected";} ?>>Grenoble
						<option value="Nantes" <?php if (isset($uti_campus) && $uti_campus == "Nantes"){echo "selected";} ?>>Nantes
						<option value="Montpellier" <?php if (isset($uti_campus) && $uti_campus == "Montpellier"){echo "selected";} ?>>Montpellier
		      </select>
    		</div>

				</br></br></br></br></br></br>

				<div class="form-group col-md-4">
					<button type="submit" name="form_inscription" class="btn btn-primary modal-trigger">S'inscrire</button>
				</div>
  		</div>
		</form>
	</div>

	<div class="col-md-1 col-xs-2 col-sm-2"></div>

</div>
</div>

</br></br></br></br>



<?php
if (isset($erreur)) {
	echo "<font color='red'>".$erreur."</font>";
}
?>



<?php
include('footer.php');
?>
