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
        `id_user`    int(11) AUTO_INCREMENT NOT NULL,
        `name_user`  varchar(64) NOT NULL,
        `first_name` varchar(64) NOT NULL,
        `email`      varchar(64) NOT NULL,
        `password`   varchar(128) NOT NULL,
        `type`       varchar(32) NOT NULL DEFAULT 'student',
        PRIMARY KEY ('id_user' )
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `ideas`;
CREATE TABLE IF NOT EXISTS 'ideas'(
        'id_idea'          int (11) AUTO_INCREMENT NOT NULL ,
        'title_idea'       Varchar (128) NOT NULL ,
        'idea'             Text NOT NULL ,
        'number_vote_idea' Int DEFAULT 0,
        'state_idea'       Varchar (25) NOT NULL DEFAULT 'waiting' ,
        'id_user'          Int NOT NULL ,
        PRIMARY KEY ('id_idea')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS 'events'(
        'id_event'      int (11) AUTO_INCREMENT NOT NULL ,
        'title_event'   Varchar (64) NOT NULL ,
        'event'         Text NOT NULL ,
        'price_event'   Int ,
        'picture_event' longblob NOT NULL ,
        'end_date'      Date NOT NULL ,
        'start_date'    Date NOT NULL ,
        'state_event'   Varchar (25) NOT NULL DEFAULT 'up',
        PRIMARY KEY ('id_event' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS 'pictures'(
        'id_picture'          int (11) AUTO_INCREMENT NOT NULL ,
        'title_picture'       Varchar (64) ,
        'picture'             Longblob NOT NULL ,
        'description_picture' Text ,
        'number_like_picture' Int DEFAULT 0,
        'state_picture'       Varchar (25) NOT NULL DEFAULT 'valid',
        'id_event'            Int NOT NULL ,
        'id_user'             Int NOT NULL ,
        PRIMARY KEY ('id_picture' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `goodies`;
REATE TABLE IF NOT EXISTS 'goodies'(
        'id_item'          int (11) AUTO_INCREMENT NOT NULL ,
        'name_item'        Varchar (64) NOT NULL ,
        'description_item' Text NOT NULL ,
        'price_item'       Int NOT NULL ,
        'number_item'      Int DEFAULT 0,
        'nbr_orders'       Int DEFAULT 0,
        'id_category'      Int NOT NULL ,
        PRIMARY KEY ('id_item' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS 'basket'(
        'id_basket'    int (11) AUTO_INCREMENT NOT NULL ,
        'price_basket' Int NOT NULL DEFAULT 0,
        'id_user'      Int NOT NULL ,
        PRIMARY KEY ('id_basket' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS 'comments'(
        'id_comment'    int (11) AUTO_INCREMENT NOT NULL ,
        'comment'       Text NOT NULL ,
        'state_comment' Varchar (25) NOT NULL DEFAULT 'valid',
        'id_user'       Int NOT NULL ,
        'id_picture'    Int NOT NULL ,
        PRIMARY KEY ('id_comment' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS 'categories'(
        'id_category'   int (11) AUTO_INCREMENT NOT NULL ,
        'name_gategory' Varchar (64) NOT NULL ,
        PRIMARY KEY ('id_category' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS 'orders'(
        'id_order'    int (11) AUTO_INCREMENT NOT NULL ,
        'date_order'  Date NOT NULL ,
        'price_order' Int NOT NULL,
        'id_user'     Int NOT NULL ,
        PRIMARY KEY ('id_order' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS 'notifications'(
        'id_notif'    int (11) AUTO_INCREMENT NOT NULL ,
        'date_notif'  Date NOT NULL ,
        'title_notif' Varchar (64) NOT NULL ,
        'notif'       Text NOT NULL ,
        'is_read'     Bool ,
        'id_user'     Int NOT NULL ,
        PRIMARY KEY ('id_notif' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `contains`;
CREATE TABLE IF NOT EXISTS 'contains'(
        'number_item' Int NOT NULL DEFAULT 1,
        'id_item'     Int NOT NULL ,
        'id_basket'   Int NOT NULL ,
        PRIMARY KEY ('id_item' ,'id_basket' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `liked`;
CREATE TABLE IF NOT EXISTS 'liked'(
        'id_user'    Int NOT NULL ,
        'id_picture' Int NOT NULL ,
        PRIMARY KEY ('id_user' ,'id_picture' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `registered`;
CREATE TABLE IF NOT EXISTS 'registered'(
        'id_user'  Int NOT NULL ,
        'id_event' Int NOT NULL ,
        PRIMARY KEY ('id_user' ,'id_event' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `voted`;
CREATE TABLE IF NOT EXISTS 'voted'(
        'id_user' Int NOT NULL ,
        'id_idea' Int NOT NULL ,
        PRIMARY KEY ('id_user' ,'id_idea' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `has_contained`;
CREATE TABLE IF NOT EXISTS 'has_contained'(
        'number_item' Int NOT NULL ,
        'id_order'    Int NOT NULL ,
        'id_item'     Int NOT NULL ,
        PRIMARY KEY ('id_order' ,'id_item' )
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE 'ideas' ADD CONSTRAINT FK_ideas_id_user FOREIGN KEY ('id_user') REFERENCES users('id_user');
ALTER TABLE 'pictures' ADD CONSTRAINT FK_pictures_id_event FOREIGN KEY ('id_event') REFERENCES events('id_event');
ALTER TABLE 'pictures' ADD CONSTRAINT FK_pictures_id_user FOREIGN KEY ('id_user') REFERENCES users('id_user');
ALTER TABLE 'goodies' ADD CONSTRAINT FK_goodies_id_category FOREIGN KEY ('id_category') REFERENCES categories('id_category');
ALTER TABLE 'basket' ADD CONSTRAINT FK_basket_id_user FOREIGN KEY ('id_user') REFERENCES users('id_user');
ALTER TABLE 'comments' ADD CONSTRAINT FK_comments_id_user FOREIGN KEY ('id_user') REFERENCES users('id_user');
ALTER TABLE 'comments' ADD CONSTRAINT FK_comments_id_picture FOREIGN KEY ('id_picture') REFERENCES pictures('id_picture');
ALTER TABLE 'orders' ADD CONSTRAINT FK_orders_id_user FOREIGN KEY ('id_user') REFERENCES users('id_user');
ALTER TABLE 'notifications' ADD CONSTRAINT FK_notifications_id_user FOREIGN KEY ('id_user') REFERENCES users('id_user');
ALTER TABLE 'contains' ADD CONSTRAINT FK_contains_id_item FOREIGN KEY ('id_item') REFERENCES goodies('id_item');
ALTER TABLE 'contains' ADD CONSTRAINT FK_contains_id_basket FOREIGN KEY ('id_basket') REFERENCES basket('id_basket');
ALTER TABLE 'liked' ADD CONSTRAINT FK_liked_id_user FOREIGN KEY ('id_user') REFERENCES users('id_user');
ALTER TABLE 'liked' ADD CONSTRAINT FK_liked_id_picture FOREIGN KEY ('id_picture') REFERENCES pictures('id_picture');
ALTER TABLE 'registered' ADD CONSTRAINT FK_registered_id_user FOREIGN KEY ('id_user') REFERENCES users('id_user');
ALTER TABLE 'registered' ADD CONSTRAINT FK_registered_id_event FOREIGN KEY ('id_event') REFERENCES events('id_event');
ALTER TABLE 'voted' ADD CONSTRAINT FK_voted_id_user FOREIGN KEY ('id_user') REFERENCES users('id_user');
ALTER TABLE 'voted' ADD CONSTRAINT FK_voted_id_idea FOREIGN KEY ('id_idea') REFERENCES ideas('id_idea');
ALTER TABLE 'has_contained' ADD CONSTRAINT FK_has_contained_id_order FOREIGN KEY ('id_order') REFERENCES orders('id_order');
ALTER TABLE 'has_contained' ADD CONSTRAINT FK_has_contained_id_item FOREIGN KEY ('id_item') REFERENCES goodies('id_item');

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--