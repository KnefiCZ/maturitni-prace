--   CREATE DATABASE `maturitni-prace`;
--   USE `maturitni-prace`;

--   CREATE TABLE `tasks` (
--     `id_task` int(11) NOT NULL AUTO_INCREMENT,
--     `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
--     `description` text COLLATE utf8_czech_ci DEFAULT NULL,
--     `datetime_from` datetime DEFAULT NULL,
--     `datetime_to` datetime DEFAULT NULL,
--     PRIMARY KEY (`id_task`)
--   )

--   INSERT INTO `tasks` (`id_task`, `title`, `description`, `datetime_from`, `datetime_to`) VALUES
--   (1,	'Jít cvičit',	'Jo to musim',	'2020-09-17 14:24:59',	'2020-09-17 14:24:59'),
--   (2,	'Udělat domácí úkol z ČJ',	'úkol je z pracovního listu na interpunkce. ',	'2020-09-17 14:26:08',	'2020-09-17 14:26:08'),
--   (3,	'Jít na oběd',	'mam hlad :((',	'2020-09-17 14:26:30',	'2020-09-17 14:26:30');