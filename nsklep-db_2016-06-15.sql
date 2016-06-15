-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2016 at 02:53 AM
-- Server version: 5.6.29
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsklep`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategoria`
--

CREATE TABLE `kategoria` (
  `id_kategorii` int(11) NOT NULL,
  `nazwa_kategorii` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`id_kategorii`, `nazwa_kategorii`) VALUES
(1, 'Krzesła'),
(2, 'Stoły'),
(3, 'Huśtawki'),
(4, 'Ławki');

-- --------------------------------------------------------

--
-- Table structure for table `klient`
--

CREATE TABLE `klient` (
  `id_klienta` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `id_zamowienia` int(11) NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `telefon` text COLLATE utf8_polish_ci NOT NULL,
  `ulica` text COLLATE utf8_polish_ci,
  `nr_domu` text COLLATE utf8_polish_ci,
  `nr_mieszkania` text COLLATE utf8_polish_ci,
  `kod_pocztowy` text COLLATE utf8_polish_ci,
  `miasto` text COLLATE utf8_polish_ci,
  `panstwo` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`id_klienta`, `imie`, `nazwisko`, `login`, `haslo`, `id_zamowienia`, `email`, `telefon`, `ulica`, `nr_domu`, `nr_mieszkania`, `kod_pocztowy`, `miasto`, `panstwo`) VALUES
