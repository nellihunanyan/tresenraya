CREATE DATABASE IF NOT EXISTS tresenraya;
use tresenraya;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Estructura de la tabla boards (tablero)
-- ----------------------------
DROP TABLE IF EXISTS `boards`;
CREATE TABLE `boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

