-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 sep 2022 om 09:58
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whim`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `available_days` varchar(255) DEFAULT NULL,
  `top_skill` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `coaches`
--

INSERT INTO `coaches` (`id`, `username`, `image_url`, `available_days`, `top_skill`) VALUES
(1, 'Ties', 'img/Ties_coach.png', 'mado', 'scrum'),
(2, 'Bob', 'img/Bob_coach.png', 'madiwodovr', 'frameworks'),
(3, 'Fons', 'img/Fons_coach.png', 'didowo', 'ai'),
(4, 'Bas', 'img/Bas_coach.png', 'vr', 'git-bash'),
(5, 'Stephan', 'img/Stephan_coach.png', 'ma', 'front-end'),
(6, 'Thomas', 'img/Thomas_coach.png', 'do', 'Linux'),
(7, 'Joris', 'img/Joris_coach.png', 'do', 'Laravel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opdrachten`
--

CREATE TABLE `opdrachten` (
  `id` int(11) NOT NULL,
  `opdracht` varchar(255) DEFAULT NULL,
  `hints` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `opdrachten`
--

INSERT INTO `opdrachten` (`id`, `opdracht`, `hints`) VALUES
(1, 'Maak een database', 'how to create a database'),
(2, 'Print \"Hello world\"', 'echo()'),
(3, 'Jouw website, jouw portfolio!\r\n', 'paragraph element'),
(4, 'The Big Bang\r\n', 'databases php');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stuck_students`
--

CREATE TABLE `stuck_students` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `student_id` int(9) DEFAULT NULL,
  `opdracht_id` int(9) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `stuck_students`
--

INSERT INTO `stuck_students` (`id`, `status`, `student_id`, `opdracht_id`, `created_at`) VALUES
(1, 1, 1, 1, '2022-09-07 08:30:45'),
(3, 1, 3, 2, '2022-09-07 08:30:45'),
(4, 1, 4, 4, '2022-09-07 08:30:45');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `students`
--

INSERT INTO `students` (`id`, `username`, `password`, `email`) VALUES
(1, 'Diana Kasten', '734-887-7989', 'DianaMKasten@jourrapide.com'),
(2, 'Daan Basten', 'asdsad', 'daantje@gmail.com'),
(3, 'Bobo stravers\r\n', 'sad', 'bobbie@outlook.com'),
(4, 'Mark Driessen', 'asda', 'markie5713@hotmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `opdrachten`
--
ALTER TABLE `opdrachten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `stuck_students`
--
ALTER TABLE `stuck_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_student` (`student_id`),
  ADD KEY `FK_opdrachten` (`opdracht_id`);

--
-- Indexen voor tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `opdrachten`
--
ALTER TABLE `opdrachten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `stuck_students`
--
ALTER TABLE `stuck_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `stuck_students`
--
ALTER TABLE `stuck_students`
  ADD CONSTRAINT `FK_opdrachten` FOREIGN KEY (`opdracht_id`) REFERENCES `opdrachten` (`id`),
  ADD CONSTRAINT `FK_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;