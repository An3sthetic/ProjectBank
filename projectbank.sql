-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 11:37 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(250) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
('CSC 249', 'Hardware'),
('CSC 250', 'Public Speaking'),
('csc 469', 'Graphics');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `executive_summary` varchar(25000) NOT NULL,
  `type` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `title`, `link`, `author`, `executive_summary`, `type`, `supervisor`) VALUES
(1, 'something', 'something', 'something', '12321', 'CSC 249', 'something'),
(2, 'assdasd', 'saasas', 'asdasd', 'asdas', 'qwe', 'asdsas'),
(8, 'asd', 'asdd', 'sadadasd', 'dsaasd', 'xczxxc', 'asdads'),
(9, 'asd', 'asdd', 'sadadasd', 'dsaasd', 'bvcbvc', 'asdads'),
(10, 'asd', 'asdd', 'sadadasd', 'dsaasd', 'mnmmmn', 'asdads'),
(11, 'asd', 'asdd', 'teacher', 'dsaasd', 'oioio', 'asdads'),
(12, 'asd', 'asdd', 'sadadasd', 'dsaasd', 'juuku', 'asdads'),
(13, 'asd', 'asdd', 'sadadasd', 'dsaasd', 'hjk', 'asdads'),
(14, 'asd', 'asdd', 'sadadasd', 'dsaasd', 'CSC 250', 'asdads'),
(15, 'dfadfa', 'dffa', 'daffds', 'asdfa', 'asdaxzzxczcxczxx', 'dfsfds'),
(16, 'dfadfa', 'dffa', 'daffds', 'asdfa', 'zcxczxx', 'dfsfds'),
(17, 'dfadfa', 'dffa', 'daffds', 'asdfa', '123', 'dfsfds'),
(18, 'dfadfa', 'dffa', 'daffds', 'asdfa', '6455', 'teacher'),
(19, 'dfadfa', 'dffa', 'daffds', 'asdfa', '879', 'dfsfds');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `password` varchar(250) NOT NULL,
  `validation` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `type`, `password`, `validation`) VALUES
(1, 'superad', 'superadmin', '123', 'approved'),
(2, 'teacher', 'admin', '123', 'approved'),
(3, 'Shoykot Khan', 'author', '123', 'approved'),
(4, 'qwwe', 'admin', '123', 'approved'),
(11123, 'Shadman Sakib', 'author', '123', 'pending'),
(76767, 'sdaasd', 'admin', '123', 'pending'),
(5, 'so', 'admin', '123', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `u_id` int(10) NOT NULL,
  `c_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`u_id`, `c_id`) VALUES
(324, 'asd'),
(564, '54'),
(21321, 'lkkl'),
(1, '1'),
(1, '1'),
(1, '2'),
(2, 'CSC 250'),
(3, 'CSC 250');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD UNIQUE KEY `course_id` (`course_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD UNIQUE KEY `p_id_2` (`p_id`),
  ADD KEY `p_id_3` (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
