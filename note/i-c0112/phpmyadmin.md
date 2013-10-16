CREATE TABLE `msg_board` (
  `sid` int(10) unsigned NOT NULL auto_increment,
  `like` int(10) NOT NULL,
  `type` varchar(20) collate utf8_unicode_ci default NULL,
  `group` varchar(20) collate utf8_unicode_ci default NULL,
  `access` varchar(10) collate utf8_unicode_ci NOT NULL,
  `subject` varchar(50) collate utf8_unicode_ci NOT NULL,
  `file` varchar(255) collate utf8_unicode_ci default NULL,
  `pwd` varchar(20) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `reply` text collate utf8_unicode_ci,
  `date-time` varchar(12) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;