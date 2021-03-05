/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : test-tab

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2021-03-05 17:14:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xhx_holiday
-- ----------------------------
DROP TABLE IF EXISTS `xhx_holiday`;
CREATE TABLE `xhx_holiday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` date DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xhx_holiday
-- ----------------------------
INSERT INTO `xhx_holiday` VALUES ('1', '2021-01-01', '元旦');
INSERT INTO `xhx_holiday` VALUES ('2', '2021-01-02', '休');
INSERT INTO `xhx_holiday` VALUES ('3', '2021-01-03', '休');
INSERT INTO `xhx_holiday` VALUES ('4', '2021-01-09', '休');
INSERT INTO `xhx_holiday` VALUES ('5', '2021-01-10', '休');
INSERT INTO `xhx_holiday` VALUES ('6', '2021-01-16', '休');
INSERT INTO `xhx_holiday` VALUES ('7', '2021-01-17', '休');
INSERT INTO `xhx_holiday` VALUES ('8', '2021-01-23', '休');
INSERT INTO `xhx_holiday` VALUES ('9', '2021-01-24', '休');
INSERT INTO `xhx_holiday` VALUES ('10', '2021-01-30', '休');
INSERT INTO `xhx_holiday` VALUES ('11', '2021-01-31', '休');
INSERT INTO `xhx_holiday` VALUES ('12', '2021-02-06', '休');
INSERT INTO `xhx_holiday` VALUES ('13', '2021-02-11', '春节');
INSERT INTO `xhx_holiday` VALUES ('14', '2021-02-12', '春节');
INSERT INTO `xhx_holiday` VALUES ('15', '2021-02-13', '春节');
INSERT INTO `xhx_holiday` VALUES ('16', '2021-02-14', '休');
INSERT INTO `xhx_holiday` VALUES ('17', '2021-02-15', '休');
INSERT INTO `xhx_holiday` VALUES ('18', '2021-02-16', '休');
INSERT INTO `xhx_holiday` VALUES ('19', '2021-02-17', '休');
INSERT INTO `xhx_holiday` VALUES ('20', '2021-02-21', '休');
INSERT INTO `xhx_holiday` VALUES ('21', '2021-02-27', '休');
INSERT INTO `xhx_holiday` VALUES ('22', '2021-02-28', '休');
INSERT INTO `xhx_holiday` VALUES ('23', '2021-03-06', '休');
INSERT INTO `xhx_holiday` VALUES ('24', '2021-03-07', '休');
INSERT INTO `xhx_holiday` VALUES ('25', '2021-03-13', '休');
INSERT INTO `xhx_holiday` VALUES ('26', '2021-03-14', '休');
INSERT INTO `xhx_holiday` VALUES ('27', '2021-03-20', '休');
INSERT INTO `xhx_holiday` VALUES ('28', '2021-03-21', '休');
INSERT INTO `xhx_holiday` VALUES ('29', '2021-03-27', '休');
INSERT INTO `xhx_holiday` VALUES ('30', '2021-03-28', '休');
INSERT INTO `xhx_holiday` VALUES ('31', '2021-04-03', '清明节');
INSERT INTO `xhx_holiday` VALUES ('32', '2021-04-04', '休');
INSERT INTO `xhx_holiday` VALUES ('33', '2021-04-05', '休');
INSERT INTO `xhx_holiday` VALUES ('34', '2021-04-10', '休');
INSERT INTO `xhx_holiday` VALUES ('35', '2021-04-11', '休');
INSERT INTO `xhx_holiday` VALUES ('36', '2021-04-17', '休');
INSERT INTO `xhx_holiday` VALUES ('37', '2021-04-18', '休');
INSERT INTO `xhx_holiday` VALUES ('38', '2021-04-24', '休');
INSERT INTO `xhx_holiday` VALUES ('39', '2021-05-01', '劳动节');
INSERT INTO `xhx_holiday` VALUES ('40', '2021-05-02', '休');
INSERT INTO `xhx_holiday` VALUES ('41', '2021-05-03', '休');
INSERT INTO `xhx_holiday` VALUES ('42', '2021-05-04', '休');
INSERT INTO `xhx_holiday` VALUES ('43', '2021-05-05', '休');
INSERT INTO `xhx_holiday` VALUES ('44', '2021-05-09', '休');
INSERT INTO `xhx_holiday` VALUES ('45', '2021-05-15', '休');
INSERT INTO `xhx_holiday` VALUES ('46', '2021-05-16', '休');
INSERT INTO `xhx_holiday` VALUES ('47', '2021-05-22', '休');
INSERT INTO `xhx_holiday` VALUES ('48', '2021-05-23', '休');
INSERT INTO `xhx_holiday` VALUES ('49', '2021-05-29', '休');
INSERT INTO `xhx_holiday` VALUES ('50', '2021-05-30', '休');
INSERT INTO `xhx_holiday` VALUES ('51', '2021-06-05', '休');
INSERT INTO `xhx_holiday` VALUES ('52', '2021-06-06', '休');
INSERT INTO `xhx_holiday` VALUES ('53', '2021-06-12', '端午节');
INSERT INTO `xhx_holiday` VALUES ('54', '2021-06-13', '休');
INSERT INTO `xhx_holiday` VALUES ('55', '2021-06-14', '休');
INSERT INTO `xhx_holiday` VALUES ('56', '2021-06-19', '休');
INSERT INTO `xhx_holiday` VALUES ('57', '2021-06-20', '休');
INSERT INTO `xhx_holiday` VALUES ('58', '2021-06-26', '休');
INSERT INTO `xhx_holiday` VALUES ('59', '2021-06-27', '休');
INSERT INTO `xhx_holiday` VALUES ('60', '2021-07-03', '休');
INSERT INTO `xhx_holiday` VALUES ('61', '2021-07-04', '休');
INSERT INTO `xhx_holiday` VALUES ('62', '2021-07-10', '休');
INSERT INTO `xhx_holiday` VALUES ('63', '2021-07-11', '休');
INSERT INTO `xhx_holiday` VALUES ('64', '2021-07-17', '休');
INSERT INTO `xhx_holiday` VALUES ('65', '2021-07-18', '休');
INSERT INTO `xhx_holiday` VALUES ('66', '2021-07-24', '休');
INSERT INTO `xhx_holiday` VALUES ('67', '2021-07-25', '休');
INSERT INTO `xhx_holiday` VALUES ('68', '2021-07-31', '休');
INSERT INTO `xhx_holiday` VALUES ('69', '2021-08-01', '休');
INSERT INTO `xhx_holiday` VALUES ('70', '2021-08-07', '休');
INSERT INTO `xhx_holiday` VALUES ('71', '2021-08-08', '休');
INSERT INTO `xhx_holiday` VALUES ('72', '2021-08-14', '休');
INSERT INTO `xhx_holiday` VALUES ('73', '2021-08-15', '休');
INSERT INTO `xhx_holiday` VALUES ('74', '2021-08-21', '休');
INSERT INTO `xhx_holiday` VALUES ('75', '2021-08-22', '休');
INSERT INTO `xhx_holiday` VALUES ('76', '2021-08-28', '休');
INSERT INTO `xhx_holiday` VALUES ('77', '2021-08-29', '休');
INSERT INTO `xhx_holiday` VALUES ('78', '2021-09-04', '休');
INSERT INTO `xhx_holiday` VALUES ('79', '2021-09-05', '休');
INSERT INTO `xhx_holiday` VALUES ('80', '2021-09-11', '休');
INSERT INTO `xhx_holiday` VALUES ('81', '2021-09-12', '休');
INSERT INTO `xhx_holiday` VALUES ('82', '2021-09-19', '中秋节');
INSERT INTO `xhx_holiday` VALUES ('83', '2021-09-20', '休');
INSERT INTO `xhx_holiday` VALUES ('84', '2021-09-21', '休');
INSERT INTO `xhx_holiday` VALUES ('85', '2021-09-25', '休');
INSERT INTO `xhx_holiday` VALUES ('86', '2021-10-01', '国庆节');
INSERT INTO `xhx_holiday` VALUES ('87', '2021-10-02', '国庆节');
INSERT INTO `xhx_holiday` VALUES ('88', '2021-10-03', '国庆节');
INSERT INTO `xhx_holiday` VALUES ('89', '2021-10-04', '休');
INSERT INTO `xhx_holiday` VALUES ('90', '2021-10-05', '休');
INSERT INTO `xhx_holiday` VALUES ('91', '2021-10-06', '休');
INSERT INTO `xhx_holiday` VALUES ('92', '2021-10-07', '休');
INSERT INTO `xhx_holiday` VALUES ('93', '2021-10-10', '休');
INSERT INTO `xhx_holiday` VALUES ('94', '2021-10-16', '休');
INSERT INTO `xhx_holiday` VALUES ('95', '2021-10-17', '休');
INSERT INTO `xhx_holiday` VALUES ('96', '2021-10-23', '休');
INSERT INTO `xhx_holiday` VALUES ('97', '2021-10-24', '休');
INSERT INTO `xhx_holiday` VALUES ('98', '2021-10-30', '休');
INSERT INTO `xhx_holiday` VALUES ('99', '2021-10-31', '休');
INSERT INTO `xhx_holiday` VALUES ('100', '2021-11-06', '休');
INSERT INTO `xhx_holiday` VALUES ('101', '2021-11-07', '休');
INSERT INTO `xhx_holiday` VALUES ('102', '2021-11-13', '休');
INSERT INTO `xhx_holiday` VALUES ('103', '2021-11-14', '休');
INSERT INTO `xhx_holiday` VALUES ('104', '2021-11-20', '休');
INSERT INTO `xhx_holiday` VALUES ('105', '2021-11-21', '休');
INSERT INTO `xhx_holiday` VALUES ('106', '2021-11-27', '休');
INSERT INTO `xhx_holiday` VALUES ('107', '2021-11-28', '休');
INSERT INTO `xhx_holiday` VALUES ('108', '2021-12-04', '休');
INSERT INTO `xhx_holiday` VALUES ('109', '2021-12-05', '休');
INSERT INTO `xhx_holiday` VALUES ('110', '2021-12-11', '休');
INSERT INTO `xhx_holiday` VALUES ('111', '2021-12-12', '休');
INSERT INTO `xhx_holiday` VALUES ('112', '2021-12-18', '休');
INSERT INTO `xhx_holiday` VALUES ('113', '2021-12-19', '休');
INSERT INTO `xhx_holiday` VALUES ('114', '2021-12-25', '休');
INSERT INTO `xhx_holiday` VALUES ('115', '2021-12-26', '休');

-- ----------------------------
-- Table structure for xhx_humtableinit
-- ----------------------------
DROP TABLE IF EXISTS `xhx_humtableinit`;
CREATE TABLE `xhx_humtableinit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` int(11) NOT NULL,
  `date` char(255) NOT NULL,
  `year` char(4) NOT NULL,
  `month` char(2) NOT NULL,
  `day` char(2) NOT NULL,
  `week` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=307 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xhx_humtableinit
