/*
 Navicat Premium Data Transfer

 Source Server         : HEAD_AIDSDOE
 Source Server Type    : MySQL
 Source Server Version : 80026
 Source Host           : xxx.xxx.xxx.xxx:3306
 Source Schema         : kainoi

 Target Server Type    : MySQL
 Target Server Version : 80026
 File Encoding         : 65001

 Date: 02/07/2024 13:18:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for amphures
-- ----------------------------
DROP TABLE IF EXISTS `amphures`;
CREATE TABLE `amphures`  (
  `AMPHUR_ID` int(0) NOT NULL AUTO_INCREMENT,
  `AMPHUR_CODE` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AMPHUR_NAME` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AMPHUR_NAME_ENG` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GEO_ID` int(0) NOT NULL DEFAULT 0,
  `PROVINCE_ID` int(0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`AMPHUR_ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1007 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts`  (
  `DISTRICT_ID` int(0) NOT NULL AUTO_INCREMENT,
  `DISTRICT_CODE` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `DISTRICT_NAME` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `DISTRICT_NAME_ENG` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `AMPHUR_ID` int(0) NOT NULL DEFAULT 0,
  `PROVINCE_ID` int(0) NOT NULL DEFAULT 0,
  `GEO_ID` int(0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`DISTRICT_ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8914 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'InnoDB free: 8192 kB' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for geography
-- ----------------------------
DROP TABLE IF EXISTS `geography`;
CREATE TABLE `geography`  (
  `GEO_ID` int(0) NOT NULL AUTO_INCREMENT,
  `GEO_NAME` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`GEO_ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'InnoDB free: 8192 kB' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for lab_offical
-- ----------------------------
DROP TABLE IF EXISTS `lab_offical`;
CREATE TABLE `lab_offical`  (
  `cliid` int(0) NOT NULL,
  `cliname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cliid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for labuser
-- ----------------------------
DROP TABLE IF EXISTS `labuser`;
CREATE TABLE `labuser`  (
  `IDLAB` int(0) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERS` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PASS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `TEL` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `EMAIL` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `HOS` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `STATUS` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`IDLAB`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for not_coupon_interested
-- ----------------------------
DROP TABLE IF EXISTS `not_coupon_interested`;
CREATE TABLE `not_coupon_interested`  (
  `no` int(0) NOT NULL AUTO_INCREMENT,
  `date_ci` datetime(0) NOT NULL,
  `IP` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 601 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for not_swarm_code
-- ----------------------------
DROP TABLE IF EXISTS `not_swarm_code`;
CREATE TABLE `not_swarm_code`  (
  `no` int(0) NOT NULL AUTO_INCREMENT,
  `date_swarm` datetime(0) NOT NULL,
  `code_swarm` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1457 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for not_swarm_oldusers
-- ----------------------------
DROP TABLE IF EXISTS `not_swarm_oldusers`;
CREATE TABLE `not_swarm_oldusers`  (
  `no` int(0) NOT NULL AUTO_INCREMENT,
  `date_swarm` datetime(0) NOT NULL,
  `code_swarm` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 89 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for not_telephone_duplicate
-- ----------------------------
DROP TABLE IF EXISTS `not_telephone_duplicate`;
CREATE TABLE `not_telephone_duplicate`  (
  `no` int(0) NOT NULL AUTO_INCREMENT,
  `rdscode` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_dup` datetime(0) NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1860 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces`  (
  `PROVINCE_ID` int(0) NOT NULL AUTO_INCREMENT,
  `PROVINCE_CODE` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE_NAME` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE_NAME_ENG` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GEO_ID` int(0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`PROVINCE_ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 78 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for seed_candidate
-- ----------------------------
DROP TABLE IF EXISTS `seed_candidate`;
CREATE TABLE `seed_candidate`  (
  `SC_ID` int(0) NOT NULL AUTO_INCREMENT,
  `QPICYBLO` int(0) NULL DEFAULT NULL,
  `QPICYBLO_OTHER` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `CANDINT` int(0) NULL DEFAULT NULL,
  `CANDDEVICE` int(0) NULL DEFAULT NULL,
  `CANDDATE` datetime(0) NULL DEFAULT NULL,
  `CANDLOC1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `SEEDINTMSG` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`SC_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7501 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sendphone_sms
-- ----------------------------
DROP TABLE IF EXISTS `sendphone_sms`;
CREATE TABLE `sendphone_sms`  (
  `SMS2ID` int(0) NOT NULL AUTO_INCREMENT,
  `REGMOBILE` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `coupon1` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`SMS2ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 152 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbanswer
-- ----------------------------
DROP TABLE IF EXISTS `tbanswer`;
CREATE TABLE `tbanswer`  (
  `RDSCODE` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `STATUSCODE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DATE_REGISTER` datetime(0) NULL DEFAULT NULL,
  `ISSEED` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELCIDN` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELLOC1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELLOC2` int(0) NULL DEFAULT NULL,
  `ELCIDN2` int(0) NULL DEFAULT NULL,
  `ELCIDN3` int(0) NULL DEFAULT NULL,
  `NATION` int(0) NULL DEFAULT NULL,
  `NATION_OTH` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ELKNOW` int(0) NULL DEFAULT NULL,
  `ELRECPART` int(0) NULL DEFAULT NULL,
  `ELRECMSM` int(0) NULL DEFAULT NULL,
  `ELDUP` int(0) NULL DEFAULT NULL,
  `ELCOUP` int(0) NULL DEFAULT NULL,
  `ELSXBORN` int(0) NULL DEFAULT NULL,
  `ELTGNOW` int(0) NULL DEFAULT NULL,
  `ELAGE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELTGNOW_OTH` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ELLOCZIP` int(0) NULL DEFAULT NULL,
  `ELMSMEV` int(0) NULL DEFAULT NULL,
  `ELMSMREC` int(0) NULL DEFAULT NULL,
  `ELDG` int(0) NULL DEFAULT NULL,
  `ELFRREC` int(0) NULL DEFAULT NULL,
  `ELIGIB` int(0) NULL DEFAULT NULL,
  `ISCONSENT` int(0) NULL DEFAULT NULL,
  `ISJOIN` int(0) NULL DEFAULT NULL,
  `REGMOBILE` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ISQUES` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE01` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE02` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE03` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE04` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE05` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE06` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `OTP_ACT_QUES` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `OTP_ACT_TEST` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DATE_INSENT_PASS` datetime(0) NULL DEFAULT NULL,
  `INCEETIVE_P01` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `INCEETIVE_P02` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DATE_INSENT_NETWORK` datetime(0) NULL DEFAULT NULL,
  `INCENTIVE_N01` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `INCENTIVE_N02` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `INCENTIVE_N03` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `INCENTIVE_N04` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `INCENTIVE_N05` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `INCENTIVE_N06` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `IS_Agree` int(0) NULL DEFAULT NULL,
  `KNHIV` int(0) NULL DEFAULT NULL,
  `KNHIV_OTH` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `STATUS_LAB` int(0) NULL DEFAULT NULL,
  `HASLABTEST` int(0) NULL DEFAULT NULL,
  `NAME_REPORT` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `NAME_CLINIC` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `GET_RESULT` int(0) NULL DEFAULT NULL,
  `GET_RESULTDATE` datetime(0) NULL DEFAULT NULL,
  `VIRAL_LOAD` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `HB` int(0) NULL DEFAULT NULL,
  `HC` int(0) NULL DEFAULT NULL,
  `LAB_TESTDATE` datetime(0) NULL DEFAULT NULL,
  `LAB_NUMBER` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DATE_INSENT_LAB` datetime(0) NULL DEFAULT NULL,
  `INCENTIVE_TEST` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DEVICE_TYPE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BROWSER_TYPE` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `SC_ID` int(0) NULL DEFAULT NULL,
  `ELREGION` int(0) NULL DEFAULT NULL,
  `ELPROVINCE` int(0) NULL DEFAULT NULL,
  `ELDISTRICT` int(0) NULL DEFAULT NULL,
  `ELLOCBM` int(0) NULL DEFAULT NULL,
  `ELLOC5` int(0) NULL DEFAULT NULL,
  `T100` int(0) NULL DEFAULT NULL,
  `T200` int(0) NULL DEFAULT NULL,
  `T300` int(0) NULL DEFAULT NULL,
  `LASTUPDATE` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`RDSCODE`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbanswer - copy
-- ----------------------------
DROP TABLE IF EXISTS `tbanswer - copy`;
CREATE TABLE `tbanswer - copy`  (
  `RDSCODE` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `STATUSCODE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `DATE_REGISTER` datetime(0) NULL DEFAULT NULL,
  `ISSEED` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELCIDN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELLOC1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELLOC2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELCIDN2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELCIDN3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `NATION` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `NATION_OTH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELKNOW` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELRECPART` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELRECMSM` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELDUP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELCOUP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELSXBORN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELTGNOW` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELAGE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELTGNOW_OTH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELLOCZIP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELMSMEV` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELMSMREC` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELDG` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELFRREC` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELIGIB` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ISCONSENT` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ISJOIN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `REGMOBILE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ISQUES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PEERCODE01` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PEERCODE02` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PEERCODE03` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PEERCODE04` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PEERCODE05` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PEERCODE06` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `OTP_ACT_QUES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `OTP_ACT_TEST` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `DATE_INSENT_PASS` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `INCEETIVE_P01` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `INCEETIVE_P02` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `DATE_INSENT_NETWORK` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `INCENTIVE_N01` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `INCENTIVE_N02` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `INCENTIVE_N03` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `INCENTIVE_N04` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `INCENTIVE_N05` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `INCENTIVE_N06` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `IS_Agree` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `KNHIV` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `KNHIV_OTH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `STATUS_LAB` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HASLABTEST` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `NAME_REPORT` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `NAME_CLINIC` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `GET_RESULT` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `GET_RESULTDATE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `VIRAL_LOAD` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HB` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HC` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LAB_TESTDATE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LAB_NUMBER` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `DATE_INSENT_LAB` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `INCENTIVE_TEST` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `DEVICE_TYPE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BROWSER_TYPE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `SC_ID` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELREGION` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELPROVINCE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELDISTRICT` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELLOCBM` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ELLOC5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `T100` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `T200` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `T300` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LASTUPDATE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbanswer_s
-- ----------------------------
DROP TABLE IF EXISTS `tbanswer_s`;
CREATE TABLE `tbanswer_s`  (
  `RUN_NO` int(0) NOT NULL AUTO_INCREMENT,
  `STATUSCODE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ISSEED` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `SC_ID` int(0) NULL DEFAULT NULL,
  `ELCIDN` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELCIDN2` int(0) NULL DEFAULT NULL,
  `ELCIDN3` int(0) NULL DEFAULT NULL,
  `QPTIL` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `QPTTL` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `QPVER` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `QPDE` int(0) NULL DEFAULT NULL,
  `QPIDATE` date NULL DEFAULT NULL,
  `QPITIME` time(0) NULL DEFAULT NULL,
  `QP6M` date NULL DEFAULT NULL,
  `QP12M` date NULL DEFAULT NULL,
  `QPPID` int(0) NULL DEFAULT NULL,
  `ELLOC1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELLOC2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELLOC3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELLOC4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELLOC5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELNOMSG1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ELMSG1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `TEL_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELSNAT` int(0) NULL DEFAULT NULL,
  `ELSNAT_OTHER` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ELKNOW` int(0) NULL DEFAULT NULL,
  `ELRECPART` int(0) NULL DEFAULT NULL,
  `ELRECMSM` int(0) NULL DEFAULT NULL,
  `ELDUP` int(0) NULL DEFAULT NULL,
  `ELCOUP` int(0) NULL DEFAULT NULL,
  `ELSXBORN` int(0) NULL DEFAULT NULL,
  `ELTGNOW` int(0) NULL DEFAULT NULL,
  `ELAGE` int(0) NULL DEFAULT NULL,
  `ELSREGION` int(0) NULL DEFAULT NULL,
  `ELPROVINCE` int(0) NULL DEFAULT NULL,
  `ELDISTRICT` int(0) NULL DEFAULT NULL,
  `ELLOCBM` int(0) NULL DEFAULT NULL,
  `ELMSMEV` int(0) NULL DEFAULT NULL,
  `ELMSMREC` int(0) NULL DEFAULT NULL,
  `ELDG` int(0) NULL DEFAULT NULL,
  `ELFRREC` int(0) NULL DEFAULT NULL,
  `ELIGIB` int(0) NULL DEFAULT NULL,
  `ELNOMSG2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ELEND` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ISCONSENT` int(0) NULL DEFAULT NULL,
  `ISJOIN` int(0) NULL DEFAULT NULL,
  `ISQUES` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE01` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE02` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE03` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE04` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE05` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `PEERCODE06` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `OTP_ACT_QUES` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `OTP_ACT_TEST` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BMDEC` int(0) NULL DEFAULT NULL,
  `BMCLINICNAME` int(0) NULL DEFAULT NULL,
  `RFBIO` int(0) NULL DEFAULT NULL,
  `RFBIO_OTH` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `STATUS_LAB` int(0) NULL DEFAULT NULL,
  `LASTUPDATE` datetime(0) NULL DEFAULT NULL,
  `REMARK` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`RUN_NO`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbcoupon
-- ----------------------------
DROP TABLE IF EXISTS `tbcoupon`;
CREATE TABLE `tbcoupon`  (
  `Coupon` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IsActivated` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `DateExpire` datetime(0) NULL DEFAULT NULL,
  `DateActivated` datetime(0) NULL DEFAULT NULL,
  `IsUsed` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `DateUsed` datetime(0) NULL DEFAULT NULL,
  `IsCancel` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `IsFail2Regist` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `DateCancel` datetime(0) NULL DEFAULT NULL,
  `Recruiter` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Coupon`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbcouponlog
-- ----------------------------
DROP TABLE IF EXISTS `tbcouponlog`;
CREATE TABLE `tbcouponlog`  (
  `couponinput` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dateinput` datetime(0) NULL DEFAULT NULL,
  `fromip` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cookie_accept` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `isolduser` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `coupon_existed` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `coupon_activated` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `coupon_used` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `coupon_cancel` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `coupon_expired` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `coupon_fail2regis` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `coupon_valid` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `device_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `browser_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ip_from` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lastupdate` datetime(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbecoupon
-- ----------------------------
DROP TABLE IF EXISTS `tbecoupon`;
CREATE TABLE `tbecoupon`  (
  `cnumber` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cvalue` int(0) NOT NULL,
  `used_date` datetime(0) NULL DEFAULT NULL,
  `remark` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cnumber`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tblab
-- ----------------------------
DROP TABLE IF EXISTS `tblab`;
CREATE TABLE `tblab`  (
  `BMMSG1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `BMDATE` date NULL DEFAULT NULL,
  `BMTIME` time(0) NULL DEFAULT NULL,
  `BMCLID` int(0) NULL DEFAULT NULL,
  `BMSTID` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `BMRETEL1` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BMRETEL2` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BMRECID` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `BMCONS` int(0) NULL DEFAULT NULL,
  `BMTESTDATE` date NULL DEFAULT NULL,
  `BMSPX` int(0) NULL DEFAULT NULL,
  `keytest1` int(0) NULL DEFAULT NULL,
  `keytest2` int(0) NULL DEFAULT NULL,
  `keytest3` int(0) NULL DEFAULT NULL,
  `keytest4` int(0) NULL DEFAULT NULL,
  `keytest5` int(0) NULL DEFAULT NULL,
  `BMASSAY1` int(0) NULL DEFAULT NULL,
  `BMASSAY1RES` int(0) NULL DEFAULT NULL,
  `BMASSAY2` int(0) NULL DEFAULT NULL,
  `BMASSAY2RES` int(0) NULL DEFAULT NULL,
  `BMASSAY3` int(0) NULL DEFAULT NULL,
  `BMASSAY3RES` int(0) NULL DEFAULT NULL,
  `BMHIVRES` int(0) NULL DEFAULT NULL,
  `BMVLRES` int(0) NULL DEFAULT NULL,
  `BMVLRES_OTH` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `BMCOMM` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `Syphilis` int(0) NULL DEFAULT NULL,
  `HB` int(0) NULL DEFAULT NULL,
  `HC` int(0) NULL DEFAULT NULL,
  `Recency` int(0) NULL DEFAULT NULL,
  `LABNUMBER` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `RFBIO` int(0) NULL DEFAULT NULL,
  `RFBIO_OTH` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `T500` int(0) NULL DEFAULT NULL,
  `LASTUPDATE` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`BMRECID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tblab_sa
-- ----------------------------
DROP TABLE IF EXISTS `tblab_sa`;
CREATE TABLE `tblab_sa`  (
  `BMMSG1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMDATE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMTIME` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMCLID` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMSTID` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMRETEL1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMRETEL2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMRECID` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMCONS` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMTESTDATE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMSPX` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keytest1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keytest2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keytest3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keytest4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keytest5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMASSAY1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMASSAY1RES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMASSAY2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMASSAY2RES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMASSAY3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMASSAY3RES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMHIVRES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMVLRES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMVLRES_OTH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMCOMM` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Syphilis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HB` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HC` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Recency` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LABNUMBER` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `RFBIO` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `RFBIO_OTH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `T500` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LASTUPDATE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbpaylog
-- ----------------------------
DROP TABLE IF EXISTS `tbpaylog`;
CREATE TABLE `tbpaylog`  (
  `mnumber` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date_process` datetime(0) NULL DEFAULT NULL,
  `pay_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pay_value` int(0) NULL DEFAULT NULL,
  `pay_detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbpayqueue
-- ----------------------------
DROP TABLE IF EXISTS `tbpayqueue`;
CREATE TABLE `tbpayqueue`  (
  `mnumber` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pay_for` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pay_value` int(0) NOT NULL,
  `req_date` datetime(0) NOT NULL,
  `paid_date` datetime(0) NULL DEFAULT NULL,
  `ecoupon01` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ecoupon02` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ecoupon03` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ecoupon04` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ecoupon05` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `paid_result` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `paid_remark` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mnumber`, `pay_for`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbresult
-- ----------------------------
DROP TABLE IF EXISTS `tbresult`;
CREATE TABLE `tbresult`  (
  `IDRESULT` int(0) NOT NULL AUTO_INCREMENT,
  `LABNUMBER` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `BMHIVRES` int(0) NULL DEFAULT NULL,
  `BMVLRES` int(0) NULL DEFAULT NULL,
  `BMVLRES_OTH` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `HB` int(0) NULL DEFAULT NULL,
  `HC` int(0) NULL DEFAULT NULL,
  `Syphilis_RPR` int(0) NULL DEFAULT NULL,
  `titer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Syphilis_TP` int(0) NOT NULL,
  `Recency` int(0) NULL DEFAULT NULL,
  `LASTUPDATE` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`IDRESULT`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbresult-dryrun
-- ----------------------------
DROP TABLE IF EXISTS `tbresult-dryrun`;
CREATE TABLE `tbresult-dryrun`  (
  `IDRESULT` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LABNUMBER` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMHIVRES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMVLRES` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `BMVLRES_OTH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HB` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HC` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Syphilis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Recency` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LASTUPDATE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbseed
-- ----------------------------
DROP TABLE IF EXISTS `tbseed`;
CREATE TABLE `tbseed`  (
  `RDSCODE` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `STATUSCODE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DATE_REGISTER` datetime(0) NULL DEFAULT NULL,
  `ISSEED` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELCIDN` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELLOC1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELLOC2` int(0) NULL DEFAULT NULL,
  `ELCIDN2` int(0) NULL DEFAULT NULL,
  `ELCIDN3` int(0) NULL DEFAULT NULL,
  `NATION` int(0) NULL DEFAULT NULL,
  `NATION_OTH` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ELKNOW` int(0) NULL DEFAULT NULL,
  `ELRECPART` int(0) NULL DEFAULT NULL,
  `ELRECMSM` int(0) NULL DEFAULT NULL,
  `ELDUP` int(0) NULL DEFAULT NULL,
  `ELCOUP` int(0) NULL DEFAULT NULL,
  `ELSXBORN` int(0) NULL DEFAULT NULL,
  `ELTGNOW` int(0) NULL DEFAULT NULL,
  `ELAGE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ELLOCZIP` int(0) NULL DEFAULT NULL,
  `ELMSMEV` int(0) NULL DEFAULT NULL,
  `ELMSMREC` int(0) NULL DEFAULT NULL,
  `ELDG` int(0) NULL DEFAULT NULL,
  `ELFRREC` int(0) NULL DEFAULT NULL,
  `ELIGIB` int(0) NULL DEFAULT NULL,
  `ISCONSENT` int(0) NULL DEFAULT NULL,
  `ISJOIN` int(0) NULL DEFAULT NULL,
  `REGMOBILE` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `OTP_ACT_QUES` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `OTP_ACT_TEST` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `DEVICE_TYPE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BROWSER_TYPE` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `SC_ID` int(0) NOT NULL,
  `ELREGION` int(0) NULL DEFAULT NULL,
  `ELPROVINCE` int(0) NULL DEFAULT NULL,
  `ELDISTRICT` int(0) NULL DEFAULT NULL,
  `ELLOCBM` int(0) NULL DEFAULT NULL,
  `ELLOC5` int(0) NULL DEFAULT NULL,
  `T100` int(0) NULL DEFAULT NULL,
  `T200` int(0) NULL DEFAULT NULL,
  `LASTUPDATE` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`SC_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbtoken
-- ----------------------------
DROP TABLE IF EXISTS `tbtoken`;
CREATE TABLE `tbtoken`  (
  `TokenID` int(0) NOT NULL,
  `Token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `statusToken` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TokenID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbwave
-- ----------------------------
DROP TABLE IF EXISTS `tbwave`;
CREATE TABLE `tbwave`  (
  `RDSCODE` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `WaveNumber` int(0) NOT NULL,
  `Recruiter` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Seed` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for testphone_sms
-- ----------------------------
DROP TABLE IF EXISTS `testphone_sms`;
CREATE TABLE `testphone_sms`  (
  `SMSID` int(0) NOT NULL AUTO_INCREMENT,
  `REGMOBILE` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `coupon1` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`SMSID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tricky_coupon
-- ----------------------------
DROP TABLE IF EXISTS `tricky_coupon`;
CREATE TABLE `tricky_coupon`  (
  `no` int(0) NOT NULL AUTO_INCREMENT,
  `date_pi` datetime(0) NOT NULL,
  `rdscode` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `regmobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `IP` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for zipcodes
-- ----------------------------
DROP TABLE IF EXISTS `zipcodes`;
CREATE TABLE `zipcodes`  (
  `zipcode_id` int(0) NOT NULL AUTO_INCREMENT,
  `district_code` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zipcode` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`zipcode_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7512 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
