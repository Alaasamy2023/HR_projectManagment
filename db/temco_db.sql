-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 02:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temco_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `title`) VALUES
(0, 'لم يتم رؤيه الطلب'),
(1, 'موافقه'),
(2, 'غير موافق');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `f_name` varchar(500) NOT NULL,
  `code` int(11) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `vacation_day` double NOT NULL,
  `date_start` date NOT NULL,
  `id_section` int(11) NOT NULL,
  `is_leader` int(11) NOT NULL DEFAULT 0,
  `is_manager` int(11) NOT NULL DEFAULT 0,
  `id_your_boss` int(11) NOT NULL,
  `is_user` int(11) NOT NULL COMMENT 'هل هو موظف عادى  0-1',
  `is_admin` int(11) NOT NULL DEFAULT 0 COMMENT 'هل هو ادمن',
  `state` int(11) NOT NULL DEFAULT 1 COMMENT 'نشاط العنصر ',
  `is_active` int(11) NOT NULL DEFAULT 1,
  `leader_id` int(11) NOT NULL COMMENT 'من رئيس القسم للموظف',
  `manager_id` int(11) NOT NULL COMMENT 'من مديره المباشر',
  `sift_start_time` varchar(100) NOT NULL COMMENT 'وقت بدايه الشيفت',
  `sift_end_time` varchar(100) NOT NULL COMMENT 'وقت نهايه الشيفت',
  `Ordinary_leave` double NOT NULL DEFAULT 15 COMMENT 'إجازة عادية',
  `Casual_vacation` double NOT NULL DEFAULT 6 COMMENT 'اجازه طارئه'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `f_name`, `code`, `pass`, `photo`, `vacation_day`, `date_start`, `id_section`, `is_leader`, `is_manager`, `id_your_boss`, `is_user`, `is_admin`, `state`, `is_active`, `leader_id`, `manager_id`, `sift_start_time`, `sift_end_time`, `Ordinary_leave`, `Casual_vacation`) VALUES
