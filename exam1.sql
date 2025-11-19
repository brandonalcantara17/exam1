-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: exam1_mysql
-- Generation Time: Nov 19, 2025 at 06:02 PM
-- Server version: 9.5.0
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Alimentació sostenible'),
(10, 'Altres'),
(8, 'Compostatge i jardí'),
(9, 'Energia renovable'),
(2, 'Higiene eco'),
(3, 'Llar eficient'),
(6, 'Mobilitat verda'),
(5, 'Moda sostenible'),
(7, 'Reduir/Reutilitzar'),
(4, 'Tecnologia responsable');

-- --------------------------------------------------------

--
-- Table structure for table `Example`
--

CREATE TABLE `Example` (
  `id` int NOT NULL,
  `Example_int` int DEFAULT NULL,
  `Example_varchar` varchar(255) DEFAULT NULL,
  `Example_tinyint` tinyint DEFAULT NULL,
  `Example_json` json DEFAULT NULL,
  `Example_date` date DEFAULT NULL,
  `Example_text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Example`
--

INSERT INTO `Example` (`id`, `Example_int`, `Example_varchar`, `Example_tinyint`, `Example_json`, `Example_date`, `Example_text`) VALUES
(1, 10, 'Row 1', 1, '{\"a\": 1}', '2024-01-01', 'Text 1'),
(2, 20, 'Row 2', 0, '{\"b\": 2}', '2024-02-01', 'Text 2'),
(3, NULL, 'Row 3', 1, '{\"c\": 3}', NULL, 'Text 3'),
(4, 40, NULL, 0, '{\"d\": 4}', '2024-04-01', NULL),
(5, 50, 'Row 5', NULL, NULL, '2024-05-01', 'Text 5'),
(6, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 70, 'Row 7', 1, '{\"x\": 7}', NULL, 'Text 7'),
(8, 80, 'Row 8', 0, '{\"y\": 8}', '2024-08-01', NULL),
(9, 90, NULL, 1, '{\"z\": 9}', '2024-09-01', 'Text 9'),
(10, 100, 'Row 10', 0, NULL, NULL, 'Text 10');

-- --------------------------------------------------------

--
-- Table structure for table `productes`
--

CREATE TABLE `productes` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `preu` int NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `data_hora` datetime NOT NULL,
  `productor` varchar(255) NOT NULL,
  `correu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productes`
--

INSERT INTO `productes` (`id`, `nom`, `preu`, `categoria`, `data_hora`, `productor`, `correu`) VALUES
(18, 'afjkeafkjae', 12, '1', '2025-11-19 17:38:49', 'Ns', 'elfjwkfj'),
(19, 'skj sfks f', 1212, '1', '2025-11-19 17:38:57', 'Hmmm', 'slfnslkns'),
(20, 'akfbfkaefjeq', 12, '1', '2025-11-19 17:48:14', 'HmmmmNS', 'kfjkfj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `Example`
--
ALTER TABLE `Example`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Example`
--
ALTER TABLE `Example`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productes`
--
ALTER TABLE `productes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
