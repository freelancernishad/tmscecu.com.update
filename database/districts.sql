-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 01:54 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniontax_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `bn_name`, `lat`, `lon`, `url`, `status`, `division_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', 1, 1, NULL, NULL, NULL),
(2, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', 1, 1, NULL, NULL, NULL),
(3, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', 1, 1, NULL, NULL, NULL),
(4, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd', 1, 1, NULL, NULL, NULL),
(5, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', 1, 1, NULL, NULL, NULL),
(6, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', 1, 1, NULL, NULL, NULL),
(7, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', 1, 1, NULL, NULL, NULL),
(8, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', 1, 1, NULL, NULL, NULL),
(9, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd', 1, 1, NULL, NULL, NULL),
(10, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', 1, 1, NULL, NULL, NULL),
(11, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', 1, 1, NULL, NULL, NULL),
(12, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', 1, 2, NULL, NULL, NULL),
(13, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', 1, 2, NULL, NULL, NULL),
(14, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', 1, 2, NULL, NULL, NULL),
(15, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd', 1, 2, NULL, NULL, NULL),
(16, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', 1, 2, NULL, NULL, NULL),
(17, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd', 1, 2, NULL, NULL, NULL),
(18, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', 1, 2, NULL, NULL, NULL),
(19, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd', 1, 2, NULL, NULL, NULL),
(20, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', 1, 3, NULL, NULL, NULL),
(21, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd', 1, 3, NULL, NULL, NULL),
(22, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', 1, 3, NULL, NULL, NULL),
(23, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', 1, 3, NULL, NULL, NULL),
(24, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', 1, 3, NULL, NULL, NULL),
(25, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', 1, 3, NULL, NULL, NULL),
(26, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', 1, 3, NULL, NULL, NULL),
(27, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', 1, 3, NULL, NULL, NULL),
(28, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', 1, 3, NULL, NULL, NULL),
(29, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', 1, 3, NULL, NULL, NULL),
(30, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd', 1, 4, NULL, NULL, NULL),
(31, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', 1, 4, NULL, NULL, NULL),
(32, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd', 1, 4, NULL, NULL, NULL),
(33, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd', 1, 4, NULL, NULL, NULL),
(34, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', 1, 4, NULL, NULL, NULL),
(35, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd', 1, 4, NULL, NULL, NULL),
(36, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', 1, 5, NULL, NULL, NULL),
(37, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', 1, 5, NULL, NULL, NULL),
(38, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', 1, 5, NULL, NULL, NULL),
(39, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', 1, 5, NULL, NULL, NULL),
(40, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', 1, 6, NULL, NULL, NULL),
(41, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', 1, 6, NULL, NULL, NULL),
(42, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd', 1, 6, NULL, NULL, NULL),
(43, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', 1, 6, NULL, NULL, NULL),
(44, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd', 1, 6, NULL, NULL, NULL),
(45, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', 1, 6, NULL, NULL, NULL),
(46, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd', 1, 6, NULL, NULL, NULL),
(47, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', 1, 6, NULL, NULL, NULL),
(48, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd', 1, 6, NULL, NULL, NULL),
(49, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', 1, 6, NULL, NULL, NULL),
(50, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', 1, 6, NULL, NULL, NULL),
(51, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', 1, 6, NULL, NULL, NULL),
(52, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', 1, 6, NULL, NULL, NULL),
(53, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', 1, 7, NULL, NULL, NULL),
(54, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', 1, 7, NULL, NULL, NULL),
(55, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd', 1, 7, NULL, NULL, NULL),
(56, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', 1, 7, NULL, NULL, NULL),
(57, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', 1, 7, NULL, NULL, NULL),
(58, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', 1, 7, NULL, NULL, NULL),
(59, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', 1, 7, NULL, NULL, NULL),
(60, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', 1, 7, NULL, NULL, NULL),
(61, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', 1, 8, NULL, NULL, NULL),
(62, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL, 'www.mymensingh.gov.bd', 1, 8, NULL, NULL, NULL),
(63, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', 1, 8, NULL, NULL, NULL),
(64, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd', 1, 8, NULL, NULL, NULL),
(65, 'Dhaka Metro', 'ঢাকা মেট্রো', '23.4682747', '91.1788135', 'www.aa.gov.bd', 1, 6, NULL, NULL, NULL),
(66, 'Chittagang Metro', 'চট্রগ্রাম মেট্রো', '23.4682747', '91.1788135', 'www.aa.gov.bd', 1, 1, NULL, NULL, NULL),
(67, 'Rajshahi Metro', 'রাজশাহী মেট্রো', '23.4682747', '91.1788135', 'www.aa.gov.bd', 1, 2, NULL, NULL, NULL),
(68, 'Khulna Metro', 'খুলনা মেট্রো', '23.4682747', '91.1788135', 'www.aa.gov.bd', 1, 3, NULL, NULL, NULL),
(69, 'Barishal Metro', 'বরিশাল মেট্রো', '23.4682747', '91.1788135', 'www.aa.gov.bd', 1, 4, NULL, NULL, NULL),
(70, 'Sylhet Metro', 'সিলেট মেট্রো', '23.4682747', '91.1788135', 'www.aa.gov.bd', 1, 5, NULL, NULL, NULL),
(71, 'Rangpur Metro', 'রংপুর মেট্রো', '23.4682747', '91.1788135', 'www.aa.gov.bd', 1, 7, NULL, NULL, NULL),
(72, 'Gazipur Metro', 'গাজীপুর মেট্রো', '23.4682747', '91.1788135', 'www.aa.gov.bd', 1, 6, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
