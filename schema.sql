-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 05:28 PM
-- Server version: 5.5.59-0+deb8u1
-- PHP Version: 7.2.4-1+0~20180405085552.20+jessie~1.gbpbff9f0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `site_bde`
--
CREATE DATABASE IF NOT EXISTS `site_bde` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `site_bde`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 08, 2018 at 03:28 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'student',
  `basket_backup` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;