-- ----------------------------
INSERT INTO `xhx_humtableinit` VALUES ('1', '1614528000', '2021-03-01', '2021', '03', '01', '09');
INSERT INTO `xhx_humtableinit` VALUES ('2', '1614614400', '2021-03-02', '2021', '03', '02', '09');
INSERT INTO `xhx_humtableinit` VALUES ('3', '1614700800', '2021-03-03', '2021', '03', '03', '09');
INSERT INTO `xhx_humtableinit` VALUES ('4', '1614787200', '2021-03-04', '2021', '03', '04', '09');
INSERT INTO `xhx_humtableinit` VALUES ('5', '1614873600', '2021-03-05', '2021', '03', '05', '09');
INSERT INTO `xhx_humtableinit` VALUES ('6', '1614960000', '2021-03-06', '2021', '03', '06', '09');
INSERT INTO `xhx_humtableinit` VALUES ('7', '1615046400', '2021-03-07', '2021', '03', '07', '09');
INSERT INTO `xhx_humtableinit` VALUES ('8', '1615132800', '2021-03-08', '2021', '03', '08', '10');
INSERT INTO `xhx_humtableinit` VALUES ('9', '1615219200', '2021-03-09', '2021', '03', '09', '10');
INSERT INTO `xhx_humtableinit` VALUES ('10', '1615305600', '2021-03-10', '2021', '03', '10', '10');
INSERT INTO `xhx_humtableinit` VALUES ('11', '1615392000', '2021-03-11', '2021', '03', '11', '10');
INSERT INTO `xhx_humtableinit` VALUES ('12', '1615478400', '2021-03-12', '2021', '03', '12', '10');
INSERT INTO `xhx_humtableinit` VALUES ('13', '1615564800', '2021-03-13', '2021', '03', '13', '10');
INSERT INTO `xhx_humtableinit` VALUES ('14', '1615651200', '2021-03-14', '2021', '03', '14', '10');
INSERT INTO `xhx_humtableinit` VALUES ('15', '1615737600', '2021-03-15', '2021', '03', '15', '11');
INSERT INTO `xhx_humtableinit` VALUES ('16', '1615824000', '2021-03-16', '2021', '03', '16', '11');
INSERT INTO `xhx_humtableinit` VALUES ('17', '1615910400', '2021-03-17', '2021', '03', '17', '11');
INSERT INTO `xhx_humtableinit` VALUES ('18', '1615996800', '2021-03-18', '2021', '03', '18', '11');
INSERT INTO `xhx_humtableinit` VALUES ('19', '1616083200', '2021-03-19', '2021', '03', '19', '11');
INSERT INTO `xhx_humtableinit` VALUES ('20', '1616169600', '2021-03-20', '2021', '03', '20', '11');
INSERT INTO `xhx_humtableinit` VALUES ('21', '1616256000', '2021-03-21', '2021', '03', '21', '11');
INSERT INTO `xhx_humtableinit` VALUES ('22', '1616342400', '2021-03-22', '2021', '03', '22', '12');
INSERT INTO `xhx_humtableinit` VALUES ('23', '1616428800', '2021-03-23', '2021', '03', '23', '12');
INSERT INTO `xhx_humtableinit` VALUES ('24', '1616515200', '2021-03-24', '2021', '03', '24', '12');
INSERT INTO `xhx_humtableinit` VALUES ('25', '1616601600', '2021-03-25', '2021', '03', '25', '12');
INSERT INTO `xhx_humtableinit` VALUES ('26', '1616688000', '2021-03-26', '2021', '03', '26', '12');
INSERT INTO `xhx_humtableinit` VALUES ('27', '1616774400', '2021-03-27', '2021', '03', '27', '12');
INSERT INTO `xhx_humtableinit` VALUES ('28', '1616860800', '2021-03-28', '2021', '03', '28', '12');
INSERT INTO `xhx_humtableinit` VALUES ('29', '1616947200', '2021-03-29', '2021', '03', '29', '13');
INSERT INTO `xhx_humtableinit` VALUES ('30', '1617033600', '2021-03-30', '2021', '03', '30', '13');
INSERT INTO `xhx_humtableinit` VALUES ('31', '1617120000', '2021-03-31', '2021', '03', '31', '13');
INSERT INTO `xhx_humtableinit` VALUES ('32', '1617206400', '2021-04-01', '2021', '04', '01', '13');
INSERT INTO `xhx_humtableinit` VALUES ('33', '1617292800', '2021-04-02', '2021', '04', '02', '13');
INSERT INTO `xhx_humtableinit` VALUES ('34', '1617379200', '2021-04-03', '2021', '04', '03', '13');
INSERT INTO `xhx_humtableinit` VALUES ('35', '1617465600', '2021-04-04', '2021', '04', '04', '13');
INSERT INTO `xhx_humtableinit` VALUES ('36', '1617552000', '2021-04-05', '2021', '04', '05', '14');
INSERT INTO `xhx_humtableinit` VALUES ('37', '1617638400', '2021-04-06', '2021', '04', '06', '14');
INSERT INTO `xhx_humtableinit` VALUES ('38', '1617724800', '2021-04-07', '2021', '04', '07', '14');
INSERT INTO `xhx_humtableinit` VALUES ('39', '1617811200', '2021-04-08', '2021', '04', '08', '14');
INSERT INTO `xhx_humtableinit` VALUES ('40', '1617897600', '2021-04-09', '2021', '04', '09', '14');
INSERT INTO `xhx_humtableinit` VALUES ('41', '1617984000', '2021-04-10', '2021', '04', '10', '14');
INSERT INTO `xhx_humtableinit` VALUES ('42', '1618070400', '2021-04-11', '2021', '04', '11', '14');
INSERT INTO `xhx_humtableinit` VALUES ('43', '1618156800', '2021-04-12', '2021', '04', '12', '15');
INSERT INTO `xhx_humtableinit` VALUES ('44', '1618243200', '2021-04-13', '2021', '04', '13', '15');
INSERT INTO `xhx_humtableinit` VALUES ('45', '1618329600', '2021-04-14', '2021', '04', '14', '15');
INSERT INTO `xhx_humtableinit` VALUES ('46', '1618416000', '2021-04-15', '2021', '04', '15', '15');
INSERT INTO `xhx_humtableinit` VALUES ('47', '1618502400', '2021-04-16', '2021', '04', '16', '15');
INSERT INTO `xhx_humtableinit` VALUES ('48', '1618588800', '2021-04-17', '2021', '04', '17', '15');
INSERT INTO `xhx_humtableinit` VALUES ('49', '1618675200', '2021-04-18', '2021', '04', '18', '15');
INSERT INTO `xhx_humtableinit` VALUES ('50', '1618761600', '2021-04-19', '2021', '04', '19', '16');
INSERT INTO `xhx_humtableinit` VALUES ('51', '1618848000', '2021-04-20', '2021', '04', '20', '16');
INSERT INTO `xhx_humtableinit` VALUES ('52', '1618934400', '2021-04-21', '2021', '04', '21', '16');
INSERT INTO `xhx_humtableinit` VALUES ('53', '1619020800', '2021-04-22', '2021', '04', '22', '16');
INSERT INTO `xhx_humtableinit` VALUES ('54', '1619107200', '2021-04-23', '2021', '04', '23', '16');
INSERT INTO `xhx_humtableinit` VALUES ('55', '1619193600', '2021-04-24', '2021', '04', '24', '16');
INSERT INTO `xhx_humtableinit` VALUES ('56', '1619280000', '2021-04-25', '2021', '04', '25', '16');
INSERT INTO `xhx_humtableinit` VALUES ('57', '1619366400', '2021-04-26', '2021', '04', '26', '17');
INSERT INTO `xhx_humtableinit` VALUES ('58', '1619452800', '2021-04-27', '2021', '04', '27', '17');
INSERT INTO `xhx_humtableinit` VALUES ('59', '1619539200', '2021-04-28', '2021', '04', '28', '17');
INSERT INTO `xhx_humtableinit` VALUES ('60', '1619625600', '2021-04-29', '2021', '04', '29', '17');
INSERT INTO `xhx_humtableinit` VALUES ('61', '1619712000', '2021-04-30', '2021', '04', '30', '17');
INSERT INTO `xhx_humtableinit` VALUES ('62', '1619798400', '2021-05-01', '2021', '05', '01', '17');
INSERT INTO `xhx_humtableinit` VALUES ('63', '1619884800', '2021-05-02', '2021', '05', '02', '17');
INSERT INTO `xhx_humtableinit` VALUES ('64', '1619971200', '2021-05-03', '2021', '05', '03', '18');
INSERT INTO `xhx_humtableinit` VALUES ('65', '1620057600', '2021-05-04', '2021', '05', '04', '18');
INSERT INTO `xhx_humtableinit` VALUES ('66', '1620144000', '2021-05-05', '2021', '05', '05', '18');
INSERT INTO `xhx_humtableinit` VALUES ('67', '1620230400', '2021-05-06', '2021', '05', '06', '18');
INSERT INTO `xhx_humtableinit` VALUES ('68', '1620316800', '2021-05-07', '2021', '05', '07', '18');
INSERT INTO `xhx_humtableinit` VALUES ('69', '1620403200', '2021-05-08', '2021', '05', '08', '18');
INSERT INTO `xhx_humtableinit` VALUES ('70', '1620489600', '2021-05-09', '2021', '05', '09', '18');
INSERT INTO `xhx_humtableinit` VALUES ('71', '1620576000', '2021-05-10', '2021', '05', '10', '19');
INSERT INTO `xhx_humtableinit` VALUES ('72', '1620662400', '2021-05-11', '2021', '05', '11', '19');
INSERT INTO `xhx_humtableinit` VALUES ('73', '1620748800', '2021-05-12', '2021', '05', '12', '19');
INSERT INTO `xhx_humtableinit` VALUES ('74', '1620835200', '2021-05-13', '2021', '05', '13', '19');
INSERT INTO `xhx_humtableinit` VALUES ('75', '1620921600', '2021-05-14', '2021', '05', '14', '19');
INSERT INTO `xhx_humtableinit` VALUES ('76', '1621008000', '2021-05-15', '2021', '05', '15', '19');
INSERT INTO `xhx_humtableinit` VALUES ('77', '1621094400', '2021-05-16', '2021', '05', '16', '19');
INSERT INTO `xhx_humtableinit` VALUES ('78', '1621180800', '2021-05-17', '2021', '05', '17', '20');
INSERT INTO `xhx_humtableinit` VALUES ('79', '1621267200', '2021-05-18', '2021', '05', '18', '20');
INSERT INTO `xhx_humtableinit` VALUES ('80', '1621353600', '2021-05-19', '2021', '05', '19', '20');
INSERT INTO `xhx_humtableinit` VALUES ('81', '1621440000', '2021-05-20', '2021', '05', '20', '20');
INSERT INTO `xhx_humtableinit` VALUES ('82', '1621526400', '2021-05-21', '2021', '05', '21', '20');
INSERT INTO `xhx_humtableinit` VALUES ('83', '1621612800', '2021-05-22', '2021', '05', '22', '20');
INSERT INTO `xhx_humtableinit` VALUES ('84', '1621699200', '2021-05-23', '2021', '05', '23', '20');
INSERT INTO `xhx_humtableinit` VALUES ('85', '1621785600', '2021-05-24', '2021', '05', '24', '21');
INSERT INTO `xhx_humtableinit` VALUES ('86', '1621872000', '2021-05-25', '2021', '05', '25', '21');
INSERT INTO `xhx_humtableinit` VALUES ('87', '1621958400', '2021-05-26', '2021', '05', '26', '21');
INSERT INTO `xhx_humtableinit` VALUES ('88', '1622044800', '2021-05-27', '2021', '05', '27', '21');
INSERT INTO `xhx_humtableinit` VALUES ('89', '1622131200', '2021-05-28', '2021', '05', '28', '21');
INSERT INTO `xhx_humtableinit` VALUES ('90', '1622217600', '2021-05-29', '2021', '05', '29', '21');
INSERT INTO `xhx_humtableinit` VALUES ('91', '1622304000', '2021-05-30', '2021', '05', '30', '21');
INSERT INTO `xhx_humtableinit` VALUES ('92', '1622390400', '2021-05-31', '2021', '05', '31', '22');
INSERT INTO `xhx_humtableinit` VALUES ('93', '1622476800', '2021-06-01', '2021', '06', '01', '22');
INSERT INTO `xhx_humtableinit` VALUES ('94', '1622563200', '2021-06-02', '2021', '06', '02', '22');
INSERT INTO `xhx_humtableinit` VALUES ('95', '1622649600', '2021-06-03', '2021', '06', '03', '22');
INSERT INTO `xhx_humtableinit` VALUES ('96', '1622736000', '2021-06-04', '2021', '06', '04', '22');
INSERT INTO `xhx_humtableinit` VALUES ('97', '1622822400', '2021-06-05', '2021', '06', '05', '22');
INSERT INTO `xhx_humtableinit` VALUES ('98', '1622908800', '2021-06-06', '2021', '06', '06', '22');
INSERT INTO `xhx_humtableinit` VALUES ('99', '1622995200', '2021-06-07', '2021', '06', '07', '23');
INSERT INTO `xhx_humtableinit` VALUES ('100', '1623081600', '2021-06-08', '2021', '06', '08', '23');
INSERT INTO `xhx_humtableinit` VALUES ('101', '1623168000', '2021-06-09', '2021', '06', '09', '23');
INSERT INTO `xhx_humtableinit` VALUES ('102', '1623254400', '2021-06-10', '2021', '06', '10', '23');
INSERT INTO `xhx_humtableinit` VALUES ('103', '1623340800', '2021-06-11', '2021', '06', '11', '23');
INSERT INTO `xhx_humtableinit` VALUES ('104', '1623427200', '2021-06-12', '2021', '06', '12', '23');
INSERT INTO `xhx_humtableinit` VALUES ('105', '1623513600', '2021-06-13', '2021', '06', '13', '23');
INSERT INTO `xhx_humtableinit` VALUES ('106', '1623600000', '2021-06-14', '2021', '06', '14', '24');
INSERT INTO `xhx_humtableinit` VALUES ('107', '1623686400', '2021-06-15', '2021', '06', '15', '24');
INSERT INTO `xhx_humtableinit` VALUES ('108', '1623772800', '2021-06-16', '2021', '06', '16', '24');
INSERT INTO `xhx_humtableinit` VALUES ('109', '1623859200', '2021-06-17', '2021', '06', '17', '24');
INSERT INTO `xhx_humtableinit` VALUES ('110', '1623945600', '2021-06-18', '2021', '06', '18', '24');
INSERT INTO `xhx_humtableinit` VALUES ('111', '1624032000', '2021-06-19', '2021', '06', '19', '24');
INSERT INTO `xhx_humtableinit` VALUES ('112', '1624118400', '2021-06-20', '2021', '06', '20', '24');
INSERT INTO `xhx_humtableinit` VALUES ('113', '1624204800', '2021-06-21', '2021', '06', '21', '25');
INSERT INTO `xhx_humtableinit` VALUES ('114', '1624291200', '2021-06-22', '2021', '06', '22', '25');
INSERT INTO `xhx_humtableinit` VALUES ('115', '1624377600', '2021-06-23', '2021', '06', '23', '25');
INSERT INTO `xhx_humtableinit` VALUES ('116', '1624464000', '2021-06-24', '2021', '06', '24', '25');
INSERT INTO `xhx_humtableinit` VALUES ('117', '1624550400', '2021-06-25', '2021', '06', '25', '25');
INSERT INTO `xhx_humtableinit` VALUES ('118', '1624636800', '2021-06-26', '2021', '06', '26', '25');
INSERT INTO `xhx_humtableinit` VALUES ('119', '1624723200', '2021-06-27', '2021', '06', '27', '25');
INSERT INTO `xhx_humtableinit` VALUES ('120', '1624809600', '2021-06-28', '2021', '06', '28', '26');
INSERT INTO `xhx_humtableinit` VALUES ('121', '1624896000', '2021-06-29', '2021', '06', '29', '26');
INSERT INTO `xhx_humtableinit` VALUES ('122', '1624982400', '2021-06-30', '2021', '06', '30', '26');
INSERT INTO `xhx_humtableinit` VALUES ('123', '1625068800', '2021-07-01', '2021', '07', '01', '26');
INSERT INTO `xhx_humtableinit` VALUES ('124', '1625155200', '2021-07-02', '2021', '07', '02', '26');
INSERT INTO `xhx_humtableinit` VALUES ('125', '1625241600', '2021-07-03', '2021', '07', '03', '26');
INSERT INTO `xhx_humtableinit` VALUES ('126', '1625328000', '2021-07-04', '2021', '07', '04', '26');
INSERT INTO `xhx_humtableinit` VALUES ('127', '1625414400', '2021-07-05', '2021', '07', '05', '27');
INSERT INTO `xhx_humtableinit` VALUES ('128', '1625500800', '2021-07-06', '2021', '07', '06', '27');
INSERT INTO `xhx_humtableinit` VALUES ('129', '1625587200', '2021-07-07', '2021', '07', '07', '27');
INSERT INTO `xhx_humtableinit` VALUES ('130', '1625673600', '2021-07-08', '2021', '07', '08', '27');
INSERT INTO `xhx_humtableinit` VALUES ('131', '1625760000', '2021-07-09', '2021', '07', '09', '27');
INSERT INTO `xhx_humtableinit` VALUES ('132', '1625846400', '2021-07-10', '2021', '07', '10', '27');
INSERT INTO `xhx_humtableinit` VALUES ('133', '1625932800', '2021-07-11', '2021', '07', '11', '27');
INSERT INTO `xhx_humtableinit` VALUES ('134', '1626019200', '2021-07-12', '2021', '07', '12', '28');
INSERT INTO `xhx_humtableinit` VALUES ('135', '1626105600', '2021-07-13', '2021', '07', '13', '28');
INSERT INTO `xhx_humtableinit` VALUES ('136', '1626192000', '2021-07-14', '2021', '07', '14', '28');
INSERT INTO `xhx_humtableinit` VALUES ('137', '1626278400', '2021-07-15', '2021', '07', '15', '28');
INSERT INTO `xhx_humtableinit` VALUES ('138', '1626364800', '2021-07-16', '2021', '07', '16', '28');
INSERT INTO `xhx_humtableinit` VALUES ('139', '1626451200', '2021-07-17', '2021', '07', '17', '28');
INSERT INTO `xhx_humtableinit` VALUES ('140', '1626537600', '2021-07-18', '2021', '07', '18', '28');
INSERT INTO `xhx_humtableinit` VALUES ('141', '1626624000', '2021-07-19', '2021', '07', '19', '29');
INSERT INTO `xhx_humtableinit` VALUES ('142', '1626710400', '2021-07-20', '2021', '07', '20', '29');
INSERT INTO `xhx_humtableinit` VALUES ('143', '1626796800', '2021-07-21', '2021', '07', '21', '29');
INSERT INTO `xhx_humtableinit` VALUES ('144', '1626883200', '2021-07-22', '2021', '07', '22', '29');
INSERT INTO `xhx_humtableinit` VALUES ('145', '1626969600', '2021-07-23', '2021', '07', '23', '29');
INSERT INTO `xhx_humtableinit` VALUES ('146', '1627056000', '2021-07-24', '2021', '07', '24', '29');
INSERT INTO `xhx_humtableinit` VALUES ('147', '1627142400', '2021-07-25', '2021', '07', '25', '29');
INSERT INTO `xhx_humtableinit` VALUES ('148', '1627228800', '2021-07-26', '2021', '07', '26', '30');
INSERT INTO `xhx_humtableinit` VALUES ('149', '1627315200', '2021-07-27', '2021', '07', '27', '30');
INSERT INTO `xhx_humtableinit` VALUES ('150', '1627401600', '2021-07-28', '2021', '07', '28', '30');
INSERT INTO `xhx_humtableinit` VALUES ('151', '1627488000', '2021-07-29', '2021', '07', '29', '30');
INSERT INTO `xhx_humtableinit` VALUES ('152', '1627574400', '2021-07-30', '2021', '07', '30', '30');
INSERT INTO `xhx_humtableinit` VALUES ('153', '1627660800', '2021-07-31', '2021', '07', '31', '30');
INSERT INTO `xhx_humtableinit` VALUES ('154', '1627747200', '2021-08-01', '2021', '08', '01', '30');
INSERT INTO `xhx_humtableinit` VALUES ('155', '1627833600', '2021-08-02', '2021', '08', '02', '31');
INSERT INTO `xhx_humtableinit` VALUES ('156', '1627920000', '2021-08-03', '2021', '08', '03', '31');
INSERT INTO `xhx_humtableinit` VALUES ('157', '1628006400', '2021-08-04', '2021', '08', '04', '31');
INSERT INTO `xhx_humtableinit` VALUES ('158', '1628092800', '2021-08-05', '2021', '08', '05', '31');
INSERT INTO `xhx_humtableinit` VALUES ('159', '1628179200', '2021-08-06', '2021', '08', '06', '31');
INSERT INTO `xhx_humtableinit` VALUES ('160', '1628265600', '2021-08-07', '2021', '08', '07', '31');
INSERT INTO `xhx_humtableinit` VALUES ('161', '1628352000', '2021-08-08', '2021', '08', '08', '31');
INSERT INTO `xhx_humtableinit` VALUES ('162', '1628438400', '2021-08-09', '2021', '08', '09', '32');
INSERT INTO `xhx_humtableinit` VALUES ('163', '1628524800', '2021-08-10', '2021', '08', '10', '32');
INSERT INTO `xhx_humtableinit` VALUES ('164', '1628611200', '2021-08-11', '2021', '08', '11', '32');
INSERT INTO `xhx_humtableinit` VALUES ('165', '1628697600', '2021-08-12', '2021', '08', '12', '32');
INSERT INTO `xhx_humtableinit` VALUES ('166', '1628784000', '2021-08-13', '2021', '08', '13', '32');
INSERT INTO `xhx_humtableinit` VALUES ('167', '1628870400', '2021-08-14', '2021', '08', '14', '32');
INSERT INTO `xhx_humtableinit` VALUES ('168', '1628956800', '2021-08-15', '2021', '08', '15', '32');
INSERT INTO `xhx_humtableinit` VALUES ('169', '1629043200', '2021-08-16', '2021', '08', '16', '33');
INSERT INTO `xhx_humtableinit` VALUES ('170', '1629129600', '2021-08-17', '2021', '08', '17', '33');
INSERT INTO `xhx_humtableinit` VALUES ('171', '1629216000', '2021-08-18', '2021', '08', '18', '33');
INSERT INTO `xhx_humtableinit` VALUES ('172', '1629302400', '2021-08-19', '2021', '08', '19', '33');
INSERT INTO `xhx_humtableinit` VALUES ('173', '1629388800', '2021-08-20', '2021', '08', '20', '33');
INSERT INTO `xhx_humtableinit` VALUES ('174', '1629475200', '2021-08-21', '2021', '08', '21', '33');
INSERT INTO `xhx_humtableinit` VALUES ('175', '1629561600', '2021-08-22', '2021', '08', '22', '33');
INSERT INTO `xhx_humtableinit` VALUES ('176', '1629648000', '2021-08-23', '2021', '08', '23', '34');
INSERT INTO `xhx_humtableinit` VALUES ('177', '1629734400', '2021-08-24', '2021', '08', '24', '34');
INSERT INTO `xhx_humtableinit` VALUES ('178', '1629820800', '2021-08-25', '2021', '08', '25', '34');
INSERT INTO `xhx_humtableinit` VALUES ('179', '1629907200', '2021-08-26', '2021', '08', '26', '34');
INSERT INTO `xhx_humtableinit` VALUES ('180', '1629993600', '2021-08-27', '2021', '08', '27', '34');
INSERT INTO `xhx_humtableinit` VALUES ('181', '1630080000', '2021-08-28', '2021', '08', '28', '34');
INSERT INTO `xhx_humtableinit` VALUES ('182', '1630166400', '2021-08-29', '2021', '08', '29', '34');
INSERT INTO `xhx_humtableinit` VALUES ('183', '1630252800', '2021-08-30', '2021', '08', '30', '35');
INSERT INTO `xhx_humtableinit` VALUES ('184', '1630339200', '2021-08-31', '2021', '08', '31', '35');
INSERT INTO `xhx_humtableinit` VALUES ('185', '1630425600', '2021-09-01', '2021', '09', '01', '35');
INSERT INTO `xhx_humtableinit` VALUES ('186', '1630512000', '2021-09-02', '2021', '09', '02', '35');
INSERT INTO `xhx_humtableinit` VALUES ('187', '1630598400', '2021-09-03', '2021', '09', '03', '35');
INSERT INTO `xhx_humtableinit` VALUES ('188', '1630684800', '2021-09-04', '2021', '09', '04', '35');
INSERT INTO `xhx_humtableinit` VALUES ('189', '1630771200', '2021-09-05', '2021', '09', '05', '35');
INSERT INTO `xhx_humtableinit` VALUES ('190', '1630857600', '2021-09-06', '2021', '09', '06', '36');
INSERT INTO `xhx_humtableinit` VALUES ('191', '1630944000', '2021-09-07', '2021', '09', '07', '36');
INSERT INTO `xhx_humtableinit` VALUES ('192', '1631030400', '2021-09-08', '2021', '09', '08', '36');
INSERT INTO `xhx_humtableinit` VALUES ('193', '1631116800', '2021-09-09', '2021', '09', '09', '36');
INSERT INTO `xhx_humtableinit` VALUES ('194', '1631203200', '2021-09-10', '2021', '09', '10', '36');
INSERT INTO `xhx_humtableinit` VALUES ('195', '1631289600', '2021-09-11', '2021', '09', '11', '36');
INSERT INTO `xhx_humtableinit` VALUES ('196', '1631376000', '2021-09-12', '2021', '09', '12', '36');
INSERT INTO `xhx_humtableinit` VALUES ('197', '1631462400', '2021-09-13', '2021', '09', '13', '37');
INSERT INTO `xhx_humtableinit` VALUES ('198', '1631548800', '2021-09-14', '2021', '09', '14', '37');
INSERT INTO `xhx_humtableinit` VALUES ('199', '1631635200', '2021-09-15', '2021', '09', '15', '37');
INSERT INTO `xhx_humtableinit` VALUES ('200', '1631721600', '2021-09-16', '2021', '09', '16', '37');
INSERT INTO `xhx_humtableinit` VALUES ('201', '1631808000', '2021-09-17', '2021', '09', '17', '37');
INSERT INTO `xhx_humtableinit` VALUES ('202', '1631894400', '2021-09-18', '2021', '09', '18', '37');
INSERT INTO `xhx_humtableinit` VALUES ('203', '1631980800', '2021-09-19', '2021', '09', '19', '37');
INSERT INTO `xhx_humtableinit` VALUES ('204', '1632067200', '2021-09-20', '2021', '09', '20', '38');
INSERT INTO `xhx_humtableinit` VALUES ('205', '1632153600', '2021-09-21', '2021', '09', '21', '38');
INSERT INTO `xhx_humtableinit` VALUES ('206', '1632240000', '2021-09-22', '2021', '09', '22', '38');
INSERT INTO `xhx_humtableinit` VALUES ('207', '1632326400', '2021-09-23', '2021', '09', '23', '38');
INSERT INTO `xhx_humtableinit` VALUES ('208', '1632412800', '2021-09-24', '2021', '09', '24', '38');
INSERT INTO `xhx_humtableinit` VALUES ('209', '1632499200', '2021-09-25', '2021', '09', '25', '38');
INSERT INTO `xhx_humtableinit` VALUES ('210', '1632585600', '2021-09-26', '2021', '09', '26', '38');
INSERT INTO `xhx_humtableinit` VALUES ('211', '1632672000', '2021-09-27', '2021', '09', '27', '39');
INSERT INTO `xhx_humtableinit` VALUES ('212', '1632758400', '2021-09-28', '2021', '09', '28', '39');
INSERT INTO `xhx_humtableinit` VALUES ('213', '1632844800', '2021-09-29', '2021', '09', '29', '39');
INSERT INTO `xhx_humtableinit` VALUES ('214', '1632931200', '2021-09-30', '2021', '09', '30', '39');
INSERT INTO `xhx_humtableinit` VALUES ('215', '1633017600', '2021-10-01', '2021', '10', '01', '39');
INSERT INTO `xhx_humtableinit` VALUES ('216', '1633104000', '2021-10-02', '2021', '10', '02', '39');
INSERT INTO `xhx_humtableinit` VALUES ('217', '1633190400', '2021-10-03', '2021', '10', '03', '39');
INSERT INTO `xhx_humtableinit` VALUES ('218', '1633276800', '2021-10-04', '2021', '10', '04', '40');
INSERT INTO `xhx_humtableinit` VALUES ('219', '1633363200', '2021-10-05', '2021', '10', '05', '40');
INSERT INTO `xhx_humtableinit` VALUES ('220', '1633449600', '2021-10-06', '2021', '10', '06', '40');
INSERT INTO `xhx_humtableinit` VALUES ('221', '1633536000', '2021-10-07', '2021', '10', '07', '40');
INSERT INTO `xhx_humtableinit` VALUES ('222', '1633622400', '2021-10-08', '2021', '10', '08', '40');
INSERT INTO `xhx_humtableinit` VALUES ('223', '1633708800', '2021-10-09', '2021', '10', '09', '40');
INSERT INTO `xhx_humtableinit` VALUES ('224', '1633795200', '2021-10-10', '2021', '10', '10', '40');
INSERT INTO `xhx_humtableinit` VALUES ('225', '1633881600', '2021-10-11', '2021', '10', '11', '41');
INSERT INTO `xhx_humtableinit` VALUES ('226', '1633968000', '2021-10-12', '2021', '10', '12', '41');
INSERT INTO `xhx_humtableinit` VALUES ('227', '1634054400', '2021-10-13', '2021', '10', '13', '41');
INSERT INTO `xhx_humtableinit` VALUES ('228', '1634140800', '2021-10-14', '2021', '10', '14', '41');
INSERT INTO `xhx_humtableinit` VALUES ('229', '1634227200', '2021-10-15', '2021', '10', '15', '41');
INSERT INTO `xhx_humtableinit` VALUES ('230', '1634313600', '2021-10-16', '2021', '10', '16', '41');
INSERT INTO `xhx_humtableinit` VALUES ('231', '1634400000', '2021-10-17', '2021', '10', '17', '41');
INSERT INTO `xhx_humtableinit` VALUES ('232', '1634486400', '2021-10-18', '2021', '10', '18', '42');
INSERT INTO `xhx_humtableinit` VALUES ('233', '1634572800', '2021-10-19', '2021', '10', '19', '42');
INSERT INTO `xhx_humtableinit` VALUES ('234', '1634659200', '2021-10-20', '2021', '10', '20', '42');
INSERT INTO `xhx_humtableinit` VALUES ('235', '1634745600', '2021-10-21', '2021', '10', '21', '42');
INSERT INTO `xhx_humtableinit` VALUES ('236', '1634832000', '2021-10-22', '2021', '10', '22', '42');
INSERT INTO `xhx_humtableinit` VALUES ('237', '1634918400', '2021-10-23', '2021', '10', '23', '42');
INSERT INTO `xhx_humtableinit` VALUES ('238', '1635004800', '2021-10-24', '2021', '10', '24', '42');
INSERT INTO `xhx_humtableinit` VALUES ('239', '1635091200', '2021-10-25', '2021', '10', '25', '43');
INSERT INTO `xhx_humtableinit` VALUES ('240', '1635177600', '2021-10-26', '2021', '10', '26', '43');
INSERT INTO `xhx_humtableinit` VALUES ('241', '1635264000', '2021-10-27', '2021', '10', '27', '43');
INSERT INTO `xhx_humtableinit` VALUES ('242', '1635350400', '2021-10-28', '2021', '10', '28', '43');
INSERT INTO `xhx_humtableinit` VALUES ('243', '1635436800', '2021-10-29', '2021', '10', '29', '43');
INSERT INTO `xhx_humtableinit` VALUES ('244', '1635523200', '2021-10-30', '2021', '10', '30', '43');
INSERT INTO `xhx_humtableinit` VALUES ('245', '1635609600', '2021-10-31', '2021', '10', '31', '43');
INSERT INTO `xhx_humtableinit` VALUES ('246', '1635696000', '2021-11-01', '2021', '11', '01', '44');
INSERT INTO `xhx_humtableinit` VALUES ('247', '1635782400', '2021-11-02', '2021', '11', '02', '44');
INSERT INTO `xhx_humtableinit` VALUES ('248', '1635868800', '2021-11-03', '2021', '11', '03', '44');
INSERT INTO `xhx_humtableinit` VALUES ('249', '1635955200', '2021-11-04', '2021', '11', '04', '44');
INSERT INTO `xhx_humtableinit` VALUES ('250', '1636041600', '2021-11-05', '2021', '11', '05', '44');
INSERT INTO `xhx_humtableinit` VALUES ('251', '1636128000', '2021-11-06', '2021', '11', '06', '44');
INSERT INTO `xhx_humtableinit` VALUES ('252', '1636214400', '2021-11-07', '2021', '11', '07', '44');
INSERT INTO `xhx_humtableinit` VALUES ('253', '1636300800', '2021-11-08', '2021', '11', '08', '45');
INSERT INTO `xhx_humtableinit` VALUES ('254', '1636387200', '2021-11-09', '2021', '11', '09', '45');
INSERT INTO `xhx_humtableinit` VALUES ('255', '1636473600', '2021-11-10', '2021', '11', '10', '45');
INSERT INTO `xhx_humtableinit` VALUES ('256', '1636560000', '2021-11-11', '2021', '11', '11', '45');
INSERT INTO `xhx_humtableinit` VALUES ('257', '1636646400', '2021-11-12', '2021', '11', '12', '45');
INSERT INTO `xhx_humtableinit` VALUES ('258', '1636732800', '2021-11-13', '2021', '11', '13', '45');
INSERT INTO `xhx_humtableinit` VALUES ('259', '1636819200', '2021-11-14', '2021', '11', '14', '45');
INSERT INTO `xhx_humtableinit` VALUES ('260', '1636905600', '2021-11-15', '2021', '11', '15', '46');
INSERT INTO `xhx_humtableinit` VALUES ('261', '1636992000', '2021-11-16', '2021', '11', '16', '46');
INSERT INTO `xhx_humtableinit` VALUES ('262', '1637078400', '2021-11-17', '2021', '11', '17', '46');
INSERT INTO `xhx_humtableinit` VALUES ('263', '1637164800', '2021-11-18', '2021', '11', '18', '46');
INSERT INTO `xhx_humtableinit` VALUES ('264', '1637251200', '2021-11-19', '2021', '11', '19', '46');
INSERT INTO `xhx_humtableinit` VALUES ('265', '1637337600', '2021-11-20', '2021', '11', '20', '46');
INSERT INTO `xhx_humtableinit` VALUES ('266', '1637424000', '2021-11-21', '2021', '11', '21', '46');
INSERT INTO `xhx_humtableinit` VALUES ('267', '1637510400', '2021-11-22', '2021', '11', '22', '47');
INSERT INTO `xhx_humtableinit` VALUES ('268', '1637596800', '2021-11-23', '2021', '11', '23', '47');
INSERT INTO `xhx_humtableinit` VALUES ('269', '1637683200', '2021-11-24', '2021', '11', '24', '47');
INSERT INTO `xhx_humtableinit` VALUES ('270', '1637769600', '2021-11-25', '2021', '11', '25', '47');
INSERT INTO `xhx_humtableinit` VALUES ('271', '1637856000', '2021-11-26', '2021', '11', '26', '47');
INSERT INTO `xhx_humtableinit` VALUES ('272', '1637942400', '2021-11-27', '2021', '11', '27', '47');
INSERT INTO `xhx_humtableinit` VALUES ('273', '1638028800', '2021-11-28', '2021', '11', '28', '47');
INSERT INTO `xhx_humtableinit` VALUES ('274', '1638115200', '2021-11-29', '2021', '11', '29', '48');
INSERT INTO `xhx_humtableinit` VALUES ('275', '1638201600', '2021-11-30', '2021', '11', '30', '48');
INSERT INTO `xhx_humtableinit` VALUES ('276', '1638288000', '2021-12-01', '2021', '12', '01', '48');
INSERT INTO `xhx_humtableinit` VALUES ('277', '1638374400', '2021-12-02', '2021', '12', '02', '48');
INSERT INTO `xhx_humtableinit` VALUES ('278', '1638460800', '2021-12-03', '2021', '12', '03', '48');
INSERT INTO `xhx_humtableinit` VALUES ('279', '1638547200', '2021-12-04', '2021', '12', '04', '48');
INSERT INTO `xhx_humtableinit` VALUES ('280', '1638633600', '2021-12-05', '2021', '12', '05', '48');
INSERT INTO `xhx_humtableinit` VALUES ('281', '1638720000', '2021-12-06', '2021', '12', '06', '49');
INSERT INTO `xhx_humtableinit` VALUES ('282', '1638806400', '2021-12-07', '2021', '12', '07', '49');
INSERT INTO `xhx_humtableinit` VALUES ('283', '1638892800', '2021-12-08', '2021', '12', '08', '49');
INSERT INTO `xhx_humtableinit` VALUES ('284', '1638979200', '2021-12-09', '2021', '12', '09', '49');
INSERT INTO `xhx_humtableinit` VALUES ('285', '1639065600', '2021-12-10', '2021', '12', '10', '49');
INSERT INTO `xhx_humtableinit` VALUES ('286', '1639152000', '2021-12-11', '2021', '12', '11', '49');
INSERT INTO `xhx_humtableinit` VALUES ('287', '1639238400', '2021-12-12', '2021', '12', '12', '49');
INSERT INTO `xhx_humtableinit` VALUES ('288', '1639324800', '2021-12-13', '2021', '12', '13', '50');
INSERT INTO `xhx_humtableinit` VALUES ('289', '1639411200', '2021-12-14', '2021', '12', '14', '50');
INSERT INTO `xhx_humtableinit` VALUES ('290', '1639497600', '2021-12-15', '2021', '12', '15', '50');
INSERT INTO `xhx_humtableinit` VALUES ('291', '1639584000', '2021-12-16', '2021', '12', '16', '50');
INSERT INTO `xhx_humtableinit` VALUES ('292', '1639670400', '2021-12-17', '2021', '12', '17', '50');
INSERT INTO `xhx_humtableinit` VALUES ('293', '1639756800', '2021-12-18', '2021', '12', '18', '50');
INSERT INTO `xhx_humtableinit` VALUES ('294', '1639843200', '2021-12-19', '2021', '12', '19', '50');
INSERT INTO `xhx_humtableinit` VALUES ('295', '1639929600', '2021-12-20', '2021', '12', '20', '51');
INSERT INTO `xhx_humtableinit` VALUES ('296', '1640016000', '2021-12-21', '2021', '12', '21', '51');
INSERT INTO `xhx_humtableinit` VALUES ('297', '1640102400', '2021-12-22', '2021', '12', '22', '51');
INSERT INTO `xhx_humtableinit` VALUES ('298', '1640188800', '2021-12-23', '2021', '12', '23', '51');
INSERT INTO `xhx_humtableinit` VALUES ('299', '1640275200', '2021-12-24', '2021', '12', '24', '51');
INSERT INTO `xhx_humtableinit` VALUES ('300', '1640361600', '2021-12-25', '2021', '12', '25', '51');
INSERT INTO `xhx_humtableinit` VALUES ('301', '1640448000', '2021-12-26', '2021', '12', '26', '51');
INSERT INTO `xhx_humtableinit` VALUES ('302', '1640534400', '2021-12-27', '2021', '12', '27', '52');
INSERT INTO `xhx_humtableinit` VALUES ('303', '1640620800', '2021-12-28', '2021', '12', '28', '52');
INSERT INTO `xhx_humtableinit` VALUES ('304', '1640707200', '2021-12-29', '2021', '12', '29', '52');
INSERT INTO `xhx_humtableinit` VALUES ('305', '1640793600', '2021-12-30', '2021', '12', '30', '52');
INSERT INTO `xhx_humtableinit` VALUES ('306', '1640880000', '2021-12-31', '2021', '12', '31', '52');

