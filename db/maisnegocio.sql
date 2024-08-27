-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: maisnegocio
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acess`
--

DROP TABLE IF EXISTS `acess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acess` (
  `acesso_Id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `acesso_inserir` tinyint(1) DEFAULT NULL,
  `acesso_alterar` tinyint(1) DEFAULT NULL,
  `acesso_apagar` tinyint(1) DEFAULT NULL,
  `acesso_visualizar` tinyint(1) DEFAULT NULL,
  `acesso_imprimir` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`acesso_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acess`
--

LOCK TABLES `acess` WRITE;
/*!40000 ALTER TABLE `acess` DISABLE KEYS */;
/*!40000 ALTER TABLE `acess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatos`
--

DROP TABLE IF EXISTS `contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contatos` (
  `id_contatos` int NOT NULL AUTO_INCREMENT,
  `prefixo_celular` varchar(3) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `prefixo_telefone` varchar(3) DEFAULT NULL,
  `telefone` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_contatos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos`
--

LOCK TABLES `contatos` WRITE;
/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curso` (
  `curso_id` int NOT NULL AUTO_INCREMENT,
  `nomecurso` varchar(150) NOT NULL,
  `descricaocurso` varchar(500) NOT NULL,
  `professor` varchar(200) NOT NULL,
  `duracao` varchar(45) NOT NULL,
  `progresso` varchar(5) NOT NULL,
  `preco` double NOT NULL,
  `situacao` int NOT NULL,
  `tipo` int NOT NULL,
  PRIMARY KEY (`curso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimo` (
  `emprestimo_id` int NOT NULL AUTO_INCREMENT,
  `valor_solicitado` double NOT NULL,
  `valor_aprovado` double NOT NULL,
  `parcelas` int NOT NULL,
  `estado_pagamento` int NOT NULL,
  `total` double DEFAULT NULL,
  `juros` double NOT NULL,
  `imposto_adicional` double NOT NULL,
  `juros_mensal_atraso` double DEFAULT NULL,
  `juros_diario_atraso` double DEFAULT NULL,
  PRIMARY KEY (`emprestimo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimo`
--

LOCK TABLES `emprestimo` WRITE;
/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `endereco_id` int NOT NULL AUTO_INCREMENT,
  `end_cep` varchar(8) NOT NULL,
  `end_logradouro` varchar(150) NOT NULL,
  `end_numero` varchar(10) NOT NULL,
  `end_complemento` varchar(150) DEFAULT NULL,
  `end_bairro` varchar(150) NOT NULL,
  `end_cidade` varchar(150) NOT NULL,
  `end_uf` varchar(2) NOT NULL,
  PRIMARY KEY (`endereco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario` (
  `id_funcionario` int NOT NULL AUTO_INCREMENT,
  `salario` double DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pessoa` (
  `pessoa_id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `senha` varchar(250) NOT NULL,
  `user_token` varchar(1000) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  PRIMARY KEY (`pessoa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'opaopa','1232124234',NULL,NULL,'aa@gmail.com',NULL,'$2y$10$iYlcERQ/MvZTrPuQ0qUuge8Ef4SRNHNWz7pLGPVQHpGWpVLy5CasO','dddbf76439a9c1aae0845c08968ddad7fbb281bdcd2030a974b41b4827dcc89b89d3c4213efb6dc6b8e61e9c3d392b20e1d85f0ae560fabb64dc30553fb419f5fa41fb32d588c2cd5b4bfdfffb08707f',NULL),(2,'ssfsfs','123212423',NULL,NULL,'aa@gmail.com',NULL,'$2y$10$lquC9D1qm1uiP1FL44719OCcjC3yNC3QfkXjXywifOIiJwXth9To2','103d1e7e69338df72ddf7d1f78f9401aa775f0f31e9ca6218f3973ba58891461b5d85f0521cf7a1143227b0b282b7a0e96f874d563dd6d2695ae05d737b1d04cd073db084e1f209ba3e29f90fed32d31',NULL);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-21 17:00:49
