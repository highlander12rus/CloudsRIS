-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 26 2013 г., 14:23
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cloudsris`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `fileInfo`( _file_id int(10), _ip varchar(15))
BEGIN

SELECT `server_files`.`order`, `server_files`.`offset`, `blocks`.`address`, `server_files`.`lenght` 
FROM (`cloudsris`.`blocks` INNER JOIN `cloudsris`.`address_blocks` ON `blocks`.`id` = `address_blocks`.`id`) 
INNER JOIN `cloudsris`.`server_files` ON `blocks`.`id` = `server_files`.`block_id` 
where 
`server_files`.`file_id` = _file_id 
AND 
`address_blocks`.`ip` = _ip
order by server_files.order;
END$$

--
-- Функции
--
CREATE DEFINER=`root`@`localhost` FUNCTION `FreeSpace`(sizeBlock INTEGER, base_sizeFile INTEGER,  sizeFile Integer) RETURNS tinyint(1)
BEGIN
DECLARE freeSpace INTEGER;
DECLARE result boolean;

SET freeSpace = sizeBlock -   base_sizeFile;
IF freeSpace > sizeFile THEN SET result = TRUE;
    ELSE SET result = FALSE;
END IF;
RETURN result;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getlastIdBlock`() RETURNS int(11)
BEGIN
	declare idRes integer;
	SELECT MAX(`id`) INTO idRes from `cloudsris`.`blocks`;
	
RETURN idRes;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `insertNewBlock`(path varchar(255),occupiedSpace INTEGER,ipt varchar(15)) RETURNS int(11)
BEGIN
declare idt INTEGER;
INSERT INTO `cloudsris`.`blocks` (`address`, `occupied_space`) VALUES (path, occupiedSpace);
SET idt = getLastIdBlock();
UPDATE `cloudsris`.`blocks` SET `address` = concat(`address`, 'block_', idt, '.blb') WHERE `id` = idt;
INSERT INTO `cloudsris`.`address_blocks` (`ip`,`blok_id`) VALUES (ipt,idt);
RETURN idt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `address_blocks`
--

CREATE TABLE IF NOT EXISTS `address_blocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) DEFAULT NULL,
  `blok_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `address_blocks`
--

INSERT INTO `address_blocks` (`id`, `ip`, `blok_id`) VALUES
(1, 'localhost', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(255) DEFAULT NULL,
  `occupied_space` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `blocks`
--

INSERT INTO `blocks` (`id`, `address`, `occupied_space`) VALUES
(1, 'ttttt', 234);

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `folder_id` int(10) unsigned NOT NULL COMMENT '0 если лежит в корне',
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `permission` bit(1) DEFAULT NULL COMMENT '0 -только чтение\n1 - чтение и удалени',
  PRIMARY KEY (`id`),
  KEY `folder_id_idx` (`folder_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `user_id`, `name`, `folder_id`, `date_create`, `data_edit`, `permission`) VALUES
(2, 1, 'c', 1, '0000-00-00 00:00:00', '2013-11-25 13:05:51', NULL),
(3, 5, 'df', 6, '0000-00-00 00:00:00', '2013-11-26 07:33:10', NULL),
(4, 5, 'd', 6, '0000-00-00 00:00:00', '2013-11-26 10:02:20', b'1'),
(5, 5, 'd', 6, '0000-00-00 00:00:00', '2013-11-26 10:03:23', b'1'),
(6, 5, 'd', 6, '0000-00-00 00:00:00', '2013-11-26 10:04:32', b'1');

-- --------------------------------------------------------

--
-- Структура таблицы `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`user_id`),
  UNIQUE KEY `name_2` (`name`,`user_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `folders`
--

INSERT INTO `folders` (`id`, `name`, `user_id`) VALUES
(1, '/', 1),
(4, '/', 5),
(5, '/f/', 1),
(6, '/home/', 5),
(7, '/home/vfs/', 5),
(10, '/home/vfs/lol/', 5),
(11, 'f', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `security_method`
--

CREATE TABLE IF NOT EXISTS `security_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `security_method`
--

INSERT INTO `security_method` (`id`, `name`) VALUES
(2, 'aes'),
(1, 'dc');

-- --------------------------------------------------------

--
-- Структура таблицы `server_files`
--

CREATE TABLE IF NOT EXISTS `server_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(10) unsigned NOT NULL,
  `offset` int(10) unsigned NOT NULL,
  `lenght` int(10) unsigned NOT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `order` tinyint(3) unsigned DEFAULT NULL,
  `check` varchar(33) DEFAULT NULL,
  `security_method_id` int(10) unsigned NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_loaded` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `server_files_files_idx` (`file_id`),
  KEY `server_files_security_method_idx` (`security_method_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `server_files`
--

INSERT INTO `server_files` (`id`, `file_id`, `offset`, `lenght`, `block_id`, `order`, `check`, `security_method_id`, `date_insert`, `is_loaded`) VALUES
(4, 5, 0, 1250, 0, NULL, 'dsdasdsdasdasdasd', 2, '2013-11-26 10:03:23', b'0'),
(5, 6, 0, 1250, 0, NULL, 'dsdasdsdasdasdasd', 2, '2013-11-26 10:04:32', b'0');

-- --------------------------------------------------------

--
-- Структура таблицы `share_files`
--

CREATE TABLE IF NOT EXISTS `share_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL COMMENT 'Ссылка кому разрешен файл',
  PRIMARY KEY (`id`),
  KEY `share_files_files_idx` (`file_id`),
  KEY `share_files_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `share_folders`
--

CREATE TABLE IF NOT EXISTS `share_folders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `folders_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `share_folders_folders_idx` (`folders_id`),
  KEY `share_folders_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(129) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lifetime` bigint(20) NOT NULL,
  `session_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `lifetime`, `session_id`) VALUES
(1, 'test1', 'test', 'dsasdsa', 0, ''),
(2, 'test2', 'test', 'dasdsa', 0, ''),
(3, 'test3', 'test', 'sdsa', 0, ''),
(4, 'ter', 'dsdsa', 'tet', 0, ''),
(5, 'ilya', 'fb4579611a1c7831f69aebf64363d69ef69f8d9b74c9fe595448403542a43d4367ec727a01d0db7da9245e12373c105d6e6cebeb73dbd70b6f7e5a13e0cf8c9a', 'ilia12r@gmail.com', 1385546672, '7932e9fa9cb304b9669effd6d95eab96b2f6885ba0b34dea7c17f5661c167873c65f70c03d694ae1efc513f786b8007f8abcddcd23c4208eecfdab4df5e7f9f0');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_folders_id` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `files_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `server_files`
--
ALTER TABLE `server_files`
  ADD CONSTRAINT `server_files_files` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `server_files_security_method` FOREIGN KEY (`security_method_id`) REFERENCES `security_method` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `share_files`
--
ALTER TABLE `share_files`
  ADD CONSTRAINT `share_files_files` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `share_files_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `share_folders`
--
ALTER TABLE `share_folders`
  ADD CONSTRAINT `share_folders_folders` FOREIGN KEY (`folders_id`) REFERENCES `folders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `share_folders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
