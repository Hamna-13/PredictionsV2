-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 11:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `tournamentid` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `rules_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `groupName`, `tournamentid`, `admin_id`, `rules_id`) VALUES
(4, 'Friends', 66, NULL, 2),
(6, 'Pro coders', 66, NULL, 1),
(7, 'Algorithm Allies', 66, NULL, 2),
(8, 'Algorithm Allies', 66, NULL, 3),
(9, 'Algorithm Allies', 66, NULL, 3),
(10, 'hello world', 67, NULL, 1),
(11, 'Barbies', 66, NULL, 23),
(12, 'Lions', 66, NULL, 34),
(13, 'tigers', 66, NULL, 43),
(14, 'happyfamily', 67, NULL, 44),
(15, 'cricket masters', 66, NULL, 45),
(16, 'Kayak ML', 66, NULL, 46),
(17, 'Algorithm Allies', 66, 18, 47),
(18, 'Laliga', 66, 19, 48),
(19, 'Laliga', 66, 19, 49),
(20, 'hello friends', 67, 20, 50),
(21, 'Barbie Land', 66, 21, 52),
(22, 'Suiii', 66, 22, 53),
(23, 'Familyuu', 66, 22, 2),
(24, 'Familyuu', 66, 22, 3),
(25, 'Familyuu', 66, 1, 1),
(26, 'Algorithm Allies', 67, 1, 4),
(27, 'uihoh', 66, 1, 4),
(28, 'Algorithm Allies', 66, 2, 0),
(29, 'Algorithm Allies', 66, 2, 0),
(30, 'Family', 66, 2, 0),
(31, 'Family', 66, 2, 55),
(32, 'Family', 66, 1, 58),
(33, 'Family', 66, 1, 59),
(38, 'haha', 66, 1, 0),
(39, 'haha', 66, 1, 0),
(40, 'haha', 66, 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `message_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_chat`
--

INSERT INTO `group_chat` (`message_id`, `group_id`, `user_id`, `message`, `timestamp`) VALUES
(1, 22, 2, 'hello', '2024-02-13 07:23:26'),
(2, 22, 1, 'hii', '2024-02-13 07:24:38'),
(3, 22, 1, 'hello', '2024-02-13 13:22:27'),
(4, 22, 1, 'ok', '2024-02-13 19:21:25'),
(5, 22, 1, 'hiiii', '2024-02-14 18:23:05'),
(6, 14, 2, 'hello', '2024-02-15 16:07:24'),
(7, 14, 2, 'how are you?', '2024-02-15 16:12:51'),
(8, 14, 2, 'i am gud', '2024-02-15 16:12:57'),
(9, 14, 2, 'hii', '2024-02-15 16:17:35'),
(10, 14, 2, 'whyy', '2024-02-15 16:17:40'),
(11, 14, 2, 'oh noo', '2024-02-15 16:19:00'),
(12, 14, 2, 'heyy', '2024-02-15 16:35:02'),
(13, 14, 1, 'helloo', '2024-02-15 18:42:08'),
(14, 14, 1, 'sdhfiljdiwajdpawdjwpojeoisdmzmfzkosjmfoiwjoasdmcskfmpoaeijfmckozscmkasjdmawiosdm', '2024-02-15 18:46:22'),
(15, 14, 1, 'helloo', '2024-02-15 18:49:24'),
(16, 14, 1, 'hhh', '2024-02-15 23:19:50'),
(17, 14, 1, 'helllo', '2024-02-15 23:20:01'),
(18, 14, 1, 'hello', '2024-02-15 23:20:16'),
(19, 14, 1, 'hello', '2024-02-15 23:20:44'),
(20, 14, 1, 'hello', '2024-02-15 23:31:14'),
(21, 14, 1, 'helllo', '2024-02-15 23:33:52'),
(22, 14, 1, 'heelo', '2024-02-15 23:35:18'),
(23, 14, 1, 'hello', '2024-02-15 23:35:32'),
(24, 14, 1, 'hello', '2024-02-15 23:36:03'),
(25, 14, 1, 'hello', '2024-02-15 23:38:22'),
(26, 14, 1, 'hey', '2024-02-15 23:46:55'),
(27, 14, 1, 'hahaha', '2024-02-16 00:05:01'),
(28, 14, 1, 'arha ha', '2024-02-16 00:05:29'),
(29, 14, 1, 'ok', '2024-02-16 00:06:55'),
(30, 14, 1, 'hii', '2024-02-16 05:19:23'),
(31, 25, 1, 'hey', '2024-02-16 06:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `tournamentid` int(11) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `match_date` date NOT NULL,
  `match_time` time NOT NULL,
  `venue` varchar(255) NOT NULL,
  `result` int(255) DEFAULT NULL,
  `match_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `tournamentid`, `team1_id`, `team2_id`, `match_date`, `match_time`, `venue`, `result`, `match_type`) VALUES
