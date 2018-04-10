-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 10 Avril 2018 à 09:25
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `site_bde`
--
CREATE DATABASE IF NOT EXISTS `site_bde` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `site_bde`;

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket` (
  `id_basket` int(11) NOT NULL,
  `price_basket` float NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `basket`:
--   `id_user`
--       `users` -> `id_user`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_gategory` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `categories`:
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `date_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text NOT NULL,
  `state_comment` varchar(25) NOT NULL DEFAULT 'valid',
  `id_user` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `comments`:
--   `id_picture`
--       `pictures` -> `id_picture`
--   `id_user`
--       `users` -> `id_user`
--

-- --------------------------------------------------------

--
-- Structure de la table `contains`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `contains`;
CREATE TABLE `contains` (
  `number_item` int(25) NOT NULL DEFAULT '1',
  `id_item` int(11) NOT NULL,
  `id_basket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `contains`:
--   `id_basket`
--       `basket` -> `id_basket`
--   `id_item`
--       `goodies` -> `id_item`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `title_event` varchar(64) NOT NULL,
  `event` text NOT NULL,
  `price_event` float NOT NULL,
  `picture_event` longblob NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time` time NOT NULL,
  `time_between_each` time NOT NULL DEFAULT '00:00:00',
  `number_event` int(11) NOT NULL DEFAULT '0',
  `state_event` varchar(25) NOT NULL DEFAULT 'up'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `events`:
--

-- --------------------------------------------------------

--
-- Structure de la table `goodies`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `goodies`;
CREATE TABLE `goodies` (
  `id_item` int(11) NOT NULL,
  `name_item` varchar(64) NOT NULL,
  `description_item` text NOT NULL,
  `price_item` float NOT NULL,
  `number_item` int(11) DEFAULT '0',
  `nbr_orders` int(11) DEFAULT '0',
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `goodies`:
--   `id_category`
--       `categories` -> `id_category`
--

-- --------------------------------------------------------

--
-- Structure de la table `has_contained`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `has_contained`;
CREATE TABLE `has_contained` (
  `number_item` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `has_contained`:
--   `id_item`
--       `goodies` -> `id_item`
--   `id_order`
--       `orders` -> `id_order`
--

-- --------------------------------------------------------

--
-- Structure de la table `ideas`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `ideas`;
CREATE TABLE `ideas` (
  `id_idea` int(11) NOT NULL,
  `title_idea` varchar(128) NOT NULL,
  `idea` text NOT NULL,
  `number_vote_idea` int(11) DEFAULT '0',
  `state_idea` varchar(25) NOT NULL DEFAULT 'waiting',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `ideas`:
--   `id_user`
--       `users` -> `id_user`
--

-- --------------------------------------------------------

--
-- Structure de la table `liked`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `liked`;
CREATE TABLE `liked` (
  `id_user` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `liked`:
--   `id_picture`
--       `pictures` -> `id_picture`
--   `id_user`
--       `users` -> `id_user`
--

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id_notif` int(11) NOT NULL,
  `date_notif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title_notif` varchar(64) NOT NULL,
  `notif` text NOT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `notifications`:
--   `id_user`
--       `users` -> `id_user`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price_order` float NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `orders`:
--   `id_user`
--       `users` -> `id_user`
--

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE `pictures` (
  `id_picture` int(11) NOT NULL,
  `title_picture` varchar(64) DEFAULT NULL,
  `date_picture` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` longblob NOT NULL,
  `description_picture` text,
  `number_like_picture` int(11) DEFAULT '0',
  `state_picture` varchar(25) NOT NULL DEFAULT 'valid',
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `pictures`:
--   `id_event`
--       `events` -> `id_event`
--   `id_user`
--       `users` -> `id_user`
--

-- --------------------------------------------------------

--
-- Structure de la table `registered`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `registered`;
CREATE TABLE `registered` (
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `registered`:
--   `id_event`
--       `events` -> `id_event`
--   `id_user`
--       `users` -> `id_user`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `users`:
--

-- --------------------------------------------------------

--
-- Structure de la table `voted`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `voted`;
CREATE TABLE `voted` (
  `id_user` int(11) NOT NULL,
  `id_idea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `voted`:
--   `id_idea`
--       `ideas` -> `id_idea`
--   `id_user`
--       `users` -> `id_user`
--

--
-- Index pour les tables exportées
--

--
-- Index pour la table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`),
  ADD KEY `FK_basket_id_user` (`id_user`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `FK_comments_id_user` (`id_user`),
  ADD KEY `FK_comments_id_picture` (`id_picture`);

--
-- Index pour la table `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`id_item`,`id_basket`),
  ADD KEY `FK_contains_id_basket` (`id_basket`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `goodies`
--
ALTER TABLE `goodies`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `FK_goodies_id_category` (`id_category`);

--
-- Index pour la table `has_contained`
--
ALTER TABLE `has_contained`
  ADD PRIMARY KEY (`id_order`,`id_item`),
  ADD KEY `FK_has_contained_id_item` (`id_item`);

--
-- Index pour la table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id_idea`),
  ADD KEY `FK_ideas_id_user` (`id_user`);

--
-- Index pour la table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id_user`,`id_picture`),
  ADD KEY `FK_liked_id_picture` (`id_picture`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `FK_notifications_id_user` (`id_user`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `FK_orders_id_user` (`id_user`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id_picture`),
  ADD KEY `FK_pictures_id_event` (`id_event`),
  ADD KEY `FK_pictures_id_user` (`id_user`);

--
-- Index pour la table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`id_user`,`id_event`),
  ADD KEY `FK_registered_id_event` (`id_event`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `voted`
--
ALTER TABLE `voted`
  ADD PRIMARY KEY (`id_user`,`id_idea`),
  ADD KEY `FK_voted_id_idea` (`id_idea`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `goodies`
--
ALTER TABLE `goodies`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id_idea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `FK_basket_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_id_picture` FOREIGN KEY (`id_picture`) REFERENCES `pictures` (`id_picture`),
  ADD CONSTRAINT `FK_comments_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `FK_contains_id_basket` FOREIGN KEY (`id_basket`) REFERENCES `basket` (`id_basket`),
  ADD CONSTRAINT `FK_contains_id_item` FOREIGN KEY (`id_item`) REFERENCES `goodies` (`id_item`);

--
-- Contraintes pour la table `goodies`
--
ALTER TABLE `goodies`
  ADD CONSTRAINT `FK_goodies_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Contraintes pour la table `has_contained`
--
ALTER TABLE `has_contained`
  ADD CONSTRAINT `FK_has_contained_id_item` FOREIGN KEY (`id_item`) REFERENCES `goodies` (`id_item`),
  ADD CONSTRAINT `FK_has_contained_id_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

--
-- Contraintes pour la table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `FK_ideas_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `FK_liked_id_picture` FOREIGN KEY (`id_picture`) REFERENCES `pictures` (`id_picture`),
  ADD CONSTRAINT `FK_liked_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `FK_notifications_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `FK_pictures_id_event` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`),
  ADD CONSTRAINT `FK_pictures_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `registered`
--
ALTER TABLE `registered`
  ADD CONSTRAINT `FK_registered_id_event` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`),
  ADD CONSTRAINT `FK_registered_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `voted`
--
ALTER TABLE `voted`
  ADD CONSTRAINT `FK_voted_id_idea` FOREIGN KEY (`id_idea`) REFERENCES `ideas` (`id_idea`),
  ADD CONSTRAINT `FK_voted_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
