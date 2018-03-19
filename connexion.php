<?php
include('header.php');
// include('bdd.php');

// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['connexion'])) {

	// On vérifie qu'aucun champ ne soit vide (doublecheck du required) :
	if (!empty($_POST['uti_mail']) AND !empty($_POST['uti_mdp'])) {

		$uti_mail = $_POST['uti_mail'];
		$uti_mdp = $_POST['mdp'];
		$uti_mdp_crypte = sha1(md5($uti_mdp));

		// On vérifie que le couple email / mot de passe existe dans la bdd :
		$req_uti = $bdd -> prepare("SELECT * FROM utilisateurs WHERE uti_mail = ? AND uti_mdp = ?");
		$req_uti -> execute(array($uti_mail, $uti_mdp_crypte));
		$uti_existe = $req_uti -> rowCount();
		if ($uti_existe == 1) {

			// Tout est bon on initialise les variables de session :
			$uti_infos = $req_uti -> fetch();
			$_SESSION['uti_id'] = $uti_infos['uti_id'];
			$_SESSION['uti_mail'] = $utiuinfos['uti_mail'];
			$_SESSION['uti_prenom'] = $uti_infos['uti_prenom'];
			$_SESSION['uti_nom'] = $uti_infos['uti_nom'];
			$_SESSION['uti_estadmin'] = $uti_infos['uti_estadmin'];
			$_SESSION['uti_classe'] = $uti_infos['uti_classe'];
			$_SESSION['uti_sexe'] = $uti_infos['uti_sexe'];
			$_SESSION['uti_campus'] = $uti_infos['uti_campus'];
			$_SESSION['uti_messages_envoyes'] = $uti_infos['uti_messages_envoyes'];
			$_SESSION['uti_derniere_connexion'] = $uti_infos['uti_derniere_connexion'];

			// Redirection page d'accueil
			header("Location: index.php");

		} else {
			$erreur = "Ces identifiants sont incorrects";
		}

	} else {
		$erreur = "Vous devez remplir tout les champs";
	}
}
?>


<form method="POST">
	<input type="email" name="uti_mail" placeholder="Email" required="" value="<?php if(isset($uti_email)){ echo $uti_email; }?>"/> </br>
	<input type="password" name="uti_mdp" placeholder="Mot de passe" required=""/> </br>
	<input type="submit" name="connexion" value="Se connecter"/> <br/><br/>
</form>


<?php
if (isset($erreur)) {
	echo '<font color="red">'.$erreur.'</font>';
}
?>


<?php
include('footer.php');
?>