(26, 67, 1, 3, '2024-02-21', '21:10:00', 'Gaddafi Staduim, Lahore', 1, 'simple'),
(28, 66, 10, 11, '2024-02-29', '18:35:00', 'Melbourne Cricket Stadium, Australia', 11, ''),
(29, 66, 7, 9, '2024-02-02', '20:10:00', 'Gaddafi Staduim, Lahore', 9, ''),
(31, 66, 11, 8, '2024-02-09', '20:18:51', 'OOOO', 11, 'playoff');

-- --------------------------------------------------------

--
-- Table structure for table `prediction`
--

CREATE TABLE `prediction` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `predicted_team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prediction`
--

INSERT INTO `prediction` (`user_id`, `group_id`, `match_id`, `predicted_team_id`) VALUES
(1, 14, 26, 1),
(1, 14, 26, 3),
(1, 20, 26, 3),
(1, 21, 28, 10),
(1, 22, 28, 11),
(1, 22, 29, 9),
(1, 25, 28, 11),
(1, 26, 26, 3),
(2, 22, 28, 10),
(2, 26, 26, 1),
(5, 17, 31, 11),
(6, 17, 31, 8),
(9, 17, 31, 8),
(10, 17, 31, 8),
(11, 17, 31, 11);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `rules_id` int(11) NOT NULL,
  `fav_team_include` tinyint(1) NOT NULL,
  `fav_team_win` int(11) NOT NULL,
  `fav_team_lose` int(11) NOT NULL,
  `other_team_win` int(11) NOT NULL,
  `simple_team_win` int(11) NOT NULL,
  `simple_team_lose` int(11) NOT NULL,
  `other_team_lose` int(11) NOT NULL,
  `final_match_win` int(11) NOT NULL,
  `other_final_win` int(11) NOT NULL,
  `final_match_lose` int(11) NOT NULL,
  `playoff_match_win` int(11) NOT NULL,
  `other_final_lose` int(11) NOT NULL,
  `playoff_match_lose` int(11) NOT NULL,
  `fav_final_win` int(11) NOT NULL,
  `other_playoff_win` int(11) NOT NULL,
  `fav_final_lose` int(11) NOT NULL,
  `fav_playoff_win` int(11) NOT NULL,
  `other_playoff_lose` int(11) NOT NULL,
  `fav_playoff_lose` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`rules_id`, `fav_team_include`, `fav_team_win`, `fav_team_lose`, `other_team_win`, `simple_team_win`, `simple_team_lose`, `other_team_lose`, `final_match_win`, `other_final_win`, `final_match_lose`, `playoff_match_win`, `other_final_lose`, `playoff_match_lose`, `fav_final_win`, `other_playoff_win`, `fav_final_lose`, `fav_playoff_win`, `other_playoff_lose`, `fav_playoff_lose`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 4, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 5, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 5, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 1, 8, 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 1, 8, 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 1, 3, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 1, 10, 3, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7, 4, 0),
