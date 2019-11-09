-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 08:04 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_05_085337_create_profiles_table', 1),
(6, '2019_02_08_110748_create_tasks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `qualification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `task` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `status`, `employee_id`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'implement cron jobs', 'Completed', 2, '2019-02-11', '2019-02-08 06:33:04', '2019-02-10 04:09:17'),
(3, 'Collect cash from Nipa', 'Pending', 3, '2019-02-16', '2019-02-08 06:57:12', '2019-02-10 03:56:21'),
(4, 'Meeting at Bandra', 'Pending', 4, '2019-02-11', '2019-02-08 06:57:45', '2019-02-10 01:53:28'),
(5, 'grow hair', 'Pending', 5, '2019-02-12', '2019-02-08 07:42:33', '2019-02-10 01:51:47'),
(6, 'do this imp', 'Pending', 2, '2019-02-14', '2019-02-10 01:51:25', '2019-02-10 01:51:25'),
(7, 'Start SpeedWheels Project', 'Pending', 6, '2019-03-01', '2019-02-10 03:55:39', '2019-02-10 03:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super', 'admin', 'admin@blog.com', 1, '$2y$10$bFR29NUkXdHdZZzO.JPqIe0GlWTTrXJBjNb8gwcc51rLiqNkYuvRC', 'zDlHlcWcCS5693PP0tmX3DsLbMloUYO68LbiTeI8AOhxvgkNRZTrhSA50B5b', '2019-02-08 04:33:13', '2019-02-08 04:33:13'),
(2, 'Sunil', 'Samel', 'sunilsamel93@gmail.com', 0, '$2y$10$eFyvP7JUWhps50YLgQzZTuS9uVPfzbP2lrolNnfurMxgKpEeh3hD6', 'BD2zXLElERyjLsQKIdOzuECactgprbDOIU2RuJ9lVu6x0qpB6zJu95Ej0OeG', '2019-02-08 05:35:01', '2019-02-08 05:35:01'),
(3, 'omkar', 'gawade', 'omkargawade09@gmail.com', 0, '$2y$10$QvcQs2QCb.aBy/n5Cb.tGu3sc/2kKPbhV7EhcJivUAoCMhn8dts8.', NULL, '2019-02-08 06:55:19', '2019-02-08 06:55:19'),
(4, 'Dewang', 'Ruke', 'dewangruke@gmail.com', 0, '$2y$10$E9NslwbFBor/26tsOWuU9.7DUvP13e5sCXdMAUqBQjancEwA2/wJe', '5qgazHAg9mRjTBzSr7OQSCypxbmygy9SPOidRDRxfmc1TZdyj4ZXchWtvS8q', '2019-02-08 06:56:50', '2019-02-08 06:56:50'),
(5, 'Tushar', 'Nikam', 'tusharrules538@gmail.com', 0, '$2y$10$t2ZgQDpXG5LjHq7SipjX.eOOwIsMBWps3yEvq7Ox1KgLfFphNaWLG', NULL, '2019-02-08 07:42:08', '2019-02-08 07:42:08'),
(6, 'Alkesh', 'Koyande', 'alkesh.koyande@gmail.com', 0, '$2y$10$Gzc8D353bA1Q.aCavbIIneXpbsNUfra7phgaoK7Qr9yy2rJEuxTNW', NULL, '2019-02-09 11:26:26', '2019-02-10 04:04:00');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