-- ----------------------------
-- Table structure for xhx_humtableinit2
-- ----------------------------
DROP TABLE IF EXISTS `xhx_humtableinit2`;
CREATE TABLE `xhx_humtableinit2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ttid` int(11) NOT NULL COMMENT 'test_type_id',
  `year` char(255) NOT NULL,
  `month` char(2) DEFAULT NULL,
  `begin` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `origin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0',
  `remain` tinyint(4) NOT NULL,
  `week` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=343 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xhx_humtableinit2
-- ----------------------------
INSERT INTO `xhx_humtableinit2` VALUES ('1', '1', '2021', '01', '04', '08', '0', '0', '04-08');
INSERT INTO `xhx_humtableinit2` VALUES ('2', '1', '2021', '01', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('3', '1', '2021', '01', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('4', '1', '2021', '01', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('5', '1', '2021', '02', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('6', '1', '2021', '02', '07', '10', '0', '0', '07-10');
INSERT INTO `xhx_humtableinit2` VALUES ('7', '1', '2021', '02', '18', '20', '0', '0', '18-20');
INSERT INTO `xhx_humtableinit2` VALUES ('8', '1', '2021', '02', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('9', '1', '2021', '03', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('10', '1', '2021', '03', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('11', '1', '2021', '03', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('12', '1', '2021', '03', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('13', '1', '2021', '03', '29', '31', '0', '0', '29-31');
INSERT INTO `xhx_humtableinit2` VALUES ('14', '1', '2021', '04', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('15', '1', '2021', '04', '06', '09', '0', '0', '06-09');
INSERT INTO `xhx_humtableinit2` VALUES ('16', '1', '2021', '04', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('17', '1', '2021', '04', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('18', '1', '2021', '04', '25', '30', '0', '0', '25-30');
INSERT INTO `xhx_humtableinit2` VALUES ('19', '1', '2021', '05', '06', '08', '0', '0', '06-08');
INSERT INTO `xhx_humtableinit2` VALUES ('20', '1', '2021', '05', '10', '14', '0', '0', '10-14');
INSERT INTO `xhx_humtableinit2` VALUES ('21', '1', '2021', '05', '17', '21', '0', '0', '17-21');
INSERT INTO `xhx_humtableinit2` VALUES ('22', '1', '2021', '05', '24', '28', '0', '0', '24-28');
INSERT INTO `xhx_humtableinit2` VALUES ('23', '1', '2021', '05', '31', '31', '0', '0', '31-31');
INSERT INTO `xhx_humtableinit2` VALUES ('24', '1', '2021', '06', '01', '04', '0', '0', '01-04');
INSERT INTO `xhx_humtableinit2` VALUES ('25', '1', '2021', '06', '07', '11', '0', '0', '07-11');
INSERT INTO `xhx_humtableinit2` VALUES ('26', '1', '2021', '06', '15', '18', '0', '0', '15-18');
INSERT INTO `xhx_humtableinit2` VALUES ('27', '1', '2021', '06', '21', '25', '0', '0', '21-25');
INSERT INTO `xhx_humtableinit2` VALUES ('28', '1', '2021', '06', '28', '30', '0', '0', '28-30');
INSERT INTO `xhx_humtableinit2` VALUES ('29', '1', '2021', '07', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('30', '1', '2021', '07', '05', '09', '0', '0', '05-09');
INSERT INTO `xhx_humtableinit2` VALUES ('31', '1', '2021', '07', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('32', '1', '2021', '07', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('33', '1', '2021', '07', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('34', '1', '2021', '08', '02', '06', '0', '0', '02-06');
INSERT INTO `xhx_humtableinit2` VALUES ('35', '1', '2021', '08', '09', '13', '0', '0', '09-13');
INSERT INTO `xhx_humtableinit2` VALUES ('36', '1', '2021', '08', '16', '20', '0', '0', '16-20');
INSERT INTO `xhx_humtableinit2` VALUES ('37', '1', '2021', '08', '23', '27', '0', '0', '23-27');
INSERT INTO `xhx_humtableinit2` VALUES ('38', '1', '2021', '08', '30', '31', '0', '0', '30-31');
INSERT INTO `xhx_humtableinit2` VALUES ('39', '1', '2021', '09', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('40', '1', '2021', '09', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('41', '1', '2021', '09', '13', '18', '0', '0', '13-18');
INSERT INTO `xhx_humtableinit2` VALUES ('42', '1', '2021', '09', '22', '24', '0', '0', '22-24');
INSERT INTO `xhx_humtableinit2` VALUES ('43', '1', '2021', '09', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('44', '1', '2021', '10', '08', '09', '0', '0', '08-09');
INSERT INTO `xhx_humtableinit2` VALUES ('45', '1', '2021', '10', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('46', '1', '2021', '10', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('47', '1', '2021', '10', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('48', '1', '2021', '11', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('49', '1', '2021', '11', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('50', '1', '2021', '11', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('51', '1', '2021', '11', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('52', '1', '2021', '11', '29', '30', '0', '0', '29-30');
INSERT INTO `xhx_humtableinit2` VALUES ('53', '1', '2021', '12', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('54', '1', '2021', '12', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('55', '1', '2021', '12', '13', '17', '0', '0', '13-17');
INSERT INTO `xhx_humtableinit2` VALUES ('56', '1', '2021', '12', '20', '24', '0', '0', '20-24');
INSERT INTO `xhx_humtableinit2` VALUES ('57', '1', '2021', '12', '27', '31', '0', '0', '27-31');
INSERT INTO `xhx_humtableinit2` VALUES ('58', '2', '2021', '01', '04', '08', '0', '0', '04-08');
INSERT INTO `xhx_humtableinit2` VALUES ('59', '2', '2021', '01', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('60', '2', '2021', '01', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('61', '2', '2021', '01', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('62', '2', '2021', '02', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('63', '2', '2021', '02', '07', '10', '0', '0', '07-10');
INSERT INTO `xhx_humtableinit2` VALUES ('64', '2', '2021', '02', '18', '20', '0', '0', '18-20');
INSERT INTO `xhx_humtableinit2` VALUES ('65', '2', '2021', '02', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('66', '2', '2021', '03', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('67', '2', '2021', '03', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('68', '2', '2021', '03', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('69', '2', '2021', '03', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('70', '2', '2021', '03', '29', '31', '0', '0', '29-31');
INSERT INTO `xhx_humtableinit2` VALUES ('71', '2', '2021', '04', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('72', '2', '2021', '04', '06', '09', '0', '0', '06-09');
INSERT INTO `xhx_humtableinit2` VALUES ('73', '2', '2021', '04', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('74', '2', '2021', '04', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('75', '2', '2021', '04', '25', '30', '0', '0', '25-30');
INSERT INTO `xhx_humtableinit2` VALUES ('76', '2', '2021', '05', '06', '08', '0', '0', '06-08');
INSERT INTO `xhx_humtableinit2` VALUES ('77', '2', '2021', '05', '10', '14', '0', '0', '10-14');
INSERT INTO `xhx_humtableinit2` VALUES ('78', '2', '2021', '05', '17', '21', '0', '0', '17-21');
INSERT INTO `xhx_humtableinit2` VALUES ('79', '2', '2021', '05', '24', '28', '0', '0', '24-28');
INSERT INTO `xhx_humtableinit2` VALUES ('80', '2', '2021', '05', '31', '31', '0', '0', '31-31');
INSERT INTO `xhx_humtableinit2` VALUES ('81', '2', '2021', '06', '01', '04', '0', '0', '01-04');
INSERT INTO `xhx_humtableinit2` VALUES ('82', '2', '2021', '06', '07', '11', '0', '0', '07-11');
INSERT INTO `xhx_humtableinit2` VALUES ('83', '2', '2021', '06', '15', '18', '0', '0', '15-18');
INSERT INTO `xhx_humtableinit2` VALUES ('84', '2', '2021', '06', '21', '25', '0', '0', '21-25');
INSERT INTO `xhx_humtableinit2` VALUES ('85', '2', '2021', '06', '28', '30', '0', '0', '28-30');
INSERT INTO `xhx_humtableinit2` VALUES ('86', '2', '2021', '07', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('87', '2', '2021', '07', '05', '09', '0', '0', '05-09');
INSERT INTO `xhx_humtableinit2` VALUES ('88', '2', '2021', '07', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('89', '2', '2021', '07', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('90', '2', '2021', '07', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('91', '2', '2021', '08', '02', '06', '0', '0', '02-06');
INSERT INTO `xhx_humtableinit2` VALUES ('92', '2', '2021', '08', '09', '13', '0', '0', '09-13');
INSERT INTO `xhx_humtableinit2` VALUES ('93', '2', '2021', '08', '16', '20', '0', '0', '16-20');
INSERT INTO `xhx_humtableinit2` VALUES ('94', '2', '2021', '08', '23', '27', '0', '0', '23-27');
INSERT INTO `xhx_humtableinit2` VALUES ('95', '2', '2021', '08', '30', '31', '0', '0', '30-31');
INSERT INTO `xhx_humtableinit2` VALUES ('96', '2', '2021', '09', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('97', '2', '2021', '09', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('98', '2', '2021', '09', '13', '18', '0', '0', '13-18');
INSERT INTO `xhx_humtableinit2` VALUES ('99', '2', '2021', '09', '22', '24', '0', '0', '22-24');
INSERT INTO `xhx_humtableinit2` VALUES ('100', '2', '2021', '09', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('101', '2', '2021', '10', '08', '09', '0', '0', '08-09');
INSERT INTO `xhx_humtableinit2` VALUES ('102', '2', '2021', '10', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('103', '2', '2021', '10', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('104', '2', '2021', '10', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('105', '2', '2021', '11', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('106', '2', '2021', '11', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('107', '2', '2021', '11', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('108', '2', '2021', '11', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('109', '2', '2021', '11', '29', '30', '0', '0', '29-30');
INSERT INTO `xhx_humtableinit2` VALUES ('110', '2', '2021', '12', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('111', '2', '2021', '12', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('112', '2', '2021', '12', '13', '17', '0', '0', '13-17');
INSERT INTO `xhx_humtableinit2` VALUES ('113', '2', '2021', '12', '20', '24', '0', '0', '20-24');
INSERT INTO `xhx_humtableinit2` VALUES ('114', '2', '2021', '12', '27', '31', '0', '0', '27-31');
INSERT INTO `xhx_humtableinit2` VALUES ('115', '3', '2021', '01', '04', '08', '0', '0', '04-08');
INSERT INTO `xhx_humtableinit2` VALUES ('116', '3', '2021', '01', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('117', '3', '2021', '01', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('118', '3', '2021', '01', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('119', '3', '2021', '02', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('120', '3', '2021', '02', '07', '10', '0', '0', '07-10');
INSERT INTO `xhx_humtableinit2` VALUES ('121', '3', '2021', '02', '18', '20', '0', '0', '18-20');
INSERT INTO `xhx_humtableinit2` VALUES ('122', '3', '2021', '02', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('123', '3', '2021', '03', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('124', '3', '2021', '03', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('125', '3', '2021', '03', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('126', '3', '2021', '03', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('127', '3', '2021', '03', '29', '31', '0', '0', '29-31');
INSERT INTO `xhx_humtableinit2` VALUES ('128', '3', '2021', '04', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('129', '3', '2021', '04', '06', '09', '0', '0', '06-09');
INSERT INTO `xhx_humtableinit2` VALUES ('130', '3', '2021', '04', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('131', '3', '2021', '04', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('132', '3', '2021', '04', '25', '30', '0', '0', '25-30');
INSERT INTO `xhx_humtableinit2` VALUES ('133', '3', '2021', '05', '06', '08', '0', '0', '06-08');
INSERT INTO `xhx_humtableinit2` VALUES ('134', '3', '2021', '05', '10', '14', '0', '0', '10-14');
INSERT INTO `xhx_humtableinit2` VALUES ('135', '3', '2021', '05', '17', '21', '0', '0', '17-21');
INSERT INTO `xhx_humtableinit2` VALUES ('136', '3', '2021', '05', '24', '28', '0', '0', '24-28');
INSERT INTO `xhx_humtableinit2` VALUES ('137', '3', '2021', '05', '31', '31', '0', '0', '31-31');
INSERT INTO `xhx_humtableinit2` VALUES ('138', '3', '2021', '06', '01', '04', '0', '0', '01-04');
INSERT INTO `xhx_humtableinit2` VALUES ('139', '3', '2021', '06', '07', '11', '0', '0', '07-11');
INSERT INTO `xhx_humtableinit2` VALUES ('140', '3', '2021', '06', '15', '18', '0', '0', '15-18');
INSERT INTO `xhx_humtableinit2` VALUES ('141', '3', '2021', '06', '21', '25', '0', '0', '21-25');
INSERT INTO `xhx_humtableinit2` VALUES ('142', '3', '2021', '06', '28', '30', '0', '0', '28-30');
INSERT INTO `xhx_humtableinit2` VALUES ('143', '3', '2021', '07', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('144', '3', '2021', '07', '05', '09', '0', '0', '05-09');
INSERT INTO `xhx_humtableinit2` VALUES ('145', '3', '2021', '07', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('146', '3', '2021', '07', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('147', '3', '2021', '07', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('148', '3', '2021', '08', '02', '06', '0', '0', '02-06');
INSERT INTO `xhx_humtableinit2` VALUES ('149', '3', '2021', '08', '09', '13', '0', '0', '09-13');
INSERT INTO `xhx_humtableinit2` VALUES ('150', '3', '2021', '08', '16', '20', '0', '0', '16-20');
INSERT INTO `xhx_humtableinit2` VALUES ('151', '3', '2021', '08', '23', '27', '0', '0', '23-27');
INSERT INTO `xhx_humtableinit2` VALUES ('152', '3', '2021', '08', '30', '31', '0', '0', '30-31');
INSERT INTO `xhx_humtableinit2` VALUES ('153', '3', '2021', '09', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('154', '3', '2021', '09', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('155', '3', '2021', '09', '13', '18', '0', '0', '13-18');
INSERT INTO `xhx_humtableinit2` VALUES ('156', '3', '2021', '09', '22', '24', '0', '0', '22-24');
INSERT INTO `xhx_humtableinit2` VALUES ('157', '3', '2021', '09', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('158', '3', '2021', '10', '08', '09', '0', '0', '08-09');
INSERT INTO `xhx_humtableinit2` VALUES ('159', '3', '2021', '10', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('160', '3', '2021', '10', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('161', '3', '2021', '10', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('162', '3', '2021', '11', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('163', '3', '2021', '11', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('164', '3', '2021', '11', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('165', '3', '2021', '11', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('166', '3', '2021', '11', '29', '30', '0', '0', '29-30');
INSERT INTO `xhx_humtableinit2` VALUES ('167', '3', '2021', '12', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('168', '3', '2021', '12', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('169', '3', '2021', '12', '13', '17', '0', '0', '13-17');
INSERT INTO `xhx_humtableinit2` VALUES ('170', '3', '2021', '12', '20', '24', '0', '0', '20-24');
INSERT INTO `xhx_humtableinit2` VALUES ('171', '3', '2021', '12', '27', '31', '0', '0', '27-31');
INSERT INTO `xhx_humtableinit2` VALUES ('172', '4', '2021', '01', '04', '08', '0', '0', '04-08');
INSERT INTO `xhx_humtableinit2` VALUES ('173', '4', '2021', '01', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('174', '4', '2021', '01', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('175', '4', '2021', '01', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('176', '4', '2021', '02', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('177', '4', '2021', '02', '07', '10', '0', '0', '07-10');
INSERT INTO `xhx_humtableinit2` VALUES ('178', '4', '2021', '02', '18', '20', '0', '0', '18-20');
INSERT INTO `xhx_humtableinit2` VALUES ('179', '4', '2021', '02', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('180', '4', '2021', '03', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('181', '4', '2021', '03', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('182', '4', '2021', '03', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('183', '4', '2021', '03', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('184', '4', '2021', '03', '29', '31', '0', '0', '29-31');
INSERT INTO `xhx_humtableinit2` VALUES ('185', '4', '2021', '04', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('186', '4', '2021', '04', '06', '09', '0', '0', '06-09');
INSERT INTO `xhx_humtableinit2` VALUES ('187', '4', '2021', '04', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('188', '4', '2021', '04', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('189', '4', '2021', '04', '25', '30', '0', '0', '25-30');
INSERT INTO `xhx_humtableinit2` VALUES ('190', '4', '2021', '05', '06', '08', '0', '0', '06-08');
INSERT INTO `xhx_humtableinit2` VALUES ('191', '4', '2021', '05', '10', '14', '0', '0', '10-14');
INSERT INTO `xhx_humtableinit2` VALUES ('192', '4', '2021', '05', '17', '21', '0', '0', '17-21');
INSERT INTO `xhx_humtableinit2` VALUES ('193', '4', '2021', '05', '24', '28', '0', '0', '24-28');
INSERT INTO `xhx_humtableinit2` VALUES ('194', '4', '2021', '05', '31', '31', '0', '0', '31-31');
INSERT INTO `xhx_humtableinit2` VALUES ('195', '4', '2021', '06', '01', '04', '0', '0', '01-04');
INSERT INTO `xhx_humtableinit2` VALUES ('196', '4', '2021', '06', '07', '11', '0', '0', '07-11');
INSERT INTO `xhx_humtableinit2` VALUES ('197', '4', '2021', '06', '15', '18', '0', '0', '15-18');
INSERT INTO `xhx_humtableinit2` VALUES ('198', '4', '2021', '06', '21', '25', '0', '0', '21-25');
INSERT INTO `xhx_humtableinit2` VALUES ('199', '4', '2021', '06', '28', '30', '0', '0', '28-30');
INSERT INTO `xhx_humtableinit2` VALUES ('200', '4', '2021', '07', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('201', '4', '2021', '07', '05', '09', '0', '0', '05-09');
INSERT INTO `xhx_humtableinit2` VALUES ('202', '4', '2021', '07', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('203', '4', '2021', '07', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('204', '4', '2021', '07', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('205', '4', '2021', '08', '02', '06', '0', '0', '02-06');
INSERT INTO `xhx_humtableinit2` VALUES ('206', '4', '2021', '08', '09', '13', '0', '0', '09-13');
INSERT INTO `xhx_humtableinit2` VALUES ('207', '4', '2021', '08', '16', '20', '0', '0', '16-20');
INSERT INTO `xhx_humtableinit2` VALUES ('208', '4', '2021', '08', '23', '27', '0', '0', '23-27');
INSERT INTO `xhx_humtableinit2` VALUES ('209', '4', '2021', '08', '30', '31', '0', '0', '30-31');
INSERT INTO `xhx_humtableinit2` VALUES ('210', '4', '2021', '09', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('211', '4', '2021', '09', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('212', '4', '2021', '09', '13', '18', '0', '0', '13-18');
INSERT INTO `xhx_humtableinit2` VALUES ('213', '4', '2021', '09', '22', '24', '0', '0', '22-24');
INSERT INTO `xhx_humtableinit2` VALUES ('214', '4', '2021', '09', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('215', '4', '2021', '10', '08', '09', '0', '0', '08-09');
INSERT INTO `xhx_humtableinit2` VALUES ('216', '4', '2021', '10', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('217', '4', '2021', '10', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('218', '4', '2021', '10', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('219', '4', '2021', '11', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('220', '4', '2021', '11', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('221', '4', '2021', '11', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('222', '4', '2021', '11', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('223', '4', '2021', '11', '29', '30', '0', '0', '29-30');
INSERT INTO `xhx_humtableinit2` VALUES ('224', '4', '2021', '12', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('225', '4', '2021', '12', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('226', '4', '2021', '12', '13', '17', '0', '0', '13-17');
INSERT INTO `xhx_humtableinit2` VALUES ('227', '4', '2021', '12', '20', '24', '0', '0', '20-24');
INSERT INTO `xhx_humtableinit2` VALUES ('228', '4', '2021', '12', '27', '31', '0', '0', '27-31');
INSERT INTO `xhx_humtableinit2` VALUES ('229', '5', '2021', '01', '04', '08', '0', '0', '04-08');
INSERT INTO `xhx_humtableinit2` VALUES ('230', '5', '2021', '01', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('231', '5', '2021', '01', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('232', '5', '2021', '01', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('233', '5', '2021', '02', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('234', '5', '2021', '02', '07', '10', '0', '0', '07-10');
INSERT INTO `xhx_humtableinit2` VALUES ('235', '5', '2021', '02', '18', '20', '0', '0', '18-20');
INSERT INTO `xhx_humtableinit2` VALUES ('236', '5', '2021', '02', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('237', '5', '2021', '03', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('238', '5', '2021', '03', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('239', '5', '2021', '03', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('240', '5', '2021', '03', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('241', '5', '2021', '03', '29', '31', '0', '0', '29-31');
INSERT INTO `xhx_humtableinit2` VALUES ('242', '5', '2021', '04', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('243', '5', '2021', '04', '06', '09', '0', '0', '06-09');
INSERT INTO `xhx_humtableinit2` VALUES ('244', '5', '2021', '04', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('245', '5', '2021', '04', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('246', '5', '2021', '04', '25', '30', '0', '0', '25-30');
INSERT INTO `xhx_humtableinit2` VALUES ('247', '5', '2021', '05', '06', '08', '0', '0', '06-08');
INSERT INTO `xhx_humtableinit2` VALUES ('248', '5', '2021', '05', '10', '14', '0', '0', '10-14');
INSERT INTO `xhx_humtableinit2` VALUES ('249', '5', '2021', '05', '17', '21', '0', '0', '17-21');
INSERT INTO `xhx_humtableinit2` VALUES ('250', '5', '2021', '05', '24', '28', '0', '0', '24-28');
INSERT INTO `xhx_humtableinit2` VALUES ('251', '5', '2021', '05', '31', '31', '0', '0', '31-31');
INSERT INTO `xhx_humtableinit2` VALUES ('252', '5', '2021', '06', '01', '04', '0', '0', '01-04');
INSERT INTO `xhx_humtableinit2` VALUES ('253', '5', '2021', '06', '07', '11', '0', '0', '07-11');
INSERT INTO `xhx_humtableinit2` VALUES ('254', '5', '2021', '06', '15', '18', '0', '0', '15-18');
INSERT INTO `xhx_humtableinit2` VALUES ('255', '5', '2021', '06', '21', '25', '0', '0', '21-25');
INSERT INTO `xhx_humtableinit2` VALUES ('256', '5', '2021', '06', '28', '30', '0', '0', '28-30');
INSERT INTO `xhx_humtableinit2` VALUES ('257', '5', '2021', '07', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('258', '5', '2021', '07', '05', '09', '0', '0', '05-09');
INSERT INTO `xhx_humtableinit2` VALUES ('259', '5', '2021', '07', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('260', '5', '2021', '07', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('261', '5', '2021', '07', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('262', '5', '2021', '08', '02', '06', '0', '0', '02-06');
INSERT INTO `xhx_humtableinit2` VALUES ('263', '5', '2021', '08', '09', '13', '0', '0', '09-13');
INSERT INTO `xhx_humtableinit2` VALUES ('264', '5', '2021', '08', '16', '20', '0', '0', '16-20');
INSERT INTO `xhx_humtableinit2` VALUES ('265', '5', '2021', '08', '23', '27', '0', '0', '23-27');
INSERT INTO `xhx_humtableinit2` VALUES ('266', '5', '2021', '08', '30', '31', '0', '0', '30-31');
INSERT INTO `xhx_humtableinit2` VALUES ('267', '5', '2021', '09', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('268', '5', '2021', '09', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('269', '5', '2021', '09', '13', '18', '0', '0', '13-18');
INSERT INTO `xhx_humtableinit2` VALUES ('270', '5', '2021', '09', '22', '24', '0', '0', '22-24');
INSERT INTO `xhx_humtableinit2` VALUES ('271', '5', '2021', '09', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('272', '5', '2021', '10', '08', '09', '0', '0', '08-09');
INSERT INTO `xhx_humtableinit2` VALUES ('273', '5', '2021', '10', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('274', '5', '2021', '10', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('275', '5', '2021', '10', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('276', '5', '2021', '11', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('277', '5', '2021', '11', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('278', '5', '2021', '11', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('279', '5', '2021', '11', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('280', '5', '2021', '11', '29', '30', '0', '0', '29-30');
INSERT INTO `xhx_humtableinit2` VALUES ('281', '5', '2021', '12', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('282', '5', '2021', '12', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('283', '5', '2021', '12', '13', '17', '0', '0', '13-17');
INSERT INTO `xhx_humtableinit2` VALUES ('284', '5', '2021', '12', '20', '24', '0', '0', '20-24');
INSERT INTO `xhx_humtableinit2` VALUES ('285', '5', '2021', '12', '27', '31', '0', '0', '27-31');
INSERT INTO `xhx_humtableinit2` VALUES ('286', '6', '2021', '01', '04', '08', '0', '0', '04-08');
INSERT INTO `xhx_humtableinit2` VALUES ('287', '6', '2021', '01', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('288', '6', '2021', '01', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('289', '6', '2021', '01', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('290', '6', '2021', '02', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('291', '6', '2021', '02', '07', '10', '0', '0', '07-10');
INSERT INTO `xhx_humtableinit2` VALUES ('292', '6', '2021', '02', '18', '20', '0', '0', '18-20');
INSERT INTO `xhx_humtableinit2` VALUES ('293', '6', '2021', '02', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('294', '6', '2021', '03', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('295', '6', '2021', '03', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('296', '6', '2021', '03', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('297', '6', '2021', '03', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('298', '6', '2021', '03', '29', '31', '0', '0', '29-31');
INSERT INTO `xhx_humtableinit2` VALUES ('299', '6', '2021', '04', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('300', '6', '2021', '04', '06', '09', '0', '0', '06-09');
INSERT INTO `xhx_humtableinit2` VALUES ('301', '6', '2021', '04', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('302', '6', '2021', '04', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('303', '6', '2021', '04', '25', '30', '0', '0', '25-30');
INSERT INTO `xhx_humtableinit2` VALUES ('304', '6', '2021', '05', '06', '08', '0', '0', '06-08');
INSERT INTO `xhx_humtableinit2` VALUES ('305', '6', '2021', '05', '10', '14', '0', '0', '10-14');
INSERT INTO `xhx_humtableinit2` VALUES ('306', '6', '2021', '05', '17', '21', '0', '0', '17-21');
INSERT INTO `xhx_humtableinit2` VALUES ('307', '6', '2021', '05', '24', '28', '0', '0', '24-28');
INSERT INTO `xhx_humtableinit2` VALUES ('308', '6', '2021', '05', '31', '31', '0', '0', '31-31');
INSERT INTO `xhx_humtableinit2` VALUES ('309', '6', '2021', '06', '01', '04', '0', '0', '01-04');
INSERT INTO `xhx_humtableinit2` VALUES ('310', '6', '2021', '06', '07', '11', '0', '0', '07-11');
INSERT INTO `xhx_humtableinit2` VALUES ('311', '6', '2021', '06', '15', '18', '0', '0', '15-18');
INSERT INTO `xhx_humtableinit2` VALUES ('312', '6', '2021', '06', '21', '25', '0', '0', '21-25');
INSERT INTO `xhx_humtableinit2` VALUES ('313', '6', '2021', '06', '28', '30', '0', '0', '28-30');
INSERT INTO `xhx_humtableinit2` VALUES ('314', '6', '2021', '07', '01', '02', '0', '0', '01-02');
INSERT INTO `xhx_humtableinit2` VALUES ('315', '6', '2021', '07', '05', '09', '0', '0', '05-09');
INSERT INTO `xhx_humtableinit2` VALUES ('316', '6', '2021', '07', '12', '16', '0', '0', '12-16');
INSERT INTO `xhx_humtableinit2` VALUES ('317', '6', '2021', '07', '19', '23', '0', '0', '19-23');
INSERT INTO `xhx_humtableinit2` VALUES ('318', '6', '2021', '07', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('319', '6', '2021', '08', '02', '06', '0', '0', '02-06');
INSERT INTO `xhx_humtableinit2` VALUES ('320', '6', '2021', '08', '09', '13', '0', '0', '09-13');
INSERT INTO `xhx_humtableinit2` VALUES ('321', '6', '2021', '08', '16', '20', '0', '0', '16-20');
INSERT INTO `xhx_humtableinit2` VALUES ('322', '6', '2021', '08', '23', '27', '0', '0', '23-27');
INSERT INTO `xhx_humtableinit2` VALUES ('323', '6', '2021', '08', '30', '31', '0', '0', '30-31');
INSERT INTO `xhx_humtableinit2` VALUES ('324', '6', '2021', '09', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('325', '6', '2021', '09', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('326', '6', '2021', '09', '13', '18', '0', '0', '13-18');
INSERT INTO `xhx_humtableinit2` VALUES ('327', '6', '2021', '09', '22', '24', '0', '0', '22-24');
INSERT INTO `xhx_humtableinit2` VALUES ('328', '6', '2021', '09', '26', '30', '0', '0', '26-30');
INSERT INTO `xhx_humtableinit2` VALUES ('329', '6', '2021', '10', '08', '09', '0', '0', '08-09');
INSERT INTO `xhx_humtableinit2` VALUES ('330', '6', '2021', '10', '11', '15', '0', '0', '11-15');
INSERT INTO `xhx_humtableinit2` VALUES ('331', '6', '2021', '10', '18', '22', '0', '0', '18-22');
INSERT INTO `xhx_humtableinit2` VALUES ('332', '6', '2021', '10', '25', '29', '0', '0', '25-29');
INSERT INTO `xhx_humtableinit2` VALUES ('333', '6', '2021', '11', '01', '05', '0', '0', '01-05');
INSERT INTO `xhx_humtableinit2` VALUES ('334', '6', '2021', '11', '08', '12', '0', '0', '08-12');
INSERT INTO `xhx_humtableinit2` VALUES ('335', '6', '2021', '11', '15', '19', '0', '0', '15-19');
INSERT INTO `xhx_humtableinit2` VALUES ('336', '6', '2021', '11', '22', '26', '0', '0', '22-26');
INSERT INTO `xhx_humtableinit2` VALUES ('337', '6', '2021', '11', '29', '30', '0', '0', '29-30');
INSERT INTO `xhx_humtableinit2` VALUES ('338', '6', '2021', '12', '01', '03', '0', '0', '01-03');
INSERT INTO `xhx_humtableinit2` VALUES ('339', '6', '2021', '12', '06', '10', '0', '0', '06-10');
INSERT INTO `xhx_humtableinit2` VALUES ('340', '6', '2021', '12', '13', '17', '0', '0', '13-17');
INSERT INTO `xhx_humtableinit2` VALUES ('341', '6', '2021', '12', '20', '24', '0', '0', '20-24');
INSERT INTO `xhx_humtableinit2` VALUES ('342', '6', '2021', '12', '27', '31', '0', '0', '27-31');

-- ----------------------------
-- Table structure for xhx_migrations
-- ----------------------------
DROP TABLE IF EXISTS `xhx_migrations`;
CREATE TABLE `xhx_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of xhx_migrations
-- ----------------------------
INSERT INTO `xhx_migrations` VALUES ('2', '2021_02_02_020238_create_users_table', '1');
INSERT INTO `xhx_migrations` VALUES ('7', '2021_02_23_164833_create_roles_table', '2');
INSERT INTO `xhx_migrations` VALUES ('8', '2021_02_23_165009_create_nodes_table', '2');
INSERT INTO `xhx_migrations` VALUES ('9', '2021_02_23_165104_role_node', '2');
INSERT INTO `xhx_migrations` VALUES ('10', '2021_02_23_165114_user_role', '3');
INSERT INTO `xhx_migrations` VALUES ('11', '2021_03_01_134235_create_products_table', '4');
INSERT INTO `xhx_migrations` VALUES ('13', '2021_03_01_143611_create_vpms_table', '5');

