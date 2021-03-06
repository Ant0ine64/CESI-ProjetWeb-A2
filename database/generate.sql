-- MySQL Script generated by MySQL Workbench
-- mar. 09 mars 2021 10:32:19
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema projet_web
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projet_web
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projet_web` ;
USE `projet_web` ;

-- -----------------------------------------------------
-- Table `projet_web`.`type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`type` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`type` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`center`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`center` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`center` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `city` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`user` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `id_type` INT NOT NULL,
  `id_center` INT NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `password_hash` CHAR(64) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_type_idx` (`id_type` ASC) ,
  INDEX `fk_user_center_idx` (`id_center` ASC) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  CONSTRAINT `fk_user_type`
    FOREIGN KEY (`id_type`)
    REFERENCES `projet_web`.`type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_center`
    FOREIGN KEY (`id_center`)
    REFERENCES `projet_web`.`center` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`company`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`company` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`company` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  `activity_sector` VARCHAR(45) NOT NULL,
  `interns_number` INT NOT NULL,
  `displayed` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`offer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`offer` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`offer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_company` INT NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `competences` VARCHAR(90) NOT NULL,
  `date` DATE NOT NULL,
  `duration` TIME NOT NULL,
  `remuneration` FLOAT NOT NULL,
  `slots` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_offer_company_idx` (`id_company` ASC) ,
  CONSTRAINT `fk_offer_company`
    FOREIGN KEY (`id_company`)
    REFERENCES `projet_web`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`promo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`promo` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`promo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `year` DATE NOT NULL,
  `speciality` VARCHAR(45) NOT NULL,
  `id_center` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_promo_center_idx` (`id_center` ASC) ,
  CONSTRAINT `fk_promo_center`
    FOREIGN KEY (`id_center`)
    REFERENCES `projet_web`.`center` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`promo_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`promo_user` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`promo_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_promo` INT NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_promo_user_idx` (`id_user` ASC) ,
  INDEX `fk_promo_promo_idx` (`id_promo` ASC) ,
  CONSTRAINT `fk_promo_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `projet_web`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_promo_promo`
    FOREIGN KEY (`id_promo`)
    REFERENCES `projet_web`.`promo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`notation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`notation` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`notation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_company` INT NOT NULL,
  `id_user` INT NOT NULL,
  `grade` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notation_company_idx` (`id_company` ASC) ,
  INDEX `fk_notation_user_idx` (`id_user` ASC) ,
  CONSTRAINT `fk_notation_company`
    FOREIGN KEY (`id_company`)
    REFERENCES `projet_web`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notation_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `projet_web`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`wishlist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`wishlist` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`wishlist` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NOT NULL,
  `id_offer` INT NOT NULL,
  `state` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wishlist_user_idx` (`id_user` ASC) ,
  INDEX `fk_wishlist_offer_idx` (`id_offer` ASC) ,
  CONSTRAINT `fk_wishlist_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `projet_web`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wishlist_offer`
    FOREIGN KEY (`id_offer`)
    REFERENCES `projet_web`.`offer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`offer_promo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`offer_promo` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`offer_promo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_promo` INT NOT NULL,
  `id_offer` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_offer_idx` (`id_offer` ASC) ,
  INDEX `fk_promo_idx` (`id_promo` ASC) ,
  CONSTRAINT `fk_offer`
    FOREIGN KEY (`id_offer`)
    REFERENCES `projet_web`.`offer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_promo`
    FOREIGN KEY (`id_promo`)
    REFERENCES `projet_web`.`promo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`permission` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`permission` (
  `id` INT NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`permission_custom`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`permission_custom` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`permission_custom` (
  `id_permission` INT NOT NULL,
  `id_user` INT NOT NULL,
  INDEX `fk_permission_delegue_perm_idx` (`id_permission` ASC) ,
  INDEX `fk_permission_delegue_user_idx` (`id_user` ASC) ,
  CONSTRAINT `fk_permission_delegue_perm`
    FOREIGN KEY (`id_permission`)
    REFERENCES `projet_web`.`permission` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permission_delegue_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `projet_web`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_web`.`permission_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projet_web`.`permission_type` ;

CREATE TABLE IF NOT EXISTS `projet_web`.`permission_type` (
  `id_type` INT NOT NULL,
  `id_permission` INT NOT NULL,
  INDEX `fk_permission_type_permission_idx` (`id_permission` ASC) ,
  CONSTRAINT `fk_permission_type_type`
    FOREIGN KEY (`id_type`)
    REFERENCES `projet_web`.`type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permission_type_permission`
    FOREIGN KEY (`id_permission`)
    REFERENCES `projet_web`.`permission` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
