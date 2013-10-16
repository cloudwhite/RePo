白雲
==================
```
-- phpMyAdmin SQL Dump
-- version 2.10.3
```

* [phpmyadmin](http://www.phpmyadmin.net)

```
-- 主機: localhost
-- 建立日期: Oct 15, 2013, 05:06 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
```
-- 
-- 資料庫: `board`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `msg`
-- 
```sql
CREATE TABLE `msg` (
  `sid` int(225) unsigned NOT NULL auto_increment,
  `user` varchar(20) collate utf8_unicode_ci NOT NULL,
  `date-time` varchar(16) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `file` varchar(1) collate utf8_unicode_ci NOT NULL,
  `subject` varchar(20) collate utf8_unicode_ci NOT NULL,
  `type` varchar(20) collate utf8_unicode_ci NOT NULL,
  `group` varchar(20) collate utf8_unicode_ci NOT NULL,
  `priority` varchar(20) collate utf8_unicode_ci NOT NULL,
  `like` int(200) NOT NULL,
  `reply` text collate utf8_unicode_ci NOT NULL,
  `password` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
```

-- --------------------------------------------------------

-- 
-- 資料表格式： `user`
-- 
```sql
CREATE TABLE `user` (
  `sid` int(20) unsigned NOT NULL auto_increment,
  `name` varchar(10) collate utf8_unicode_ci NOT NULL,
  `password` varchar(20) collate utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) collate utf8_unicode_ci default NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `birthday` varchar(8) collate utf8_unicode_ci default NULL,
  `account` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sid`),
  UNIQUE KEY `email` (`email`,`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
```
==========
```
運行：
	首先我們要進到網站
	要先登入
	登入前必須註冊
	註冊的資料有
	
	sid(資料單一性)
	name(稱呼，身分)
	password(做登入用)
	mobile(基本資料)
	email(基本資料)
	birthday(基本資料)
	account(做登入用)
	
	在然後留言
	留言要有
	sid(資料單一性)
    user(發言人的身分)
    date-time(發言的時間)
    content(發言的內容)
    file(夾帶的檔案)
    subject(發言的標題)
    type(發言的類別)
    group(發言的群組)
    priority(權限)
    like(讚)
    reply(回復發言)
    password(發言設置密碼)
```
================