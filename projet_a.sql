-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 04:48 PM
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
-- Database: `projet_a`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comments` bigint(20) NOT NULL,
  `id_post` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `comment_message` varchar(128) NOT NULL,
  `date_comment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comments`, `id_post`, `id_user`, `comment_message`, `date_comment`) VALUES
(1, 3, 27, 'sdasda d as dsa', '2024-04-05 10:06:09'),
(2, 27, 27, 'tes test', '2024-04-05 10:06:09'),
(3, 25, 27, 'sadd as da d as', '2024-04-05 10:06:09'),
(4, 27, 0, 'coucou', '2024-04-05 10:11:07'),
(5, 19, 27, 'hello from theo', '2024-04-05 10:13:46'),
(6, 27, 27, 'hello from theo', '2024-04-05 10:14:12'),
(7, 27, 27, 'dsads a dsa d', '2024-04-05 10:14:34'),
(8, 27, 27, 'sd as dad as', '2024-04-05 10:30:13'),
(9, 18, 27, 'cc', '2024-04-05 10:41:31'),
(10, 28, 26, 'bonjour c&#039;est encore moi', '2024-04-05 12:41:22'),
(11, 28, 27, 'hello testtest, j&#039;adore ton post', '2024-04-05 12:41:58'),
(12, 28, 27, 'hello c&#039;est théo', '2024-04-05 12:49:20'),
(13, 28, 27, 'zo', '2024-04-05 12:51:16'),
(14, 28, 27, 'salut', '2024-04-05 13:12:02'),
(15, 28, 27, 'je fais un comment de trey2001 au post de testtest', '2024-04-07 08:09:57'),
(16, 31, 27, 'dsadas', '2024-04-07 08:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` bigint(20) NOT NULL,
  `post_message` varchar(125) NOT NULL,
  `date_publication` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `post_message`, `date_publication`, `user_id`) VALUES
(10, 'hello wolrd', '2024-04-03 09:30:55', 27),
(11, 'hello wolrd', '2024-04-03 09:31:06', 27),
(12, 'hello wolrd de test 2', '2024-04-03 09:35:14', 26),
(13, 'hello main hahahaha', '2024-04-03 09:55:00', 27),
(14, 'test en ailant recherché id 26', '2024-04-03 12:18:56', 27),
(15, 'hjsbdajhbsdasd', '2024-04-03 12:58:43', 27),
(16, 'jedasdasdasdasdad', '2024-04-03 13:07:50', 27),
(17, 'dsfdsfsdfs', '2024-04-03 13:09:04', 26),
(18, 'fsdfsdfsdf', '2024-04-03 13:09:06', 26),
(19, 'dfsdfsdf', '2024-04-03 13:09:07', 26),
(20, 'dsadsanjnsdfsd', '2024-04-03 13:26:57', 27),
(21, 'fdsfsdfsdf sdfsd f s', '2024-04-04 10:16:26', 27),
(22, 'hello since message sender is in a new file repository', '2024-04-04 12:15:18', 27),
(23, 'test since post file has been moved', '2024-04-04 12:32:52', 27),
(24, 'dasdasdasd', '2024-04-04 12:36:57', 27),
(25, 'sdasdasdasda a das da sd asd as da', '2024-04-04 12:37:02', 27),
(26, 'hello everyone', '2024-04-04 13:13:50', 27),
(27, 'hallo', '2024-04-05 09:14:27', 27),
(28, 'hello from testtest user for my new post of the day', '2024-04-05 12:41:08', 26),
(29, 'dasdasda', '2024-04-07 08:44:22', 27),
(30, 'dddddd', '2024-04-07 08:44:25', 27),
(31, 'sda sd asd asda', '2024-04-07 08:44:42', 27),
(32, 'fdfsdfs', '2024-04-08 14:14:59', 27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `dateBirth` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `adress` varchar(150) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `first_name`, `username`, `dateBirth`, `gender`, `adress`, `Admin`) VALUES
(25, 'jojo@jojo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'jobar', 'jojo', 'jojodu68', '2023-09-07', 'male', '5 rue de jojo, hagenthal', 0),
(26, 'test2@test2.com', '81dc9bdb52d04dc20036dbd8313ed055', 'test2', 'test', 'testtest', '2024-03-01', 'male', 'test 2', 0),
(27, 'reytheopro@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Rey', 'Théo', 'trey20000', '2024-03-01', 'male', '5 rue des primeveres', 1),
(29, 'jean@luc.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Delahaye', 'Jean Luc', 'jj68', '2024-04-06', 'other', '5 rue de roland, hagenthal-le-bas', 0),
(30, 'sdasdasda@dsadasdas.fr', '81dc9bdb52d04dc20036dbd8313ed055', 'dasdada', 'dasdasda', 'sdadsada', '2024-04-05', 'female', 'sdasda dsd a sd as', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comments`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comments` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
