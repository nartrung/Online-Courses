-- Schema
DROP DATABASE IF EXISTS `online_courses`;
CREATE DATABASE IF NOT EXISTS `online_courses`;
USE `online_courses`;

-- Table `users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- User data (encrypt password?)
-- INSERT INTO `users` (`name`, `password`, `email`, `is_admin`) VALUES
-- 	('admin', 'admin123', 'admin@gmail.com', 1),
-- 	('user', 'user1234', 'user@gmail.com', 0);

-- Table `caterogies`
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Table `courses`
DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `description` varchar(1024) NOT NULL,
  `create_by` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`),
  FOREIGN KEY (`create_by`) REFERENCES `users`(`user_id`),
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Alter courses table
ALTER TABLE `online_courses`.`courses` 
ADD COLUMN `img_url` VARCHAR(255) NULL AFTER `updated_at`;

-- Courses data
-- INSERT INTO `courses` (`name`, `price`, `description`, `create_by`, `category_id`) VALUES
-- 	('C++ in a nutshell', 99.00, 'In a nutshell C++.', 1, 1),
-- 	('AI with Python', 199.00, 'Python - king of language', 1, 2);
    
-- INSERT INTO `courses` (`name`, `price`, `description`, `create_by`, `category_id`) VALUES
--     ('C++ OOP', 129.99, 'Object-Oriented Programming.', 1, 1);

-- Table `bought`
DROP TABLE IF EXISTS `bought`;
CREATE TABLE IF NOT EXISTS `bought` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `buy_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(1),
  PRIMARY KEY (`user_id`, `course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Courses data (not yet set rating)
-- INSERT INTO `bought` (`user_id`, `course_id`) VALUES
-- 	(1, 0);