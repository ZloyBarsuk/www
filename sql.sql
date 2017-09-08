-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.1.16-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных inwiz
DROP DATABASE IF EXISTS `inwiz`;
CREATE DATABASE IF NOT EXISTS `inwiz` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `inwiz`;

-- Дамп структуры для таблица inwiz.auth_assignment
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы inwiz.auth_assignment: ~2 rows (приблизительно)
DELETE FROM `auth_assignment`;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Superadmin', '1', 1499417508);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.auth_item
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы inwiz.auth_item: ~160 rows (приблизительно)
DELETE FROM `auth_item`;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/assignment/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/assignment/assign', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/assignment/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/assignment/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/default/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/default/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/menu/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/menu/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/menu/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/menu/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/menu/update', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/menu/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/permission/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/permission/assign', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/permission/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/permission/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/permission/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/permission/remove', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/permission/update', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/permission/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/role/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/role/assign', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/role/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/role/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/role/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/role/remove', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/role/update', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/role/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/route/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/route/assign', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/route/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/route/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/route/refresh', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/route/remove', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/rule/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/rule/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/rule/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/rule/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/rule/update', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/rule/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/activate', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/change-password', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/login', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/logout', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/reset-password', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/signup', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/admin/user/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/banks/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/banks/ajax-validate', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/banks/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/banks/create-from-list', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/banks/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/banks/dropdown-by-contractor', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/banks/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/banks/update', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/banks/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractor/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractor/ajax-validate', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractor/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractor/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractor/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractor/update', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractor/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractorinfo/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractorinfo/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractorinfo/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractorinfo/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractorinfo/update', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/contractorinfo/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/datecontrol/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/datecontrol/parse/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/datecontrol/parse/convert', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/debug/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/debug/default/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/debug/default/db-explain', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/debug/default/download-mail', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/debug/default/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/debug/default/toolbar', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/debug/default/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/documenttemplate/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/documenttemplate/ajax-validate', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/documenttemplate/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/documenttemplate/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/documenttemplate/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/documenttemplate/templates-by-contractor', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/documenttemplate/update', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/documenttemplate/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/dogovor-numeration/*', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/dogovor-numeration/create', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/dogovor-numeration/delete', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/dogovor-numeration/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/dogovor-numeration/update', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/dogovor-numeration/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/dogovor/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/dogovor/ajax-validate', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/dogovor/create', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/dogovor/delete', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/dogovor/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/dogovor/update', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/dogovor/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/gii/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/gii/default/*', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/gii/default/action', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/gii/default/diff', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/gii/default/index', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/gii/default/preview', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/gii/default/view', 2, NULL, NULL, NULL, 1499417488, 1499417488),
	('/invoice/*', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/invoice/create', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/invoice/delete', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/invoice/index', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/invoice/update', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/invoice/view', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/lotnumber/*', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/lotnumber/create', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/lotnumber/delete', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/lotnumber/index', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/lotnumber/update', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/lotnumber/view', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/media/*', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/media/upload', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/products/*', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/products/ajax-validate', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/products/create', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/products/delete', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/products/index', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/products/update', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/products/view', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/productstoinvoice/*', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/productstoinvoice/create', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/productstoinvoice/delete', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/productstoinvoice/index', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/productstoinvoice/update', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/productstoinvoice/view', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/salesinvoice/*', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/salesinvoice/create', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/salesinvoice/delete', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/salesinvoice/index', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/salesinvoice/update', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/salesinvoice/view', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/site/*', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/site/about', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/site/captcha', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/site/contact', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/site/error', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/site/index', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/site/login', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('/site/logout', 2, NULL, NULL, NULL, 1499417489, 1499417489),
	('Banks', 2, NULL, NULL, NULL, 1499417608, 1499417608),
	('Superadmin', 1, NULL, NULL, NULL, 1499416635, 1499417592),
	('TemplatesAdmin', 2, NULL, NULL, NULL, 1499422691, 1499422691);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.auth_item_child
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы inwiz.auth_item_child: ~14 rows (приблизительно)
DELETE FROM `auth_item_child`;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Banks', '/banks/create-from-list'),
	('Banks', '/banks/dropdown-by-contractor'),
	('Banks', '/banks/index'),
	('Banks', '/banks/view'),
	('Superadmin', 'Banks'),
	('Superadmin', 'TemplatesAdmin'),
	('TemplatesAdmin', '/documenttemplate/*'),
	('TemplatesAdmin', '/documenttemplate/ajax-validate'),
	('TemplatesAdmin', '/documenttemplate/create'),
	('TemplatesAdmin', '/documenttemplate/delete'),
	('TemplatesAdmin', '/documenttemplate/index'),
	('TemplatesAdmin', '/documenttemplate/templates-by-contractor'),
	('TemplatesAdmin', '/documenttemplate/update'),
	('TemplatesAdmin', '/documenttemplate/view');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.auth_rule
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы inwiz.auth_rule: ~0 rows (приблизительно)
DELETE FROM `auth_rule`;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.banks
DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `contractor_id` int(11) DEFAULT NULL,
  `name_ua` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `inn` varchar(12) DEFAULT NULL COMMENT 'инн',
  `kpp` varchar(9) DEFAULT NULL COMMENT 'кпп',
  `ogrm` varchar(13) DEFAULT NULL COMMENT 'огрм',
  `adress_official_ua` varchar(255) DEFAULT NULL,
  `adress_official_en` varchar(255) DEFAULT NULL,
  `adress_post_ua` varchar(255) DEFAULT NULL,
  `adress_post_en` varchar(255) DEFAULT NULL,
  `r_s` varchar(20) DEFAULT NULL COMMENT 'расчетный счет',
  `k_s` varchar(20) DEFAULT NULL COMMENT 'кор. счет',
  `bic` varchar(9) DEFAULT NULL COMMENT 'бик',
  `swift` varchar(9) DEFAULT NULL COMMENT 'свифт',
  `comments` varchar(500) DEFAULT NULL,
  `account_type` enum('rub','eur','usd','uah') NOT NULL DEFAULT 'rub' COMMENT 'валюта счета',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `by_default` enum('y','n') DEFAULT 'y',
  PRIMARY KEY (`bank_id`),
  KEY `FK_banks_user` (`created_by`),
  KEY `FK_banks_contractor` (`contractor_id`),
  CONSTRAINT `FK_banks_contractor` FOREIGN KEY (`contractor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_banks_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.banks: ~12 rows (приблизительно)
DELETE FROM `banks`;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` (`bank_id`, `contractor_id`, `name_ua`, `name_en`, `inn`, `kpp`, `ogrm`, `adress_official_ua`, `adress_official_en`, `adress_post_ua`, `adress_post_en`, `r_s`, `k_s`, `bic`, `swift`, `comments`, `account_type`, `created_at`, `created_by`, `by_default`) VALUES
	(68, 236, 'КГРУ ПАО КБ Приватбанк', 'PJSC CB “PRIVATBANK”', '000000000000', '000000000', '0000000000000', 'Київ, Україна ', 'Kiev, Ukraine', 'Київ, Україна ', 'Kiev, Ukraine', '26003162160063', '26003162160063', '32184', '', 'нет ИНН и КПП беда блядь', 'usd', '2017-08-30 12:06:23', 1, 'y'),
	(71, 236, 'dfgfdgdfgdfg', 'gdsdfsdfdf9999', '000000000000', '', '', 'cbcvbbcb', 'cvbvbvcb', '', '', 'dgdfgdfg', 'dfgfddfg', '', '', '', 'rub', '2017-08-29 17:24:40', 1, 'n'),
	(75, 237, 'барыга банк', 'барыга банк', '', '', '', 'ывавыавыа', 'кцукцк', '', '', 'ыаываываываа', 'ывавыаываыва', '', '', '', 'rub', '2017-08-30 17:36:53', 1, 'n'),
	(86, 237, 'второй банк инвиза ', 'второй банк инвиза ', '', '', '', 'ячс', 'ячс', '', '', 'ячся', 'ячс', '', '', '', 'rub', '2017-08-30 17:38:50', 1, 'y'),
	(87, 237, 'третий банк нвизы', 'третий банк нвизы', '', '', '', 'третий банк нвизы', 'третий банк нвизы', '', '', 'третий банк нвизы', 'третий банк нвизы', '', '', '', 'rub', '2017-08-30 17:40:28', 1, 'n'),
	(90, 236, 'cvb', 'xcv', '', '', '', 'v', 'v', '', '', 'v', 'v', '', '', '', 'rub', '2017-08-30 17:49:42', 1, 'y'),
	(91, 277, 'новый', 'новый', '', '', '', 'новый', 'новый', '', '', 'новый', 'новый', '', '', '', 'eur', '2017-08-30 17:54:31', 1, 'y'),
	(92, 277, 'новый2', 'новый22', '', '', '', 'новый', 'новый', '', '', 'новый', 'новый', '', '', '', 'eur', '2017-08-30 17:54:39', 1, 'y'),
	(95, 277, 'xcvxcv', 'zxczcxzcxcxcxc', '', '', '', 'cvcv', 'cv', '', '', 'xcv', 'xcv', '', '', '', 'rub', '2017-09-01 11:13:20', 1, 'y'),
	(97, 278, '1111111111111111111111111', '11111111111111111', '', '', '', 'sdfdf', 'sdfdf', '', '', 'sfsd', 'sdfsdf', '', '', '', 'rub', '2017-09-01 11:14:28', 1, 'n'),
	(98, 237, 'xvxcv', 'cvxcvxcv', '', '', '', 'adasd', 'dfdfdsf', '', '', '11111111111111111111', '22222222222222222222', '', '', '', 'usd', '2017-09-01 11:39:56', 1, 'n');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.contractor
DROP TABLE IF EXISTS `contractor`;
CREATE TABLE IF NOT EXISTS `contractor` (
  `contractor_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ua` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `contractor_type` enum('client','owner') DEFAULT 'client',
  PRIMARY KEY (`contractor_id`),
  KEY `FK_contractor_user_accounts` (`created_by`),
  CONSTRAINT `FK_contractor_user_accounts` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.contractor: ~3 rows (приблизительно)
DELETE FROM `contractor`;
/*!40000 ALTER TABLE `contractor` DISABLE KEYS */;
INSERT INTO `contractor` (`contractor_id`, `name_ua`, `name_en`, `signature`, `created_at`, `created_by`, `contractor_type`) VALUES
	(236, 'ТОВ "БАТЕКС"', 'BATEX Ltd.', 'батекс.png', '2017-08-29 14:26:42', 1, 'owner'),
	(237, 'ТОВ "ИНВИЗ"', 'INWIZ', 'батекс.png', '2017-08-30 17:38:11', 1, 'owner'),
	(277, 'Feretek', 'Feretek', 'empty.png', '2017-09-05 14:54:06', 1, 'client'),
	(278, 'Novotec', 'Novotec', 'empty.png', '2017-09-05 14:54:19', 1, 'client');
