-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2022 at 07:09 AM
-- Server version: 10.3.35-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msroxywz_uniontaxvue`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_logs`
--

CREATE TABLE `action_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sonod_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reson` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unioun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action_logs`
--

INSERT INTO `action_logs` (`id`, `sonod_id`, `user_id`, `names`, `position`, `reson`, `unioun`, `status`, `created_at`, `updated_at`) VALUES
(1, '11', '3', 'super@gmail.com', 'Chairman', 'eyitrgduhtudshrusthdrutuirdsuithydurgetuieryfehtuerhtrgue', 'tungibaria', 'cancel', '2022-08-05 20:59:30', '2022-08-05 20:59:30'),
(2, '78', '3', 'super@gmail.com', 'Chairman', NULL, 'tungibaria', 'cancel', '2022-08-10 13:17:47', '2022-08-10 13:17:47'),
(3, '62', '2', 'super@gmail.com', 'Secretary', NULL, 'tungibaria', 'cancel', '2022-08-10 19:09:21', '2022-08-10 19:09:21'),
(4, '62', '2', 'super@gmail.com', 'Secretary', NULL, 'tungibaria', 'cancel', '2022-08-10 19:09:32', '2022-08-10 19:09:32'),
(5, '5', '2', 'super@gmail.com', 'Secretary', NULL, 'tungibaria', 'cancel', '2022-08-14 17:14:35', '2022-08-14 17:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Images` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tags` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Category` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_id`, `name`, `slug`, `parent_category`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '292429', 'কোর্স সমূহ', 'course', NULL, '2022-08-03 04:40:52', '2022-08-03 04:46:54', NULL),
(6, '788754', 'চাকরির খবর', 'job', NULL, '2022-08-03 04:41:09', '2022-08-03 04:47:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_post_ID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charages`
--

CREATE TABLE `charages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charages`
--

