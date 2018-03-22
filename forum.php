<html class="no-js">
<?php
include('header.php');
?>
<?php
function recupererDernierPost($forum, $bdd2) {

  $requete = $bdd2 -> prepare('SELECT * FROM post WHERE post_id = (SELECT MAX(post_id) FROM post WHERE post_forum = ?)');
  $requete -> execute(array($forum));
  $resultat = $requete -> fetch();

  $req = $bdd2 -> prepare('SELECT * FROM utilisateur WHERE uti_id = ?');
  $req -> execute(array($resultat['post_auteur']));
  $resultatUti = $req -> fetch();
  $date = strtotime($resultat['post_datecreation']);
  if (isset($resultatUti['uti_prenom'])) {
    echo "<p>Dernier message par ".$resultatUti['uti_prenom']." ".substr($resultatUti['uti_nom'], 0, 1).".</br>
    ".date('d', $date)."/".date('m', $date)."/".date('y', $date)." à ".date('H', $date)."h".date('i', $date)."
    </p>";
  } else {
    echo "<p>Aucun message</p>";
  }
} ?>

<link rel="stylesheet" type="text/php" href="topic.php"/>
<link rel="stylesheet" type="text/css" href="css/forum.css"/>

<main id="fh5co-main" role="main">
	<div class="container pb-lg">
		<div class="row">

			<!-- 1e catégorie de forums, les langages de prog -->
			<div class="col-md-12 titre">
				<div class="h2-text">
					<p><br/><br/></p>
					<h2 >Langages de programmations</h2>
					<p><br/><br/></p>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=htmlcss" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/html_css.png" alt="html_css.png">
						</div>
						<h2>HTML & CSS</h2>
						<?php recupererDernierPost("htmlcss", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=php" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/php.png" alt="php.png">
						</div>
						<h2>PHP</h2>
						<?php recupererDernierPost("php", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=js" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/javascript.png" alt="js.png">
						</div>
						<h2>Javascript</h2>
					<?php recupererDernierPost("js", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=bdd" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/bdd.png" alt="bdd.png">
						</div>
						<h2>Base de données</h2>
						<?php recupererDernierPost("bdd", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=c" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/c-c++.png" alt="c-c++.png">
						</div>
						<h2>C & C++</h2>
						<?php recupererDernierPost("c", $bdd); ?>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=csharp" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/c-sharp.png" alt="c-sharp.png">
						</div>
						<h2>C#</h2>
						<?php recupererDernierPost("csharp", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=python" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/python.png" alt="python.png">
						</div>
						<h2>Python</h2>
						 <?php recupererDernierPost("python", $bdd); ?>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=batch" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/batch.png" alt="batch.png">
						</div>
						<h2>Batch</h2>
						<?php recupererDernierPost("batch", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=perl" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/perl.png" alt="perl.png">
						</div>
						<h2>Perl</h2>
						<?php recupererDernierPost("perl", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=ruby" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/ruby.png" alt="ruby.png">
						</div>
						<h2>Ruby</h2>
						<?php recupererDernierPost("ruby", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=vbnet" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/visualBasic.png" alt="vb.png">
						</div>
						<h2>VisualBasic & .NET</h2>
							<?php recupererDernierPost("vbnet", $bdd); ?>
					</a>
				</div>
			</div>


			<!-- 2e catégorie : les frameworks -->
			<div class="col-md-12 titre">
				<div class="h2-text">
					<p><br/><br/></p>
					<p><br/><br/></p>
					<h2>Frameworks</h2>
					<p><br/><br/></p>
				</div>
			</div>

			<div class="col-md-4 col-lg-4 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=phpframework" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/php-framework.png" alt="php-fw.png">
						</div>
						<h2>Frameworks PHP</h2>
					<?php recupererDernierPost("phpframework", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-4 col-lg-4 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=jsframework" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/jsfw.png" alt="jsfw.png">
						</div>
						<h2>Frameworks Javascript</h2>
					<?php recupererDernierPost("jsframework", $bdd); ?>
					</a>
				</div>
			</div>


			<!-- 3e catégorie : Systèmes d'exploitation & mobile-->
			<div class="col-md-12 titre">
				<div class="h2-text">
					<p><br/><br/></p>
					<p><br/><br/></p>
					<h2 >Systèmes d'exploitation & mobile</h2>
					<p><br/><br/></p>
				</div>
			</div>

			<div class="col-md-4 col-lg-4 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=linux" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/linux.png" alt="linux.png">
						</div>
						<h2>Linux</h2>
						<?php recupererDernierPost("linux", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-4 col-lg-4 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=windows" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/windows.png" alt="windows.png">
						</div>
						<h2>Windows</h2>
						<?php recupererDernierPost("windows", $bdd); ?>
				</div>
			</div>

			<div class="col-md-4 col-lg-4 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=mobile" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/Swift.png" alt="appmobile.png">
						</div>
						<h2>Developpement mobile</h2>
						<?php recupererDernierPost("mobile", $bdd); ?>
					</a>
				</div>
			</div>

<p><br/><br/></p>

			<!-- 4e catégorie : les cours généraux -->
			<div class="col-md-12 titre">
				<div class="h2-text">
					<p><br/><br/></p>
					<p><br/><br/></p>
					<h2 >Matières générales</h2>
					<p><br/><br/></p>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=anglais" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/anglais.png" alt="anglais.png">
						</div>
						<h2>Anglais</h2>
						<?php recupererDernierPost("anglais", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=francais" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/francais.png" alt="fr.png">
						</div>
						<h2>Français</h2>
						<?php recupererDernierPost("francais", $bdd); ?>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=maths" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/maths.png" alt="mayhs.png">
						</div>
						<h2>Mathématiques</h2>
							<?php recupererDernierPost("maths", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=algo" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/algo.png" alt="algo.png">
						</div>
						<h2>Algorithmie</h2>
						<?php recupererDernierPost("algo", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=reseaux" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/reseau.png" alt="reseau.png">
						</div>
						<h2>Réseaux</h2>
							<?php recupererDernierPost("reseaux", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=management" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/management.png" alt="management.png">
						</div>
						<h2>Management</h2>
						<?php recupererDernierPost("management", $bdd); ?>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6">
				<div class="fh5co-main-service">
					<a href="topic.php?page=economie" class="fh5co-block-links text-center">
						<div class="icon-circle">
							<img class="logos" src="images/logos/economie.png" alt="economie.png">
						</div>
						<h2>Economie</h2>
						<?php recupererDernierPost("economie", $bdd); ?>
					</a>
				</div>
			</div>




		</div>
	</div>
</main>

<?php
include('footer.php');
?>
