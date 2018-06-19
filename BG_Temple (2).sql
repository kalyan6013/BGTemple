-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2018 at 08:17 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BG_Temple`
--

-- --------------------------------------------------------

--
-- Table structure for table `Devotee_Enquiry`
--

CREATE TABLE `Devotee_Enquiry` (
  `ID` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Enquiry` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Devotee_Enquiry`
--

INSERT INTO `Devotee_Enquiry` (`ID`, `Name`, `Email`, `Mobile`, `Enquiry`) VALUES
(1, 'Kalyan', 'kalyan.aruru@gmail.com', '9886016013', 'Hello I need to know the temple timings.'),
(2, 'Kalyan', 'kalyan42824@gmail.com', '9989627950', 'hello'),
(3, 'Hemanth', 'kalyan.aruru@gmail.com', '9989627950', 'Hello'),
(4, 'Kalyan', 'kalyanatekvity@gmail.com', '9490259289', 'Hi,'),
(5, 'Kalyan', 'kalyan42824@gmail.com', '9989627950', 'I need to know temple timings'),
(6, 'Kalyan', 'kalyan.aruru@gmail.com', '0989898987', 'dasfgg'),
(7, '999', 'kalyan.aruru@gmail.com', '0989898987', 'swaefg'),
(8, 'Hemanth', 'kalyan42824@gmail.com', '9989627950', 'Hello'),
(9, 'Kalyan', 'kalyan.aruru1@gmail.com', '9886016013', 'Hello'),
(10, 'Kalyan', 'kalyan.aruru1@gmail.com', '9886016013', 'Hi'),
(11, 'Kalyan', 'kalyan.aruru1@gmail.com', '9989627950', 'hi, i have a nice day!!!!'),
(12, 'Kalyan', 'kalyan.aruru@gmail.com', '9988998899', 'hi'),
(13, 'Kalyan', 'kalyan.aruru@gmail.com', '9988776655', 'Hello, How are you'),
(14, 'Kalyan', 'kalyan.aruru@gmail.com', '9090909090', 'Hello'),
(15, 'Kalyan', 'kalyan.aruru@gmail.com', '9090889988', 'Hello'),
(16, 'k', 'kalyan.aruru1@gmail.com', '9876545678', 'hi'),
(17, 'Kal', 'kalyan@gmail.com', '9876789890', 'HHHHH'),
(18, 'Kalyan', 'kalyan@yahoo.com', '9879900998', 'Hjikjihghg'),
(19, 'Kalyan', 'kalyan.aruru@gmail.com', '9886016013', 'Hello,'),
(20, 'Kal', 'kal@gmail.com', '9898987777', 'Hllo'),
(21, 'k', 'k@gmail.com', '9898989898', 'hello'),
(22, 'fdsfsd', 'fsdaf@sgfsg.ccxv', '9886778654', 'sfsdgdvvjvnkgj'),
(23, 'k', 'k@gmail.com', '9888998899', 'hhsjacsbl'),
(24, 'Kalyan', 'kalyan.aruru@gmail.com', '9886016013', 'Hello'),
(25, 'Kalyan', 'kalyan.aruru@gmail.com', '9886016013', 'Hello'),
(26, 'Kalyan', 'kalyan.aruru@gmail.com', '9886016013', 'Hello'),
(27, 'Kalyan', 'kalyan.aruru@gmail.com', '9886016013', 'Hi'),
(28, 'Hemanth', 'kalyan42824@gmail.com', '9886016013', 'Hi'),
(29, 'kalyan', 'kalyan.aruru@gmail.com', '9886016013', 'Hi'),
(30, 'kalyan', 'kalyan.aruru@gmail.com', '9989627950', 'Hi'),
(31, 'Hemanth Kalyan', 'hemanthkalyan001@gmail.com', '9490259289', 'Hi'),
(32, 'Kalyan', 'kalyan.aruru@gmail.com', '9989627950', 'Hi.....Hello....'),
(33, 'Kalyan', 'kalyan.aruru@gmail.com', '9989627950', 'Hello...');

-- --------------------------------------------------------

--
-- Table structure for table `Donations`
--

CREATE TABLE `Donations` (
  `ID` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Sevas`
