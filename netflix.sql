-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 01:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(120) NOT NULL,
  `thumb` varchar(120) NOT NULL,
  `file` varchar(120) NOT NULL,
  `genre` varchar(120) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(120) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `thumb`, `file`, `genre`, `date`, `description`, `id`) VALUES
(56, 'Avengers: Endgame', 'Avengers End Game.jpg', 'TRIAL____________Avengers End Game  2019 1080p  WEB-Rip X264 AC3 - 5-1 KINGDOM-RG.mp4', 'Action,Sci-Fi,Hollywood', '2019-04-26', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining alli', 62),
(58, 'The Twilight Saga: New Moon', 'The Twilight Saga New Moon.webp', 'The Twilight Saga- New Moon (Movie 2009).mp4', 'Romance,Fantasy,Hollywood', '2009-12-11', 'When Edward realises that Bellas safety is threatened because of him, he leaves her and moves away. She ends up finding ', 62),
(60, 'The Accidental Prime Minister', 'The_Accidental_Prime_Minister_film.jpg', 'MLWBD.com The Accidental Prime Minister (2019) Pre-DVDRip x264 Hindi 400Mb-1-1.mp4', 'Drama,Bollywood', '2019-01-11', 'Amidst a political climate charged with chaos and apprehension, Indian economist Manmohan Singh starts his journey as th', 62),
(61, 'Durgeshgorer Guptodhan', 'dgd-poster.png.png', 'Durgeshgorer.Guptodhon.2019.@BengaliHDmovies.720p.mp4', 'Action,Tollywood', '2019-05-24', 'Sona Da, along with Abir and Jhinuk, visits his students ancestral mansion in Durgeshgor. Once there, the trio comes acr', 62),
(63, 'Paatal Lok', 'paatal lok.jpg', 'Paatal Lok 2020 480p WebRip [HD PRINT MOVIES].mp4', 'Action,Sci-Fi,Bollywood', '2020-05-15', 'A cynical inspector is tasked with investigating a high-profile case which leads him into a dark realm of the underworld', 62),
(68, 'Twilight(2008)', 'Twilight.jpg', 'Twilight (Movie 2008) [HD].mp4', 'Romance,Fantasy,Hollywood', '2008-11-20', 'When Bella Swan relocates to Forks, Washington, to live with her father, she meets a mysterious boy, Edward Cullen, and ', 62);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `date` date NOT NULL,
  `gender` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone_no` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `cpassword` varchar(120) NOT NULL,
  `file` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `name`, `date`, `gender`, `email`, `phone_no`, `password`, `cpassword`, `file`) VALUES
(62, 'Ratnadeep Mandal', '2001-04-10', 'm', 'ratnadeepmandal499@gmail.com', '7407788005', 'Ratnadeep@2501', 'Ratnadeep@2501', 'leon-s-rQb75NJTfSk-unsplash.jpg'),
(67, 'Niloy', '3333-12-12', 'm', 'nb@gmail.com', '823456789', '12345678nB#', '', 'ilia-bronskiy-Zr1CEZzPoA8-unsplash.jpg'),
(68, 'admin', '2000-01-01', 'm', 'admin@gmail.com', '9987654231', 'Admin@1234', 'Admin@1234', 'stephen-leonardi-UpLc15XrHBo-unsplash.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`id`) REFERENCES `sign_up` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
