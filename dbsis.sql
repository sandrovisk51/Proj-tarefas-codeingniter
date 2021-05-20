/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50725
Source Host           : localhost:3306
Source Database       : dbsis

Target Server Type    : MYSQL
Target Server Version : 50725
File Encoding         : 65001

Date: 2021-05-16 22:16:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_categorias`
-- ----------------------------
DROP TABLE IF EXISTS `tb_categorias`;
CREATE TABLE `tb_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_categorias
-- ----------------------------
INSERT INTO `tb_categorias` VALUES ('1', 'Manutenção');
INSERT INTO `tb_categorias` VALUES ('2', 'Limpeza');
INSERT INTO `tb_categorias` VALUES ('3', 'Reforma');
INSERT INTO `tb_categorias` VALUES ('4', 'Reposição');
INSERT INTO `tb_categorias` VALUES ('5', 'Separação');
INSERT INTO `tb_categorias` VALUES ('6', 'Retirada');
INSERT INTO `tb_categorias` VALUES ('7', 'Devolução');
INSERT INTO `tb_categorias` VALUES ('8', 'Entrega');

-- ----------------------------
-- Table structure for `tb_responsaveis`
-- ----------------------------
DROP TABLE IF EXISTS `tb_responsaveis`;
CREATE TABLE `tb_responsaveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `res_descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_responsaveis
-- ----------------------------
INSERT INTO `tb_responsaveis` VALUES ('1', 'Sandro Ferreira');
INSERT INTO `tb_responsaveis` VALUES ('2', 'Silvano Melo');
INSERT INTO `tb_responsaveis` VALUES ('3', 'Renata Souza');
INSERT INTO `tb_responsaveis` VALUES ('4', 'Marcos Barros');
INSERT INTO `tb_responsaveis` VALUES ('5', 'Camila Pereira');

-- ----------------------------
-- Table structure for `tb_tarefas`
-- ----------------------------
DROP TABLE IF EXISTS `tb_tarefas`;
CREATE TABLE `tb_tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tar_descricao` varchar(200) NOT NULL,
  `res_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tar_data_finalizacao` date NOT NULL,
  `tar_data_criacao` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `tar_data_atualizacao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_tarefas
-- ----------------------------
INSERT INTO `tb_tarefas` VALUES ('1', 'teste tarefas', '1', '1', '2021-05-15', '2021-05-15 00:07:12', null);



-- ----------------------------
-- Table structure for `tb_usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(50) NOT NULL,
  `usu_email` varchar(150) NOT NULL,
  `usu_senha` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_usuarios
-- ----------------------------
INSERT INTO `tb_usuarios` VALUES ('1', 'Tarefa', 'usuario@teste.com.br', '$2y$10$t.ZKC3obGCT88clFS.Zu3u/1bYzcJgOpJt9uM.YaR/AU0/3tsxkvK');
