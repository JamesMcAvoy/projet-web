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
-- Base de données :  `bde_website`
--
CREATE DATABASE IF NOT EXISTS `bde_website` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bde_website`;

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket` (
  `basket_id` int(11) NOT NULL,
  `basket_price` float NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `basket`:
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(64) NOT NULL
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
  `comment_id` int(11) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text NOT NULL,
  `comment_state` ENUM('valid', 'blocked') NOT NULL DEFAULT 'valid',
  `user_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `comments`:
--   `picture_id`
--       `pictures` -> `picture_id`
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `contains`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `contains`;
CREATE TABLE `contains` (
  `item_number` int(25) NOT NULL DEFAULT '1',
  `item_id` int(11) NOT NULL,
  `basket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `contains`:
--   `basket_id`
--       `basket` -> `basket_id`
--   `item_id`
--       `goodies` -> `item_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(64) NOT NULL,
  `event` text NOT NULL,
  `event_price` float NOT NULL,
  `event_picture` longblob NOT NULL,
  `start_date` timestamp NOT NULL,
  `time` int(64) NOT NULL,
  `time_between_each` int(64) NOT NULL DEFAULT '0',
  `event_number` int(11) NOT NULL DEFAULT '1',
  `event_state` ENUM('up', 'ended', 'blocked') NOT NULL DEFAULT 'up'
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
  `item_id` int(11) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_desc` text NOT NULL,
  `item_picture` longblob DEFAULT NULL,
  `item_price` float NOT NULL,
  `item_number` int(11) NOT NULL DEFAULT '0',
  `orders_nbr` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `goodies`:
--   `category_id`
--       `categories` -> `category_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `has_contained`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `has_contained`;
CREATE TABLE `has_contained` (
  `item_number` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `has_contained`:
--   `item_id`
--       `goodies` -> `item_id`
--   `order_id`
--       `orders` -> `order_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `ideas`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `ideas`;
CREATE TABLE `ideas` (
  `idea_id` int(11) NOT NULL,
  `idea_title` varchar(128) NOT NULL,
  `idea` text NOT NULL,
  `post_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idea_number_vote` int(11) NOT NULL DEFAULT '0',
  `idea_state` ENUM('valid', 'blocked') NOT NULL DEFAULT 'valid',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `ideas`:
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `liked`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `liked`;
CREATE TABLE `liked` (
  `user_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `liked`:
--   `picture_id`
--       `pictures` -> `picture_id`
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `notif_id` int(11) NOT NULL,
  `notif_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notif_title` varchar(64) NOT NULL,
  `notif` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `notifications`:
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_price` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `orders`:
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `picture_title` varchar(64) NOT NULL,
  `picture_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` longblob NOT NULL,
  `picture_desc` text NOT NULL DEFAULT '',
  `picture_number_like` int(11) NOT NULL DEFAULT '0',
  `picture_state` varchar(25) NOT NULL DEFAULT 'valid',
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `pictures`:
--   `event_id`
--       `events` -> `event_id`
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `registered`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `registered`;
CREATE TABLE `registered` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `registered`:
--   `event_id`
--       `events` -> `event_id`
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--
-- Création :  Mar 10 Avril 2018 à 09:18
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name_user` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `type` ENUM('student', 'BDE', 'employee') NOT NULL DEFAULT 'student'
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
  `user_id` int(11) NOT NULL,
  `idea_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `voted`:
--   `idea_id`
--       `ideas` -> `idea_id`
--   `user_id`
--       `users` -> `user_id`
--

--
-- Index pour les tables exportées
--

--
-- Index pour la table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`),
  ADD KEY `FK_basket_user_id` (`user_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_comments_user_id` (`user_id`),
  ADD KEY `FK_comments_picture_id` (`picture_id`);

--
-- Index pour la table `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`item_id`,`basket_id`),
  ADD KEY `FK_contains_basket_id` (`basket_id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Index pour la table `goodies`
--
ALTER TABLE `goodies`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `FK_goodies_category_id` (`category_id`);

--
-- Index pour la table `has_contained`
--
ALTER TABLE `has_contained`
  ADD PRIMARY KEY (`order_id`,`item_id`),
  ADD KEY `FK_has_contained_item_id` (`item_id`);

--
-- Index pour la table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`idea_id`),
  ADD KEY `FK_ideas_user_id` (`user_id`);

--
-- Index pour la table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`user_id`,`picture_id`),
  ADD KEY `FK_liked_picture_id` (`picture_id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `FK_notifications_user_id` (`user_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_orders_user_id` (`user_id`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `FK_pictures_event_id` (`event_id`),
  ADD KEY `FK_pictures_user_id` (`user_id`);

--
-- Index pour la table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`user_id`,`event_id`),
  ADD KEY `FK_registered_event_id` (`event_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `voted`
--
ALTER TABLE `voted`
  ADD PRIMARY KEY (`user_id`,`idea_id`),
  ADD KEY `FK_voted_idea_id` (`idea_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `goodies`
--
ALTER TABLE `goodies`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `idea_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `FK_basket_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_picture_id` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`picture_id`),
  ADD CONSTRAINT `FK_comments_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `FK_contains_basket_id` FOREIGN KEY (`basket_id`) REFERENCES `basket` (`basket_id`),
  ADD CONSTRAINT `FK_contains_item_id` FOREIGN KEY (`item_id`) REFERENCES `goodies` (`item_id`);

--
-- Contraintes pour la table `goodies`
--
ALTER TABLE `goodies`
  ADD CONSTRAINT `FK_goodies_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Contraintes pour la table `has_contained`
--
ALTER TABLE `has_contained`
  ADD CONSTRAINT `FK_has_contained_item_id` FOREIGN KEY (`item_id`) REFERENCES `goodies` (`item_id`),
  ADD CONSTRAINT `FK_has_contained_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Contraintes pour la table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `FK_ideas_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `FK_liked_picture_id` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`picture_id`),
  ADD CONSTRAINT `FK_liked_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `FK_notifications_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `FK_pictures_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `FK_pictures_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `registered`
--
ALTER TABLE `registered`
  ADD CONSTRAINT `FK_registered_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `FK_registered_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `voted`
--
ALTER TABLE `voted`
  ADD CONSTRAINT `FK_voted_idea_id` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`idea_id`),
  ADD CONSTRAINT `FK_voted_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
