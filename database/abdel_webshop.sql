-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 04 nov 2022 om 08:34
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
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `carts`
--

INSERT INTO `carts` (`id`, `user`) VALUES
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5),
(51, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(57, 5),
(58, 5),
(59, 5),
(60, 5),
(61, 5),
(62, 5),
(63, 5),
(64, 5),
(65, 5),
(66, 5),
(67, 5),
(68, 5),
(69, 5),
(70, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `cart` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `nbrElement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart`, `product`, `nbrElement`) VALUES
(79, 45, 4, 4),
(80, 45, 4, 4),
(81, 68, 4, 3),
(82, 68, 5, 2),
(83, 69, 4, 3),
(84, 69, 5, 2),
(85, 70, 4, 3),
(86, 70, 5, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `cart` int(11) NOT NULL,
  `totalPrice` double NOT NULL,
  `checkout` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `payments`
--

INSERT INTO `payments` (`id`, `cart`, `totalPrice`, `checkout`) VALUES
(41, 70, 675, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `filename`) VALUES
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
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'abdel', 'nejjari@abdel.nl', 'abdel'),
(5, 'monaim', 'abdelmounaimne@outlook.nl', 'mijnpassword'),
(6, 'user', 'user@user.com', 'user'),
(16, 'abdelmounaim', 'abdelmounaimne@gmail.com', 'Dat_Is_Geen_Wachtwoord'),
(19, 'aaa', 'bbb@cc.ll', 'abdel');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user`);

--
-- Indexen voor tabel `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart`),
  ADD KEY `product_id` (`product`);

--
-- Indexen voor tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT voor een tabel `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT voor een tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`id`);

--
-- Beperkingen voor tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`cart`) REFERENCES `carts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
