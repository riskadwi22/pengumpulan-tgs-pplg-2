CREATE TABLE `db_express`.`author`(
    `id` INT(14) NOT NULL AUTO_INCREMENT,
    `name`  VARCHAR(255) NOT NULL,
    `year` VARCHAR(255) NULL,
    `publisher` VARCHAR(255) NULL,
    `city` VARCHAR(255) NULL,
    `editor` VARCHAR(255) NULL,
    PRIMARY KEY(`id`)
) ENGINE = INNODB