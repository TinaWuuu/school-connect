-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-06-01 15:39:25
-- 服务器版本： 5.7.24
-- PHP 版本： 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `list`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(5) NOT NULL,
  `admin_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `admin_pwd` varchar(17) COLLATE utf8_bin NOT NULL,
  `is_use` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_pwd`, `is_use`) VALUES
(1, 'victor123', 'abc123', 1),
(2, 'sun2001', 'a123456', 1);

-- --------------------------------------------------------

--
-- 表的结构 `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(5) NOT NULL,
  `class_name` varchar(10) COLLATE utf8_bin NOT NULL,
  `speciality` int(15) NOT NULL,
  `isuse` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `speciality` (`speciality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `speciality`, `isuse`) VALUES
(1, '计算机171', 1, 1),
(2, '计算机161', 1, 1),
(3, '物联网181', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `college`
--

DROP TABLE IF EXISTS `college`;
CREATE TABLE IF NOT EXISTS `college` (
  `id` int(5) NOT NULL,
  `college_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `isuse` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `college`
--

INSERT INTO `college` (`id`, `college_name`, `isuse`) VALUES
(1, '国服', 1);

-- --------------------------------------------------------

--
-- 表的结构 `speciality`
--

DROP TABLE IF EXISTS `speciality`;
CREATE TABLE IF NOT EXISTS `speciality` (
  `id` int(5) NOT NULL,
  `speciality_name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `college_id` int(5) NOT NULL,
  `isuse` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `college_id` (`college_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `speciality`
--

INSERT INTO `speciality` (`id`, `speciality_name`, `college_id`, `isuse`) VALUES
(1, '计算机科学与技术', 1, 1),
(2, '物联网', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) COLLATE utf8_bin NOT NULL,
  `user_pwd` varchar(17) COLLATE utf8_bin NOT NULL,
  `real_name` varchar(15) COLLATE utf8_bin NOT NULL,
  `card_no` varchar(25) COLLATE utf8_bin NOT NULL,
  `business` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `enter_year` varchar(6) COLLATE utf8_bin NOT NULL,
  `class_id` int(11) NOT NULL,
  `mobile` varchar(15) COLLATE utf8_bin NOT NULL,
  `address` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `zipcode` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `isuse` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `students`
--

INSERT INTO `students` (`id`, `user_name`, `user_pwd`, `real_name`, `card_no`, `business`, `enter_year`, `class_id`, `mobile`, `address`, `zipcode`, `image`, `isuse`) VALUES
(1, 'a201701', 'a11111', '李李', '2017212212114', '一中', '2016', 2, '13988065137', '拱墅区', NULL, '../images/20190601153120.jpg', 1),
(2, 'a201702', 'ab12345', '五五', '322524199510050325', '某某小学', '2017', 1, '17774012913', '上城区', '330000', '../images/20190529074923.jpg', 1),
(3, 'a201703', 'b11111', '六六', '5325241998122303125', '读研', '2018', 3, '17887569872', '西湖区', NULL, NULL, 1),
(4, 'a201704', 'b12345', '七七', '53252419981223034589', '', '2018', 3, '17774012900', '', NULL, '../images/20190530183248.jpg', 1),
(21, 'a20001234', 'a1234567', '玲玲', '332524199812230325', '企业', '2017', 1, '13988065139', '小区', '654300', '../images/20190601152421.jpg', 1);

--
-- 限制导出的表
--

--
-- 限制表 `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`speciality`) REFERENCES `speciality` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `speciality`
--
ALTER TABLE `speciality`
  ADD CONSTRAINT `speciality_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `college` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
