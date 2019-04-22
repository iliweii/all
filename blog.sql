-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2019 at 06:00 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '标题',
  `content` varchar(20000) DEFAULT '内容',
  `user` varchar(10) DEFAULT '用户',
  `img` varchar(1000) DEFAULT NULL,
  `intime` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `user`, `img`, `intime`) VALUES
(72, '红红我爱你~最后更一波博客', '哈哈，虽然不小心动了数据库，但我不会跑路的哈哈哈，<a href=\"ahauto.com\">安徽汽车网</a> 这个就算是程序员误删数据库也没有跑路吧哈哈哈；\r\n这也给我一个重新开始的机会，增大了我博客大幅度修改的可能，修改的空间。之前做的不合理的，比如数据表结构，终于改过来了。加油，相信我自己！\r\n\r\n最后，红红，咱俩一起重新记录咱俩的博客。嘻嘻嘻   ^_^', '威威', '', 1553769911),
(75, '威威，棒棒哒', '我们一起把我们的博客帝国重新打造起来吧。', '红红', '', 1553868638);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `password`) VALUES
('威威', '123'),
('红红', '123');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `postid` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `intime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `postid`, `username`, `content`, `intime`) VALUES
(3, 2, '威威', ' 红红我爱你\r\n', 1550756779),
(4, 4, '。。', '你真好~干啥都不忘秀恩爱。。。\r\n', 1550974174),
(5, 6, '嘿嘿', '@红红\r\n不够哎！  少个零呢！！', 1552390752),
(6, 6, '红红', '给你10000，不用找零，过来吧。', 1551079315),
(7, 15, '12345', '123456', 1550895635),
(8, 15, '12345', '123456', 1550895624),
(9, 18, '威威', '谢谢学长，哈哈哈，开心', 1551079187),
(10, 18, '胡华聘', '很不错', 1551016338),
(11, 18, '红红', '太棒了，爱你么么哒，加油哦，么么么？', 1550755580),
(12, 18, '红红', '太棒了，爱你么么哒，加油哦，么么么？', 1550755577),
(13, 18, ' 威威', '有什么不懂得小朋友可以在这里提问哦～爱你们', 1550754422),
(14, 31, '威威', '爱你哟~红红', 1551079056),
(15, 34, '', '<div style=\"font-size:50px; color :pink;\">不错哦</div>', 1551691653),
(16, 34, '', '<div style=\"font-sixe:50px; color :pink;>不错哦</div>', 1551691561),
(17, 34, '', '<div style=\"font-sixe:50px; color :pink;>不错哦</div>', 1551691561),
(18, 34, '', '<div style=\"font-sixe:50px; color :pink;>不错哦</div>', 1551691559),
(19, 35, '我又来了', '冒泡\r\n', 1552295210),
(20, 50, '红红', '有眼光', 1552751512),
(21, 50, '威威', '红红更漂亮\r\n', 1552751447),
(22, 50, '红红', '真漂亮', 1552750477),
(23, 51, '威威', 'woyezaixiangni', 1552901368),
(24, 51, '威威', '打游戏', 1552751459),
(25, 60, '红红', '非常喜欢，么么么', 1553086185),
(26, 62, '威威', '么么哒~爱你就做到啦❤️❤️❤️', 1553086581),
(27, 69, '威威', '\r\n ╭ ﹌╮╭ ∽╮ oοО○\r\n (o\".\"o)(o-.-o) \r\n(~~﹊︸￣︸￣︸)\r\n( ◆ ◆囍◆ ◆ )\r\n( ◆ ◆  ◆ ◆ ) \r\n( ◆ ◆  ◆ ◆ ) ', 1553523223),
(28, 69, '威威', '爱死你啦，红红\r\n死 => 黄泉路\r\n黄泉路 => 不分手\r\n哈哈哈哈\r\n\r\n', 1553523182),
(39, 75, '威威', '爱你哦，红红\r\n一起打造博客帝国', 1553873141);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `user` varchar(50) NOT NULL,
  `intime` int(50) NOT NULL,
  `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`user`, `intime`, `id`) VALUES
('爱红红的威威', 1550664901, 0000000007),
('李威', 1550664877, 0000000006),
('李威', 1550664726, 0000000005),
('pipixia', 1550649705, 0000000004),
('哈哈哈哈', 1550664943, 0000000008),
('无名氏', 1550664959, 0000000009),
('悠闲地游客', 1550664975, 0000000010),
('内部管理员', 1550664988, 0000000011),
('一个好听的名字', 1550668605, 0000000012),
('夜华和浅浅', 1550670084, 0000000013),
('至尊宝和紫霞仙子', 1550670116, 0000000014),
('三生三世', 1550670158, 0000000015),
('^_^!', 1550670171, 0000000016),
('游客是我刷的', 1550670198, 0000000017),
('我又来了', 1550708150, 0000000018),
('</p><p style=\"color: red\">红人', 1550729589, 0000000019),
('</p><p style=\"color: yellow\">黄人', 1550729660, 0000000020),
('最新的留言人', 1550806869, 0000000021),
('喵', 1550895446, 0000000022),
('Steven', 1550895539, 0000000023),
('12345', 1550895608, 0000000024),
('狗屎', 1550895694, 0000000025),
('lol', 1550896194, 0000000026),
('嘿嘿', 1550897553, 0000000027),
('666', 1550897741, 0000000028),
('v过', 1550901594, 0000000029),
('jenny', 1550903117, 0000000030),
('嘤嘤嘤', 1550903157, 0000000031),
('1', 1550912227, 0000000032),
('。。', 1550973808, 0000000033),
('我真好看', 1550980386, 0000000034),
('。。', 1550980467, 0000000035),
('我真好看', 1550988267, 0000000036),
('嘤嘤嘤', 1551011071, 0000000037),
('胡华聘', 1551016253, 0000000038),
('lll', 1551053129, 0000000039),
('不不不', 1551075450, 0000000040),
('李威', 1551079646, 0000000041),
('</p><p style=\"color: red\">亮闪闪的VIP', 1551079725, 0000000042),
('winston', 1551092741, 0000000043),
('。。', 1551093797, 0000000044),
('</p><p style=\"color: yellow\">超级会员', 1551180330, 0000000045),
('111', 1551578925, 0000000046),
('我又来了', 1552295167, 0000000047),
('嘿嘿', 1552390522, 0000000048),
('么么么', 1552394209, 0000000049),
('نەا', 1552740073, 0000000050),
('☀', 1552749737, 0000000051),
('嘿嘿', 1552900403, 0000000052),
('嘿嘿', 1552900404, 0000000053),
('鲁班七号', 1553071080, 0000000054),
('我是你爸爸', 1553072311, 0000000055),
('又双叒叕', 1553072501, 0000000056),
('哈哈哈', 1553303338, 0000000057),
('哈哈哈', 1553341331, 0000000058),
('红红的小迷妹', 1553426093, 0000000059),
('hahaha', 1553493752, 0000000060),
('么么么', 1553501402, 0000000061),
('么么么', 1553503348, 0000000062),
('花棒', 1553580888, 0000000063),
('游客', 1553652303, 0000000064),
('新的用户', 1553662252, 0000000065),
('嘿嘿', 1553766767, 0000000066),
('123', 1553824054, 0000000067),
('第一个访客', 1553857427, 0000000068),
('小威威', 1553873601, 0000000069),
('游客', 1553922874, 0000000070);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
