-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 أبريل 2026 الساعة 18:35
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
-- Database: `discover_saudi`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- بنية الجدول `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `regions`
--

INSERT INTO `regions` (`id`, `name`, `category`, `description`, `details`, `main_image`) VALUES
(1, 'الرياض', 'الوسطى', 'عاصمة المملكة ومركزها الاقتصادي النابض.', 'تعتبر الرياض المركز التجاري النابض للمملكة وتضم معالم تاريخية مثل الدرعية.', 'riyadh.jpg'),
(2, 'مكة المكرمة', 'الغربية', 'أقدس بقاع الأرض ووجهة المسلمين.', 'تضم المسجد الحرام وجبل النور، وهي قلب العالم الإسلامي التاريخي والديني.', 'makkah.jpg'),
(3, 'العلا', 'الشمالية', 'متحف طبيعي مفتوح يضم آثاراً عريقة.', 'تحتوي على مدائن صالح وهي أول موقع سعودي يدرج في اليونسكو.', 'alula.jpg'),
(4, 'أبها', 'الجنوبية', 'عروس الجنوب المتميزة بطبيعتها الخلابة.', 'تمتاز بجبالها الشاهقة مثل السودة وتراثها المعماري الفريد في رجال ألمع.', 'abha.jpg'),
(5, 'الخبر', 'الشرقية', 'مدينة عصرية على ضفاف الخليج العربي.', 'تمتاز بواجهتها البحرية وجسر الملك فهد الذي يربط المملكة بالبحرين.', 'khobar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
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
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
