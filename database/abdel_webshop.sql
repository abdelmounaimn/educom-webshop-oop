-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 24 okt 2022 om 07:34
-- Serverversie: 10.4.25-MariaDB
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdel_webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `nbr_items` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `cart_items`
--

INSERT INTO `cart_items` (`cart_item_id`, `cart_id`, `product_id`, `nbr_items`) VALUES
(1, 1, 6, 1),
(2, 1, 3, 2),
(3, 1, 5, 3),
(4, 2, 6, 1),
(5, 2, 3, 2),
(6, 2, 5, 3),
(7, 3, 6, 1),
(8, 3, 3, 2),
(9, 3, 5, 5),
(10, 4, 6, 1),
(11, 4, 3, 3),
(12, 4, 5, 3),
(13, 5, 6, 1),
(14, 5, 3, 3),
(15, 5, 5, 4),
(16, 6, 6, 1),
(17, 6, 3, 3),
(18, 6, 5, 4),
(19, 7, 6, 1),
(20, 7, 3, 3),
(21, 7, 5, 4),
(22, 9, 3, 3),
(23, 9, 5, 3),
(24, 10, 3, 5),
(25, 10, 5, 5),
(26, 11, 3, 5),
(27, 11, 5, 5),
(28, 12, 3, 5),
(29, 12, 5, 5),
(30, 13, 3, 5),
(31, 13, 5, 5),
(32, 14, 3, 5),
(33, 14, 5, 5),
(34, 15, 3, 5),
(35, 15, 5, 5),
(36, 16, 3, 5),
(37, 16, 5, 5),
(38, 17, 3, 5),
(39, 17, 5, 5),
(40, 18, 3, 5),
(41, 18, 5, 5),
(42, 19, 3, 5),
(43, 19, 5, 5),
(44, 21, 3, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `checkout` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `payments`
--

INSERT INTO `payments` (`payment_id`, `cart_id`, `total_price`, `checkout`) VALUES
(1, 2, 287.97, 0),
(2, 3, 287.97, 0),
(3, 4, 288.97, 0),
(4, 5, 334.96, 0),
(5, 6, 334.96, 0),
(6, 7, 334.96, 0),
(7, 9, 139.97, 0),
(8, 10, 5224.95, 0),
(9, 11, 5224.95, 0),
(10, 12, 5224.95, 0),
(11, 13, 5224.95, 0),
(12, 14, 5224.95, 0),
(13, 15, 5224.95, 0),
(14, 16, 5224.95, 0),
(15, 17, 5224.95, 0),
(16, 18, 5224.95, 0),
(17, 19, 5224.95, 0),
(18, 20, 0, 0),
(19, 21, 4995, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `filename`) VALUES
(2, 'BLACK+DECKER elektrische grastrimmer BESTA530-CM', 'De BLACK+DECKER elektrische grastrimmer BESTA530-CM is een veelzijdige machine. De grastrimmer heeft een lichte, telescopische verstelbare steel waardoor de machine voor iedereen comfortabel te gebruiken is. En met de extra handgreep met softgrip heb je een goede controle over je handgreep. De automatische draadtoevoer zorgt dat het trimdraad altijd de optimale werklengte heeft en voorkomt vieze handen. De grastrimmer werkt op netspanning en heeft een vermogen van 550 Watt. Met de maaibreedte van 30 cm is de machine perfect voor in grotere tuinen. De BESTA530-CM grastrimmer heeft 3 verschillende functies. Het kan maaien, trimmen en kant snijden. Doormiddel van het Click & Go systeem wissel je gemakkelijk van functie. De trimmer heeft de E-Drive technologie die zorgt dat ook zwaarder trimwerk mogelijk is. De lichte wielbasis zorgt ervoor dat je de maaier kan gebruiken op kleine egale oppervlakten. En deze machine is compact op te bergen vergeleken met een traditionele grasmaaier. De grastrimmer wordt geleverd met een plantenbeschermbeugel. Kortom, de BLACK+DECKER elektrische grastrimmer BESTA530-QS is een fijn hanteerbare machine.\r\n', '86.99', 'images/1.jfif'),
(3, 'Gardena robotmaaier Sileno city 470m²', 'Gazonverzorging kan zo eenvoudig en moeiteloos zijn, zelfs in stadstuinen! Met zijn SensorCut systeem maait de GARDENA SILENO city uw gras op een nauwkeurige en betrouwbare manier. U geniet van uw vrije tijd en een perfect onderhouden gazon. De SILENO city is geschikt voor kleinere gazons tot 470 vierkante meter. Hij maait op hellingen tot 25% en ook smalle doorgangen zijn geen probleem. Het zwenkbare achterwiel geeft de robotmaaier zijn uitstekende flexibiliteit en wendbaarheid, ideaal voor kleine en smalle tuinen. De nieuwe SILENO city werkt tijdens alle weersomstandigheden en is zo stil dat hij nauwelijks gehoord zal worden. Als het werk klaar is, keert hij automatisch terug naar het laadstation. Tijdens de installatie leidt de installatiehulp u door de menu\'s en berekent hij een maaiplan. De maaitijden kunt u ook zelf instellen. De robotmaaier werkt alleen wanneer u dat wilt.', '999.00', 'images/2.jfif'),
(4, 'LUX accu- en lader starterset 20V 2,0Ah', 'De LUX accu en lader set 20V bestaat uit een LUX accu 20V / 2Ah en een LUX acculader 20V. Het volladen van de 2Ah accu duurt ongeveer een uur met de acculader 20V. De accu is onderdeel van het LUX accuplatform. Dit betekent dat je deze accu kan gebruiken met alle LUX 20V (tuin)machines.', '36.99', 'images/3.jfif'),
(5, 'LUX 20V accu heggenschaar (zonder accu)', 'De LUX accu heggenschaar geeft je alle vrijheid tijdens het snoeien. Omdat de machine gebruik maakt van een accu ben je niet meer afhankelijk van een stopcontact of verlengsnoeren.De heggenschaar heeft een zwaardlengte van 520 mm en kan takken snoeien met een maximale dikte van 14 mm. De beschermkap zorgt ervoor dat je veilig kan snoeien. De grote handgreep zorgt ervoor dat je altijd grip hebt op de machine. Ook moet je deze greep ingeknepen houden, anders gaat de heggenschaar niet aan. Zo voorkom je ongelukken!De LUX accu heggenschaar maakt gebruik van de LUX uitwisselbare 20V accu. Deze kan je gebruiken met alle 20V LUX machine, hierdoor kan je al je machines gebruiken met maar één accu. Deze heggenschaar wordt geleverd zonder accu, deze zijn apart verkrijgbaar met een capaciteit van 2Ah of 4Ah.', '45.99', 'images/4.jfif'),
(6, 'Little Tikes glijbaan jungle', 'Deze Little Tikes Jungle glijbaan is groot genoeg om kids urenlang speelplezier te laten beleven, maar kan toch heel eenvoudig worden opgeborgen! Ideaal voor peuters, met makkelijke treden om te klimmen, een brede basis voor stabiliteit en een flauwe helling. En als je kleintje klaar is voor ander speelgoed, dan maakt de Easy Store zijn naam waar en is makkelijk op te vouwen en op te bergen. Lengte van de glijbaan: 180 cm. Met geïntegreerde grepen ter ondersteuning en voor de veiligheid. Deze glijbaan is uitgevoerd in de mooie kleuren donkerblauw, groen en grijs. Afmetingen: 142 x 197 x 120 cm. Wordt geleverd in doos met poster. Geschikt voor kinderen vanaf 2 jaar.', '149.00', 'images/5.jfif');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'abdel', 'nejjari@abdel.nl', 'abdel'),
(5, 'user', 'user@webshop.nl', 'user');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT voor een tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Beperkingen voor tabel `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Beperkingen voor tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
