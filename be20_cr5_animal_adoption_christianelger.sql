-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Nov 2023 um 23:08
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be20_cr5_animal_adoption_christianelger`
--
CREATE DATABASE IF NOT EXISTS `be20_cr5_animal_adoption_christianelger` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be20_cr5_animal_adoption_christianelger`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `size` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `vaccinated` tinyint(1) NOT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `animal`
--

INSERT INTO `animal` (`animal_id`, `name`, `photo`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `position`) VALUES
(1, 'Fluffy', 'https://hips.hearstapps.com/hmg-prod/images/small-fluffy-dog-breeds-maltese-1622651883.jpg?crop=0.437xw:1.00xh;0.294xw,0&resize=980:*', 'Vienna', 'Rescue from the streets', 'Small', 3, 1, 'Mixed', 'available'),
(2, 'Buddy', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/YellowLabradorLooking_new.jpg/640px-YellowLabradorLooking_new.jpg', 'Vienna', 'Loves to play fetch', 'Large', 2, 1, 'Labrador', 'available'),
(3, 'Whiskers', 'https://www.zooplus.co.uk/magazine/wp-content/uploads/2019/05/Siamese-cat-beautiful-1024x685.jpg', 'Graz', 'Cuddly and friendly', 'Small', 9, 1, 'Siamese', 'available'),
(4, 'Mittens', 'https://www.thesprucepets.com/thmb/4H4K_nta-Zvv4yJgndStugkeqtg=/2782x0/filters:no_upscale():strip_icc()/calico-cats-profile-554694-hero-c7ba9806ce1f4fb1b4d4edc2fd820a0d.jpg', 'Vienna', 'Adventurous and playful', 'Small', 4, 1, 'Calico', 'available'),
(5, 'Rocky', 'https://upload.wikimedia.org/wikipedia/commons/d/d0/German_Shepherd_-_DSC_0346_%2810096362833%29.jpg', 'Vienna', 'Energetic and friendly', 'Large', 9, 1, 'German Shepherd', 'not available'),
(7, 'Max', 'https://upload.wikimedia.org/wikipedia/commons/9/93/Golden_Retriever_Carlos_%2810581910556%29.jpg', 'Vienna', 'Affectionate and gentle', 'Large', 9, 1, 'Golden Retriever', 'coming soon'),
(8, 'Cleo', NULL, 'Vienna', 'Graceful and elegant', 'Small', 10, 1, 'Siamese', 'Center'),
(12, 'Fluffy', 'fluffy.jpg', 'Shelter A', 'A fluffy cat looking for a home.', 'Medium', 3, 1, 'Domestic Shorthair', 'Available'),
(13, 'Buddy', 'buddy.jpg', 'Shelter B', 'Friendly dog with a big heart.', 'Large', 2, 1, 'Golden Retriever', 'Available'),
(14, 'Whiskers', 'whiskers.jpg', 'Shelter C', 'Playful kitten ready for adoption.', 'Small', 1, 1, 'Siamese', 'Available'),
(15, 'Max', 'max.jpg', 'Shelter A', 'Loyal and well-behaved dog.', 'Medium', 4, 1, 'German Shepherd', 'Available'),
(16, 'Mittens', 'mittens.jpg', 'Shelter B', 'Adorable kitten with unique markings.', 'Small', 1, 1, 'Calico', 'Available');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `adoption_id` int(11) NOT NULL,
  `user_number` int(11) DEFAULT NULL,
  `pet_number` int(11) DEFAULT NULL,
  `adoption_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `pet_adoption`
--

INSERT INTO `pet_adoption` (`adoption_id`, `user_number`, `pet_number`, `adoption_date`) VALUES
(1, 2, 7, '2023-11-24'),
(2, 2, 2, '2023-11-24'),
(3, 2, 4, '2023-11-24'),
(4, 2, 2, '2023-11-24'),
(5, 2, 2, '2023-11-24'),
(6, 2, 1, '2023-11-24'),
(7, 2, 2, '2023-11-24'),
(8, 2, 2, '2023-11-24'),
(9, 2, 1, '2023-11-24');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `password`, `picture`, `status`) VALUES
(1, 'Christian', 'Elger', 'c.r.e@outlook.at', '0660', 'wien', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'https://img.freepik.com/vektoren-kostenlos/laechelnder-kaukasischer-junge-mit-hut_1308-146805.jpg', 'adm'),
(2, 'richard', 'Elger', 'christian.elger@outlook.com', '0660', 'wien', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'https://images.tagseoblog.de/bilder/bild-foto/bild.jpg', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indizes für die Tabelle `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `user_number` (`user_number`),
  ADD KEY `pet_number` (`pet_number`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`user_number`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`pet_number`) REFERENCES `animal` (`animal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