--

CREATE TABLE `Sevas` (
  `ID` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Date` date NOT NULL,
  `Seva` varchar(100) NOT NULL,
  `Amount` varchar(6) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(40) NOT NULL,
  `Zip` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sevas`
--

INSERT INTO `Sevas` (`ID`, `Name`, `Email`, `Mobile`, `Gender`, `Date`, `Seva`, `Amount`, `Address`, `City`, `State`, `Zip`) VALUES
(1, 'A Hemanth Kalyan', 'kalyan.aruru@gmail.com', '9886016013', 'male', '2016-12-31', 'Panchamritha Abhisheka', '175/-', 'Tekvity Pvt Ltd, Yasodhanagar', 'Bangalore', 'Karnataka', '560076'),
(2, 'Kalyan', 'kalyan.aruru@gmail.com', '9898989877', 'male', '2016-12-29', 'Panchamritha Abhisheka', '175/-', 'Bangalore', 'Bangalore', 'Karnataka', '560076'),
(3, 'Dharmick', 'kalyan.aruru@gmail.com', '9898989877', 'male', '2016-12-31', 'Panchamritha Abhisheka', '175/-', 'Bangalore', 'Bangalore', 'Karnataka', '560076'),
(4, 'Kalyan', 'kalyan.aruru@gmail.com', '9898989877', 'male', '2016-12-29', 'Panchamritha Abhisheka', '175/-', 'Bangalore', 'Bangalore', 'Karnataka', '560076'),
(5, 'Dharmick', 'dharmick.aruru@gmail.com', '9886016013', 'male', '2016-12-31', 'Panchamritha Abhisheka', '175/-', 'Punganur', 'Punganur', 'Andhra Pradesh', '517247'),
(6, 'Hemanth', 'hemanthkalyan001@gmail.com', '9490259289', 'male', '2016-12-31', 'Navagraha Shanthi', '1000/-', 'Bangalore', 'Bangalore', 'Karnataka', '560076'),
(7, 'Kalyan', 'kalyan@gmail.com', '9898989898', 'Male', '2017-01-03', 'Panchamritha Abhisheka', '175/-', 'Bangalore', 'Bangalore', 'Karnataka', '560076'),
(8, 'Kalyan', 'kalyan.aruru@gmail.com', '9989627950', 'Male', '2017-01-10', 'Kadubu Garland Alankara', '2000/-', 'Bangalore', 'Bangalore', 'Karnataka', '560064'),
(9, 'Kalyan', 'kalyan.aruru@gmail.com', '9490259289', 'Male', '2017-01-15', 'Panchamritha Abhisheka', '175/-', 'Bangalore', 'Bangalore', 'Karnataka', '560076'),
(10, 'Kalyan', 'kalyan.aruru@gmail.com', '9886016013', 'Male', '2017-01-31', 'Rudrabhisheka', '200/-', 'Bnagalore', 'Bangalore', 'Karnataka', '560064'),
(11, 'Kalyan', 'kalyan.aruru@gmail.com', '9989627950', 'Male', '2017-01-31', 'Panchamritha Abhisheka', '175/-', 'Punganur', 'Punganur', 'Andhra Pradesh', '517247'),
(12, 'Siva', 'kalyan.aruru@gmail.com', '9490016589', 'Male', '2017-01-31', 'Panchamritha Abhisheka', '175/-', '13/9,\r\nBazar Street\r\nPunganur', 'Punganur', 'Andhra Pradesh', '560064');

-- --------------------------------------------------------

--
-- Table structure for table `Seva_Members`
--

CREATE TABLE `Seva_Members` (
  `ID` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Date` date NOT NULL,
  `Seva` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Seva_Members`
--

INSERT INTO `Seva_Members` (`ID`, `Name`, `Mobile`, `Gender`, `Date`, `Seva`) VALUES
(1, 'Dharmick', '9666027979', 'male', '2016-12-30', 'Panchamritha Abhisheka'),
(2, 'Kalyan', '9898989877', 'male', '2016-12-29', 'Panchamritha Abhisheka'),
(3, 'Dharmick', '9886016013', 'male', '2016-12-31', 'Panchamritha Abhisheka'),
(4, 'Hemanth', '9490259289', 'male', '2016-12-31', 'Navagraha Shanthi'),
(5, 'Kalyan', '9898989898', 'Male', '2017-01-03', 'Panchamritha Abhisheka'),
(6, 'Kalyan', '9989627950', 'Male', '2017-01-10', 'Kadubu Garland Alankara'),
(7, 'Kalyan', '9490259289', 'Male', '2017-01-15', 'Panchamritha Abhisheka'),
(8, 'Kalyan', '9886016013', 'Male', '2017-01-31', 'Rudrabhisheka'),
(9, 'Kalyan', '9989627950', 'Male', '2017-01-31', 'Panchamritha Abhisheka'),
(10, 'Siva', '9490016589', 'Male', '2017-01-31', 'Panchamritha Abhisheka');

-- --------------------------------------------------------

--
-- Table structure for table `Trust_Management`
--

CREATE TABLE `Trust_Management` (
  `ID` int(3) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Trust_Members`
--

CREATE TABLE `Trust_Members` (
  `ID` int(2) NOT NULL,
  `Post` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Trust_Members`
--

INSERT INTO `Trust_Members` (`ID`, `Post`, `Name`, `Mobile`) VALUES
(1, 'President', 'G Jayaram', '9343564818'),
(2, 'Vice-President', 'Srinivas', '8553587696'),
(3, 'Principal Working Chairman', 'Muni Narayana', '9342737455'),
(4, 'Assistant Working Chairman', 'G S Balaji', '9343249939'),
(5, 'Treasurer', 'R Amar Narayana', '9036183173'),
(6, 'Director', 'L Lakshmipathi', '9845574936'),
(7, 'Director', 'M Ganesha', '8095766977'),
(8, 'Member', 'S Babu', '9535098666'),
(9, 'Member', 'E Girish Babu', '9036228422'),
(10, 'Member', 'R Sri', '9972912652'),
(11, 'Member', 'G S Sridhar Guptha', '9341779021'),
(12, 'Member', 'A Manjunatharchary', '9986164811'),
(13, 'Member', 'R Rajasekhar', '9964763559'),
(14, 'Member', 'A B Mukunda', '9986071652'),
(15, 'Member', 'M S Sridhar', '9900891050'),
(16, 'Member', 'Nagaraju', '8970999440'),
(17, 'Member', 'D S MuniKrishnappa', '9886233889'),
(18, 'Member', 'Sasi Kumar', '8867374994'),
(19, 'Member', 'C Kumar', '9008781195'),
(20, 'Member', 'M Narayana Swamy', '9731178585'),
(21, 'Member', 'B A Vijay Kumar', '9902884800'),
(22, 'Member', 'Ravi Kumar', '9845246628'),
(23, 'Member', 'Vijay Kumar', '8861050489'),
(24, 'Member', 'R GovindRaju', '9066841635'),
(25, 'Member', 'P Sai Kumar', '8050620820');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Devotee_Enquiry`
--
ALTER TABLE `Devotee_Enquiry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Sevas`
--
ALTER TABLE `Sevas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Seva_Members`
--
ALTER TABLE `Seva_Members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Trust_Management`
--
ALTER TABLE `Trust_Management`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Trust_Members`
--
ALTER TABLE `Trust_Members`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Mobile` (`Mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Devotee_Enquiry`
--
ALTER TABLE `Devotee_Enquiry`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `Sevas`
--
ALTER TABLE `Sevas`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Seva_Members`
--
ALTER TABLE `Seva_Members`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Trust_Management`
--
ALTER TABLE `Trust_Management`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Trust_Members`
--
ALTER TABLE `Trust_Members`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
