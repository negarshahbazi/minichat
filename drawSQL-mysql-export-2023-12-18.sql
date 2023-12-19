CREATE TABLE `user`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pseudo` VARCHAR(255) NOT NULL
);
CREATE TABLE `message`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `content` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `ip_adress` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `message` ADD CONSTRAINT `message_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);