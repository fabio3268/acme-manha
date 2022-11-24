CREATE DATABASE  IF NOT EXISTS `bd-mocitec-manha-tarde` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd-mocitec-manha-tarde`;
-- MySQL dump 10.13  Distrib 5.7.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd-mocitec-manha-tarde
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
                             `id` int(11) NOT NULL AUTO_INCREMENT,
                             `idUser` int(11) NOT NULL,
                             `street` varchar(45) NOT NULL,
                             `number` varchar(45) NOT NULL,
                             `complement` varchar(45) NOT NULL,
                             `city` varchar(45) NOT NULL,
                             `state` varchar(45) NOT NULL,
                             `zipCode` varchar(45) NOT NULL,
                             `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                             `udated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                             PRIMARY KEY (`id`),
                             KEY `fk_addresses_users_idx` (`idUser`),
                             CONSTRAINT `fk_addresses_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
                              `id` int(11) NOT NULL AUTO_INCREMENT,
                              `level` varchar(255) NOT NULL,
                              `field` varchar(255) NOT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Ensino Fundamental','Matemática e suas tecnologias / Ciências da Natureza e suas tecnologias'),(2,'Ensino Fundamental','Ciências Humanas e suas tecnologias / Linguagens, códigos e suas tecnologias'),(3,'Ensino Médio','Matemática e suas tecnologias / Ciências da Natureza e suas tecnologias'),(4,'Ensino Médio','Ciências Humanas e suas tecnologias / Linguagens, códigos e suas tecnologias'),(5,'Ensino Médio Integrado','Ciências Exatas e Biológicas'),(6,'Ensino Médio Integrado','Ciências Humanas, Comportamentais, Linguagens e Artes'),(7,'Ensino Médio Integrado','Engenharias'),(8,'Ensino Médio Integrado','Informática'),(9,'Ensino Médio Integrado','Meio Ambiente'),(10,'Ensino Superior e Pós-Graduação','Matemática e suas tecnologias / Ciências da Natureza e suas tecnologias'),(11,'Ensino Superior e Pós-Graduação','Ciências Humanas e suas tecnologias / Linguagens, códigos e suas tecnologias');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `question` text NOT NULL,
                        `answer` text NOT NULL,
                        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                        `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'Como submeter um projeto?','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ','2022-09-08 16:34:59',NULL),(2,'Como fazer o cadastro?','The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.','2022-09-08 16:34:59',NULL),(3,'Quais os dias do evento?','Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.','2022-09-08 16:34:59',NULL),(4,'Com são realizadas as avaliações','Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','2022-09-08 16:34:59',NULL);
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_images`
--

