   CREATE DATABASE 'db_usuarios';
   use db_usuarios;
   
   usuario | CREATE TABLE usuario (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `dtnasc` varchar(25) DEFAULT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;