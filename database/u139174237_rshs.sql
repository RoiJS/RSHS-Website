
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2016 at 02:08 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u139174237_rshs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_events`
--

CREATE TABLE IF NOT EXISTS `tbl_academic_events` (
  `academic_event_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`academic_event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_academic_events`
--

INSERT INTO `tbl_academic_events` (`academic_event_id`, `title`, `date`, `description`, `image`, `status`) VALUES
(1, 'INSTYLE RSHIX Alumni Homecoming 2012', '2012-12-28', 'INSTYLE RSHSIX Alumni Homecoming UPDATE:\r\nRegistration tomorrow will start at 5:30 PM.Those who will arrive and register before 7:00 PM will have a chance to win an Android Tablet and other gift items. First 100 to arrive will receive an INSTYLE souveneir.', '406219483_45288086_625640870.jpg', 1),
(4, '"Brigada Eskwela" 2016', '2016-05-30', 'Regional Science High School Invites you to Brigada Eskwela 2016 happening on May 30 - June 03, 2016. Keep posted for more announcements for this event. See You !', '779126043_203698515_245246506.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE IF NOT EXISTS `tbl_accounts` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `hash_account_id` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `hashPassword` text NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'sub_admin',
  `status` int(11) NOT NULL DEFAULT '1',
  `flag` int(11) NOT NULL,
  `time_span` varchar(100) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`account_id`, `hash_account_id`, `username`, `password`, `emailAddress`, `hashPassword`, `type`, `status`, `flag`, `time_span`) VALUES
