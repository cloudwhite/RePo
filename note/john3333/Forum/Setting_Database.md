-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- �D��: localhost
-- �إߤ��: Nov 24, 2013, 03:23 PM
-- ���A������: 5.0.51
-- PHP ����: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ��Ʈw: `forum`
CREATE DATABASE  `forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- 

-- --------------------------------------------------------

-- 
-- ��ƪ�榡�G `board`
-- 
```SQL
CREATE TABLE `board` (
  `sid` int(9) NOT NULL auto_increment,
  `type` varchar(9) collate utf8_unicode_ci NOT NULL,
  `author` varchar(18) collate utf8_unicode_ci NOT NULL,
  `title` varchar(18) collate utf8_unicode_ci NOT NULL,
  `image` varchar(44) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `file` varchar(128) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
```
-- 
-- �C�X�H�U��Ʈw���ƾڡG `board`
-- 


-- --------------------------------------------------------

-- 
-- ��ƪ�榡�G `user`
-- 
```SQL
CREATE TABLE `user` (
  `sid` int(9) NOT NULL auto_increment,
  `gender` varchar(1) collate utf8_unicode_ci NOT NULL,
  `birthday` varchar(10) collate utf8_unicode_ci NOT NULL,
  `email` varchar(44) collate utf8_unicode_ci NOT NULL,
  `user` varchar(18) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(18) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
```
-- 
-- �C�X�H�U��Ʈw���ƾڡG `user`
-- 