DROP TABLE IF EXISTS `project_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_images` (
                                  `id` int(11) NOT NULL AUTO_INCREMENT,
                                  `idProject` int(11) NOT NULL,
                                  `image` varchar(255) NOT NULL,
                                  PRIMARY KEY (`id`),
                                  KEY `fk_project_images_projects1_idx` (`idProject`),
                                  CONSTRAINT `fk_project_images_projects1` FOREIGN KEY (`idProject`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_images`
--

LOCK TABLES `project_images` WRITE;
/*!40000 ALTER TABLE `project_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `idCategory` int(11) NOT NULL,
                            `title` varchar(255) NOT NULL,
                            `abstract` varchar(255) NOT NULL,
                            `text` varchar(255) NOT NULL,
                            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                            `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                            PRIMARY KEY (`id`),
                            KEY `fk_projects_category1_idx` (`idCategory`),
                            CONSTRAINT `fk_projects_category1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (13,1,'Projeto 01','Resumo 01','Texto','2022-08-09 20:02:16','2022-09-08 13:31:10'),(14,1,'Projeto 02','Resumo 02','Texto 2','2022-08-09 20:10:39','2022-09-09 10:39:43'),(15,3,'Projeto 03','Resumo 03','Texto','2022-09-08 13:31:10',NULL),(16,1,'Projeto 04','Resumo 04','Texto','2022-09-08 13:31:10','2022-09-09 10:39:43'),(17,5,'Projeto 05','Resumo 05','Texto','2022-09-08 13:32:09',NULL),(18,5,'T&iacute;tulo do Meu Projeto','Resumo do meu projeto...','Texto do meu projeto...','2022-10-26 17:22:11',NULL),(19,10,'T&iacute;tulo do Meu Projeto','Resumo do meu projeto...','Texto do meu projeto...','2022-10-28 13:37:23',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviewer_projects`
--

DROP TABLE IF EXISTS `reviewer_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviewer_projects` (
                                     `id` int(11) NOT NULL AUTO_INCREMENT,
                                     `idProject` int(11) NOT NULL,
                                     `idUser` int(11) NOT NULL,
                                     PRIMARY KEY (`id`),
                                     KEY `fk_reviwers_projects_projects1_idx` (`idProject`),
                                     KEY `fk_reviwers_projects_users1_idx` (`idUser`),
                                     CONSTRAINT `fk_reviwers_projects_projects1` FOREIGN KEY (`idProject`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                     CONSTRAINT `fk_reviwers_projects_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviewer_projects`
--

LOCK TABLES `reviewer_projects` WRITE;
/*!40000 ALTER TABLE `reviewer_projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviewer_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `name` varchar(45) NOT NULL,
                         `email` varchar(45) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `document` varchar(45) DEFAULT NULL,
                         `photo` varchar(255) DEFAULT NULL,
                         `type` char(1) NOT NULL DEFAULT 'W' COMMENT 'Admin - Writer - Reviewer',
                         `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                         `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Escritor 01','escritor01@gmail.com','$2y$10$GbrrydsALV/fddCHPxdakeM1zAnljkzT.0cVB/iW3loCoM2ysqczu','9696969696',NULL,'W','2022-07-15 11:50:25','2022-11-23 12:13:54'),(2,'Escritor 02','escritor02@gmail.com','$2y$10$GbrrydsALV/fddCHPxdakeM1zAnljkzT.0cVB/iW3loCoM2ysqczu','1212121212',NULL,'W','2022-07-25 11:36:46','2022-11-23 12:13:54'),(3,'Escritor 03','escritor03@gmail.com','$2y$10$GbrrydsALV/fddCHPxdakeM1zAnljkzT.0cVB/iW3loCoM2ysqczu','2323232322',NULL,'W','2022-07-25 12:01:15','2022-11-23 12:13:54'),(35,'Escritor 04','escritor04@gmail.com','$2y$10$GbrrydsALV/fddCHPxdakeM1zAnljkzT.0cVB/iW3loCoM2ysqczu','3434343434',NULL,'W','2022-09-02 11:11:38','2022-11-23 12:13:54'),(36,'Escritor 05','escritor05@gmail.com','$2y$10$GbrrydsALV/fddCHPxdakeM1zAnljkzT.0cVB/iW3loCoM2ysqczu','4545454545','storage/images/2022/11/71f9d67f1d0fd0b76ad3e9964ef32ae4.png','W','2022-10-18 17:43:16','2022-11-23 12:12:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `write_projects`
--

DROP TABLE IF EXISTS `write_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `write_projects` (
                                  `id` int(11) NOT NULL AUTO_INCREMENT,
                                  `idProject` int(11) NOT NULL,
                                  `idUser` int(11) NOT NULL,
                                  PRIMARY KEY (`id`),
                                  KEY `fk_authors_has_projects_projects1_idx` (`idProject`),
                                  KEY `fk_write_project_users1_idx` (`idUser`),
                                  CONSTRAINT `fk_authors_has_projects_projects1` FOREIGN KEY (`idProject`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                  CONSTRAINT `fk_write_project_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `write_projects`
--

LOCK TABLES `write_projects` WRITE;
/*!40000 ALTER TABLE `write_projects` DISABLE KEYS */;
INSERT INTO `write_projects` VALUES (1,13,1),(2,13,2),(3,13,3),(4,14,1);
/*!40000 ALTER TABLE `write_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd-mocitec-manha-tarde'
--

--
-- Dumping routines for database 'bd-mocitec-manha-tarde'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-23  9:15:56