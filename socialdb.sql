-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2013 at 07:03 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `social_comments`
--

CREATE TABLE IF NOT EXISTS `social_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user` int(9) NOT NULL,
  `content` mediumtext,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-visible, 1-blocked, 2-deleted',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_contacts`
--

CREATE TABLE IF NOT EXISTS `social_contacts` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_email`
--

CREATE TABLE IF NOT EXISTS `social_email` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_invitations`
--

CREATE TABLE IF NOT EXISTS `social_invitations` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_lastp`
--

CREATE TABLE IF NOT EXISTS `social_lastp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(9) NOT NULL,
  `content` mediumtext NOT NULL,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_notifications`
--

CREATE TABLE IF NOT EXISTS `social_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(9) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `noti_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_posts`
--

CREATE TABLE IF NOT EXISTS `social_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(9) NOT NULL,
  `content` mediumtext,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Modification Date',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-visible, 1-modified, 2-blocked, 3-deleted',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_username`
--

CREATE TABLE IF NOT EXISTS `social_username` (
  `id` int(9) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_users`
--

CREATE TABLE IF NOT EXISTS `social_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `fist_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - regular user, -1- admin.',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0- active, 1- banned, 2- deleted  ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=28 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
