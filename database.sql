-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sisrancho
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB-0+deb10u2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(11) DEFAULT NULL,
  `data_hora` varchar(45) DEFAULT NULL,
  `operador` varchar(45) DEFAULT NULL,
  `agent` varchar(100) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `acao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35163 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;

/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avisos`
--

DROP TABLE IF EXISTS `avisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avisos` (
  `id` int(11) NOT NULL,
  `conteudo` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avisos`
--

LOCK TABLES `avisos` WRITE;
/*!40000 ALTER TABLE `avisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `avisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_cia`
--

DROP TABLE IF EXISTS `cad_cia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cad_cia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descricao` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_cia`
--

LOCK TABLES `cad_cia` WRITE;
/*!40000 ALTER TABLE `cad_cia` DISABLE KEYS */;
INSERT INTO `cad_cia` VALUES (2,'CIA C2','COMPANHIA DE COMANDO E CONTROLE'),(3,'CCAP','COMPANHIA DE COMANDO E APOIO'),(4,'CIA GE','COMPANHIA DE GUERRA ELETRÔNICA'),(5,'CIA COM','COMPANHIA DE COMUNICAÇÕES'),(6,'EM','ESTADO MAIOR'),(7,'QUALIFICAÇÃO','FORMAÇÃO');
/*!40000 ALTER TABLE `cad_cia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_militar`
--

DROP TABLE IF EXISTS `cad_militar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cad_militar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `nome_guerra` varchar(200) NOT NULL,
  `ident_militar` varchar(200) NOT NULL,
  `posto` int(11) NOT NULL,
  `om_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ident_militar` (`ident_militar`)
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_militar`
--

LOCK TABLES `cad_militar` WRITE;
/*!40000 ALTER TABLE `cad_militar` DISABLE KEYS */;
INSERT INTO `cad_militar` VALUES (6,'TEST USER','TESTE','111.111.111-11',14,3);
/*!40000 ALTER TABLE `cad_militar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_posto`
--

DROP TABLE IF EXISTS `cad_posto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cad_posto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `ordem` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_posto`
--

LOCK TABLES `cad_posto` WRITE;
/*!40000 ALTER TABLE `cad_posto` DISABLE KEYS */;
INSERT INTO `cad_posto` VALUES (4,'Oficial General','GEN',4),(5,'Oficiais Superiores','CEL',5),(6,'Oficiais Superiores','TC',6),(7,'Oficiais Superiores','MAJ',7),(8,'Oficiais Intermediarios','CAP',8),(9,'Oficiais Intermediarios','1° TEN',9),(10,'Oficiais Intermediarios','2° TEN',10),(11,'Oficiais Intermediarios','ASP',11),(12,'Oficiais Subalternos','ST',12),(13,'Oficiais Subalternos','1° SGT',13),(14,'Oficiais Subalternos','2° SGT',14),(15,'Oficiais Subalternos','3° SGT',15),(16,'Graduados','CB',16),(17,'Graduados','SD',17),(18,'Civil','Civil',19);
/*!40000 ALTER TABLE `cad_posto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bloq_cia` varchar(255) NOT NULL,
  `bloq_dias` varchar(255) NOT NULL,
  `bloq_ref` varchar(255) NOT NULL,
  `bloq_pg` varchar(255) NOT NULL,
  `bloq_mot` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `posto` int(11) NOT NULL,
  `horarioInicio` time NOT NULL,
  `horarioFim` time NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros`
--

DROP TABLE IF EXISTS `registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registros` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `tp` varchar(10) NOT NULL,
  `ident_militar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58323 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros`
--

LOCK TABLES `registros` WRITE;
/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros_outros`
--

DROP TABLE IF EXISTS `registros_outros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registros_outros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `ident_militar` varchar(45) DEFAULT NULL,
  `om` varchar(45) DEFAULT NULL,
  `posto` int(11) DEFAULT NULL,
  `tpRef` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros_outros`
--

LOCK TABLES `registros_outros` WRITE;
/*!40000 ALTER TABLE `registros_outros` DISABLE KEYS */;
INSERT INTO `registros_outros` VALUES (1,'MILITAROUTRAOM','123450987-6','MILITAR OUTRA OM',16,1,'2021-11-26');
/*!40000 ALTER TABLE `registros_outros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `om` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'sti','b7aef64988587ef8b7f78424efcff23c',1,2,'Administrador'),(4,'ciac2','4911f3c19840910b43c119eaa8078261',2,2,'Furriel Cia C2'),(5,'ciacom','5d3f1d1e6823d899d648c005efeff17a',2,5,'Furriel Cia Com'),(6,'ccap','db80d4f6310bbedd56b6d711f3626217',2,3,'Furriel CCAp'),(7,'ciage','f6c7072f1e1219de2b4af82c4a280797',2,4,'Furriel Cia GE'),(8,'aprov','9853d5c3c91015b576b7154f3ff16572',1,6,'Aprovisionador'),(9,'qualificacao','1e6b62527e8259e241ebd93b011abaac',2,7,'Furriel Qualificação');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-04 21:44:56
