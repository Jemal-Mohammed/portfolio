-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 02:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `Fname`, `Lname`, `email`, `role`, `password`, `created_at`, `updated_at`, `image`, `phone`) VALUES
(1, 'Yasin', '1', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-09-09 20:49:34', 'storage/images/images1662731374.png', '0955851478');

-- --------------------------------------------------------

--
-- Table structure for table `appllies`
--

CREATE TABLE `appllies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sup_id` bigint(20) UNSIGNED NOT NULL,
  `stud_id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unassigned',
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appllies`
--

INSERT INTO `appllies` (`id`, `sup_id`, `stud_id`, `position_id`, `department_id`, `status`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'assigned', 'yes', '2022-08-26 10:37:25', '2022-08-26 10:37:44'),
(2, 1, 1, 2, 1, 'accepted', 'no', '2022-08-26 10:37:29', '2022-08-26 10:42:44'),
(3, 1, 3, 1, 2, 'accepted', 'yes', '2022-08-27 02:02:28', '2022-08-27 02:37:53'),
(4, 1, 4, 2, 1, 'unassigned', 'No', '2022-08-27 02:55:01', '2022-08-27 03:09:45'),
(5, 1, 5, 1, 1, 'assigned', 'yes', '2022-08-27 14:21:42', '2022-08-27 14:28:27'),
(6, 5, 1, 3, 1, 'unassigned', 'no', '2022-09-04 02:41:19', '2022-09-04 02:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `carrers`
--

CREATE TABLE `carrers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carrers`
--

INSERT INTO `carrers` (`id`, `companyName`, `title`, `address`, `city`, `salery`, `sup_id`, `created_at`, `updated_at`) VALUES
(1, 'Schneider and Higgins Inc', 'Warner and Fernandez Associates', 'bucikop@mailinator.com', 'Consequatur reiciend', 'Aut dolore perferend', 1, '2022-08-26 09:40:08', '2022-08-26 09:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `carrer_applies`
--

CREATE TABLE `carrer_applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sup_id` bigint(20) UNSIGNED NOT NULL,
  `stud_id` bigint(20) UNSIGNED NOT NULL,
  `carrer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carrer_applies`
--

INSERT INTO `carrer_applies` (`id`, `sup_id`, `stud_id`, `carrer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-08-26 10:56:49', '2022-08-26 10:56:49'),
(2, 1, 3, 1, '2022-08-27 02:02:39', '2022-08-27 02:02:39'),
(3, 1, 5, 1, '2022-08-29 15:01:49', '2022-08-29 15:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stud_id` bigint(20) UNSIGNED NOT NULL,
  `cam_id` bigint(20) UNSIGNED NOT NULL,
  `priority` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unassigned',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `companyName`, `title`, `address`, `city`, `sup_id`, `created_at`, `updated_at`) VALUES
(2, 'mpi', 'gvm,k', 'piyassa', 'Kombolcha', 4, '2022-08-31 14:48:53', '2022-08-31 14:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`, `user_id`, `role`) VALUES
(1, 'Rana Crane', 'wohony@mailinator.com', 'Quia non at aliqua', '2022-08-26 12:14:34', '2022-08-26 12:14:34', '3', 'student'),
(2, 'eman', '93emanwendwessen@gmail.com', 'dgxhgjc,jjxhh', '2022-08-27 04:24:11', '2022-08-27 04:24:11', '4', 'student'),
(3, 'new', 'new@gmail.com', 'comment Message comment Message comment Message comment Message comment Message comment Message comment Message comment Message comment Message comment Message', '2022-09-09 19:31:01', '2022-09-09 19:31:01', '1', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `cordinators`
--

CREATE TABLE `cordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'deactive',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cordinators`
--

INSERT INTO `cordinators` (`id`, `Fname`, `Lname`, `email`, `phone`, `image`, `role`, `status`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'coordinator', '1', 'coordinator1@gmail.com', NULL, NULL, 'coordinator', 'deactive', '$2y$10$MTcW3TakOaH/vZgXbSnFxO3CI.lRX/Hu5rS1D3rX.I/nVDBgOrStO', NULL, NULL, '2022-08-26 09:24:06', '2022-09-04 05:49:46'),
(4, 'jemal', '1', 'jemalm0945@gmail.com', NULL, NULL, 'coordinator', 'activated', '$2y$10$0LE97uT.bgA9gNDVSAvPTuMBlSK.BgyEKNCNCK362RdfznuyoAIGi', NULL, NULL, '2022-08-26 13:48:18', '2022-09-04 05:14:35'),
(5, 'coordinator', '2', '93emanwendwessen@gmail.com', NULL, 'storage/images/images1662204068.png', 'coordinator', 'activated', '$2y$10$twE5LXFHpjGHxoIrOha72..Ej0FCQXGg5E.FZI1zqZAi/Nnljo5fu', NULL, NULL, '2022-08-27 01:30:00', '2022-09-03 18:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'software', '2022-08-26 09:24:48', '2022-08-26 09:24:48'),
(2, 'it', '2022-08-26 14:01:26', '2022-08-26 14:01:26'),
(3, 'information system', '2022-08-27 15:51:19', '2022-08-27 15:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `department_heads`
--

CREATE TABLE `department_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'deactive',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_heads`
--

INSERT INTO `department_heads` (`id`, `Fname`, `Lname`, `email`, `phone`, `department_id`, `image`, `role`, `status`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'departmenthead', '1', 'departmenthead1@gmail.com', NULL, 1, NULL, 'head', 'activated', '$2y$10$XYoaHRk5Hv7rJxeY3mk2guopVy2NdGk7sGq3RZFiFXSMK6Qh1XNka', NULL, NULL, '2022-08-26 09:25:13', '2022-08-26 09:26:12'),
(3, 'departmenthead', '2', 'jemalm0945@gmail.com', NULL, 2, 'storage/images/images1662815356.png', 'head', 'activated', '$2y$10$Fpr97EntRXXGEc9j/.YWzeGkQEDYFVcqBIIvLWRWrUYNOxF31Isde', NULL, NULL, '2022-08-27 01:58:04', '2022-09-10 20:09:17');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_08_18_125033_create_departments_table', 1),
(5, '2022_08_18_151144_create_department_heads_table', 1),
(6, '2022_08_18_151327_create_cordinators_table', 1),
(7, '2022_08_18_162759_create_supervisors_table', 1),
(8, '2022_08_18_174803_create_students_table', 1),
(9, '2022_08_19_153634_create_positions_table', 1),
(10, '2022_08_20_073951_create_admins_table', 1),
(11, '2022_08_20_093529_create_appllies_table', 1),
(12, '2022_08_23_055330_create_companies_table', 1),
(13, '2022_08_23_070128_create_choices_table', 1),
(14, '2022_08_25_035306_create_carrers_table', 1),
(15, '2022_08_25_062304_create_carrer_applies_table', 1),
(16, '2022_08_26_143009_create_contacts_table', 2),
(17, '2022_09_09_123527_add_user_id_to_contact_table', 3),
(18, '2022_09_09_130755_add_role_to_contact_table', 4),
(19, '2022_09_09_134847_add_image_to_admin', 5),
(20, '2022_09_09_135342_add_phone_to_admin', 6);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `companyName`, `title`, `address`, `city`, `sup_id`, `created_at`, `updated_at`) VALUES
(1, 'Swanson and Talley Co', 'Rasmussen and Jacobson LLC', 'vawicelih@mailinator.com', 'Dicta ea dolorem lab', 1, '2022-08-26 09:30:00', '2022-08-26 09:30:00'),
(2, 'Bell and Chaney Co', 'Wilson Perez Associates', 'fubise@mailinator.com', 'Non cumque molestiae', 1, '2022-08-26 09:30:12', '2022-08-26 09:30:12'),
(3, 'maya', 'system controller', 'piyassa', 'Kombolcha', 5, '2022-08-31 14:47:08', '2022-08-31 14:47:08'),
(4, 'maya', 'fjghjdkf,jgvcjxn', 'piyassa', 'Kombolcha', 1, '2022-09-04 04:09:22', '2022-09-04 04:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NoFeedBack',
  `recomendation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apparentResult` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Deactive',
  `CGPA` double NOT NULL DEFAULT 0,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `spacialSkill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_acount_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Fname`, `Lname`, `email`, `username`, `department_id`, `password`, `image`, `phone`, `feedback`, `recomendation`, `apparentResult`, `status`, `CGPA`, `role`, `spacialSkill`, `bank_acount_no`, `bank_name`, `created_at`, `updated_at`) VALUES
(1, 'jemal', '1', 'jemalm0945@gmail.com', '0681/11', 1, '$2y$10$dR7KImRd84ZMgmgfFLAU8uxhFtZ6mLcsQSlNCTnr6RCyyQEF25uRW', 'storage/images/images1662809585.png', '+251945723940', 'yes', 'storage/images/images1662206934.xlsx', '123456', 'activated', 45, 'student', '5667', '111', 'comercial', '2022-08-26 09:26:52', '2022-09-10 18:33:05'),
(3, 'ashi', 'ashenfi', 'aashenafitibebu@gmail.com', '0688/10', 2, '$2y$10$9curw44BooPDLqjC6e3ice4wHlp0WKP6E.7Lg17h1fB0s7w9gTawu', 'storage/images/images1662204068.png', '+251963744531', 'NoFeedBack', NULL, NULL, 'activated', 4, 'student', 'adsfg', 'dd', '24356', '2022-08-27 01:48:59', '2022-08-27 02:02:15'),
(4, 'jemal', '2', 'jemalmohammedadem75@gmail.com', '0688/16', 1, '$2y$10$ryo/kKi7iPujUzarh7HqHOUbW1pxdlZByvPno5QlCO43a37bbdWzC', 'storage/images/images1662204068.png', '+251963744531', 'NoFeedBack', NULL, NULL, 'activated', 4, 'student', 'dd', 'dd', 'ddd', '2022-08-27 02:52:41', '2022-08-27 02:54:50'),
(5, 'mohammed', 'bedru', 'mohammedbedru01@gmail.com', '0744/11', 1, '$2y$10$eIGDqdhmMhjMJiQB4NfpS.ZyFq36GN6uJh8nvKvUk0hkKnEfyvH4u$2y$10$Tg83.KWTCfEj95ZWfPnR0.U8013.iBVeBsM6plMMPrCud4ILtfwsm', 'storage/images/images1662204068.png', '+251963744531', 'yes', 'storage/images/images1662133013.pdf', '99', 'activated', 4, 'student', 'coding', '5567890', 'dghfj', '2022-08-27 14:13:49', '2022-09-02 22:36:54'),
(6, 'anwar', 'mohammed', '93emanwendwessen@gmail.com', '0942/11', 1, NULL, NULL, NULL, 'NoFeedBack', NULL, NULL, 'Deactive', 0, 'student', NULL, NULL, NULL, '2022-09-10 05:44:05', '2022-09-10 05:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'deactive',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `Fname`, `Lname`, `email`, `phone`, `image`, `role`, `status`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'supervisor', '1', 'supervisor1@gmail.com', '123456789', 'storage/images/images1662800052.png', 'supervisor', 'activated', '$2y$10$Tg83.KWTCfEj95ZWfPnR0.U8013.iBVeBsM6plMMPrCud4ILtfwsm', NULL, NULL, '2022-08-26 09:25:40', '2022-09-10 15:55:29'),
(4, 'Firaol ', 'mohammed', 'jemalm0945@gmail.com', NULL, NULL, 'supervisor', 'activated', '$2y$10$Fdq5W0tngTcutVnBX.QU5e6y1vyPzsS9oIf063PuOOTjhnZBF0aRa', NULL, NULL, '2022-08-27 01:34:57', '2022-08-27 01:52:12'),
(5, 'anwar', 'mohammed', 'anukey1989@gmail.com', NULL, NULL, 'supervisor', 'activated', '$2y$10$lF40ZWqaWvpnHn7yyGQU/eZkzcqRzANn9L.bdfHwqOAFuR2Dt7ifm', NULL, NULL, '2022-08-31 14:15:45', '2022-08-31 14:45:34'),
(6, 'hiba', 'wende', '93emanwendwessen@gmail.com', NULL, NULL, 'supervisor', 'deactive', '$2y$10$dR7KImRd84ZMgmgfFLAU8uxhFtZ6mLcsQSlNCTnr6RCyyQEF25uRW', NULL, NULL, '2022-08-31 14:21:09', '2022-08-31 14:21:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appllies`
--
ALTER TABLE `appllies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appllies_sup_id_foreign` (`sup_id`),
  ADD KEY `appllies_stud_id_foreign` (`stud_id`),
  ADD KEY `appllies_position_id_foreign` (`position_id`),
  ADD KEY `appllies_department_id_foreign` (`department_id`);

--
-- Indexes for table `carrers`
--
ALTER TABLE `carrers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrers_sup_id_foreign` (`sup_id`);

--
-- Indexes for table `carrer_applies`
--
ALTER TABLE `carrer_applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrer_applies_sup_id_foreign` (`sup_id`),
  ADD KEY `carrer_applies_stud_id_foreign` (`stud_id`),
  ADD KEY `carrer_applies_carrer_id_foreign` (`carrer_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `choices_stud_id_foreign` (`stud_id`),
  ADD KEY `choices_cam_id_foreign` (`cam_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_sup_id_foreign` (`sup_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cordinators`
--
ALTER TABLE `cordinators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cordinators_email_unique` (`email`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_heads`
--
ALTER TABLE `department_heads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_heads_email_unique` (`email`),
  ADD KEY `department_heads_department_id_foreign` (`department_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_sup_id_foreign` (`sup_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_department_id_foreign` (`department_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supervisors_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appllies`
--
ALTER TABLE `appllies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carrers`
--
ALTER TABLE `carrers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carrer_applies`
--
ALTER TABLE `carrer_applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cordinators`
--
ALTER TABLE `cordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department_heads`
--
ALTER TABLE `department_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appllies`
--
ALTER TABLE `appllies`
  ADD CONSTRAINT `appllies_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appllies_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appllies_stud_id_foreign` FOREIGN KEY (`stud_id`) REFERENCES `students` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appllies_sup_id_foreign` FOREIGN KEY (`sup_id`) REFERENCES `supervisors` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `carrers`
--
ALTER TABLE `carrers`
  ADD CONSTRAINT `carrers_sup_id_foreign` FOREIGN KEY (`sup_id`) REFERENCES `supervisors` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `carrer_applies`
--
ALTER TABLE `carrer_applies`
  ADD CONSTRAINT `carrer_applies_carrer_id_foreign` FOREIGN KEY (`carrer_id`) REFERENCES `carrers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carrer_applies_stud_id_foreign` FOREIGN KEY (`stud_id`) REFERENCES `students` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carrer_applies_sup_id_foreign` FOREIGN KEY (`sup_id`) REFERENCES `supervisors` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_cam_id_foreign` FOREIGN KEY (`cam_id`) REFERENCES `companies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `choices_stud_id_foreign` FOREIGN KEY (`stud_id`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_sup_id_foreign` FOREIGN KEY (`sup_id`) REFERENCES `supervisors` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `department_heads`
--
ALTER TABLE `department_heads`
  ADD CONSTRAINT `department_heads_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_sup_id_foreign` FOREIGN KEY (`sup_id`) REFERENCES `supervisors` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
