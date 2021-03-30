-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema gesttor
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gesttor
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gesttor` DEFAULT CHARACTER SET utf8mb4 ;
USE `gesttor` ;

-- -----------------------------------------------------
-- Table `gesttor`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gesttor`.`clients` (
  `idclients` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `phone` DOUBLE NOT NULL,
  `email` VARCHAR(100) NULL,
  `telephone` DOUBLE NULL,
  `street` VARCHAR(50) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `cep` DOUBLE NULL,
  `district` VARCHAR(45) NOT NULL,
  `state` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idclients`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gesttor`.`equipments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gesttor`.`equipments` (
  `idequipments` INT NOT NULL AUTO_INCREMENT,
  `model` VARCHAR(45) NULL,
  `brand` VARCHAR(45) NULL,
  `serialnumber` VARCHAR(45) NULL,
  `characteristcs` VARCHAR(45) NULL,
  `notes` VARCHAR(200) NULL,
  `registrationDate` DATE NULL,
  `category` VARCHAR(45) NULL,
  `clients_idclients` INT NOT NULL,
  PRIMARY KEY (`idequipments`),
  INDEX `fk_equipments_clients1_idx` (`clients_idclients` ASC) VISIBLE,
  CONSTRAINT `fk_equipments_clients1`
    FOREIGN KEY (`clients_idclients`)
    REFERENCES `gesttor`.`clients` (`idclients`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';


-- -----------------------------------------------------
-- Table `gesttor`.`services`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gesttor`.`services` (
  `idservices` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `price` DOUBLE NULL,
  PRIMARY KEY (`idservices`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gesttor`.`tagService`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gesttor`.`tagService` (
  `idtagService` INT NOT NULL,
  `date` DATE NULL,
  `description` VARCHAR(200) NULL,
  `category` VARCHAR(45) NULL,
  `solution` VARCHAR(200) NULL,
  `status` INT NULL,
  `services_idservices` INT NOT NULL,
  `clients_idclients` INT NOT NULL,
  `equipments_idequipments` INT NOT NULL,
  PRIMARY KEY (`idtagService`),
  INDEX `fk_tagService_services_idx` (`services_idservices` ASC) VISIBLE,
  INDEX `fk_tagService_clients1_idx` (`clients_idclients` ASC) VISIBLE,
  INDEX `fk_tagService_equipments1_idx` (`equipments_idequipments` ASC) VISIBLE,
  CONSTRAINT `fk_tagService_services`
    FOREIGN KEY (`services_idservices`)
    REFERENCES `gesttor`.`services` (`idservices`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tagService_clients1`
    FOREIGN KEY (`clients_idclients`)
    REFERENCES `gesttor`.`clients` (`idclients`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tagService_equipments1`
    FOREIGN KEY (`equipments_idequipments`)
    REFERENCES `gesttor`.`equipments` (`idequipments`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
