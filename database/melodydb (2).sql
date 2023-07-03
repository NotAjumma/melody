-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 10:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melodydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `album_title` varchar(200) NOT NULL,
  `artist` varchar(200) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `average_rating` float NOT NULL,
  `descriptions` varchar(355) NOT NULL,
  `ranking` int(50) NOT NULL,
  `number_ratings` int(50) NOT NULL,
  `number_reviews` int(50) NOT NULL,
  `price` float NOT NULL,
  `album_cover` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `album_title`, `artist`, `genre`, `release_date`, `average_rating`, `descriptions`, `ranking`, `number_ratings`, `number_reviews`, `price`, `album_cover`) VALUES
(1, 'OK Computer', 'Radiohead', 'Alternative Rock, Art Rock', '1997-06-16', 4.23, 'melancholic, anxious, futuristic, alienation, existential, male vocals, atmospheric, lonely, cold, introspective', 1, 70382, 1531, 31, 'https://www.nme.com/wp-content/uploads/2017/05/RadioheadOkComputer.jpg'),
(2, 'Wish You Were Here', 'Pink Floyd', 'Progressive Rock, Art Rock', '1975-09-12', 4.29, 'melancholic, atmospheric, progressive, male vocals, concept album, introspective, serious, longing, bittersweet, meditative', 2, 48662, 983, 29, 'https://faroutmagazine.co.uk/static/uploads/1/2019/05/%E2%80%98Wish-You-Were-Here%E2%80%99-%E2%80%93-Pink-Floyd-cover-meaning.jpg'),
(3, 'In the Court of the Crimson King', 'King Crimson', 'Progressive Rock, Art Rock', '1969-10-10', 4.3, 'fantasy, epic, progressive, philosophical, complex, surreal, poetic, male vocals, melancholic, technical', 3, 44943, 870, 94, 'https://i.kym-cdn.com/entries/icons/original/000/029/615/pc7y6gkh1y5y.jpg'),
(4, 'Kid A', 'Radiohead', 'Art Rock, Experimental Rock, Electronic', '2000-10-02', 4.21, 'cold, melancholic, futuristic, atmospheric, anxious, cryptic, sombre, abstract, introspective, male vocals', 4, 58590, 734, 34, 'https://i.redd.it/xj1v3as2zii91.jpg'),
(5, 'To Pimp a Butterfly', 'Kendrick Lamar', 'Conscious Hip Hop, West Coast Hip Hop, Jazz Rap', '2015-03-15', 4.27, 'political, conscious, poetic, protest, concept album, introspective, urban, male vocals, eclectic, passionate', 5, 44206, 379, 27, 'https://i.pinimg.com/originals/d3/b8/6c/d3b86cac17b13f95a31cf2c23de4ed38.jpg'),
(6, 'Loveless', 'My Bloody Valentine', 'Shoegaze, Noise Pop', '1991-11-04', 4.24, 'noisy, ethereal, atmospheric, romantic, dense, hypnotic, love, psychedelic, lush, bittersweet', 6, 49, 1223, 87, 'https://upload.wikimedia.org/wikipedia/en/4/4b/My_Bloody_Valentine_-_Loveless.png'),
(7, 'The Dark Side of the Moon', 'Pink Floyd', 'Art Rock, Progressive Rock', '1973-03-01', 4.2, 'philosophical, atmospheric, introspective, existential, mellow, concept album, male vocals, psychedelic, progressive, epic', 7, 57622, 1549, 22, 'https://upload.wikimedia.org/wikipedia/en/3/3b/Dark_Side_of_the_Moon.png'),
(8, 'Abbey Road', 'The Beatles', 'Pop Rock', '1969-09-26', 4.25, 'melodic, warm, male vocals, bittersweet, summer, uplifting, love, romantic, medley, happy', 8, 44544, 961, 54, 'https://images.radiox.co.uk/images/67172?width=1400&crop=16_9&signature=oOzOBNznUl35DsUl5UoB-DVZlRQ='),
(9, 'The Velvet Underground & Nico', 'The Velvet Underground & Nico', 'Art Rock, Experimental Rock', '1967-03-12', 4.23, 'drugs, sexual, raw, urban, noisy, nihilistic, avant-garde, male vocals, eclectic, female vocals', 9, 45570, 929, 23, 'https://upload.wikimedia.org/wikipedia/en/0/0c/Velvet_Underground_and_Nico.jpg'),
(10, 'The Rise and Fall of Ziggy Stardust and the Spiders From Mars', 'David Bowie', 'Glam Rock, Pop Rock', '1972-06-16', 4.26, 'science fiction, melodic, anthemic, concept album, passionate, male vocals, rock opera, bittersweet, energetic, triumphant', 10, 39, 721, 26, 'https://upload.wikimedia.org/wikipedia/en/0/01/ZiggyStardust.jpg'),
(11, 'Revolver', 'The Beatles', 'Pop Rock, Psychedelic Pop', '1966-08-05', 4.23, 'psychedelic, melodic, male vocals, drugs, eclectic, warm, playful, quirky, happy, surreal', 11, 43178, 1160, 60, 'https://upload.wikimedia.org/wikipedia/en/e/ec/Revolver_%28album_cover%29.jpg'),
(12, 'Madvillainy', 'Madvillain', 'Abstract Hip Hop', '2004-03-23', 4.26, 'sampling, playful, cryptic, humorous, abstract, mysterious, eclectic, surreal, male vocals, boastful', 12, 35573, 376, 76, 'https://upload.wikimedia.org/wikipedia/en/5/5e/Madvillainy_cover.png'),
(13, 'Remain in Light', 'Talking Heads', 'New Wave, Post-Punk', '1980-10-08', 4.25, 'rhythmic, anxious, energetic, male vocals, playful, cryptic, abstract, quirky, philosophical, repetitive', 13, 36196, 520, 202, 'https://upload.wikimedia.org/wikipedia/en/2/2d/TalkingHeadsRemaininLight.jpg'),
(14, 'The Black Saint and the Sinner Lady', 'Mingus', 'Avant-Garde Jazz, Third Stream', '0000-00-00', 4.34, 'instrumental, complex, passionate, suite, dense, avant-garde, suspenseful, technical, concept album, manic', 14, 20251, 365, 20, 'https://upload.wikimedia.org/wikipedia/en/2/2e/Mingus_Black_Saint.jpg'),
(15, 'In Rainbows', 'Radiohead', 'Art Rock, Alternative Rock', '2007-10-10', 4.18, 'lush, male vocals, melancholic, introspective, bittersweet, warm, mellow, atmospheric, ethereal, longing', 15, 48484, 756, 284, 'https://upload.wikimedia.org/wikipedia/en/1/14/Inrainbowscover.png'),
(16, 'A Love Supreme', 'John Coltrane', 'Spiritual Jazz', '0000-00-00', 4.3, 'passionate, spiritual, instrumental, improvisation, complex, suite, acoustic, meditative, avant-garde, religious', 16, 25040, 433, 253, 'https://upload.wikimedia.org/wikipedia/en/9/9a/John_Coltrane_-_A_Love_Supreme.jpg'),
(17, 'good kid, m.A.A.d city', 'Kendrick Lamar', 'West Coast Hip Hop, Conscious Hip Hop', '2012-10-22', 4.2, 'urban, crime, concept album, conscious, introspective, male vocals, passionate, existential, violence, bittersweet', 17, 38939, 315, 89, 'https://upload.wikimedia.org/wikipedia/en/9/93/KendrickGKMC.jpg'),
(18, 'Paranoid', 'Black Sabbath', 'Heavy Metal, Hard Rock', '1970-09-18', 4.19, 'heavy, dark, war, political, ominous, male vocals, drugs, science fiction, pessimistic, alienation', 18, 35870, 582, 58, 'https://upload.wikimedia.org/wikipedia/en/6/64/Black_Sabbath_-_Paranoid.jpg'),
(19, 'Kind of Blue', 'Miles Davis', 'Modal Jazz, Cool Jazz', '1959-08-17', 4.23, 'instrumental, mellow, improvisation, nocturnal, soothing, calm, acoustic, meditative', 19, 29907, 549, 99, 'https://upload.wikimedia.org/wikipedia/en/9/9c/MilesDavisKindofBlue.jpg'),
(20, 'Pet Sounds', 'The Beach Boys', 'Baroque Pop', '1966-05-16', 4.18, 'Wall of Sound, warm, bittersweet, love, romantic, melancholic, lush, melodic, introspective, vocal group', 20, 36305, 727, 72, 'https://cdns-images.dzcdn.net/images/cover/4a5004943ff1c8bf41473fbcdf5e3326/500x500.jpg'),
(21, 'Illmatic', 'Nas', 'East Coast Hip Hop, Boom Bap, Hardcore Hip Hop', '1994-04-19', 4.2, 'urban, crime, introspective, sampling, philosophical, conscious, rhythmic, drugs, male vocals, boastful', 21, 30886, 619, 88, 'https://upload.wikimedia.org/wikipedia/en/2/27/IllmaticNas.jpg'),
(22, 'Lift Yr. Skinny Fists Like Antennas to Heaven!', 'Godspeed You Black Emperor!', 'Post-Rock', '2000-10-09', 4.17, 'instrumental, epic, melancholic, atmospheric, apocalyptic, suspenseful, suite, sampling, complex, hypnotic', 22, 34973, 612, 34, 'https://upload.wikimedia.org/wikipedia/en/d/d3/Liftyrskinnyfists.jpg'),
(23, 'In the Aeroplane Over the Sea', 'Neutral Milk Hotel', 'Indie Folk, Indie Rock', '1998-02-10', 4.09, 'passionate, poetic, death, cryptic, surreal, bittersweet, acoustic, melodic, male vocals, love', 23, 47979, 968, 96, 'https://upload.wikimedia.org/wikipedia/en/8/83/In_the_aeroplane_over_the_sea_album_cover_copy.jpg'),
(24, 'Sgt. Pepper\'s Lonely Hearts Club Band', 'The Beatles', 'Psychedelic Pop, Pop Rock', '1967-05-26', 4.13, 'psychedelic, playful, melodic, male vocals, warm, optimistic, eclectic, lush, uplifting, drugs', 24, 43, 863, 60, 'https://www.udiscovermusic.com/wp-content/uploads/2018/01/SgtPepper-1.jpg'),
(25, 'Enter the Wu-Tang (36 Chambers)', 'Wu-Tang Clan', 'East Coast Hip Hop, Boom Bap, Hardcore Hip Hop', '1993-11-09', 4.19, 'urban, aggressive, raw, crime, boastful, rhythmic, energetic, violence, dark, sampling', 25, 27, 425, 76, 'https://upload.wikimedia.org/wikipedia/en/5/53/Wu-TangClanEntertheWu-Tangalbumcover.jpg'),
(26, 'Red', 'King Crimson', 'Progressive Rock, Art Rock', '1974-10-06', 4.21, 'dark, anxious, heavy, technical, ominous, complex, uncommon time signatures, progressive, male vocals, nocturnal', 26, 23, 405, 20, 'https://upload.wikimedia.org/wikipedia/en/6/6c/Red%2C_King_Crimson.jpg'),
(27, 'My Beautiful Dark Twisted Fantasy', 'Kanye West', 'Pop Rap, Hip Hop', '2010-11-22', 4.07, 'epic, boastful, passionate, sampling, hedonistic, vulgar, melodic, anthemic, introspective, male vocals', 27, 48, 636, 202, 'https://upload.wikimedia.org/wikipedia/en/thumb/b/be/MBDTF_ALT.jpg/220px-MBDTF_ALT.jpg'),
(28, 'Pink Moon', 'Nick Drake', 'Contemporary Folk, Singer/Songwriter', '1972-02-25', 4.18, 'acoustic, melancholic, lonely, mellow, introspective, poetic, calm, male vocals, pastoral, soft', 28, 29, 536, 89, 'https://upload.wikimedia.org/wikipedia/en/3/3c/NickDrakePinkMoon.jpg'),
(29, 'Spiderland', 'Slint', 'Post-Rock, Post-Hardcore, Math Rock', '1991-03-27', 4.15, 'lonely, anxious, sombre, uncommon time signatures, dark, suspenseful, melancholic, atmospheric, cryptic, ominous', 29, 32, 452, 34, 'https://i.guim.co.uk/img/static/sys-images/Guardian/Pix/pictures/2014/5/1/1398957792272/Spiderland-album-cover-sh-013.jpg?width=465&quality=85&dpr=1&s=none'),
(30, 'Disintegration', 'The Cure', 'Gothic Rock, Post-Punk', '1989-05-02', 4.17, 'melancholic, romantic, ethereal, atmospheric, nocturnal, sad, bittersweet, love, introspective, male vocals', 30, 29, 413, 34, 'https://upload.wikimedia.org/wikipedia/en/b/b8/CureDisintegration.jpg'),
(31, 'Endtroducing.....', 'DJ Shadow', 'Instrumental Hip Hop, Experimental Hip Hop, Plunde', '1996-09-16', 4.11, 'sampling, instrumental, atmospheric, urban, mysterious, nocturnal, rhythmic, sombre, hypnotic, eclectic', 47, 26775, 410, 41, 'https://upload.wikimedia.org/wikipedia/en/c/c1/Endtroducingcover.jpg'),
(32, 'The Low End Theory', 'A Tribe Called Quest', 'Jazz Rap, East Coast Hip Hop, Conscious Hip Hop', '1991-09-24', 4.12, 'rhythmic, mellow, urban, male vocals, sampling, conscious, boastful, playful, poetic, nocturnal', 56, 24090, 290, 90, 'https://upload.wikimedia.org/wikipedia/en/4/42/ATribeCalledQuestTheLowEndtheory.jpg'),
(34, '', '', '', '0000-00-00', 0, '', 0, 0, 0, 0, 'https://www.nme.com/wp-content/uploads/2017/05/RadioheadOkComputer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `card_number` int(20) NOT NULL,
  `expiration` varchar(50) NOT NULL,
  `security_code` varchar(5) NOT NULL,
  `card_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `username`, `name`, `card_number`, `expiration`, `security_code`, `card_type`) VALUES
(2, 'naim', 'Muhd Naim', 3056, '01/23', '7653', 'diners'),
(4, 'naim', 'Muhd Naim', 3714, '08/22', '983', 'american express'),
(6, 'naim', 'muhd naim', 4000, '09/25', '4322', 'visa'),
(7, 'naim', 'Nina', 3566, '10/02', '1234', 'jcb'),
(11, 'naim', 'Sharul', 6759, '08/88', '7777', 'maestro'),
(16, 'ali', 'Ali baba', 3566, '09/99', '7655', 'jcb'),
(17, 'kaka', 'Kaka', 5200, '07/77', '655', 'mastercard');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `sub_id` int(10) NOT NULL,
  `id` int(20) NOT NULL,
  `feature_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`sub_id`, `id`, `feature_name`) VALUES
