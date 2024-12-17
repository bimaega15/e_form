/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : e_form

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 02/08/2024 23:40:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `access_tokens`;
CREATE TABLE `access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `fcm_token` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of access_tokens
-- ----------------------------
INSERT INTO `access_tokens` VALUES (1, '{\"access_token\":\"ya29.c.c0ASRK0Gb47lOm_pqPS80S2bjBm7HsUgGMjHJ0NDsVO02lWQvnhP7xwpiXvaPh1MzVBbuKrtKuh6lxGwpI-zoHTUjMqhmuDjXrI4F3sON4iwC60x-_sL0pjaBF1AxFieNO8xx6HTWfqnCCwYcofviUOtDex2aL9M8manZRf_2fdocBidj0EvAzilUFzgWNjCgSoMXdMA2fr0gMfwxrThUsEtHZ_oQNOX6UFCQ1QeAULkj-YbN5rMFo6hXS1LCLrp0Z90FWm1jIrcu4k2ep7P3XXVVzucweQyx3dOQoAPno0vZ0OQUarOkHKGtOq1UjU8hpd-ZY5NfqLg_dWaSuCrOGCixquQwDHrERlEN4IkakYszwfDhLc68YO-cdT385A0yWk7prebF5QU2fd8w0U4VdfOusjs6lOhZfoSbSbugSxu24WpXghp0fUxju9Z_io02Xe2dW6ltq1jyX76Qebo7j5ikb14ZdhZkxd6_gpnv7Yv9nxMjWf0O6IY_smWka7gZOVtMcRjm_sOpnx4W7hZOtIrxskkcxs5YwQuyX_u_hSX5fO0kuMJdUpS4_t6RJo8OisW6Jt1dmWJpyw3fefwu_f56kd2Qsvqgy3Rg1YU8u7riYmuQBWwJ9JWOlSdcpYy0qRefgUvl02zOtzcdzBp49ItVqijbz_atQo3isefZJBY4IrIY1JuiR96YwudM43gWFqg5xY3pUhmbbRIfRosbY4seJO19yS99tywn0-QeBX333b3gIoh6qs9ddw6ecZpFs8MQh8gg-8nwy_Ruc7apVStwmR6Sdy3sjfgVbVh38bZvcmSs5yu3OkSYB_6Rppw3QMZ7pdiWW7e_2qtmZk5U5lSR-pjzd9RUOSojF6vo6WbvBOqkczQe_1OuWVrJtIqQO-gvsnwd2h5y4-cudyYvRjg1WRiwjtZoVafbmRgpB-iVqORYozIpqX-xl5Yq7t_l_bIJdObZu5h1Wkdvl4f3vqq8hpceneY57nIwVu9enzz0zwjc_e1wFnu0\",\"expires_in\":3599,\"token_type\":\"Bearer\",\"created\":1722614515}', '[{\"fcm_token\":\"fnNaKUfdlviSp2t0dIrBWu:APA91bFAuHAYHs5dWSG81edKqQO1W-53j-tTB3s5GgExKZYH6N9n4IvMe1UQSrD0Vl4wAYRf5i60oSTXqOI4-dQqKn27HwlZ1BNbuzCdISZx6-DknkE6QuTXXvTitSj-6C0Y6fnMF2Ke\",\"user_id\":1,\"status\":0},{\"fcm_token\":\"fnNaKUfdlviSp2t0dIrBWu:APA91bFAuHAYHs5dWSG81edKqQO1W-53j-tTB3s5GgExKZYH6N9n4IvMe1UQSrD0Vl4wAYRf5i60oSTXqOI4-dQqKn27HwlZ1BNbuzCdISZx6-DknkE6QuTXXvTitSj-6C0Y6fnMF2Ke\",\"user_id\":1,\"status\":1},{\"fcm_token\":\"fE2B7VK-WRXenZfw9jR7OC:APA91bFVuj9YSt-m0b0m_Jdr1pjDIeNO9uwuSbIfVxjPRVklzvjiam4085vrLvrWwHZIwRmCKfEKjiFsdG1CwTUZKjVvGj81VYxZ6Tejwd7X47lfu_dVBMJYTxTWN59x8veW-iJC_w0o\",\"user_id\":1,\"status\":1},{\"fcm_token\":\"dAnS298M_v-xwi7WU2lYwU:APA91bHlUVp-IGyvEF7L8irTfm5lv9C4ZrVYB5e-szEPHV3GNPSY2B34ObnD5MGgd9n3eCwcb7fe4vOU0MqwPUHbMFQhG0aayVQK6Znj_LDiF_a6KVWxqLErCRmrmXsvkVpiJCJjWgEA\",\"user_id\":1,\"status\":1},{\"fcm_token\":\"dzqPYk805g7xgY-USss3y0:APA91bHgVxV-nx_WqkLy7BRDTipAwQuClllinReR1Dq_V7xzGYVcc5aspvfXb-oMwFyw-lQHPvtnFhjXEBHDWBxHbf0GdAS39D-y56gS2w6TVbdnWcFSXSR_HRRyci6vwH7fYFI-F4oT\",\"user_id\":1,\"status\":0},{\"fcm_token\":\"cC4G0f3J74o8gDe0iAq1Eu:APA91bE0na0GMk2yoVTQ1LmZqXatZsKBcmkeeLy78IbpFlyNC7AxZHGM2RaOtwgmCEHsb_wgthQpFpNI0KWwnwNqS2oABahpXz574_8SqrTBY4Iid2Tm_APPByBghQ5opmHClOqErGDr\",\"user_id\":1,\"status\":1}]', '2024-07-30 09:40:20', '2024-08-02 23:01:55');

-- ----------------------------
-- Table structure for category_office
-- ----------------------------
DROP TABLE IF EXISTS `category_office`;
CREATE TABLE `category_office`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_category_office` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of category_office
-- ----------------------------
INSERT INTO `category_office` VALUES (1, 'Head Office', NULL, NULL);
INSERT INTO `category_office` VALUES (2, 'Office loh', '2023-11-12 09:01:34', '2023-11-12 09:01:34');
INSERT INTO `category_office` VALUES (3, 'Check Again', '2023-11-12 09:02:37', '2023-11-12 09:02:37');

