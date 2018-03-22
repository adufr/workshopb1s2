-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 22 mars 2018 à 23:29
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `workshopb1s2`
--

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

CREATE TABLE `affecter` (
  `niv_competence` int(11) DEFAULT '0',
  `comp_id` int(11) NOT NULL,
  `uti_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `affecter`
--

INSERT INTO `affecter` (`niv_competence`, `comp_id`, `uti_id`) VALUES
(0, 1, 1),
(0, 2, 1),
(1, 2, 3),
(0, 2, 4),
(0, 3, 1),
(2, 3, 3),
(0, 3, 4),
(0, 4, 1),
(1, 4, 3),
(5, 4, 4),
(0, 5, 1),
(1, 5, 3),
(5, 5, 4),
(0, 6, 1),
(1, 6, 3),
(5, 6, 4),
(0, 8, 1),
(1, 8, 3),
(5, 8, 4),
(0, 9, 1),
(1, 9, 3),
(5, 9, 4),
(0, 11, 1),
(1, 11, 3),
(5, 11, 4),
(0, 12, 1),
(1, 12, 3),
(5, 12, 4),
(5, 13, 1),
(1, 13, 3),
(4, 13, 4),
(0, 15, 1),
(1, 15, 3),
(5, 15, 4),
(0, 16, 1),
(1, 16, 3),
(5, 16, 4),
(0, 17, 1),
(1, 17, 3),
(5, 17, 4),
(0, 18, 1),
(1, 18, 3),
(5, 18, 4),
(0, 19, 1),
(1, 19, 3),
(5, 19, 4),
(0, 20, 1),
(1, 20, 3),
(5, 20, 4),
(0, 21, 1),
(1, 21, 3),
(5, 21, 4),
(0, 22, 1),
(1, 22, 3),
(5, 22, 4),
(0, 23, 1),
(1, 23, 3),
(5, 23, 4),
(0, 24, 1),
(1, 24, 3),
(5, 24, 4),
(0, 25, 1),
(1, 25, 3),
(5, 25, 4),
(0, 28, 1),
(1, 28, 3),
(5, 28, 4),
(0, 29, 1),
(1, 29, 3),
(5, 29, 4);

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `comp_id` int(11) NOT NULL,
  `comp_nom` varchar(25) DEFAULT NULL,
  `comp_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`comp_id`, `comp_nom`, `comp_image`) VALUES
(1, 'ajax', 'images/logos/ajax.png'),
(2, 'algorithmie', 'images/logos/algo.png'),
(3, 'anglais', 'images/logos/anglais.png'),
(4, 'developpement mobile', 'images/logos/appmobile.png'),
(5, 'batch', 'images/logos/batch.png'),
(6, 'bdd', 'images/logos/bdd.png'),
(7, 'bootstrap', 'images/logos/bootstrap.png'),
(8, 'c & c++', 'images/logos/c-c++.png'),
(9, 'c#', 'images/logos/c-sharp.png'),
(10, 'droit', 'images/logos/droit.png'),
(11, 'economie', 'images/logos/economie.png'),
(12, 'francais', 'images/francais.png'),
(13, 'html & css', 'images/logos/html_css.png'),
(14, 'java', 'images/logos/java.png'),
(15, 'javascript', 'images/logos/javascript.png'),
(16, 'linux', 'images/logos/linux.png'),
(17, 'management', 'images/logos/management.png'),
(18, 'mathématiques', 'images/logos/maths.png'),
(19, 'perl', 'images/logos/perl.png'),
(20, 'php', 'images/logos/php.png'),
(21, 'frameworks php', 'images/logos/php-framework.png'),
(22, 'python', 'images/logos/python.png'),
(23, 'frameworks js', 'images/logos/jsfw.png'),
(24, 'reseau', 'images/logos/reseau.png'),
(25, 'ruby', 'images/logos/ruby.png'),
(26, 'swift', 'images/logos/swift.png'),
(27, 'symfony', 'images/logos/symfony.png'),
(28, 'visualBasic', 'images/logos/visualBasic.png'),
(29, 'windows', 'images/logos/windows.png'),
(30, 'wordpress', 'images/logos/wordpress.png');

-- --------------------------------------------------------

--
-- Structure de la table `messages2`
--

