-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para prueba
CREATE DATABASE IF NOT EXISTS `prueba` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `prueba`;

-- Volcando estructura para tabla prueba.post
CREATE TABLE IF NOT EXISTS `post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  PRIMARY KEY (`idPost`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla prueba.post: ~2 rows (aproximadamente)
INSERT INTO `post` (`idPost`, `nombre`, `autor`) VALUES
	(2, 'Test ll', 'Juan David Hurtado'),
	(3, 'Test lll', 'Autor lll'),
	(4, 'Test lV', 'Autor lV');

-- Volcando estructura para tabla prueba.post_bookmark
CREATE TABLE IF NOT EXISTS `post_bookmark` (
  `id_post_bookmark` int(11) NOT NULL AUTO_INCREMENT,
  `post_idPost` int(11) NOT NULL,
  PRIMARY KEY (`id_post_bookmark`),
  KEY `fk_post` (`post_idPost`),
  CONSTRAINT `fk_post` FOREIGN KEY (`post_idPost`) REFERENCES `post` (`idPost`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla prueba.post_bookmark: ~1 rows (aproximadamente)

-- Volcando estructura para tabla prueba.users
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `login` varchar(10) NOT NULL,
  `clave` varchar(10) NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla prueba.users: ~1 rows (aproximadamente)
INSERT INTO `users` (`idUsers`, `nombre`, `apellido`, `login`, `clave`) VALUES
	(1, 'Juan David', 'Hurtado', 'admin', 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