-- ----------------------------
-- Table structure for data_statis
-- ----------------------------
DROP TABLE IF EXISTS `data_statis`;
CREATE TABLE `data_statis`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_datastatis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_datastatis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisreferensi_datastatis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentid_datastatis` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 439 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of data_statis
-- ----------------------------
INSERT INTO `data_statis` VALUES (3, 'ZN001', 'Africa/Abidjan', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (4, 'ZN002', 'Africa/Accra', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (5, 'ZN003', 'Africa/Addis_Ababa', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (6, 'ZN004', 'Africa/Algiers', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (7, 'ZN005', 'Africa/Asmara', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (8, 'ZN006', 'Africa/Bamako', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (9, 'ZN007', 'Africa/Bangui', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (10, 'ZN008', 'Africa/Banjul', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (11, 'ZN009', 'Africa/Bissau', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (12, 'ZN010', 'Africa/Blantyre', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (13, 'ZN011', 'Africa/Brazzaville', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (14, 'ZN012', 'Africa/Bujumbura', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (15, 'ZN013', 'Africa/Cairo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (16, 'ZN014', 'Africa/Casablanca', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (17, 'ZN015', 'Africa/Ceuta', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (18, 'ZN016', 'Africa/Conakry', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (19, 'ZN017', 'Africa/Dakar', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (20, 'ZN018', 'Africa/Dar_es_Salaam', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (21, 'ZN019', 'Africa/Djibouti', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (22, 'ZN020', 'Africa/Douala', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (23, 'ZN021', 'Africa/El_Aaiun', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (24, 'ZN022', 'Africa/Freetown', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (25, 'ZN023', 'Africa/Gaborone', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (26, 'ZN024', 'Africa/Harare', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (27, 'ZN025', 'Africa/Johannesburg', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (28, 'ZN026', 'Africa/Juba', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (29, 'ZN027', 'Africa/Kampala', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (30, 'ZN028', 'Africa/Khartoum', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (31, 'ZN029', 'Africa/Kigali', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (32, 'ZN030', 'Africa/Kinshasa', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (33, 'ZN031', 'Africa/Lagos', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (34, 'ZN032', 'Africa/Libreville', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (35, 'ZN033', 'Africa/Lome', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (36, 'ZN034', 'Africa/Luanda', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (37, 'ZN035', 'Africa/Lubumbashi', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (38, 'ZN036', 'Africa/Lusaka', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (39, 'ZN037', 'Africa/Malabo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (40, 'ZN038', 'Africa/Maputo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (41, 'ZN039', 'Africa/Maseru', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (42, 'ZN040', 'Africa/Mbabane', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (43, 'ZN041', 'Africa/Mogadishu', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (44, 'ZN042', 'Africa/Monrovia', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (45, 'ZN043', 'Africa/Nairobi', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (46, 'ZN044', 'Africa/Ndjamena', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (47, 'ZN045', 'Africa/Niamey', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (48, 'ZN046', 'Africa/Nouakchott', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (49, 'ZN047', 'Africa/Ouagadougou', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (50, 'ZN048', 'Africa/Porto-Novo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (51, 'ZN049', 'Africa/Sao_Tome', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (52, 'ZN050', 'Africa/Tripoli', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (53, 'ZN051', 'Africa/Tunis', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (54, 'ZN052', 'Africa/Windhoek', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (55, 'ZN053', 'America/Adak', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (56, 'ZN054', 'America/Anchorage', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (57, 'ZN055', 'America/Anguilla', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (58, 'ZN056', 'America/Antigua', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (59, 'ZN057', 'America/Araguaina', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (60, 'ZN058', 'America/Argentina/Buenos_Aires', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (61, 'ZN059', 'America/Argentina/Catamarca', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (62, 'ZN060', 'America/Argentina/Cordoba', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (63, 'ZN061', 'America/Argentina/Jujuy', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (64, 'ZN062', 'America/Argentina/La_Rioja', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (65, 'ZN063', 'America/Argentina/Mendoza', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (66, 'ZN064', 'America/Argentina/Rio_Gallegos', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (67, 'ZN065', 'America/Argentina/Salta', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (68, 'ZN066', 'America/Argentina/San_Juan', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (69, 'ZN067', 'America/Argentina/San_Luis', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (70, 'ZN068', 'America/Argentina/Tucuman', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (71, 'ZN069', 'America/Argentina/Ushuaia', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (72, 'ZN070', 'America/Aruba', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (73, 'ZN071', 'America/Asuncion', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (74, 'ZN072', 'America/Atikokan', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (75, 'ZN073', 'America/Bahia', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (76, 'ZN074', 'America/Bahia_Banderas', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (77, 'ZN075', 'America/Barbados', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (78, 'ZN076', 'America/Belem', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (79, 'ZN077', 'America/Belize', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (80, 'ZN078', 'America/Blanc-Sablon', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (81, 'ZN079', 'America/Boa_Vista', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (82, 'ZN080', 'America/Bogota', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (83, 'ZN081', 'America/Boise', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (84, 'ZN082', 'America/Cambridge_Bay', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (85, 'ZN083', 'America/Campo_Grande', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (86, 'ZN084', 'America/Cancun', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (87, 'ZN085', 'America/Caracas', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (88, 'ZN086', 'America/Cayenne', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (89, 'ZN087', 'America/Cayman', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (90, 'ZN088', 'America/Chicago', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (91, 'ZN089', 'America/Chihuahua', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (92, 'ZN090', 'America/Ciudad_Juarez', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (93, 'ZN091', 'America/Costa_Rica', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (94, 'ZN092', 'America/Creston', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (95, 'ZN093', 'America/Cuiaba', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (96, 'ZN094', 'America/Curacao', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (97, 'ZN095', 'America/Danmarkshavn', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (98, 'ZN096', 'America/Dawson', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (99, 'ZN097', 'America/Dawson_Creek', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (100, 'ZN098', 'America/Denver', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (101, 'ZN099', 'America/Detroit', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (102, 'ZN100', 'America/Dominica', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (103, 'ZN101', 'America/Edmonton', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (104, 'ZN102', 'America/Eirunepe', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (105, 'ZN103', 'America/El_Salvador', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (106, 'ZN104', 'America/Fort_Nelson', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (107, 'ZN105', 'America/Fortaleza', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (108, 'ZN106', 'America/Glace_Bay', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (109, 'ZN107', 'America/Goose_Bay', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (110, 'ZN108', 'America/Grand_Turk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (111, 'ZN109', 'America/Grenada', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (112, 'ZN110', 'America/Guadeloupe', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (113, 'ZN111', 'America/Guatemala', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (114, 'ZN112', 'America/Guayaquil', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (115, 'ZN113', 'America/Guyana', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (116, 'ZN114', 'America/Halifax', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (117, 'ZN115', 'America/Havana', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (118, 'ZN116', 'America/Hermosillo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (119, 'ZN117', 'America/Indiana/Indianapolis', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (120, 'ZN118', 'America/Indiana/Knox', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (121, 'ZN119', 'America/Indiana/Marengo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (122, 'ZN120', 'America/Indiana/Petersburg', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (123, 'ZN121', 'America/Indiana/Tell_City', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (124, 'ZN122', 'America/Indiana/Vevay', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (125, 'ZN123', 'America/Indiana/Vincennes', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (126, 'ZN124', 'America/Indiana/Winamac', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (127, 'ZN125', 'America/Inuvik', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (128, 'ZN126', 'America/Iqaluit', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (129, 'ZN127', 'America/Jamaica', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (130, 'ZN128', 'America/Juneau', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (131, 'ZN129', 'America/Kentucky/Louisville', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (132, 'ZN130', 'America/Kentucky/Monticello', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (133, 'ZN131', 'America/Kralendijk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (134, 'ZN132', 'America/La_Paz', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (135, 'ZN133', 'America/Lima', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (136, 'ZN134', 'America/Los_Angeles', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (137, 'ZN135', 'America/Lower_Princes', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (138, 'ZN136', 'America/Maceio', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (139, 'ZN137', 'America/Managua', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (140, 'ZN138', 'America/Manaus', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (141, 'ZN139', 'America/Marigot', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (142, 'ZN140', 'America/Martinique', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (143, 'ZN141', 'America/Matamoros', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (144, 'ZN142', 'America/Mazatlan', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (145, 'ZN143', 'America/Menominee', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (146, 'ZN144', 'America/Merida', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (147, 'ZN145', 'America/Metlakatla', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (148, 'ZN146', 'America/Mexico_City', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (149, 'ZN147', 'America/Miquelon', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (150, 'ZN148', 'America/Moncton', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (151, 'ZN149', 'America/Monterrey', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (152, 'ZN150', 'America/Montevideo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (153, 'ZN151', 'America/Montserrat', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (154, 'ZN152', 'America/Nassau', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (155, 'ZN153', 'America/New_York', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (156, 'ZN154', 'America/Nome', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (157, 'ZN155', 'America/Noronha', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (158, 'ZN156', 'America/North_Dakota/Beulah', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (159, 'ZN157', 'America/North_Dakota/Center', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (160, 'ZN158', 'America/North_Dakota/New_Salem', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (161, 'ZN159', 'America/Nuuk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (162, 'ZN160', 'America/Ojinaga', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (163, 'ZN161', 'America/Panama', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (164, 'ZN162', 'America/Paramaribo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (165, 'ZN163', 'America/Phoenix', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (166, 'ZN164', 'America/Port-au-Prince', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (167, 'ZN165', 'America/Port_of_Spain', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (168, 'ZN166', 'America/Porto_Velho', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (169, 'ZN167', 'America/Puerto_Rico', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (170, 'ZN168', 'America/Punta_Arenas', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (171, 'ZN169', 'America/Rankin_Inlet', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (172, 'ZN170', 'America/Recife', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (173, 'ZN171', 'America/Regina', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (174, 'ZN172', 'America/Resolute', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (175, 'ZN173', 'America/Rio_Branco', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (176, 'ZN174', 'America/Santarem', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (177, 'ZN175', 'America/Santiago', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (178, 'ZN176', 'America/Santo_Domingo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (179, 'ZN177', 'America/Sao_Paulo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (180, 'ZN178', 'America/Scoresbysund', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (181, 'ZN179', 'America/Sitka', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (182, 'ZN180', 'America/St_Barthelemy', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (183, 'ZN181', 'America/St_Johns', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (184, 'ZN182', 'America/St_Kitts', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (185, 'ZN183', 'America/St_Lucia', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (186, 'ZN184', 'America/St_Thomas', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (187, 'ZN185', 'America/St_Vincent', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (188, 'ZN186', 'America/Swift_Current', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (189, 'ZN187', 'America/Tegucigalpa', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (190, 'ZN188', 'America/Thule', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (191, 'ZN189', 'America/Tijuana', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (192, 'ZN190', 'America/Toronto', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (193, 'ZN191', 'America/Tortola', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (194, 'ZN192', 'America/Vancouver', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (195, 'ZN193', 'America/Whitehorse', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (196, 'ZN194', 'America/Winnipeg', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (197, 'ZN195', 'America/Yakutat', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (198, 'ZN196', 'Antarctica/Casey', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (199, 'ZN197', 'Antarctica/Davis', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (200, 'ZN198', 'Antarctica/DumontDUrville', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (201, 'ZN199', 'Antarctica/Macquarie', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (202, 'ZN200', 'Antarctica/Mawson', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (203, 'ZN201', 'Antarctica/McMurdo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (204, 'ZN202', 'Antarctica/Palmer', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (205, 'ZN203', 'Antarctica/Rothera', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (206, 'ZN204', 'Antarctica/Syowa', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (207, 'ZN205', 'Antarctica/Troll', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (208, 'ZN206', 'Antarctica/Vostok', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (209, 'ZN207', 'Arctic/Longyearbyen', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (210, 'ZN208', 'Asia/Aden', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (211, 'ZN209', 'Asia/Almaty', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (212, 'ZN210', 'Asia/Amman', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (213, 'ZN211', 'Asia/Anadyr', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (214, 'ZN212', 'Asia/Aqtau', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (215, 'ZN213', 'Asia/Aqtobe', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (216, 'ZN214', 'Asia/Ashgabat', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (217, 'ZN215', 'Asia/Atyrau', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (218, 'ZN216', 'Asia/Baghdad', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (219, 'ZN217', 'Asia/Bahrain', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (220, 'ZN218', 'Asia/Baku', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (221, 'ZN219', 'Asia/Bangkok', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (222, 'ZN220', 'Asia/Barnaul', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (223, 'ZN221', 'Asia/Beirut', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (224, 'ZN222', 'Asia/Bishkek', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (225, 'ZN223', 'Asia/Brunei', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (226, 'ZN224', 'Asia/Chita', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (227, 'ZN225', 'Asia/Choibalsan', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (228, 'ZN226', 'Asia/Colombo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (229, 'ZN227', 'Asia/Damascus', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (230, 'ZN228', 'Asia/Dhaka', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (231, 'ZN229', 'Asia/Dili', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (232, 'ZN230', 'Asia/Dubai', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (233, 'ZN231', 'Asia/Dushanbe', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (234, 'ZN232', 'Asia/Famagusta', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (235, 'ZN233', 'Asia/Gaza', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (236, 'ZN234', 'Asia/Hebron', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (237, 'ZN235', 'Asia/Ho_Chi_Minh', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (238, 'ZN236', 'Asia/Hong_Kong', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (239, 'ZN237', 'Asia/Hovd', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (240, 'ZN238', 'Asia/Irkutsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (241, 'ZN239', 'Asia/Jakarta', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (242, 'ZN240', 'Asia/Jayapura', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (243, 'ZN241', 'Asia/Jerusalem', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (244, 'ZN242', 'Asia/Kabul', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (245, 'ZN243', 'Asia/Kamchatka', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (246, 'ZN244', 'Asia/Karachi', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (247, 'ZN245', 'Asia/Kathmandu', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (248, 'ZN246', 'Asia/Khandyga', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (249, 'ZN247', 'Asia/Kolkata', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (250, 'ZN248', 'Asia/Krasnoyarsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (251, 'ZN249', 'Asia/Kuala_Lumpur', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (252, 'ZN250', 'Asia/Kuching', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (253, 'ZN251', 'Asia/Kuwait', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (254, 'ZN252', 'Asia/Macau', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (255, 'ZN253', 'Asia/Magadan', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (256, 'ZN254', 'Asia/Makassar', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (257, 'ZN255', 'Asia/Manila', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (258, 'ZN256', 'Asia/Muscat', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (259, 'ZN257', 'Asia/Nicosia', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (260, 'ZN258', 'Asia/Novokuznetsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (261, 'ZN259', 'Asia/Novosibirsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (262, 'ZN260', 'Asia/Omsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (263, 'ZN261', 'Asia/Oral', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (264, 'ZN262', 'Asia/Phnom_Penh', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (265, 'ZN263', 'Asia/Pontianak', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (266, 'ZN264', 'Asia/Pyongyang', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (267, 'ZN265', 'Asia/Qatar', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (268, 'ZN266', 'Asia/Qostanay', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (269, 'ZN267', 'Asia/Qyzylorda', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (270, 'ZN268', 'Asia/Riyadh', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (271, 'ZN269', 'Asia/Sakhalin', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (272, 'ZN270', 'Asia/Samarkand', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (273, 'ZN271', 'Asia/Seoul', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (274, 'ZN272', 'Asia/Shanghai', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (275, 'ZN273', 'Asia/Singapore', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (276, 'ZN274', 'Asia/Srednekolymsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (277, 'ZN275', 'Asia/Taipei', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (278, 'ZN276', 'Asia/Tashkent', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (279, 'ZN277', 'Asia/Tbilisi', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (280, 'ZN278', 'Asia/Tehran', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (281, 'ZN279', 'Asia/Thimphu', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (282, 'ZN280', 'Asia/Tokyo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (283, 'ZN281', 'Asia/Tomsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (284, 'ZN282', 'Asia/Ulaanbaatar', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (285, 'ZN283', 'Asia/Urumqi', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (286, 'ZN284', 'Asia/Ust-Nera', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (287, 'ZN285', 'Asia/Vientiane', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (288, 'ZN286', 'Asia/Vladivostok', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (289, 'ZN287', 'Asia/Yakutsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (290, 'ZN288', 'Asia/Yangon', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (291, 'ZN289', 'Asia/Yekaterinburg', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (292, 'ZN290', 'Asia/Yerevan', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (293, 'ZN291', 'Atlantic/Azores', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (294, 'ZN292', 'Atlantic/Bermuda', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (295, 'ZN293', 'Atlantic/Canary', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (296, 'ZN294', 'Atlantic/Cape_Verde', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (297, 'ZN295', 'Atlantic/Faroe', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (298, 'ZN296', 'Atlantic/Madeira', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (299, 'ZN297', 'Atlantic/Reykjavik', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (300, 'ZN298', 'Atlantic/South_Georgia', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (301, 'ZN299', 'Atlantic/St_Helena', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (302, 'ZN300', 'Atlantic/Stanley', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (303, 'ZN301', 'Australia/Adelaide', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (304, 'ZN302', 'Australia/Brisbane', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (305, 'ZN303', 'Australia/Broken_Hill', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (306, 'ZN304', 'Australia/Darwin', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (307, 'ZN305', 'Australia/Eucla', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (308, 'ZN306', 'Australia/Hobart', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (309, 'ZN307', 'Australia/Lindeman', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (310, 'ZN308', 'Australia/Lord_Howe', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (311, 'ZN309', 'Australia/Melbourne', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (312, 'ZN310', 'Australia/Perth', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (313, 'ZN311', 'Australia/Sydney', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (314, 'ZN312', 'Europe/Amsterdam', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (315, 'ZN313', 'Europe/Andorra', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (316, 'ZN314', 'Europe/Astrakhan', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (317, 'ZN315', 'Europe/Athens', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (318, 'ZN316', 'Europe/Belgrade', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (319, 'ZN317', 'Europe/Berlin', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (320, 'ZN318', 'Europe/Bratislava', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (321, 'ZN319', 'Europe/Brussels', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (322, 'ZN320', 'Europe/Bucharest', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (323, 'ZN321', 'Europe/Budapest', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (324, 'ZN322', 'Europe/Busingen', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (325, 'ZN323', 'Europe/Chisinau', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (326, 'ZN324', 'Europe/Copenhagen', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (327, 'ZN325', 'Europe/Dublin', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (328, 'ZN326', 'Europe/Gibraltar', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (329, 'ZN327', 'Europe/Guernsey', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (330, 'ZN328', 'Europe/Helsinki', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (331, 'ZN329', 'Europe/Isle_of_Man', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (332, 'ZN330', 'Europe/Istanbul', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (333, 'ZN331', 'Europe/Jersey', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (334, 'ZN332', 'Europe/Kaliningrad', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (335, 'ZN333', 'Europe/Kirov', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (336, 'ZN334', 'Europe/Kyiv', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (337, 'ZN335', 'Europe/Lisbon', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (338, 'ZN336', 'Europe/Ljubljana', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (339, 'ZN337', 'Europe/London', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (340, 'ZN338', 'Europe/Luxembourg', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (341, 'ZN339', 'Europe/Madrid', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (342, 'ZN340', 'Europe/Malta', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (343, 'ZN341', 'Europe/Mariehamn', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (344, 'ZN342', 'Europe/Minsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (345, 'ZN343', 'Europe/Monaco', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (346, 'ZN344', 'Europe/Moscow', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (347, 'ZN345', 'Europe/Oslo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (348, 'ZN346', 'Europe/Paris', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (349, 'ZN347', 'Europe/Podgorica', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (350, 'ZN348', 'Europe/Prague', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (351, 'ZN349', 'Europe/Riga', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (352, 'ZN350', 'Europe/Rome', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (353, 'ZN351', 'Europe/Samara', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (354, 'ZN352', 'Europe/San_Marino', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (355, 'ZN353', 'Europe/Sarajevo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (356, 'ZN354', 'Europe/Saratov', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (357, 'ZN355', 'Europe/Simferopol', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (358, 'ZN356', 'Europe/Skopje', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (359, 'ZN357', 'Europe/Sofia', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (360, 'ZN358', 'Europe/Stockholm', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (361, 'ZN359', 'Europe/Tallinn', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (362, 'ZN360', 'Europe/Tirane', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (363, 'ZN361', 'Europe/Ulyanovsk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (364, 'ZN362', 'Europe/Vaduz', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (365, 'ZN363', 'Europe/Vatican', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (366, 'ZN364', 'Europe/Vienna', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (367, 'ZN365', 'Europe/Vilnius', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (368, 'ZN366', 'Europe/Volgograd', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (369, 'ZN367', 'Europe/Warsaw', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (370, 'ZN368', 'Europe/Zagreb', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (371, 'ZN369', 'Europe/Zurich', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (372, 'ZN370', 'Indian/Antananarivo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (373, 'ZN371', 'Indian/Chagos', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (374, 'ZN372', 'Indian/Christmas', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (375, 'ZN373', 'Indian/Cocos', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (376, 'ZN374', 'Indian/Comoro', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (377, 'ZN375', 'Indian/Kerguelen', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (378, 'ZN376', 'Indian/Mahe', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (379, 'ZN377', 'Indian/Maldives', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (380, 'ZN378', 'Indian/Mauritius', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (381, 'ZN379', 'Indian/Mayotte', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (382, 'ZN380', 'Indian/Reunion', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (383, 'ZN381', 'Pacific/Apia', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (384, 'ZN382', 'Pacific/Auckland', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (385, 'ZN383', 'Pacific/Bougainville', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (386, 'ZN384', 'Pacific/Chatham', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (387, 'ZN385', 'Pacific/Chuuk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (388, 'ZN386', 'Pacific/Easter', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (389, 'ZN387', 'Pacific/Efate', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (390, 'ZN388', 'Pacific/Fakaofo', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (391, 'ZN389', 'Pacific/Fiji', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (392, 'ZN390', 'Pacific/Funafuti', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (393, 'ZN391', 'Pacific/Galapagos', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (394, 'ZN392', 'Pacific/Gambier', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (395, 'ZN393', 'Pacific/Guadalcanal', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (396, 'ZN394', 'Pacific/Guam', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (397, 'ZN395', 'Pacific/Honolulu', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (398, 'ZN396', 'Pacific/Kanton', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (399, 'ZN397', 'Pacific/Kiritimati', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (400, 'ZN398', 'Pacific/Kosrae', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (401, 'ZN399', 'Pacific/Kwajalein', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (402, 'ZN400', 'Pacific/Majuro', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (403, 'ZN401', 'Pacific/Marquesas', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (404, 'ZN402', 'Pacific/Midway', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (405, 'ZN403', 'Pacific/Nauru', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (406, 'ZN404', 'Pacific/Niue', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (407, 'ZN405', 'Pacific/Norfolk', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (408, 'ZN406', 'Pacific/Noumea', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (409, 'ZN407', 'Pacific/Pago_Pago', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (410, 'ZN408', 'Pacific/Palau', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (411, 'ZN409', 'Pacific/Pitcairn', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (412, 'ZN410', 'Pacific/Pohnpei', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (413, 'ZN411', 'Pacific/Port_Moresby', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (414, 'ZN412', 'Pacific/Rarotonga', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (415, 'ZN413', 'Pacific/Saipan', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (416, 'ZN414', 'Pacific/Tahiti', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (417, 'ZN415', 'Pacific/Tarawa', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (418, 'ZN416', 'Pacific/Tongatapu', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (419, 'ZN417', 'Pacific/Wake', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (420, 'ZN418', 'Pacific/Wallis', 'zona_waktu', NULL, NULL, NULL);
INSERT INTO `data_statis` VALUES (421, 'BHS001', 'Bahasa Indonesia', 'bahasa', NULL, '2023-11-19 17:05:04', '2023-11-19 17:05:41');
INSERT INTO `data_statis` VALUES (422, 'BHS002', 'Bahasa Inggris', 'bahasa', NULL, '2023-11-19 17:05:20', '2023-11-19 17:05:20');
INSERT INTO `data_statis` VALUES (424, 'RK001', 'BANK BNI', 'rekening', NULL, '2023-12-09 19:30:13', '2023-12-09 19:30:13');
INSERT INTO `data_statis` VALUES (425, 'RK002', 'BANK BRI', 'rekening', NULL, '2023-12-09 19:35:21', '2023-12-09 19:35:21');
INSERT INTO `data_statis` VALUES (426, 'RK004', 'BANK MANDIRI', 'rekening', NULL, '2023-12-09 19:35:35', '2023-12-09 19:37:55');
INSERT INTO `data_statis` VALUES (427, 'RK003', 'BANK BSI', 'rekening', NULL, '2023-12-09 19:36:31', '2023-12-09 19:37:47');
INSERT INTO `data_statis` VALUES (428, 'RK005', 'BANK BCA', 'rekening', NULL, '2023-12-09 19:38:23', '2023-12-09 19:38:23');
INSERT INTO `data_statis` VALUES (429, 'MT001', 'USD', 'mata_uang', NULL, '2023-12-10 00:50:03', '2023-12-10 00:50:03');
INSERT INTO `data_statis` VALUES (430, 'MT002', 'EUR', 'mata_uang', NULL, '2023-12-10 00:51:48', '2023-12-10 00:51:48');
INSERT INTO `data_statis` VALUES (431, 'MT003', 'GBP', 'mata_uang', NULL, '2023-12-10 00:52:18', '2023-12-10 00:52:18');
INSERT INTO `data_statis` VALUES (432, 'MT004', 'CAD', 'mata_uang', NULL, '2023-12-10 00:52:39', '2023-12-10 00:52:39');
INSERT INTO `data_statis` VALUES (433, 'MT005', 'AUD', 'mata_uang', NULL, '2023-12-10 00:53:02', '2023-12-10 00:53:02');
INSERT INTO `data_statis` VALUES (434, 'MT006', 'JPY', 'mata_uang', NULL, '2023-12-10 00:53:48', '2023-12-10 00:53:48');
INSERT INTO `data_statis` VALUES (435, 'MT007', 'CHF', 'mata_uang', NULL, '2023-12-10 00:54:16', '2023-12-10 00:54:16');
INSERT INTO `data_statis` VALUES (436, 'MT008', 'SGD', 'mata_uang', NULL, '2023-12-10 00:54:36', '2023-12-10 00:54:36');
INSERT INTO `data_statis` VALUES (437, 'MT009', 'KRW', 'mata_uang', NULL, '2023-12-10 00:54:57', '2023-12-10 00:54:57');
INSERT INTO `data_statis` VALUES (438, 'MT010', 'CNY', 'mata_uang', NULL, '2023-12-10 00:55:12', '2023-12-10 00:55:12');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_node` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_children` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `children_jabatan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (2, 'HRD', NULL, NULL, NULL, '2023-11-12 09:52:20', '2023-11-12 09:52:20');
INSERT INTO `jabatan` VALUES (5, 'BOD', NULL, NULL, NULL, '2023-12-16 14:51:48', '2023-12-16 14:51:48');
INSERT INTO `jabatan` VALUES (6, 'Finance', NULL, NULL, NULL, '2023-12-16 14:52:00', '2023-12-16 14:52:00');
INSERT INTO `jabatan` VALUES (7, 'Direktur', NULL, NULL, NULL, '2023-12-16 14:52:09', '2023-12-16 14:52:09');
INSERT INTO `jabatan` VALUES (8, 'Direktur Jenderal', NULL, NULL, NULL, '2023-12-16 14:52:43', '2023-12-16 14:52:43');

-- ----------------------------
-- Table structure for jabatan_unit
-- ----------------------------
DROP TABLE IF EXISTS `jabatan_unit`;
CREATE TABLE `jabatan_unit`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `jabatan_id` int UNSIGNED NOT NULL,
  `unit_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jabatan_unit_jabatan_id_foreign`(`jabatan_id` ASC) USING BTREE,
  INDEX `jabatan_unit_unit_id_foreign`(`unit_id` ASC) USING BTREE,
  CONSTRAINT `jabatan_unit_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jabatan_unit_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jabatan_unit
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_menu` int NULL DEFAULT NULL,
  `nama_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_node` tinyint(1) NOT NULL DEFAULT 0,
  `is_children` tinyint(1) NOT NULL DEFAULT 0,
  `children_menu` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (7, 1, 'Dashboard', '<i data-lucide=\"home\"></i>', 'dashboard', 0, 1, NULL, '2023-11-11 22:44:36', '2023-11-11 23:00:09');
