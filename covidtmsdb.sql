-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 ديسمبر 2021 الساعة 12:31
-- إصدار الخادم: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidtmsdb`
--

-- --------------------------------------------------------

--
-- بنية الجدول `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `AdminuserName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `MobileNumber` int(10) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'الدكتور صقر', 'admin', 1234567890, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '2021-04-19 18:30:00');

-- --------------------------------------------------------

--
-- بنية الجدول `tblpatients`
--

CREATE TABLE `tblpatients` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `MobileNumber` bigint(12) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `GovtIssuedId` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `GovtIssuedIdNo` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `FullAddress` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `State` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tblpatients`
--

INSERT INTO `tblpatients` (`id`, `FullName`, `MobileNumber`, `DateOfBirth`, `GovtIssuedId`, `GovtIssuedIdNo`, `FullAddress`, `State`, `RegistrationDate`) VALUES
(33, 'محمد سعد', 14529745147, '2010-10-07', 'الهوية الوطنية', '1452445175', 'الموصل /حي القاهرة', 'الموصل', '2021-12-26 09:41:43'),
(34, 'عمر حسين', 14527847414, '2019-02-08', 'جواز السفر', '41745955959', 'بغداد/الكراده', 'بغداد', '2021-12-26 09:42:52'),
(35, 'مشعل سعيد', 14528754631, '2021-12-16', 'الهوية الوطنية', '142542545845', 'الموصل /حي الجزائر', 'الموصل', '2021-12-26 09:43:47');

-- --------------------------------------------------------

--
-- بنية الجدول `tblphlebotomist`
--

CREATE TABLE `tblphlebotomist` (
  `id` int(11) NOT NULL,
  `EmpID` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `MobileNumber` bigint(12) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tblphlebotomist`
--

INSERT INTO `tblphlebotomist` (`id`, `EmpID`, `FullName`, `MobileNumber`, `RegDate`) VALUES
(15, '10', 'عمر محمد', 14528754637, '2021-12-26 09:38:59'),
(16, '18', 'علي عمر', 14528754631, '2021-12-26 09:39:39'),
(17, '25', 'سعيد البياتي', 14523678412, '2021-12-26 09:40:05'),
(18, '28', 'نرمين الركابي', 14528754631, '2021-12-26 09:40:37');

-- --------------------------------------------------------

--
-- بنية الجدول `tblreporttracking`
--

CREATE TABLE `tblreporttracking` (
  `id` int(11) NOT NULL,
  `OrderNumber` bigint(40) DEFAULT NULL,
  `Remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Status` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `PostingTime` timestamp NULL DEFAULT current_timestamp(),
  `RemarkBy` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tblreporttracking`
--

INSERT INTO `tblreporttracking` (`id`, `OrderNumber`, `Remark`, `Status`, `PostingTime`, `RemarkBy`) VALUES
(78, 426889774, 'تم ارسال الموظف لاجراء الفحص', 'On the Way for Collection', '2021-12-26 09:44:27', 2),
(79, 426889774, 'تم اخذ العينة بنجاح', 'Sample Collected', '2021-12-26 09:46:14', 2);

-- --------------------------------------------------------

--
-- بنية الجدول `tbltestrecord`
--

CREATE TABLE `tbltestrecord` (
  `id` int(11) NOT NULL,
  `OrderNumber` bigint(14) DEFAULT NULL,
  `PatientMobileNumber` bigint(14) DEFAULT NULL,
  `TestType` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `TestTimeSlot` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `ReportStatus` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `FinalReport` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ReportUploadTime` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `RegistrationDate` timestamp NULL DEFAULT current_timestamp(),
  `AssignedtoEmpId` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `AssigntoName` varchar(180) CHARACTER SET utf8 DEFAULT NULL,
  `AssignedTime` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tbltestrecord`
--

INSERT INTO `tbltestrecord` (`id`, `OrderNumber`, `PatientMobileNumber`, `TestType`, `TestTimeSlot`, `ReportStatus`, `FinalReport`, `ReportUploadTime`, `RegistrationDate`, `AssignedtoEmpId`, `AssigntoName`, `AssignedTime`) VALUES
(37, 426889774, 14529745147, 'RT-PCR', '2021-12-30T12:30', 'Sample Collected', NULL, NULL, '2021-12-26 09:41:43', '10', 'عمر محمد', '26-12-2021 03:14:05 PM'),
(38, 589458811, 14527847414, 'RT-PCR', '2021-12-28T12:26', NULL, NULL, NULL, '2021-12-26 09:42:52', NULL, NULL, NULL),
(39, 493369204, 14528754631, 'RT-PCR', '2021-12-30T12:43', NULL, NULL, NULL, '2021-12-26 09:43:47', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatients`
--
ALTER TABLE `tblpatients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblphlebotomist`
--
ALTER TABLE `tblphlebotomist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreporttracking`
--
ALTER TABLE `tblreporttracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestrecord`
--
ALTER TABLE `tbltestrecord`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpatients`
--
ALTER TABLE `tblpatients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblphlebotomist`
--
ALTER TABLE `tblphlebotomist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblreporttracking`
--
ALTER TABLE `tblreporttracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbltestrecord`
--
ALTER TABLE `tbltestrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
