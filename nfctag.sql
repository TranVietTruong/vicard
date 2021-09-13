/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : nfctag

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 12/09/2021 21:27:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for code_tags
-- ----------------------------
DROP TABLE IF EXISTS `code_tags`;
CREATE TABLE `code_tags`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_tag` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of code_tags
-- ----------------------------
INSERT INTO `code_tags` VALUES (2, 123456, '2021-07-17 21:54:51', '2021-07-23 14:42:04', '2021-08-03 10:54:51');
INSERT INTO `code_tags` VALUES (3, 654321, '2021-08-03 10:55:07', '2021-08-03 04:24:28', '2021-08-03 04:24:28');
INSERT INTO `code_tags` VALUES (4, 222222, '2021-09-04 18:21:39', '2021-09-04 11:23:07', '2021-09-04 11:23:07');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (2, '2021_08_30_133117_create_jobs_table', 1);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `thumbnail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'template1', 'https://res.cloudinary.com/truongtv/image/upload/v1630146771/templates/jv7flyzbdhhijfmhdpzp.png', '1', '2021-07-25 15:20:34', '2021-07-25 15:20:37');
INSERT INTO `products` VALUES (4, 'template2', 'https://res.cloudinary.com/truongtv/image/upload/v1630146772/templates/s2gmpypf8bwao7fbxtmg.png', '2', '2021-08-04 10:23:27', '2021-08-04 10:23:30');
INSERT INTO `products` VALUES (5, 'template3', 'https://res.cloudinary.com/truongtv/image/upload/v1630146771/templates/zqqvqv9xmn326zvxsldn.png', '3', '2021-08-11 20:21:48', '2021-08-11 20:21:50');
INSERT INTO `products` VALUES (6, 'template4', 'https://res.cloudinary.com/truongtv/image/upload/v1630146771/templates/iceakopawkfix2cygz6c.png', '4', '2021-08-18 18:40:38', '2021-08-18 18:41:03');
INSERT INTO `products` VALUES (7, 'template5', 'https://res.cloudinary.com/truongtv/image/upload/v1630146770/templates/tbwq0yfhqxcexdb4dk3m.png', '5', '2021-08-18 19:29:43', '2021-08-18 19:29:47');
INSERT INTO `products` VALUES (8, 'template6', 'https://res.cloudinary.com/truongtv/image/upload/v1630146771/templates/mbymttyq2snki0joifzq.png', '6', '2021-08-18 19:52:22', '2021-08-18 19:52:25');
INSERT INTO `products` VALUES (9, 'template7', 'https://res.cloudinary.com/truongtv/image/upload/v1630146772/templates/imx9c0gbj39jxulkkjzt.png', '7', '2021-08-19 20:41:33', '2021-08-19 20:41:37');
INSERT INTO `products` VALUES (10, 'template8', 'https://res.cloudinary.com/truongtv/image/upload/v1630146771/templates/kuz9kjyxysiodzlbwzmr.png', '8', '2021-08-21 11:52:19', '2021-08-21 11:52:22');
INSERT INTO `products` VALUES (11, 'template9', 'https://res.cloudinary.com/truongtv/image/upload/v1630146771/templates/rlmcfwlgntbuc405ovg9.png', '9', '2021-08-23 19:03:19', '2021-08-23 19:03:21');

