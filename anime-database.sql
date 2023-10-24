-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Okt 24. 13:03
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `anime_database`
--
CREATE DATABASE IF NOT EXISTS `anime_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `anime_database`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `animes`
--

CREATE TABLE `animes` (
  `anime_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cover_image` text NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `studio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `animes`
--

INSERT INTO `animes` (`anime_id`, `title`, `cover_image`, `description`, `category_id`, `studio_id`) VALUES
(1, 'Jujutsu Kaisen', 'https://github.com/kovpal322/2.csoport/blob/main/jujutsu.jpg?raw=true', 'The story follows Yuji Itadori, a high school student with impressive athletic abilities who stumbles upon a cursed object containing a malicious curse known as Sukuna. After inadvertently releasing the curse, Yuji becomes involved in the world of Jujutsu Sorcerers, individuals who battle curses and supernatural threats. He joins Tokyo Jujutsu High, where he learns to control cursed energy and fights alongside other sorcerers to prevent curses from harming the world. The series is known for its intense action, compelling characters, and intricate supernatural lore, making it a favorite among manga and anime enthusiasts.', 1, 1),
(2, 'A Silent Voice', 'https://github.com/kovpal322/2.csoport/blob/main/silentvoice.jpg?raw=true', ' the story revolves around Shoya Ishida, a young boy who bullies a deaf classmate named Shoko Nishimiya during elementary school. As a result, Nishimiya transfers to another school, and Ishida becomes an outcast himself.\r\n\r\nYears later, plagued by guilt and a desire for redemption, Ishida sets out to reconnect with Nishimiya. The film sensitively explores themes of bullying, redemption, and the power of communication, depicting the characters\' emotional struggles and growth. \"A Silent Voice\" is acclaimed for its beautiful animation, poignant storytelling, and heartfelt portrayal of social issues, earning praise from audiences and critics alike.', 2, 2),
(3, 'Attack On Titan', 'https://github.com/kovpal322/2.csoport/blob/main/aot.jpg?raw=true', ' The story is set in a world where humanity resides within enormous walled cities to protect themselves from the sudden emergence of humanoid creatures known as Titans, who devour humans seemingly without reason.\r\n\r\nThe narrative primarily follows Eren Yeager, his adoptive sister Mikasa Ackerman, and their friend Armin Arlert as they join the military to fight the Titans after their hometown is destroyed and Eren\'s mother is killed by one of these creatures. As the series progresses, it delves into complex themes such as survival, freedom, betrayal, and the mysteries surrounding the Titans and the walls that protect humanity.\r\n\r\n\"Attack on Titan\" is known for its intense and brutal action sequences, intricate plot twists, and deep character development. It has been adapted into anime series, films, and various other media, gaining a massive global fanbase and critical acclaim for its compelling storytelling and unpredictable narrative.', 3, 4),
(4, 'The Yuzuki Family\'s Four Sons', 'https://github.com/kovpal322/2.csoport/blob/main/yuzu.jpg?raw=true', 'The Yuzuki family, which consists of four brothers, lost their parents two years ago. Hayato, the eldest son, is a hard worker and the pillar of the family.', 2, 2),
(5, 'Naruto', 'https://github.com/kovpal322/2.csoport/blob/main/naruto.jpg?raw=true', 'The story follows Naruto Uzumaki, a young ninja with a sealed demon fox spirit called Nine-Tails Fox (Kurama) within him. Naruto is ostracized by the villagers of Konohagakure, the Hidden Leaf Village, because of the beast sealed inside him. Despite this, Naruto aspires to become the strongest ninja and the leader of his village, known as the Hokage.\r\n\r\nThroughout the series, Naruto embarks on various adventures, forms bonds with his fellow ninjas, and undergoes intense training to improve his skills. Along the way, he faces formidable enemies, uncovers secrets about his past, and strives to gain the recognition and acceptance he craves from his peers and the village.', 1, 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `anime_comments`
--

CREATE TABLE `anime_comments` (
  `comment_id` int(11) NOT NULL,
  `anime_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `backgroundimages`
--

CREATE TABLE `backgroundimages` (
  `backgroundimage_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `backgroundimages`
--

INSERT INTO `backgroundimages` (`backgroundimage_id`, `name`, `image_path`) VALUES
(1, 'Jujutsu_kaisen', 'https://github.com/kovpal322/2.csoport/blob/main/backgrounds/jujutsu-kaisen-4k-satoru-gojo-xa9thf1tl6fpqf48.jpg?raw=true'),
(2, 'Attack_On_Titan', 'https://github.com/kovpal322/2.csoport/blob/main/backgrounds/attack-on-titans-4k-levi-bloody-blade-dr838x9ilgkuor28.jpg?raw=true'),
(3, 'Naruto', 'https://github.com/kovpal322/2.csoport/blob/main/backgrounds/naruto-4k-shuriken-bterxiceuky7q0ob.jpg?raw=true'),
(4, 'Yuzuki_Family_Four_Sons', 'https://github.com/kovpal322/2.csoport/blob/main/backgrounds/b7fd0b9343fba20a722cdf479d811941.jpe?raw=true'),
(5, 'A_Silent_Voice', 'https://github.com/kovpal322/2.csoport/blob/main/backgrounds/a-silent-voice-background-12fabqt7yo7xddm1.jpg?raw=true');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Shounen'),
(2, 'Slice of Life'),
(3, 'Seinen');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `favorite_animes`
--

CREATE TABLE `favorite_animes` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `anime_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message_text` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `studios`
--

CREATE TABLE `studios` (
  `studio_id` int(11) NOT NULL,
  `studio_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `studios`
--

INSERT INTO `studios` (`studio_id`, `studio_name`) VALUES
(1, 'Viz media'),
(2, 'Libristo'),
(3, 'Shingeki no Kyojin'),
(4, 'Crunchyroll'),
(5, 'MangaFan');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`anime_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `studio_id` (`studio_id`);

--
-- A tábla indexei `anime_comments`
--
ALTER TABLE `anime_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `anime_id` (`anime_id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `backgroundimages`
--
ALTER TABLE `backgroundimages`
  ADD PRIMARY KEY (`backgroundimage_id`);

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- A tábla indexei `favorite_animes`
--
ALTER TABLE `favorite_animes`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `anime_id` (`anime_id`);

--
-- A tábla indexei `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- A tábla indexei `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`studio_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `animes`
--
ALTER TABLE `animes`
  MODIFY `anime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `anime_comments`
--
ALTER TABLE `anime_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `backgroundimages`
--
ALTER TABLE `backgroundimages`
  MODIFY `backgroundimage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `favorite_animes`
--
ALTER TABLE `favorite_animes`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `studios`
--
ALTER TABLE `studios`
  MODIFY `studio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `animes`
--
ALTER TABLE `animes`
  ADD CONSTRAINT `animes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `animes_ibfk_2` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`studio_id`);

--
-- Megkötések a táblához `anime_comments`
--
ALTER TABLE `anime_comments`
  ADD CONSTRAINT `anime_comments_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`anime_id`),
  ADD CONSTRAINT `anime_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Megkötések a táblához `favorite_animes`
--
ALTER TABLE `favorite_animes`
  ADD CONSTRAINT `favorite_animes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `favorite_animes_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`anime_id`);

--
-- Megkötések a táblához `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
