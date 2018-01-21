CREATE DATABASE  IF NOT EXISTS `imobilledb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `imobilledb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: imobilledb
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL COMMENT 'Usado no login.',
  `senha` longtext NOT NULL,
  `email` varchar(150) NOT NULL COMMENT 'Usado no login.',
  `telefone` varchar(45) NOT NULL COMMENT 'usado no login',
  `foto` longtext COMMENT 'Foto no formato base64 String',
  `criadoEm` datetime NOT NULL COMMENT 'Data de criação do perfil.',
  `atualizadoEm` datetime NOT NULL COMMENT 'Data de atualização do perfil',
  `ultimoAcesso` datetime NOT NULL COMMENT 'Ultima vez que o perfil logou no sistema.',
  `permissao` varchar(45) NOT NULL COMMENT 'Permissão do usuário (Deve haver pelo menos um perfil ''Administrador'' cadastrado) - as opções são ''Administrador'',''Gerente'',''Corretor'',''Marketing'',''Cliente''',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `telefone_UNIQUE` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador','admin','douglasf.filho@gmail.com','81996729491','/9j/4AAQSkZJRgABAQEAYABgAAD/4QAiRXhpZgAATU0AKgAAAAgAAQESAAMAAAABAAEAAAAAAAD/7AARRHVja3kAAQAEAAAAUAAA/+EDPGh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4NCjx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4NCgk8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPg0KCQk8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowOTlEREUyREIzRDkxMUU2QTQxMUJDMEMxOEM1MDk5RSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowOTlEREUyQ0IzRDkxMUU2QTQxMUJDMEMxOEM1MDk5RSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IE1hY2ludG9zaCI+DQoJCQk8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBRENBN0ZCMjY3RTAxMUU2QTM4NUQ0QkFDQzU5MzhFMiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBRENBN0ZCMzY3RTAxMUU2QTM4NUQ0QkFDQzU5MzhFMiIvPg0KCQk8L3JkZjpEZXNjcmlwdGlvbj4NCgk8L3JkZjpSREY+DQo8L3g6eG1wbWV0YT4NCjw/eHBhY2tldCBlbmQ9J3cnPz7/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAEYARgDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD98tRneDZtbbnOeKr/AG6f+9+gqXVukf8AwKqlAE326f8AvfoKPt0/979BUNFAE326f+9+go+3T/3v0FQ0UATfbp/736Cj7dP/AHv0FQ0UATfbp/736Cj7dP8A3v0FQ0UATfbp/wC9+go+3T/3v0FQ0UATfbp/736Cj7dP/e/QVDRQBN9un/vfoKPt0/8Ae/QVDRQBN9un/vfoKPt0/wDe/QVDRQBN9un/AL36Cj7dP/e/QVDRQBN9un/vfoKPt0/979BUNFAE326f+9+go+3T/wB79BUNFAE326f+9+go+3T/AN79BUNFAE326f8AvfoKPt0/979BUNFAE326f+9+go+3T/3v0FQ0UATfbp/736Cj7dP/AHv0FQ0UATfbp/736Cj7dP8A3v0FQ0UATfbp/wC9+goqGigC3q3SP/gVVKt6t0j/AOBVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigC3q3SP/AIFVSrerdI/+BVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigC3q3SP/gVVKt6t0j/AOBVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigC3q3SP/AIFVSrerdI/+BVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigC3q3SP/gVVKt6t0j/AOBVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKMfr09P8+/8yRQAE4/n/n/P/wBfmfEnxi8M+Efid4b8G6lrVjY+JvF9ve3ei6fOxSTU0s1ha5EZxtLxrOjlMhygdlG2OQr4/wD8FFP+CkPgn/gnP8IW1zxDL/aniTUkYaB4ehlEd3q0w9Tg+VApI8yUghQcAO5VW/nN/aK/bQ+I37UP7RD/ABR8T+I75fF0M8U2mXFhK9qugrC/mQRWQVt0CRMdylTu3lpGZpGZ28bNM4p4RqC96Xbsv8+33+v6hwD4Y4ziKE8TUl7Kik0pWvzStokusU/if/bq1u4/1cdF78evBor86f8AgkB/wXD0P9rTQNP8A/FXU9L8PfFS28q1tb2d47Wz8XFmWOMxA7US8ZmVTAMB2O6IYJii/RavRwuKp4imqlJ3X9bnxGfZBjsnxksFj4cso/c13i+qf/AdndBRRRXQeMFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAFvVukf/AqqVb1bpH/AMCqpQAUUUUAFFFFABRRRQAUUUUAFFFFABRRQOv+evv6fzPagAHX8R7Z/wA/59a+P/8Agq1/wVs8M/8ABOTwB/Z9itn4h+Kes25k0bQ2cmO1U5UXt5tIKQqwOIwQ8pXYpVQ8iec/8Flv+C0mm/sSaFefD/4dXVnq3xd1KDZN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','2018-01-12 10:10:06','2018-01-20 22:39:37','2018-01-20 22:39:37','Administrador');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preferencias`
