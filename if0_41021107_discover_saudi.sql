-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 04:01 PM
-- Server version: 10.4.32-MariaDB
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `landmarks` text DEFAULT NULL,
  `activities` text DEFAULT NULL,
  `gallery_img1` varchar(255) DEFAULT NULL,
  `gallery_img2` varchar(255) DEFAULT NULL,
  `gallery_img3` varchar(255) DEFAULT NULL,
  `facts` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `category`, `description`, `details`, `main_image`, `landmarks`, `activities`, `gallery_img1`, `gallery_img2`, `gallery_img3`, `facts`) VALUES
(1, 'الرياض', 'الوسطى', 'عاصمة المملكة ومركزها الاقتصادي النابض.', 'تعتبر الرياض المركز التجاري النابض للمملكة وتضم معالم تاريخية مثل الدرعية.', 'riyadh.jpg', 'قصر المصمك, برج الفيصلية, الدرعية التاريخية, برج المملكة', NULL, 'riyadh1.jpg', 'riyadh2.jpg', 'riyadh3.jpg', 'عاصمة المملكة وأكبر مدنها, تستضيف فعاليات موسم الرياض, تتميز بتطور عمراني واقتصادي متسارع'),
(2, 'مكة المكرمة', 'الغربية', 'أقدس بقاع الأرض ووجهة المسلمين.', 'تضم المسجد الحرام وجبل النور، وهي قلب العالم الإسلامي التاريخي والديني.', 'makkah.jpg', 'المسجد الحرام, الكعبة المشرفة, جبل النور, غار حراء', NULL, 'makkah1.jpg', 'makkah2.jpg', 'makkah3.jpg', 'أقدس مدينة إسلامية في العالم, تستقبل الملايين من الحجاج والمعتمرين سنوياً, هي قبلة المسلمين أينما كانوا'),
(3, 'العلا', 'الشمالية', 'متحف طبيعي مفتوح يضم آثاراً عريقة.', 'تحتوي على مدائن صالح وهي أول موقع سعودي يدرج في اليونسكو.', 'alula.jpg', 'مدائن صالح, صخرة الفيل, قاعة مرايا, بلدة العلا القديمة', NULL, 'alula1.jpg', 'alula2.jpg', 'alula3.jpg', 'أول موقع سعودي يدرج في قائمة اليونسكو للتراث العالمي, تعتبر متحفاً طبيعياً مفتوحاً, مسرح مرايا هو أكبر مبنى مغطى بالمرايا في العالم'),
(4, 'أبها', 'الجنوبية', 'عروس الجنوب المتميزة بطبيعتها الخلابة.', 'تمتاز بجبالها الشاهقة مثل السودة وتراثها المعماري الفريد في رجال ألمع.', 'abha.jpg', 'جبل السودة, قرية رجال ألمع, قرية المفتاحة, تلفريك أبها', NULL, 'abha1.jpg', 'abha2.jpg', 'abha3.jpg', 'تعرف بعروس الجبل لجمال طبيعتها, أعلى مدينة في المملكة العربية السعودية, تتميز بطقس معتدل وممطر حتى في فصل الصيف'),
(5, 'الخبر', 'الشرقية', 'مدينة عصرية على ضفاف الخليج العربي.', 'تمتاز بواجهتها البحرية وجسر الملك فهد الذي يربط المملكة بالبحرين.', 'khobar.jpg', 'جسر الملك فهد, واجهة الخبر البحرية, مركز إثراء, كورنيش الخبر', NULL, 'khobar1.jpg', 'khobar2.jpg', 'khobar3.jpg', 'تربط المملكة بمملكة البحرين عبر جسر الملك فهد, تعتبر من أجمل المدن الساحلية في المنطقة الشرقية, تتميز بتنظيمها العمراني الحديث'),
(6, 'رجال ألمع', ' الجنوبية', 'من أبرز الوجهات التراثية والسياحية، وهي محافظة تقع في منطقة عسير.', '', 'Rijal_Almaa.jpg', 'قرية رجال ألمع التراثية، متحف ألمع للتراث، حصن آل علوان التاريخي', 'جولات ثقافية وتاريخية، التصوير الفوتوغرافي للمباني الحجرية، تجربة المأكولات الشعبية، المشي الجبلي، حضور مهرجانات العسل والزهور.', 'Rijal_Almaa1.jpg', 'Rijal_Almaa2.jpg', 'Rijal_Almaa3.jpg', 'حائزة على لقب أفضل القرى السياحية عالمياً، تشتهر بفن \"القط العسيري\" المسجل لدى اليونسكو'),
(10, 'القدية (سكس فلاقز)', 'الوسطى', 'وجهة ترفيهية عالمية وعاصمة للرياضة والفنون، تقدم تجارب استثنائية لجميع الأعمار.', 'تم بناؤها بمقاييس سعودية، وصممت لتنافس أشهر مدن الملاهي العالمية، لتصبح معيارا جديدا لتجارب الإثارة في الشرق الأوسط. تمثل القدية نقلة نوعية في قطاع الترفيه ضمن رؤية المملكة 2030.', 'sixflags.jpg', 'رحلة الصقر (أسرع أفعوانية), برج سيروكو, مدينة المطاردة, الينابيع الغامضة', 'تجربة الألعاب المكسرة للأرقام القياسية, حضور العروض الترفيهية الحية, الاستمتاع بالمطاعم المتنوعة, التسوق في المتاجر ذات الطابع الخاص', 'sixflags1.jpg', 'sixflags2.jpg', 'sixflags3.jpg', 'تضم \"رحلة الصقر\" أطول وأسرع أفعوانية في العالم, تعد أكبر مدينة ملاهي في المنطقة, تمتد على مساحة شاسعة وتضم ست مناطق ترفيهية بتصاميم فريدة'),
(11, 'جدة التاريخية', 'الغربية', 'بوابة الحرمين الشريفين ومزيج ساحر بين التراث الحجازي الأصيل والتطور العمراني.', 'منطقة \"البلد\" هي قلب جدة النابض بالتاريخ، تتميز بمبانيها الشامخة المزينة بالرواشين الخشبية المعقدة التي تعكس طابع العمارة الحجازية العريقة وتاريخها كأهم ميناء على البحر الأحمر.', 'jeddah.jpg', 'بيت نصيف, باب مكة, كورنيش جدة, نافورة الملك فهد', 'التجول بين الأزقة التاريخية, زيارة المتاحف والمقاهي الحجازية, الاستمتاع بالفعاليات الثقافية, مشاهدة غروب الشمس على الكورنيش', 'jeddah1.jpg', 'jeddah2.jpg', 'jeddah3.jpg', 'مدرجة ضمن قائمة التراث العالمي لليونسكو, نافورتها هي الأعلى في العالم, تعتبر المركز التجاري والسياحي الأول في المملكة');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
