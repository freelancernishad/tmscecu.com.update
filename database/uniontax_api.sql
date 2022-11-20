-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 09:31 PM
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
('0126ee550e29a4d799915054bf075dcc72d22a375ed02d54f200bc9259b3c190c2e098bbff36eb49', 2, 1, 'accessToken', '[]', 0, '2022-07-14 05:36:07', '2022-07-14 05:36:07', '2023-07-14 11:36:07'),
('06887c161023dd338ff6ec472312d9fd42a941327321530b7cffa8aad5531215055f602604084c6f', 2, 1, 'accessToken', '[]', 0, '2022-07-25 18:23:06', '2022-07-25 18:23:06', '2023-07-26 00:23:06'),
('0adfc9cd87aa81391d92abbd1a776d23d116804517ae48b1c508b37c5f63bb58bdb21044138f7744', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:17:33', '2022-07-12 18:17:33', '2023-07-13 00:17:33'),
('13846cd0260c61017fab9ce6ddaa48be2cf7851b14619931e9541bdf7df8d2c38e8838360b54d6d8', 2, 1, 'accessToken', '[]', 0, '2022-07-14 06:35:44', '2022-07-14 06:35:44', '2023-07-14 12:35:44'),
('13d9b9030b9dce38c9485e9c036818de1147680a6faa46439e1f7f65ee792a4de7d9d40d43c0ef78', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:04:42', '2022-07-12 18:04:42', '2023-07-13 00:04:42'),
('18e21d9a36aaa77fb24067cafcf82dd4df1387388f3e9b6314bcc6e6809febb45c53a72ee9afe08c', 3, 1, 'accessToken', '[]', 0, '2022-07-22 16:13:01', '2022-07-22 16:13:01', '2023-07-22 22:13:01'),
('19c362a7da7e29fc625058af5745a099b639b3afc4f8a1e87e88fae24994926d83ddcca00636231d', 2, 1, 'accessToken', '[]', 0, '2022-07-22 14:24:03', '2022-07-22 14:24:03', '2023-07-22 20:24:03'),
('1b136885c385e1a0e813a6ff267b9b22b18b09315672a75cce197a91f84d228637cc9c7e3d0c5308', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:16:56', '2022-07-12 18:16:56', '2023-07-13 00:16:56'),
('1e4eb0b241170f6cae811ffb0cd08133735724f16cfe095ad7dbf54100c1ecb82287a04708993251', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:14:17', '2022-07-12 18:14:17', '2023-07-13 00:14:17'),
('24bfe0e94add9a022b929ea92a4a87e459d15e26568764326b71cf99bce0cffbb3f21159ebb7ccfa', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:19:47', '2022-07-12 18:19:47', '2023-07-13 00:19:47'),
('261d3ed8b968c7f395a5047ad7aff9f315755aaaaabad3e46a73552354659e4005888509b3eda240', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:12:06', '2022-07-12 18:12:06', '2023-07-13 00:12:06'),
('26c85dddd359abcf990cc7270e7e9cb46eb6cdb76836f06dc509550f4ab546a60b3fa65a3b1cc3f1', 1, 1, 'accessToken', '[]', 0, '2022-07-08 19:55:37', '2022-07-08 19:55:37', '2023-07-09 01:55:37'),
('28dfaf2b918ee03867a1d2d43de9e19d0a03d2a0067b39a04acef020842e85aa108135ef80d1c2cd', 3, 1, 'accessToken', '[]', 0, '2022-07-16 08:14:18', '2022-07-16 08:14:18', '2023-07-16 14:14:18'),
('28ea192b4ac0ec68ced14c951e5335934da472b03214bfda173c6c2029b9dd3827411d3345098513', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:02:43', '2022-07-12 18:02:43', '2023-07-13 00:02:43'),
('2dd5050ebd66f5b4a273631becad8018dfa0dd9a15f5e295bafd87d83f4a25f8d0cab1fb071ffb48', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:11:38', '2022-07-12 18:11:38', '2023-07-13 00:11:38'),
('32b6ff52c76beef0b026790284448dc3db875619b346f4f0a6f7110607312b81560644643976c886', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:37:12', '2022-07-12 18:37:12', '2023-07-13 00:37:12'),
('348dfbf710f4df744e6e48851e6cd0637e4aa7856cf4ba71370a34d4d2cc8fb70915a6379e5b9145', 2, 1, 'accessToken', '[]', 0, '2022-07-22 16:14:46', '2022-07-22 16:14:46', '2023-07-22 22:14:46'),
('3fbc7b442c26845880d9be6998427f23819e45bb2de6f4ab67ba9a3421ddf99ffe5a32e3882b98d7', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:06:11', '2022-07-12 18:06:11', '2023-07-13 00:06:11'),
('476a467c40bd7b54b1172f81f73d67573198e04a1b125fde19082d8a24b69bcd311a1fd6a9c9b6fd', 3, 1, 'accessToken', '[]', 0, '2022-07-16 08:10:20', '2022-07-16 08:10:20', '2023-07-16 14:10:20'),
('49704adf7e8631394bbfc209a1cc52b80b40766a5adb357fcd109d08ad8f1e28a3a5b5ef105b0db2', 2, 1, 'accessToken', '[]', 0, '2022-07-26 16:39:04', '2022-07-26 16:39:04', '2023-07-26 22:39:04'),
('4dbc01655efd775856b2aa997fd17ae3bae9a27ccd66c4dacedda7873e43dbfff8a675f9433018b0', 3, 1, 'accessToken', '[]', 0, '2022-07-26 15:56:47', '2022-07-26 15:56:47', '2023-07-26 21:56:47'),
('539ccb68f0a3e7cb9a62c70534a52aa413ec60928ea525342fd5cbcf4b2ac0ad8bc1f39d2d4cf442', 3, 1, 'accessToken', '[]', 0, '2022-07-26 11:47:25', '2022-07-26 11:47:25', '2023-07-26 17:47:25'),
('554227e02e34d47ba94f8b613f3cf661c3e3de74b2aa61d50db03dedfdabfc006f47e1fa925618ca', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:10:11', '2022-07-12 18:10:11', '2023-07-13 00:10:11'),
('589d972cf2386fa92e6ce5e0bb4cc2b1aa384439798e701924795b3444d592c7315c798882ee3c7e', 3, 1, 'accessToken', '[]', 0, '2022-07-15 05:39:35', '2022-07-15 05:39:35', '2023-07-15 11:39:35'),
('60441682696e1f54cf0efce329146e7fdd39936ade34299392ee02c3182bb0a7ff866785c86bd971', 1, 1, 'accessToken', '[]', 0, '2022-07-10 13:50:03', '2022-07-10 13:50:03', '2023-07-10 19:50:03'),
('623c56d96db6de032e93f516671c7ecfb43e888121a458dc61123beec85ffb8a67c2733fa0f3ea2b', 2, 1, 'accessToken', '[]', 0, '2022-07-26 15:56:16', '2022-07-26 15:56:16', '2023-07-26 21:56:16'),
('659b2cd90e6ac8600579e120c7f7bd1629ca0e57b7bdebfd9dcc5c06ea571b1acecd1fa0ccbbf23d', 2, 1, 'accessToken', '[]', 0, '2022-07-22 16:28:20', '2022-07-22 16:28:20', '2023-07-22 22:28:20'),
('65a05fcc698729d33c4bfb0314e126ce357e78ca0e5b5cd5188e0ffe93a076958c1782df80f5760f', 1, 1, 'accessToken', '[]', 0, '2022-07-12 15:55:17', '2022-07-12 15:55:17', '2023-07-12 21:55:17'),
('71f4b8276d6e6ca5b266802a132a16a80546d354a8edc5294e05072d89081fa30db4fdbf7d7d17fd', 1, 1, 'accessToken', '[]', 0, '2022-07-09 02:39:19', '2022-07-09 02:39:19', '2023-07-09 08:39:19'),
('79b3572537e44d6b656d18ea9f3e85bfc2e0909cce75b6668c8e59fd898da2107a905707fcd1508d', 3, 1, 'accessToken', '[]', 0, '2022-07-12 18:22:40', '2022-07-12 18:22:40', '2023-07-13 00:22:40'),
('7b81b3270e39877698e298008c4f52653c0cf26f7c5b5e550f331e1789e188a1bad7c266716a78c6', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:13:16', '2022-07-12 18:13:16', '2023-07-13 00:13:16'),
('7f8970fb2daa90e6f0b754b80692aaf0aec398c67ca5465811068e8b673dbb39faabe725206ac1e7', 2, 1, 'accessToken', '[]', 0, '2022-07-24 17:07:44', '2022-07-24 17:07:44', '2023-07-24 23:07:44'),
('7f94da3147982e1e9fbf5b79761e5c16fe0c42c677979d2d2ad5108f5064e60d6c39a7d24d9c29dc', 2, 1, 'accessToken', '[]', 0, '2022-07-24 17:14:31', '2022-07-24 17:14:31', '2023-07-24 23:14:31'),
('807ea28c2a226095e8586fcf6eea147264425b73797e6076578dbd74316a9d6afe27863b68f08298', 2, 1, 'accessToken', '[]', 0, '2022-07-15 05:34:35', '2022-07-15 05:34:35', '2023-07-15 11:34:35'),
('80bdc914b75d9b6a4c324057d7304a6de9885b2e9643a9e61edcad4bf3d6e4162e4c63058c30d788', 3, 1, 'accessToken', '[]', 0, '2022-07-26 08:02:15', '2022-07-26 08:02:15', '2023-07-26 14:02:15'),
('8102ad8028cf235d2a283c664f64400b7125c22926e12a39c2403d2079223ccc660b2a6c0368f849', 3, 1, 'accessToken', '[]', 0, '2022-07-16 08:17:32', '2022-07-16 08:17:32', '2023-07-16 14:17:32'),
('821131f345db1c93386a3237a907f7cae17a8517a40212160ab0f8f0ef9665652f8371c02080c20d', 3, 1, 'accessToken', '[]', 0, '2022-07-24 17:13:13', '2022-07-24 17:13:13', '2023-07-24 23:13:13'),
('8c14c55b239a9b020ff061d5119729cdbf63f4c255d69df4988a904ebb0b270f12aa49bdad49bae0', 2, 1, 'accessToken', '[]', 0, '2022-07-15 05:47:51', '2022-07-15 05:47:51', '2023-07-15 11:47:51'),
('8ff18b9530e6bacc62a9c3f5780ccda2b5bf8444c36b239a47f6f0da61c0a8723fdf0be08ac5e46d', 3, 1, 'accessToken', '[]', 0, '2022-07-26 19:08:44', '2022-07-26 19:08:44', '2023-07-27 01:08:44'),
('9065eb08da82cf2ee553d07114786cc97fa98e61af0158ea0ab273aff1064993556704185210dfbe', 3, 1, 'accessToken', '[]', 0, '2022-07-12 18:38:34', '2022-07-12 18:38:34', '2023-07-13 00:38:34'),
('91fb4aab4720f94236d5101dedaa8076fc4808a34caffefd479f9d8217813a034c5f8fa986ef24ce', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:14:27', '2022-07-12 18:14:27', '2023-07-13 00:14:27'),
('9210250beff3e49937d10e403958fa86d5d82f42d07b348ac40cb77745c80b59bc309b58027d3fc3', 2, 1, 'accessToken', '[]', 0, '2022-07-16 08:14:35', '2022-07-16 08:14:35', '2023-07-16 14:14:35'),
('9a28e0dddee49a356644bfa8b0b5f3bf96a6c587443e54a8335dfc953c29522858268a124e7b695f', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:14:06', '2022-07-12 18:14:06', '2023-07-13 00:14:06'),
('a06c70861c1a56599460abbca6e1207ec40b3896d772928986f5f2b08753d905e6225e8c2aa92cd4', 2, 1, 'accessToken', '[]', 0, '2022-07-16 08:10:40', '2022-07-16 08:10:40', '2023-07-16 14:10:40'),
('bc85b262a2f206e50cdbb47d259f116cfcc51039955a6ab86754d1966ad99ca24e361f05822b367a', 3, 1, 'accessToken', '[]', 0, '2022-07-26 16:39:32', '2022-07-26 16:39:32', '2023-07-26 22:39:32'),
('c307376fbdb7baeceb500c7c7d4d6ba255c03e0188c33e4bf24ac8b02c95a3e5a7531e5fe8b824d2', 2, 1, 'accessToken', '[]', 0, '2022-07-26 08:01:32', '2022-07-26 08:01:32', '2023-07-26 14:01:32'),
('c516367b7d56011867f5422c945c078c1dd3b8c311a7589bbcff2c685c5a39de2926973b9e8f6f4a', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:19:14', '2022-07-12 18:19:14', '2023-07-13 00:19:14'),
('c6a663585ad2c98eb87213d2195f248fb5d38d80949dff7789befd82cf8ab67ea5b35be9d003c718', 2, 1, 'accessToken', '[]', 0, '2022-07-15 06:07:47', '2022-07-15 06:07:47', '2023-07-15 12:07:47'),
('c839fea69c36466673b30949694386471be5cd95bce90672c18289752634dfe69538386168c9aeae', 1, 1, 'accessToken', '[]', 0, '2022-07-11 16:30:47', '2022-07-11 16:30:47', '2023-07-11 22:30:47'),
('cb1907141edabad62047fc66242e2aa00fd0b0e90974543878ca36a0d59dcca7297b51117c2cb809', 2, 1, 'accessToken', '[]', 0, '2022-07-16 08:17:48', '2022-07-16 08:17:48', '2023-07-16 14:17:48'),
('cc2328fb83ff32eb4dc9c63064e2d51c507a5f4f209c1e34df77d3434cf4aafcde4b4e3560ffe090', 2, 1, 'accessToken', '[]', 0, '2022-07-16 07:39:31', '2022-07-16 07:39:31', '2023-07-16 13:39:31'),
('cde7cecce913774a0e6786311c865704cefd45d9b2a87b66d71f23ad60e978dc03b9f42a577f7303', 2, 1, 'accessToken', '[]', 0, '2022-07-24 08:41:13', '2022-07-24 08:41:13', '2023-07-24 14:41:13'),
('d41df7036e055e38b45480e0e352fa340758e9190e0de2a8b3bb569b93a32c1220c6959c021b40f6', 1, 1, 'accessToken', '[]', 0, '2022-07-11 05:52:34', '2022-07-11 05:52:34', '2023-07-11 11:52:34'),
('d94104d3c0a5ba12fb0913c5925466499dfc4c36813e0a7acf27c532b7ddffb41da9c0373886920b', 3, 1, 'accessToken', '[]', 0, '2022-07-15 06:07:26', '2022-07-15 06:07:26', '2023-07-15 12:07:26'),
('e3816e524a815a828c60be35e7cc78a96be4c91855e5630e42b652a63322e6b861a06e8ef51425f7', 1, 1, 'accessToken', '[]', 0, '2022-07-09 16:55:53', '2022-07-09 16:55:53', '2023-07-09 22:55:53'),
('e482cd8e7b781e61437cb1af9d8bba51449f602887683f084184f84d3c8732beb87e403cdc48f273', 2, 1, 'accessToken', '[]', 0, '2022-07-16 09:30:15', '2022-07-16 09:30:15', '2023-07-16 15:30:15'),
('ea8de71f6e9a6445ac22309b18984b11ad4f36645d2c3379ec7e37f3238441f0bb2642ad160892a6', 2, 1, 'accessToken', '[]', 0, '2022-07-26 19:09:14', '2022-07-26 19:09:14', '2023-07-27 01:09:14'),
('eb384325a6f387f75be437b5c2c1b8380c4d38957d930e6c4d1bc9a36259efd9fd7628a5fb971ec9', 2, 1, 'accessToken', '[]', 0, '2022-07-26 08:02:42', '2022-07-26 08:02:42', '2023-07-26 14:02:42'),
('ee218de520b6e6b0b6a2595cc8567ec8e0c93836482d84e59d13c332518fc77c979cdacd59414dc3', 3, 1, 'accessToken', '[]', 0, '2022-07-22 16:27:53', '2022-07-22 16:27:53', '2023-07-22 22:27:53'),
('f31691587c177f7db554ffd27f647a8b8416803b4e7093b42f77e94ecf4807f5b44f580388ef8f00', 2, 1, 'accessToken', '[]', 0, '2022-07-26 18:42:56', '2022-07-26 18:42:56', '2023-07-27 00:42:56'),
('f788a8d99639aa376fe9571e582fb1c50bb41e9c75ff919029019081386f8f32cb4fd6e34b4d4c28', 2, 1, 'accessToken', '[]', 0, '2022-07-12 18:44:50', '2022-07-12 18:44:50', '2023-07-13 00:44:50'),
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
(2, 'tepriganj', '1658862621', '3', 'নাগরিকত্ব সনদ', '200', NULL, 'Paid', '2022-07-26 19:10:21', '2022-07-26 19:11:54');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sonodnamelists`
--

INSERT INTO `sonodnamelists` (`id`, `bnname`, `enname`, `icon`, `template`, `created_at`, `updated_at`) VALUES
(1, 'নাগরিকত্ব সনদ', 'Citizenship certificate', '/assets/img/pic-01.png', 'তাকে আমি ব্যক্তিগতভাবে চিনি ও জানি। সে জন্মসূত্রে বাংলাদেশের নাগরিক এবং অত্র ইউনিয়ন পরিষদের স্থায়ী বাসিন্দা। আমার জানামতে তারবিরুদ্ধে রাষ্ট্রদ্রোহিতার অভিযোগ নেই।<br><br>&nbsp; &nbsp; &nbsp; আমি তার ভবিষ্যৎ জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল কামনা করি।', NULL, NULL),
(2, 'ট্রেড লাইসেন্স', 'Trade license', '/assets/img/pic-04.png', NULL, NULL, NULL),
(3, 'ওয়ারিশ সনদ', 'Certificate of Inheritance', '/assets/img/pic-02.png', NULL, NULL, NULL),
(4, 'উত্তরাধিকারী সনদ', 'Inheritance certificate', NULL, NULL, NULL, NULL),
(5, 'বিবিধ প্রত্যয়নপত্র', 'Miscellaneous certificates', '/assets/img/pic-06.png', NULL, NULL, NULL),
(6, 'চারিত্রিক সনদ', 'Certificate of Character', '/assets/img/pic-03.png', NULL, NULL, NULL),
(7, 'ভূমিহীন সনদ', 'Landless certificate', '/assets/img/pic-05.png', NULL, NULL, NULL),
(8, 'পারবারিক সনদ', 'Family certificate', '/assets/img/pic-01.png', NULL, NULL, NULL),
(9, 'অবিবাহিত সনদ', 'Unmarried certificate', '/assets/img/pic-06.png', NULL, NULL, NULL),
(10, 'পুনঃ বিবাহ না হওয়া সনদ', 'Certificate of not remarrying', '/assets/img/pic-09.png', NULL, NULL, NULL),
(11, 'বার্ষিক আয়ের প্রত্যয়ন', 'Certificate of annual income', '/assets/img/pic-11.png', NULL, NULL, NULL),
(12, 'একই নামের প্রত্যয়ন', 'Certification of the same name', '/assets/img/pic-08.png', NULL, NULL, NULL),
(13, 'অনুমতি পত্রের আবেদন', 'Application for permit', NULL, NULL, NULL, NULL),
(14, 'প্রতিবন্ধী আবেদন', 'Disability application', '/assets/img/pic-07.png', NULL, NULL, NULL),
(15, 'অনাপত্তি সনদপত্র', 'Certificate of No Objection', NULL, NULL, NULL, NULL),
(16, 'অগভীর নলকূপ স্থাপন', 'Shallow tube well installation', '/assets/img/Untitled-1-12.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sonods`
--

CREATE TABLE `sonods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unioun_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sonod_Id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `successor_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `stutus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chaireman_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chaireman_sign` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sonods`
--

INSERT INTO `sonods` (`id`, `unioun_name`, `year`, `sonod_Id`, `image`, `sonod_name`, `successor_father_name`, `successor_mother_name`, `successor_father_alive_status`, `successor_mother_alive_status`, `applicant_holding_tax_number`, `applicant_national_id_number`, `applicant_birth_certificate_number`, `applicant_passport_number`, `applicant_date_of_birth`, `applicant_owner_type`, `applicant_name_of_the_organization`, `applicant_name`, `utname`, `applicant_gender`, `applicant_marriage_status`, `applicant_vat_id_number`, `applicant_tax_id_number`, `applicant_type_of_business`, `applicant_father_name`, `applicant_mother_name`, `applicant_occupation`, `applicant_education`, `applicant_religion`, `applicant_resident_status`, `applicant_present_village`, `applicant_present_road_block_sector`, `applicant_present_word_number`, `applicant_present_district`, `applicant_present_Upazila`, `applicant_present_post_office`, `applicant_permanent_village`, `applicant_permanent_road_block_sector`, `applicant_permanent_word_number`, `applicant_permanent_district`, `applicant_permanent_Upazila`, `applicant_permanent_post_office`, `successor_list`, `khat`, `last_years_money`, `currently_paid_money`, `total_amount`, `amount_deails`, `the_amount_of_money_in_words`, `applicant_mobile`, `applicant_email`, `applicant_phone`, `applicant_national_id_front_attachment`, `applicant_national_id_back_attachment`, `applicant_birth_certificate_attachment`, `stutus`, `payment_status`, `chaireman_name`, `chaireman_sign`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tepriganj', '2022', '7790812200001', 'sonod/Citizenship_certificate/image/1658850791____79609.png', 'নাগরিকত্ব সনদ', NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', '456456', '11216546464646', '46456456', 'dsfdsf', '2022-07-26', NULL, NULL, 'আবেদনকারীর নাম*', NULL, 'পুরুষ', 'অবিবাহিত', NULL, NULL, NULL, 'মোঃ জয়নাল আবেদিন', 'আবেদনকারীর মাতার নাম (বাংলায়)', 'পেশা', 'sdfsdf', 'ইসলাম', 'স্থায়ী', 'গ্রাম/মহল্লা', 'রোড/ব্লক/সেক্টর', 'sdfsd', 'পঞ্চগড়', 'দেবীগঞ্জ', 'টেপ্রীগঞ্জ', 'গ্রাম/মহল্লা', 'রোড/ব্লক/সেক্টর', 'sdfsd', 'পঞ্চগড়', 'দেবীগঞ্জ', 'টেপ্রীগঞ্জ', '[{\"w_id\":null,\"w_name\":null,\"w_relation\":null,\"w_age\":null,\"w_nid\":null}]', 'বসতবাড়ীর বাৎসরিক মূল্যের উপর কর', '100', '100', '200', '{\"total_amount\":200,\"pesaKor\":null,\"tredeLisenceFee\":null,\"vatAykor\":null,\"khat\":\"\\u09ac\\u09b8\\u09a4\\u09ac\\u09be\\u09dc\\u09c0\\u09b0 \\u09ac\\u09be\\u09ce\\u09b8\\u09b0\\u09bf\\u0995 \\u09ae\\u09c2\\u09b2\\u09cd\\u09af\\u09c7\\u09b0 \\u0989\\u09aa\\u09b0 \\u0995\\u09b0\",\"last_years_money\":\"100\",\"currently_paid_money\":\"100\"}', 'দুই শত  টাকা  মাত্র', '01909756552', NULL, NULL, NULL, NULL, NULL, 'approved', 'Paid', 'কাজী আনিছুর রহমান', 'unioninfo/c_signture/1658826018____11700.png', '2022-07-26 15:53:11', '2022-07-26 16:15:52', NULL),
(2, 'tepriganj', '2022', '7790812200002', NULL, 'নাগরিকত্ব সনদ', NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', '456456', '11216546464646', '46456456', NULL, '2022-07-26', NULL, NULL, 'আবেদনকারীর নাম*', NULL, 'পুরুষ', 'অবিবাহিত', NULL, NULL, NULL, 'মোঃ জয়নাল আবেদিন', 'আবেদনকারীর মাতার নাম (বাংলায়)', NULL, NULL, NULL, 'স্থায়ী', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"w_id\":null,\"w_name\":null,\"w_relation\":null,\"w_age\":null,\"w_nid\":null}]', 'বসতবাড়ীর বাৎসরিক মূল্যের উপর কর', '100', '50', '150', '{\"total_amount\":150,\"pesaKor\":null,\"tredeLisenceFee\":null,\"vatAykor\":null,\"khat\":\"\\u09ac\\u09b8\\u09a4\\u09ac\\u09be\\u09dc\\u09c0\\u09b0 \\u09ac\\u09be\\u09ce\\u09b8\\u09b0\\u09bf\\u0995 \\u09ae\\u09c2\\u09b2\\u09cd\\u09af\\u09c7\\u09b0 \\u0989\\u09aa\\u09b0 \\u0995\\u09b0\",\"last_years_money\":\"100\",\"currently_paid_money\":\"50\"}', 'এক শত পঞ্চাশ টাকা  মাত্র', '01703658487', NULL, NULL, NULL, NULL, NULL, 'approved', 'Unpaid', 'কাজী আনিছুর রহমান', 'unioninfo/c_signture/1658826018____11700.png', '2022-07-26 16:38:02', '2022-07-26 16:40:02', NULL),
(3, 'tepriganj', '2022', '7790812200003', 'sonod/Citizenship_certificate/image/1658862388____81201.png', 'নাগরিকত্ব সনদ', NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', '456456', '11216546464646', '46456456', 'dsfdsf', '2001-08-25', NULL, NULL, 'সৈয়দ শাহরিয়ার আরাফাত', NULL, 'পুরুষ', 'অবিবাহিত', NULL, NULL, NULL, 'সৈয়দ মোস্তফা কামাল', 'ফাতেমা বেগম', 'পেশা', 'sdfsdf', 'ইসলাম', 'স্থায়ী', 'ধোপাকাঠী', NULL, '৯', 'বরিশাল', 'বরিশাল সদর', 'পতাং', 'ধোপাকাঠী', NULL, '৯', 'বরিশাল', 'বরিশাল সদর', 'পতাং', '[{\"w_id\":null,\"w_name\":null,\"w_relation\":null,\"w_age\":null,\"w_nid\":null}]', 'বসতবাড়ীর বাৎসরিক মূল্যের উপর কর', '100', '100', '200', '{\"total_amount\":200,\"pesaKor\":null,\"tredeLisenceFee\":null,\"vatAykor\":null,\"khat\":\"\\u09ac\\u09b8\\u09a4\\u09ac\\u09be\\u09dc\\u09c0\\u09b0 \\u09ac\\u09be\\u09ce\\u09b8\\u09b0\\u09bf\\u0995 \\u09ae\\u09c2\\u09b2\\u09cd\\u09af\\u09c7\\u09b0 \\u0989\\u09aa\\u09b0 \\u0995\\u09b0\",\"last_years_money\":\"100\",\"currently_paid_money\":\"100\"}', 'দুই শত  টাকা  মাত্র', '01703658487', NULL, NULL, NULL, NULL, NULL, 'approved', 'Paid', 'নাদিরা রহমান', 'unioninfo/c_signture/1658826018____11700.png', '2022-07-26 19:06:28', '2022-07-26 19:11:54', NULL);

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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uniouninfos`
--

INSERT INTO `uniouninfos` (`id`, `full_name`, `short_name_e`, `domain`, `short_name_b`, `thana`, `district`, `web_logo`, `sonod_logo`, `c_signture`, `c_name`, `u_image`, `u_description`, `u_notice`, `u_code`, `contact_email`, `google_map`, `defaultColor`, `status`, `created_at`, `updated_at`) VALUES
(1, '৩নং তেঁতুলিয়া ইউনিয়ন পরিষদ', 'tetulia', 'www.localhost:8000', 'তেঁতুলিয়া', 'তেঁতুলিয়া', 'পঞ্চগড়', '1636560162.png', '1637226634.png', '1637228215.png', 'কাজী আনিছুর রহমান', '1636560162.jpg', '৩নং তেঁতুলিয়া ইউনিয়ন পরিষদটি তেঁতুলিয়া উপজেলা সদরের প্রাণকেন্দ্রে অবস্থিত। ৩৭টি গ্রাম নিয়ে গঠিত এই ইউনিয়নটির উত্তরে তিরনইহাট, পূর্বে শালবাহান এবং দক্ষিণ ও পশ্চিম পার্শ্বে ভারত সীমান্ত।', 'ইউনিয়ন পরিষদ ডিজিটাল সেবা সিস্টেম সফটওয়্যারের নির্মাণ কাজ চলমান। সাময়িক অসুবিধার জন্য আমরা আন্তরিকভাবে দু:খিত।', '779081', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3570.865057112837!2d88.33814421440648!3d26.49228938444128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e459ed87df315f%3A0xb9a1ec4aeff5a432!2sUpazila%20Parishad%20Complex%2CTetulia%20Panchogar!5e0!3m2!1sen!2sbd!4v1636191662705!5m2!1sen!2sbd', 'green', 'active', NULL, NULL),
(2, '৯নং টুঙ্গীবাড়িয়া ইউনিয়ন পরিষদ', 'tepriganj', 'www.localhost:8000', 'টুঙ্গীবাড়িয়া', 'বরিশাল সদর', 'বরিশাল', 'unioninfo/web_logo/1658852872____25073.jpeg', 'unioninfo/sonod_logo/1658861014____85890.png', 'unioninfo/c_signture/1658826018____11700.png', 'নাদিরা রহমান', 'unioninfo/u_image/1658826018____46747.jpeg', '৯নং টুঙ্গীবাড়িয়া ইউনিয়ন পরিষদটি টুঙ্গীবাড়িয়া উপজেলা সদরের প্রাণকেন্দ্রে অবস্থিত। ৩৭টি গ্রাম নিয়ে গঠিত এই ইউনিয়নটির উত্তরে তিরনইহাট, পূর্বে শালবাহান এবং দক্ষিণ ও পশ্চিম পার্শ্বে ভারত সীমান্ত।', 'ইউনিয়ন পরিষদ ডিজিটাল সেবা সিস্টেম সফটওয়্যারের নির্মাণ কাজ চলমান। সাময়িক অসুবিধার জন্য আমরা আন্তরিকভাবে দু:খিত।', '779081', 'freelancernishad123@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3570.865057112837!2d88.33814421440648!3d26.49228938444128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e459ed87df315f%3A0xb9a1ec4aeff5a432!2sUpazila%20Parishad%20Complex%2CTetulia%20Panchogar!5e0!3m2!1sen!2sbd!4v1636191662705!5m2!1sen!2sbd', '#009245', 'active', NULL, '2022-07-26 18:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unioun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_unioun_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `unioun`, `name`, `email`, `phone`, `email_verified_at`, `password`, `position`, `full_unioun_name`, `gram`, `word`, `description`, `image`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tepriganj', 'super@gmail.com', 'super1@gmail.com', 'super@gmail.com', NULL, '$2y$10$TMMUzTj07CnLmKIvrQTvfu9W.O/8AReFYrJRSx1kHE/JeCzgUJmMC', 'super-admin', 'super@gmail.com', 'super@gmail.com', 'super@gmail.com', NULL, NULL, 'super1@gmail.com', '1', NULL, '2022-07-08 19:53:27', '2022-07-08 19:53:27'),
(2, 'tepriganj', 'super@gmail.com', 'Secretary@gmail.com', 'super@gmail.com', NULL, '$2y$10$TMMUzTj07CnLmKIvrQTvfu9W.O/8AReFYrJRSx1kHE/JeCzgUJmMC', 'Secretary', 'super@gmail.com', 'super@gmail.com', 'super@gmail.com', NULL, NULL, 'super1@gmail.com', '1', NULL, '2022-07-08 19:53:27', '2022-07-08 19:53:27'),
(3, 'tepriganj', 'super@gmail.com', 'Chairman@gmail.com', 'super@gmail.com', NULL, '$2y$10$TMMUzTj07CnLmKIvrQTvfu9W.O/8AReFYrJRSx1kHE/JeCzgUJmMC', 'Chairman', 'super@gmail.com', 'super@gmail.com', 'super@gmail.com', NULL, NULL, 'super1@gmail.com', '1', NULL, '2022-07-08 19:53:27', '2022-07-08 19:53:27');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sonods`
--
ALTER TABLE `sonods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uniouninfos`
--
ALTER TABLE `uniouninfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
