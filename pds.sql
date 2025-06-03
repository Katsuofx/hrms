-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 06:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pds`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodtype`
--

CREATE TABLE `bloodtype` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodtype`
--

INSERT INTO `bloodtype` (`id`, `name`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `citizenship`
--

CREATE TABLE `citizenship` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `civilstatus`
--

CREATE TABLE `civilstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `civilstatus`
--

INSERT INTO `civilstatus` (`id`, `name`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Separated'),
(4, 'Widowed');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `educationlevels_id` int(11) DEFAULT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `attendance_dates` varchar(100) DEFAULT NULL,
  `degree_earned` varchar(100) DEFAULT NULL,
  `units_or_course` varchar(100) DEFAULT NULL,
  `honors_received` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educationlevels`
--

CREATE TABLE `educationlevels` (
  `id` int(11) NOT NULL,
  `educ` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educationlevels`
--

INSERT INTO `educationlevels` (`id`, `educ`) VALUES
(1, 'Elementary'),
(2, 'Secondary'),
(3, 'Vocational'),
(4, 'College'),
(5, 'Post Graduate');

-- --------------------------------------------------------

--
-- Table structure for table `eligibility`
--

CREATE TABLE `eligibility` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `exam_name` varchar(100) DEFAULT NULL,
  `date_exam` varchar(100) DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL,
  `place_exam` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `address` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Transgender Male'),
(4, 'Transgender Female'),
(5, 'Non-Binary'),
(6, 'Genderqueer'),
(7, 'Genderfluid'),
(8, 'Agender'),
(9, 'Bigender'),
(10, 'Two-Spirit'),
(11, 'Intersex'),
(12, 'Pangender'),
(14, 'Prefer not to say');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usertype_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `usertype_id`, `username`, `password`, `created_at`) VALUES
(1, 1, 'admin', 'admin', '2025-06-01 00:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities_list`
--

CREATE TABLE `nationalities_list` (
  `id` int(11) NOT NULL,
  `nationalities` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nationalities_list`
--

INSERT INTO `nationalities_list` (`id`, `nationalities`) VALUES
(1, 'Afghan'),
(2, 'Albanian'),
(3, 'Algerian'),
(4, 'American'),
(5, 'Andorran'),
(6, 'Angolan'),
(7, 'Antiguans'),
(8, 'Argentinean'),
(9, 'Armenian'),
(10, 'Australian'),
(11, 'Austrian'),
(12, 'Azerbaijani'),
(13, 'Bahamian'),
(14, 'Bahraini'),
(15, 'Bangladeshi'),
(16, 'Barbadian'),
(17, 'Barbudans'),
(18, 'Batswana'),
(19, 'Belarusian'),
(20, 'Belgian'),
(21, 'Belizean'),
(22, 'Beninese'),
(23, 'Bhutanese'),
(24, 'Bolivian'),
(25, 'Bosnian'),
(26, 'Brazilian'),
(27, 'British'),
(28, 'Bruneian'),
(29, 'Bulgarian'),
(30, 'Burkinabe'),
(31, 'Burmese'),
(32, 'Burundian'),
(33, 'Cambodian'),
(34, 'Cameroonian'),
(35, 'Canadian'),
(36, 'Cape Verdean'),
(37, 'Central African'),
(38, 'Chadian'),
(39, 'Chilean'),
(40, 'Chinese'),
(41, 'Colombian'),
(42, 'Comoran'),
(43, 'Congolese'),
(44, 'Congolese'),
(45, 'Costa Rican'),
(46, 'Croatian'),
(47, 'Cuban'),
(48, 'Cypriot'),
(49, 'Czech'),
(50, 'Danish'),
(51, 'Djibouti'),
(52, 'Dominican'),
(53, 'Dominican'),
(54, 'Dutch'),
(55, 'Dutchman'),
(56, 'Dutchwoman'),
(57, 'East Timorese'),
(58, 'Ecuadorean'),
(59, 'Egyptian'),
(60, 'Emirian'),
(61, 'Equatorial Guinean'),
(62, 'Eritrean'),
(63, 'Estonian'),
(64, 'Ethiopian'),
(65, 'Fijian'),
(66, 'Filipino'),
(67, 'Finnish'),
(68, 'French'),
(69, 'Gabonese'),
(70, 'Gambian'),
(71, 'Georgian'),
(72, 'German'),
(73, 'Ghanaian'),
(74, 'Greek'),
(75, 'Grenadian'),
(76, 'Guatemalan'),
(77, 'Guinea-Bissauan'),
(78, 'Guinean'),
(79, 'Guyanese'),
(80, 'Haitian'),
(81, 'Herzegovinian'),
(82, 'Honduran'),
(83, 'Hungarian'),
(84, 'I-Kiribati'),
(85, 'Icelander'),
(86, 'Indian'),
(87, 'Indonesian'),
(88, 'Iranian'),
(89, 'Iraqi'),
(90, 'Irish'),
(91, 'Irish'),
(92, 'Israeli'),
(93, 'Italian'),
(94, 'Ivorian'),
(95, 'Jamaican'),
(96, 'Japanese'),
(97, 'Jordanian'),
(98, 'Kazakhstani'),
(99, 'Kenyan'),
(100, 'Kittian and Nevisian'),
(101, 'Kuwaiti'),
(102, 'Kyrgyz'),
(103, 'Laotian'),
(104, 'Latvian'),
(105, 'Lebanese'),
(106, 'Liberian'),
(107, 'Libyan'),
(108, 'Liechtensteiner'),
(109, 'Lithuanian'),
(110, 'Luxembourger'),
(111, 'Macedonian'),
(112, 'Malagasy'),
(113, 'Malawian'),
(114, 'Malaysian'),
(115, 'Maldivan'),
(116, 'Malian'),
(117, 'Maltese'),
(118, 'Marshallese'),
(119, 'Mauritanian'),
(120, 'Mauritian'),
(121, 'Mexican'),
(122, 'Micronesian'),
(123, 'Moldovan'),
(124, 'Monacan'),
(125, 'Mongolian'),
(126, 'Moroccan'),
(127, 'Mosotho'),
(128, 'Motswana'),
(129, 'Mozambican'),
(130, 'Namibian'),
(131, 'Nauruan'),
(132, 'Nepalese'),
(133, 'Netherlander'),
(134, 'New Zealander'),
(135, 'Ni-Vanuatu'),
(136, 'Nicaraguan'),
(137, 'Nigerian'),
(138, 'Nigerien'),
(139, 'North Korean'),
(140, 'Northern Irish'),
(141, 'Norwegian'),
(142, 'Omani'),
(143, 'Pakistani'),
(144, 'Palauan'),
(145, 'Panamanian'),
(146, 'Papua New Guinean'),
(147, 'Paraguayan'),
(148, 'Peruvian'),
(149, 'Polish'),
(150, 'Portuguese'),
(151, 'Qatari'),
(152, 'Romanian'),
(153, 'Russian'),
(154, 'Rwandan'),
(155, 'Saint Lucian'),
(156, 'Salvadoran'),
(157, 'Samoan'),
(158, 'San Marinese'),
(159, 'Sao Tomean'),
(160, 'Saudi'),
(161, 'Scottish'),
(162, 'Senegalese'),
(163, 'Serbian'),
(164, 'Seychellois'),
(165, 'Sierra Leonean'),
(166, 'Singaporean'),
(167, 'Slovakian'),
(168, 'Slovenian'),
(169, 'Solomon Islander'),
(170, 'Somali'),
(171, 'South African'),
(172, 'South Korean'),
(173, 'Spanish'),
(174, 'Sri Lankan'),
(175, 'Sudanese'),
(176, 'Surinamer'),
(177, 'Swazi'),
(178, 'Swedish'),
(179, 'Swiss'),
(180, 'Syrian'),
(181, 'Taiwanese'),
(182, 'Tajik'),
(183, 'Tanzanian'),
(184, 'Thai'),
(185, 'Togolese'),
(186, 'Tongan'),
(187, 'Trinidadian or Tobagonian'),
(188, 'Tunisian'),
(189, 'Turkish'),
(190, 'Tuvaluan'),
(191, 'Ugandan'),
(192, 'Ukrainian'),
(193, 'Uruguayan'),
(194, 'Uzbekistani'),
(195, 'Venezuelan'),
(196, 'Vietnamese'),
(197, 'Welsh'),
(198, 'Yemenite'),
(199, 'Zambian'),
(200, 'Zimbabwean');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `type` enum('father','mother') DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `birthplace` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `religion_id` int(11) DEFAULT NULL,
  `bloodtype_id` int(11) DEFAULT NULL,
  `civilstatus_id` int(20) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `tin_no` varchar(20) DEFAULT NULL,
  `sss_no` varchar(20) DEFAULT NULL,
  `pagibig_no` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `tel_no` varchar(20) DEFAULT NULL,
  `cellphone_no` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date_employed` date DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `last_name`, `first_name`, `middle_name`, `birthplace`, `birthdate`, `religion_id`, `bloodtype_id`, `civilstatus_id`, `gender_id`, `nationality_id`, `tin_no`, `sss_no`, `pagibig_no`, `address`, `tel_no`, `cellphone_no`, `email`, `date_employed`, `img_path`, `status_id`) VALUES
(1, 'wadawd', 'awdawd', 'awdawdaw', 'adwa', '2000-02-09', 16, 1, 2, 4, 13, 'awd', 'awdawd', 'awdaw', 'awdawd', 'awda', 'daw', 'dawdawd@gmail.com', '2025-03-05', '../assets/personnel-photos/1748954790_375025795_614028287309425_6665788162935722182_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `name`) VALUES
(1, 'Christianity'),
(2, 'Roman Catholic'),
(3, 'Protestant'),
(4, 'Born Again Christian'),
(5, 'Iglesia ni Cristo'),
(6, 'Seventh-day Adventist'),
(7, 'Jehovah\'s Witnesses'),
(8, 'Baptist'),
(9, 'Methodist'),
(10, 'Eastern Orthodox'),
(11, 'Islam'),
(12, 'Sunni Islam'),
(13, 'Shia Islam'),
(14, 'Buddhism'),
(15, 'Theravāda Buddhism'),
(16, 'Mahayana Buddhism'),
(17, 'Hinduism'),
(18, 'Judaism'),
(19, 'Sikhism'),
(20, 'Taoism'),
(21, 'Baháʼí Faith'),
(22, 'Jainism'),
(23, 'Shinto'),
(24, 'Paganism'),
(25, 'Atheism'),
(26, 'Agnosticism'),
(27, 'No Religion');

-- --------------------------------------------------------

--
-- Table structure for table `spouse`
--

CREATE TABLE `spouse` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'eligible'),
(2, 'not eligible');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `inclusive_dates` varchar(100) DEFAULT NULL,
  `hours` varchar(50) DEFAULT NULL,
  `conducted_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `agency` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `inclusive_dates` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodtype`
--
ALTER TABLE `bloodtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_id` (`personnel_id`);

--
-- Indexes for table `citizenship`
--
ALTER TABLE `citizenship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `civilstatus`
--
ALTER TABLE `civilstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_id` (`personnel_id`),
  ADD KEY `educationlevels_id` (`educationlevels_id`);

--
-- Indexes for table `educationlevels`
--
ALTER TABLE `educationlevels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eligibility`
--
ALTER TABLE `eligibility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_id` (`personnel_id`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_id` (`personnel_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype_id` (`usertype_id`);

--
-- Indexes for table `nationalities_list`
--
ALTER TABLE `nationalities_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_id` (`personnel_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `religion_id` (`religion_id`),
  ADD KEY `bloodtype_id` (`bloodtype_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `nationality_id` (`nationality_id`),
  ADD KEY `civilstatus_id` (`civilstatus_id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spouse`
--
ALTER TABLE `spouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_id` (`personnel_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_id` (`personnel_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_id` (`personnel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodtype`
--
ALTER TABLE `bloodtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `citizenship`
--
ALTER TABLE `citizenship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `civilstatus`
--
ALTER TABLE `civilstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationlevels`
--
ALTER TABLE `educationlevels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eligibility`
--
ALTER TABLE `eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nationalities_list`
--
ALTER TABLE `nationalities_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `spouse`
--
ALTER TABLE `spouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `education_ibfk_2` FOREIGN KEY (`educationlevels_id`) REFERENCES `educationlevels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eligibility`
--
ALTER TABLE `eligibility`
  ADD CONSTRAINT `eligibility_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `emergency_contact_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`id`);

--
-- Constraints for table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnel_ibfk_2` FOREIGN KEY (`bloodtype_id`) REFERENCES `bloodtype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnel_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnel_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnel_ibfk_5` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnel_ibfk_6` FOREIGN KEY (`civilstatus_id`) REFERENCES `civilstatus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spouse`
--
ALTER TABLE `spouse`
  ADD CONSTRAINT `spouse_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `work_experience_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