-- ----------------------------
-- Table structure for xhx_nodes
-- ----------------------------
DROP TABLE IF EXISTS `xhx_nodes`;
CREATE TABLE `xhx_nodes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '节点名称',
  `route_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '路由别名,权限认证标志',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级ID',
  `is_menu` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '是否为菜单0否,1是',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of xhx_nodes
-- ----------------------------
INSERT INTO `xhx_nodes` VALUES ('1', '用户管理', null, '0', '1', '2021-02-24 14:06:41', '2021-02-25 16:14:01', null);
INSERT INTO `xhx_nodes` VALUES ('2', '用户列表', 'admin.user.index', '1', '2', '2021-02-24 14:34:23', '2021-02-24 14:34:23', null);
INSERT INTO `xhx_nodes` VALUES ('3', '添加用户显示', 'admin.user.create', '1', '0', '2021-02-24 15:30:03', '2021-02-24 15:30:03', null);
INSERT INTO `xhx_nodes` VALUES ('4', '添加用户处理', 'admin.user.store', '1', '0', '2021-02-24 15:30:54', '2021-02-24 15:30:54', null);
INSERT INTO `xhx_nodes` VALUES ('5', '删除用户', 'admin.user.del', '1', '0', '2021-02-24 15:31:27', '2021-02-24 15:31:27', null);
INSERT INTO `xhx_nodes` VALUES ('6', '修改用户信息', 'admin.user.edit', '1', '0', '2021-02-24 15:31:54', '2021-02-24 15:31:54', null);
INSERT INTO `xhx_nodes` VALUES ('7', '角色管理', '', '0', '1', '2021-02-25 15:17:05', '2021-02-25 15:17:05', null);
INSERT INTO `xhx_nodes` VALUES ('8', '角色列表', 'admin.role.index', '7', '2', '2021-02-25 15:17:28', '2021-02-25 15:17:28', null);
INSERT INTO `xhx_nodes` VALUES ('9', '角色添加显示', 'admin.role.create', '7', '0', '2021-02-25 15:19:24', '2021-02-25 15:19:24', null);
INSERT INTO `xhx_nodes` VALUES ('10', '角色添加处理', 'admin.role.store', '7', '0', '2021-02-26 10:11:44', '2021-02-26 10:11:44', null);
INSERT INTO `xhx_nodes` VALUES ('11', '角色修改显示', 'admin.role.edit', '7', '0', '2021-02-26 10:12:50', '2021-02-26 10:12:50', null);
INSERT INTO `xhx_nodes` VALUES ('12', '角色修改处理', 'admin.role.update', '7', '0', '2021-02-26 10:13:07', '2021-02-26 10:13:07', null);
INSERT INTO `xhx_nodes` VALUES ('13', '角色删除', 'admin.role.destroy', '7', '0', '2021-02-26 10:13:34', '2021-02-26 10:13:34', null);
INSERT INTO `xhx_nodes` VALUES ('14', '角色分配权限', 'admin.role.node', '7', '0', '2021-02-26 10:14:07', '2021-02-26 10:14:07', null);
INSERT INTO `xhx_nodes` VALUES ('15', '节点列表', 'admin.node.index', '19', '2', '2021-02-26 10:14:58', '2021-02-26 10:14:58', null);
INSERT INTO `xhx_nodes` VALUES ('16', '节点添加', 'admin.node.create', '19', '0', '2021-02-26 10:15:41', '2021-02-26 10:15:41', null);
INSERT INTO `xhx_nodes` VALUES ('17', '节点修改', 'admin.node.edit', '19', '0', '2021-02-26 10:16:13', '2021-02-26 10:16:13', null);
INSERT INTO `xhx_nodes` VALUES ('18', '节点删除', 'admin.node.destroy', '19', '0', '2021-02-26 10:16:42', '2021-02-26 10:16:42', null);
INSERT INTO `xhx_nodes` VALUES ('19', '节点管理', '', '0', '1', '2021-02-26 10:18:10', '2021-02-26 10:18:10', null);
INSERT INTO `xhx_nodes` VALUES ('20', '项目管理', '', '0', '1', '2021-03-01 09:18:48', '2021-03-01 09:18:48', null);
INSERT INTO `xhx_nodes` VALUES ('21', '项目列表', 'admin.project.index', '20', '2', '2021-03-01 09:19:35', '2021-03-01 09:19:35', null);
INSERT INTO `xhx_nodes` VALUES ('22', '项目添加显示', 'admin.project.create', '20', '0', '2021-03-01 09:38:38', '2021-03-01 09:38:38', null);
INSERT INTO `xhx_nodes` VALUES ('23', '项目添加处理', 'admin.project.store', '20', '0', '2021-03-01 09:39:16', '2021-03-01 09:39:16', null);
INSERT INTO `xhx_nodes` VALUES ('24', '提单管理', '', '0', '1', '2021-03-02 09:15:46', '2021-03-02 09:15:46', null);
INSERT INTO `xhx_nodes` VALUES ('25', '提单列表', 'admin.bill.index', '24', '2', '2021-03-02 09:16:07', '2021-03-02 09:16:07', null);
INSERT INTO `xhx_nodes` VALUES ('26', '提单添加页面显示', 'admin.bill.edit', '24', '0', '2021-03-02 09:19:09', '2021-03-02 09:19:09', null);
INSERT INTO `xhx_nodes` VALUES ('27', 'Pcr管理', '', '0', '1', '2021-03-03 08:47:16', '2021-03-03 08:47:16', null);
INSERT INTO `xhx_nodes` VALUES ('28', 'pcr列表', 'admin.pcr.index', '27', '2', '2021-03-03 08:47:47', '2021-03-03 08:47:47', null);
INSERT INTO `xhx_nodes` VALUES ('29', 'pcr添加显示', 'admin.pcr.create', '27', '0', '2021-03-03 08:52:03', '2021-03-03 08:52:03', null);
INSERT INTO `xhx_nodes` VALUES ('30', '提单结算页面', 'admin.bill.settle', '24', '2', '2021-03-03 09:15:48', '2021-03-03 09:55:17', null);
INSERT INTO `xhx_nodes` VALUES ('31', '资源管理', '', '0', '1', '2021-03-03 12:28:49', '2021-03-03 12:28:49', null);
INSERT INTO `xhx_nodes` VALUES ('32', '人力管理', 'admin.humanresource.index', '31', '2', '2021-03-03 13:34:41', '2021-03-03 13:34:41', null);

