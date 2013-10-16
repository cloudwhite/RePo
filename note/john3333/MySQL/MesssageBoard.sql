-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Oct 16, 2013, 12:58 PM
-- 伺服器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `messageboard`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `msg`
-- 

CREATE TABLE `msg` (
  `sid` varchar(8) collate utf8_unicode_ci NOT NULL,
  `time` varchar(8) collate utf8_unicode_ci NOT NULL,
  `user` varchar(18) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(18) collate utf8_unicode_ci NOT NULL,
  `priority` varchar(8) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `file` varchar(1024) collate utf8_unicode_ci NOT NULL,
  `reply` text collate utf8_unicode_ci NOT NULL,
  `like` int(11) NOT NULL auto_increment,
  `type` varchar(8) collate utf8_unicode_ci NOT NULL,
  `group` varchar(8) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`like`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 列出以下資料庫的數據： `msg`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `user`
-- 

CREATE TABLE `user` (
  `sid` varchar(8) character set utf8 collate utf8_czech_ci NOT NULL,
  `account` varchar(18) collate utf8_unicode_ci NOT NULL,
  `user` varchar(18) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(18) collate utf8_unicode_ci NOT NULL,
  `email` varchar(44) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(10) collate utf8_unicode_ci default NULL,
  `birthday` varchar(8) collate utf8_unicode_ci default NULL,
  UNIQUE KEY `account` (`account`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- 列出以下資料庫的數據： `user`
-- 

