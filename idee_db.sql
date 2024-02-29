-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 28 fév. 2024 à 10:48
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `idee_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `date_creation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`id`, `nom`, `description`, `date_creation`) VALUES
(1, 'Suggestions', 'La catégorie \"Description de suggestions\" pourrait être utilisée pour les idées qui proposent des améliorations, des changements ou des ajouts à des produits, services, processus ou situations existantes.', '2024-02-27 06:57:28'),
(2, 'Recommandations', 'La catégorie \"Description de recommandation\" pourrait être utilisée pour les idées qui visent à proposer des conseils, des suggestions ou des directives pour améliorer des processus, des pratiques ou des situations existantes. ', '2024-02-27 06:57:28'),
(3, 'Propositions', 'La catégorie \"Propositions\" dans une boîte à idées est généralement dédiée aux idées créatives, aux suggestions novatrices ou aux propositions de solutions pour résoudre des problèmes, améliorer des processus ou introduire de nouvelles initiatives.', '2024-02-27 06:57:28'),
(4, 'Projets', 'La catégorie \"Projets\" est un regroupement thématique au sein d\'une plateforme de gestion des idées qui vise à rassembler toutes les propositions d\'initiatives, de développements ou de réalisations à entreprendre au sein d\'une organisation. Cette catégorie est destinée à recueillir des idées concrètes et structurées qui nécessitent une planification, des ressources et une exécution spécifique pour être menées à bien. ', '2024-02-27 07:28:38');

-- --------------------------------------------------------

--
-- Structure de la table `Idees`
--

CREATE TABLE `Idees` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `texte` text NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'en cours',
  `date_creation` datetime DEFAULT current_timestamp(),
  `id_cat` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Idees`
--

INSERT INTO `Idees` (`id`, `libelle`, `texte`, `statut`, `date_creation`, `id_cat`, `id_utilisateur`) VALUES
(2, 'Plateforme de Mentorat Virtuel pour Jeunes Entrepreneurs.', 'Description brève de l\'idée :\r\nCette idée de projet vise à créer une plateforme en ligne où les jeunes entrepreneurs peuvent se connecter avec des mentors expérimentés dans divers domaines d\'activité. La plateforme permettra aux mentors de partager leurs connaissances, leur expérience et leurs conseils avec les jeunes entrepreneurs, les aidant ainsi à naviguer dans les défis et les opportunités du monde des affaires. Les jeunes entrepreneurs pourront rechercher des mentors en fonction de leurs besoins spécifiques, planifier des séances de mentorat virtuelles et accéder à des ressources utiles pour les aider à développer leurs compétences entrepreneuriales. Cette plateforme favorisera l\'apprentissage, l\'échange de bonnes pratiques et le réseautage entre les générations d\'entrepreneurs, contribuant ainsi à renforcer l\'écosystème entrepreneurial et à stimuler l\'innovation.', 'en cours', '2024-02-27 11:41:15', 2, 2),
(4, 'Développement d\'une Application Mobile de Gestion des Déchets', 'Description brève de la suggestion :\r\nCette suggestion propose la création d\'une application mobile dédiée à la gestion des déchets, visant à encourager et faciliter le recyclage et la réduction des déchets. L\'application permettrait aux utilisateurs de localiser les points de collecte les plus proches pour différents types de déchets (plastique, papier, verre, etc.), de suivre leur consommation de ressources et de recevoir des conseils personnalisés pour adopter des habitudes plus durables. Elle inclurait également des fonctionnalités telles que des rappels de collecte, des défis communautaires pour encourager la participation et des informations sur les initiatives locales de recyclage et de compostage. En fournissant un outil pratique et informatif, cette application pourrait contribuer à sensibiliser davantage à la gestion des déchets et à encourager des comportements plus respectueux de l\'environnement au quotidien.', 'en cours', '2024-02-27 11:48:00', 1, 1),
(5, 'Plateforme de Co-Éducation pour Enfants en Situation de Handicap', 'Description brève du projet :\r\nCe projet propose la création d\'une plateforme en ligne dédiée à la co-éducation pour les enfants en situation de handicap. La plateforme offrirait un espace où les enfants handicapés et leurs pairs sans handicap pourraient interagir, apprendre et jouer ensemble. Elle inclurait des jeux éducatifs accessibles à tous, des forums de discussion pour encourager l\'échange d\'expériences et d\'idées, ainsi que des ressources pédagogiques adaptées aux besoins spécifiques des enfants handicapés. L\'objectif principal de cette plateforme est de favoriser l\'inclusion sociale, de sensibiliser à la diversité et de promouvoir une culture de respect et d\'acceptation dès le plus jeune âge. En facilitant les interactions positives entre les enfants handicapés et leurs pairs, ce projet vise à créer un environnement éducatif plus inclusif et égalitaire.', 'en cours', '2024-02-27 11:50:43', 4, 2),
(86, 'test', '', 'en cours', '2024-02-28 10:42:15', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `num` int(9) NOT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'utlisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `nom`, `prenom`, `email`, `mdp`, `num`, `profession`, `adresse`, `role`) VALUES
(1, 'Ndour', 'Mouhammad ', 'ndourmouhammad15@gmail.com', 'passer123', 781033501, 'Informaticien', 'Dakar Plateau', 'admin'),
(2, 'Kane', 'Samba berry', 'sbkane.ext@simplon.co', 'Passer@123', 781452036, 'Référent formateur', 'Rufisque', 'admin'),
(3, 'BA', 'Aissé', 'a.ba@exemple.com', 'passer123', 784125369, 'Commerçante', 'Yoff', 'utlisateur'),
(4, 'Thiombane', 'Omar', 'omar@exemple.com', 'passer123', 785263601, 'Developpeur full stack', 'Ouakam', 'utlisateur'),
(5, 'Dieng', 'Sokhna Astou', 'mbene@exemple.com', 'passer123', 781423698, 'Developpeuse full stack', 'Parcelles assénies', 'utlisateur'),
(6, 'Touré', 'Ndeye Yandé', 'yande@simplon.co', 'passer123', 741542630, 'Ecrivaine', 'Dieupeul', 'utlisateur'),
(7, 'Babou', 'Ndong', 'ndongba@simplon.co', 'passer123', 781236598, 'Développeut', 'Keur mbaye fall', 'utlisateur'),
(8, 'Diop', 'Abdou Aziz', 'diop@exemple.com', 'passer123', 781245869, 'Développeur', 'Bambey', 'utlisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `Idees`
--
ALTER TABLE `Idees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `num` (`num`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Idees`
--
ALTER TABLE `Idees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Idees`
--
ALTER TABLE `Idees`
  ADD CONSTRAINT `Idees_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `Categorie` (`id`),
  ADD CONSTRAINT `Idees_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