(1, 1, 'unlimited skips'),
(1, 2, 'no ads');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `sub_name`) VALUES
(1, 'Monthly'),
(2, 'Yearly'),
(3, 'Mini');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(355) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `nickname`, `date_of_birth`, `gender`, `profile_pic`, `role_id`) VALUES
('adha', '$2y$10$4X1hFDOKIXLcRsQC4ZkGwudUETCd4sGdRoNIa4AXP18e/zA8jpueW', 'paksamad55@gmail.com', 'adha', '2023-06-07', 'Prefer not to say', '', 2),
('admin', '$2y$10$ZaN2UHK6omY8MK0J0x19L.0Dslh.2nn5kfhbYkZYo0YPYGeM2mGSm', 'admin@gmail.com', 'admin 2', '2023-05-29', 'Male', '', 1),
('akmal', '$2y$10$iPKKm5Gy911RDFUaVixn4e9e7pVxSjhyPZn6oD0KB2cDjb1c1Z46e', 'akmal@gmail.com', 'akmal', '2023-06-27', 'Prefer not to say', 'none', 2),
('ali', '$2y$10$lCLfoK.al73nleZhu/DcY.s0woQUHER7qlJy0tiwRr4f3./x6qlwe', 'ali@gmail.com', 'ali the Slayesssss', '2023-05-29', 'Male', '', 2),
('kaka', '$2y$10$OjcTphh/VBrEehPTws2rfuOrmlOiIhvCd/wFxg5rO39iMhYGbQb4S', 'kaka@gmail.com', 'kaka', '2023-06-27', 'Male', 'none', 2),
('naim', '$2y$10$H14Ii3zULAx9MkuRBNwZouuVoFDsUaCmM4QCge98aGiZndpxJ1.Hi', 'naim99@yahoo.com', 'damnboi', '2003-12-29', 'Prefer not to say', '', 2),
('paksamad', '$2y$10$N5YC0MzOAsd2HetzpjKLa.tTBUfWoboJGMO71r3lCFnZBnxZ88H8K', 'paksamad55@gmail.com', 'paksamad rangers', '2023-05-31', 'Male', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usersubscription`
--

CREATE TABLE `usersubscription` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_id` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `started_date` date DEFAULT NULL,
  `ended_date` date NOT NULL,
  `durationMonth` int(30) NOT NULL,
  `total_amount` float NOT NULL,
  `status` varchar(100) NOT NULL,
  `card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usersubscription`
--

INSERT INTO `usersubscription` (`id`, `sub_id`, `username`, `started_date`, `ended_date`, `durationMonth`, `total_amount`, `status`, `card_id`) VALUES
(13, 1, 'naim', '2023-06-30', '2023-08-30', 2, 14.9, 'active', 9),
(14, 1, 'ali', '2023-07-02', '2023-09-02', 2, 14.9, 'active', 16),
(15, 1, 'kaka', '2023-07-03', '2023-09-03', 2, 14.9, 'active', 17);

-- --------------------------------------------------------

--
-- Table structure for table `user_albums`
--

CREATE TABLE `user_albums` (
  `id` int(11) NOT NULL,
  `date_purchased` date NOT NULL,
  `total_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_albums_details`
--

CREATE TABLE `user_albums_details` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `album_id` int(50) NOT NULL,
  `user_album_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `usersubscription`
--
ALTER TABLE `usersubscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `user_id` (`username`),
  ADD KEY `usersub_card` (`card_id`);

--
-- Indexes for table `user_albums`
--
ALTER TABLE `user_albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_albums_details`
--
ALTER TABLE `user_albums_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usersubscription`
--
ALTER TABLE `usersubscription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_albums`
--
ALTER TABLE `user_albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_albums_details`
--
ALTER TABLE `user_albums_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `usersubscription`
--
ALTER TABLE `usersubscription`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usersubscription_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
