-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 04:45 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviereservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('ADMIN', 'ADMIN'),
('ADMIN', 'admin'),
('admin', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pnumber` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `pnumber`, `type`) VALUES
(1, 'jayahr123', '$2y$10$XjJwyQ7WYRRDMAgQZXWQye5FjDSg2T7tBEluk1Q6nhc6KdeCznfCq', 'Kaien', 'Abubo', '', '095626559791', ''),
(2, 'kaien123', 'Hello123', 'bnaabaabasdas', 'nm', '', '666777888', ''),
(4, 'jayahr', '$2y$10$0o8oMgPj7cHl3lP9Pm8dxOmzjaZcQqFY9zqYVa33Fovt6MCeBI3oi', 'jayahraa', 'abubo', '', '09562655979', ''),
(5, 'jayahr123', '$2y$10$XjJwyQ7WYRRDMAgQZXWQye5FjDSg2T7tBEluk1Q6nhc6KdeCznfCq', 'Kaien', 'Abubo', '', '095626559791', ''),
(6, 'jayahr', '$2y$10$0o8oMgPj7cHl3lP9Pm8dxOmzjaZcQqFY9zqYVa33Fovt6MCeBI3oi', 'jayahraa', 'abubo', '', '09562655979', ''),
(7, 'jayahr123', '$2y$10$XjJwyQ7WYRRDMAgQZXWQye5FjDSg2T7tBEluk1Q6nhc6KdeCznfCq', 'Kaien', 'Abubo', '', '095626559791', ''),
(8, 'jiulieno123', 'orjallo123', 'jiu', 'orjallo', 'jiuorjallo@yahoo.com', '12930120371236', ''),
(9, 'hello', '$2y$10$gbrAvvhG/d.NSxQexXNhg.JdVcd6Jd7vVPhZS2m5WSNn8T7isfNIS', 'hello', 'world', '', '123123123', ''),
(10, 'john123', '$2y$10$uRO8Xw2z3bKHBgW6cFCm6.9/ht4WneFX/PWCTOA84GLtNNDrvverO', 'john', 'doe', '', '123123', ''),
(11, 'asd123', '200820e3227815ed1756a6b531e7e0d2', 'asd', 'fgh', 'asdfgh@yahoo.com', '123123123', ''),
(12, 'jin123', '$2y$10$h4OZIBbHJkgVGmfmCUNcUO9ufXwIIMg9T2WkQYMXFUb1uKFi.xFD.', 'jin', 'kaien123', 'asdasasdas@yahoo.com', '98876123', ''),
(13, 'jayahr123', '$2y$10$XjJwyQ7WYRRDMAgQZXWQye5FjDSg2T7tBEluk1Q6nhc6KdeCznfCq', 'Kaien', 'Abubo', '', '095626559791', ''),
(14, 'manyak123', '$2y$10$iTv2C9uJQkolWKFZV2GmPeMOcg7/9jVX6kYKGcfjQLFe.SZc/EL42', 'asd', '', 'asdasd@yahoo.com', '6767676', ''),
(15, 'killme123', 'meme123', 'JinKaien', '', 'kaienjin@yahoo.com', '787878788', ''),
(16, 'jay123', 'ahrahr123', 'Pogi', '', 'Pogisana@yahoo.com', '7878787888', ''),
(17, 'paltak123', '$2y$10$uQtoTEdB1AfhA78tLUoQS.F3bMXSbVxzuIShdq2MFEKelWkoEBqc2', 'asdasd', 'asdasd', 'asdasd@yahoo.com', '213123123', ''),
(18, 'asdasd', '$2y$10$j4F5mLjc68bcY/34dyJpfOR/isJbKlwoHVB8aL5.AZjxYjupthEcO', 'asdasd', 'asdasd', 'asdasd@yahoo.com', '23123123', 'user'),
(19, 'asdasd', '$2y$10$Bp0fHG4kvZW1qHmMH73KPurVr0D3rT9qHYtYFC.gYZi6tbzRBfw/.', 'asdasd', 'asdasd', 'asdasd@yahoo.com', '23123123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeecode` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pnumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeecode`, `username`, `password`, `firstname`, `lastname`, `email`, `pnumber`) VALUES
('AB31C', 'jayahr123', 'kaien123', 'JayAhr', 'Abubo', 'dinojayahr4@gmail.com', '09562655979'),
('HE37A', 'marco100', 'benzpn123', 'Marco', 'Benzon', 'marcobenzon@yahoo.com', '09562651123');

-- --------------------------------------------------------

--
-- Table structure for table `omovie`
--

CREATE TABLE `omovie` (
  `id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `valid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `omovie`
--

INSERT INTO `omovie` (`id`, `file`, `title`, `duration`, `genre`, `price`, `director`, `valid`) VALUES
(97, 'spiderposter.png', 'Spider Man ', '2 Hours and 30 Minutes', 'Action', '200 PHP', 'JayAhr', '1111-11-11'),
(101, 'endgameposter.jpg', 'End Game', '2 Hours and 30 Minutes', 'Action', '200 PHP', 'JayAhr', '2020-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `valid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `firstname`, `lastname`, `time`, `quantity`, `title`, `duration`, `price`, `valid`) VALUES
(3, 'asdasd', 'asdasd', '3:00 PM - 6:00 PM', '2', 'Iron Man', '2 Hours and 30 Minutes', '200 PHP', '1111-11-11'),
(4, 'JayAhr', 'Abubo', '11:00 AM - 2:00 PM', '2', 'Iron Man', '2 Hours and 30 Minutes', '200 PHP', '1111-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `umovie`
--

CREATE TABLE `umovie` (
  `id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `valid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umovie`
--

INSERT INTO `umovie` (`id`, `file`, `title`, `duration`, `genre`, `price`, `director`, `valid`) VALUES
(19, 'endgameposter.jpg', 'Avengers ', '1 hour and 39 mins', 'Adventure', '270', 'Jay-Ahraaaa', '2020-02-20'),
(20, 'blackposter.jpg', 'Black Panther', '2 Hours and 30 Minutes', 'Melodrama', '200 PHP', 'JayAhr', '1111-11-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `omovie`
--
ALTER TABLE `omovie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umovie`
--
ALTER TABLE `umovie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `omovie`
--
ALTER TABLE `omovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `umovie`
--
ALTER TABLE `umovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
