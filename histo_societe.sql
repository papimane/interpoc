-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 16 sep. 2019 à 15:53
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `histo_societe`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `type_voie` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_voie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adresse_societe`
--

CREATE TABLE `adresse_societe` (
  `adresse_id` int(11) NOT NULL,
  `societe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forme_juridique`
--

CREATE TABLE `forme_juridique` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `forme_juridique`
--

INSERT INTO `forme_juridique` (`id`, `libelle`) VALUES
(1, 'Entrepreneur individuel'),
(2, 'Groupement de droit prive non dote de la personnalite morale'),
(3, 'Indivision'),
(4, 'Indivision entre personnes physiques'),
(5, 'Indivision avec personne morale'),
(6, 'Societe creee de fait'),
(7, 'Societe creee de fait entre personnes physiques'),
(8, 'Societe creee de fait avec personne morale'),
(9, 'Societe en participation'),
(10, 'Societe en participation entre personnes physiques'),
(11, 'Societe en participation avec personne morale'),
(12, 'Societe en participation de professions liberales'),
(13, 'Fiducie'),
(14, 'Paroisse hors zone concordataire'),
(15, 'Autre groupement de droit prive non dote de la personnalite morale'),
(16, 'Personne morale de droit etranger'),
(17, 'Personne morale de droit etranger, immatriculee au RCS (registre du commerce et des societes)'),
(18, 'Representation ou agence commerciale d\'etat ou organisme public etranger immatricule au RCS'),
(19, 'Societe commerciale etrangere immatriculee au RCS'),
(20, 'Personne morale de droit etranger, non immatriculee au RCS'),
(21, 'Organisation internationale'),
(22, 'Etat, collectivite ou etablissement public etranger'),
(23, 'Societe etrangere non immatriculee au RCS'),
(24, 'Autre personne morale de droit etranger'),
(25, 'Personne morale de droit public soumise au droit commercial'),
(26, 'Etablissement public ou regie a caractere industriel ou commercial'),
(27, 'Etablissement public national a caractere industriel ou commercial dote d\'un comptable public'),
(28, 'Etablissement public national a caractere industriel ou commercial non dote d\'un comptable public'),
(29, 'Exploitant public'),
(30, 'Etablissement public local a caractere industriel ou commercial'),
(31, 'Regie d\'une collectivite locale a caractere industriel ou commercial'),
(32, 'Institution Banque de France'),
(33, 'Societe commerciale'),
(34, 'Societe cooperative commerciale particuliere'),
(35, 'Societe de caution mutuelle'),
(36, 'Societe cooperative de banque populaire'),
(37, 'Caisse de credit maritime mutuel'),
(38, 'Caisse (federale) de credit mutuel'),
(39, 'Association cooperative inscrite (droit local Alsace Moselle)'),
(40, 'Caisse d\'epargne et de prevoyance a forme cooperative'),
(41, 'Societe en Nom Collectif'),
(42, 'Societe en nom collectif cooperative'),
(43, 'Societe en commandite'),
(44, 'Societe en commandite simple'),
(45, 'Societe en commandite simple cooperative'),
(46, 'Societe en Commandite par Actions'),
(47, 'Societe en commandite par actions cooperative'),
(48, 'Societe de Participations Financieres de Profession Liberale Societe en commandite par actions (SPFPL SCA)'),
(49, 'Societe d\'exercice liberal en commandite par actions'),
(50, 'Societe a Responsabilite Limitee'),
(51, 'SARL nationale'),
(52, 'SARL d\'economie mixte'),
(53, 'SARL immobiliere pour le commerce et l\'industrie (SICOMI)'),
(54, 'SARL immobiliere de gestion'),
(55, 'SARL d\'amenagement foncier et d\'equipement rural (SAFER)'),
(56, 'SARL mixte d\'interat agricole (SMIA)'),
(57, 'SARL d\'interat collectif agricole (SICA)'),
(58, 'SARL d\'attribution'),
(59, 'SARL cooperative de construction'),
(60, 'SARL cooperative de consommation'),
(61, 'SARL cooperative artisanale'),
(62, 'SARL cooperative d\'interat maritime'),
(63, 'SARL cooperative de transport'),
(64, 'SARL cooperative ouvriere de production (SCOP)'),
(65, 'SARL union de societes cooperatives'),
(66, 'Autre SARL cooperative'),
(67, 'Societe de Participations Financieres de Profession Liberale Societe a responsabilite limitee (SPFPL SARL)'),
(68, 'Societe d\'exercice liberal a responsabilite limitee'),
(69, 'SARL unipersonnelle'),
(70, 'Societe a responsabilite limitee (sans autre indication)'),
(71, 'Societe Anonyme'),
(72, 'SA a participation ouvriere a conseil d\'administration'),
(73, 'SA nationale a conseil d\'administration'),
(74, 'SA d\'economie mixte a conseil d\'administration'),
(75, 'Societe d\'investissement a capital variable (SICAV) a conseil d\'administration'),
(76, 'SA immobiliere pour le commerce et l\'industrie (SICOMI) a conseil d\'administration'),
(77, 'SA immobiliere d\'investissement a conseil d\'administration'),
(78, 'SA d\'amenagement foncier et d\'equipement rural (SAFER) a conseil d\'administration'),
(79, 'Societe anonyme mixte d\'interat agricole (SMIA) a conseil d\'administration'),
(80, 'SA d\'interat collectif agricole (SICA) a conseil d\'administration'),
(81, 'SA d\'attribution a conseil d\'administration'),
(82, 'SA cooperative de construction a conseil d\'administration'),
(83, 'SA de HLM a conseil d\'administration'),
(84, 'SA cooperative de production de HLM a conseil d\'administration'),
(85, 'SA de credit immobilier a conseil d\'administration'),
(86, 'SA cooperative de consommation a conseil d\'administration'),
(87, 'SA cooperative de commerâ?¡ants-detaillants a conseil d\'administration'),
(88, 'SA cooperative artisanale a conseil d\'administration'),
(89, 'SA cooperative (d\'interat) maritime a conseil d\'administration'),
(90, 'SA cooperative de transport a conseil d\'administration'),
(91, 'SA cooperative ouvriere de production (SCOP) a conseil d\'administration'),
(92, 'SA union de societes cooperatives a conseil d\'administration'),
(93, 'Autre SA cooperative a conseil d\'administration'),
(94, 'Societe de Participations Financieres de Profession Liberale Societe anonyme a conseil d\'administration (SPFPL SA a conseil d\'administration)'),
(95, 'Societe d\'exercice liberal a forme anonyme a conseil d\'administration'),
(96, 'SA a conseil d\'administration (s.a.i.)'),
(97, 'Societe anonyme a directoire'),
(98, 'SA a participation ouvriere a directoire'),
(99, 'SA nationale a directoire'),
(100, 'SA d\'economie mixte a directoire'),
(101, 'Societe d\'investissement a capital variable (SICAV) a directoire'),
(102, 'SA immobiliere pour le commerce et l\'industrie (SICOMI) a directoire'),
(103, 'SA immobiliere d\'investissement a directoire'),
(104, 'Safer anonyme a directoire'),
(105, 'SA mixte d\'interat agricole (SMIA)'),
(106, 'SA d\'interat collectif agricole (SICA)'),
(107, 'SA d\'attribution a directoire'),
(108, 'SA cooperative de construction a directoire'),
(109, 'SA de HLM a directoire'),
(110, 'Societe cooperative de production de HLM anonyme a directoire'),
(111, 'SA de credit immobilier a directoire'),
(112, 'SA cooperative de consommation a directoire'),
(113, 'SA cooperative de commerâ?¡ants-detaillants a directoire'),
(114, 'SA cooperative artisanale a directoire'),
(115, 'SA cooperative d\'interat maritime a directoire'),
(116, 'SA cooperative de transport a directoire'),
(117, 'SA cooperative ouvriere de production (SCOP) a directoire'),
(118, 'SA union de societes cooperatives a directoire'),
(119, 'Autre SA cooperative a directoire'),
(120, 'Societe de Participations Financieres de Profession Liberale Societe anonyme a Directoire (SPFPL SA a directoire)'),
(121, 'Societe d\'exercice liberal a forme anonyme a directoire'),
(122, 'SA a directoire (s.a.i.)'),
(123, 'Societe par Actions Simplifiee'),
(124, 'Societe par Actions Simplifiee Unipersonnelle'),
(125, 'Societe de Participations Financieres de Profession Liberale Societe par actions simplifiee (SPFPL SAS)'),
(126, 'Societe d\'exercice liberal par action simplifiee'),
(127, 'Societe europeenne'),
(128, 'Autre personne morale immatriculee au RCS'),
(129, 'Caisse d\'Âpargne et de Prevoyance'),
(130, 'Groupement d\'interat economique'),
(131, 'Groupement europeen d\'interat economique (GEIE)'),
(132, 'Groupement d\'interat economique (GIE)'),
(133, 'Societe cooperative agricole'),
(134, 'Cooperative d\'utilisation de materiel agricole en commun (CUMA)'),
(135, 'Societe cooperative agricole'),
(136, 'Union de societes cooperatives agricoles'),
(137, 'Societe d\'assurance mutuelle'),
(138, 'Societe d\'assurance a forme mutuelle'),
(139, 'Societe civile'),
(140, 'Societes Interprofessionnelles de Soins Ambulatoires'),
(141, 'Societe civile de placement collectif immobilier (SCPI)'),
(142, 'Societe civile d\'interat collectif agricole (SICA)'),
(143, 'Groupement Agricole d\'Exploitation en Commun'),
(144, 'Groupement foncier agricole'),
(145, 'Groupement agricole foncier'),
(146, 'Groupement forestier'),
(147, 'Groupement pastoral'),
(148, 'Groupement foncier et rural'),
(149, 'Societe civile fonciere'),
(150, 'Societe civile immobiliere'),
(151, 'Societe civile immobiliere de construction-vente'),
(152, 'Societe civile d\'attribution'),
(153, 'Societe civile cooperative de construction'),
(154, 'Societe civile immobiliere d\' accession progressive a la propriete'),
(155, 'Societe civile cooperative de consommation'),
(156, 'Societe civile cooperative d\'interat maritime'),
(157, 'Societe civile cooperative entre medecins'),
(158, 'Autre societe civile cooperative'),
(159, 'SCP d\'avocats'),
(160, 'SCP d\'avocats aux conseils'),
(161, 'SCP d\'avoues d\'appel'),
(162, 'SCP d\'huissiers'),
(163, 'SCP de notaires'),
(164, 'SCP de commissaires-priseurs'),
(165, 'SCP de greffiers de tribunal de commerce'),
(166, 'SCP de conseils juridiques'),
(167, 'SCP de commissaires aux comptes'),
(168, 'SCP de medecins'),
(169, 'SCP de dentistes'),
(170, 'SCP d\'infirmiers'),
(171, 'SCP de masseurs-kinesitherapeutes'),
(172, 'SCP de directeurs de laboratoire d\'analyse medicale'),
(173, 'SCP de veterinaires'),
(174, 'SCP de geometres experts'),
(175, 'SCP d\'architectes'),
(176, 'Societe Civile Professionnelle'),
(177, 'Societe civile laitiere'),
(178, 'Societe civile de moyens'),
(179, 'Caisse locale de credit mutuel'),
(180, 'Caisse de credit agricole mutuel'),
(181, 'Societe Civile d\'Exploitation Agricole'),
(182, 'Exploitation Agricole a Responsabilite Limitee'),
(183, 'Autre societe civile'),
(184, 'Autre personne morale de droit prive inscrite au registre du commerce et des societes'),
(185, 'Autre personne de droit prive inscrite au registre du commerce et des societes'),
(186, 'Personne morale et organisme soumis au droit administratif'),
(187, 'Administration de l\'etat'),
(188, 'Autorite constitutionnelle'),
(189, 'Autorite administrative independante'),
(190, 'Ministere'),
(191, 'Service central d\'un ministere'),
(192, 'Service du ministere de la Defense'),
(193, 'Service deconcentre a competence nationale d\'un ministere (hors Defense)'),
(194, 'Service deconcentre de l\'Etat a competence (inter) regionale'),
(195, 'Service deconcentre de l\'Etat a competence (inter) departementale'),
(196, '(Autre) Service deconcentre de l\'Etat a competence territoriale'),
(197, 'Ecole nationale non dotee de la personnalite morale'),
(198, 'Collectivite territoriale'),
(199, 'Commune et commune nouvelle'),
(200, 'Departement'),
(201, 'Collectivite et territoire d\'Outre Mer'),
(202, '(Autre) Collectivite territoriale'),
(203, 'Region'),
(204, 'Etablissement public administratif'),
(205, 'Commune associee et commune deleguee'),
(206, 'Section de commune'),
(207, 'Ensemble urbain'),
(208, 'Association syndicale autorisee'),
(209, 'Association fonciere urbaine'),
(210, 'Association fonciere de remembrement'),
(211, 'Etablissement public local d\'enseignement'),
(212, 'Pôle metropolitain'),
(213, 'Secteur de commune'),
(214, 'District urbain'),
(215, 'Communaute urbaine'),
(216, 'Metropole'),
(217, 'Syndicat intercommunal a vocation multiple (SIVOM)'),
(218, 'Communaute de communes'),
(219, 'Communaute de villes'),
(220, 'Communaute d\'agglomeration'),
(221, 'Autre etablissement public local de cooperation non specialise ou entente'),
(222, 'Institution interdepartementale ou entente'),
(223, 'Institution interregionale ou entente'),
(224, 'Syndicat intercommunal a vocation unique (SIVU)'),
(225, 'Syndicat mixte communal'),
(226, 'Autre syndicat mixte'),
(227, 'Commission syndicale pour la gestion des biens indivis des communes'),
(228, 'Centre communal d\'action sociale'),
(229, 'Caisse des ecoles'),
(230, 'Caisse de credit municipal'),
(231, 'Etablissement d\'hospitalisation'),
(232, 'Syndicat inter hospitalier'),
(233, 'Etablissement public local social et medico-social'),
(234, 'Office public d\'habitation a loyer modere (OPHLM)'),
(235, 'Service departemental d\'incendie'),
(236, 'Etablissement public local culturel'),
(237, 'Regie d\'une collectivite locale a caractere administratif'),
(238, '(Autre) Etablissement public administratif local'),
(239, 'Organisme consulaire'),
(240, 'Etablissement public national ayant fonction d\'administration centrale'),
(241, 'Etablissement public national a caractere scientifique culturel et professionnel'),
(242, 'Autre etablissement public national d\'enseignement'),
(243, 'Autre etablissement public national administratif a competence territoriale limitee'),
(244, 'Etablissement public national a caractere administratif'),
(245, 'Autre personne morale de droit public administratif'),
(246, 'Groupement d\'interat public (GIP)'),
(247, 'Etablissement public des cultes d\'Alsace-Lorraine'),
(248, 'Etablissement public administratif, cercle et foyer dans les armees'),
(249, 'Groupement de cooperation sanitaire a gestion publique'),
(250, 'Autre personne morale de droit administratif'),
(251, 'Organisme prive specialise'),
(252, 'Organisme gerant un regime de protection sociale a adhesion obligatoire'),
(253, 'Regime general de la Securite Sociale'),
(254, 'Regime special de Securite Sociale'),
(255, 'Institution de retraite complementaire'),
(256, 'Mutualite sociale agricole'),
(257, 'Regime maladie des non-salaries non agricoles'),
(258, 'Regime vieillesse ne dependant pas du regime general de la Securite Sociale'),
(259, 'Regime d\'assurance chômage'),
(260, 'Autre regime de prevoyance sociale'),
(261, 'Organisme mutualiste'),
(262, 'Mutuelle'),
(263, 'Assurance mutuelle agricole'),
(264, 'Autre organisme mutualiste'),
(265, 'Comite d\'entreprise'),
(266, 'Comite central d\'entreprise'),
(267, 'Comite d\'etablissement'),
(268, 'Organisme professionnel'),
(269, 'Syndicat de salaries'),
(270, 'Syndicat patronal'),
(271, 'Ordre professionnel ou assimile'),
(272, 'Centre technique industriel ou comite professionnel du developpement economique'),
(273, 'Autre organisme professionnel'),
(274, 'Organisme de retraite a adhesion non obligatoire'),
(275, 'Institution de prevoyance'),
(276, 'Institution de retraite supplementaire'),
(277, 'Groupement de droit prive'),
(278, 'Syndicat de proprietaires'),
(279, 'Syndicat de copropriete'),
(280, 'Association syndicale libre'),
(281, 'Association'),
(282, 'Association non declaree'),
(283, 'Association declaree'),
(284, 'Association declaree d\'insertion par l\'economique'),
(285, 'Association intermediaire'),
(286, 'Groupement d\'employeurs'),
(287, 'Association d\'avocats a responsabilite professionnelle individuelle'),
(288, 'Association declaree, reconnue d\'utilite publique'),
(289, 'Congregation'),
(290, 'Association de droit local (Bas-Rhin, Haut-Rhin et Moselle)'),
(291, 'Fondation'),
(292, 'Autre personne morale de droit prive'),
(293, 'Groupement de cooperation sanitaire a gestion privee');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `societe_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `type_crud` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `id_forme_juridique` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` decimal(15,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190914100240', '2019-09-14 10:02:50');

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE `societe` (
  `id` int(11) NOT NULL,
  `forme_juridique_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siren` int(11) NOT NULL,
  `ville_immat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_immat` datetime NOT NULL,
  `capital` decimal(15,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `adresse_societe`
--
ALTER TABLE `adresse_societe`
  ADD PRIMARY KEY (`adresse_id`,`societe_id`),
  ADD KEY `IDX_B77B82224DE7DC5C` (`adresse_id`),
  ADD KEY `IDX_B77B8222FCF77503` (`societe_id`);

--
-- Index pour la table `forme_juridique`
--
ALTER TABLE `forme_juridique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EDBFD5ECFCF77503` (`societe_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_19653DBD9AEE68EB` (`forme_juridique_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `forme_juridique`
--
ALTER TABLE `forme_juridique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `societe`
--
ALTER TABLE `societe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresse_societe`
--
ALTER TABLE `adresse_societe`
  ADD CONSTRAINT `FK_B77B82224DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B77B8222FCF77503` FOREIGN KEY (`societe_id`) REFERENCES `societe` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `FK_EDBFD5ECFCF77503` FOREIGN KEY (`societe_id`) REFERENCES `societe` (`id`);

--
-- Contraintes pour la table `societe`
--
ALTER TABLE `societe`
  ADD CONSTRAINT `FK_19653DBD9AEE68EB` FOREIGN KEY (`forme_juridique_id`) REFERENCES `forme_juridique` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
