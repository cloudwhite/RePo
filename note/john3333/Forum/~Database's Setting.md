-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- �D��: localhost
-- �إߤ��: Dec 08, 2013, 06:08 AM
-- ���A������: 5.0.51
-- PHP ����: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ��Ʈw: `forum`
-- 

-- --------------------------------------------------------

-- 
-- ��ƪ�榡�G `board`
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
-- �C�X�H�U��Ʈw���ƾڡG `board`
-- 


-- --------------------------------------------------------

-- 
-- ��ƪ�榡�G `user`
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
-- �C�X�H�U��Ʈw���ƾڡG `user`
-- 

INSERT INTO `user` VALUES (13, '', '', '', 'john', 'john');
INSERT INTO `user` VALUES (12, '', '', '', 'test', 'test');
INSERT INTO `user` VALUES (11, '', '', '', 'anon', 'anon');
