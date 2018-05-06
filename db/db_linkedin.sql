-- MySQL Script generated by MySQL Workbench
-- Sat May  5 11:25:37 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_linkedin
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_linkedin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_linkedin` DEFAULT CHARACTER SET utf8 ;
USE `db_linkedin` ;

-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_generos` (
  `codigo_genero` INT NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo_genero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_usuarios` (
  `codigo_usuario` INT NOT NULL AUTO_INCREMENT,
  `codigo_genero` INT NOT NULL,
  `nombre_usuario` VARCHAR(45) NULL,
  `apellido_usuario` VARCHAR(45) NULL,
  `correo` VARCHAR(100) NULL,
  `contrasena` VARCHAR(45) NULL,
  `url_imagen_perfil` VARCHAR(45) NULL,
  `titular` VARCHAR(45) NULL,
  `educacion` VARCHAR(45) NULL,
  `logros` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo_usuario`),
  INDEX `fk_tbl_usuarios_tbl_generos1_idx` (`codigo_genero` ASC),
  CONSTRAINT `fk_tbl_usuarios_tbl_generos1`
    FOREIGN KEY (`codigo_genero`)
    REFERENCES `db_linkedin`.`tbl_generos` (`codigo_genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_publicaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_publicaciones` (
  `codigo_publicacion` INT NOT NULL AUTO_INCREMENT,
  `codigo_usuario` INT NOT NULL,
  `contenido_publicacion` VARCHAR(45) NULL,
  `numero_likes` VARCHAR(45) NULL,
  `fecha-publicacion` VARCHAR(45) NULL,
  `ubicacion` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo_publicacion`),
  INDEX `fk_tbl_publicaciones_tbl_usuarios_idx` (`codigo_usuario` ASC),
  CONSTRAINT `fk_tbl_publicaciones_tbl_usuarios`
    FOREIGN KEY (`codigo_usuario`)
    REFERENCES `db_linkedin`.`tbl_usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_comentarios` (
  `codigo_comentario` INT NOT NULL AUTO_INCREMENT,
  `codigo_usuario` INT NOT NULL,
  `codigo_publicacion` INT NOT NULL,
  `fecha_comentario` VARCHAR(45) NULL,
  `contenido_comentario` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo_comentario`),
  INDEX `fk_tbl_comentarios_tbl_publicaciones1_idx` (`codigo_publicacion` ASC),
  INDEX `fk_tbl_comentarios_tbl_usuarios1_idx` (`codigo_usuario` ASC),
  CONSTRAINT `fk_tbl_comentarios_tbl_publicaciones1`
    FOREIGN KEY (`codigo_publicacion`)
    REFERENCES `db_linkedin`.`tbl_publicaciones` (`codigo_publicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_comentarios_tbl_usuarios1`
    FOREIGN KEY (`codigo_usuario`)
    REFERENCES `db_linkedin`.`tbl_usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_empleos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_empleos` (
  `codigo_empleo` INT NOT NULL AUTO_INCREMENT,
  `nombre_empleo` VARCHAR(45) NULL,
  `descripcion_empleo` VARCHAR(500) NULL,
  `telefono_empleo` VARCHAR(45) NULL,
  `direccion_empleo` VARCHAR(200) NULL,
  PRIMARY KEY (`codigo_empleo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_mensajes` (
  `codigo_mensaje` INT NOT NULL AUTO_INCREMENT,
  `contenido_mensaje` VARCHAR(45) NULL,
  `fecha_mensaje` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo_mensaje`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_mensajes_amigos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_mensajes_amigos` (
  `codigo_mensaje_amigo` INT NOT NULL,
  `codigo_usuario_amigo` INT NOT NULL,
  PRIMARY KEY (`codigo_mensaje_amigo`, `codigo_usuario_amigo`),
  INDEX `fk_tbl_mensajes_has_tbl_usuarios_tbl_usuarios1_idx` (`codigo_usuario_amigo` ASC),
  INDEX `fk_tbl_mensajes_has_tbl_usuarios_tbl_mensajes1_idx` (`codigo_mensaje_amigo` ASC),
  CONSTRAINT `fk_tbl_mensajes_has_tbl_usuarios_tbl_mensajes1`
    FOREIGN KEY (`codigo_mensaje_amigo`)
    REFERENCES `db_linkedin`.`tbl_mensajes` (`codigo_mensaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_mensajes_has_tbl_usuarios_tbl_usuarios1`
    FOREIGN KEY (`codigo_usuario_amigo`)
    REFERENCES `db_linkedin`.`tbl_usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_amigos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_amigos` (
  `codigo_usuario_amigo` INT NOT NULL,
  `codigo_usuario` INT NOT NULL,
  PRIMARY KEY (`codigo_usuario_amigo`, `codigo_usuario`),
  INDEX `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios2_idx` (`codigo_usuario` ASC),
  INDEX `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios1_idx` (`codigo_usuario_amigo` ASC),
  CONSTRAINT `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios1`
    FOREIGN KEY (`codigo_usuario_amigo`)
    REFERENCES `db_linkedin`.`tbl_usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios2`
    FOREIGN KEY (`codigo_usuario`)
    REFERENCES `db_linkedin`.`tbl_usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_empleos_guardados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_empleos_guardados` (
  `codigo_empleo_guardado` INT NOT NULL,
  `codigo_usuario` INT NOT NULL,
  PRIMARY KEY (`codigo_empleo_guardado`, `codigo_usuario`),
  INDEX `fk_tbl_empleos_has_tbl_usuarios_tbl_usuarios1_idx` (`codigo_usuario` ASC),
  INDEX `fk_tbl_empleos_has_tbl_usuarios_tbl_empleos1_idx` (`codigo_empleo_guardado` ASC),
  CONSTRAINT `fk_tbl_empleos_has_tbl_usuarios_tbl_empleos1`
    FOREIGN KEY (`codigo_empleo_guardado`)
    REFERENCES `db_linkedin`.`tbl_empleos` (`codigo_empleo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_empleos_has_tbl_usuarios_tbl_usuarios1`
    FOREIGN KEY (`codigo_usuario`)
    REFERENCES `db_linkedin`.`tbl_usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_linkedin`.`tbl_chats`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_linkedin`.`tbl_chats` (
  `codigo_chat` INT NOT NULL AUTO_INCREMENT,
  `codigo_usuario` INT NOT NULL,
  PRIMARY KEY (`codigo_chat`),
  INDEX `fk_tbl_chats_tbl_usuarios1_idx` (`codigo_usuario` ASC),
  CONSTRAINT `fk_tbl_chats_tbl_usuarios1`
    FOREIGN KEY (`codigo_usuario`)
    REFERENCES `db_linkedin`.`tbl_usuarios` (`codigo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
