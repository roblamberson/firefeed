-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2018 at 10:50 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fake_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `beers`
--

CREATE TABLE `beers` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `btype` varchar(32) NOT NULL,
  `notes` text NOT NULL,
  `in_use` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beers`
--

INSERT INTO `beers` (`id`, `name`, `btype`, `notes`, `in_use`) VALUES
(25, 'Bud Light', 'Pilsner', 'I gotta pee.', 1),
(50, 'Bud Light', 'Pilsner', 'I gotta pee.', 0),
(51, 'Bud Light', 'Pilsner', 'I gotta pee.', 0),
(52, 'Bud Light', 'Pilsner', 'I gotta pee.', 0),
(53, 'Bud Light', 'Pilsner', 'I gotta pee.', 0),
(54, 'Bud Light', 'Pilsner', 'I gotta pee.', 0),
(55, 'PBR', 'Pilsner', 'Pretty bad refreshment.', 0),
(56, 'asdf', 'Brown Ale', 'fdsa', 0),
(57, 'asdf', 'Brown Ale', 'fdsa', 0),
(58, 'PBR', 'Brown Ale', 'Pretty bad refreshment.  Make me sick.', 1),
(59, 'Michelob Ultra', 'Pilsner', 'It\'s alright.', 1),
(60, 'Guiness Stout', 'Stout', 'About the best there is..', 1);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `notes` text NOT NULL,
  `harmony` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `notes`, `harmony`) VALUES
(1, 'asdf', 'fdsa', 'trash value'),
(2, 'Garage Fridge', 'Best place for stinky stuff.', 'basic unit'),
(3, 'Frozen Sound', 'Right behind the airport.', 'trash value'),
(4, 'Library Fridge', 'Keep best here.', 'basic unit'),
(5, 'Repurp\'d Wooden Ice Box', 'Right next to fireplace..', 'basic unit'),
(6, 'New Garage', 'It\'s the one with the remote control door in the front.', 'basic unit'),
(7, 'Basement Studio', 'It\'s just downstairs.  Where the stage is.', 'basic unit'),
(8, 'Porch Cooler', 'Sometimes, we\'ll keep something here..', 'basic unit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `reg_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `reg_code`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(3, 'robertlamberson@msn.com', '$2y$12$xWHnDEGDur1vdjcf2bkHh.pbykq1j16ZzmUAltzMqdlaKgc.lMtDK', 'xWHnDEGDur1vdjcf2bkHhI', 'robertlamberson', 12, 0, 0, 3310, 1541558374, 1541558374, 0),
(4, 'hoffajimmy@yahoo.com', '$2y$12$i3k4h5lII6pvrLIzL8xUG.Mt0TqhhpqfjoiTDEND6fmtx2af1MuP2', 'i3k4h5lII6pvrLIzL8xUGH', 'hoffajimmy', 12, 0, 0, 3310, 1542039154, 1542039154, 0);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `device_type` varchar(12) NOT NULL,
  `ip_via_server` varchar(16) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `ip_via_browser` varchar(16) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `hostname` varchar(90) NOT NULL,
  `org` varchar(90) NOT NULL,
  `city` varchar(32) NOT NULL,
  `country` char(2) NOT NULL,
  `region` varchar(32) NOT NULL,
  `postal` int(11) NOT NULL,
  `location` varchar(90) NOT NULL,
  `phone_code` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `device_type`, `ip_via_server`, `ip_via_browser`, `hostname`, `org`, `city`, `country`, `region`, `postal`, `location`, `phone_code`) VALUES
(1, 'fixed', '74.131.61.145', '74.131.61.145', 'cpe-74-131-61-145.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(2, 'mobile', '74.131.61.145', '74.131.61.145', 'cpe-74-131-61-145.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(3, 'mobile', '74.131.61.145', '74.131.61.145', 'cpe-74-131-61-145.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(4, 'fixed', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(5, 'fixed', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(6, 'fixed', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(7, 'fixed', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(8, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(9, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(10, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(11, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(12, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(13, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(14, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(15, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(16, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(17, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(18, 'fixed', '192.168.0.114', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(19, 'mobile', '192.168.0.114', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(20, 'mobile', '192.168.0.114', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(21, 'mobile', '192.168.0.114', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(22, 'mobile', '192.168.0.114', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(23, 'mobile', '192.168.0.114', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(24, 'fixed', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(25, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(26, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(27, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(28, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(29, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(30, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(31, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(32, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(33, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(34, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(35, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(36, 'fixed', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(37, 'fixed', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(38, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(39, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(40, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(41, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(42, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(43, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(44, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(45, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(46, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(47, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(48, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(49, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(50, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(51, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(52, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(53, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(54, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(55, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(56, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(57, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(58, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(59, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(60, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(61, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(62, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(63, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(64, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(65, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(66, 'mobile', '192.168.0.106', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(67, 'fixed', '192.168.0.124', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(68, 'mobile', '192.168.0.124', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(69, 'fixed', '192.168.0.124', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(70, 'fixed', '192.168.0.124', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(71, 'mobile', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(72, 'fixed', '192.168.0.114', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(73, 'fixed', '192.168.0.114', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(74, 'fixed', '192.168.0.114', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812'),
(75, 'fixed', '96.29.8.194', '96.29.8.194', 'cpe-96-29-8-194.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beers`
--
ALTER TABLE `beers`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beers`
--
ALTER TABLE `beers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
