/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50734 (5.7.34)
 Source Host           : localhost:3306
 Source Schema         : yudhi

 Target Server Type    : MySQL
 Target Server Version : 50734 (5.7.34)
 File Encoding         : 65001

 Date: 06/06/2023 16:48:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jaksa
-- ----------------------------
DROP TABLE IF EXISTS `jaksa`;
CREATE TABLE `jaksa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `jkel` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `nrp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jaksa
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for korban
-- ----------------------------
DROP TABLE IF EXISTS `korban`;
CREATE TABLE `korban` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(255) DEFAULT NULL,
  `jkel` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `umur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of korban
-- ----------------------------
BEGIN;
INSERT INTO `korban` (`id`, `nik`, `nama`, `tgl_lahir`, `jkel`, `alamat`, `agama`, `pekerjaan`, `pendidikan`, `umur`) VALUES (2, 'sada', 'dsfa', '2023-05-30', 'L', 'asda', 'ISLAM', 'aasd', 'asda', 'asdfa');
COMMIT;

-- ----------------------------
-- Table structure for kpa
-- ----------------------------
DROP TABLE IF EXISTS `kpa`;
CREATE TABLE `kpa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `penyidik_id` int(11) DEFAULT NULL,
  `tersangka_id` int(11) DEFAULT NULL,
  `korban_id` int(11) DEFAULT NULL,
  `nip_jpu1` varchar(255) DEFAULT NULL,
  `nama_jpu1` varchar(255) DEFAULT NULL,
  `nip_jpu2` varchar(255) DEFAULT NULL,
  `nama_jpu2` varchar(255) DEFAULT NULL,
  `kejadian` varchar(255) DEFAULT NULL,
  `penahanan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pasal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kpa
-- ----------------------------
BEGIN;
INSERT INTO `kpa` (`id`, `penyidik_id`, `tersangka_id`, `korban_id`, `nip_jpu1`, `nama_jpu1`, `nip_jpu2`, `nama_jpu2`, `kejadian`, `penahanan`, `tanggal`, `pasal`, `created_at`, `updated_at`, `unit`) VALUES (1, 2, 1, 2, '67890-', 'gyuhijkl', '78y9ui0o', 'gvhjknl', 'bla bla', '444', '2023-05-30', '67890i-', '2023-05-31 00:22:26', '2023-05-31 00:33:12', 'gvhjbknlm;');
INSERT INTO `kpa` (`id`, `penyidik_id`, `tersangka_id`, `korban_id`, `nip_jpu1`, `nama_jpu1`, `nip_jpu2`, `nama_jpu2`, `kejadian`, `penahanan`, `tanggal`, `pasal`, `created_at`, `updated_at`, `unit`) VALUES (2, 2, 1, 2, 'kk', 'kk', 'kk', 'k', 'lkj', 'jnkjh', '2023-05-30', 'kk', '2023-05-31 00:34:05', '2023-05-31 00:34:05', 'kjkj');
COMMIT;

-- ----------------------------
-- Table structure for kpp
-- ----------------------------
DROP TABLE IF EXISTS `kpp`;
CREATE TABLE `kpp` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `penyidik_id` int(11) DEFAULT NULL,
  `tersangka_id` int(11) DEFAULT NULL,
  `korban_id` int(11) DEFAULT NULL,
  `nip_jpu1` varchar(255) DEFAULT NULL,
  `nama_jpu1` varchar(255) DEFAULT NULL,
  `nip_jpu2` varchar(255) DEFAULT NULL,
  `nama_jpu2` varchar(255) DEFAULT NULL,
  `kejadian` varchar(255) DEFAULT NULL,
  `penahanan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pasal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kpp
-- ----------------------------
BEGIN;
INSERT INTO `kpp` (`id`, `penyidik_id`, `tersangka_id`, `korban_id`, `nip_jpu1`, `nama_jpu1`, `nip_jpu2`, `nama_jpu2`, `kejadian`, `penahanan`, `tanggal`, `pasal`, `created_at`, `updated_at`, `unit`) VALUES (1, 2, 1, 2, '67890-', 'gyuhijkl', '78y9ui0o', 'gvhjknl', '---', '---', '2023-05-30', '67890i-', '2023-05-31 00:22:26', '2023-05-31 00:28:56', 'gvhjbknlm;');
COMMIT;

-- ----------------------------
-- Table structure for penyidik
-- ----------------------------
DROP TABLE IF EXISTS `penyidik`;
CREATE TABLE `penyidik` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `umur` varchar(255) DEFAULT NULL,
  `jkel` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `unit` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penyidik
-- ----------------------------
BEGIN;
INSERT INTO `penyidik` (`id`, `nip`, `nama`, `tgl_lahir`, `umur`, `jkel`, `alamat`, `agama`, `unit`) VALUES (2, '3423', 'dsfdsfdsf', '2023-05-29', '123', 'L', 'asd', 'ISLAM', 'aasdffff');
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
-- Table structure for tersangka
-- ----------------------------
DROP TABLE IF EXISTS `tersangka`;
CREATE TABLE `tersangka` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(255) DEFAULT NULL,
  `jkel` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `umur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tersangka
-- ----------------------------
BEGIN;
INSERT INTO `tersangka` (`id`, `nik`, `nama`, `tgl_lahir`, `jkel`, `alamat`, `agama`, `pekerjaan`, `pendidikan`, `umur`) VALUES (1, 'sdf', 'asd', '2023-05-29', 'P', 'asd', 'PROTESTAN', 'asd', 'das', 'asd');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (1, 'superadmin', NULL, 'superadmin', '2022-11-07 00:40:59', '$2y$10$E9xG1OtIFvBRbHqlwHCC3u48vO5eBf2OQ9wFNpi.qKOAzVqNDUdW2', NULL, NULL, '2022-11-07 00:40:59', '2022-11-06 16:40:59', '$2y$10$tjMANlV25IUwvKuPxEODW.3qE3zPSKjwhmgTcZUgsPDZRGcpgGAN.', NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
