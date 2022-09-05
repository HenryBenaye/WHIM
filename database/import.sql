CREATE DATABASE WHIM; 

USE WHIM;

CREATE TABLE IF NOT EXISTS `students` (
    `id` int PRIMARY KEY AUTO_INCREMENT ,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
)

INSERT INTO students (username, password, email)
	VALUES ('Diana Kasten', '734-887-7989', 'DianaMKasten@jourrapide.com')