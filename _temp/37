-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2013 at 08:32 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `white_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE IF NOT EXISTS `boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `description`, `date`) VALUES
(3, 'Test Idea', 'This is a description', '2013-04-03 20:10:13'),
(4, 'Test', 'This is a Description', '2013-04-03 21:10:01'),
(5, 'a', 'asdf', '2013-04-03 21:13:45'),
(6, 'asdfdsfdfs', 'asdfadsf', '2013-04-03 21:23:40'),
(7, 'asdfdsfdfssdfsdf', 'asdfadsf', '2013-04-03 21:23:45'),
(8, 'Plan Viewer Names', 'Names for the Plan Viewer app', '2013-04-03 21:36:31'),
(9, '', '', '2013-04-04 17:09:35'),
(10, 'Shanes board', 'This is a desc', '2013-04-04 17:12:56'),
(11, 'Shanes', 'asdf', '2013-04-04 17:13:53'),
(12, 'Test Board', 'Desc', '2013-04-05 01:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `user_id` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `board_id`, `description`, `user_id`, `date`) VALUES
(1, 11, 'Go HAM', '1', '2013-04-05 01:18:04'),
(2, 1, 'Contribution Description', '1', '2013-04-05 01:45:02'),
(3, 0, 'Contribution Description', '1', '2013-04-05 01:47:03'),
(4, 11, 'this is awesome', '1', '2013-04-05 16:31:55'),
(5, 11, 'this is awesome', '1', '2013-04-05 16:33:25'),
(6, 0, 'Contribution Description', '1', '2013-04-05 16:33:39'),
(7, 0, 'Contribution Description', '1', '2013-04-05 16:34:51'),
(8, 0, 'Contribution Description', '1', '2013-04-05 16:36:48'),
(9, 0, 'Contribution Description', '1', '2013-04-05 16:38:28'),
(10, 11, 'asdfasdfasdfasdfasdfasdf', '1', '2013-04-05 16:46:09'),
(11, 11, 'asdfasdfasdfasdfasdfasdf', '1', '2013-04-05 16:46:25'),
(12, 11, 'crap', '1', '2013-04-05 16:46:41'),
(13, 11, 'crap', '1', '2013-04-05 16:46:55'),
(14, 11, 'crap', '1', '2013-04-05 16:47:42'),
(15, 11, 'crap', '1', '2013-04-05 16:48:01'),
(16, 11, 'crap', '1', '2013-04-05 16:48:23'),
(17, 0, 'Contribution Description', '1', '2013-04-05 16:48:27'),
(18, 0, 'Contribution Description', '1', '2013-04-05 16:49:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
