-- MySQL Script corrigido e otimizado
-- gerado: 26 nov 2025
-- Modelo: SIMRD

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema SIMRD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SIMRD`;
USE `SIMRD`;

-- -----------------------------------------------------
-- Table `Credes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Credes` (
  `idCredes` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NULL,
  `senha` VARCHAR(255) NULL,
  PRIMARY KEY (`idCredes`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Table `Secretarias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Secretarias` (
  `idSecretarias` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NULL,
  `senha` VARCHAR(255) NULL,
  `municipio` VARCHAR(45) NULL,
  PRIMARY KEY (`idSecretarias`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Table `Status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Status` (
  `idStatus` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=InnoDB;
INSERT INTO `status`(`idStatus`, `nome`) VALUES (0, 'Pendente');
INSERT INTO `status`(`idStatus`, `nome`) VALUES (1, 'Em execução');
INSERT INTO `status`(`idStatus`, `nome`) VALUES (2, 'Concluídos');
INSERT INTO `status`(`idStatus`, `nome`) VALUES (3, 'Planejado');
INSERT INTO `status`(`idStatus`, `nome`) VALUES (4, 'Replanejado');
INSERT INTO `status`(`idStatus`, `nome`) VALUES (5, 'Realizada no prazo');
INSERT INTO `status`(`idStatus`, `nome`) VALUES (6, 'Não realizada');
-- -----------------------------------------------------
-- Table `Componente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Componente` (
  `idComponente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idComponente`)
) ENGINE=InnoDB;
INSERT INTO `componente` (`idComponente`, `nome`) VALUES (NULL, 'Língua Portuguesa');
INSERT INTO `componente` (`idComponente`, `nome`) VALUES (NULL, 'Português');
-- -----------------------------------------------------
-- Table `Serie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Serie` (
  `idSerie` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idSerie`)
) ENGINE=InnoDB;
INSERT INTO `serie`(`idSerie`, `nome`) VALUES ( NULL,'1°');
INSERT INTO `serie`(`idSerie`, `nome`) VALUES ( NULL,'2°');
INSERT INTO `serie`(`idSerie`, `nome`) VALUES ( NULL,'3°');
INSERT INTO `serie`(`idSerie`, `nome`) VALUES ( NULL,'4°');
INSERT INTO `serie`(`idSerie`, `nome`) VALUES ( NULL,'5°');
INSERT INTO `serie`(`idSerie`, `nome`) VALUES ( NULL,'6°');
INSERT INTO `serie`(`idSerie`, `nome`) VALUES ( NULL,'7°');
INSERT INTO `serie`(`idSerie`, `nome`) VALUES ( NULL,'8°');
INSERT INTO `serie`(`idSerie`, `nome`) VALUES ( NULL,'9°');

-- -----------------------------------------------------
-- Table `Tarefa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Tarefa` (
  `idTarefa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `responsavel` VARCHAR(45) NULL,
  `componente` INT NULL,
  `serie` INT NULL,
  `status` INT NULL,
  `data_inicial` DATETIME NULL,
  `data_final` DATETIME NULL,
  PRIMARY KEY (`idTarefa`),
  INDEX `fk_Tarefa_Status_idx` (`status` ASC) VISIBLE,
  INDEX `fk_Tarefa_Componente_idx` (`componente` ASC) VISIBLE,
  INDEX `fk_Tarefa_Serie_idx` (`serie` ASC) VISIBLE,
  CONSTRAINT `fk_Tarefa_Status`
    FOREIGN KEY (`status`)
    REFERENCES `Status` (`idStatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tarefa_Componente`
    FOREIGN KEY (`componente`)
    REFERENCES `Componente` (`idComponente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tarefa_Serie`
    FOREIGN KEY (`serie`)
    REFERENCES `Serie` (`idSerie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Table `Ciclo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ciclo` (
  `idCiclo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idCiclo`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Table `Avaliacao_formativa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Avaliacao_formativa` (
  `idAvaliacao_formativa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`idAvaliacao_formativa`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Table `Planos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Planos` (
  `idPlanos` INT NOT NULL AUTO_INCREMENT,
  `previstos` VARCHAR(45) NULL,
  `defasagem` VARCHAR(45) NULL,
  `avaliados` VARCHAR(45) NULL,
  `reducao` VARCHAR(45) NULL,
  `status` INT NULL,
  `avaliacao` INT NULL,
  `ciclo` INT NULL,
  `componente` INT NULL,
  `serie` INT NULL,
  PRIMARY KEY (`idPlanos`),
  INDEX `fk_Planos_Status_idx` (`status` ASC) VISIBLE,
  INDEX `fk_Planos_Ciclo_idx` (`ciclo` ASC) VISIBLE,
  INDEX `fk_Planos_Avaliacao_idx` (`avaliacao` ASC) VISIBLE,
  INDEX `fk_Planos_Componente_idx` (`componente` ASC) VISIBLE,
  INDEX `fk_Planos_Serie_idx` (`serie` ASC) VISIBLE,
  CONSTRAINT `fk_Planos_Status`
    FOREIGN KEY (`status`)
    REFERENCES `Status` (`idStatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Planos_Ciclo`
    FOREIGN KEY (`ciclo`)
    REFERENCES `Ciclo` (`idCiclo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Planos_Avaliacao`
    FOREIGN KEY (`avaliacao`)
    REFERENCES `Avaliacao_formativa` (`idAvaliacao_formativa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Planos_Serie`
    FOREIGN KEY (`serie`)
    REFERENCES `Serie` (`idSerie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Planos_Componente`
    FOREIGN KEY (`componente`)
    REFERENCES `Componente` (`idComponente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Table `Escolas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Escolas` (
  `idEscolas` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `inep` VARCHAR(45) NULL,
  `senha` VARCHAR(255) NULL,
  `municipio` VARCHAR(45) NULL,
  `localidade` VARCHAR(45) NULL,
  `tarefa` INT NULL,
  `planos` INT NULL,
  PRIMARY KEY (`idEscolas`),
  INDEX `fk_Escolas_Tarefa_idx` (`tarefa` ASC) VISIBLE,
  INDEX `fk_Escolas_Planos_idx` (`planos` ASC) VISIBLE,
  CONSTRAINT `fk_Escolas_Tarefa`
    FOREIGN KEY (`tarefa`)
    REFERENCES `Tarefa` (`idTarefa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Escolas_Planos`
    FOREIGN KEY (`planos`)
    REFERENCES `Planos` (`idPlanos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Secretaria_Escola_Tarefa ( 
  id_secretaria_escola_plano INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_secretarias INT NOT NULL,
  id_escolas INT NOT NULL
  id_tarefa INT NOT NULL,
  FOREIGN KEY (id_secretarias) REFERENCES Secretarias(idSecretarias) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_escolas) REFERENCES Escolas(idEscolas) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_tarefa) REFERENCES Tarefa(idTarefa) ON DELETE CASCADE ON UPDATE CASCADE
)
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
