-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 17 déc. 2021 à 05:43
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `casalindinfo`
--

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_users`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_users` (
`id` int(11)
,`first_name` varchar(255)
,`last_name` varchar(255)
,`email` varchar(255)
,`idrole` int(11)
,`sexe` varchar(10)
,`image` varchar(300)
,`passwords` varchar(255)
,`created_at` datetime
,`nom` varchar(300)
);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idrole`, `nom`, `created_at`) VALUES
(1, 'admin', '2021-11-30 14:02:47'),
(2, 'utilisateur', '2021-11-30 14:03:53');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwords` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(300) DEFAULT NULL,
  `idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `sexe`, `email`, `passwords`, `created_at`, `image`, `idrole`) VALUES
(1, 'sumaili shabani ', 'roger', 'M', 'sumailiroger681@cryptnail.com', '123456', '2021-11-25 13:34:24', '69840880-2021-12-14.jpg', 1),
(3, 'grace', 'kilumbu', 'M', 'grace@cryptnail.com', '123456', '2021-11-25 13:35:36', 'avatar.png', 2),
(5, 'jenny', 'kayembe', 'F', 'jenny@cryptnail.com', '123456', '2021-11-25 13:36:39', 'avatar.png', 2),
(6, 'jenny', 'delice', 'F', 'delice@cryptnail.com', '123456', '2021-11-25 13:45:54', 'avatar.png', 2),
(7, 'yuma kayanda', 'franÃ§ois', 'M', 'yuma@gmail.com', NULL, '2021-12-14 15:12:28', 'avatar.png', 2),
(9, 'mikah kalume', 'kitoko', 'M', 'mikah@gmail.com', NULL, '2021-12-14 15:24:08', 'avatar.png', 2),
(10, 'madeleine stephanie', 'bertin', 'F', 'madeleine@gmail.com', NULL, '2021-12-14 15:52:22', '98595278-2021-12-14.jpg', 2),
(20, 'grace kilumbu', 'kilumbu vauce', NULL, 'kilumbu2@gmail.com', NULL, '2021-12-16 15:36:56', '1809136947-2021-12-16.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la vue `profile_users`
--
DROP TABLE IF EXISTS `profile_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_users`  AS  select `users`.`id` AS `id`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`email` AS `email`,`users`.`idrole` AS `idrole`,`users`.`sexe` AS `sexe`,`users`.`image` AS `image`,`users`.`passwords` AS `passwords`,`users`.`created_at` AS `created_at`,`role`.`nom` AS `nom` from (`users` join `role` on((`users`.`idrole` = `role`.`idrole`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_role` (`idrole`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `ref_role` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
