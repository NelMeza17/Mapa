SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `locatienda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `locatienda` ;

-- -----------------------------------------------------
-- Table `locatienda`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locatienda`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT ,
  `user` VARCHAR(50) NOT NULL ,
  `password` VARCHAR(100) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`iduser`) ,
  UNIQUE INDEX `user_UNIQUE` (`user` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locatienda`.`tienda`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locatienda`.`tienda` (
  `idtienda` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  `calle` VARCHAR(30) NOT NULL ,
  `colonia` VARCHAR(25) NOT NULL ,
  `numero` VARCHAR(10) NOT NULL ,
  `telefono` VARCHAR(15) NULL ,
  `latitud` VARCHAR(45) NOT NULL ,
  `longitud` VARCHAR(45) NOT NULL ,
  `imagen` TEXT NOT NULL ,
  `iduser` INT NOT NULL ,
  PRIMARY KEY (`idtienda`) ,
  INDEX `fk_tienda_user1_idx` (`iduser` ASC) ,
  CONSTRAINT `fk_tienda_user1`
    FOREIGN KEY (`iduser` )
    REFERENCES `locatienda`.`user` (`iduser` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locatienda`.`productos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locatienda`.`productos` (
  `idtienda` INT NOT NULL ,
  `nombre` VARCHAR(30) NOT NULL ,
  `precio` VARCHAR(15) NOT NULL ,
  CONSTRAINT `fk_productos_tienda`
    FOREIGN KEY (`idtienda` )
    REFERENCES `locatienda`.`tienda` (`idtienda` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locatienda`.`comentarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locatienda`.`comentarios` (
  `idcomentarios` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `fecha` DATE NOT NULL ,
  `comentario` TEXT NOT NULL ,
  PRIMARY KEY (`idcomentarios`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