/*!40000 ALTER TABLE `contractor` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.contractor_info
DROP TABLE IF EXISTS `contractor_info`;
CREATE TABLE IF NOT EXISTS `contractor_info` (
  `contr_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contractor` int(11) NOT NULL,
  `adress_official_ua` varchar(255) NOT NULL,
  `adress_official_en` varchar(255) NOT NULL,
  `adress_post_ua` varchar(255) NOT NULL,
  `adress_post_en` varchar(255) NOT NULL,
  `director_ua` varchar(255) DEFAULT NULL,
  `director_en` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `tax_number` varchar(255) DEFAULT NULL,
  `vat_reg_no` varchar(255) DEFAULT NULL,
  `rep` varchar(255) DEFAULT NULL,
  `customer_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT '1',
  PRIMARY KEY (`contr_info_id`),
  KEY `FK_contractor_info_contractor` (`id_contractor`),
  KEY `FK_contractor_info_user_accounts` (`created_by`),
  CONSTRAINT `FK_contractor_info_contractor` FOREIGN KEY (`id_contractor`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_contractor_info_user_accounts` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы inwiz.contractor_info: ~2 rows (приблизительно)
DELETE FROM `contractor_info`;
/*!40000 ALTER TABLE `contractor_info` DISABLE KEYS */;
INSERT INTO `contractor_info` (`contr_info_id`, `id_contractor`, `adress_official_ua`, `adress_official_en`, `adress_post_ua`, `adress_post_en`, `director_ua`, `director_en`, `email`, `phone`, `fax`, `contact_person`, `tax_number`, `vat_reg_no`, `rep`, `customer_number`, `created_at`, `created_by`) VALUES
	(1, 236, 'Україна, 03057, г. Київ 57, вул. Довженко, 18', 'Dovzhenko Str. 18 UKR 03057, Kyiv 57, Ukraine', 'Україна, 03057, г. Київ 57, вул. Довженко, 18', 'Dovzhenko Str. 18 UKR 03057, Kyiv 57, Ukraine', 'Струцінський Анатолій Всеволодович', 'Anatoliy Strutsinskyy', '', '380 44 5835382', '380 44 5835382', 'Струцінський Анатолій Всеволодович', '', '', '', '', NULL, 1),
	(2, 237, 'Україна, 03057, г. Київ 57, вул. Довженко, 18', 'Dovzhenko Str. 18 UKR 03057, Kyiv 57, Ukraine', 'Україна, 03057, г. Київ 57, вул. Довженко, 18', 'Dovzhenko Str. 18 UKR 03057, Kyiv 57, Ukraine', 'Струцінський Анатолій Всеволодович', 'Anatoliy Strutsinskyy', '', '380 44 5835382', '380 44 5835382', 'Струцінський Анатолій Всеволодович', '', '', '', '', '2017-08-30 17:36:21', 1),
	(40, 277, 'новый', 'новый', 'новый', 'новый', '', '', '', '', '', '', '', '', '', '', NULL, 1),
	(41, 278, 'sdfsdf', 'asdasd', 'sdf', 'sdf', '', 'sdf', '', '', '', '', '', '', '', '', NULL, 1);
