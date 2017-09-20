SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema museodb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `museodb`;
-- -----------------------------------------------------
-- Schema museodb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `museodb` DEFAULT CHARACTER SET utf8 ;
USE `museodb` ;

-- -----------------------------------------------------
-- Table `museodb`.`EMPLOYEES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`EMPLOYEES` (
  `employeeNumber` INT(4) NOT NULL AUTO_INCREMENT,
  `employeeName` VARCHAR(50) NOT NULL,
  `employeeType` INT(1) NOT NULL,
  `shiftStart` DATETIME NOT NULL,
  `shiftEnd` DATETIME NOT NULL,
  `contactNumber` VARCHAR(15) NOT NULL,
  `emailAddress` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`employeeNumber`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`ACCOUNTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`ACCOUNTS` (
  `employeeNumber` INT(4) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(200) NOT NULL,
  `userType` INT(1) NOT NULL,
  PRIMARY KEY (`employeeNumber`),
  CONSTRAINT `fk_accounts_employees1`
    FOREIGN KEY (`employeeNumber`)
    REFERENCES `museodb`.`EMPLOYEES` (`employeeNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`ARTIFACTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`ARTIFACTS` (
  `artifactCode` INT(4) NOT NULL AUTO_INCREMENT,
  `artifactName` VARCHAR(50) NOT NULL,
  `artifactStatus` INT(2) NOT NULL,
  `quantity` INT(3) NOT NULL,
  `location` INT(2) NOT NULL,
  `modeOfAcquisition` INT(1) NOT NULL,
  `acquisitionDate` DATETIME NOT NULL,
  `comments` VARCHAR(1000) NOT NULL,
  `artifactImagePath` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`artifactCode`))
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`FORMS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`FORMS` (
  `formCode` INT(4) NOT NULL AUTO_INCREMENT,
  `artifactCode` INT(4) NOT NULL,
  `patronName` VARCHAR(50) NOT NULL,
  `dateReceived` DATETIME NOT NULL,
  `formFilePath` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`formCode`, `artifactCode`),
  INDEX `fk_forms_artifacts1_idx` (`artifactCode` ASC),
  CONSTRAINT `fk_forms_artifacts1`
    FOREIGN KEY (`artifactCode`)
    REFERENCES `museodb`.`ARTIFACTS` (`artifactCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`OUTSOURCING`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`OUTSOURCING` (
  `companyCode` INT(4) NOT NULL AUTO_INCREMENT,
  `companyName` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`companyCode`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`REPAIRSCHEDULES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`REPAIRSCHEDULES` (
  `repairCode` INT(4) NOT NULL AUTO_INCREMENT,
  `artifactCode` INT(4) NOT NULL,
  `status` INT(1) NOT NULL,
  `startDate` DATETIME NOT NULL,
  `endDate` DATETIME NOT NULL,
  `reasonForRepair` VARCHAR(100) NOT NULL,
  `finishedDate` DATETIME NULL DEFAULT NULL,
  `repairType` INT(1) NOT NULL DEFAULT '1',
  `author` INT(4) NOT NULL,
  PRIMARY KEY (`repairCode`, `artifactCode`),
  INDEX `fk_repairSchedules_artifacts1_idx` (`artifactCode` ASC),
  CONSTRAINT `fk_repairSchedules_artifacts1`
    FOREIGN KEY (`artifactCode`)
    REFERENCES `museodb`.`ARTIFACTS` (`artifactCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 54
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`TAGS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`TAGS` (
  `tagCode` INT(4) NOT NULL AUTO_INCREMENT,
  `tagName` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`tagCode`))
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`artifacttags`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`artifacttags` (
  `tagCode` INT(4) NOT NULL,
  `artifactCode` INT(4) NOT NULL,
  PRIMARY KEY (`tagCode`, `artifactCode`),
  INDEX `fk_artifactTags_artifacts1_idx` (`artifactCode` ASC),
  CONSTRAINT `fk_artifactTags_artifacts1`
    FOREIGN KEY (`artifactCode`)
    REFERENCES `museodb`.`ARTIFACTS` (`artifactCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_artifactTags_tags1`
    FOREIGN KEY (`tagCode`)
    REFERENCES `museodb`.`TAGS` (`tagCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`deaccession`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`deaccession` (
  `artifactCode` INT(4) NOT NULL,
  `dateOfAccession` DATETIME NOT NULL,
  `reasonsForDisposal` VARCHAR(1000) NOT NULL,
  `modeOfDisposal` INT(1) NOT NULL,
  `comments` VARCHAR(1000) NULL DEFAULT NULL,
  PRIMARY KEY (`artifactCode`),
  CONSTRAINT `fk_deaccession_artifacts1`
    FOREIGN KEY (`artifactCode`)
    REFERENCES `museodb`.`ARTIFACTS` (`artifactCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`employeetags`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`employeetags` (
  `tagCode` INT(4) NOT NULL,
  `employeeNumber` INT(4) NOT NULL,
  PRIMARY KEY (`tagCode`, `employeeNumber`),
  INDEX `fk_employeeTags_employees1_idx` (`employeeNumber` ASC),
  CONSTRAINT `fk_employeeTags_employees1`
    FOREIGN KEY (`employeeNumber`)
    REFERENCES `museodb`.`EMPLOYEES` (`employeeNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employeeTags_tags1`
    FOREIGN KEY (`tagCode`)
    REFERENCES `museodb`.`TAGS` (`tagCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`outsourcingtags`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`outsourcingtags` (
  `tagCode` INT(4) NOT NULL,
  `companyCode` INT(4) NOT NULL,
  PRIMARY KEY (`tagCode`, `companyCode`),
  INDEX `fk_outsourcingTags_outsourcing1_idx` (`companyCode` ASC),
  CONSTRAINT `fk_outsourcingTags_outsourcing1`
    FOREIGN KEY (`companyCode`)
    REFERENCES `museodb`.`OUTSOURCING` (`companyCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_outsourcingTags_tags1`
    FOREIGN KEY (`tagCode`)
    REFERENCES `museodb`.`TAGS` (`tagCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`repairdetails`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`repairdetails` (
  `repairCode` INT(4) NOT NULL,
  `employeeNumber` INT(4) NULL DEFAULT NULL,
  `companyCode` INT(4) NULL DEFAULT NULL,
  INDEX `fk_repairSchedules_has_employees_employees1_idx` (`employeeNumber` ASC),
  INDEX `fk_repairSchedules_has_employees_repairSchedules1_idx` (`repairCode` ASC),
  INDEX `fk_repairDetails_outsourcing1_idx` (`companyCode` ASC),
  CONSTRAINT `fk_repairDetails_outsourcing1`
    FOREIGN KEY (`companyCode`)
    REFERENCES `museodb`.`OUTSOURCING` (`companyCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_repairSchedules_has_employees_employees1`
    FOREIGN KEY (`employeeNumber`)
    REFERENCES `museodb`.`EMPLOYEES` (`employeeNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_repairSchedules_has_employees_repairSchedules1`
    FOREIGN KEY (`repairCode`)
    REFERENCES `museodb`.`REPAIRSCHEDULES` (`repairCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`repairremarks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`repairremarks` (
  `repairCode` INT(4) NOT NULL,
  `remStatus` INT(1) NOT NULL,
  `remarks` TEXT NOT NULL,
  PRIMARY KEY (`repairCode`),
  INDEX `fk_repairRemarks_repairSchedules1_idx` (`repairCode` ASC),
  CONSTRAINT `fk_repairRemarks_repairSchedules1`
    FOREIGN KEY (`repairCode`)
    REFERENCES `museodb`.`REPAIRSCHEDULES` (`repairCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`tally`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`tally` (
  `n` INT(11) NOT NULL,
  PRIMARY KEY (`n`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `museodb`.`tallymonth`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `museodb`.`tallymonth` (
  `n` INT(11) NOT NULL,
  PRIMARY KEY (`n`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
