/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : sistem_pakar

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 05/08/2022 10:10:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for detail_penyakit
-- ----------------------------
DROP TABLE IF EXISTS `detail_penyakit`;
CREATE TABLE `detail_penyakit`  (
  `id_penyakit` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_gejala` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_penyakit
-- ----------------------------

-- ----------------------------
-- Table structure for hasil
-- ----------------------------
DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil`  (
  `id_hasil` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_user` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penyakit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gejala` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_penyakit` int(11) NULL DEFAULT NULL,
  `cf_hasil` float NULL DEFAULT NULL,
  PRIMARY KEY (`id_hasil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 334 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (327, '2021-01-22', 'A06', 'a:6:{s:3:\"P03\";s:6:\"0.6400\";s:3:\"P02\";s:6:\"0.5920\";s:3:\"P04\";s:6:\"0.3200\";s:3:\"P06\";s:6:\"0.3200\";s:3:\"P10\";s:6:\"0.3200\";s:3:\"P07\";s:6:\"0.2400\";}', 'a:3:{i:0;s:3:\"G06\";i:1;s:3:\"G07\";i:2;s:3:\"G08\";}', 0, 0.64);
INSERT INTO `hasil` VALUES (328, '2021-01-23', 'A06', 'a:2:{s:3:\"P04\";s:6:\"0.6400\";s:3:\"P03\";s:6:\"0.3600\";}', 'a:2:{i:0;s:3:\"G08\";i:1;s:3:\"G09\";}', 0, 0.64);
INSERT INTO `hasil` VALUES (329, '2021-01-30', 'A06', 'a:3:{s:3:\"P09\";s:6:\"1.0000\";s:3:\"P05\";s:6:\"0.8000\";s:3:\"P04\";s:6:\"0.6000\";}', 'a:2:{i:0;s:3:\"G15\";i:1;s:3:\"G16\";}', 0, 1);
INSERT INTO `hasil` VALUES (330, '2021-02-05', 'A06', 'a:2:{s:3:\"P05\";s:6:\"0.6400\";s:3:\"P06\";s:6:\"0.6000\";}', 'a:2:{i:0;s:3:\"G11\";i:1;s:3:\"G12\";}', 0, 0.64);
INSERT INTO `hasil` VALUES (331, '2021-02-06', 'A06', 'a:5:{s:3:\"P01\";s:6:\"0.9488\";s:3:\"P09\";s:6:\"0.8000\";s:3:\"P08\";s:6:\"0.6000\";s:3:\"P07\";s:6:\"0.5440\";s:3:\"P02\";s:6:\"0.4800\";}', 'a:3:{i:0;s:3:\"G01\";i:1;s:3:\"G02\";i:2;s:3:\"G03\";}', 0, 0.9488);
INSERT INTO `hasil` VALUES (332, '2021-02-06', 'A06', 'a:5:{s:3:\"P01\";s:6:\"0.9744\";s:3:\"P09\";s:6:\"0.8000\";s:3:\"P08\";s:6:\"0.6000\";s:3:\"P07\";s:6:\"0.5920\";s:3:\"P02\";s:6:\"0.4800\";}', 'a:3:{i:0;s:3:\"G01\";i:1;s:3:\"G02\";i:2;s:3:\"G03\";}', 0, 0.9744);
INSERT INTO `hasil` VALUES (333, '2022-07-01', 'A08', 'a:7:{s:3:\"P01\";s:6:\"0.8925\";s:3:\"P05\";s:6:\"0.8320\";s:3:\"P09\";s:6:\"0.8000\";s:3:\"P03\";s:6:\"0.7440\";s:3:\"P08\";s:6:\"0.6000\";s:3:\"P02\";s:6:\"0.5424\";s:3:\"P07\";s:6:\"0.4000\";}', 'a:7:{i:0;s:3:\"G01\";i:1;s:3:\"G03\";i:2;s:3:\"G04\";i:3;s:3:\"G09\";i:4;s:3:\"G10\";i:5;s:3:\"G11\";i:6;s:3:\"G17\";}', 0, 0.8925);

-- ----------------------------
-- Table structure for paramedis
-- ----------------------------
DROP TABLE IF EXISTS `paramedis`;
CREATE TABLE `paramedis`  (
  `id_paramedis` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_identitas` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instansi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_paramedis`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of paramedis
-- ----------------------------

-- ----------------------------
-- Table structure for pertanyaan_grup
-- ----------------------------
DROP TABLE IF EXISTS `pertanyaan_grup`;
CREATE TABLE `pertanyaan_grup`  (
  `id_pertanyaan_grup` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pertanyaan_grup` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pertanyaan_grup`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pertanyaan_grup
-- ----------------------------
INSERT INTO `pertanyaan_grup` VALUES (1, 'pertanyaan grup 1');
INSERT INTO `pertanyaan_grup` VALUES (2, 'pertanyaan grup 2');
INSERT INTO `pertanyaan_grup` VALUES (3, 'pertanyaan 3');
INSERT INTO `pertanyaan_grup` VALUES (4, 'pertanyaan 4');
INSERT INTO `pertanyaan_grup` VALUES (5, 'pertanyaan 5');
INSERT INTO `pertanyaan_grup` VALUES (6, 'pertanyaan 6');
INSERT INTO `pertanyaan_grup` VALUES (7, 'pertanyaan 7');
INSERT INTO `pertanyaan_grup` VALUES (8, 'pertanyaan 8');
INSERT INTO `pertanyaan_grup` VALUES (9, 'pertanyaan 9');
INSERT INTO `pertanyaan_grup` VALUES (10, 'pertanyaan 10');
INSERT INTO `pertanyaan_grup` VALUES (11, 'pertanyaan_11');
INSERT INTO `pertanyaan_grup` VALUES (12, 'pertanyaan_12');

-- ----------------------------
-- Table structure for tb_artikel
-- ----------------------------
DROP TABLE IF EXISTS `tb_artikel`;
CREATE TABLE `tb_artikel`  (
  `artikel_id` int(11) NOT NULL AUTO_INCREMENT,
  `artikel_user_id` int(11) NOT NULL,
  `artikel_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `artikel_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `artikel_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `artikel_excerpt` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `artikel_body` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `artikel_create` int(11) NULL DEFAULT NULL,
  `artikel_update` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`artikel_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_artikel
-- ----------------------------
INSERT INTO `tb_artikel` VALUES (4, 3, 'Faktor Resiko Penyakit ISPA khusus nya Difteri', 'faktor-resiko-penyakit-ispa-khusus-nya-difteri.html', 'f8d267e35258819cb4dbb10a7a952d04.jpg', 'Beberapa faktor risiko ISPA, antara lain:\r\n\r\nBayi dari usia 6 bulan atau anak di bawah 1 tahun.\r\nAnak-anak yang lahir prematur atau yang memiliki riwayat jantung bawaan atau penyakit paru-paru.\r\nAnak-anak dengan sistem kekebalan tubuh yang lemah.\r\nBayi yang berada di tempat ramai.\r\nOrang-orang di usia pertengahan.\r\nOrang dewasa yang mengidap penyakit paru obsruktif kronik, gagal jantung progresif, atau asma.\r\nOrang dengan sistem imun lemah, seperti orang dengan transplantasi organ, leukemia, atau HIV/AIDS.\r\nOrang yang dikelilingi dengan pengidap yang bersin atau batuk tanpa menutup hidung dan mulutnya.', '1.Diagnosis\r\nBiasanya dokter akan melakukan pemeriksaan terhadap organ paru, untuk mendengarkan apakah ada suara yang tidak normal saat Anda bernapas. Ada juga beberapa pemeriksaan tambahan yang dibutuhkan, seperti:\r\n\r\nRontgen dada, Pemeriksaan ini membantu dokter untuk mendeteksi pneumonia dan menentukan lokasi infeksi yang menyebabkan penyakit tersebut timbul.\r\n\r\nPemeriksaan darah, Bisa dilakukan untuk melihat adanya infeksi yang ditandai dengan peningkatan sel darah putih.\r\n\r\nPemeriksaan denyut nadi, Cara ini digunakan untuk melihat seberapa banyak kadar oksigen yang beredar dalam tubuh, dan bisa digunakan untuk menentukan separah apa pengaruh pneumonia terhadap pertukaran udara di sistem pernapasan.\r\n\r\nTes dahak, Dahak akan dianalisis untuk melihat kuman yang menyebabkan infeksi pada paru.\r\n\r\n2. Gejala Penyakit Pneumonia\r\nPneumonia biasanya diawal dengan gejala-gejala tertentu terlebih dahulu. Berikut ini gejala-gejala yang biasanya muncul:\r\n\r\nDemam disertai nyeri kepala dan tubuh menggigil.\r\n\r\nBatuk tidak berdahak, ataupun berdahak dengan cairan mengandung nanah yang berwarna kekuningan.\r\n\r\n Nyeri dada yang terasa ketika bernapas hingga napas yang pendek.\r\n\r\n Mual, muntah, dan diare.\r\n\r\n Rasa nyeri pada otot, sendi, serta mudah lelah.\r\n\r\n Denyut nadi yang melemah hingga 100 kali per menit.\r\n\r\n', 1649871977, 1654231875);

-- ----------------------------
-- Table structure for tb_deteksi_pasien
-- ----------------------------
DROP TABLE IF EXISTS `tb_deteksi_pasien`;
CREATE TABLE `tb_deteksi_pasien`  (
  `id_deteksi_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usia` int(11) NOT NULL,
  `no_telfon` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deteksi_hasil_id` int(11) NOT NULL,
  `deteksi_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_deteksi_pasien`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 98 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_deteksi_pasien
-- ----------------------------
INSERT INTO `tb_deteksi_pasien` VALUES (1, 'febiola', 21, '789265986', '356752758', 'perempuan', 0, '2022-05-29 20:54:44');
INSERT INTO `tb_deteksi_pasien` VALUES (2, 'bagus', 21, '09877654687', 'maesan', 'Laki-laki', 0, '2022-05-30 00:46:38');
INSERT INTO `tb_deteksi_pasien` VALUES (3, 'nana', 21, '081234231222', 'jatim', 'perempuan', 0, '2022-05-30 13:07:24');
INSERT INTO `tb_deteksi_pasien` VALUES (4, 'ijal', 20, '08932467618193', 'bws', 'Laki-laki', 0, '2022-05-30 14:29:46');
INSERT INTO `tb_deteksi_pasien` VALUES (5, 'rizki', 22, '1313414141', 'jawa', 'Laki-laki', 0, '2022-05-30 17:02:26');
INSERT INTO `tb_deteksi_pasien` VALUES (6, 'edwin sekawanmedia', 26, '0812873731931', 'kediri', 'Laki-laki', 0, '2022-05-30 22:44:44');
INSERT INTO `tb_deteksi_pasien` VALUES (7, 'sinta ', 17, '081234765678', 'jalan danau toba', 'perempuan', 0, '2022-05-31 07:38:36');
INSERT INTO `tb_deteksi_pasien` VALUES (8, 'lambang', 67, '08234567898', 'paiton', 'Laki-laki', 0, '2022-05-31 08:32:29');
INSERT INTO `tb_deteksi_pasien` VALUES (9, 'loli', 21, '081234765678', 'sawahan', 'perempuan', 0, '2022-05-31 11:12:52');
INSERT INTO `tb_deteksi_pasien` VALUES (10, 'febiolii', 70, '091', 'hu', 'perempuan', 0, '2022-05-31 14:50:52');
INSERT INTO `tb_deteksi_pasien` VALUES (11, 'loliii', 29, '081234768987', 'jl nuri', 'perempuan', 0, '2022-06-01 14:31:27');
INSERT INTO `tb_deteksi_pasien` VALUES (12, 'Lilis', 25, '081559855899', 'banyuwangi', 'perempuan', 0, '2022-06-01 21:56:39');
INSERT INTO `tb_deteksi_pasien` VALUES (13, 'lili', 54, '886756452424', 'jabar', 'perempuan', 0, '2022-06-01 22:03:16');
INSERT INTO `tb_deteksi_pasien` VALUES (14, 'lol', 23, '234564543', 'jatim', 'perempuan', 0, '2022-06-02 17:15:37');
INSERT INTO `tb_deteksi_pasien` VALUES (15, 'andri', 61, '081559877654', 'jalan kerta negara nomor 25 dusun Bajo', 'Laki-laki', 0, '2022-06-03 13:17:50');
INSERT INTO `tb_deteksi_pasien` VALUES (16, 'mariyono', 67, '081558944785', 'jalan danau samosir', 'Laki-laki', 0, '2022-06-03 23:30:18');
INSERT INTO `tb_deteksi_pasien` VALUES (17, 'romeo', 21, '081987234876', 'jln merapi', 'Laki-laki', 0, '2022-06-03 23:40:06');
INSERT INTO `tb_deteksi_pasien` VALUES (18, 'lily', 31, '081346876123', 'banyuwangi', 'perempuan', 0, '2022-06-03 23:50:41');
INSERT INTO `tb_deteksi_pasien` VALUES (19, 'edwin ', 26, '081234543234', 'malang', 'Laki-laki', 0, '2022-06-04 22:33:42');
INSERT INTO `tb_deteksi_pasien` VALUES (20, 'lulii', 23, '081234876890', 'jatim', 'perempuan', 0, '2022-06-04 22:42:03');
INSERT INTO `tb_deteksi_pasien` VALUES (21, 'rino', 43, '087656765980', 'jl danau singkarak', 'Laki-laki', 0, '2022-06-05 08:50:41');
INSERT INTO `tb_deteksi_pasien` VALUES (22, 'lulaaaa', 21, '081234765670', 'surabaya', 'perempuan', 0, '2022-06-05 09:02:09');
INSERT INTO `tb_deteksi_pasien` VALUES (23, 'badrul', 25, '08124657653', 'jalan nuri', 'Laki-laki', 0, '2022-06-05 14:36:01');
INSERT INTO `tb_deteksi_pasien` VALUES (24, 'nanda', 23, '082564736567', 'jalan merapi', 'Laki-laki', 0, '2022-06-05 22:50:46');
INSERT INTO `tb_deteksi_pasien` VALUES (25, 'reni', 43, '081234765678', 'sawahan', 'perempuan', 0, '2022-06-06 01:04:24');
INSERT INTO `tb_deteksi_pasien` VALUES (26, 'rindi', 23, '081234765678', 'genteng', 'perempuan', 0, '2022-06-06 07:15:22');
INSERT INTO `tb_deteksi_pasien` VALUES (27, 'ana', 23, '35353535353535', 'jember', 'perempuan', 0, '2022-06-06 07:25:25');
INSERT INTO `tb_deteksi_pasien` VALUES (28, 'caca', 22, '815598557994', 'jember', 'perempuan', 0, '2022-06-06 07:36:27');
INSERT INTO `tb_deteksi_pasien` VALUES (29, 'nina', 23, '4564747557', 'jl menco', 'perempuan', 0, '2022-06-06 07:40:59');
INSERT INTO `tb_deteksi_pasien` VALUES (30, 'nini', 43, '0812347656780', 'jl dewata', 'perempuan', 0, '2022-06-06 07:52:16');
INSERT INTO `tb_deteksi_pasien` VALUES (31, 'cahyo', 21, '082656748987', 'jl mliwis', 'Laki-laki', 0, '2022-06-06 08:10:02');
INSERT INTO `tb_deteksi_pasien` VALUES (32, 'loli', 12, '081234657876', 'jember', 'perempuan', 0, '2022-06-06 08:13:04');
INSERT INTO `tb_deteksi_pasien` VALUES (33, 'loli', 24, '081234765678', 'bwi', 'perempuan', 0, '2022-06-06 08:32:42');
INSERT INTO `tb_deteksi_pasien` VALUES (34, 'febi', 31, '081234565476', 'banyuwangi', 'perempuan', 0, '2022-06-06 11:04:03');
INSERT INTO `tb_deteksi_pasien` VALUES (35, 'joko', 40, '0812345678', 'jember', 'Laki-laki', 0, '2022-06-06 11:07:44');
INSERT INTO `tb_deteksi_pasien` VALUES (36, 'ninda', 23, '08123564567', 'jalan menco', 'perempuan', 0, '2022-06-06 11:18:41');
INSERT INTO `tb_deteksi_pasien` VALUES (37, 'salsa', 21, '081276534657', 'banyuwangi', 'perempuan', 0, '2022-06-06 11:23:17');
INSERT INTO `tb_deteksi_pasien` VALUES (38, 'guntur', 23, '087657890987', 'bali', 'Laki-laki', 0, '2022-06-06 11:26:23');
INSERT INTO `tb_deteksi_pasien` VALUES (39, 'edgdfg', 53, '81559855799354', 'egregt', 'perempuan', 0, '2022-06-06 11:49:07');
INSERT INTO `tb_deteksi_pasien` VALUES (40, 'nandaa', 23, '0812347656780', 'jalan gajah mada', 'perempuan', 0, '2022-06-06 12:01:56');
INSERT INTO `tb_deteksi_pasien` VALUES (41, 'bimoli', 54, '4523545', 'xfsfsf', 'Laki-laki', 0, '2022-06-06 12:02:52');
INSERT INTO `tb_deteksi_pasien` VALUES (42, 'bela', 23, '249079867578', 'malang', 'perempuan', 0, '2022-06-06 12:19:45');
INSERT INTO `tb_deteksi_pasien` VALUES (43, 'sarul', 29, '081236576567', 'jalan krakatau', 'Laki-laki', 0, '2022-06-06 12:36:07');
INSERT INTO `tb_deteksi_pasien` VALUES (44, 'ryan', 29, '0987654321', 'situbondo', 'Laki-laki', 0, '2022-06-06 18:59:32');
INSERT INTO `tb_deteksi_pasien` VALUES (45, 'sfdasfdsf', 54, '08972816216', 'jawatimur', 'Laki-laki', 0, '2022-06-06 19:18:08');
INSERT INTO `tb_deteksi_pasien` VALUES (46, 'farhan', 28, '08123456789', 'tanggul', 'Laki-laki', 0, '2022-06-06 19:56:23');
INSERT INTO `tb_deteksi_pasien` VALUES (47, 'farhan', 29, '0812456789', 'tanggul', 'Laki-laki', 0, '2022-06-06 20:11:41');
INSERT INTO `tb_deteksi_pasien` VALUES (48, 'farhan', 24, '0987654', 'prajekan', 'Laki-laki', 0, '2022-06-06 20:19:51');
INSERT INTO `tb_deteksi_pasien` VALUES (49, 'fernandes', 67, '0987678678765', 'jalan menco', 'Laki-laki', 0, '2022-06-06 21:36:24');
INSERT INTO `tb_deteksi_pasien` VALUES (50, 'feb', 24, '08127485790', 'jalan merpati', 'perempuan', 0, '2022-06-06 21:40:59');
INSERT INTO `tb_deteksi_pasien` VALUES (51, 'nana', 23, '081234657876', 'jalan menco', 'perempuan', 0, '2022-06-07 16:22:55');
INSERT INTO `tb_deteksi_pasien` VALUES (52, 'ana', 21, '0', 'a', '', 0, '2022-06-07 16:23:47');
INSERT INTO `tb_deteksi_pasien` VALUES (53, 'febiolii', 21, '081234765678', 'gy', '', 0, '2022-06-07 16:31:31');
INSERT INTO `tb_deteksi_pasien` VALUES (54, 'rara', 65, '081234543345', 'sawahan', 'perempuan', 0, '2022-06-07 17:54:04');
INSERT INTO `tb_deteksi_pasien` VALUES (55, 'maimunah', 23, '081231234876', 'jalan manado', 'perempuan', 0, '2022-06-08 01:24:41');
INSERT INTO `tb_deteksi_pasien` VALUES (56, 'serly', 34, '089876786765', 'jalan krakatau', 'perempuan', 0, '2022-06-08 02:28:04');
INSERT INTO `tb_deteksi_pasien` VALUES (57, 'fellian', 23, '081238987890', 'pandan', 'Laki-laki', 0, '2022-06-08 10:13:45');
INSERT INTO `tb_deteksi_pasien` VALUES (58, 'lila', 21, '0842079847289', 'jalan danau', 'perempuan', 0, '2022-06-08 10:20:26');
INSERT INTO `tb_deteksi_pasien` VALUES (59, 'a', 21, '81559855799', 'a', 'Laki-laki', 0, '2022-06-08 10:27:32');
INSERT INTO `tb_deteksi_pasien` VALUES (60, 'ana', 21, '081234765678', 'maesan', 'Laki-laki', 0, '2022-06-08 11:38:37');
INSERT INTO `tb_deteksi_pasien` VALUES (61, 'a', 21, '081234765678', 'a', 'Laki-laki', 0, '2022-06-08 22:34:26');
INSERT INTO `tb_deteksi_pasien` VALUES (62, 'febiolii', 21, '81559855799', 'qwert', 'Laki-laki', 0, '2022-06-08 22:47:01');
INSERT INTO `tb_deteksi_pasien` VALUES (63, 'salsabila', 23, '081234898908', 'sawahan', 'perempuan', 0, '2022-06-09 06:15:05');
INSERT INTO `tb_deteksi_pasien` VALUES (64, 'rendi', 25, '081234890980', 'jalan menco', 'perempuan', 0, '2022-06-09 06:17:28');
INSERT INTO `tb_deteksi_pasien` VALUES (65, 'nanda', 45, '24', 'bwi', 'perempuan', 0, '2022-06-09 06:19:34');
INSERT INTO `tb_deteksi_pasien` VALUES (66, 'nita', 32, '09879884682', 'sawahan', 'perempuan', 0, '2022-06-09 06:26:36');
INSERT INTO `tb_deteksi_pasien` VALUES (67, 'Aji', 35, '08123765876567', 'jember', 'Laki-laki', 0, '2022-06-09 09:09:29');
INSERT INTO `tb_deteksi_pasien` VALUES (68, 'nina', 21, '081234557897', 'sawahan', '', 0, '2022-07-01 10:13:11');
INSERT INTO `tb_deteksi_pasien` VALUES (69, 'jgfsjgfsjf', 245, '323242', '2dfgerg', '', 0, '2022-07-01 10:17:05');
INSERT INTO `tb_deteksi_pasien` VALUES (70, 'jgfsjgfsjf', 245, '323242', '2dfgerg', 'perempuan', 0, '2022-07-01 10:17:16');
INSERT INTO `tb_deteksi_pasien` VALUES (71, 'hfyfgf', 435, '476', 'gdhg\r\n', 'perempuan', 0, '2022-07-01 10:51:04');
INSERT INTO `tb_deteksi_pasien` VALUES (72, 'samsudin', 24, '08123457543', '2asfsgfdhdfg', 'Laki-laki', 0, '2022-07-03 12:29:38');
INSERT INTO `tb_deteksi_pasien` VALUES (73, 'sely', 23, '34325235315', 'jabar', 'perempuan', 0, '2022-07-03 13:00:39');
INSERT INTO `tb_deteksi_pasien` VALUES (74, 'yudi iriyanto', 23, '0852424253625', 'jl. perikanan', 'Laki-laki', 0, '2022-07-05 23:06:28');
INSERT INTO `tb_deteksi_pasien` VALUES (75, 'yudi iriyanto', 23, '086765443653', 'jl.perikanan', 'Laki-laki', 0, '2022-07-06 23:26:40');
INSERT INTO `tb_deteksi_pasien` VALUES (76, 'yudi', 23, '32423412421', 'dgerher', 'Laki-laki', 0, '2022-07-07 01:26:56');
INSERT INTO `tb_deteksi_pasien` VALUES (77, 'yudi iriyanto', 23, '12314141414', '4efbebbeb', 'Laki-laki', 0, '2022-07-07 01:29:04');
INSERT INTO `tb_deteksi_pasien` VALUES (78, 'yudi iriyanto', 23, '21442141', 'dfbfbfb', 'Laki-laki', 0, '2022-07-07 01:56:07');
INSERT INTO `tb_deteksi_pasien` VALUES (79, 'yudi iriyanto', 23, '124154515155', 'ehbrebh', 'Laki-laki', 0, '2022-07-07 04:43:11');
INSERT INTO `tb_deteksi_pasien` VALUES (80, 'egerg', 34, '23412414', '32r31r13rgsvsrb', 'Laki-laki', 0, '2022-07-09 20:34:10');
INSERT INTO `tb_deteksi_pasien` VALUES (81, 'lula', 45, '645245287', 'jalan menco', 'perempuan', 0, '2022-07-15 19:11:56');
INSERT INTO `tb_deteksi_pasien` VALUES (82, 'bagus', 22, '051557877655', 'maesan', 'perempuan', 0, '2022-07-16 14:10:55');
INSERT INTO `tb_deteksi_pasien` VALUES (83, 'yani', 26, '08123129312312', 'jalan maesan bondowoso', 'perempuan', 0, '2022-07-16 14:54:50');
INSERT INTO `tb_deteksi_pasien` VALUES (84, 'fellian', 13, '081234587987', 'sawahan', 'Laki-laki', 0, '2022-07-18 17:24:53');
INSERT INTO `tb_deteksi_pasien` VALUES (85, 'febi', 23, '0812347876123', 'sahawan', 'perempuan', 0, '2022-07-19 10:09:17');
INSERT INTO `tb_deteksi_pasien` VALUES (86, 'nana', 23, '0831081484284', 'jhurutru', 'perempuan', 0, '2022-07-20 18:18:16');
INSERT INTO `tb_deteksi_pasien` VALUES (87, 'luli', 25, '081234568798', 'sawahan', 'perempuan', 0, '2022-07-22 10:36:04');
INSERT INTO `tb_deteksi_pasien` VALUES (88, 'njhjh', 464747474, '577686868', 'nfgndtkyjtiuje', 'perempuan', 0, '2022-07-22 13:34:26');
INSERT INTO `tb_deteksi_pasien` VALUES (89, 'lul', 23, '0997989', 'sawahan', 'perempuan', 0, '2022-07-23 12:41:18');
INSERT INTO `tb_deteksi_pasien` VALUES (90, 'lol', 21, '081234987890', 'jl menco', 'perempuan', 0, '2022-07-23 14:53:11');
INSERT INTO `tb_deteksi_pasien` VALUES (91, 'lol', 21, '081234987890', 'jl menco', 'perempuan', 0, '2022-07-23 14:53:12');
INSERT INTO `tb_deteksi_pasien` VALUES (92, 'gfyufg', 3, '5353636363633', 'fdhgchfhdth', 'perempuan', 0, '2022-07-23 15:21:17');
INSERT INTO `tb_deteksi_pasien` VALUES (93, 'Ananda Prasasti', 43, '081234559858', 'jalan  krakatau kecamatan genteng', 'perempuan', 0, '2022-07-27 00:19:45');
INSERT INTO `tb_deteksi_pasien` VALUES (94, 'Anisa budil', 20, '081234879098', 'sawahan', 'perempuan', 0, '2022-07-27 18:22:03');
INSERT INTO `tb_deteksi_pasien` VALUES (97, 'tester', 191, '09182301823021', 'indonesia', 'perempuan', 0, '2022-08-05 08:35:29');

-- ----------------------------
-- Table structure for tb_evidence
-- ----------------------------
DROP TABLE IF EXISTS `tb_evidence`;
CREATE TABLE `tb_evidence`  (
  `evidence_id` int(11) NOT NULL AUTO_INCREMENT,
  `evidence_penyakit_id` int(11) NOT NULL,
  `evidence_gejala_id` int(11) NOT NULL,
  `evidence_kode` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `evidence_nilai` float NOT NULL,
  PRIMARY KEY (`evidence_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 77 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_evidence
-- ----------------------------
INSERT INTO `tb_evidence` VALUES (1, 1, 1, 'E001', 0.8);
INSERT INTO `tb_evidence` VALUES (2, 1, 2, 'E002', 1);
INSERT INTO `tb_evidence` VALUES (3, 1, 3, 'E003', 1);
INSERT INTO `tb_evidence` VALUES (4, 1, 8, 'E004', 1);
INSERT INTO `tb_evidence` VALUES (5, 1, 9, 'E005', 1);
INSERT INTO `tb_evidence` VALUES (6, 1, 15, 'E006', 1);
INSERT INTO `tb_evidence` VALUES (7, 1, 16, 'E007', 0.8);
INSERT INTO `tb_evidence` VALUES (8, 1, 18, 'E008', 1);
INSERT INTO `tb_evidence` VALUES (9, 1, 19, 'E009', 1);
INSERT INTO `tb_evidence` VALUES (10, 1, 21, 'E010', 1);
INSERT INTO `tb_evidence` VALUES (11, 1, 22, 'E011', 1);
INSERT INTO `tb_evidence` VALUES (12, 1, 24, 'E012', 1);
INSERT INTO `tb_evidence` VALUES (13, 1, 28, 'E013', 1);
INSERT INTO `tb_evidence` VALUES (14, 1, 30, 'E014', 1);
INSERT INTO `tb_evidence` VALUES (15, 1, 33, 'E015', 0.2);
INSERT INTO `tb_evidence` VALUES (16, 1, 34, 'E016', 0.6);
INSERT INTO `tb_evidence` VALUES (17, 1, 39, 'E017', 1);
INSERT INTO `tb_evidence` VALUES (18, 1, 40, 'E018', 1);
INSERT INTO `tb_evidence` VALUES (19, 1, 41, 'E019', 1);
INSERT INTO `tb_evidence` VALUES (20, 2, 1, 'E020', 1);
INSERT INTO `tb_evidence` VALUES (21, 2, 2, 'E021', 1);
INSERT INTO `tb_evidence` VALUES (22, 2, 4, 'E022', 1);
INSERT INTO `tb_evidence` VALUES (23, 2, 5, 'E023', 0.6);
INSERT INTO `tb_evidence` VALUES (24, 2, 6, 'E024', 1);
INSERT INTO `tb_evidence` VALUES (25, 2, 7, 'E025', 1);
INSERT INTO `tb_evidence` VALUES (26, 2, 10, 'E026', 0.6);
INSERT INTO `tb_evidence` VALUES (27, 2, 11, 'E027', 0.8);
INSERT INTO `tb_evidence` VALUES (28, 2, 13, 'E028', 0.6);
INSERT INTO `tb_evidence` VALUES (29, 2, 14, 'E029', 1);
INSERT INTO `tb_evidence` VALUES (30, 2, 15, 'E030', 0.4);
INSERT INTO `tb_evidence` VALUES (31, 2, 18, 'E031', 1);
INSERT INTO `tb_evidence` VALUES (32, 2, 20, 'E032', 1);
INSERT INTO `tb_evidence` VALUES (33, 2, 21, 'E033', 1);
INSERT INTO `tb_evidence` VALUES (34, 2, 23, 'E034', 1);
INSERT INTO `tb_evidence` VALUES (35, 2, 25, 'E035', 0.4);
INSERT INTO `tb_evidence` VALUES (36, 2, 28, 'E036', 1);
INSERT INTO `tb_evidence` VALUES (37, 2, 31, 'E037', 1);
INSERT INTO `tb_evidence` VALUES (38, 2, 34, 'E038', 1);
INSERT INTO `tb_evidence` VALUES (39, 2, 36, 'E039', 0.4);
INSERT INTO `tb_evidence` VALUES (40, 2, 40, 'E040', 1);
INSERT INTO `tb_evidence` VALUES (41, 2, 41, 'E041', 1);
INSERT INTO `tb_evidence` VALUES (42, 3, 1, 'E042', 1);
INSERT INTO `tb_evidence` VALUES (43, 3, 5, 'E043', 0.2);
INSERT INTO `tb_evidence` VALUES (44, 3, 11, 'E044', 1);
INSERT INTO `tb_evidence` VALUES (45, 3, 12, 'E045', 1);
INSERT INTO `tb_evidence` VALUES (46, 3, 14, 'E046', 1);
INSERT INTO `tb_evidence` VALUES (47, 3, 17, 'E047', 1);
INSERT INTO `tb_evidence` VALUES (48, 3, 20, 'E048', 1);
INSERT INTO `tb_evidence` VALUES (49, 3, 23, 'E049', 1);
INSERT INTO `tb_evidence` VALUES (50, 3, 26, 'E050', 1);
INSERT INTO `tb_evidence` VALUES (51, 3, 29, 'E051', 1);
INSERT INTO `tb_evidence` VALUES (52, 3, 32, 'E052', 1);
INSERT INTO `tb_evidence` VALUES (53, 3, 36, 'E053', 0.8);
INSERT INTO `tb_evidence` VALUES (54, 3, 37, 'E054', 1);
INSERT INTO `tb_evidence` VALUES (55, 3, 38, 'E055', 1);
INSERT INTO `tb_evidence` VALUES (56, 3, 41, 'E056', 1);
INSERT INTO `tb_evidence` VALUES (57, 4, 1, 'E057', 1);
INSERT INTO `tb_evidence` VALUES (58, 4, 2, 'E058', 0.6);
INSERT INTO `tb_evidence` VALUES (59, 4, 3, 'E059', 0.6);
INSERT INTO `tb_evidence` VALUES (60, 4, 5, 'E060', 0.2);
INSERT INTO `tb_evidence` VALUES (61, 4, 10, 'E061', 0.2);
INSERT INTO `tb_evidence` VALUES (62, 4, 13, 'E062', 0.2);
INSERT INTO `tb_evidence` VALUES (63, 4, 14, 'E063', 0.2);
INSERT INTO `tb_evidence` VALUES (64, 4, 16, 'E064', 1);
INSERT INTO `tb_evidence` VALUES (65, 4, 18, 'E065', 1);
INSERT INTO `tb_evidence` VALUES (66, 4, 19, 'E066', 1);
INSERT INTO `tb_evidence` VALUES (67, 4, 21, 'E067', 1);
INSERT INTO `tb_evidence` VALUES (68, 4, 22, 'E068', 1);
INSERT INTO `tb_evidence` VALUES (69, 4, 25, 'E069', 1);
INSERT INTO `tb_evidence` VALUES (70, 4, 27, 'E070', 1);
INSERT INTO `tb_evidence` VALUES (71, 4, 28, 'E071', 0.8);
INSERT INTO `tb_evidence` VALUES (72, 4, 31, 'E072', 1);
INSERT INTO `tb_evidence` VALUES (73, 4, 34, 'E073', 1);
INSERT INTO `tb_evidence` VALUES (74, 4, 35, 'E074', 1);
INSERT INTO `tb_evidence` VALUES (75, 4, 36, 'E075', 1);
INSERT INTO `tb_evidence` VALUES (76, 4, 41, 'E076', 1);

-- ----------------------------
-- Table structure for tb_gejala
-- ----------------------------
DROP TABLE IF EXISTS `tb_gejala`;
CREATE TABLE `tb_gejala`  (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kode_gejala` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_gejala` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_gejala` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gejala_inputdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gejala`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_gejala
-- ----------------------------
INSERT INTO `tb_gejala` VALUES (1, 'G001', 'Bepergian ke luar kota atau luar negeri dalam kurun waktu 1 minggu', '', '2022-07-21 18:23:50');
INSERT INTO `tb_gejala` VALUES (2, 'G002', 'Kelelahan atau lemes (malaise)', '', '2022-07-21 18:23:50');
INSERT INTO `tb_gejala` VALUES (3, 'G003', 'Penurunan nafsu makan', '', '2022-07-21 18:32:55');
INSERT INTO `tb_gejala` VALUES (4, 'G004', 'Pegal linu (myalgia)', '', '2022-07-21 18:32:55');
INSERT INTO `tb_gejala` VALUES (5, 'G005', 'mual atau muntah', '', '2022-07-21 18:57:09');
INSERT INTO `tb_gejala` VALUES (6, 'G006', 'gangguan perasa(tidak bisa merasakan makanan)', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (7, 'G007', 'anosmia(tidak bisa mencium bau)', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (8, 'G008', 'penurunan berat badan', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (9, 'G009', 'berkeringat di malam hari tanpa sebab ', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (10, 'G0010', 'bersin - bersin', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (11, 'G0011', 'nyeri tenggorokan', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (12, 'G0012', 'suara serak', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (13, 'G0013', 'pilek', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (14, 'G0014', 'sakit kepala', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (15, 'G0015A', 'batuk terus menerus', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (16, 'G0015B', 'batuk  sering', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (17, 'G0015C', 'batuk jarang', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (18, 'G0016A', 'batuk berdahak', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (19, 'G0016B', 'batuk berdarah', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (20, 'G0016C', 'batuk kering', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (21, 'G0017A', 'warna dahak kuning kehijauan', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (22, 'G0017B', 'warna dahak merah', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (23, 'G0017C', 'tidak ada warna dahak', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (24, 'G0018A', 'batuk lebih dari 21 hari', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (25, 'G0018B', 'batuk kurang dari 14 hari', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (26, 'G0018C', 'batuk kurang dari 7 hari', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (27, 'G0019A', 'demam dengan suhu lebih dari 39 derajat', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (28, 'G0019B', 'demam dengan suhu antara 38 sampai 39 derajat', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (29, 'G0019C', 'demam dengan suhu antara 37 sampai 37,9 derajat', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (30, 'G0020A', 'Demam selama lebih dari 21 hari ', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (31, 'G0020B', 'Demam selama kurang dari 14 hari', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (32, 'G0020C', 'Demam selama kurang dari 7 hari', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (33, 'G0021', 'nyeri dada', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (34, 'G0022', 'sesak nafas', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (35, 'G0023', 'bunyi nafas tambahan (grok grok)', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (36, 'G0024', 'denyut jantung cepat', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (37, 'G0025', 'bercak putih atau keabuan pada tonsil', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (38, 'G0026', 'benjolan pada leher belakang ', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (39, 'G0027', 'memiliki riwayat hiv', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (40, 'G0028', 'memiliki riwayat penyakit bawaan (diabetes, jantung koroner, darah tinggi, asma, ginjal, kanker )', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (41, 'G0029', 'pernah kontak langsung dengan pasien TBC, Covid 19, Difteri dan Pneumonia', '', '0000-00-00 00:00:00');
INSERT INTO `tb_gejala` VALUES (42, 'G0030', 'tidak mengalami gejala ', '', '2022-07-21 22:33:49');

-- ----------------------------
-- Table structure for tb_hasilkonsultasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_hasilkonsultasi`;
CREATE TABLE `tb_hasilkonsultasi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NULL DEFAULT NULL,
  `kode_penyakit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hasil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 235 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_hasilkonsultasi
-- ----------------------------
INSERT INTO `tb_hasilkonsultasi` VALUES (231, 97, 'P001', '100');
INSERT INTO `tb_hasilkonsultasi` VALUES (232, 97, 'P002', '100');
INSERT INTO `tb_hasilkonsultasi` VALUES (233, 97, 'P003', '78.4');
INSERT INTO `tb_hasilkonsultasi` VALUES (234, 97, 'P004', '40');

-- ----------------------------
-- Table structure for tb_jawaban
-- ----------------------------
DROP TABLE IF EXISTS `tb_jawaban`;
CREATE TABLE `tb_jawaban`  (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_deteksi_pasien` int(11) NULL DEFAULT NULL,
  `grup_pertanyaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_jawaban`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 158 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jawaban
-- ----------------------------
INSERT INTO `tb_jawaban` VALUES (129, 97, '1', 1, '0.4');
INSERT INTO `tb_jawaban` VALUES (130, 97, '1', 2, '0.4');
INSERT INTO `tb_jawaban` VALUES (131, 97, '1', 3, '0.4');
INSERT INTO `tb_jawaban` VALUES (132, 97, '1', 4, '0.4');
INSERT INTO `tb_jawaban` VALUES (133, 97, '1', 5, '0.4');
INSERT INTO `tb_jawaban` VALUES (134, 97, '1', 6, '0.8');
INSERT INTO `tb_jawaban` VALUES (135, 97, '1', 7, '0.4');
INSERT INTO `tb_jawaban` VALUES (136, 97, '1', 8, '0.4');
INSERT INTO `tb_jawaban` VALUES (137, 97, '1', 9, '0.8');
INSERT INTO `tb_jawaban` VALUES (138, 97, '1', 10, '0.4');
INSERT INTO `tb_jawaban` VALUES (139, 97, '1', 11, '0.4');
INSERT INTO `tb_jawaban` VALUES (140, 97, '1', 12, '0.4');
INSERT INTO `tb_jawaban` VALUES (141, 97, '1', 13, '0.4');
INSERT INTO `tb_jawaban` VALUES (142, 97, '1', 14, '0.4');
INSERT INTO `tb_jawaban` VALUES (143, 97, '2', 1, '16');
INSERT INTO `tb_jawaban` VALUES (144, 97, '2', 2, '19');
INSERT INTO `tb_jawaban` VALUES (145, 97, '2', 3, '22');
INSERT INTO `tb_jawaban` VALUES (146, 97, '2', 4, '25');
INSERT INTO `tb_jawaban` VALUES (147, 97, '2', 5, '28');
INSERT INTO `tb_jawaban` VALUES (148, 97, '2', 6, '31');
INSERT INTO `tb_jawaban` VALUES (149, 97, '3', 1, '0.4');
INSERT INTO `tb_jawaban` VALUES (150, 97, '3', 2, '0.4');
INSERT INTO `tb_jawaban` VALUES (151, 97, '3', 3, '0.4');
INSERT INTO `tb_jawaban` VALUES (152, 97, '3', 4, '0.4');
INSERT INTO `tb_jawaban` VALUES (153, 97, '3', 5, '0.4');
INSERT INTO `tb_jawaban` VALUES (154, 97, '3', 6, '0.4');
INSERT INTO `tb_jawaban` VALUES (155, 97, '3', 7, '0.8');
INSERT INTO `tb_jawaban` VALUES (156, 97, '3', 8, '0.4');
INSERT INTO `tb_jawaban` VALUES (157, 97, '3', 9, '0.8');

-- ----------------------------
-- Table structure for tb_kondisi
-- ----------------------------
DROP TABLE IF EXISTS `tb_kondisi`;
CREATE TABLE `tb_kondisi`  (
  `id_kondisi` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` float NOT NULL,
  `kondisi` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kondisi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kondisi
-- ----------------------------
INSERT INTO `tb_kondisi` VALUES (1, 1, 'Sangat Yakin');
INSERT INTO `tb_kondisi` VALUES (2, 0.8, 'Yakin');
INSERT INTO `tb_kondisi` VALUES (3, 0.6, 'Cukup Yakin');
INSERT INTO `tb_kondisi` VALUES (4, 0.4, 'Sedikit Yakin');
INSERT INTO `tb_kondisi` VALUES (5, 0.2, 'Kurang Yakin');
INSERT INTO `tb_kondisi` VALUES (6, 0, 'Tidak Yakin');

-- ----------------------------
-- Table structure for tb_pasien
-- ----------------------------
DROP TABLE IF EXISTS `tb_pasien`;
CREATE TABLE `tb_pasien`  (
  `id_pasien` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama pasien` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis kelamin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal lahir` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `umur` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_teleppon` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pasien`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pasien
-- ----------------------------

-- ----------------------------
-- Table structure for tb_penyakit
-- ----------------------------
DROP TABLE IF EXISTS `tb_penyakit`;
CREATE TABLE `tb_penyakit`  (
  `id_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penyakit` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `penyakit_image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_penyakit`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_penyakit
-- ----------------------------
INSERT INTO `tb_penyakit` VALUES (1, 'P001', 'tuberculosis', '3be74b74010f5b90ab77e2f3a25eceec.png');
INSERT INTO `tb_penyakit` VALUES (2, 'P002', 'Covid-19', '24a7d64ac396bdfbbd554066a0d38614.png');
INSERT INTO `tb_penyakit` VALUES (3, 'P003', 'Difteri', '129c22433a9989d68288e1b51480faeb.png');
INSERT INTO `tb_penyakit` VALUES (4, 'P004', 'Pneumonia', 'ebcd480ebba4338107e594b9006e3d5e.png');

-- ----------------------------
-- Table structure for tb_pertanyaan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pertanyaan`;
CREATE TABLE `tb_pertanyaan`  (
  `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_gejala_pertanyaan` int(11) NOT NULL,
  `id_pertanyaan_grup` int(11) NOT NULL,
  `pertanyaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pertanyaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pertanyaan
-- ----------------------------
INSERT INTO `tb_pertanyaan` VALUES (1, 1, 1, 'Apakah dalam kurun waktu kurang dari 1 minggu anda bepergian ke luar kota / luar negeri ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (2, 2, 1, 'Apakah tubuh anda mengalami kelelahan atau lemas (malaise) ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (3, 3, 1, 'Apakah anda mengalami penurunan nafsu makan? ', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (4, 4, 2, 'Apakah tubuh anda mengalami pegal linu(myalgia)?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (5, 5, 2, 'Apakah anda mengalami mual atau muntah ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (6, 6, 2, 'Apakah anda mengalami gangguan perasa ( tidak bisa merasakan makanan)?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (7, 7, 3, 'Apakah anda mengalami anosmia (tidak bisa mencium bau)?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (8, 8, 3, 'Apakah anda mengalami penurunan berat badan ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (9, 9, 3, 'Apakah anda sering berkeringat tanpa sebab pada malam hari?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (10, 10, 4, 'Apakah anda mengalami bersin - bersin?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (11, 11, 4, 'Apakah anda mengalami nyeri pada tenggorokan?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (12, 12, 4, 'Apakah suara anda berubah menjadi serak ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (13, 13, 5, 'Apakah anda mengalami pilek ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan` VALUES (14, 14, 5, 'Apakah anda mengalami sakit kepala ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');

-- ----------------------------
-- Table structure for tb_pertanyaan2
-- ----------------------------
DROP TABLE IF EXISTS `tb_pertanyaan2`;
CREATE TABLE `tb_pertanyaan2`  (
  `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pertanyaan_grup` int(11) NOT NULL,
  `pertanyaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban_1` int(11) NOT NULL,
  `jawaban_2` int(11) NOT NULL,
  `jawaban_3` int(11) NOT NULL,
  `jawaban_4` int(11) NOT NULL,
  PRIMARY KEY (`id_pertanyaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pertanyaan2
-- ----------------------------
INSERT INTO `tb_pertanyaan2` VALUES (1, 6, 'Berapa frekuensi batuk yang anda alami ?', 15, 16, 17, 42);
INSERT INTO `tb_pertanyaan2` VALUES (2, 6, 'Jenis batuk apa yang anda alami?', 18, 19, 20, 42);
INSERT INTO `tb_pertanyaan2` VALUES (3, 6, 'Apa warna dahak ketika anda mengalami batuk?', 21, 22, 23, 42);
INSERT INTO `tb_pertanyaan2` VALUES (4, 6, 'Berapa lama anda mengalami gejala batuk?', 24, 25, 26, 42);
INSERT INTO `tb_pertanyaan2` VALUES (5, 7, 'Berapa suhu ketika anda mengalami gejala demam ?', 27, 28, 29, 42);
INSERT INTO `tb_pertanyaan2` VALUES (6, 7, 'Berapa lama anda mengalami demam ?', 30, 31, 32, 42);

-- ----------------------------
-- Table structure for tb_pertanyaan3
-- ----------------------------
DROP TABLE IF EXISTS `tb_pertanyaan3`;
CREATE TABLE `tb_pertanyaan3`  (
  `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_gejala_pertanyaan` int(11) NOT NULL,
  `id_pertanyaan_grup` int(11) NOT NULL,
  `pertanyaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban_1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban_2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban_3` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban_4` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pertanyaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pertanyaan3
-- ----------------------------
INSERT INTO `tb_pertanyaan3` VALUES (1, 33, 7, 'Apakah anda mengalami nyeri dada?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan3` VALUES (2, 34, 7, 'Apakah anda mengalami sesak nafas ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan3` VALUES (3, 35, 7, 'Apakah saat anda bernafas terdengar suara lain(grok grok)?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan3` VALUES (4, 36, 7, 'Berapa jumlah denyut jantung anda dalam satu menit ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan3` VALUES (5, 37, 8, 'Jika anda membuka mulut, apakah anda melihat ada bercak putih atau keabuan pada tonsil (daerah amandel)?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan3` VALUES (6, 38, 8, 'Jika anda meraba bagian belakang leher anda, apakah ada benjolannya ?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan3` VALUES (7, 39, 8, 'Apakah anda memiliki riwayat penyakit HIV?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan3` VALUES (8, 40, 8, 'Apakah anda mempunyai riwayat penyakit penyakit bawaan seperti (diabetes, jantung, darah tinggi, asma, ginjal, kanker) ', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');
INSERT INTO `tb_pertanyaan3` VALUES (9, 41, 8, 'Apakah anda pernah kontak langsung dengan salah satu pasien dengan diagnosis TBC / Covid-19/ Difteri atau Pneumonia pada waktu kurang dari 1 minggu yang lalu?', 'Sangat yakin', 'Yakin', 'Kurang Yakin', 'Tidak Yakin');

-- ----------------------------
-- Table structure for tb_pertanyaan_grub_2
-- ----------------------------
DROP TABLE IF EXISTS `tb_pertanyaan_grub_2`;
CREATE TABLE `tb_pertanyaan_grub_2`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grub` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pertanyaan_grub_2
-- ----------------------------
INSERT INTO `tb_pertanyaan_grub_2` VALUES (1, 'grub1');
INSERT INTO `tb_pertanyaan_grub_2` VALUES (2, 'grub2');

-- ----------------------------
-- Table structure for tb_rekomendasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_rekomendasi`;
CREATE TABLE `tb_rekomendasi`  (
  `id_rekomendasi` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rekomendasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_rekomendasi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_rekomendasi
-- ----------------------------

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_username` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_email` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_image` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `user_password` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_viewpassword` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_level` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (3, 'Febiola Putri Yunita', 'superadmin', 'superadmin@gmail.com', 'admin.png', '$2y$10$YvIQJ9PgJfKnc2UPDbtm7.UPVUkXjlVzD0m6lrwiMlBnMCtx..A6O', 'AxenNet123', 'Admin', '2022-04-14 00:52:57');

SET FOREIGN_KEY_CHECKS = 1;
