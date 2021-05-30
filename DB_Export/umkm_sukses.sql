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

 Date: 30/05/2021 20:28:25
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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_contacts
-- ----------------------------
INSERT INTO `post_contacts` VALUES (9, 33, '234234', 'asdasdasa', '234234', '234234', '234234', 50, 'sds', 'admin', '2021-05-23 13:34:48', 'admin', '2021-05-23 13:35:22');
INSERT INTO `post_contacts` VALUES (10, 35, '+6282134626598', 'Gonilan, Kartasura, Sukoharjo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15820.92509291101!2d110.75605972707521!3d-7.549740912882008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1460c4a12f27%3A0x5027a76e356b3a0!2sGonilan%2C%20Kec.%20Kartasura%2C%20Kabupaten%20Sukoharjo%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1622368791302!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '+6282134626598', 'instagram.com/aezo27', 0, 'Aezo27', 'admin', '2021-05-30 02:49:57', NULL, '2021-05-30 02:49:57');
INSERT INTO `post_contacts` VALUES (11, 36, 'asd', 'asd', 'asd', 'asd', 'asd', 0, 'asd', 'admin', '2021-05-30 02:50:43', NULL, '2021-05-30 02:50:43');
INSERT INTO `post_contacts` VALUES (12, 37, '+6282134626598', 'sdfsdf', 'dfsdfsd', '+6282134626598', 'sdfsdfs', 0, 'aezo27', 'admin', '2021-05-30 20:11:33', NULL, '2021-05-30 20:11:33');

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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_details
-- ----------------------------
INSERT INTO `post_details` VALUES (9, 33, '<p>asdasd edit cuy</p>', 'admin', '2021-05-23 13:34:48', 'admin', '2021-05-23 13:35:22');
INSERT INTO `post_details` VALUES (10, 35, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'admin', '2021-05-30 02:49:57', NULL, '2021-05-30 02:49:57');
INSERT INTO `post_details` VALUES (11, 36, '<p>asd</p>', 'admin', '2021-05-30 02:50:43', NULL, '2021-05-30 02:50:43');
INSERT INTO `post_details` VALUES (12, 37, '<p>Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley. aezo27&nbsp;<strong>asdasdasd&nbsp;<em>sdasdasd&nbsp;<u>asdasdasdasd</u></em></strong></p>', 'admin', '2021-05-30 20:11:32', NULL, '2021-05-30 20:11:32');

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_galeries
-- ----------------------------
INSERT INTO `post_galeries` VALUES (13, 33, NULL, 'kripix-a_1.png', 'kripix-a_2.png', NULL, NULL, NULL, NULL, 'asdasd', 'admin', '2021-05-23 13:34:48', 'admin', '2021-05-23 13:35:22');
INSERT INTO `post_galeries` VALUES (14, 35, NULL, 'product-1_1.png', 'product-1_2.png', 'product-1_3.png', NULL, NULL, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wJ7YKlkdA_A\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'admin', '2021-05-30 02:49:57', NULL, '2021-05-30 02:49:57');
INSERT INTO `post_galeries` VALUES (15, 36, NULL, 'product-2_1.png', NULL, NULL, NULL, NULL, NULL, '', 'admin', '2021-05-30 02:50:43', NULL, '2021-05-30 02:50:43');
INSERT INTO `post_galeries` VALUES (16, 37, NULL, 'kripik-ikan-tengiri_1.png', 'kripik-ikan-tengiri_2.png', NULL, NULL, NULL, NULL, NULL, 'admin', '2021-05-30 20:11:33', NULL, '2021-05-30 20:11:33');

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
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_reviews
-- ----------------------------
INSERT INTO `post_reviews` VALUES (10, 10, 'Wahyu Setyaji Rama Dwijaya', 'asdasdasd', 'aezo27-project_review_10.png', 'admin', '2021-05-14 15:49:18', NULL, '2021-05-14 15:49:18');
INSERT INTO `post_reviews` VALUES (27, 33, 'Rama', 'qweqw', 'kripix-a_review_27.png', 'admin', '2021-05-23 13:51:42', NULL, '2021-05-23 13:51:42');

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
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_tag
-- ----------------------------
INSERT INTO `post_tag` VALUES (39, 35, 2, '2021-05-30 02:49:57', '2021-05-30 02:49:57');
INSERT INTO `post_tag` VALUES (40, 36, 24, '2021-05-30 02:50:43', '2021-05-30 02:50:43');
INSERT INTO `post_tag` VALUES (41, 37, 25, '2021-05-30 20:11:33', '2021-05-30 20:11:33');

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
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (33, 'Kripix a', 'kripix-a', 0, 'Pasif', '1', 'admin', '2021-05-23 13:34:48', 'admin', '2021-05-26 16:33:14');
INSERT INTO `posts` VALUES (35, 'Product 1', 'product-1', 82, 'Aktif', '1', 'admin', '2021-05-30 02:49:57', NULL, '2021-05-30 20:02:22');
INSERT INTO `posts` VALUES (36, 'product 2', 'product-2', 6, 'Aktif', '6', 'admin', '2021-05-30 02:50:43', NULL, '2021-05-30 20:10:25');
INSERT INTO `posts` VALUES (37, 'Kripik ikan tengiri', 'kripik-ikan-tengiri', 4, 'Aktif', '6', 'admin', '2021-05-30 20:11:32', NULL, '2021-05-30 20:15:08');

-- ----------------------------
-- Table structure for setting_contacts
-- ----------------------------
DROP TABLE IF EXISTS `setting_contacts`;
CREATE TABLE `setting_contacts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `text_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `text_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `maps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
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
INSERT INTO `setting_contacts` VALUES (1, 'adas', 'asdas', '+6282134626598', 'Baleharjo\r\nSukodono', 'sads', '+62', 'ramasullivan27@gmail.com', 'Aezo27', '2021-05-26 21:52:50', NULL, '2021-05-26 15:04:43');

-- ----------------------------
-- Table structure for setting_homes
-- ----------------------------
DROP TABLE IF EXISTS `setting_homes`;
CREATE TABLE `setting_homes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `text_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `text_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `text_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `text_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slide_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slide_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slide_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_homes
-- ----------------------------

-- ----------------------------
-- Table structure for setting_webs
-- ----------------------------
DROP TABLE IF EXISTS `setting_webs`;
CREATE TABLE `setting_webs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_webs
-- ----------------------------
INSERT INTO `setting_webs` VALUES (1, 'Aezo27 Project', 'sdfsd', 'sdfsdf', 'Aezo27', '2021-05-26 18:43:28', NULL, '2021-05-26 14:59:13');

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
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (1, 'makanan', '2021-05-13 11:04:40', '2021-05-13 11:04:40');
INSERT INTO `tags` VALUES (2, 'minuman', '2021-05-13 11:04:40', '2021-05-13 11:04:40');
INSERT INTO `tags` VALUES (5, 'Testing', '2021-05-23 07:47:14', '2021-05-23 07:47:14');
INSERT INTO `tags` VALUES (24, 'gorengan', '2021-05-30 02:50:43', '2021-05-30 02:50:43');
INSERT INTO `tags` VALUES (25, 'tenggiri', '2021-05-30 20:11:33', '2021-05-30 20:11:33');

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
