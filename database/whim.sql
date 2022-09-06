-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 sep 2022 om 13:16
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
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `coaches`
--

INSERT INTO `coaches` (`id`, `username`, `image_url`) VALUES
(1, 'Ties', 'img/Ties_coach.png'),
(2, 'Bob', 'img/Bob_coach.png'),
(3, 'Fons', 'img/Fons_coach.png'),
(4, 'Bas', 'img/Bas_coach.png'),
(5, 'Stephan', 'img/Stephan_coach.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opdrachten`
--

CREATE TABLE `opdrachten` (
  `id` int(11) NOT NULL,
  `opdracht` varchar(255) DEFAULT NULL,
  `hints` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stuck_students`
--

CREATE TABLE `stuck_students` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `student_id` int(9) DEFAULT NULL,
  `opdracht_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Diana Kasten', '734-887-7989', 'DianaMKasten@jourrapide.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `stuck_students`
--
ALTER TABLE `stuck_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
