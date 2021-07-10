-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2016 at 03:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rshs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_events`
--

CREATE TABLE IF NOT EXISTS `tbl_academic_events` (
`academic_event_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE IF NOT EXISTS `tbl_accounts` (
`account_id` int(11) NOT NULL,
  `hash_account_id` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `hashPassword` text NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'sub_admin',
  `status` int(11) NOT NULL DEFAULT '1',
  `flag` int(11) NOT NULL,
  `time_span` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`account_id`, `hash_account_id`, `username`, `password`, `emailAddress`, `hashPassword`, `type`, `status`, `flag`, `time_span`) VALUES
(1, '356a192b7913b04c54574d18c28d46e6395428ab', 'admin', '9152011', 'amatongroiupdated@gmail.com', '08a05615a963eed51a32d2d9258dd116b8272a6f', 'admin', 1, 0, '2016-05-17 03:46:40'),
(3, '77de68daecd823babbb58edb1c8e14d7106e83bb', 'roi', 'september9152011', 'email@email.com', 'f30daf467ad1d3021992834ad129c563aac6a94c', 'sub_admin', 1, 0, ''),
(4, '1b6453892473a467d07372d45eb05abc2031647a', 'vane', '9152011', 'vane@gmail.com', '08a05615a963eed51a32d2d9258dd116b8272a6f', 'sub_admin', 1, 0, ''),
(5, 'ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 'jeff', 'recera27', 'jeffrecera@gmail.com', '515290237adfac81d71d09acd8ffbf1ea957cf30', 'sub_admin', 1, 0, ''),
(6, 'c1dfd96eea8cc2b62785275bca38ac261256e278', 'jeff1', '1', 'vane@gmail.com1', '356a192b7913b04c54574d18c28d46e6395428ab', 'sub_admin', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_administrations`
--

CREATE TABLE IF NOT EXISTS `tbl_administrations` (
`administration_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_administrations`
--

INSERT INTO `tbl_administrations` (`administration_id`, `department_id`, `position_id`, `firstname`, `middlename`, `lastname`, `status`) VALUES
(2, 5, 2, 'Vanessa', 'Gabixa', 'Tali', 1),
(3, 7, 2, 'Roi Larrence', 'Reyes', 'Amatong', 1),
(4, 7, 3, 'Roni', 'Macam', 'Andig', 1),
(5, 7, 3, 'Khadija ', 'Ismael', 'Ismael', 1),
(6, 7, 3, 'Rasheena', 'Camlian', 'Camlian', 1),
(7, 8, 4, 'Jane', 'I', 'Locson', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alumni`
--

CREATE TABLE IF NOT EXISTS `tbl_alumni` (
`alumni_id` int(11) NOT NULL,
  `venue` text NOT NULL,
  `yearGraduated` text NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alumni`
--

INSERT INTO `tbl_alumni` (`alumni_id`, `venue`, `yearGraduated`, `firstname`, `middlename`, `lastname`) VALUES
(1, 'Southcom Village, Zamboanga City', '2008', 'Roi Larrence', 'Reyes', 'Amatong'),
(2, 'John Spirig Memorial ELementary School', '2007', 'Vanessa', 'Gabica', 'Tali'),
(3, 'UZ', '2008', 'Khadija ', 'Ismael', 'Ismael'),
(4, 'Covert court', '2015', 'Jane', 'Cruz', 'Locsin'),
(5, 'Astoria', '2015', 'Alyssa ', 'Jutay', 'Lim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

CREATE TABLE IF NOT EXISTS `tbl_announcements` (
`announcement_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bids_and_awards`
--

CREATE TABLE IF NOT EXISTS `tbl_bids_and_awards` (
`bids_and_awards_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_citizen_charters`
--

CREATE TABLE IF NOT EXISTS `tbl_citizen_charters` (
`citizen_charter_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum`
--

CREATE TABLE IF NOT EXISTS `tbl_curriculum` (
`curriculum_id` int(11) NOT NULL,
  `grade_level_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_curriculum`
--

INSERT INTO `tbl_curriculum` (`curriculum_id`, `grade_level_id`, `subject_id`) VALUES
(1, 2, 1),
(6, 1, 2),
(7, 1, 3),
(8, 1, 2),
(9, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE IF NOT EXISTS `tbl_departments` (
`department_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`department_id`, `name`) VALUES
(5, 'Mathematics'),
(7, 'Filipino'),
(8, 'English Department');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_downloads`
--

CREATE TABLE IF NOT EXISTS `tbl_downloads` (
`download_id` int(11) NOT NULL,
  `caption` text NOT NULL,
  `file` text NOT NULL,
  `dateUploaded` text NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filesize` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
`gallery_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `dateCreated` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `title`, `description`, `dateCreated`, `status`) VALUES
(2, 'vanessa ', 'vanessa description vanessa description vanessa description', '2016-05-09', 1),
(3, 'School Foundation Day', 'Who Needs Sundance When Youâ€™ve Got Crowdfunding?\n13 hours ago by Jane Smith\nFilm festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, theyâ€™d pay to Fast-forward andâ€¦ Read More', '2016-05-11', 1),
(4, 'Jane', 'Maganda si Jane', '2016-05-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_photos`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery_photos` (
`gallery_photo_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `imagename` text NOT NULL,
  `size` float NOT NULL,
  `description` text NOT NULL,
  `dateUploaded` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_level`
--

CREATE TABLE IF NOT EXISTS `tbl_grade_level` (
`grade_level_id` int(11) NOT NULL,
  `grade` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_grade_level`
--

INSERT INTO `tbl_grade_level` (`grade_level_id`, `grade`) VALUES
(1, 'Grade 7'),
(2, 'Grade 8'),
(3, 'Grade 9'),
(4, 'Grade 10\n'),
(5, 'Grade 11'),
(6, 'Grade 12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_honors`
--

CREATE TABLE IF NOT EXISTS `tbl_honors` (
`honor_id` int(11) NOT NULL,
  `grade_level_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_honors`
--

INSERT INTO `tbl_honors` (`honor_id`, `grade_level_id`, `firstname`, `middlename`, `lastname`) VALUES
(1, 2, 'Vanessa', 'Gabica', 'Tali');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE IF NOT EXISTS `tbl_messages` (
`message_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `emailAddress` text NOT NULL,
  `message` text NOT NULL,
  `dateReceived` text NOT NULL,
  `dateReplied` text NOT NULL,
  `readStatus` int(11) NOT NULL DEFAULT '0',
  `replyStatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`message_id`, `fullname`, `emailAddress`, `message`, `dateReceived`, `dateReplied`, `readStatus`, `replyStatus`) VALUES
(3, 'Amatong, Roi Larrence Reyes', 'amatongroi@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.', '2016-05-15 09:34:44 pm', '', 1, 0),
(4, 'Jane', 'alysha143@gmail.com', 'hi', '2016-05-16 09:07:37 am', '', 1, 0),
(5, 'Jane', 'Locsin', 'hello', '2016-05-16 09:22:10 am', '', 1, 0),
(6, 'Joe', 'Jonas', 'Hello', '2016-05-16 09:24:59 am', '', 1, 0),
(7, 'Jeff Recera', 'jeffrecera@gmail.com', 'Hello ', '2016-05-16 04:48:40 pm', '', 1, 0),
(8, 'Amatong, Roi Larrence Reyes', 'amatongroi@gmail.com', 'Hi', '2016-05-16 04:49:00 pm', '', 1, 0),
(9, 'Amatong, Roi Larrence Reyes', 'amatongroi@gmail.com', 'Morbi scelerisque magna ac elit accumsan fringilla. Vivamus enim massa, egestas quis viverra ut, adipiscing eget metus. Etiam neque orci, cursus vitae sem in, rhoncus vestibulum dolor. Cras consectetur, tellus vel auctor venenatis, tortor ante imperdiet ipsum, sed iaculis lorem velit ac erat.', '2016-05-16 04:53:14 pm', '', 1, 0),
(10, 'Jeff Recera', 'jeffrecera@gmail.com', 'Morbi scelerisque magna ac elit accumsan fringilla. Vivamus enim massa, egestas quis viverra ut, adipiscing eget metus. Etiam neque orci, cursus vitae sem in, rhoncus vestibulum dolor. Cras consectetur, tellus vel auctor venenatis, tortor ante imperdiet ipsum, sed iaculis lorem velit ac erat.', '2016-05-16 04:54:40 pm', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
`news_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_submitted` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_positions`
--

CREATE TABLE IF NOT EXISTS `tbl_positions` (
`position_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_positions`
--

INSERT INTO `tbl_positions` (`position_id`, `name`) VALUES
(2, 'Vanesa'),
(3, 'Teacher 2'),
(4, 'Teacher 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rshs_information`
--

CREATE TABLE IF NOT EXISTS `tbl_rshs_information` (
`rshs_information_id` int(11) NOT NULL,
  `history` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `admission` text NOT NULL,
  `address` text NOT NULL,
  `contactNo` text NOT NULL,
  `emailAddress` text NOT NULL,
  `image` text NOT NULL,
  `admissionBackground` varchar(100) NOT NULL,
  `newsRoomBackground` varchar(100) NOT NULL,
  `announcementBackground` varchar(100) NOT NULL,
  `eventBackground` varchar(100) NOT NULL,
  `historyBackground` varchar(100) NOT NULL,
  `footerBackground` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rshs_information`
--

INSERT INTO `tbl_rshs_information` (`rshs_information_id`, `history`, `mission`, `vision`, `admission`, `address`, `contactNo`, `emailAddress`, `image`, `admissionBackground`, `newsRoomBackground`, `announcementBackground`, `eventBackground`, `historyBackground`, `footerBackground`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br><br>Morbi scelerisque magna ac elit accumsan fringilla. Vivamus enim massa, egestas quis viverra ut, adipiscing eget metus. Etiam neque orci, cursus vitae sem in, rhoncus vestibulum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br><br>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br><br>Morbi scelerisque magna ac elit accumsan fringilla. Vivamus enim massa, egestas quis viverra ut, adipiscing eget metus. Etiam neque orci, cursus vitae sem in, rhoncus vestibulum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br><br>Morbi scelerisque magna ac elit accumsan fringilla. Vivamus enim massa, egestas quis viverra ut, adipiscing eget metus. Etiam neque orci, cursus vitae sem in, rhoncus vestibulum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br><br>Morbi scelerisque magna ac elit accumsan fringilla. Vivamus enim massa, egestas quis viverra ut, adipiscing eget metus. Etiam neque orci, cursus vitae sem in, rhoncus vestibulum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, ipsum quis aliquam lobortis, felis sapien rutrum risus, posuere ultrices quam nisi nec nulla. Vestibulum ipsum diam, congue in nunc et, placerat faucibus nunc. Proin consectetur mauris quis tincidunt faucibus. Suspendisse lobortis blandit aliquet. Cras a luctus orci. Aenean pretium venenatis gravida. Morbi varius erat erat, vitae sollicitudin tortor ornare tincidunt.<br>', 'Malasiga, San Roque, Zamboanga City', '(090) 999-9999', 'rshs@gmail.com', 'logo.png', '492004395_348968506_617431641.png', '467468262_737030030_728637696.png', '573455811_649047852_310455323.jpg', '236877442_165130616_704101563.png', '874450684_723114014_336791993.png', '585815430_793121338_873840333.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE IF NOT EXISTS `tbl_subjects` (
`subject_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`subject_id`, `name`) VALUES
(1, 'Web Programming'),
(2, 'Mobile Application Development'),
(3, 'roi'),
(4, 'sample fake subject?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transparency_seal`
--

CREATE TABLE IF NOT EXISTS `tbl_transparency_seal` (
`transparency_seal_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_academic_events`
--
ALTER TABLE `tbl_academic_events`
 ADD PRIMARY KEY (`academic_event_id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
 ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_administrations`
--
ALTER TABLE `tbl_administrations`
 ADD PRIMARY KEY (`administration_id`);

--
-- Indexes for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
 ADD PRIMARY KEY (`alumni_id`);

--
-- Indexes for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
 ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `tbl_bids_and_awards`
--
ALTER TABLE `tbl_bids_and_awards`
 ADD PRIMARY KEY (`bids_and_awards_id`);

--
-- Indexes for table `tbl_citizen_charters`
--
ALTER TABLE `tbl_citizen_charters`
 ADD PRIMARY KEY (`citizen_charter_id`);

--
-- Indexes for table `tbl_curriculum`
--
ALTER TABLE `tbl_curriculum`
 ADD PRIMARY KEY (`curriculum_id`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_downloads`
--
ALTER TABLE `tbl_downloads`
 ADD PRIMARY KEY (`download_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
 ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_gallery_photos`
--
ALTER TABLE `tbl_gallery_photos`
 ADD PRIMARY KEY (`gallery_photo_id`);

--
-- Indexes for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
 ADD PRIMARY KEY (`grade_level_id`);

--
-- Indexes for table `tbl_honors`
--
ALTER TABLE `tbl_honors`
 ADD PRIMARY KEY (`honor_id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
 ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
 ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
 ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tbl_rshs_information`
--
ALTER TABLE `tbl_rshs_information`
 ADD PRIMARY KEY (`rshs_information_id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
 ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_transparency_seal`
--
ALTER TABLE `tbl_transparency_seal`
 ADD PRIMARY KEY (`transparency_seal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_academic_events`
--
ALTER TABLE `tbl_academic_events`
MODIFY `academic_event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_administrations`
--
ALTER TABLE `tbl_administrations`
MODIFY `administration_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bids_and_awards`
--
ALTER TABLE `tbl_bids_and_awards`
MODIFY `bids_and_awards_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_citizen_charters`
--
ALTER TABLE `tbl_citizen_charters`
MODIFY `citizen_charter_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_curriculum`
--
ALTER TABLE `tbl_curriculum`
MODIFY `curriculum_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_downloads`
--
ALTER TABLE `tbl_downloads`
MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_gallery_photos`
--
ALTER TABLE `tbl_gallery_photos`
MODIFY `gallery_photo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
MODIFY `grade_level_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_honors`
--
ALTER TABLE `tbl_honors`
MODIFY `honor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_rshs_information`
--
ALTER TABLE `tbl_rshs_information`
MODIFY `rshs_information_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_transparency_seal`
--
ALTER TABLE `tbl_transparency_seal`
MODIFY `transparency_seal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
