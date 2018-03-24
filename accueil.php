<html class="no-js">
<link rel="stylesheet" href="css/accueil.css" />

<?php include('header.php'); ?>

<div id="wrapper_fade" style="animation: fade 2s linear;">

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
			<p>Partage de compétences</p>
		</header>
		<footer>
			<a href="#banner" class="button style2 js-scrollTo">Qu'est-ce que My HELPSI ?</a>
		</footer>
	</section>

	<!-- Banner -->
	<section id="banner" class='js-scrollTo'>
		<header>
			<h2>Bienvenue sur My HELPSI</h2>
			</br>
		</header>
		<p>My HELPSI est une plateforme permettant à ses</br>
			 utilisateurs (étudiants, alternants, stagiaires ou intervenants), de partager leur savoir autour de</br>
			l'informatique et bien d'autres compétences. Le but de ce site est de faciliter les échanges</br>
			entre utilisateurs, autant au niveau local au sein d'un campus qu'au niveau national.</br></br>
		</p>
		<footer>
			<a href="#bannerdeux" class="button style2 js-scrollTo">Comment ?</a>
		</footer>
	</section>

	<section id="bannerdeux" class='js-scrollTo'>
		<header>
			<h2>Le forum</h2></br>
		</header>
		<p>My HELPSI met à votre disposition un large forum, comprenant</br>
			plusieurs sous-forums, chacun étant dédié à une compétence en particulier.</br>
			De la programmation au cours de droit en passant par l'anglais et le management,</br>
			si vous cherchez de l'aide, vous êtes au bon endroit ! De plus, vous pourrez trouver des</br>
			tutoriaux rédigés par des étudiants membres, qui vous permettront de découvrir de nouvelles</br>
			technologies !</br></br></br>
		</p>
		<footer>
			<a href="forum.php" class="button style2 js-scrollTo">Ne plus attendre</a>
		</footer>
	</section>


	<?php include('footer.php'); ?>

</div>
