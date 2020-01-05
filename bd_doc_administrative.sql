-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 05 jan. 2020 à 17:57
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_doc_administrative`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `privilege` varchar(45) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `fk_idetat_civil_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `login`, `password`, `privilege`, `prenom`, `nom`, `age`, `adresse`, `email`, `telephone`, `fk_idetat_civil_admin`) VALUES
(1, 'diatta@estim.sn', 'fc3707fa908df1e82e30ecbdae3d094804a8f87d', '1', 'Mr', 'Diatta', '49', 'Dakar', 'diatta@estim.sn', '22178123456789', 2),
(2, 'moustapha@estim.sn', 'fc3707fa908df1e82e30ecbdae3d094804a8f87d', '2', 'Moustapha', 'MANGANE', '20', 'mous', 'moustapha@estim.sn', '772291683', 1),
(4, 'babou@estim.sn', 'c34971ead9691468486e9e90676bca5f72282aa1', '1', 'El hadj Babou', 'Sane', '20', 'pikine', 'babousane@gmail.com', '781234578', 2),
(5, 'moustapha@estim.sn', 'cadac49fcc6e9d4ada0c05df8fd06759f3fe4eb8', '1', 'Moustapha', 'MANGANE', '20', 'Dakar', 'moustaphamangane@hotmail.com', '781234578', 2),
(6, 'moha@estim.sn', 'c2f6acd7eec4227d5c4308af68697692d9363049', '1', 'Mohamed Saidou', 'KONTE', '20', 'Keur Massar', 'mohakonte2011@hotmail.com', '781234578', 2);

-- --------------------------------------------------------

--
-- Structure de la table `category_demande`
--

