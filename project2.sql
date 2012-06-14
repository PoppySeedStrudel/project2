-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 14. Jun 2012 um 17:35
-- Server Version: 5.1.61
-- PHP-Version: 5.3.3-1ubuntu9.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `project2`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lasttrade` double NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`stock_id`,`symbol`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=894 ;

--
-- Daten für Tabelle `stocks`
--

INSERT INTO `stocks` (`stock_id`, `symbol`, `name`, `lasttrade`, `date`, `time`) VALUES
(886, 'GOOG', 'Google Inc.', 562.76, '2012-06-14', '17:35:02'),
(887, 'AMZN', 'Amazon.com, Inc.', 216.09, '2012-06-14', '17:35:02'),
(888, 'AAPL', 'Apple Inc.', 571.52, '2012-06-14', '17:35:02'),
(889, 'EBAY', 'eBay Inc.', 40.07, '2012-06-14', '17:35:02'),
(890, 'MSFT', 'Microsoft Corpora', 29.3399, '2012-06-14', '17:35:02'),
(891, 'INTC', 'Intel Corporation', 26.75, '2012-06-14', '17:35:02'),
(892, 'FB', 'Facebook, Inc.', 27.85, '2012-06-14', '17:35:02'),
(893, 'GRPN', 'Groupon, Inc.', 9.22, '2012-06-14', '17:35:02');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `amount` int(11) NOT NULL,
  `sellorbuy` varchar(255) NOT NULL,
  `bill` double NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `money` double NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `money`) VALUES
(1, 'user1', 'user1', 'user@user.com', 10000),
(2, 'user2', 'user2', 'user2@user2.com', 10000),
(3, 'test3', 'test3', 'test@test3.com', 10000),
(4, '', '', '', 10000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
