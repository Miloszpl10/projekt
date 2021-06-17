-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Cze 2021, 22:49
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faktura`
--

CREATE TABLE `faktura` (
  `id_fakt` int(11) NOT NULL,
  `faktura_numer` int(11) DEFAULT NULL,
  `koszt` varchar(11) COLLATE utf8_polish_ci DEFAULT NULL,
  `termin_platnosci` varchar(11) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_wlasciciel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `faktura`
--

INSERT INTO `faktura` (`id_fakt`, `faktura_numer`, `koszt`, `termin_platnosci`, `id_wlasciciel`) VALUES
(1, 2345, '12', '2029-10-10', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE `samochod` (
  `id_car` int(11) NOT NULL,
  `samochod_vim` varchar(17) COLLATE utf8_polish_ci DEFAULT NULL,
  `marka` varchar(32) COLLATE utf8_polish_ci DEFAULT NULL,
  `model` varchar(32) COLLATE utf8_polish_ci DEFAULT NULL,
  `rok` int(11) DEFAULT NULL,
  `usterka` varchar(2048) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_wlasciciel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `samochod`
--

INSERT INTO `samochod` (`id_car`, `samochod_vim`, `marka`, `model`, `rok`, `usterka`, `id_wlasciciel`) VALUES
(1, '23fe23ws3', 'skoda', 'octavia', 2021, 'Usterka egr ', 0),
(2, '23fe23ws3', 'skoda', 'octavia', 2021, 'Usterka egr ', 0),
(3, '3ed', 'seat', 'leon', 2025, 'Usterka egr ', 0),
(17, 'asd23wds4ed', 'alfa romeo', '159', 2011, 'dpf', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `warsztat`
--

CREATE TABLE `warsztat` (
  `id` int(11) NOT NULL,
  `samochod_vim` varchar(17) COLLATE utf8_polish_ci NOT NULL,
  `wlasciciel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wlasciciel`
--

CREATE TABLE `wlasciciel` (
  `wlasciciel_id` int(11) NOT NULL,
  `nazwisko` varchar(32) COLLATE utf8_polish_ci DEFAULT NULL,
  `telefon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wlasciciel`
--

INSERT INTO `wlasciciel` (`wlasciciel_id`, `nazwisko`, `telefon`) VALUES
(2, 'asd', 234);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `faktura`
--
ALTER TABLE `faktura`
  ADD PRIMARY KEY (`id_fakt`),
  ADD KEY `id_wlasciciel` (`id_wlasciciel`);

--
-- Indeksy dla tabeli `samochod`
--
ALTER TABLE `samochod`
  ADD PRIMARY KEY (`id_car`),
  ADD KEY `samochod_vim` (`samochod_vim`),
  ADD KEY `id_wlasciciel` (`id_wlasciciel`);

--
-- Indeksy dla tabeli `warsztat`
--
ALTER TABLE `warsztat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vim` (`samochod_vim`),
  ADD KEY `wlasciciell` (`wlasciciel_id`);

--
-- Indeksy dla tabeli `wlasciciel`
--
ALTER TABLE `wlasciciel`
  ADD PRIMARY KEY (`wlasciciel_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `faktura`
--
ALTER TABLE `faktura`
  MODIFY `id_fakt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `samochod`
--
ALTER TABLE `samochod`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `warsztat`
--
ALTER TABLE `warsztat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `wlasciciel`
--
ALTER TABLE `wlasciciel`
  MODIFY `wlasciciel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `warsztat`
--
ALTER TABLE `warsztat`
  ADD CONSTRAINT `warsztat_ibfk_1` FOREIGN KEY (`samochod_vim`) REFERENCES `samochod` (`samochod_vim`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `warsztat_ibfk_2` FOREIGN KEY (`wlasciciel_id`) REFERENCES `faktura` (`id_wlasciciel`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
