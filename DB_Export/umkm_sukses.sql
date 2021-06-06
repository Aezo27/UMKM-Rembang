/*
 Navicat Premium Data Transfer

 Source Server         : Aezo27
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : umkm_sukses

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 06/06/2021 23:24:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `categories_category_name_unique`(`category_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'minuman', 'admin', '2021-05-26 16:33:09', NULL, '2021-05-26 16:33:09');
INSERT INTO `categories` VALUES (4, 'makanan', 'admin', '2021-05-26 23:42:01', NULL, '2021-05-26 23:42:01');
INSERT INTO `categories` VALUES (6, 'gorengan', 'admin', '2021-05-26 23:44:54', NULL, '2021-05-26 23:44:54');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 118 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (104, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (105, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (106, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (107, '2021_05_02_131239_create_posts_table', 1);
INSERT INTO `migrations` VALUES (108, '2021_05_02_132149_create_post_details_table', 1);
INSERT INTO `migrations` VALUES (109, '2021_05_02_132518_create_post_contacts_table', 1);
INSERT INTO `migrations` VALUES (110, '2021_05_02_132857_create_post_galeries_table', 1);
INSERT INTO `migrations` VALUES (111, '2021_05_02_133030_create_post_reviews_table', 1);
INSERT INTO `migrations` VALUES (112, '2021_05_02_133205_create_setting_webs_table', 1);
INSERT INTO `migrations` VALUES (113, '2021_05_02_133453_create_setting_homes_table', 1);
INSERT INTO `migrations` VALUES (114, '2021_05_02_133714_create_setting_contacts_table', 1);
INSERT INTO `migrations` VALUES (115, '2021_05_02_135549_create_tags_table', 1);
INSERT INTO `migrations` VALUES (116, '2021_05_02_135608_create_post_tags_table', 1);
INSERT INTO `migrations` VALUES (117, '2021_05_09_102348_create_categories_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for post_contacts
-- ----------------------------
DROP TABLE IF EXISTS `post_contacts`;
CREATE TABLE `post_contacts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_post` int NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `clicked` int NOT NULL DEFAULT 0,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_contacts
-- ----------------------------
INSERT INTO `post_contacts` VALUES (9, 33, '234234', 'asdasdasa', '234234', '234234', '234234', 50, 'sds', 'admin', '2021-05-23 13:34:48', 'admin', '2021-05-23 13:35:22');
INSERT INTO `post_contacts` VALUES (10, 35, '+6282134626598', 'Gonilan, Kartasura, Sukoharjo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15820.92509291101!2d110.75605972707521!3d-7.549740912882008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1460c4a12f27%3A0x5027a76e356b3a0!2sGonilan%2C%20Kec.%20Kartasura%2C%20Kabupaten%20Sukoharjo%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1622368791302!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '+6282134626598', 'instagram.com/aezo27', 0, 'Aezo27', 'admin', '2021-05-30 02:49:57', NULL, '2021-05-30 02:49:57');
INSERT INTO `post_contacts` VALUES (11, 36, 'asd', 'asd', 'asd', 'asd', 'asd', 0, 'asd', 'admin', '2021-05-30 02:50:43', NULL, '2021-05-30 02:50:43');
INSERT INTO `post_contacts` VALUES (12, 37, '+6282134626598', 'sdfsdf', 'dfsdfsd', '+6282134626598', 'sdfsdfs', 5, 'aezo27', 'admin', '2021-05-30 20:11:33', NULL, '2021-06-06 16:59:11');
INSERT INTO `post_contacts` VALUES (13, 41, '+6282134626598', 'Baleharjo, Sukodono, Sragen', '1', 'asd', '1', 0, 'aezo27', 'admin', '2021-06-06 13:59:54', NULL, '2021-06-06 13:59:54');
INSERT INTO `post_contacts` VALUES (14, 42, '+6282134626598', 'Baleharjo, Sukodono, Sragen', 'asd', '+62', 'asd', 0, 'asd', 'admin', '2021-06-06 14:00:56', NULL, '2021-06-06 14:00:56');
INSERT INTO `post_contacts` VALUES (15, 43, '+6282134626598', 'Baleharjo, Sukodono, Sragen', '1', '+62', NULL, 0, 'aezo27', 'admin', '2021-06-06 14:08:03', NULL, '2021-06-06 14:08:03');
INSERT INTO `post_contacts` VALUES (16, 44, '82134626598', 'Baleharjo, Sukodono, Sragen', 'asd', 'abc', NULL, 0, 'aezo27', 'admin', '2021-06-06 14:10:41', NULL, '2021-06-06 14:10:41');
INSERT INTO `post_contacts` VALUES (17, 46, '82134626598', 'Baleharjo, Sukodono, Sragen', 'a', 'asd', '1', 0, 'aezo27', 'admin', '2021-06-06 14:12:25', NULL, '2021-06-06 14:12:25');
INSERT INTO `post_contacts` VALUES (18, 47, '+6282134626598', '3FsVW8JKSCCzgFaS3tz3i86rDXTtNheyUm', 'asd', '+62', 'abc', 0, 'asd', 'admin', '2021-06-06 14:13:21', NULL, '2021-06-06 14:13:21');
INSERT INTO `post_contacts` VALUES (19, 49, '+6282134626598', 'Baleharjo, Sukodono, Sragen', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15820.644338882837!2d110.7684061!3d-7.5574086!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x94e9ee936885aeae!2sLPIDB%20UMS!5e0!3m2!1sid!2sid!4v1621775696627!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '+62', '1_edit', 0, 'aezo27', 'admin', '2021-06-06 14:15:27', NULL, '2021-06-06 14:15:27');

-- ----------------------------
-- Table structure for post_details
-- ----------------------------
DROP TABLE IF EXISTS `post_details`;
CREATE TABLE `post_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_post` int NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_details
-- ----------------------------
INSERT INTO `post_details` VALUES (9, 33, '<p>asdasd edit cuy</p>', 'admin', '2021-05-23 13:34:48', 'admin', '2021-05-23 13:35:22');
INSERT INTO `post_details` VALUES (10, 35, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'admin', '2021-05-30 02:49:57', NULL, '2021-05-30 02:49:57');
INSERT INTO `post_details` VALUES (11, 36, '<p>asd</p>', 'admin', '2021-05-30 02:50:43', NULL, '2021-05-30 02:50:43');
INSERT INTO `post_details` VALUES (12, 37, '<p>Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley. aezo27&nbsp;<strong>asdasdasd&nbsp;<em>sdasdasd&nbsp;<u>asdasdasdasd</u></em></strong></p>', 'admin', '2021-05-30 20:11:32', NULL, '2021-05-30 20:11:32');
INSERT INTO `post_details` VALUES (13, 41, '<p>aaa</p>', 'admin', '2021-06-06 13:59:54', NULL, '2021-06-06 13:59:54');
INSERT INTO `post_details` VALUES (14, 42, '<p>Baleharjo, Sukodono, Sragen</p>', 'admin', '2021-06-06 14:00:56', NULL, '2021-06-06 14:00:56');
INSERT INTO `post_details` VALUES (15, 43, '<p>Baleharjo, Sukodono, Sragen</p>', 'admin', '2021-06-06 14:08:03', NULL, '2021-06-06 14:08:03');
INSERT INTO `post_details` VALUES (16, 44, '<p>Baleharjo, Sukodono, Sragen</p>', 'admin', '2021-06-06 14:10:41', NULL, '2021-06-06 14:10:41');
INSERT INTO `post_details` VALUES (18, 46, '<p>Baleharjo, Sukodono, Sragen</p>', 'admin', '2021-06-06 14:12:25', NULL, '2021-06-06 14:12:25');
INSERT INTO `post_details` VALUES (19, 47, '<p>Baleharjo, Sukodono, Sragen</p>', 'admin', '2021-06-06 14:13:21', NULL, '2021-06-06 14:13:21');
INSERT INTO `post_details` VALUES (20, 49, '<p>Baleharjo, Sukodono, Sragen</p>', 'admin', '2021-06-06 14:15:27', NULL, '2021-06-06 14:15:27');

-- ----------------------------
-- Table structure for post_galeries
-- ----------------------------
DROP TABLE IF EXISTS `post_galeries`;
CREATE TABLE `post_galeries`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_post` int NOT NULL,
  `main_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image_5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image_6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `youtube_video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_galeries
-- ----------------------------
INSERT INTO `post_galeries` VALUES (13, 33, NULL, 'kripix-a_1.png', 'kripix-a_2.png', NULL, NULL, NULL, NULL, 'asdasd', 'admin', '2021-05-23 13:34:48', 'admin', '2021-05-23 13:35:22');
INSERT INTO `post_galeries` VALUES (14, 35, NULL, 'product-1_1.png', 'product-1_2.png', 'product-1_3.png', NULL, NULL, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wJ7YKlkdA_A\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'admin', '2021-05-30 02:49:57', NULL, '2021-05-30 02:49:57');
INSERT INTO `post_galeries` VALUES (15, 36, NULL, 'product-2_1.png', NULL, NULL, NULL, NULL, NULL, '', 'admin', '2021-05-30 02:50:43', NULL, '2021-05-30 02:50:43');
INSERT INTO `post_galeries` VALUES (16, 37, NULL, 'kripik-ikan-tengiri_1.png', 'kripik-ikan-tengiri_2.png', NULL, NULL, NULL, NULL, NULL, 'admin', '2021-05-30 20:11:33', NULL, '2021-05-30 20:11:33');
INSERT INTO `post_galeries` VALUES (17, 41, NULL, 'post-2_1.png', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2021-06-06 13:59:54', NULL, '2021-06-06 13:59:54');
INSERT INTO `post_galeries` VALUES (18, 42, NULL, 'product-3_1.png', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2021-06-06 14:00:56', NULL, '2021-06-06 14:00:56');
INSERT INTO `post_galeries` VALUES (19, 43, NULL, 'product-4_1.png', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2021-06-06 14:08:03', NULL, '2021-06-06 14:08:03');
INSERT INTO `post_galeries` VALUES (20, 44, NULL, 'product-5_1.png', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2021-06-06 14:10:41', NULL, '2021-06-06 14:10:41');
INSERT INTO `post_galeries` VALUES (22, 46, NULL, 'product-6_1.png', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2021-06-06 14:12:25', NULL, '2021-06-06 14:12:25');
INSERT INTO `post_galeries` VALUES (23, 47, NULL, 'product-7_1.png', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2021-06-06 14:13:21', NULL, '2021-06-06 14:13:21');
INSERT INTO `post_galeries` VALUES (24, 49, NULL, 'wahyu-setyaji-rama-dwijaya-2_1.png', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2021-06-06 14:15:27', NULL, '2021-06-06 14:15:27');

-- ----------------------------
-- Table structure for post_reviews
-- ----------------------------
DROP TABLE IF EXISTS `post_reviews`;
CREATE TABLE `post_reviews`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_post` int NOT NULL,
  `reviewer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `review_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `review_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_reviews
-- ----------------------------
INSERT INTO `post_reviews` VALUES (10, 10, 'Wahyu Setyaji Rama Dwijaya', 'asdasdasd', 'aezo27-project_review_10.png', 'admin', '2021-05-14 15:49:18', NULL, '2021-05-14 15:49:18');
INSERT INTO `post_reviews` VALUES (27, 33, 'Rama', 'qweqw', 'kripix-a_review_27.png', 'admin', '2021-05-23 13:51:42', NULL, '2021-05-23 13:51:42');
INSERT INTO `post_reviews` VALUES (28, 33, 'Rama 1', 'DFSDFSDSASD', 'kripix-a_review_28.png', 'admin', '2021-05-30 21:39:11', NULL, '2021-05-30 21:39:11');
INSERT INTO `post_reviews` VALUES (29, 33, 'Rama 2', 'DFSDFSDSASD', 'kripix-a_review_28.png', 'admin', '2021-05-30 21:39:11', NULL, '2021-05-30 21:39:11');
INSERT INTO `post_reviews` VALUES (30, 33, 'Rama 4', 'DFSDFSDSASD', 'kripix-a_review_28.png', 'admin', '2021-05-30 21:39:11', NULL, '2021-05-30 21:39:11');
INSERT INTO `post_reviews` VALUES (31, 33, 'Rama 1', 'DFSDFSDSASD', 'kripix-a_review_28.png', 'admin', '2021-05-30 21:39:11', NULL, '2021-05-30 21:39:11');

-- ----------------------------
-- Table structure for post_tag
-- ----------------------------
DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE `post_tag`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_tag
-- ----------------------------
INSERT INTO `post_tag` VALUES (39, 35, 2, '2021-05-30 02:49:57', '2021-05-30 02:49:57');
INSERT INTO `post_tag` VALUES (40, 36, 24, '2021-05-30 02:50:43', '2021-05-30 02:50:43');
INSERT INTO `post_tag` VALUES (41, 37, 25, '2021-05-30 20:11:33', '2021-05-30 20:11:33');
INSERT INTO `post_tag` VALUES (42, 38, 1, NULL, NULL);
INSERT INTO `post_tag` VALUES (43, 41, 1, '2021-06-06 13:59:54', '2021-06-06 13:59:54');
INSERT INTO `post_tag` VALUES (44, 42, 1, '2021-06-06 14:00:56', '2021-06-06 14:00:56');
INSERT INTO `post_tag` VALUES (45, 43, 24, '2021-06-06 14:08:03', '2021-06-06 14:08:03');
INSERT INTO `post_tag` VALUES (46, 44, 1, '2021-06-06 14:10:41', '2021-06-06 14:10:41');
INSERT INTO `post_tag` VALUES (47, 46, 1, '2021-06-06 14:12:25', '2021-06-06 14:12:25');
INSERT INTO `post_tag` VALUES (48, 47, 2, '2021-06-06 14:13:21', '2021-06-06 14:13:21');
INSERT INTO `post_tag` VALUES (49, 49, 2, '2021-06-06 14:15:27', '2021-06-06 14:15:27');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int NOT NULL DEFAULT 0,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pasif',
  `id_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `posts_slug_unique`(`slug`) USING BTREE,
  UNIQUE INDEX `posts_title_unique`(`title`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (33, 'Kripix a', 'kripix-a', 18, 'Aktif', '1', 'admin', '2021-05-23 13:34:48', 'admin', '2021-06-06 22:06:18');
INSERT INTO `posts` VALUES (35, 'Product 1', 'product-1', 88, 'Aktif', '1', 'admin', '2021-05-30 02:49:57', NULL, '2021-06-06 18:19:10');
INSERT INTO `posts` VALUES (36, 'product 2', 'product-2', 6, 'Aktif', '6', 'admin', '2021-05-30 02:50:43', NULL, '2021-05-30 20:10:25');
INSERT INTO `posts` VALUES (37, 'Kripik ikan tengiri', 'kripik-ikan-tengiri', 53, 'Aktif', '6', 'admin', '2021-05-30 20:11:32', NULL, '2021-06-06 18:19:00');
INSERT INTO `posts` VALUES (41, 'Post 2', 'post-2', 0, 'Aktif', '1', 'admin', '2021-06-06 13:59:54', NULL, '2021-06-06 13:59:54');
INSERT INTO `posts` VALUES (42, 'Product 3', 'product-3', 0, 'Aktif', '1', 'admin', '2021-06-06 14:00:56', NULL, '2021-06-06 14:00:56');
INSERT INTO `posts` VALUES (43, 'Product 4', 'product-4', 0, 'Aktif', '6', 'admin', '2021-06-06 14:08:03', NULL, '2021-06-06 14:08:03');
INSERT INTO `posts` VALUES (44, 'Product 5', 'product-5', 0, 'Aktif', '1', 'admin', '2021-06-06 14:10:41', NULL, '2021-06-06 14:10:41');
INSERT INTO `posts` VALUES (46, 'product 6', 'product-6', 0, 'Aktif', '4', 'admin', '2021-06-06 14:12:25', NULL, '2021-06-06 14:12:25');
INSERT INTO `posts` VALUES (47, 'product 7', 'product-7', 0, 'Aktif', '1', 'admin', '2021-06-06 14:13:21', NULL, '2021-06-06 14:13:21');
INSERT INTO `posts` VALUES (49, 'Wahyu Setyaji Rama Dwijaya 2', 'wahyu-setyaji-rama-dwijaya-2', 0, 'Aktif', '1', 'admin', '2021-06-06 14:15:27', NULL, '2021-06-06 14:15:27');

-- ----------------------------
-- Table structure for setting_contacts
-- ----------------------------
DROP TABLE IF EXISTS `setting_contacts`;
CREATE TABLE `setting_contacts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `text_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `text_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `maps` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_contacts
-- ----------------------------
INSERT INTO `setting_contacts` VALUES (1, 'adas', 'asdas', '+6282134626598', 'Baleharjo\r\nSukodono', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15820.621643385013!2d110.7716046!3d-7.5580281!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6786fc41534ba967!2sUniversitas%20Muhammadiyah%20Surakarta!5e0!3m2!1sid!2sid!4v1622993131888!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '+62', 'ramasullivan27@gmail.com', 'Aezo27', '2021-05-26 21:52:50', NULL, '2021-06-06 22:26:43');

-- ----------------------------
-- Table structure for setting_webs
-- ----------------------------
DROP TABLE IF EXISTS `setting_webs`;
CREATE TABLE `setting_webs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `text_home` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `text_about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_webs
-- ----------------------------
INSERT INTO `setting_webs` VALUES (1, 'Aezo27 Project New', 'Website testing skripsi', 'sdfsdf', 'Aezo27 Tampan', 'Lorem', 'Aezo27', '2021-05-26 18:43:28', NULL, '2021-05-30 21:23:58');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `tags_tag_name_unique`(`tag_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (1, 'makanan', '2021-05-13 11:04:40', '2021-05-13 11:04:40');
INSERT INTO `tags` VALUES (2, 'minuman', '2021-05-13 11:04:40', '2021-05-13 11:04:40');
INSERT INTO `tags` VALUES (5, 'Testing', '2021-05-23 07:47:14', '2021-05-23 07:47:14');
INSERT INTO `tags` VALUES (24, 'gorengan', '2021-05-30 02:50:43', '2021-05-30 02:50:43');
INSERT INTO `tags` VALUES (25, 'tenggiri', '2021-05-30 20:11:33', '2021-05-30 20:11:33');
INSERT INTO `tags` VALUES (26, 'geratis', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'ramasullivan27@gmail.com', NULL, '$2y$10$8aDqaNcxe/ViBvYzeuJRUOIhjWCxaMbVfEotZqVaocBSOfrrQYZ/u', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
