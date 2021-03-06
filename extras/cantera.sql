-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-02-2022 a las 21:16:13
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cantera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canchas`
--

DROP TABLE IF EXISTS `canchas`;
CREATE TABLE IF NOT EXISTS `canchas` (
  `id_cancha` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cancha_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cancha`),
  KEY `fk_tipo_cancha_id_idx` (`tipo_cancha_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `cancha_id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_reserva` varchar(45) DEFAULT NULL,
  `hora_inicio` varchar(45) DEFAULT NULL,
  `hora_fin` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `deleted_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `cancha_id`, `usuario_id`, `fecha_reserva`, `hora_inicio`, `hora_fin`, `nombre`, `correo`, `telefono`, `dni`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, '2022-02-26', '07:00', '08:00', 'VERONICA SAAVEDRA', 'SAAVEDRAPHP@GMAIL.COM', '960203782', '08398854', '2022-02-15 09:41:28', '2022-02-15 09:41:28', NULL),
(2, 2, 5, '2022-02-27', '08:00', '09:00', 'LUIS', 'SAAVEDRAPHP@GMAIL.COM', '960203781', '40221837', '2022-02-15 10:01:58', '2022-02-15 10:01:58', NULL),
(3, 2, 5, '2022-02-28', '09:00', '10:00', 'MIGUEL CALIXTRO', 'MIGUEL@CALIXTRO', '5624515', '10319745', '2022-02-15 11:27:37', '2022-02-15 11:27:37', NULL),
(4, 2, 5, '2022-03-01', '10:00', '11:00', 'JUAN TIRADO', 'ADECONPERUVENTAS@GMAIL.COM', '5624515', '08388854', '2022-02-15 11:31:30', '2022-02-15 11:31:30', NULL),
(6, 2, 5, '2022-03-01', '15:00', '16:00', 'DAVID', 'ELIZABETH@GMAIL.COM', '5612938', '10319745', '2022-02-15 15:10:22', '2022-02-15 15:10:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_canchas`
--

DROP TABLE IF EXISTS `reservas_canchas`;
CREATE TABLE IF NOT EXISTS `reservas_canchas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cancha_id` varchar(45) NOT NULL,
  `usuario_id` varchar(45) DEFAULT NULL,
  `fecha_reserva` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `deleted_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-04-01 16:36:24', '2021-04-01 16:36:24'),
(2, 'user', 'User', '2021-04-01 16:36:24', '2021-04-01 16:36:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_roles_idx` (`role_id`),
  KEY `fk_roles_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-04-03 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_canchas`
--

DROP TABLE IF EXISTS `tipos_canchas`;
CREATE TABLE IF NOT EXISTS `tipos_canchas` (
  `id_tipo_cancha` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `deleted_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_cancha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Luis', 'saavedraphp@gmail.com', '0000-00-00 00:00:00', '$2y$12$P3DK3QkU/VicHL5fj1ZLSOFWyyFie4BouEuyx81ZcBP6Omtqjjs/6', 'Qnesa1cvc4iBwcbyrVUGTibYrRkN7MuyLaXFjQu7e1DKiFD3KmpDBGzLKimh', NULL, NULL),
(2, 'Usuario Demo', 'demo@gmail.com', NULL, '$2y$10$ebXJfHGWbAOXZO9KK029.eES/HkZQKOcMcs.ejkY8zNot.YkhW3yK', 'M12SVMyqRiGYYztYUXpkPLXaFNaUgps1CtAJUtLdsA5W0GYz30RTsE7alVPH', '2021-02-22 22:41:09', '2021-02-22 22:41:09'),
(3, 'Eduardo', 'egrillo@almagri.com', NULL, '$2y$12$P3DK3QkU/VicHL5fj1ZLSOFWyyFie4BouEuyx81ZcBP6Omtqjjs/6', 'OR3KT630lrbL8FRCYD7JeXiJamHYDga67x3zZrdq6hVOUWUHId3nQ7mDttwa', '2021-02-26 00:22:30', '2021-03-02 18:18:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usua_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usua_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usua_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usua_f_nacimiento` datetime DEFAULT NULL,
  `pais_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  `usua_direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usua_code_zip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usua_id`),
  KEY `usuarios_pais_id_foreign` (`pais_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usua_id`, `usua_nombre`, `usua_email`, `usua_f_nacimiento`, `pais_id`, `estado_id`, `ciudad_id`, `usua_direccion`, `usua_code_zip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Luis', 'saavedraphp@gmail.com', '2021-02-19 00:00:00', 167, 1, 3, 'mz g2 lote 16, H.A Daniel Alcides Carrión Sector \"C\" Los Olivos', '511', '2021-02-18 02:16:39', '2021-02-19 02:20:53', NULL),
(2, 'Eliza', 'elizabeth@gmail.com', '2021-02-17 21:31:16', 167, 2, 15, 'Canta Callao', NULL, '2021-02-18 02:31:16', '2021-02-18 02:31:16', NULL),
(3, 'Veronica', 'veronica@gmail.com', '2021-02-17 21:31:40', 167, 1, 5, 'mz g2 lote 16, H.A Daniel Alcides Carrión Sector \"C\" Los Olivos', NULL, '2021-02-18 02:31:40', '2021-02-18 02:31:40', NULL),
(4, 'Jessica', 'saavedraphp@gmail.com', '2021-02-19 21:25:18', 167, 1, 2, 'mz g2 lote 16, H.A Daniel Alcides Carrión Sector \"C\" Los Olivos', NULL, '2021-02-20 02:25:18', '2021-02-20 02:25:18', NULL),
(5, 'default', 'default@gmail.com', '2021-02-19 21:25:18', NULL, NULL, NULL, NULL, NULL, '2021-02-20 02:25:18', NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canchas`
--
ALTER TABLE `canchas`
  ADD CONSTRAINT `fk_tipo_cancha_id` FOREIGN KEY (`tipo_cancha_id`) REFERENCES `tipos_canchas` (`id_tipo_cancha`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roles_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
