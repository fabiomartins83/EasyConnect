-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Abr-2020 às 02:56
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdcentral`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcargos`
--

DROP TABLE IF EXISTS `tbcargos`;
CREATE TABLE IF NOT EXISTS `tbcargos` (
  `idCargos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Cargo` varchar(20) NOT NULL,
  PRIMARY KEY (`idCargos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcidades`
--

DROP TABLE IF EXISTS `tbcidades`;
CREATE TABLE IF NOT EXISTS `tbcidades` (
  `idCidade` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Cidade` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idCidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfotografias`
--

DROP TABLE IF EXISTS `tbfotografias`;
CREATE TABLE IF NOT EXISTS `tbfotografias` (
  `idFoto` int(11) NOT NULL AUTO_INCREMENT,
  `ProdutoOfertado` int(10) UNSIGNED NOT NULL,
  `Fotografia` varchar(32) NOT NULL,
  PRIMARY KEY (`idFoto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblistadeprodutos`
--

DROP TABLE IF EXISTS `tblistadeprodutos`;
CREATE TABLE IF NOT EXISTS `tblistadeprodutos` (
  `idNomeProdServ` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomeProduto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idNomeProdServ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbnegociantes`
--

DROP TABLE IF EXISTS `tbnegociantes`;
CREATE TABLE IF NOT EXISTS `tbnegociantes` (
  `idNegociante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `User` int(10) UNSIGNED NOT NULL,
  `RazaoSocial` varchar(100) NOT NULL,
  `Cnpj` int(14) UNSIGNED ZEROFILL NOT NULL,
  `RamoDeAtiv` int(10) UNSIGNED NOT NULL,
  `DataRegNegociante` timestamp NOT NULL,
  `CargoDoUser` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idNegociante`),
  KEY `relUserComerciante` (`User`),
  KEY `relAtividadeComerciante` (`RamoDeAtiv`),
  KEY `relCargoComerciante` (`CargoDoUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprodutosofertados`
--

DROP TABLE IF EXISTS `tbprodutosofertados`;
CREATE TABLE IF NOT EXISTS `tbprodutosofertados` (
  `idProduto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Negociante` int(10) UNSIGNED NOT NULL,
  `TipoDeProduto` int(10) UNSIGNED NOT NULL,
  `ProdutoServico` int(10) UNSIGNED NOT NULL,
  `DataInclusaoProduto` datetime NOT NULL,
  `QtdeProduto` smallint(6) UNSIGNED NOT NULL,
  `DescricaoProduto` text,
  `FotografiaProduto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `relListaProdProduto` (`ProdutoServico`),
  KEY `relComercianteProdOfert` (`Negociante`),
  KEY `relTipoProdProduto` (`TipoDeProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbramodenegocio`
--

DROP TABLE IF EXISTS `tbramodenegocio`;
CREATE TABLE IF NOT EXISTS `tbramodenegocio` (
  `idRamoDeNegocio` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `NomeRamoDeNegocio` varchar(30) NOT NULL,
  PRIMARY KEY (`idRamoDeNegocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipodeprodserv`
--

DROP TABLE IF EXISTS `tbtipodeprodserv`;
CREATE TABLE IF NOT EXISTS `tbtipodeprodserv` (
  `idTipoDeProdServ` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomeTipoDeProduto` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipoDeProdServ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtransacoes`
--

DROP TABLE IF EXISTS `tbtransacoes`;
CREATE TABLE IF NOT EXISTS `tbtransacoes` (
  `idNegocio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProdutoNegociado` int(10) UNSIGNED NOT NULL,
  `Cliente` int(10) UNSIGNED NOT NULL,
  `DataTransacao` timestamp NOT NULL,
  `QtdeNegociada` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`idNegocio`),
  KEY `relClienteTransacao` (`Cliente`),
  KEY `relProdutoTransacao` (`ProdutoNegociado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuariospf`
--

DROP TABLE IF EXISTS `tbusuariospf`;
CREATE TABLE IF NOT EXISTS `tbusuariospf` (
  `idUser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomeLoginUser` varchar(15) NOT NULL,
  `NomeCompletoUser` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CpfUser` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `DataNascUser` date NOT NULL,
  `EmailUser` varchar(50) NOT NULL,
  `TelefoneUser` bigint(11) UNSIGNED NOT NULL,
  `EnderecoUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NumEnderecoUser` int(10) UNSIGNED DEFAULT NULL,
  `CidadeUser` varchar(30) NOT NULL,
  `CepUser` int(5) UNSIGNED ZEROFILL NOT NULL,
  `SenhaUser` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DataRegistro` timestamp NOT NULL,
  `LoggedIn` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbnegociantes`
--
ALTER TABLE `tbnegociantes`
  ADD CONSTRAINT `relAtividadeComerciante` FOREIGN KEY (`RamoDeAtiv`) REFERENCES `tbramodenegocio` (`idRamoDeNegocio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relCargoComerciante` FOREIGN KEY (`CargoDoUser`) REFERENCES `tbcargos` (`idCargos`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relUserComerciante` FOREIGN KEY (`User`) REFERENCES `tbusuariospf` (`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `tbprodutosofertados`
--
ALTER TABLE `tbprodutosofertados`
  ADD CONSTRAINT `relComercianteProdOfert` FOREIGN KEY (`Negociante`) REFERENCES `tbnegociantes` (`idNegociante`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relListaProdProduto` FOREIGN KEY (`ProdutoServico`) REFERENCES `tblistadeprodutos` (`idNomeProdServ`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relTipoProdProduto` FOREIGN KEY (`TipoDeProduto`) REFERENCES `tbtipodeprodserv` (`idTipoDeProdServ`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `tbtransacoes`
--
ALTER TABLE `tbtransacoes`
  ADD CONSTRAINT `relClienteTransacao` FOREIGN KEY (`Cliente`) REFERENCES `tbusuariospf` (`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `relProdutoTransacao` FOREIGN KEY (`ProdutoNegociado`) REFERENCES `tbprodutosofertados` (`idProduto`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