(2, 'هبة عوض شوقى عوض', 81, '82', '', 21, '2023-01-01', 2, 0, 0, 0, 0, 0, 1, 1, 0, 5, '08:30', '16:30', 15, 6),
(3, ' سلامه معوض مرسى شعبان', 4, '5', '', 21, '2023-01-01', 3, 0, 1, 0, 0, 0, 1, 1, 0, 0, '08:30', '16:30', 15, 6),
(5, 'م-تامر', 10, '11', '', 21, '2023-01-01', 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, '08:30', '16:30', 15, 6),
(8, 'اسلام', 29, '30', '', 19.5, '2022-08-02', 1, 1, 0, 0, 0, 0, 1, 1, 0, 5, '08:30', '16:30', 15, 6),
(9, 'ياسمين', 39, '40', '', 18, '2023-02-01', 3, 0, 0, 0, 0, 0, 1, 1, 0, 3, '08:30', '16:30', 9, 3),
(12, 'علاء سامى رمضان', 91, '92', '', 20, '2023-02-01', 1, 0, 0, 0, 0, 0, 1, 1, 8, 5, '', '', 18, 8),
(14, 'هاجر', 99, '10', '', 0, '2023-02-14', 2, 0, 0, 0, 0, 0, 1, 1, 8, 5, '', '', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `errand`
--

CREATE TABLE `errand` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_created` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `all_date_created` date NOT NULL,
  `type` int(11) NOT NULL,
  `from_time` varchar(50) NOT NULL,
  `to_time` varchar(50) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `location` varchar(1000) NOT NULL,
  `stetment` varchar(2000) NOT NULL,
  `return_company` int(11) NOT NULL DEFAULT 0,
  `approval_leader` int(11) NOT NULL DEFAULT 0,
  `approval_manager` int(11) NOT NULL DEFAULT 0,
  `approval_hr` int(11) NOT NULL DEFAULT 0,
  `state` int(11) NOT NULL DEFAULT 0,
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `errand`
--

INSERT INTO `errand` (`id`, `user_id`, `time_created`, `date_created`, `all_date_created`, `type`, `from_time`, `to_time`, `from_date`, `to_date`, `location`, `stetment`, `return_company`, `approval_leader`, `approval_manager`, `approval_hr`, `state`, `manager_id`) VALUES
(173, 12, '14:53:16', '2023-02-09', '0000-00-00', 1, '15:53', '16:53', '2023-02-10', '2023-02-10', 'كان الماموريه', 'بيان الماموريه', 0, 0, 0, 0, 0, 5),
(174, 12, '14:53:42', '2023-02-09', '0000-00-00', 1, '14:53', '15:53', '2023-02-11', '2023-02-11', 'مكان الماموريه11', 'بيان الماموريه11', 1, 0, 1, 0, 0, 5),
(175, 9, '15:17:00', '2023-02-09', '0000-00-00', 2, '15:16', '16:16', '2023-02-02', '2023-02-02', 'مكان الما', 'بيان الماموريه', 0, 0, 0, 0, 0, 3),
(176, 9, '15:17:25', '2023-02-09', '0000-00-00', 1, '15:17', '16:17', '2023-02-08', '2023-02-08', 'مكان الماموريه', 'بيان الماموريه', 1, 0, 0, 0, 0, 3),
(177, 13, '16:44:44', '2023-02-09', '0000-00-00', 1, '17:44', '18:44', '2023-02-09', '2023-02-09', 'مكان المام', 'بيان المامور', 0, 0, 1, 1, 0, 5),
(178, 9, '14:17:26', '2023-02-11', '0000-00-00', 1, '14:19', '14:19', '2023-02-11', '2023-02-15', 'vm', 'vnm', 0, 0, 1, 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `errand_return_company`
--

CREATE TABLE `errand_return_company` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `errand_return_company`
--

INSERT INTO `errand_return_company` (`id`, `title`) VALUES
(0, 'مع العوده لمقر الشركه'),
(1, 'مع عدم العوده لمقر الشركه');

-- --------------------------------------------------------

--
-- Table structure for table `errand_type`
--

CREATE TABLE `errand_type` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `errand_type`
--

INSERT INTO `errand_type` (`id`, `title`) VALUES
(1, 'ماموريه داخليه'),
(2, 'ماموريه خارجيه');

-- --------------------------------------------------------

--
-- Table structure for table `evening`
--

CREATE TABLE `evening` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_created` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `all_date_created` date NOT NULL,
  `from_time` varchar(100) NOT NULL,
  `to_time` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `length` double NOT NULL,
  `reson` varchar(2000) NOT NULL,
  `approval_leader` int(11) NOT NULL DEFAULT 0,
  `approval_manager` int(11) NOT NULL DEFAULT 0,
  `approval_hr` int(11) NOT NULL DEFAULT 0,
  `state` int(11) NOT NULL DEFAULT 0,
  `manager_id` int(11) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evening`
--

INSERT INTO `evening` (`id`, `user_id`, `time_created`, `date_created`, `all_date_created`, `from_time`, `to_time`, `date`, `length`, `reson`, `approval_leader`, `approval_manager`, `approval_hr`, `state`, `manager_id`, `value`) VALUES
(19, 12, '14:54:56', '2023-02-09', '0000-00-00', '16:54', '19:54', '2023-02-07', 0, 'السبب', 0, 1, 0, 0, 5, 0),
(20, 12, '15:12:20', '2023-02-09', '0000-00-00', '16:12', '17:12', '2023-02-14', 0, 'السبب', 0, 2, 0, 0, 5, 0),
(21, 9, '15:18:23', '2023-02-09', '0000-00-00', '17:18', '20:18', '2023-02-02', 0, 'السبب', 0, 0, 0, 0, 3, 0),
(22, 9, '15:18:39', '2023-02-09', '0000-00-00', '17:18', '20:18', '2023-02-04', 0, 'السبب', 0, 1, 0, 0, 3, 0),
(23, 13, '16:45:34', '2023-02-09', '0000-00-00', '18:45', '20:45', '2023-02-10', 0, 'السبب', 0, 1, 1, 0, 5, 200),
(24, 0, '14:08:26', '2023-02-11', '0000-00-00', '', '', '0000-00-00', 0, '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_type` int(11) NOT NULL,
  `notes` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `order_id`, `order_type`, `notes`, `date`, `time`) VALUES