-- ----------------------------
-- Table structure for xhx_projects
-- ----------------------------
DROP TABLE IF EXISTS `xhx_projects`;
CREATE TABLE `xhx_projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '项目ID',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '项目名称(Project Name)',
  `pdname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '产品名称(Product Name)',
  `mname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '市场名称(Marketing Name)',
  `vpm` tinyint(4) NOT NULL COMMENT 'VPM',
  `devtime` char(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Development(before SS)启动时间',
  `ostime` char(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'OS upgrade 启动时间',
  `otatime` char(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'OTA(12)启动时间',
  `engteam` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '研发中心(Engineering Team',
  `format` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Format(形态)',
  `dev_budget` decimal(8,2) NOT NULL COMMENT 'Development(before SS)阶段预算',
  `os_budget` decimal(8,2) NOT NULL COMMENT 'OS upgrade阶段预算',
  `ota_budget` decimal(8,2) NOT NULL COMMENT 'OTA(12)阶段预算',
  `dev_settle` decimal(8,2) DEFAULT NULL,
  `os_settle` decimal(8,2) DEFAULT NULL,
  `ota_settle` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of xhx_projects
-- ----------------------------
INSERT INTO `xhx_projects` VALUES ('1', 'test1', 't1', 'tes_ma', '2', '2021-03-16', '2021-03-17', '2021-03-18', '3', '2', '100000.00', '100000.00', '234000.00', null, null, null, '2021-03-01 15:18:12', '2021-03-02 09:08:02', null);

-- ----------------------------
-- Table structure for xhx_protestcontents
-- ----------------------------
DROP TABLE IF EXISTS `xhx_protestcontents`;
CREATE TABLE `xhx_protestcontents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ttype_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL COMMENT '测试内容',
  `cyc` tinyint(4) DEFAULT NULL COMMENT '测试周期',
  `manpower` tinyint(4) DEFAULT NULL COMMENT '人力(人/天)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xhx_protestcontents