INSERT INTO `menu` VALUES (8, 9, 'Master Data', '<i data-lucide=\"hard-drive\"></i>', '#', 1, 0, '[9,16,11,15,14,13,12,26,10]', '2023-11-11 22:46:28', '2024-06-03 11:15:52');
INSERT INTO `menu` VALUES (9, 10, 'Kategori Office', '<i data-lucide=\"activity\"></i>', 'master/categoryOffice', 0, 1, NULL, '2023-11-11 22:55:40', '2024-06-03 11:15:12');
INSERT INTO `menu` VALUES (10, 18, 'Data Statis', '<i data-lucide=\"activity\"></i>', 'master/dataStatis', 0, 1, NULL, '2023-11-11 22:56:56', '2023-12-16 15:06:18');
INSERT INTO `menu` VALUES (11, 12, 'Data Jabatan', '<i data-lucide=\"activity\"></i>', 'master/jabatan', 0, 1, NULL, '2023-11-11 22:57:25', '2023-12-02 22:04:21');
INSERT INTO `menu` VALUES (12, 16, 'Data Menu', '<i data-lucide=\"activity\"></i>', 'master/menu', 0, 1, NULL, '2023-11-11 22:57:49', '2023-12-02 22:04:21');
INSERT INTO `menu` VALUES (13, 15, 'Metode Pembayaran', '<i data-lucide=\"activity\"></i>', 'master/metodePembayaran', 0, 1, NULL, '2023-11-11 22:58:19', '2023-12-02 22:04:21');
INSERT INTO `menu` VALUES (14, 14, 'Data Produk', '<i data-lucide=\"activity\"></i>', 'master/product', 0, 1, NULL, '2023-11-11 22:58:40', '2023-12-02 22:04:21');
INSERT INTO `menu` VALUES (15, 13, 'Tipe Produk', '<i data-lucide=\"activity\"></i>', 'master/typeProduct', 0, 1, NULL, '2023-11-11 22:59:05', '2023-12-02 22:04:21');
INSERT INTO `menu` VALUES (16, 11, 'Data Unit', '<i data-lucide=\"activity\"></i>', 'master/unit', 0, 1, NULL, '2023-11-11 22:59:57', '2023-12-02 22:04:21');
INSERT INTO `menu` VALUES (17, 4, 'Data Setting', '<i data-lucide=\"inbox\"></i>', '#', 1, 0, '[23,19,20,21]', '2023-11-11 23:22:05', '2024-06-03 11:15:52');
INSERT INTO `menu` VALUES (19, 6, 'Permission', '<i data-lucide=\"activity\"></i>', 'setting/permissions', 0, 1, NULL, '2023-11-11 23:47:03', '2023-12-02 22:04:21');
INSERT INTO `menu` VALUES (20, 7, 'Roles', '<i data-lucide=\"activity\"></i>', 'setting/roles', 0, 1, NULL, '2023-11-11 23:47:33', '2023-12-02 22:04:21');
INSERT INTO `menu` VALUES (21, 8, 'Pengaturan', '<i data-lucide=\"activity\"></i>', 'setting/settings', 0, 1, NULL, '2023-11-11 23:47:53', '2023-12-02 22:04:21');
INSERT INTO `menu` VALUES (22, 20, 'Logout', '<i data-lucide=\"log-out\"></i>', 'logout', 0, 1, NULL, '2023-11-21 07:17:19', '2023-12-17 18:05:45');
INSERT INTO `menu` VALUES (23, 5, 'Data Users', '<i data-lucide=\"activity\"></i>', 'setting/users', 0, 1, NULL, '2023-11-29 01:37:18', '2023-12-02 02:48:42');
INSERT INTO `menu` VALUES (24, 2, 'My Profile', '<i data-lucide=\"users\"></i>', 'myProfile', 0, 1, NULL, '2023-12-02 00:46:13', '2023-12-02 00:46:18');
INSERT INTO `menu` VALUES (25, 3, 'Transaksi', '<i data-lucide=\"send\"></i>', 'transaksi', 0, 1, NULL, '2023-12-02 02:48:25', '2023-12-02 02:48:42');
INSERT INTO `menu` VALUES (26, 17, 'Data Note', '<i data-lucide=\"activity\"></i>', 'master/notes', 0, 1, NULL, '2023-12-16 15:05:21', '2023-12-17 18:05:45');
INSERT INTO `menu` VALUES (27, 19, 'Data Laporan', '<i data-lucide=\"file-text\"></i>', 'laporan', 0, 1, NULL, '2023-12-17 18:05:37', '2023-12-17 20:21:29');

