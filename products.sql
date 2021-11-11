-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Lis 2021, 17:25
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prodImg` text NOT NULL,
  `prodFirma` varchar(20) NOT NULL,
  `prodName` varchar(40) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `stockAvailable` int(11) NOT NULL,
  `prodIsAdded` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `prodImg`, `prodFirma`, `prodName`, `prodPrice`, `stockAvailable`, `prodIsAdded`) VALUES
(1, 'images/products/item1.png', 'STEELSERIES', 'Arctis 1', 45, 1, 'false'),
(2, 'images/products/item2.png', 'RAZER', 'DeathAdder', 50, 1, 'false'),
(3, 'images/products/item3.png', 'RAZER', 'Ornata Chroma v2', 40, 1, 'false'),
(4, 'images/products/item4.png', 'NVIDIA', 'RTX 3080 Ti', 550, 1, 'false'),
(5, 'images/products/item5.png', 'LOGITECH', 'g502', 60, 1, 'false'),
(6, 'images/products/item6.png', 'INTEL', 'Core i5 9400f', 259, 1, 'false'),
(8, 'images/products/item7.png', 'LOGITECH', 'G Pro', 105, 0, 'false'),
(9, 'images/products/item8.png', 'JBL', 'Boombox 2', 319, 1, 'false'),
(10, 'images/products/item9.png', 'SONY', 'MDR-E9', 5, 1, 'false'),
(11, 'images/products/item10.png', 'ACER', 'G3-572', 1000, 0, 'false'),
(12, 'images/products/item11.png', 'AMD', 'Ryzen 3 3000X', 140, 1, 'false'),
(13, 'images/products/item12.png', 'MSI', 'z490-a pro', 150, 1, 'false'),
(14, 'images/products/item13.png', 'RADEON', 'rx 570', 160, 1, 'false'),
(15, 'images/products/item14.png', 'NVIDIA', 'GTX 1050 Ti', 360, 1, 'false'),
(16, 'images/products/item15.png', 'SAMSUNG', 'Galaxy s21', 1010, 1, 'false'),
(17, 'images/products/item16.png', 'DAYBETTER', 'LED lights', 20, 1, 'false'),
(18, 'images/products/item17.png', 'INTEL', 'Pentium G4560', 245, 1, 'false'),
(19, 'images/products/item18.png', 'MSI', 'Clutch GM11', 26, 1, 'false'),
(20, 'images/products/item19.png', 'LG', '24MP59G', 135, 1, 'false');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