--

DROP TABLE IF EXISTS `preferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preferencias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `cpfCnpj` varchar(45) NOT NULL,
  `logo` longtext,
  `email` varchar(100) NOT NULL,
  `telefone1` varchar(45) NOT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `blog` varchar(150) DEFAULT NULL,
  `whatsapp` varchar(45) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `sobre` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  UNIQUE KEY `cpfCnpj_UNIQUE` (`cpfCnpj`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `telefone1_UNIQUE` (`telefone1`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferencias`
--

LOCK TABLES `preferencias` WRITE;
/*!40000 ALTER TABLE `preferencias` DISABLE KEYS */;
INSERT INTO `preferencias` VALUES (1,'Imobille Site','08468331406','/9j/4AAQSkZJRgABAQEAYABgAAD/4QAiRXhpZgAATU0AKgAAAAgAAQESAAMAAAABAAEAAAAAAAD/7AARRHVja3kAAQAEAAAAUAAA/+EDPGh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4NCjx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4NCgk8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPg0KCQk8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowOTlEREUyREIzRDkxMUU2QTQxMUJDMEMxOEM1MDk5RSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowOTlEREUyQ0IzRDkxMUU2QTQxMUJDMEMxOEM1MDk5RSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IE1hY2ludG9zaCI+DQoJCQk8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBRENBN0ZCMjY3RTAxMUU2QTM4NUQ0QkFDQzU5MzhFMiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBRENBN0ZCMzY3RTAxMUU2QTM4NUQ0QkFDQzU5MzhFMiIvPg0KCQk8L3JkZjpEZXNjcmlwdGlvbj4NCgk8L3JkZjpSREY+DQo8L3g6eG1wbWV0YT4NCjw/eHBhY2tldCBlbmQ9J3cnPz7/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAEYARgDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD98tRneDZtbbnOeKr/AG6f+9+gqXVukf8AwKqlAE326f8AvfoKPt0/979BUNFAE326f+9+go+3T/3v0FQ0UATfbp/736Cj7dP/AHv0FQ0UATfbp/736Cj7dP8A3v0FQ0UATfbp/wC9+go+3T/3v0FQ0UATfbp/736Cj7dP/e/QVDRQBN9un/vfoKPt0/8Ae/QVDRQBN9un/vfoKPt0/wDe/QVDRQBN9un/AL36Cj7dP/e/QVDRQBN9un/vfoKPt0/979BUNFAE326f+9+go+3T/wB79BUNFAE326f+9+go+3T/AN79BUNFAE326f8AvfoKPt0/979BUNFAE326f+9+go+3T/3v0FQ0UATfbp/736Cj7dP/AHv0FQ0UATfbp/736Cj7dP8A3v0FQ0UATfbp/wC9+goqGigC3q3SP/gVVKt6t0j/AOBVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigC3q3SP/AIFVSrerdI/+BVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigC3q3SP/gVVKt6t0j/AOBVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigC3q3SP/AIFVSrerdI/+BVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigC3q3SP/gVVKt6t0j/AOBVUoAKKKKACiiigAooooAKKKKACiiigAooooAKKKMfr09P8+/8yRQAE4/n/n/P/wBfmfEnxi8M+Efid4b8G6lrVjY+JvF9ve3ei6fOxSTU0s1ha5EZxtLxrOjlMhygdlG2OQr4/wD8FFP+CkPgn/gnP8IW1zxDL/aniTUkYaB4ehlEd3q0w9Tg+VApI8yUghQcAO5VW/nN/aK/bQ+I37UP7RD/ABR8T+I75fF0M8U2mXFhK9qugrC/mQRWQVt0CRMdylTu3lpGZpGZ28bNM4p4RqC96Xbsv8+33+v6hwD4Y4ziKE8TUl7Kik0pWvzStokusU/if/bq1u4/1cdF78evBor86f8AgkB/wXD0P9rTQNP8A/FXU9L8PfFS28q1tb2d47Wz8XFmWOMxA7US8ZmVTAMB2O6IYJii/RavRwuKp4imqlJ3X9bnxGfZBjsnxksFj4cso/c13i+qf/AdndBRRRXQeMFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAFvVukf/AqqVb1bpH/AMCqpQAUUUUAFFFFABRRRQAUUUUAFFFFABRRQOv+evv6fzPagAHX8R7Z/wA/59a+P/8Agq1/wVs8M/8ABOTwB/Z9itn4h+Kes25k0bQ2cmO1U5UXt5tIKQqwOIwQ8pXYpVQ8iec/8Flv+C0mm/sSaFefD/4dXVnq3xd1KDZN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','douglasf.filho@gmail.com','81996729491','81988874815','','81988874815','douglas.fernandes.filho','FilhoEu','Douglas.Fernandes.da.Silva.Filho','Empresa renomada do ramo imobiliÃ¡rio com mais de 25 anos de mercado.');
/*!40000 ALTER TABLE `preferencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'imobilledb'
--

--
-- Dumping routines for database 'imobilledb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-21  1:10:23
