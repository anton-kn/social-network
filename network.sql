-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2021 at 08:28 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `network`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `author_id` int NOT NULL,
  `comment_id` int DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `author_id`, `comment_id`, `topic`, `comment`, `created_at`, `updated_at`) VALUES
(39, 1, 1, NULL, 'Равным образом постоянное', 'Равным образом постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение направлений прогрессивного развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности позволяет выполнять важные задания по разработке системы обучения кадров, соответствует насущным потребностям. Товарищи! консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом влечет за собой процесс внедрения и модернизации форм развития. Равным образом начало повседневной работы по формированию позиции играет важную роль в формировании системы обучения кадров, соответствует насущным потребностям.', '2021-09-25 13:35:17', '2021-09-25 13:35:17'),
(40, 2, 1, NULL, 'Равным образом постоянное', 'Равным образом постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение направлений прогрессивного развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности позволяет выполнять важные задания по разработке системы обучения кадров, соответствует насущным потребностям. Товарищи! консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом влечет за собой процесс внедрения и модернизации форм развития. Равным образом начало повседневной работы по формированию позиции играет важную роль в формировании системы обучения кадров, соответствует насущным потребностям.', '2021-09-25 13:35:35', '2021-09-25 13:35:35'),
(41, 2, 2, 40, 'Равным образом постоянное - ответ', 'Равным образом постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение направлений прогрессивного развития.', '2021-09-25 13:39:41', '2021-09-25 13:39:41'),
(42, 3, 2, NULL, 'Равным образом сложившаяся структура', 'Равным образом сложившаяся структура организации требуют определения и уточнения модели развития. Повседневная практика показывает, что начало повседневной работы по формированию позиции позволяет оценить значение направлений прогрессивного развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности представляет собой интересный эксперимент проверки форм развития.', '2021-09-25 13:41:17', '2021-09-25 13:41:17'),
(43, 2, 2, NULL, 'Сложившаяся структура организации', 'Равным образом сложившаяся структура организации требуют определения и уточнения модели развития. Повседневная практика показывает, что начало повседневной работы по формированию позиции позволяет оценить значение направлений прогрессивного развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности представляет собой интересный эксперимент проверки форм развития.', '2021-09-25 13:41:51', '2021-09-25 13:41:51'),
(44, 1, 2, NULL, 'Не следует, однако забывать,', 'Не следует, однако забывать, что консультация с широким активом влечет за собой процесс внедрения и модернизации форм развития. Разнообразный и богатый опыт укрепление и развитие структуры требуют от нас анализа соответствующий условий активизации. Равным образом начало повседневной работы по формированию позиции представляет собой интересный эксперимент проверки позиций, занимаемых участниками в отношении поставленных задач. С другой стороны рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.', '2021-09-25 15:04:43', '2021-09-25 15:04:43'),
(45, 1, 2, NULL, 'Не следует, однако забывать,', 'Не следует, однако забывать, что консультация с широким активом влечет за собой процесс внедрения и модернизации форм развития. Разнообразный и богатый опыт укрепление и развитие структуры требуют от нас анализа соответствующий условий активизации. Равным образом начало повседневной работы по формированию позиции представляет собой интересный эксперимент проверки позиций, занимаемых участниками в отношении поставленных задач. С другой стороны рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.', '2021-09-25 15:04:43', '2021-09-25 15:04:43'),
(46, 1, 2, NULL, 'Не следует, однако забывать,', 'Не следует, однако забывать, что консультация с широким активом влечет за собой процесс внедрения и модернизации форм развития. Разнообразный и богатый опыт укрепление и развитие структуры требуют от нас анализа соответствующий условий активизации. Равным образом начало повседневной работы по формированию позиции представляет собой интересный эксперимент проверки позиций, занимаемых участниками в отношении поставленных задач. С другой стороны рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.', '2021-09-25 15:04:43', '2021-09-25 15:04:43'),
(47, 1, 2, NULL, 'Не следует, однако забывать,', 'Не следует, однако забывать, что консультация с широким активом влечет за собой процесс внедрения и модернизации форм развития. Разнообразный и богатый опыт укрепление и развитие структуры требуют от нас анализа соответствующий условий активизации. Равным образом начало повседневной работы по формированию позиции представляет собой интересный эксперимент проверки позиций, занимаемых участниками в отношении поставленных задач. С другой стороны рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.', '2021-09-25 15:04:43', '2021-09-25 15:04:43'),
(48, 1, 2, NULL, 'Не следует, однако забывать,', 'Не следует, однако забывать, что консультация с широким активом влечет за собой процесс внедрения и модернизации форм развития. Разнообразный и богатый опыт укрепление и развитие структуры требуют от нас анализа соответствующий условий активизации. Равным образом начало повседневной работы по формированию позиции представляет собой интересный эксперимент проверки позиций, занимаемых участниками в отношении поставленных задач. С другой стороны рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.', '2021-09-25 15:04:43', '2021-09-25 15:04:43'),
(49, 1, 2, NULL, 'Не следует, однако забывать,', 'Не следует, однако забывать, что консультация с широким активом влечет за собой процесс внедрения и модернизации форм развития. Разнообразный и богатый опыт укрепление и развитие структуры требуют от нас анализа соответствующий условий активизации. Равным образом начало повседневной работы по формированию позиции представляет собой интересный эксперимент проверки позиций, занимаемых участниками в отношении поставленных задач. С другой стороны рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.', '2021-09-25 15:04:43', '2021-09-25 15:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_22_145804_create_comments_table', 1);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bob', 'bob@mail.com', NULL, '$2y$10$nygRQag2iqYzStQPNumhhOicUmUzHQje5uBBckeblPqyRp5ggVDfC', NULL, '2021-09-24 14:39:14', '2021-09-24 14:39:14'),
(2, 'pin', 'pin@mail.com', NULL, '$2y$10$TEhI9BEUr4WZJS9bw3daO.0y52p3ZxGU35fR9CBkplPdTSXICl.X.', NULL, '2021-09-24 14:39:38', '2021-09-24 14:39:38'),
(3, 'gvin', 'gvin@mail.com', NULL, '$2y$10$jTOShaTMtxcJ6JluZMQ7cO9HWAtUrsnTzaRwUs5JcOHMrlsPe0znm', NULL, '2021-09-24 14:40:02', '2021-09-24 14:40:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
