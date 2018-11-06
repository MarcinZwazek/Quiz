-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lis 2018, 12:13
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quiz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `IDKategorii` int(11) NOT NULL,
  `Nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`IDKategorii`, `Nazwa`) VALUES
(1, 'Historia'),
(2, 'Fizyka'),
(3, 'Wiedza Ogolna'),
(4, 'Przyroda'),
(5, 'Geografia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `IDPytania` int(11) NOT NULL,
  `IDKategorii` int(11) DEFAULT NULL,
  `Pytanie` text NOT NULL,
  `OdpowiedzA` varchar(255) NOT NULL,
  `OdpowiedzB` varchar(255) NOT NULL,
  `OdpowiedzC` varchar(255) NOT NULL,
  `OdpowiedzD` varchar(255) NOT NULL,
  `Prawidlowa` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`IDPytania`, `IDKategorii`, `Pytanie`, `OdpowiedzA`, `OdpowiedzB`, `OdpowiedzC`, `OdpowiedzD`, `Prawidlowa`) VALUES
(1, 1, 'Pierwszy krol polski to: ', 'Jan III Sobieski', 'Mieszko I', 'Mieszko II', 'Boleslaw I Chrobry', 'OdpowiedzD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `IDUzytkownika` int(11) NOT NULL,
  `Nazwa` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Haslo` varchar(255) NOT NULL,
  `IDWyniku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyniki`
--

CREATE TABLE `wyniki` (
  `IDwyniku` int(11) NOT NULL,
  `Wynik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`IDKategorii`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`IDPytania`),
  ADD KEY `IDKategorii` (`IDKategorii`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`IDUzytkownika`),
  ADD KEY `IDWyniku` (`IDWyniku`);

--
-- Indeksy dla tabeli `wyniki`
--
ALTER TABLE `wyniki`
  ADD PRIMARY KEY (`IDwyniku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `IDKategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `IDPytania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `IDUzytkownika` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD CONSTRAINT `pytania_ibfk_1` FOREIGN KEY (`IDKAtegorii`) REFERENCES `kategoria` (`IDKategorii`),
  ADD CONSTRAINT `pytania_ibfk_2` FOREIGN KEY (`IDKategorii`) REFERENCES `kategoria` (`IDKategorii`);

--
-- Ograniczenia dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD CONSTRAINT `uzytkownik_ibfk_1` FOREIGN KEY (`IDWyniku`) REFERENCES `wyniki` (`IDWYniku`),
  ADD CONSTRAINT `uzytkownik_ibfk_2` FOREIGN KEY (`IDWyniku`) REFERENCES `wyniki` (`IDWYniku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
