-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema id2961679_alquiler
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema id2961679_alquiler
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `id2961679_alquiler` DEFAULT CHARACTER SET utf8 ;
USE `id2961679_alquiler` ;

-- -----------------------------------------------------
-- Table `id2961679_alquiler`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id2961679_alquiler`.`departamentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `descripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id2961679_alquiler`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id2961679_alquiler`.`provincia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `descripcion` VARCHAR(100) NULL,
  `iddepartamento` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `prov.depa_idx` (`iddepartamento` ASC),
  CONSTRAINT `prov.depa`
    FOREIGN KEY (`iddepartamento`)
    REFERENCES `id2961679_alquiler`.`departamentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id2961679_alquiler`.`distrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id2961679_alquiler`.`distrito` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `descripcion` VARCHAR(100) NULL,
  `idprovincia` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `dist.prov_idx` (`idprovincia` ASC),
  CONSTRAINT `dist.prov`
    FOREIGN KEY (`idprovincia`)
    REFERENCES `id2961679_alquiler`.`provincia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id2961679_alquiler`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id2961679_alquiler`.`tipousuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id2961679_alquiler`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id2961679_alquiler`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `contrasena` VARCHAR(45) NULL,
  `fotografia` VARCHAR(45) NULL,
  `idtipousuario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `usua.tipou_idx` (`idtipousuario` ASC),
  CONSTRAINT `usua.tipou`
    FOREIGN KEY (`idtipousuario`)
    REFERENCES `id2961679_alquiler`.`tipousuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id2961679_alquiler`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id2961679_alquiler`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dni` VARCHAR(8) NULL,
  `apepater` VARCHAR(45) NULL,
  `apemater` VARCHAR(45) NULL,
  `nombres` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `iddistrito` INT NULL,
  `idusuario` INT NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `clie.dist_idx` (`iddistrito` ASC),
  INDEX `clie,usua_idx` (`idusuario` ASC),
  CONSTRAINT `clie.dist`
    FOREIGN KEY (`iddistrito`)
    REFERENCES `id2961679_alquiler`.`distrito` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `clie,usua`
    FOREIGN KEY (`idusuario`)
    REFERENCES `id2961679_alquiler`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id2961679_alquiler`.`campo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id2961679_alquiler`.`campo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `tamano` VARCHAR(45) NULL,
  `lugar` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id2961679_alquiler`.`registro_campo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id2961679_alquiler`.`registro_campo` (
  `campo_id` INT NOT NULL,
  `cliente_id` INT NOT NULL,
  `fecha` DATE NULL,
  PRIMARY KEY (`campo_id`, `cliente_id`),
  INDEX `fk_campo_has_cliente_cliente1_idx` (`cliente_id` ASC),
  INDEX `fk_campo_has_cliente_campo1_idx` (`campo_id` ASC),
  CONSTRAINT `fk_campo_has_cliente_campo1`
    FOREIGN KEY (`campo_id`)
    REFERENCES `id2961679_alquiler`.`campo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_campo_has_cliente_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `id2961679_alquiler`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
-- begin attached script 'script'
use id2961679_alquiler;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
    `id` VARCHAR(128) NOT NULL,
    `ip_address` VARCHAR(45) NOT NULL,
    `timestamp` INT(10) UNSIGNED DEFAULT 0 NOT NULL,
    `data` BLOB NOT NULL,
    KEY `ci_sessions_timestamp` (`timestamp`)
);
-- end attached script 'script'

-- -----------------------------------------------------
-- Data for table `id2961679_alquiler`.`departamentos`
-- -----------------------------------------------------
START TRANSACTION;
USE `id2961679_alquiler`;
INSERT INTO `id2961679_alquiler`.`departamentos` (`id`, `nombre`, `descripcion`) VALUES (1, 'LIMA', 'LIMA');

COMMIT;


-- -----------------------------------------------------
-- Data for table `id2961679_alquiler`.`provincia`
-- -----------------------------------------------------
START TRANSACTION;
USE `id2961679_alquiler`;
INSERT INTO `id2961679_alquiler`.`provincia` (`id`, `nombre`, `descripcion`, `iddepartamento`) VALUES (1, 'LIMA', 'LIMA', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `id2961679_alquiler`.`distrito`
-- -----------------------------------------------------
START TRANSACTION;
USE `id2961679_alquiler`;
INSERT INTO `id2961679_alquiler`.`distrito` (`id`, `nombre`, `descripcion`, `idprovincia`) VALUES (1, 'LIMA', 'LIMA', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `id2961679_alquiler`.`tipousuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `id2961679_alquiler`;
INSERT INTO `id2961679_alquiler`.`tipousuario` (`id`, `nombre`, `descripcion`) VALUES (1, 'ADMINISTRADOR', 'ADMINISTRADOR');
INSERT INTO `id2961679_alquiler`.`tipousuario` (`id`, `nombre`, `descripcion`) VALUES (2, 'CLIENTE', 'CLIENTE');

COMMIT;


-- -----------------------------------------------------
-- Data for table `id2961679_alquiler`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `id2961679_alquiler`;
INSERT INTO `id2961679_alquiler`.`usuario` (`id`, `nombre`, `contrasena`, `fotografia`, `idtipousuario`) VALUES (1, 'ADMIN', 'ADMIN', '/imagenes/default.png', 1);

COMMIT;

