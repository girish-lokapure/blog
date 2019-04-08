CREATE TABLE `articles` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` text,
 `body` text,
 `status` enum('active','inactive','suspended') NOT NULL DEFAULT 'active',
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `user_id` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `user_id` (`user_id`),
 CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB


CREATE TABLE `roles` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `status` enum('active','inactive','suspended') NOT NULL DEFAULT 'active',
 `created_at` datetime NOT NULL,
 `updated_at` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB


CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `username` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `status` enum('active','inactive','suspended') NOT NULL DEFAULT 'active',
 `created_at` datetime NOT NULL,
 `updated_at` datetime NOT NULL,
 `role_id` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `role_id` (`role_id`),
 CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB