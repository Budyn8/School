-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Gru 2022, 01:16
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `salon`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grafik`
--

CREATE TABLE `grafik` (
  `Id` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Godzina` varchar(5) COLLATE utf8mb4_polish_ci NOT NULL,
  `Status` char(1) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `grafik`
--

INSERT INTO `grafik` (`Id`, `Data`, `Godzina`, `Status`) VALUES
(1, '2022-11-27', '08:00', 'W'),
(2, '2022-11-27', '09:00', 'W'),
(3, '2022-11-27', '10:00', 'W'),
(4, '2022-11-27', '11:00', 'W'),
(5, '2022-11-27', '12:00', 'W'),
(6, '2022-11-27', '13:00', 'W'),
(7, '2022-11-27', '14:00', 'W'),
(8, '2022-11-27', '15:00', 'W'),
(9, '2022-11-21', '08:00', 'W'),
(10, '2022-11-21', '09:00', 'W'),
(11, '2022-11-21', '10:00', 'W'),
(12, '2022-11-21', '11:00', 'W'),
(13, '2022-11-21', '12:00', 'W'),
(14, '2022-11-21', '13:00', 'W'),
(15, '2022-11-21', '14:00', 'W'),
(16, '2022-11-21', '15:00', 'Z'),
(17, '2022-11-22', '08:00', 'W'),
(18, '2022-11-22', '09:00', 'W'),
(19, '2022-11-22', '10:00', 'W'),
(20, '2022-11-22', '11:00', 'W'),
(21, '2022-11-22', '12:00', 'W'),
(22, '2022-11-22', '13:00', 'W'),
(23, '2022-11-22', '14:00', 'W'),
(24, '2022-11-22', '15:00', 'Z'),
(25, '2022-11-23', '08:00', 'W'),
(26, '2022-11-23', '09:00', 'W'),
(27, '2022-11-23', '10:00', 'W'),
(28, '2022-11-23', '11:00', 'W'),
(29, '2022-11-23', '12:00', 'W'),
(30, '2022-11-23', '13:00', 'W'),
(31, '2022-11-23', '14:00', 'W'),
(32, '2022-11-23', '15:00', 'W'),
(33, '2022-11-24', '08:00', 'W'),
(34, '2022-11-24', '09:00', 'W'),
(35, '2022-11-24', '10:00', 'W'),
(36, '2022-11-24', '11:00', 'W'),
(37, '2022-11-24', '12:00', 'W'),
(38, '2022-11-24', '13:00', 'W'),
(39, '2022-11-24', '14:00', 'W'),
(40, '2022-11-24', '15:00', 'W'),
(41, '2022-11-25', '08:00', 'W'),
(42, '2022-11-25', '09:00', 'W'),
(43, '2022-11-25', '10:00', 'W'),
(44, '2022-11-25', '11:00', 'Z'),
(45, '2022-11-25', '12:00', 'Z'),
(46, '2022-11-25', '13:00', 'W'),
(47, '2022-11-25', '14:00', 'W'),
(48, '2022-11-25', '15:00', 'W'),
(49, '2022-11-28', '08:00', 'Z'),
(50, '2022-11-28', '09:00', 'Z'),
(51, '2022-11-28', '10:00', 'W'),
(52, '2022-11-28', '11:00', 'W'),
(53, '2022-11-28', '12:00', 'W'),
(54, '2022-11-28', '13:00', 'W'),
(55, '2022-11-28', '14:00', 'W'),
(56, '2022-11-28', '15:00', 'W'),
(57, '2022-11-29', '08:00', 'W'),
(58, '2022-11-29', '09:00', 'W'),
(59, '2022-11-29', '10:00', 'W'),
(60, '2022-11-29', '11:00', 'W'),
(61, '2022-11-29', '12:00', 'W'),
(62, '2022-11-29', '13:00', 'W'),
(63, '2022-11-29', '14:00', 'W'),
(64, '2022-11-29', '15:00', 'W'),
(65, '2022-11-30', '08:00', 'W'),
(66, '2022-11-30', '09:00', 'W'),
(67, '2022-11-30', '10:00', 'W'),
(68, '2022-11-30', '11:00', 'W'),
(69, '2022-11-30', '12:00', 'W'),
(70, '2022-11-30', '13:00', 'W'),
(71, '2022-11-30', '14:00', 'W'),
(72, '2022-11-30', '15:00', 'W'),
(73, '2022-12-01', '08:00', 'Z'),
(74, '2022-12-01', '09:00', 'Z'),
(75, '2022-12-01', '10:00', 'W'),
(76, '2022-12-01', '11:00', 'W'),
(77, '2022-12-01', '12:00', 'Z'),
(78, '2022-12-01', '13:00', 'W'),
(79, '2022-12-01', '14:00', 'W'),
(80, '2022-12-01', '15:00', 'W'),
(81, '2022-12-02', '08:00', 'W'),
(82, '2022-12-02', '09:00', 'W'),
(83, '2022-12-02', '10:00', 'W'),
(84, '2022-12-02', '11:00', 'W'),
(85, '2022-12-02', '12:00', 'W'),
(86, '2022-12-02', '13:00', 'W'),
(87, '2022-12-02', '14:00', 'W'),
(88, '2022-12-02', '15:00', 'W'),
(89, '2022-12-05', '08:00', 'W'),
(90, '2022-12-05', '09:00', 'W'),
(91, '2022-12-05', '10:00', 'W'),
(92, '2022-12-05', '11:00', 'W'),
(93, '2022-12-05', '12:00', 'W'),
(94, '2022-12-05', '13:00', 'W'),
(95, '2022-12-05', '14:00', 'W'),
(96, '2022-12-05', '15:00', 'W'),
(97, '2022-12-06', '08:00', 'W'),
(98, '2022-12-06', '09:00', 'W'),
(99, '2022-12-06', '10:00', 'W'),
(100, '2022-12-06', '11:00', 'W'),
(101, '2022-12-06', '12:00', 'W'),
(102, '2022-12-06', '13:00', 'W'),
(103, '2022-12-06', '14:00', 'W'),
(104, '2022-12-06', '15:00', 'W'),
(105, '2022-12-07', '08:00', 'W'),
(106, '2022-12-07', '09:00', 'W'),
(107, '2022-12-07', '10:00', 'W'),
(108, '2022-12-07', '11:00', 'W'),
(109, '2022-12-07', '12:00', 'W'),
(110, '2022-12-07', '13:00', 'W'),
(111, '2022-12-07', '14:00', 'W'),
(112, '2022-12-07', '15:00', 'W'),
(113, '2022-12-08', '08:00', 'W'),
(114, '2022-12-08', '09:00', 'W'),
(115, '2022-12-08', '10:00', 'W'),
(116, '2022-12-08', '11:00', 'W'),
(117, '2022-12-08', '12:00', 'W'),
(118, '2022-12-08', '13:00', 'W'),
(119, '2022-12-08', '14:00', 'W'),
(120, '2022-12-08', '15:00', 'W'),
(121, '2022-12-09', '08:00', 'W'),
(122, '2022-12-09', '09:00', 'W'),
(123, '2022-12-09', '10:00', 'W'),
(124, '2022-12-09', '11:00', 'W'),
(125, '2022-12-09', '12:00', 'W'),
(126, '2022-12-09', '13:00', 'W'),
(127, '2022-12-09', '14:00', 'W'),
(128, '2022-12-09', '15:00', 'W');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `Id` int(11) NOT NULL,
  `Id_zabieg` int(11) NOT NULL,
  `Id_grafik` int(11) NOT NULL,
  `Komentarz` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `rezerwacja`
