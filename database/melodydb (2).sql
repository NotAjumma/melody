-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 10:09 AM
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
(17, 'kaka', 'Kaka', 5200, '07/77', '655', 'mastercard'),
(30, 'paksamad', 'Sharul', 3056, '08/88', '8989', 'diners'),
(44, 'ali', '8967', 3566, '08/90', '890', 'jcb');

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
(0, 'Free Plan'),
(1, 'Monthly'),
(2, 'Yearly');

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
('admin', '$2y$10$bwz2yctmbgpiYQAl5BUPPeEe9HNsrzgJPyUslrlNeJmLrpU4s6t1S', 'admin@gmail.com', 'admin', '2023-05-29', 'Male', '', 1),
('ali', '$2y$10$2N5acmBBJS74iHtVOOExWeULRelq4EZ9Xidv3XkEQvGx47U7qB8KS', 'ali@gmail.com', 'ali the Slayesssss', '2023-05-29', 'Male', '1688851934_085d51f29320a0bdd865.jpg', 2),
('naim', '$2y$10$5oyXdD4lwTUniBDmUXzxveTrm4uzUCKyL2m622Dux3ZvFvdOhmH7W', 'naim99@yahoo.com', 'damnboison', '2003-12-29', 'Prefer not to say', '', 2),
('paksamad', '$2y$10$NUHxxb.7oTxFhG8sgoxkqu2QPvz6kqJxzURN9nLt0An1jWeo5lypq', 'paksamad55@gmail.com', 'paksamads', '2023-07-05', 'Male', '', 2);

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
(39, 2, 'naim', '2023-07-11', '2024-07-11', 12, 130.9, 'Active', 0),
(48, 1, 'paksamad', '2023-07-12', '2023-08-12', 12, 130.9, 'Active', 0),
(56, 1, 'ali', '2023-07-08', '2023-08-08', 1, 14.9, 'active', 44);

-- --------------------------------------------------------

--
-- Table structure for table `user_albums`
--

