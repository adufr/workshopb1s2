<?php
include('header.php');
// include('bdd.php');

// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['inscription'])) {

	// On vérifie qu'aucun champ ne soit vide (doublecheck du required) :
	if (!empty($_POST['uti_prenom']) AND !empty($_POST['uti_nom']) AND !empty($_POST['uti_sexe']) AND !empty($_POST['uti_sexe'])
	AND !empty($_POST['uti_classe']) AND !empty($_POST['uti_mdp']) AND !empty($_POST['uti_mdp2']) AND !empty($_POST['uti_mail'])
	AND !empty($_POST['uti_campus'])) {

		// On vérifie que les listes ne sont pas vides :
		if ($_POST['uti_classe'] != "null" AND $_POST['uti_campus'] != "null" AND $_POST['uti_sexe']) {

			// On récupère les informations :
			$uti_prenom = htmlspecialchars($_POST['uti_prenom']);
			$uti_nom = htmlspecialchars($_POST['uti_nom']);
			$uti_sexe = htmlspecialchars($_POST['uti_sexe']);
			$uti_classe = htmlspecialchars($_POST['uti_classe']);
			$uti_campus = htmlspecialchars($_POST['uti_campus']);
			$uti_mdp = $_POST['mdp'];
			$uti_mdp2 = $_POST['mdp2'];
			$uti_mail = $_POST['uti_mail'];

			$uti_mdp_crypte = sha1(md5($uti_mdp));

			// On vérifie que les champs ne dépasse pas la taille acceptée par la BDD :
			if (strlen($uti_prenom) > 25) {
				if (strlen($uti_nom) > 25) {
					if (strlen($uti_sexe) > 25) {
						if (strlen($uti_classe) > 25) {
							if (strlen($uti_mdp) > 25) {
								if (strlen($uti_mail) > 50) {
									if (strlen($uti_campus) > 25) {

										// On vérifie que les deux mdp sont identiques :
										if ($mdp == $mdp2) {
											// On vérifie que l'email est bien valide :
											if (filter_var($uti_mail, FILTER_VALIDATE_EMAIL)) {

												// On vérifie que l'adresse mail n'est pas déjà enregistré dans la bdd :
												$req_mail = $bdd -> prepare("SELECT * FROM utilisateurs WHERE uti_mail = ?");
			                  $req_mail -> execute(array($uti_mail));
			                  $mail_existe = $req_mail -> rowCount();
			                  if ($mail_existe == 0) {

													// Tout est bon : on insert l'utilisateur dans la bdd :
													$req_inser = $bdd -> prepare("INSERT INTO utilisateurs(uti_nom, uti_prenom, uti_mail, uti_sexe, uti_classe, uti_campus, uti_mdp) VALUES(?, ?, ?, ?, ?, ?, ?)");
			                    $insertuser -> execute(array($uti_nom, $uti_prenom, $uti_mail, $uti_sexe, $uti_classe, $uti_campus, $uti_mdp_crypte));
			                    $erreur = "Votre compte a bien été créé !";

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


<form method="POST">
	<input type="text" name="uti_prenom" placeholder="Prénom" required="" value="<?php if(isset($uti_prenom)){ echo $uti_prenom; }?>" /> </br>
	<input type="text" name="uti_nom" placeholder="Nom de famille" required="" value="<?php if(isset($uti_nom)){ echo $uti_nom; }?>" /> </br>
	<input type="email" name="uti_mail" placeholder="Email" required="" value="<?php if(isset($uti_email)){ echo $uti_email; }?>"/> </br>
	<input type="password" name="uti_mdp" placeholder="Mot de passe" required=""/> </br>
	<input type="password" name="uti_mdp" placeholder="Mot de passe" required=""/> </br>
	<select name="uti_classe">
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
	</select> </br>
	<select name="uti_sexe">
		<option value="null" <?php if (isset($uti_sexe) && $uti_sexe == "null"){echo "selected";} ?>>--Sélectionnez votre sexe--
		<option value="Homme" <?php if (isset($uti_sexe) && $uti_sexe == "Homme"){echo "selected";} ?>>Femme
		<option value="Femme" <?php if (isset($uti_sexe) && $uti_sexe == "Femme"){echo "selected";} ?>>Homme
		<option value="Autre" <?php if (isset($uti_sexe) && $uti_sexe == "Autre"){echo "selected";} ?>>Autre
	</select> </br>
	<select name="uti_campus">
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
	</select> </br>

	<input type="submit" name="inscription" value="S'inscrire"/> <br/><br/>
</form>

<?php
if (isset($erreur)) {
	echo '<font color="red">'.$erreur.'</font>';
}
?>


</div>





<?php
include('footer.php');
?>