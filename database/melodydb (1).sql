-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 06:16 PM
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
(1, 'naim', 'muhd naim', 6759, '11/23', '233', 'maestro'),
(2, 'naim', 'Muhd Naim', 3056, '01/23', '7653', 'diners'),
(3, 'naim', 'Muhd Naim', 3056, '01/23', '7653', 'diners'),
(4, 'naim', 'Muhd Naim', 3714, '08/22', '983', 'american express'),
(5, 'naim', 'Muhd Naim', 3714, '08/22', '983', 'american express'),
(6, 'naim', 'muhd naim', 4000, '09/25', '4322', 'visa');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(20) NOT NULL,
  `feature_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature_name`) VALUES
(1, 'unlimited skips');

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
  `sub_name` varchar(25) NOT NULL,
  `feature_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `sub_name`, `feature_id`) VALUES
(1, 'Individual', 1),
(2, 'Custom', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(355) NOT NULL,
  `email` varchar(20) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `date_of_birth`, `gender`, `role_id`) VALUES
('admin', '$2y$10$ZaN2UHK6omY8MK0J0x19L.0Dslh.2nn5kfhbYkZYo0YPYGeM2mGSm', 'admin@admin.com', '1979-03-07', 'Prefer not to say', 1),
('ali', '$2y$10$1XsXVTfhJki00i2qmmf4/ujNO5zc6kQgSJiXOwGaK4tUQvO5ZZjN6', 'ali@gmail.com', '2023-05-29', 'Male', 2),
('naim', '$2y$10$/63I94Dw7hFqGsO93K53B.BDh19eD.fvqwSpBgKG5m9evMeEnyfNO', 'naim@gmail.com', '2023-05-31', 'Male', 2),
('paksamad', '$2y$10$N5YC0MzOAsd2HetzpjKLa.tTBUfWoboJGMO71r3lCFnZBnxZ88H8K', 'paksamad55@gmail.com', '2023-05-31', 'Male', 2);

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
(8, 1, 'naim', '2023-06-25', '2023-08-25', 2, 14.9, 'active', 1),
(9, 1, 'naim', '2023-06-25', '2023-08-25', 2, 14.9, 'active', 5),
(10, 1, 'naim', '2023-06-25', '2023-08-25', 2, 14.9, 'active', 6);

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_fea` (`feature_id`);

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
  ADD KEY `card_id` (`card_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `sub_fea` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `usersubscription`
--
ALTER TABLE `usersubscription`
  ADD CONSTRAINT `card_id` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usersubscription_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
