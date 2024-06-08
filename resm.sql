-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2024 a las 17:53:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `resm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(2, 2, 4, '2024-06-06 09:22:19', '2024-06-06 09:22:19'),
(3, 2, 3, '2024-06-06 09:22:21', '2024-06-06 09:22:21'),
(4, 4, 4, '2024-06-06 09:28:28', '2024-06-06 09:28:28'),
(5, 4, 1, '2024-06-06 09:28:32', '2024-06-06 09:28:32'),
(6, 6, 2, '2024-06-06 09:42:35', '2024-06-06 09:42:35'),
(7, 6, 5, '2024-06-06 09:42:39', '2024-06-06 09:42:39'),
(8, 4, 6, '2024-06-07 11:34:19', '2024-06-07 11:34:19'),
(11, 1, 6, '2024-06-07 12:10:05', '2024-06-07 12:10:05'),
(12, 8, 7, '2024-06-07 21:25:43', '2024-06-07 21:25:43'),
(13, 7, 7, '2024-06-07 21:30:55', '2024-06-07 21:30:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_06_05_214418_create_posts_table', 2),
(7, '2024_06_05_225932_create_likes_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('fernando12@gmail.com', '$2y$12$bN6RC4XNDkW5s1CpfBZfq.1gt.kqTQRnGoaf3OxnVOLex2EGDn9fq', '2024-06-06 05:46:13'),
('tato87911@gmail.com', '$2y$12$n04sFvxqA5Qs9zh2G642kOF0h6rs00EU06pEizAgCUXoT8zLg./rK', '2024-06-05 12:43:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hola como están Amigos/as', '2024-06-06 04:09:22', '2024-06-06 04:09:22'),
(2, 1, 'hello word', '2024-06-06 04:10:42', '2024-06-06 04:10:42'),
(3, 4, 'Sip', '2024-06-06 04:20:45', '2024-06-06 04:20:45'),
(4, 2, 'Como se encuentran amigos', '2024-06-06 05:21:07', '2024-06-06 05:21:07'),
(5, 4, 'Este es mi primer blog', '2024-06-06 09:28:10', '2024-06-06 09:28:10'),
(6, 6, 'Hola este mi blog', '2024-06-06 09:42:07', '2024-06-06 09:42:07'),
(7, 8, 'programacion4', '2024-06-07 21:25:09', '2024-06-07 21:25:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fernando', 'fernando12@gmail.com', NULL, '$2y$12$vEyYGnqxlM3H3aXL/EK7.OdsNUE1fLfyxwBf.hAPJxs6vUi9XZ2.m', NULL, '2024-06-05 12:37:15', '2024-06-05 12:37:15'),
(2, 'Eduardo Vargas', 'tato87911@gmail.com', NULL, '$2y$12$7KmJpKbDIkEE7cn1nKDyT.RWWamI5ZV8Ob3BbGukszoZdKrBQ5Tl2', 'CBATnk8yWV3a27pG0khBSF5EzGwvp0U6PdoXhRHKLfmjUVQgdbfFGiXnv9QH', '2024-06-05 12:42:41', '2024-06-05 12:42:41'),
(3, 'Luis Constanza', 'Luis503@gmail.com', NULL, '$2y$12$VqP0axzpdLqD5GT644x83.pEgxArrCmPSqi2y3Eqefl2r6s8V90eC', NULL, '2024-06-05 12:59:14', '2024-06-05 12:59:14'),
(4, 'Angel Escobar', 'anegl777@gmail.com', NULL, '$2y$12$q3aSEFffONfZ6iFxCOnkfOICe28fP8Y9bU7q8xmdfki.KC5ZqXNFG', NULL, '2024-06-06 00:02:45', '2024-06-06 00:02:45'),
(5, 'Vladimir Hernandez', 'edua123@gmail.com', NULL, '$2y$12$A65aI4RbCnRzsRyNsuDazevMtFiZVqVz6xaqpj1pOxftLluqVbJZS', NULL, '2024-06-06 04:01:26', '2024-06-06 04:01:26'),
(6, 'Maria Cruz', 'maria503@gmail.com', NULL, '$2y$12$/gb2xGxzTZZaP0uWMMcIT.AabYWJQYZhx7RbDGkD7Hj.cpXgXQp0e', NULL, '2024-06-06 09:40:54', '2024-06-06 09:40:54'),
(7, 'Daniel', 'daniel123@gmail.com', NULL, '$2y$12$ZQjt0TBCYOlk6ZwY45RY1eZcGFyNR9KjtUQ1pChiQw.PtPQn6p08q', NULL, '2024-06-07 11:35:02', '2024-06-07 11:35:02'),
(8, 'mario', 'mario122@gmail.com', NULL, '$2y$12$muVBVYYyVWlFnqRdisqcLOxF.ZxiyCILxMwF1kFRSr41.DNZw25MO', NULL, '2024-06-07 21:22:46', '2024-06-07 21:22:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
