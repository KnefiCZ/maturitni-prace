-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `maturitni-prace` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci */;
USE `maturitni-prace`;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `roles` (`id_role`, `name`, `description`) VALUES
(1,	'NEVYPLNĚNO',	'-'),
(2,	'ZADAVATEL',	'Má přístup k:\r\nzobrazení seznamů úkolů,\r\nzobrazení konkrétního seznamu úkolů,\r\nzobrazení detailu úkolu,\r\npřidání úkolu do konkrétního seznamu úkolů,\r\nkomentování úkolu.\r\n'),
(3,	'REALIZÁTOR',	'má přístup k:\r\nzobrazení seznamů úkolů,\r\nzobrazení konkrétního seznamu úkolů,\r\nzobrazení detailu úkolu,\r\npřidání úkolu do konkrétního seznamu úkolů,\r\nkomentování úkolu.\r\n'),
(4,	'ADMINISTRÁTOR',	'má:\r\npřístup všech předešlých rolí,\r\nnavíc může přidávat uživatele,\r\npřidělovat jim role, \r\nměnit hesla a jejich údaje. \r\n');

DROP TABLE IF EXISTS `tasklists`;
CREATE TABLE `tasklists` (
  `id_tasklist` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_tasklist`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `tasklists` (`id_tasklist`, `name`, `description`, `created_at`) VALUES
(1,	'NEVYPLĚNO',	'nevyplněný údaj o seznamu úkolů',	'0000-00-00 00:00:00'),
(2,	'uklit',	'uklidit',	'0000-00-00 00:00:00'),
(3,	'POKER',	'POG',	'0000-00-00 00:00:00'),
(4,	'testink',	'testsss',	'2020-10-14 12:02:29');

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci DEFAULT NULL,
  `datetime_from` datetime DEFAULT NULL,
  `datetime_to` datetime DEFAULT NULL,
  `id_tasklist` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_task`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `tasks` (`id_task`, `title`, `description`, `datetime_from`, `datetime_to`, `id_tasklist`) VALUES
(1,	'Jít cvičit',	'Jo to musim',	'2020-09-17 14:24:59',	'2020-09-17 14:24:59',	1),
(2,	'Udělat domácí úkol z ČJ',	'úkol je z pracovního listu na interpunkce. ',	'2020-09-17 14:26:08',	'2020-09-17 14:26:08',	3),
(3,	'Jít na oběd',	'mam hlad :((',	'2020-09-17 14:26:30',	'2020-09-17 14:26:30',	2),
(4,	'test',	'test',	'2020-09-04 11:50:00',	'2020-09-26 11:51:00',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `email`, `password`, `phonenumber`, `birthdate`, `address`, `city`, `id_role`, `created_at`) VALUES
(1,	'Matěj',	'Kneifl',	'matej.kneifl@email.cz',	'oujeeeeeeee0101',	NULL,	'2002-01-31',	'Křečhoř 33 280 02',	'Kolín',	4,	'0000-00-00 00:00:00'),
(2,	'test',	'test',	'test@test.cz',	'test',	NULL,	'2020-09-23',	'test',	'',	0,	'0000-00-00 00:00:00'),
(3,	'hamod',	'habibi',	'habi@gmail.com',	'hamoodhabibi111',	702111878,	'2000-09-01',	'Praha 4',	'Praha',	2,	'2020-10-14 11:47:31'),
(4,	'Jiří',	'Novák',	'jiri.novak@emai.cz',	'jsemboomermamkanamekrici',	774548451,	'1995-06-25',	'kolín',	'',	1,	'2020-10-14 12:15:13'),
(5,	'Martin',	'Vlček',	'martin.vlcek@gmail.com',	's654hgas6hf54s1',	215698547,	'1995-05-14',	'Kolín, Zálabí',	'Kolín',	3,	'2020-10-14 12:17:28');

-- 2020-10-15 09:48:20
