-- Adminer 4.8.1 MySQL 5.5.5-10.5.21-MariaDB-1:10.5.21+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `bd_tenebris`;
CREATE DATABASE `bd_tenebris` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `bd_tenebris`;

DROP TABLE IF EXISTS `tb_avaliacao`;
CREATE TABLE `tb_avaliacao` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `avaliacao` varchar(500) NOT NULL,
  `tb_usuario_id_usuario` int(11) NOT NULL,
  `tb_produto_id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_avaliacao`),
  KEY `tb_usuario_id_usuario` (`tb_usuario_id_usuario`),
  KEY `tb_produto_id_produto` (`tb_produto_id_produto`),
  CONSTRAINT `tb_avaliacao_ibfk_4` FOREIGN KEY (`tb_usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `tb_avaliacao_ibfk_5` FOREIGN KEY (`tb_produto_id_produto`) REFERENCES `tb_produto` (`id_produtos`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_categoria`;
CREATE TABLE `tb_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_categoria` (`id_categoria`, `nome_categoria`) VALUES
(1,	'Cama'),
(3,	'Mesa'),
(4,	'Decoração'),
(5,	'Prataria'),
(6,	'Luminárias'),
(7,	'Móveis'),
(8,	'Utensílios'),
(9,	'Televisor');

DROP TABLE IF EXISTS `tb_nivel_user`;
CREATE TABLE `tb_nivel_user` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_user` int(11) NOT NULL,
  `tb_usuario_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_nivel`),
  KEY `fk_tb_adm_tb_usuario1_idx` (`tb_usuario_id_usuario`),
  CONSTRAINT `tb_nivel_user_ibfk_1` FOREIGN KEY (`tb_usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_nivel_user` (`id_nivel`, `nivel_user`, `tb_usuario_id_usuario`) VALUES
(2,	1,	2);

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE `tb_produto` (
  `id_produtos` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_produto` varchar(10) NOT NULL,
  `nome_produto` varchar(45) NOT NULL,
  `valor_produto` decimal(10,2) NOT NULL,
  `descricao_produto` varchar(900) NOT NULL,
  `imagem_produto` varchar(900) NOT NULL,
  `tb_categoria_id_categoria` int(11) NOT NULL,
  `tb_usuario_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_produtos`),
  KEY `fk_tb_produtos_tb_categoria_idx` (`tb_categoria_id_categoria`),
  KEY `tb_usuario_id_usuario` (`tb_usuario_id_usuario`),
  CONSTRAINT `tb_produto_ibfk_1` FOREIGN KEY (`tb_categoria_id_categoria`) REFERENCES `tb_categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `tb_produto_ibfk_2` FOREIGN KEY (`tb_usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_produto` (`id_produtos`, `codigo_produto`, `nome_produto`, `valor_produto`, `descricao_produto`, `imagem_produto`, `tb_categoria_id_categoria`, `tb_usuario_id_usuario`) VALUES
(1,	'00-0001',	'Tv',	4.00,	'SMART TV  4K, 3 em uma  designe sem bordas e com suporte ',	'./imagens/17002481095af27df81f53a62dc994d8209e2743241700248109.jpg',	9,	2),
(3,	'00-0002',	'Tv',	4.50,	',SMART TV LED FULL HD designe sem bordas',	'./imagens/17002483894ad0dba8386ba7c32eb3279815e1d1aa1700248389.jpg',	9,	2),
(4,	'00-0003',	'Talheres',	2.50,	'Talheres de prata 925',	'./imagens/17002486409b867d8215707b576d709de9e78944761700248640.jpg',	8,	2),
(5,	'00-0004',	'Talheres',	2.00,	'Talheres de aço inox',	'./imagens/17002487430f16be73293325671aac4bf084f164ac1700248743.jpg',	1,	2),
(6,	'00-0005',	'Sofa',	10000.00,	'Sofa acolchoado tamanho familia cinza',	'./imagens/1700249044bcd8ac3c2a8347ab546a73d99bc8ffda1700249044.jpg',	7,	2),
(7,	'00-0006',	'Sofa',	10000.00,	'Sofa acolchoado tamanho familia branco neve',	'./imagens/1700249130c17b3ab3a47f81a0ef369bed00ba20f51700249130.jpg',	1,	2),
(8,	'00-0007',	'Refrigerador',	100.00,	'Refrigerador duas portas, painel de controle deigita com refrigerador de água ',	'./imagens/1700249338268a07d59827ca42ac6a931de541be961700249338.jpg',	7,	2),
(9,	'00-0008',	'Refrigerador',	1001.00,	'Refrigerador duas portas, painel de controle deigita com refrigerador de água  ',	'./imagens/1700249458d87270fa59f66de606343323313de2121700249458.jpg',	7,	2),
(10,	'00-0009',	'Lustre',	20000.00,	'  Lustre de vidro branco',	'./imagens/1700249576f0d17fc8b6dc8254b89abcd0f3a9861c1700249576.webp',	6,	2),
(11,	'00-0010',	'Lustre',	20000.00,	'  Lustre de vidro amarelo ',	'./imagens/1700249603b708eed3e81b85c018786abcb74773ac1700249603.webp',	6,	2),
(12,	'00-0011',	'Prato de porcelana',	5000.00,	'Prato de porcelana azul',	'./imagens/1700249686cb524fed4c329efa4eda313869d277911700249686.jpg',	5,	2),
(13,	'00-0012',	'Prato de porcelana',	5000.00,	'Prato de porcelana verde',	'./imagens/1700249708dc2b4fca0d69308535c79e83e16eca581700249708.jpg',	5,	2),
(14,	'00-0013',	'Prato de porcelana',	5000.00,	'Prato de porcelana branco',	'./imagens/17002497220e76050759afa8942f54c33c269d46f21700249722.jpg',	5,	2),
(15,	'00-0014',	'Mesa de granito ',	1000.00,	' Mesa de granito branco, com cadeiras brancas',	'./imagens/1700249889223437418ef22f9df135adfd04515bff1700249889.jpg',	3,	2),
(16,	'00-0017',	'Mesa de vidro preto',	1000.00,	' Mesa de vidro preto , com cadeiras pretas',	'./imagens/170024993607fa8d8f88771da0df7185f8e7b962441700249936.jpg',	3,	2),
(17,	'00-0015',	'Cama',	1000.00,	'Cama, cama box casal',	'./imagens/1700250115ee0a968cdfc29b3d9e18bd00f7bd1aff1700250115.jpg',	1,	2),
(18,	'00-0016',	'Cama',	1000.00,	'Cama, cama box casal com cabeceira',	'./imagens/1700250164e8f83c14813894c5b120d919673aeb371700250164.jpg',	1,	2),
(19,	'00-0017',	'Candelabro',	20000.00,	'Candelabro de ouro',	'./imagens/1700250284ad6a05f235bc099b8544c444d6803f671700250284.jpg',	8,	2);

DROP TABLE IF EXISTS `tb_produtos_venda`;
CREATE TABLE `tb_produtos_venda` (
  `tb_produtos_id_produtos` int(11) NOT NULL,
  `tb_venda_id_venda` int(11) NOT NULL,
  PRIMARY KEY (`tb_produtos_id_produtos`,`tb_venda_id_venda`),
  KEY `fk_tb_produtos_has_tb_venda_tb_venda1_idx` (`tb_venda_id_venda`),
  KEY `fk_tb_produtos_has_tb_venda_tb_produtos1_idx` (`tb_produtos_id_produtos`),
  CONSTRAINT `tb_produtos_venda_ibfk_1` FOREIGN KEY (`tb_produtos_id_produtos`) REFERENCES `tb_produto` (`id_produtos`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `tb_produtos_venda_ibfk_2` FOREIGN KEY (`tb_venda_id_venda`) REFERENCES `tb_venda` (`id_venda`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_usuario` (`id_usuario`, `nome`, `email`, `dt_nascimento`, `cpf`, `telefone`, `nome_usuario`, `senha`, `endereco`) VALUES
(2,	'João  Paulo',	'joaodamamae@gmail.com',	'2007-03-20',	'08145512309',	'985242070',	'João',	'123joao',	'Rua Brasil');

DROP TABLE IF EXISTS `tb_venda`;
CREATE TABLE `tb_venda` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `data_venda` date NOT NULL,
  `qtd_vendida` varchar(10) NOT NULL,
  `tb_usuario_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_venda`),
  KEY `fk_tb_venda_tb_usuario1_idx` (`tb_usuario_id_usuario`),
  CONSTRAINT `tb_venda_ibfk_1` FOREIGN KEY (`tb_usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- 2023-11-17 19:46:06
