CREATE DATABASE  IF NOT EXISTS `imobilledb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `imobilledb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: imobille
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
-- Table structure for table `achievement`
--

DROP TABLE IF EXISTS `achievement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievement` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `has_accessibility` bit(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `presentation_image` longtext,
  `service_elevators` int(11) NOT NULL,
  `social_elevators` int(11) NOT NULL,
  `start_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `address_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mm3kubwvx0g87nme666c8n7w0` (`address_id`),
  KEY `FK_4k8f8b9kkch5k10knb8tl2ocq` (`company_id`),
  KEY `FK_kw9iowwu0ke6mhe196octs42p` (`created_by`),
  KEY `FK_pw21jcs2f38qwdahfk1ghf9bn` (`updated_by`),
  CONSTRAINT `fk_address_mm3kubwvx0g87nme666c8n7w0` FOREIGN KEY (`address_id`) REFERENCES `address` (`cep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_company_4k8f8b9kkch5k10knb8tl2ocq` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_kw9iowwu0ke6mhe196octs42p` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_pw21jcs2f38qwdahfk1ghf9bn` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievement`
--

LOCK TABLES `achievement` WRITE;
/*!40000 ALTER TABLE `achievement` DISABLE KEYS */;
/*!40000 ALTER TABLE `achievement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `cep` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`cep`),
  KEY `FK_cvechwl4bop86wvf0ugrdfbeu` (`created_by`),
  KEY `FK_2uuuj7js3ecmec054ebjjvos1` (`updated_by`),
  CONSTRAINT `fk_user_2uuuj7js3ecmec054ebjjvos1` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_cvechwl4bop86wvf0ugrdfbeu` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (50030150,'Avenida Alfredo Lisboa','Recife','Praça do Marco Zero','2017-12-12 15:57:52','Recife',NULL,'Pernambuco','2017-12-12 15:57:52',1,1);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bill` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(255) NOT NULL,
  `bill_number` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `in_installment` int(11) NOT NULL,
  `pay_day` datetime NOT NULL,
  `payment_form` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `total_installment` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `value` double NOT NULL,
  `client` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `financing_agency_id` bigint(20) DEFAULT NULL,
  `realty` bigint(20) NOT NULL,
  `seller` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bqd45kg9dyvmomijrj625eevf` (`client`),
  KEY `FK_icrwiectptqmp08xu8yljv7cx` (`created_by`),
  KEY `FK_fia5px7kgivx06jnwr60lsdsx` (`financing_agency_id`),
  KEY `FK_kkybcgo0gfhb3blvl4erspjha` (`realty`),
  KEY `FK_elgkhglwl6qff0o54twblldl8` (`seller`),
  KEY `FK_5b56i7lfxo9n21vy7ub3kk13d` (`updated_by`),
  CONSTRAINT `fk_client_bqd45kg9dyvmomijrj625eevf` FOREIGN KEY (`client`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_financing_agency_fia5px7kgivx06jnwr60lsdsx` FOREIGN KEY (`financing_agency_id`) REFERENCES `financing_agency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_realty_kkybcgo0gfhb3blvl4erspjha` FOREIGN KEY (`realty`) REFERENCES `realty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_5b56i7lfxo9n21vy7ub3kk13d` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_elgkhglwl6qff0o54twblldl8` FOREIGN KEY (`seller`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_icrwiectptqmp08xu8yljv7cx` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `progress` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_j1k0307pqtthab4nw338vqj61` (`created_by`),
  KEY `FK_8vu4hgy4o0dauc9fk1sjmy731` (`updated_by`),
  CONSTRAINT `fk_user_8vu4hgy4o0dauc9fk1sjmy731` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_j1k0307pqtthab4nw338vqj61` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building_photos`
--

DROP TABLE IF EXISTS `building_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building_photos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `foto` longtext,
  `photo_date` datetime NOT NULL,
  `building_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sj0e423praxa38b8s6fv5255l` (`building_id`),
  KEY `FK_9saxqbfhf2cdoasjiiawv9dnm` (`created_by`),
  CONSTRAINT `fk_building_sj0e423praxa38b8s6fv5255l` FOREIGN KEY (`building_id`) REFERENCES `building` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_9saxqbfhf2cdoasjiiawv9dnm` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building_photos`
--

LOCK TABLES `building_photos` WRITE;
/*!40000 ALTER TABLE `building_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `building_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `address_id` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_plnstg0h55xcbwkkf8iehxo71` (`cpf`),
  UNIQUE KEY `UK_bjymkmmtq593hm4iiecka4yyu` (`rg`),
  KEY `FK_d7c4jgrjortusykiwq2728d2g` (`address_id`),
  KEY `FK_41n6sdraruyc1sp5lotnpdyfc` (`created_by`),
  KEY `FK_2gnd9ksjyo2sfu0ypivxfny9p` (`updated_by`),
  CONSTRAINT `fk_address_d7c4jgrjortusykiwq2728d2g` FOREIGN KEY (`address_id`) REFERENCES `address` (`cep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_2gnd9ksjyo2sfu0ypivxfny9p` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_41n6sdraruyc1sp5lotnpdyfc` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'08468331406','2017-12-12 15:57:52','douglasf.filho@gmail.com','Douglas Fernandes','81996729491','81996729491','7898636','2017-12-12 15:57:52',50030150,1,1);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `logo` longtext,
  `name` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `address_id` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_h2rewspdf9bnwpbt1nauwiaww` (`address_id`),
  KEY `FK_rn7ljx47e0rnqsy1uiab52p7a` (`created_by`),
  KEY `FK_je41xn4tfr9kyk486j8lqqlgt` (`updated_by`),
  CONSTRAINT `fk_address_h2rewspdf9bnwpbt1nauwiaww` FOREIGN KEY (`address_id`) REFERENCES `address` (`cep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_je41xn4tfr9kyk486j8lqqlgt` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_rn7ljx47e0rnqsy1uiab52p7a` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'2017-12-12 15:57:52',NULL,'Test Company','2017-12-12 15:57:52',50030150,1,1);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financing_agency`
--

DROP TABLE IF EXISTS `financing_agency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financing_agency` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `logo` longtext,
  `name` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `address_id` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_l3h0yv4u01gnmtmxmplhq6d96` (`address_id`),
  KEY `FK_b84y7bhq1hm78b3vji72nx0lh` (`created_by`),
  KEY `FK_osplbnrh6e0vvhb0px3s2hb56` (`updated_by`),
  CONSTRAINT `fk_address_l3h0yv4u01gnmtmxmplhq6d96` FOREIGN KEY (`address_id`) REFERENCES `address` (`cep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_b84y7bhq1hm78b3vji72nx0lh` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_osplbnrh6e0vvhb0px3s2hb56` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financing_agency`
--

LOCK TABLES `financing_agency` WRITE;
/*!40000 ALTER TABLE `financing_agency` DISABLE KEYS */;
/*!40000 ALTER TABLE `financing_agency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailing`
--

DROP TABLE IF EXISTS `mailing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `field_key` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_dpc329sppgvv2mq20b181fcun` (`field_key`),
  KEY `FK_sljca5mews4j95q9rcdccibqh` (`created_by`),
  KEY `FK_pa410piduh6r6mhs9kpiw19e9` (`updated_by`),
  CONSTRAINT `fk_user_pa410piduh6r6mhs9kpiw19e9` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_sljca5mews4j95q9rcdccibqh` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailing`
--

LOCK TABLES `mailing` WRITE;
/*!40000 ALTER TABLE `mailing` DISABLE KEYS */;
INSERT INTO `mailing` VALUES (1,'2017-12-12 15:57:52','mail.smtp.auth','2017-12-12 15:57:52','true',1,1),(2,'2017-12-12 15:57:52','mail.smtp.starttls.enable','2017-12-12 15:57:52','true',1,1),(3,'2017-12-12 15:57:52','mail.smtp.host','2017-12-12 15:57:52','smtp.gmail.com',1,1),(4,'2017-12-12 15:57:52','mail.smtp.port','2017-12-12 15:57:52','587',1,1),(5,'2017-12-12 15:57:52','username','2017-12-12 15:57:52','true',1,1),(6,'2017-12-12 15:57:52','password','2017-12-12 15:57:52','$6745#3233@Imobi',1,1);
/*!40000 ALTER TABLE `mailing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderly`
--

DROP TABLE IF EXISTS `orderly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderly` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `start_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `broker` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `realty` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_6d3ew4oikq78iuap04114r7r5` (`broker`),
  KEY `FK_iihsgu6cyg9shjfp58k8ejlqo` (`created_by`),
  KEY `FK_neccn1j6gs0knwvb0lixvyr2w` (`realty`),
  KEY `FK_tomh0urlw37s2bd9yie8vlr5f` (`updated_by`),
  CONSTRAINT `fk_realty_neccn1j6gs0knwvb0lixvyr2w` FOREIGN KEY (`realty`) REFERENCES `realty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_6d3ew4oikq78iuap04114r7r5` FOREIGN KEY (`broker`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_iihsgu6cyg9shjfp58k8ejlqo` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_tomh0urlw37s2bd9yie8vlr5f` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderly`
--

LOCK TABLES `orderly` WRITE;
/*!40000 ALTER TABLE `orderly` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderly` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `rules` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_rackm46yf6r4xcaue8l6rt71n` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,'Administrador','Administrador'),(3,'Teste','Teste');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realty`
--

DROP TABLE IF EXISTS `realty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realty` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `available` bit(1) NOT NULL,
  `building` bigint(20) NOT NULL,
  `bedrooms_with_suite` int(11) NOT NULL,
  `bedrooms_without_suite` int(11) NOT NULL,
  `build_model` varchar(255) NOT NULL,
  `build_type` varchar(255) NOT NULL,
  `captured_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `dining_rooms` int(11) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `floor_category` varchar(255) NOT NULL,
  `has_balcony` bit(1) NOT NULL,
  `has_home_office` bit(1) NOT NULL,
  `length` double NOT NULL,
  `util_length` double NOT NULL,
  `living_rooms` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `parking_lots` int(11) NOT NULL,
  `social_bathrooms` int(11) NOT NULL,
  `sun_location` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `value` double NOT NULL,
  `achievement_id` bigint(20) NOT NULL,
  `captured_by` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_dqhdvirosjvptsj0q1qadougl` (`building`),
  KEY `FK_dqhdvirosjvptsj0q1qaiftob` (`achievement_id`),
  KEY `FK_p116mv44fnjeupejl1jgitiuo` (`captured_by`),
  KEY `FK_s818as2gnregu61kq07na8k02` (`created_by`),
  KEY `FK_2vmdvc30mqxbs54gwoueaswv3` (`updated_by`),
  CONSTRAINT `fk_achievement_dqhdvirosjvptsj0q1qaiftob` FOREIGN KEY (`achievement_id`) REFERENCES `achievement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_building_dqhdvirosjvptsj0q1qaiftob` FOREIGN KEY (`building`) REFERENCES `building` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_2vmdvc30mqxbs54gwoueaswv3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_p116mv44fnjeupejl1jgitiuo` FOREIGN KEY (`captured_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_s818as2gnregu61kq07na8k02` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realty`
--

LOCK TABLES `realty` WRITE;
/*!40000 ALTER TABLE `realty` DISABLE KEYS */;
/*!40000 ALTER TABLE `realty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realty_photos`
--

DROP TABLE IF EXISTS `realty_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realty_photos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `foto` longtext,
  `photo_date` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `realty_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_k4eu946xmrx4ig9g00kcffcdw` (`created_by`),
  KEY `FK_nf5uq9077ok74j519tvnaf77n` (`realty_id`),
  CONSTRAINT `fk_realty_nf5uq9077ok74j519tvnaf77n` FOREIGN KEY (`realty_id`) REFERENCES `realty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_k4eu946xmrx4ig9g00kcffcdw` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realty_photos`
--

LOCK TABLES `realty_photos` WRITE;
/*!40000 ALTER TABLE `realty_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `realty_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` longtext,
  `last_access` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `permission` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_ob8kqyqqgmefl0aco34akdtpe` (`email`),
  UNIQUE KEY `UK_gj2fy3dcix7ph7k8684gka40c` (`name`),
  UNIQUE KEY `UK_fu7vlptm4jlsi5gdo17yikxe7` (`phone1`),
  UNIQUE KEY `UK_l4inmdmc8kp1p26thtia08p5y` (`phone2`),
  KEY `FK_27ndbi79kq4pj4nyd0sbbsvyu` (`permission`),
  CONSTRAINT `fk_permission_7ndbi79kq4pj4nyd0sbbsvyu` FOREIGN KEY (`permission`) REFERENCES `permission` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'2017-12-12 15:57:51','douglasf.filho@gmail.com',NULL,'2017-12-15 17:58:33','Administrador','JDUkcm91bmRzPTUwMDAkY3J5cHRpbmdhbGxzdHJpbiRId25TYjA5S08ualAvaDYxdkpDY0pJdkJrRUgudk9mVXVDd0xrTm5saFUy','81996729491','81988874815','2017-12-15 17:58:33',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'imobilusdb'
--

--
-- Dumping routines for database 'imobilusdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-08 11:53:25
