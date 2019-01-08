-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2019-01-03 02:34:06
-- 服务器版本: 5.6.14
-- PHP 版本: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test_db`
--
CREATE DATABASE IF NOT EXISTS `test_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test_db`;

-- --------------------------------------------------------

--
-- 表的结构 `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `First` text NOT NULL,
  `Last` text NOT NULL,
  `address` text NOT NULL,
  `position` text NOT NULL,
  `id` int(11) NOT NULL,
  `gender` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `employees`
--

INSERT INTO `employees` (`First`, `Last`, `address`, `position`, `id`, `gender`) VALUES
('gao', 'pengzun', 'liaoning', 'student', 1, 'nan'),
('dong', 'yushun', 'shandong', 'student', 2, 'nan'),
('zhao', 'bin', 'gansu', 'student', 4, 'man'),
('chen', 'qiang', 'xinjiang', 'student', 5, 'nan'),
('li', 'yanjun', 'sichuan', 'student', 6, 'nan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