CREATE TABLE `category_demande` (
  `idcategory_demande` int(11) NOT NULL,
  `libelle_category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category_demande`
--

INSERT INTO `category_demande` (`idcategory_demande`, `libelle_category`) VALUES
(1, 'a_traiter'),
(2, 'en_cours'),
(3, 'terminer');

-- --------------------------------------------------------

--
-- Structure de la table `confirmation_paiement`
--

CREATE TABLE `confirmation_paiement` (
  `idconfirmation_paiement` int(11) NOT NULL,
  `numero_telephone` varchar(45) DEFAULT NULL,
  `code_confirmation` varchar(45) DEFAULT NULL,
  `valide` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `confirmation_paiement`
--

INSERT INTO `confirmation_paiement` (`idconfirmation_paiement`, `numero_telephone`, `code_confirmation`, `valide`) VALUES
(1, '782567965', '123456', 'TRUE'),
(2, '782032450', '123456', 'TRUE'),
(3, '781234578', '456789', 'TRUE'),
(4, '784561237', '4561237', 'TRUE'),
(5, '781234578', '1234578', 'TRUE');

-- --------------------------------------------------------

--
-- Structure de la table `date_demande`
--

CREATE TABLE `date_demande` (
  `iddate_demande` int(11) NOT NULL,
  `date_complet` date DEFAULT NULL,
  `jour` varchar(45) DEFAULT NULL,
  `mois` varchar(45) DEFAULT NULL,
  `annee` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `date_demande`
--

INSERT INTO `date_demande` (`iddate_demande`, `date_complet`, `jour`, `mois`, `annee`) VALUES
(1, '2019-11-19', 'mardi', 'Novembre', '2019'),
(2, '2019-12-07', 'samedi', 'Decembre', '2019'),
(3, '2019-12-22', 'dimanche', 'Decembre', '2019'),
(4, '2019-12-27', 'vendredi', 'Decembre', '2019'),
(5, '2020-01-05', 'dimanche', 'Janvier', '2020');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `iddemande` int(11) NOT NULL,
  `nombre_copie` int(11) NOT NULL,
  `fk_idpaiement` int(11) NOT NULL,
  `fk_iddate` int(11) NOT NULL,
  `fk_idcategory_demande` int(11) NOT NULL,
  `fk_iddemandeur` int(11) NOT NULL,
  `fk_iddocument` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`iddemande`, `nombre_copie`, `fk_idpaiement`, `fk_iddate`, `fk_idcategory_demande`, `fk_iddemandeur`, `fk_iddocument`) VALUES
(1, 7, 1, 1, 1, 1, 1),
(2, 5, 2, 2, 1, 2, 2),
(3, 7, 3, 3, 1, 3, 1),
(4, 5, 5, 4, 3, 4, 3),
(5, 2, 7, 5, 3, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `demandeur`
--

CREATE TABLE `demandeur` (
  `iddemandeur` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandeur`
--

INSERT INTO `demandeur` (`iddemandeur`, `prenom`, `nom`, `age`, `telephone`, `adresse`, `email`) VALUES
(1, 'Mohamed Saidou', 'konte', 23, '782567965', 'Dakar', 'mohakonte2011@hotmail.com'),
(2, 'el hadji babou', 'sane', 24, '782032450', 'Dakar', 'babousane@gmail.com'),
(3, 'Mohamed Saidou', 'Konte', 57, '781234578', 'Dakar', 'moha@gmail.com'),
(4, 'Ibrahima', 'Faye', 26, '784561237', 'parcelle', 'ibra@hotmail.com'),
(5, 'Idrissa', 'Seck', 21, '781234578', 'Castor', 'idi@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `iddocument` int(11) NOT NULL,
  `numero_registre` varchar(45) NOT NULL,
  `annee_enregistrement` varchar(45) NOT NULL,
  `fk_idtype_document` int(11) NOT NULL,
  `fk_idetat_civil_document` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`iddocument`, `numero_registre`, `annee_enregistrement`, `fk_idtype_document`, `fk_idetat_civil_document`) VALUES
(1, '2312', '1996', 1, 1),
(2, '4556', '1996', 2, 1),
(3, '7889', '2007', 2, 2),
(4, '4556', '2005', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etat_civil`
--

CREATE TABLE `etat_civil` (
  `idetat_civil` int(11) NOT NULL,
  `libelle_etat_civil` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etat_civil`
--

INSERT INTO `etat_civil` (`idetat_civil`, `libelle_etat_civil`) VALUES
(1, 'dakar'),
(2, 'pikine'),
(3, 'guediawaye');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `idpaiement` int(11) NOT NULL,
  `fk_idreference` int(11) NOT NULL,
  `fk_idconfirmation_paiement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`idpaiement`, `fk_idreference`, `fk_idconfirmation_paiement`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 4),
(6, 1, 5),
(7, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `reference`
--

CREATE TABLE `reference` (
  `idreference` int(11) NOT NULL,
  `libelle_reference` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reference`
--

INSERT INTO `reference` (`idreference`, `libelle_reference`) VALUES
(1, 'Orange Monney');

-- --------------------------------------------------------

--
-- Structure de la table `type_document`
--

CREATE TABLE `type_document` (
  `idtype_document` int(11) NOT NULL,
  `libelle_type_document` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_document`
--

INSERT INTO `type_document` (`idtype_document`, `libelle_type_document`) VALUES
(1, 'extrait naissance'),
(2, 'certificat mariage'),
(3, 'certificat deces');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`,`fk_idetat_civil_admin`),
  ADD KEY `fk_admin_etat_civil1_idx` (`fk_idetat_civil_admin`);

--
-- Index pour la table `category_demande`
--
ALTER TABLE `category_demande`
  ADD PRIMARY KEY (`idcategory_demande`);

--
-- Index pour la table `confirmation_paiement`
--
ALTER TABLE `confirmation_paiement`
  ADD PRIMARY KEY (`idconfirmation_paiement`);

--
-- Index pour la table `date_demande`
--
ALTER TABLE `date_demande`
  ADD PRIMARY KEY (`iddate_demande`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`iddemande`,`fk_idpaiement`,`fk_iddate`,`fk_idcategory_demande`,`fk_iddemandeur`,`fk_iddocument`),
  ADD KEY `fk_demande_paiement1_idx` (`fk_idpaiement`),
  ADD KEY `fk_demande_date1_idx` (`fk_iddate`),
  ADD KEY `fk_demande_category_demande1_idx` (`fk_idcategory_demande`),
  ADD KEY `fk_demande_personne1_idx` (`fk_iddemandeur`),
  ADD KEY `fk_demande_document1_idx` (`fk_iddocument`);

--
-- Index pour la table `demandeur`
--
ALTER TABLE `demandeur`
  ADD PRIMARY KEY (`iddemandeur`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`iddocument`,`fk_idtype_document`,`fk_idetat_civil_document`),
  ADD KEY `fk_document_type_document1_idx` (`fk_idtype_document`),
  ADD KEY `fk_document_etat_civil1_idx` (`fk_idetat_civil_document`);

--
-- Index pour la table `etat_civil`
--
ALTER TABLE `etat_civil`
  ADD PRIMARY KEY (`idetat_civil`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`idpaiement`,`fk_idreference`,`fk_idconfirmation_paiement`),
  ADD KEY `fk_paiement_type_paiement1_idx` (`fk_idreference`),
  ADD KEY `fk_paiement_confirmation_paiement1_idx` (`fk_idconfirmation_paiement`);

--
-- Index pour la table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`idreference`);

--
-- Index pour la table `type_document`
--
ALTER TABLE `type_document`
  ADD PRIMARY KEY (`idtype_document`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `category_demande`
--
ALTER TABLE `category_demande`
  MODIFY `idcategory_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `confirmation_paiement`
--
ALTER TABLE `confirmation_paiement`
  MODIFY `idconfirmation_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `date_demande`
--
ALTER TABLE `date_demande`
  MODIFY `iddate_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `iddemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `iddemandeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `iddocument` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etat_civil`
--
ALTER TABLE `etat_civil`
  MODIFY `idetat_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `idpaiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reference`
--
ALTER TABLE `reference`
  MODIFY `idreference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type_document`
--
ALTER TABLE `type_document`
  MODIFY `idtype_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_etat_civil1` FOREIGN KEY (`fk_idetat_civil_admin`) REFERENCES `etat_civil` (`idetat_civil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `fk_demande_category_demande1` FOREIGN KEY (`fk_idcategory_demande`) REFERENCES `category_demande` (`idcategory_demande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_demande_date1` FOREIGN KEY (`fk_iddate`) REFERENCES `date_demande` (`iddate_demande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_demande_document1` FOREIGN KEY (`fk_iddocument`) REFERENCES `document` (`iddocument`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_demande_paiement1` FOREIGN KEY (`fk_idpaiement`) REFERENCES `paiement` (`idpaiement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_demande_personne1` FOREIGN KEY (`fk_iddemandeur`) REFERENCES `demandeur` (`iddemandeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `fk_document_etat_civil1` FOREIGN KEY (`fk_idetat_civil_document`) REFERENCES `etat_civil` (`idetat_civil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_document_type_document1` FOREIGN KEY (`fk_idtype_document`) REFERENCES `type_document` (`idtype_document`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `fk_paiement_confirmation_paiement1` FOREIGN KEY (`fk_idconfirmation_paiement`) REFERENCES `confirmation_paiement` (`idconfirmation_paiement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paiement_type_paiement1` FOREIGN KEY (`fk_idreference`) REFERENCES `reference` (`idreference`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
