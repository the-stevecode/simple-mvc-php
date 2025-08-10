
-- database -- 
-- name="dbapi"
-- collation="utf8_general_ci"
-- charset="utf8"

CREATE database IF NOT EXISTS `dbmvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use `dbmvc`;

-- table name="user"
CREATE TABLE `user` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(50) DEFAULT NULL,
    `last_name` varchar(50) DEFAULT NULL,
    `email` varchar(100) NOT NULL,
    `username` varchar(60) NOT NULL,
    `password` varchar(255) NOT NULL,
    `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
    `active` tinyint(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`),
    UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `registration_date`, `active`) VALUES
('STEVE', 'R', 'steve@g.com', 'steve', '$2y$10$cndiUJiBOaRn2D4fErXS9eUXBLIY7GJh4xT9nNG33ximEFt0PAIFC', '2023-09-25 14:06:17', 1),
(NULL, NULL, 'tt@ejemplo.com', 'tt', '$2y$10$JXZU1e2GpntZinISWyLmyOqfwwXDMIEwlbD8hbeVN4Jt35U6ZMZN2', '2025-07-30 02:58:27', 1);
