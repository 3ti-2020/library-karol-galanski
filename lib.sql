-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 26 Maj 2020, 19:19
-- Wersja serwera: 5.7.26
-- Wersja PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

DROP TABLE IF EXISTS `autorzy`;
CREATE TABLE IF NOT EXISTS `autorzy` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `autorzy`
--

INSERT INTO `autorzy` (`id_autor`, `imie`, `nazwisko`) VALUES
(1, 'Stephen E.', 'Ambrose'),
(2, 'Adam', 'Ostrowski'),
(3, 'Andrzej', 'Sapkowski'),
(4, 'J.K.', 'Rowling'),
(5, 'J.R.R.', 'Tolkien'),
(6, 'Prats', 'Lluis');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

DROP TABLE IF EXISTS `ksiazki`;
CREATE TABLE IF NOT EXISTS `ksiazki` (
  `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT,
  `id_autor` int(11) NOT NULL,
  `id_tytul` int(11) NOT NULL,
  PRIMARY KEY (`id_ksiazki`),
  KEY `fk_autor` (`id_autor`),
  KEY `fk_tytul` (`id_tytul`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id_ksiazki`, `id_autor`, `id_tytul`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 6),
(4, 3, 5),
(5, 4, 7),
(6, 5, 3),
(7, 5, 4),
(8, 6, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tytuly`
--

DROP TABLE IF EXISTS `tytuly`;
CREATE TABLE IF NOT EXISTS `tytuly` (
  `id_tytul` int(11) NOT NULL AUTO_INCREMENT,
  `tytul` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `isbn` int(3) NOT NULL,
  PRIMARY KEY (`id_tytul`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tytuly`
--

INSERT INTO `tytuly` (`id_tytul`, `tytul`, `isbn`) VALUES
(1, 'D-Day', 685),
(2, 'Kompania braci', 625),
(3, 'Wladca Pierscieni', 501),
(4, 'Hobbit', 932),
(5, 'Brzydki, zly i szczery', 356),
(6, 'Saga o wiedzminie', 925),
(7, 'Seria Harry Potter', 389),
(8, 'Hachiko. Pies, ktory czekal', 948);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD CONSTRAINT `library_ksiazki_fk1` FOREIGN KEY (`id_autor`) REFERENCES `autorzy` (`id_autor`),
  ADD CONSTRAINT `library_ksiazki_fk2` FOREIGN KEY (`id_tytul`) REFERENCES `tytuly` (`id_tytul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
