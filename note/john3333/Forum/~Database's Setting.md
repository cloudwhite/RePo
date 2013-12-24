-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Dec 08, 2013, 06:08 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `forum`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `board`
-- 

CREATE TABLE `board` (
  `sid` int(18) NOT NULL auto_increment,
  `type` varchar(18) collate utf8_unicode_ci NOT NULL,
  `author` varchar(18) collate utf8_unicode_ci NOT NULL,
  `title` varchar(18) collate utf8_unicode_ci NOT NULL,
  `image` text collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `file` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- 
-- 列出以下資料庫的數據： `board`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `user`
-- 

CREATE TABLE `user` (
  `sid` int(10) NOT NULL auto_increment,
  `gender` varchar(6) collate utf8_unicode_ci NOT NULL,
  `birthday` varchar(12) collate utf8_unicode_ci NOT NULL,
  `email` varchar(60) collate utf8_unicode_ci NOT NULL,
  `user` varchar(20) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

-- 
-- 列出以下資料庫的數據： `user`
-- 

INSERT INTO `user` VALUES (13, '', '', '', 'john', 'john');
INSERT INTO `user` VALUES (12, '', '', '', 'test', 'test');
INSERT INTO `user` VALUES (11, '', '', '', 'anon', 'anon');
