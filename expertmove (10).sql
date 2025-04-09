-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 22 mars 2025 à 00:36
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
-- Base de données : `expertmove`
--

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE `chauffeur` (
  `id_chauffeur` int(11) NOT NULL,
  `Nom` varchar(11) NOT NULL,
  `Prenom` varchar(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `passwordd` varchar(8) NOT NULL,
  `licence` varchar(60) NOT NULL,
  `vehicule` varchar(60) NOT NULL,
  `wilaya` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chauffeur`
--

INSERT INTO `chauffeur` (`id_chauffeur`, `Nom`, `Prenom`, `telephone`, `email`, `passwordd`, `licence`, `vehicule`, `wilaya`, `photo`) VALUES
(22, 'rayan', 'belbari', 541768051, 'COSA@GMAIL.COM', 'qzrestry', '2003', 'AUDI', 'blida', ''),
(29, 'Moussaoui', 'Rayan', 11223556, 'rayanms022@gmail.com', '$2y$10$/', '2003', 'audi', 'blida', '');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id_demande` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `objet` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id_demande`, `nom`, `email`, `objet`, `message`) VALUES
(9, 'rayan', 'rayanms022@gmail.com', 'reclamation', 'klnpinqocn');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `Nom` varchar(60) NOT NULL,
  `Prenom` varchar(60) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `passwordd` text NOT NULL,
  `nom_entreprise` varchar(60) NOT NULL,
  `registre` int(60) NOT NULL,
  `wilaya` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `Nom`, `Prenom`, `telephone`, `email`, `passwordd`, `nom_entreprise`, `registre`, `wilaya`, `photo`) VALUES
(13, 'amar', 'fghjk;', 9137598, 'moomoommmo@gamil.com', '$2y$10$vmzgcMNA6sdkzcKR6bXlWu7AFGpFePmtav2jNpZpDB/UD6KkVIyZm', 'ygkjb', 9876, '', ''),
(14, 'bensalem', 'malek', 6539075, 'fares@gamil.com', '$2y$10$BKlAdPFWsKImVx.InAAkEOoe98LHYEvRX38Cu8sAz9hyj7y6JS0wW', 'fares job', 774992, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id_offres` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `chargement_dechargement` tinyint(1) DEFAULT 1,
  `protection_meubles` tinyint(1) DEFAULT 0,
  `emballage_fragile` tinyint(1) DEFAULT 0,
  `emballage_complet` tinyint(1) DEFAULT 0,
  `fourniture_cartons` tinyint(1) DEFAULT 0,
  `montage_meubles_simples` tinyint(1) DEFAULT 0,
  `duree_max` varchar(20) NOT NULL,
  `Contenu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id_offres`, `nom`, `description`, `prix`, `chargement_dechargement`, `protection_meubles`, `emballage_fragile`, `emballage_complet`, `fourniture_cartons`, `montage_meubles_simples`, `duree_max`, `Contenu`) VALUES
(1, 'Economique', 'Déménagez à petit prix, sans stress !', 15.00, 1, 1, 0, 0, 0, 0, '7 jours min', ''),
(2, 'Confort', 'Simplifiez votre déménagement !', 25.00, 1, 1, 1, 0, 1, 1, '48h max', ''),
(3, 'Luxe', 'Le déménagement sans effort !', 45.00, 1, 1, 1, 0, 1, 1, '24h max', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `currentAddress` varchar(255) NOT NULL,
  `newAddress` varchar(255) NOT NULL,
  `tarif` enum('economique','confort','lux') NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `businessMove` tinyint(1) DEFAULT 0,
  `details` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'en attente',
  `wilaya` varchar(255) NOT NULL,
  `status_ch` varchar(255) NOT NULL,
  `confermation` varchar(20) NOT NULL,
  `id_chauffeur` int(11) DEFAULT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `name`, `email`, `phone`, `currentAddress`, `newAddress`, `tarif`, `date`, `time`, `businessMove`, `details`, `message`, `created_at`, `status`, `wilaya`, `status_ch`, `confermation`, `id_chauffeur`, `id_entreprise`, `id_utilisateur`) VALUES
(1, 'Rayan', 'rayanms022@gmail.com', '0541768051', 'city1', 'city2', 'economique', '2025-03-08', '06:31:00', 1, 'azqersetdytfuyguihijokpù', 'qezrtdyfugihi', '2025-03-08 05:39:59', 'validée', '', '', '', NULL, NULL, NULL),
(11, 'Rayan Moussaoui', 'amara@gmail.com', '0541768051', 'city1', 'city2', 'economique', '2025-03-13', '06:13:00', 0, 'tèèèttttttttttttt', 'tttttttttttttttttttt', '2025-03-13 05:39:23', 'validée', '15', '', '', NULL, NULL, NULL),
(12, 'Rayan Moussaoui', 'amara@gmail.com', '0541768051', 'city1', 'city2', 'economique', '2025-03-13', '06:13:00', 0, 'tèèèttttttttttttt', 'tttttttttttttttttttt', '2025-03-13 05:40:00', 'validée', '15', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `passwordd` text NOT NULL,
  `wilaya` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `telephone`, `email`, `passwordd`, `wilaya`, `photo`, `commentaire`) VALUES
(50, 'Moussaoui', 'Rayan', 987654321, 'rayanms022@gmail.com', 'hhjjkk', 'blida', '', ''),
(54, 'Moussaoui', 'ghania ', 1112224455, 'boubrit@gmail.com', 'ghania', 'blida', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD PRIMARY KEY (`id_chauffeur`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id_demande`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id_offres`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `fk_reservation_chauffeur` (`id_chauffeur`),
  ADD KEY `fk_reservation_entreprise` (`id_entreprise`),
  ADD KEY `fk_reservation_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  MODIFY `id_chauffeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id_offres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_chauffeur` FOREIGN KEY (`id_chauffeur`) REFERENCES `chauffeur` (`id_chauffeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservation_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservation_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
