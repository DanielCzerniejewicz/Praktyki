-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 01:29 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obiady`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ludzie`
--

CREATE TABLE `ludzie` (
  `ID_Usera` int(11) NOT NULL,
  `Imie` varchar(50) NOT NULL,
  `Nazwisko` varchar(50) NOT NULL,
  `Haslo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ludzie`
--

INSERT INTO `ludzie` (`ID_Usera`, `Imie`, `Nazwisko`, `Haslo`) VALUES
(1, 'root', '-', 'root'),
(3, 'Daniel', 'Czerniejewicz', 'Daniel07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posilki`
--

CREATE TABLE `posilki` (
  `Nr_Wyboru` int(11) NOT NULL,
  `Posilek` text DEFAULT NULL,
  `Dzien` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posilki`
--

INSERT INTO `posilki` (`Nr_Wyboru`, `Posilek`, `Dzien`) VALUES
(16, 'Schabowy', '2025-02-10'),
(17, 'Żur', '2025-02-10'),
(19, 'Rosol', '2025-02-11'),
(20, 'Gulasz', '2025-02-12'),
(21, 'Gulaszowa', '2025-02-12'),
(22, 'Piers z kurczaka', '2025-02-13'),
(23, 'Szczawiowa', '2025-02-13'),
(24, 'Łosoś', '2025-02-14'),
(25, 'Mizeria', '2025-02-14'),
(26, 'Fiku Miku z Dziku', '2025-02-06'),
(27, 'Miku Cyku ', '2025-02-23');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `preferencje`
--

CREATE TABLE `preferencje` (
  `ID_Usera` int(11) NOT NULL,
  `Preferencje` text DEFAULT NULL,
  `Dzien` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferencje`
--

INSERT INTO `preferencje` (`ID_Usera`, `Preferencje`, `Dzien`) VALUES
(1, 'Poniedziałek: Schabowy', '2025-02-07'),
(1, 'Wtorek: Rosol', '2025-02-07'),
(1, 'Środa: Brak wyboru', '2025-02-07'),
(1, 'Czwartek: Piers z kurczaka', '2025-02-07'),
(1, 'Piątek: Łosoś', '2025-02-07'),
(1, 'Poniedziałek: Żur', '2025-02-07'),
(1, 'Wtorek: Rosol', '2025-02-07'),
(1, 'Środa: Gulaszowa', '2025-02-07'),
(1, 'Czwartek: Szczawiowa', '2025-02-07'),
(1, 'Piątek: Mizeria', '2025-02-07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `preferencjearchiwum`
--

CREATE TABLE `preferencjearchiwum` (
  `ID_Usera` int(11) NOT NULL,
  `Preferencje` text DEFAULT NULL,
  `Dzien` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferencjearchiwum`
--

INSERT INTO `preferencjearchiwum` (`ID_Usera`, `Preferencje`, `Dzien`) VALUES
(1, 'Poniedziałek: Schabowy', '2025-02-07'),
(1, 'Wtorek: Karkowka', '2025-02-07'),
(1, 'Środa: Gulasz', '2025-02-07'),
(1, 'Czwartek: Piers z kurczaka', '2025-02-07'),
(1, 'Piątek: Mizeria', '2025-02-07'),
(1, 'Poniedziałek: Schabowy', '2025-02-07'),
(1, 'Wtorek: Karkowka', '2025-02-07'),
(1, 'Środa: Gulaszowa', '2025-02-07'),
(1, 'Czwartek: Piers z kurczaka', '2025-02-07'),
(1, 'Piątek: Mizeria', '2025-02-07'),
(3, 'Poniedziałek: Schabowy', '2025-02-07'),
(3, 'Wtorek: Karkowka', '2025-02-07'),
(3, 'Środa: Gulaszowa', '2025-02-07'),
(3, 'Czwartek: Brak wyboru', '2025-02-07'),
(3, 'Piątek: Łosoś', '2025-02-07'),
(3, 'Poniedziałek: Schabowy', '2025-02-07'),
(3, 'Wtorek: Karkowka', '2025-02-07'),
(3, 'Środa: Gulaszowa', '2025-02-07'),
(3, 'Czwartek: Brak wyboru', '2025-02-07'),
(3, 'Piątek: Łosoś', '2025-02-07'),
(3, 'Poniedziałek: Schabowy', '2025-02-07'),
(3, 'Wtorek: Karkowka', '2025-02-07'),
(3, 'Środa: Gulaszowa', '2025-02-07'),
(3, 'Czwartek: Brak wyboru', '2025-02-07'),
(3, 'Piątek: Łosoś', '2025-02-07'),
(1, 'Poniedziałek: Schabowy', '2025-02-07'),
(1, 'Wtorek: Karkowka', '2025-02-07'),
(1, 'Środa: Gulasz', '2025-02-07'),
(1, 'Czwartek: Piers z kurczaka', '2025-02-07'),
(1, 'Piątek: Mizeria', '2025-02-07'),
(1, 'Poniedziałek: Schabowy', '2025-02-07'),
(1, 'Wtorek: Karkowka', '2025-02-07'),
(1, 'Środa: Gulaszowa', '2025-02-07'),
(1, 'Czwartek: Piers z kurczaka', '2025-02-07'),
(1, 'Piątek: Mizeria', '2025-02-07'),
(3, 'Poniedziałek: Schabowy', '2025-02-07'),
(3, 'Wtorek: Karkowka', '2025-02-07'),
(3, 'Środa: Gulaszowa', '2025-02-07'),
(3, 'Czwartek: Brak wyboru', '2025-02-07'),
(3, 'Piątek: Łosoś', '2025-02-07'),
(3, 'Poniedziałek: Schabowy', '2025-02-07'),
(3, 'Wtorek: Karkowka', '2025-02-07'),
(3, 'Środa: Gulaszowa', '2025-02-07'),
(3, 'Czwartek: Brak wyboru', '2025-02-07'),
(3, 'Piątek: Łosoś', '2025-02-07'),
(3, 'Poniedziałek: Schabowy', '2025-02-07'),
(3, 'Wtorek: Karkowka', '2025-02-07'),
(3, 'Środa: Gulaszowa', '2025-02-07'),
(3, 'Czwartek: Brak wyboru', '2025-02-07'),
(3, 'Piątek: Łosoś', '2025-02-07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rangi`
--

CREATE TABLE `rangi` (
  `Ranga` varchar(10) DEFAULT NULL,
  `ID_Usera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rangi`
--

INSERT INTO `rangi` (`Ranga`, `ID_Usera`) VALUES
('Admin', 1),
('Pracownik', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ludzie`
--
ALTER TABLE `ludzie`
  ADD PRIMARY KEY (`ID_Usera`);

--
-- Indeksy dla tabeli `posilki`
--
ALTER TABLE `posilki`
  ADD PRIMARY KEY (`Nr_Wyboru`);

--
-- Indeksy dla tabeli `preferencje`
--
ALTER TABLE `preferencje`
  ADD KEY `ID_Usera` (`ID_Usera`);

--
-- Indeksy dla tabeli `preferencjearchiwum`
--
ALTER TABLE `preferencjearchiwum`
  ADD KEY `ID_Usera` (`ID_Usera`);

--
-- Indeksy dla tabeli `rangi`
--
ALTER TABLE `rangi`
  ADD PRIMARY KEY (`ID_Usera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ludzie`
--
ALTER TABLE `ludzie`
  MODIFY `ID_Usera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posilki`
--
ALTER TABLE `posilki`
  MODIFY `Nr_Wyboru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `preferencje`
--
ALTER TABLE `preferencje`
  ADD CONSTRAINT `preferencje_ibfk_1` FOREIGN KEY (`ID_Usera`) REFERENCES `ludzie` (`ID_Usera`);

--
-- Constraints for table `preferencjearchiwum`
--
ALTER TABLE `preferencjearchiwum`
  ADD CONSTRAINT `preferencjearchiwum_ibfk_1` FOREIGN KEY (`ID_Usera`) REFERENCES `ludzie` (`ID_Usera`);

--
-- Constraints for table `rangi`
--
ALTER TABLE `rangi`
  ADD CONSTRAINT `rangi_ibfk_1` FOREIGN KEY (`ID_Usera`) REFERENCES `ludzie` (`ID_Usera`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Archiwizacja` ON SCHEDULE EVERY 1 WEEK STARTS '2025-02-07 12:45:59' ON COMPLETION PRESERVE ENABLE DO BEGIN
    INSERT INTO preferencjearchiwum (ID_Usera, Preferencje, Dzien)
    SELECT ID_Usera, Preferencje, Dzien
    FROM preferencje;
END$$

CREATE DEFINER=`root`@`localhost` EVENT `Archiwizacja2` ON SCHEDULE EVERY 1 WEEK STARTS '2025-02-07 12:45:52' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN

    DELETE FROM preferencje;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
