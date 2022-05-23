/*
 Navicat Premium Data Transfer

 Source Server         : sql1
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3000
 Source Schema         : mysql_web

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 03/05/2022 23:39:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bo_sach
-- ----------------------------
DROP TABLE IF EXISTS `bo_sach`;
CREATE TABLE `bo_sach`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_bo_sach` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  CONSTRAINT `bo_sach_ibfk_1` FOREIGN KEY (`id`) REFERENCES `sach` (`id_bosach`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bo_sach
-- ----------------------------
INSERT INTO `bo_sach` VALUES (1, 'Naruto');
INSERT INTO `bo_sach` VALUES (2, 'Doraemon');
INSERT INTO `bo_sach` VALUES (3, 'SPY x Family');
INSERT INTO `bo_sach` VALUES (4, 'Conan');
INSERT INTO `bo_sach` VALUES (5, 'Boruto');
INSERT INTO `bo_sach` VALUES (6, 'Học viên siêu anh hùng');
INSERT INTO `bo_sach` VALUES (7, 'Vị thần lang thang');
INSERT INTO `bo_sach` VALUES (12, 'Thanh Gươm Diệt Quỷ');

-- ----------------------------
-- Table structure for chitiet_giohang
-- ----------------------------
DROP TABLE IF EXISTS `chitiet_giohang`;
CREATE TABLE `chitiet_giohang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_giohang` int NULL DEFAULT NULL,
  `id_sach` int NULL DEFAULT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `soluong` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_sach`(`id_sach` ASC) USING BTREE,
  INDEX `chitiet_giohang_ibfk_1`(`id_giohang` ASC) USING BTREE,
  CONSTRAINT `chitiet_giohang_ibfk_1` FOREIGN KEY (`id_giohang`) REFERENCES `gio_hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chitiet_giohang_ibfk_2` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chitiet_giohang
-- ----------------------------

-- ----------------------------
-- Table structure for don_hang
-- ----------------------------
DROP TABLE IF EXISTS `don_hang`;
CREATE TABLE `don_hang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_kh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `diachi_kh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sdt_kh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email_kh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of don_hang
-- ----------------------------
INSERT INTO `don_hang` VALUES (2, 'HuynhAnhKhoa', 'An Giang', '0833 123 123', 'huynhkhoaaa123123@gmail.com');
INSERT INTO `don_hang` VALUES (3, 'HuynhAnhKhoa1', 'AnGiang', '0833 123 123', 'huynh31233123@gmail.com');
INSERT INTO `don_hang` VALUES (4, 'NgoManhTuan', 'CanTho', '0833 123 321', 'userT@gmail.com');
INSERT INTO `don_hang` VALUES (5, 'HuynhAnhKhoa', 'CanTho', '0833123123', 'userK@gmail.com');
INSERT INTO `don_hang` VALUES (6, 'Huynh Anh Khoa', 'AnGiang', '0833 123 123', 'huynh3123@gmail.com');
INSERT INTO `don_hang` VALUES (7, NULL, NULL, NULL, NULL);
INSERT INTO `don_hang` VALUES (8, 'HuynhAnhKhoa', 'An Giang', '0833 123 123', 'huynhkhoaaa123123@gmail.com');
INSERT INTO `don_hang` VALUES (9, 'abczczxc', 'angiang123', '09812321312', '1232asd@gmail.com');
INSERT INTO `don_hang` VALUES (10, 'HuynhAnhKhoa', 'CanTho', '1111111111', 'huynhkhoaaa123123@gmail.com');
INSERT INTO `don_hang` VALUES (11, 'TruongAnhKhoa', 'Cần Thơ', '123456789', 'userzxc@gmail.com');
INSERT INTO `don_hang` VALUES (12, 'Huỳnh Anh Khoa', 'Cần Thơ', '0833755199', 'huynhkhoaa27102000@gmail.com');
INSERT INTO `don_hang` VALUES (13, 'HuynhAnhKhoa1', 'An Giang', '0833123123', 'huynh31233123@gmail.com');

-- ----------------------------
-- Table structure for gio_hang
-- ----------------------------
DROP TABLE IF EXISTS `gio_hang`;
CREATE TABLE `gio_hang`  (
  `id` int NOT NULL,
  `id_khachhang` int NULL DEFAULT NULL,
  `id_donhang` int NULL DEFAULT NULL,
  `id_thanhtoan` int NULL DEFAULT NULL,
  `tong_donhang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tinhtrang_donhang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_khachhang`(`id_khachhang` ASC) USING BTREE,
  INDEX `id_donhang`(`id_donhang` ASC) USING BTREE,
  INDEX `gio_hang_ibfk_3`(`id_thanhtoan` ASC) USING BTREE,
  CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khach_hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`id_donhang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gio_hang_ibfk_3` FOREIGN KEY (`id_thanhtoan`) REFERENCES `thanh_toan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gio_hang
-- ----------------------------

-- ----------------------------
-- Table structure for khach_hang
-- ----------------------------
DROP TABLE IF EXISTS `khach_hang`;
CREATE TABLE `khach_hang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `hoten_khachhang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `phone` int NULL DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `matkhau` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `xacnhanmk` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of khach_hang
-- ----------------------------
INSERT INTO `khach_hang` VALUES (1, 'huynh khoa', 'ct', 123123, 'huynhkhoaaa@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (3, 'user9601', NULL, NULL, 'khoa@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (4, 'user7359', NULL, NULL, 'user1', '123', '123');
INSERT INTO `khach_hang` VALUES (5, 'user6554', NULL, NULL, 'user123', '123', '123');
INSERT INTO `khach_hang` VALUES (6, 'user2800', NULL, NULL, 'user123@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (7, 'user898', NULL, NULL, 'user12@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (8, 'user7117', NULL, NULL, 'huynhkhoa@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (9, 'user9875', NULL, NULL, 'huynhkhoaa77@gmail.com', 'Khoa77', 'Khoa77');
INSERT INTO `khach_hang` VALUES (10, 'user2552', NULL, NULL, 'huynhkhoaa22@gmail.com', '123456', '123456');
INSERT INTO `khach_hang` VALUES (11, 'user5804', NULL, NULL, 'userlol123@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (12, 'user8384', NULL, NULL, 'user727@gmail.com', '727', '727');
INSERT INTO `khach_hang` VALUES (13, 'user126', NULL, NULL, 'testaccount@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (14, 'user8818', NULL, NULL, 'testagain@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (15, 'user3451', NULL, NULL, 'user2710@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (16, 'user4478', NULL, NULL, 'user12@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (17, 'user8102', NULL, NULL, 'huynhkhoa@gmail.com', '1', '1');
INSERT INTO `khach_hang` VALUES (18, 'user5558', NULL, NULL, 'usertest123321@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (19, 'user117', NULL, NULL, 'khoaabc@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (20, 'user9477', NULL, NULL, 'huynhkhoaxyz@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (21, 'user2897', NULL, NULL, 'user301@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (22, 'user100', NULL, NULL, 'userlol321@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (23, 'user250', NULL, NULL, 'usertest1234@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (24, 'user4470', NULL, NULL, 'admin@gmail.com', '123', NULL);
INSERT INTO `khach_hang` VALUES (25, 'user9054', NULL, NULL, 'userlol123zxc@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (26, 'user7664', NULL, NULL, 'userss@gmail.com', '123', '1232');
INSERT INTO `khach_hang` VALUES (27, 'user1506', NULL, NULL, 'huynhkhoaa27102000@gmail.com', '123', '123');
INSERT INTO `khach_hang` VALUES (28, 'user1085', NULL, NULL, 'huynhkhoa@gmail.com', '123', NULL);
INSERT INTO `khach_hang` VALUES (29, 'user2778', NULL, NULL, 'huynhkhoa@gmail.com', '123', NULL);

-- ----------------------------
-- Table structure for nhan_vien
-- ----------------------------
DROP TABLE IF EXISTS `nhan_vien`;
CREATE TABLE `nhan_vien`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `matkhau` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `chucvu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nhan_vien
-- ----------------------------
INSERT INTO `nhan_vien` VALUES (1, 'Khoa', 'admin@gmail.com', '123', 'admin');

-- ----------------------------
-- Table structure for sach
-- ----------------------------
DROP TABLE IF EXISTS `sach`;
CREATE TABLE `sach`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gia` int NOT NULL,
  `id_tacgia` int NOT NULL,
  `soluong` int NULL DEFAULT NULL,
  `id_bosach` int NOT NULL,
  `ngaythem` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `hinhanh` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `combo` bit(1) NULL DEFAULT NULL COMMENT '1-combo , 0 - no',
  `comic` bit(1) NULL DEFAULT NULL COMMENT '1-comic, 0 - no',
  `doraemon` bit(1) NULL DEFAULT NULL COMMENT '1-doraemon, 0 - no',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_tacgia`(`id_tacgia` ASC) USING BTREE,
  INDEX `id_bosach`(`id_bosach` ASC) USING BTREE,
  CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`id_tacgia`) REFERENCES `tac_gia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sach
-- ----------------------------
INSERT INTO `sach` VALUES (1, 'NARUTO - TẬP 62', 19800, 4, 200, 1, '2022-05-03 10:30:09', 'naruto62.jpg', b'0', NULL, NULL);
INSERT INTO `sach` VALUES (2, 'BORUTO - NARUTO HẬU SINH KHẢ ÚY - QUYỂN 7', 22000, 4, 200, 5, '2022-05-03 10:30:12', 'boruto7.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (3, 'NARUTO - TẬP 58', 19800, 4, 200, 1, '2022-05-03 10:30:15', 'naruto58.jpg', b'0', NULL, NULL);
INSERT INTO `sach` VALUES (4, 'BORUTO - NARUTO HẬU SINH KHẢ ÚY - QUYỂN 6', 22000, 4, 200, 5, '2022-05-03 10:30:18', 'boruto6.jpg', b'0', NULL, NULL);
INSERT INTO `sach` VALUES (5, 'SPY X FAMILY - TẬP 6 - BẢN ĐẶC BIỆT', 45000, 2, 200, 1, '2022-04-26 13:52:38', 'pr1.jpg', b'0', NULL, NULL);
INSERT INTO `sach` VALUES (6, 'NARUTO LIMITED - TẬP 62+63', 130000, 4, 200, 1, '2022-05-03 10:30:19', 'naruto.jpg', b'1', NULL, NULL);
INSERT INTO `sach` VALUES (7, 'HỌC VIỆN SIÊU ANH HÙNG - TẬP 28', 18000, 2, 200, 6, '2022-04-26 13:52:38', 'hcah.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (8, 'COMBO THIÊN THẦN DIỆT THẾ - SERAPH OF THE END (TẬP 1-15)', 225000, 2, 200, 1, '2022-04-26 13:52:38', 'ttdt.jpg', b'1', NULL, NULL);
INSERT INTO `sach` VALUES (9, 'COMBO THÁM TỬ LỪNG DANH CONAN - ẢO THUẬT GIA CUỐI CÙNG CỦA THẾ KỈ (2 TẬP)', 102000, 2, 200, 4, '2022-04-26 13:52:38', 'conan2.jpg', b'1', NULL, NULL);
INSERT INTO `sach` VALUES (10, 'COMBO THÁM TỬ LỪNG DANH CONAN - 15 PHÚT TRẦM MẶC (2 TẬP)', 85000, 2, 200, 4, '2022-04-26 13:52:38', 'conan3.jpg', b'1', NULL, NULL);
INSERT INTO `sach` VALUES (11, 'COMBO SPY X FAMILY (TẬP 1-5)', 106000, 2, 200, 3, '2022-04-26 13:52:38', 'combospy.jpg', b'1', NULL, NULL);
INSERT INTO `sach` VALUES (12, 'COMBO ĐỘI QUÂN DORAEMON ĐẶC BIỆT (12 TẬP)', 183600, 2, 200, 1, '2022-04-26 13:52:38', 'doraemoncombo.jpg', b'1', NULL, NULL);
INSERT INTO `sach` VALUES (13, 'THÁM TỬ LỪNG DANH CONAN - NHỮNG CÂU CHUYỆN LÃNG MẠN - TẬP 1 (2020)', 40500, 2, 200, 4, '2022-04-26 13:52:38', 'conan5.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (14, 'THÁM TỬ LỪNG DANH CONAN - NHỮNG CÂU CHUYỆN LÃNG MẠN - TẬP 2 (2020)', 45000, 2, 200, 4, '2022-04-26 13:52:38', 'conan4.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (15, 'NARUTO - TẬP 70', 19800, 4, 200, 1, '2022-05-03 10:30:25', 'naruto70.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (22, 'NARUTO - TẬP 71', 19800, 4, 200, 1, '2022-05-03 10:30:25', 'naruto71.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (23, 'NARUTO - TẬP 72', 19800, 4, 200, 1, '2022-05-03 10:30:26', 'naruto72.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (24, 'NARUTO NGOẠI TRUYỆN - HOKAGE ĐỆ THẤT VÀ MÙA HOA ĐỎ', 22500, 4, 200, 1, '2022-05-03 10:30:27', 'narutont.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (25, 'VỊ THẦN LANG THANG - TẬP 20', 18000, 2, 200, 7, '2022-04-16 23:39:24', 'vtlt20.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (26, 'BORUTO - TẬP 11', 22500, 4, 200, 5, '2022-05-03 10:30:28', 'boruto11.jpg', NULL, b'1', NULL);
INSERT INTO `sach` VALUES (27, 'DORAEMON HỌC TẬP - CỘNG TRỪ', 36000, 3, 200, 2, '2022-04-16 21:40:39', 'doraemon.jpg', NULL, NULL, b'1');
INSERT INTO `sach` VALUES (28, 'DORAEMON HỌC TẬP - ĐIỀN KINH', 36000, 3, 200, 2, '2022-04-16 21:40:40', 'doraemon2.jpg', NULL, NULL, b'1');
INSERT INTO `sach` VALUES (29, 'DORAEMON HỌC TẬP - CÙNG LÀM HỌA SĨ', 36000, 3, 200, 2, '2022-04-16 21:40:41', 'doraemon3.jpg', NULL, NULL, b'1');
INSERT INTO `sach` VALUES (30, 'DORAEMON BÓNG CHÀY - TẬP 9', 16200, 3, 200, 2, '2022-04-16 21:40:42', 'doraemon5.jpg', NULL, NULL, b'1');
INSERT INTO `sach` VALUES (31, 'THẺ HỌC CÙNG DORAEMON - PHÁT TRIỂN IQ', 40500, 3, 200, 2, '2022-04-16 21:40:44', 'doraemon4.jpg', NULL, NULL, b'1');
INSERT INTO `sach` VALUES (40, 'Kudo', 500000, 3, NULL, 11, '2022-05-03 22:40:17', 'itachi14.jpg', NULL, NULL, NULL);
INSERT INTO `sach` VALUES (45, 'Naruto Tập 66', 500000, 4, NULL, 1, '2022-04-30 16:41:24', 'naruto6699.jpg', NULL, NULL, NULL);
INSERT INTO `sach` VALUES (46, 'Thanh Gươm Diệt Quỷ Tập 8', 22222, 9, NULL, 12, '2022-05-03 10:05:22', 'tgdq62.jpg', NULL, NULL, NULL);
INSERT INTO `sach` VALUES (47, 'Naruto Tập 1', 19800, 4, NULL, 1, '2022-05-03 12:04:43', 'narutot138.jpg', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tac_gia
-- ----------------------------
DROP TABLE IF EXISTS `tac_gia`;
CREATE TABLE `tac_gia`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_tac_gia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tac_gia
-- ----------------------------
INSERT INTO `tac_gia` VALUES (2, 'Adachitoka');
INSERT INTO `tac_gia` VALUES (3, 'Fujiko F Fujio');
INSERT INTO `tac_gia` VALUES (4, 'Kishimoto');
INSERT INTO `tac_gia` VALUES (7, 'Gege Akutami');
INSERT INTO `tac_gia` VALUES (9, 'Gotouge Koyoharu');

-- ----------------------------
-- Table structure for thanh_toan
-- ----------------------------
DROP TABLE IF EXISTS `thanh_toan`;
CREATE TABLE `thanh_toan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `phuongthuc_thanhtoan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tinhtrang_thanhtoan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of thanh_toan
-- ----------------------------

-- ----------------------------
-- Triggers structure for table gio_hang
-- ----------------------------
DROP TRIGGER IF EXISTS `capNhatSoLuongSach`;
delimiter ;;
CREATE TRIGGER `capNhatSoLuongSach` AFTER INSERT ON `gio_hang` FOR EACH ROW BEGIN
	UPDATE sach SET soluong = soluong - chitiet_donhang.soluong WHERE sach.id = chitiet_donhang.id_sach;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
