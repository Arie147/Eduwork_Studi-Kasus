-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 09:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyberspace_citadel`
--

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `developer_id` int(11) NOT NULL,
  `developer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`developer_id`, `developer_name`) VALUES
(1, 'Larian Studios'),
(2, 'CD PROJEKT RED'),
(3, 'Facepunch Studios'),
(4, 'NEOWIZ'),
(5, 'Bethesda Game Studios'),
(6, 'FromSoftware Inc.'),
(7, 'Avalanche Software'),
(8, 'CAPCOM Co., Ltd.'),
(9, 'Redbeet Interactive'),
(11, 'MINTROCKET'),
(16, 'BlueTwelve Studio');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `developer_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `rls_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `title`, `genre_id`, `developer_id`, `publisher_id`, `rls_date`, `price`, `picture`) VALUES
(1, 'Baldur\'s Gate 3', 3, 1, 1, '2023-08-03', 700000, 'baldurgate3.jpg'),
(2, 'Cyberpunk 2077', 15, 2, 2, '2020-12-10', 700000, 'cyberpunk2077.jpg'),
(3, 'Rust', 14, 3, 3, '2018-02-09', 290000, 'rust.jpg'),
(4, 'Lies of P', 15, 4, 4, '2023-09-18', 870000, 'liesofp.jpg'),
(5, 'Starfield', 15, 5, 5, '2023-09-06', 760000, 'starfield.jpg'),
(6, 'ELDEN RING', 15, 6, 6, '2022-02-25', 600000, 'eldenring.jpg'),
(7, 'Hogwarts Legacy', 15, 7, 7, '2023-02-11', 800000, 'hogwartslegacy.jpg'),
(8, 'Monster Hunter: World', 15, 8, 8, '2018-08-09', 335000, 'monhunworld.jpg'),
(9, 'Resident Evil 4', 14, 8, 8, '2023-03-24', 830000, 're4.jpg'),
(10, 'Raft', 14, 9, 9, '2022-06-20', 136000, 'raft.jpg'),
(14, 'Dave the Diver', 35, 11, 11, '2023-06-28', 166000, 'dave.jpg'),
(18, 'The Elder Scrolls V: Skyrim Special Edition', 3, 5, 5, '2016-10-28', 330000, 'skyrim.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre`) VALUES
(3, 'RPG'),
(4, 'Simulation'),
(6, 'Sports'),
(7, 'Fighting'),
(13, 'Battle Royale'),
(14, 'Survival'),
(15, 'Action RPG'),
(32, 'Action'),
(34, 'FPS'),
(35, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`) VALUES
(1, 'Larian Studios'),
(2, 'CD PROJEKT RED'),
(3, 'Facepunch Studios'),
(4, 'NEOWIZ'),
(5, 'Bethesda Softworks'),
(6, 'Bandai Namco Entertainment'),
(7, 'Warner Bros. Games'),
(8, 'CAPCOM Co., Ltd.'),
(9, 'Axolot Games'),
(11, 'MINTROCKET'),
(16, 'Annapurna Interactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`developer_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_game_genre` (`genre_id`),
  ADD KEY `fk_game_developer` (`developer_id`),
  ADD KEY `fk_game_publisher` (`publisher_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `developer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `fk_game_developer` FOREIGN KEY (`developer_id`) REFERENCES `developer` (`developer_id`),
  ADD CONSTRAINT `fk_game_genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`),
  ADD CONSTRAINT `fk_game_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