--

INSERT INTO `rezerwacja` (`Id`, `Id_zabieg`, `Id_grafik`, `Komentarz`) VALUES
(1, 1, 16, 'Proszę o wyszukanie wizyty w następnym miesiącu'),
(2, 4, 24, 'Czy jest możliwość umówienia się w sobotę w sobotę '),
(3, 1, 73, 'Poleciła mi aństwa koleżanka'),
(5, 3, 77, 'Brak terminu'),
(6, 6, 74, 'Sobota'),
(7, 5, 44, ''),
(8, 5, 45, ''),
(9, 2, 49, ''),
(10, 2, 50, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zabiegi`
--

CREATE TABLE `zabiegi` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Cena` decimal(10,0) DEFAULT NULL,
  `Opis` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zabiegi`
--

INSERT INTO `zabiegi` (`Id`, `Nazwa`, `Cena`, `Opis`) VALUES
(1, 'Depilacja laserowa Light Sheer', '470', 'Depilacja laserowa'),
(2, 'Endermologia LPG', '240', 'Endermologia gazem'),
(3, 'Fala akustyczna', '600', 'Fala akustyczna - 3 zabiegi'),
(4, 'Karboksyterapia', '1240', 'Karboksyterapia - sesja'),
(5, 'Lipoliza iniekcyjna', '320', 'Lipoliza iniekcyjna'),
(6, 'Terapia antycellulitowa ALIDYA', '2250', 'Terapia antycellulitowa');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `grafik`
--
ALTER TABLE `grafik`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `zabieg_idx` (`Id_grafik`),
  ADD KEY `grafik_idx` (`Id_zabieg`);

--
-- Indeksy dla tabeli `zabiegi`
--
ALTER TABLE `zabiegi`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `grafik`
--
ALTER TABLE `grafik`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `zabiegi`
--
ALTER TABLE `zabiegi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD CONSTRAINT `rezerwacja_ibfk_1` FOREIGN KEY (`Id_zabieg`) REFERENCES `zabiegi` (`Id`),
  ADD CONSTRAINT `rezerwacja_ibfk_2` FOREIGN KEY (`Id_grafik`) REFERENCES `grafik` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
