CREATE TABLE `Erabiltzaileak` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`erabiltzailea` varchar(30) NOT NULL,
	`pasahitza` varchar(20) NOT NULL,
	`izena` varchar(30) NOT NULL,
	`abizena` varchar(40) NOT NULL,
	`erabiltzaileMota` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Arloak` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`arloa` varchar(30) NOT NULL,
	`maila` INT(20) NOT NULL,
	`informazioa` varchar(255) NOT NULL,
	PRIMARY KEY (`id`,`maila`)
);

CREATE TABLE `Postuak` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`postua` varchar(30) NOT NULL,
	`informazioa` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Feedbacka` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`data` DATE NOT NULL,
	`erabiltzailea` INT NOT NULL,
	`postuak` INT NOT NULL,
	PRIMARY KEY (`id`,`data`)
);

CREATE TABLE `Postua` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`data` DATE NOT NULL,
	`postua` INT NOT NULL,
	`arloak` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Taldeak` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`taldea` varchar(20) NOT NULL,
	`tutorea` INT NOT NULL,
	`taldekideak` INT NOT NULL,
	`Irakasleak` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Irakasleak` (
	`taldea` INT NOT NULL,
	`irakaslea` INT NOT NULL,
	`postua` INT NOT NULL,
	PRIMARY KEY (`taldea`)
);

ALTER TABLE `Feedbacka` ADD CONSTRAINT `Feedbacka_fk0` FOREIGN KEY (`erabiltzailea`) REFERENCES `Taldeak`(`taldekideak`);

ALTER TABLE `Feedbacka` ADD CONSTRAINT `Feedbacka_fk1` FOREIGN KEY (`postuak`) REFERENCES `Postua`(`id`);

ALTER TABLE `Postua` ADD CONSTRAINT `Postua_fk0` FOREIGN KEY (`arloak`) REFERENCES `Arloak`(`id`);

ALTER TABLE `Taldeak` ADD CONSTRAINT `Taldeak_fk0` FOREIGN KEY (`tutorea`) REFERENCES `Erabiltzaileak`(`id`);

ALTER TABLE `Taldeak` ADD CONSTRAINT `Taldeak_fk1` FOREIGN KEY (`taldekideak`) REFERENCES `Erabiltzaileak`(`id`);

ALTER TABLE `Taldeak` ADD CONSTRAINT `Taldeak_fk2` FOREIGN KEY (`Irakasleak`) REFERENCES `Irakasleak`(`irakaslea`);

ALTER TABLE `Irakasleak` ADD CONSTRAINT `Irakasleak_fk0` FOREIGN KEY (`taldea`) REFERENCES `Taldeak`(`id`);

ALTER TABLE `Irakasleak` ADD CONSTRAINT `Irakasleak_fk1` FOREIGN KEY (`irakaslea`) REFERENCES `Erabiltzaileak`(`id`);

ALTER TABLE `Irakasleak` ADD CONSTRAINT `Irakasleak_fk2` FOREIGN KEY (`postua`) REFERENCES `Postuak`(`id`);