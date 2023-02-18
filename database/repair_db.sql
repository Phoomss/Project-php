-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 05:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repair_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_case`
--

CREATE TABLE `tbl_case` (
  `case_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'FK',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'FK',
  `tec_id` int(11) NOT NULL,
  `name_case` varchar(100) NOT NULL,
  `detail_case` varchar(1000) NOT NULL,
  `place_case` varchar(100) NOT NULL,
  `date_case` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่แจ้งซ้อม',
  `date_assign` timestamp NULL DEFAULT NULL COMMENT 'เวลาส่งมอบงาน',
  `date_sent` timestamp NULL DEFAULT NULL COMMENT 'วันที่รับงาน',
  `date_close` timestamp NULL DEFAULT NULL COMMENT 'วันที่ปิดงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_case`
--

INSERT INTO `tbl_case` (`case_id`, `user_id`, `status_id`, `tec_id`, `name_case`, `detail_case`, `place_case`, `date_case`, `date_assign`, `date_sent`, `date_close`) VALUES
(1, 4, 3, 2, 'คอมเสีย', 'ไม่รุ้', 'บ้าน', '2023-02-17 17:47:20', '2023-02-17 17:49:05', '2023-02-18 12:00:24', NULL),
(2, 4, 2, 3, 'พัง', 'มาก', 'บ้าน', '2023-02-17 17:47:44', '2023-02-17 17:49:16', NULL, NULL),
(8, 4, 4, 2, 'รถพัง', 'ยางรั่ว', 'ปากซอย', '2023-02-17 18:00:37', '2023-02-17 18:05:30', '2023-02-18 12:00:33', '2023-02-18 12:25:35'),
(9, 4, 2, 6, 'หิวข้าว', 'ตังหมด', 'บ้าน', '2023-02-17 18:01:01', '2023-02-18 12:06:19', NULL, NULL),
(10, 4, 3, 2, 'คอมดับ', 'ระเบิด', 'ชั้น3', '2023-02-17 18:04:41', '2023-02-18 12:06:27', '2023-02-18 12:12:24', NULL),
(11, 4, 3, 2, 'หน้าจอฟ้า', 'ไม่ทราบ', '531', '2023-02-18 12:05:06', '2023-02-18 12:06:34', '2023-02-18 12:23:52', '0000-00-00 00:00:00'),
(12, 4, 2, 2, 'เน็ตช้า', 'ไม่ทราบ', '563', '2023-02-18 12:05:30', '2023-02-18 12:43:10', NULL, NULL),
(13, 5, 1, 0, 'คอมช้า', 'ไม่ทราบ', '250', '2023-02-18 14:46:36', NULL, NULL, NULL),
(14, 5, 1, 0, 'บ้านไหท้', 'ไม่ทราบ', 'บ้าน', '2023-02-18 14:46:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `user_id` int(11) NOT NULL COMMENT 'PK',
  `username` varchar(20) NOT NULL COMMENT 'ID',
  `password` varchar(20) NOT NULL COMMENT 'PASSWORD',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `user_level` varchar(20) NOT NULL COMMENT 'STATUS',
  `u_name` varchar(100) NOT NULL COMMENT 'FIRSTNAME',
  `u_lastname` varchar(100) NOT NULL COMMENT 'LASTNAME',
  `tel` varchar(20) NOT NULL COMMENT 'TELL',
  `email` varchar(50) NOT NULL COMMENT 'EMAIL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `username`, `password`, `user_status`, `user_level`, `u_name`, `u_lastname`, `tel`, `email`) VALUES
(1, 'admin', 'admin', 0, 'admin', 'admin', 'admin', '0111111111', 'admin@gmail.com'),
(2, 'worker1', 'worker1', 0, 'worker', 'Jone', 'De pank', '0321580556', 'jone@gmail.com'),
(3, 'worker2', 'worker2', 0, 'worker', 'None', 'Now', '0222222222', 'now@GMAIL.COM'),
(4, 'employee1', 'employee1', 0, 'employee', 'June', 'De Jong', '0321654789', 'june@gmail.com'),
(5, 'employee2', 'employee2', 0, 'employee', 'na', 'De pank', '0258794613', 'thana@gamil.com'),
(6, 'worker3', 'worker3', 0, 'worker', 'สมพงษ์', 'ชาตรี', '0839975898', 'sompong@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL COMMENT 'PK',
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_name`) VALUES
(1, 'รอนำเนินการ'),
(2, 'กำลังนำเนินการ'),
(3, 'กำลังซ่อม'),
(4, 'ซ่อมเสร็จแล้ว');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_case`
--
ALTER TABLE `tbl_case`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_case`
--
ALTER TABLE `tbl_case`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