(1, '356a192b7913b04c54574d18c28d46e6395428ab', 'admin', 'admin123', 'macrystaljane@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin', 1, 0, '2016-11-07 08:04:27'),
(7, '', 'Jane', 'admin1', 'macrystaljane@gmail.com', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'sub_admin', 1, 0, '2016-07-17 09:13:33'),
(8, '', 'Jeff', 'jeff123', 'jeff@gmail.com', 'd4c8d2babe999aca62f107b0ee330e30bec2a1a2', 'sub_admin', 0, 0, ''),
(9, '', 'crystal', 'admin123', 'janelocson27@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'sub_admin', 1, 0, '2016-07-06 12:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_administrations`
--

CREATE TABLE IF NOT EXISTS `tbl_administrations` (
  `administration_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`administration_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tbl_administrations`
--

INSERT INTO `tbl_administrations` (`administration_id`, `department_id`, `position_id`, `firstname`, `middlename`, `lastname`, `image`, `status`) VALUES
(37, 17, 5, 'Dr.Lutchi', 'V.', 'Rimando', '', 0),
(9, 7, 6, 'Noreen', 'T.', 'Catis', '', 1),
(10, 7, 2, 'Rosalie', 'C.', 'Haro', '', 1),
(11, 7, 4, 'Vergel', 'B.', 'Ladrera', '', 1),
(12, 7, 2, 'Lylwynn', 'B.', 'Lozano', '', 1),
(13, 7, 2, 'Barbara Lilia', 'C,', 'Manalo', '', 1),
(14, 7, 3, 'Alvin', 'A.', 'Santiago', '', 1),
(15, 7, 4, 'Brecini Faith', 'V.', 'Tan', '', 1),
(16, 5, 2, 'Collin', 'C.', 'Ceneciro', '', 1),
(17, 5, 6, 'Flrenda', 'H.', 'Quinte', '', 1),
(18, 5, 4, 'Anthony', 'L.', 'Tolentino', '', 1),
(19, 5, 3, 'Irene', 'L.', 'Viray', '', 1),
(20, 5, 3, 'Irene', 'L.', 'Viray', '', 1),
(21, 9, 2, 'Erlyn', 'J.', 'Demaraye', '', 1),
(22, 9, 2, 'Margarito', 'T.', 'Ebol', '', 1),
(23, 9, 4, 'Jane Lou', 'V.', 'Gelvoveo', '', 1),
(24, 9, 2, 'Mercelita', 'M.', 'Medallo', '', 1),
(25, 9, 4, 'Joanes', 'C.', 'Ocamia', '', 1),
(28, 10, 4, 'Antea', 'T.', 'Jimera', '', 1),
(29, 11, 2, 'Rogelio', 'B.', 'Mabalot', '', 1),
(30, 12, 2, 'Florita Myrna', 'P.', 'Patacsil', '', 1),
(31, 14, 4, 'Rey', 'F.', 'Mascardo', '', 1),
(32, 12, 4, 'Marianne ', 'D.', 'Tan', '', 1),
(33, 12, 4, 'Alvin', 'B.', 'Uy', '', 1),
(39, 20, 8, 'Genebeth', 'M.', 'Enriquez', '', 0),
(40, 20, 7, 'Karl', 'A.', 'Semacio', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alumni`
--

CREATE TABLE IF NOT EXISTS `tbl_alumni` (
  `alumni_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue` text NOT NULL,
  `yearGraduated` text NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`alumni_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `tbl_alumni`
--

INSERT INTO `tbl_alumni` (`alumni_id`, `venue`, `yearGraduated`, `firstname`, `middlename`, `lastname`) VALUES
(9, 'Covered Court', '2014', 'Fatima Aliriza', 'J.', 'Aguil'),
(10, 'Covered Court', '2014', 'Christian Jorge', 'P.', 'Agudelo'),
(11, 'Covered Court', '2014', 'Almira', 'J.', 'Arap'),
(17, 'Covered Court', '2014', 'Bernadette', 'L.', 'Bazan'),
(20, 'Covered Court', '2014', 'Christine', 'D.', 'Besin'),
(21, 'Covered Court', '2014', 'Dave', 'U.', 'Cervas'),
(23, 'Covered Court', '2014', 'Christian Jude', 'A.', 'Cumayao'),
(25, 'Covered Court', '2014', 'Apple', 'B.', 'Daquel'),
(27, 'Covered Court', '2014', 'Nicole ', 'P.', 'Delos Reyes'),
(28, 'Covered Court', '2014', 'Eden Mae', 'E.', 'Delos Santos'),
(29, 'Covered Court', '2014', 'Liezl', 'B.', 'Dicen'),
(30, 'Covered Court', '2014', 'Gener', 'S.', 'Dizon'),
(31, 'Covered Court', '2014', 'Micah Kristel', 'G.', 'Domingo'),
(32, 'Covered Court', '2014', 'Joshua Zack', 'L.', 'Enriquez'),
(33, 'Covered Court', '2014', 'Mary Christal', 'S.', 'Eroy'),
(34, 'Covered Court', '2014', 'Ralph Cedric', 'R.', 'Flores'),
(35, 'Covered Court', '2014', 'Shadrina', 'A.', 'Gadjali'),
(36, 'Covered Court', '2014', 'Geselle Elizabeth ', 'C.', 'Gampong'),
(37, 'Covered Court', '2014', 'Jainor Timothy', 'U.', 'Garcia'),
(38, 'Covered Court', '2014', 'Janica Teresa', 'P.', 'Gaynor'),
(39, 'Covered Court', '2014', 'Resty', 'B.', 'Genandoy'),
(40, 'Covered Court', '2014', 'Afnan Aira', 'B.', 'Halil'),
(41, 'Covered Court', '2014', 'Jerriel', 'M.', 'Ibañez'),
(42, 'Covered Court', '2014', 'Yoshio', 'S.', 'Ishihara'),
(43, 'Covered Court', '2014', 'Fatima Aisa', 'D.', 'Janang'),
(44, 'Covered Court', '2014', 'Lady Johanna', 'L.', 'Jauhali'),
(45, 'Covered Court', '2014', 'Leo John', 'A.', 'Juguilon'),
(46, 'Covered Court', '2014', 'Tharhata', 'I.', 'Juhasan'),
(47, 'Covered Court', '2014', 'Fatima Aisa', 'D.', 'Kadjim'),
(48, 'Covered Court', '2014', 'Paula Marielle', 'B.', 'Kasim'),
(50, 'Covered Court', '2014', 'Aira Alyssa', 'U.', 'Kue'),
(51, 'Covered Court', '2014', 'Carmela Isabel', 'S.', 'Ladores'),
(52, 'Covered Court', '2014', 'Austine Zillah', 'L.', 'Laman'),
(53, 'Covered Court', '2014', 'Ephraim', 'R.', 'Lambarte'),
(54, 'Covered Court', '2014', 'Lorenz', 'T.', 'Leaño'),
(55, 'Covered Court', '2014', 'Patricia Belle', 'G.', 'Lim'),
(57, 'Covered Court', '2014', 'Illana', 'K.', 'Lorenzo'),
(58, 'Covered Court', '2014', 'Jan Wendale', 'L.', 'Lota'),
(59, 'Covered Court', '2014', 'Reybie Elishamae', 'D.S.', 'Luna'),
(60, 'Covered Court', '2014', 'John Aldred Benedick', 'B.', 'Mabalot'),
(61, 'Covered Court', '2014', 'Christine Joy', 'P.', 'Macansantos'),
(62, 'Covered Court', '2014', 'Ma. Raquel Ann', 'M.', 'Madrigal'),
(63, 'Covered Court', '2014', 'Eric Frazad', 'A.', 'Magsino'),
(64, 'Covered Court', '2014', 'Jamie', 'P.', 'Maguigad'),
(65, 'Covered Court', '2014', 'Hannah Chloie', 'T.', 'Marba'),
(66, 'Covered Court', '2014', 'Mel Gibson', 'L.', 'Miro'),
(67, 'Covered Court', '2014', 'Sarah Jane', 'L.', 'Miro'),
(68, 'Covered Court', '2014', 'Apple', 'A.', 'Nalupano'),
(69, 'Covered Court', '2014', 'Amor Rebecca', 'T.', 'Ordoyo'),
(70, 'Covered Court', '2014', 'Nicole', 'G.', 'Palaganas'),
(71, 'Covered Court', '2014', 'Jay-Anne', 'O.', 'Partosa'),
(72, 'Covered Court', '2014', 'Lauderdale', 'T.', 'Puy'),
(73, 'Covered Court', '2014', 'Darra Monique', 'D.', 'Regencia'),
(74, 'Covered Court', '2014', 'Ralph Matthew', 'R.', 'Relampagos'),
(75, 'Covered Court', '2014', 'Ernest Gabriel', 'C.', 'Reyes'),
(76, 'Covered Court', '2014', 'Ruffa Mae', 'R.', 'Robles'),
(77, 'Covered Court', '2014', 'Daniel Renz', 'M.', 'Roc'),
(78, 'Covered Court', '2014', 'Gabrielle', 'D.', 'Rodriguez'),
(79, 'Covered Court', '2014', 'Edsh Rasgedolf', 'D.', 'Rosales'),
(80, 'Covered Court', '2014', 'Caryl', 'G.', 'Rubares'),
(81, 'Covered Court', '2014', 'Fatima Ranea', 'P.', 'Sabandal'),
(82, 'Covered Court', '2014', 'Nyza', 'R.', 'Sahidjuan'),
(83, 'Covered Court', '2014', 'Ray Christian', 'C.', 'Salarda'),
(84, 'Covered Court', '2014', 'Venz Alfred', 'C.', 'Salinas'),
(85, 'Covered Court', '2014', 'Axl Rey', 'L.', 'Sanopao'),
(86, 'Covered Court', '2014', 'Kiemer Terernce', 'R.', 'Sechico'),
(87, 'Covered Court', '2014', 'Sharyna Grace', 'B.', 'Sedillo'),
(88, 'Covered Court', '2014', 'Matt Andrew', 'N.', 'Selibio'),
(89, 'Covered Court', '2014', 'Aissah', 'C.', 'Silbol'),
(90, 'Covered Court', '2014', 'Analyn', 'A.', 'Socor'),
(91, 'Covered Court', '2014', 'Antoine Jayson', 'A', 'Tagadaya'),
(92, 'Covered Court', '2014', 'Kyla', 'C.', 'Tan'),
(93, 'Covered Court', '2014', 'Ma. Yumi Angelica', 'M.', 'Tan'),
(94, 'Covered Court', '2014', 'Wayne', 'B.', 'Tang'),
(95, 'Covered Court', '2014', 'Farhana', 'V.', 'Tindick'),
(96, 'Covered Court', '2014', 'Reina Luz', 'A.', 'Toledo'),
(97, 'Covered Court', '2014', 'Denika Rose', 'C.', 'Toledo'),
(98, 'Covered Court', '2014', 'Allan Patrick', 'A.', 'Toribio'),
(99, 'Covered Court', '2014', 'Jullienne Veronica', 'F.', 'Tuazon'),
(100, 'Covered Court', '2014', 'Jerome', 'E.', 'Tuballa'),
(101, 'Covered Court', '2014', 'Safia', 'M.', 'Unaid'),
(102, 'Covered Court', '2014', 'Narvajel', 'D.', 'Usman'),
(103, 'Covered Court', '2014', 'Frenee-Li', 'A.', 'Valdez'),
(104, 'Covert court', '2015', 'Glazel', 'C.', 'Abes'),
(105, 'Covert court', '2015', 'Anika Rose', 'C.', 'Abisana'),
(106, 'Covert court', '2015', 'Shareece', 'T.', 'Alanano'),
(107, 'Covert court', '2015', 'Ibrahim II', 'A.', 'Albar'),
(108, 'Covert court', '2015', 'Alfrancis', 'F.', 'Alcuziar'),
(109, 'Covert court', '2015', 'Hasmina', 'A.', 'Alfad'),
(110, 'Covered Court', '2014', 'Zillah Vashti', 'H.', 'Valentin'),
(111, 'Covered Court', '2014', 'Jackie-Lou Irish', 'D.', 'Ventura'),
(112, 'Covered Court', '2014', 'Michael Van', 'T.', 'Viray'),
(113, 'Covered Court', '2014', 'Benjie', 'A.', 'Yabut'),
(114, 'Court', '2011', 'Alyssa', 'R.', 'Sali');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

CREATE TABLE IF NOT EXISTS `tbl_announcements` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`announcement_id`, `title`, `description`, `image`, `date`, `status`) VALUES
(5, 'Interview and Enrollment for G7- G11/ Teacher''s Clearance/LIS Housekeeping Form 1,2 and Form 5 (Advisers only)', 'A. Interview and enrollment for G7 and G11 (May 10-13, 2016)<br>B.Teacher''s Clearance<br><ol><li>Teacher''s Portfolio</li><li>IPCRF</li><li>Submission of Accomplishment Report for SY 2015-2016</li></ol>', '665803042_225339084_857085704.jpg', '04/18/2016', 1),
(6, 'NAT Enhancement Schedules', 'National Achievement Test Enhancement Schedule are soon&nbsp;available.Keep posted !', '137025422_24901150_597764390.jpg', '01/11/2016', 1),
(7, 'Screening for incoming Grade 7 Students SY 2016-2017', '<p>The Regional\r\nScience High School for Region IX announces the screening of incoming GRADE 7\r\nSTUDENTS S.Y. 2016-2017.</p><p>&nbsp;The screening\r\nwill start on January 25, 2016. (Monday) and on wards from 2:00 PM to 5:00 PM.<span><br>\r\n<br>\r\n<b><span>REQUIREMENTS:<br>\r\n</span></b><br>\r\n1. NSO Birth Certificate<br>\r\n2. Certificate of Good Moral Character<br>\r\n3. Medical Certificate<br>\r\n4. Form 138(Proficient level in Science, Math,\r\nEnglish and the Special Subjects)<br>\r\n&nbsp; &nbsp; *Approaching Proficiency in other\r\nsubjects<br>\r\n5. Referrals and other relevant certificates<br>\r\n&nbsp; &nbsp; &nbsp;(Academic Standing)<br>\r\n6. 2 pcs. 2x2 ID picture with name tag<br>\r\n<br>\r\n<b>ADMISSION TEST SCHEDULE:</b><br>\r\n<br>\r\n<b>FIRST BATCH:</b>&nbsp;February 20,2016(Saturday)<br>\r\n<b>SECOND BATCH:</b>&nbsp;March 19,2016(Saturday)<br>\r\n<b>THIRD BATCH:</b>&nbsp;April 30,2016(Saturday)<br>\r\n<br>\r\n<span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<b><span>TIME: 7:30-11:30 AM<br>\r\n<br>\r\nFOR INQUIRIES, PLEASE CALL AT<br>\r\n<br>\r\n&nbsp; &nbsp; &nbsp;-926-4648 &nbsp; &nbsp; -0917-3221820<br>\r\n</span></b>&nbsp; &nbsp;&nbsp;<b>&nbsp;-926-4656 &nbsp; &nbsp; -0917-3220687</b></span><br>\r\n<br>\r\n<br>\r\n<b>NOTE:&nbsp;</b><span>The student applicants should personally appear during the screening\r\nwith their parents and bring along above requirements.</span></span><br></p>', '', '01/04/2016', 1),
(8, 'Brigada Eskwela 2016 Day 1', '<h2> &nbsp; &nbsp; <b>&nbsp;Brigada Eskwela 2016 Day 1</b></h2> &nbsp; &nbsp; &nbsp;<i> &nbsp;</i><b> (7:00 AM - 4:00 PM)</b><br><ul><li>Cleaning of the CREEK and the area along the riprap foundation.</li><li>Trimming of some trees and other plants.</li><li>Rooting-off some plants on building B and C''s plant boxes.</li><li>Fixing some facilities and structures.</li></ul> &nbsp; &nbsp; &nbsp;&nbsp;<b>&nbsp;Person''s involved :</b>&nbsp;<br><ul><li>Internal Stakeholders :&nbsp;Institution''s Administration,Staffs,Teachers,GPTA Officers and Member,Students and&nbsp;Parents.</li><li>External Stakeholders: Bureau of Fire Protection,Air Force of the Philippines,Philippine National Police and other possible firms and companies.</li></ul>', '623279400_956549717_148798341.jpg', '05/30/2016', 1),
(9, 'Brigada Eskwela 2016 Day 2', '<h2> &nbsp; &nbsp; <b>&nbsp;&nbsp;Brigada Eskwela 2016 Day 2</b></h2><b> &nbsp; &nbsp; &nbsp;</b><b><i> &nbsp; &nbsp; (7:00 AM - 4:00 PM)</i></b><ul><li>Cleaning of the Covered Court (on both stage) and the areas covered by the Senior High School Buildings.</li></ul> &nbsp; &nbsp; <b>&nbsp;Person''s involved :</b> <br><ul><li>Internal Stakeholders :&nbsp;Institution''s Administration,Staffs,Teachers,Parents and students of Grade 7 curriculum.</li><li>External Stakeholders: Barangay Council,Sanggunian Kabataan of San Roque and Philippines Army.</li></ul><br><br>', '217851532_427540817_39633229.jpg', '05/31/2016', 1),
(10, 'Brigada Eskwela 2016 Day 3', '<h2><b>Brigada Eskwela 2016 Day 3</b></h2><div><b>&nbsp; &nbsp; &nbsp; &nbsp; (7:00 AM - 4:00 PM)<br><br></b></div><ul><li>Cleaning and Beautifying certain areas; Biology,Physics and Chemistry Laboratory,Language Park, ArPan kiosk and the Canteen.</li></ul><ul><li>Person''s involved :&nbsp;</li></ul><ul><li>Internal Stakeholders : Institution Administration,Staffs,Teachers,Parents and students of Grade 8 curriculum.</li></ul><ul><li>External Stakeholders: Urban Poor Association of San Roque and Philippines Army.</li></ul>', '392132798_703444807_909043628.jpg', '06/01/2016', 1),
(11, 'Brigada Eskwela 2016 Day 4', '<h2> &nbsp; &nbsp; <b>&nbsp;&nbsp;Brigada Eskwela 2016 Day 4 &nbsp;&nbsp;</b></h2> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b><i>(7:00 AM - 4:00 PM)</i></b><br><ul><li>Cleaning and Beautifying certain areas: Academic Building A and C and the areas at the back of it.</li></ul> &nbsp; &nbsp; &nbsp; &nbsp;<b> Person''s Involved :<br></b><ul><li>Internal Stakeholders : Administration,Staffs and Teachers, Parents and Students of Grade 9 Curriculum.</li><li>External Stakeholders: Alumni Association of the Regional Science High School and Philippines Army.</li></ul>', '842187094_872623650_852729656.jpg', '06/02/2016', 1),
(12, 'Brigada Eskwela 2016 Day 5', '<h2><b>&nbsp; &nbsp; &nbsp;&nbsp;Brigada Eskwela 2016 Day 5</b></h2> &nbsp; &nbsp; &nbsp; &nbsp;<b>(7:00 AM - 4:00 PM)</b><b><br></b><ul><li>Cleaning and Beautifying certain areas: Administration Building, Science and Mathematics Park and English Alley.</li></ul> &nbsp; &nbsp; &nbsp; <b>&nbsp;Person''s Involved :<br></b><ul><li>Internal Stakeholders : Administration.Staffs,Teachers,Parents and Students of Grade 10 Curriculum.</li><li>External Stakeholders : Other Stakeholders and Philippines Army.</li></ul><br>', '579980436_94135955_645456789.jpg', '06/03/2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bids_and_awards`
--

CREATE TABLE IF NOT EXISTS `tbl_bids_and_awards` (
  `bids_and_awards_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bids_and_awards_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_bids_and_awards`
--

INSERT INTO `tbl_bids_and_awards` (`bids_and_awards_id`, `title`, `image`, `description`, `status`) VALUES
(15, '2013 Disbursement Financial Statement', '952362061_949829102_95611573.jpg', 'Detailed Statements of current year''s obligation,disbursements,unpaid obligations 2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_citizen_charters`
--

CREATE TABLE IF NOT EXISTS `tbl_citizen_charters` (
  `citizen_charter_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`citizen_charter_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_citizen_charters`
--

INSERT INTO `tbl_citizen_charters` (`citizen_charter_id`, `title`, `image`, `description`, `status`) VALUES
(14, 'School Priority Improvement  Areas ', '511887223_153995896_124074877.png', 'Regional Science High School  Priority Improvement\r\n Areas \r\n', 1),
(15, 'School Goals and Objectives ', '104260967_327935867_350643309.png', 'School Goals and Objectives ', 1),
(12, 'Programs and Action Plans 2', '420721375_630460023_727491368.png', '	Annual Improvement Plan\r\n	(Year 2) \r\n', 1),
(10, 'Monitoring and Evaluation Plan', '28228335_353893977_445382277.png', 'From Year 1 - Year 3', 1),
(11, 'Programs and Action Plans 3', '401590798_953777686_976454691.png', 'Annual Improvement Plan(Year 3)\r\n', 1),
(13, 'Programs and Action Plans 1', '189480801_920403754_899447889.png', 'Annual Improvement Plan\r\n	(Year 1) \r\n', 1),
(16, 'School Management and Stakeholders’ Participation', '876789338_483362710_248749914.png', 'School Management and Stakeholders’ Participation\r\n', 1),
(17, 'Instructional Materials,Physical Facilities and Ancillary Services', '93793846_590555620_410417084.png', 'Instructional Materials,Physical Facilities, Ancillary Services \r\n', 1),
(18, 'National Career Assessment Evaluation', '763464487_375627185_45661519.png', 'National Career Assessment Evaluation', 1),
(19, 'Students Performance', '304856425_970761782_452202517.png', 'Students Performance', 1),
(23, 'Situational Analysis : Personnel ', '477282188_377172692_716140524.png', 'Situational Analysis : Personnel \r\n\r\n', 0),
(22, 'School Indicators (in bar graph),School Enrollment', '166642288_185244159_371864080.png', 'School Indicators (in bar graph),School Enrollment\r\n', 0),
(21, 'Survival Rate,Retention Rate,Transition Rate ', '846250111_197154541_739886678.png', 'Survival Rate,Retention Rate,Transition Rate \r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum`
--

CREATE TABLE IF NOT EXISTS `tbl_curriculum` (
  `curriculum_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_level_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`curriculum_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `tbl_curriculum`
--

INSERT INTO `tbl_curriculum` (`curriculum_id`, `grade_level_id`, `subject_id`) VALUES
(1, 2, 1),
(17, 4, 58),
(20, 4, 54),
(19, 4, 55),
(21, 4, 39),
(18, 4, 56),
(16, 4, 59),
(22, 4, 11),
(23, 4, 40),
(24, 4, 14),
(25, 4, 13),
(26, 4, 53),
(27, 4, 12),
(28, 4, 16),
(29, 4, 52),
(30, 4, 50),
(31, 4, 49),
(32, 4, 22),
(33, 4, 21),
(34, 4, 48),
(35, 4, 47),
(36, 4, 46),
(37, 4, 45),
(38, 3, 44),
(39, 3, 43),
(40, 3, 42),
(41, 3, 28),
(42, 3, 40),
(43, 3, 39),
(44, 3, 38),
(45, 3, 37),
(46, 3, 29),
(47, 3, 35),
(48, 3, 13),
(49, 3, 14),
(50, 3, 34),
(51, 3, 16),
(52, 3, 12),
(53, 3, 33),
(54, 3, 22),
(55, 3, 21),
(56, 2, 14),
(57, 2, 16),
(58, 2, 12),
(59, 2, 25),
(60, 2, 24),
(61, 2, 23),
(62, 2, 22),
(63, 2, 21),
(64, 2, 20),
(65, 1, 11),
(66, 1, 10),
(67, 1, 12),
(68, 1, 13),
(69, 1, 14),
(70, 1, 15),
(71, 1, 16),
(72, 1, 17),
(73, 1, 9),
(74, 1, 8),
(75, 6, 10),
(76, 6, 11),
(77, 6, 13),
(78, 6, 12),
(79, 6, 22),
(80, 6, 14),
(81, 6, 16),
(82, 6, 25),
(83, 6, 20),
(84, 6, 56),
(85, 6, 55),
(86, 6, 58),
(87, 6, 59),
(88, 5, 10),
(89, 5, 11),
(90, 5, 12),
(91, 5, 15),
(92, 5, 23),
(93, 5, 28),
(94, 5, 57),
(95, 5, 25),
(96, 5, 40),
(97, 5, 20),
(98, 5, 51),
(99, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE IF NOT EXISTS `tbl_departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`department_id`, `name`, `position`) VALUES
(5, 'English Department', 1),
(7, 'Science Department', 2),
(17, 'Present Principal', 22),
(9, 'Mathematics Department', 3),
(10, 'Filipino Department', 4),
(11, 'ICT Department', 5),
(12, 'ArPan Department', 6),
(14, 'MAPEH Department', 8),
(20, 'Financial Staff', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_downloads`
--

CREATE TABLE IF NOT EXISTS `tbl_downloads` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` text NOT NULL,
  `file` text NOT NULL,
  `dateUploaded` text NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filesize` int(11) NOT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_downloads`
--

INSERT INTO `tbl_downloads` (`download_id`, `caption`, `file`, `dateUploaded`, `filename`, `filesize`) VALUES
(1, 'History of RSHS', '961730958_49163819_438720704.docx', '2016-05-16', 'History.docx', 14056),
(2, 'School''s Mission&Vision', '678955079_757843018_591003418.docx', '2016-05-16', 'Mission &Vision.docx', 12226),
(3, 'G7-G10 Subjects', '332885743_723785401_816223145.docx', '2016-05-16', 'CoursesG7-10.docx', 14462),
(4, 'Lists of Administration', '688812256_660400391_235382081.docx', '2016-05-16', 'Administration.docx', 12357);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `dateCreated` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `title`, `description`, `dateCreated`, `status`) VALUES
(7, 'Alumni Donates Chair', 'Spray painting of all donated chairs for the RSHS IX Covered court \r\nTotal donated chairs: 231\r\nTarget donation : 500\r\nTotal chairs spray painted: 228\r\nMissing: 3\r\nThank you batch 2005 for the new 100 monoblock chairs Francis Xavier P. Buñag Thrina T. Huang Maryrose Bugtai\r\nThanks also to batch 2003 for extending you help in this activity (insert Anthar Bin Saddad & Abdel Aziz Adjawi Alfad) Juan Francisco Acaylar Manauis Winfred Zerna Patagoc Adonis D. Alob Daryne Tadeo', '2016-05-23', 1),
(6, 'School Campus', 'Regional Science High School Campus', '2016-05-19', 1),
(8, 'sample', 'sample', '2016-07-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_photos`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery_photos` (
  `gallery_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `imagename` text NOT NULL,
  `size` float NOT NULL,
  `description` text NOT NULL,
  `dateUploaded` text NOT NULL,
  PRIMARY KEY (`gallery_photo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `tbl_gallery_photos`
--

INSERT INTO `tbl_gallery_photos` (`gallery_photo_id`, `gallery_id`, `image`, `imagename`, `size`, `description`, `dateUploaded`) VALUES
(87, 5, '951732178_947236512_624268839.jpg', '13219942_1337141039647710_966808273_n.jpg', 64694, '', '2010-12-29'),
(84, 5, '718695290_239451659_970397293.jpg', '13219887_1337141099647704_1727359099_n (1).jpg', 8394, '', '2010-12-29'),
(83, 5, '726488569_94579970_358626995.jpg', '13219765_1337141022981045_1957717702_n.jpg', 35546, '', '2010-12-29'),
(88, 5, '61263312_304959933_774801222.jpg', '13219959_1337141109647703_494306552_n.jpg', 73689, '', '2010-12-29'),
(89, 5, '259090457_340719818_430098299.jpg', '13219991_1337141092981038_706538670_n.jpg', 33680, '', '2010-12-29'),
(90, 5, '482897674_652762543_171321787.jpg', '13220050_1337141106314370_1891738982_n.jpg', 12005, '', '2010-12-29'),
(91, 5, '937863309_242953643_488087516.jpg', '13228162_1337141102981037_1989446199_n.jpg', 40156, '', '2010-12-29'),
(93, 5, '80369071_865528068_635562736.jpg', '13231054_1337141049647709_114217366_n.jpg', 51583, '', '2010-12-29'),
(94, 5, '438996065_584223358_875014395.jpg', '13231134_1337141052981042_2076668327_n.jpg', 54196, '', '2010-12-29'),
(95, 5, '409393358_277008342_905075461.jpg', '13233296_1337141069647707_1928493846_n.jpg', 52573, '', '2010-12-29'),
(96, 5, '849628446_219542014_637008785.jpg', '13235707_1337141016314379_1100114522_n.jpg', 48314, '', '2010-12-29'),
(98, 5, '909089822_232537503_889205230.jpg', '13249495_1337141062981041_281301305_n.jpg', 40913, '', '2010-12-29'),
(99, 5, '683891044_491627960_229925048.jpg', '13250284_1337141096314371_1103963961_n.jpg', 39343, '', '2010-12-29'),
(100, 5, '113989343_974525634_882687590.jpg', '13250383_1337141079647706_200014856_n.jpg', 40390, '', '2010-12-29'),
(103, 6, '365844727_441314698_651916504.jpg', '20160517_104408.jpg', 341061, 'School Building', '2016-05-16'),
(110, 6, '417131473_879846993_880765731.jpg', 'IMG20160520101840.jpg', 1108300, 'Filipino Park', '2016-05-16'),
(105, 6, '572497211_798619537_760077418.jpg', 'IMG20160520092451.jpg', 553165, 'Principal''s Office', '2016-05-16'),
(106, 6, '861485125_795835088_774584008.jpg', 'IMG20160520093557.jpg', 784577, 'RSHS Classrooms\r\n', '2016-05-16'),
(107, 6, '352165620_911261794_505254510.jpg', 'IMG20160520092957.jpg', 785171, 'School Canteen', '2016-05-16'),
(109, 6, '427450989_670617538_83429340.jpg', 'IMG20160520101440.jpg', 729163, 'Covered Court', '2016-05-16'),
(116, 8, '600180919_36791964_138176603.jpg', 'example.jpg', 11243, '', '2016-07-29'),
(112, 7, '369418122_712844589_661776434.jpg', '12592189_10205835632190027_6536929475581624533_n.jpg', 141138, 'Donated Chair', '2016-01-31'),
(113, 7, '102730955_262925976_280224488.jpg', '12631450_10205835631630013_1205940855509443018_n.jpg', 150771, 'Spray Painting Donated Chair', '2016-01-31'),
(114, 7, '634142091_812831297_547166113.jpg', '12642495_10205835633110050_3710383449152769726_n.jpg', 97442, 'Donated Chairs', '2016-01-31'),
(115, 7, '745559182_577204822_596831185.jpg', '12644752_10205835633590062_8879592188680859169_n.jpg', 128587, 'Alumni Donates Chairs', '2016-01-31'),
(117, 7, '681545078_530891712_238355462.jpg', 'Chrysanthemum.jpg', 921926, '', '2016-11-07'),
(118, 7, '659505333_785926566_570345187.jpg', 'Desert.jpg', 902611, 'This is an amazing view from the top of the world!', '2016-11-07'),
(119, 7, '151234766_395128892_698389437.jpg', 'Hydrangeas.jpg', 611903, '', '2016-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_level`
--

CREATE TABLE IF NOT EXISTS `tbl_grade_level` (
  `grade_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` text NOT NULL,
  PRIMARY KEY (`grade_level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_grade_level`
--

INSERT INTO `tbl_grade_level` (`grade_level_id`, `grade`) VALUES
(1, 'Grade 7'),
(2, 'Grade 8'),
(3, 'Grade 9'),
(4, 'Grade 10\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_honors`
--

CREATE TABLE IF NOT EXISTS `tbl_honors` (
  `honor_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_level_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`honor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_honors`
--

INSERT INTO `tbl_honors` (`honor_id`, `grade_level_id`, `firstname`, `middlename`, `lastname`) VALUES
(18, 2, 'Khadija', 'L.', 'Sarael'),
(6, 1, 'John', 'M.', 'Guzman'),
(3, 2, 'Allan Patrick', 'A.', 'Toribio'),
(4, 2, 'Illana', 'K.', 'Lorenzo'),
(5, 2, 'Bemjie', 'A.', 'Yabut'),
(11, 1, 'Jeriebelle', 'C.', 'Piedad'),
(8, 1, 'Henry', 'O.', 'Perez'),
(9, 1, 'Gemmy', 'P.', 'Yaput'),
(10, 3, 'Jerico', 'K.', 'Sotorinos'),
(12, 1, 'Jeric Cesar', 'A.', 'Enriquez'),
(13, 1, 'Micah', 'L.', 'Sanopao'),
(14, 1, 'Danica Cristelle', 'V.', 'Alfaro'),
(15, 1, 'Jeshier John', 'H.', 'Feliciano'),
(16, 1, 'Rashadah ', 'J.', 'Mahari'),
(17, 1, 'Johanna Marie', 'T.', 'Gantalao'),
(19, 2, 'Ayesha', 'S.', 'Tulete'),
(20, 2, 'Rafols', 'H.', 'Gantalao'),
(21, 2, 'Adrian Dynn', 'A.', 'Duterte'),
(22, 2, 'Rizzah Gwen', 'G.', 'Godinez'),
(23, 2, 'Eeman Marwa ', 'I.', 'Pandangan'),
(24, 2, 'Daisy', 'A.', 'Jimera'),
(25, 3, 'Yves Joey', 'P.', 'Flores'),
(26, 3, 'Erica Ann', 'P.', 'Ordinaria'),
(27, 3, 'Anne', 'T.', 'Sabirin'),
(28, 3, 'Desiree ', 'G.', 'De Guzman'),
(29, 4, 'Alter', 'G.', 'Jamora'),
(30, 4, 'Hellery', 'T.', 'Torres'),
(31, 4, 'Kenneth', 'M.', 'Flores'),
(32, 4, 'Krystal', 'H.', 'Mendoza'),
(33, 4, 'Dennis', 'G.', 'Hendrick'),
(34, 4, 'Mary Kay', 'H.', 'Ramos'),
(35, 2, 'Crystal Jane', 'I.', 'Locsin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE IF NOT EXISTS `tbl_messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` text NOT NULL,
  `emailAddress` text NOT NULL,
  `message` text NOT NULL,
  `dateReceived` text NOT NULL,
  `dateReplied` text NOT NULL,
  `readStatus` int(11) NOT NULL DEFAULT '0',
  `replyStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`message_id`, `fullname`, `emailAddress`, `message`, `dateReceived`, `dateReplied`, `readStatus`, `replyStatus`) VALUES
(16, 'Jane Locson', 'janelocson27@gmail.com', 'hi i would like to have an account in this website please contact me @ 09051780021.', '2016-05-27 04:52:35 am', '', 1, 0),
(17, 'Valice', 'valice143h3.VH@gmail.com', 'Test', '2016-05-27 05:03:22 am', '2016-06-25', 1, 1),
(14, 'mark flores', 'flores_mark@yahoo.com', 'this is a test message...please verify', '2016-05-25 11:11:02 pm', '2016-05-25', 1, 1),
(18, 'roi', 'amatongroi@gmail.com', 'Hello Admin', '2016-08-27 07:56:42 am', '', 1, 0),
(19, 'Roi Larrence Amatong', 'amatongroi@gmail.com', 'Hello World!!', '2016-11-07 07:59:34 am', '2016-11-07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_submitted` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `title`, `description`, `image`, `date_submitted`, `status`) VALUES
(18, 'Alumni Donates Chairs', '<p>Spray painting of all donated chairs for the RSHS IX Covered court&nbsp;<br>Total donated chairs: 231<br>Target donation : 500<br>Total chairs spray painted: 228<span><br>Missing: 3</span></p><div><p>Thank you batch 2005 for the new 100 monoblock chairs&nbsp;<a target="_blank" rel="nofollow" href="https://www.facebook.com/francisxavierbunag">Francis Xavier P. Buñag</a>&nbsp;<a target="_blank" rel="nofollow" href="https://www.facebook.com/thrina.tortola">Thrina T. Huang</a>&nbsp;<a target="_blank" rel="nofollow" href="https://www.facebook.com/maryrose.bugtai">Maryrose Bugtai</a></p><p>Thanks also to batch 2003 for extending you help in this activity (insert<a target="_blank" rel="nofollow" href="https://www.facebook.com/thracqzki">Anthar Bin Saddad</a>&nbsp;&amp;&nbsp;<a target="_blank" rel="nofollow" href="https://www.facebook.com/delziz">Abdel Aziz Adjawi Alfad</a>)&nbsp;<a target="_blank" rel="nofollow" href="https://www.facebook.com/francis.manauis">Juan Francisco Acaylar Manauis</a>&nbsp;<a target="_blank" rel="nofollow" href="https://www.facebook.com/fredoplex">Winfred Zerna Patagoc</a>&nbsp;<a target="_blank" rel="nofollow" href="https://www.facebook.com/adonis.alob">Adonis D. Alob</a>&nbsp;<a target="_blank" rel="nofollow" href="https://www.facebook.com/darynetadeo">Daryne Tadeo</a></p></div>', '623673585_350929149_642601559.jpg', '01/31/2016', 1),
(13, 'RSHS Technology Fair 2015', '<p><span>The Regional Science High School Congratulates the selected\r\nstudents for winning the 1st Place&nbsp;in&nbsp;all four categories : Life Science\r\nTeam&nbsp;, Individual and Physical Team and Individual in Regional Science\r\nTechnology Fair 2015.</span></p>', '306461372_100574533_787306866.jpg', '08/03/2015', 0),
(15, 'W.A.T.C.H Club Launch 2015', '<p><span>The Launching of W.A.T.C.H Club 2015 goal to advocate time\r\nconsciousness and honesty with the theme of , "TIME CONSCIOUSNESS AND\r\nHONESTY ADVOCACY"<br>\r\nto be held on September 24&amp;26 at the campus covered court.</span></p>', '486196633_307108989_164850950.jpg', '09/24/2015', 0),
(17, 'Supreme Student Government 2015', '<p><span>The Regional Science High School &nbsp;newly\r\nelected&nbsp;Supreme Student Government Officers announces the upcoming school\r\nactivities this year. Keep posted on our Supreme Student\r\nGovernment&nbsp;Bulletin Board for more informations.&nbsp;</span></p>', '377743331_354380149_356046539.jpg', '07/13/2015', 0),
(19, 'Proposed Dormitory', 'It is a two story building with 11 rooms proposed dormitory and&nbsp;&nbsp;is expected to be done before the starting of the class this school year.', '801650610_792823304_951862921.jpg', '02/01/2016', 1),
(21, 'Grade 7 Entrance Examination First Batch List of Passers 2016-2017', '<p></p><p>Here are the <b>First Batch</b>&nbsp;list of passers for the school year 2016-2017 Grade 7&nbsp;Entrance Examination. Please keep posted for the next batch of list of passers.</p>', '501144367_429829689_602137507.png', '02/20/2016', 1),
(22, 'Grade 7 Entrance Examination Second Batch List of Passers 2016-2017', 'List of Passers for First and&nbsp;Second Batch, Please be guided of the requirements for admission.', '452724091_835702527_397298504.png', '03/19/2016', 1),
(23, 'sdag', 'dhcfdgh', '', '11/27/0000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_positions`
--

CREATE TABLE IF NOT EXISTS `tbl_positions` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_positions`
--

INSERT INTO `tbl_positions` (`position_id`, `name`) VALUES
(2, 'Teacher III'),
(3, 'Teacher II'),
(4, 'Teacher I'),
(5, 'Principal IV'),
(6, 'Master Teacher I'),
(7, 'Disbursing Officer'),
(8, 'Senior Bookkeeper');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rshs_information`
--

CREATE TABLE IF NOT EXISTS `tbl_rshs_information` (
  `rshs_information_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `footerBackground` varchar(100) NOT NULL,
  PRIMARY KEY (`rshs_information_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_rshs_information`
--

INSERT INTO `tbl_rshs_information` (`rshs_information_id`, `history`, `mission`, `vision`, `admission`, `address`, `contactNo`, `emailAddress`, `image`, `admissionBackground`, `newsRoomBackground`, `announcementBackground`, `eventBackground`, `historyBackground`, `footerBackground`) VALUES
(1, '<p><span>&nbsp; &nbsp; &nbsp;The\nRegional Science High School was established by virtue of&nbsp;DECS Order No. 69 s. 1993 dated\nAugust 9, 1993 and DECS Order No. 55 s. 1994 stipulating that there will be one\n(1) regional science high school in every region.</span></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp; &nbsp; &nbsp;Regional\nScience High School is a type of school that focuses on a particular area of\nstudy and is distinguished form a regular secondary school. It focuses on\nScience and Mathematics and its curriculum is designed for the\nintellectually-gifted and science-inclined students of the region.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp; &nbsp; &nbsp;As\na new school, the Regional Science High School had only 11 teachers and one\nschool head that comprised the faculty and an enrolment of 200 pioneer\nstudents. RSHS, having no budget of it own, occupied a six-room building at the\nZCHS-Tetuan and became operational on borrowed capabilities such Science\nlaboratories, library facilities, equipments, and other resources.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp; &nbsp; &nbsp;As\nyears moved on, the problems of incomplete textbooks and lack of computers for\nthe students and other financial, legal and technical problems that hampered\nthe smooth operation of RSHS were partially solved through the concerted\nefforts of the school head, teachers, parents, students and some benefactors.</p>\n\n<p>&nbsp; &nbsp; &nbsp;Eight&nbsp;years after its\nestablishment, the school grew steadily and has come to be known as one of the\nhigh-standard secondary schools that offer quality education through a\nScience-oriented curriculum. RSHS can now boast of two six-room academic buildings,\na 16-room two-storey building which houses the Principal’s Office,\nAdministration Office, Supply Room, Computer Room, Learning Centers, Library,\nGuidance Room, Multi-Purpose Hall; Science Laboratory Rooms and an open Stage\nat its permanent site in a 1.737-hectare lot under Usufruct by the City\nGovernment at Malasiga, San Roque.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp; &nbsp; &nbsp;School\nyear 1999-2000 was a good year for Regional Science High Schools because DepEd\nCentral Office through the initiative of Sec Andrew Gonzales gave two million\npesos (2M) for the Science Laboratory apparatuses and equipments, instructional\nmaterials in English, Science and Mathematics; Teachers’ Trainings and\nStudents’ Research projects.</p>\n\n<p>&nbsp;</p>\n\n<p><span>&nbsp; &nbsp; &nbsp;At\npresent, the school receives financial assistance from DepEd Central Office thru\nOSEC Fund. We also have twenty-two (22) permanent teacher items which was an\neffort exerted by Dir. Ibrahim A. Albar and an additional one (1) item given by\nDr. &nbsp;Jesus L. Nieves.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span>&nbsp; &nbsp; &nbsp;Last\nschool year 2006-2007, the school hosted the <i>3rd National Science-Math Congress for Regional Science High Schools</i>.\nIt was a big endeavor that this school had undertaken in its existence for\nthirteen (13) years. The hosting of a national event/activity was a great\nsuccess with the help and support of all students, teachers, parents, community\nofficials, city officials, and division and regional DepEd officials.</span></p>\n\n<p>&nbsp; &nbsp; &nbsp;The Regional Science High\nSchool follows the prescribed 2003 Science curriculum for Regional Science High\nSchools and also enriched the prescribed BEC competencies for public secondary\nhigh schools.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp; &nbsp; &nbsp;Presently,\nthe Regional Science High School teaching staff is composed of twenty-three (23)\nteachers and one school principal.</p>\n\n<p>&nbsp;</p>\n\n<p><span>&nbsp; &nbsp; &nbsp;True\nto its vision, the school has reached even to greater heights. The scientific\nand leadership skills of the students and faculty have made the school even\nbrighter. &nbsp;The school was under the good\nhands of the following detailed administrators: Mrs. Norma M. Vecina, Principal\nI (May 1994-August 1998);&nbsp;&nbsp; Ms. Evelyn\nVilla, ES-I Mathematics (September 1998-December 1998); Mr. Angelito Limjoco,\nTIC (January 1999-June 2000); Mr. Manuel Rebollos, Principal I (July\n2000-January 2001); &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mrs.\nAdoracion Villanueva, ES-II Mathematics(on concurrent capacity), (February\n2001-December 2001); Mrs. Melanie A. Minez, Principal II (January 2002-June\n2004).</span></p>\n\n<p>&nbsp;</p>\n\n<span>&nbsp; &nbsp; &nbsp;The new item of\nPrincipal I was released on July 1, 2004 to date to Mrs. Melanie A. Minez.</span><br>', '<p><span>&nbsp; &nbsp; &nbsp;&nbsp;Regional Science High School for Region IX, in partnership with the Local\nGovernment Units, Barangay Council, Parents-Teachers Association, Supreme\nStudent Government, Alumni Association and other schools organization and\nstakeholders commit to develop responsible and morally upright Science-oriented\nleaders through relevant and globally competitive Science and Mathematics\nEducation Programs.</span></p>', '<p><b>&nbsp;</b></p>\n\n<p><span>&nbsp; &nbsp; &nbsp;A regional center of excellence in Science and Mathematics education at\nthe secondary level that shall develop potential leaders in Science and related\nfields.</span></p>', '&nbsp; &nbsp; &nbsp;The Regional Science High School for Region IX announces the screening of incoming GRADE 7 STUDENTS S.Y. 2016-2017.<br><br>&nbsp; &nbsp; &nbsp;The screening will start on January 25,2016. (Monday) and onwards from 2:00 PM to 5:00 PM.<br><br><b>REQUIREMENTS:</b><br><br>1. NSO Birth Certificate<br>2. Certificate of Good Moral Character<br>3. Medical Certificate<br>4. Form 138(Proficient level in Science, Math, English and the Special Subjects)<br>&nbsp; &nbsp; *Approaching Proficiency in other subjects<br>5. Referrals and other relevant certificates<br>&nbsp; &nbsp; (Academic Standing)<br>6. 2pcs. 2x2 ID picture with name tag<br><br><br><b>ADMISSION TEST SCHEDULE</b><br><br><b>FIRST BATCH:</b> February 20,2016 (Saturday)<br><b>SECOND BATCH:</b> March 19,2016 (Saturday)<br><b>THIRD BATCH:</b> April 30,2016 (Saturday)<br>&nbsp; &nbsp; &nbsp;<br>&nbsp; &nbsp; <b>TIME:</b> 7:30-11:30 AM<br><br><b>FOR INQUIRIES, PLEASE CALL AT</b><br><br>-926-4648<br>-926-4656', 'Malasiga, San Roque, Zamboanga City', '(000) 926-4648', 'rshs@gmail.com', 'logo.png', '588948835_962522176_965251713.JPG', '791118450_634507592_66898926.jpg', '769680330_559219424_811827886.jpg', '977932088_71303615_408852522.jpg', '977622821_173557510_631286437.png', '144385969_182765896_120661602.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE IF NOT EXISTS `tbl_subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`subject_id`, `name`) VALUES
(21, 'Pamamahayag'),
(20, 'Drafting'),
(7, 'Environmental Science'),
(6, 'General Sciences'),
(8, 'Algebra'),
(9, 'Statistics'),
(10, 'Technical Research'),
(11, 'Scientific Research'),
(12, 'Civic Research'),
(13, 'English'),
(14, 'Filipino'),
(15, 'Computer Sciences'),
(16, 'MAPEH'),
(17, 'Philippine History'),
(22, 'Journalism'),
(23, 'Business Mathematics'),
(24, 'Botany'),
(25, 'Biotechnology'),
(26, 'Computer Science'),
(27, 'Asian History'),
(28, 'Science Research'),
(29, 'Advanced Algebra'),
(30, 'Geometry'),
(31, 'Biology'),
(32, 'Technical Writing'),
(33, 'Speech and Drama'),
(34, 'World History'),
(35, 'Analytic Geometry'),
(36, 'Advanced Statistics'),
(37, 'Pre-Calculus'),
(38, 'Triginometry'),
(39, 'Statistical Research'),
(40, 'Mathematical Research'),
(41, 'Scence Research'),
(42, 'Inorganic Research'),
(43, 'Classical Physics'),
(44, 'Hydraulic Physics'),
(45, 'Electricity'),
(46, 'Humanities'),
(47, 'French Language'),
(48, 'Theatre Arts'),
(49, 'Meteorology and Astronomy'),
(50, 'Geology'),
(51, 'Environmental Chemistry'),
(52, 'Creative Writing'),
(53, 'Economics'),
(54, 'Linear Algebra'),
(55, 'Thermo Chemistry'),
(56, 'Electro Chemistry'),
(57, 'Modern Chemistry'),
(58, 'Modern Physics'),
(59, 'Nuclear Physics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transparency_seal`
--

CREATE TABLE IF NOT EXISTS `tbl_transparency_seal` (
  `transparency_seal_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transparency_seal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_transparency_seal`
--

INSERT INTO `tbl_transparency_seal` (`transparency_seal_id`, `title`, `description`, `image`, `date`, `status`) VALUES
(17, 'GENERAL PARENTS AND TEACHERS ASSOCIATION [GPT/ FINANCIAL STATEMENT SY: 2014-2015', 'Cash-on-hand GPTA SY 2013-2014					15,485.15\r\nAdd: Contributions of Students for PTA fees for SY 2014-2015\r\n	Grade 7					171,700.00\r\n	Grade 8					155,100.00\r\n	Grade 9					112,100.00\r\n	Fourth Year					115,750.00	554,650.00\r\nTotal GPTA Fees Collection for SY’ 2014-2015 				570,135.15\r\nAdd: Sale from Tree Branches						    7,200.00\r\nTotal Cash-In-Bank							577,335.15\r\nLess: Salaries and Wages (2 Security Guards		\r\n for period covered August 2014 to May 2015)		\r\nSalaries and Wages (2 Security Guards for period \r\ncovered June-July 2015)				\r\nSalaries and Wages(1 Janitor for period covered\r\n 	Aug 2014 to May)				\r\nAllowances (Aug. 2014 to May 2015 2 Security\r\n 	Guards plus Cash advance of Roger Singe 1,300.00\r\n13thMonth Pay for Arnold Bejerano (Senior Security Guard) \r\n13thMonth Pay for Reynaldo Plata(Janitor)		    \r\n13thMonth Pay for Delwin Ibno(Janitor/Security Guard)	\r\nInsurance at PNRC (469 students) for SY 2014-2015	\r\nInsurance at PNRC (410 students) for SY 2015-2016	\r\nSchool Paper/News Letter (Haylaya and Catalyst)	   \r\nCash-in-Bank\r\nLess: Operating Expenses and Projects Implemented\r\n	Uniform of Athletes for Triangular Meet c/o Mr.Mascardo      \r\nTarpaulin Printing for the Educational Week\r\nTarpaulin Printing for the Entrance Exam Results of 4th\r\nYear and other announcement\r\nTarpaulin Printing for Orientation of Grade 7\r\nLabor Cost & Power Saw rental for cleaning and cutting of gimelina tree and canteen area\r\nNAT Enhancement Reviews Allowances for Teachers\r\nFamily Day Miscellaneous Expenses c/o Ms.Jimera & Mr.Uy\r\nChristmas Gift Packs for Teachers and Employees\r\nCash Advance for the Program of Mr.Mascardo\r\nShare for Red Cross Youth Club c/o Ms.Medallo\r\nBlood Letting Snacks for Red Cross & Blood Donors\r\n2014-2015 Metrobank Check Book\r\nMiscellaneous Expenses for GPTA Officers and Teachers\r\nGeneral Assembly\r\nLabor & Materials for Construction and Pathway going to New Comfort Room\r\nPurchased of School Clinic Medicines for SY 2014-2015\r\nPurchased of School Clinic Medicines for SY 2015-2016\r\nPalaro Sports Materials SY 2014-2015\r\nPurchased of New Honda Grass Cutter and other Maintenance Supplies\r\nDonation for the repair of RSHS Canteen\r\nPurchased of Clinic Apparatus(Nebulizer & Digital BP)\r\nPurchased of Oxygen Tank Assembly Accessories for school clinic\r\nPurchased of Pulse Oxymeter for school clinic\r\nProject for Installation of 16 Channel CCTV Cameras with complete set\r\nAdditional Payment for the purchased of 20pcs Plastic Arm Chair\r\nHonorarium for Mr.Karl Semacio(Collection of GPTA Fees) with Resolution No.4\r\nNet Cash-In-Bank\r\nAdd : Accounts Receivables\r\n             Unliquidated Ticket from 4th year students Dela Cruz for Seminar Attended in Taguig\r\nAccounts Receivables from Treasurer Ruiz\r\nAccounts Receivables from GPTA Fees(11 Students)\r\n	Digital Cas-In-Bank and Accounts Receivables for SY 2014-2015		\r\n', '925679546_20675416_406093559.jpg', '2016-05-16', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