CREATE TABLE `messages2` (
  `id_message` int(11) NOT NULL,
  `uti_id_emmeteur` int(25) NOT NULL,
  `uti_id_destinataire` int(25) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `date_heure_message` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages2`
--

INSERT INTO `messages2` (`id_message`, `uti_id_emmeteur`, `uti_id_destinataire`, `message`, `date_heure_message`) VALUES
(1, 6, 1, 'TEST 1', '2018-03-21 04:00:00'),
(2, 7, 1, 'TEST 2', '2018-03-21 01:00:00'),
(3, 7, 6, 'TEST 3', '2018-03-21 03:00:00'),
(4, 3, 1, 'TEST 4', '2018-03-22 00:00:00'),
(28, 6, 7, 'blabla', '2018-03-21 16:48:19'),
(29, 6, 7, 'iuheg', '2018-03-21 16:50:55'),
(30, 6, 7, '', '2018-03-21 16:58:20'),
(31, 6, 7, '', '2018-03-21 16:58:23'),
(32, 6, 7, 'yrgierg', '2018-03-21 17:13:37'),
(33, 6, 7, 'yrgierg', '2018-03-21 17:13:43'),
(34, 6, 7, 'yrgierg', '2018-03-21 17:17:26'),
(35, 6, 7, 'yrgierg', '2018-03-21 17:18:15'),
(36, 6, 7, 'gfilzrg', '2018-03-21 17:18:24'),
(37, 6, 7, 'blabla', '2018-03-21 17:18:38'),
(38, 6, 7, 'test2', '2018-03-21 17:18:49'),
(39, 6, 7, 'lsqbglkuerh', '2018-03-21 17:19:06'),
(40, 6, 7, 'kgkfgzealg', '2018-03-21 17:21:43'),
(41, 7, 6, 'test mess 7 6', '2018-03-21 17:21:50'),
(42, 6, 1, 'SALUT', '2018-03-21 19:25:00'),
(43, 6, 7, 'cc', '2018-03-21 19:43:01'),
(44, 6, 7, '', '2018-03-21 19:43:04'),
(45, 6, 7, '', '2018-03-21 20:00:17'),
(46, 6, 7, 'gÃ©gÃ©', '2018-03-21 22:11:19'),
(47, 6, 7, 'gÃ©gÃ©', '2018-03-21 22:11:23'),
(48, 6, 7, 'gÃ©gÃ©', '2018-03-21 22:13:56'),
(49, 6, 7, 'gÃ©gÃ©', '2018-03-21 22:14:13'),
(50, 6, 1, 'TEST MESSAGE !', '2018-03-21 22:15:00'),
(51, 1, 6, 'SALUT ALEXANDRE LE BG', '2018-03-21 22:17:00'),
(52, 6, 1, 'kgdfla', '2018-03-21 23:11:33'),
(53, 6, 3, 'blabla', '2018-03-22 15:20:58'),
(54, 6, 3, 'xdfcfgvhjb', '2018-03-22 15:34:17'),
(55, 3, 1, 'test1', '2018-03-22 17:05:51'),
(56, 3, 3, 'Test', '2018-03-22 17:09:31'),
(57, 3, 1, 'Ceci est un message', '2018-03-22 17:09:47'),
(58, 9, 1, 'Test', '2018-03-22 18:04:39'),
(59, 1, 9, 'azeaze', '2018-03-22 18:05:20'),
(60, 10, 6, 'Test', '2018-03-22 18:43:06'),
(61, 10, 1, 'Coucou message de test', '2018-03-22 18:43:26'),
(62, 10, 1, 'Encore un message de test', '2018-03-22 18:43:46'),
(63, 10, 6, 'zezerzer', '2018-03-22 18:45:50'),
(64, 4, 1, 'aze', '2018-03-22 22:13:18');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `post_id` int(8) NOT NULL,
  `post_forum` varchar(50) NOT NULL,
  `post_estreponsea` int(8) DEFAULT NULL,
  `post_titre` varchar(100) DEFAULT NULL,
  `post_message` varchar(5000) NOT NULL,
  `post_auteur` int(8) NOT NULL,
  `post_datecreation` datetime NOT NULL,
  `post_estorigine` int(1) NOT NULL,
  `post_statut` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`post_id`, `post_forum`, `post_estreponsea`, `post_titre`, `post_message`, `post_auteur`, `post_datecreation`, `post_estorigine`, `post_statut`) VALUES
(1, 'htmlcss', NULL, 'TitreTest', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.2', 1, '2018-03-21 21:00:00', 1, 1),
(2, 'htmlcss', NULL, 'Exemple du bug azea aze aazea', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2018-03-21 00:00:00', 1, 2),
(3, 'htmlcss', NULL, 'Test', 'Test', 1, '2018-03-22 00:34:54', 1, 1),
(4, 'php', NULL, 'aze', 'aze', 1, '2018-03-22 00:57:13', 1, 1),
(5, 'htmlcss', 1, NULL, 'Test', 1, '2018-03-22 11:36:37', 0, 1),
(6, 'htmlcss', 1, NULL, 'Test de réponse\r\n', 1, '2018-03-22 11:39:13', 0, 1),
(7, 'htmlcss', 1, NULL, 'Encore un test de réponse', 1, '2018-03-22 11:41:07', 0, 1),
(8, 'htmlcss', 1, NULL, 'Une réponse de plus', 1, '2018-03-22 11:41:54', 0, 1),
(9, 'htmlcss', 1, NULL, 'azeazeazeaze', 1, '2018-03-22 11:43:28', 0, 1),
(10, 'htmlcss', 2, NULL, 'Test de réponse', 1, '2018-03-22 11:44:19', 0, 1),
(11, 'js', NULL, 'Sujet de test Javascript', 'Ceci ets un message contentnat du texte pour faire un test', 1, '2018-03-22 11:46:26', 1, 1),
(12, 'js', 11, NULL, 'Ceci est une réponse de test', 1, '2018-03-22 11:47:02', 0, 1),
(13, 'php', NULL, 'Nouveau sujet de test', 'Message de test ARHJNUKQERTYB JQLUIERT UQEOLRYioqze rhIOUERHG iuzergkuqyzegrukqyegr kquyzerv', 1, '2018-03-22 11:49:25', 1, 1),
(14, 'php', 13, NULL, 'azeaeaze', 1, '2018-03-22 11:50:02', 0, 1),
(15, 'htmlcss', NULL, '123', '1234', 1, '2018-03-22 11:50:56', 1, 1),
(16, 'htmlcss', 15, NULL, 'aze', 1, '2018-03-22 16:29:56', 0, 1),
(17, 'js', NULL, 'Javascript tuto nodejs', 'Message de test pour les pdp', 9, '2018-03-22 16:34:31', 1, 1),
(18, 'htmlcss', NULL, 'Test incrémentation', 'Message de test\r\n', 1, '2018-03-22 18:24:51', 1, 1),
(19, 'htmlcss', NULL, 'Nouveau test incrémentation', 'Ceci est un test d\'incrémentation', 1, '2018-03-22 18:26:46', 1, 1),
(20, 'htmlcss', NULL, 'Encore un test d\'incrémentation', 'Encore un test', 1, '2018-03-22 18:27:53', 1, 1),
(21, 'php', NULL, 'Test23123', 'TEzraezazeAeeza', 10, '2018-03-22 18:28:45', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `uti_id` int(11) NOT NULL,
  `uti_nom` varchar(25) DEFAULT NULL,
  `uti_prenom` varchar(25) DEFAULT NULL,
  `uti_pdp` varchar(100) NOT NULL,
  `uti_classe` varchar(25) DEFAULT NULL,
  `uti_mail` varchar(50) DEFAULT NULL,
  `uti_sexe` varchar(25) DEFAULT NULL,
  `uti_mdp` varchar(25) DEFAULT NULL,
  `uti_campus` varchar(25) DEFAULT NULL,
  `uti_messages_envoyes` int(11) DEFAULT '0',
  `uti_derniere_connexion` date DEFAULT NULL,
  `uti_estadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`uti_id`, `uti_nom`, `uti_prenom`, `uti_pdp`, `uti_classe`, `uti_mail`, `uti_sexe`, `uti_mdp`, `uti_campus`, `uti_messages_envoyes`, `uti_derniere_connexion`, `uti_estadmin`) VALUES
