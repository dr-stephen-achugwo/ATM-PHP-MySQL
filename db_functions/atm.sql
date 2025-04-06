-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 04:46 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `trans_current_dep` (IN `tran_id` INT(7), IN `acc_no` VARCHAR(20), IN `t_amt` INT(7), IN `balance` INT(7))  NO SQL
insert INTO transaction values(CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,tran_id,acc_no,'current',t_amt,balance,'credit')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `trans_current_with` (IN `tran_id` INT(7), IN `acc_no` VARCHAR(20), IN `t_amt` INT(7), IN `balance` INT(7))  NO SQL
insert INTO transaction values(CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,tran_id,acc_no,'current',t_amt,balance,'debit')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `trans_saving_dep` (IN `tran_id` INT(7), IN `acc_no` VARCHAR(20), IN `t_amt` INT(7), IN `balance` INT(7))  NO SQL
insert INTO transaction values(CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,tran_id,acc_no,'saving',t_amt,balance,'credit')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `trans_saving_with` (IN `tran_id` INT(7), IN `acc_no` VARCHAR(20), IN `t_amt` INT(7), IN `balance` INT(7))  NO SQL
insert INTO transaction values(CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,tran_id,acc_no,'saving',t_amt,balance,'debit')$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `c_id` int(11) NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `atm_pin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`c_id`, `acc_no`, `atm_pin`) VALUES
(1, '1234567890', 2222),
(2, '2345678901', 2018),
(3, '3456789012', 2016),
(4, '4567890123', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE `atm` (
  `a_id` int(11) NOT NULL,
  `a_location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`a_id`, `a_location`) VALUES
(1, 'Kammanahalli');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(20) DEFAULT NULL,
  `b_location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`b_id`, `b_name`, `b_location`) VALUES
(1, 'State Bank of India', 'Kammanahalli'),
(2, 'State Bank of India', 'Hebbal'),
(3, 'State Bank of India', 'New Bel'),
(4, 'State Bank of India', 'R.T Nagar'),
(5, 'State Bank of India', 'Malleshwaram'),
(6, 'State Bank of India', 'Indiranagar'),
(7, 'State Bank of India', 'M.G Road'),
(8, 'State Bank of India', 'Cunningham Road'),
(9, 'State Bank of India', 'Sahakarnagar'),
(10, 'State Bank of India', 'J.P Nagar');

-- --------------------------------------------------------

--
-- Table structure for table `current_account`
--

CREATE TABLE `current_account` (
  `c_id` int(11) NOT NULL,
  `current_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_account`
--

INSERT INTO `current_account` (`c_id`, `current_balance`) VALUES
(1, 245900),
(2, 2000),
(3, 3000),
(4, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `c_fname` varchar(20) DEFAULT NULL,
  `c_lname` varchar(20) DEFAULT NULL,
  `c_address` varchar(30) DEFAULT NULL,
  `c_mob` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `b_id`, `c_fname`, `c_lname`, `c_address`, `c_mob`) VALUES
(1, 1, 'Ansh', ' Pandey', 'Banashankri', '7019209690'),
(2, 1, 'Yash', 'Sinha', 'M G Road', '8660591081'),
(3, 1, 'Bharghav', 'JK', 'JP Nagar', '8073878189'),
(4, 2, 'Akash', 'Bansal', 'Bidarahalli', '8861776693');

-- --------------------------------------------------------

--
-- Table structure for table `saving_account`
--

CREATE TABLE `saving_account` (
  `c_id` int(11) NOT NULL,
  `saving_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saving_account`
--

INSERT INTO `saving_account` (`c_id`, `saving_balance`) VALUES
(1, 36000),
(2, 1000),
(3, 3000),
(4, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `date` date NOT NULL,
  `time` time NOT NULL,
  `t_id` int(11) NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `t_amount` int(11) DEFAULT NULL,
  `t_balance` int(11) NOT NULL,
  `t_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction`
(`date`, `time`, `t_id`, `acc_no`, `account_type`, `t_amount`, `t_balance`, `t_type`)
VALUES
('2023-01-03', '18:50:39', 1053, '1234567890', 'current', 123000, 247600, 'debit'),
('2023-01-07', '08:25:33', 1054, '1234567890', 'current', 12300, 259900, 'debit'),
('2023-01-09', '08:25:43', 1055, '1234567890', 'current', 10000, 249900, 'debit'),
('2023-01-10', '16:13:05', 1056, '1234567890', 'current', 1000, 250900, 'debit'),
('2023-01-17', '16:22:47', 1057, '1234567890', 'current', 5000, 245900, 'debit'),
('2023-01-18', '16:30:26', 1058, '1234567890', 'saving', 100000, 37000, 'debit'),
('2023-01-23', '14:25:08', 1059, '1234567890', 'saving', 1000, 36000, 'debit');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_id`
--

CREATE TABLE `transaction_id` (
  `t_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_id`
--

INSERT INTO `transaction_id` (`t_id`) VALUES
(1059);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`acc_no`,`c_id`);

--
-- Indexes for table `atm`
--
ALTER TABLE `atm`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `current_account`
--
ALTER TABLE `current_account`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`,`b_id`);

--
-- Indexes for table `saving_account`
--
ALTER TABLE `saving_account`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `transaction_id`
--
ALTER TABLE `transaction_id`
  ADD PRIMARY KEY (`t_id`);

  
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
