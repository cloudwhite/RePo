
>phpMyAdmin SQL Dump
> version 2.10.3
> http://www.phpmyadmin.net
> 
> 主機: localhost
> 建立日期: Oct 20, 2013, 03:31 PM
> 伺服器版本: 5.0.51
> PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

> 
> 資料庫: `messageboard`
> 

> --------------------------------------------------------

> 
> 資料表格式： `board`
>
 
```sql
CREATE TABLE `board` (
  `sid` int(10) unsigned NOT NULL auto_increment,
  `like` int(10) NOT NULL,
  `type` varchar(20) collate utf8_unicode_ci default NULL,
  `group` varchar(20) collate utf8_unicode_ci default NULL,
  `priority` varchar(10) collate utf8_unicode_ci NOT NULL,
  `subject` varchar(50) collate utf8_unicode_ci NOT NULL,
  `file` varchar(255) collate utf8_unicode_ci default NULL,
  `pwd` varchar(20) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `reply` text collate utf8_unicode_ci,
  `datetime` varchar(12) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
```

> 
> 列出以下資料庫的數據： `board`
> 


> --------------------------------------------------------

> 
> 資料表格式： `user`
>
 
```sql
CREATE TABLE `user` (
  `name` varchar(10) collate utf8_unicode_ci NOT NULL,
  `pwd` varchar(20) collate utf8_unicode_ci NOT NULL,
  `moblie` varchar(10) collate utf8_unicode_ci default NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `birth` varchar(8) collate utf8_unicode_ci default NULL,
  `acc` varchar(20) collate utf8_unicode_ci NOT NULL,
  `sid` int(20) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`sid`),
  UNIQUE KEY `email` (`email`,`acc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
```
> 
> 列出以下資料庫的數據： `user`
> 