CREATE TABLE `user_albums` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date_purchased` date NOT NULL,
  `card_id` int(50) NOT NULL,
  `total_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_albums`
--

INSERT INTO `user_albums` (`id`, `username`, `date_purchased`, `card_id`, `total_amount`) VALUES
(1, 'naim', '2023-07-01', 6, 192.6),
(2, 'naim', '2023-07-01', 4, 96.3),
(3, 'ali', '2023-07-01', 23, 117.9),
(4, 'paksamad', '2023-07-02', 19, 115),
(5, 'ali', '2023-07-02', 23, 186.3),
(6, 'ali', '2023-07-02', 23, 178.2),
(7, 'ali', '2023-07-02', 23, 178.2),
(8, 'ali', '2023-07-02', 23, 178.2),
(9, 'ali', '2023-07-02', 23, 178.2),
(10, 'ali', '2023-07-03', 23, 178.2),
(11, 'ali', '2023-07-03', 23, 178.2),
(12, 'ali', '2023-07-03', 23, 178.2),
(13, 'ali', '2023-07-04', 23, 178.2),
(14, 'ali', '2023-07-04', 23, 178.2),
(15, 'ali', '2023-07-04', 23, 178.2),
(16, 'ali', '2023-07-04', 23, 178.2),
(17, 'ali', '2023-07-04', 23, 178.2),
(18, 'ali', '2023-07-05', 23, 178.2),
(19, 'ali', '2023-07-05', 23, 178.2),
(20, 'ali', '2023-07-05', 23, 178.2),
(21, 'ali', '2023-07-05', 23, 20.7),
(22, 'ali', '2023-07-05', 23, 19.8),
(23, 'ali', '2023-07-05', 23, 19.8),
(24, 'ali', '2023-07-05', 23, 19.8),
(25, 'ali', '2023-07-05', 23, 19.8),
(26, 'ali', '2023-07-05', 23, 147.6),
(27, 'ali', '2023-07-05', 23, 19.8),
(28, 'ali', '2023-07-05', 23, 117.9),
(29, 'paksamad', '2023-07-05', 24, 80.1),
(30, 'paksamad', '2023-07-05', 19, 261.9),
(31, 'paksamad', '2023-07-05', 24, 51.3),
(32, 'paksamad', '2023-07-05', 19, 82.8),
(33, 'paksamad', '2023-07-05', 19, 279),
(34, 'paksamad', '2023-07-05', 24, 105.3),
(35, 'paksamad', '2023-07-05', 19, 82.8),
(36, 'paksamad', '2023-07-05', 24, 82.8),
(37, 'paksamad', '2023-07-05', 24, 54),
(38, 'paksamad', '2023-07-05', 24, 261.9),
(39, 'paksamad', '2023-07-05', 24, 262.8),
(40, 'paksamad', '2023-07-05', 19, 262.8),
(41, 'paksamad', '2023-07-05', 19, 262.8),
(42, 'paksamad', '2023-07-05', 19, 149.4),
(43, 'paksamad', '2023-07-05', 24, 82.8),
(44, 'paksamad', '2023-07-05', 19, 117.9),
(45, 'paksamad', '2023-07-05', 19, 262.8),
(46, 'paksamad', '2023-07-05', 24, 105.3),
(47, 'paksamad', '2023-07-05', 19, 117.9),
(48, 'paksamad', '2023-07-05', 24, 0),
(49, 'paksamad', '2023-07-05', 19, 117.9),
(50, 'paksamad', '2023-07-05', 24, 105.3),
(51, 'paksamad', '2023-07-05', 24, 103.5),
(52, 'paksamad', '2023-07-05', 19, 262.8),
(53, 'paksamad', '2023-07-05', 24, 147.6),
(54, 'paksamad', '2023-07-05', 19, 148.5),
(55, 'paksamad', '2023-07-05', 19, 54),
(56, 'paksamad', '2023-07-05', 24, 43.2),
(57, 'paksamad', '2023-07-05', 24, 82.8),
(58, 'paksamad', '2023-07-05', 24, 105.3),
(59, 'paksamad', '2023-07-05', 19, 117.9),
(60, 'paksamad', '2023-07-05', 19, 51.3),
(61, 'paksamad', '2023-07-05', 24, 82.8),
(62, 'paksamad', '2023-07-05', 24, 103.5),
(63, 'paksamad', '2023-07-06', 24, 425.7),
(64, 'paksamad', '2023-07-06', 24, 186.3),
(65, 'ali', '2023-07-08', 44, 342.9),
(66, 'ali', '2023-07-08', 44, 117.9),
(67, 'ali', '2023-07-08', 44, 117.9),
(68, 'ali', '2023-07-08', 44, 117.9),
(69, 'ali', '2023-07-08', 44, 147.6),
(70, 'ali', '2023-07-08', 44, 147.6),
(71, 'ali', '2023-07-08', 44, 147.6);

-- --------------------------------------------------------

--
-- Table structure for table `user_albums_details`
--

CREATE TABLE `user_albums_details` (
  `id` int(11) NOT NULL,
  `album_id` int(50) NOT NULL,
  `user_album_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_albums_details`
--

INSERT INTO `user_albums_details` (`id`, `album_id`, `user_album_id`) VALUES
(1, 31, 1),
(2, 21, 1),
(3, 5, 1),
(4, 18, 1),
(5, 1, 2),
(6, 12, 2),
(7, 32, 3),
(8, 31, 3),
(9, 5, 4),
(10, 21, 4),
(11, 32, 5),
(12, 31, 5),
(13, 25, 5),
(14, 25, 6),
(15, 21, 6),
(16, 4, 6),
(17, 25, 7),
(18, 21, 7),
(19, 4, 7),
(20, 25, 8),
(21, 21, 8),
(22, 4, 8),
(23, 25, 9),
(24, 21, 9),
(25, 4, 9),
(26, 25, 10),
(27, 21, 10),
(28, 4, 10),
(29, 25, 11),
(30, 21, 11),
(31, 4, 11),
(32, 25, 12),
(33, 21, 12),
(34, 4, 12),
(35, 25, 13),
(36, 21, 13),
(37, 4, 13),
(38, 25, 14),
(39, 21, 14),
(40, 4, 14),
(41, 25, 15),
(42, 21, 15),
(43, 4, 15),
(44, 25, 16),
(45, 21, 16),
(46, 4, 16),
(47, 25, 17),
(48, 21, 17),
(49, 4, 17),
(50, 25, 18),
(51, 21, 18),
(52, 4, 18),
(53, 25, 19),
(54, 21, 19),
(55, 4, 19),
(56, 25, 20),
(57, 21, 20),
(58, 4, 20),
(59, 9, 21),
(60, 7, 22),
(61, 7, 23),
(62, 7, 24),
(63, 7, 25),
(64, 21, 26),
(65, 25, 26),
(66, 7, 27),
(67, 31, 28),
(68, 32, 28),
(69, 17, 29),
(70, 27, 30),
(71, 17, 30),
(72, 4, 31),
(73, 9, 31),
(74, 30, 32),
(75, 18, 32),
(76, 10, 33),
(77, 15, 33),
(78, 25, 34),
(79, 31, 34),
(80, 30, 35),
(81, 18, 35),
(82, 30, 36),
(83, 18, 36),
(84, 30, 37),
(85, 10, 37),
(86, 27, 38),
(87, 17, 38),
(88, 32, 39),
(89, 27, 39),
(90, 32, 40),
(91, 27, 40),
(92, 32, 41),
(93, 27, 41),
(94, 32, 42),
(95, 25, 42),
(96, 18, 43),
(97, 30, 43),
(98, 31, 44),
(99, 32, 44),
(100, 32, 45),
(101, 27, 45),
(102, 25, 46),
(103, 31, 46),
(104, 31, 47),
(105, 32, 47),
(106, 31, 49),
(107, 32, 49),
(108, 25, 50),
(109, 31, 50),
(110, 21, 51),
(111, 5, 51),
(112, 32, 52),
(113, 27, 52),
(114, 21, 53),
(115, 25, 53),
(116, 12, 54),
(117, 17, 54),
(118, 30, 55),
(119, 10, 55),
(120, 7, 56),
(121, 10, 56),
(122, 18, 57),
(123, 30, 57),
(124, 25, 58),
(125, 31, 58),
(126, 32, 59),
(127, 31, 59),
(128, 9, 60),
(129, 4, 60),
(130, 18, 61),
(131, 30, 61),
(132, 21, 62),
(133, 5, 62),
(134, 17, 63),
(135, 27, 63),
(136, 32, 63),
(137, 18, 63),
(138, 30, 63),
(139, 10, 64),
(140, 30, 64),
(141, 18, 64),
(142, 17, 64),
(143, 32, 65),
(144, 27, 65),
(145, 17, 65),
(146, 31, 66),
(147, 32, 66),
(148, 31, 67),
(149, 32, 67),
(150, 31, 68),
(151, 32, 68),
(152, 25, 69),
(153, 21, 69),
(154, 25, 70),
(155, 21, 70),
(156, 25, 71),
(157, 21, 71);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usersubscription`
--
ALTER TABLE `usersubscription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_albums`
--
ALTER TABLE `user_albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_albums_details`
--
ALTER TABLE `user_albums_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

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
