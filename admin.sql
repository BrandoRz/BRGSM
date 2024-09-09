-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 11:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `envoye_service`
--

CREATE TABLE `envoye_service` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `produit` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `dateService` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `envoye_service`
--

INSERT INTO `envoye_service` (`id`, `nom`, `produit`, `nombre`, `dateService`) VALUES
(1, 'DAF', 1, 3, '0000-00-00'),
(2, 'DAF', 2, 2, '0000-00-00'),
(3, 'DAF', 1, 2, '2024-09-09'),
(4, 'DAF', 1, 2, '2024-09-09'),
(5, 'DAF', 1, 2, '2024-09-09'),
(6, 'DAF', 1, 2, '2024-09-09'),
(7, 'DAF', 2, 2, '2024-09-09'),
(8, '', 1, 0, '2024-09-09'),
(9, '', 2, 0, '2024-09-09'),
(10, '', 3, 5, '2024-09-09'),
(11, '', 4, 10, '2024-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom`, `adresse`, `contact`) VALUES
(1, 'IDev', 'Tana 101', '0342487719');

-- --------------------------------------------------------

--
-- Table structure for table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `serviceName` varchar(250) DEFAULT NULL,
  `produit` int(11) NOT NULL,
  `nombreS` int(11) NOT NULL,
  `dateH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historique`
--

INSERT INTO `historique` (`id`, `action`, `serviceName`, `produit`, `nombreS`, `dateH`) VALUES
(1, 'ENVOIE PRODUIT', NULL, 1, 0, '2024-09-09'),
(2, 'ENVOIE PRODUIT', NULL, 2, 0, '2024-09-09'),
(3, 'ENVOIE PRODUIT', NULL, 3, 5, '2024-09-09'),
(4, 'ENVOIE PRODUIT', NULL, 4, 10, '2024-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `idPerso` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `login` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) DEFAULT NULL,
  `status` varchar(250) NOT NULL,
  `dernierCo` bigint(20) NOT NULL,
  `inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`idPerso`, `image`, `login`, `mdp`, `nom`, `prenom`, `status`, `dernierCo`, `inscription`) VALUES
(1, NULL, 'RicMan', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Ratovonirina', 'Eric', 'OK', 1725864038, '2021-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `idP` int(11) NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `nomP` varchar(250) NOT NULL,
  `nombreP` int(11) NOT NULL,
  `dateProduit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idP`, `fournisseur`, `nomP`, `nombreP`, `dateProduit`) VALUES
(1, 1, 'Phone', 18, '2024-09-09'),
(2, 1, 'Cable', 18, '2024-09-09'),
(3, 1, 'TV 32pouces', 0, '2024-09-09'),
(4, 1, 'Commande', 40, '2024-09-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `envoye_service`
--
ALTER TABLE `envoye_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit` (`produit`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`idPerso`),
  ADD KEY `idPerso` (`idPerso`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `fournisseur` (`fournisseur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `envoye_service`
--
ALTER TABLE `envoye_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `idPerso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