(14, 1, 5, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 5, 3, 7, 4, 2),
(15, 1, 5, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 5, 3, 7, 4, 2),
(16, 1, 5, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 5, 3, 7, 4, 2),
(17, 0, 0, 0, 0, 3, 1, 0, 5, 2, 1, 4, 2, 1, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 3, 1, 0, 5, 2, 1, 4, 2, 1, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 3, 1, 0, 5, 2, 1, 4, 2, 1, 0, 0, 0, 0, 0, 0),
(20, 0, 3, 0, 1, 2, 1, 0, 5, 1, 0, 3, 1, 0, 8, 4, 0, 5, 2, 0),
(21, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(22, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(23, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(24, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(25, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(26, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(27, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(28, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(29, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(30, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(31, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(32, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(33, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(34, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(35, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(36, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(37, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(38, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(39, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(40, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(41, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(42, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(43, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(44, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(45, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(46, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(47, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18),
(48, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(49, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(50, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(51, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(52, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(53, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(54, 0, 0, 0, 0, 2, 4, 0, 7, 0, 7, 5, 0, 4, 0, 0, 0, 0, 0, 0),
(55, 0, 0, 0, 0, 2, 4, 0, 7, 0, 7, 5, 0, 4, 0, 0, 0, 0, 0, 0),
(56, 0, 0, 0, 0, 1, 3, 0, 4, 0, 3, 5, 0, 6, 0, 0, 0, 0, 0, 0),
(57, 0, 0, 0, 0, 1, 3, 0, 4, 0, 3, 5, 0, 6, 0, 0, 0, 0, 0, 0),
(58, 0, 0, 0, 0, 1, 3, 0, 4, 0, 3, 5, 0, 6, 0, 0, 0, 0, 0, 0),
(59, 0, 0, 0, 0, 3, 4, 0, 3, 0, 5, 5, 0, 6, 0, 0, 0, 0, 0, 0),
(60, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `teamid` int(11) NOT NULL,
  `teamName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamid`, `teamName`) VALUES
(1, 'Peshawar Zalmi'),
(2, 'Quetta Gladiators'),
(3, 'Lahore Qalandars'),
(4, 'Multan Sultans'),
(5, 'Islamabad United'),
(6, 'Sialkot tigers'),
(7, 'Pakistan'),
(8, 'India'),
(9, 'New Zealand'),
(10, 'South Africa'),
(11, 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `tournamentName` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `tournamentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`tournamentName`, `startDate`, `endDate`, `tournamentid`) VALUES
('T20 World Cup 2024', '2024-02-12', '2024-02-29', 66),
('PSL 2024', '2024-02-15', '2024-02-28', 67),
('test', '2024-02-19', '2024-02-29', 68);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_teams`
--

CREATE TABLE `tournament_teams` (
  `tournamentid` int(11) NOT NULL,
  `teamid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournament_teams`
--

INSERT INTO `tournament_teams` (`tournamentid`, `teamid`) VALUES
(66, 7),
(66, 8),
(66, 9),
(66, 10),
(66, 11),
(67, 1),
(67, 2),
(67, 3),
(67, 4),
(67, 5),
(68, 5),
(68, 6),
(68, 7),
(68, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `phonenumber`, `password`, `role`, `user_id`) VALUES
('hamna', 'hamnahashmi09@gmail.com', '03209492062', 'admin1', 'user', 1),
('Uzair', 'uzair@gmail.com', '1234', '1234', 'user', 2),
('Hello', 'hello@gmail.com', '1234', '1234', 'user', 3),
('jawayria', 'jawayriahashmi@gmail.com', '03333300002', 'hamna', 'user', 4),
('wajiha', 'wajihahashmi@gmail.com', '03333000222', 'hamnaaa', 'user', 5),
('wajiha', 'wajihahashmi@gmail.com', '03333000222', 'hamnaaa', 'user', 6),
('wajiha', 'wajihahashmi@gmail.com', '03333000222', 'hamnaaa', 'user', 7),
('wajiha', 'wajihahashmi@gmail.com', '03333000222', 'hamnaaa', 'user', 8),
('heyy', 'heyhello@gmail.com', '033333309890', 'hahaha', 'user', 9),
('heyy', 'heyhello@gmail.com', '033333309890', 'hahaha', 'user', 10),
('heyy', 'heyhello@gmail.com', '033333309890', 'hahaha', 'user', 11),
('hahaha', 'haha@gmail.com', '03299911023', 'hellooo', 'user', 12),
('masooma', 'masoomasafwan@gmail.com', '03333308320', '$2y$10$aU2pGuVIGBP0lMzpnp3TFeQgAYCN1ZXrSewEvzRGMjeTqgOpkmp5y', 'user', 13),
('admin', 'admin@gmail.com', '', '$2y$10$kzTokrFp2ON3q2ANOFa.BOmWXtakZSD1f1VHVwgwHXGlqu4bt71GK', 'admin', 14),
('hello world', 'helloword@gmail.com', '033333308320', '$2y$10$iev7D3Duc20zmwrHSMR.yONSXsARW8KFZu.Kpytl6ruDTlxccr/Ee', 'user', 15),
('Allie', 'algorithmallies@gmail.com', '03332221234', '$2y$10$bKKTtYezYJTbWfpt7PdlnOl0yXYedz37P3elxXgcyCCnI4jlmyz0W', 'user', 16),
('Allie', 'algorithmallies@gmail.com', '03332221234', '$2y$10$g4i1Lc5WjXvASYGd1rtRJ.Vz2yDF8LrrjljL.cpXsoWG1Cx/w9twW', 'user', 17),
('Allie', 'algorithmallies@gmail.com', '03332221234', '$2y$10$gmqF/EsvcLu7MquNCVkCk.yfi88.FCkT3f5gte/6zkyOcNdPTu1BC', 'user', 18),
('Alliesss', 'algorithmalliessss@gmail.com', '03332221235', '$2y$10$uloPws6rc7dwQVqzuMOenulZwzy2.MAnjW7VqTQqT8QUZWXoXVHRi', 'user', 19),
('hhhhfff', 'hhhfff@gmail.com', '03339992221', '$2y$10$COhiPgwKTciwAZgeQ5UGmuUJckFJHHGvYmAxFq41UwNVaInMXAtDi', 'user', 20),
('barbie', 'barbie@gmail.com', '03333394921', '$2y$10$OsFyTThDTQBhPl92OEM/SupIC.x3ktdwcmR3JvIE7TGsqzMH/To4u', 'user', 21),
('ronaldo', 'ronaldo@gmail.com', '03029492077', '$2y$10$duh7LUOT4K.xKVVWwheGnuvAyDS0fEy.0W/0zxpYGaFA7ykTJoQmK', 'user', 22),
('uzair_ahmad', 'uzairshums@gmail.com', '03124006780', '$2y$10$59uY4XXki6YMNYYuKSeCReZ0/RexPtZTVZtcw8/hJioHcpKfr/Bva', 'user', 23),
('admin1', 'admin1@gmail.com', '', 'admin1', 'admin', 24);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fav_team_id` int(11) DEFAULT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`group_id`, `user_id`, `fav_team_id`, `points`) VALUES
(14, 1, 3, 0),
(14, 2, 2, 11),
(14, 3, 2, 11),
(14, 4, 2, 13),
(14, 12, 2, 11),
(15, 12, NULL, 11),
(16, 4, NULL, 11),
(17, 5, NULL, 53),
(17, 6, NULL, 61),
(17, 9, NULL, 61),
(17, 10, NULL, 61),
(17, 11, NULL, 53),
(18, 1, NULL, 11),
(18, 3, NULL, 11),
(18, 9, NULL, 11),
(18, 11, NULL, 11),
(18, 15, NULL, 11),
(19, 2, NULL, 11),
(19, 4, NULL, 11),
(20, 1, NULL, 11),
(20, 4, NULL, 11),
(20, 9, NULL, 11),
(20, 15, NULL, 11),
(21, 1, NULL, 11),
(21, 2, NULL, 11),
(21, 4, NULL, 11),
(21, 12, NULL, 11),
(21, 19, NULL, 11),
(22, 1, 9, 11),
(22, 2, 9, 11),
(22, 4, NULL, 11),
(22, 5, NULL, 11),
(22, 13, NULL, 11),
(22, 21, NULL, 11),
(24, 22, NULL, 11),
(25, 1, NULL, 11),
(26, 1, NULL, 11),
(27, 1, NULL, 11),
(28, 2, NULL, 0),
(29, 2, NULL, 0),
(30, 2, NULL, 0),
(31, 1, NULL, 0),
(31, 2, NULL, 0),
(32, 1, NULL, 0),
(33, 1, NULL, 0),
(33, 4, NULL, 0),
(38, 1, NULL, 0),
(39, 1, NULL, 0),
(40, 1, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `t2key` (`tournamentid`),
  ADD KEY `adminkey` (`admin_id`);

--
-- Indexes for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `team1key` (`team1_id`),
  ADD KEY `team2key` (`team2_id`),
  ADD KEY `tkey` (`tournamentid`);

--
-- Indexes for table `prediction`
--
ALTER TABLE `prediction`
  ADD PRIMARY KEY (`user_id`,`group_id`,`match_id`,`predicted_team_id`),
  ADD KEY `gkey` (`group_id`),
  ADD KEY `mkey` (`match_id`),
  ADD KEY `fk_predicted_team` (`predicted_team_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`rules_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teamid`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`tournamentid`),
  ADD UNIQUE KEY `tournamentName` (`tournamentName`);

--
-- Indexes for table `tournament_teams`
--
ALTER TABLE `tournament_teams`
  ADD PRIMARY KEY (`tournamentid`,`teamid`),
  ADD KEY `teamkey` (`teamid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_id`,`user_id`),
  ADD KEY `favteamkey` (`fav_team_id`),
  ADD KEY `userkey` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `group_chat`
--
ALTER TABLE `group_chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `rules_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `teamid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tournamentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `adminkey` FOREIGN KEY (`admin_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `t2key` FOREIGN KEY (`tournamentid`) REFERENCES `tournaments` (`tournamentID`) ON DELETE CASCADE;

--
-- Constraints for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD CONSTRAINT `group_chat_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `group_chat_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `team1key` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`teamid`),
  ADD CONSTRAINT `team2key` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`teamid`),
  ADD CONSTRAINT `tkey` FOREIGN KEY (`tournamentid`) REFERENCES `tournaments` (`tournamentID`) ON DELETE CASCADE;

--
-- Constraints for table `prediction`
--
ALTER TABLE `prediction`
  ADD CONSTRAINT `fk_predicted_team` FOREIGN KEY (`predicted_team_id`) REFERENCES `teams` (`teamid`),
  ADD CONSTRAINT `gkey` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `mkey` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`),
  ADD CONSTRAINT `predictkey` FOREIGN KEY (`predicted_team_id`) REFERENCES `teams` (`teamid`),
  ADD CONSTRAINT `ukey` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `tournament_teams`
--
ALTER TABLE `tournament_teams`
  ADD CONSTRAINT `fk_tournament_teams_tournaments` FOREIGN KEY (`tournamentid`) REFERENCES `tournaments` (`tournamentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `teamkey` FOREIGN KEY (`teamid`) REFERENCES `teams` (`teamid`),
  ADD CONSTRAINT `tournamentkey` FOREIGN KEY (`tournamentid`) REFERENCES `tournaments` (`tournamentID`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `favteamkey` FOREIGN KEY (`fav_team_id`) REFERENCES `teams` (`teamid`),
  ADD CONSTRAINT `groupkey` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `userkey` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
