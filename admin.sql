-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 01 月 18 日 15:10
-- 伺服器版本: 5.5.56-MariaDB
-- PHP 版本： 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `admin`
--

-- --------------------------------------------------------

--
-- 資料表結構 `car`
--

CREATE TABLE `car` (
  `sn` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '車種',
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '車牌',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL COMMENT '公定價',
  `checkday` date NOT NULL COMMENT '驗車日',
  `license` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '行照',
  `rem` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `car`
--

INSERT INTO `car` (`sn`, `type`, `code`, `name`, `price`, `checkday`, `license`, `rem`) VALUES
(1, '1', '842-XX', '福壽大巴三排椅36座', 10000, '2018-07-01', '', ''),
(2, '1', 'A5-349', 'Isuzu/五十鈴22座椅', 8000, '2018-01-14', '', 'Isuzu/五十鈴　中型遊覽車\r\n豪華三排座椅'),
(3, '1', '207-RR', '現代中巴21座', 8500, '0000-00-00', '', 'VW/福斯-九人座'),
(4, '1', '209-EE', '福壽大巴三排椅35座', 10000, '0000-00-00', '', '現代 STAREX (2015新款車)'),
(5, '1', '769-MM', '大巴四排椅45座', 9000, '0000-00-00', '', 'TOYOTA ALTIS (2015新款車)'),
(6, '4', 'RAP-3027', 'TOYOTA VIOS', 2000, '2018-06-29', '', 'TOYOTA VIOS (2015新款車)'),
(7, '4', 'RAP-3037', 'TOYOTA ALTIS', 2500, '2018-06-29', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `car_expend`
--

CREATE TABLE `car_expend` (
  `sn` int(11) NOT NULL,
  `gid` int(11) NOT NULL COMMENT 'car_id',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '項目:油,稅,保養,維修,保險',
  `price` int(11) NOT NULL COMMENT '金額',
  `rem` text COLLATE utf8_unicode_ci NOT NULL COMMENT '備註',
  `date` date NOT NULL COMMENT '日期',
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `car_expend`
--

INSERT INTO `car_expend` (`sn`, `gid`, `name`, `type`, `price`, `rem`, `date`, `create_at`) VALUES
(1, 1, '中油', '0', 1000, '先代墊', '2017-10-12', '2017-10-12 23:39:50'),
(2, 1, '換輪胎', '3', 15000, '前面兩顆', '2017-10-12', '2017-10-12 23:40:14');

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `sn` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '客種: 散客,公司',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '統編',
  `address` varchar(70) COLLATE utf8_unicode_ci NOT NULL COMMENT '地址',
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '電話',
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '手機',
  `birthday` date NOT NULL COMMENT '生日',
  `rem` text COLLATE utf8_unicode_ci NOT NULL COMMENT '備註',
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `customer`
--

INSERT INTO `customer` (`sn`, `type`, `name`, `code`, `address`, `tel`, `phone`, `birthday`, `rem`, `create_at`) VALUES
(1, '1', '陳美莉', '', '', '', '0912345678', '0000-00-00', '', '2017-10-12 23:43:06'),
(2, '2', '台東大民宿', '22233344', '', '07 23456789', '099663366', '0000-00-00', '開三聯', '2017-10-12 23:44:02'),
(3, '3', 'XX大飯店', '', '', '', '23', '0000-00-00', '', '2018-01-18 15:07:22'),
(4, '4', '旅行社1', '', '', '', '123453', '0000-00-00', '', '2018-01-18 15:07:32'),
(5, '5', '同業2', '', '', '', '324t5', '0000-00-00', '', '2018-01-18 15:07:45');

-- --------------------------------------------------------

--
-- 資料表結構 `driver`
--

CREATE TABLE `driver` (
  `sn` int(11) NOT NULL,
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '身分證號',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '電話',
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '手機',
  `bank_account` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '銀行帳戶',
  `address` varchar(70) COLLATE utf8_unicode_ci NOT NULL COMMENT '戶籍地',
  `address2` varchar(70) COLLATE utf8_unicode_ci NOT NULL COMMENT '通訊地',
  `pay` int(11) NOT NULL COMMENT '薪資',
  `license` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '身分證資料',
  `rem` text COLLATE utf8_unicode_ci NOT NULL COMMENT '備註'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `driver`
--

INSERT INTO `driver` (`sn`, `id`, `name`, `tel`, `phone`, `bank_account`, `address`, `address2`, `pay`, `license`, `rem`) VALUES
(1, 'A123456789', '高天祥', '22334578', '0987654321', '', '', '', 0, '2471912.jpg', ''),
(2, 'A123123123', '勇伯', '987897987', '0987987987', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `log`
--

CREATE TABLE `log` (
  `sn` int(11) NOT NULL,
  `params` text COLLATE utf8_unicode_ci NOT NULL,
  `IP` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `log`
--

INSERT INTO `log` (`sn`, `params`, `IP`, `datetime`) VALUES
(1, '[]', '45.76.176.250', '2017-10-20 09:57:15'),
(5, '{\"account\":\"ryan\",\"password\":\"123454\"}', '61.220.140.66', '2017-11-07 06:29:44'),
(6, '{\"account\":\"A123456789\",\"password\":\"098765421`\"}', '1.162.178.151', '2017-11-20 13:43:12'),
(7, '{\"account\":\"admin\",\"password\":\"74185\"}', '114.42.164.103', '2017-11-28 14:44:14'),
(8, '{\"account\":\"admin\",\"password\":\"admin\"}', '61.220.140.66', '2017-12-19 10:46:41'),
(9, '{\"account\":\"\",\"password\":\"\"}', '61.220.140.66', '2018-01-18 04:16:37');

-- --------------------------------------------------------

--
-- 資料表結構 `order_car`
--

CREATE TABLE `order_car` (
  `sn` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '地點',
  `order_date` date NOT NULL COMMENT '下單日期',
  `adate` date NOT NULL COMMENT '啟用日',
  `bdate` date NOT NULL COMMENT '最後使用日',
  `atime` time NOT NULL,
  `btime` time NOT NULL,
  `org_price` int(11) DEFAULT NULL COMMENT '原價',
  `special_price` int(11) DEFAULT NULL COMMENT '訂單價',
  `invoice` int(11) NOT NULL COMMENT '發票:  二聯  三聯  免開?',
  `rem` text COLLATE utf8_unicode_ci COMMENT '訂單備註',
  `rem_customer` text COLLATE utf8_unicode_ci COMMENT '客戶備註',
  `rem_drive` text COLLATE utf8_unicode_ci COMMENT '司機備註',
  `create_at` datetime NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態: 報價未收 , 已收款 , 已開發票, ,結案 , 取消',
  `readytogo` tinyint(4) NOT NULL COMMENT '確認派車 0 off .  1 go  影響範圍  司機可看到  '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `order_car`
--

INSERT INTO `order_car` (`sn`, `customer_id`, `location`, `order_date`, `adate`, `bdate`, `atime`, `btime`, `org_price`, `special_price`, `invoice`, `rem`, `rem_customer`, `rem_drive`, `create_at`, `status`, `readytogo`) VALUES
(1, 1, '', '2017-10-12', '2018-01-29', '2018-01-31', '00:00:00', '00:00:00', NULL, NULL, 2, '訂單備註\r\n訂單備註', NULL, NULL, '2017-10-12 23:45:11', '1', 1),
(2, 2, '', '2017-10-12', '2017-12-05', '2017-12-12', '00:00:00', '00:00:00', 0, 222, 2, '11', '22', '3\r\n3\r\n3', '2017-10-12 23:50:06', '2', 1),
(4, 1, '台東機場', '2017-11-03', '2017-11-20', '2017-11-20', '03:30:00', '06:30:00', 4500, 4400, 3, 'test1', 'test2', 'test3', '2017-11-03 00:29:08', '1', 0),
(5, 1, '台東碼頭', '2017-11-03', '2017-12-01', '2017-12-02', '00:00:00', '00:00:00', 0, 15000, 3, '訂單備註\r\n訂單備註\r\n訂單備註\r\na', '給客戶的備註\r\n給客戶的備註\r\n給客戶的備註\r\nbbb', '要收5000\r\n要收5000\r\n要收5000ccc', '2017-11-03 01:18:21', '2', 0),
(6, 1, '', '2017-12-13', '2017-12-26', '2017-12-26', '00:00:00', '00:00:00', 20500, 205, 2, '', '', '', '2017-12-13 15:55:22', '1', 0),
(7, 2, '台東碼頭', '2017-12-13', '2017-12-27', '2017-12-27', '00:00:00', '00:00:00', 20500, 205, 2, '', '', '', '2017-12-13 16:28:17', '1', 0),
(8, 1, '', '2017-12-13', '2017-12-26', '2017-12-30', '00:00:00', '00:00:00', 22500, 225, 2, '', '', '', '2017-12-13 16:53:53', '1', 0),
(9, 1, '台東火車站', '2017-12-13', '2017-12-26', '2017-12-26', '00:00:00', '00:00:00', 2000, 2, 2, '', '', '', '2017-12-13 16:54:59', '1', 1),
(10, 2, '台東機場', '2017-12-13', '2017-12-24', '2017-12-24', '00:00:00', '00:00:00', 15000, 1200, 2, '', '', '', '2017-12-13 17:04:33', '1', 0),
(11, 2, '', '2017-12-18', '2017-12-10', '2017-12-12', '00:00:00', '00:00:00', 97500, 999999, 2, 'aaaa', 'vvbbb', 'cccc', '2017-12-18 18:29:55', '1', 0),
(12, 2, '', '2018-01-11', '2018-01-09', '2018-01-10', '00:00:00', '00:00:00', 36000, 33333, 2, '', '', '', '2018-01-11 16:26:18', '1', 1),
(13, 1, '', '2018-01-12', '2018-01-01', '2018-01-31', '00:00:00', '00:00:00', 620000, 500000, 2, '', '', '', '2018-01-12 15:41:50', '1', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `order_car_d`
--

CREATE TABLE `order_car_d` (
  `sn` int(11) NOT NULL,
  `order_id` int(11) NOT NULL COMMENT '訂單編號',
  `date` date NOT NULL COMMENT '訂單日期區間轉成每日一筆',
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `driver_reply` text COLLATE utf8_unicode_ci NOT NULL COMMENT '司機回報',
  `reply_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='訂單細部資料  依造每日可轉派車單';

--
-- 資料表的匯出資料 `order_car_d`
--

INSERT INTO `order_car_d` (`sn`, `order_id`, `date`, `car_id`, `driver_id`, `driver_reply`, `reply_time`) VALUES
(3, 2, '2017-11-17', 1, 1, 'feawewfAA\n天祥reply', '2017-11-20 21:58:47'),
(5, 4, '2017-11-20', 4, 0, 'afwfew\n;lkjhgfds', '2017-11-07 14:34:27'),
(6, 5, '2017-11-27', 2, 2, '回報測試', '0000-00-00 00:00:00'),
(7, 5, '2017-11-28', 2, 2, 'feowpjwep\nwfaeojpe\npefapojepw\n', '2017-11-04 10:46:16'),
(8, 6, '2017-12-26', 1, 1, '', '0000-00-00 00:00:00'),
(9, 6, '2017-12-26', 2, 2, '', '0000-00-00 00:00:00'),
(10, 7, '2017-12-27', 1, 1, '', '0000-00-00 00:00:00'),
(11, 7, '2017-12-27', 2, 2, '', '0000-00-00 00:00:00'),
(12, 7, '2017-12-27', 5, 0, '', '0000-00-00 00:00:00'),
(13, 8, '2017-12-26', 5, 0, '', '0000-00-00 00:00:00'),
(14, 8, '2017-12-26', 6, 0, '', '0000-00-00 00:00:00'),
(15, 8, '2017-12-27', 5, 0, '', '0000-00-00 00:00:00'),
(16, 8, '2017-12-27', 6, 0, '', '0000-00-00 00:00:00'),
(17, 8, '2017-12-28', 5, 0, '', '0000-00-00 00:00:00'),
(18, 8, '2017-12-28', 6, 0, '', '0000-00-00 00:00:00'),
(19, 8, '2017-12-29', 5, 0, '', '0000-00-00 00:00:00'),
(20, 8, '2017-12-29', 6, 0, '', '0000-00-00 00:00:00'),
(21, 8, '2017-12-30', 5, 0, '', '0000-00-00 00:00:00'),
(22, 8, '2017-12-30', 6, 0, '', '0000-00-00 00:00:00'),
(23, 9, '2017-12-26', 6, 0, '', '0000-00-00 00:00:00'),
(210, 10, '2017-12-24', 2, 1, '', '0000-00-00 00:00:00'),
(211, 10, '2017-12-24', 6, 0, '', '0000-00-00 00:00:00'),
(212, 10, '2017-12-24', 3, 2, '', '0000-00-00 00:00:00'),
(213, 11, '2017-12-10', 3, 0, '', '0000-00-00 00:00:00'),
(214, 11, '2017-12-10', 1, 0, '', '0000-00-00 00:00:00'),
(215, 11, '2017-12-10', 3, 0, '', '0000-00-00 00:00:00'),
(216, 11, '2017-12-10', 2, 0, '', '0000-00-00 00:00:00'),
(217, 11, '2017-12-10', 4, 0, '', '0000-00-00 00:00:00'),
(218, 11, '2017-12-11', 3, 0, '', '0000-00-00 00:00:00'),
(219, 11, '2017-12-11', 1, 0, '', '0000-00-00 00:00:00'),
(220, 11, '2017-12-11', 3, 0, '', '0000-00-00 00:00:00'),
(221, 11, '2017-12-11', 2, 0, '', '0000-00-00 00:00:00'),
(222, 11, '2017-12-11', 4, 0, '', '0000-00-00 00:00:00'),
(223, 11, '2017-12-12', 3, 0, '', '0000-00-00 00:00:00'),
(224, 11, '2017-12-12', 1, 0, '', '0000-00-00 00:00:00'),
(225, 11, '2017-12-12', 3, 0, '', '0000-00-00 00:00:00'),
(226, 11, '2017-12-12', 2, 0, '', '0000-00-00 00:00:00'),
(227, 11, '2017-12-12', 4, 0, '', '0000-00-00 00:00:00'),
(228, 12, '2018-01-09', 2, 1, '', '0000-00-00 00:00:00'),
(229, 12, '2018-01-09', 4, 0, '', '0000-00-00 00:00:00'),
(230, 12, '2018-01-10', 2, 1, '', '0000-00-00 00:00:00'),
(231, 12, '2018-01-10', 4, 0, '', '0000-00-00 00:00:00'),
(418, 13, '2018-01-01', 1, 1, '', '0000-00-00 00:00:00'),
(419, 13, '2018-01-01', 2, 2, '', '0000-00-00 00:00:00'),
(420, 13, '2018-01-01', 6, 0, '', '0000-00-00 00:00:00'),
(421, 13, '2018-01-02', 1, 1, '', '0000-00-00 00:00:00'),
(422, 13, '2018-01-02', 2, 2, '', '0000-00-00 00:00:00'),
(423, 13, '2018-01-02', 6, 0, '', '0000-00-00 00:00:00'),
(424, 13, '2018-01-03', 1, 1, '', '0000-00-00 00:00:00'),
(425, 13, '2018-01-03', 2, 2, '', '0000-00-00 00:00:00'),
(426, 13, '2018-01-03', 6, 0, '', '0000-00-00 00:00:00'),
(427, 13, '2018-01-04', 1, 1, '', '0000-00-00 00:00:00'),
(428, 13, '2018-01-04', 2, 2, '', '0000-00-00 00:00:00'),
(429, 13, '2018-01-04', 6, 0, '', '0000-00-00 00:00:00'),
(430, 13, '2018-01-05', 1, 1, '', '0000-00-00 00:00:00'),
(431, 13, '2018-01-05', 2, 2, '', '0000-00-00 00:00:00'),
(432, 13, '2018-01-05', 6, 0, '', '0000-00-00 00:00:00'),
(433, 13, '2018-01-06', 1, 1, '', '0000-00-00 00:00:00'),
(434, 13, '2018-01-06', 2, 2, '', '0000-00-00 00:00:00'),
(435, 13, '2018-01-06', 6, 0, '', '0000-00-00 00:00:00'),
(436, 13, '2018-01-07', 1, 1, '', '0000-00-00 00:00:00'),
(437, 13, '2018-01-07', 2, 2, '', '0000-00-00 00:00:00'),
(438, 13, '2018-01-07', 6, 0, '', '0000-00-00 00:00:00'),
(439, 13, '2018-01-08', 1, 1, '', '0000-00-00 00:00:00'),
(440, 13, '2018-01-08', 2, 2, '', '0000-00-00 00:00:00'),
(441, 13, '2018-01-08', 6, 0, '', '0000-00-00 00:00:00'),
(442, 13, '2018-01-09', 1, 1, '', '0000-00-00 00:00:00'),
(443, 13, '2018-01-09', 2, 2, '', '0000-00-00 00:00:00'),
(444, 13, '2018-01-09', 6, 0, '', '0000-00-00 00:00:00'),
(445, 13, '2018-01-10', 1, 1, '', '0000-00-00 00:00:00'),
(446, 13, '2018-01-10', 2, 2, '', '0000-00-00 00:00:00'),
(447, 13, '2018-01-10', 6, 0, '', '0000-00-00 00:00:00'),
(448, 13, '2018-01-11', 1, 1, '', '0000-00-00 00:00:00'),
(449, 13, '2018-01-11', 2, 2, '', '0000-00-00 00:00:00'),
(450, 13, '2018-01-11', 6, 0, '', '0000-00-00 00:00:00'),
(451, 13, '2018-01-12', 1, 1, '', '0000-00-00 00:00:00'),
(452, 13, '2018-01-12', 2, 2, '', '0000-00-00 00:00:00'),
(453, 13, '2018-01-12', 6, 0, '', '0000-00-00 00:00:00'),
(454, 13, '2018-01-13', 1, 1, '', '0000-00-00 00:00:00'),
(455, 13, '2018-01-13', 2, 2, '', '0000-00-00 00:00:00'),
(456, 13, '2018-01-13', 6, 0, '', '0000-00-00 00:00:00'),
(457, 13, '2018-01-14', 1, 1, '', '0000-00-00 00:00:00'),
(458, 13, '2018-01-14', 2, 2, '', '0000-00-00 00:00:00'),
(459, 13, '2018-01-14', 6, 0, '', '0000-00-00 00:00:00'),
(460, 13, '2018-01-15', 1, 1, '', '0000-00-00 00:00:00'),
(461, 13, '2018-01-15', 2, 2, '', '0000-00-00 00:00:00'),
(462, 13, '2018-01-15', 6, 0, '', '0000-00-00 00:00:00'),
(463, 13, '2018-01-16', 1, 1, '', '0000-00-00 00:00:00'),
(464, 13, '2018-01-16', 2, 2, '', '0000-00-00 00:00:00'),
(465, 13, '2018-01-16', 6, 0, '', '0000-00-00 00:00:00'),
(466, 13, '2018-01-17', 1, 1, '', '0000-00-00 00:00:00'),
(467, 13, '2018-01-17', 2, 2, '', '0000-00-00 00:00:00'),
(468, 13, '2018-01-17', 6, 0, '', '0000-00-00 00:00:00'),
(469, 13, '2018-01-18', 1, 1, '', '0000-00-00 00:00:00'),
(470, 13, '2018-01-18', 2, 2, '', '0000-00-00 00:00:00'),
(471, 13, '2018-01-18', 6, 0, '', '0000-00-00 00:00:00'),
(472, 13, '2018-01-19', 1, 1, '', '0000-00-00 00:00:00'),
(473, 13, '2018-01-19', 2, 2, '', '0000-00-00 00:00:00'),
(474, 13, '2018-01-19', 6, 0, '', '0000-00-00 00:00:00'),
(475, 13, '2018-01-20', 1, 1, '', '0000-00-00 00:00:00'),
(476, 13, '2018-01-20', 2, 2, '', '0000-00-00 00:00:00'),
(477, 13, '2018-01-20', 6, 0, '', '0000-00-00 00:00:00'),
(478, 13, '2018-01-21', 1, 1, '', '0000-00-00 00:00:00'),
(479, 13, '2018-01-21', 2, 2, '', '0000-00-00 00:00:00'),
(480, 13, '2018-01-21', 6, 0, '', '0000-00-00 00:00:00'),
(481, 13, '2018-01-22', 1, 1, '', '0000-00-00 00:00:00'),
(482, 13, '2018-01-22', 2, 2, '', '0000-00-00 00:00:00'),
(483, 13, '2018-01-22', 6, 0, '', '0000-00-00 00:00:00'),
(484, 13, '2018-01-23', 1, 1, '', '0000-00-00 00:00:00'),
(485, 13, '2018-01-23', 2, 2, '', '0000-00-00 00:00:00'),
(486, 13, '2018-01-23', 6, 0, '', '0000-00-00 00:00:00'),
(487, 13, '2018-01-24', 1, 1, '', '0000-00-00 00:00:00'),
(488, 13, '2018-01-24', 2, 2, '', '0000-00-00 00:00:00'),
(489, 13, '2018-01-24', 6, 0, '', '0000-00-00 00:00:00'),
(490, 13, '2018-01-25', 1, 1, '', '0000-00-00 00:00:00'),
(491, 13, '2018-01-25', 2, 2, '', '0000-00-00 00:00:00'),
(492, 13, '2018-01-25', 6, 0, '', '0000-00-00 00:00:00'),
(493, 13, '2018-01-26', 1, 1, '', '0000-00-00 00:00:00'),
(494, 13, '2018-01-26', 2, 2, '', '0000-00-00 00:00:00'),
(495, 13, '2018-01-26', 6, 0, '', '0000-00-00 00:00:00'),
(496, 13, '2018-01-27', 1, 1, '', '0000-00-00 00:00:00'),
(497, 13, '2018-01-27', 2, 2, '', '0000-00-00 00:00:00'),
(498, 13, '2018-01-27', 6, 0, '', '0000-00-00 00:00:00'),
(499, 13, '2018-01-28', 1, 1, '', '0000-00-00 00:00:00'),
(500, 13, '2018-01-28', 2, 2, '', '0000-00-00 00:00:00'),
(501, 13, '2018-01-28', 6, 0, '', '0000-00-00 00:00:00'),
(502, 13, '2018-01-29', 1, 1, '', '0000-00-00 00:00:00'),
(503, 13, '2018-01-29', 2, 2, '', '0000-00-00 00:00:00'),
(504, 13, '2018-01-29', 6, 0, '', '0000-00-00 00:00:00'),
(505, 13, '2018-01-30', 1, 1, '', '0000-00-00 00:00:00'),
(506, 13, '2018-01-30', 2, 2, '', '0000-00-00 00:00:00'),
(507, 13, '2018-01-30', 6, 0, '', '0000-00-00 00:00:00'),
(508, 13, '2018-01-31', 1, 1, '', '0000-00-00 00:00:00'),
(509, 13, '2018-01-31', 2, 2, '', '0000-00-00 00:00:00'),
(510, 13, '2018-01-31', 6, 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `peer_order`
--

CREATE TABLE `peer_order` (
  `sn` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL COMMENT '下單日期',
  `adate` date NOT NULL COMMENT '啟用日',
  `bdate` date NOT NULL COMMENT '最後使用日',
  `atime` time NOT NULL,
  `btime` time NOT NULL,
  `cost` int(11) DEFAULT NULL COMMENT '成本',
  `price` int(11) DEFAULT NULL COMMENT '報價',
  `invoice` int(11) NOT NULL COMMENT '發票:  二聯  三聯  免開?',
  `rem` text COLLATE utf8_unicode_ci COMMENT '訂單備註',
  `create_at` datetime NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態: 報價未收 , 已收款 , 已開發票, ,結案 , 取消'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `peer_order`
--

INSERT INTO `peer_order` (`sn`, `name`, `detail`, `customer_id`, `order_date`, `adate`, `bdate`, `atime`, `btime`, `cost`, `price`, `invoice`, `rem`, `create_at`, `status`) VALUES
(1, ' 訂單名稱 訂單名稱2', '代訂內容代訂內容\r\n代訂內容2', 1, '2018-01-18', '2018-02-13', '2018-03-03', '00:00:00', '00:00:00', 111112, 222222, 3, '訂單備註\r\n訂單備註2', '2018-01-18 13:40:26', '2');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `sn` int(11) NOT NULL,
  `account` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`sn`, `account`, `password`, `permission`) VALUES
(1, 'timo', '74185', '[\"car\",\"car_expend\",\"driver\",\"customer\",\"order_car\",\"calendar\",\"permission\",\"report\"]'),
(2, 'aaa', 'bbb', '[\"car\",\"car_expend\",\"driver\",\"customer\",\"order_car\",\"calendar\",\"report\"]');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `car_expend`
--
ALTER TABLE `car_expend`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `order_car`
--
ALTER TABLE `order_car`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `order_car_d`
--
ALTER TABLE `order_car_d`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `order_id` (`order_id`);

--
-- 資料表索引 `peer_order`
--
ALTER TABLE `peer_order`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sn`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `car`
--
ALTER TABLE `car`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `car_expend`
--
ALTER TABLE `car_expend`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `driver`
--
ALTER TABLE `driver`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `log`
--
ALTER TABLE `log`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `order_car`
--
ALTER TABLE `order_car`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用資料表 AUTO_INCREMENT `order_car_d`
--
ALTER TABLE `order_car_d`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;
--
-- 使用資料表 AUTO_INCREMENT `peer_order`
--
ALTER TABLE `peer_order`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