(9, 'Jakiś', 'Ktoś', 'lukassz', '202cb962ac59075b964b07152d234b70', 123, 'lukasz@wp.pl', '123456789', '', '5', '23', '12345', 'Domyśl się', 'Polska'),
(10, 'Andrzej', 'Duda', 'duda', '81dc9bdb52d04dc20036dbd8313ed055', 124, 'duda@o2.pl', '', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Adam', 'Mazurkiewicz', 'mazur', '25d55ad283aa400af464c76d713c07ad', 0, 'mazurek@o2.pl', '', 'Ulala', '12', '4', '3333', 'Rzeszów', 'Polska');

-- --------------------------------------------------------

--
-- Table structure for table `kurier`
--

CREATE TABLE `kurier` (
  `id_dostawcy` int(11) NOT NULL,
  `nazwa_dostawcy` text COLLATE utf8_polish_ci NOT NULL,
  `rodzaj_przesylki` text COLLATE utf8_polish_ci NOT NULL,
  `cena_dostawy` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `kurier`
--

INSERT INTO `kurier` (`id_dostawcy`, `nazwa_dostawcy`, `rodzaj_przesylki`, `cena_dostawy`) VALUES
(1, 'DHL', 'szybka', '20.00'),
(2, 'Poczta Polska', 'wolna', '13.00'),
(3, 'odbiór osobisty', 'natychmiastowa', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `opinia`
--

CREATE TABLE `opinia` (
  `id_opinii` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `data_wystawienia` datetime NOT NULL,
  `id_produktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `opinia`
--

INSERT INTO `opinia` (`id_opinii`, `id_klienta`, `tresc`, `data_wystawienia`, `id_produktu`) VALUES
(1, 9, 'Drewno i metal.\r\nPlastik to wiadomo - tandeta. Gorszy jest tylko technorattan - plastik udający coś czym nie jest i nigdy nie będzie.', '2016-06-01 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pracownik`
--

CREATE TABLE `pracownik` (
  `id_pracownika` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `id_szefa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `pracownik`
--

INSERT INTO `pracownik` (`id_pracownika`, `imie`, `nazwisko`, `login`, `haslo`, `email`, `id_szefa`) VALUES
(1, 'Piotr', 'Wiśniewski', 'wisnia', '827ccb0eea8a706c4c34a16891f84e7b', 'wisnia@wp.pl', 1005),
(2, 'Michał', 'Dąbrowski', 'debowy', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'debowy@wp.pl', 1005),
(1005, 'Andrzej', 'Kornik', 'abdul', '081071401562678303574ab2d137a637', 'abdul@o2.pl', 1005);

-- --------------------------------------------------------

--
-- Table structure for table `produkt`
--

CREATE TABLE `produkt` (
  `id_produktu` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL,
  `nazwa_produktu` text COLLATE utf8_polish_ci NOT NULL,
  `cena_jednostkowa` decimal(9,2) NOT NULL,
  `opis_produktu` text COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `produkt`
--

INSERT INTO `produkt` (`id_produktu`, `id_kategorii`, `nazwa_produktu`, `cena_jednostkowa`, `opis_produktu`, `image`) VALUES
(1, 1, 'Krzesło aluminiowe', '460.00', 'Kolorystyka krzeseł :\r\nsrebrna rama - szczotkowane aluminium, szara plecionka textilene\r\nbiała rama, szara plecionka textilene\r\nantracytowa rama, szara plecionka textilene\r\n\r\nWymiary krzeseł Bellac:\r\nSzerokość: 57 cm\r\nGłębokość: 57 cm\r\nWysokość: 90 cm', 'image/1.jpg'),
(2, 1, 'Fotel technorattanowy', '400.00', 'Kolory:\r\njasny (kremowy)\r\nciemny (szaro-brązowy)\r\nWymiary:\r\n\r\nSzerokość: 66 cm\r\nGłębokość: 66 cm\r\nWysokość: 75 cm\r\nWysokość siedziska: 45 cm\r\nWysokość siedziska z poduszką: 50 cm', 'image/2.jpg'),
(3, 1, 'Fotel składany', '400.00', 'Kolory:\r\njasny (kremowy)\r\nciemny (szaro-brązowy)\r\n\r\nWymiary:\r\nSzerokość: 66 cm\r\nGłębokość: 66 cm\r\nWysokość: 75 cm\r\nWysokość siedziska: 45 cm\r\nWysokość siedziska z poduszką: 50 cm', 'image/3.jpg'),
(4, 1, 'Fotel rozkładany', '375.00', 'Kolorystyka rozkładanych foteli \r\nbiała rama z szarą plecionką,\r\nbiała rama z taupe plecionką,\r\nantracytowa rama z szarą plecionką,\r\nsrebrna rama \r\n\r\nWymiary fotela \r\nSzerokość: 61 cm\r\nGłębokość: 61 cm\r\nWysokość: 110 cm', 'image/4.jpg'),
(5, 1, 'Rozkładany fotel ogrodowy', '330.00', 'Wymiary i waga rozkładanego fotela :\r\nSzerokość: 61,5 cm\r\nGłębokość: 67,5 cm\r\nWysokość: 115 cm\r\nWysokość siedziska: 44 cm\r\nWysokość podłokietnika: 63,5 cm\r\nWaga: 6,5 kg\r\n\r\nKolorystyka fotela :\r\nbiały fotel z niebieską plecionką\r\nbiały fotel z plecionką taupe', 'image/5.jpg'),
(6, 2, 'Okrągły stół', '1900.00', 'Wymiary okrągłego stolika ogrodowego \r\n\r\nŚrednica: 107 cm\r\nWysokość: 73 cm', 'image/6.jpg'),
(7, 2, 'Duży stół ogrodowy', '6550.00', 'Wymiary stołu ogrodowego \r\n\r\nDługość: 220 cm\r\nSzerokość: 100 cm\r\nWysokość: 78 cm', 'image/7.jpg'),
(8, 2, 'Stół ogrodowy JAVA teak', '2790.00', 'Wymiary stołu JAVA :\r\n\r\nSzerokość: 220 cm\r\nGłębokość: 100 cm\r\nWysokość: 77 cm', 'image/9.jpg'),
(9, 2, 'Stół ogrodowy aluminiowy', '1450.00', 'Wymiary aluminiowego stołu \r\n\r\nDługość: 200 cm\r\nSzerokość: 91 cm\r\nWysokość: 74 cm', 'image/8.jpg'),
(10, 2, 'Stół ogrodowy rozkładany', '1650.00', 'Stół rozkładany \r\n\r\nDługość: 224-302 cm\r\nSzerokość: 922 cm\r\nWysokość: 75 cm', 'image/10.jpg'),
(11, 3, 'Huśtawka metalowa', '2270.00', 'Wymiary:\r\nSzerokość: 212 cm\r\nGłębokość: 125 cm\r\nWysokość: 173 cm\r\nSzerokość siedziska: 170 cm\r\nGłębokość siedziska: 55 cm\r\nSzerokość siedziska po rozłożeniu: 110 cm\r\n\r\nWaga dopuszczalna:\r\n225 kg', 'image/11.jpg'),
(12, 3, 'Huśtawka RODZINNA', '690.00', 'Wymiary huśtawki:\r\n\r\ndługość: 250 cm\r\nszerokość: 180 cm\r\nsiedzisko: 150 cm (długość)', 'image/12.jpg'),
(13, 3, 'Huśtawka PALMA (kosz na pałąku)', '2290.00', 'Wymiary:\r\nKosz:\r\nSzerokość: 80 cm\r\nGłębokość: 78,5 cm\r\nWysokość: 99 cm\r\n\r\nHuśtawka:\r\nSzerokość: 107 cm\r\nGłębokość: 107 cm\r\nWysokość: 204 cm', 'image/13.jpg'),
(14, 3, 'Huśtawka RODZINNA z drabinką', '690.00', 'Wymiary:\r\ndługość: 250 cm\r\nszerokość: 180 cm\r\ndługość huśtawki (ławki): 150 cm\r\n', 'image/14.jpg'),
(15, 3, 'Huśtawka RODOS (fotel bujany na pałąku)', '2190.00', 'Dostępne kolory: \r\nbiały stelaż, granatowa poduszka \r\nczarny stelaż, pomarańczowa poduszka\r\nDane techniczne\r\nGłębokość 	125cm\r\nSzerokość 	111cm\r\nWysokość 	202cm', 'image/15.jpg'),
(16, 4, 'Ławka ogrodowa CLASSIC (drewno-metal)', '250.00', 'Wymiary ławki ogrodowej :\r\n\r\ndługość: 120 cm\r\nszerokość: 62 cm\r\nwysokość: 82 cm\r\nWysokość siedziska nad ziemią ok. 37cm.', 'image/16.jpg'),
(17, 4, 'Brązowa lawka sosnowa', '1950.00', 'Wymiary:\r\n\r\nSzerokość: 102 cm\r\nGłębokość: 50 cm\r\nWysokość: 91 cm\r\n\r\nWysokość siedziska: 41 cm\r\nWysokość podłokietnika: 64 cm\r\nWaga: 16 kg', 'image/17.jpg'),
(18, 4, 'Ławka ażurowa ORLEANS', '2600.00', 'Wymiary ławki :\r\n\r\nSzerokość: 162 cm\r\nWysokość: 86 cm\r\nGłębokość: 69 cm', 'image/18.jpg'),
(19, 4, 'Ławka GARDEN (sosna)', '1760.00', 'Dane techniczne\r\nWysokość 	95cm\r\nDługość 	160cm\r\nSzerokość	60cm', 'image/19.jpg'),
(20, 4, 'Ławeczka technorattanowa', '1250.00', 'Dane techniczne\r\nWysokość ławki 95cm\r\nDługość ławki  132cm\r\nSzerokość ławki 59cm', 'image/20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wiadomosc`
--

CREATE TABLE `wiadomosc` (
  `id_wiadomosci` int(11) NOT NULL,
  `tresc_wiadomosci` text COLLATE utf8_polish_ci NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `tytul_wiadomosci` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `wiadomosc`
--

INSERT INTO `wiadomosc` (`id_wiadomosci`, `tresc_wiadomosci`, `id_klienta`, `tytul_wiadomosci`) VALUES
(1, 'Testowa wiadomosc 1, to jest tresc', 9, 'Testowa wiadomosc'),
(3, 'Wlazl kotek na plotek jak dostal buta to nauczyl sie latac', 31, 'Ony'),
(4, 'Sprawdzam czy to działa.... Asia', 10, 'Hej');

-- --------------------------------------------------------

--
-- Table structure for table `zamowienie`
--

CREATE TABLE `zamowienie` (
  `id_zamowienia` int(11) NOT NULL,
  `id_dostawcy` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `data_zamowienia` datetime NOT NULL,
  `status_zamowienia` text COLLATE utf8_polish_ci NOT NULL,
  `uwagi` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `zamowienie`
--

INSERT INTO `zamowienie` (`id_zamowienia`, `id_dostawcy`, `id_klienta`, `data_zamowienia`, `status_zamowienia`, `uwagi`) VALUES
(2, 1, 9, '2016-06-10 00:56:56', 'paid', 'eyu'),
(174, 2, 10, '2016-06-11 13:47:09', 'waiting', 'aaa'),
(175, 1, 10, '2016-06-14 21:18:15', 'waiting', 'Brak'),
(176, 1, 9, '2016-06-15 01:41:19', 'waiting', 'Brak'),
(177, 1, 9, '2016-06-15 01:41:36', 'waiting', 'Brak'),
(178, 1, 9, '2016-06-15 01:41:52', 'waiting', 'Brak'),
(179, 1, 9, '2016-06-15 01:43:47', 'waiting', 'Brak'),
(180, 1, 9, '2016-06-15 01:56:55', 'waiting', 'Brak'),
(181, 1, 9, '2016-06-15 01:59:46', 'waiting', 'brak'),
(182, 1, 9, '2016-06-15 02:00:23', 'waiting', 'brak'),
(183, 1, 9, '2016-06-15 02:01:09', 'waiting', 'brak');

-- --------------------------------------------------------

--
-- Table structure for table `zamowienie_szczegoly`
--

CREATE TABLE `zamowienie_szczegoly` (
  `id_zamowienia_szczegoly` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zamowienie_szczegoly`
--

INSERT INTO `zamowienie_szczegoly` (`id_zamowienia_szczegoly`, `id_zamowienia`, `id_produktu`, `id_klienta`, `ilosc`) VALUES
(1, 171, 1, 29, 1),
(2, 172, 1, 29, 1),
(2, 172, 2, 29, 1),
(3, 173, 7, 31, 2),
(4, 174, 2, 10, 1),
(4, 174, 3, 10, 1),
(4, 174, 1, 10, 2),
(0, 2, 2, 9, 3),
(1, 2, 2, 9, 3),
(5, 175, 3, 10, 1),
(5, 175, 4, 10, 1),
(6, 177, 3, 9, 1),
(7, 183, 3, 9, 1),
(7, 183, 4, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indexes for table `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indexes for table `kurier`
--
ALTER TABLE `kurier`
  ADD PRIMARY KEY (`id_dostawcy`);

--
-- Indexes for table `opinia`
--
ALTER TABLE `opinia`
  ADD PRIMARY KEY (`id_opinii`);

--
-- Indexes for table `pracownik`
--
ALTER TABLE `pracownik`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indexes for table `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indexes for table `wiadomosc`
--
ALTER TABLE `wiadomosc`
  ADD PRIMARY KEY (`id_wiadomosci`);

--
-- Indexes for table `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id_zamowienia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `kurier`
--
ALTER TABLE `kurier`
  MODIFY `id_dostawcy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `opinia`
--
ALTER TABLE `opinia`
  MODIFY `id_opinii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `id_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `wiadomosc`
--
ALTER TABLE `wiadomosc`
  MODIFY `id_wiadomosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
