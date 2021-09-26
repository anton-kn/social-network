-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2021 at 10:53 PM
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
(58, 2, 1, NULL, 'Мы вынуждены отталкиваться от того', 'Мы вынуждены отталкиваться от того, что экономическая повестка сегодняшнего дня создаёт предпосылки для укрепления моральных ценностей. Но современная методология разработки обеспечивает широкому кругу (специалистов) участие в формировании инновационных методов управления процессами! Лишь сделанные на базе интернет-аналитики выводы, инициированные исключительно синтетически, подвергнуты целой серии независимых исследований. И нет сомнений, что элементы политического процесса, которые представляют собой яркий пример континентально-европейского типа политической культуры, будут в равной степени предоставлены сами себе.', '2021-09-26 13:54:55', '2021-09-26 13:54:55'),
(59, 1, 1, NULL, 'Предварительные выводы', 'Предварительные выводы неутешительны: убеждённость некоторых оппонентов напрямую зависит от стандартных подходов. В целом, конечно, глубокий уровень погружения создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий с учётом комплекса приоритизации разума над эмоциями! Учитывая ключевые сценарии поведения, начало повседневной работы по формированию позиции требует определения и уточнения анализа существующих паттернов поведения. И нет сомнений, что базовые сценарии поведения пользователей формируют глобальную экономическую сеть и при этом - превращены в посмешище, хотя само их существование приносит несомненную пользу обществу.', '2021-09-26 13:55:30', '2021-09-26 13:55:30'),
(60, 1, 1, NULL, 'Ясность нашей позиции очевидна:', 'Ясность нашей позиции очевидна: дальнейшее развитие различных форм деятельности позволяет выполнить важные задания по разработке глубокомысленных рассуждений. Предварительные выводы неутешительны: существующая теория, в своём классическом представлении, допускает внедрение форм воздействия. Приятно, граждане, наблюдать, как ключевые особенности структуры проекта могут быть превращены в посмешище, хотя само их существование приносит несомненную пользу обществу.', '2021-09-26 13:57:10', '2021-09-26 13:57:10'),
(61, 1, 1, NULL, 'Повседневная практика показывает', 'Повседневная практика показывает, что социально-экономическое развитие требует анализа приоритизации разума над эмоциями. Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: современная методология разработки говорит о возможностях дальнейших направлений развития. И нет сомнений, что действия представителей оппозиции, вне зависимости от их уровня, должны быть призваны к ответу.', '2021-09-26 13:57:37', '2021-09-26 13:57:37'),
(62, 1, 1, NULL, 'Уровень погружения представляет', 'Не следует, однако, забывать, что глубокий уровень погружения представляет собой интересный эксперимент проверки стандартных подходов. Приятно, граждане, наблюдать, как многие известные личности набирают популярность среди определенных слоев населения, а значит, должны быть заблокированы в рамках своих собственных рациональных ограничений. Мы вынуждены отталкиваться от того, что высокотехнологичная концепция общественного уклада однозначно определяет каждого участника как способного принимать собственные решения касаемо своевременного выполнения сверхзадачи.', '2021-09-26 13:58:10', '2021-09-26 13:58:10'),
(64, 1, 1, NULL, 'Учитывая ключевые сценарии поведения', 'Учитывая ключевые сценарии поведения, граница обучения кадров, в своём классическом представлении, допускает внедрение новых принципов формирования материально-технической и кадровой базы. В частности, высокое качество позиционных исследований прекрасно подходит для реализации инновационных методов управления процессами. Ясность нашей позиции очевидна: выбранный нами инновационный путь требует анализа новых предложений. С другой стороны, убеждённость некоторых оппонентов представляет собой интересный эксперимент проверки новых принципов формирования материально-технической и кадровой базы.', '2021-09-26 13:59:23', '2021-09-26 13:59:23'),
(67, 1, 2, 59, 'Предварительные выводы - ответ', 'Предварительные выводы неутешительны: убеждённость некоторых оппонентов напрямую зависит от стандартных подходов.', '2021-09-26 14:21:33', '2021-09-26 14:21:33'),
(68, 1, 2, 62, 'Уровень погружения представляет - ответ', 'Мы вынуждены отталкиваться от того, что высокотехнологичная концепция общественного уклада однозначно определяет каждого участника как способного принимать собственные решения касаемо своевременного выполнения сверхзадачи.', '2021-09-26 14:22:06', '2021-09-26 14:22:06'),
(69, 1, 1, NULL, 'Непосредственные участники технического прогресса', 'Как уже неоднократно упомянуто, непосредственные участники технического прогресса ассоциативно распределены по отраслям. Действия представителей оппозиции освещают чрезвычайно интересные особенности картины в целом, однако конкретные выводы, разумеется, ограничены исключительно образом мышления. Задача организации, в особенности же современная методология разработки говорит о возможностях стандартных подходов. Сложно сказать, почему многие известные личности смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности.', '2021-09-26 14:43:27', '2021-09-26 14:43:27'),
(70, 2, 2, NULL, 'Мы вынуждены отталкиваться от того', 'Мы вынуждены отталкиваться от того, что экономическая повестка сегодняшнего дня создаёт предпосылки для укрепления моральных ценностей.', '2021-09-26 14:44:17', '2021-09-26 14:44:17');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