/*!40000 ALTER TABLE `contractor_info` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.document_template
DROP TABLE IF EXISTS `document_template`;
CREATE TABLE IF NOT EXISTS `document_template` (
  `doc_templ_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path_to_template` varchar(255) DEFAULT NULL,
  `html_template` text,
  `contractor_id` int(11) DEFAULT NULL,
  `document_type` enum('dogovor','invoice') DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`doc_templ_id`),
  KEY `FK_document_template_contractor` (`contractor_id`),
  CONSTRAINT `FK_document_template_contractor` FOREIGN KEY (`contractor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы inwiz.document_template: ~5 rows (приблизительно)
DELETE FROM `document_template`;
/*!40000 ALTER TABLE `document_template` DISABLE KEYS */;
INSERT INTO `document_template` (`doc_templ_id`, `name`, `path_to_template`, `html_template`, `contractor_id`, `document_type`, `date`) VALUES
	(2, 'xcvcxv', NULL, '<p><span style="font-size:14px"><span style="font-family:comic sans ms,cursive">vvxcvcxvxcvxcvxcvxcvcvxcvvcvcxvcxvxcvcxvxcvcvxcvxcv</span></span></p>\r\n', 236, 'dogovor', '2017-09-01'),
	(9, 'xcvcxv', NULL, '<p><span style="font-size:14px"><span style="font-family:comic sans ms,cursive">vvxcvcxvxcvxcvxcvxcvcvxcvvcvcxvcxvxcvcxvxcvcvxcvxcv</span></span></p>\r\n', 236, 'invoice', '2017-09-01'),
	(12, 'xcvcxv', NULL, '<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:50%">\r\n			<h2 style="text-align: center;"><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">CONTRACT No 1774</span></span></h2>\r\n\r\n			<p><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></p>\r\n\r\n			<p><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Kyiv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;April 06, 2017</span></span></p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td style="width:50%">\r\n			<p style="text-align: center;"><span style="font-size:14px"><span style="font-family:courier new,courier,monospace"><strong>КОНТРАКТ</strong><strong> № 1774</strong></span></span></p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<h3><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Київ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;06 квітня 2017 р.</span></span></h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 1</span></span></td>\r\n			<td>&nbsp;</td>\r\n			<td><span style="font-size:14px"><span style="font-family:courier new,courier,monospace">Text 2</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 236, 'dogovor', '2017-09-01'),
	(15, 'новый', NULL, '<p>новый</p>\r\n', 277, 'dogovor', '2017-08-25'),
	(16, 'шаблон документа нах', NULL, '<p><span style="font-family:comic sans ms,cursive">sasdasasdsa &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style="font-family:courier new,courier,monospace">ываываываываываыва</span></p>\r\n', 236, 'invoice', '2017-08-24');
/*!40000 ALTER TABLE `document_template` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.dogovor
DROP TABLE IF EXISTS `dogovor`;
CREATE TABLE IF NOT EXISTS `dogovor` (
  `dogovor_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_executor` int(11) NOT NULL COMMENT 'айди фирмы',
  `doc_template_id` int(11) NOT NULL,
  `id_contractor` int(11) NOT NULL COMMENT 'айди контрагента',
  `id_bank_contractor` int(11) DEFAULT NULL,
  `id_bank_executor` int(11) DEFAULT NULL,
  `id_author` int(11) DEFAULT NULL,
  `dogovor_number` varchar(255) DEFAULT NULL COMMENT 'номер договора',
  `delivery_date` date DEFAULT NULL COMMENT 'дата доставки товара по договору',
  `comments` text,
  `total_summ` decimal(10,2) unsigned DEFAULT '0.00' COMMENT 'сумма договора',
  `created_date` date DEFAULT NULL COMMENT 'дата создания',
  `closed_date` date DEFAULT NULL COMMENT 'дата закрытия',
  `updated_date` date DEFAULT NULL,
  `status` enum('в работе','на подписании','не заключили','расторгнут','закрыт','приостановлен','не оплачен','оплачен') NOT NULL DEFAULT 'в работе' COMMENT 'статус',
  `folder_path` text,
  PRIMARY KEY (`dogovor_id`),
  KEY `FK_dogovor_contractor` (`id_executor`),
  KEY `FK_dogovor_contractor_2` (`id_contractor`),
  KEY `FK_dogovor_banks` (`id_bank_contractor`),
  KEY `FK_dogovor_bank_to_contractor` (`id_bank_executor`),
  KEY `FK_dogovor_user` (`id_author`),
  KEY `FK_dogovor_doc_template_to_contractor` (`doc_template_id`),
  CONSTRAINT `FK_dogovor_bank` FOREIGN KEY (`id_bank_executor`) REFERENCES `banks` (`bank_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dogovor_banks` FOREIGN KEY (`id_bank_contractor`) REFERENCES `banks` (`bank_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dogovor_contractor` FOREIGN KEY (`id_executor`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dogovor_contractor_2` FOREIGN KEY (`id_contractor`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dogovor_doc_template_to_contractor` FOREIGN KEY (`doc_template_id`) REFERENCES `document_template` (`doc_templ_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dogovor_user` FOREIGN KEY (`id_author`) REFERENCES `user_old` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.dogovor: ~3 rows (приблизительно)
DELETE FROM `dogovor`;
/*!40000 ALTER TABLE `dogovor` DISABLE KEYS */;
INSERT INTO `dogovor` (`dogovor_id`, `id_executor`, `doc_template_id`, `id_contractor`, `id_bank_contractor`, `id_bank_executor`, `id_author`, `dogovor_number`, `delivery_date`, `comments`, `total_summ`, `created_date`, `closed_date`, `updated_date`, `status`, `folder_path`) VALUES
	(1, 236, 15, 277, 92, 68, NULL, 'sdfsdfsdf6456', '2017-09-29', '', 6465456.00, '2017-09-01', '2017-08-31', '2017-10-01', 'в работе', ''),
	(2, 237, 15, 277, 91, 75, NULL, ' b vbv', NULL, '', 23424.00, '2017-09-01', '2017-09-13', NULL, 'в работе', ''),
	(3, 236, 15, 277, 95, 71, NULL, '223213', '2017-10-08', '', 654.00, '2017-09-08', '2017-09-07', '2017-10-08', 'в работе', ''),
	(4, 237, 15, 277, 95, 75, NULL, 'dfsdf', '2017-09-30', '', 24234.00, '2017-09-15', '2017-09-08', '2017-09-20', '', '');
/*!40000 ALTER TABLE `dogovor` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.dogovor_numeration
DROP TABLE IF EXISTS `dogovor_numeration`;
CREATE TABLE IF NOT EXISTS `dogovor_numeration` (
  `dog_num_id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT '0',
  `executor_id` int(11) NOT NULL DEFAULT '0',
  `date` year(4) DEFAULT NULL,
  PRIMARY KEY (`dog_num_id`),
  KEY `FK_dogovor_numeration_contractor` (`executor_id`),
  CONSTRAINT `FK_dogovor_numeration_contractor` FOREIGN KEY (`executor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы inwiz.dogovor_numeration: ~0 rows (приблизительно)
DELETE FROM `dogovor_numeration`;
/*!40000 ALTER TABLE `dogovor_numeration` DISABLE KEYS */;
/*!40000 ALTER TABLE `dogovor_numeration` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.invoice
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `contractor_id` int(11) NOT NULL,
  `executor_id` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `order_number` varchar(50) NOT NULL,
  `purchase_order` varchar(50) NOT NULL,
  `warehouse_name` varchar(100) NOT NULL,
  `h_s_code` varchar(50) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `net_weight` varchar(50) NOT NULL,
  `gross_weight` varchar(50) NOT NULL,
  `doc_template_id` int(11) NOT NULL,
  `paletts_info` varchar(50) NOT NULL,
  `payment_item` varchar(255) NOT NULL,
  `shipment` varchar(255) NOT NULL,
  `delivery_terms` varchar(255) NOT NULL,
  `total_pcs` varchar(255) NOT NULL,
  `total_summ` decimal(10,2) NOT NULL DEFAULT '0.00',
  `freight` decimal(10,2) NOT NULL DEFAULT '0.00',
  `document_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `dogovor_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `FK_invoice_contractor` (`contractor_id`),
  KEY `FK_invoice_contractor_2` (`executor_id`),
  KEY `FK_invoice_user` (`created_by`),
  KEY `FK_invoice_user_2` (`updated_by`),
  KEY `FK_invoice_doc_template_to_contractor` (`doc_template_id`),
  KEY `FK_invoice_dogovor` (`dogovor_id`),
  CONSTRAINT `FK_invoice_contractor` FOREIGN KEY (`contractor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_invoice_contractor_2` FOREIGN KEY (`executor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_invoice_doc_template_to_contractor` FOREIGN KEY (`doc_template_id`) REFERENCES `document_template` (`doc_templ_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_invoice_dogovor` FOREIGN KEY (`dogovor_id`) REFERENCES `dogovor` (`dogovor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_invoice_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_invoice_user_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.invoice: ~0 rows (приблизительно)
DELETE FROM `invoice`;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`invoice_id`, `contractor_id`, `executor_id`, `number`, `order_number`, `purchase_order`, `warehouse_name`, `h_s_code`, `comment`, `net_weight`, `gross_weight`, `doc_template_id`, `paletts_info`, `payment_item`, `shipment`, `delivery_terms`, `total_pcs`, `total_summ`, `freight`, `document_date`, `created_at`, `created_by`, `updated_at`, `updated_by`, `dogovor_id`) VALUES
	(9, 277, 237, '234234324', '', '', '', '', '', '', '', 12, '', '', '', '', '', 0.00, 0.00, '0000-00-00', '2017-09-01 16:03:32', 1, '0000-00-00 00:00:00', 1, 1);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.inv_ext_lot_number
DROP TABLE IF EXISTS `inv_ext_lot_number`;
CREATE TABLE IF NOT EXISTS `inv_ext_lot_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` int(11) NOT NULL,
  `prod_t_inv_id` int(11) NOT NULL,
  `external_lot_number_en` varchar(500) DEFAULT NULL,
  `external_lot_number_ua` varchar(500) DEFAULT 'Підтвердження замовлення 16410643 вiд 20.01.2016',
  `alloc_quantity` varchar(15) DEFAULT NULL,
  `location` varchar(50) DEFAULT 'LBANDSAW',
  PRIMARY KEY (`id`),
  KEY `FK_inv_ext_lot_number_products_to_invoice` (`prod_t_inv_id`),
  KEY `FK_inv_ext_lot_number_invoice` (`inv_id`),
  CONSTRAINT `FK_inv_ext_lot_number_invoice` FOREIGN KEY (`inv_id`) REFERENCES `products_to_invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_inv_ext_lot_number_products_to_invoice` FOREIGN KEY (`prod_t_inv_id`) REFERENCES `products_to_invoice` (`pr_to_inv_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.inv_ext_lot_number: ~0 rows (приблизительно)
DELETE FROM `inv_ext_lot_number`;
/*!40000 ALTER TABLE `inv_ext_lot_number` DISABLE KEYS */;
/*!40000 ALTER TABLE `inv_ext_lot_number` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.inv_sales_ord_conf
DROP TABLE IF EXISTS `inv_sales_ord_conf`;
CREATE TABLE IF NOT EXISTS `inv_sales_ord_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order_confirmation` varchar(255) DEFAULT 'Підтвердження замовлення ____ ',
  `sales_of` varchar(50) DEFAULT 'вiд ____',
  `inv_id` int(11) NOT NULL,
  `prod_t_inv_id` int(11) NOT NULL,
  `delivery_note` varchar(50) DEFAULT 'Накладна ____, ',
  `delivery_of` varchar(50) DEFAULT 'Доставка ____',
  `departure_warehouse` varchar(500) DEFAULT 'Відвантаження зі складу: {invoice_warehouse_name} по накладній №.: :____',
  PRIMARY KEY (`id`),
  KEY `FK_inv_sales_ord_conf_products_to_invoice` (`inv_id`),
  KEY `FK_inv_sales_ord_conf_products_to_invoice_2` (`prod_t_inv_id`),
  CONSTRAINT `FK_inv_sales_ord_conf_products_to_invoice` FOREIGN KEY (`inv_id`) REFERENCES `products_to_invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_inv_sales_ord_conf_products_to_invoice_2` FOREIGN KEY (`prod_t_inv_id`) REFERENCES `products_to_invoice` (`pr_to_inv_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.inv_sales_ord_conf: ~0 rows (приблизительно)
DELETE FROM `inv_sales_ord_conf`;
/*!40000 ALTER TABLE `inv_sales_ord_conf` DISABLE KEYS */;
/*!40000 ALTER TABLE `inv_sales_ord_conf` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.menu: ~0 rows (приблизительно)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.migration
DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.migration: ~0 rows (приблизительно)
DELETE FROM `migration`;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m160312_050000_create_user', 1499351922);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.po
DROP TABLE IF EXISTS `po`;
CREATE TABLE IF NOT EXISTS `po` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(10) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.po: ~5 rows (приблизительно)
DELETE FROM `po`;
/*!40000 ALTER TABLE `po` DISABLE KEYS */;
INSERT INTO `po` (`id`, `po_no`, `description`) VALUES
	(9, 'ketek_en', '\r\n\r\n    <style>\r\n      div.company-name,div.inovice-name{\r\n    width: 80%;\r\n    margin: 0 auto;\r\n    text-align: center;\r\n    margin-top:1%;\r\n    font-size:20px;\r\n}\r\ntable.company-info{\r\n    text-align: left;\r\n    font-size:10px;\r\n    width: 100%;\r\n    padding-top:3px;\r\n\r\n}\r\n\r\ntable.bill-info{\r\n    border: 1px solid black;\r\n    margin-left:auto;\r\n    margin-right:auto;\r\n    width:95%;\r\n    font-size:10px;\r\n    margin-bottom:10px;\r\n\r\n}\r\ntable.bill-info td{\r\n    padding-left:5px;\r\n    font-size:10px;\r\n}\r\ntd.bill-info-col{\r\n    font-size:13px;\r\n    text-align:left;\r\n    border-right:1px solid black;\r\n    padding:2px;\r\n}\r\n\r\ntable.table-products{\r\n    border:1px solid black;\r\n    margin-left:auto;\r\n    margin-right:auto;\r\n    width:95%;\r\n}\r\ntd.product-header-col\r\n{\r\n    padding-left:2px;\r\n    font-size:13px;\r\n    border-right:1px solid black;\r\n    border-bottom:1px solid black;\r\n}\r\n\r\ntr.product-footer-col td{\r\n    padding-left:2px;\r\n    text-align:center;\r\n    border-right:1px solid black;\r\n    border-top:1px solid black;\r\n    font-size:13px;\r\n}\r\ntr.product-footer-col td.description-row{\r\n\r\n    text-align:left;\r\n\r\n}\r\ntr.product-footer-total td{\r\n    padding-left:2px;\r\n    font-size:13px;\r\n    border-right:1px solid black;\r\n    text-align:left;\r\n    border-top:1px solid black;\r\n}\r\n\r\ntr.product-header-subrow td{\r\n    text-align:center;\r\n    font-size:13px;\r\n    border-bottom:1px solid black;\r\n\r\n}\r\ntr#subrow td{\r\n\r\n    border-bottom:1px solid black;\r\n\r\n}\r\ntr.product-item-row td{\r\n    text-align:center;\r\n    font-size:10px;\r\n    line-height:20px;\r\n    padding-bottom: 5px;\r\n\r\n}\r\ntr.product-item-row>td.description-row{\r\n    text-align:left;\r\n\r\n\r\n}\r\n\r\n    </style>\r\n<div class="company-name">KETEC\r\n  PRECISION TOOLING CO.LTD </div>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" >Address:No.7,Lifeng\r\n        Rd.Mingzhu Industrial Park,Conghua,Guangzhou,P.R.China:Post Code:510931</td>\r\n    </tr>\r\n    <tr>\r\n      <td> Tel:+8620 37965500 </td>\r\n      <td > Fax:+86 20 37965133 </td>\r\n      <td> Email:international@ketectool.com </td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<hr>\r\n<div class="inovice-name">COMMERCIAL INVOICE </div>\r\n<table align="center" cellpadding="0"  cellspacing="0" class="bill-info">\r\n  <tbody>\r\n    <tr>\r\n      <td class="bill-info-col"> Bill\r\n        To: </td>\r\n      <td> INWIZ </td>\r\n      <td class="bill-info-col"> Invoice No: </td>\r\n      <td> XK-2016-10-19-UKR161012 </td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col"> Ship To: </td>\r\n      <td> INWIZ </td>\r\n      <td class="bill-info-col"> Order No: </td>\r\n      <td> UKR161012 </td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Address: </td>\r\n      <td> 2\r\n        Timiryazevskaya str. 04014 Kyiv,Ukraine </td>\r\n      <td class="bill-info-col"> Payment Item: </td>\r\n      <td> CPT\r\n        Kyiv Ukraine </td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Tel: </td>\r\n      <td> +380445373257 </td>\r\n      <td class="bill-info-col"> Shipment: </td>\r\n      <td></td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<table align="center" cellpadding="0"  cellspacing="0" class="table-products" >\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="2" scope="col" class="product-header-col">Comment</td>\r\n      <td colspan="2" scope="col" class="product-header-col">Cpx Kyiv Ukraine VAT Paid</td>\r\n      <td colspan="4" scope="col" class="product-header-col">H.S.CODE:8207300090 punch press tooling</td>\r\n    </tr>\r\n    <tr class="product-header-subrow" id="subrow">\r\n      <td class="item-position">&nbsp;</td>\r\n      <td class="part-code">Part code</td>\r\n      <td colspan="2" class="description">Description (mm)</td>\r\n      <td class="amount">Amount</td>\r\n      <td class="unit">Unit/$</td>\r\n      <td class="total">Total/$</td>\r\n      <td class="remark">Remark</td>\r\n    </tr>\r\n   \r\n    <tr class="product-item-row">\r\n      <td class="item-position-row">22</td>\r\n      <td class="part-code-row">HT.BP2SQ.</td>\r\n      <td class="description-row" colspan="2" >B STN Thk Turret 85 Punch SQ   10/10</td>\r\n      <td class="amount-row">1</td>\r\n      <td class="unit-row">34.9</td>\r\n      <td class="total-row">34.9</td>\r\n      <td class="remark-row">0+135DEG</td>\r\n    </tr>\r\n   <tr class="product-item-row">\r\n      <td class="item-position-row">22</td>\r\n      <td class="part-code-row">HT.BP2SQ.</td>\r\n      <td class="description-row" colspan="2" >B STN Thk Turret 85 Punch SQ   10/10</td>\r\n      <td class="amount-row">1</td>\r\n      <td class="unit-row">34.9</td>\r\n      <td class="total-row">34.9</td>\r\n      <td class="remark-row">0+135DEG</td>\r\n    </tr>\r\n    <tr class="product-item-row">\r\n      <td class="item-position-row">22</td>\r\n      <td class="part-code-row">HT.BP2SQ.</td>\r\n      <td class="description-row" colspan="2" >B STN Thk Turret 85 Punch SQ   10/10</td>\r\n      <td class="amount-row">1</td>\r\n      <td class="unit-row">34.9</td>\r\n      <td class="total-row">34.9</td>\r\n      <td class="remark-row">0+135DEG</td>\r\n    </tr>\r\n    <tr class="product-item-row">\r\n      <td class="item-position-row">22</td>\r\n      <td class="part-code-row">HT.BP2SQ.</td>\r\n      <td class="description-row" colspan="2" >B STN Thk Turret 85 Punch SQ   10/10</td>\r\n      <td class="amount-row">1</td>\r\n      <td class="unit-row">34.9</td>\r\n      <td class="total-row">34.9</td>\r\n      <td class="remark-row">0+135DEG</td>\r\n    </tr>\r\n    <tr class="product-item-row">\r\n      <td colspan="8">$product_items</td>\r\n    </tr>\r\n    \r\n     \r\n    \r\n    <tr class="product-item-row">\r\n      <td>&nbsp;</td>\r\n      <td>Freight</td>\r\n      <td colspan="2" class="description-row">Freight</td>\r\n      <td>1</td>\r\n      <td>195.75</td>\r\n      <td><p>195.75</p></td>\r\n      <td>35 kg DHL - $195.75</td>\r\n    </tr>\r\n    <tr class="product-footer-col">\r\n      <td  colspan="3" class="description-row">Country of origin of position 1-42:(China)</td>\r\n      <td width="173"><div align="right">Total pcs:</div></td>\r\n      <td>45.000</td>\r\n      <td colspan="2">Total Value(US$):</td>\r\n      <td>1922.85</td>\r\n    </tr>\r\n    <tr class="product-footer-total">\r\n      <td colspan="3" class="description-row" >Total Value (after add-ons or discount):</td>\r\n      <td colspan="5">&nbsp;</td>\r\n    </tr>\r\n    <tr class="product-footer-total ">\r\n      <td colspan="3"><div align="right">Remark:</div></td>\r\n      <td colspan="5"><div align="left">paid off taxes</div></td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<p></p>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" >Declaration Statement:I hereby certify the the information on this invocoe is true and correct and the contents and value of this </td>\r\n    </tr>\r\n    <tr>\r\n      <td> shipments is as stated above.</td>\r\n      <td >  </td>\r\n      <td>  </td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<hr>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" >These commodities,technology of software were exported from China in accordance with the Export Administratioin Regulations.</td>\r\n    </tr>\r\n    <tr>\r\n      <td> Diversion contrary to Chinese law prohibited.</td>\r\n      <td >  </td>\r\n      <td> Date:  </td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n'),
	(10, 'amada_en', '\r\n<style>\r\ndiv.company-name{\r\n	width: 100%;\r\n	 margin: 0 auto;\r\n	 text-align: right; \r\n	 margin-top:1%;\r\n	 font-size:20px;\r\n}\r\n\r\ntable.company-info{\r\n	 text-align: right; \r\n	font-size:10px;\r\n	 width: 100%;\r\n    margin-right: 0px;\r\n	padding-top:3px;\r\n	\r\n	}\r\n	\r\n	div.contractor-name{\r\n     text-align: left; \r\n	font-size:12px;\r\n	 width: 100%;\r\n    margin-left: 0px;\r\n	padding-top:3px;\r\n}\r\n\r\ndiv.invoice-name{\r\n     text-align: center; \r\n	font-size:14px;\r\n	 width: 100%;\r\n    margin: 0 auto;\r\n	padding-top:10px;\r\n	font-weight:bold;\r\n}\r\n	\r\n	\r\n	table.bill-info{\r\n		border: 1px solid black;\r\n		margin-top:10px;\r\n		width: 100%;\r\n		font-size:10px;\r\n        margin-bottom:10px;\r\n		\r\n		}\r\n		table.bill-info td{\r\n		padding-left:5px;\r\n		font-size:10px;\r\n		}\r\n		td.bill-info-col{\r\n			font-size:13px;\r\n			text-align:left;\r\n			border-right:1px solid black;\r\n			padding:2px;\r\n						}\r\n	\r\n		table.table-products{\r\n	/*border:1px solid black;*/\r\n	width:100%;\r\n	margin-top:10px;\r\n	border-bottom:1px solid black;\r\n	}\r\n		table.table-products th{\r\n	padding:3px;\r\n	text-align:center;\r\n	font-size:12px;\r\n	font-weight:bold;\r\n	\r\n	}\r\n		\r\n	td.sales-order{\r\n		text-align:center;\r\n		font-size:12px;\r\n		font-style:italic;\r\n		}	\r\n		\r\n		table.table-ext-lot-number{\r\n		width: 100%;\r\n        margin: 0 auto;\r\n		\r\n		}\r\n		table.table-ext-lot-number th{\r\n		font-size:12px;\r\n		font-weight:bold;\r\n		border-bottom:1px solid black;\r\n		text-align:left;\r\n		}\r\n		table.table-ext-lot-number td{\r\n		font-size:12px;\r\n	\r\n		\r\n		text-align:left;\r\n		}\r\n	    table.table-products th.item,table.table-products td.item{\r\n			 width:6%;\r\n			text-align:left;\r\n			font-size:12px;\r\n		}\r\n		th.product,td.product{\r\n			 width:50%;\r\n			text-align:left;\r\n			font-size:12px;\r\n		}\r\n		th.quantity,td.quantity{\r\n			 width:10%;\r\n			text-align:center;\r\n			font-size:12px;\r\n		}\r\n		th.unit,td.unit{\r\n			 width:15%;\r\n			text-align:center;\r\n			font-size:12px;\r\n		}\r\n		th.total,td.total{\r\n			 width:16%;\r\n			text-align:center;\r\n			font-size:12px;\r\n		}\r\n		\r\n		\r\n		\r\n</style>\r\n<div class="company-name">AMADA MACHINE TOOLS EUROPE GmbH</div>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td>Amada Allee 3-42761 Haan</td>\r\n      <td> Telefon 02104/1777-0 </td>\r\n    </tr>\r\n    <tr>\r\n      <td> Postfach 1154-42755 Haan</td>\r\n      <td> Telefon 02104/1777-0  </td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<hr>\r\n<div class="contractor-name">Batex Ldt. 18 Dovzhenko str. KYIV-UKRAINE 03057 UKRAINE</div>\r\n<div class="invoice-name">INVOICE 171470114</div>\r\n\r\n<table class="bill-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td class="bill-info-col"> Customer number</td>\r\n      <td> 10001762 </td>\r\n      <td class="bill-info-col"> Document date</td>\r\n      <td>05.04.2016</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col"> Purchase order</td>\r\n      <td>&nbsp;</td>\r\n      <td class="bill-info-col"> Rep</td>\r\n      <td>Hr. von der Hoh</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Your Tax Number</td>\r\n      <td>&nbsp;</td>\r\n      <td class="bill-info-col"> Contact</td>\r\n      <td>Arif Claudia</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Your VAT reg. no.</td>\r\n      <td>&nbsp;</td>\r\n      <td class="bill-info-col">Extension</td>\r\n      <td></td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">&nbsp;</td>\r\n      <td>&nbsp;</td>\r\n      <td class="bill-info-col">Email</td>\r\n      <td>claudia.arif@amadamachinetools.de</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<div class="contractor-name">Order 20.1.2016</div>\r\n\r\n\r\n\r\n\r\n\r\n<table   class="table-products">\r\n  <tr>\r\n    <th scope="col" class="item">Item</th>\r\n    <th scope="col" class="product" style="text-align:left;">Product</th>\r\n    <th scope="col" class="quantity">Quantity</th>\r\n    <th scope="col" class="unit">Unit price EUR </th>\r\n    <th scope="col" class="total">Total price EUR</th>\r\n  </tr>\r\n  <tr id="sales-order">\r\n    <td colspan="5" class="sales-order">Sales order confirmationv16410643 of 20.01.2016<br>Delivery note 17430020, Delivey of 01.04.2016<br>departure warehouse:Amada Austria GmbH,A-2630<br> Ternitz,Wassergasse 1 with delivery note no.:17130069</td>\r\n  </tr>\r\n  <tr id="product-row">\r\n    <td class="item">105</td>\r\n    <td class="product">C303411003401000 <br> Bi-Metal Bandsaw Blade<br> SGLB 34x3/4 <br>Country of origin: OESTERREICH <br>Customs Tarif-Nr:82022000</td>\r\n    <td class="quantity">644 m</td>\r\n    <td class="unit">4.75</td>\r\n    <td class="total">3059.00</td>\r\n  </tr>\r\n  <tr id="external-lot-row">\r\n    <td>&nbsp;</td>\r\n    <td colspan="3"><table class="table-ext-lot-number">\r\n  <tr>\r\n    <th scope="col">External lot number</th>\r\n    <th scope="col">Alloc. quantity</th>\r\n    <th scope="col">Location</th>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n</table>\r\n</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n   <tr id="sales-order">\r\n    <td colspan="5" class="sales-order">Sales order confirmationv16410643 of 20.01.2016<br>Delivery note 17430020, Delivey of 01.04.2016<br>departure warehouse:Amada Austria GmbH,A-2630<br> Ternitz,Wassergasse 1 with delivery note no.:17130069</td>\r\n  </tr>\r\n  <tr id="product-row">\r\n    <td class="item">105</td>\r\n    <td class="product">C303411003401000 <br> Bi-Metal Bandsaw Blade<br> SGLB 34x3/4 <br>Country of origin: OESTERREICH <br>Customs Tarif-Nr:82022000</td>\r\n    <td class="quantity">644 m</td>\r\n    <td class="unit">4.75</td>\r\n    <td class="total">3059.00</td>\r\n  </tr>\r\n  <tr id="external-lot-row">\r\n    <td>&nbsp;</td>\r\n    <td colspan="3"><table class="table-ext-lot-number">\r\n  <tr>\r\n    <th scope="col">External lot number</th>\r\n    <th scope="col">Alloc. quantity</th>\r\n    <th scope="col">Location</th>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n</table>\r\n</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td colspan="2">net ammount</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>37272.06</td>\r\n  </tr>\r\n</table>\r\n\r\n\r\n\r\n\r\n\r\n<table class="bill-info"  style="width:80%;" cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td class="bill-info-col">Delivery terms</td>\r\n      <td><span class="bill-info-col">EXW ex works Ternitz IT 2000</span></td>\r\n      <td class="bill-info-col">&nbsp;</td>\r\n    \r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Payment</td>\r\n      <td><span class="bill-info-col">prepayment</span></td>\r\n      <td class="bill-info-col">&nbsp;</td>\r\n      \r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Shipping type</td>\r\n      <td><span class="bill-info-col">Self collect</span></td>\r\n      <td class="bill-info-col">&nbsp;</td>\r\n      \r\n    </tr>\r\n    <tr>\r\n      <td  class="bill-info-col">Our general sales and delivery conditions apply exclusively</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">All goods delivered remain our property until full payment has been received.</td>\r\n    </tr>\r\n    <tr>\r\n      <td  class="bill-info-col">Пакування: 6 палет (1ч74ч74ч55см)</td>\r\n    </tr>\r\n    <tr>\r\n      <td  class="bill-info-col">Вага нетто:16449,76 Вага брутто:1744 кг</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<p>&nbsp;</p>'),
	(11, 'ketek_ua', '\r\n    <style>\r\n    div.company-name,div.inovice-name{\r\n    width: 80%;\r\n    margin: 0 auto;\r\n    text-align: center;\r\n    margin-top:1%;\r\n    font-size:20px;\r\n}\r\ntable.company-info{\r\n    text-align: left;\r\n    font-size:10px;\r\n    width: 100%;\r\n    padding-top:3px;\r\n\r\n}\r\n\r\ntable.bill-info{\r\n    border: 1px solid black;\r\n    margin-left:auto;\r\n    margin-right:auto;\r\n    width:95%;\r\n    font-size:10px;\r\n    margin-bottom:10px;\r\n\r\n}\r\ntable.bill-info td{\r\n    padding-left:5px;\r\n    font-size:10px;\r\n}\r\ntd.bill-info-col{\r\n    font-size:13px;\r\n    text-align:left;\r\n    border-right:1px solid black;\r\n    padding:2px;\r\n}\r\n\r\ntable.table-products{\r\n    border:1px solid black;\r\n    margin-left:auto;\r\n    margin-right:auto;\r\n    width:95%;\r\n}\r\ntd.product-header-col\r\n{\r\n    padding-left:2px;\r\n    font-size:13px;\r\n    border-right:1px solid black;\r\n    border-bottom:1px solid black;\r\n}\r\n\r\ntr.product-footer-col td{\r\n    padding-left:2px;\r\n    text-align:center;\r\n    border-right:1px solid black;\r\n    border-top:1px solid black;\r\n    font-size:13px;\r\n}\r\ntr.product-footer-col td.description-row{\r\n\r\n    text-align:left;\r\n\r\n}\r\ntr.product-footer-total td{\r\n    padding-left:2px;\r\n    font-size:13px;\r\n    border-right:1px solid black;\r\n    text-align:left;\r\n    border-top:1px solid black;\r\n}\r\n\r\ntr.product-header-subrow td{\r\n    text-align:center;\r\n    font-size:13px;\r\n    border-bottom:1px solid black;\r\n\r\n}\r\ntr#subrow td{\r\n\r\n    border-bottom:1px solid black;\r\n\r\n}\r\ntr.product-item-row td{\r\n    text-align:center;\r\n    font-size:10px;\r\n    line-height:20px;\r\n    padding-bottom: 5px;\r\n\r\n}\r\ntr.product-item-row>td.description-row{\r\n    text-align:left;\r\n\r\n\r\n}\r\n\r\n    </style>\r\n\r\n\r\n<div class="company-name">Переклад інвойсу {company_name}</div>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" ><span class="bill-info-col">Адреса</span>:{company_address}</td>\r\n    </tr>\r\n    <tr>\r\n      <td> <span class="bill-info-col">Телефон</span>:{company_phone}</td>\r\n      <td > Факс:{company_fax} </td>\r\n      <td> Email:{company_email} </td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<hr>\r\n<div class="inovice-name">ІНВОЙС </div>\r\n<table class="bill-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td class="bill-info-col">Покупець: </td>\r\n      <td> {executor_name} </td>\r\n      <td class="bill-info-col"> Інвойс: </td>\r\n      <td>{invoice_number}</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Відвантажено: </td>\r\n      <td>{executor_name}</td>\r\n      <td class="bill-info-col">Замовлення : </td>\r\n      <td> {order_number} </td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Адреса: </td>\r\n      <td>{executor_address}</td>\r\n      <td class="bill-info-col">Оплата: </td>\r\n      <td>&nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Телефон: </td>\r\n      <td>{executor_phone}</td>\r\n      <td class="bill-info-col">Доставка: </td>\r\n      <td>{shipping_type} Київ Україна</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<table  cellspacing="0" cellpadding="0" class="table-products" >\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="2" scope="col" class="product-header-col">Примітка</td>\r\n      <td colspan="2" scope="col" class="product-header-col">{shipping_type} Київ Україна</td>\r\n      <td colspan="4" scope="col" class="product-header-col">H.S.CODE:{h_s_code}</td>\r\n    </tr>\r\n    <tr class="product-header-subrow" id="subrow">\r\n      <td class="item-position">Поз</td>\r\n      <td class="part-code">Код </td>\r\n      <td colspan="2" class="description">Опис , мм</td>\r\n      <td class="amount">Кіл-ть<br>\r\nшт</td>\r\n      <td class="unit">Ціна<br>\r\nДол. США</td>\r\n      <td class="total">Сума<br>\r\nДол. США</td>\r\n      <td class="remark">Прим.</td>\r\n    </tr>\r\n   \r\n    \r\n   \r\n    \r\n    <tr class="product-item-row">\r\n      <td class="item-position-row">{item_position}</td>\r\n      <td class="part-code-row">{product_code}</td>\r\n      <td class="description-row" colspan="2" >{<span class="part-code-row">product</span>_name}</td>\r\n      <td class="amount-row">{product_quantity}</td>\r\n      <td class="unit-row">{product_price}</td>\r\n      <td class="total-row">{product_total}</td>\r\n      <td class="remark-row">{product_remark}</td>\r\n    </tr>\r\n    <tr class="product-item-row">\r\n      <td colspan="8">$product_items</td>\r\n    </tr>\r\n    \r\n     \r\n    \r\n    <tr class="product-item-row">\r\n      <td>&nbsp;</td>\r\n      <td>Вартість доставки</td>\r\n      <td colspan="2" class="description-row"></td>\r\n      <td>1</td>\r\n      <td>{freight}</td>\r\n      <td><p>{freight}</p></td>\r\n      <td>{weight} кг DHL - ${freight}</td>\r\n    </tr>\r\n    <tr class="product-footer-col">\r\n      <td  colspan="3" class="description-row">Країна походження (позиції 1-{invoice_quantity_items}): Китай</td>\r\n      <td width="173"><div align="right">Всього шт:</div></td>\r\n      <td>{invoice_total_quantity}</td>\r\n      <td colspan="2">Сума(долларів США):</td>\r\n      <td>{invoice_total_summ}</td>\r\n    </tr>\r\n    <tr class="product-footer-total">\r\n      <td colspan="3" class="description-row" >&nbsp;</td>\r\n      <td colspan="5">&nbsp;</td>\r\n    </tr>\r\n    <tr class="product-footer-total ">\r\n      <td colspan="3"><div align="right"></div></td>\r\n      <td colspan="5"><div align="left"></div></td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<p></p>\r\n<hr>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" >Даним підтверджуємо,що інформація в інвойсі вірна; опис і ціни відповідають вищевказаному.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Дата {invoice_date}</td>\r\n      <td >  </td>\r\n      <td>&nbsp;</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n'),
	(12, 'amada_ua', '\r\n<style>\r\ndiv.company-name{\r\n	width: 100%;\r\n	 margin: 0 auto;\r\n	 text-align: right; \r\n	 margin-top:1%;\r\n	 font-size:20px;\r\n}\r\n\r\ntable.company-info{\r\n	 text-align: right; \r\n	font-size:10px;\r\n	 width: 100%;\r\n    margin-right: 0px;\r\n	padding-top:3px;\r\n	\r\n	}\r\n	\r\n	div.contractor-name{\r\n     text-align: left; \r\n	font-size:12px;\r\n	 width: 100%;\r\n    margin-left: 0px;\r\n	padding-top:3px;\r\n}\r\n\r\ndiv.invoice-name{\r\n     text-align: center; \r\n	font-size:14px;\r\n	 width: 100%;\r\n    margin: 0 auto;\r\n	padding-top:10px;\r\n	font-weight:bold;\r\n}\r\n	\r\n	\r\n	table.bill-info{\r\n		border: 1px solid black;\r\n		margin-top:10px;\r\n		width: 100%;\r\n		font-size:10px;\r\n        margin-bottom:10px;\r\n		\r\n		}\r\n		table.bill-info td{\r\n		padding-left:5px;\r\n		font-size:10px;\r\n		}\r\n		td.bill-info-col{\r\n			font-size:13px;\r\n			text-align:left;\r\n			border-right:1px solid black;\r\n			padding:2px;\r\n						}\r\n	\r\n		table.table-products{\r\n	/*border:1px solid black;*/\r\n	width:100%;\r\n	margin-top:10px;\r\n	border-bottom:1px solid black;\r\n	}\r\n		table.table-products th{\r\n	padding:3px;\r\n	text-align:center;\r\n	font-size:12px;\r\n	font-weight:bold;\r\n	\r\n	}\r\n		\r\n	td.sales-order{\r\n		text-align:center;\r\n		font-size:12px;\r\n		font-style:italic;\r\n		}	\r\n		\r\n		table.table-ext-lot-number{\r\n		width: 100%;\r\n        margin: 0 auto;\r\n		\r\n		}\r\n		table.table-ext-lot-number th{\r\n		font-size:12px;\r\n		font-weight:bold;\r\n		border-bottom:1px solid black;\r\n		text-align:left;\r\n		}\r\n		table.table-ext-lot-number td{\r\n		font-size:12px;\r\n	\r\n		\r\n		text-align:left;\r\n		}\r\n	    table.table-products th.item,table.table-products td.item{\r\n			 width:6%;\r\n			text-align:left;\r\n			font-size:12px;\r\n		}\r\n		th.product,td.product{\r\n			 width:50%;\r\n			text-align:left;\r\n			font-size:12px;\r\n		}\r\n		th.quantity,td.quantity{\r\n			 width:10%;\r\n			text-align:center;\r\n			font-size:12px;\r\n		}\r\n		th.unit,td.unit{\r\n			 width:15%;\r\n			text-align:center;\r\n			font-size:12px;\r\n		}\r\n		th.total,td.total{\r\n			 width:16%;\r\n			text-align:center;\r\n			font-size:12px;\r\n		}\r\n		\r\n		\r\n		\r\n</style>\r\n<div class="company-name">AMADA MACHINE TOOLS EUROPE GmbH</div>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td>Amada Allee 3-42761 Haan</td>\r\n      <td> Telefon 02104/1777-0 </td>\r\n    </tr>\r\n    <tr>\r\n      <td> Postfach 1154-42755 Haan</td>\r\n      <td> Telefon 02104/1777-0  </td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<hr>\r\n<div class="contractor-name">Batex Ldt. 18 Dovzhenko str. KYIV-UKRAINE 03057 UKRAINE</div>\r\n<div class="invoice-name">INVOICE 171470114</div>\r\n\r\n<table class="bill-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td class="bill-info-col"> Customer number</td>\r\n      <td> 10001762 </td>\r\n      <td class="bill-info-col"> Document date</td>\r\n      <td>05.04.2016</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col"> Purchase order</td>\r\n      <td>&nbsp;</td>\r\n      <td class="bill-info-col"> Rep</td>\r\n      <td>Hr. von der Hoh</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Your Tax Number</td>\r\n      <td>&nbsp;</td>\r\n      <td class="bill-info-col"> Contact</td>\r\n      <td>Arif Claudia</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Your VAT reg. no.</td>\r\n      <td>&nbsp;</td>\r\n      <td class="bill-info-col">Extension</td>\r\n      <td></td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">&nbsp;</td>\r\n      <td>&nbsp;</td>\r\n      <td class="bill-info-col">Email</td>\r\n      <td>claudia.arif@amadamachinetools.de</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<div class="contractor-name">Order 20.1.2016</div>\r\n\r\n\r\n\r\n\r\n\r\n<table   class="table-products">\r\n  <tr>\r\n    <th scope="col" class="item">Item</th>\r\n    <th scope="col" class="product" style="text-align:left;">Product</th>\r\n    <th scope="col" class="quantity">Quantity</th>\r\n    <th scope="col" class="unit">Unit price EUR </th>\r\n    <th scope="col" class="total">Total price EUR</th>\r\n  </tr>\r\n  <tr id="sales-order">\r\n    <td colspan="5" class="sales-order">Sales order confirmationv16410643 of 20.01.2016<br>Delivery note 17430020, Delivey of 01.04.2016<br>departure warehouse:Amada Austria GmbH,A-2630<br> Ternitz,Wassergasse 1 with delivery note no.:17130069</td>\r\n  </tr>\r\n  <tr id="product-row">\r\n    <td class="item">105</td>\r\n    <td class="product">C303411003401000 <br> Bi-Metal Bandsaw Blade<br> SGLB 34x3/4 <br>Country of origin: OESTERREICH <br>Customs Tarif-Nr:82022000</td>\r\n    <td class="quantity">644 m</td>\r\n    <td class="unit">4.75</td>\r\n    <td class="total">3059.00</td>\r\n  </tr>\r\n  <tr id="external-lot-row">\r\n    <td>&nbsp;</td>\r\n    <td colspan="3"><table class="table-ext-lot-number">\r\n  <tr>\r\n    <th scope="col">External lot number</th>\r\n    <th scope="col">Alloc. quantity</th>\r\n    <th scope="col">Location</th>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n</table>\r\n</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n   <tr id="sales-order">\r\n    <td colspan="5" class="sales-order">Sales order confirmationv16410643 of 20.01.2016<br>Delivery note 17430020, Delivey of 01.04.2016<br>departure warehouse:Amada Austria GmbH,A-2630<br> Ternitz,Wassergasse 1 with delivery note no.:17130069</td>\r\n  </tr>\r\n  <tr id="product-row">\r\n    <td class="item">105</td>\r\n    <td class="product">C303411003401000 <br> Bi-Metal Bandsaw Blade<br> SGLB 34x3/4 <br>Country of origin: OESTERREICH <br>Customs Tarif-Nr:82022000</td>\r\n    <td class="quantity">644 m</td>\r\n    <td class="unit">4.75</td>\r\n    <td class="total">3059.00</td>\r\n  </tr>\r\n  <tr id="external-lot-row">\r\n    <td>&nbsp;</td>\r\n    <td colspan="3"><table class="table-ext-lot-number">\r\n  <tr>\r\n    <th scope="col">External lot number</th>\r\n    <th scope="col">Alloc. quantity</th>\r\n    <th scope="col">Location</th>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n  <tr>\r\n    <td>UA1215533601BA</td>\r\n    <td>130 m</td>\r\n    <td>LBANDSAW</td>\r\n  </tr>\r\n</table>\r\n</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td colspan="2">net ammount</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>37272.06</td>\r\n  </tr>\r\n</table>\r\n\r\n\r\n\r\n\r\n\r\n<table class="bill-info"  style="width:80%;" cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td class="bill-info-col">Delivery terms</td>\r\n      <td><span class="bill-info-col">EXW ex works Ternitz IT 2000</span></td>\r\n      <td class="bill-info-col">&nbsp;</td>\r\n    \r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Payment</td>\r\n      <td><span class="bill-info-col">prepayment</span></td>\r\n      <td class="bill-info-col">&nbsp;</td>\r\n      \r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Shipping type</td>\r\n      <td><span class="bill-info-col">Self collect</span></td>\r\n      <td class="bill-info-col">&nbsp;</td>\r\n      \r\n    </tr>\r\n    <tr>\r\n      <td  class="bill-info-col">Our general sales and delivery conditions apply exclusively</td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">All goods delivered remain our property until full payment has been received.</td>\r\n    </tr>\r\n    <tr>\r\n      <td  class="bill-info-col">Пакування: 6 палет (1ч74ч74ч55см)</td>\r\n    </tr>\r\n    <tr>\r\n      <td  class="bill-info-col">Вага нетто:16449,76 Вага брутто:1744 кг</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<p>&nbsp;</p>'),
	(13, 'ketek_en_o', '\r\n\r\n\r\n    <style>\r\n      div.company-name,div.inovice-name{\r\n    width: 80%;\r\n    margin: 0 auto;\r\n    text-align: center;\r\n    margin-top:1%;\r\n    font-size:20px;\r\n}\r\ntable.company-info{\r\n    text-align: left;\r\n    font-size:10px;\r\n    width: 100%;\r\n    padding-top:3px;\r\n\r\n}\r\n\r\ntable.bill-info{\r\n    border: 1px solid black;\r\n    margin-left:auto;\r\n    margin-right:auto;\r\n    width:95%;\r\n    font-size:10px;\r\n    margin-bottom:10px;\r\n\r\n}\r\ntable.bill-info td{\r\n    padding-left:5px;\r\n    font-size:10px;\r\n}\r\ntd.bill-info-col{\r\n    font-size:13px;\r\n    text-align:left;\r\n    border-right:1px solid black;\r\n    padding:2px;\r\n}\r\n\r\ntable.table-products{\r\n    border:1px solid black;\r\n    margin-left:auto;\r\n    margin-right:auto;\r\n    width:95%;\r\n}\r\ntd.product-header-col\r\n{\r\n    padding-left:2px;\r\n    font-size:13px;\r\n    border-right:1px solid black;\r\n    border-bottom:1px solid black;\r\n}\r\n\r\ntr.product-footer-col td{\r\n    padding-left:2px;\r\n    text-align:center;\r\n    border-right:1px solid black;\r\n    border-top:1px solid black;\r\n    font-size:13px;\r\n}\r\ntr.product-footer-col td.description-row{\r\n\r\n    text-align:left;\r\n\r\n}\r\ntr.product-footer-total td{\r\n    padding-left:2px;\r\n    font-size:13px;\r\n    border-right:1px solid black;\r\n    text-align:left;\r\n    border-top:1px solid black;\r\n}\r\n\r\ntr.product-header-subrow td{\r\n    text-align:center;\r\n    font-size:13px;\r\n    border-bottom:1px solid black;\r\n\r\n}\r\ntr#subrow td{\r\n\r\n    border-bottom:1px solid black;\r\n\r\n}\r\ntr.product-item-row td{\r\n    text-align:center;\r\n    font-size:10px;\r\n    line-height:20px;\r\n    padding-bottom: 5px;\r\n\r\n}\r\ntr.product-item-row>td.description-row{\r\n    text-align:left;\r\n\r\n\r\n}\r\n\r\n    </style>\r\n<div class="company-name">KETEC\r\n  PRECISION TOOLING CO.LTD </div>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" >Address:No.7,Lifeng\r\n        Rd.Mingzhu Industrial Park,Conghua,Guangzhou,P.R.China:Post Code:510931</td>\r\n    </tr>\r\n    <tr>\r\n      <td> Tel:+8620 37965500 </td>\r\n      <td > Fax:+86 20 37965133 </td>\r\n      <td> Email:international@ketectool.com </td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<hr>\r\n<div class="inovice-name">COMMERCIAL INVOICE </div>\r\n<table class="bill-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td class="bill-info-col"> Bill\r\n        To: </td>\r\n      <td> INWIZ </td>\r\n      <td class="bill-info-col"> Invoice No: </td>\r\n      <td> XK-2016-10-19-UKR161012 </td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col"> Ship To: </td>\r\n      <td> INWIZ </td>\r\n      <td class="bill-info-col"> Order No: </td>\r\n      <td> UKR161012 </td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Address: </td>\r\n      <td> 2\r\n        Timiryazevskaya str. 04014 Kyiv,Ukraine </td>\r\n      <td class="bill-info-col"> Payment Item: </td>\r\n      <td> CPT\r\n        Kyiv Ukraine </td>\r\n    </tr>\r\n    <tr>\r\n      <td class="bill-info-col">Tel: </td>\r\n      <td> +380445373257 </td>\r\n      <td class="bill-info-col"> Shipment: </td>\r\n      <td></td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<table  cellspacing="0" cellpadding="0" class="table-products" >\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="2" scope="col" class="product-header-col">Comment</td>\r\n      <td colspan="2" scope="col" class="product-header-col">Cpx Kyiv Ukraine VAT Paid</td>\r\n      <td colspan="4" scope="col" class="product-header-col">H.S.CODE:8207300090 punch press tooling</td>\r\n    </tr>\r\n    <tr class="product-header-subrow" id="subrow">\r\n      <td class="item-position">&nbsp;</td>\r\n      <td class="part-code">Part code</td>\r\n      <td colspan="2" class="description">Description (mm)</td>\r\n      <td class="amount">Amount</td>\r\n      <td class="unit">Unit/$</td>\r\n      <td class="total">Total/$</td>\r\n      <td class="remark">Remark</td>\r\n    </tr>\r\n   \r\n    <tr class="product-item-row">\r\n      <td class="item-position-row">22</td>\r\n      <td class="part-code-row">HT.BP2SQ.</td>\r\n      <td class="description-row" colspan="2" >B STN Thk Turret 85 Punch SQ   10/10</td>\r\n      <td class="amount-row">1</td>\r\n      <td class="unit-row">34.9</td>\r\n      <td class="total-row">34.9</td>\r\n      <td class="remark-row">0+135DEG</td>\r\n    </tr>\r\n   <tr class="product-item-row">\r\n      <td class="item-position-row">22</td>\r\n      <td class="part-code-row">HT.BP2SQ.</td>\r\n      <td class="description-row" colspan="2" >B STN Thk Turret 85 Punch SQ   10/10</td>\r\n      <td class="amount-row">1</td>\r\n      <td class="unit-row">34.9</td>\r\n      <td class="total-row">34.9</td>\r\n      <td class="remark-row">0+135DEG</td>\r\n    </tr>\r\n    <tr class="product-item-row">\r\n      <td class="item-position-row">22</td>\r\n      <td class="part-code-row">HT.BP2SQ.</td>\r\n      <td class="description-row" colspan="2" >B STN Thk Turret 85 Punch SQ   10/10</td>\r\n      <td class="amount-row">1</td>\r\n      <td class="unit-row">34.9</td>\r\n      <td class="total-row">34.9</td>\r\n      <td class="remark-row">0+135DEG</td>\r\n    </tr>\r\n    <tr class="product-item-row">\r\n      <td class="item-position-row">22</td>\r\n      <td class="part-code-row">HT.BP2SQ.</td>\r\n      <td class="description-row" colspan="2" >B STN Thk Turret 85 Punch SQ   10/10</td>\r\n      <td class="amount-row">1</td>\r\n      <td class="unit-row">34.9</td>\r\n      <td class="total-row">34.9</td>\r\n      <td class="remark-row">0+135DEG</td>\r\n    </tr>\r\n    <tr class="product-item-row">\r\n      <td colspan="8">$product_items</td>\r\n    </tr>\r\n    \r\n     \r\n    \r\n    <tr class="product-item-row">\r\n      <td>&nbsp;</td>\r\n      <td>Freight</td>\r\n      <td colspan="2" class="description-row">Freight</td>\r\n      <td>1</td>\r\n      <td>195.75</td>\r\n      <td><p>195.75</p></td>\r\n      <td>35 kg DHL - $195.75</td>\r\n    </tr>\r\n    <tr class="product-footer-col">\r\n      <td  colspan="3" class="description-row">Country of origin of position 1-42:(China)</td>\r\n      <td width="173"><div align="right">Total pcs:</div></td>\r\n      <td>45.000</td>\r\n      <td colspan="2">Total Value(US$):</td>\r\n      <td>1922.85</td>\r\n    </tr>\r\n    <tr class="product-footer-total">\r\n      <td colspan="3" class="description-row" >Total Value (after add-ons or discount):</td>\r\n      <td colspan="5">&nbsp;</td>\r\n    </tr>\r\n    <tr class="product-footer-total ">\r\n      <td colspan="3"><div align="right">Remark:</div></td>\r\n      <td colspan="5"><div align="left">paid off taxes</div></td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<p></p>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" >Declaration Statement:I hereby certify the the information on this invocoe is true and correct and the contents and value of this </td>\r\n    </tr>\r\n    <tr>\r\n      <td> shipments is as stated above.</td>\r\n      <td >  </td>\r\n      <td>  </td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<hr>\r\n<table class="company-info"  cellspacing="0" cellpadding="0">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" >These commodities,technology of software were exported from China in accordance with the Export Administratioin Regulations.</td>\r\n    </tr>\r\n    <tr>\r\n      <td> Diversion contrary to Chinese law prohibited.</td>\r\n      <td >  </td>\r\n      <td> Date:  </td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n');
/*!40000 ALTER TABLE `po` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.po_item
DROP TABLE IF EXISTS `po_item`;
CREATE TABLE IF NOT EXISTS `po_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_item_no` varchar(10) NOT NULL DEFAULT '0',
  `quantity` double NOT NULL DEFAULT '0',
  `po_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_po_item_po` (`po_id`),
  CONSTRAINT `FK_po_item_po` FOREIGN KEY (`po_id`) REFERENCES `po` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.po_item: ~0 rows (приблизительно)
DELETE FROM `po_item`;
/*!40000 ALTER TABLE `po_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `po_item` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `description_en` varchar(255) NOT NULL,
  `description_ua` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `country_origin_en` varchar(255) DEFAULT 'Country of origin: OESTERREICH',
  `country_origin_ua` varchar(255) DEFAULT 'Країна походження: Австрія',
  `tarif_number_en` varchar(255) DEFAULT 'Customs Tarif-Nr: 82022000',
  `tarif_number_ua` varchar(255) DEFAULT 'Код товара: 82022000',
  `weight` varchar(50) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `width` varchar(50) DEFAULT NULL,
  `length` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) unsigned DEFAULT '0.00',
  `active` enum('y','n') DEFAULT 'y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.products: ~105 rows (приблизительно)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`products_id`, `description_en`, `description_ua`, `part_number`, `country_origin_en`, `country_origin_ua`, `tarif_number_en`, `tarif_number_ua`, `weight`, `height`, `width`, `length`, `price`, `active`, `created_at`) VALUES
	(1, 'B STN THK Turret Ultra Punch RE 3/15', 'B станція THK Turret Ultra пуансон прямокутник 3/15', 'HU.BP1RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 39.30, 'y', '2017-05-19 10:16:28'),
	(2, 'B STN THK Turret Ultra Punch SQ 9.2/9.2', 'B станція THK Turret Ultra пуансон квадрат 9.2/9.2', 'HU.BP1SQ.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 39.30, 'y', '2017-04-05 11:00:15'),
	(3, 'B STN THK Turret 85 Punch SQ 22/22', 'B станція THK Turret 85 пуансон квадрат 22/22', 'HT.BP2SQ.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 34.90, 'y', '2017-04-05 11:00:15'),
	(4, 'B STN THK Turret Die SQ 22/22+0.18', 'B станція THK Turret матриця квадрат 22/22+0.18', 'HT.BD2SQ.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(5, 'A STN THK Turret 85 Punch RO Ф7', 'A станція THK Turret 85 пуансон круг Ф7', 'HT.AP1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 12.40, 'y', '2017-04-05 11:00:15'),
	(6, 'A STN THK Turret die RO Ф7+0.18', 'A станція THK Turret матриця круг Ф7+0.18', 'HT.AD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 7.90, 'y', '2017-04-05 11:00:15'),
	(7, 'B STN THK Turret die RE 6/25+0.18', 'B станція THK Turret матриця прямокутник 6/25+0.18', 'HT.BD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(8, 'B STN THK Turret die RE 6/29+0.18', 'B станція THK Turret матриця прямокутник 6/29+0.18', 'HT.BD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(9, 'B STN THK Turret Die SQ 10/10+0.43', 'B станція THK Turret матриця квадрат 10/10+0.43', 'HT.BD2SQ.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(10, 'B STN THK Turret Die RE 6/25+0.43', 'B станція THK Turret матриця прямокутник 6/25+0.43', 'HT.BD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(11, 'B STN THK Turret Die RE 6/29+0.43', 'B станція THK Turret матриця прямокутник 6/29+0.43', 'HT.BD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(12, 'B STN THK Turret Single Bridge PB-ass\'y', 'B станція THK Turret "одинарний міст" пуансон-в зборі', 'H.TBS.DQPA1', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 158.70, 'y', '2017-04-05 11:00:15'),
	(13, 'B STN THK Turret E85 Punch Ass\'y HX=11.1', 'B станція THK Turret E85 пуансон в зборі HX=11.1', 'HT.BA2HX.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 91.50, 'y', '2017-04-05 11:00:15'),
	(14, 'B STN THK Turret Die HX HX=11.1+0.4', 'B станція THK Turret матриця HX HX=11.1+0.4', 'HT.BD2HX.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(15, 'B STN THK Turret Die HX HX=11.1+0.6', 'B станція THK Turret матриця HX HX=11.1+0.6', 'HT.BD2HX.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(16, 'B STN THK Turret Emboss PB-Ass\'y form up', 'B станція THK Turret пукльовка вгору PB-в зборі ', 'H.TBS.TBPA2', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 107.90, 'y', '2017-04-05 11:00:15'),
	(17, 'B STN THK Turret Emboss Die Ass\'y up', 'B станція THK Turret пукльовка вгору матриця в зборі', 'H.TBS.TBDA2', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 47.60, 'y', '2017-04-05 11:00:15'),
	(18, 'D STN THK Turret Die RE 3/80+0.2', 'D станція THK Turret матриця прямокутник 3/80+0.2', 'HT.DD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 62.30, 'y', '2017-04-05 11:00:15'),
	(19, 'B STN THK Turret LanceForm Die Ass\'y', 'B станція THK Turret LanceForm матриця в зборі', 'H.TBS.QSDA1', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 251.40, 'y', '2017-04-05 11:00:15'),
	(20, 'A STN THK Turret E85 Punch Ass\'y Ф6.8', 'A станція THK Turret E85 пуансон в зборі Ф6.8', 'HT.AA1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 41.20, 'y', '2017-04-05 11:00:15'),
	(21, 'A STN THK Turret Die RO Ф6.8+0.4', 'A станція THK Turret матриця круг Ф6.8+0.4', 'HT.AD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 7.90, 'y', '2017-04-05 11:00:15'),
	(22, 'A STN THK Turret Die RO Ф6.8+0.6', 'A станція THK Turret матриця круг Ф6.8+0.6', 'HT.AD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 7.90, 'y', '2017-04-05 11:00:15'),
	(23, 'B STN THK Turret 85 Punch OB Ф1.5/14', 'B станція THK Turret 85 пуансон овал Ф1.5/14', 'HT.BP2OB.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 52.40, 'y', '2017-04-05 11:00:15'),
	(24, 'A STN THK Turret TOP85 Punch head ass\'y', 'A станція THK Turret TOP85 пуансон голівка в зборі', 'HY.AH9', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 30.40, 'y', '2017-04-05 11:00:15'),
	(25, 'B STN THK Turret TOP85 Punch head ass\'y ', 'B станція THK Turret TOP85 пуансон голівка в зборі ', 'HY.BH9', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 44.30, 'y', '2017-04-05 11:00:15'),
	(26, 'A STN THK Turret Die RO Ф6.4+0.18', 'A станція THK Turret матриця круг Ф6.4+0.18', 'HT.AD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 7.90, 'y', '2017-04-05 11:00:15'),
	(27, 'A STN THK Turret Die SQ 7/7+0.2', 'A станція THK Turret матриця КВАДРАТ 7/7+0.2', 'HT.AD2SQ.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 12.40, 'y', '2017-04-05 11:00:15'),
	(28, 'C STN THK Turret Die RE 6/45+0.4', 'C станція THK Turret матриця прямокутник 6/45+0.4', 'HT.CD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 45.70, 'y', '2017-04-05 11:00:15'),
	(29, 'C STN THK Turret Die RE 6/45+0.26', 'C станція THK Turret матриця прямокутник 6/45+0.26', 'HT.CD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 45.70, 'y', '2017-04-05 11:00:15'),
	(30, 'C STN THK Turret Die RE 6/45+0.18', 'C станція THK Turret матриця прямокутник 6/45+0.18', 'HT.CD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 45.70, 'y', '2017-04-05 11:00:15'),
	(31, 'B STN THK Turret E85 Spring', 'B станція THK Turret E85 пружина', 'P.TH-HTB', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 8.10, 'y', '2017-04-05 11:00:15'),
	(32, 'D STN THK Turret 85 Cluster Punch', 'D станція THK Turret 85 Cluster пуансон', 'H.TDX.DKPB1', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 228.60, 'y', '2017-04-05 11:00:15'),
	(33, 'D STN THK Turret Cluster Die', 'D станція THK Turret Cluster матриця', 'H.TDX.DKDA1', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 148.60, 'y', '2017-04-05 11:00:15'),
	(34, 'D STN THK Turret 85 Cluster Stripper', 'D станція THK Turret 85 Cluster З’ємник', 'H.TDX.DK2', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 58.60, 'y', '2017-04-05 11:00:15'),
	(35, 'D STN THK Turet 85 Cluster Punch insert', 'D станція THK Turet 85 Cluster пуансон вставка', 'H.TDX.DK1', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 2.90, 'y', '2017-04-05 11:00:15'),
	(36, 'D STN THK Turret 85 Punch RO Ф55', 'D станція THK Turret 85 пуансон круг Ф55', 'HT.DP1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 84.40, 'y', '2017-04-05 11:00:15'),
	(37, 'D STN THK Turret 85 Stripper RO ', 'D станція THK Turret 85 З’мник круг ', 'HT.DS1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.70, 'y', '2017-04-05 11:00:15'),
	(38, 'B STN THK Turret Emboss PB-ass\'y form RO', 'B станція THK Turret «Формовка» пуансон в зборі круг', 'H.TBS.TBPA1', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 107.90, 'y', '2017-04-05 11:00:15'),
	(39, 'B STN THK Turret Emboss Die Ass\'y form up', 'B станція THK Turret «формовка вгору» матриця в зборі ', 'H.TBS.TBDA1', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 74.60, 'y', '2017-04-05 11:00:15'),
	(40, 'D STN THK Turret E85 Guide Ass\'y', 'D станція THK Turret E85 направляюча в зборі', 'HT.DC1', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 235.40, 'y', '2017-04-05 11:00:15'),
	(41, 'B STN THK Turret ultra punch RE 5/30', 'B станція THK Turret ultra пуансоон прямокутник 5/30', 'HU.BP1RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 39.30, 'y', '2017-04-05 11:00:15'),
	(42, 'D STN THK Turret 85 punch RE 6/80', 'D станція THK Turret 85 пуансоон прямокутник 6/80', 'HT.DP2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 119.10, 'y', '2017-04-05 11:00:15'),
	(43, 'B STN THK Turret die RE 5/30+0.3', 'B станція THK Turret матриця прямокутник 5/30+0.3', 'HT.BD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(44, 'B STN THK Turret die RE 5/30+0.37', 'B станція THK Turret матриця прямокутник 5/30+0.37', 'HT.BD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(45, 'B STN THK Turret die RE 6/30+0.37', 'B станція THK Turret матриця прямокутник 6/30+0.37', 'HT.BD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(46, 'B STN THK Turret die RE 3/15+0.37', 'B станція THK Turret матриця прямокутник 3/15+0.37', 'HT.BD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(47, 'D STN THK Turret die RE 6/80+0.37', 'D станція THK Turret матриця прямокутник 6/80+0.37', 'HT.DD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 62.30, 'y', '2017-04-05 11:00:15'),
	(48, 'D STN THK Turret die RE 6/80+0.3 ', 'D станція THK Turret матриця прямокутник 6/80+0.3 ', 'HT.DD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 62.30, 'y', '2017-04-05 11:00:15'),
	(49, 'D STN THK Turret die RE 6/80+0.2', 'D станція THK Turret матриця прямокутник 6/80+0.2', 'HT.DD2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 62.30, 'y', '2017-04-05 11:00:15'),
	(50, 'B STN THK Turret die SQ 9.2/9.2+0.37', 'B станція THK Turret матриця SQ 9.2/9.2+0.37', 'HT.BD2SQ.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 16.20, 'y', '2017-04-05 11:00:15'),
	(51, 'A STN THK Turret die SQ 5/5+0.37', 'A станція THK Turret матриця SQ 5/5+0.37', 'HT.AD2SQ.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 12.40, 'y', '2017-04-05 11:00:15'),
	(52, 'A STN THK Turret die RO Ф7+0.37', 'A станція THK Turret матриця круг Ф7+0.37', 'HT.AD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 7.90, 'y', '2017-04-05 11:00:15'),
	(53, 'B STN THK Turret die RO Ф13+0.2', 'B станція THK Turret матриця круг Ф13+0.2', 'HT.BD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 10.50, 'y', '2017-04-05 11:00:15'),
	(54, 'B STN THK Turret die RO Ф13+0.37', 'B станція THK Turret матриця круг Ф13+0.37', 'HT.BD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 10.50, 'y', '2017-04-05 11:00:15'),
	(55, 'A STN THK Turret die RO Ф9', 'A станція THK Turret матриця круг Ф9', 'HT.AD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 7.90, 'y', '2017-04-05 11:00:15'),
	(56, 'B STN THK Turret TOP86 punch ass\'y RO Ф9', 'B станція THK Turret TOP86 пуансоон в зборі круг Ф9', 'HV.BA1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 108.50, 'y', '2017-04-05 11:00:15'),
	(57, 'B STN THK Turret TOP85 punch ass\'y RE 4/12', 'B станція THK Turret TOP85 пуансоон в зборі прямокутник 4/12', 'HV.BA2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 131.70, 'y', '2017-04-05 11:00:15'),
	(58, 'A STN THK Turret TOP85 punch ass\'y RE 2/10', 'A станція THK Turret TOP85 пуансоон в зборі прямокутник 2/10', 'HV.AA2RE.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 85.90, 'y', '2017-04-05 11:00:15'),
	(59, 'B STN THK Turret die RO Ф12.3+0.15', 'B станція THK Turret матриця круг Ф12.3+0.15', 'HT.BD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 10.50, 'y', '2017-04-05 11:00:15'),
	(60, 'B STN THK Turret die RO Ф12.3+0.2', 'B станція THK Turret матриця круг Ф12.3+0.2', 'HT.BD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 10.50, 'y', '2017-04-05 11:00:15'),
	(61, 'B STN THK Turret die RO Ф12.3+0.4', 'B станція THK Turret матриця круг Ф12.3+0.4', 'HT.BD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '5', '', '', '', 10.50, 'y', '2017-08-30 13:09:35'),
	(62, 'B STN THK Turret die RO Ф12.3+0.6', 'B станція THK Turret матриця круг Ф12.3+0.6', 'HT.BD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 10.50, 'y', '2017-04-05 11:00:15'),
	(63, 'C STN THK Turret die RO Ф37.5+0.15', 'C станція THK Turret матриця круг Ф37.5+0.15', 'HT.CD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 30.40, 'y', '2017-04-05 11:00:15'),
	(64, 'C STN THK Turret die RO Ф37.5+0.2', 'C станція THK Turret матриця круг Ф37.5+0.2', 'HT.CD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 30.40, 'y', '2017-04-05 11:00:15'),
	(65, 'C STN THK Turret die RO Ф37.5+0.4', 'C станція THK Turret матриця круг Ф37.5+0.4', 'HT.CD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 30.40, 'y', '2017-04-05 11:00:15'),
	(66, 'C STN THK Turret die RO Ф37.5+0.6', 'C станція THK Turret матриця круг Ф37.5+0.6', 'HT.CD1RO.', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 30.40, 'y', '2017-04-05 11:00:15'),
	(67, 'E STN THK Turret 85 cluster insert', 'E станція THK Turret 85 cluster вставка', 'H.TEX.DK1', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 9.50, 'y', '2017-04-05 11:00:15'),
	(68, 'COBALT8 27x5/7', 'COBALT8 27x5/7', 'C282709005701000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 3.06, 'y', '2017-04-05 12:01:21'),
	(69, 'COBALT8 34x2/3', 'COBALT8 34x2/3', 'C283411002301000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 3.93, 'y', '2017-04-05 12:01:21'),
	(70, 'COBALT8 34x3/4', 'COBALT8 34x3/4', 'C283411003401000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 3.93, 'y', '2017-04-05 12:01:21'),
	(71, 'MAGNUM-HL 27x3/4', 'MAGNUM-HL 27x3/4', 'C712709003401000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 5.15, 'y', '2017-04-05 12:01:21'),
	(72, 'MAGNUM-HL 34x2/3', 'MAGNUM-HL 34x2/3', 'C713411002301000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 8.53, 'y', '2017-04-05 12:01:21'),
	(73, 'PROTECTOR M42 20x6/10', 'PROTECTOR M42 20x6/10', 'C362009061001000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 3.90, 'y', '2017-04-05 12:01:21'),
	(74, 'PROTECTOR M42 27x3/4', 'PROTECTOR M42 27x3/4', 'C362709003401000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 4.02, 'y', '2017-04-05 12:01:21'),
	(75, 'PROTECTOR M42 27x4/6', 'PROTECTOR M42 27x4/6', 'C362709004601000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 4.02, 'y', '2017-04-05 12:01:21'),
	(76, 'PROTECTOR M42 27x5/7', 'PROTECTOR M42 27x5/7', 'C362709005701000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 4.02, 'y', '2017-04-05 12:01:21'),
	(77, 'PROTECTOR M42 27x6/10', 'PROTECTOR M42 27x6/10', 'C362709061001000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 4.02, 'y', '2017-04-05 12:01:21'),
	(78, 'PROTECTOR M42 34x3/4', 'PROTECTOR M42 34x3/4', 'C363411003401000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 5.11, 'y', '2017-04-05 12:01:21'),
	(79, 'PROTECTOR M42 34x4/6', 'PROTECTOR M42 34x4/6', 'C363411004601000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 5.11, 'y', '2017-04-05 12:01:21'),
	(80, 'PROTECTOR M42 41x3/4', 'PROTECTOR M42 41x3/4', 'C364113003401000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 6.98, 'y', '2017-04-05 12:01:21'),
	(81, 'PROTECTOR M42 41x4/6', 'PROTECTOR M42 41x4/6', 'C364113004601000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 6.98, 'y', '2017-04-12 10:18:35'),
	(82, 'SGLB 20x4/6', 'SGLB 20x4/6', 'C302009004601000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 3.72, 'y', '2017-04-05 12:01:21'),
	(83, 'SGLB 27x3/4', 'SGLB 27x3/4', 'C302709003401000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 3.82, 'y', '2017-04-05 12:01:21'),
	(84, 'SGLB 27x4/6', 'SGLB 27x4/6', 'C302709004601000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 3.82, 'y', '2017-04-05 12:01:21'),
	(85, 'SGLB 34x2/3', 'SGLB 34x2/3', 'C303411002301000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 4.75, 'y', '2017-04-05 12:01:21'),
	(86, 'SGLB 34x3/4', 'SGLB 34x3/4', 'C303411003401000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 4.75, 'y', '2017-04-05 12:01:21'),
	(87, 'SHL 27x3/4', 'SHL 27x3/4', 'C412709003401000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 4.36, 'y', '2017-04-05 12:01:21'),
	(88, 'SHL-G 27x4/6', 'SHL-G 27x4/6', 'C422709004601000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 4.36, 'y', '2017-04-05 12:01:21'),
	(89, 'SHL 34x2/3', 'SHL 34x2/3', 'C413411002301000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 5.27, 'y', '2017-04-05 12:01:21'),
	(90, 'SHL 41x2/3', 'SHL 41x2/3', 'C414113002301000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 7.20, 'y', '2017-04-05 12:01:21'),
	(91, 'SHL 767x1,1/1,5', 'SHL 767x1,1/1,5', 'C416716011501000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 13.13, 'y', '2017-04-05 12:01:21'),
	(92, 'SHL 67x2/3', 'SHL 67x2/3', 'C416716011501000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 13.13, 'y', '2017-04-05 12:01:21'),
	(93, 'SIGMA 41x2/3', 'SIGMA 41x2/3', 'C504113002301000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 9.31, 'y', '2017-04-05 12:01:21'),
	(94, 'AXCELA-H 34x1,8/2', 'AXCELA-H 34x1,8/2', 'CH00003411018201000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 20.83, 'y', '2017-04-05 12:01:21'),
	(95, 'AXCELA-H 41x1,8/2', 'AXCELA-H 41x1,8/2', 'CH00004113108201000', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 23.32, 'y', '2017-04-05 12:01:21'),
	(96, 'AXCELA-34x3920x1,8/2 (1pc=3.92m)', 'AXCELA-34x3920x1,8/2 (1pc=3.92m)', 'EH00003411018203920', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 22.78, 'y', '2017-04-05 12:01:21'),
	(97, 'AXCELA-H 41x4715x1,8/2(1pc=4.715m)', 'AXCELA-H 41x4715x1,8/2(1pc=4.715m)', 'EH00004113018204715', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 25.66, 'y', '2017-04-05 12:01:21'),
	(98, 'AXCELA-G 54x6100x1,8/2 (1pc=6.1m)', 'AXCELA-G 54x6100x1,8/2 (1pc=6.1m)', 'EG00005416018206100', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 39.78, 'y', '2017-04-05 12:01:21'),
	(99, 'vcvxcvxcvxcv', 'xvcvxcvxcv', '1234123123223', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '5', '454', 'e', 'e', 234.00, 'y', '0000-00-00 00:00:00'),
	(101, 'vcvxcvxcvxcv12', 'xvcvxcvxcv12', '1234123123223', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '5', '454', 'e', 'e', 234.00, 'y', '0000-00-00 00:00:00'),
	(102, 'vcvxcvxcvxcv', 'xvcvxcvxcv122', '123fghfgh', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '5', '454', 'e', 'e', 234.00, 'y', '2017-08-30 13:09:23'),
	(104, 'vcxvxcv2', 'vgdfgdfg', 'rwerer234234', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', 'e', 'e', 20.00, 'y', '2017-08-29 15:04:29'),
	(105, 'asdasd', 'asdasd', 'dsfsdfsdfdsf', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '3', '3', 'we', 'we', 4545.00, 'n', '0000-00-00 00:00:00'),
	(106, 'vbnvbn', 'vbnvbn', 'vbnvbn', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 0.00, 'y', '0000-00-00 00:00:00'),
	(107, 'qwe', 'asd', 'zxczxczc', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 0.00, 'y', '0000-00-00 00:00:00'),
	(108, 'sfsdf', 'sffsdfd', 'sdfdfdsf', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 0.00, 'y', '0000-00-00 00:00:00'),
	(109, 'asdasdxcxc', 'sdfsdfsd', 'zczxcx', 'Country of origin: OESTERREICH', 'Країна походження: Австрія', 'Customs Tarif-Nr: 82022000', 'Код товара: 82022000', '', '', '', '', 0.00, 'y', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.products_to_invoice
DROP TABLE IF EXISTS `products_to_invoice`;
CREATE TABLE IF NOT EXISTS `products_to_invoice` (
  `pr_to_inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `item_number` varchar(10) DEFAULT NULL,
  `part_number_temp` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL DEFAULT '1.00',
  `unit` enum('m','pc','') NOT NULL DEFAULT 'pc',
  `unit_price_manual` decimal(10,2) DEFAULT '0.00',
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pr_to_inv_id`),
  KEY `FK_products_to_invoice_invoice` (`invoice_id`),
  KEY `FK_products_to_invoice_products` (`product_id`),
  CONSTRAINT `FK_products_to_invoice_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_products_to_invoice_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`products_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы inwiz.products_to_invoice: ~0 rows (приблизительно)
DELETE FROM `products_to_invoice`;
/*!40000 ALTER TABLE `products_to_invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_to_invoice` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.profile
DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user_old` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы inwiz.profile: ~0 rows (приблизительно)
DELETE FROM `profile`;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.social_account
DROP TABLE IF EXISTS `social_account`;
CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user_old` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы inwiz.social_account: ~0 rows (приблизительно)
DELETE FROM `social_account`;
/*!40000 ALTER TABLE `social_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_account` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.token
DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user_old` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы inwiz.token: ~0 rows (приблизительно)
DELETE FROM `token`;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
	(1, 'XhJ-Ymji3g2pTc_p_ITgKJ_0qe1qm7KT', 1493478529, 0);
/*!40000 ALTER TABLE `token` ENABLE KEYS */;

-- Дамп структуры для таблица inwiz.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы inwiz.user: ~0 rows (приблизительно)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'neXZLCNiTTwesuqS551BhFr-9qHOuOXn', '$2y$13$.P3yIRSxbVhvQb/FQPhI.e3EtK/w89VwdPWXr54oC8zaVdYM4zyTO', NULL, 'admin@asd.ru', 10, 1499416604, 1499416604);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