(139, 9, 41, 1, 'بسبب الكشف ', '2023-02-12', '09:06:34'),
(140, 3, 41, 1, 'احتساب الاجازه مرضيه', '2023-02-12', '09:07:17'),
(141, 3, 21, 4, '11', '2023-02-12', '15:06:26'),
(142, 9, 45, 1, 'بسبب كذا', '2023-02-13', '09:31:58'),
(143, 3, 45, 1, 'احتساب عارضه', '2023-02-13', '09:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_type`
--

CREATE TABLE `order_type` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_type`
--

INSERT INTO `order_type` (`id`, `title`) VALUES
(1, 'اجازه'),
(2, 'اذن'),
(3, 'مأموريات'),
(4, 'سهر');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_created` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `all_date_created` date NOT NULL,
  `type` int(11) NOT NULL,
  `from_time` varchar(100) NOT NULL,
  `to_time` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `length` int(11) NOT NULL,
  `approval_leader` int(11) NOT NULL DEFAULT 0,
  `approval_manager` int(11) NOT NULL DEFAULT 0,
  `approval_hr` int(11) NOT NULL DEFAULT 0,
  `state` int(11) NOT NULL DEFAULT 0,
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `user_id`, `time_created`, `date_created`, `all_date_created`, `type`, `from_time`, `to_time`, `date`, `length`, `approval_leader`, `approval_manager`, `approval_hr`, `state`, `manager_id`) VALUES
(47, 12, '14:52:43', '2023-02-09', '0000-00-00', 0, '15:52', '16:52', '2023-02-16', 2, 0, 0, 0, 0, 5),
(48, 12, '14:52:55', '2023-02-09', '0000-00-00', 0, '16:52', '17:52', '2023-02-10', 1, 0, 1, 0, 0, 5),
(49, 9, '15:16:17', '2023-02-09', '0000-00-00', 0, '16:16', '17:16', '2023-02-10', 2, 0, 0, 0, 0, 3),
(50, 9, '15:16:34', '2023-02-09', '0000-00-00', 0, '15:16', '16:16', '2023-02-10', 1, 0, 1, 0, 0, 3),
(51, 13, '16:43:23', '2023-02-09', '0000-00-00', 0, '17:43', '18:43', '2023-02-10', 2, 0, 1, 0, 0, 5),
(52, 13, '16:43:34', '2023-02-09', '0000-00-00', 2, '18:43', '18:43', '2023-02-16', 2, 0, 1, 1, 0, 5),
(53, 9, '14:31:04', '2023-02-12', '0000-00-00', 0, '15:30', '18:31', '2023-02-15', 4, 0, 0, 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_length`
--

CREATE TABLE `permission_length` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_length`
--

INSERT INTO `permission_length` (`id`, `title`, `length`) VALUES
(1, 'نصف ساعه', 30),
(2, 'ساعه واحده', 60),
(3, 'ساعه ونصف', 90),
(4, 'ساعتين', 120),
(5, 'ساعتان ونصف', 150),
(6, 'ثلاثه ساعات', 180);

-- --------------------------------------------------------

--
-- Table structure for table `permission_type`
--

CREATE TABLE `permission_type` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_type`
--

INSERT INTO `permission_type` (`id`, `title`) VALUES
(1, 'اذن بالخصم / تاخير'),
(2, 'اذن بدون خصم');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section`, `manager_id`, `is_active`) VALUES
(1, 'المتابعه', 5, 1),
(2, 'HR', 5, 1),
(3, 'مبيعات', 3, 1),
(4, 'حسابات', 3, 1),
(5, 'مخازن', 3, 1),
(6, 'توريد', 3, 1),
(7, 'شئون قانونيه', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_created` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `all_date_created` date NOT NULL,
  `type` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `rutern_date` date NOT NULL,
  `length` varchar(1000) NOT NULL,
  `length_num_days` double NOT NULL,
  `vacation_employee` double NOT NULL,
  `emp_do_my_job` int(11) NOT NULL,
  `approval_leader` int(11) NOT NULL DEFAULT 0,
  `approval_manager` int(11) NOT NULL DEFAULT 0,
  `approval_hr` int(11) NOT NULL DEFAULT 0,
  `state` int(11) NOT NULL DEFAULT 0,
  `manager_id` int(11) NOT NULL,
  `now_Ordinary_leave` double NOT NULL COMMENT 'رصيد الاجازات الاعتيادى الحالى',
  `now_Casual_vacation` double NOT NULL COMMENT 'رصيد الاجازات العارضه الحالى',
  `descond_Ordinary_leave` double NOT NULL,
  `descond_Casual_vacation` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`id`, `user_id`, `time_created`, `date_created`, `all_date_created`, `type`, `from_date`, `to_date`, `rutern_date`, `length`, `length_num_days`, `vacation_employee`, `emp_do_my_job`, `approval_leader`, `approval_manager`, `approval_hr`, `state`, `manager_id`, `now_Ordinary_leave`, `now_Casual_vacation`, `descond_Ordinary_leave`, `descond_Casual_vacation`) VALUES
(41, 9, '09:06:05', '2023-02-12', '0000-00-00', 2, '2023-02-10', '2023-02-11', '2023-02-12', '1 يوم', 1, 0, 0, 0, 1, 2, 0, 3, 15, 6, 1, 0),
(42, 9, '09:46:08', '2023-02-12', '0000-00-00', 6, '2023-02-14', '2023-02-15', '2023-02-16', '2 يوم', 1, 0, 0, 0, 1, 1, 0, 3, 11, 4, 1, 0),
(43, 9, '09:47:57', '2023-02-12', '0000-00-00', 2, '2023-02-10', '2023-02-10', '2023-02-11', '1 يوم', 2, 0, 0, 0, 1, 1, 0, 3, 12, 4, 1, 0),
(44, 9, '09:26:06', '2023-02-13', '0000-00-00', 2, '2023-02-14', '2023-02-14', '2023-02-15', '1 يوم', 1, 0, 0, 0, 1, 1, 0, 3, 10, 4, 1, 0),
(45, 9, '09:31:41', '2023-02-13', '0000-00-00', 2, '2023-02-14', '2023-02-14', '2023-02-15', '1 يوم', 1, 0, 0, 0, 1, 1, 0, 3, 9, 4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_type`
--

CREATE TABLE `vacation_type` (
  `id` int(11) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `num_days` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacation_type`
--

INSERT INTO `vacation_type` (`id`, `type`, `num_days`) VALUES
(1, 'اجازه سنويه', '0'),
(2, 'اجازه اعتياديه', '0'),
(3, 'اجازه مرضيه', '0'),
(4, 'بدل راحه', '0'),
(5, 'اجازه بدون راتب', '0'),
(6, 'اجازه عارضه', '0'),
(7, 'اخري', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `errand`
--
ALTER TABLE `errand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `errand_ibfk_1` (`return_company`);

--
-- Indexes for table `errand_return_company`
--
ALTER TABLE `errand_return_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `errand_type`
--
ALTER TABLE `errand_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evening`
--
ALTER TABLE `evening`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`from_time`,`to_time`,`date`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_type`
--
ALTER TABLE `order_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_length`
--
ALTER TABLE `permission_length`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_type`
--
ALTER TABLE `permission_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacation_type`
--
ALTER TABLE `vacation_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `errand`
--
ALTER TABLE `errand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `errand_return_company`
--
ALTER TABLE `errand_return_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `errand_type`
--
ALTER TABLE `errand_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evening`
--
ALTER TABLE `evening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `order_type`
--
ALTER TABLE `order_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `permission_length`
--
ALTER TABLE `permission_length`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permission_type`
--
ALTER TABLE `permission_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `vacation_type`
--
ALTER TABLE `vacation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `errand`
--
ALTER TABLE `errand`
  ADD CONSTRAINT `errand_ibfk_1` FOREIGN KEY (`return_company`) REFERENCES `errand_return_company` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