-- ----------------------------
INSERT INTO `xhx_protestcontents` VALUES ('1', '1', 'OTA 验收', '3', '9');
INSERT INTO `xhx_protestcontents` VALUES ('2', '1', 'Online RTM 测试', '3', '9');
INSERT INTO `xhx_protestcontents` VALUES ('3', '1', 'CSDK   RTM 测试', '1', '3');
INSERT INTO `xhx_protestcontents` VALUES ('4', '1', 'OEM Config  RTM 测试', '5', '6');
INSERT INTO `xhx_protestcontents` VALUES ('5', '1', 'CCS-工厂预测试', '1', '2');
INSERT INTO `xhx_protestcontents` VALUES ('6', '1', '自定义-线下沟通', null, null);
INSERT INTO `xhx_protestcontents` VALUES ('7', '2', 'FULL-LTE', '8', '30');
INSERT INTO `xhx_protestcontents` VALUES ('8', '2', 'FULL-WIFI', '5', '20');
INSERT INTO `xhx_protestcontents` VALUES ('9', '2', '验收测试-LTE', '3', '12');
INSERT INTO `xhx_protestcontents` VALUES ('10', '2', '验收测试-WIFI', '3', '6');
INSERT INTO `xhx_protestcontents` VALUES ('11', '2', 'OTA验收', '7', '2');
INSERT INTO `xhx_protestcontents` VALUES ('12', '2', '场测入口测试', '5', '10');
INSERT INTO `xhx_protestcontents` VALUES ('13', '3', 'FULL', '4', '4');
INSERT INTO `xhx_protestcontents` VALUES ('14', '3', '验收测试', '2', '2');
INSERT INTO `xhx_protestcontents` VALUES ('15', '3', 'OTA验收', '2', '2');
INSERT INTO `xhx_protestcontents` VALUES ('16', '4', 'FULL', '5', '6');
INSERT INTO `xhx_protestcontents` VALUES ('17', '4', '验收测试', '2', '2');
INSERT INTO `xhx_protestcontents` VALUES ('18', '4', 'OTA验收', '2', '2');
INSERT INTO `xhx_protestcontents` VALUES ('19', '5', 'FULL', '5', '5');
INSERT INTO `xhx_protestcontents` VALUES ('20', '6', 'FULL', null, '5');
INSERT INTO `xhx_protestcontents` VALUES ('21', '2', '自定义-线下沟通', null, null);
INSERT INTO `xhx_protestcontents` VALUES ('22', '3', '自定义-线下沟通', null, null);
INSERT INTO `xhx_protestcontents` VALUES ('23', '4', '自定义-线下沟通', null, null);