INSERT INTO `charages` (`id`, `district`, `thana`, `vat`, `tax`, `service`, `created_at`, `updated_at`) VALUES
(1, 'বরিশাল', 'বরিশাল সদর', '20', '20', '30', '2022-08-04 06:36:46', '2022-08-04 06:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unioun_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dobno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`id`, `unioun_name`, `name`, `fathername`, `mothername`, `word`, `vill`, `post`, `thana`, `district`, `nidno`, `dobno`, `dob`, `holding`, `created_at`, `updated_at`) VALUES
(1, 'tungibaria', 'নাম23', 'পিতার নাম', 'মাতার নাম', '2', 'টুঙ্গীবাড়িয়া', 'টুঙ্গীবাড়িয়া', 'বরিশাল সদর', 'বরিশাল', '123456789', '123456789', '2001-08-25', '12345', '2022-08-05 17:03:35', '2022-08-05 17:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_07_06_113708_create_roles_table', 1),
(11, '2022_07_09_013746_create_sonods_table', 1),
(12, '2022_07_09_013824_create_uniouninfos_table', 1),
(13, '2022_07_09_013853_create_payments_table', 1),
(14, '2022_07_09_021300_create_sonodnamelists_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('005e4a676f6ecf586b0e6690cd209e22ab28417b58b05fe50b7b68ce42251677e3d76d1fc42b3733', 2, 1, 'accessToken', '[]', 0, '2022-08-02 10:29:21', '2022-08-02 10:29:21', '2023-08-02 10:29:21'),
('0126ee550e29a4d799915054bf075dcc72d22a375ed02d54f200bc9259b3c190c2e098bbff36eb49', 2, 1, 'accessToken', '[]', 0, '2022-07-14 05:36:07', '2022-07-14 05:36:07', '2023-07-14 11:36:07'),
('0191d63fbaa3bf1f65702025ce55c201148c8a4d61fecd5795b5b4465686239d5dc37ff2444468c3', 2, 1, 'accessToken', '[]', 0, '2022-07-31 11:33:14', '2022-07-31 11:33:14', '2023-07-31 11:33:14'),
('034d3d978e1aed398ba6f72f320a840960fa98416918fe56733e411a1359b1ce2a533e2044843464', 3, 1, 'accessToken', '[]', 0, '2022-08-10 12:42:07', '2022-08-10 12:42:07', '2023-08-10 12:42:07'),
('06887c161023dd338ff6ec472312d9fd42a941327321530b7cffa8aad5531215055f602604084c6f', 2, 1, 'accessToken', '[]', 0, '2022-07-25 18:23:06', '2022-07-25 18:23:06', '2023-07-26 00:23:06'),
('0773ffe46692c7d389ebd657c7014fcef796ebf3c88fcf13140479756e536f142661b382ce637c0a', 3, 1, 'accessToken', '[]', 0, '2022-07-27 02:32:05', '2022-07-27 02:32:05', '2023-07-27 02:32:05'),
('07f874e8131a13ff65c0f2934d21d23c0e556245ad894380c46a33135eb15ccea6afb89fb882ffec', 2, 1, 'accessToken', '[]', 0, '2022-08-08 20:16:27', '2022-08-08 20:16:27', '2023-08-08 20:16:27'),
('0a10c72d8c46dc38ef5c23b06d54ae6f4f14d6fa27b79e3a107f142959bf1012eca5bcd9a94ced46', 2, 1, 'accessToken', '[]', 0, '2022-08-27 01:42:35', '2022-08-27 01:42:35', '2023-08-26 21:42:35'),
('0a303f6e2864bdc49d3b6acb770dca809ed7e7ae330ed2bc2f7aaa27f9450edf029e1c1db8bd51e9', 2, 1, 'accessToken', '[]', 0, '2022-08-14 22:45:19', '2022-08-14 22:45:19', '2023-08-14 22:45:19'),
('0adfc9cd87aa81391d92abbd1a776d23d116804517ae48b1c508b37c5f63bb58bdb21044138f7744', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:17:33', '2022-07-12 18:17:33', '2023-07-13 00:17:33'),
('0ae3dfa399898d932a42f2ff857ba6847847a810913d84388e2d6bef0aa994e3cf764838f8cac38c', 2, 1, 'accessToken', '[]', 0, '2022-08-31 15:49:21', '2022-08-31 15:49:21', '2023-08-31 11:49:21'),
('0bbd57fe258200987404f7829e48e9ba10faa176fc51f4205fd12060a8e7e4f4cdde835a8b2c3860', 5, 1, 'accessToken', '[]', 0, '2022-07-31 07:09:26', '2022-07-31 07:09:26', '2023-07-31 07:09:26'),
('0d9d6bea3f56407c70e004c12c6924c86bf4d69ffdddc2ea058bbb62698f3a5caf48345905e78c98', 2, 1, 'accessToken', '[]', 0, '2022-08-05 19:50:17', '2022-08-05 19:50:17', '2023-08-05 19:50:17'),
('0dffd6e9f57351ebe49d96fbd5e16a9bbd7aa78789bfc63eae94bf022982c45bb7005e2c050f5f18', 3, 1, 'accessToken', '[]', 0, '2022-07-27 15:35:32', '2022-07-27 15:35:32', '2023-07-27 15:35:32'),
('0e4d92628711cb83672393db8edfbbab3dbce987e340379d23abecc737b81ac5ad80e40794449858', 2, 1, 'accessToken', '[]', 0, '2022-07-31 12:28:06', '2022-07-31 12:28:06', '2023-07-31 12:28:06'),
('0ea849136aa52c79c08e081faba4afb538f28f3bcdd5a6da30f3f29d461e1f161763cb8ecb269b11', 3, 1, 'accessToken', '[]', 0, '2022-08-27 01:47:26', '2022-08-27 01:47:26', '2023-08-26 21:47:26'),
('10268ea3037381cb1f3e1ce1ba4a9ed73509e4ce06d56799a87868e556522c28b4591170e81b6daf', 2, 1, 'accessToken', '[]', 0, '2022-08-06 23:26:03', '2022-08-06 23:26:03', '2023-08-06 23:26:03'),
('10baeae160707472af0bb6e866eab670924ba3aca4c7d2adc0d70b010ed8df2ae9984a8bdd344f77', 2, 1, 'accessToken', '[]', 0, '2022-07-27 09:56:01', '2022-07-27 09:56:01', '2023-07-27 09:56:01'),
('1106a29dd1cda196537e3be4269b860af3b373159d8070a3704be9807238e55d4d5233b22b8faa0e', 2, 1, 'accessToken', '[]', 0, '2022-07-29 00:08:05', '2022-07-29 00:08:05', '2023-07-29 00:08:05'),
('12c92656ca603897d018369ce19090cf4898b8c250dea3e39ab1a3798a24538d4c8c939e76101d0d', 3, 1, 'accessToken', '[]', 0, '2022-08-15 13:06:34', '2022-08-15 13:06:34', '2023-08-15 13:06:34'),
('134a783f8e38793dccf8734afb1b37f86d943344e09dbc4dbbdc86caa044951830582f2e80b1bea8', 2, 1, 'accessToken', '[]', 0, '2022-08-15 19:42:59', '2022-08-15 19:42:59', '2023-08-15 19:42:59'),
('13846cd0260c61017fab9ce6ddaa48be2cf7851b14619931e9541bdf7df8d2c38e8838360b54d6d8', 2, 1, 'accessToken', '[]', 0, '2022-07-14 06:35:44', '2022-07-14 06:35:44', '2023-07-14 12:35:44'),
('13d9b9030b9dce38c9485e9c036818de1147680a6faa46439e1f7f65ee792a4de7d9d40d43c0ef78', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:04:42', '2022-07-12 18:04:42', '2023-07-13 00:04:42'),
('18e21d9a36aaa77fb24067cafcf82dd4df1387388f3e9b6314bcc6e6809febb45c53a72ee9afe08c', 3, 1, 'accessToken', '[]', 0, '2022-07-22 16:13:01', '2022-07-22 16:13:01', '2023-07-22 22:13:01'),
('19086cc302f2bd5ce3e5fab23e68494e55d627bd4972481b04a15babeaa83bbcddacc34d651ca250', 2, 1, 'accessToken', '[]', 0, '2022-07-31 06:59:46', '2022-07-31 06:59:46', '2023-07-31 06:59:46'),
('19b9a0e5dbd1db2aadc11b6b539a57383fe5dc71c68cb7635c0b753291dc8f4e5617deb390fe54ec', 5, 1, 'accessToken', '[]', 0, '2022-07-30 13:56:32', '2022-07-30 13:56:32', '2023-07-30 13:56:32'),
('19c362a7da7e29fc625058af5745a099b639b3afc4f8a1e87e88fae24994926d83ddcca00636231d', 2, 1, 'accessToken', '[]', 0, '2022-07-22 14:24:03', '2022-07-22 14:24:03', '2023-07-22 20:24:03'),
('1a111967edbe93e027ab6a72b62c6b56105209bc6bfc62900b3ff0697e7c7ef697e3972b1db0495d', 2, 1, 'accessToken', '[]', 0, '2022-08-14 14:42:49', '2022-08-14 14:42:49', '2023-08-14 14:42:49'),
('1b136885c385e1a0e813a6ff267b9b22b18b09315672a75cce197a91f84d228637cc9c7e3d0c5308', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:16:56', '2022-07-12 18:16:56', '2023-07-13 00:16:56'),
('1cd2b9a89de2b34e69e002989b6da1773d27adfef66bcd42817b8318bfc7b95a8ab6f96ee53d6ab0', 3, 1, 'accessToken', '[]', 0, '2022-08-02 21:37:32', '2022-08-02 21:37:32', '2023-08-02 21:37:32'),
('1e4eb0b241170f6cae811ffb0cd08133735724f16cfe095ad7dbf54100c1ecb82287a04708993251', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:14:17', '2022-07-12 18:14:17', '2023-07-13 00:14:17'),
('240a5b5b425a802966725705c398e61bbf43d988ab1f3eb7a423e28cdac393e798c0b49e8ca1d046', 3, 1, 'accessToken', '[]', 0, '2022-08-15 13:49:25', '2022-08-15 13:49:25', '2023-08-15 13:49:25'),
('24bfe0e94add9a022b929ea92a4a87e459d15e26568764326b71cf99bce0cffbb3f21159ebb7ccfa', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:19:47', '2022-07-12 18:19:47', '2023-07-13 00:19:47'),
('2594885e6c0c4ca762e997197d4d44fcd62e60a6814d7a910b31b7341fe09be6b15544287dc4ca94', 3, 1, 'accessToken', '[]', 0, '2022-08-13 12:46:06', '2022-08-13 12:46:06', '2023-08-13 12:46:06'),
('261d3ed8b968c7f395a5047ad7aff9f315755aaaaabad3e46a73552354659e4005888509b3eda240', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:12:06', '2022-07-12 18:12:06', '2023-07-13 00:12:06'),
('267f96f8f9b29c8a2ee5695df79ded08cffa1bc892da70bb4932ef0f8745c7c66a04ad5024f660c9', 3, 1, 'accessToken', '[]', 0, '2022-08-14 14:45:14', '2022-08-14 14:45:14', '2023-08-14 14:45:14'),
('26c85dddd359abcf990cc7270e7e9cb46eb6cdb76836f06dc509550f4ab546a60b3fa65a3b1cc3f1', 1, 1, 'accessToken', '[]', 0, '2022-07-08 19:55:37', '2022-07-08 19:55:37', '2023-07-09 01:55:37'),
('270791ab65de3b8da656f1aafa3faa47c18b7b9b680305088d728a991ccf9c49f737b833a9d0edde', 2, 1, 'accessToken', '[]', 0, '2022-07-31 09:17:23', '2022-07-31 09:17:23', '2023-07-31 09:17:23'),
('2797582154f2b939b9c2cc8bbe1ae4ceb8da769b6abea2917fc2b523ab02133f1ce419038f451c7e', 2, 1, 'accessToken', '[]', 0, '2022-08-06 22:57:56', '2022-08-06 22:57:56', '2023-08-06 22:57:56'),
('2840990f144119f10230645f21dc6438c41dfd7b08eaa5cd3b9af941447eae0c3e35d2a98642df7a', 3, 1, 'accessToken', '[]', 0, '2022-08-06 22:06:04', '2022-08-06 22:06:04', '2023-08-06 22:06:04'),
('28dfaf2b918ee03867a1d2d43de9e19d0a03d2a0067b39a04acef020842e85aa108135ef80d1c2cd', 3, 1, 'accessToken', '[]', 0, '2022-07-16 08:14:18', '2022-07-16 08:14:18', '2023-07-16 14:14:18'),
('28ea192b4ac0ec68ced14c951e5335934da472b03214bfda173c6c2029b9dd3827411d3345098513', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:02:43', '2022-07-12 18:02:43', '2023-07-13 00:02:43'),
('293d57df16a09e9718d2833f703a0074bf2a3cc2998d6eb22f6151141465bdf7152f8472db475125', 2, 1, 'accessToken', '[]', 0, '2022-08-01 14:13:29', '2022-08-01 14:13:29', '2023-08-01 14:13:29'),
('299b595061bbc5c846b8063a9528bae23dac2d66795a58a3223e4f51fe004dce4d81b75e11a7f7cc', 2, 1, 'accessToken', '[]', 0, '2022-07-31 11:53:31', '2022-07-31 11:53:31', '2023-07-31 11:53:31'),
('2bd4136b67e9a12e91626f3c1ea761475c1741f635208e838a9dd4b6373809e473fc36f82cef8b11', 2, 1, 'accessToken', '[]', 0, '2022-07-27 12:15:05', '2022-07-27 12:15:05', '2023-07-27 12:15:05'),
('2c3f470f9f672d0b22bcc74c95f678f01b302705377df243bea5edc86469b5c63d38549cdb52f382', 2, 1, 'accessToken', '[]', 0, '2022-08-10 19:08:37', '2022-08-10 19:08:37', '2023-08-10 19:08:37'),
('2c4fab6d47211df4cd39b240ba9b385fd4652be12369bdd1d75cc2d813f6a85f93c20c517fc872bd', 3, 1, 'accessToken', '[]', 0, '2022-07-30 11:46:33', '2022-07-30 11:46:33', '2023-07-30 11:46:33'),
('2c5e1abf4bf4dedc33e040ae8626330f79c3ea0298a8a004f77b7806fcc5425e5d1bf0890f642c08', 2, 1, 'accessToken', '[]', 0, '2022-08-13 12:48:43', '2022-08-13 12:48:43', '2023-08-13 12:48:43'),
('2cc3d752c3df8e57adef0600a6f83a033b1259265e32dde5c995658e652c5f739e01212773a68557', 2, 1, 'accessToken', '[]', 0, '2022-08-11 12:59:26', '2022-08-11 12:59:26', '2023-08-11 12:59:26'),
('2d0ad0830eb6cd2829bfa3f7adcec6f2703f4bd65baee26cb6b23f824dfcf230c3d17527b934ba98', 2, 1, 'accessToken', '[]', 0, '2022-07-29 22:32:12', '2022-07-29 22:32:12', '2023-07-29 22:32:12'),
('2d24c0eeca9bd6d26bc0135c85eda3d39bcbfab98de20db2c8b7c05d4f9795c7d766612ff8042e5c', 2, 1, 'accessToken', '[]', 0, '2022-07-27 02:29:39', '2022-07-27 02:29:39', '2023-07-27 02:29:39'),
('2dd5050ebd66f5b4a273631becad8018dfa0dd9a15f5e295bafd87d83f4a25f8d0cab1fb071ffb48', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:11:38', '2022-07-12 18:11:38', '2023-07-13 00:11:38'),
('2dfbf2377343f328e41523860e389797deb8b85aeebecce889960adcd9df6b1a02fe9ec6593c257a', 2, 1, 'accessToken', '[]', 0, '2022-08-06 22:10:11', '2022-08-06 22:10:11', '2023-08-06 22:10:11'),
('2e98647f991320a5d41fe82ce77662212052a00c91d3b7aaf820891c90636debe00ac2620f1ddd8e', 2, 1, 'accessToken', '[]', 0, '2022-08-09 19:58:15', '2022-08-09 19:58:15', '2023-08-09 19:58:15'),
('32b6ff52c76beef0b026790284448dc3db875619b346f4f0a6f7110607312b81560644643976c886', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:37:12', '2022-07-12 18:37:12', '2023-07-13 00:37:12'),
('33bde36e9c042eb098e60c8968312434ccc7910a7513642a2d9c0f22afd52a206b7b643e76e7ab55', 3, 1, 'accessToken', '[]', 0, '2022-07-31 11:42:47', '2022-07-31 11:42:47', '2023-07-31 11:42:47'),
('348dfbf710f4df744e6e48851e6cd0637e4aa7856cf4ba71370a34d4d2cc8fb70915a6379e5b9145', 2, 1, 'accessToken', '[]', 0, '2022-07-22 16:14:46', '2022-07-22 16:14:46', '2023-07-22 22:14:46'),
('369e755f2783e8f3aca52501d48fb47582e28157f3e3f70c6fd40124149f3db2b8b12039694bebbe', 3, 1, 'accessToken', '[]', 0, '2022-08-10 19:13:35', '2022-08-10 19:13:35', '2023-08-10 19:13:35'),
('398402a807ec30999905f161081e36104adb0fefb946b2b524e9648edc233dcf0c203b0cbd5b21ea', 5, 1, 'accessToken', '[]', 0, '2022-07-30 12:38:57', '2022-07-30 12:38:57', '2023-07-30 12:38:57'),
('3a00d521edacde6ab66db5b01d7780c9b1bfb28b0088b387d8088f57922239ae4121269ba815537c', 2, 1, 'accessToken', '[]', 0, '2022-07-31 11:38:04', '2022-07-31 11:38:04', '2023-07-31 11:38:04'),
('3bf28d236b06ad3c0014db17d3b35f14a748415590847e98555324c87474b631197a440aa96c5851', 5, 1, 'accessToken', '[]', 0, '2022-07-31 12:00:00', '2022-07-31 12:00:00', '2023-07-31 12:00:00'),
('3c003bd863ced940617fb3f69eae92d2203157b437d3f1a936c1de0b266016f17fa304949f24ae9d', 2, 1, 'accessToken', '[]', 0, '2022-08-11 12:59:26', '2022-08-11 12:59:26', '2023-08-11 12:59:26'),
('3d4a31d28e66b9cbc38db71cd35bba75db27fc81517421b5103bcd1ed48ecfe7b918837e9d20dab7', 3, 1, 'accessToken', '[]', 0, '2022-08-10 12:46:18', '2022-08-10 12:46:18', '2023-08-10 12:46:18'),
('3de56ac31fda65992218ba773e3b11ffd19f5b125df6af6683b795bb536b7bf0a5db1e5e901a35d5', 2, 1, 'accessToken', '[]', 0, '2022-08-17 13:35:30', '2022-08-17 13:35:30', '2023-08-17 09:35:30'),
('3ec5f6b4eecca6413002700d23f3a7cd22e8ce2e3b75250afa67a6bb385ad90a200ee94cf2f2a5e8', 2, 1, 'accessToken', '[]', 0, '2022-08-02 17:48:51', '2022-08-02 17:48:51', '2023-08-02 17:48:51'),
('3f795401adb6aa014c836c6edb5240c72f11ccc7a656ef94b949f443ed4d89ab0eac786794b94200', 3, 1, 'accessToken', '[]', 0, '2022-08-05 20:04:36', '2022-08-05 20:04:36', '2023-08-05 20:04:36'),
('3fbc7b442c26845880d9be6998427f23819e45bb2de6f4ab67ba9a3421ddf99ffe5a32e3882b98d7', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:06:11', '2022-07-12 18:06:11', '2023-07-13 00:06:11'),
('40a0686437150a2835eedfe5ce9d5e72d1cf0fc309445cf1a638171c8265a3f82eec80777e813522', 2, 1, 'accessToken', '[]', 0, '2022-08-03 16:29:29', '2022-08-03 16:29:29', '2023-08-03 16:29:29'),
('43959df396b86d554be865209bc3a9b6e461d05f57b7516669667bbdb1131229deb90400533f9682', 2, 1, 'accessToken', '[]', 0, '2022-07-27 15:57:43', '2022-07-27 15:57:43', '2023-07-27 15:57:43'),
('44d1f420111ff48e199a92577fcdd4b8e4fb439d8d99fde4fec63c35cf43a5cb960983dc88ed7e79', 3, 1, 'accessToken', '[]', 0, '2022-07-31 11:41:08', '2022-07-31 11:41:08', '2023-07-31 11:41:08'),
('46ce53270aeddd0858cb7b9095af27e8f454ea45ad933433f91f26beb8d21b680eedacea641002b0', 3, 1, 'accessToken', '[]', 0, '2022-07-30 21:41:59', '2022-07-30 21:41:59', '2023-07-30 21:41:59'),
('476a467c40bd7b54b1172f81f73d67573198e04a1b125fde19082d8a24b69bcd311a1fd6a9c9b6fd', 3, 1, 'accessToken', '[]', 0, '2022-07-16 08:10:20', '2022-07-16 08:10:20', '2023-07-16 14:10:20'),
('47ab06086c4811b312bcddfffbb98ba27e0b1665f89a7de259dc0fce9b716b02ce3994c798c1cb93', 2, 1, 'accessToken', '[]', 0, '2022-08-01 14:12:15', '2022-08-01 14:12:15', '2023-08-01 14:12:15'),
('4860e44825f42ff223ffe515ffdaa236c8dcd964d9f0c7dbac9fe312105e5aca796441adb01e6b0f', 2, 1, 'accessToken', '[]', 0, '2022-08-01 14:11:24', '2022-08-01 14:11:24', '2023-08-01 14:11:24'),
('4870646ce6ccccec3d2a784c26dfc7cf40427bf2dab12fa5909b3bd4a5d190ec97a33d3e7d40e880', 2, 1, 'accessToken', '[]', 0, '2022-08-02 19:21:37', '2022-08-02 19:21:37', '2023-08-02 19:21:37'),
('487473febc2113df20adf0a7664e84f617b131d46b852211fe119b7c39693ace29133801743c9faa', 2, 1, 'accessToken', '[]', 0, '2022-07-30 10:43:05', '2022-07-30 10:43:05', '2023-07-30 10:43:05'),
('495c46fc7d5263ed9f995a2129f33b508dd1cbe08146094841781e4a1bf57b79defa559306efb6fc', 2, 1, 'accessToken', '[]', 0, '2022-08-06 14:06:28', '2022-08-06 14:06:28', '2023-08-06 14:06:28'),
('49704adf7e8631394bbfc209a1cc52b80b40766a5adb357fcd109d08ad8f1e28a3a5b5ef105b0db2', 2, 1, 'accessToken', '[]', 0, '2022-07-26 16:39:04', '2022-07-26 16:39:04', '2023-07-26 22:39:04'),
('4aa1ec03632071a61e14b710678d0c524e5ccf2573e281abb3a81c349f87b0600a84d86ca64d53b5', 3, 1, 'accessToken', '[]', 0, '2022-08-03 16:30:57', '2022-08-03 16:30:57', '2023-08-03 16:30:57'),
('4bb506d86ce7f9cba5b5f168ea66ae149ec85211d93c49ff7659e3ba8eebd4d848e11e8c7b0a233b', 2, 1, 'accessToken', '[]', 0, '2022-08-16 22:59:02', '2022-08-16 22:59:02', '2023-08-16 22:59:02'),
('4d6892abcac4b9b50b1f1106b397bac92aea6828aef3505dc8942d736e5b9a9a211e3657bf119889', 2, 1, 'accessToken', '[]', 0, '2022-08-14 11:21:16', '2022-08-14 11:21:16', '2023-08-14 11:21:16'),
('4dbc01655efd775856b2aa997fd17ae3bae9a27ccd66c4dacedda7873e43dbfff8a675f9433018b0', 3, 1, 'accessToken', '[]', 0, '2022-07-26 15:56:47', '2022-07-26 15:56:47', '2023-07-26 21:56:47'),
('4eea0d52e30678e3212738e1edffcb7ec04e04cee9305a1e901d2224b3b31e01e5f8339050c55b9d', 2, 1, 'accessToken', '[]', 0, '2022-07-31 11:38:43', '2022-07-31 11:38:43', '2023-07-31 11:38:43'),
('526acd845e4e80cb90d365be3f8129df8be35e3531bb63094d747ea754aae41f60e24e20c525efb4', 2, 1, 'accessToken', '[]', 0, '2022-08-01 14:07:44', '2022-08-01 14:07:44', '2023-08-01 14:07:44'),
('528ee61432685e00bb37812e680569b6e54a6d196347e1642f17d3b8752904a5881931a8f666e875', 2, 1, 'accessToken', '[]', 0, '2022-08-15 14:10:06', '2022-08-15 14:10:06', '2023-08-15 14:10:06'),
('539ccb68f0a3e7cb9a62c70534a52aa413ec60928ea525342fd5cbcf4b2ac0ad8bc1f39d2d4cf442', 3, 1, 'accessToken', '[]', 0, '2022-07-26 11:47:25', '2022-07-26 11:47:25', '2023-07-26 17:47:25'),
('5484240dbf3ab626b9a8c6361a9c6da5a8b0413dd1fe22b5d2f33606865b844603fa158003788f2b', 2, 1, 'accessToken', '[]', 0, '2022-08-17 05:54:28', '2022-08-17 05:54:28', '2023-08-17 01:54:28'),
('554227e02e34d47ba94f8b613f3cf661c3e3de74b2aa61d50db03dedfdabfc006f47e1fa925618ca', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:10:11', '2022-07-12 18:10:11', '2023-07-13 00:10:11'),
('574bfaa0933d5c1a2e39cdd957bbe19e57d9a0e4a1da683da60fde31e7310a45189a6499713ce5ce', 2, 1, 'accessToken', '[]', 0, '2022-08-01 14:00:46', '2022-08-01 14:00:46', '2023-08-01 14:00:46'),
('589d972cf2386fa92e6ce5e0bb4cc2b1aa384439798e701924795b3444d592c7315c798882ee3c7e', 3, 1, 'accessToken', '[]', 0, '2022-07-15 05:39:35', '2022-07-15 05:39:35', '2023-07-15 11:39:35'),
('59a39715b59d08c996ec50241c82a804b9c9d4deb9e0c616513b786af79885f2255751f62f4f130f', 5, 1, 'accessToken', '[]', 0, '2022-07-30 12:42:23', '2022-07-30 12:42:23', '2023-07-30 12:42:23'),
('5acfbc6e14b142ef9bf6f999ffb650b1271c23cc7a971539f9ce3ccf8733d7e9096e786e56891a18', 2, 1, 'accessToken', '[]', 0, '2022-08-16 22:13:39', '2022-08-16 22:13:39', '2023-08-16 22:13:39'),
('5b312550d8147493dad2147ef43e1ca9aed377fc45f6430694efafd4d9a6d9701644ec015dc0a05f', 3, 1, 'accessToken', '[]', 0, '2022-08-08 20:15:27', '2022-08-08 20:15:27', '2023-08-08 20:15:27'),
('5eb864d6e48149f562848a667cffe07ca7c83e418e9c6ce271d9949041852dfb20654101496f3af9', 2, 1, 'accessToken', '[]', 0, '2022-08-08 11:06:32', '2022-08-08 11:06:32', '2023-08-08 11:06:32'),
('5ed3c4a984864f59fa9cd7688aa73701a6966c2eec9f0e746ab9c848c48ff712225a5163ff362285', 2, 1, 'accessToken', '[]', 0, '2022-08-08 11:48:45', '2022-08-08 11:48:45', '2023-08-08 11:48:45'),
('60441682696e1f54cf0efce329146e7fdd39936ade34299392ee02c3182bb0a7ff866785c86bd971', 1, 1, 'accessToken', '[]', 0, '2022-07-10 13:50:03', '2022-07-10 13:50:03', '2023-07-10 19:50:03'),
('605fd68476c314ce4a9db86a2aafeaf7498f82bcc321a37926c15006485e900f59a878be3517533b', 2, 1, 'accessToken', '[]', 0, '2022-07-27 15:54:13', '2022-07-27 15:54:13', '2023-07-27 15:54:13'),
('623c56d96db6de032e93f516671c7ecfb43e888121a458dc61123beec85ffb8a67c2733fa0f3ea2b', 2, 1, 'accessToken', '[]', 0, '2022-07-26 15:56:16', '2022-07-26 15:56:16', '2023-07-26 21:56:16'),
('6305abe76605b48b05f9e778b53baea88e0ae84cbc405aed8cf59e50c365ccaad937e1d5913854ed', 2, 1, 'accessToken', '[]', 0, '2022-07-31 11:37:03', '2022-07-31 11:37:03', '2023-07-31 11:37:03'),
('637158ef2089d26a6567fa72697daaf48dc7685507aa2e6f3a1ed3cdf4514ca18737a42fb02c2669', 2, 1, 'accessToken', '[]', 0, '2022-08-16 11:29:57', '2022-08-16 11:29:57', '2023-08-16 11:29:57'),
('646163796c8ba2ee78523b5750c66a6419c05f562627701746a1b8ce97336b3b80b5439d3a8b8225', 3, 1, 'accessToken', '[]', 0, '2022-07-27 19:48:07', '2022-07-27 19:48:07', '2023-07-27 19:48:07'),
('65191ec5d07709f4b0152c0674a0cdd771c6fe3dceffac86875b18a9a41d0373100d40e13ca0806b', 2, 1, 'accessToken', '[]', 0, '2022-07-27 19:40:21', '2022-07-27 19:40:21', '2023-07-27 19:40:21'),
('659b2cd90e6ac8600579e120c7f7bd1629ca0e57b7bdebfd9dcc5c06ea571b1acecd1fa0ccbbf23d', 2, 1, 'accessToken', '[]', 0, '2022-07-22 16:28:20', '2022-07-22 16:28:20', '2023-07-22 22:28:20'),
('65a05fcc698729d33c4bfb0314e126ce357e78ca0e5b5cd5188e0ffe93a076958c1782df80f5760f', 1, 1, 'accessToken', '[]', 0, '2022-07-12 15:55:17', '2022-07-12 15:55:17', '2023-07-12 21:55:17'),
('6796b521f9e24f4baf1cc045b3aed7ac43dbdb0764ada6fb2f21c627ac2bdcf28da9d5bb7d752ece', 2, 1, 'accessToken', '[]', 0, '2022-07-29 22:12:16', '2022-07-29 22:12:16', '2023-07-29 22:12:16'),
('67c87d26a0085f3bd8d44db68ef9d470a9363ebde8946ec5e51f3a940489f936dec41baf4a46546d', 3, 1, 'accessToken', '[]', 0, '2022-08-28 04:16:01', '2022-08-28 04:16:01', '2023-08-28 00:16:01'),
('69ca25f928c5a39ece13f544eab1bd87564175976582654974463a3f744cc36bc090df2ae2178da4', 5, 1, 'accessToken', '[]', 0, '2022-08-02 22:37:17', '2022-08-02 22:37:17', '2023-08-02 22:37:17'),
('6a2209ff338f9eb23d8abb5c60fad28221c4113f9c071ff14702b65df7437ccfb183134c1836f304', 5, 1, 'accessToken', '[]', 0, '2022-07-31 12:08:56', '2022-07-31 12:08:56', '2023-07-31 12:08:56'),
('6b89ea3809acfd6ef1590f8ee2040af6fd588c72430cefac934840a9777256706abf16b498911106', 3, 1, 'accessToken', '[]', 0, '2022-07-30 22:19:39', '2022-07-30 22:19:39', '2023-07-30 22:19:39'),
('6f77b09d71975afcd4a307d65e5dbe9df17e565f498f4056e02b3f7835e6cda4ac5a2e4ec17e0d7f', 3, 1, 'accessToken', '[]', 0, '2022-07-27 10:02:45', '2022-07-27 10:02:45', '2023-07-27 10:02:45'),
('715c2e2c28da5bcc12fe0f921c2bf44afda52b642ab3aa2c1a251bbf061c212dc9f75bf341db2248', 3, 1, 'accessToken', '[]', 0, '2022-07-30 10:39:59', '2022-07-30 10:39:59', '2023-07-30 10:39:59'),
('71e7625fd45ae0160b9cbeb443ccd5029514d8e29323dd7fbbab61aa4fddd2cf3e2a543d6dfe4182', 2, 1, 'accessToken', '[]', 0, '2022-08-28 03:46:25', '2022-08-28 03:46:25', '2023-08-27 23:46:25'),
('71f4b8276d6e6ca5b266802a132a16a80546d354a8edc5294e05072d89081fa30db4fdbf7d7d17fd', 1, 1, 'accessToken', '[]', 0, '2022-07-09 02:39:19', '2022-07-09 02:39:19', '2023-07-09 08:39:19'),
('78364d239ceed4c2bb58388372cb64138fdc138c94e9a748965baf8f7021a0a986c1a418c3e292b8', 2, 1, 'accessToken', '[]', 0, '2022-07-30 01:34:07', '2022-07-30 01:34:07', '2023-07-30 01:34:07'),
('786de468e5e3bf8d5bd6d99b4735b4c8d6362d081397eed0a38b25fd4aa7848b3c73e52a821fded6', 2, 1, 'accessToken', '[]', 0, '2022-08-15 13:08:07', '2022-08-15 13:08:07', '2023-08-15 13:08:07'),
('789a3419a30434d5c2281e74fc3fc4015c4bd4273fd4c0b6a305d6e0e80c7edde3b016aa2f240895', 2, 1, 'accessToken', '[]', 0, '2022-08-28 03:42:41', '2022-08-28 03:42:41', '2023-08-27 23:42:41'),
('79b3572537e44d6b656d18ea9f3e85bfc2e0909cce75b6668c8e59fd898da2107a905707fcd1508d', 3, 1, 'accessToken', '[]', 0, '2022-07-12 18:22:40', '2022-07-12 18:22:40', '2023-07-13 00:22:40'),
('7b81b3270e39877698e298008c4f52653c0cf26f7c5b5e550f331e1789e188a1bad7c266716a78c6', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:13:16', '2022-07-12 18:13:16', '2023-07-13 00:13:16'),
('7b98a1dc977a10c45426d11c82664da513cf7c13c4e1cab239255d6a01b9fb285dc2eb1b40a32592', 3, 1, 'accessToken', '[]', 0, '2022-07-30 23:22:52', '2022-07-30 23:22:52', '2023-07-30 23:22:52'),
('7d17bb5357a61306e341a6a1723979ed404b2d234cec89322cfc71c7e0c2e95bbbb731f2f22e5cf3', 2, 1, 'accessToken', '[]', 0, '2022-08-07 22:25:16', '2022-08-07 22:25:16', '2023-08-07 22:25:16'),
('7f8970fb2daa90e6f0b754b80692aaf0aec398c67ca5465811068e8b673dbb39faabe725206ac1e7', 2, 1, 'accessToken', '[]', 0, '2022-07-24 17:07:44', '2022-07-24 17:07:44', '2023-07-24 23:07:44'),
('7f94da3147982e1e9fbf5b79761e5c16fe0c42c677979d2d2ad5108f5064e60d6c39a7d24d9c29dc', 2, 1, 'accessToken', '[]', 0, '2022-07-24 17:14:31', '2022-07-24 17:14:31', '2023-07-24 23:14:31'),
('807ea28c2a226095e8586fcf6eea147264425b73797e6076578dbd74316a9d6afe27863b68f08298', 2, 1, 'accessToken', '[]', 0, '2022-07-15 05:34:35', '2022-07-15 05:34:35', '2023-07-15 11:34:35'),
('80bdc914b75d9b6a4c324057d7304a6de9885b2e9643a9e61edcad4bf3d6e4162e4c63058c30d788', 3, 1, 'accessToken', '[]', 0, '2022-07-26 08:02:15', '2022-07-26 08:02:15', '2023-07-26 14:02:15'),
('8102ad8028cf235d2a283c664f64400b7125c22926e12a39c2403d2079223ccc660b2a6c0368f849', 3, 1, 'accessToken', '[]', 0, '2022-07-16 08:17:32', '2022-07-16 08:17:32', '2023-07-16 14:17:32'),
('81f427134bc499b0073f03101ba22fe169156f79ae56a4029abf54321dc4248671d0c2532656bcf7', 3, 1, 'accessToken', '[]', 0, '2022-07-30 23:34:07', '2022-07-30 23:34:07', '2023-07-30 23:34:07'),
('821131f345db1c93386a3237a907f7cae17a8517a40212160ab0f8f0ef9665652f8371c02080c20d', 3, 1, 'accessToken', '[]', 0, '2022-07-24 17:13:13', '2022-07-24 17:13:13', '2023-07-24 23:13:13'),
('8704d54598bfc239b766137f7eda23142f7fdbded79d39c7917b3f6bd0a1940ba4d83be38b034722', 2, 1, 'accessToken', '[]', 0, '2022-08-01 14:06:16', '2022-08-01 14:06:16', '2023-08-01 14:06:16'),
('89d79a7da3418a7f724cac397b79f6e0c762262bd81bd8e5df51c797f656c9dce5852e24760b1daf', 3, 1, 'accessToken', '[]', 0, '2022-08-08 15:25:46', '2022-08-08 15:25:46', '2023-08-08 15:25:46'),
('8a91bc5ce95acd9cdececc5d0e89d7dbb2ce916525fe1ecc3936db0e414e90bd945773e7a2890c9b', 3, 1, 'accessToken', '[]', 0, '2022-08-09 11:45:08', '2022-08-09 11:45:08', '2023-08-09 11:45:08'),
('8c14c55b239a9b020ff061d5119729cdbf63f4c255d69df4988a904ebb0b270f12aa49bdad49bae0', 2, 1, 'accessToken', '[]', 0, '2022-07-15 05:47:51', '2022-07-15 05:47:51', '2023-07-15 11:47:51'),
('8e35e8bb3f2923a063c12422b279ee0e043b6610e7128052cbb8b7d87b8f55103562f9408012bcd4', 2, 1, 'accessToken', '[]', 0, '2022-07-30 23:45:04', '2022-07-30 23:45:04', '2023-07-30 23:45:04'),
('8ff18b9530e6bacc62a9c3f5780ccda2b5bf8444c36b239a47f6f0da61c0a8723fdf0be08ac5e46d', 3, 1, 'accessToken', '[]', 0, '2022-07-26 19:08:44', '2022-07-26 19:08:44', '2023-07-27 01:08:44'),
('90273a8cae5f2f2dadec2660b5eb0437afd45867117edb068f1992ae7755d219d7dbb1e72907e44d', 2, 1, 'accessToken', '[]', 0, '2022-08-24 01:03:19', '2022-08-24 01:03:19', '2023-08-23 21:03:19'),
('9065eb08da82cf2ee553d07114786cc97fa98e61af0158ea0ab273aff1064993556704185210dfbe', 3, 1, 'accessToken', '[]', 0, '2022-07-12 18:38:34', '2022-07-12 18:38:34', '2023-07-13 00:38:34'),
('90700a3583fd43d5b194f66f716c0bdc4c5e41023b4a3f4472520f44f467afdfa871eaa73c92f4d9', 2, 1, 'accessToken', '[]', 0, '2022-07-30 01:30:09', '2022-07-30 01:30:09', '2023-07-30 01:30:09'),
('90d8e9c029117ac2aa9e85dee0404a977ef0e6856b0261081c5575e097294c0f2c36d0afc181cbd5', 3, 1, 'accessToken', '[]', 0, '2022-07-31 12:33:34', '2022-07-31 12:33:34', '2023-07-31 12:33:34'),
('914df6a28af3e18626c5c83c762a037f9a6c19c39019c575f588be78fe8fdb75f17f8b5b53796bea', 3, 1, 'accessToken', '[]', 0, '2022-07-30 21:56:07', '2022-07-30 21:56:07', '2023-07-30 21:56:07'),
('91b9a7c37f4c3950bee184cfb21995a9a487853a150ebd05fac3408c8a03bcce2954be9a1afdbc19', 3, 1, 'accessToken', '[]', 0, '2022-08-14 13:09:17', '2022-08-14 13:09:17', '2023-08-14 13:09:17'),
('91fb4aab4720f94236d5101dedaa8076fc4808a34caffefd479f9d8217813a034c5f8fa986ef24ce', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:14:27', '2022-07-12 18:14:27', '2023-07-13 00:14:27'),
('9210250beff3e49937d10e403958fa86d5d82f42d07b348ac40cb77745c80b59bc309b58027d3fc3', 2, 1, 'accessToken', '[]', 0, '2022-07-16 08:14:35', '2022-07-16 08:14:35', '2023-07-16 14:14:35'),
('934e1c245179a36f89102170afbe0f4deaf7c76fd5e094b13c4b796f278c7ed389327bbbc9848658', 3, 1, 'accessToken', '[]', 0, '2022-08-14 14:59:42', '2022-08-14 14:59:42', '2023-08-14 14:59:42'),
('95c3c6e63265f6d8d99219448507aba586233c3b9275cdd38ffd44df79c25a7df11614c496b7c434', 2, 1, 'accessToken', '[]', 0, '2022-07-27 15:36:47', '2022-07-27 15:36:47', '2023-07-27 15:36:47'),
('97d4bde14045b0cf382a26e9164e75b55bbd1707b3eb60e8dcb1e95b4faf78bab65b7826827136ba', 2, 1, 'accessToken', '[]', 0, '2022-08-14 13:05:10', '2022-08-14 13:05:10', '2023-08-14 13:05:10'),
('995e8ec83069161c75f80af5a433f21a957feffe945a0cdee838b53e328c88b143458b5f389c3ef8', 2, 1, 'accessToken', '[]', 0, '2022-07-30 22:12:21', '2022-07-30 22:12:21', '2023-07-30 22:12:21'),
('9a28e0dddee49a356644bfa8b0b5f3bf96a6c587443e54a8335dfc953c29522858268a124e7b695f', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:14:06', '2022-07-12 18:14:06', '2023-07-13 00:14:06'),
('9d09396680f36b5cfd74213924f2786a2cabcb87f7a2500b85d6ae1bc8e24f7dd323c56115c6c409', 2, 1, 'accessToken', '[]', 0, '2022-08-26 03:16:30', '2022-08-26 03:16:30', '2023-08-25 23:16:30'),
('9de7f3b0ed32251c371faeb4438ac92a95d3c49eb31bff2397862f15bd2c224da828c96b1f121d40', 5, 1, 'accessToken', '[]', 0, '2022-07-30 23:39:05', '2022-07-30 23:39:05', '2023-07-30 23:39:05'),
('a028f7f7231c211793477ea0e2d0498bb92fd9adab901e5580c06cb0396d04bb3c88a7d9de04bb1b', 3, 1, 'accessToken', '[]', 0, '2022-08-16 23:58:52', '2022-08-16 23:58:52', '2023-08-16 23:58:52'),
('a06c70861c1a56599460abbca6e1207ec40b3896d772928986f5f2b08753d905e6225e8c2aa92cd4', 2, 1, 'accessToken', '[]', 0, '2022-07-16 08:10:40', '2022-07-16 08:10:40', '2023-07-16 14:10:40'),
('a0cebf3e705e515c950f27379df7e30a0781b8427148bb72b1031fdb705b341a0c89e64e8e989b69', 2, 1, 'accessToken', '[]', 0, '2022-07-27 19:49:13', '2022-07-27 19:49:13', '2023-07-27 19:49:13'),
('a2dbaadd43bdde2537f9a49ac8de1a2eb0acba61f043eae1bbdc43b9d6acac41e72856d75f589285', 3, 1, 'accessToken', '[]', 0, '2022-07-30 22:07:05', '2022-07-30 22:07:05', '2023-07-30 22:07:05'),
('a45d4a77cbf694c9c5f78348fb99805f51116665e6a9aad310113b04495e5994f5eb422f0861454b', 2, 1, 'accessToken', '[]', 0, '2022-07-27 10:42:27', '2022-07-27 10:42:27', '2023-07-27 10:42:27'),
('a5bf8dceef47851dc4eb9fb7dae44ddf9f3e2af5232dd0493339d9d26d49c9ef1f05d00d586cf8ff', 3, 1, 'accessToken', '[]', 0, '2022-08-16 23:42:44', '2022-08-16 23:42:44', '2023-08-16 23:42:44'),
('a60ef3eb2ce336820b76ca7c6f6434ad96348b8747ce04bdab7f0e3e2e9d2fc3222446b884046b63', 3, 1, 'accessToken', '[]', 0, '2022-08-14 13:28:13', '2022-08-14 13:28:13', '2023-08-14 13:28:13'),
('a619a0e4869c2ce4a86d2bf525d9ce8b951a55384c9a9ba2bc6a174063f3ddfcc5cd535e0ec938fc', 2, 1, 'accessToken', '[]', 0, '2022-07-30 23:28:27', '2022-07-30 23:28:27', '2023-07-30 23:28:27'),
('a66a93b610c8c2a31d6ab5f4154c5b132ba102723e2ea5afb8e8aa405f1e2a05e69247d57b65f7b8', 2, 1, 'accessToken', '[]', 0, '2022-08-16 11:55:37', '2022-08-16 11:55:37', '2023-08-16 11:55:37'),
('a67574e3ec2221d92f71b301ccad9c469a5dccb3877ed3a34556dbee580f73ce8bf0fe1d52e087aa', 2, 1, 'accessToken', '[]', 0, '2022-08-17 01:05:59', '2022-08-17 01:05:59', '2023-08-17 01:05:59'),
('a738e146a7a9708275d3cd280253f4ba5ec22a9620518348a8744feb0a1b9d7a5654df0e669b2d4a', 3, 1, 'accessToken', '[]', 0, '2022-08-06 14:08:43', '2022-08-06 14:08:43', '2023-08-06 14:08:43'),
('a7b00422c6e9b83c7af4b71e8fd31fd3fd5a2fd3992b8967a620d4ec5951e5413f83daacca5e64d1', 3, 1, 'accessToken', '[]', 0, '2022-08-02 19:26:20', '2022-08-02 19:26:20', '2023-08-02 19:26:20'),
('aa84961c1feed5b9b11b39f7a61c25aac288161750d2273f3e9efe52a3858a381122f3ec2362fd5a', 2, 1, 'accessToken', '[]', 0, '2022-08-01 14:06:58', '2022-08-01 14:06:58', '2023-08-01 14:06:58'),
('ab1b6f702cdfd1cb458ea1dbeeb9ecc729dae65bf426e2ef87fff3096b0ea6a8dac44bfacdcf815b', 2, 1, 'accessToken', '[]', 0, '2022-08-04 11:31:05', '2022-08-04 11:31:05', '2023-08-04 11:31:05'),
('ab3623ee4bbbba1e280ff21f2579e905c8a80f6a4ea89db6643fe448f3cfbd74075b599c985d182f', 2, 1, 'accessToken', '[]', 0, '2022-08-14 15:01:35', '2022-08-14 15:01:35', '2023-08-14 15:01:35'),
('abd058840c797606fae09db61d9f690f9e03b82e7fe1fd4a254a0be6623f788dbff2cd00b766ee25', 3, 1, 'accessToken', '[]', 0, '2022-08-11 12:29:46', '2022-08-11 12:29:46', '2023-08-11 12:29:46'),
('ae8ac3d97c203fa8e2b3ad5a705ff064e338aa8951a35f90850d63c9cfa6e7def6eb04bb0276a0bf', 2, 1, 'accessToken', '[]', 0, '2022-08-01 12:03:38', '2022-08-01 12:03:38', '2023-08-01 12:03:38'),
('b2327bd8df801955be62a444e9a1fce6eabba26bd687286ae6983b9ae621d5adef99741e8492ecef', 2, 1, 'accessToken', '[]', 0, '2022-08-10 12:33:58', '2022-08-10 12:33:58', '2023-08-10 12:33:58'),
('b645a076a08a97e88ebfee80a5157613400d715e594661178270ec2121c26e790bfdb0230b863ca9', 2, 1, 'accessToken', '[]', 0, '2022-08-03 15:39:33', '2022-08-03 15:39:33', '2023-08-03 15:39:33'),
('b66f5d5a65b16438224bff0352f08804bb27808553ffb77c643f4ef5d1276d7bc851ecc1afddcbe8', 2, 1, 'accessToken', '[]', 0, '2022-08-15 13:51:15', '2022-08-15 13:51:15', '2023-08-15 13:51:15'),
('b8bd19bc1c1c4a0d822fdababb14468a248c55075329a5c58fc410ea82cc4e804c7fd6276e3c942e', 2, 1, 'accessToken', '[]', 0, '2022-08-11 12:26:50', '2022-08-11 12:26:50', '2023-08-11 12:26:50'),
('b8bd706ab6c5eefcbcd5f19b036a22be4e1fdfe291445a10099d2304f10c0ad07336d3d625dde7dd', 3, 1, 'accessToken', '[]', 0, '2022-08-05 19:53:11', '2022-08-05 19:53:11', '2023-08-05 19:53:11'),
('b8c77ff3cc963166d3e412a40c3ae73ead6f3c6249e0bfcf6705a64a06a999068c8dcf592fd3a3a9', 3, 1, 'accessToken', '[]', 0, '2022-08-14 14:54:44', '2022-08-14 14:54:44', '2023-08-14 14:54:44'),
('b9b6650385bf41b847ccf9ac047fab26989066b5e9c284b66e5fc7010fd223d0431bc47824d2bd52', 2, 1, 'accessToken', '[]', 0, '2022-08-14 17:14:10', '2022-08-14 17:14:10', '2023-08-14 17:14:10'),
('bb9df754514dfe12660281e5f6f39ac1bf1b254463ab4b565aedd6b733c6c621e480376ac355b0cb', 2, 1, 'accessToken', '[]', 0, '2022-08-14 13:45:43', '2022-08-14 13:45:43', '2023-08-14 13:45:43'),
('bc09f907f789179829bb6a977fd317f8fedefa6ba12a18687a9ccdc8cf82dd23135d4ed9d18c5f8f', 3, 1, 'accessToken', '[]', 0, '2022-08-06 11:13:13', '2022-08-06 11:13:13', '2023-08-06 11:13:13'),
('bc85b262a2f206e50cdbb47d259f116cfcc51039955a6ab86754d1966ad99ca24e361f05822b367a', 3, 1, 'accessToken', '[]', 0, '2022-07-26 16:39:32', '2022-07-26 16:39:32', '2023-07-26 22:39:32'),
('c307376fbdb7baeceb500c7c7d4d6ba255c03e0188c33e4bf24ac8b02c95a3e5a7531e5fe8b824d2', 2, 1, 'accessToken', '[]', 0, '2022-07-26 08:01:32', '2022-07-26 08:01:32', '2023-07-26 14:01:32'),
('c35619d0580eb0efeace87400ef1327aba3136facfa2d50ef3dba0e685629ff94a63f312b099b9a6', 3, 1, 'accessToken', '[]', 0, '2022-08-15 20:01:12', '2022-08-15 20:01:12', '2023-08-15 20:01:12'),
('c361eb240782479c97d1b618f1f16aff3e202851ba92a8f2e5087276bacf0ccfb49b06dd07aa8e83', 3, 1, 'accessToken', '[]', 0, '2022-08-16 23:15:47', '2022-08-16 23:15:47', '2023-08-16 23:15:47'),
('c4271b4c3592f74cbd9d3887314abc90f4518a0bb05e6ea35cc7c99ec2ce6854558f54bac720a376', 2, 1, 'accessToken', '[]', 0, '2022-07-30 22:23:50', '2022-07-30 22:23:50', '2023-07-30 22:23:50'),
('c4e8f01592a7168ae3a77b265c532dc553b847356549e7e89289cb78bd209f540f9a2864e463173a', 2, 1, 'accessToken', '[]', 0, '2022-07-28 23:02:47', '2022-07-28 23:02:47', '2023-07-28 23:02:47'),
('c516367b7d56011867f5422c945c078c1dd3b8c311a7589bbcff2c685c5a39de2926973b9e8f6f4a', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:19:14', '2022-07-12 18:19:14', '2023-07-13 00:19:14'),
('c560313c7f0c5f98d3babe0704ca2469feffd03530f602fe503f0ab7c407db64041fcc566833fe22', 3, 1, 'accessToken', '[]', 0, '2022-08-17 05:53:35', '2022-08-17 05:53:35', '2023-08-17 01:53:35'),
('c658cd529962c561e79a57f375e13b70a4bfd1e37d2cde134f19555f4a49779cf801f60542381ff5', 2, 1, 'accessToken', '[]', 0, '2022-08-11 12:59:45', '2022-08-11 12:59:45', '2023-08-11 12:59:45'),
('c6a663585ad2c98eb87213d2195f248fb5d38d80949dff7789befd82cf8ab67ea5b35be9d003c718', 2, 1, 'accessToken', '[]', 0, '2022-07-15 06:07:47', '2022-07-15 06:07:47', '2023-07-15 12:07:47'),
('c839fea69c36466673b30949694386471be5cd95bce90672c18289752634dfe69538386168c9aeae', 1, 1, 'accessToken', '[]', 0, '2022-07-11 16:30:47', '2022-07-11 16:30:47', '2023-07-11 22:30:47'),
('c83e9b83a21e9e9eb3bd0d49a025d33e526d9d2d5336668cbf890a5dc0c8cf669ab95e302847e360', 2, 1, 'accessToken', '[]', 0, '2022-08-11 12:59:26', '2022-08-11 12:59:26', '2023-08-11 12:59:26'),
('c8e19b545ffce7ca7f2b28df63daec6f5e33895d05b67020c1a7ada43b008b8a6f094078dd62540e', 2, 1, 'accessToken', '[]', 0, '2022-07-30 22:22:53', '2022-07-30 22:22:53', '2023-07-30 22:22:53'),
('ca63293950594f4fc872ef14119e1ac7d9a7f4d0b7b588697cf73f1e678e965ebe0c40de2f11f6cd', 3, 1, 'accessToken', '[]', 0, '2022-07-29 23:56:04', '2022-07-29 23:56:04', '2023-07-29 23:56:04'),
('cb1907141edabad62047fc66242e2aa00fd0b0e90974543878ca36a0d59dcca7297b51117c2cb809', 2, 1, 'accessToken', '[]', 0, '2022-07-16 08:17:48', '2022-07-16 08:17:48', '2023-07-16 14:17:48'),
('cc2328fb83ff32eb4dc9c63064e2d51c507a5f4f209c1e34df77d3434cf4aafcde4b4e3560ffe090', 2, 1, 'accessToken', '[]', 0, '2022-07-16 07:39:31', '2022-07-16 07:39:31', '2023-07-16 13:39:31'),
('ccdf0ffbc3971af991a568daf5d7b3cc48b026e8361c5d194eaee3bf21d65ad4a874dff4a1de3896', 2, 1, 'accessToken', '[]', 0, '2022-07-29 21:40:15', '2022-07-29 21:40:15', '2023-07-29 21:40:15'),
('cd828054df8339a5998c13272b31ced4ce0f8de6716cf93d6a4bda3fa9989d9cf91a22a55f8e618d', 3, 1, 'accessToken', '[]', 0, '2022-08-08 11:08:21', '2022-08-08 11:08:21', '2023-08-08 11:08:21'),
('cde7cecce913774a0e6786311c865704cefd45d9b2a87b66d71f23ad60e978dc03b9f42a577f7303', 2, 1, 'accessToken', '[]', 0, '2022-07-24 08:41:13', '2022-07-24 08:41:13', '2023-07-24 14:41:13'),
('cf7f5371d8a8e71333d0a7a9ac02a6571fd0b4646cbbd1d4b043bb5f48c380670d2a48a170256a73', 2, 1, 'accessToken', '[]', 0, '2022-08-06 16:36:02', '2022-08-06 16:36:02', '2023-08-06 16:36:02'),
('d0f1355c6b594350405ecfdfdc9c40ff1ee064fbda88e132d1adcb44cefef745123b251da842f09f', 2, 1, 'accessToken', '[]', 0, '2022-07-30 21:45:18', '2022-07-30 21:45:18', '2023-07-30 21:45:18'),
('d167ebffea3befe3930bdd83b3a3dc06142fbd2f139c242260a23dc671baa59b505ea10862700c3f', 3, 1, 'accessToken', '[]', 0, '2022-08-02 10:32:00', '2022-08-02 10:32:00', '2023-08-02 10:32:00'),
('d1e4cc88d4fe2e39db22c8a4a19cf9f714f6c5ba133462794b959d60be871c6bdfc8562ce3eae62d', 2, 1, 'accessToken', '[]', 0, '2022-08-09 11:46:26', '2022-08-09 11:46:26', '2023-08-09 11:46:26'),
('d3262646f752721f84df066be1f8ca32f14136a6b24d48071b74e3f9332ae4e6c0bc45a2a84ce7db', 2, 1, 'accessToken', '[]', 0, '2022-08-07 12:55:15', '2022-08-07 12:55:15', '2023-08-07 12:55:15'),
('d41df7036e055e38b45480e0e352fa340758e9190e0de2a8b3bb569b93a32c1220c6959c021b40f6', 1, 1, 'accessToken', '[]', 0, '2022-07-11 05:52:34', '2022-07-11 05:52:34', '2023-07-11 11:52:34'),
('d57a926e34e3204f34d1830ec8f9bd15eb97f8aadc0641e5ed9ac68272ea28d9795c1472372289a3', 2, 1, 'accessToken', '[]', 0, '2022-08-01 12:33:56', '2022-08-01 12:33:56', '2023-08-01 12:33:56'),
('d94104d3c0a5ba12fb0913c5925466499dfc4c36813e0a7acf27c532b7ddffb41da9c0373886920b', 3, 1, 'accessToken', '[]', 0, '2022-07-15 06:07:26', '2022-07-15 06:07:26', '2023-07-15 12:07:26'),
('dc498650d31b5742bfe7a9bd8fd382f0d4f0bc3351f4671c88602d6616e2d563ef02a57927b7cc6c', 2, 1, 'accessToken', '[]', 0, '2022-07-27 02:32:27', '2022-07-27 02:32:27', '2023-07-27 02:32:27'),
('dc5edb2b19c337a68a87b1276f64309eac08aa11c1a00020e251ed6f4768c600f3d5c681696cd765', 3, 1, 'accessToken', '[]', 0, '2022-08-14 17:03:56', '2022-08-14 17:03:56', '2023-08-14 17:03:56'),
('dd89e5e4a024a22dd8fb4957290d1b878af724a074f2c2e90bfab63c09e042772c5ebaad1c36ed6f', 2, 1, 'accessToken', '[]', 0, '2022-08-24 00:49:53', '2022-08-24 00:49:53', '2023-08-23 20:49:53'),
('e06e20e3214edd731ff29b332a0a1284854d2c616161bce7180bd1df7de34f35fa4f0c65e5a6a629', 2, 1, 'accessToken', '[]', 0, '2022-08-14 16:17:13', '2022-08-14 16:17:13', '2023-08-14 16:17:13'),
('e10cb0c7cac901b42a70b4ec010642e06cf335a3e429f921114f79a39e7527157ec2d6ae92514fa7', 2, 1, 'accessToken', '[]', 0, '2022-07-30 21:35:10', '2022-07-30 21:35:10', '2023-07-30 21:35:10'),
('e15fc659e029ea2e9f3a8a8f1889498ec258bce3ffcb35ffbdb8605311fcaa41fcd8a5c4c69a4a5e', 3, 1, 'accessToken', '[]', 0, '2022-07-30 14:15:46', '2022-07-30 14:15:46', '2023-07-30 14:15:46'),
('e1838a8ff71190a450ce0ea5d7f0c0149df0ff8cb6578a309e1f490cc5d8b24ea96b8bfaf27e2a6f', 5, 1, 'accessToken', '[]', 0, '2022-08-01 12:03:23', '2022-08-01 12:03:23', '2023-08-01 12:03:23'),
('e3816e524a815a828c60be35e7cc78a96be4c91855e5630e42b652a63322e6b861a06e8ef51425f7', 1, 1, 'accessToken', '[]', 0, '2022-07-09 16:55:53', '2022-07-09 16:55:53', '2023-07-09 22:55:53'),
('e416e82d14d7d25eb1254b1bdc994db65f401bbfa91788e4c92fae6b54c8e9ae0e889494eb500167', 3, 1, 'accessToken', '[]', 0, '2022-07-31 09:20:25', '2022-07-31 09:20:25', '2023-07-31 09:20:25'),
('e46f3afc5cffc382334ae32cdcff51bcfc76d85ad9a9239147ab800cc424abac60e10cdbdbae136e', 4, 1, 'accessToken', '[]', 0, '2022-07-29 21:35:10', '2022-07-29 21:35:10', '2023-07-29 21:35:10'),
('e482cd8e7b781e61437cb1af9d8bba51449f602887683f084184f84d3c8732beb87e403cdc48f273', 2, 1, 'accessToken', '[]', 0, '2022-07-16 09:30:15', '2022-07-16 09:30:15', '2023-07-16 15:30:15'),
('e4d021057bf245156c0b451f7990a9bf9afb20f7af8b1fb55d7d068e099995ee4aa1ae6c4ae827b1', 3, 1, 'accessToken', '[]', 0, '2022-08-14 14:49:38', '2022-08-14 14:49:38', '2023-08-14 14:49:38'),
('e77e3a31e6e68d7dc4787ee4aa5f6c6c6169fea8befba248af019fea9293b435bd04a2db80f1d1e3', 2, 1, 'accessToken', '[]', 0, '2022-08-14 13:35:41', '2022-08-14 13:35:41', '2023-08-14 13:35:41'),
('e80e3f83ae6189b8ae0fae821e749869cf785807716a0d077f3378532e9e1e9ad0182010b52c39d5', 3, 1, 'accessToken', '[]', 0, '2022-07-29 22:11:09', '2022-07-29 22:11:09', '2023-07-29 22:11:09'),
('ea8de71f6e9a6445ac22309b18984b11ad4f36645d2c3379ec7e37f3238441f0bb2642ad160892a6', 2, 1, 'accessToken', '[]', 0, '2022-07-26 19:09:14', '2022-07-26 19:09:14', '2023-07-27 01:09:14'),
('eb384325a6f387f75be437b5c2c1b8380c4d38957d930e6c4d1bc9a36259efd9fd7628a5fb971ec9', 2, 1, 'accessToken', '[]', 0, '2022-07-26 08:02:42', '2022-07-26 08:02:42', '2023-07-26 14:02:42'),
('eb388b696a0b492189c5756473e686f19740057d50a8a9cfd9a7ad58bab3b741abb9c3015fd12722', 2, 1, 'accessToken', '[]', 0, '2022-08-05 20:43:54', '2022-08-05 20:43:54', '2023-08-05 20:43:54'),
('ed137de11b91675376c90805fca0d31eb7de1f678557615f639a517183f416a29e87aa7fa4bf8ac8', 3, 1, 'accessToken', '[]', 0, '2022-08-09 19:56:49', '2022-08-09 19:56:49', '2023-08-09 19:56:49'),
('ed411b36d615fd2ae65f5ced27f3dbcad7bbd6b6d00d938817aefb0b4f7fbbf8bffb0749f6a53e25', 3, 1, 'accessToken', '[]', 0, '2022-08-08 11:48:09', '2022-08-08 11:48:09', '2023-08-08 11:48:09'),
('ed77699c3a6d3964eac96b39ba98493a435f4524e97f7e5514c9f7ff97e696ee916b5775330e01c0', 2, 1, 'accessToken', '[]', 0, '2022-08-06 14:08:15', '2022-08-06 14:08:15', '2023-08-06 14:08:15'),
('ee1f83b8165ff955ae1cba4667a8faea7ce8e962d127125d038df72b4a142405c43d86c1bb9d842a', 3, 1, 'accessToken', '[]', 0, '2022-08-14 13:36:30', '2022-08-14 13:36:30', '2023-08-14 13:36:30'),
('ee218de520b6e6b0b6a2595cc8567ec8e0c93836482d84e59d13c332518fc77c979cdacd59414dc3', 3, 1, 'accessToken', '[]', 0, '2022-07-22 16:27:53', '2022-07-22 16:27:53', '2023-07-22 22:27:53'),
('ee82b7506d34d3ee92101f1af2cde1a32fdec27e26caa2e73dc411ebeea396dd526beb1ff5022d01', 3, 1, 'accessToken', '[]', 0, '2022-08-16 11:34:42', '2022-08-16 11:34:42', '2023-08-16 11:34:42'),
('eeaf02ff3b2c7b5c626127fa9bdaa7193a8e1ebcae3e20a1698be6a1ab2921915423855441137474', 3, 1, 'accessToken', '[]', 0, '2022-08-01 12:34:53', '2022-08-01 12:34:53', '2023-08-01 12:34:53'),
('ef0b5e059341ad28f224978072f41ddc8a7f47b1cf906350e4b5364b821a356d8ca33720df3227eb', 5, 1, 'accessToken', '[]', 0, '2022-07-29 21:33:23', '2022-07-29 21:33:23', '2023-07-29 21:33:23'),
('f05b539ab99dda5f552a31d6fbf36341f519887177f34f95b91c5c11edd524c9853ff626fe50aac9', 2, 1, 'accessToken', '[]', 0, '2022-07-30 22:05:26', '2022-07-30 22:05:26', '2023-07-30 22:05:26'),
('f1c8032a9421558a5aaa463b4b01a2119ee58a7f45fff3309a93e30330f2a0b9b55ee939f25b3bae', 3, 1, 'accessToken', '[]', 0, '2022-07-30 01:32:32', '2022-07-30 01:32:32', '2023-07-30 01:32:32'),
('f31691587c177f7db554ffd27f647a8b8416803b4e7093b42f77e94ecf4807f5b44f580388ef8f00', 2, 1, 'accessToken', '[]', 0, '2022-07-26 18:42:56', '2022-07-26 18:42:56', '2023-07-27 00:42:56'),
('f35892cb251df22a189824821895a8eeeedaa80edf3b3b0fbeeb17da66248157f34df395ac677076', 3, 1, 'accessToken', '[]', 0, '2022-08-11 13:02:18', '2022-08-11 13:02:18', '2023-08-11 13:02:18'),
('f788a8d99639aa376fe9571e582fb1c50bb41e9c75ff919029019081386f8f32cb4fd6e34b4d4c28', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:44:50', '2022-07-12 18:44:50', '2023-07-13 00:44:50'),
('f9b571e0271270412dbc868d211adc6433282fbac543fef8fa661344cff78fe3365dc4597453f00e', 2, 1, 'accessToken', '[]', 0, '2022-08-01 12:06:16', '2022-08-01 12:06:16', '2023-08-01 12:06:16'),
('f9bb72714b973a2ee7b9d7caad61d9ba0bd63c9ea64e29659fb546abad15d18d3930fa25e8bd619f', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:14:44', '2022-07-12 18:14:44', '2023-07-13 00:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel8.2 Personal Access Client', 'EDZf8wE5U0F8zzBzVMnbhRzH3pgTan9dAkcYxL7N', NULL, 'http://localhost', 1, 0, 0, '2022-07-08 19:55:18', '2022-07-08 19:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-07-08 19:55:18', '2022-07-08 19:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `union` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trxId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sonodId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sonod_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `union`, `trxId`, `sonodId`, `sonod_type`, `amount`, `applicant_mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tepriganj', '1658851361', '1', 'নাগরিকত্ব সনদ', '200', NULL, 'Paid', '2022-07-26 16:02:41', '2022-07-26 16:15:52'),
(2, 'tepriganj', '1658862621', '3', 'নাগরিকত্ব সনদ', '200', NULL, 'Paid', '2022-07-26 19:10:21', '2022-07-26 19:11:54'),
(3, 'tungibaria', '1658867645', '4', 'নাগরিকত্ব সনদ', '200', NULL, 'Paid', '2022-07-27 02:34:05', '2022-07-27 02:34:32'),
(4, 'tungibaria', '1658894916', '5', 'নাগরিকত্ব সনদ', '100', NULL, 'Paid', '2022-07-27 10:08:36', '2022-07-27 10:09:35'),
(5, 'tungibaria', '1658916028', '6', 'নাগরিকত্ব সনদ', '100', NULL, 'Pending', '2022-07-27 16:00:28', '2022-07-27 16:00:28'),
(6, 'tungibaria', '1658916043', '6', 'নাগরিকত্ব সনদ', '100', NULL, 'Pending', '2022-07-27 16:00:43', '2022-07-27 16:00:43'),
(7, 'tungibaria', '1658916073', '6', 'নাগরিকত্ব সনদ', '100', NULL, 'Pending', '2022-07-27 16:01:13', '2022-07-27 16:01:13'),
(8, 'tungibaria', '1658916090', '6', 'নাগরিকত্ব সনদ', '100', NULL, 'Paid', '2022-07-27 16:01:30', '2022-07-27 16:02:19'),
(9, 'tungibaria', '1658929740', '8', 'নাগরিকত্ব সনদ', '150', NULL, 'Pending', '2022-07-27 19:49:00', '2022-07-27 19:49:00'),
(10, 'tungibaria', '1658929747', '8', 'নাগরিকত্ব সনদ', '150', NULL, 'Pending', '2022-07-27 19:49:07', '2022-07-27 19:49:07'),
(11, 'tungibaria', '1658929792', '8', 'নাগরিকত্ব সনদ', '150', NULL, 'Paid', '2022-07-27 19:49:52', '2022-07-27 19:50:26'),
(12, 'tungibaria', '1659117649', '5', 'ট্রেড লাইসেন্স', '325', NULL, 'Pending', '2022-07-30 00:00:49', '2022-07-30 00:00:49'),
(13, 'tungibaria', '1659156720', '9', 'নাগরিকত্ব সনদ', '100', NULL, 'Paid', '2022-07-30 10:52:00', '2022-07-30 10:52:31'),
(14, 'tungibaria', '1659168418', '11', 'নাগরিকত্ব সনদ', '100', NULL, 'Pending', '2022-07-30 14:06:58', '2022-07-30 14:06:58'),
(15, 'tungibaria', '1659195535', '12', 'নাগরিকত্ব সনদ', '100', NULL, 'Paid', '2022-07-30 21:38:55', '2022-07-30 21:39:09'),
(16, 'tungibaria', '1659197015', '13', 'ট্রেড লাইসেন্স', '200', NULL, 'Paid', '2022-07-30 22:03:35', '2022-07-30 22:03:58'),
(17, 'tungibaria', '1659197286', '13', 'ট্রেড লাইসেন্স', '200', NULL, 'Pending', '2022-07-30 22:08:06', '2022-07-30 22:08:06'),
(18, 'tungibaria', '1659197293', '13', 'ট্রেড লাইসেন্স', '200', NULL, 'Pending', '2022-07-30 22:08:13', '2022-07-30 22:08:13'),
(19, 'tungibaria', '1659198042', '14', 'উত্তরাধিকারী সনদ', '220', NULL, 'Pending', '2022-07-30 22:20:42', '2022-07-30 22:20:42'),
(20, 'tungibaria', '1659198050', '14', 'উত্তরাধিকারী সনদ', '220', NULL, 'Pending', '2022-07-30 22:20:50', '2022-07-30 22:20:50'),
(21, 'tungibaria', '1659202080', '11', 'নাগরিকত্ব সনদ', '100', NULL, 'Pending', '2022-07-30 23:28:00', '2022-07-30 23:28:00'),
(22, 'tungibaria', '1659202086', '11', 'নাগরিকত্ব সনদ', '100', NULL, 'Pending', '2022-07-30 23:28:06', '2022-07-30 23:28:06'),
(23, 'tungibaria', '1659203033', '15', 'নাগরিকত্ব সনদ', '500', NULL, 'Paid', '2022-07-30 23:43:53', '2022-07-30 23:44:11'),
(24, 'tungibaria', '1659238034', '16', 'নাগরিকত্ব সনদ', '500', NULL, 'Paid', '2022-07-31 09:27:14', '2022-07-31 09:27:29'),
(25, 'tungibaria', '1659241323', '17', 'নাগরিকত্ব সনদ', '500', NULL, 'Paid', '2022-07-31 10:22:03', '2022-07-31 10:22:20'),
(26, 'tungibaria', '1659245295', '18', 'নাগরিকত্ব সনদ', '500', NULL, 'Paid', '2022-07-31 11:28:15', '2022-07-31 11:28:53'),
(27, 'tungibaria', '1659248746', '19', 'নাগরিকত্ব সনদ', '500', NULL, 'Paid', '2022-07-31 12:25:46', '2022-07-31 12:26:39'),
(28, 'tungibaria', '1659335031', '2', 'নাগরিকত্ব সনদ', '500', NULL, 'Pending', '2022-08-01 12:23:51', '2022-08-01 12:23:51'),
(29, 'tungibaria', '1659335557', '5', 'নাগরিকত্ব সনদ', '500', NULL, 'Paid', '2022-08-01 12:32:37', '2022-08-01 12:33:00'),
(30, 'tungibaria', '1659335673', '6', 'নাগরিকত্ব সনদ', '500', NULL, 'Paid', '2022-08-01 12:34:33', '2022-08-01 12:34:52'),
(31, 'tungibaria', '1659336446', '7', 'নাগরিকত্ব সনদ', '500', NULL, 'Pending', '2022-08-01 12:47:26', '2022-08-01 12:47:26'),
(32, 'tungibaria', '1659340051', '8', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '100', NULL, 'Pending', '2022-08-01 13:47:32', '2022-08-01 13:47:32'),
(33, 'tungibaria', '1659342330', '2', 'জীবিত সনদ', '100', NULL, 'Paid', '2022-08-01 14:25:30', '2022-08-01 14:25:42'),
(34, 'tungibaria', '1659446680', '3', 'নাগরিকত্ব সনদ', '500', NULL, 'Paid', '2022-08-02 19:24:40', '2022-08-02 19:25:13'),
(35, 'tungibaria', '1659454047', '5', 'নাগরিকত্ব সনদ', '500', NULL, 'Pending', '2022-08-02 21:27:27', '2022-08-02 21:27:27'),
(36, 'tungibaria', '1659454376', '6', 'নাগরিকত্ব সনদ', '500', NULL, 'Paid', '2022-08-02 21:32:56', '2022-08-02 21:33:29'),
(37, 'tungibaria', '1659457138', '7', 'ট্রেড লাইসেন্স', '200', NULL, 'Paid', '2022-08-02 22:18:58', '2022-08-02 22:19:50'),
(38, 'tungibaria', '1659522436', '8', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '100', NULL, 'Paid', '2022-08-03 16:27:16', '2022-08-03 16:27:35'),
(39, 'tungibaria', '1659707931', '9', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-05 19:58:51', '2022-08-05 19:59:33'),
(40, 'tungibaria', '1659710977', '10', 'ট্রেড লাইসেন্স', '310', NULL, 'Paid', '2022-08-05 20:49:37', '2022-08-05 20:49:53'),
(41, 'tungibaria', '1659711351', '11', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-05 20:55:51', '2022-08-05 20:56:11'),
(42, 'tungibaria', '1659774757', '1', 'প্রত্যয়নপত্র', '10', NULL, 'Pending', '2022-08-06 14:32:37', '2022-08-06 14:32:37'),
(43, 'tungibaria', '1659774764', '1', 'প্রত্যয়নপত্র', '10', NULL, 'Pending', '2022-08-06 14:32:44', '2022-08-06 14:32:44'),
(44, 'tungibaria', '1659802647', '34', 'নাগরিকত্ব সনদ', '300', NULL, 'Pending', '2022-08-06 22:17:27', '2022-08-06 22:17:27'),
(45, 'tungibaria', '1659806830', '38', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-06 23:27:10', '2022-08-06 23:27:10'),
(46, 'tungibaria', '1659807771', '39', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-06 23:42:51', '2022-08-06 23:42:51'),
(47, 'tungibaria', '1659808617', '40', 'বিবিধ প্রত্যয়নপত্র', '170', NULL, 'Paid', '2022-08-06 23:56:57', '2022-08-06 23:57:18'),
(48, 'tungibaria', '1659810293', '41', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-07 00:24:53', '2022-08-07 00:24:53'),
(49, 'tungibaria', '1659810303', '41', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-07 00:25:03', '2022-08-07 00:25:03'),
(50, 'tungibaria', '1659810432', '42', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-07 00:27:12', '2022-08-07 00:27:12'),
(51, 'tungibaria', '1659811085', '43', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-07 00:38:05', '2022-08-07 00:38:05'),
(52, 'tungibaria', '1659811092', '44', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-07 00:38:12', '2022-08-07 00:38:12'),
(53, 'tungibaria', '1659811223', '45', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-07 00:40:23', '2022-08-07 00:40:23'),
(54, 'tungibaria', '1659813153', '61', 'ওয়ারিশ সনদ', '170', NULL, 'Paid', '2022-08-07 01:12:33', '2022-08-07 01:12:54'),
(55, 'tungibaria', '1659847687', '62', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-07 10:48:07', '2022-08-07 10:48:31'),
(56, 'tungibaria', '1659935134', '63', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-08 11:05:34', '2022-08-08 11:05:54'),
(57, 'tungibaria', '1659943403', '64', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-08 13:23:23', '2022-08-08 13:23:49'),
(58, 'tungibaria', '1659946576', '65', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-08 14:16:16', '2022-08-08 14:16:32'),
(59, 'tungibaria', '1659962719', '66', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-08 18:45:19', '2022-08-08 18:45:40'),
(60, 'tungibaria', '1659967856', '67', 'ট্রেড লাইসেন্স', '310', NULL, 'Paid', '2022-08-08 20:10:56', '2022-08-08 20:11:15'),
(61, 'tungibaria', '1659967976', '68', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-08 20:12:56', '2022-08-08 20:13:15'),
(62, 'tungibaria', '1659968083', '69', 'ওয়ারিশ সনদ', '170', NULL, 'Paid', '2022-08-08 20:14:43', '2022-08-08 20:15:01'),
(63, 'tungibaria', '1659969315', '70', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-08 20:35:15', '2022-08-08 20:35:40'),
(64, 'tungibaria', '1660023769', '71', 'ওয়ারিশ সনদ', '170', NULL, 'Pending', '2022-08-09 11:42:49', '2022-08-09 11:42:49'),
(65, 'tungibaria', '1660023865', '72', 'ওয়ারিশ সনদ', '170', NULL, 'Paid', '2022-08-09 11:44:25', '2022-08-09 11:44:40'),
(66, 'tungibaria', '1660053372', '73', 'ওয়ারিশ সনদ', '170', NULL, 'Paid', '2022-08-09 19:56:12', '2022-08-09 19:56:29'),
(67, 'tungibaria', '1660055673', '74', 'চারিত্রিক সনদ', '170', NULL, 'Paid', '2022-08-09 20:34:33', '2022-08-09 20:34:48'),
(68, 'tungibaria', '1660056410', '75', 'ভূমিহীন সনদ', '170', NULL, 'Paid', '2022-08-09 20:46:50', '2022-08-09 20:47:09'),
(69, 'tungibaria', '1660056705', '76', 'পারবারিক সনদ', '170', NULL, 'Paid', '2022-08-09 20:51:45', '2022-08-09 20:52:01'),
(70, 'tungibaria', '1660114497', '77', 'অবিবাহিত সনদ', '170', NULL, 'Paid', '2022-08-10 12:54:57', '2022-08-10 12:55:18'),
(71, 'tungibaria', '1660114583', '78', 'পুনঃ বিবাহ না হওয়া সনদ', '170', NULL, 'Paid', '2022-08-10 12:56:23', '2022-08-10 12:56:39'),
(72, 'tungibaria', '1660114676', '79', 'বার্ষিক আয়ের প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-10 12:57:56', '2022-08-10 12:58:13'),
(73, 'tungibaria', '1660116017', '80', 'পুনঃ বিবাহ না হওয়া সনদ', '170', NULL, 'Paid', '2022-08-10 13:20:17', '2022-08-10 13:20:37'),
(74, 'tungibaria', '1660117356', '81', 'একই নামের প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-10 13:42:36', '2022-08-10 13:42:57'),
(75, 'tungibaria', '1660117485', '82', 'প্রতিবন্ধী সনদপত্র', '170', NULL, 'Paid', '2022-08-10 13:44:45', '2022-08-10 13:45:21'),
(76, 'tungibaria', '1660118538', '83', 'অনুমতি পত্র', '170', NULL, 'Paid', '2022-08-10 14:02:18', '2022-08-10 14:04:22'),
(77, 'tungibaria', '1660119958', '84', 'ট্রেড লাইসেন্স', '310', NULL, 'Paid', '2022-08-10 14:25:58', '2022-08-10 14:26:21'),
(78, 'tungibaria', '1660120490', '85', 'অনাপত্তি সনদপত্র', '170', NULL, 'Paid', '2022-08-10 14:34:50', '2022-08-10 14:35:13'),
(79, 'tungibaria', '1660120727', '86', 'অগভীর নলকূপ স্থাপন', '170', NULL, 'Paid', '2022-08-10 14:38:47', '2022-08-10 14:39:10'),
(80, 'tungibaria', '1660122343', '87', 'অবকাঠামো নির্মাণের অনুমতি পত্র', '170', NULL, 'Paid', '2022-08-10 15:05:43', '2022-08-10 15:06:13'),
(81, 'tungibaria', '1660123003', '88', 'অভিভাবকের আয়ের সনদপত্র', '170', NULL, 'Paid', '2022-08-10 15:16:43', '2022-08-10 15:17:07'),
(82, 'tungibaria', '1660136433', '89', 'প্রত্যয়নপত্র', '170', NULL, 'Paid', '2022-08-10 19:00:33', '2022-08-10 19:00:51'),
(83, 'tungibaria', '1660136527', '90', 'ভোটার এলাকা স্থানান্তর অনাপত্তি পত্র', '170', NULL, 'Paid', '2022-08-10 19:02:07', '2022-08-10 19:02:19'),
(84, 'tungibaria', '1660136610', '91', 'জাতীয় পরিচয়পত্র সংশোধন প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-10 19:03:30', '2022-08-10 19:03:44'),
(85, 'tungibaria', '1660136709', '92', 'নিঃসন্তান প্রত্যয়নর', '170', NULL, 'Paid', '2022-08-10 19:05:09', '2022-08-10 19:05:22'),
(86, 'tungibaria', '1660136839', '93', 'ভোটার তালিকায় নাম অন্তর্ভুক্ত না হওয়ার প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-10 19:07:19', '2022-08-10 19:07:40'),
(87, 'tungibaria', '1660144687', '94', 'সম্প্রদায় সনদপত্র', '170', NULL, 'Paid', '2022-08-10 21:18:07', '2022-08-10 21:18:31'),
(88, 'tungibaria', '1660144790', '95', 'আর্থিক অস্বচ্ছলতার সনদপত্র', '170', NULL, 'Paid', '2022-08-10 21:19:50', '2022-08-10 21:20:13'),
(89, 'tungibaria', '1660144889', '96', 'এতিম সনদপত্র', '170', NULL, 'Paid', '2022-08-10 21:21:29', '2022-08-10 21:21:52'),
(90, 'tungibaria', '1660146503', '97', 'জীবিত সনদ', '170', NULL, 'Paid', '2022-08-10 21:48:23', '2022-08-10 21:48:47'),
(91, 'tungibaria', '1660150388', '98', 'রিনিউ সনদ', '170', NULL, 'Paid', '2022-08-10 22:53:08', '2022-08-10 22:55:40'),
(92, 'tungibaria', '1660150615', '99', 'বসতবাড়ি হোল্ডিং নিবন্ধন সনদ', '170', NULL, 'Paid', '2022-08-10 22:56:55', '2022-08-10 22:57:20'),
(93, 'tungibaria', '1660150706', '100', 'রোহিঙ্গা নয় মর্মে প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-10 22:58:26', '2022-08-10 22:58:49'),
(94, 'tungibaria', '1660198990', '101', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-11 12:23:10', '2022-08-11 12:23:35'),
(95, 'tungibaria', '1660200781', '102', 'উত্তরাধিকারী সনদ', '170', NULL, 'Paid', '2022-08-11 12:53:01', '2022-08-11 12:53:48'),
(96, 'tungibaria', '1660326087', '103', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-12 23:41:27', '2022-08-12 23:41:27'),
(97, 'tungibaria', '1660373567', '104', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-13 12:52:47', '2022-08-13 12:54:15'),
(98, 'tungibaria', '1660374304', '105', 'বার্ষিক আয়ের প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-13 13:05:04', '2022-08-13 13:05:23'),
(99, 'tungibaria', '1660376330', '106', 'একই নামের প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-13 13:38:50', '2022-08-13 13:39:06'),
(100, 'tungibaria', '1660457092', '107', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-14 12:04:52', '2022-08-14 12:06:06'),
(101, 'tungibaria', '1660461842', '108', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-14 13:24:02', '2022-08-14 13:24:24'),
(102, 'tungibaria', '1660462508', '109', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-14 13:35:08', '2022-08-14 13:35:24'),
(103, 'tungibaria', '1660463626', '1', 'বার্ষিক আয়ের প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-14 13:53:46', '2022-08-14 13:54:05'),
(104, 'tungibaria', '1660466375', '2', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-14 14:39:35', '2022-08-14 14:40:21'),
(105, 'tungibaria', '1660467111', '3', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-14 14:51:51', '2022-08-14 14:52:51'),
(106, 'tungibaria', '1660467405', '4', 'ট্রেড লাইসেন্স', '310', NULL, 'Paid', '2022-08-14 14:56:45', '2022-08-14 14:57:15'),
(107, 'tungibaria', '1660467502', '5', 'ট্রেড লাইসেন্স', '310', NULL, 'Paid', '2022-08-14 14:58:22', '2022-08-14 14:58:40'),
(108, 'tungibaria', '1660467535', '6', 'ওয়ারিশ সনদ', '170', NULL, 'Paid', '2022-08-14 14:58:55', '2022-08-14 14:59:10'),
(109, 'tungibaria', '1660468634', '7', 'উত্তরাধিকারী সনদ', '170', NULL, 'Paid', '2022-08-14 15:17:14', '2022-08-14 15:18:36'),
(110, 'tungibaria', '1660468759', '8', 'ওয়ারিশ সনদ', '170', NULL, 'Paid', '2022-08-14 15:19:19', '2022-08-14 15:24:05'),
(111, 'tungibaria', '1660469082', '9', 'বিবিধ প্রত্যয়নপত্র', '170', NULL, 'Paid', '2022-08-14 15:24:42', '2022-08-14 15:24:58'),
(112, 'tungibaria', '1660469138', '10', 'চারিত্রিক সনদ', '170', NULL, 'Paid', '2022-08-14 15:25:38', '2022-08-14 15:25:51'),
(113, 'tungibaria', '1660469182', '11', 'ভূমিহীন সনদ', '170', NULL, 'Paid', '2022-08-14 15:26:22', '2022-08-14 15:26:34'),
(114, 'tungibaria', '1660469222', '12', 'পারবারিক সনদ', '170', NULL, 'Paid', '2022-08-14 15:27:02', '2022-08-14 15:27:20'),
(115, 'tungibaria', '1660469274', '13', 'পারবারিক সনদ', '170', NULL, 'Paid', '2022-08-14 15:27:54', '2022-08-14 15:28:06'),
(116, 'tungibaria', '1660469322', '14', 'অবিবাহিত সনদ', '170', NULL, 'Paid', '2022-08-14 15:28:42', '2022-08-14 15:28:57'),
(117, 'tungibaria', '1660469366', '15', 'পুনঃ বিবাহ না হওয়া সনদ', '170', NULL, 'Paid', '2022-08-14 15:29:26', '2022-08-14 15:29:39'),
(118, 'tungibaria', '1660469413', '16', 'বার্ষিক আয়ের প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-14 15:30:13', '2022-08-14 15:30:27'),
(119, 'tungibaria', '1660469473', '17', 'একই নামের প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-14 15:31:13', '2022-08-14 15:31:24'),
(120, 'tungibaria', '1660469511', '18', 'অনুমতি পত্র', '170', NULL, 'Paid', '2022-08-14 15:31:51', '2022-08-14 15:32:02'),
(121, 'tungibaria', '1660469547', '19', 'প্রতিবন্ধী সনদপত্র', '170', NULL, 'Paid', '2022-08-14 15:32:27', '2022-08-14 15:32:43'),
(122, 'tungibaria', '1660469597', '20', 'অগভীর নলকূপ স্থাপন', '170', NULL, 'Paid', '2022-08-14 15:33:17', '2022-08-14 15:33:34'),
(123, 'tungibaria', '1660469640', '21', 'অবকাঠামো নির্মাণের অনুমতি পত্র', '170', NULL, 'Paid', '2022-08-14 15:34:00', '2022-08-14 15:34:11'),
(124, 'tungibaria', '1660469688', '22', 'অভিভাবকের আয়ের সনদপত্র', '170', NULL, 'Paid', '2022-08-14 15:34:48', '2022-08-14 15:34:59'),
(125, 'tungibaria', '1660469728', '23', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-14 15:35:28', '2022-08-14 15:35:40'),
(126, 'tungibaria', '1660469771', '24', 'প্রত্যয়নপত্র', '170', NULL, 'Paid', '2022-08-14 15:36:11', '2022-08-14 15:36:22'),
(127, 'tungibaria', '1660469809', '25', 'ভোটার এলাকা স্থানান্তর অনাপত্তি পত্র', '170', NULL, 'Paid', '2022-08-14 15:36:49', '2022-08-14 15:36:59'),
(128, 'tungibaria', '1660469849', '26', 'জাতীয় পরিচয়পত্র সংশোধন প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-14 15:37:29', '2022-08-14 15:37:43'),
(129, 'tungibaria', '1660469916', '27', 'নিঃসন্তান প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-14 15:38:36', '2022-08-14 15:39:01'),
(130, 'tungibaria', '1660469966', '28', 'ভোটার তালিকায় নাম অন্তর্ভুক্ত না হওয়ার প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-14 15:39:26', '2022-08-14 15:39:48'),
(131, 'tungibaria', '1660470009', '29', 'সম্প্রদায় সনদপত্র', '170', NULL, 'Paid', '2022-08-14 15:40:09', '2022-08-14 15:40:29'),
(132, 'tungibaria', '1660470055', '30', 'আর্থিক অস্বচ্ছলতার সনদপত্র', '170', NULL, 'Paid', '2022-08-14 15:40:55', '2022-08-14 15:41:13'),
(133, 'tungibaria', '1660470109', '31', 'এতিম সনদপত্র', '170', NULL, 'Paid', '2022-08-14 15:41:49', '2022-08-14 15:45:13'),
(134, 'tungibaria', '1660470342', '32', 'জীবিত সনদ', '170', NULL, 'Paid', '2022-08-14 15:45:42', '2022-08-14 15:45:59'),
(135, 'tungibaria', '1660470407', '33', 'রোহিঙ্গা নয় মর্মে প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-14 15:46:47', '2022-08-14 15:47:03'),
(136, 'tungibaria', '1660470471', '34', 'রোহিঙ্গা নয় মর্মে প্রত্যয়ন পত্র', '170', NULL, 'Pending', '2022-08-14 15:47:51', '2022-08-14 15:47:51'),
(137, 'tungibaria', '1660470509', '35', 'রোহিঙ্গা নয় মর্মে প্রত্যয়ন পত্র', '170', NULL, 'Pending', '2022-08-14 15:48:29', '2022-08-14 15:48:29'),
(138, 'tungibaria', '1660546637', '36', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-15 12:57:17', '2022-08-15 12:59:17'),
(139, 'tungibaria', '1660549833', '37', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-15 13:50:33', '2022-08-15 13:50:49'),
(140, 'tungibaria', '1660550960', '38', 'ট্রেড লাইসেন্স', '310', NULL, 'Paid', '2022-08-15 14:09:20', '2022-08-15 14:09:37'),
(141, 'tungibaria', '1660570844', '39', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-15 19:40:44', '2022-08-15 19:41:19'),
(142, 'tungibaria', '1660627694', '40', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-16 11:28:14', '2022-08-16 11:28:31'),
(143, 'tungibaria', '1660632384', '33', 'প্রত্যয়নপত্র', '170', NULL, 'Paid', '2022-08-16 12:46:24', '2022-08-16 12:47:06'),
(144, 'tungibaria', '1660632638', '34', 'নিঃসন্তান প্রত্যয়ন', '170', NULL, 'Paid', '2022-08-16 12:50:38', '2022-08-16 12:51:10'),
(145, 'tungibaria', '1660678035', '34', 'প্রত্যয়নপত্র', '170', NULL, 'Paid', '2022-08-17 01:27:15', '2022-08-17 01:27:38'),
(146, 'tungibaria', '1660679721', '34', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-17 05:55:21', '2022-08-17 05:55:36'),
(147, 'tungibaria', '1661447999', '1', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-26 03:19:59', '2022-08-26 03:19:59'),
(148, 'tungibaria', '1661448013', '2', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-26 03:20:13', '2022-08-26 03:20:13'),
(149, 'tungibaria', '1661448031', '3', 'নাগরিকত্ব সনদ', '730', NULL, 'Pending', '2022-08-26 03:20:31', '2022-08-26 03:20:31'),
(150, 'tungibaria', '1661528731', '5', 'আনুমানিক বয়স প্রত্যয়ন পত্র', '170', NULL, 'Paid', '2022-08-27 01:45:31', '2022-08-27 01:45:50'),
(151, 'tungibaria', '1661622350', '6', 'নাগরিকত্ব সনদ', '730', NULL, 'Paid', '2022-08-28 03:45:50', '2022-08-28 03:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roleName`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '[{\"resourceName\":\"Dashboard\",\"read\":true,\"write\":false,\"update\":true,\"delete\":false,\"name\":\"Dashboard\"},{\"resourceName\":\"Tags\",\"read\":true,\"write\":true,\"update\":false,\"delete\":false,\"name\":\"tags\"},{\"resourceName\":\"Category\",\"read\":false,\"write\":false,\"update\":false,\"delete\":false,\"name\":\"category\"},{\"resourceName\":\"Create blogs\",\"read\":false,\"write\":false,\"update\":false,\"delete\":false,\"name\":\"createBlog\"},{\"resourceName\":\"Blogs\",\"read\":false,\"write\":false,\"update\":false,\"delete\":false,\"name\":\"blogs\"},{\"resourceName\":\"Admin users\",\"read\":false,\"write\":false,\"update\":false,\"delete\":false,\"name\":\"adminusers\"},{\"resourceName\":\"Role\",\"read\":true,\"write\":false,\"update\":false,\"delete\":false,\"name\":\"role\"},{\"resourceName\":\"Assign Role\",\"read\":false,\"write\":false,\"update\":false,\"delete\":false,\"name\":\"assignRole\"}]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sonodnamelists`
--

CREATE TABLE `sonodnamelists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bnname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sonod_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sonodnamelists`
--

INSERT INTO `sonodnamelists` (`id`, `bnname`, `enname`, `icon`, `template`, `sonod_fee`, `created_at`, `updated_at`) VALUES
(1, 'নাগরিকত্ব সনদ', 'Citizenship certificate', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '500', NULL, '2022-07-30 23:40:54'),
(2, 'ট্রেড লাইসেন্স', 'Trade license', 'assets/img/pic-04.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '200', NULL, NULL),
(3, 'ওয়ারিশ সনদ', 'Certificate of Inheritance', 'assets/img/pic-02.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(4, 'উত্তরাধিকারী সনদ', 'Inheritance certificate', 'assets/img/pic-04.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(5, 'বিবিধ প্রত্যয়নপত্র', 'Miscellaneous certificates', 'assets/img/pic-06.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(6, 'চারিত্রিক সনদ', 'Certificate of Character', 'assets/img/pic-03.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(7, 'ভূমিহীন সনদ', 'Landless certificate', 'assets/img/pic-05.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(8, 'পারবারিক সনদ', 'Family certificate', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(9, 'অবিবাহিত সনদ', 'Unmarried certificate', 'assets/img/pic-06.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(10, 'পুনঃ বিবাহ না হওয়া সনদ', 'Certificate of not remarrying', 'assets/img/pic-09.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(11, 'বার্ষিক আয়ের প্রত্যয়ন', 'Certificate of annual income', 'assets/img/pic-11.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(12, 'একই নামের প্রত্যয়ন', 'Certification of the same name', 'assets/img/pic-08.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(13, 'অনুমতি পত্র', 'permit', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(14, 'প্রতিবন্ধী সনদপত্র', 'Disability application', 'assets/img/pic-07.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(15, 'অনাপত্তি সনদপত্র', 'Certificate of No Objection', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(16, 'অগভীর নলকূপ স্থাপন', 'Shallow tube well installation', 'assets/img/Untitled-1-12.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(18, 'অবকাঠামো নির্মাণের অনুমতি পত্র', 'Permission letter for construction of infrastructure', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(19, 'অভিভাবকের আয়ের সনদপত্র', 'Parents Income Certificate', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(20, 'আনুমানিক বয়স প্রত্যয়ন পত্র', 'Certificate of Approximate Age', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(22, 'প্রত্যয়নপত্র', 'Certificate', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(23, 'ভোটার এলাকা স্থানান্তর অনাপত্তি পত্র', 'No Objection Letter to Transfer of Constituency', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(24, 'জাতীয় পরিচয়পত্র সংশোধন প্রত্যয়ন', 'National Identity Card Amendment Certificate', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(25, 'নিঃসন্তান প্রত্যয়ন', 'Childlessness Certificate', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(26, 'ভোটার তালিকায় নাম অন্তর্ভুক্ত না হওয়ার প্রত্যয়ন', 'Attestation that name is not included in electoral roll', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(27, 'সম্প্রদায় সনদপত্র', 'Community Certificate', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(28, 'আর্থিক অস্বচ্ছলতার সনদপত্র', 'Certificate of Financial Insolvency', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(30, 'এতিম সনদপত্র', 'Orphan certificate', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(31, 'জীবিত সনদ', 'living certificate', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL),
(34, 'রোহিঙ্গা নয় মর্মে প্রত্যয়ন পত্র', 'Certificate of non-Rohingya', 'assets/img/pic-01.png', '&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', '100', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sonods`
--

CREATE TABLE `sonods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unioun_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sonod_Id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'backend/images.png',
  `sonod_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `successor_father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `successor_mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `successor_father_alive_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `successor_mother_alive_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_holding_tax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_national_id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_birth_certificate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_passport_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Annual_income` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Subject_to_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `The_subject_of_the_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name_of_the_transferred_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_second_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_owner_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_name_of_the_organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_marriage_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_vat_id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_tax_id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_type_of_business` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_resident_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_present_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_present_road_block_sector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_present_word_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_present_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_present_Upazila` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_present_post_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_permanent_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_permanent_road_block_sector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_permanent_word_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_permanent_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_permanent_Upazila` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_permanent_post_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `successor_list` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_years_money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currently_paid_money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_deails` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `the_amount_of_money_in_words` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_national_id_front_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_national_id_back_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_birth_certificate_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prottoyon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sec_prottoyon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stutus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chaireman_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chaireman_sign` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancedbyUserid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sonods`
--

INSERT INTO `sonods` (`id`, `unioun_name`, `year`, `sonod_Id`, `image`, `sonod_name`, `successor_father_name`, `successor_mother_name`, `successor_father_alive_status`, `successor_mother_alive_status`, `applicant_holding_tax_number`, `applicant_national_id_number`, `applicant_birth_certificate_number`, `applicant_passport_number`, `applicant_date_of_birth`, `family_name`, `Annual_income`, `Subject_to_permission`, `disabled`, `The_subject_of_the_certificate`, `Name_of_the_transferred_area`, `applicant_second_name`, `applicant_owner_type`, `applicant_name_of_the_organization`, `applicant_name`, `utname`, `applicant_gender`, `applicant_marriage_status`, `applicant_vat_id_number`, `applicant_tax_id_number`, `applicant_type_of_business`, `applicant_father_name`, `applicant_mother_name`, `applicant_occupation`, `applicant_education`, `applicant_religion`, `applicant_resident_status`, `applicant_present_village`, `applicant_present_road_block_sector`, `applicant_present_word_number`, `applicant_present_district`, `applicant_present_Upazila`, `applicant_present_post_office`, `applicant_permanent_village`, `applicant_permanent_road_block_sector`, `applicant_permanent_word_number`, `applicant_permanent_district`, `applicant_permanent_Upazila`, `applicant_permanent_post_office`, `successor_list`, `khat`, `last_years_money`, `currently_paid_money`, `total_amount`, `amount_deails`, `the_amount_of_money_in_words`, `applicant_mobile`, `applicant_email`, `applicant_phone`, `applicant_national_id_front_attachment`, `applicant_national_id_back_attachment`, `applicant_birth_certificate_attachment`, `prottoyon`, `sec_prottoyon`, `stutus`, `payment_status`, `chaireman_name`, `chaireman_sign`, `cancedby`, `cancedbyUserid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tungibaria', '2022', '7790812200001', 'sonod/Citizenship_certificate/image/1661447998____12680.jpeg', 'নাগরিকত্ব সনদ', NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', NULL, '566456454544', NULL, NULL, '2022-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdfdf', NULL, 'পুরুষ', 'বিবাহিত', NULL, NULL, NULL, 'dfdf', 'dfdf', NULL, NULL, 'ইসলাম', 'স্থায়ী', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"w_id\":null,\"w_name\":null,\"w_relation\":null,\"w_age\":null,\"w_nid\":null}]', NULL, '0', '730', '730', '{\"total_amount\":730,\"pesaKor\":null,\"tredeLisenceFee\":null,\"vatAykor\":null,\"khat\":null,\"last_years_money\":0,\"currently_paid_money\":730}', 'সাত শত ত্রিশ টাকা  মাত্র', '56465465465', '565654646', NULL, 'sonod/Citizenship_certificate/applicant_national_id_front_attachment/1661447998____45819.jpeg', 'sonod/Citizenship_certificate/applicant_national_id_back_attachment/1661447998____43409.jpeg', NULL, NULL, NULL, 'Prepaid', 'Unpaid', 'নাদিরা রহমান', 'unioninfo/c_signture/1658826018____11700.png', NULL, NULL, '2022-08-26 03:19:58', '2022-08-26 03:19:59', NULL),
(2, 'tungibaria', '2022', '7790812200001', 'sonod/Citizenship_certificate/image/1661448013____96334.jpeg', 'নাগরিকত্ব সনদ', NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', NULL, '566456454544', NULL, NULL, '2022-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdfdf', NULL, 'পুরুষ', 'বিবাহিত', NULL, NULL, NULL, 'dfdf', 'dfdf', NULL, NULL, 'ইসলাম', 'স্থায়ী', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"w_id\":null,\"w_name\":null,\"w_relation\":null,\"w_age\":null,\"w_nid\":null}]', NULL, '0', '730', '730', '{\"total_amount\":730,\"pesaKor\":null,\"tredeLisenceFee\":null,\"vatAykor\":null,\"khat\":null,\"last_years_money\":0,\"currently_paid_money\":730}', 'সাত শত ত্রিশ টাকা  মাত্র', '56465465465', '565654646', NULL, 'sonod/Citizenship_certificate/applicant_national_id_front_attachment/1661448013____90751.jpeg', 'sonod/Citizenship_certificate/applicant_national_id_back_attachment/1661448013____47932.jpeg', NULL, NULL, NULL, 'Prepaid', 'Unpaid', 'নাদিরা রহমান', 'unioninfo/c_signture/1658826018____11700.png', NULL, NULL, '2022-08-26 03:20:13', '2022-08-26 03:20:13', NULL),
(3, 'tungibaria', '2022', '7790812200001', 'sonod/Citizenship_certificate/image/1661448030____96448.jpeg', 'নাগরিকত্ব সনদ', NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', NULL, '566456454544', NULL, NULL, '2022-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdfdf', NULL, 'পুরুষ', 'বিবাহিত', NULL, NULL, NULL, 'dfdf', 'dfdf', NULL, NULL, 'ইসলাম', 'স্থায়ী', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"w_id\":null,\"w_name\":null,\"w_relation\":null,\"w_age\":null,\"w_nid\":null}]', NULL, '0', '730', '730', '{\"total_amount\":730,\"pesaKor\":null,\"tredeLisenceFee\":null,\"vatAykor\":null,\"khat\":null,\"last_years_money\":0,\"currently_paid_money\":730}', 'সাত শত ত্রিশ টাকা  মাত্র', '56465465465', '565654646', NULL, 'sonod/Citizenship_certificate/applicant_national_id_front_attachment/1661448030____46317.jpeg', 'sonod/Citizenship_certificate/applicant_national_id_back_attachment/1661448030____52278.jpeg', NULL, NULL, NULL, 'Prepaid', 'Unpaid', 'নাদিরা রহমান', 'unioninfo/c_signture/1658826018____11700.png', NULL, NULL, '2022-08-26 03:20:30', '2022-08-26 03:20:30', NULL),
(4, 'tungibaria', '2022', '7790812200002', 'sonod/Certificate_of_Approximate_Age/image/1661528711____14094.jpeg', 'আনুমানিক বয়স প্রত্যয়ন পত্র', NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', '1234', '5052123456789', '50852457645651526', '5498548545895', '1996-07-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'সৈয়দ শাহারিয়ার আরাফাত', NULL, 'পুরুষ', 'বিবাহিত', NULL, NULL, NULL, 'সৈয়দ মোস্তফা কামাল', 'ফাতেমা বেগম', 'ফ্রিল্যান্সিং', 'গ্রাজুয়েট', 'ইসলাম', 'স্থায়ী', 'ধোপাকাঠি', 'ধোপাকাঠি', '৯', 'বরিশাল', 'বরিশাল সদর', 'পতাং', 'ধোপাকাঠি', 'ধোপাকাঠি', '৯', 'বরিশাল', 'বরিশাল সদর', 'পতাং', '[{\"w_id\":null,\"w_name\":null,\"w_relation\":null,\"w_age\":null,\"w_nid\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, '01703658487', 'arafatnisi@gmail.com', NULL, 'sonod/Certificate_of_Approximate_Age/applicant_national_id_front_attachment/1661528711____49719.jpeg', 'sonod/Certificate_of_Approximate_Age/applicant_national_id_back_attachment/1661528711____56429.jpeg', 'sonod/Certificate_of_Approximate_Age/applicant_birth_certificate_attachment/1661528711____28435.jpeg', 'https://tungibaria.sumonali.com/dashboard', NULL, 'Prepaid', 'Unpaid', 'নাদিরা রহমান', 'unioninfo/c_signture/1658826018____11700.png', NULL, NULL, '2022-08-27 01:45:12', '2022-08-27 01:45:12', NULL),
(5, 'tungibaria', '2022', '7790812200002', 'sonod/Certificate_of_Approximate_Age/image/1661528730____29351.jpeg', 'আনুমানিক বয়স প্রত্যয়ন পত্র', NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', '1234', '5052123456789', '50852457645651526', '5498548545895', '1996-07-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'সৈয়দ শাহারিয়ার আরাফাত', NULL, 'পুরুষ', 'বিবাহিত', NULL, NULL, NULL, 'সৈয়দ মোস্তফা কামাল', 'ফাতেমা বেগম', 'ফ্রিল্যান্সিং', 'গ্রাজুয়েট', 'ইসলাম', 'স্থায়ী', 'ধোপাকাঠি', 'ধোপাকাঠি', '৯', 'বরিশাল', 'বরিশাল সদর', 'পতাং', 'ধোপাকাঠি', 'ধোপাকাঠি', '৯', 'বরিশাল', 'বরিশাল সদর', 'পতাং', '[{\"w_id\":null,\"w_name\":null,\"w_relation\":null,\"w_age\":null,\"w_nid\":null}]', NULL, '0', '170', '170', '{\"total_amount\":\"0\",\"pesaKor\":null,\"tredeLisenceFee\":null,\"vatAykor\":null,\"khat\":null,\"last_years_money\":\"0\",\"currently_paid_money\":\"0\"}', 'এক শত সত্তর টাকা  মাত্র', '01703658487', 'arafatnisi@gmail.com', NULL, 'sonod/Certificate_of_Approximate_Age/applicant_national_id_front_attachment/1661528730____74217.jpeg', 'sonod/Certificate_of_Approximate_Age/applicant_national_id_back_attachment/1661528730____52002.jpeg', 'sonod/Certificate_of_Approximate_Age/applicant_birth_certificate_attachment/1661528730____94063.jpeg', 'https://tungibaria.sumonali.com/dashboard', 'সৈয়দ শাহারিয়ার আরাফাত তাকে আমি ব্যক্তিগতভাবে চিনি ও জানি। তার আনুমানিক বয়স 26 বছর 1 মাস 21 দিন  । সে জন্মসূত্রে বাংলাদেশের নাগরিক এবং অত্র ইউনিয়ন পরিষদের স্থায়ী বাসিন্দা। আমার জানামতে তারবিরুদ্ধে রাষ্ট্রদ্রোহিতার অভিযোগ নেই।', 'approved', 'Paid', 'নাদিরা রহমান', 'unioninfo/c_signture/1658826018____11700.png', NULL, NULL, '2022-08-27 01:45:30', '2022-08-27 01:48:38', NULL),
(6, 'tungibaria', '2022', '7790812200003', 'backend/images.png', 'নাগরিকত্ব সনদ', NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', NULL, NULL, NULL, NULL, '2022-08-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'আবেদনকারীর নাম*', NULL, 'পুরুষ', 'অবিবাহিত', NULL, NULL, NULL, 'আবেদনকারীর পিতার নাম (বাংলায়)', 'আবেদনকারীর মাতার নাম (বাংলায়)', NULL, NULL, 'ইসলাম', 'স্থায়ী', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"w_id\":null,\"w_name\":null,\"w_relation\":null,\"w_age\":null,\"w_nid\":null}]', NULL, '0', '730', '730', '{\"total_amount\":730,\"pesaKor\":null,\"tredeLisenceFee\":null,\"vatAykor\":null,\"khat\":null,\"last_years_money\":0,\"currently_paid_money\":730}', 'সাত শত ত্রিশ টাকা  মাত্র', '01909756552', 'freelancernishad123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Paid', 'নাদিরা রহমান', 'unioninfo/c_signture/1658826018____11700.png', NULL, NULL, '2022-08-28 03:45:49', '2022-08-28 03:46:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uniouninfos`
--

CREATE TABLE `uniouninfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name_e` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_logo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sonod_logo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_signture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_notice` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defaultColor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uniouninfos`
--

INSERT INTO `uniouninfos` (`id`, `full_name`, `short_name_e`, `domain`, `short_name_b`, `thana`, `district`, `web_logo`, `sonod_logo`, `c_signture`, `c_name`, `u_image`, `u_description`, `u_notice`, `u_code`, `contact_email`, `google_map`, `defaultColor`, `payment_type`, `status`, `created_at`, `updated_at`) VALUES
(1, '৩নং তেঁতুলিয়া ইউনিয়ন পরিষদ', 'tetulia', 'www.localhost:8000', 'তেঁতুলিয়া', 'তেঁতুলিয়া', 'পঞ্চগড়', '1636560162.png', '1637226634.png', '1637228215.png', 'কাজী আনিছুর রহমান', '1636560162.jpg', '৩নং তেঁতুলিয়া ইউনিয়ন পরিষদটি তেঁতুলিয়া উপজেলা সদরের প্রাণকেন্দ্রে অবস্থিত। ৩৭টি গ্রাম নিয়ে গঠিত এই ইউনিয়নটির উত্তরে তিরনইহাট, পূর্বে শালবাহান এবং দক্ষিণ ও পশ্চিম পার্শ্বে ভারত সীমান্ত।', 'ইউনিয়ন পরিষদ ডিজিটাল সেবা সিস্টেম সফটওয়্যারের নির্মাণ কাজ চলমান। সাময়িক অসুবিধার জন্য আমরা আন্তরিকভাবে দু:খিত।', '779081', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3570.865057112837!2d88.33814421440648!3d26.49228938444128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e459ed87df315f%3A0xb9a1ec4aeff5a432!2sUpazila%20Parishad%20Complex%2CTetulia%20Panchogar!5e0!3m2!1sen!2sbd!4v1636191662705!5m2!1sen!2sbd', 'green', NULL, 'active', NULL, NULL),
(2, '৯নং টুঙ্গীবাড়িয়া ইউনিয়ন পরিষদ', 'tungibaria', 'www.tungibaria.tmscedu.com', 'টুঙ্গীবাড়িয়া', 'বরিশাল সদর', 'বরিশাল', 'unioninfo/web_logo/1658852872____25073.jpeg', 'unioninfo/sonod_logo/1658861014____85890.png', 'unioninfo/c_signture/1658826018____11700.png', 'নাদিরা রহমান', 'unioninfo/u_image/1658826018____46747.jpeg', '৯নং টুঙ্গীবাড়িয়া ইউনিয়ন পরিষদটি টুঙ্গীবাড়িয়া উপজেলা সদরের প্রাণকেন্দ্রে অবস্থিত। ৩৭টি গ্রাম নিয়ে গঠিত এই ইউনিয়নটির উত্তরে তিরনইহাট, পূর্বে শালবাহান এবং দক্ষিণ ও পশ্চিম পার্শ্বে ভারত সীমান্ত।', 'ইউনিয়ন পরিষদ ডিজিটাল সেবা সিস্টেম সফটওয়্যারের নির্মাণ কাজ চলমান। সাময়িক অসুবিধার জন্য আমরা আন্তরিকভাবে দু:খিত।', '779081', 'freelancernishad123@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d204286.20336899828!2d89.82828219885809!3d22.901786265650895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ffe4212c21b9ab%3A0xeb29242f16cc5381!2sTungipara%20Upazila!5e1!3m2!1sen!2sbd!4v1658904754526!5m2!1sen!2sbd', '#009245', 'Prepaid', 'active', NULL, '2022-08-06 23:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unioun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_unioun_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unioun`, `names`, `email`, `phone`, `email_verified_at`, `password`, `position`, `full_unioun_name`, `gram`, `district`, `thana`, `word`, `description`, `image`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'tungibaria', 'super@gmail.com', 'Secretary@gmail.com', 'super@gmail.com', NULL, '$2y$10$TMMUzTj07CnLmKIvrQTvfu9W.O/8AReFYrJRSx1kHE/JeCzgUJmMC', 'Secretary', 'super@gmail.com', 'super@gmail.com', 'বরিশাল', 'বরিশাল সদর', 'super@gmail.com', NULL, NULL, 'super1@gmail.com', '1', NULL, '2022-07-08 19:53:27', '2022-07-29 21:33:58'),
(3, 'tungibaria', 'super@gmail.com', 'Chairman@gmail.com', 'super@gmail.com', NULL, '$2y$10$TMMUzTj07CnLmKIvrQTvfu9W.O/8AReFYrJRSx1kHE/JeCzgUJmMC', 'Chairman', 'super@gmail.com', 'super@gmail.com', 'বরিশাল', 'বরিশাল সদর', 'super@gmail.com', NULL, NULL, 'super1@gmail.com', '1', NULL, '2022-07-08 19:53:27', '2022-07-29 21:34:06'),
(4, 'tungibaria', 'upzila', 'upzila@gmail.com', '01909756552', NULL, '$2y$10$m9nNyujfLrZVmkfQOVwcReiA0pQi9fl/sssutg1pFfl4aVxXb7MHO', 'Thana_admin', NULL, NULL, 'বরিশাল', 'বরিশাল সদর', NULL, NULL, NULL, NULL, '1', NULL, '2022-07-29 11:06:50', '2022-07-29 11:06:50'),
(5, 'tungibaria', 'নাম2', 'zila@gmail.com', '01909756552', NULL, '$2y$10$TI1oS6Y6avax9v.0yElY4eIxQhhP3JyL4WRr9LuRIQGYQGttDffvm', 'District_admin', NULL, NULL, 'বরিশাল', 'বরিশাল সদর', NULL, NULL, NULL, NULL, '1', NULL, '2022-07-29 11:06:13', '2022-07-29 11:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `union` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `union`, `date`, `year`, `month`, `created_at`, `updated_at`) VALUES
(1, '37.111.223.211', 'tungibaria', '02-08-2022', '2022', 'August', '2022-08-02 16:33:27', '2022-08-02 16:33:27'),
(2, '103.106.239.88', 'tungibaria', '02-08-2022', '2022', 'August', '2022-08-02 16:55:12', '2022-08-02 16:55:12'),
(3, '103.25.250.240', 'tungibaria', '02-08-2022', '2022', 'August', '2022-08-02 17:24:23', '2022-08-02 17:24:23'),
(4, '103.253.44.52', 'tungibaria', '02-08-2022', '2022', 'August', '2022-08-02 19:22:48', '2022-08-02 19:22:48'),
(5, '103.25.251.246', 'tungibaria', '02-08-2022', '2022', 'August', '2022-08-02 22:14:02', '2022-08-02 22:14:02'),
(6, '103.25.248.252', 'tungibaria', '02-08-2022', '2022', 'August', '2022-08-02 22:36:32', '2022-08-02 22:36:32'),
(7, '37.111.223.18', 'tungibaria', '03-08-2022', '2022', 'August', '2022-08-03 10:15:30', '2022-08-03 10:15:30'),
(8, '66.249.82.21', 'tungibaria', '03-08-2022', '2022', 'August', '2022-08-03 15:36:11', '2022-08-03 15:36:11'),
(9, '66.249.82.23', 'tungibaria', '03-08-2022', '2022', 'August', '2022-08-03 15:36:12', '2022-08-03 15:36:12'),
(10, '103.25.249.252', 'tungibaria', '03-08-2022', '2022', 'August', '2022-08-03 16:22:15', '2022-08-03 16:22:15'),
(11, '172.255.48.147', 'tungibaria', '03-08-2022', '2022', 'August', '2022-08-03 17:21:36', '2022-08-03 17:21:36'),
(12, '172.255.48.141', 'tungibaria', '03-08-2022', '2022', 'August', '2022-08-03 17:29:10', '2022-08-03 17:29:10'),
(13, '172.255.48.132', 'tungibaria', '03-08-2022', '2022', 'August', '2022-08-03 17:31:11', '2022-08-03 17:31:11'),
(14, '172.255.48.140', 'tungibaria', '03-08-2022', '2022', 'August', '2022-08-03 17:36:55', '2022-08-03 17:36:55'),
(15, '172.255.48.131', 'tungibaria', '03-08-2022', '2022', 'August', '2022-08-03 18:14:23', '2022-08-03 18:14:23'),
(16, '103.25.248.248', 'tungibaria', '04-08-2022', '2022', 'August', '2022-08-04 10:41:00', '2022-08-04 10:41:00'),
(17, '103.25.251.228', 'tungibaria', '04-08-2022', '2022', 'August', '2022-08-04 10:46:50', '2022-08-04 10:46:50'),
(18, '37.111.222.100', 'tungibaria', '04-08-2022', '2022', 'August', '2022-08-04 11:20:30', '2022-08-04 11:20:30'),
(19, '103.106.239.88', 'tungibaria', '05-08-2022', '2022', 'August', '2022-08-05 02:06:23', '2022-08-05 02:06:23'),
(20, '37.111.223.131', 'tungibaria', '05-08-2022', '2022', 'August', '2022-08-05 02:07:08', '2022-08-05 02:07:08'),
(21, '103.25.248.227', 'tungibaria', '05-08-2022', '2022', 'August', '2022-08-05 19:49:37', '2022-08-05 19:49:37'),
(22, '103.31.154.238', 'tungibaria', '05-08-2022', '2022', 'August', '2022-08-05 20:39:21', '2022-08-05 20:39:21'),
(23, '103.25.249.232', 'tungibaria', '05-08-2022', '2022', 'August', '2022-08-05 20:43:26', '2022-08-05 20:43:26'),
(24, '103.25.249.232', 'tungibaria', '06-08-2022', '2022', 'August', '2022-08-06 00:44:03', '2022-08-06 00:44:03'),
(25, '37.111.222.126', 'tungibaria', '06-08-2022', '2022', 'August', '2022-08-06 01:15:22', '2022-08-06 01:15:22'),
(26, '103.25.248.239', 'tungibaria', '06-08-2022', '2022', 'August', '2022-08-06 12:13:40', '2022-08-06 12:13:40'),
(27, '37.111.223.173', 'tungibaria', '06-08-2022', '2022', 'August', '2022-08-06 13:55:56', '2022-08-06 13:55:56'),
(28, '103.25.251.233', 'tungibaria', '06-08-2022', '2022', 'August', '2022-08-06 22:05:45', '2022-08-06 22:05:45'),
(29, '37.111.223.173', 'tungibaria', '07-08-2022', '2022', 'August', '2022-08-07 00:23:12', '2022-08-07 00:23:12'),
(30, '103.25.251.233', 'tungibaria', '07-08-2022', '2022', 'August', '2022-08-07 01:11:58', '2022-08-07 01:11:58'),
(31, '103.31.154.254', 'tungibaria', '07-08-2022', '2022', 'August', '2022-08-07 10:44:30', '2022-08-07 10:44:30'),
(32, '37.111.220.225', 'tungibaria', '07-08-2022', '2022', 'August', '2022-08-07 12:54:53', '2022-08-07 12:54:53'),
(33, '37.111.238.10', 'tungibaria', '07-08-2022', '2022', 'August', '2022-08-07 14:41:21', '2022-08-07 14:41:21'),
(34, '103.25.248.251', 'tungibaria', '08-08-2022', '2022', 'August', '2022-08-08 00:22:18', '2022-08-08 00:22:18'),
(35, '37.111.222.173', 'tungibaria', '08-08-2022', '2022', 'August', '2022-08-08 10:59:50', '2022-08-08 10:59:50'),
(36, '103.25.248.250', 'tungibaria', '08-08-2022', '2022', 'August', '2022-08-08 11:47:55', '2022-08-08 11:47:55'),
(37, '103.31.154.241', 'tungibaria', '08-08-2022', '2022', 'August', '2022-08-08 12:19:48', '2022-08-08 12:19:48'),
(38, '37.111.222.245', 'tungibaria', '08-08-2022', '2022', 'August', '2022-08-08 13:15:49', '2022-08-08 13:15:49'),
(39, '103.25.251.246', 'tungibaria', '08-08-2022', '2022', 'August', '2022-08-08 13:36:44', '2022-08-08 13:36:44'),
(40, '103.25.251.248', 'tungibaria', '08-08-2022', '2022', 'August', '2022-08-08 14:27:15', '2022-08-08 14:27:15'),
(41, '37.111.223.148', 'tungibaria', '08-08-2022', '2022', 'August', '2022-08-08 15:24:31', '2022-08-08 15:24:31'),
(42, '103.25.251.250', 'tungibaria', '08-08-2022', '2022', 'August', '2022-08-08 18:31:27', '2022-08-08 18:31:27'),
(43, '103.25.249.254', 'tungibaria', '09-08-2022', '2022', 'August', '2022-08-09 11:33:39', '2022-08-09 11:33:39'),
(44, '37.111.244.31', 'tungibaria', '10-08-2022', '2022', 'August', '2022-08-10 00:40:29', '2022-08-10 00:40:29'),
(45, '37.111.226.248', 'tungibaria', '10-08-2022', '2022', 'August', '2022-08-10 11:22:14', '2022-08-10 11:22:14'),
(46, '27.147.166.248', 'tungibaria', '10-08-2022', '2022', 'August', '2022-08-10 12:14:16', '2022-08-10 12:14:16'),
(47, '37.111.228.98', 'tungibaria', '10-08-2022', '2022', 'August', '2022-08-10 12:17:51', '2022-08-10 12:17:51'),
(48, '37.111.229.41', 'tungibaria', '10-08-2022', '2022', 'August', '2022-08-10 12:45:59', '2022-08-10 12:45:59'),
(49, '37.111.242.98', 'tungibaria', '10-08-2022', '2022', 'August', '2022-08-10 18:59:24', '2022-08-10 18:59:24'),
(50, '37.111.243.25', 'tungibaria', '10-08-2022', '2022', 'August', '2022-08-10 20:09:16', '2022-08-10 20:09:16'),
(51, '37.111.244.104', 'tungibaria', '11-08-2022', '2022', 'August', '2022-08-11 00:33:59', '2022-08-11 00:33:59'),
(52, '37.111.248.84', 'tungibaria', '11-08-2022', '2022', 'August', '2022-08-11 01:46:21', '2022-08-11 01:46:21'),
(53, '114.130.180.85', 'tungibaria', '11-08-2022', '2022', 'August', '2022-08-11 12:14:38', '2022-08-11 12:14:38'),
(54, '146.70.106.142', 'tungibaria', '12-08-2022', '2022', 'August', '2022-08-12 20:40:35', '2022-08-12 20:40:35'),
(55, '37.111.248.154', 'tungibaria', '12-08-2022', '2022', 'August', '2022-08-12 22:49:44', '2022-08-12 22:49:44'),
(56, '37.111.220.137', 'tungibaria', '12-08-2022', '2022', 'August', '2022-08-12 23:04:44', '2022-08-12 23:04:44'),
(57, '172.255.48.144', 'tungibaria', '12-08-2022', '2022', 'August', '2022-08-12 23:33:42', '2022-08-12 23:33:42'),
(58, '172.255.48.143', 'tungibaria', '12-08-2022', '2022', 'August', '2022-08-12 23:35:37', '2022-08-12 23:35:37'),
(59, '172.255.48.136', 'tungibaria', '12-08-2022', '2022', 'August', '2022-08-12 23:37:24', '2022-08-12 23:37:24'),
(60, '37.111.248.112', 'tungibaria', '12-08-2022', '2022', 'August', '2022-08-12 23:52:05', '2022-08-12 23:52:05'),
(61, '37.111.248.164', 'tungibaria', '12-08-2022', '2022', 'August', '2022-08-12 23:55:09', '2022-08-12 23:55:09'),
(62, '37.111.220.137', 'tungibaria', '13-08-2022', '2022', 'August', '2022-08-13 07:21:04', '2022-08-13 07:21:04'),
(63, '172.255.48.130', 'tungibaria', '13-08-2022', '2022', 'August', '2022-08-13 07:38:30', '2022-08-13 07:38:30'),
(64, '66.249.82.21', 'tungibaria', '13-08-2022', '2022', 'August', '2022-08-13 07:39:24', '2022-08-13 07:39:24'),
(65, '37.111.232.82', 'tungibaria', '13-08-2022', '2022', 'August', '2022-08-13 11:49:24', '2022-08-13 11:49:24'),
(66, '37.111.248.140', 'tungibaria', '13-08-2022', '2022', 'August', '2022-08-13 13:55:01', '2022-08-13 13:55:01'),
(67, '37.111.222.46', 'tungibaria', '13-08-2022', '2022', 'August', '2022-08-13 19:39:01', '2022-08-13 19:39:01'),
(68, '37.111.226.186', 'tungibaria', '13-08-2022', '2022', 'August', '2022-08-13 22:12:21', '2022-08-13 22:12:21'),
(69, '37.111.222.46', 'tungibaria', '14-08-2022', '2022', 'August', '2022-08-14 11:21:02', '2022-08-14 11:21:02'),
(70, '114.130.180.176', 'tungibaria', '14-08-2022', '2022', 'August', '2022-08-14 11:58:23', '2022-08-14 11:58:23'),
(71, '114.130.180.185', 'tungibaria', '14-08-2022', '2022', 'August', '2022-08-14 12:58:32', '2022-08-14 12:58:32'),
(72, '114.130.180.124', 'tungibaria', '14-08-2022', '2022', 'August', '2022-08-14 13:07:31', '2022-08-14 13:07:31'),
(73, '37.111.223.92', 'tungibaria', '14-08-2022', '2022', 'August', '2022-08-14 13:27:58', '2022-08-14 13:27:58'),
(74, '37.111.248.175', 'tungibaria', '14-08-2022', '2022', 'August', '2022-08-14 14:32:03', '2022-08-14 14:32:03'),
(75, '103.106.239.88', 'tungibaria', '14-08-2022', '2022', 'August', '2022-08-14 14:41:59', '2022-08-14 14:41:59'),
(76, '118.179.57.241', 'tungibaria', '14-08-2022', '2022', 'August', '2022-08-14 14:43:25', '2022-08-14 14:43:25'),
(77, '103.122.44.54', 'tungibaria', '14-08-2022', '2022', 'August', '2022-08-14 14:49:26', '2022-08-14 14:49:26'),
(78, '103.179.55.70', 'tungibaria', '15-08-2022', '2022', 'August', '2022-08-15 12:45:32', '2022-08-15 12:45:32'),
(79, '37.111.222.141', 'tungibaria', '15-08-2022', '2022', 'August', '2022-08-15 12:45:36', '2022-08-15 12:45:36'),
(80, '103.179.55.65', 'tungibaria', '15-08-2022', '2022', 'August', '2022-08-15 12:46:31', '2022-08-15 12:46:31'),
(81, '37.111.246.148', 'tungibaria', '15-08-2022', '2022', 'August', '2022-08-15 12:52:53', '2022-08-15 12:52:53'),
(82, '37.111.243.82', 'tungibaria', '15-08-2022', '2022', 'August', '2022-08-15 19:31:38', '2022-08-15 19:31:38'),
(83, '37.111.246.77', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 11:25:48', '2022-08-16 11:25:48'),
(84, '37.111.222.35', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 11:55:33', '2022-08-16 11:55:33'),
(85, '37.111.246.200', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 14:52:02', '2022-08-16 14:52:02'),
(86, '114.130.180.164', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 16:14:56', '2022-08-16 16:14:56'),
(87, '37.111.245.196', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 16:33:44', '2022-08-16 16:33:44'),
(88, '203.76.223.5', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 16:34:15', '2022-08-16 16:34:15'),
(89, '37.111.246.83', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 18:50:53', '2022-08-16 18:50:53'),
(90, '37.111.232.221', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 21:08:07', '2022-08-16 21:08:07'),
(91, '118.179.63.107', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 23:29:51', '2022-08-16 23:29:51'),
(92, '202.134.14.68', 'tungibaria', '16-08-2022', '2022', 'August', '2022-08-16 23:42:35', '2022-08-16 23:42:35'),
(93, '37.111.222.35', 'tungibaria', '17-08-2022', '2022', 'August', '2022-08-17 00:05:56', '2022-08-17 00:05:56'),
(94, '37.111.246.146', 'tungibaria', '17-08-2022', '2022', 'August', '2022-08-17 01:11:42', '2022-08-17 01:11:42'),
(95, '37.111.246.89', 'tungibaria', '17-08-2022', '2022', 'August', '2022-08-17 13:20:42', '2022-08-17 13:20:42'),
(96, '37.111.222.17', 'tungibaria', '17-08-2022', '2022', 'August', '2022-08-17 13:33:12', '2022-08-17 13:33:12'),
(97, '37.111.222.105', 'tungibaria', '17-08-2022', '2022', 'August', '2022-08-18 03:10:13', '2022-08-18 03:10:13'),
(98, '37.111.223.181', 'tungibaria', '18-08-2022', '2022', 'August', '2022-08-18 18:46:17', '2022-08-18 18:46:17'),
(99, '37.111.242.22', 'tungibaria', '19-08-2022', '2022', 'August', '2022-08-20 01:07:50', '2022-08-20 01:07:50'),
(100, '37.111.222.215', 'tungibaria', '20-08-2022', '2022', 'August', '2022-08-21 03:48:49', '2022-08-21 03:48:49'),
(101, '37.111.222.215', 'tungibaria', '21-08-2022', '2022', 'August', '2022-08-21 04:07:30', '2022-08-21 04:07:30'),
(102, '65.154.226.169', 'tungibaria', '21-08-2022', '2022', 'August', '2022-08-21 04:44:34', '2022-08-21 04:44:34'),
(103, '37.111.222.203', 'tungibaria', '22-08-2022', '2022', 'August', '2022-08-22 20:19:54', '2022-08-22 20:19:54'),
(104, '103.25.251.251', 'tungibaria', '22-08-2022', '2022', 'August', '2022-08-23 03:43:45', '2022-08-23 03:43:45'),
(105, '103.25.251.251', 'tungibaria', '23-08-2022', '2022', 'August', '2022-08-23 04:12:29', '2022-08-23 04:12:29'),
(106, '37.111.222.203', 'tungibaria', '23-08-2022', '2022', 'August', '2022-08-23 15:46:26', '2022-08-23 15:46:26'),
(107, '172.255.48.138', 'tungibaria', '23-08-2022', '2022', 'August', '2022-08-23 15:47:10', '2022-08-23 15:47:10'),
(108, '103.25.250.237', 'tungibaria', '23-08-2022', '2022', 'August', '2022-08-23 23:55:52', '2022-08-23 23:55:52'),
(109, '37.111.223.235', 'tungibaria', '23-08-2022', '2022', 'August', '2022-08-24 01:00:54', '2022-08-24 01:00:54'),
(110, '103.106.239.58', 'tungibaria', '25-08-2022', '2022', 'August', '2022-08-26 03:15:50', '2022-08-26 03:15:50'),
(111, '37.111.223.103', 'tungibaria', '25-08-2022', '2022', 'August', '2022-08-26 03:16:15', '2022-08-26 03:16:15'),
(112, '103.106.239.58', 'tungibaria', '26-08-2022', '2022', 'August', '2022-08-26 04:14:29', '2022-08-26 04:14:29'),
(113, '103.25.249.236', 'tungibaria', '26-08-2022', '2022', 'August', '2022-08-27 01:42:06', '2022-08-27 01:42:06'),
(114, '103.230.107.7', 'tungibaria', '26-08-2022', '2022', 'August', '2022-08-27 03:04:53', '2022-08-27 03:04:53'),
(115, '103.138.25.163', 'tungibaria', '26-08-2022', '2022', 'August', '2022-08-27 03:08:48', '2022-08-27 03:08:48'),
(116, '103.141.175.162', 'tungibaria', '27-08-2022', '2022', 'August', '2022-08-27 22:46:01', '2022-08-27 22:46:01'),
(117, '103.230.104.28', 'tungibaria', '27-08-2022', '2022', 'August', '2022-08-28 03:42:38', '2022-08-28 03:42:38'),
(118, '103.25.248.232', 'tungibaria', '28-08-2022', '2022', 'August', '2022-08-28 04:11:00', '2022-08-28 04:11:00'),
(119, '37.111.222.174', 'tungibaria', '31-08-2022', '2022', 'August', '2022-08-31 15:48:59', '2022-08-31 15:48:59'),
(120, '103.141.175.162', 'tungibaria', '31-08-2022', '2022', 'August', '2022-08-31 18:00:06', '2022-08-31 18:00:06'),
(121, '103.25.249.233', 'tungibaria', '31-08-2022', '2022', 'August', '2022-08-31 23:58:08', '2022-08-31 23:58:08'),
(122, '37.111.222.172', 'tungibaria', '05-09-2022', '2022', 'September', '2022-09-06 02:33:37', '2022-09-06 02:33:37'),
(123, '37.111.222.143', 'tungibaria', '07-09-2022', '2022', 'September', '2022-09-07 04:07:24', '2022-09-07 04:07:24'),
(124, '37.111.223.116', 'tungibaria', '07-09-2022', '2022', 'September', '2022-09-07 23:34:36', '2022-09-07 23:34:36'),
(125, '37.111.223.100', 'tungibaria', '08-09-2022', '2022', 'September', '2022-09-08 20:55:23', '2022-09-08 20:55:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_logs`
--
ALTER TABLE `action_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charages`
--
ALTER TABLE `charages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sonodnamelists`
--
ALTER TABLE `sonodnamelists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bnname` (`bnname`,`enname`);

--
-- Indexes for table `sonods`
--
ALTER TABLE `sonods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uniouninfos`
--
ALTER TABLE `uniouninfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_logs`
--
ALTER TABLE `action_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charages`
--
ALTER TABLE `charages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `citizens`
--
ALTER TABLE `citizens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sonodnamelists`
--
ALTER TABLE `sonodnamelists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sonods`
--
ALTER TABLE `sonods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uniouninfos`
--
ALTER TABLE `uniouninfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
