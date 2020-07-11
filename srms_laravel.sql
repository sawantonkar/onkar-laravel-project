-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 06:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 'Professor', 'Daali', 'admin@123', 'admin123', '1590502005.jpeg', NULL, '2020-05-27 07:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_11_130402_create_teachers_table', 1),
(4, '2020_05_11_130432_create_students_table', 1),
(5, '2020_05_11_130504_create_admins_table', 1),
(6, '2020_05_18_142654_create_semesters_table', 2),
(7, '2020_05_22_131059_create_subjects_table', 3),
(8, '2020_06_01_071903_create_results_table', 4),
(9, '2020_06_01_123802_add_student_name_to_results_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_semester` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject1_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject2_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject3_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject4_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_email`, `student_semester`, `subject1_marks`, `subject2_marks`, `subject3_marks`, `subject4_marks`, `total`, `percentage`, `created_at`, `updated_at`, `student_name`) VALUES
(2, 'nairobi@mail.com', '3', '88', '87', '88', '89', '352', '88.00', '2020-06-01 07:17:36', '2020-06-01 07:17:36', 'nairobi'),
(3, 'helsinki@mail.com', '3', '89', '88', '98', '97', '372', '93.00', '2020-06-01 07:26:36', '2020-06-01 07:26:36', 'helsinki'),
(15, 'rio@mail.com', '1', '65', '88', '88', '99', '340', '85.00', '2020-06-02 08:04:48', '2020-06-03 01:41:02', 'rio'),
(16, 'tokyo@mail.com', '1', '77', '88', '76', '65', '306', '76.50', '2020-06-03 01:44:20', '2020-06-03 01:44:37', 'tokyo');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `created_at`, `updated_at`) VALUES
(8, '1', '2020-05-20 07:37:16', '2020-05-21 02:05:51'),
(9, '2', '2020-05-20 07:37:24', '2020-05-20 07:37:24'),
(13, '3', '2020-05-21 07:54:46', '2020-05-21 07:54:46'),
(14, '4', '2020-05-21 07:55:05', '2020-05-21 07:55:05'),
(16, '5', '2020-05-24 06:53:02', '2020-05-24 06:53:02'),
(17, '6', '2020-05-24 06:53:12', '2020-05-24 06:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `password`, `profession`, `semester`, `profile_pic`, `status`, `created_at`, `updated_at`) VALUES
(8, 'rio', 'daali', 'rio@mail.com', 'eyJpdiI6IlZzS3lPbUxVRFdVZWo5bUkzQ1NWVXc9PSIsInZhbHVlIjoiTG13YVJuTS9NZW9yUEo1eVNVbDRyZz09IiwibWFjIjoiZWIyYzg5OWRjYjcxNjgwYjk1OGJmZWY4MGVmYTJlYjU4ZWVjNTk0MzkzZTZkMzc2NWYxMjAyYWQ1ZTMyNzkyOCJ9', 'student', '1', '1591194413.jpeg', 'Active', '2020-05-25 09:02:50', '2020-06-03 08:58:08'),
(9, 'tokyo', 'daali', 'tokyo@mail.com', 'eyJpdiI6IlA2U0VSNHlHRzlHVkVUZkZRcWlONVE9PSIsInZhbHVlIjoic1J4VHV6MSs3NHRndGxmVmRNbGxqdz09IiwibWFjIjoiZDNjNzZkNWNmNzZlNDUxYTE2NTc1MjQ0YmY0OGRiN2NhZTI2MmQzZDMxMjY5YTU2NDA2YWZjYjJjZDRlMzI0OSJ9', 'student', '1', 'defaultimg.jpg', 'Deactive', '2020-05-25 09:03:35', '2020-05-30 01:55:08'),
(10, 'denver', 'daali', 'denver@mail.com', 'eyJpdiI6Im9OMzF5NjlmdUladHo5NjVEaWM1amc9PSIsInZhbHVlIjoiOFBCWWw5NXlwVmpLNGJ4TWQxNGFaZz09IiwibWFjIjoiN2EyNDI4ZWM0NjZiNTY1MGFiMmE5MmRjNDBhZjYxZmU2NjY1YTQ3OWVjYWQ2ZTVmYmZiNDgwMjFkY2UzYjNmZSJ9', 'student', '2', '1591194713.jpeg', 'Active', '2020-05-25 09:04:18', '2020-06-03 09:01:53'),
(11, 'monica', 'gaztimbade', 'monica@mail.com', 'eyJpdiI6Im5HRWZ2REpGVWxCSFE1SWZJVGlPTVE9PSIsInZhbHVlIjoiMUFkS2VveUYzMUdWRUQ4aUU2Qy9PUT09IiwibWFjIjoiNTQ4M2NhN2FiOTM0YTg5OWZkOTczODA2YzY2NWFkMTYyMGU2ZmYxYTM3NTAxMTI2ZjU5N2JjNDkxY2EzOTE0ZCJ9', 'student', '2', 'defaultimg.jpg', 'Deactive', '2020-05-25 09:05:03', '2020-05-25 09:05:03'),
(12, 'nairobi', 'daali', 'nairobi@mail.com', 'eyJpdiI6IkRUeEY5UkxyTFE4U0RCZVBoK3JncHc9PSIsInZhbHVlIjoibjU3VVd3YVY1SStvVkwrSjRFZzZvdz09IiwibWFjIjoiNWM5NmNmYmU2NzNmMGVhY2ExZWY5ZTkzNjFhYTA3YjU1MTQxZTY5MGIyNzU0MDNiMzZkYTQ0ODIzODEzOGQ4ZiJ9', 'student', '3', 'defaultimg.jpg', 'Deactive', '2020-05-25 09:05:44', '2020-05-25 09:05:44'),
(13, 'helsinki', 'daali', 'helsinki@mail.com', 'eyJpdiI6IlFxTDduRXdSaGhHUDZvTXkyMHE2ZWc9PSIsInZhbHVlIjoicUFrUFpEY3RlRGZOblY0RytHWFZkUT09IiwibWFjIjoiZjMwNTlmZjc1MDIxNmUzNjc4YTQ1ZDdhMjlhNDhmYWE0ZDQ5ZmFhMGQxODhhNGRmZTFkYzdiNTViYTNmNGYzYSJ9', 'student', '3', 'defaultimg.jpg', 'Deactive', '2020-05-25 09:06:14', '2020-05-25 09:06:14'),
(14, 'oslo', 'daali', 'oslo@mail.com', 'eyJpdiI6InNhODQ4dUpNL0ZQUmI2U0p6Sk54NHc9PSIsInZhbHVlIjoia3pUNDEyVUd1RWFVNXV2WFBLMXE4UT09IiwibWFjIjoiOGI4ODk2MTZkZTNlNTQyYzkxNjFhNDFkMzlhM2U3NGJjY2QwZTBmOTBlYmMyOTkzODBkOTk3YTYxMzRjZjhlMyJ9', 'student', '3', 'defaultimg.jpg', 'Deactive', '2020-05-25 09:07:08', '2020-05-25 09:07:08'),
(15, 'moscow', 'daali', 'moscow@mail.com', 'eyJpdiI6IlF5OXl5Z2oxbi9HQnFHMnp5aGpmY1E9PSIsInZhbHVlIjoiQ2tReUhiQVo2Qm9KL2xWZE43S21Qdz09IiwibWFjIjoiYWU2YTBiNTViMWM0OTE5ZjYwYjBmYmYyNTQyNDUyOTQzMDhhNDJlNGYxYmEyOTQ2ZWI2MDIyMmUwNWEyNmI3MiJ9', 'student', '2', 'defaultimg.jpg', 'Deactive', '2020-05-25 09:07:36', '2020-05-25 09:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_semester` int(11) NOT NULL,
  `subject1_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject1_marks` int(11) NOT NULL,
  `subject2_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject2_marks` int(11) NOT NULL,
  `subject3_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject3_marks` int(11) NOT NULL,
  `subject4_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject4_marks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_semester`, `subject1_name`, `subject1_marks`, `subject2_name`, `subject2_marks`, `subject3_name`, `subject3_marks`, `subject4_name`, `subject4_marks`, `created_at`, `updated_at`) VALUES
(1, 1, 'Wave theory & propogation', 100, 'Integrated circuits', 100, 'Microwave radio engineering', 100, 'Signals & systems', 100, '2020-05-23 01:55:34', '2020-05-23 01:55:34'),
(3, 2, 'Internet & voice communication', 100, 'Random signal analysis', 100, 'Circuit transmission line', 100, 'Mechatronics', 100, '2020-05-23 08:38:36', '2020-05-27 08:30:07'),
(5, 3, 'Microcontroller', 100, 'Control signals', 100, 'Digital signal processing', 100, 'Network analysis', 100, '2020-05-24 06:57:11', '2020-05-24 06:57:11'),
(6, 4, 'Analog electronics', 100, 'Digital communication', 100, 'Microelectronics circuits', 100, 'Satellite communication', 100, '2020-05-24 07:00:05', '2020-05-24 07:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `firstname`, `lastname`, `email`, `password`, `profession`, `semester`, `profile_pic`, `status`, `created_at`, `updated_at`) VALUES
(5, 'gandia', 'pogaa', 'gandia@mail.com', 'eyJpdiI6IkF3VEZCMnVCT1p6QnUzZEFVSVcva0E9PSIsInZhbHVlIjoiNUhBczJMRlMvcHBkMzZ2QVdRUjZUQT09IiwibWFjIjoiNzBhOTkzY2I1NTFhZDUxMTM1ZGRkYTM2ZDg1YmY0MWQ4OTQ2ODc4MjQ0Y2YxMjRkODhkNDg0Y2VhMTUxNjNjOSJ9', 'teacher', '1', '1590904780.jpeg', 'Active', '2020-05-25 02:31:25', '2020-06-02 07:55:13'),
(6, 'raquel', 'Murillo', 'raquel@mail.com', 'eyJpdiI6IngxNEhqeVFVSC9hSXM2UENrZDFjV1E9PSIsInZhbHVlIjoiSE9XNEZ2V3pxR0NjUHZBTEluWDBEQT09IiwibWFjIjoiN2M3YmQ0NTU2ODJmMjFhYmIyODg5ZDdlZDA4OGQxN2ViZDc2NWIxMTY4ZDFhOWI2ZGQyY2ZjMTdkYzBmMGQ1ZCJ9', 'teacher', '2', '1590909269.jpeg', 'Active', '2020-05-25 02:31:50', '2020-05-31 01:45:09'),
(7, 'berlin', 'daali', 'berlin@mal.com', 'eyJpdiI6ImZ5aVVFOUV5VC9VaC92R3F6aEpEanc9PSIsInZhbHVlIjoicUV2dmUwbmRxRnVmd1MvRFdQWmdidz09IiwibWFjIjoiYjhmOTliNDdjZmNiNTE1MDUyOTY3NzQwN2M5NDJmMGMxYzA5NGE3N2ZmZmVmZmU1YjUwNmI4ZmZhYWViNmI0YyJ9', 'teacher', '3', '1590909514.jpeg', 'Active', '2020-05-25 02:41:15', '2020-05-31 01:48:34'),
(8, 'palermo', 'daali', 'pamelo@mail.com', 'eyJpdiI6ImtpUFAycUV2elhTTDJTOXFocFFHNEE9PSIsInZhbHVlIjoiYTUwYWxhMlBlYmVYK0Rxc2NGL2tSUT09IiwibWFjIjoiOTNmODVjY2MyYTY2NTlmMTM0ODc5MWJjYjcxN2UwYzIzZDhiMWQ2MzJhMzQxMmJhMDcwNTMyMTkzY2M2NDcyMSJ9', 'teacher', '4', '1590909033.jpeg', 'Active', '2020-05-25 02:42:01', '2020-05-31 01:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `results_student_email_unique` (`student_email`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
