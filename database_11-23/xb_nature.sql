-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 05 月 22 日 13:07
-- 服务器版本: 5.1.60-log
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xb_nature`
--

-- --------------------------------------------------------

--
-- 表的结构 `lz_author`
--

CREATE TABLE IF NOT EXISTS `lz_author` (
  `aid` int(10) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL COMMENT '单位',
  `author_en` varchar(100) DEFAULT NULL,
  `institution_en` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lz_cache`
--

CREATE TABLE IF NOT EXISTS `lz_cache` (
  `cache_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uri` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  `ttl` int(10) unsigned DEFAULT NULL,
  `content` varchar(20010) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `cache_id` (`cache_id`),
  KEY `uri` (`uri`)
) ENGINE=MEMORY  DEFAULT CHARSET=latin1 AUTO_INCREMENT=273213 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_category`
--

CREATE TABLE IF NOT EXISTS `lz_category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `keywords` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `item_count` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `item_id` int(10) unsigned DEFAULT NULL,
  UNIQUE KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=346 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_comment`
--

CREATE TABLE IF NOT EXISTS `lz_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_config`
--

CREATE TABLE IF NOT EXISTS `lz_config` (
  `config_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(10) NOT NULL DEFAULT '0',
  UNIQUE KEY `config_id` (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_curip`
--

CREATE TABLE IF NOT EXISTS `lz_curip` (
  `ip` varchar(20) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  `type` int(5) DEFAULT '0' COMMENT '0:当前在线，1：当天访问'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lz_guestbook`
--

CREATE TABLE IF NOT EXISTS `lz_guestbook` (
  `guestbook_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reply_date` int(11) unsigned NOT NULL DEFAULT '0',
  `reply_content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reply_user_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  UNIQUE KEY `guestbook_id` (`guestbook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_ip`
--

CREATE TABLE IF NOT EXISTS `lz_ip` (
  `aid` int(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `time` int(10) DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0:访问；1：下载'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lz_item`
--

CREATE TABLE IF NOT EXISTS `lz_item` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DOI` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `html` text COLLATE utf8_unicode_ci,
  `classnum` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类号',
  `category_id` int(10) unsigned DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  `publish_time` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `view_count` int(10) unsigned NOT NULL DEFAULT '1',
  `download_count` int(10) NOT NULL DEFAULT '0',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `keywords` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authoren` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institution` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institutionen` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_pic` tinyint(4) DEFAULT NULL,
  `pic_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `category_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '英文标题',
  `file_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` text COLLATE utf8_unicode_ci,
  `periodsAndpage` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '期数及页码',
  UNIQUE KEY `entry_id` (`item_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1408 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_keyword`
--

CREATE TABLE IF NOT EXISTS `lz_keyword` (
  `aid` int(10) NOT NULL,
  `keyword` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lz_paper`
--

CREATE TABLE IF NOT EXISTS `lz_paper` (
  `paper_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `school` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(10) unsigned DEFAULT NULL,
  `files` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paper_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_paper_file`
--

CREATE TABLE IF NOT EXISTS `lz_paper_file` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paper_id` int(10) unsigned NOT NULL,
  `filename` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `filepath` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_rights`
--

CREATE TABLE IF NOT EXISTS `lz_rights` (
  `rights_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `rights` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  UNIQUE KEY `rights_id` (`rights_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_search`
--

CREATE TABLE IF NOT EXISTS `lz_search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(30) DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  UNIQUE KEY `id` (`id`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_user`
--

CREATE TABLE IF NOT EXISTS `lz_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rights_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- 表的结构 `lz_webdata`
--

CREATE TABLE IF NOT EXISTS `lz_webdata` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
