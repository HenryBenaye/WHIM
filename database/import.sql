CREATE DATABASE WHIM; 

USE WHIM;

CREATE TABLE IF NOT EXISTS `students` (
    `id` int PRIMARY KEY AUTO_INCREMENT ,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL
);

INSERT INTO students (username, password, email)
	VALUES ('Diana Kasten', '734-887-7989', 'DianaMKasten@jourrapide.com');

CREATE TABLE IF NOT EXISTS `coaches` (
    `id` int PRIMARY KEY AUTO_INCREMENT ,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL
);

INSERT INTO coaches (username, password, email)
    VALUES ('Ties', '940-211-3429', 'ties@bit-academy.nl');

CREATE TABLE IF NOT EXISTS `hints` (
    `hint_id` int PRIMARY KEY AUTO_INCREMENT ,
    `hint` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `opdrachten` (
    `opdracht_id` int PRIMARY KEY AUTO_INCREMENT ,
    `opdracht` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `opdrachten_hints` (
    `opdracht_id` int NOT NULL,
    `hint_id` int NOT NULL,
    PRIMARY KEY (`opdracht_id`, `hint_id`),
    FOREIGN KEY (`opdracht_id`) REFERENCES `opdrachten` (`opdracht_id`),
    FOREIGN KEY (`hint_id`) REFERENCES `hints` (`hint_id`)
);



