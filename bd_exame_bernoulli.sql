-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 01-Ago-2021 às 19:34
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_exame_bernoulli`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeoes`
--

DROP TABLE IF EXISTS `campeoes`;
CREATE TABLE IF NOT EXISTS `campeoes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libertadores` int(11) NOT NULL,
  `copa_brasil` int(11) NOT NULL,
  `sul_americana` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `campeoes`
--

INSERT INTO `campeoes` (`id`, `libertadores`, `copa_brasil`, `sul_americana`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, NULL, '2021-08-01 22:24:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `confrontos`
--

DROP TABLE IF EXISTS `confrontos`;
CREATE TABLE IF NOT EXISTS `confrontos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_casa` int(11) NOT NULL,
  `gols_casa` int(11) NOT NULL DEFAULT '0',
  `cv_casa` int(11) DEFAULT '0',
  `ca_casa` int(11) DEFAULT '0',
  `id_fora` int(11) NOT NULL,
  `gols_fora` int(11) NOT NULL DEFAULT '0',
  `cv_fora` int(11) DEFAULT '0',
  `ca_fora` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `confrontos`
--

INSERT INTO `confrontos` (`id`, `id_casa`, `gols_casa`, `cv_casa`, `ca_casa`, `id_fora`, `gols_fora`, `cv_fora`, `ca_fora`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 0, 0, 2, 4, 0, 0, '2021-07-31 23:10:24', '2021-07-31 23:10:24'),
(2, 1, 3, 0, 0, 2, 4, 0, 0, '2021-07-31 23:12:28', '2021-07-31 23:12:28'),
(3, 1, 3, 0, 0, 2, 4, 0, 0, '2021-07-31 23:16:16', '2021-07-31 23:16:16'),
(4, 1, 3, 0, 0, 2, 0, 0, 0, '2021-07-31 23:16:53', '2021-07-31 23:16:53'),
(5, 1, 3, 0, 0, 2, 0, 0, 0, '2021-07-31 23:17:07', '2021-07-31 23:17:07'),
(6, 4, 3, 0, 0, 8, 6, 0, 0, '2021-07-31 23:18:59', '2021-07-31 23:18:59'),
(7, 4, 1, 0, 0, 6, 3, 0, 0, '2021-07-31 23:36:31', '2021-07-31 23:36:31'),
(8, 3, 2, 0, 0, 9, 0, 0, 0, '2021-08-01 01:22:06', '2021-08-01 01:22:06'),
(9, 2, 6, 0, 0, 4, 8, 0, 0, '2021-08-01 03:55:27', '2021-08-01 03:55:27'),
(10, 11, 2, 0, 0, 1, 3, 0, 0, '2021-08-01 03:59:34', '2021-08-01 03:59:34'),
(11, 16, 4, 0, 0, 7, 5, 0, 0, '2021-08-01 04:01:33', '2021-08-01 04:01:33'),
(12, 10, 4, 0, 0, 12, 5, 0, 0, '2021-08-01 04:02:25', '2021-08-01 04:02:25'),
(13, 3, 3, 0, 0, 6, 1, 0, 0, '2021-08-01 04:04:57', '2021-08-01 04:04:57'),
(14, 7, 2, 0, 0, 3, 3, 0, 0, '2021-08-01 04:10:15', '2021-08-01 04:10:15'),
(15, 1, 6, 0, 0, 17, 2, 0, 0, '2021-08-01 04:10:52', '2021-08-01 04:10:52'),
(16, 13, 2, 0, 0, 17, 2, 0, 0, '2021-08-01 04:11:28', '2021-08-01 04:11:28'),
(17, 18, 2, 0, 0, 3, 0, 0, 0, '2021-08-01 04:12:10', '2021-08-01 04:12:10'),
(18, 13, 5, 0, 0, 19, 2, 0, 0, '2021-08-01 05:32:38', '2021-08-01 05:32:38'),
(19, 5, 0, 0, 0, 12, 3, 0, 0, '2021-08-01 05:35:08', '2021-08-01 05:35:08'),
(20, 12, 1, 0, 0, 17, 3, 0, 0, '2021-08-01 17:44:21', '2021-08-01 17:44:21'),
(21, 1, 2, 0, 0, 12, 1, 0, 0, '2021-08-01 17:54:14', '2021-08-01 17:54:14'),
(22, 20, 4, 0, 0, 7, 3, 0, 0, '2021-08-01 18:53:17', '2021-08-01 18:53:17'),
(23, 8, 54, 0, 0, 12, 2, 0, 0, '2021-08-01 18:53:40', '2021-08-01 18:53:40'),
(24, 13, 2, 1, 4, 4, 1, 3, 2, '2021-08-01 19:56:54', '2021-08-01 19:56:54'),
(25, 4, 1, 1, 0, 6, 0, 1, 0, '2021-08-01 20:34:49', '2021-08-01 20:34:49'),
(26, 14, 2, 2, 3, 9, 3, 4, 4, '2021-08-01 20:37:12', '2021-08-01 20:37:12'),
(27, 18, 2, 3, 0, 20, 3, 0, 0, '2021-08-01 20:38:41', '2021-08-01 20:38:41'),
(28, 20, 2, 0, 0, 1, 3, 0, 0, '2021-08-01 20:40:11', '2021-08-01 20:40:11'),
(29, 1, 1, 0, 0, 12, 2, 0, 0, '2021-08-01 20:43:28', '2021-08-01 20:43:28'),
(30, 18, 0, 0, 0, 4, 0, 0, 0, '2021-08-01 20:44:01', '2021-08-01 20:44:01'),
(31, 4, 0, 0, 0, 20, 0, 0, 0, '2021-08-01 20:44:43', '2021-08-01 20:44:43'),
(32, 9, 7, 0, 0, 15, 6, 0, 0, '2021-08-01 20:45:15', '2021-08-01 20:45:15'),
(33, 8, 6, 0, 0, 18, 5, 0, 0, '2021-08-01 20:46:01', '2021-08-01 20:46:01'),
(34, 20, 3, 0, 0, 1, 2, 0, 0, '2021-08-01 20:46:37', '2021-08-01 20:46:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_31_113759_create_times_table', 1),
(5, '2021_07_31_113910_create_confrontos_table', 1),
(6, '2021_08_01_165911_create_campeoes_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

DROP TABLE IF EXISTS `times`;
CREATE TABLE IF NOT EXISTS `times` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pts` int(11) NOT NULL DEFAULT '0',
  `j` int(11) NOT NULL DEFAULT '0',
  `v` int(11) NOT NULL DEFAULT '0',
  `e` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0',
  `gp` int(11) NOT NULL DEFAULT '0',
  `gc` int(11) NOT NULL DEFAULT '0',
  `sg` int(11) NOT NULL DEFAULT '0',
  `cv` int(11) NOT NULL DEFAULT '0',
  `ca` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id`, `nome`, `imagem`, `pts`, `j`, `v`, `e`, `d`, `gp`, `gc`, `sg`, `cv`, `ca`, `created_at`, `updated_at`) VALUES
(1, 'Palmeiras', 'palmeiras.png', 12, 6, 4, 0, 2, 17, 12, 5, 0, 0, NULL, '2021-08-01 20:46:37'),
(2, 'Atlético-MG', 'atletico-mg.png', 0, 1, 0, 0, 1, 6, 8, -2, 0, 0, NULL, '2021-08-01 03:55:27'),
(3, 'Fortaleza', 'fortaleza.png', 9, 4, 3, 0, 1, 8, 5, 3, 0, 0, NULL, '2021-08-01 04:12:10'),
(4, 'Bragantino', 'bragantino.png', 8, 5, 2, 2, 1, 10, 8, 2, 4, 2, NULL, '2021-08-01 20:44:43'),
(5, 'Athletico-PR', 'athletico-pr.png', 0, 1, 0, 0, 1, 0, 3, -3, 0, 0, NULL, '2021-08-01 05:35:08'),
(6, 'Flamengo', 'flamengo.png', 0, 2, 0, 0, 2, 1, 4, -3, 1, 0, NULL, '2021-08-01 20:34:49'),
(7, 'Ceará', 'ceara.png', 3, 3, 1, 0, 2, 10, 11, -1, 0, 0, NULL, '2021-08-01 18:53:17'),
(8, 'Atlético-GO', 'atletico-go.png', 6, 2, 2, 0, 0, 60, 7, 53, 0, 0, NULL, '2021-08-01 20:46:01'),
(9, 'Bahia', 'bahia.png', 6, 3, 2, 0, 1, 10, 10, 0, 4, 4, NULL, '2021-08-01 20:45:15'),
(10, 'Corinthians', 'corinthians.png', 0, 1, 0, 0, 1, 4, 5, -1, 0, 0, NULL, '2021-08-01 04:02:25'),
(11, 'Fluminense', 'fluminense.png', 0, 1, 0, 0, 1, 2, 3, -1, 0, 0, NULL, '2021-08-01 03:59:34'),
(12, 'Santos', 'santos.png', 12, 6, 4, 0, 3, 15, 64, -45, 0, 0, NULL, '2021-08-01 20:43:28'),
(13, 'Juventude', 'juventude.png', 7, 3, 2, 1, 0, 9, 5, 4, 1, 4, NULL, '2021-08-01 19:56:54'),
(14, 'Internacional', 'internacional.png', 0, 1, 0, 0, 1, 2, 3, -1, 2, 3, NULL, '2021-08-01 20:37:12'),
(15, 'Cuiabá', 'cuiaba.png', 0, 1, 0, 0, 1, 6, 7, -1, 0, 0, NULL, '2021-08-01 20:45:15'),
(16, 'Sport', 'sport.png', 0, 1, 0, 0, 1, 4, 5, -1, 0, 0, NULL, '2021-08-01 04:01:34'),
(17, 'São Paulo', 'saopaulo.png', 4, 3, 1, 1, 1, 7, 9, -2, 0, 0, NULL, '2021-08-01 17:44:21'),
(18, 'América-MG', 'america-mg.png', 4, 4, 1, 1, 2, 9, 9, 0, 3, 0, NULL, '2021-08-01 20:46:01'),
(19, 'Grêmio', 'gremio.png', 0, 1, 0, 0, 1, 2, 5, -3, 0, 0, NULL, '2021-08-01 05:32:38'),
(20, 'Chapecoense', 'chapecoense.png', 10, 5, 3, 1, 1, 12, 10, 2, 0, 0, NULL, '2021-08-01 20:46:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
