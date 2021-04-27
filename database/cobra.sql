-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 01:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobra`
--

-- --------------------------------------------------------

--
-- Table structure for table `clint_quotes`
--

CREATE TABLE `clint_quotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `quotes` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active' COMMENT 'active=active active=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clint_quotes`
--

INSERT INTO `clint_quotes` (`id`, `name`, `image`, `designation`, `quotes`, `status`) VALUES
(1, 'Denjus', '159361658_2509787332649339_6186161303808050239_n.jpg', 'Software Engr', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 'active'),
(4, 'Sabbir Hossain', '122809916_362937024989109_7758459926448374036_n.jpg', 'Mechanical Engr.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=read 2=unread 3=delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `status`) VALUES
(10, 'Humayun Kabir', 'humayunkabir12@gmail.com', 'The key to your success on Fiverr is the brand you build for yourself through your Fiverr reputation. We gathered some tips and resources to help you become a leading seller on Fiverr.', 2),
(13, 'Sabbir Hossain', 'sabbir12@gmail.com', 'Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `id` int(10) UNSIGNED NOT NULL,
  `future_projects` varchar(10) NOT NULL,
  `active_projects` varchar(10) NOT NULL,
  `year_experience` varchar(10) NOT NULL,
  `clients` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active' COMMENT 'active=active deactive=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `future_projects`, `active_projects`, `year_experience`, `clients`, `status`) VALUES
(2, '100', '20', '5', '1000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active 2=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `company_name`, `company_logo`, `status`) VALUES
(14, 'New Sun', 'partner-company-logo-36.png', 1),
(15, '5 BOX', 'partner-company-logo-61.png', 1),
(16, 'Parcy', 'partner-company-logo-63.png', 1),
(17, 'Google', 'partner-company-logo-90.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `featured_image` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `category`, `thumbnail`, `featured_image`, `summary`, `status`) VALUES
(10, 'Web Design', 'Design', '10.jpg', '10.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 'active'),
(14, 'Web Develpment', 'Develpment', '14.jpg', '14.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 'active'),
(15, 'Apps Development', 'Development', '15.jpg', '15.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `result` tinyint(4) DEFAULT NULL,
  `status` varchar(100) DEFAULT '1' COMMENT '1=active\r\n2=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `title`, `year`, `result`, `status`) VALUES
(11, 'Diploma In Computer', '2020', 90, '1'),
(14, 'Web Design', '2018', 83, '1'),
(19, 'Secondary School Certificate (SSC)', '2016', 90, '1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active' COMMENT 'a=active\r\nd=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `summary`, `status`) VALUES
(1, 'CREATIVE DESIGN', 'fab fa-react', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 'active'),
(2, 'UNLIMITED FEATURES', 'fab fab fa-free-code-camp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 'active'),
(3, 'ULTRA RESPONSIVE', 'fal fa-desktop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 'active'),
(4, 'CREATIVE IDEAS', 'fal fa-lightbulb-on', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 'active'),
(5, 'CUSTOMIZATION', 'fal fa-edit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 'active'),
(7, 'Support', 'fal fa-headset', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'default.png',
  `copyright` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active' COMMENT 'active = active deactive= deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `copyright`, `about`, `tagline`, `office_address`, `email`, `phone`, `status`) VALUES
(1, 'logo.png', 'Bios Group', 'Hi, I am Zillur Rahman, professional web developer with long time experience in this field​.', 'professional web developer with long time experience in this field​.', 'BIDC Bazar, DUET Joydebpur, Gazipur , Dhaka', 'admin@bios.com', '+8801724343698', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `icon`, `link`, `status`) VALUES
(7, 'Facebook', 'fab fa-facebook-f', 'https://www.facebook.com/zillur.7.8.4.8.9/', 'active'),
(8, 'Linkedin', 'fab fa-linkedin-in', 'https://www.linkedin.com/in/md-zillur-rahman-22bb01185/', 'active'),
(9, 'GitHub', 'fab fa-github', 'https://github.com/zillurrahman2/', 'active'),
(10, 'Twitter', 'fab fa-twitter', 'https://twitter.com/ZillurR98552154', 'active'),
(12, 'Facebook', 'fab fa-facebook-f', 'https://www.facebook.com/zillur.7.8.4.8.9/', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=acticve 2=deactive',
  `role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=user 2=employee 3=admin',
  `profile_image` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `password`, `status`, `role`, `profile_image`) VALUES
(1, 'Md Zillur Rahman', 'zillur78489@gmail.com', '$2y$10$0NYsWZeZMOrgM.T8x/1BDOPCt8mcWnPV2KFPxH1syQ3UAdrUb419G', 1, 3, '1.jpg'),
(14, 'Humayun Kabir', 'humayunkabir12@gmail.com', '$2y$10$1yGSBOYrfohhzKPT4EiNoeGXEBvUXDX/lVrd6B9Fw/Gx/MRwEnxL2', 1, 1, 'default.png'),
(16, 'employe', 'employe1234@gmail.com', '$2y$10$itPujmNugj9csapqKNPdhusnnCyBuomXCYmpCQbqNUsCiuk3mIlVW', 1, 2, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clint_quotes`
--
ALTER TABLE `clint_quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clint_quotes`
--
ALTER TABLE `clint_quotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
