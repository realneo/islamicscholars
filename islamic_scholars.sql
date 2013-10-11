-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2013 at 06:16 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `islamic_scholars`
--

-- --------------------------------------------------------

--
-- Table structure for table `h_admintb`
--

CREATE TABLE IF NOT EXISTS `h_admintb` (
  `admin_id` int(8) NOT NULL AUTO_INCREMENT,
  `admin_login_id` varchar(60) NOT NULL,
  `admin_pwd` varchar(60) NOT NULL,
  `admin_reg_dage` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `h_admintb`
--

INSERT INTO `h_admintb` (`admin_id`, `admin_login_id`, `admin_pwd`, `admin_reg_dage`) VALUES
(1, 'admin', 'admin', '2013-06-10 00:00:00'),
(2, 'mgn', 'mgn', '2013-06-22 16:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `h_appointtb`
--

CREATE TABLE IF NOT EXISTS `h_appointtb` (
  `apt_id` int(8) NOT NULL AUTO_INCREMENT,
  `apt_user_id` int(8) NOT NULL,
  `apt_content` text NOT NULL,
  `apt_email` varchar(128) NOT NULL,
  `apt_date` datetime NOT NULL,
  `apt_reg_date` datetime NOT NULL,
  `apt_admin_name` varchar(128) NOT NULL,
  `apt_state` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`apt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `h_appointtb`
--

INSERT INTO `h_appointtb` (`apt_id`, `apt_user_id`, `apt_content`, `apt_email`, `apt_date`, `apt_reg_date`, `apt_admin_name`, `apt_state`) VALUES
(1, 1, 'Do you meet with me? I am a student.', 'user1@hotmail.com', '2013-06-28 00:00:00', '2013-06-20 00:00:00', '', 0),
(2, 2, 'I want meet you. So I will understand you.', 'user2@gmail.com', '2013-06-28 00:00:00', '2013-06-20 00:00:00', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `h_calendartb`
--

CREATE TABLE IF NOT EXISTS `h_calendartb` (
  `cld_id` int(8) NOT NULL AUTO_INCREMENT,
  `cld_year` int(4) NOT NULL DEFAULT '1',
  `cld_month` int(2) NOT NULL DEFAULT '1',
  `cld_day` int(2) NOT NULL DEFAULT '1',
  `cld_hour` int(2) NOT NULL DEFAULT '0',
  `cld_minute` int(2) NOT NULL DEFAULT '0',
  `cld_second` int(2) NOT NULL DEFAULT '0',
  `cld_cur_time` datetime NOT NULL,
  PRIMARY KEY (`cld_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `h_calendartb`
--

INSERT INTO `h_calendartb` (`cld_id`, `cld_year`, `cld_month`, `cld_day`, `cld_hour`, `cld_minute`, `cld_second`, `cld_cur_time`) VALUES
(60, 1434, 10, 21, 21, 15, 46, '2013-08-19 21:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `h_eventtb`
--

CREATE TABLE IF NOT EXISTS `h_eventtb` (
  `evt_id` int(8) NOT NULL AUTO_INCREMENT,
  `evt_name` varchar(255) NOT NULL,
  `evt_venue` varchar(255) NOT NULL,
  `evt_desc` text NOT NULL,
  `evt_date` datetime NOT NULL,
  `evt_img1` text NOT NULL,
  `evt_img2` text NOT NULL,
  `evt_img3` text NOT NULL,
  `evt_img4` text NOT NULL,
  `evt_img5` text NOT NULL,
  `evt_img6` text NOT NULL,
  `evt_img7` text NOT NULL,
  `evt_img8` text NOT NULL,
  `evt_img9` text NOT NULL,
  `evt_img10` text NOT NULL,
  PRIMARY KEY (`evt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `h_eventtb`
--

INSERT INTO `h_eventtb` (`evt_id`, `evt_name`, `evt_venue`, `evt_desc`, `evt_date`, `evt_img1`, `evt_img2`, `evt_img3`, `evt_img4`, `evt_img5`, `evt_img6`, `evt_img7`, `evt_img8`, `evt_img9`, `evt_img10`) VALUES
(1, 'Ramadhan Iftar', 'Diamond Jubliee', 'yfsdg d udsfd  sduf sdnu fsdu wsdfsud fusd fksduf sd fsdusd fw f sdfsdws fuwf sdfwsfwsf weifwef uw uw fiujefiwefk ewf ifweifwefiwefwe fwefwe fi we f wefiuwefwe fiuwe f wiu ffwe ufwefiuewf we iwef', '2013-08-04 18:00:00', '09c5626b3c8bbef5eee334e9d5a73c57.jpg', '4b3c69f9fa60ef6bd7f6d8d5ca83ffca.jpg', '', '', '', '', '', '', '', ''),
(2, 'Eid Ul Hajj', 'DYCCC', 'jfsdhfjsd hf jkfhjf js jkkjfkjfhksjf kud hk fkjs fkjds kjkjfkj kj fkj dsfsdkj sdjkf sdjkf hksjdfkjsdfk sdkjf sdkjf sdjk fksdfjkdsjfksdjkfkjfhsdkjfhdjkfkjs fjks jks jkshf kjs fkjdsf ks fjkfj shfkj sdhkjh', '2013-10-13 07:19:00', '106225320111461274851_.png', '', '', '', '', '', '', '', '', ''),
(3, 'Event 1', 'Event', 'Event Event Event', '2013-08-17 01:15:00', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `h_librarytb`
--

CREATE TABLE IF NOT EXISTS `h_librarytb` (
  `lib_id` int(8) NOT NULL AUTO_INCREMENT,
  `lib_title` varchar(255) NOT NULL,
  `lib_desc` text NOT NULL,
  `lib_type` varchar(100) NOT NULL,
  `lib_author` varchar(255) NOT NULL,
  `lib_cover_img` text NOT NULL,
  `lib_file` text NOT NULL,
  `lib_date` datetime NOT NULL,
  PRIMARY KEY (`lib_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `h_librarytb`
--

INSERT INTO `h_librarytb` (`lib_id`, `lib_title`, `lib_desc`, `lib_type`, `lib_author`, `lib_cover_img`, `lib_file`, `lib_date`) VALUES
(4, 'Video 1', 'Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.Video 1.', 'video', 'Omar', '', '', '2013-08-14 06:04:06'),
(5, 'Audio 1', 'Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.Audio 1.', 'audio', 'Fahad', '', '', '2013-08-06 10:22:20'),
(6, 'Book 1', 'Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.Book 1.', 'book', 'Fahad', '', '', '2013-08-04 10:42:49'),
(7, 'Article 1', 'Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.Article 1.', 'article', 'Feisal', '', '', '2013-08-02 15:28:00'),
(8, 'Video 2', 'Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.Video 2.', 'video', 'Feisal', '', '', '2013-08-07 14:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `h_newstb`
--

CREATE TABLE IF NOT EXISTS `h_newstb` (
  `news_id` int(8) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_brief` varchar(255) NOT NULL,
  `news_date` date NOT NULL,
  `news_content` text NOT NULL,
  `news_regdate` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `h_newstb`
--

INSERT INTO `h_newstb` (`news_id`, `news_title`, `news_brief`, `news_date`, `news_content`, `news_regdate`) VALUES
(1, 'I am a developer', 'Developer', '2013-06-15', '<p>asdfasdfasdfasdfas dfas</p>', '2013-06-22 17:03:58'),
(2, 'Hey joana. I love you', 'Hello', '2013-06-17', '<p>dsfasdfasdfas fsad f</p>', '2013-06-22 17:03:46'),
(4, 'This is a new news', 'Test News', '2013-06-15', '<p>afddafasdfaa sdfa sdf asdf</p>\r\n<p>a s</p>\r\n<p>dfasd fasdf</p>', '2013-06-22 17:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `h_querytb`
--

CREATE TABLE IF NOT EXISTS `h_querytb` (
  `qu_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `qu_content` text NOT NULL,
  `qu_date` date NOT NULL,
  `admin_id` int(8) NOT NULL,
  `qu_answer_content` text NOT NULL,
  `qu_answer_date` date NOT NULL,
  `qu_answered` varchar(100) NOT NULL,
  PRIMARY KEY (`qu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `h_resourcetb`
--

CREATE TABLE IF NOT EXISTS `h_resourcetb` (
  `res_id` int(8) NOT NULL AUTO_INCREMENT,
  `res_name` text NOT NULL,
  `res_link` text NOT NULL,
  `sclar_id` int(8) NOT NULL,
  `res_date` date NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `h_resourcetb`
--

INSERT INTO `h_resourcetb` (`res_id`, `res_name`, `res_link`, `sclar_id`, `res_date`) VALUES
(1, '', 'www.google.com', 1, '2013-06-14'),
(2, '', 'www.youtube.com', 3, '2013-06-14'),
(39, '', 'www.filehippo.com', 3, '2013-08-13'),
(40, '', 'www.yahoo.com', 2, '2013-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `h_scholartb`
--

CREATE TABLE IF NOT EXISTS `h_scholartb` (
  `sclar_id` int(8) NOT NULL AUTO_INCREMENT,
  `sclar_name` varchar(256) NOT NULL,
  `sclar_birth` date NOT NULL,
  `sclar_life` text NOT NULL,
  `sclar_from` text NOT NULL,
  `sclar_type` varchar(255) NOT NULL,
  `sclar_img` text NOT NULL,
  `sclar_date` date NOT NULL,
  PRIMARY KEY (`sclar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `h_scholartb`
--

INSERT INTO `h_scholartb` (`sclar_id`, `sclar_name`, `sclar_birth`, `sclar_life`, `sclar_from`, `sclar_type`, `sclar_img`, `sclar_date`) VALUES
(1, 'Scholar 1', '2000-03-05', 'nbfdsbfdbsfkjdsjkf dsnmbdsmbfdsnmbdsnmbd snbfdsnmdsnmbfdsnmbfd snmbfdsnmfbdsnmfbdnfb dsnmbdmnbbdf ds jdsb ds db dbfmndbfmndsbf mdsbf mnsdbf nmdsbf mdsbfdsnmfdsnmf bsdmn dsnm sdmf sdmfbdsmbfmdsnfsdbf bsdnmb dsnm fdsf dsb f', 'Tanzania', 'Imam', '', '2013-06-14'),
(2, 'Scholar 2', '2003-08-15', 'dsff djfdhjfskskjdsjf hdskfjdskfh jkf dkjsdkjfhdkjfhdkjfdkj jkds fdshfjkdhfjds jdsk dkjfhdkjfhdskjhdksjfhdkjfhjds fds hjdhfjdhfjdhfjkdsf dskj dskfjdsjkf dsjk fdsk fdsfjkds dsk fkjd fkj fjkds fkjdshfskfjhdskjf dskjfhdskjfh dkj', 'Kenya', 'Scholar', '', '2013-06-14'),
(3, 'Scholar 3', '2004-07-01', 'asdfasdfjnds kds jkdsf ksfhjsdhkjdsfhdkjfhdskjjdkfkjdf kdsjfdskj hfd fhdskfkdsj dskj dskf dkhf dkjf dkjfh dkjhdkj dkjfh dkjf dskjhf dsk hdskjfkdsjhkdsfkd k hkd  kjdjkdh hdkjhdsjfdskjfh dskjfdsk fsdhf dshfkdskfdshfdskjh dsk dskf dfsfs ff  fsd  dfds fds fsdf df dsf dsfds fdsf dsf ds fds fdsf f dsf dsf dsf ds fds fds fds fds fds f dsf dsf dsf dsf dsf f dsf dsf dsf ds fds fds f dfds fds fdsfdsjf fdfdkfnd dfdf dnnfkdnfkdskf dskfndksnfkdsnkdksndfkdsfknkn dskfn dnfdnfkd nkf dsk ds fd fdsk ksdf  fdskjf ds f kjdsnfd nds dsf sdk sdf ds fsd', 'Uganda', 'Imam', '09c5626b3c8bbef5eee334e9d5a73c57.jpg', '2013-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `h_schooltb`
--

CREATE TABLE IF NOT EXISTS `h_schooltb` (
  `schl_id` int(8) NOT NULL AUTO_INCREMENT,
  `schl_name` varchar(256) NOT NULL,
  `sclar_id` int(8) NOT NULL,
  `schl_date` date NOT NULL,
  PRIMARY KEY (`schl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `h_schooltb`
--

INSERT INTO `h_schooltb` (`schl_id`, `schl_name`, `sclar_id`, `schl_date`) VALUES
(23, 'school 1', 1, '2013-06-14'),
(28, 'school 1', 2, '2013-06-14'),
(39, 'school 3', 2, '2013-06-14'),
(40, 'school 6', 3, '2013-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `h_usertb`
--

CREATE TABLE IF NOT EXISTS `h_usertb` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_activation` text,
  `user_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `h_usertb`
--

INSERT INTO `h_usertb` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_activation`, `user_date`) VALUES
(1, 'User', '1', 'user@123.com', '123456789', NULL, '2013-08-16 11:24:00'),
(2, 'User', '2', 'user2@123.com', '12345', NULL, '2013-08-13 08:24:00'),
(3, 'Fahad', 'Hassan', 'fahad@123.com', 'pass', '15679430332140563044751871101300150108990801960', '2013-08-16 23:31:23'),
(5, 'Fahad', 'Hassan', 'fahadjhassan@gmail.com', 'password', NULL, '2013-08-23 17:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `intro`
--

CREATE TABLE IF NOT EXISTS `intro` (
  `1` int(11) NOT NULL AUTO_INCREMENT,
  `intro` text NOT NULL,
  PRIMARY KEY (`1`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `intro`
--

INSERT INTO `intro` (`1`, `intro`) VALUES
(1, 'ad');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
