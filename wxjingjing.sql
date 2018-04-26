-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-04-26 03:40:43
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wxjingjing`
--
CREATE DATABASE IF NOT EXISTS `wxjingjing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wxjingjing`;

-- --------------------------------------------------------

--
-- 表的结构 `data`
--

CREATE TABLE `data` (
  `did` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  `type` char(20) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `data`
--

INSERT INTO `data` (`did`, `uid`, `time`, `type`, `flag`) VALUES
(44, 49, 25, 'sit', 0),
(45, 50, 50, 'grow', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `rtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `rtime`) VALUES
(49, 'huanan', '123456', '2018-04-26 03:36:47'),
(50, 'zjy', '123456', '2018-04-26 03:37:03'),
(51, 'xhr', '123456', '2018-04-26 03:37:18'),
(52, 'jingjing', '123456', '2018-04-26 03:37:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`did`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `uid` (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `data`
--
ALTER TABLE `data`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- 限制导出的表
--

--
-- 限制表 `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
