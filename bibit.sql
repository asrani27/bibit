/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50734 (5.7.34)
 Source Host           : localhost:3306
 Source Schema         : bibit

 Target Server Type    : MySQL
 Target Server Version : 50734 (5.7.34)
 File Encoding         : 65001

 Date: 07/10/2023 13:54:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bibit
-- ----------------------------
DROP TABLE IF EXISTS `bibit`;
CREATE TABLE `bibit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `stok` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bibit
-- ----------------------------
BEGIN;
INSERT INTO `bibit` (`id`, `nama`, `satuan`, `stok`) VALUES (1, 'Bibit Kacang', NULL, NULL);
INSERT INTO `bibit` (`id`, `nama`, `satuan`, `stok`) VALUES (2, 'Bibit Semangka', 'kg', '80');
INSERT INTO `bibit` (`id`, `nama`, `satuan`, `stok`) VALUES (3, 'Bibit Cabe Rawit', 'ons', '202');
COMMIT;

-- ----------------------------
-- Table structure for detail_pengajuan
-- ----------------------------
DROP TABLE IF EXISTS `detail_pengajuan`;
CREATE TABLE `detail_pengajuan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pengajuan_id` int(11) unsigned DEFAULT NULL,
  `bibit_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengajuan_id_detail` (`pengajuan_id`),
  CONSTRAINT `pengajuan_id_detail` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detail_pengajuan
-- ----------------------------
BEGIN;
INSERT INTO `detail_pengajuan` (`id`, `pengajuan_id`, `bibit_id`, `jumlah`, `total`) VALUES (5, 6, 2, 20, NULL);
INSERT INTO `detail_pengajuan` (`id`, `pengajuan_id`, `bibit_id`, `jumlah`, `total`) VALUES (6, 6, 3, 20, NULL);
COMMIT;

-- ----------------------------
-- Table structure for pengajuan
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan`;
CREATE TABLE `pengajuan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tgl_validasi` date DEFAULT NULL,
  `tgl_serah_terima` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pengajuan
-- ----------------------------
BEGIN;
INSERT INTO `pengajuan` (`id`, `tanggal`, `nama`, `alamat`, `email`, `status`, `user_id`, `tgl_validasi`, `tgl_serah_terima`) VALUES (6, '2023-10-07', 'CV Tani', 'jl tani', 'tani@gmail.com', '2', 5, '2023-10-07', '2023-10-14');
COMMIT;

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
BEGIN;
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1, 1);
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (2, 2);
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (3, 2);
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (5, 2);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (2, 'pemohon', '2022-10-19 14:20:54', '2022-10-19 14:20:54');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `password_superadmin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `change_password` int(1) unsigned DEFAULT '0' COMMENT '0: belum, 1: sudah',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (1, 'superadmin', NULL, 'superadmin', '2022-11-07 00:40:59', '$2y$10$E9xG1OtIFvBRbHqlwHCC3u48vO5eBf2OQ9wFNpi.qKOAzVqNDUdW2', NULL, NULL, '2022-11-07 00:40:59', '2022-11-06 16:40:59', '$2y$10$tjMANlV25IUwvKuPxEODW.3qE3zPSKjwhmgTcZUgsPDZRGcpgGAN.', NULL, 0);
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (2, 'adi', NULL, 'adi', '2023-10-07 00:31:16', '$2y$10$ZATQR1YfIVarSUKkLjrUEecyLyFFsAXUrHEkHhRT0EYnzWLjeC6Iq', NULL, NULL, '2023-10-07 00:31:16', '2023-10-07 00:31:16', NULL, NULL, 0);
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (3, 'budi', NULL, 'budi', '2023-10-07 00:31:40', '$2y$10$kkjKDl2AJuDqwlM7V2h4ZOJlvctVFL8k5LUAT54f.BIdAjrJSeEuS', NULL, NULL, '2023-10-07 00:31:40', '2023-10-07 00:31:40', NULL, NULL, 0);
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (5, 'abi', NULL, 'abi', '2023-10-07 07:48:40', '$2y$10$en5.nbGUGlIMCtEkI63pquRhee7SefItSmpla4Mgwpydq/rcWEvkS', NULL, NULL, '2023-10-07 07:48:40', '2023-10-07 07:48:40', NULL, NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
