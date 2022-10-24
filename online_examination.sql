-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 08:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_email_address` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  `admin_verfication_code` varchar(100) NOT NULL,
  `admin_type` enum('master','sub_master') NOT NULL,
  `admin_created_on` datetime NOT NULL,
  `email_verified` enum('no','yes') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email_address`, `admin_password`, `admin_verfication_code`, `admin_type`, `admin_created_on`, `email_verified`) VALUES
(1, 'ayansid2112@gmail.com', '$2y$10$GygZL5u8sL6FGG4pxMm7H.WflZBxapkyM9iv7oOr9SB8XwQ5nGuki', '5eb3d421a61d6f82f8b2f210b958f421', 'sub_master', '2020-11-25 18:24:15', 'yes'),
(2, 'ayansid1103@gmail.com', '$2y$10$.dr/so4vQoccYxJ0JAGkD.86g28O09LUQ2WzNBWKq415MOQaY4Bte', 'b1fc0fa549c8dedd38ef3dcdb085ae9c', 'sub_master', '2020-11-26 19:11:17', 'yes'),
(3, 'pandeybalkrishna350@gmail.com', '$2y$10$LOeLFdxcHbPxI5tnB1RHHOVLAvbA3yKxsm3DDqcbQTlPvhzTXyPCO', 'd2c85d2ba18c765c34cbc5bf75255480', 'sub_master', '2020-12-16 08:35:28', 'yes'),
(4, 'khanna2112@gmail.com', '$2y$10$dmcTOSbmc0i6AGABXCUw5u22P8kDpElRRBR5Ap7bjvntw3YTjImHC', 'f5001fab13dbe204716a511cc3570aa2', 'sub_master', '2021-01-08 20:11:02', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_table`
--

CREATE TABLE `online_exam_table` (
  `online_exam_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `online_exam_title` varchar(250) NOT NULL,
  `online_exam_datetime` datetime NOT NULL,
  `online_exam_duration` varchar(30) NOT NULL,
  `total_question` int(5) NOT NULL,
  `marks_per_right_answer` varchar(30) NOT NULL,
  `marks_per_wrong_answer` varchar(30) NOT NULL,
  `online_exam_created_on` datetime NOT NULL,
  `online_exam_status` enum('Pending','Created','Started','Completed') NOT NULL,
  `online_exam_code` varchar(100) NOT NULL,
  `online_exam_subject` varchar(250) NOT NULL,
  `online_exam_assigned_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_exam_table`
--

INSERT INTO `online_exam_table` (`online_exam_id`, `admin_id`, `online_exam_title`, `online_exam_datetime`, `online_exam_duration`, `total_question`, `marks_per_right_answer`, `marks_per_wrong_answer`, `online_exam_created_on`, `online_exam_status`, `online_exam_code`, `online_exam_subject`, `online_exam_assigned_by`) VALUES
(1, 1, 'First Exam Test', '2020-11-25 19:54:00', '30', 5, '3', '1.25', '2020-11-25 18:27:33', 'Completed', 'ac3488f3b13ec199d645ed79c2c97436', 'Discrete Structure and Theory Of Logics', 'Mr. Vikas Singh'),
(2, 1, 'Second Exam Test', '2020-11-25 22:10:00', '180', 10, '4', '1.25', '2020-11-25 21:48:25', 'Completed', 'a7c32f3301d344221e5f2664b2b3b6f3', 'Discrete Structure and Theory Of Logics', 'Mr. Vikas Singh'),
(6, 2, 'Third Exam Test', '2020-11-27 12:45:00', '5', 5, '5', '1.50', '2020-11-26 19:12:26', 'Completed', '9313cebc5874ed1bc0a748e4ad64815d', 'Discrete Structure and Theory Of Logics', 'Mr. Vikas Singh'),
(8, 2, 'Forth Exam Test', '2020-11-27 17:10:00', '30', 10, '3', '1.25', '2020-11-27 16:44:19', 'Completed', '1d6b74fad2ad229dfcece5c366c0fbfe', 'Discrete Structure and Theory Of Logics', 'Mr. Vikas Singh'),
(12, 1, 'Sixth Quiz Assignment', '2020-11-30 11:45:00', '10', 10, '4', '1.25', '2020-11-30 11:21:59', 'Completed', '69f2d7b13339dff3de03382bcee9d81f', 'GENERAL KNOWLEDGE', 'Krishna Pandey'),
(13, 4, 'php quiz', '2021-01-10 11:51:00', '5', 5, '2', '1.25', '2021-01-08 20:13:38', 'Completed', 'f2f79dea0a27fdf29628ae466275aad8', 'computer science', 'Mr. Ayan Siddiqui'),
(15, 4, 'Botany Assignment', '2021-01-31 21:05:00', '5', 5, '4', '1.50', '2021-01-31 20:55:51', 'Completed', '9584cfcb1e52b7dd25bd2490c28d7caf', 'Zoology', 'Mr. Ayan Siddiqui');

-- --------------------------------------------------------

--
-- Table structure for table `option_table`
--

CREATE TABLE `option_table` (
  `option_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_number` int(2) NOT NULL,
  `option_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_table`
--

INSERT INTO `option_table` (`option_id`, `question_id`, `option_number`, `option_title`) VALUES
(1, 1, 1, 'If A and B are events such that P (A?B) = 34. P(A?B) = 14, P(a) = 23 then P(AB) is'),
(2, 1, 2, 'If A and B are events such that P (A?B) = 34. P(A?B) = 14, P(a) = 23 then P(AB) is'),
(3, 1, 3, 'If A and B are events such that P (A?B) = 34. P(A?B) = 14, P(a) = 23 then P(AB) is'),
(4, 1, 4, 'If A and B are events such that P (A?B) = 34. P(A?B) = 14, P(a) = 23 then P(AB) is'),
(5, 2, 1, 'question_number'),
(6, 2, 2, 'question_number'),
(7, 2, 3, 'question_number'),
(8, 2, 4, 'question_number'),
(9, 3, 1, ':question_number'),
(10, 3, 2, ':question_number'),
(11, 3, 3, ':question_number'),
(12, 3, 4, ':question_number'),
(13, 4, 1, 'If A and B are events such that P (A?B) = 34. P(A?B) = 14, P(a) = 23 then P(AB) is'),
(14, 4, 2, 'If A and B are events such that P (A?B) = 34. P(A?B) = 14, P(a) = 23 then P(AB) is'),
(15, 4, 3, 'If A and B are events such that P (A?B) = 34. P(A?B) = 14, P(a) = 23 then P(AB) is'),
(16, 4, 4, 'If A and B are events such that P (A?B) = 34. P(A?B) = 14, P(a) = 23 then P(AB) is'),
(17, 5, 1, 'If one card is drawn out of 52 playing cards, the probability that it is an dice is'),
(18, 5, 2, 'If one card is drawn out of 52 playing cards, the probability that it is an dice is'),
(19, 5, 3, 'If one card is drawn out of 52 playing cards, the probability that it is an dice is'),
(20, 5, 4, 'If one card is drawn out of 52 playing cards, the probability that it is an dice is'),
(21, 6, 1, 'The chance of getting a doublet with 2 dice is'),
(22, 6, 2, 'The chance of getting a doublet with 2 dice is'),
(23, 6, 3, 'The chance of getting a doublet with 2 dice is'),
(24, 6, 4, 'The chance of getting a doublet with 2 dice is'),
(25, 7, 1, 'Two number are chosen, one by one without replacement from the set of number A = {1, 2, 3, 4, 5, 6} then the probability that minimum value of two number chosen is less than 4 is'),
(26, 7, 2, 'Two number are chosen, one by one without replacement from the set of number A = {1, 2, 3, 4, 5, 6} then the probability that minimum value of two number chosen is less than 4 is'),
(27, 7, 3, 'Two number are chosen, one by one without replacement from the set of number A = {1, 2, 3, 4, 5, 6} then the probability that minimum value of two number chosen is less than 4 is'),
(28, 7, 4, 'Two number are chosen, one by one without replacement from the set of number A = {1, 2, 3, 4, 5, 6} then the probability that minimum value of two number chosen is less than 4 is'),
(29, 8, 1, 'Five horse are in a race. Mr. A select two of the horses at random and best on them. The probability that Mr. A select the winning horses is'),
(30, 8, 2, 'Five horse are in a race. Mr. A select two of the horses at random and best on them. The probability that Mr. A select the winning horses is'),
(31, 8, 3, 'Five horse are in a race. Mr. A select two of the horses at random and best on them. The probability that Mr. A select the winning horses is'),
(32, 8, 4, 'Five horse are in a race. Mr. A select two of the horses at random and best on them. The probability that Mr. A select the winning horses is'),
(33, 9, 1, 'P(A?B) = P(a) × P(b)'),
(34, 9, 2, 'P(AB) = 1 – P(A’) P(B’)'),
(35, 9, 3, 'P(AB) = 1 + P (A’) P(B’) P(A’)'),
(36, 9, 4, 'P (AB) = P(A?)/P(B?)'),
(37, 10, 1, '4 : 3'),
(38, 10, 2, '7 : 3'),
(39, 10, 3, '3 : 7'),
(40, 10, 4, '3 : 4'),
(41, 11, 1, '1/36'),
(42, 11, 2, '1/12'),
(43, 11, 3, '1/6'),
(44, 11, 4, '0'),
(45, 12, 1, '13/24'),
(46, 12, 2, '13/8'),
(47, 12, 3, '13/9'),
(48, 12, 4, '13/4'),
(49, 13, 1, '3/5'),
(50, 13, 2, '5/8'),
(51, 13, 3, '3/8'),
(52, 13, 4, '5/6'),
(53, 14, 1, 'P(A/B) = 1'),
(54, 14, 2, 'P(B/A) = 1'),
(55, 14, 3, 'P(A/B) = 0'),
(56, 14, 4, 'P(B/A) = 0'),
(57, 15, 1, '1/4'),
(58, 15, 2, '1/3'),
(59, 15, 3, '3/4'),
(60, 15, 4, '3/8'),
(61, 16, 1, 'B ? A'),
(62, 16, 2, 'B = ?'),
(63, 16, 3, 'A ? B'),
(64, 16, 4, 'A ? B = ?'),
(65, 17, 1, 'P(B/A) = 1'),
(66, 17, 2, 'P(B/A) = 0'),
(67, 17, 3, 'P(A/B) = 0'),
(68, 17, 4, 'P(A/B) = 1'),
(69, 18, 1, '3/8'),
(70, 18, 2, '5/8'),
(71, 18, 3, '5/12'),
(72, 18, 4, '1/4'),
(73, 19, 1, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(74, 19, 2, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(75, 19, 3, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(76, 19, 4, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(77, 20, 1, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(78, 20, 2, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(79, 20, 3, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(80, 20, 4, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(81, 21, 1, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(82, 21, 2, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(83, 21, 3, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(84, 21, 4, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(85, 22, 1, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(86, 22, 2, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(87, 22, 3, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(88, 22, 4, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(89, 23, 1, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(90, 23, 2, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(91, 23, 3, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(92, 23, 4, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is'),
(93, 24, 1, 'Autocratic'),
(94, 24, 2, 'Democratic'),
(95, 24, 3, 'Ariostocratic'),
(96, 24, 4, 'Dictatorial'),
(97, 25, 1, 'Kitagewa Utamaro'),
(98, 25, 2, 'Richard M Hoe'),
(99, 25, 3, 'Voltaire'),
(100, 25, 4, 'Frederic Sorrieu'),
(101, 26, 1, '1821'),
(102, 26, 2, '1790s'),
(103, 26, 3, '1905'),
(104, 26, 4, '1997'),
(105, 27, 1, 'Victor Emmanuel II'),
(106, 27, 2, 'Louis Philippe'),
(107, 27, 3, 'Mazzini'),
(108, 27, 4, 'Cavour'),
(109, 28, 1, 'Philip Veit'),
(110, 28, 2, 'Frederic Sorrieu'),
(111, 28, 3, 'Ernst Renan'),
(112, 28, 4, 'Richar M Hoe'),
(113, 29, 1, 'Garibaldi'),
(114, 29, 2, 'Bismarck'),
(115, 29, 3, 'Mazzini'),
(116, 29, 4, 'Duke Metternich'),
(117, 30, 1, 'Poland achieved independence at the end of the 18th century.'),
(118, 30, 2, 'Poland came totally under the control of Russia and became part of Russia.'),
(119, 30, 3, 'Poland became the part of East Germany.'),
(120, 30, 4, 'Poland was partitioned at the end of the 18th century by three Great Powers: Russia, Prussia and Austria.'),
(121, 31, 1, 'German Emperor (formerly King of Prussia) – Kaiser William I.'),
(122, 31, 2, 'Otto Von Bismarck (Prussian Chief Minister).'),
(123, 31, 3, 'Johann Gottfried Herder – German philosopher.'),
(124, 31, 4, 'Austrian Chancellor – Duke Metternich.'),
(125, 32, 1, 'Danish victory'),
(126, 32, 2, 'Prussian victory'),
(127, 32, 3, 'French victory'),
(128, 32, 4, 'German victory'),
(129, 33, 1, 'Otto Von Bismarck'),
(130, 33, 2, 'Victor Emmanuel II'),
(131, 33, 3, 'Count Cavour'),
(132, 33, 4, 'Kaiser William I of Prussia'),
(133, 34, 1, 'vdbsdjbvjlbsldkbsdvs'),
(134, 34, 2, 'vdskbkbvksjbjvbsdkjv'),
(135, 34, 3, 'dvlndksnkvsdnvkd'),
(136, 34, 4, 'dvdnknkvlnlvjv'),
(137, 35, 1, 'dvbdvjbkjbdldd'),
(138, 35, 2, 'djvbdsvkjbjvdslsdkv'),
(139, 35, 3, 'dvlnkdnksdn;dsnksv'),
(140, 35, 4, 'dvsklbdlkdknvdjldd'),
(141, 36, 1, 'dsksdnvksbdjvbjldskbjvds'),
(142, 36, 2, 'dvdnsknvlknvlk'),
(143, 36, 3, 'mbvldsbkvjbsdjvld'),
(144, 36, 4, 'dvkdsbklbdsjlkbvjlds'),
(145, 37, 1, 'sdvkndkvnsdkdkslkdvn'),
(146, 37, 2, 'dvsndknvskldb;kvjbdsk'),
(147, 37, 3, 'dsvdbvjbdvkbdvjbbdv'),
(148, 37, 4, 'dvbslkjbvkjlsbkdvksdv'),
(149, 38, 1, 'dkbdbvkljdsbjlsdv'),
(150, 38, 2, 'vds,vnkdbvlkjbjbvljd'),
(151, 38, 3, 'vkdbskbdjvldbljvds'),
(152, 38, 4, 'dvsksndkvlblkjvljv'),
(153, 39, 1, 'HDFC Housing Finance'),
(154, 39, 2, 'ICICI Home Finance'),
(155, 39, 3, 'LIC Housing Finance Ltd'),
(156, 39, 4, 'L&amp;T Housing Finance'),
(157, 40, 1, 'Urjit Patel'),
(158, 40, 2, 'Raghuram Rajan'),
(159, 40, 3, 'D.Subbarao'),
(160, 40, 4, 'Y.V. Reddy'),
(161, 41, 1, 'Urjit Patel'),
(162, 41, 2, 'Raghuram Rajan'),
(163, 41, 3, 'C. Rangarajan'),
(164, 41, 4, 'Bimal Jalan'),
(165, 42, 1, 'Delta'),
(166, 42, 2, 'Qantas'),
(167, 42, 3, 'United'),
(168, 42, 4, 'British'),
(169, 43, 1, 'Madhya Pradesh'),
(170, 43, 2, 'Maharashtra'),
(171, 43, 3, 'Rajasthan'),
(172, 43, 4, 'Uttar Pradesh'),
(173, 44, 1, 'Cooking oil'),
(174, 44, 2, 'Sugar'),
(175, 44, 3, 'Wheat flour (atta)'),
(176, 44, 4, 'Spices'),
(177, 45, 1, 'M12'),
(178, 45, 2, 'M75'),
(179, 45, 3, 'M16'),
(180, 45, 4, 'MS Funds'),
(181, 46, 1, 'N. Chandrasekaran'),
(182, 46, 2, 'Kiran Mazumdar-Shaw'),
(183, 46, 3, 'Uday Kotak'),
(184, 46, 4, 'Ajay Piramal'),
(185, 47, 1, 'Schumpeter'),
(186, 47, 2, 'Buttonwood'),
(187, 47, 3, 'Keynes'),
(188, 47, 4, 'Bartleby'),
(189, 48, 1, 'Swiggy'),
(190, 48, 2, 'Zomato'),
(191, 48, 3, 'Amazon'),
(192, 48, 4, 'Flipkart'),
(193, 49, 1, 'Flipkart'),
(194, 49, 2, 'Flipkart'),
(195, 49, 3, 'Flipkart'),
(196, 49, 4, 'Flipkart'),
(197, 50, 1, 'Private Home Page'),
(198, 50, 2, 'Personal Hypertext Processor'),
(199, 50, 3, 'PHP: Hypertext Preprocessor'),
(200, 50, 4, 'None Of The Above'),
(201, 51, 1, '&lt;script&gt;...&lt;script&gt;'),
(202, 51, 2, '&lt;?php...?&gt;'),
(203, 51, 3, '&lt;&amp;&gt;..&lt;/&amp;&gt;'),
(204, 51, 4, '&lt;?php&gt;..&lt;/php&gt;'),
(205, 52, 1, '&quot;Hello World&quot;;'),
(206, 52, 2, 'Document.Write(&quot;Hello World&quot;);'),
(207, 52, 3, 'echo&quot;Hello World&quot;;'),
(208, 52, 4, 'None Of The Above'),
(209, 53, 1, '3'),
(210, 53, 2, '7'),
(211, 53, 3, 'k'),
(212, 53, 4, 'kl'),
(213, 54, 1, 'dvsklvlkbskvd'),
(214, 54, 2, 'ds;dndsk;lbnvklsd'),
(215, 54, 3, 'dvs;nkldsblvsd'),
(216, 54, 4, 'dvvsjjlbsjdkbvds'),
(217, 55, 1, 'valnvklbljbasvjs'),
(218, 55, 2, 'asknjlbkjgbsljbasgj'),
(219, 55, 3, 'ga;ngkjbjbdgA'),
(220, 55, 4, 'ADGLNAGKDLJBLJBGE'),
(221, 56, 1, '4GAELJKLNH;KHAE'),
(222, 56, 2, 'HEL;HKKH;AH'),
(223, 56, 3, 'AGKGNKLHKLHAH'),
(224, 56, 4, 'ANKLHNALKGHA;KAG'),
(225, 57, 1, 'GL;J;KHKHGA;KDHAD'),
(226, 57, 2, 'HALN;;GALSHNKG;A'),
(227, 57, 3, 'GAKNKLBLKDBA;KGA'),
(228, 57, 4, 'AGNKLAGBLKAG'),
(229, 58, 1, 'ASJKLAGHLKHASGIKGA'),
(230, 58, 2, 'SAG;KAGHGLKBH;GAK'),
(231, 58, 3, 'GANGKLBASKGBLHAG'),
(232, 58, 4, 'ADGJ;KGHLKGA'),
(233, 59, 1, 'GAL;GKBHKGAH;KGA'),
(234, 59, 2, 'GALNKLAGBKLBKLAG'),
(235, 59, 3, 'GANKLNGLKBLAGA'),
(236, 59, 4, 'GAKGBNKLJGBKLABAG');

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `question_id` int(11) NOT NULL,
  `online_exam_id` int(11) NOT NULL,
  `question_title` text NOT NULL,
  `answer_option` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`question_id`, `online_exam_id`, `question_title`, `answer_option`) VALUES
(4, 2, 'If A and B are events such that P (A?B) = 34. P(A?B) = 14, P(a) = 23 then P(AB) is', '3'),
(5, 2, 'If one card is drawn out of 52 playing cards, the probability that it is an dice is', '2'),
(6, 1, 'The chance of getting a doublet with 2 dice is', '1'),
(7, 2, 'Two number are chosen, one by one without replacement from the set of number A = {1, 2, 3, 4, 5, 6} then the probability that minimum value of two number chosen is less than 4 is', '4'),
(8, 2, 'Five horse are in a race. Mr. A select two of the horses at random and best on them. The probability that Mr. A select the winning horses is', '2'),
(9, 1, 'If A and B are two independent events, then', '1'),
(10, 1, 'The probability of an event is 3/7. Then odd against the event is', '1'),
(11, 2, 'A pair of dice are rolled. The probability of obtaining an even prime number on each die is', '1'),
(12, 2, 'If P(a) = 3/8, P(b) = 1/3 and P(A?B) = — then P (A’ ?B’)', '1'),
(13, 1, 'P(A?B) = 3/8, P(b) = 1/2 and P(a) = 1/4 then P(B/?A?) =', '4'),
(14, 2, 'If A and B are two events such that P(a) ? 0 and P(B/A) = 1 then', '2'),
(15, 2, 'If P (a) = 3/8, P(b) = 1/2 and P(A?B) = 14 then P(A?/B?) =', '2'),
(16, 2, 'If A and B are two events such that P(a) ? 0 and P(B/A) = 1, then', '3'),
(17, 2, 'If A and B are any two events such that P(a) + P(b) – P(A?B) = P(a) then', '3'),
(18, 2, 'If A and B are events such that P (A?B) = 3/4. P(A?B) = 1/4, P(a) = 2/3 then P(A/B) is', '3'),
(19, 6, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is', '2'),
(20, 6, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is', '3'),
(21, 6, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is', '4'),
(22, 6, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is', '1'),
(23, 6, 'Let A and B be two given events such that P(A) = 0.6, P(B) = 0.2 and P(A/B) = 0.5. Then P(A’/B’) is', '3'),
(24, 8, 'What type of conservative regimes were set up in 1815 in Europe?', '1'),
(25, 8, 'Identify the French artist who prepared a series of four prints visualising his dream of a world from the following:', '4'),
(26, 8, 'Napoleon invaded Italy in', '2'),
(27, 8, 'Who was proclaimed King of united Italy in 1861?', '1'),
(28, 8, 'Which of the following artists painted the image of Germania?', '1'),
(29, 8, 'Who said ‘When France sneezes, the rest of Europe catches cold’?', '4'),
(30, 8, 'What happened to Poland at the end of 18th century. Which of the following answers is correct?', '4'),
(31, 8, 'Who played the leading role in the unification of Germany?', '2'),
(32, 8, 'Three wars over seven years with Austria, Denmark, Germany and France, ended in', '2'),
(33, 8, 'Who was proclaimed the emperor of Germany in 1871?', '4'),
(39, 12, 'Which entity has launched an affordable housing loan scheme named ‘SARAL’?', '2'),
(40, 12, 'Which former RBI Governor has authored ‘Overdraft: Saving the Indian Saver’?', '2'),
(41, 12, 'Which former RBI Governor is part of Asian Development Bank’s advisory panel to tackle COVID-19 in South East Asia?', '2'),
(42, 12, 'Which airlines, the world’s largest operator of Boeing 747s, is retiring its entire jumbo jet fleet with immediate effect?', '4'),
(43, 12, 'Which State has provided the most employment under MGNREGA as per government data released on June 15, 2020?', '4'),
(44, 12, 'Into what regularly consumed product is Amul planning to enter by Diwali?', '3'),
(45, 12, 'Name Microsoft’s venture fund which recently opened an India office in Bengaluru.', '1'),
(46, 12, 'Which Indian has been chosen EY World Entrepreneur Of The Year for 2020?', '2'),
(47, 12, 'What is \'The Economist\' magazine’s column on Business called?', '1'),
(48, 12, 'Who has launched ‘Hyperpure’, a supplies platform for restaurants?', '2'),
(49, 11, 'Flipkart', '2'),
(50, 13, 'What does PHP stand for?', '3'),
(51, 13, 'PHP server scripts are surrounded by delimiters, which?', '2'),
(52, 13, 'How do you write &quot;Hello World&quot; in PHP', '3'),
(53, 13, 'what is botany', '3'),
(54, 13, 'nmdsbkdhvchdskvdkjdsv', '4'),
(55, 15, 'cmsabvkjsabjbas', '2'),
(56, 15, 'FANAKLNGKAEG', '3'),
(57, 15, 'FKANLKFBGJGA', '4'),
(58, 15, 'FAJKBFBAJLBS', '1'),
(59, 15, 'CSFANFLKBAJGBA', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user_exam_enroll_table`
--

CREATE TABLE `user_exam_enroll_table` (
  `user_exam_enroll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `attendance_status` enum('Absent','Present') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_exam_enroll_table`
--

INSERT INTO `user_exam_enroll_table` (`user_exam_enroll_id`, `user_id`, `exam_id`, `attendance_status`) VALUES
(1, 1, 1, 'Present'),
(2, 1, 2, 'Present'),
(3, 1, 6, 'Present'),
(4, 1, 8, 'Present'),
(5, 1, 12, 'Present'),
(6, 3, 13, 'Present'),
(7, 3, 14, 'Absent'),
(8, 4, 15, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `user_exam_question_answer`
--

CREATE TABLE `user_exam_question_answer` (
  `user_exam_question_answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer_option` enum('0','1','2','3','4') NOT NULL,
  `marks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_exam_question_answer`
--

INSERT INTO `user_exam_question_answer` (`user_exam_question_answer_id`, `user_id`, `exam_id`, `question_id`, `user_answer_option`, `marks`) VALUES
(1, 1, 1, 4, '1', '-1.25'),
(2, 1, 1, 5, '4', '-1.25'),
(3, 1, 1, 6, '3', '-1.25'),
(4, 1, 1, 7, '3', '-1.25'),
(5, 1, 1, 8, '2', '+3'),
(6, 1, 2, 9, '1', '+4'),
(7, 1, 2, 10, '1', '+4'),
(8, 1, 2, 11, '1', '+4'),
(9, 1, 2, 12, '0', '0'),
(10, 1, 2, 13, '0', '0'),
(11, 1, 2, 14, '0', '0'),
(12, 1, 2, 15, '0', '0'),
(13, 1, 2, 16, '0', '0'),
(14, 1, 2, 17, '0', '0'),
(15, 1, 2, 18, '0', '0'),
(16, 1, 8, 24, '1', '+3'),
(17, 1, 8, 25, '4', '+3'),
(18, 1, 8, 26, '2', '+3'),
(19, 1, 8, 27, '1', '+3'),
(20, 1, 8, 28, '1', '+3'),
(21, 1, 8, 29, '4', '+3'),
(22, 1, 8, 30, '4', '+3'),
(23, 1, 8, 31, '1', '-1.25'),
(24, 1, 8, 32, '3', '-1.25'),
(25, 1, 8, 33, '4', '+3'),
(26, 1, 12, 39, '2', '+4'),
(27, 1, 12, 40, '1', '-1.25'),
(28, 1, 12, 41, '2', '+4'),
(29, 1, 12, 42, '1', '-1.25'),
(30, 1, 12, 43, '2', '-1.25'),
(31, 1, 12, 44, '1', '-1.25'),
(32, 1, 12, 45, '1', '+4'),
(33, 1, 12, 46, '2', '+4'),
(34, 1, 12, 47, '2', '-1.25'),
(35, 1, 12, 48, '3', '-1.25'),
(36, 3, 13, 50, '3', '+2'),
(37, 3, 13, 51, '2', '+2'),
(38, 3, 13, 52, '3', '+2'),
(39, 3, 13, 53, '3', '+2'),
(40, 3, 13, 54, '4', '+2'),
(41, 4, 15, 55, '0', '0'),
(42, 4, 15, 56, '0', '0'),
(43, 4, 15, 57, '0', '0'),
(44, 4, 15, 58, '0', '0'),
(45, 4, 15, 59, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_email_address` varchar(250) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_verfication_code` varchar(100) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_gender` enum('Male','Female') NOT NULL,
  `user_branch` text NOT NULL,
  `user_roll_no` varchar(30) NOT NULL,
  `user_image` varchar(150) NOT NULL,
  `user_created_on` datetime NOT NULL,
  `user_email_verified` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_email_address`, `user_password`, `user_verfication_code`, `user_name`, `user_gender`, `user_branch`, `user_roll_no`, `user_image`, `user_created_on`, `user_email_verified`) VALUES
(1, 'ayansid1103@gmail.com', '$2y$10$1nOOM7V9U/RbQryZK0Ho5.Lm88gb/fda4mRChuiqm7pcVJuq657iu', '727e3a63c91cba8fecfab614f4b26908', 'Ayan Siddiqui', 'Male', 'Computer Science and Engineering', '1901500100019', '5fc3724a80884.jpg', '2020-11-25 18:23:08', 'yes'),
(2, 'ayansid2112@gmail.com', '$2y$10$F4g6v6C3c7CbHpqhl.63I.X1gfBvq0qSa/LAGyWnS.0DgJTzsErBy', '97b4d59f269bbb5198d660a7ece4f44a', 'AYAN SIDDIQUI', 'Male', 'COMPUTER SCIENCE AND TECHNOLOGY', '1901500100019', '5ff86d8342b7a.png', '2021-01-08 20:04:43', 'yes'),
(3, 'rockstarayan8@gmail.com', '$2y$10$VPCbUiLZiipcFdSzSl.7UOkhCe8wtiQOBpqbTMLuWWODFU4HwuLPG', 'fdb37eadfcd58a9d30e5e2e0f2dbc247', 'Noorfatma Siddiqui', 'Female', 'M sc', '1901500100019', '5ffa998d81918.jpg', '2021-01-10 11:37:09', 'yes'),
(4, 'rockayan8@gmail.com', '$2y$10$GjSG8vd3Co43yM3VqS0iq.c3hDHaXomFYJ3GjboK532GJgrg58Tz6', '1698997da37bbebb76301d99ce917918', 'Lucifer', 'Male', 'Computer Science and Technology', '1901500100029', '6016ca438b96b.jpg', '2021-01-31 20:48:27', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `online_exam_table`
--
ALTER TABLE `online_exam_table`
  ADD PRIMARY KEY (`online_exam_id`);

--
-- Indexes for table `option_table`
--
ALTER TABLE `option_table`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `user_exam_enroll_table`
--
ALTER TABLE `user_exam_enroll_table`
  ADD PRIMARY KEY (`user_exam_enroll_id`);

--
-- Indexes for table `user_exam_question_answer`
--
ALTER TABLE `user_exam_question_answer`
  ADD PRIMARY KEY (`user_exam_question_answer_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `online_exam_table`
--
ALTER TABLE `online_exam_table`
  MODIFY `online_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `option_table`
--
ALTER TABLE `option_table`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_exam_enroll_table`
--
ALTER TABLE `user_exam_enroll_table`
  MODIFY `user_exam_enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_exam_question_answer`
--
ALTER TABLE `user_exam_question_answer`
  MODIFY `user_exam_question_answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
