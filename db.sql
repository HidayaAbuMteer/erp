-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 مايو 2024 الساعة 13:43
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_erp`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$RlUwBau7clCDHkA6y1/f8ueF7BIJUEE56JghcaBlHkxUfbht42vpG', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `seen` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `alerts`
--

INSERT INTO `alerts` (`id`, `user_id`, `text`, `seen`, `date`) VALUES
(1, 11, 'تم منحك شهادة جديدة :اتقان  لغة php', 0, '2024-03-22'),
(3, 10, ' تم منحك حافز  :مكافئة 100 دينار', 0, '2024-03-22'),
(4, 10, ' تم اعطائك عقوبة  :تأخر', 0, '2024-03-22');

-- --------------------------------------------------------

--
-- بنية الجدول `contact_admin`
--

CREATE TABLE `contact_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `contact_admin`
--

INSERT INTO `contact_admin` (`id`, `user_id`, `subject`, `text`, `priority`, `date`) VALUES
(1, 10, 'شكوى على عميل', 'حدثت اليوم مشكلة بيني وبين عميل يرجى التدخل', 2, '2024-03-22 15:49:32');

-- --------------------------------------------------------

--
-- بنية الجدول `degree`
--

CREATE TABLE `degree` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `degree`
--

INSERT INTO `degree` (`id`, `user_id`, `degree`, `note`, `date`) VALUES
(1, 10, 'البكالورويس', 'تم منح شهادة بكالورويس بسبب النجاح في الجامعة', '2024-03-22'),
(2, 11, 'اتقان  لغة php', 'بسبب اجتيازك دورة php', '2024-03-22');

-- --------------------------------------------------------

--
-- بنية الجدول `emp_logs`
--

CREATE TABLE `emp_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `login_info` text DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `login_info` text DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `logs`
--

INSERT INTO `logs` (`id`, `date`, `admin_id`, `login_info`, `action`) VALUES
(4, '2024-03-20 23:11:26', 1, 'a:3:{s:2:\"ip\";s:3:\"::1\";s:2:\"os\";s:10:\"Windows 10\";s:7:\"browser\";s:6:\"Chrome\";}', 'logout'),
(6, '2024-03-20 23:11:59', 1, 'a:3:{s:2:\"ip\";s:3:\"::1\";s:2:\"os\";s:10:\"Windows 10\";s:7:\"browser\";s:6:\"Chrome\";}', 'logout'),
(7, '2024-03-20 23:12:48', 1, 'a:3:{s:2:\"ip\";s:3:\"::1\";s:2:\"os\";s:10:\"Windows 10\";s:7:\"browser\";s:6:\"Chrome\";}', 'login'),
(8, '2024-03-20 23:12:52', 1, 'a:3:{s:2:\"ip\";s:3:\"::1\";s:2:\"os\";s:10:\"Windows 10\";s:7:\"browser\";s:6:\"Chrome\";}', 'logout'),
(9, '2024-03-20 23:16:23', 1, 'a:3:{s:2:\"ip\";s:3:\"::1\";s:2:\"os\";s:10:\"Windows 10\";s:7:\"browser\";s:6:\"Chrome\";}', 'login'),
(10, '2024-03-20 23:56:49', 1, 'a:3:{s:2:\"ip\";s:3:\"::1\";s:2:\"os\";s:10:\"Windows 10\";s:7:\"browser\";s:6:\"Chrome\";}', 'logout'),
(11, '2024-03-20 23:57:15', 1, 'a:3:{s:2:\"ip\";s:3:\"::1\";s:2:\"os\";s:10:\"Windows 10\";s:7:\"browser\";s:6:\"Chrome\";}', 'login'),
(12, '2024-03-21 00:51:50', 1, 'a:3:{s:2:\"ip\";s:3:\"::1\";s:2:\"os\";s:10:\"Windows 10\";s:7:\"browser\";s:6:\"Chrome\";}', 'logout'),
(13, '2024-03-21 23:15:36', 1, 'a:3:{s:2:\"ip\";s:3:\"::1\";s:2:\"os\";s:10:\"Windows 10\";s:7:\"browser\";s:6:\"Chrome\";}', 'login');

-- --------------------------------------------------------

--
-- بنية الجدول `punish`
--

CREATE TABLE `punish` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `punish` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `punish`
--

INSERT INTO `punish` (`id`, `user_id`, `punish`, `note`, `date`) VALUES
(1, 10, 'تأخر', '', '2024-03-22');

-- --------------------------------------------------------

--
-- بنية الجدول `rewards`
--

CREATE TABLE `rewards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `rewards`
--

INSERT INTO `rewards` (`id`, `user_id`, `title`, `text`, `date`) VALUES
(2, 10, 'مكافئة 100 دينار', 'لوصولك الى الهدف المطلوب', '2024-03-22');

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'sitename', 'ERP'),
(2, 'description', 'نظام الموارد البشرية تمت برمجته باستخدام php'),
(3, 'logo', 'logo.png'),
(4, 'email', 'hidayaabumteer@gmail.com'),
(5, 'metaTags', 'erp'),
(6, 'status', '1');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `employee_id` varchar(25) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `date_join` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `employee_id`, `email`, `password`, `gender`, `age`, `date_join`, `image`, `phone`, `register_date`) VALUES
(10, 'تيسير ابو مطير', '12345', 'tayseer@gmail.com', '$2y$10$vyF0RtcbGEcv8bttuxR.EeijXuqCHl4/dbNX9erMRWA3UEzfbJ4fS', 'male', '2024-02-25', '2024-03-19', '1113e230971bd7ade94ff43ba471f455.jpeg', '0765435647', '2024-03-21 00:45:22'),
(11, 'هداية ابو مطير', '1234567', 'hidayaabumteer@gmail.com', '$2y$10$FNYyfNs3FW6q0YfKTXIiNuzEvrO6qvGY6A2hpSRQEdPmdEjh9d7iG', 'female', '2024-03-19', '2024-03-21', '69e917431d9fc4a21346508e3e40f6e8.png', '075433456', '2024-03-21 00:47:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_admin`
--
ALTER TABLE `contact_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_logs`
--
ALTER TABLE `emp_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `punish`
--
ALTER TABLE `punish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_admin`
--
ALTER TABLE `contact_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_logs`
--
ALTER TABLE `emp_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `punish`
--
ALTER TABLE `punish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
