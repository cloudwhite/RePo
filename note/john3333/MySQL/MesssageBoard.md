-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Oct 21, 2013, 03:30 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `messageboard`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `msg`
-- 
```SQL
CREATE TABLE `msg` (
  `sid` int(8) NOT NULL auto_increment,
  `user` varchar(18) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(18) collate utf8_unicode_ci NOT NULL,
  `priority` varchar(1) collate utf8_unicode_ci NOT NULL,
  `time` varchar(12) collate utf8_unicode_ci NOT NULL,
  `subject` varchar(18) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `file` binary(255) NOT NULL,
  `reply` text collate utf8_unicode_ci NOT NULL,
  `like` varchar(4) collate utf8_unicode_ci NOT NULL,
  `type` varchar(3) collate utf8_unicode_ci NOT NULL,
  `group` varchar(3) collate utf8_unicode_ci NOT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
```
-- 
-- 列出以下資料庫的數據： `msg`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `user`
-- 
```SQL
CREATE TABLE `user` (
  `sid` int(8) NOT NULL,
  `user` varchar(18) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(18) collate utf8_unicode_ci NOT NULL,
  `id` varchar(18) collate utf8_unicode_ci NOT NULL,
  `email` varchar(44) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(10) collate utf8_unicode_ci NOT NULL,
  `birthday` varchar(8) collate utf8_unicode_ci NOT NULL,
  UNIQUE KEY `user` (`user`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```
-- 
-- 列出以下資料庫的數據： `user`
-- 

