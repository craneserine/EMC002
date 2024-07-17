-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 03:08 PM
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
-- Database: `birdcage`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `order_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`order_id`, `item_id`, `user_id`) VALUES
(73, 3, 1),
(75, 10, 1),
(76, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_name`, `description`, `price`, `img`) VALUES
(1, 'Sketched Head Illustration', 'A rough sketch of your character\'s head.', 9, '..\\Images\\img-1.png'),
(2, 'Sketched Half Body Illustration', 'A rough sketch of your character\'s torso', 12, '..\\Images\\img-2.png'),
(3, 'Sketched Full Body Illustration', 'A rough sketch of your character\'s full body.', 18, '..\\Images\\img-3.png'),
(4, 'Colored Head Illustration', 'A colored sketch of your character\'s head.', 11, '..\\Images\\img-4.png'),
(5, 'Colored Half Body Illustration', 'A colored sketch of your character\'s torso.', 15, '..\\Images\\img-5.png'),
(6, 'Colored Full Body Illustration', 'A colored sketch of your character\'s full body.', 21, '..\\Images\\img-6.png'),
(7, 'Rendered Head Illustration', 'A fully developed illustration of your character\'s head.', 15, '..\\Images\\img-7.png'),
(8, 'Rendered Half Body Illustration', 'A fully developed illustration of your character\'s torso.', 19, '..\\Images\\img-8.png'),
(9, 'Rendered Full Body Illustration', 'A fully developed illustration of your character\'s fully body.', 25, '..\\Images\\img-9.png'),
(10, 'Addition of a Simple Background', 'An additional charge if you wish to have your characters in a specific setting.', 20, '..\\Images\\img-10.png'),
(11, 'Poster   Illustration', 'A printable drawing of your character that is styled to look like a movie poster of sorts. The price might increase for complexity.', 35, '..\\Images\\img-11.png'),
(12, 'Character Sheet', 'Have the artist design your character from scratch. Prices may increase if details include robotic parts, armor, or weapons.', 30, '..\\Images\\img-12.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'Cranes', '$2y$10$i72c67wTLjL.ceEv4NMKZ.BTJfWOzho/7DwXIkPtN.STsX5aBFJ1K', 'pinwheel.mp3@gmail.com'),
(2, 'test1', 'Test1234!', 'test@email.com'),
(3, 'Test2', '$2y$10$cMCp0UOVd42gcaOzlWiYt.l2n.bEikdqv6d1YaFnhphKKdhagtAY.', 'test2@email.com'),
(4, 'Test3', '$2y$10$UiM/wI1zi5pMgLRp0N8va.Zqbtj2ZYoSRi1L0.671U2eo7crMxVM.', 'test3@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `checkout_ibfk_1` (`item_id`),
  ADD KEY `checkout_ibfk_2` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `product` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
