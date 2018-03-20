<html class="no-js">

<?php
include('header.php');
?>

<link rel="stylesheet" href="css/index.css" />

<script type="text/javascript">
$(document).ready(function() {
	$('.js-scrollTo').on('click', function() { // Au clic sur l'un des éléments
	var target = $(this).attr('href'); // Ancre cible
	var scrollingTime = 1000; // Durée de l'animation (en ms)
	$('html, body').animate( { scrollTop: $(target).offset().top }, scrollingTime ); // Déplacement
	return false;
});
});
</script>



<!-- Header -->
<section id="header">
	<header>
		<h1>My HELPSI</h1>
		<p>By nous</p>
	</header>
	<footer>
		<a href="#banner" class="button style2 js-scrollTo">Le but de ce site</a>
	</footer>
</section>

<!-- Banner -->
<section id="banner" class='js-scrollTo'>
	<header>
		<h2>Bienvenue sur My HELPSI</h2>
		</br>
	</header>
	<p>	Vous pouvez rechercher des forums,
		discuter avec d'autres utilisateurs qui pourront vous aider sur des sujets,</br>
		connaître leur disponibilité au sein de notre école ou en ligne,</br>
		prendre connaissance de vos problèmes et essayer d'y résoudre.</br>
	</p>
	<footer>
		<a href="#bannerdeux" class="button style2 js-scrollTo">Dis m'en plus</a>
	</footer>
</section>

<section id="bannerdeux" class='js-scrollTo'>
	<header>
		<h2>Les forums</h2></br>
	</header>
	<p>Vous pouvez créer de nouveaux sujets dans chaques forums, </br>
		chaque forum étant dédié à une compétence en particulier.</br>
		Plus vous utiliserez ces forums plus pour pourrez vous entre-aider !</br>
		De plus les problèmes résolus seront visibles par tous pour que vous puissiez accéder à ce dont vous avez besoin le plus vite possible. </br> </br>
	</p>
	<footer>
		<a href="forum.php" class="button style2 js-scrollTo">Accéder aux forums</a>
	</footer>
</section>



<?php
include('footer.php');
?>