(1, 'Dufour', 'Arthur', 'images/pdp.png', 'B1', 'arthur.dufour@epsi.fr', 'Homme', 'mdp', 'Lyon', 1, NULL, 0),
(3, 'test', 'test', 'images/pdp.png', 'WIS3', 'test@test.fr', 'Femme', 'test', 'Lille', 0, NULL, 0),
(4, 'test2', 'test2', 'images/pdp.png', 'B3', 'test2@test.fr', 'Femme', 'test2', 'Arras', 0, NULL, 0),
(5, 'test3', 'test3', 'images/pdp.png', 'I4', 'test3@test.fr', 'Homme', 'test', 'Nantes', 0, NULL, 0),
(6, 'Tuet', 'Alexandre', 'images/pdp.png', 'I4', 'alexandre.tuet2@epsi.fr', 'Autre', 'mdp', 'Lille', 0, NULL, 0),
(7, 'Montignac', 'Ariana', 'images/pdp.png', 'I4', 'ariana.montignac@epsi.fr', 'Autre', 'mdp', 'Bordeaux', 0, NULL, 0),
(8, 'iyge', 'test18', 'images/pdp.png', 'I4', 'hdlqs@mlhgq.fr', 'Autre', 'mdp', 'Brest', 0, NULL, 0),
(9, 'EncoreUnTest', 'EncoreUnTest', 'images/pdp.png', 'B1', 'EncoreUnTest@EncoreUnTest.fr', 'Homme', 'mdp', 'Lyon', 0, NULL, 0),
(10, 'Incrémentation', 'Test', 'images/pdp.png', 'B1', 'test2123@test.fr', 'Femme', 'mdp', 'Bordeaux', 1, NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD PRIMARY KEY (`comp_id`,`uti_id`),
  ADD KEY `FK_affecter_uti_id` (`uti_id`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`comp_id`);

--
-- Index pour la table `messages2`
--
ALTER TABLE `messages2`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`uti_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `messages2`
--
ALTER TABLE `messages2`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `uti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD CONSTRAINT `FK_affecter_comp_id` FOREIGN KEY (`comp_id`) REFERENCES `competence` (`comp_id`),
  ADD CONSTRAINT `FK_affecter_uti_id` FOREIGN KEY (`uti_id`) REFERENCES `utilisateur` (`uti_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
