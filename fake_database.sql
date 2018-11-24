-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2018 at 06:26 AM
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
(3, 'robertlamberson@msn.com', '$2y$12$xWHnDEGDur1vdjcf2bkHh.pbykq1j16ZzmUAltzMqdlaKgc.lMtDK', 'xWHnDEGDur1vdjcf2bkHhI', 'robertlamberson', 12, 0, 0, 3310, 1541558374, 1541558374, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(12) NOT NULL,
  `last_name` varchar(12) NOT NULL,
  `organization` varchar(32) NOT NULL,
  `titles` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `country` varchar(32) NOT NULL,
  `about_me` text NOT NULL,
  `email` varchar(90) NOT NULL,
  `website` varchar(90) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `cellular` varchar(12) NOT NULL,
  `social_profile_url` varchar(90) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`user_id`, `first_name`, `last_name`, `organization`, `titles`, `city`, `country`, `about_me`, `email`, `website`, `telephone`, `cellular`, `social_profile_url`, `updated`) VALUES
(3, 'Rob', 'Lamberson', 'none', 'bum', 'Huntingburg', 'United States', 'asdf asdf asdf ', 'robertlamberson@msn.com', 'www.mysite.com', '7778887890', '2223332345', 'www.soc.net', '2018-11-24 05:21:17');

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
(3, 'mobile', '74.131.61.145', '74.131.61.145', 'cpe-74-131-61-145.kya.res.rr.com', 'AS10796 Time Warner Cable Internet LLC', 'Huntingburg', 'US', 'Indiana', 47542, '38.2929,-86.9464', '812');

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
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