-- ----------------------------
-- Table structure for xhx_protesttypes
-- ----------------------------
DROP TABLE IF EXISTS `xhx_protesttypes`;
CREATE TABLE `xhx_protesttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xhx_protesttypes
-- ----------------------------
INSERT INTO `xhx_protesttypes` VALUES ('1', '系统', null, null);
INSERT INTO `xhx_protesttypes` VALUES ('2', '数据联通', null, null);
INSERT INTO `xhx_protesttypes` VALUES ('3', '性能', null, null);
INSERT INTO `xhx_protesttypes` VALUES ('4', '功耗', null, null);
INSERT INTO `xhx_protesttypes` VALUES ('5', 'CTS', null, null);
INSERT INTO `xhx_protesttypes` VALUES ('6', 'MTBF/版本', null, null);

-- ----------------------------
-- Table structure for xhx_roles
-- ----------------------------
DROP TABLE IF EXISTS `xhx_roles`;
CREATE TABLE `xhx_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of xhx_roles
-- ----------------------------
INSERT INTO `xhx_roles` VALUES ('1', '管理员', '2021-02-24 15:47:48', '2021-02-25 09:52:47', null);
INSERT INTO `xhx_roles` VALUES ('2', 'xhx', '2021-02-26 10:45:56', '2021-02-26 10:45:56', null);

