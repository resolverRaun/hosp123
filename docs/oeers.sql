-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2015 at 09:25 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oeers`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant_pm_record`
--

CREATE TABLE IF NOT EXISTS `tbl_applicant_pm_record` (
`id` int(11) NOT NULL COMMENT 'Primary key for marks record bachelor',
  `physics_lg` char(1) NOT NULL DEFAULT '' COMMENT 'Applicants physics mark as grade ',
  `chemistry_lg` char(1) NOT NULL DEFAULT '' COMMENT 'Applicants chemistry mark as grade ',
  `biology_lg` char(1) NOT NULL DEFAULT '' COMMENT 'Applicants biology mark as grade ',
  `physics_marks` int(11) NOT NULL DEFAULT '0' COMMENT 'Applicants physics mark as number',
  `chemistry_marks` int(11) NOT NULL DEFAULT '0' COMMENT 'Applicants chemistry mark as number',
  `biology_marks` int(11) NOT NULL DEFAULT '0' COMMENT 'Applicants biology mark as number',
  `pcb_aggregate` int(11) NOT NULL DEFAULT '0' COMMENT 'Applicants pcb aggregate mark in percentage',
  `total_aggregate` int(11) NOT NULL DEFAULT '0' COMMENT 'Applicants total aggregate mark in percentage',
  `primary_level_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Applicants intermediate levels',
  `year_completed` date NOT NULL COMMENT 'Applicants intermediate year completed date',
  `applicant_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Applicant '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Records applicant intermediate preformance' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant_primary_academic`
--

CREATE TABLE IF NOT EXISTS `tbl_applicant_primary_academic` (
`id` int(11) NOT NULL COMMENT 'Primary key of primary academic',
  `institution_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Primary institution names of the applicants',
  `institution_address` varchar(255) NOT NULL DEFAULT '' COMMENT 'Primary institution address of the applicant',
  `date_attended` date NOT NULL COMMENT 'Date attended of the applicant',
  `applicant_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Applicant Id of the student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `id` int(11) NOT NULL COMMENT 'Primary key for the country table',
  `country_name` varchar(80) NOT NULL DEFAULT '' COMMENT 'Country of the applicant',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'State for country'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE IF NOT EXISTS `tbl_courses` (
`id` int(11) NOT NULL COMMENT 'Primary key for courses',
  `course_name` varchar(100) NOT NULL DEFAULT '' COMMENT 'Courses name',
  `graduation_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Graduation type (0 - Bachelor, 1 - Master)',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'state for courses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE IF NOT EXISTS `tbl_district` (
  `id` int(11) NOT NULL COMMENT 'Primary key for the district table',
  `district_name` varchar(80) NOT NULL DEFAULT '' COMMENT 'District of the applicant',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'State for district'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_info`
--

CREATE TABLE IF NOT EXISTS `tbl_personal_info` (
  `id` int(11) DEFAULT NULL COMMENT 'Primary key for student personal information table',
  `firstname` varchar(60) NOT NULL DEFAULT '' COMMENT 'Firstname of student',
  `lastname` varchar(60) NOT NULL DEFAULT '' COMMENT 'Lastname of student',
  `middlename` varchar(60) NOT NULL DEFAULT '' COMMENT 'Middlename of student',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Student gender (Male - 0  and Female - 1)',
  `dob` datetime NOT NULL COMMENT 'Date of birth of student',
  `town` varchar(60) NOT NULL DEFAULT '' COMMENT 'Applicant town name',
  `district_id` int(11) NOT NULL DEFAULT '0' COMMENT 'District of the applicant',
  `country_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Country of the applicant',
  `fathername` varchar(60) NOT NULL DEFAULT '' COMMENT 'Applicants father name',
  `mothername` varchar(60) NOT NULL DEFAULT '' COMMENT 'Applicants mother name',
  `guardian_name` varchar(60) NOT NULL DEFAULT '' COMMENT 'Applicant guardian name',
  `relationship` varchar(100) NOT NULL DEFAULT '' COMMENT 'Applicant relationship with guardian',
  `address_correspondence` varchar(100) NOT NULL DEFAULT '' COMMENT 'Applicant correspondence address',
  `phone_no` int(11) NOT NULL DEFAULT '0' COMMENT 'Residence number of the applicant',
  `mobile_no` int(11) NOT NULL DEFAULT '0' COMMENT 'Mobile number of the applicant',
  `permanent_address` varchar(60) NOT NULL DEFAULT '' COMMENT 'Applicants permanent address',
  `citizenship_no` varchar(60) NOT NULL DEFAULT '' COMMENT 'Citizenship no of the applicant'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prev_ku_course`
--

CREATE TABLE IF NOT EXISTS `tbl_prev_ku_course` (
  `id` int(11) NOT NULL COMMENT 'Primary key for the previous ku course of applicants',
  `prev_course_applicant` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Applicant Taken Course (0 - Yes , 1 - No)',
  `course` varchar(255) NOT NULL DEFAULT '' COMMENT 'Previous KU course done by the applicant',
  `registration_no` int(11) NOT NULL DEFAULT '0' COMMENT 'Previous KU registration number of the applicant',
  `applicant_id` int(11) NOT NULL COMMENT 'Id of the applicant'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Applicants previously involved in KU courses';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_primary_levels`
--

CREATE TABLE IF NOT EXISTS `tbl_primary_levels` (
`id` int(11) NOT NULL COMMENT 'Primary key of primary academic',
  `primary_level_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Primary level names of the educations',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'State of the primary education levels'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicant_pm_record`
--
ALTER TABLE `tbl_applicant_pm_record`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_applicant_primary_academic`
--
ALTER TABLE `tbl_applicant_primary_academic`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_primary_levels`
--
ALTER TABLE `tbl_primary_levels`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_applicant_pm_record`
--
ALTER TABLE `tbl_applicant_pm_record`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for marks record bachelor';
--
-- AUTO_INCREMENT for table `tbl_applicant_primary_academic`
--
ALTER TABLE `tbl_applicant_primary_academic`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key of primary academic';
--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for courses';
--
-- AUTO_INCREMENT for table `tbl_primary_levels`
--
ALTER TABLE `tbl_primary_levels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key of primary academic';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
