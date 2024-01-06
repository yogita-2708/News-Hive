-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 05:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_details`
--

CREATE TABLE `news_details` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `descn` text NOT NULL,
  `date` date NOT NULL,
  `category` varchar(255) NOT NULL,
  `picture` longblob NOT NULL,
  `rid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_details`
--

INSERT INTO `news_details` (`id`, `title`, `descn`, `date`, `category`, `picture`, `rid`) VALUES
(9, 'Gone In 107 Overs: India vs South Africa ', 'The buildup to the India vs South Africa second Test in Cape Town was all about the capitulation of the visitors in the first Test. After a loss by an innings and 32 runs in Centurion, the odds were stacked against the Rohit Sharma-led Indian cricket team. However, it did not take long for the Indian cricket team to dish out a cold revenge - only 107 overs to be precise. After a loss by an innings and 32 runs in Centurion, the odds were stacked against Indian cricket team.', '2024-01-04', 'Sports ', 0x73706f727473312e77656270, 'admin@gmail.com'),
(11, 'India Ratings raises GDP growth forecast ', 'India Ratings and Research (Ind-Ra) has revised upwards its GDP growth estimate for FY24 to 6.7 per cent from 6.2 per cent earlier. The revision is led by a number of factors, including the resilience of the Indian economy. The finance ministry expects the Indian economy GDP growth rate in 2023-24 to comfortably exceed its forecast of 6.5 percent following the blockbuster data for July-September. ', '2024-01-05', 'Business', 0x627573696e657373332e6a7067, 'admin@gmail.com'),
(15, 'Delhi set to see most polluted in four years', 'As Delhi air quality stood on the brink of the â€˜severeâ€™ category on Saturday, the average AQI for December is set to be the worst from 2019 onwards.\r\nThe average AQI for the month, till December 30, was 346. On Saturday, the 24-hour average AQI at 4 pm was 400, close to the severe category, according to data from the Central Pollution Control Board (CPCB).', '2024-01-05', 'Environment', 0x6e657773332e6a7067, 'admin@gmail.com'),
(18, 'World Report Reveals Best and Worst Diets for 2024', ' U.S. News and World Report just released its top diets for 2024. The winner (Drumroll) Out of 30 diets, the Mediterranean diet is No. 1 for the seventh year in a row. Meanwhile, other popular diets, including the ketogenic diet (keto) and Atkins, landed toward the bottom of the Best Diets Overall list. As in previous years, in 2024 the Mediterranean diet beat out the dietary approaches to stop hypertension (DASH) diet on the overall list.', '2024-01-05', 'Health ', 0x6865616c74682e6a7067, 'admin@gmail.com'),
(19, 'The year ahead in politics:  Centre forward in India', 'Indian citizens will have their 18th tryst with electing national political representatives in 2024. Each general election has, of course, thrown up a new legislature, and through that, a new political executive. But each election has also been a way for an extraordinarily diverse Indian society to talk to each other, organise itself into factions, compete with each other, answer fundamental questions about priorities, anxieties, fears and hopes.', '2024-01-05', 'Business ', 0x706f6c6974696373322e6a7067, 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_details`
--
ALTER TABLE `news_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_details`
--
ALTER TABLE `news_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
