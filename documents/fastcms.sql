-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 11:45 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastcms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `content` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `topic`, `content`) VALUES
(1, 'grzyb@grzyb', 'Potrzeba info', 'Informacje wymagane o tworzeniu'),
(2, 'adam@mail.com', 'Poomocy', 'Blad przy tworzeniu galerii'),
(3, 'Michal@mail.com', 'Jestem Michal', 'Chce zostac adminem');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photogallery`
--

CREATE TABLE `photogallery` (
  `id` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `photoURL` varchar(255) NOT NULL,
  `photoCaption` text NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `galleryName` varchar(60) NOT NULL,
  `galleryHeader` varchar(60) NOT NULL,
  `themeType` int(11) NOT NULL,
  `firstColour` varchar(60) NOT NULL,
  `secondColour` varchar(60) NOT NULL,
  `fontColour` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photoPath` varchar(90) NOT NULL,
  `filePath` varchar(90) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `photoPath`, `filePath`, `description`) VALUES
(1, 'WideSpace', '../../assets/themes/themesPhoto/artur.jpg', '../../assets/themes/themesFile/artur.css', 'WideSpace is a new style'),
(2, 'NewEra', '../../assets/themes/themesPhoto/artur2.jpg', '../../assets/themes/themesFile/artur.css', 'NewEra is style which create lot of space'),
(3, 'HardStyle', '../../assets/themes/themesPhoto/artur3.jpg', '../../assets/themes/themesFile/artur.css', 'HardStyle is style with lot amount of power'),
(4, 'BlueGang', '../../assets/themes/themesPhoto/artur4.jpg', '../../assets/themes/themesFile/bluegang.css', 'BlueGang is style with dark street vibe\r\n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `auth_token` varchar(64) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `admin`, `auth_token`, `join_date`) VALUES
(1, 'grzyb', 'grzyb@grzyb', '$2y$10$gNIC1Jw8SuOe5ppaYsreTOUidAWueaIQWKK05s6WRYLkA2zJyOKfm', 1, 'ebd27bddd243f87c70313359c15e94fe2fb62af8bf4e253c2540119a7563d4a0', '2023-04-28'),
(2, 'jan', 'jan@mail.com', '$2y$10$b4BoZXqoMkFc4UWTFq4OcOp5N2wOTSl4Lh/nk.QgCHI3VR7Zt9jHq', 0, '9a870feaac0a34b8f2349a3a96ad09b4bc7290bf047eef53ddffa480c6d36ec5', '2023-04-28');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `photogallery`
--
ALTER TABLE `photogallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photogallery`
--
ALTER TABLE `photogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
