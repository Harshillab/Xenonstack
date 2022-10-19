-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 03:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `Id` int(20) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`Id`, `user`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `carddetail`
--

CREATE TABLE `carddetail` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `expmonth` int(2) NOT NULL,
  `expyear` year(4) NOT NULL,
  `cvv` int(3) NOT NULL,
  `prodname` varchar(255) NOT NULL,
  `prodquantity` varchar(255) NOT NULL,
  `prodtotal` decimal(10,2) NOT NULL,
  `purchasedate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `deliverydate` varchar(255) NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carddetail`
--

INSERT INTO `carddetail` (`id`, `name`, `number`, `expmonth`, `expyear`, `cvv`, `prodname`, `prodquantity`, `prodtotal`, `purchasedate`, `deliverydate`) VALUES
(57, 'Sonu', 'oFhnZTq4PwSuWhZa1uBwwg==', 2, 2026, 356, 'vishal|Jeans', '1|1', '1802.00', '2021-03-04 12:05:36.002277', '2021-03-10'),
(58, 'Monu', 'UJQRMUSRGvU652z06zwSjw==', 5, 0000, 365, 'vishal|Jeans', '1|1', '1802.00', '2021-03-04 12:08:27.933595', '2021-03-10'),
(60, 'Harshil', 'oFhnZTq4PwSuWhZa1uBwwg==', 5, 0000, 365, 'vishal|Jeans', '1|1', '1802.00', '2021-03-04 12:12:05.022254', '2021-03-10'),
(63, 'Mayank', 'i/gXTOZ3BRIxA3C6P0gdyw==', 2, 2025, 365, 'vishal|Jeans', '1|1', '1802.00', '2021-03-04 12:30:22.976428', '2021-03-10'),
(64, 'Naman', 'fEvmtxKZ6wAflqCKZulqEw==', 8, 2022, 398, 'vishal|Jeans', '1|1', '1802.00', '2021-03-05 05:20:26.553623', '2021-03-11'),
(65, 'Harsh Motwani', 'ws1S62A5AqCzY9x1rXUTBg==', 8, 2030, 359, 'vishal|Jeans', '1|1', '1802.00', '2021-03-09 07:51:42.504978', '2021-03-15'),
(66, 'Vicky Narang', 'a7nf9f29zako+qD4JcZNhA==', 5, 2025, 389, 'vishal|Jeans', '1|1', '1802.00', '2021-03-09 07:52:27.297819', '2021-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE `final` (
  `id` int(20) NOT NULL,
  `amounttotal` decimal(10,2) NOT NULL,
  `totalquantity` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `productname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`id`, `amounttotal`, `totalquantity`, `productname`) VALUES
(9, '1802.00', '1|1', 'vishal|Jeans'),
(10, '2.00', '1', 'vishal'),
(11, '2700.00', '1|1', 'Jeans|Shirt'),
(60, '2702.00', '1 | 1 | 1', 'Jeans | Shirt | vishal'),
(93, '250.00', '1', 'Book'),
(107, '1800.00', '1', 'Jeans'),
(113, '2050.00', '1 | 1', 'Jeans | Book'),
(115, '2052.00', '1 | 1 | 1', 'Jeans | Book | vishal');

-- --------------------------------------------------------

--
-- Table structure for table `mypassword`
--

CREATE TABLE `mypassword` (
  `uid` int(11) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `password2` varchar(255) NOT NULL,
  `password3` varchar(255) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mypassword`
--

INSERT INTO `mypassword` (`uid`, `password1`, `password2`, `password3`, `id`) VALUES
(1, '100', '98', '88', 26),
(2, 'qwertyui', 'wfefewfew', '', 27),
(3, '12345678', '', '', NULL),
(4, '12345678', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `uid` int(2) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `id` int(8) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`uid`, `userpassword`, `id`, `name`) VALUES
(1, '85 90', 16, ''),
(2, '90 92', 17, ''),
(3, 'qas qas', 18, ''),
(4, 'sxcxscdd 25', 19, ''),
(5, 'fds 7895', 20, 'Harsh Motwani'),
(6, 'sdffefedfe ss', 21, 'Mayank Goyal'),
(7, 'dfsfsfsdfvde 55', 22, 'Ashish Karnawat');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('harshilagarwal048@gmail.com', '768e78024aa8fdb9b8fe87be86f6474588751df8ef', '2021-02-17 06:05:34'),
('harshilagarwal048@gmail.com', '768e78024aa8fdb9b8fe87be86f64745a791982d62', '2021-02-17 06:14:59'),
('harshilagarwal048@gmail.com', '768e78024aa8fdb9b8fe87be86f647458ce44878c0', '2021-02-17 06:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `specification` varchar(255) NOT NULL,
  `mprice` double(10,2) NOT NULL,
  `sprice` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `specification`, `mprice`, `sprice`) VALUES
(1, 'Jeans', 'jeans.jpg', 'aaaa', 2000.00, 1800.00),
(2, 'Book', 'book.jfif', 'ssss', 300.00, 250.00),
(3, 'Book1', 'book.jfif', 'dddd', 500.00, 300.00),
(4, 'Shirt', 'shirt.jpg', 'sassa', 1000.00, 900.00),
(5, 'vishal', 'shirt.jpg', 'choclate', 7.00, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `PWDResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `secondpassword`
--

CREATE TABLE `secondpassword` (
  `id` int(8) NOT NULL,
  `secondpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `fld_message_id` int(10) NOT NULL,
  `fld_name` varchar(25) NOT NULL,
  `fld_email` varchar(25) NOT NULL,
  `fld_phone` int(10) NOT NULL,
  `fld_msg` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'MSI GF63 Thin Core i7 9th Gen', 'MSI4353', 'product-images/msi-laptop.jpeg', 1500.00),
(2, 'WD 1.5 TB Wired External Hard Disk Drive (Black)', 'WD091', 'product-images/external-hardidisk.jpeg', 50.00),
(3, 'VERTIGO Running Shoes For Men (Black)', 'LOTTO215', 'product-images/lotto-shoes.jpeg', 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `usertable1`
--

CREATE TABLE `usertable1` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `random` varchar(8) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable1`
--

INSERT INTO `usertable1` (`id`, `user`, `email`, `password`, `dob`, `created_at`, `gender`, `city`, `state`, `country`, `image`, `status`, `random`, `questions`, `answer`) VALUES
(2, 'Rishabh', 'r@gmail.com', '125', '2013-12-30', '2021-02-10 12:48:25', 'male', 'Chennai', 'TamilNadu', 'India', 'login.jpeg', 0, 'DSAHJ12', '', ''),
(4, 'Vishalma', 'v@gmail.com', 'Vishalma', '2021-02-18', '2021-02-10 16:03:25', 'male', 'Los Angeles', 'California', 'USA', 'profile.jpeg', 1, 'DSrJ12', '', ''),
(5, 'cbhdsbvjbvj', 'vdfsgd@gmail.com', 'sfrehytjyjyuijtu', '2021-03-03', '2021-03-02 09:59:19', 'male', 'Los Angeles', 'California', 'USA', 'shirt.jpg', 1, 'DSJ12', '', ''),
(6, 'Nandini', 'ng@gmail.com', 'bvfjwebfjwef', '1993-02-18', '2021-03-08 07:27:27', 'female', 'Mumbai', 'Maharashtra', 'India', 'jeans.jpg', 0, 'DJ12', '', ''),
(7, 'VAGVSGAV', 'vd@gmail.com', 'scdsgvdfsbf', '1995-04-17', '2021-03-08 07:34:32', 'male', 'Munich', 'Bavaria', 'Germany', 'book.jfif', 1, 'DSAerJ12', '', ''),
(8, 'gvfdgfdg', 'df@gmail.com', 'sdfdgfdgdg', '0000-00-00', '2021-03-08 07:42:31', 'male', 'Mumbai', 'Maharastra', 'India', 'instagram.png', 1, 'BE31', '', ''),
(10, 'sdafdsgd', 'sf@gmail.com', '1287', '1996-08-27', '2021-03-08 07:51:26', 'male', 'Nuremberg', 'Bavaria', 'Germany', 'profile.jpeg', 1, '97A0', '', ''),
(11, 'asdcsafd', 'asd@gmail.com', '128', '1997-10-29', '2021-03-08 08:49:59', 'male', 'Vancouver', 'BritishColumbia', 'Canada', 'profile.jpeg', 1, 'F2146354', '', ''),
(12, 'GVDDFWDS', 'asdfd@gmail.com', '1369', '1992-02-25', '2021-03-08 09:00:28', 'male', 'Vancouver', 'BritishColumbia', 'Canada', 'shirt.jpg', 0, '85119A6F', 'Who is your best friend?', 'Vishal'),
(13, 'Aman Sharma', 'ams@gmail.com', '1237', '1998-03-18', '2021-03-10 06:30:03', 'male', 'Mumbai', 'Maharashtra', 'India', 'instagram.png', 0, '5A4A2D7A', 'Who is your best friend?', 'Shreyansh'),
(14, 'Harshil Sharma', 'ha@gmail.com', 'scdffg', '1997-06-20', '2021-03-12 05:23:43', 'male', 'Vancouver', 'BritishColumbia', 'Canada', 'login.jpeg', 0, 'A981B10C', 'Which is your favourite movie?', 'DDLG'),
(15, 'swdnjdefnrj', 'as@gmail.com', 'sfdcewf', '1998-08-26', '2021-03-12 06:19:08', 'male', 'Munich', 'Bavaria', 'Germany', 'jeans.jpg', 0, '07893D71', 'Who is your best friend?', 'Spider Man'),
(16, 'dgvdghfvhf', 'ads@gmail.com', '90', '1992-03-21', '2021-03-12 06:23:33', 'male', 'Houston', 'Texas', 'USA', 'profile.jpeg', 0, 'EB75FDB4', 'Who is your best friend?', 'Abhay'),
(17, 'wsfewfewf', 'egf@gmail.com', '92', '1998-04-18', '2021-03-12 06:26:31', 'male', 'San Diego', 'California', 'USA', 'login.jpeg', 0, '669A2748', 'Who is your best friend?', 'Vayu'),
(18, 'edhdfvhf', 'efd@gmail.com', 'qas', '2016-07-20', '2021-03-12 06:28:30', 'male', 'Mumbai', 'Maharashtra', 'India', 'book.jfif', 0, '3CA5D432', 'What is your petname?', 'Dog'),
(19, 'scbdjbvdfb', 'sa@gmail.com', '25', '1998-07-20', '2021-03-12 07:47:46', 'male', 'San Diego', 'California', 'USA', 'profile.jpeg', 0, '45633C62', 'Who is your favourite actor?', 'Vishal'),
(20, 'Harsh Motwani', 'hm@gmail.com', '7895', '1997-07-24', '2021-03-13 09:27:20', 'male', 'Los Angeles', 'California', 'USA', 'profile.jpeg', 0, '5C8F5D3D', 'Who is your best friend?', 'Bhavya'),
(21, 'Mayank Goyal', 'm@gmail.com', 'ss', '1996-04-13', '2021-03-13 10:49:18', 'male', 'Brandon', 'Manitoba', 'Canada', 'shirt.jpg', 0, '070AFF35', 'Which is your favourite movie?', 'DDLG'),
(22, 'Ashish Karnawat', 'ak@gmail.com', '55', '1997-02-23', '2021-03-13 11:10:53', 'male', 'Houston', 'Texas', 'USA', 'profile.jpeg', 0, 'C52895FC', 'Which is your favourite movie?', 'fgh'),
(23, 'Saransh Bhagat', 'sb@gmail.com', 'sdefdfdffgve', '1998-06-19', '2021-03-15 06:04:42', 'male', 'Los Angeles', 'California', 'USA', 'shirt.jpg', 0, '8AADB8EB', 'Which is your favourite movie?', 'KHNH'),
(24, 'Tom Bruce', 'tb@gmail.com', 'sdefwe', '1998-05-19', '2021-03-15 06:09:30', 'male', 'Munich', 'Bavaria', 'Germany', 'login.jpeg', 0, 'F923AF21', 'Who is your best friend?', 'Ronaldo'),
(25, 'Ankur Agarwal', 'a1@gmail.com', 'sdxdscwdc', '1998-01-23', '2021-03-15 06:13:50', 'male', 'Mumbai', 'Maharashtra', 'India', 'profile.jpeg', 0, '4CDFD280', 'Who is your favourite actor?', 'Aamir Khan'),
(26, 'ftfhjghgh', 'ftfd@gmail.com', '100', '1996-12-23', '2021-03-15 06:28:03', 'male', 'Brandon', 'Manitoba', 'Canada', 'book.jfif', 0, '51B63A63', 'Who is your favourite actress?', 'Vishal'),
(27, 'Yash Sharma', 'ys@gmail.com', 'qwertyui', '1998-05-22', '2021-03-15 08:52:19', 'male', 'Los Angeles', 'California', 'USA', 'instagram.png', 0, '86DE5003', 'Which is your favourite movie?', 'JTHJ'),
(28, 'Harshil Agarwal', 'harshilagarwal55570@gmail.com', '12345678', '1999-11-01', '2022-10-19 07:15:30', 'male', 'Mumbai', 'Maharashtra', 'India', '', 0, '8AD7DACB', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `carddetail`
--
ALTER TABLE `carddetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final`
--
ALTER TABLE `final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mypassword`
--
ALTER TABLE `mypassword`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `secondpassword`
--
ALTER TABLE `secondpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `usertable1`
--
ALTER TABLE `usertable1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carddetail`
--
ALTER TABLE `carddetail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `final`
--
ALTER TABLE `final`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `mypassword`
--
ALTER TABLE `mypassword`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
  MODIFY `uid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `secondpassword`
--
ALTER TABLE `secondpassword`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertable1`
--
ALTER TABLE `usertable1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mypassword`
--
ALTER TABLE `mypassword`
  ADD CONSTRAINT `mypassword_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usertable1` (`id`);

--
-- Constraints for table `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `password_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usertable1` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