-- ----------------------------
-- Table structure for xhx_role_node
-- ----------------------------
DROP TABLE IF EXISTS `xhx_role_node`;
CREATE TABLE `xhx_role_node` (
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `node_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '节点ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of xhx_role_node
-- ----------------------------
INSERT INTO `xhx_role_node` VALUES ('1', '1');
INSERT INTO `xhx_role_node` VALUES ('1', '2');
INSERT INTO `xhx_role_node` VALUES ('1', '3');
INSERT INTO `xhx_role_node` VALUES ('1', '4');
INSERT INTO `xhx_role_node` VALUES ('1', '5');
INSERT INTO `xhx_role_node` VALUES ('1', '6');
INSERT INTO `xhx_role_node` VALUES ('1', '7');
INSERT INTO `xhx_role_node` VALUES ('1', '8');
INSERT INTO `xhx_role_node` VALUES ('1', '9');
INSERT INTO `xhx_role_node` VALUES ('2', '1');
INSERT INTO `xhx_role_node` VALUES ('2', '2');
INSERT INTO `xhx_role_node` VALUES ('1', '23');
INSERT INTO `xhx_role_node` VALUES ('1', '22');
INSERT INTO `xhx_role_node` VALUES ('1', '21');
INSERT INTO `xhx_role_node` VALUES ('1', '20');
INSERT INTO `xhx_role_node` VALUES ('1', '10');
INSERT INTO `xhx_role_node` VALUES ('1', '11');
INSERT INTO `xhx_role_node` VALUES ('1', '12');
INSERT INTO `xhx_role_node` VALUES ('1', '13');
INSERT INTO `xhx_role_node` VALUES ('1', '14');
INSERT INTO `xhx_role_node` VALUES ('1', '19');
INSERT INTO `xhx_role_node` VALUES ('1', '15');
INSERT INTO `xhx_role_node` VALUES ('1', '16');
INSERT INTO `xhx_role_node` VALUES ('1', '17');
INSERT INTO `xhx_role_node` VALUES ('1', '18');
INSERT INTO `xhx_role_node` VALUES ('1', '24');
INSERT INTO `xhx_role_node` VALUES ('1', '25');
INSERT INTO `xhx_role_node` VALUES ('1', '26');
INSERT INTO `xhx_role_node` VALUES ('1', '30');
INSERT INTO `xhx_role_node` VALUES ('1', '27');
INSERT INTO `xhx_role_node` VALUES ('1', '28');
INSERT INTO `xhx_role_node` VALUES ('1', '29');

-- ----------------------------
-- Table structure for xhx_users
-- ----------------------------
DROP TABLE IF EXISTS `xhx_users`;
CREATE TABLE `xhx_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '账号',
  `truename` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `itcode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'ITcode',
  `itcode_status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'itcode登录状态',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '记住密码TOKEN',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of xhx_users
-- ----------------------------
INSERT INTO `xhx_users` VALUES ('1', 'admin', '饶瑞', 'quos92', '0', '$2y$10$p11sJrvDjlCgl1.HhkQW6ed0s34Q1oxvPSmydOBr.EokcEAdbm0o.', 'rmolestias@yahoo.com', '', '2021-02-22 10:32:57', '2021-02-22 10:32:57', null);
INSERT INTO `xhx_users` VALUES ('2', 'veritatis_ut', '阮玉梅', 'dsit', '1', '$2y$10$4z8ESvcBlmWBWi1ZTrQL.ueZsOd4TVgh/ok0g1GVPvIfd.y0QxIQy', 'id.ut@hotmail.com', '', '2021-02-22 10:32:57', '2021-02-23 15:53:08', '2021-02-23 15:53:08');
INSERT INTO `xhx_users` VALUES ('3', 'voluptas93', '司正业', 'repell', '0', '$2y$10$rP5HUTwYzI.pS.P.cTRXL.HJr8NCsh9H9AqiioP2jMvBgMWm0EJHG', 'nihil.voluptas@gmail.com', '', '2021-02-22 10:32:57', '2021-02-22 10:32:57', null);
INSERT INTO `xhx_users` VALUES ('4', 'et98', '莫军', 'illo.', '0', '$2y$10$wuC9hyrjEEMkh5po230E..jA0udynExEPXjh3J4Unq7Dy6W9wbaC.', 'idolor@sina.com', '', '2021-02-22 10:32:57', '2021-02-22 10:32:57', null);
INSERT INTO `xhx_users` VALUES ('5', 'rerum_tempora', '舒健', 'sint.mag', '1', '$2y$10$4PbfikI/D7QIKxspwPfQpe2o2GTzX4PNLz4xBVHwo7vO5WSkw0J8W', 'mest@hotmail.com', '', '2021-02-22 10:32:57', '2021-02-22 10:32:57', null);
INSERT INTO `xhx_users` VALUES ('6', 'iure29', '凌建明', 'et.ea', '0', '$2y$10$kaUJslajGjiHg4Nd10WAFewny5/R7n8LJyqVMZMeA241pQGWeKPm2', 'non64@sina.com', '', '2021-02-22 10:32:57', '2021-02-22 10:32:57', null);
INSERT INTO `xhx_users` VALUES ('7', 'quam04', '姬智渊', 'quae36', '1', '$2y$10$p6DFrHRXJdtN3y.U9AXKXeFURqdGGYnyEp7TOdX3XBY7xastqsvki', 'dolores34@126.com', '', '2021-02-22 10:32:57', '2021-02-22 10:32:57', null);
INSERT INTO `xhx_users` VALUES ('8', 'ya', '邵洋', 'sint_', '1', '$2y$10$md2lgLRZzio8zpNi94a5.uV10ExJbxYfD2r5jq2TPkm0fJRNmdgRS', 'minus.qui@qq.com', '', '2021-02-22 10:32:57', '2021-02-22 10:32:57', null);
INSERT INTO `xhx_users` VALUES ('9', 'kquae', '柳淑兰', 'mqui', '0', '$2y$10$l7WqXFDKt22wmcO8SMlnuOfz4LcllAlrqByXwfpHtBW3KHkZT26nu', 'est_voluptate@gmail.com', '', '2021-02-22 10:32:57', '2021-02-23 15:30:08', '2021-02-23 15:30:08');
INSERT INTO `xhx_users` VALUES ('10', 'eos69', '娄婷婷', 'accusant', '0', '$2y$10$xHdwhDcsL2XVCfZr1tkkpupoU1NBMlZ9diRj2Q6DGlZZPASdvw2X6', 'laborum93@gmail.com', '', '2021-02-22 10:32:57', '2021-02-23 15:27:10', '2021-02-23 15:27:10');
INSERT INTO `xhx_users` VALUES ('11', 'ea_ipsa', '洪利', 'het', '0', '$2y$10$Q.7.CzD4cgwffLyWDHFYwOk7qZQO1/xrOVsgKoqu8SW2cAm0C/Uhq', 'dicta36@sina.com', '', '2021-02-22 10:32:57', '2021-02-23 15:29:54', '2021-02-23 15:29:54');
INSERT INTO `xhx_users` VALUES ('12', 'et71', '苟秀英', 'tene', '1', '$2y$10$rnYckvn5yD5L1dZenFi3zunCGmbN/JFf0UuoubkFVHyxR8pGHY1dW', 'assumenda42@126.com', '', '2021-02-22 10:32:57', '2021-02-22 10:32:57', null);
INSERT INTO `xhx_users` VALUES ('13', 'dolor.quam', '孔洋', 'nesciu', '1', '$2y$10$GLvHT1XQktpi7xea3dx1pOYvAot7dqhi7xxqQBhkhIVOOlw/e8DI2', 'consequuntur.non@126.com', '', '2021-02-22 10:32:57', '2021-02-23 15:31:35', '2021-02-23 15:31:35');
INSERT INTO `xhx_users` VALUES ('14', 'et58', '木浩', 'sit_', '0', '$2y$10$jEJJJJNxcRGBAwpO2Yl/vO0dDO7kTz5RZdj9EysvPTumhn1aVc1cC', 'quis13@hotmail.com', '', '2021-02-22 10:32:57', '2021-02-23 15:46:24', '2021-02-23 15:46:24');
INSERT INTO `xhx_users` VALUES ('15', 'nesciunt_ut', '苏建明', 'omnis', '0', '$2y$10$7QtxbAsVf2cV73S4qnKu3uuyJXLFQgAAx2uZRNrkRchnNBSsqe4jG', 'commodi_dolorem@qq.com', '', '2021-02-22 10:32:57', '2021-02-23 15:47:27', '2021-02-23 15:47:27');
INSERT INTO `xhx_users` VALUES ('16', 'tdistinctio', '包欣', 'aut_in', '1', '$2y$10$W6Cc9hMV9zLc8UgK2AjMFu6GRNKjR.jDbJZiNayKmkvC1jPH/qYuq', 'necessitatibus_animi@163.com', '', '2021-02-22 10:32:57', '2021-02-22 10:32:57', null);
INSERT INTO `xhx_users` VALUES ('17', 'et.omnis', '郁燕', 'ut84', '0', '$2y$10$Z6XcmKec70sp/7Y47aw2/..Y8Kz.e9iY7wg4q54i9/UOTPwIbU1tO', 'unde.eaque@163.com', '', '2021-02-22 10:32:57', '2021-02-23 15:55:31', '2021-02-23 15:55:31');
INSERT INTO `xhx_users` VALUES ('18', 'accusantium_error', '连瑞', 'est.e', '1', '$2y$10$WoqT44pq4N5bXN8B.BBrC.IL0hntizlwYzCAhW6rdKf5YbNEl1QAm', 'aut_eum@163.com', '', '2021-02-22 10:32:57', '2021-02-23 15:58:03', '2021-02-23 15:58:03');
INSERT INTO `xhx_users` VALUES ('19', 'fugit_molestias', '汪晨', 'aut_a', '0', '$2y$10$DmlwblJAeB4WBggdeg2sMetaXR8zgbMRiBQ7OBV236ZF12w85bQke', 'velit.sequi@gmail.com', '', '2021-02-22 10:32:57', '2021-02-23 15:58:39', '2021-02-23 15:58:39');
INSERT INTO `xhx_users` VALUES ('20', 'vel58', '沉秀英', 'qui_ut', '0', '$2y$10$t.zzhY0PP00RofyJp7qCseQovJwTNnpxgEvLrw/3/U2AoEXJYwBFS', 'vquam@163.com', '', '2021-02-22 10:32:57', '2021-02-23 15:59:55', '2021-02-23 15:59:55');
INSERT INTO `xhx_users` VALUES ('22', 'test', 'test2', null, '0', '$2y$10$C7faCrA3Th2arQAUubkXg.cETgIEdEdH69uEaxj1nd7kt3n/CyUgC', 'test@qq.com', '', '2021-02-23 14:30:27', '2021-02-23 16:39:30', null);
INSERT INTO `xhx_users` VALUES ('23', 'test1', 'test1', null, '0', '$2y$10$fi6PpUR8ExIhnL8op1aoSOh6PqRLOIVH5wqaOYa3sTG5ZqV.kqNuq', 'test1@qq.com', '', '2021-02-23 14:32:42', '2021-02-23 14:32:42', null);

-- ----------------------------
-- Table structure for xhx_user_role
-- ----------------------------
DROP TABLE IF EXISTS `xhx_user_role`;
CREATE TABLE `xhx_user_role` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of xhx_user_role
-- ----------------------------
INSERT INTO `xhx_user_role` VALUES ('1', '1');
INSERT INTO `xhx_user_role` VALUES ('4', '2');

-- ----------------------------
-- Table structure for xhx_vpms
-- ----------------------------
DROP TABLE IF EXISTS `xhx_vpms`;
CREATE TABLE `xhx_vpms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'vpm名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of xhx_vpms
-- ----------------------------
INSERT INTO `xhx_vpms` VALUES ('1', '王柳', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('2', '田承禹', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('3', '王强', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('4', '严稳芬', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('5', '张玉梅', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('6', '时九', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('7', '王典', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('8', '宋锴', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('9', '张冲', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('10', '孟喆', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('11', '王慧', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('12', '王阳', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
INSERT INTO `xhx_vpms` VALUES ('13', '刘艳丽', '2021-03-01 14:42:22', '2021-03-01 14:42:22', null);