-- ----------------------------
-- Table structure for metode_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `metode_pembayaran`;
CREATE TABLE `metode_pembayaran`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_metode_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of metode_pembayaran
-- ----------------------------
INSERT INTO `metode_pembayaran` VALUES (11, 'Cash', '2023-12-09 19:46:07', '2023-12-09 19:46:07');
INSERT INTO `metode_pembayaran` VALUES (12, 'Transfer', '2023-12-09 19:46:13', '2023-12-09 19:46:13');
INSERT INTO `metode_pembayaran` VALUES (13, 'Virtual Account', '2023-12-09 19:46:20', '2023-12-09 19:46:20');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_10_04_124424_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (6, '2023_10_08_022007_create_settings_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_10_08_042934_create_data_statis_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_10_08_043531_add_foreign_key_to_settings', 1);
INSERT INTO `migrations` VALUES (9, '2023_10_11_154727_create_profiles_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_10_12_004419_create_menus_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_11_04_151419_create_units_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_11_04_151627_create_jabatans_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_11_04_152610_create_jabatan_units_table', 1);
INSERT INTO `migrations` VALUES (14, '2023_11_04_153152_create_type_products_table', 1);
INSERT INTO `migrations` VALUES (15, '2023_11_04_153220_create_products_table', 1);
INSERT INTO `migrations` VALUES (16, '2023_11_04_154027_create_metode_pembayarans_table', 1);
INSERT INTO `migrations` VALUES (17, '2023_11_04_154346_create_category_offices_table', 1);
INSERT INTO `migrations` VALUES (18, '2023_11_04_160648_add_column_to_profile', 1);
INSERT INTO `migrations` VALUES (19, '2023_11_04_163334_create_transactions_table', 1);
INSERT INTO `migrations` VALUES (20, '2023_11_04_164031_create_transaction_details_table', 1);
INSERT INTO `migrations` VALUES (21, '2023_11_04_164653_create_transaction_approvels_table', 1);
INSERT INTO `migrations` VALUES (22, '2023_11_04_192333_add_column_to_product', 2);
INSERT INTO `migrations` VALUES (25, '2023_11_19_221524_add_column_to_settings_table', 3);
INSERT INTO `migrations` VALUES (26, '2023_12_02_031353_add_column_to_transaction', 4);
INSERT INTO `migrations` VALUES (27, '2023_12_02_085440_add_column_to_transaction_detail', 5);
INSERT INTO `migrations` VALUES (28, '2023_12_03_050552_add_column_to_transaction_approvel', 6);
INSERT INTO `migrations` VALUES (29, '2023_12_03_060737_add_column_to_transaction', 7);
INSERT INTO `migrations` VALUES (30, '2023_12_03_112441_add_column_to_transaction_approvel', 8);
INSERT INTO `migrations` VALUES (31, '2023_12_03_144723_add_column_to_transaction', 9);
INSERT INTO `migrations` VALUES (32, '2023_12_09_222640_add_column_to_transaction', 10);
INSERT INTO `migrations` VALUES (33, '2023_12_10_003224_add_column_to_transaction_detail', 11);
INSERT INTO `migrations` VALUES (35, '2023_12_16_151225_create_notes_table', 12);
INSERT INTO `migrations` VALUES (36, '2023_12_17_141434_add_column_notes', 12);
INSERT INTO `migrations` VALUES (38, '2023_12_24_193351_add_column_to_transaction', 13);
INSERT INTO `migrations` VALUES (40, '2023_12_24_230945_add_column_to_transaction', 14);
INSERT INTO `migrations` VALUES (41, '2023_12_29_081854_add_column_to_transaction', 15);
INSERT INTO `migrations` VALUES (42, '2023_12_29_082013_create_over_bookings_table', 15);
INSERT INTO `migrations` VALUES (43, '2024_02_08_142906_add_column_to_over_booking_table', 16);
INSERT INTO `migrations` VALUES (44, '0000_00_00_000000_create_websockets_statistics_entries_table', 17);
INSERT INTO `migrations` VALUES (46, '2024_07_30_093256_create_access_tokens_table', 18);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
INSERT INTO `model_has_permissions` VALUES (382, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (382, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (383, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (383, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (384, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (384, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (385, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (385, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (386, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (386, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (387, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (387, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (388, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (388, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (389, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (389, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (390, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (390, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (391, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (391, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (392, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (392, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (393, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (393, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (394, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (394, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (395, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (395, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (396, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (396, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (397, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (397, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (398, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (398, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (399, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (399, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (400, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (400, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (401, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (401, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (402, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (402, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (403, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (403, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (404, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (404, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (405, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (405, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (406, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (406, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (407, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (407, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (408, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (408, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (409, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (409, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (410, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (410, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (411, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (411, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (412, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (412, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (413, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (413, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (414, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (414, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (415, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (415, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (416, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (416, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (417, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (417, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (418, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (418, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (419, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (419, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (420, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (420, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (421, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (421, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (422, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (422, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (423, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (423, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (424, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (424, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (425, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (425, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (426, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (426, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (427, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (427, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (428, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (428, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (429, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (429, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (430, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (430, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (431, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (431, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (432, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (432, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (433, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (433, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (434, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (434, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (435, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (435, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (436, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (436, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (437, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (437, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (438, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (438, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (439, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (439, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (440, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (440, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (441, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (441, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (442, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (442, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (443, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (443, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (444, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (444, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (445, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (445, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (446, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (446, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (447, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (447, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (448, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (448, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (449, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (449, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (450, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (450, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (451, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (451, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (452, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (452, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (453, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (453, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (454, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (454, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (455, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (455, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (456, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (456, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (457, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (457, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (458, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (458, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (459, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (459, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (460, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (460, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (461, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (461, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (462, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (462, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (463, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (463, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (464, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (464, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (465, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (465, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (466, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (466, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (467, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (467, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (468, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (468, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (469, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (469, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (470, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (470, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (471, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (471, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (472, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (472, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (473, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (473, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (474, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (474, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (475, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (475, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (476, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (476, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (477, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (477, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (478, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (478, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (479, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (479, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (480, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (480, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (481, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (481, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (482, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (482, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (483, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (483, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (484, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (484, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (485, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (485, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (486, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (486, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (487, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (487, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (488, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (488, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (489, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (489, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (490, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (490, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (491, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (491, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (492, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (492, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (493, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (493, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (494, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (494, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (497, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (497, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (498, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (498, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (499, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (499, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (500, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (500, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (501, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (501, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (502, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (502, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (503, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (503, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (504, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (505, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (506, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (507, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (508, 'App\\Models\\User', 10);
INSERT INTO `model_has_permissions` VALUES (509, 'App\\Models\\User', 10);

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 5);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 6);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 7);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 9);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 10);

-- ----------------------------
-- Table structure for notes
-- ----------------------------
DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `keterangan_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_notes` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int UNSIGNED NOT NULL,
  `judul_notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notes_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `notes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of notes
-- ----------------------------
INSERT INTO `notes` VALUES (2, '<p>keterangan notes 1</p>\r\n\r\n<p>&nbsp;</p>', '2023-12-17', '2023-12-17 14:25:15', '2023-12-17 14:25:15', 1, 'Judul notes 1');
INSERT INTO `notes` VALUES (3, '<p>Keterangan notes 2</p>', '2023-12-17', '2023-12-17 14:25:27', '2023-12-17 14:25:27', 1, 'Judul notes 2');
INSERT INTO `notes` VALUES (4, '<p>Keterangan notes 3</p>', '2023-12-17', '2023-12-17 14:25:39', '2023-12-17 14:25:39', 1, 'Judul notes 3');

-- ----------------------------
-- Table structure for over_booking
-- ----------------------------
DROP TABLE IF EXISTS `over_booking`;
CREATE TABLE `over_booking`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaction_id` int UNSIGNED NOT NULL,
  `jenis_over_booking` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `darirekening_booking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilikrekening_booking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuanrekening_booking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemiliktujuan_booking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_booking` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `over_booking_transaction_id_foreign`(`transaction_id` ASC) USING BTREE,
  CONSTRAINT `over_booking_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of over_booking
-- ----------------------------
INSERT INTO `over_booking` VALUES (16, 49, 'Rekening ke Rekening', '38292387', 'Pemilik Rekening - edit', '38297238', 'Pemilik Tujuan - edit', 100000, '2024-02-11 08:44:51', '2024-08-02 23:01:54');
INSERT INTO `over_booking` VALUES (17, 53, 'Rekening ke Rekening', '82397', 'Bima', '8239327', 'Ega', 3000000, '2024-02-14 11:35:01', '2024-02-14 11:35:01');
INSERT INTO `over_booking` VALUES (18, 54, 'Rekening ke Rekening', '23389237', 'pemilik rekening gua', '89873298', 'bca', 300000, '2024-02-14 15:05:27', '2024-08-02 22:59:56');
INSERT INTO `over_booking` VALUES (19, 56, 'Rekening ke Rekening', '5233', 'BBm', '325233', 'boimwe', 3000000, '2024-02-15 19:47:49', '2024-08-02 22:57:17');
INSERT INTO `over_booking` VALUES (20, 57, 'Rekening ke Rekening', '32897', 'Bos bi', '328973', 'Bima', 3223523, '2024-02-15 19:52:22', '2024-08-02 22:34:20');
INSERT INTO `over_booking` VALUES (21, 61, 'Rekening ke Rekening', '32789328', 'Ga ada mungkin begitu', '38283298', 'BCA', 200000, '2024-07-20 20:30:03', '2024-08-02 22:21:01');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 511 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (382, 'register', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (383, 'login', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (384, 'password.request', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (385, 'password.email', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (386, 'password.reset', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (387, 'password.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (388, 'verification.notice', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (389, 'verification.verify', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (390, 'verification.send', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (391, 'password.confirm', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (392, 'password.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (393, 'logout', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (394, 'dashboard.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (395, 'master.dataStatis.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (396, 'master.dataStatis.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (397, 'master.dataStatis.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (398, 'master.dataStatis.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (399, 'master.dataStatis.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (400, 'master.dataStatis.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (401, 'master.dataStatis.parentStatis', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (402, 'master.dataStatis.migrasi', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (403, 'master.menu.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (404, 'master.menu.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (405, 'master.menu.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (406, 'master.menu.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (407, 'master.menu.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (408, 'master.menu.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (409, 'master.menu.renderTree', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (410, 'master.menu.dataTable', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (411, 'master.menu.sortAndNested', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (412, 'master.categoryOffice.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (413, 'master.categoryOffice.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (414, 'master.categoryOffice.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (415, 'master.categoryOffice.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (416, 'master.categoryOffice.show', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (417, 'master.categoryOffice.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (418, 'master.categoryOffice.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (419, 'master.unit.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (420, 'master.unit.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (421, 'master.unit.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (422, 'master.unit.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (423, 'master.unit.show', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (424, 'master.unit.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (425, 'master.unit.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (426, 'master.jabatan.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (427, 'master.jabatan.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (428, 'master.jabatan.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (429, 'master.jabatan.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (430, 'master.jabatan.show', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (431, 'master.jabatan.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (432, 'master.jabatan.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (433, 'master.typeProduct.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (434, 'master.typeProduct.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (435, 'master.typeProduct.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (436, 'master.typeProduct.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (437, 'master.typeProduct.show', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (438, 'master.typeProduct.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (439, 'master.typeProduct.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (440, 'master.product.getAutoCode', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (441, 'master.product.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (442, 'master.product.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (443, 'master.product.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (444, 'master.product.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (445, 'master.product.show', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (446, 'master.product.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (447, 'master.product.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (448, 'master.metodePembayaran.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (449, 'master.metodePembayaran.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (450, 'master.metodePembayaran.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (451, 'master.metodePembayaran.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (452, 'master.metodePembayaran.show', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (453, 'master.metodePembayaran.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (454, 'master.metodePembayaran.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (455, 'setting.settings.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (456, 'setting.settings.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (457, 'setting.settings.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (458, 'setting.settings.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (459, 'setting.settings.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (460, 'setting.settings.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (461, 'setting.settings.checkData', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (462, 'setting.roles.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (463, 'setting.roles.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (464, 'setting.roles.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (465, 'setting.roles.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (466, 'setting.roles.show', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (467, 'setting.roles.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (468, 'setting.roles.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (469, 'setting.permissions.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (470, 'setting.permissions.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (471, 'setting.permissions.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (472, 'setting.permissions.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (473, 'setting.permissions.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (474, 'setting.permissions.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (475, 'setting.assignRoles.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (476, 'setting.assignRoles.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (477, 'setting.assignRoles.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (478, 'setting.assignRoles.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (479, 'setting.assignRoles.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (480, 'setting.assignRoles.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (481, 'setting.users.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (482, 'setting.users.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (483, 'setting.users.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (484, 'setting.users.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (485, 'setting.users.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (486, 'setting.users.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (487, 'setting.users.getUsersProfile', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (488, 'setting.access.index', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (489, 'setting.access.create', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (490, 'setting.access.store', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (491, 'setting.access.edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (492, 'setting.access.update', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (493, 'setting.access.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (494, 'myProfile.index', 'web', '2023-12-02 02:03:19', '2023-12-02 02:03:19');
INSERT INTO `permissions` VALUES (497, 'transaksi.index', 'web', '2023-12-02 08:59:24', '2023-12-02 08:59:24');
INSERT INTO `permissions` VALUES (498, 'transaksi.store', 'web', '2023-12-02 08:59:34', '2023-12-02 08:59:34');
INSERT INTO `permissions` VALUES (499, 'transaksi.create', 'web', '2023-12-02 08:59:45', '2023-12-02 08:59:45');
INSERT INTO `permissions` VALUES (500, 'transaksi.show', 'web', '2023-12-02 08:59:54', '2023-12-02 08:59:54');
INSERT INTO `permissions` VALUES (501, 'transaksi.update', 'web', '2023-12-02 09:00:04', '2023-12-02 09:00:04');
INSERT INTO `permissions` VALUES (502, 'transaksi.destroy', 'web', '2023-12-02 09:00:14', '2023-12-02 09:00:14');
INSERT INTO `permissions` VALUES (503, 'transaksi.edit', 'web', '2023-12-02 09:00:26', '2023-12-02 09:00:26');
INSERT INTO `permissions` VALUES (504, 'master.notes.index', 'web', '2023-12-16 15:36:31', '2023-12-16 15:36:31');
INSERT INTO `permissions` VALUES (505, 'master.notes.store', 'web', '2023-12-16 15:36:40', '2023-12-16 15:36:40');
INSERT INTO `permissions` VALUES (506, 'master.notes.create', 'web', '2023-12-16 15:36:49', '2023-12-16 15:36:49');
INSERT INTO `permissions` VALUES (507, 'master.notes.update', 'web', '2023-12-16 15:36:57', '2023-12-16 15:36:57');
INSERT INTO `permissions` VALUES (508, 'master.notes.destroy', 'web', '2023-12-16 15:37:10', '2023-12-16 15:37:10');
INSERT INTO `permissions` VALUES (509, 'master.notes.edit', 'web', '2023-12-16 15:37:21', '2023-12-16 15:37:21');
INSERT INTO `permissions` VALUES (510, 'laporan.index', 'web', '2023-12-17 20:20:09', '2023-12-17 20:20:09');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 135 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
INSERT INTO `personal_access_tokens` VALUES (1, 'App\\Models\\User', 1, '1', 'e34888adf100a14811fd934178627ce290aaa23f67fd304e9d222a20f41935c6', '[\"*\"]', NULL, NULL, '2023-11-30 22:33:27', '2023-11-30 22:33:27');
INSERT INTO `personal_access_tokens` VALUES (2, 'App\\Models\\User', 1, '1', 'c3c3b335f6a3c1e9f6ed264710f3eae4dcdfe95a34fb07b4409414cc4312d642', '[\"*\"]', NULL, NULL, '2023-11-30 22:34:29', '2023-11-30 22:34:29');
INSERT INTO `personal_access_tokens` VALUES (3, 'App\\Models\\User', 1, '1', 'eb10b3df4309fbd16b2ddcce19d3122369473b2b1de9cfaa8ca68bff73125af2', '[\"*\"]', NULL, NULL, '2023-11-30 22:38:38', '2023-11-30 22:38:38');
INSERT INTO `personal_access_tokens` VALUES (4, 'App\\Models\\User', 1, '1', 'da5083b985d9d83a034d2b94f64de6bddc22593276bedde7640a9d7ba9ac6c09', '[\"*\"]', NULL, NULL, '2023-11-30 22:50:38', '2023-11-30 22:50:38');
INSERT INTO `personal_access_tokens` VALUES (5, 'App\\Models\\User', 1, '1', 'b6af80003685ee9ab703c05d6b9da4492751de69d40be7608fe6d05767a9da80', '[\"*\"]', NULL, NULL, '2023-11-30 22:55:32', '2023-11-30 22:55:32');
INSERT INTO `personal_access_tokens` VALUES (6, 'App\\Models\\User', 1, '1', 'd5d690b868baf30d8f84136f58f0551b6523c851481866fa2fa4d99252a60100', '[\"*\"]', NULL, NULL, '2023-11-30 22:55:53', '2023-11-30 22:55:53');
INSERT INTO `personal_access_tokens` VALUES (7, 'App\\Models\\User', 1, '1', '711b556a43d52879f730303dbc2636aeec5606a4d0fe5c087ead71cb1ea6e43b', '[\"*\"]', NULL, NULL, '2023-11-30 22:56:19', '2023-11-30 22:56:19');
INSERT INTO `personal_access_tokens` VALUES (8, 'App\\Models\\User', 1, '1', '266577c21cf1999bf2ff27bd898bff2d1169170725deff8c6fe89a480659a82c', '[\"*\"]', NULL, NULL, '2023-11-30 22:57:48', '2023-11-30 22:57:48');
INSERT INTO `personal_access_tokens` VALUES (9, 'App\\Models\\User', 1, '1', '05c30919582dc4690c25d682787aaa4dd03a4624aa12ac9d318b0fe60949b04e', '[\"*\"]', NULL, NULL, '2023-11-30 22:58:53', '2023-11-30 22:58:53');
INSERT INTO `personal_access_tokens` VALUES (10, 'App\\Models\\User', 1, '1', '3850c247ef6d2f12c2d1f24cdd02be943f7526d35d2cd51d65a6d8ca83df1a55', '[\"*\"]', NULL, NULL, '2023-11-30 22:59:29', '2023-11-30 22:59:29');
INSERT INTO `personal_access_tokens` VALUES (11, 'App\\Models\\User', 1, '1', '0e123f39eb1a3f5c7dbfa878547836143b6d2751897080342e7751b90843e51e', '[\"*\"]', NULL, NULL, '2023-11-30 23:00:08', '2023-11-30 23:00:08');
INSERT INTO `personal_access_tokens` VALUES (12, 'App\\Models\\User', 1, '1', '426bd9111d0196803d6edf9aec50ee647d1249c536d68a92ada18bac0ba3bb75', '[\"*\"]', NULL, NULL, '2023-11-30 23:00:23', '2023-11-30 23:00:23');
INSERT INTO `personal_access_tokens` VALUES (13, 'App\\Models\\User', 1, '1', '516e73af21f06594258b880653ae0127345cb5447851e74b43505d7be2b3cab4', '[\"*\"]', NULL, NULL, '2023-11-30 23:01:11', '2023-11-30 23:01:11');
INSERT INTO `personal_access_tokens` VALUES (14, 'App\\Models\\User', 1, '1', 'c897805f360fae29c49490947c3c3f8757b2de4931b7fc5aa881f4560ba77740', '[\"*\"]', NULL, NULL, '2023-11-30 23:01:45', '2023-11-30 23:01:45');
INSERT INTO `personal_access_tokens` VALUES (15, 'App\\Models\\User', 1, '1', '27e2199655291e63412a2852620e0b5aeb21d734982703d7a6a9f7a3bdacde06', '[\"*\"]', NULL, NULL, '2023-11-30 23:01:57', '2023-11-30 23:01:57');
INSERT INTO `personal_access_tokens` VALUES (16, 'App\\Models\\User', 1, '1', '1c994ee080a2cc25ffcc64390ef11bf2b8c86910268dfc241a1f66ee31157157', '[\"*\"]', NULL, NULL, '2023-11-30 23:02:11', '2023-11-30 23:02:11');
INSERT INTO `personal_access_tokens` VALUES (17, 'App\\Models\\User', 1, '1', 'd1d3515f2da2c1c5cb14f4f00c329a104b8973eb906999cdc893a69c31274fde', '[\"*\"]', NULL, NULL, '2023-11-30 23:02:27', '2023-11-30 23:02:27');
INSERT INTO `personal_access_tokens` VALUES (18, 'App\\Models\\User', 1, '1', '7800f786d0211ee33d06da2f06c1328fc9a68c16dadfcbe0d69a73a517aaa145', '[\"*\"]', NULL, NULL, '2023-11-30 23:02:37', '2023-11-30 23:02:37');
INSERT INTO `personal_access_tokens` VALUES (19, 'App\\Models\\User', 1, '1', '898b10eb1a2a020065431e5ebdf09c946e8c400cac0802a3a01232a6e1c3815b', '[\"*\"]', NULL, NULL, '2023-11-30 23:03:21', '2023-11-30 23:03:21');
INSERT INTO `personal_access_tokens` VALUES (20, 'App\\Models\\User', 1, '1', '15cd7f3a1c415243f49d3b9c141d8ae585384fb4fbcba8554c1823482177bc08', '[\"*\"]', NULL, NULL, '2023-11-30 23:03:37', '2023-11-30 23:03:37');
INSERT INTO `personal_access_tokens` VALUES (21, 'App\\Models\\User', 1, '1', 'c3d5875445151b368d76b0cdbf0581eda4deb141c5895d1f3789283903fff6b2', '[\"*\"]', NULL, NULL, '2023-11-30 23:04:59', '2023-11-30 23:04:59');
INSERT INTO `personal_access_tokens` VALUES (22, 'App\\Models\\User', 1, '1', '55720e5fdc945fbd7c237419fcc949207bafd6ebfda58ab403043b164a81b700', '[\"*\"]', NULL, NULL, '2023-11-30 23:08:12', '2023-11-30 23:08:12');
INSERT INTO `personal_access_tokens` VALUES (23, 'App\\Models\\User', 1, '1', '5882ffc004625cdb9adc7759f2fb266fdea83861fb338ef77e9a23b8f8d20a92', '[\"*\"]', NULL, NULL, '2023-11-30 23:08:56', '2023-11-30 23:08:56');
INSERT INTO `personal_access_tokens` VALUES (24, 'App\\Models\\User', 1, '1', '248f5da166ece7a769f9e7d7b41bbf42e3faf6b3ef7c64441336adf6305b1a14', '[\"*\"]', '2023-12-01 00:16:08', NULL, '2023-11-30 23:09:15', '2023-12-01 00:16:08');
INSERT INTO `personal_access_tokens` VALUES (25, 'App\\Models\\User', 1, '1', '7ecb561f82e1177d5bc2b122e972437de4013153a4b7a42ebcd85715882520fd', '[\"*\"]', NULL, NULL, '2023-12-03 14:08:10', '2023-12-03 14:08:10');
INSERT INTO `personal_access_tokens` VALUES (26, 'App\\Models\\User', 1, '1', 'b6a0d45d8818f1d63745d77f7950c6ed5d590fd378bddb0a56151453ed77453e', '[\"*\"]', '2023-12-03 17:50:17', NULL, '2023-12-03 14:09:14', '2023-12-03 17:50:17');
INSERT INTO `personal_access_tokens` VALUES (27, 'App\\Models\\User', 9, '9', '812707a08906034c065be5a96c89d5bb5e0803a35cec355305d7a3469f7fe64f', '[\"*\"]', '2023-12-03 22:16:10', NULL, '2023-12-03 17:51:18', '2023-12-03 22:16:10');
INSERT INTO `personal_access_tokens` VALUES (28, 'App\\Models\\User', 9, '9', '7d9837957b26f0393e5f585935d74cafff755a79b77c93e80ccc2a8040d7ea4b', '[\"*\"]', '2023-12-03 22:22:46', NULL, '2023-12-03 22:16:24', '2023-12-03 22:22:46');
INSERT INTO `personal_access_tokens` VALUES (29, 'App\\Models\\User', 9, '9', '872b3187eb32c8b25749c2099a9a12cab74c8e9b0704f4b92c68d0d7b21d73a4', '[\"*\"]', '2023-12-03 23:34:51', NULL, '2023-12-03 22:23:37', '2023-12-03 23:34:51');
INSERT INTO `personal_access_tokens` VALUES (30, 'App\\Models\\User', 9, '9', '4f83b67409c7a0e48bcf26e4c30938b83116b451e19454d6545a2e0efe903cdf', '[\"*\"]', '2024-01-01 01:25:42', NULL, '2024-01-01 00:22:25', '2024-01-01 01:25:42');
INSERT INTO `personal_access_tokens` VALUES (31, 'App\\Models\\User', 9, '9', 'fffd3a8b57e9a80f1124d34f5b108d5b58757add6928f2b0dec478a79e924037', '[\"*\"]', NULL, NULL, '2024-01-28 07:36:48', '2024-01-28 07:36:48');
INSERT INTO `personal_access_tokens` VALUES (32, 'App\\Models\\User', 9, '9', 'bf173a9ac546719f0f8cdb0284f4ce2cbc48de66a81ce94bcd3f0b206cfdaedc', '[\"*\"]', NULL, NULL, '2024-01-28 07:37:31', '2024-01-28 07:37:31');
INSERT INTO `personal_access_tokens` VALUES (33, 'App\\Models\\User', 1, '1', '075730f60f162f40e575a76cea636ceb494120f4aee94c8f03e4ad9fa4811d6f', '[\"*\"]', NULL, NULL, '2024-01-30 21:43:49', '2024-01-30 21:43:49');
INSERT INTO `personal_access_tokens` VALUES (34, 'App\\Models\\User', 1, '1', 'bde298a271001d1964e76aa48a29d366ff1ada87863bcffd164c34f9b2753099', '[\"*\"]', NULL, NULL, '2024-01-30 21:44:06', '2024-01-30 21:44:06');
INSERT INTO `personal_access_tokens` VALUES (35, 'App\\Models\\User', 1, '1', 'a959408dd3953f36c59672a7b25b85a7a590b798123614706f4c51f08dbad680', '[\"*\"]', NULL, NULL, '2024-01-30 22:06:28', '2024-01-30 22:06:28');
INSERT INTO `personal_access_tokens` VALUES (36, 'App\\Models\\User', 1, '1', '18e5e97a53d59a30e8778d29e7d3af9120dda6e4170b51abadf8d3f812b507bf', '[\"*\"]', NULL, NULL, '2024-01-30 22:09:35', '2024-01-30 22:09:35');
INSERT INTO `personal_access_tokens` VALUES (37, 'App\\Models\\User', 1, '1', '03c7f95d75139d78b5032c469893db8bb8e3fc213bb2116542ab4cc630eca11b', '[\"*\"]', NULL, NULL, '2024-01-30 22:10:50', '2024-01-30 22:10:50');
INSERT INTO `personal_access_tokens` VALUES (38, 'App\\Models\\User', 1, '1', 'f2c737a842c3aff57d1a44f24b33d7d3b53f373cb25b8cbb93fa12eb1e0f66bd', '[\"*\"]', NULL, NULL, '2024-01-30 22:11:44', '2024-01-30 22:11:44');
INSERT INTO `personal_access_tokens` VALUES (39, 'App\\Models\\User', 1, '1', 'c4473aefe67c52339afba9838035cb3e13cc63c1dd554635d4be19ff9581c36b', '[\"*\"]', NULL, NULL, '2024-01-30 22:14:20', '2024-01-30 22:14:20');
INSERT INTO `personal_access_tokens` VALUES (40, 'App\\Models\\User', 1, '1', '132ae702a89694d0f6230cab5838b4381dda64348f0dbb666366458983b5d119', '[\"*\"]', NULL, NULL, '2024-01-30 22:14:55', '2024-01-30 22:14:55');
INSERT INTO `personal_access_tokens` VALUES (41, 'App\\Models\\User', 1, '1', 'f39054eb4e4653f4065e0635152e1ff0bd848634ecccc5905544bcc0b1fc8d9c', '[\"*\"]', NULL, NULL, '2024-01-30 22:15:34', '2024-01-30 22:15:34');
INSERT INTO `personal_access_tokens` VALUES (42, 'App\\Models\\User', 1, '1', '51233ddf48524d18eae62e4c5a05f0d3f60f51ac6599f442dcc0e1b9e6d7e0b8', '[\"*\"]', NULL, NULL, '2024-01-30 22:17:26', '2024-01-30 22:17:26');
INSERT INTO `personal_access_tokens` VALUES (43, 'App\\Models\\User', 1, '1', '3d8adc257fedda56b84201538a0604d79bee29e4fddea268fe5662bc0a85d156', '[\"*\"]', NULL, NULL, '2024-01-30 22:43:22', '2024-01-30 22:43:22');
INSERT INTO `personal_access_tokens` VALUES (44, 'App\\Models\\User', 1, '1', 'd32633eb637fe21b52b761c1cb589e52d53b2948c67c6dda1161b5b52c31f12b', '[\"*\"]', NULL, NULL, '2024-01-30 22:47:19', '2024-01-30 22:47:19');
INSERT INTO `personal_access_tokens` VALUES (45, 'App\\Models\\User', 1, '1', 'c9145b8d7c25d992f12f5dbb5500d413759403ab123f9dd80b2611faed9f3668', '[\"*\"]', NULL, NULL, '2024-01-30 22:48:11', '2024-01-30 22:48:11');
INSERT INTO `personal_access_tokens` VALUES (46, 'App\\Models\\User', 1, '1', 'd6f385fb0165e40bf0a1cdbef23ed7e66970e114b1ba3a79be8cdd991f84a6e2', '[\"*\"]', NULL, NULL, '2024-01-30 22:48:52', '2024-01-30 22:48:52');
INSERT INTO `personal_access_tokens` VALUES (47, 'App\\Models\\User', 1, '1', '6ba32d0f1aa3ee92f95e905327857e5d6d359352312df2140d19955dcab06f9b', '[\"*\"]', NULL, NULL, '2024-01-30 23:01:13', '2024-01-30 23:01:13');
INSERT INTO `personal_access_tokens` VALUES (48, 'App\\Models\\User', 1, '1', 'b27e00ee3b981f26bf04d8e48ebf6746e512e5c50a6c519894be112b1abdfa40', '[\"*\"]', NULL, NULL, '2024-01-30 23:03:26', '2024-01-30 23:03:26');
INSERT INTO `personal_access_tokens` VALUES (49, 'App\\Models\\User', 1, '1', '8ce4a63ac84d6b2e9d60e6169c0c1e67292ff9c57fad95423757079e6236ff7f', '[\"*\"]', NULL, NULL, '2024-01-30 23:10:55', '2024-01-30 23:10:55');
INSERT INTO `personal_access_tokens` VALUES (50, 'App\\Models\\User', 1, '1', 'e060ea2c59fce0c372d5393a5e0124e42c1e44acfce028e550e3f0d914100d50', '[\"*\"]', NULL, NULL, '2024-01-30 23:11:20', '2024-01-30 23:11:20');
INSERT INTO `personal_access_tokens` VALUES (51, 'App\\Models\\User', 1, '1', 'bee653838e6c3488883632c16bc953eed325f599f8be09930c293f79c1345fde', '[\"*\"]', NULL, NULL, '2024-01-31 06:25:41', '2024-01-31 06:25:41');
INSERT INTO `personal_access_tokens` VALUES (52, 'App\\Models\\User', 1, '1', '92738fb2b8df72a1933c52c8e0b601cbad8ae2eeb19682db1b2c3886eb4b775d', '[\"*\"]', NULL, NULL, '2024-01-31 06:26:49', '2024-01-31 06:26:49');
INSERT INTO `personal_access_tokens` VALUES (53, 'App\\Models\\User', 1, '1', 'c392d058c9f8b0c44b3e6f0df71b2e14f29d460e4fa14798221703b06d1932e5', '[\"*\"]', NULL, NULL, '2024-01-31 06:27:10', '2024-01-31 06:27:10');
INSERT INTO `personal_access_tokens` VALUES (54, 'App\\Models\\User', 1, '1', '3c898c7a45725dce9bda616230b00f5a6f318450d61f3ded16981815a68734e2', '[\"*\"]', NULL, NULL, '2024-01-31 06:28:27', '2024-01-31 06:28:27');
INSERT INTO `personal_access_tokens` VALUES (55, 'App\\Models\\User', 1, '1', 'd613b7ea130b9dcf78da576ccf942a6524a8f9c40e36d3496904ab90327a3798', '[\"*\"]', NULL, NULL, '2024-01-31 06:29:04', '2024-01-31 06:29:04');
INSERT INTO `personal_access_tokens` VALUES (56, 'App\\Models\\User', 1, '1', 'f1b37af5529762f037a743b4c4724771c6ba6796e1486a93d18371c914c5904c', '[\"*\"]', NULL, NULL, '2024-01-31 06:29:26', '2024-01-31 06:29:26');
INSERT INTO `personal_access_tokens` VALUES (57, 'App\\Models\\User', 1, '1', '2a22d5aa8de8a63f0b2dd64be2dbd040517ebee46a609504d49acfa8aaa31455', '[\"*\"]', NULL, NULL, '2024-01-31 07:03:00', '2024-01-31 07:03:00');
INSERT INTO `personal_access_tokens` VALUES (58, 'App\\Models\\User', 1, '1', '37c350d483251cc58c66ad2f82e8b9f33d76004990eba59594c3aa6442eb2bdf', '[\"*\"]', NULL, NULL, '2024-01-31 07:12:43', '2024-01-31 07:12:43');
INSERT INTO `personal_access_tokens` VALUES (59, 'App\\Models\\User', 1, '1', '00532f15d4b9d8d3ede5bd853887c7dc975b55e2f02cc2aa7ff206b11a32c63b', '[\"*\"]', NULL, NULL, '2024-01-31 07:14:16', '2024-01-31 07:14:16');
INSERT INTO `personal_access_tokens` VALUES (60, 'App\\Models\\User', 1, '1', '1be3c53ea43e4d41f55e30859bb6423a5725ee88110baccc9307036aa98b21ed', '[\"*\"]', NULL, NULL, '2024-01-31 07:14:51', '2024-01-31 07:14:51');
INSERT INTO `personal_access_tokens` VALUES (61, 'App\\Models\\User', 1, '1', '0a7b71f2c4836f48d28594a8e7df23f10e2aa83c63be43aa6aabd8e2c50e2867', '[\"*\"]', NULL, NULL, '2024-01-31 07:15:45', '2024-01-31 07:15:45');
INSERT INTO `personal_access_tokens` VALUES (62, 'App\\Models\\User', 1, '1', '4a777aa36cf72b67832700847aca639f6f11aa39b238cd771b6475fe2f06738a', '[\"*\"]', NULL, NULL, '2024-01-31 07:16:32', '2024-01-31 07:16:32');
INSERT INTO `personal_access_tokens` VALUES (63, 'App\\Models\\User', 1, '1', '9a6feb8259f19a17054c19734677cff56b021042707bc8db1d9eba8c3342dcdb', '[\"*\"]', NULL, NULL, '2024-01-31 07:16:59', '2024-01-31 07:16:59');
INSERT INTO `personal_access_tokens` VALUES (64, 'App\\Models\\User', 1, '1', 'e43293171a9798e4563b33cf937df6c34d9cafead7cfd14b7eeecf579d08b75a', '[\"*\"]', NULL, NULL, '2024-01-31 07:17:30', '2024-01-31 07:17:30');
INSERT INTO `personal_access_tokens` VALUES (65, 'App\\Models\\User', 1, '1', '23bfb0cdb97d468c7406111e4d0faee96fd3c13058229a2de38a3449368dd953', '[\"*\"]', NULL, NULL, '2024-01-31 07:17:38', '2024-01-31 07:17:38');
INSERT INTO `personal_access_tokens` VALUES (66, 'App\\Models\\User', 1, '1', '884f2120d27b875ef16b32b5ccaffd584f9f962302383048b0dc452afe40feb1', '[\"*\"]', NULL, NULL, '2024-01-31 07:17:58', '2024-01-31 07:17:58');
INSERT INTO `personal_access_tokens` VALUES (67, 'App\\Models\\User', 1, '1', 'bc0f239652b567e8c8f453582c183151416422063733d7d2355a3ffa1c2ddd3e', '[\"*\"]', NULL, NULL, '2024-01-31 07:20:58', '2024-01-31 07:20:58');
INSERT INTO `personal_access_tokens` VALUES (68, 'App\\Models\\User', 1, '1', 'f27154f30a24335aa9abe27ccc00848890d495aee7088c42652a3dfc860a8ea7', '[\"*\"]', NULL, NULL, '2024-01-31 07:38:34', '2024-01-31 07:38:34');
INSERT INTO `personal_access_tokens` VALUES (69, 'App\\Models\\User', 1, '1', '0b744087f2558743580960f7a3e9c13791f22a2854a179c63d7512bb325f9e1a', '[\"*\"]', NULL, NULL, '2024-01-31 07:38:54', '2024-01-31 07:38:54');
INSERT INTO `personal_access_tokens` VALUES (70, 'App\\Models\\User', 1, '1', '5894ce35f3ef8d8b7d968a348d991812c8a4d4bcdf7e080e885435b90081c663', '[\"*\"]', NULL, NULL, '2024-01-31 07:45:29', '2024-01-31 07:45:29');
INSERT INTO `personal_access_tokens` VALUES (71, 'App\\Models\\User', 1, '1', '822f6bfaf41b1b61f73a434ffae2b8597e6d6a787ef1a75e71b0fc298cc2558c', '[\"*\"]', NULL, NULL, '2024-01-31 07:47:19', '2024-01-31 07:47:19');
INSERT INTO `personal_access_tokens` VALUES (72, 'App\\Models\\User', 1, '1', 'b1ed6a676f5a11e5b200be77022d2daf7ec3f12223721807d68670dd47ed1370', '[\"*\"]', NULL, NULL, '2024-01-31 07:48:21', '2024-01-31 07:48:21');
INSERT INTO `personal_access_tokens` VALUES (73, 'App\\Models\\User', 1, '1', 'feb080b1d9859c5967881a31dfadbb18ff12f7ad5992b1d38b6ac28f66589695', '[\"*\"]', NULL, NULL, '2024-01-31 07:52:24', '2024-01-31 07:52:24');
INSERT INTO `personal_access_tokens` VALUES (74, 'App\\Models\\User', 1, '1', '1de70d4c9cd3eb6d286de4ee2c87684ee3921bbbaf68fb92d7fc1bf66d9fa531', '[\"*\"]', NULL, NULL, '2024-01-31 08:00:09', '2024-01-31 08:00:09');
INSERT INTO `personal_access_tokens` VALUES (75, 'App\\Models\\User', 1, '1', '20a821cd42e4dc6f1afda0258d804a828741a04cb9be90b4c26cb37efa1d82f7', '[\"*\"]', NULL, NULL, '2024-02-01 20:29:56', '2024-02-01 20:29:56');
INSERT INTO `personal_access_tokens` VALUES (76, 'App\\Models\\User', 1, '1', '4b617ad6f1021fdd964c247614c1159cfc9fa6ad146bd786ca72a0d4616ff6d2', '[\"*\"]', NULL, NULL, '2024-02-01 20:31:39', '2024-02-01 20:31:39');
INSERT INTO `personal_access_tokens` VALUES (77, 'App\\Models\\User', 1, '1', '966fe7d69ec10c8ce1702fe93ad033765145ca45a987f1a86116982d71bef0bb', '[\"*\"]', NULL, NULL, '2024-02-01 20:34:36', '2024-02-01 20:34:36');
INSERT INTO `personal_access_tokens` VALUES (78, 'App\\Models\\User', 1, '1', '7288107cf879d68baf9b5d2ba5c6b77461b1b1d7d42dfe6d4e7f23c2a5d2ffdf', '[\"*\"]', NULL, NULL, '2024-02-01 20:36:40', '2024-02-01 20:36:40');
INSERT INTO `personal_access_tokens` VALUES (79, 'App\\Models\\User', 1, '1', 'b5184b4583e6bb8e4058529232d344975d2d47a871054e6510003d106bde9120', '[\"*\"]', NULL, NULL, '2024-02-01 20:44:21', '2024-02-01 20:44:21');
INSERT INTO `personal_access_tokens` VALUES (80, 'App\\Models\\User', 1, '1', 'f35d19258254e932657c40427caf0a59d88f1c6ea78d749027ce98191450cacc', '[\"*\"]', NULL, NULL, '2024-02-01 20:44:47', '2024-02-01 20:44:47');
INSERT INTO `personal_access_tokens` VALUES (81, 'App\\Models\\User', 1, '1', '3e6153154f3183e7f11d888a0f5091c422d65a9a9fe4edb42b6092791c79bf42', '[\"*\"]', NULL, NULL, '2024-02-01 20:45:19', '2024-02-01 20:45:19');
INSERT INTO `personal_access_tokens` VALUES (82, 'App\\Models\\User', 1, '1', 'f74b1c17af716644bc53e270f0f07fd8df1a4ba1bf79f975ce4ad14df573b759', '[\"*\"]', NULL, NULL, '2024-02-01 20:48:34', '2024-02-01 20:48:34');
INSERT INTO `personal_access_tokens` VALUES (83, 'App\\Models\\User', 1, '1', '3d14a50373d53dfbc5838f2b619dc242f15b713b8ba20b935fe1b7a30bee53ff', '[\"*\"]', NULL, NULL, '2024-02-01 20:48:43', '2024-02-01 20:48:43');
INSERT INTO `personal_access_tokens` VALUES (84, 'App\\Models\\User', 1, '1', 'ecb21aef30a1143cffbd22568cff2806f4d2f6c6d42673bc810b8f5a02837274', '[\"*\"]', NULL, NULL, '2024-02-01 21:35:11', '2024-02-01 21:35:11');
INSERT INTO `personal_access_tokens` VALUES (85, 'App\\Models\\User', 1, '1', '86d2d19eafc59dd0e400c5456d0cb661c21fb4b173e35098be9815b4e7c5e80a', '[\"*\"]', NULL, NULL, '2024-02-01 21:41:56', '2024-02-01 21:41:56');
INSERT INTO `personal_access_tokens` VALUES (86, 'App\\Models\\User', 1, '1', 'fc968ffdc35009058dea79052355a2d299d837c0f6fa15dd2c528bb7929dcac3', '[\"*\"]', '2024-02-01 23:55:22', NULL, '2024-02-01 21:42:22', '2024-02-01 23:55:22');
INSERT INTO `personal_access_tokens` VALUES (87, 'App\\Models\\User', 1, '1', 'd891f20aadf51bdabd39612626a2e663c297d10d547a586e254fb4952df04462', '[\"*\"]', '2024-02-15 15:55:41', NULL, '2024-02-01 22:11:17', '2024-02-15 15:55:41');
INSERT INTO `personal_access_tokens` VALUES (88, 'App\\Models\\User', 1, '1', '09932bdc90d1e4916b07e743dbcde3a1a61a8a52a7950880cc7617ed308bb6bd', '[\"*\"]', NULL, NULL, '2024-02-02 06:02:59', '2024-02-02 06:02:59');
INSERT INTO `personal_access_tokens` VALUES (89, 'App\\Models\\User', 1, '1', '2a99b193fc844aa06d21de4d1a0fa5555f25171d4814d429f3702e6db6e15365', '[\"*\"]', NULL, NULL, '2024-02-02 06:28:04', '2024-02-02 06:28:04');
INSERT INTO `personal_access_tokens` VALUES (90, 'App\\Models\\User', 1, '1', '904f59c277eeeb32b379ff1ac218b8829347a7c46f2376a7641548bb2b5c0830', '[\"*\"]', NULL, NULL, '2024-02-02 06:30:46', '2024-02-02 06:30:46');
INSERT INTO `personal_access_tokens` VALUES (91, 'App\\Models\\User', 1, '1', '11cdafb658449e108b1c9266732efaaa3c79b37b9502bfb48de731c3d08e3102', '[\"*\"]', NULL, NULL, '2024-02-02 06:31:02', '2024-02-02 06:31:02');
INSERT INTO `personal_access_tokens` VALUES (92, 'App\\Models\\User', 1, '1', 'f9b66647e04f8b9217e791119510c5ffa73c72136ccf13d8d961df7d3f6289c6', '[\"*\"]', '2024-02-02 06:36:38', NULL, '2024-02-02 06:36:37', '2024-02-02 06:36:38');
INSERT INTO `personal_access_tokens` VALUES (93, 'App\\Models\\User', 1, '1', 'f3b6474bab4fab56ca34186ca161e4bf340cfcd30aab57d693a86a4e5ecc26ca', '[\"*\"]', '2024-02-02 06:38:58', NULL, '2024-02-02 06:37:56', '2024-02-02 06:38:58');
INSERT INTO `personal_access_tokens` VALUES (94, 'App\\Models\\User', 1, '1', 'e3e1fcdc6c77f93d7ef26e053bb7181aab7c0af1617d1139d5d3c43eb5b41b68', '[\"*\"]', NULL, NULL, '2024-02-02 06:40:01', '2024-02-02 06:40:01');
INSERT INTO `personal_access_tokens` VALUES (95, 'App\\Models\\User', 1, '1', 'c5fb537a7bfcdaeabdeb21b559756bebd37f225b4317525ae7e913cafda90d08', '[\"*\"]', '2024-02-02 06:42:16', NULL, '2024-02-02 06:41:46', '2024-02-02 06:42:16');
INSERT INTO `personal_access_tokens` VALUES (96, 'App\\Models\\User', 1, '1', '6eca8a08ae5cfbb46158a697cae52603c93a87e01d0361f5edb573875574d9b2', '[\"*\"]', '2024-02-02 06:42:40', NULL, '2024-02-02 06:42:34', '2024-02-02 06:42:40');
INSERT INTO `personal_access_tokens` VALUES (97, 'App\\Models\\User', 1, '1', '810c2eb3b159f619fcae3af6ce7e1d0d286144ae436f0c1bd4347f753ff671d8', '[\"*\"]', '2024-02-02 06:43:03', NULL, '2024-02-02 06:42:58', '2024-02-02 06:43:03');
INSERT INTO `personal_access_tokens` VALUES (98, 'App\\Models\\User', 1, '1', 'e55c3f2e227169f3e0ef533423615f2848be864276e394acd51d2f95932bc4f0', '[\"*\"]', NULL, NULL, '2024-02-02 06:51:57', '2024-02-02 06:51:57');
INSERT INTO `personal_access_tokens` VALUES (99, 'App\\Models\\User', 1, '1', '4fb7583376a337084c04c2c3bb8a847bac390d4f39ad1ee3c9957f62a2b7511f', '[\"*\"]', '2024-02-07 15:27:45', NULL, '2024-02-02 06:52:43', '2024-02-07 15:27:45');
INSERT INTO `personal_access_tokens` VALUES (100, 'App\\Models\\User', 1, '1', 'f300c4b89a11a71d5fd7560934e69a076e323f2794f2a4ef7739620da5117346', '[\"*\"]', NULL, NULL, '2024-02-04 08:22:01', '2024-02-04 08:22:01');
INSERT INTO `personal_access_tokens` VALUES (101, 'App\\Models\\User', 1, '1', '99b9d9c18f2cee0408732f5d26558ce580f92d4c382297105c33ad6adf53faed', '[\"*\"]', '2024-02-16 01:55:27', NULL, '2024-02-04 08:26:04', '2024-02-16 01:55:27');
INSERT INTO `personal_access_tokens` VALUES (102, 'App\\Models\\User', 1, '1', '43fbc74d9c6df8dccb38eab093ad4de6c3d51e71a56ee0fcfb982ac090a243d5', '[\"*\"]', '2024-02-07 15:32:01', NULL, '2024-02-07 15:31:56', '2024-02-07 15:32:01');
INSERT INTO `personal_access_tokens` VALUES (103, 'App\\Models\\User', 1, '1', 'e188a77994175f890986416fdefd9dcd60c69c78e7c6d7b634621bf24b5cced0', '[\"*\"]', '2024-02-14 21:25:59', NULL, '2024-02-07 15:39:16', '2024-02-14 21:25:59');
INSERT INTO `personal_access_tokens` VALUES (104, 'App\\Models\\User', 1, '1', 'f7a9df23401a7a40803c60325ffc41b8ba347504e9ac1b00b72c1987ac9cc8af', '[\"*\"]', '2024-02-09 02:53:27', NULL, '2024-02-09 02:50:44', '2024-02-09 02:53:27');
INSERT INTO `personal_access_tokens` VALUES (105, 'App\\Models\\User', 1, '1', '95bf329d370d254f895f8ab722e9f17ac142bb6675e95f2c9bd5a9ab30161f2b', '[\"*\"]', '2024-02-09 02:59:06', NULL, '2024-02-09 02:57:25', '2024-02-09 02:59:06');
INSERT INTO `personal_access_tokens` VALUES (106, 'App\\Models\\User', 1, '1', 'ab309f164b226780f87a81817301534f86d189d42c5aab8ab222ec9cb2fbaad5', '[\"*\"]', '2024-02-14 21:26:57', NULL, '2024-02-14 21:26:50', '2024-02-14 21:26:57');
INSERT INTO `personal_access_tokens` VALUES (107, 'App\\Models\\User', 1, '1', 'b6d2ecc62e7737e8d7c384cd6602523d8f34f625f4d1711ff223f31328a28c3f', '[\"*\"]', '2024-02-14 21:29:22', NULL, '2024-02-14 21:29:17', '2024-02-14 21:29:22');
INSERT INTO `personal_access_tokens` VALUES (108, 'App\\Models\\User', 1, '1', 'ff1beac8ccc35c0a77a52d0feb61163f76558cdd3cea5b744265b6e19e0133d9', '[\"*\"]', '2024-02-14 21:30:19', NULL, '2024-02-14 21:30:17', '2024-02-14 21:30:19');
INSERT INTO `personal_access_tokens` VALUES (109, 'App\\Models\\User', 1, '1', '848ce566f9da9d5459893dbc63af82adedbd81bce757aec57e37c9bb319679e9', '[\"*\"]', '2024-02-14 21:32:42', NULL, '2024-02-14 21:32:41', '2024-02-14 21:32:42');
INSERT INTO `personal_access_tokens` VALUES (110, 'App\\Models\\User', 1, '1', 'f9c45fa1f998c349b43c6ddf3f061aa37570494862d4df124debeffd28ac8438', '[\"*\"]', '2024-02-14 21:37:42', NULL, '2024-02-14 21:37:36', '2024-02-14 21:37:42');
INSERT INTO `personal_access_tokens` VALUES (111, 'App\\Models\\User', 1, '1', 'ccf160f196fdf2c6f879a776e2c8b2cc2bbd2934318d239ab15d34004b12ebd2', '[\"*\"]', '2024-02-14 21:37:57', NULL, '2024-02-14 21:37:55', '2024-02-14 21:37:57');
INSERT INTO `personal_access_tokens` VALUES (112, 'App\\Models\\User', 1, '1', 'd13d009eba919219599e7d12fe68c21657e1823b9ba52d461a936bbf1c62d0ad', '[\"*\"]', '2024-02-14 21:41:19', NULL, '2024-02-14 21:41:17', '2024-02-14 21:41:19');
INSERT INTO `personal_access_tokens` VALUES (113, 'App\\Models\\User', 1, '1', 'f8e25a90dcdf2f3463ecf7cf4d4ca1bcc0d6ad01d56fd236616a375a51e037ab', '[\"*\"]', '2024-02-14 21:42:27', NULL, '2024-02-14 21:41:49', '2024-02-14 21:42:27');
INSERT INTO `personal_access_tokens` VALUES (114, 'App\\Models\\User', 1, '1', '44116fa728820189cb497fd9a203fbc4a23a2177a4892917dccf4fee2b6ae150', '[\"*\"]', '2024-02-14 21:42:52', NULL, '2024-02-14 21:42:51', '2024-02-14 21:42:52');
INSERT INTO `personal_access_tokens` VALUES (115, 'App\\Models\\User', 1, '1', '7b2e1f4677cf781b9277a5852792ac873d639dafc7680bd48a2071ead4d6fe3e', '[\"*\"]', NULL, NULL, '2024-02-14 21:43:07', '2024-02-14 21:43:07');
INSERT INTO `personal_access_tokens` VALUES (116, 'App\\Models\\User', 1, '1', '06171355c098e0a2dad7dfd683268503b710e590cd619a24042a006341512915', '[\"*\"]', '2024-04-18 16:05:26', NULL, '2024-02-14 21:45:45', '2024-04-18 16:05:26');
INSERT INTO `personal_access_tokens` VALUES (117, 'App\\Models\\User', 1, '1', 'cd589f61cd7d2a3726637c1e01059798e12100e9289fc85b3224338f9f6ce8cc', '[\"*\"]', '2024-02-16 08:12:38', NULL, '2024-02-15 23:19:01', '2024-02-16 08:12:38');
INSERT INTO `personal_access_tokens` VALUES (118, 'App\\Models\\User', 1, '1', '1639306c28203bc3477b568e4cef2c4ee97afe3807bbf901bdd4f0729ca40811', '[\"*\"]', '2024-07-27 18:56:51', NULL, '2024-07-21 12:01:05', '2024-07-27 18:56:51');
INSERT INTO `personal_access_tokens` VALUES (119, 'App\\Models\\User', 1, '1', '7f7bafebf89a5461a4ddc0e516ff369db6f5a76df0e15142e8519c9ab1e18c83', '[\"*\"]', '2024-07-21 12:17:34', NULL, '2024-07-21 12:15:22', '2024-07-21 12:17:34');
INSERT INTO `personal_access_tokens` VALUES (120, 'App\\Models\\User', 1, '1', 'f24424fd2bb457e06354f8f39e07315d6a99a7a64f86f58f10ce849e03d7869e', '[\"*\"]', '2024-07-27 23:13:20', NULL, '2024-07-27 23:13:15', '2024-07-27 23:13:20');
INSERT INTO `personal_access_tokens` VALUES (121, 'App\\Models\\User', 1, '1', '2ca37a66387da36e6d6734ab6d8c0c560beef57ec51acc98c362fd3dac6d7b7b', '[\"*\"]', '2024-07-31 07:37:11', NULL, '2024-07-27 23:13:17', '2024-07-31 07:37:11');
INSERT INTO `personal_access_tokens` VALUES (122, 'App\\Models\\User', 1, '1', '4407a7f60227857a916165ab35bf22cb974ff319054bf3efe2ad51934b614ffd', '[\"*\"]', '2024-07-31 07:52:10', NULL, '2024-07-31 07:40:55', '2024-07-31 07:52:10');
INSERT INTO `personal_access_tokens` VALUES (123, 'App\\Models\\User', 1, '1', 'cff4c2d28d6d5315f52bd4b4dc21a6c135d6a82b400e9aed4c1ffcb954456421', '[\"*\"]', '2024-07-31 07:55:40', NULL, '2024-07-31 07:52:26', '2024-07-31 07:55:40');
INSERT INTO `personal_access_tokens` VALUES (124, 'App\\Models\\User', 1, '1', '5993a2add77b6ea46427b689650afe9c9060f1e45056f2e0fdc0fe26c7bda058', '[\"*\"]', '2024-07-31 07:57:27', NULL, '2024-07-31 07:55:51', '2024-07-31 07:57:27');
INSERT INTO `personal_access_tokens` VALUES (125, 'App\\Models\\User', 1, '1', '4d63c31571efffe7574164be0da4404056cc4e1c6453bc4f72735869e3da2ca1', '[\"*\"]', '2024-08-01 10:40:32', NULL, '2024-07-31 07:57:37', '2024-08-01 10:40:32');
INSERT INTO `personal_access_tokens` VALUES (126, 'App\\Models\\User', 1, '1', '09c353a4a0337c5ded9dd0df757abb629fac8fd11d956571de8d39f5f193717d', '[\"*\"]', '2024-08-01 10:14:46', NULL, '2024-08-01 10:04:18', '2024-08-01 10:14:46');
INSERT INTO `personal_access_tokens` VALUES (127, 'App\\Models\\User', 1, '1', '392e937b124dbdf85a9b6e2b6d792dbb393b22b827dd2787ec5d66a1a4bc4e43', '[\"*\"]', '2024-08-01 10:46:22', NULL, '2024-08-01 10:41:05', '2024-08-01 10:46:22');
INSERT INTO `personal_access_tokens` VALUES (128, 'App\\Models\\User', 1, '1', 'd0a58324b52b5fe72d86d2396c2c0913f20b6abd3fd864badd668f73a5c40d8a', '[\"*\"]', '2024-08-01 10:49:38', NULL, '2024-08-01 10:46:40', '2024-08-01 10:49:38');
INSERT INTO `personal_access_tokens` VALUES (129, 'App\\Models\\User', 1, '1', '41739750f07ac005e71365ca4eea02be6252e7d51b1f52b44dfd74a0ce595693', '[\"*\"]', '2024-08-01 10:56:29', NULL, '2024-08-01 10:51:01', '2024-08-01 10:56:29');
INSERT INTO `personal_access_tokens` VALUES (130, 'App\\Models\\User', 1, '1', '60e4af9cd79f98a97504ed0f9aaa7176b535816e4f870887865a8db49621f248', '[\"*\"]', '2024-08-01 11:08:12', NULL, '2024-08-01 11:06:47', '2024-08-01 11:08:12');
INSERT INTO `personal_access_tokens` VALUES (131, 'App\\Models\\User', 1, '1', 'c6646da2ef31d0dbed0f93a7a26b5a3ef920d11b22032e28738a256a5474714b', '[\"*\"]', '2024-08-01 11:28:45', NULL, '2024-08-01 11:08:26', '2024-08-01 11:28:45');
INSERT INTO `personal_access_tokens` VALUES (132, 'App\\Models\\User', 1, '1', '18fd76867f6ef1698957552d98b1d0ce34c02be3dc861d90922c6206c77d8e52', '[\"*\"]', NULL, NULL, '2024-08-02 21:17:53', '2024-08-02 21:17:53');
INSERT INTO `personal_access_tokens` VALUES (133, 'App\\Models\\User', 1, '1', '0498a87e0cd360802e517da2fd3d60e2006228444e852b5824d9a10fe8d929da', '[\"*\"]', NULL, NULL, '2024-08-02 21:20:20', '2024-08-02 21:20:20');
INSERT INTO `personal_access_tokens` VALUES (134, 'App\\Models\\User', 1, '1', 'f37348abb9622c3f452329b7b7b32eb9a24b0606fc7007df3588f8ae422604bc', '[\"*\"]', NULL, NULL, '2024-08-02 21:30:55', '2024-08-02 21:30:55');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `code_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `specification_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_product_id` int UNSIGNED NOT NULL,
  `quantity_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit_goods_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `size_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gross_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `net_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit_size_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gross_uom_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `net_uom_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (2, 'P001', 'PRODUCT-001', 'Kapasitas-A', 'SPESIFIKASI-001', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (3, 'P002', 'PRODUCT-002', 'Kapasitas-B', 'SPESIFIKASI-002', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (4, 'P003', 'PRODUCT-003', 'Kapasitas-A', 'SPESIFIKASI-003', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (5, 'P004', 'PRODUCT-004', 'Kapasitas-B', 'SPESIFIKASI-004', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (6, 'P005', 'PRODUCT-005', 'KAPASITAS-001', 'SPESIFIKASI-005', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (7, 'P006', 'PRODUCT-006', 'KAPASITAS-002', 'SPESIFIKASI-006', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (8, 'P007', 'PRODUCT-007', 'KAPASITAS-003', 'SPESIFIKASI-007', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (9, 'P008', 'PRODUCT-008', 'KAPASITAS-004', 'SPESIFIKASI-008', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (10, 'P009', 'PRODUCT-009', 'KAPASITAS-005', 'SPESIFIKASI-009', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (11, 'P010', 'PRODUCT-010', 'KAPASITAS-006', 'SPESIFIKASI-010', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (12, 'P011', 'PRODUCT-011', 'KAPASITAS-007', 'SPESIFIKASI-011', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (13, 'P012', 'PRODUCT-012', 'KAPASITAS-008', 'SPESIFIKASI-012', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (14, 'P013', 'PRODUCT-013', 'KAPASITAS-009', 'SPESIFIKASI-013', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (15, 'P014', 'PRODUCT-014', 'KAPASITAS-010', 'SPESIFIKASI-014', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (16, 'P015', 'PRODUCT-015', 'KAPASITAS-011', 'SPESIFIKASI-015', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (17, 'P016', 'PRODUCT-016', 'KAPASITAS-012', 'SPESIFIKASI-016', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (18, 'P017', 'PRODUCT-017', 'KAPASITAS-013', 'SPESIFIKASI-017', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (19, 'P018', 'PRODUCT-018', 'KAPASITAS-014', 'SPESIFIKASI-018', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (20, 'P019', 'PRODUCT-019', 'KAPASITAS-015', 'SPESIFIKASI-019', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (21, 'P020', 'PRODUCT-020', 'KAPASITAS-016', 'SPESIFIKASI-020', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (22, 'P021', 'PRODUCT-021', 'KAPASITAS-017', 'SPESIFIKASI-021', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (23, 'P022', 'PRODUCT-022', 'KAPASITAS-018', 'SPESIFIKASI-022', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (24, 'P023', 'PRODUCT-023', 'KAPASITAS-019', 'SPESIFIKASI-023', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (25, 'P024', 'PRODUCT-024', 'KAPASITAS-020', 'SPESIFIKASI-024', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (26, 'P025', 'PRODUCT-025', 'KAPASITAS-021', 'SPESIFIKASI-025', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (27, 'P026', 'PRODUCT-026', 'KAPASITAS-022', 'SPESIFIKASI-026', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');
INSERT INTO `products` VALUES (28, 'P027', 'PRODUCT-027', 'KAPASITAS-023', 'SPESIFIKASI-027', 1, '89', 'Unit-goods-A', 'Size-product-A', 'Gross-product-A', 'Net-product-A', 'Unit-size-A', 'Gross-uom-A', 'net-uom-A', '2023-11-29 00:19:32', '2023-11-29 00:19:32', '1701191972-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg');
INSERT INTO `products` VALUES (29, 'P028', 'PRODUCT-028', 'KAPASITAS-024', 'SPESIFIKASI-028', 1, '89', 'Unit-goods-b', 'Size-product-b', 'Gross-product-b', 'net-product-b', 'Unit-size-B', 'Gross-uom-B', 'net-uom-B', '2023-11-29 00:34:14', '2023-11-29 00:34:14', '1701192854-lone-tree.jpg');

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` int UNSIGNED NOT NULL,
  `nik_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_profile` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskelamin_profile` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code_profile` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` int UNSIGNED NOT NULL,
  `unit_id` int UNSIGNED NOT NULL,
  `category_office_id` int UNSIGNED NOT NULL,
  `usersid_atasan` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `profile_users_id_foreign`(`users_id` ASC) USING BTREE,
  INDEX `profile_jabatan_id_foreign`(`jabatan_id` ASC) USING BTREE,
  INDEX `profile_unit_id_foreign`(`unit_id` ASC) USING BTREE,
  INDEX `profile_category_office_id_foreign`(`category_office_id` ASC) USING BTREE,
  CONSTRAINT `profile_category_office_id_foreign` FOREIGN KEY (`category_office_id`) REFERENCES `category_office` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profile_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profile_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profile_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (8, 1, '8239579237', 'Admin', 'admin@gmail.com', 'alamat gue ini bro dan langsung update', '82397948723', 'L', '1708014059-Screenshot_20240215-221303.png', NULL, '2024-07-16 21:20:38', '382979342', 2, 1, 1, 6);
INSERT INTO `profile` VALUES (9, 6, '9235797', 'Profile Bimaega45', 'bimaega45@gmail.com', 'alamat bimaega45', '89237290789', 'L', 'default.png', NULL, '2023-12-17 17:11:16', '329872398', 5, 1, 1, 1);
INSERT INTO `profile` VALUES (10, 7, '9823489237', 'Profile Bimaegatesting', 'bimaegatesting@gmail.com', 'alamat bimaegatesting', '0938237980', 'P', 'default.png', NULL, '2023-12-17 17:11:34', '329879237', 6, 1, 1, 1);
INSERT INTO `profile` VALUES (12, 9, '23985723987', 'BimaEgaAtasan', 'bimaegaatasan@gmail.com', 'alamat bimaega atasan', '0938279832798', 'P', 'default.png', '2023-12-02 22:10:29', '2023-12-17 17:11:50', '230683490', 7, 1, 1, 7);
INSERT INTO `profile` VALUES (13, 10, '893723987239', 'users jabatan 15', 'userjabatan15@gmail.com', 'alamat users jabatan 15', '0238923789789', 'P', 'default.png', '2023-12-17 17:16:06', '2023-12-17 17:16:06', '8239723987', 5, 1, 2, 9);

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (382, 1);
INSERT INTO `role_has_permissions` VALUES (382, 2);
INSERT INTO `role_has_permissions` VALUES (383, 1);
INSERT INTO `role_has_permissions` VALUES (383, 2);
INSERT INTO `role_has_permissions` VALUES (384, 1);
INSERT INTO `role_has_permissions` VALUES (384, 2);
INSERT INTO `role_has_permissions` VALUES (385, 1);
INSERT INTO `role_has_permissions` VALUES (385, 2);
INSERT INTO `role_has_permissions` VALUES (386, 1);
INSERT INTO `role_has_permissions` VALUES (386, 2);
INSERT INTO `role_has_permissions` VALUES (387, 1);
INSERT INTO `role_has_permissions` VALUES (387, 2);
INSERT INTO `role_has_permissions` VALUES (388, 1);
INSERT INTO `role_has_permissions` VALUES (388, 2);
INSERT INTO `role_has_permissions` VALUES (389, 1);
INSERT INTO `role_has_permissions` VALUES (389, 2);
INSERT INTO `role_has_permissions` VALUES (390, 1);
INSERT INTO `role_has_permissions` VALUES (390, 2);
INSERT INTO `role_has_permissions` VALUES (391, 1);
INSERT INTO `role_has_permissions` VALUES (391, 2);
INSERT INTO `role_has_permissions` VALUES (392, 1);
INSERT INTO `role_has_permissions` VALUES (392, 2);
INSERT INTO `role_has_permissions` VALUES (393, 1);
INSERT INTO `role_has_permissions` VALUES (393, 2);
INSERT INTO `role_has_permissions` VALUES (394, 1);
INSERT INTO `role_has_permissions` VALUES (394, 2);
INSERT INTO `role_has_permissions` VALUES (395, 1);
INSERT INTO `role_has_permissions` VALUES (395, 2);
INSERT INTO `role_has_permissions` VALUES (396, 1);
INSERT INTO `role_has_permissions` VALUES (396, 2);
INSERT INTO `role_has_permissions` VALUES (397, 1);
INSERT INTO `role_has_permissions` VALUES (397, 2);
INSERT INTO `role_has_permissions` VALUES (398, 1);
INSERT INTO `role_has_permissions` VALUES (398, 2);
INSERT INTO `role_has_permissions` VALUES (399, 1);
INSERT INTO `role_has_permissions` VALUES (399, 2);
INSERT INTO `role_has_permissions` VALUES (400, 1);
INSERT INTO `role_has_permissions` VALUES (400, 2);
INSERT INTO `role_has_permissions` VALUES (401, 1);
INSERT INTO `role_has_permissions` VALUES (401, 2);
INSERT INTO `role_has_permissions` VALUES (402, 1);
INSERT INTO `role_has_permissions` VALUES (402, 2);
INSERT INTO `role_has_permissions` VALUES (403, 1);
INSERT INTO `role_has_permissions` VALUES (403, 2);
INSERT INTO `role_has_permissions` VALUES (404, 1);
INSERT INTO `role_has_permissions` VALUES (404, 2);
INSERT INTO `role_has_permissions` VALUES (405, 1);
INSERT INTO `role_has_permissions` VALUES (405, 2);
INSERT INTO `role_has_permissions` VALUES (406, 1);
INSERT INTO `role_has_permissions` VALUES (406, 2);
INSERT INTO `role_has_permissions` VALUES (407, 1);
INSERT INTO `role_has_permissions` VALUES (407, 2);
INSERT INTO `role_has_permissions` VALUES (408, 1);
INSERT INTO `role_has_permissions` VALUES (408, 2);
INSERT INTO `role_has_permissions` VALUES (409, 1);
INSERT INTO `role_has_permissions` VALUES (409, 2);
INSERT INTO `role_has_permissions` VALUES (410, 1);
INSERT INTO `role_has_permissions` VALUES (410, 2);
INSERT INTO `role_has_permissions` VALUES (411, 1);
INSERT INTO `role_has_permissions` VALUES (411, 2);
INSERT INTO `role_has_permissions` VALUES (412, 1);
INSERT INTO `role_has_permissions` VALUES (412, 2);
INSERT INTO `role_has_permissions` VALUES (413, 1);
INSERT INTO `role_has_permissions` VALUES (413, 2);
INSERT INTO `role_has_permissions` VALUES (414, 1);
INSERT INTO `role_has_permissions` VALUES (414, 2);
INSERT INTO `role_has_permissions` VALUES (415, 1);
INSERT INTO `role_has_permissions` VALUES (415, 2);
INSERT INTO `role_has_permissions` VALUES (416, 1);
INSERT INTO `role_has_permissions` VALUES (416, 2);
INSERT INTO `role_has_permissions` VALUES (417, 1);
INSERT INTO `role_has_permissions` VALUES (417, 2);
INSERT INTO `role_has_permissions` VALUES (418, 1);
INSERT INTO `role_has_permissions` VALUES (418, 2);
INSERT INTO `role_has_permissions` VALUES (419, 1);
INSERT INTO `role_has_permissions` VALUES (419, 2);
INSERT INTO `role_has_permissions` VALUES (420, 1);
INSERT INTO `role_has_permissions` VALUES (420, 2);
INSERT INTO `role_has_permissions` VALUES (421, 1);
INSERT INTO `role_has_permissions` VALUES (421, 2);
INSERT INTO `role_has_permissions` VALUES (422, 1);
INSERT INTO `role_has_permissions` VALUES (422, 2);
INSERT INTO `role_has_permissions` VALUES (423, 1);
INSERT INTO `role_has_permissions` VALUES (423, 2);
INSERT INTO `role_has_permissions` VALUES (424, 1);
INSERT INTO `role_has_permissions` VALUES (424, 2);
INSERT INTO `role_has_permissions` VALUES (425, 1);
INSERT INTO `role_has_permissions` VALUES (425, 2);
INSERT INTO `role_has_permissions` VALUES (426, 1);
INSERT INTO `role_has_permissions` VALUES (426, 2);
INSERT INTO `role_has_permissions` VALUES (427, 1);
INSERT INTO `role_has_permissions` VALUES (427, 2);
INSERT INTO `role_has_permissions` VALUES (428, 1);
INSERT INTO `role_has_permissions` VALUES (428, 2);
INSERT INTO `role_has_permissions` VALUES (429, 1);
INSERT INTO `role_has_permissions` VALUES (429, 2);
INSERT INTO `role_has_permissions` VALUES (430, 1);
INSERT INTO `role_has_permissions` VALUES (430, 2);
INSERT INTO `role_has_permissions` VALUES (431, 1);
INSERT INTO `role_has_permissions` VALUES (431, 2);
INSERT INTO `role_has_permissions` VALUES (432, 1);
INSERT INTO `role_has_permissions` VALUES (432, 2);
INSERT INTO `role_has_permissions` VALUES (433, 1);
INSERT INTO `role_has_permissions` VALUES (433, 2);
INSERT INTO `role_has_permissions` VALUES (434, 1);
INSERT INTO `role_has_permissions` VALUES (434, 2);
INSERT INTO `role_has_permissions` VALUES (435, 1);
INSERT INTO `role_has_permissions` VALUES (435, 2);
INSERT INTO `role_has_permissions` VALUES (436, 1);
INSERT INTO `role_has_permissions` VALUES (436, 2);
INSERT INTO `role_has_permissions` VALUES (437, 1);
INSERT INTO `role_has_permissions` VALUES (437, 2);
INSERT INTO `role_has_permissions` VALUES (438, 1);
INSERT INTO `role_has_permissions` VALUES (438, 2);
INSERT INTO `role_has_permissions` VALUES (439, 1);
INSERT INTO `role_has_permissions` VALUES (439, 2);
INSERT INTO `role_has_permissions` VALUES (440, 1);
INSERT INTO `role_has_permissions` VALUES (440, 2);
INSERT INTO `role_has_permissions` VALUES (441, 1);
INSERT INTO `role_has_permissions` VALUES (441, 2);
INSERT INTO `role_has_permissions` VALUES (442, 1);
INSERT INTO `role_has_permissions` VALUES (442, 2);
INSERT INTO `role_has_permissions` VALUES (443, 1);
INSERT INTO `role_has_permissions` VALUES (443, 2);
INSERT INTO `role_has_permissions` VALUES (444, 1);
INSERT INTO `role_has_permissions` VALUES (444, 2);
INSERT INTO `role_has_permissions` VALUES (445, 1);
INSERT INTO `role_has_permissions` VALUES (445, 2);
INSERT INTO `role_has_permissions` VALUES (446, 1);
INSERT INTO `role_has_permissions` VALUES (446, 2);
INSERT INTO `role_has_permissions` VALUES (447, 1);
INSERT INTO `role_has_permissions` VALUES (447, 2);
INSERT INTO `role_has_permissions` VALUES (448, 1);
INSERT INTO `role_has_permissions` VALUES (448, 2);
INSERT INTO `role_has_permissions` VALUES (449, 1);
INSERT INTO `role_has_permissions` VALUES (449, 2);
INSERT INTO `role_has_permissions` VALUES (450, 1);
INSERT INTO `role_has_permissions` VALUES (450, 2);
INSERT INTO `role_has_permissions` VALUES (451, 1);
INSERT INTO `role_has_permissions` VALUES (451, 2);
INSERT INTO `role_has_permissions` VALUES (452, 1);
INSERT INTO `role_has_permissions` VALUES (452, 2);
INSERT INTO `role_has_permissions` VALUES (453, 1);
INSERT INTO `role_has_permissions` VALUES (453, 2);
INSERT INTO `role_has_permissions` VALUES (454, 1);
INSERT INTO `role_has_permissions` VALUES (454, 2);
INSERT INTO `role_has_permissions` VALUES (455, 1);
INSERT INTO `role_has_permissions` VALUES (455, 2);
INSERT INTO `role_has_permissions` VALUES (456, 1);
INSERT INTO `role_has_permissions` VALUES (456, 2);
INSERT INTO `role_has_permissions` VALUES (457, 1);
INSERT INTO `role_has_permissions` VALUES (457, 2);
INSERT INTO `role_has_permissions` VALUES (458, 1);
INSERT INTO `role_has_permissions` VALUES (458, 2);
INSERT INTO `role_has_permissions` VALUES (459, 1);
INSERT INTO `role_has_permissions` VALUES (459, 2);
INSERT INTO `role_has_permissions` VALUES (460, 1);
INSERT INTO `role_has_permissions` VALUES (460, 2);
INSERT INTO `role_has_permissions` VALUES (461, 1);
INSERT INTO `role_has_permissions` VALUES (461, 2);
INSERT INTO `role_has_permissions` VALUES (462, 1);
INSERT INTO `role_has_permissions` VALUES (462, 2);
INSERT INTO `role_has_permissions` VALUES (463, 1);
INSERT INTO `role_has_permissions` VALUES (463, 2);
INSERT INTO `role_has_permissions` VALUES (464, 1);
INSERT INTO `role_has_permissions` VALUES (464, 2);
INSERT INTO `role_has_permissions` VALUES (465, 1);
INSERT INTO `role_has_permissions` VALUES (465, 2);
INSERT INTO `role_has_permissions` VALUES (466, 1);
INSERT INTO `role_has_permissions` VALUES (466, 2);
INSERT INTO `role_has_permissions` VALUES (467, 1);
INSERT INTO `role_has_permissions` VALUES (467, 2);
INSERT INTO `role_has_permissions` VALUES (468, 1);
INSERT INTO `role_has_permissions` VALUES (468, 2);
INSERT INTO `role_has_permissions` VALUES (469, 1);
INSERT INTO `role_has_permissions` VALUES (469, 2);
INSERT INTO `role_has_permissions` VALUES (470, 1);
INSERT INTO `role_has_permissions` VALUES (470, 2);
INSERT INTO `role_has_permissions` VALUES (471, 1);
INSERT INTO `role_has_permissions` VALUES (471, 2);
INSERT INTO `role_has_permissions` VALUES (472, 1);
INSERT INTO `role_has_permissions` VALUES (472, 2);
INSERT INTO `role_has_permissions` VALUES (473, 1);
INSERT INTO `role_has_permissions` VALUES (473, 2);
INSERT INTO `role_has_permissions` VALUES (474, 1);
INSERT INTO `role_has_permissions` VALUES (474, 2);
INSERT INTO `role_has_permissions` VALUES (475, 1);
INSERT INTO `role_has_permissions` VALUES (475, 2);
INSERT INTO `role_has_permissions` VALUES (476, 1);
INSERT INTO `role_has_permissions` VALUES (476, 2);
INSERT INTO `role_has_permissions` VALUES (477, 1);
INSERT INTO `role_has_permissions` VALUES (477, 2);
INSERT INTO `role_has_permissions` VALUES (478, 1);
INSERT INTO `role_has_permissions` VALUES (478, 2);
INSERT INTO `role_has_permissions` VALUES (479, 1);
INSERT INTO `role_has_permissions` VALUES (479, 2);
INSERT INTO `role_has_permissions` VALUES (480, 1);
INSERT INTO `role_has_permissions` VALUES (480, 2);
INSERT INTO `role_has_permissions` VALUES (481, 1);
INSERT INTO `role_has_permissions` VALUES (481, 2);
INSERT INTO `role_has_permissions` VALUES (482, 1);
INSERT INTO `role_has_permissions` VALUES (482, 2);
INSERT INTO `role_has_permissions` VALUES (483, 1);
INSERT INTO `role_has_permissions` VALUES (483, 2);
INSERT INTO `role_has_permissions` VALUES (484, 1);
INSERT INTO `role_has_permissions` VALUES (484, 2);
INSERT INTO `role_has_permissions` VALUES (485, 1);
INSERT INTO `role_has_permissions` VALUES (485, 2);
INSERT INTO `role_has_permissions` VALUES (486, 1);
INSERT INTO `role_has_permissions` VALUES (486, 2);
INSERT INTO `role_has_permissions` VALUES (487, 1);
INSERT INTO `role_has_permissions` VALUES (487, 2);
INSERT INTO `role_has_permissions` VALUES (488, 1);
INSERT INTO `role_has_permissions` VALUES (488, 2);
INSERT INTO `role_has_permissions` VALUES (489, 1);
INSERT INTO `role_has_permissions` VALUES (489, 2);
INSERT INTO `role_has_permissions` VALUES (490, 1);
INSERT INTO `role_has_permissions` VALUES (490, 2);
INSERT INTO `role_has_permissions` VALUES (491, 1);
INSERT INTO `role_has_permissions` VALUES (491, 2);
INSERT INTO `role_has_permissions` VALUES (492, 1);
INSERT INTO `role_has_permissions` VALUES (492, 2);
INSERT INTO `role_has_permissions` VALUES (493, 1);
INSERT INTO `role_has_permissions` VALUES (493, 2);
INSERT INTO `role_has_permissions` VALUES (494, 1);
INSERT INTO `role_has_permissions` VALUES (494, 2);
INSERT INTO `role_has_permissions` VALUES (497, 1);
INSERT INTO `role_has_permissions` VALUES (497, 2);
INSERT INTO `role_has_permissions` VALUES (498, 1);
INSERT INTO `role_has_permissions` VALUES (498, 2);
INSERT INTO `role_has_permissions` VALUES (499, 1);
INSERT INTO `role_has_permissions` VALUES (499, 2);
INSERT INTO `role_has_permissions` VALUES (500, 1);
INSERT INTO `role_has_permissions` VALUES (500, 2);
INSERT INTO `role_has_permissions` VALUES (501, 1);
INSERT INTO `role_has_permissions` VALUES (501, 2);
INSERT INTO `role_has_permissions` VALUES (502, 1);
INSERT INTO `role_has_permissions` VALUES (502, 2);
INSERT INTO `role_has_permissions` VALUES (503, 1);
INSERT INTO `role_has_permissions` VALUES (503, 2);
INSERT INTO `role_has_permissions` VALUES (504, 2);
INSERT INTO `role_has_permissions` VALUES (505, 2);
INSERT INTO `role_has_permissions` VALUES (506, 2);
INSERT INTO `role_has_permissions` VALUES (507, 2);
INSERT INTO `role_has_permissions` VALUES (508, 2);
INSERT INTO `role_has_permissions` VALUES (509, 2);
INSERT INTO `role_has_permissions` VALUES (510, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'web', NULL, NULL);
INSERT INTO `roles` VALUES (2, 'Pegawai', 'web', '2023-11-12 11:45:13', '2023-11-12 11:45:13');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icon_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `perusahaan_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `nohp_settings` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa_settings` int UNSIGNED NOT NULL,
  `zonawaktu_settings` int UNSIGNED NOT NULL,
  `email_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `instagram_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `linkedin_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `whatsapp_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `youtube_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `longitude_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude_settings` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `setting_acountemail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_acountpassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_namapengirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_contentemail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_penutupemail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `settings_bahasa_settings_foreign`(`bahasa_settings` ASC) USING BTREE,
  INDEX `settings_zonawaktu_settings_foreign`(`zonawaktu_settings` ASC) USING BTREE,
  CONSTRAINT `settings_bahasa_settings_foreign` FOREIGN KEY (`bahasa_settings`) REFERENCES `data_statis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_zonawaktu_settings_foreign` FOREIGN KEY (`zonawaktu_settings`) REFERENCES `data_statis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, '1700407120-beautiful-sunrise-wat-phra-that-pha-son-kaew-temple-khao-kho-phetchabun-thailand.jpg', '1700407120-painting-mountain-lake-with-mountain-background.jpg', '1700407120-panoramic-view-broken-beach-nusa-penida-bali-indonesia-blue-sky-turquoise-water.jpg', 'web', 'nyicil', 'deskripsi', '765876987', 421, 4, 'deskripsi15@gmail.com', 'www.fb.com', 'www.ig.com', 'www.linkedin.com', 'www.wa.com', 'www.yt.com', '5674733', '4537789667', '2023-11-19 22:18:41', '2023-11-19 22:18:41', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `code_transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_transaction` date NOT NULL,
  `paidto_transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pembayaran_id` int UNSIGNED NOT NULL,
  `paymentterms_transaction` int NOT NULL,
  `expired_transaction` date NOT NULL,
  `purpose_transaction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalproduct_transaction` int NULL DEFAULT NULL,
  `totalprice_transaction` int NULL DEFAULT NULL,
  `status_transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `users_id_review` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int UNSIGNED NOT NULL,
  `purposedivisi_transaction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `isppn_transaction` tinyint(1) NOT NULL DEFAULT 0,
  `attachment_transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `valueppn_transaction` double NULL DEFAULT NULL,
  `accept_transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nomorvirtual_transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `totalppn_transaction` double NULL DEFAULT NULL,
  `subtotal_transaction` double NULL DEFAULT NULL,
  `is_expired` tinyint(1) NULL DEFAULT NULL,
  `overbooking_transaction` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaction_metode_pembayaran_id_foreign`(`metode_pembayaran_id` ASC) USING BTREE,
  INDEX `transaction_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `transaction_metode_pembayaran_id_foreign` FOREIGN KEY (`metode_pembayaran_id`) REFERENCES `metode_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transaction
-- ----------------------------
INSERT INTO `transaction` VALUES (49, '2389237', '2024-02-11', 'Hello Bro 1 _ bro 1', 11, 17, '2024-02-28', 'Tujuan Transaksi gue', 0, 135000, 'menunggu', 6, '2024-02-11 08:44:51', '2024-08-02 23:01:54', 1, 'Purpose Divisi Gue', 1, 'default.png', 35, NULL, NULL, NULL, 35000, 100000, NULL, 1);
INSERT INTO `transaction` VALUES (50, '82874928', '2024-02-11', 'p edit 2', 11, 17, '2024-02-28', '3289723', 6, 135000, 'menunggu', 6, '2024-02-11 14:43:54', '2024-08-02 23:01:28', 1, 'Divi', 0, 'default.png', 0, NULL, NULL, NULL, 0, 135000, NULL, 0);
INSERT INTO `transaction` VALUES (53, '8239723', '2024-02-14', 'Bima', 11, 0, '2024-02-14', 'Beli Suara', 1, 3750000, 'disetujui', 1, '2024-02-14 11:35:01', '2024-02-14 14:10:18', 1, 'Divisi', 1, 'default.png', 25, NULL, NULL, NULL, 750000, 3000000, NULL, 1);
INSERT INTO `transaction` VALUES (54, '892789723', '2024-02-14', 'bim bim15', 11, 15, '2024-02-29', 'Transaksi saat ini', 0, 300000, 'menunggu', 6, '2024-02-14 15:05:27', '2024-08-02 22:59:56', 1, 'Divisi', 0, 'default.png', 0, NULL, NULL, NULL, 0, 300000, NULL, 1);
INSERT INTO `transaction` VALUES (55, '89479827', '2024-02-15', 'BimaEga', 11, 14, '2024-02-29', 'Tujuan transaksi gue ini mas bro', 28, 1593750, 'disetujui', 1, '2024-02-15 10:34:00', '2024-02-15 11:33:19', 1, 'Tujuan divisi gue ini mas bro', 1, 'default.png', 25, NULL, NULL, NULL, 318750, 315000, NULL, 0);
INSERT INTO `transaction` VALUES (56, '23523', '2024-02-15', 'Bima get Print L', 11, 0, '2024-02-15', 'terserah', 0, 3750000, 'menunggu', 6, '2024-02-15 19:47:49', '2024-08-02 22:57:17', 1, 'hanya test', 1, 'default.png', 25, NULL, NULL, NULL, 750000, 3000000, NULL, 1);
INSERT INTO `transaction` VALUES (57, '3248732', '2024-02-15', 'Bima Edit Check PM', 11, 0, '2024-02-15', 'Tersera', 0, 3223523, 'menunggu', 6, '2024-02-15 19:52:22', '2024-08-02 22:34:20', 1, 'Guue', 0, '1708001542-images.jpeg', 0, NULL, NULL, NULL, 0, 3223523, NULL, 1);
INSERT INTO `transaction` VALUES (58, '329823', '2024-04-18', 'Rizky', 11, 0, '2024-04-18', 'Beli kebutuhan kantor', 5, 102000, 'menunggu', 7, '2024-04-18 16:03:00', '2024-04-18 16:04:57', 1, 'Beli untuk divisi IT', 1, 'default.png', 20, NULL, NULL, NULL, 17000, 35000, NULL, 0);
INSERT INTO `transaction` VALUES (60, '238239082308', '2024-07-20', 'coba test 1', 11, 0, '2024-07-20', 'tujuan transaksi mas bro', 8878, 1660186, 'menunggu', 6, '2024-07-20 18:36:47', '2024-08-02 22:09:29', 1, NULL, 0, 'default.png', NULL, NULL, NULL, NULL, 0, 1660186, NULL, 0);
INSERT INTO `transaction` VALUES (61, 'REQ-2024-07-20-238239082309', '2024-07-20', 'edit lagi again bro push again', 11, 0, '2024-07-20', 'Beli tujuan transaksi', 0, 248000, 'menunggu', 6, '2024-07-20 20:30:03', '2024-08-02 22:21:01', 1, 'tujuan dari ini test', 1, 'default.png', 24, NULL, NULL, NULL, 48000, 200000, NULL, 1);
INSERT INTO `transaction` VALUES (62, 'REQ-2024-07-21-238239082310', '2024-07-21', 'Bima Ega Edit', 11, 0, '2024-07-21', 'Apa ini', 2, 6250, 'menunggu', 6, '2024-07-21 21:10:12', '2024-08-02 22:18:28', 1, '23898', 1, '1721571012-webcam-toy-photo1.jpg', 25, NULL, NULL, NULL, 1250, 5000, NULL, 0);

-- ----------------------------
-- Table structure for transaction_approvel
-- ----------------------------
DROP TABLE IF EXISTS `transaction_approvel`;
CREATE TABLE `transaction_approvel`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaction_id` int UNSIGNED NOT NULL,
  `users_id` int UNSIGNED NOT NULL,
  `tanggal_approvel` datetime NOT NULL,
  `keterangan_approvel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id_forward` int NULL DEFAULT NULL,
  `status_transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaction_approvel_transaction_id_foreign`(`transaction_id` ASC) USING BTREE,
  INDEX `transaction_approvel_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `transaction_approvel_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_approvel_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transaction_approvel
-- ----------------------------
INSERT INTO `transaction_approvel` VALUES (34, 53, 1, '2024-02-14 11:35:59', 'Beli Suara keterangannya', '2024-02-14 11:35:59', '2024-02-14 11:35:59', 6, 'menunggu');
INSERT INTO `transaction_approvel` VALUES (35, 53, 1, '2024-02-14 11:37:45', 'Keterangannya ini untuk di ACC Finance yah', '2024-02-14 11:37:45', '2024-02-14 11:37:45', 7, 'menunggu');
INSERT INTO `transaction_approvel` VALUES (36, 53, 1, '2024-02-14 11:38:55', 'Pak Direktur tolong proses ini udah cocok belum', '2024-02-14 11:38:55', '2024-02-14 11:38:55', 9, 'menunggu');
INSERT INTO `transaction_approvel` VALUES (37, 53, 1, '2024-02-14 12:33:37', 'tolong koreksi dibagian upload file masih ada yang salah', '2024-02-14 12:33:37', '2024-02-14 12:33:37', NULL, 'direvisi');
INSERT INTO `transaction_approvel` VALUES (38, 53, 1, '2024-02-14 13:03:43', 'Revisi one more masih ada satu lagi yang salah', '2024-02-14 13:03:43', '2024-02-14 13:03:43', NULL, 'direvisi');
INSERT INTO `transaction_approvel` VALUES (39, 53, 1, '2024-02-14 14:01:28', 'Pengajuan ini telah selesai dilakukan', '2024-02-14 14:01:28', '2024-02-14 14:01:28', NULL, 'disetujui');
INSERT INTO `transaction_approvel` VALUES (40, 53, 1, '2024-02-14 14:02:54', 'Proses ini telah selesai diajukan', '2024-02-14 14:02:54', '2024-02-14 14:02:54', NULL, 'disetujui');
INSERT INTO `transaction_approvel` VALUES (41, 53, 1, '2024-02-14 14:03:45', 'Tolong segera siapkan', '2024-02-14 14:03:45', '2024-02-14 14:03:45', NULL, 'disetujui');
INSERT INTO `transaction_approvel` VALUES (42, 53, 1, '2024-02-14 14:04:51', 'Selesai sudah', '2024-02-14 14:04:51', '2024-02-14 14:04:51', NULL, 'disetujui');
INSERT INTO `transaction_approvel` VALUES (43, 53, 1, '2024-02-14 14:10:18', 'saya sudah menyelesaikan ini', '2024-02-14 14:10:18', '2024-02-14 14:10:18', NULL, 'disetujui');
INSERT INTO `transaction_approvel` VALUES (44, 55, 1, '2024-02-15 11:25:04', 'Keterangan bod', '2024-02-15 11:25:04', '2024-02-15 11:25:04', 6, 'menunggu');
INSERT INTO `transaction_approvel` VALUES (45, 55, 1, '2024-02-15 11:25:19', 'Keterangan finance', '2024-02-15 11:25:19', '2024-02-15 11:25:19', 7, 'menunggu');
INSERT INTO `transaction_approvel` VALUES (46, 55, 1, '2024-02-15 11:25:34', 'Keterangan direktur', '2024-02-15 11:25:34', '2024-02-15 11:25:34', 9, 'menunggu');
INSERT INTO `transaction_approvel` VALUES (47, 55, 1, '2024-02-15 11:33:19', 'Ya pengajuan ini sudah cukup menarik dan anda diterima', '2024-02-15 11:33:19', '2024-02-15 11:33:19', NULL, 'disetujui');
INSERT INTO `transaction_approvel` VALUES (48, 58, 1, '2024-04-18 16:04:38', 'Keterangan bod', '2024-04-18 16:04:38', '2024-04-18 16:04:38', 6, 'menunggu');
INSERT INTO `transaction_approvel` VALUES (49, 58, 1, '2024-04-18 16:04:57', 'Keterangan finance', '2024-04-18 16:04:57', '2024-04-18 16:04:57', 7, 'menunggu');

-- ----------------------------
-- Table structure for transaction_detail
-- ----------------------------
DROP TABLE IF EXISTS `transaction_detail`;
CREATE TABLE `transaction_detail`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaction_id` int UNSIGNED NOT NULL,
  `products_id` int UNSIGNED NOT NULL,
  `qty_detail` int NOT NULL,
  `subtotal_detail` int NOT NULL,
  `remarks_detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_detail` double NOT NULL,
  `matauang_detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kurs_detail` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaction_detail_transaction_id_foreign`(`transaction_id` ASC) USING BTREE,
  INDEX `transaction_detail_products_id_foreign`(`products_id` ASC) USING BTREE,
  CONSTRAINT `transaction_detail_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_detail_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 143 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transaction_detail
-- ----------------------------
INSERT INTO `transaction_detail` VALUES (118, 55, 2, 3, 900000, 'Remarks-b', NULL, NULL, 300000, 'USD', 5.5);
INSERT INTO `transaction_detail` VALUES (119, 55, 3, 25, 375000, 'Remarks-a', NULL, NULL, 15000, 'USD', 3.5);
INSERT INTO `transaction_detail` VALUES (120, 58, 2, 3, 45000, 'Remarks-b', NULL, NULL, 15000, 'USD', 4.5);
INSERT INTO `transaction_detail` VALUES (121, 58, 3, 2, 40000, 'Remarks-b', NULL, NULL, 20000, 'USD', 3.5);
INSERT INTO `transaction_detail` VALUES (135, 60, 2, 8878, 1660186, 'roij', NULL, NULL, 187, 'USD', 2.5);
INSERT INTO `transaction_detail` VALUES (138, 62, 2, 2, 5000, 'remarks', NULL, NULL, 2500, 'USD', 2.5);
INSERT INTO `transaction_detail` VALUES (141, 50, 2, 3, 45000, 'Remarks-b', NULL, NULL, 15000, 'USD', 5.5);
INSERT INTO `transaction_detail` VALUES (142, 50, 3, 3, 90000, 'Remarks-a', NULL, NULL, 30000, 'USD', 50);

-- ----------------------------
-- Table structure for type_product
-- ----------------------------
DROP TABLE IF EXISTS `type_product`;
CREATE TABLE `type_product`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_type_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of type_product
-- ----------------------------
INSERT INTO `type_product` VALUES (1, 'Tipe Produk A', '2023-11-12 09:31:44', '2023-11-12 09:31:44');

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_node` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_children` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `children_unit` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of unit
-- ----------------------------
INSERT INTO `unit` VALUES (1, 'IT', NULL, '1', NULL, NULL, NULL);
INSERT INTO `unit` VALUES (2, 'Management', NULL, NULL, NULL, '2023-11-12 10:04:30', '2023-11-12 10:04:30');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$QbIsdxOh252pu6.96HiZXur6K3yGBPwHpUMYseFbBO9KTYqsRZ5We', NULL, NULL, '2024-07-28 18:49:04');
INSERT INTO `users` VALUES (6, 'Profile Bimaega45', 'bimaega45@gmail.com', NULL, '$2y$10$dWeTIB5RHX2gR0cGqzwNLepHAmNv/ErxQValLtpJ5snK6qRGq3ovy', NULL, '2023-11-29 02:16:40', '2023-12-03 10:45:55');
INSERT INTO `users` VALUES (7, 'Profile Bimaegatesting', 'bimaegatesting@gmail.com', NULL, '$2y$10$a8U.CBbOsQuOUFn1M7MqPufBYrnGgAHBnzzpVhtVemjUV7FImShi2', NULL, '2023-12-02 02:53:41', '2023-12-03 05:20:44');
INSERT INTO `users` VALUES (9, 'BimaEgaAtasan', 'bimaegaatasan@gmail.com', NULL, '$2y$10$jBWLnB4snoCTbfXTckWP9OJ4iduAgcXwCgQ52rNNsMCEROkn9Wa0S', NULL, '2023-12-02 22:10:29', '2023-12-17 17:54:33');
INSERT INTO `users` VALUES (10, 'users jabatan 15', 'userjabatan15@gmail.com', NULL, '$2y$10$J2FenFszwPFrYnROdD.nUO0fTHIAXzdLSJ3bY3.b2IV8U9RMtI6d.', NULL, '2023-12-17 17:16:06', '2023-12-17 17:16:06');

-- ----------------------------
-- Table structure for websockets_statistics_entries
-- ----------------------------
DROP TABLE IF EXISTS `websockets_statistics_entries`;
CREATE TABLE `websockets_statistics_entries`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int NOT NULL,
  `websocket_message_count` int NOT NULL,
  `api_message_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of websockets_statistics_entries
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
