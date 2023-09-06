CREATE TABLE
    IF NOT EXISTS `equipement` (
        `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `label` VARCHAR(150) NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS `type_bien` (
        `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `label` VARCHAR(150) NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS `user` (
        `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `nom` VARCHAR(150) NOT NULL,
        `prenom` VARCHAR(150) NOT NULL,
        `email` VARCHAR(150) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `is_hote` BOOLEAN NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS `bien` (
        `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `titre` VARCHAR(150) NOT NULL,
        `addresse` VARCHAR(255) NOT NULL,
        `description` VARCHAR(150) NOT NULL,
        `prix` INT(10) NOT NULL,
        `taille` INT(10) NOT NULL,
        `nbr_piece` INT(10) NOT NULL,
        `nbr_couchage` INT(10) NOT NULL,
        `type_bien_id` INT(10) NOT NULL,
        `user_id` INT(10) NOT NULL,
        FOREIGN KEY (`type_bien_id`) REFERENCES `type_bien`(`id`),
        FOREIGN KEY (`user_id`) REFERENCES `user`(`id`)
    );

CREATE TABLE
    IF NOT EXISTS `bien_equipement` (
        `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `equipement_id` INT(10) NOT NULL,
        `bien_id` INT(10) NOT NULL,
        FOREIGN KEY (`equipement_id`) REFERENCES `equipement`(`id`),
        FOREIGN KEY (`bien_id`) REFERENCES `bien`(`id`)
    );

CREATE TABLE
    IF NOT EXISTS `photo` (
        `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `image_path` INT(10) NOT NULL,
        `slug` INT(10) NOT NULL,
        `bien_id` INT(10) NOT NULL,
        FOREIGN KEY (`bien_id`) REFERENCES `bien`(`id`)
    );

CREATE TABLE
    IF NOT EXISTS `reservation` (
        `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `date_debut` DATE NOT NULL,
        `date_fin` DATE NOT NULL,
        `bien_id` INT(10) NOT NULL,
        `user_id` INT(10) NOT NULL,
        FOREIGN KEY (`bien_id`) REFERENCES `bien`(`id`),
        FOREIGN KEY (`user_id`) REFERENCES `user`(`id`)
    );