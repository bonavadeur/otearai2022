-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 06:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wc`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(5) NOT NULL,
  `team_one` varchar(20) NOT NULL,
  `team_two` varchar(20) NOT NULL,
  `goal_one` int(5) NOT NULL,
  `goal_two` int(5) NOT NULL,
  `result` int(5) NOT NULL,
  `challenge` float NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team_one`, `team_two`, `goal_one`, `goal_two`, `result`, `challenge`, `time`) VALUES
(1, 'Sweeden', 'Cameroon', 0, 0, 0, 0, '2022-11-24 10:00:00.424000'),
(2, 'Uruguay', 'Korean', 0, 0, 0, 0, '2022-11-24 13:00:00.287000'),
(3, 'Portugal', 'Ghana', 0, 0, 0, 0, '2022-11-24 16:00:00.103000'),
(4, 'Brasil', 'Serbia', 0, 0, 0, 0, '2022-11-24 19:00:00.357000');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `matchid` int(11) NOT NULL,
  `choice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `achievement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `achievement`) VALUES
(1, 'admin', '123123', 0),
(2, 'demo', 'demo', 0),
(3, 'qanh', '313081', 0),
(4, 'bao', '808567', 0),
(5, 'ben', '740678', 0),
(6, 'canh', '788862', 0),
(7, 'dang', '922358', 0),
(8, 'doanh', '765305', 0),
(9, 'duc', '867346', 0),
(10, 'vdung', '206761', 0),
(11, 'qdung', '106252', 0),
(12, 'hai', '326262', 0),
(13, 'hiep', '850336', 0),
(14, 'dhieu', '752386', 0),
(15, 'vhieu', '799590', 0),
(16, 'hung', '618865', 0),
(17, 'huy', '597561', 0),
(18, 'khanh', '297711', 0),
(19, 'lam', '488199', 0),
(20, 'nam', '193536', 0),
(21, 'ngoc', '398354', 0),
(22, 'phuong', '960074', 0),
(23, 'quy', '239172', 0),
(24, 'quynh', '502924', 0),
(25, 'son', '785301', 0),
(26, 'thao', '531850', 0),
(27, 'thu', '969044', 0),
(28, 'thuong', '822734', 0),
(29, 'trung', '142721', 0),
(30, 'tung', '774883', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
