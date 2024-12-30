-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 12:52 PM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `age` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `last_name`, `age`) VALUES
(1, 'Amit', 'Sharma', 20),
(2, 'Neha', 'Patel', 22),
(3, 'Ram', 'Boinwand', 23),
(4, 'Priya', 'Kumar', 19),
(5, 'Sidharth ', 'Waghmare', 23),
(6, 'Ganesh ', 'Jawadwar', 23),
(7, 'Vikram', 'Reddy', 25),
(8, 'Pooja', 'Verma', 22),
(9, 'Manoj', 'Gupta', 21),
(10, 'Kavya', 'Honrao', 20),
(11, 'Raghav', 'Gupta', 23),
(12, 'Sneha', 'Chawla', 20),
(13, 'Arjun', 'Bhat', 19),
(14, 'Aarav', 'Rai', 21),
(15, 'Ram', 'Shinde', 43),
(16, 'kishan', 'Sule', 32),
(17, 'Madhuri', 'Mehta', 20),
(18, 'Nikhil', 'Patel', 23),
(19, 'Kunal', 'Kapoor', 21),
(20, 'Tanya', 'Singh', 22),
(21, 'Harsh', 'Verma', 24),
(22, 'Simran', 'Kaur', 20),
(23, 'Pradeep', 'Yadav', 23),
(24, 'Shivani', 'Sharma', 25),
(25, 'Kiran', 'Bansal', 22),
(26, 'Yash', 'Thakur', 21),
(27, 'Divya', 'Chauhan', 23),
(28, 'Akash', 'Aggarwal', 24),
(29, 'Nisha', 'Jain', 19),
(30, 'Shweta', 'Sharma', 22),
(31, 'Deepak', 'Kumar', 25),
(32, 'Meenal', 'Patel', 21),
(33, 'Ajay', 'Reddy', 24),
(34, 'Sapna', 'Jha', 23),
(35, 'Vinay', 'Verma', 20),
(36, 'Rani', 'Singh', 22),
(37, 'Vishal', 'Shukla', 25),
(38, 'Kriti', 'Mehta', 21),
(39, 'Rishabh', 'Bansal', 23),
(40, 'Seema', 'Yadav', 22),
(41, 'Pranav', 'Chawla', 24),
(42, 'Alok', 'Rai', 19),
(43, 'Ayesha', 'Khan', 23),
(44, 'Laxmi', 'Gupta', 20),
(45, 'Shubham', 'Chauhan', 21),
(46, 'Nikita', 'Singh', 22),
(47, 'Ankit', 'Soni', 24),
(48, 'Meenal', 'Gupta', 23),
(49, 'Vandana', 'Sharma', 19),
(50, 'Haritha', 'Nair', 20),
(51, 'Ravi', 'Singh', 22),
(52, 'Rahul', 'Mehta', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
