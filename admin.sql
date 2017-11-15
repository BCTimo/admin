-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2017 年 08 月 28 日 11:34
-- 伺服器版本: 5.5.52-MariaDB
-- PHP 版本： 7.0.21

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
  `license` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '行照',
  `rem` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `car`
--

INSERT INTO `car` (`sn`, `type`, `code`, `name`, `price`, `license`, `rem`) VALUES
(18, '1', 'ABC-123', '勿刪  車A', 1000, '', ''),
(19, '3', '41324t', '999人car', 1234, '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `car_expend`
--

CREATE TABLE `car_expend` (
  `sn` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '項目:油,稅,保養,維修,保險',
  `price` int(11) NOT NULL COMMENT '金額',
  `rem` text COLLATE utf8_unicode_ci NOT NULL COMMENT '備註',
  `date` date NOT NULL COMMENT '日期',
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(5, '1', 'customer1', '234354', '92308', '90239581', '0932313274', '2017-08-30', '備註\r\n\r\n很難搞', '2017-08-19 10:10:37'),
(6, '1', 'cust B', '', '', '', '1234253', '0000-00-00', '', '2017-08-19 10:10:48');

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
(2, '16915893810', '司機A', '', '23142534y', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `order_car`
--

CREATE TABLE `order_car` (
  `sn` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL COMMENT '下單日期',
  `adate` date NOT NULL COMMENT '啟用日',
  `bdate` date NOT NULL COMMENT '最後使用日',
  `org_price` int(11) DEFAULT NULL COMMENT '原價',
  `special_price` int(11) DEFAULT NULL COMMENT '訂單價',
  `invoice` int(11) NOT NULL COMMENT '發票:  二聯  三聯  免開?',
  `rem` text COLLATE utf8_unicode_ci COMMENT '訂單備註',
  `rem_customer` text COLLATE utf8_unicode_ci COMMENT '客戶備註',
  `rem_drive` text COLLATE utf8_unicode_ci COMMENT '司機備註',
  `create_at` datetime NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態: 報價未收 , 已收款 , 已開發票, ,結案 , 取消'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `order_car`
--

INSERT INTO `order_car` (`sn`, `customer_id`, `car_id`, `driver_id`, `order_date`, `adate`, `bdate`, `org_price`, `special_price`, `invoice`, `rem`, `rem_customer`, `rem_drive`, `create_at`, `status`) VALUES
(1, 5, NULL, NULL, '2017-08-26', '2017-08-20', '2017-08-22', 17106, 15000, 3, '123', '456', '789', '2017-08-26 18:11:48', '1'),
(2, 5, NULL, NULL, '2017-08-26', '2017-08-20', '2017-08-22', 17106, 15000, 3, '123', '456', '789', '2017-08-26 18:12:48', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `order_car_d`
--

CREATE TABLE `order_car_d` (
  `sn` int(11) NOT NULL,
  `order_id` int(11) NOT NULL COMMENT '訂單編號',
  `date` date NOT NULL COMMENT '訂單日期區間轉成每日一筆',
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='訂單細部資料  依造每日可轉派車單';

--
-- 資料表的匯出資料 `order_car_d`
--

INSERT INTO `order_car_d` (`sn`, `order_id`, `date`, `car_id`, `driver_id`) VALUES
(1, 2, '2017-08-20', 18, 2),
(2, 2, '2017-08-20', 19, 0),
(3, 2, '2017-08-20', 18, 2),
(4, 2, '2017-08-20', 19, 0),
(5, 2, '2017-08-20', 19, 2),
(6, 2, '2017-08-21', 18, 2),
(7, 2, '2017-08-21', 19, 0),
(8, 2, '2017-08-21', 18, 2),
(9, 2, '2017-08-21', 19, 0),
(10, 2, '2017-08-21', 19, 2),
(11, 2, '2017-08-22', 18, 2),
(12, 2, '2017-08-22', 19, 0),
(13, 2, '2017-08-22', 18, 2),
(14, 2, '2017-08-22', 19, 0),
(15, 2, '2017-08-22', 19, 2);

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
-- 資料表索引 `order_car`
--
ALTER TABLE `order_car`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `order_car_d`
--
ALTER TABLE `order_car_d`
  ADD PRIMARY KEY (`sn`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `car`
--
ALTER TABLE `car`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- 使用資料表 AUTO_INCREMENT `car_expend`
--
ALTER TABLE `car_expend`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `driver`
--
ALTER TABLE `driver`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `order_car`
--
ALTER TABLE `order_car`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `order_car_d`
--
ALTER TABLE `order_car_d`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
