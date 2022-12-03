-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2022 at 10:20 AM
-- Server version: 10.5.6-MariaDB-log
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wc2022`
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
(1, 'Sweeden', 'Cameroon', 1, 0, 1, 0.75, '2022-11-25 06:46:18.581959'),
(2, 'Uruguay', 'Korean', 0, 0, 0, 0.75, '2022-11-24 13:00:00.287000'),
(3, 'Portugal', 'Ghana', 3, 2, 1, 1.25, '2022-11-25 06:46:25.660324'),
(4, 'Brasil', 'Serbia', 2, 0, 1, 0.75, '2022-11-25 06:46:28.743029'),
(5, 'Wales', 'Iran', 0, 0, -1, 0.25, '2022-11-25 06:46:32.020306'),
(6, 'Senegal', 'Qatar', 0, 0, -1, 0.75, '2022-11-25 06:46:34.686035'),
(7, 'Hà Lan', 'Ecuador', 0, 0, -1, 0.75, '2022-11-25 06:46:37.240601'),
(8, 'Anh', 'Mỹ', 0, 0, -1, 1.25, '2022-11-25 06:46:39.830754');

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

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `userid`, `matchid`, `choice`) VALUES
(1, 2, 1, 1),
(2, 9, 4, 1),
(3, 9, 3, 2),
(4, 9, 2, 1),
(5, 9, 1, 1),
(6, 29, 3, 1),
(7, 29, 1, 1),
(8, 29, 4, 1),
(9, 29, 2, 1),
(10, 25, 4, 1),
(11, 25, 3, 2),
(12, 25, 2, 1),
(13, 25, 1, 2),
(14, 18, 4, 1),
(15, 18, 2, 1),
(16, 18, 1, 1),
(17, 18, 3, 2),
(18, 15, 4, 1),
(19, 15, 3, 1),
(20, 15, 2, 1),
(21, 15, 1, 1),
(22, 14, 4, 1),
(23, 14, 3, 2),
(24, 14, 2, 1),
(25, 14, 1, 2),
(26, 5, 4, 1),
(27, 24, 4, 1);

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
(1, 'admin', '123123', 4),
(2, 'demo', 'demo', 0),
(3, 'qanh', '313081', 0),
(4, 'bao', '808567', 0),
(5, 'ben', '740678', 9),
(6, 'canh', '788862', 0),
(7, 'dang', '922358', 0),
(8, 'doanh', '765305', 0),
(9, 'duc', '867346', -7),
(10, 'vdung', '206761', 0),
(11, 'qdung', '106252', 0),
(12, 'hai', '326262', 0),
(13, 'hiep', '850336', 0),
(14, 'dhieu', '752386', -16),
(15, 'vhieu', '799590', 12),
(16, 'hung', '618865', 0),
(17, 'huy', '597561', 0),
(18, 'khanh', '297711', -7),
(19, 'lam', '488199', 0),
(20, 'nam', '193536', 0),
(21, 'ngoc', '398354', 0),
(22, 'phuong', '960074', 0),
(23, 'quy', '239172', 0),
(24, 'quynh', '502924', 9),
(25, 'son', '785301', -16),
(26, 'thao', '531850', 0),
(27, 'thu', '969044', 0),
(28, 'thuong', '822734', 0),
(29, 'trung', '142721', 12),
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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