-- ----------------------------
-- Table structure for type_informations
-- ----------------------------
DROP TABLE IF EXISTS `type_informations`;
CREATE TABLE `type_informations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of type_informations
-- ----------------------------
INSERT INTO `type_informations` VALUES (1, 'name', 'Họ và tên', 'PERSONAL', 0, '2021-07-31 21:22:29', '2021-07-31 21:22:32', NULL);
INSERT INTO `type_informations` VALUES (2, 'about', 'Giới thiệu', 'PERSONAL', 1, '2021-07-31 21:23:08', '2021-07-31 21:23:13', NULL);
INSERT INTO `type_informations` VALUES (8, 'mobilephone', 'Số điện thoại', 'CONTACT', 0, '2021-07-31 21:32:31', '2021-07-31 21:32:34', NULL);
INSERT INTO `type_informations` VALUES (9, 'email', 'Email', 'CONTACT', 1, '2021-07-31 21:32:57', '2021-07-31 21:33:00', NULL);
INSERT INTO `type_informations` VALUES (10, 'facebook', 'Facebook', 'CONTACT', 2, '2021-07-31 21:33:34', '2021-07-31 21:33:37', NULL);
INSERT INTO `type_informations` VALUES (11, 'zalo', 'Zalo', 'CONTACT', 3, '2021-07-31 21:34:18', '2021-07-31 21:34:21', NULL);
INSERT INTO `type_informations` VALUES (12, 'instagram', 'Instagram', 'CONTACT', 4, '2021-07-31 21:35:24', '2021-07-31 21:35:27', NULL);
INSERT INTO `type_informations` VALUES (13, 'youtube', 'Youtube', 'CONTACT', 5, '2021-07-31 21:35:58', '2021-07-31 21:36:02', NULL);
INSERT INTO `type_informations` VALUES (14, 'skype', 'Skype', 'CONTACT', 6, '2021-07-31 21:38:12', '2021-07-31 21:38:15', NULL);
INSERT INTO `type_informations` VALUES (15, 'tiktok', 'Tiktok', 'CONTACT', 7, '2021-07-31 21:38:33', '2021-07-31 21:38:36', NULL);
INSERT INTO `type_informations` VALUES (16, 'momo', 'Ví Momo', 'CONTACT', 8, '2021-07-31 21:39:28', '2021-07-31 21:39:31', NULL);
INSERT INTO `type_informations` VALUES (17, 'shopee', 'Shopee', 'CONTACT', 9, '2021-07-31 21:40:12', '2021-07-31 21:40:14', NULL);
INSERT INTO `type_informations` VALUES (18, 'twitter', 'Twitter', 'CONTACT', 10, '2021-07-31 21:40:52', '2021-07-31 21:40:56', NULL);
INSERT INTO `type_informations` VALUES (19, 'bank', 'Tài khoản ngân hàng', 'CONTACT', 11, '2021-07-31 21:42:07', '2021-07-31 21:42:09', NULL);
INSERT INTO `type_informations` VALUES (20, 'website', 'Website', 'CONTACT', 13, '2021-07-31 21:42:34', '2021-07-31 21:42:36', NULL);
INSERT INTO `type_informations` VALUES (22, 'telegram', 'Telegram', 'CONTACT', 14, '2021-08-01 14:51:40', '2021-08-01 14:51:42', NULL);

-- ----------------------------
-- Table structure for user_infos
-- ----------------------------
DROP TABLE IF EXISTS `user_infos`;
CREATE TABLE `user_infos`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT 50,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 154 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_infos
-- ----------------------------
INSERT INTO `user_infos` VALUES (108, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'CONTACT', 'zalo', '123123123', 3, '2021-08-03 10:45:49', '2021-09-01 08:30:35');
INSERT INTO `user_infos` VALUES (116, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'CONTACT', 'facebook', 'https://www.facebook.com/tvttttttttttttt/', 1, '2021-08-03 14:50:26', '2021-09-01 08:29:31');
INSERT INTO `user_infos` VALUES (119, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'CONTACT', 'instagram', 'insstagram', 4, '2021-08-04 02:28:36', '2021-09-01 08:30:35');
INSERT INTO `user_infos` VALUES (122, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'CONTACT', 'skype', 'helo', 5, '2021-08-04 06:45:40', '2021-09-01 08:27:30');
INSERT INTO `user_infos` VALUES (123, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'CONTACT', 'shopee', 'shoppe', 6, '2021-08-04 06:47:01', '2021-09-01 08:27:30');
INSERT INTO `user_infos` VALUES (124, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'IMAGE', 'avatar', 'http://res.cloudinary.com/truongtv/image/upload/v1630153079/kvteqgutzennnrjwhpkn.png', 50, '2021-08-04 06:49:19', '2021-08-28 12:17:59');
INSERT INTO `user_infos` VALUES (135, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'CONTACT', 'momo', 'qưeniqwen', 7, '2021-08-11 13:45:49', '2021-09-01 08:27:30');
INSERT INTO `user_infos` VALUES (139, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'PERSONAL', 'name', 'Nguyễn Thị Trâm', 50, '2021-08-28 10:07:45', '2021-09-02 08:45:20');
INSERT INTO `user_infos` VALUES (140, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'PERSONAL', 'about', 'Content Writer tôi là một lập trình viên php tôi sẽ kiếm rất nhiều tiền', 50, '2021-08-28 10:08:08', '2021-09-01 10:27:20');
INSERT INTO `user_infos` VALUES (141, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'CONTACT', 'mobilephone', '0123456789', 0, '2021-08-28 10:08:26', '2021-09-01 08:27:30');
INSERT INTO `user_infos` VALUES (142, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'CONTACT', 'email', 'tranviettruong100001@gmail.com', 2, '2021-08-28 10:08:43', '2021-09-01 10:06:12');
INSERT INTO `user_infos` VALUES (143, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'CONTACT', 'bank', 'TPBank - 1458204389 - Chi nhanh Pham Hung', 8, '2021-08-28 10:11:16', '2021-09-02 04:25:24');
INSERT INTO `user_infos` VALUES (151, 'bacdadf8-0b98-4258-86cf-32eff792d547', 'PERSONAL', 'name', 'ádasdasd', 50, '2021-09-04 11:25:56', '2021-09-04 11:25:56');
INSERT INTO `user_infos` VALUES (153, 'h28d0d47-f4e3-4083-98a4-9eb6283e3dju', 'PERSONAL', 'name', 'Họ và tên', 50, '2021-09-12 04:32:30', '2021-09-12 04:32:30');

-- ----------------------------
-- Table structure for user_subscribers
-- ----------------------------
DROP TABLE IF EXISTS `user_subscribers`;
CREATE TABLE `user_subscribers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `subscriber` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_subscribers
-- ----------------------------
INSERT INTO `user_subscribers` VALUES (2, 'e65d0d47-f4e3-4083-98a4-9eb6283e3daa', '[\"dae5d035-63d3-4038-8530-012f7b945a24\",\"1081acd9-2c99-4397-8f0b-3799c1ae0009\"]', '2021-08-29 10:04:32', '2021-08-29 11:08:27');
INSERT INTO `user_subscribers` VALUES (3, 'h28d0d47-f4e3-4083-98a4-9eb6283e3dju', '[\"dae5d035-63d3-4038-8530-012f7b945a24\"]', '2021-09-03 03:53:44', '2021-09-03 03:53:44');
INSERT INTO `user_subscribers` VALUES (4, 'bacdadf8-0b98-4258-86cf-32eff792d547', '[\"dae5d035-63d3-4038-8530-012f7b945a24\"]', '2021-09-04 11:26:03', '2021-09-04 11:26:03');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `code_tag` int(11) NULL DEFAULT NULL,
  `template_code` int(11) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `forget_password_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `code_tag_unique`(`code_tag`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('bacdadf8-0b98-4258-86cf-32eff792d547', 'test', 'test@gmail.com', '$2y$10$d0zkPR1glUb7JvwyZ6DswOxzDBF05kRP6bK5Us7O0uiuJzjdwgExG', 222222, 2, 1, NULL, '2021-09-04 11:23:07', '2021-09-04 11:23:07', NULL);
INSERT INTO `users` VALUES ('e65d0d47-f4e3-4083-98a4-9eb6283e3daa', 'Trần Trưởng', 'tranviettruong100001@gmail.com', '$2y$10$sUjydRtqewgqErypcjnHZecyH.i8LF5eWds9sOP1cLX5zti7MQcVK', 123456, 1, 1, '2021-09-03 10:01:34', '2021-07-24 01:03:23', '2021-09-04 11:17:52', NULL);
INSERT INTO `users` VALUES ('h28d0d47-f4e3-4083-98a4-9eb6283e3dju', 'Trần Viết Trưởng', 'truong123@gmail.com', '$2y$10$zRSKx4ffNYvlV2jXpt6G9.V2bggxejaSREiMQtWmvIlQz.Mrd2B3u', 654321, 2, 1, NULL, '2021-08-03 04:24:28', '2021-08-07 14:43:11', NULL);

SET FOREIGN_KEY_CHECKS = 1;
