-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2021-06-30 09:42:07
-- 伺服器版本： 8.0.25
-- PHP 版本： 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `gougoushan`
--
CREATE DATABASE IF NOT EXISTS `gougoushan` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gougoushan`;

-- --------------------------------------------------------

--
-- 資料表結構 `act`
--
-- 建立時間： 2021-06-30 08:27:40
--

DROP TABLE IF EXISTS `act`;
CREATE TABLE `act` (
  `Act_ID` char(10) NOT NULL,
  `Act_Name` varchar(20) NOT NULL,
  `Act_StartDT` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Act_EndDT` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Act_Loc` varchar(20) NOT NULL,
  `Act_Content` varchar(500) NOT NULL,
  `Act_Status` varchar(10) NOT NULL,
  `Act_Deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `act`
--

TRUNCATE TABLE `act`;
-- --------------------------------------------------------

--
-- 資料表結構 `act_tour`
--
-- 建立時間： 2021-06-29 04:14:43
--

DROP TABLE IF EXISTS `act_tour`;
CREATE TABLE `act_tour` (
  `AT_ID` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `AT_TourID` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `AT_ActID` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `act_tour`
--

TRUNCATE TABLE `act_tour`;
-- --------------------------------------------------------

--
-- 資料表結構 `ado`
--
-- 建立時間： 2021-06-30 09:17:51
--

DROP TABLE IF EXISTS `ado`;
CREATE TABLE `ado` (
  `Ado_ID` int NOT NULL,
  `Pet_ID` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Ado_Name` char(10) NOT NULL,
  `Ado_Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Ado_Address` varchar(50) NOT NULL,
  `Ado_Tel` char(20) NOT NULL,
  `Ado_Remarks` varchar(200) NOT NULL,
  `Ado_Sex` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Ado_Work` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Ado_Mot` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `ado`
--

TRUNCATE TABLE `ado`;
-- --------------------------------------------------------

--
-- 資料表結構 `demand`
--
-- 建立時間： 2021-06-29 04:14:43
--

DROP TABLE IF EXISTS `demand`;
CREATE TABLE `demand` (
  `Dem_ID` char(10) NOT NULL,
  `Dem_Name` varchar(30) NOT NULL,
  `Dem_Words` varchar(500) NOT NULL,
  `Dem_Num` int NOT NULL,
  `Dem_Emer` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `demand`
--

TRUNCATE TABLE `demand`;
-- --------------------------------------------------------

--
-- 資料表結構 `dn`
--
-- 建立時間： 2021-06-29 04:14:43
--

DROP TABLE IF EXISTS `dn`;
CREATE TABLE `dn` (
  `DN_ID` char(10) NOT NULL,
  `DN_Date` date NOT NULL,
  `DN_Type` char(20) NOT NULL,
  `DN_Name` char(20) NOT NULL,
  `DN_Money` int NOT NULL,
  `DN_Item` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `dn`
--

TRUNCATE TABLE `dn`;
-- --------------------------------------------------------

--
-- 資料表結構 `don`
--
-- 建立時間： 2021-06-29 04:14:44
--

DROP TABLE IF EXISTS `don`;
CREATE TABLE `don` (
  `Don_ID` char(10) NOT NULL,
  `Don_Name` varchar(50) NOT NULL,
  `Don_Email` varchar(50) NOT NULL,
  `Don_Address` varchar(50) NOT NULL,
  `Don_Tel` varchar(30) NOT NULL,
  `Don_Money` int NOT NULL,
  `Don_Date` date NOT NULL,
  `Don_Account` varchar(100) NOT NULL,
  `Don_Editor` char(10) NOT NULL,
  `Don_Remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `don`
--

TRUNCATE TABLE `don`;
-- --------------------------------------------------------

--
-- 資料表結構 `news`
--
-- 建立時間： 2021-06-29 04:14:44
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `News_ID` char(10) NOT NULL,
  `News_Date` date NOT NULL,
  `Pic_ID` char(10) NOT NULL,
  `Vid_ID` char(10) DEFAULT NULL,
  `News_Word` varchar(1000) NOT NULL,
  `News_Title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `news`
--

TRUNCATE TABLE `news`;
-- --------------------------------------------------------

--
-- 資料表結構 `pet`
--
-- 建立時間： 2021-06-29 04:14:44
--

DROP TABLE IF EXISTS `pet`;
CREATE TABLE `pet` (
  `Pet_ID` char(10) NOT NULL,
  `Pet_Breeds` char(10) NOT NULL,
  `Pet_Sex` char(1) NOT NULL,
  `Pet_Type` char(10) NOT NULL,
  `Pet_Age` int NOT NULL,
  `Pet_Text` varchar(255) NOT NULL,
  `Pet_Name` varchar(20) NOT NULL,
  `Pet_Adopt` char(5) NOT NULL,
  `Pet_Personality` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Pet_Color` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Pet_Med` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `pet`
--

TRUNCATE TABLE `pet`;
-- --------------------------------------------------------

--
-- 資料表結構 `pic`
--
-- 建立時間： 2021-06-30 09:27:12
--

DROP TABLE IF EXISTS `pic`;
CREATE TABLE `pic` (
  `Pic_ID` char(10) NOT NULL,
  `Pic_Name` varchar(20) NOT NULL,
  `Pic_Path` varchar(30) NOT NULL,
  `Pic_SourceID` char(10) NOT NULL,
  `Pic_SourcePage` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `pic`
--

TRUNCATE TABLE `pic`;
-- --------------------------------------------------------

--
-- 資料表結構 `tour`
--
-- 建立時間： 2021-06-29 04:14:44
--

DROP TABLE IF EXISTS `tour`;
CREATE TABLE `tour` (
  `Tour_ID` char(10) NOT NULL,
  `Tour_UnitName` varchar(20) NOT NULL,
  `Tour_Name` varchar(10) NOT NULL,
  `Tour_Email` varchar(30) NOT NULL,
  `Tour_Tel` varchar(15) NOT NULL,
  `Tour_Num` int NOT NULL,
  `Tour_Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `tour`
--

TRUNCATE TABLE `tour`;
-- --------------------------------------------------------

--
-- 資料表結構 `vid`
--
-- 建立時間： 2021-06-29 04:14:44
--

DROP TABLE IF EXISTS `vid`;
CREATE TABLE `vid` (
  `Vid_ID` char(10) NOT NULL,
  `Vid_Name` varchar(20) NOT NULL,
  `Vid_Path` varchar(50) NOT NULL,
  `Vid_SourcePage` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `vid`
--

TRUNCATE TABLE `vid`;
-- --------------------------------------------------------

--
-- 資料表結構 `vol`
--
-- 建立時間： 2021-06-30 06:13:27
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE `vol` (
  `Vol_ID` char(10) NOT NULL,
  `Vol_Name` char(10) NOT NULL,
  `Vol_Email` varchar(50) NOT NULL,
  `Vol_Pass` char(10) NOT NULL,
  `Vol_Birth` date NOT NULL,
  `Vol_Tel` char(20) NOT NULL,
  `Vol_Sex` char(1) NOT NULL,
  `Vol_Job` varchar(10) NOT NULL,
  `Vol_Spe` varchar(50) NOT NULL,
  `Vol_Rea` varchar(50) NOT NULL,
  `Vol_Get` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `vol`
--

TRUNCATE TABLE `vol`;
-- --------------------------------------------------------

--
-- 資料表結構 `volact`
--
-- 建立時間： 2021-06-29 04:14:44
--

DROP TABLE IF EXISTS `volact`;
CREATE TABLE `volact` (
  `VA_ID` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VA_NTime` char(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VA_OTime` char(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VA_Area` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `volact`
--

TRUNCATE TABLE `volact`;
-- --------------------------------------------------------

--
-- 資料表結構 `voljoin`
--
-- 建立時間： 2021-06-30 07:35:43
--

DROP TABLE IF EXISTS `voljoin`;
CREATE TABLE `voljoin` (
  `VolJoin_ID` char(10) NOT NULL,
  `VolJoin_ActID` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VolJoin_Num` int NOT NULL,
  `VolJoin_Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VolJoin_Content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VolJoin_StartDT` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VolJoin_EndDT` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VolJoin_Place` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `voljoin`
--

TRUNCATE TABLE `voljoin`;
-- --------------------------------------------------------

--
-- 資料表結構 `vol_voljoin`
--
-- 建立時間： 2021-06-29 04:14:44
--

DROP TABLE IF EXISTS `vol_voljoin`;
CREATE TABLE `vol_voljoin` (
  `VJ_ID` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VJ_VolID` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VJ_VjID` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 資料表新增資料前，先清除舊資料 `vol_voljoin`
--

TRUNCATE TABLE `vol_voljoin`;
--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `act`
--
ALTER TABLE `act`
  ADD PRIMARY KEY (`Act_ID`);

--
-- 資料表索引 `act_tour`
--
ALTER TABLE `act_tour`
  ADD PRIMARY KEY (`AT_ID`);

--
-- 資料表索引 `ado`
--
ALTER TABLE `ado`
  ADD PRIMARY KEY (`Ado_ID`),
  ADD KEY `Pet_ID` (`Pet_ID`);

--
-- 資料表索引 `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`Dem_ID`);

--
-- 資料表索引 `dn`
--
ALTER TABLE `dn`
  ADD PRIMARY KEY (`DN_ID`);

--
-- 資料表索引 `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`Don_ID`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_ID`);

--
-- 資料表索引 `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`Pet_ID`);

--
-- 資料表索引 `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`Pic_ID`),
  ADD KEY `Pic_SourceID` (`Pic_SourceID`);

--
-- 資料表索引 `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`Tour_ID`);

--
-- 資料表索引 `vid`
--
ALTER TABLE `vid`
  ADD PRIMARY KEY (`Vid_ID`);

--
-- 資料表索引 `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`Vol_ID`);

--
-- 資料表索引 `volact`
--
ALTER TABLE `volact`
  ADD PRIMARY KEY (`VA_ID`);

--
-- 資料表索引 `voljoin`
--
ALTER TABLE `voljoin`
  ADD PRIMARY KEY (`VolJoin_ID`);

--
-- 資料表索引 `vol_voljoin`
--
ALTER TABLE `vol_voljoin`
  ADD PRIMARY KEY (`VJ_ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ado`
--
ALTER TABLE `ado`
  MODIFY `Ado_ID` int NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `ado`
--
ALTER TABLE `ado`
  ADD CONSTRAINT `ado_ibfk_1` FOREIGN KEY (`Pet_ID`) REFERENCES `pet` (`Pet_ID`);

--
-- 資料表的限制式 `pic`
--
ALTER TABLE `pic`
  ADD CONSTRAINT `pic_ibfk_1` FOREIGN KEY (`Pic_SourceID`) REFERENCES `pet` (`Pet_ID`),
  ADD CONSTRAINT `pic_ibfk_2` FOREIGN KEY (`Pic_SourceID`) REFERENCES `news` (`News_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
