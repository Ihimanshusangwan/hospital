-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 07:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merge`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_maternity`
--

CREATE TABLE `acc_maternity` (
  `id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `temp` varchar(300) DEFAULT NULL,
  `pulse` varchar(300) DEFAULT NULL,
  `bp` varchar(300) DEFAULT NULL,
  `spo` varchar(300) DEFAULT NULL,
  `time2` time DEFAULT NULL,
  `fluid` text DEFAULT NULL,
  `oral` text DEFAULT NULL,
  `intake` text DEFAULT NULL,
  `urine_output` varchar(700) DEFAULT NULL,
  `others` varchar(700) DEFAULT NULL,
  `total_output` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acq`
--

CREATE TABLE `acq` (
  `acqa` varchar(3000) NOT NULL,
  `acqb` varchar(3000) NOT NULL,
  `acqc` varchar(3000) NOT NULL,
  `acqd` varchar(3000) NOT NULL,
  `id` int(11) NOT NULL,
  `ward_sign` text NOT NULL,
  `icu_sign` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_invest_imaging`
--

CREATE TABLE `add_invest_imaging` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `dr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_register`
--

CREATE TABLE `ambulance_register` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ambulance_no` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `relative_name` text DEFAULT NULL,
  `place` text DEFAULT NULL,
  `distace_coverd` text DEFAULT NULL,
  `meter_reading` text DEFAULT NULL,
  `driver_sign` text DEFAULT NULL,
  `time` time DEFAULT NULL,
  `receipt_no` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ana`
--

CREATE TABLE `ana` (
  `ana` varchar(2200) NOT NULL,
  `inv` varchar(2200) NOT NULL,
  `icu` varchar(2200) NOT NULL,
  `pat` varchar(2200) NOT NULL,
  `dis` varchar(2200) NOT NULL,
  `dis1` varchar(2200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anesthesia_consent`
--

CREATE TABLE `anesthesia_consent` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name_1` text DEFAULT NULL,
  `name_2` text DEFAULT NULL,
  `name_3` text DEFAULT NULL,
  `name_4` text DEFAULT NULL,
  `name_5` text DEFAULT NULL,
  `sign_1` text DEFAULT NULL,
  `sign_2` text DEFAULT NULL,
  `sign_3` text DEFAULT NULL,
  `sign_4` text DEFAULT NULL,
  `sign_5` text DEFAULT NULL,
  `date_1` date DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `time_1` time DEFAULT NULL,
  `time_2` time DEFAULT NULL,
  `time_3` time DEFAULT NULL,
  `time_4` time DEFAULT NULL,
  `time_5` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anes_reco`
--

CREATE TABLE `anes_reco` (
  `id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `e` varchar(500) NOT NULL,
  `f` varchar(500) NOT NULL,
  `g` varchar(500) NOT NULL,
  `h` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anumati_consent`
--

CREATE TABLE `anumati_consent` (
  `id` int(11) NOT NULL,
  `a` text DEFAULT NULL,
  `b` text DEFAULT NULL,
  `c` text DEFAULT NULL,
  `d` text DEFAULT NULL,
  `e` date DEFAULT NULL,
  `f` text DEFAULT NULL,
  `g` text DEFAULT NULL,
  `h` text DEFAULT NULL,
  `i` date DEFAULT NULL,
  `j` text DEFAULT NULL,
  `k` text DEFAULT NULL,
  `l` date DEFAULT NULL,
  `m` text DEFAULT NULL,
  `sahi1` text DEFAULT NULL,
  `sahi2` text DEFAULT NULL,
  `sahi3` text DEFAULT NULL,
  `name1` varchar(255) DEFAULT NULL,
  `name2` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `add1` text DEFAULT NULL,
  `add2` text DEFAULT NULL,
  `add3` text DEFAULT NULL,
  `vay1` varchar(200) DEFAULT NULL,
  `vay2` varchar(200) DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `an_record`
--

CREATE TABLE `an_record` (
  `id` int(11) NOT NULL,
  `asa` varchar(500) NOT NULL,
  `complaint` text NOT NULL,
  `history` text NOT NULL,
  `other_his` text NOT NULL,
  `nbm` text NOT NULL,
  `inve` text NOT NULL,
  `exam` text NOT NULL,
  `hb` text NOT NULL,
  `pulse` varchar(500) NOT NULL,
  `urine` varchar(500) NOT NULL,
  `bp` varchar(300) NOT NULL,
  `bsl` varchar(300) NOT NULL,
  `cvs` varchar(500) NOT NULL,
  `bul` varchar(500) NOT NULL,
  `rs` varchar(500) NOT NULL,
  `s` varchar(500) NOT NULL,
  `other` varchar(500) NOT NULL,
  `xray` varchar(500) NOT NULL,
  `consent` varchar(500) NOT NULL,
  `ecg` varchar(500) NOT NULL,
  `fitness` varchar(500) NOT NULL,
  `o` varchar(500) NOT NULL,
  `premed` text NOT NULL,
  `type` varchar(500) NOT NULL,
  `induction` text NOT NULL,
  `spinal` text NOT NULL,
  `muscle` text NOT NULL,
  `atlevel` varchar(500) NOT NULL,
  `w` varchar(500) NOT NULL,
  `intu` varchar(500) NOT NULL,
  `needle` varchar(500) NOT NULL,
  `withco` varchar(500) NOT NULL,
  `agent` varchar(500) NOT NULL,
  `catheter` varchar(500) NOT NULL,
  `withcat` varchar(500) NOT NULL,
  `typeres` text NOT NULL,
  `drug` text NOT NULL,
  `an` text NOT NULL,
  `ex` text NOT NULL,
  `resp` varchar(500) NOT NULL,
  `postop` text NOT NULL,
  `nb` text NOT NULL,
  `ivf` text NOT NULL,
  `sign` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_register`
--

CREATE TABLE `appointment_register` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_no` text DEFAULT NULL,
  `time` time DEFAULT NULL,
  `appointment` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `doctor` text DEFAULT NULL,
  `refer_by` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ap_for_document`
--

CREATE TABLE `ap_for_document` (
  `id` int(11) NOT NULL,
  `date_h` text DEFAULT NULL,
  `patient` text DEFAULT NULL,
  `uhid` text DEFAULT NULL,
  `ipd` text DEFAULT NULL,
  `mala` text DEFAULT NULL,
  `sathi` text DEFAULT NULL,
  `vinti` text DEFAULT NULL,
  `add_date` date DEFAULT NULL,
  `dis_date` text DEFAULT NULL,
  `d_name` text DEFAULT NULL,
  `p_name` text DEFAULT NULL,
  `relation` text DEFAULT NULL,
  `applicant` text DEFAULT NULL,
  `office_re` text DEFAULT NULL,
  `agree` text DEFAULT NULL,
  `aprove_dr` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `doc_recive` text DEFAULT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `audio_name` text NOT NULL,
  `audio_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birth`
--

CREATE TABLE `birth` (
  `id` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `dr` varchar(2200) NOT NULL,
  `nur` varchar(2200) NOT NULL,
  `blooa` varchar(2200) NOT NULL,
  `bloob` varchar(2200) NOT NULL,
  `id` int(11) NOT NULL,
  `cros` varchar(100) NOT NULL,
  `trans` varchar(100) NOT NULL,
  `new` text DEFAULT NULL,
  `a` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_audit_sheet`
--

CREATE TABLE `case_audit_sheet` (
  `id` int(11) NOT NULL,
  `dischage_date` date DEFAULT NULL,
  `audit_date` date DEFAULT NULL,
  `yes_no` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cc_glass_rx`
--

CREATE TABLE `cc_glass_rx` (
  `id` int(11) NOT NULL,
  `dist_input_1` text DEFAULT NULL,
  `dist_input_2` text DEFAULT NULL,
  `dist_input_3` text DEFAULT NULL,
  `dist_input_4` text DEFAULT NULL,
  `dist_input_5` text DEFAULT NULL,
  `dist_input_6` text DEFAULT NULL,
  `dist_input_7` text DEFAULT NULL,
  `dist_input_8` text DEFAULT NULL,
  `near_input_1` text DEFAULT NULL,
  `near_input_2` text DEFAULT NULL,
  `near_input_3` text DEFAULT NULL,
  `near_input_4` text DEFAULT NULL,
  `near_input_5` text DEFAULT NULL,
  `near_input_6` text DEFAULT NULL,
  `near_input_7` text DEFAULT NULL,
  `near_input_8` text DEFAULT NULL,
  `be_add` text DEFAULT NULL,
  `re` text DEFAULT NULL,
  `le_add` text DEFAULT NULL,
  `glass_type` text DEFAULT NULL,
  `glass_colour` text DEFAULT NULL,
  `glass_use` text DEFAULT NULL,
  `pd` text DEFAULT NULL,
  `fees` text NOT NULL,
  `visit_no` text NOT NULL,
  `complaints` text DEFAULT NULL,
  `past_his` text DEFAULT NULL,
  `advice` text NOT NULL,
  `fer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cc_glass_rx1`
--

CREATE TABLE `cc_glass_rx1` (
  `id` int(11) NOT NULL,
  `dist1_input_1` text DEFAULT NULL,
  `dist1_input_2` text DEFAULT NULL,
  `dist1_input_3` text DEFAULT NULL,
  `dist1_input_4` text DEFAULT NULL,
  `dist1_input_5` text DEFAULT NULL,
  `dist1_input_6` text DEFAULT NULL,
  `dist1_input_7` text DEFAULT NULL,
  `dist1_input_8` text DEFAULT NULL,
  `near1_input_1` text DEFAULT NULL,
  `near1_input_2` text DEFAULT NULL,
  `near1_input_3` text DEFAULT NULL,
  `near1_input_4` text DEFAULT NULL,
  `near1_input_5` text DEFAULT NULL,
  `near1_input_6` text DEFAULT NULL,
  `near1_input_7` text DEFAULT NULL,
  `near1_input_8` text DEFAULT NULL,
  `be1_add` text DEFAULT NULL,
  `re1` text DEFAULT NULL,
  `le1_add` text DEFAULT NULL,
  `glass1_type` text DEFAULT NULL,
  `glass1_colour` text DEFAULT NULL,
  `glass1_use` text DEFAULT NULL,
  `pd1` text DEFAULT NULL,
  `dist2_input_1` text DEFAULT NULL,
  `dist2_input_2` text DEFAULT NULL,
  `dist2_input_3` text DEFAULT NULL,
  `dist2_input_4` text DEFAULT NULL,
  `dist2_input_5` text DEFAULT NULL,
  `dist2_input_6` text DEFAULT NULL,
  `dist2_input_7` text DEFAULT NULL,
  `dist2_input_8` text DEFAULT NULL,
  `near2_input_1` text DEFAULT NULL,
  `near2_input_2` text DEFAULT NULL,
  `near2_input_3` text DEFAULT NULL,
  `near2_input_4` text DEFAULT NULL,
  `near2_input_5` text DEFAULT NULL,
  `near2_input_6` text DEFAULT NULL,
  `near2_input_7` text DEFAULT NULL,
  `near2_input_8` text DEFAULT NULL,
  `be2_add` text DEFAULT NULL,
  `re2` text DEFAULT NULL,
  `le2_add` text DEFAULT NULL,
  `glass2_type` text DEFAULT NULL,
  `glass2_colour` text DEFAULT NULL,
  `glass2_use` text DEFAULT NULL,
  `pd2` text DEFAULT NULL,
  `dist3_input_1` text DEFAULT NULL,
  `dist3_input_2` text DEFAULT NULL,
  `dist3_input_3` text DEFAULT NULL,
  `dist3_input_4` text DEFAULT NULL,
  `dist3_input_5` text DEFAULT NULL,
  `dist3_input_6` text DEFAULT NULL,
  `dist3_input_7` text DEFAULT NULL,
  `dist3_input_8` text DEFAULT NULL,
  `near3_input_1` text DEFAULT NULL,
  `near3_input_2` text DEFAULT NULL,
  `near3_input_3` text DEFAULT NULL,
  `near3_input_4` text DEFAULT NULL,
  `near3_input_5` text DEFAULT NULL,
  `near3_input_6` text DEFAULT NULL,
  `near3_input_7` text DEFAULT NULL,
  `near3_input_8` text DEFAULT NULL,
  `be3_add` text DEFAULT NULL,
  `re3` text DEFAULT NULL,
  `le3_add` text DEFAULT NULL,
  `glass3_type` text DEFAULT NULL,
  `glass3_colour` text DEFAULT NULL,
  `glass3_use` text DEFAULT NULL,
  `pd3` text DEFAULT NULL,
  `dist4_input_1` text DEFAULT NULL,
  `dist4_input_2` text DEFAULT NULL,
  `dist4_input_3` text DEFAULT NULL,
  `dist4_input_4` text DEFAULT NULL,
  `dist4_input_5` text DEFAULT NULL,
  `dist4_input_6` text DEFAULT NULL,
  `dist4_input_7` text DEFAULT NULL,
  `dist4_input_8` text DEFAULT NULL,
  `near4_input_1` text DEFAULT NULL,
  `near4_input_2` text DEFAULT NULL,
  `near4_input_3` text DEFAULT NULL,
  `near4_input_4` text DEFAULT NULL,
  `near4_input_5` text DEFAULT NULL,
  `near4_input_6` text DEFAULT NULL,
  `near4_input_7` text DEFAULT NULL,
  `near4_input_8` text DEFAULT NULL,
  `be4_add` text DEFAULT NULL,
  `re4` text DEFAULT NULL,
  `le4_add` text DEFAULT NULL,
  `glass4_type` text DEFAULT NULL,
  `glass4_colour` text DEFAULT NULL,
  `glass4_use` text DEFAULT NULL,
  `pd4` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_label`
--

CREATE TABLE `change_label` (
  `id` int(11) NOT NULL,
  `lable_1` text DEFAULT NULL,
  `auto_reload` int(11) NOT NULL,
  `pre_barcode` longblob NOT NULL,
  `pre_bottom` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_rate`
--

CREATE TABLE `change_rate` (
  `id` int(11) NOT NULL,
  `inp` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`inp`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chief_complaints`
--

CREATE TABLE `chief_complaints` (
  `id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `complaints` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config_print`
--

CREATE TABLE `config_print` (
  `id` int(11) NOT NULL,
  `inp` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`inp`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cont`
--

CREATE TABLE `cont` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `treat` varchar(50) DEFAULT NULL,
  `sign` varchar(500) NOT NULL,
  `pulse` varchar(100) NOT NULL,
  `temp` varchar(100) NOT NULL,
  `bp` varchar(100) NOT NULL,
  `sp` varchar(100) NOT NULL,
  `pa` varchar(100) NOT NULL,
  `cns` varchar(100) NOT NULL,
  `bb` varchar(100) NOT NULL,
  `dmtb` varchar(100) NOT NULL,
  `resp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cor1`
--

CREATE TABLE `cor1` (
  `id` int(11) NOT NULL,
  `sur` varchar(100) DEFAULT NULL,
  `ass` varchar(100) DEFAULT NULL,
  `nurse` varchar(100) DEFAULT NULL,
  `hca` varchar(100) DEFAULT NULL,
  `visit` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `s_time` time DEFAULT NULL,
  `e_time` time DEFAULT NULL,
  `proc` varchar(2200) DEFAULT NULL,
  `ana` varchar(100) DEFAULT NULL,
  `com` varchar(100) DEFAULT NULL,
  `refer` varchar(100) DEFAULT NULL,
  `eye` varchar(100) DEFAULT NULL,
  `ot` varchar(100) DEFAULT NULL,
  `case_no` varchar(100) DEFAULT NULL,
  `emr` varchar(100) DEFAULT NULL,
  `mpm` varchar(100) DEFAULT NULL,
  `o2` varchar(100) DEFAULT NULL,
  `la` varchar(100) DEFAULT NULL,
  `yes` varchar(100) DEFAULT NULL,
  `lig` varchar(100) DEFAULT NULL,
  `ml` varchar(100) DEFAULT NULL,
  `con` varchar(100) DEFAULT NULL,
  `beta` varchar(100) DEFAULT NULL,
  `description` varchar(7000) NOT NULL,
  `pos` varchar(100) NOT NULL,
  `inc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cor2`
--

CREATE TABLE `cor2` (
  `id` int(11) NOT NULL,
  `eye` varchar(100) DEFAULT NULL,
  `dress` varchar(100) DEFAULT NULL,
  `perib` varchar(100) DEFAULT NULL,
  `dress_beta` varchar(100) DEFAULT NULL,
  `eye1` varchar(100) DEFAULT NULL,
  `pte` varchar(100) DEFAULT NULL,
  `mild` varchar(100) DEFAULT NULL,
  `cor` varchar(100) DEFAULT NULL,
  `amm` varchar(100) DEFAULT NULL,
  `eye2` varchar(100) DEFAULT NULL,
  `beta_eye` varchar(100) DEFAULT NULL,
  `eye3` varchar(100) DEFAULT NULL,
  `surgery` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counsel`
--

CREATE TABLE `counsel` (
  `treat` varchar(100) NOT NULL,
  `vital` varchar(2200) DEFAULT NULL,
  `copy` varchar(100) NOT NULL,
  `attach` varchar(2200) NOT NULL,
  `transfer` varchar(2200) NOT NULL,
  `conset` varchar(2200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselling_consent`
--

CREATE TABLE `counselling_consent` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `a` varchar(500) DEFAULT NULL,
  `b` varchar(500) DEFAULT NULL,
  `c` varchar(500) DEFAULT NULL,
  `d` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dama_dis`
--

CREATE TABLE `dama_dis` (
  `id` int(11) NOT NULL,
  `discharge` varchar(30) DEFAULT NULL,
  `dama` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dis` varchar(20) DEFAULT NULL,
  `medradio` varchar(20) DEFAULT NULL,
  `genradio` varchar(20) DEFAULT NULL,
  `dietradio` varchar(20) DEFAULT NULL,
  `phyradio` varchar(20) DEFAULT NULL,
  `transradio` varchar(20) DEFAULT NULL,
  `reqradio` varchar(20) DEFAULT NULL,
  `ifradio` varchar(20) DEFAULT NULL,
  `discu` varchar(20) DEFAULT NULL,
  `lan` varchar(400) DEFAULT NULL,
  `aradio` varchar(20) DEFAULT NULL,
  `bradio` varchar(20) DEFAULT NULL,
  `cradio` varchar(20) DEFAULT NULL,
  `dradio` varchar(20) DEFAULT NULL,
  `eradio` varchar(20) DEFAULT NULL,
  `yradio` varchar(20) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `sis` varchar(100) DEFAULT NULL,
  `doc1` varchar(100) DEFAULT NULL,
  `sis2` varchar(100) DEFAULT NULL,
  `doc2` varchar(100) DEFAULT NULL,
  `medside` varchar(20) DEFAULT NULL,
  `rel` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `reg` text DEFAULT NULL,
  `addmission` datetime DEFAULT NULL,
  `discharge` datetime DEFAULT NULL,
  `name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `husband` text DEFAULT NULL,
  `age` text DEFAULT NULL,
  `male` text DEFAULT NULL,
  `female` text DEFAULT NULL,
  `abortion` text DEFAULT NULL,
  `child_date` date DEFAULT NULL,
  `child_time` time DEFAULT NULL,
  `child_day` text DEFAULT NULL,
  `oe` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `blood` text DEFAULT NULL,
  `score` text DEFAULT NULL,
  `form` text DEFAULT NULL,
  `form_date` date DEFAULT NULL,
  `religion` text DEFAULT NULL,
  `child_sex` text NOT NULL,
  `child_weight` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_notes`
--

CREATE TABLE `delivery_notes` (
  `id` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discharge`
--

CREATE TABLE `discharge` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `mlc` varchar(50) DEFAULT NULL,
  `mi` varchar(50) DEFAULT NULL,
  `pd` varchar(2200) DEFAULT NULL,
  `history` varchar(2200) DEFAULT NULL,
  `exam` varchar(2200) DEFAULT NULL,
  `treat` varchar(2200) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `follow` varchar(2200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discharge_dama_consent`
--

CREATE TABLE `discharge_dama_consent` (
  `id` int(11) NOT NULL,
  `input_1` text DEFAULT NULL,
  `input_2` text DEFAULT NULL,
  `input_3` text DEFAULT NULL,
  `input_4` text DEFAULT NULL,
  `input_5` text DEFAULT NULL,
  `input_6` text DEFAULT NULL,
  `input_7` text DEFAULT NULL,
  `input_8` text DEFAULT NULL,
  `other` text DEFAULT NULL,
  `check_1` text DEFAULT NULL,
  `check_2` text DEFAULT NULL,
  `check_3` text DEFAULT NULL,
  `check_4` text DEFAULT NULL,
  `check_5` text DEFAULT NULL,
  `p_sign` text DEFAULT NULL,
  `p_time` text DEFAULT NULL,
  `wit_name` text DEFAULT NULL,
  `wit_details` text DEFAULT NULL,
  `wit_rel` text DEFAULT NULL,
  `wit_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discharge_file_register`
--

CREATE TABLE `discharge_file_register` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `uhid` text DEFAULT NULL,
  `ipd` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `date_of_discharge` date DEFAULT NULL,
  `bill_amount` text DEFAULT NULL,
  `file_receive_by` text DEFAULT NULL,
  `file_received` text DEFAULT NULL,
  `receive_type` text DEFAULT NULL,
  `receive_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discharge_routine_register`
--

CREATE TABLE `discharge_routine_register` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `uhid` text DEFAULT NULL,
  `ipd` text DEFAULT NULL,
  `discharge` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `digonsis` text DEFAULT NULL,
  `date_of_addmission` date DEFAULT NULL,
  `date_of_discharge` date DEFAULT NULL,
  `icd_no` text DEFAULT NULL,
  `dama` text DEFAULT NULL,
  `refer` text DEFAULT NULL,
  `death` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `sign` text DEFAULT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discharge_sum`
--

CREATE TABLE `discharge_sum` (
  `id` int(11) NOT NULL,
  `pt_id` int(11) DEFAULT NULL,
  `a` varchar(800) DEFAULT NULL,
  `b` varchar(800) DEFAULT NULL,
  `c` varchar(800) DEFAULT NULL,
  `d` varchar(800) DEFAULT NULL,
  `e` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dis_sum`
--

CREATE TABLE `dis_sum` (
  `id` int(11) NOT NULL,
  `date_dis` date DEFAULT NULL,
  `time_dis` time DEFAULT NULL,
  `type` text DEFAULT NULL,
  `cc` varchar(200) DEFAULT NULL,
  `pulse` varchar(200) DEFAULT NULL,
  `bp` varchar(200) DEFAULT NULL,
  `spo` varchar(200) DEFAULT NULL,
  `height` varchar(200) DEFAULT NULL,
  `weight` varchar(200) DEFAULT NULL,
  `rs` varchar(400) DEFAULT NULL,
  `cvs` varchar(400) DEFAULT NULL,
  `cns` varchar(500) DEFAULT NULL,
  `abdomen` varchar(500) DEFAULT NULL,
  `treatment` text DEFAULT NULL,
  `date_s` date DEFAULT NULL,
  `surgery` text DEFAULT NULL,
  `surgeon` varchar(300) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `an` text DEFAULT NULL,
  `anesthesia` text DEFAULT NULL,
  `del_notes` text DEFAULT NULL,
  `del_dt` varchar(400) DEFAULT NULL,
  `co` text DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `final` text DEFAULT NULL,
  `special` text DEFAULT NULL,
  `advice` text DEFAULT NULL,
  `follow` date DEFAULT NULL,
  `emer` text DEFAULT NULL,
  `sign` text DEFAULT NULL,
  `incharge` varchar(300) DEFAULT NULL,
  `sis` varchar(300) DEFAULT NULL,
  `rmo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `taluka` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('Male','Female','Others') NOT NULL,
  `dob` date NOT NULL,
  `reg_date` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type_of_visit` varchar(50) NOT NULL,
  `signature` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_initail_assesment`
--

CREATE TABLE `doctor_initail_assesment` (
  `id` int(11) NOT NULL,
  `contact_no` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `reimbursement` text DEFAULT NULL,
  `occupation` text DEFAULT NULL,
  `weight` text DEFAULT NULL,
  `omlic_number` int(11) DEFAULT NULL,
  `incharge_doctor` text DEFAULT NULL,
  `provisional_diagnosis` text DEFAULT NULL,
  `final_diagnosis` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `obstetric-history` text DEFAULT NULL,
  `discharge` text DEFAULT NULL,
  `menarche` text DEFAULT NULL,
  `LMP` text DEFAULT NULL,
  `Para` text DEFAULT NULL,
  `Gavdia` text DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `family-history` text DEFAULT NULL,
  `operation-accidents` text DEFAULT NULL,
  `education-status` text DEFAULT NULL,
  `history` text DEFAULT NULL,
  `duration` text DEFAULT NULL,
  `presenting-complaint` text DEFAULT NULL,
  `build` text DEFAULT NULL,
  `anemia` text DEFAULT NULL,
  `edema` text DEFAULT NULL,
  `rr` text DEFAULT NULL,
  `cyanosis` text DEFAULT NULL,
  `bp` text DEFAULT NULL,
  `lcterus` text DEFAULT NULL,
  `pulse` text DEFAULT NULL,
  `th` text DEFAULT NULL,
  `ot` text DEFAULT NULL,
  `weight1` text DEFAULT NULL,
  `jvp` text DEFAULT NULL,
  `skin` text DEFAULT NULL,
  `rs` text DEFAULT NULL,
  `cvs` text DEFAULT NULL,
  `cns` text DEFAULT NULL,
  `pa` text DEFAULT NULL,
  `provisional-diagnosis1` text DEFAULT NULL,
  `differential-diagnosis1` text DEFAULT NULL,
  `submit_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_inpatient`
--

CREATE TABLE `doctor_inpatient` (
  `id` int(11) NOT NULL,
  `copain` varchar(1000) DEFAULT NULL,
  `nolpv` varchar(1000) DEFAULT NULL,
  `lmp` varchar(1000) DEFAULT NULL,
  `ga` varchar(1000) DEFAULT NULL,
  `edd` varchar(1000) DEFAULT NULL,
  `dysmenorrhea` varchar(1000) DEFAULT NULL,
  `bp` varchar(200) DEFAULT NULL,
  `spo2` varchar(200) DEFAULT NULL,
  `height` varchar(200) DEFAULT NULL,
  `weight` varchar(200) DEFAULT NULL,
  `resp` varchar(200) DEFAULT NULL,
  `cardio` varchar(700) DEFAULT NULL,
  `cns` varchar(700) DEFAULT NULL,
  `abdomen` varchar(700) DEFAULT NULL,
  `radiology` varchar(600) DEFAULT NULL,
  `pathology` varchar(600) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `plan` varchar(1000) DEFAULT NULL,
  `pulse` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_round_register`
--

CREATE TABLE `doctor_round_register` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name1` text DEFAULT NULL,
  `name2` text DEFAULT NULL,
  `sign1` text DEFAULT NULL,
  `sign2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drug_administration`
--

CREATE TABLE `drug_administration` (
  `id` int(100) NOT NULL,
  `table_time` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `table_date` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `drug_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `frequency` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `table_sign` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dosage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `signature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drug_reaction_record`
--

CREATE TABLE `drug_reaction_record` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `uhid` text DEFAULT NULL,
  `ipd` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `type_of_drug` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `ward` text DEFAULT NULL,
  `sign_of_mdms` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dr_images`
--

CREATE TABLE `dr_images` (
  `id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `img_add` varchar(250) NOT NULL,
  `img_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `examination` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eye_pre_op_checklist`
--

CREATE TABLE `eye_pre_op_checklist` (
  `patient_id` int(11) NOT NULL,
  `eye` varchar(10) DEFAULT NULL,
  `reporting_time` varchar(255) DEFAULT NULL,
  `instruction_from_ot` varchar(255) DEFAULT NULL,
  `si_no` varchar(255) DEFAULT NULL,
  `proposed_discharge_time` datetime DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `icu_in_time` time DEFAULT NULL,
  `icu_out_time` time DEFAULT NULL,
  `ot_in_time` time DEFAULT NULL,
  `ot_out_time` time DEFAULT NULL,
  `discharge_time` time DEFAULT NULL,
  `description` text DEFAULT NULL,
  `emr` text NOT NULL,
  `surgeon` text NOT NULL,
  `proc` text NOT NULL,
  `ward_sign` text NOT NULL,
  `icu_sign` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdata`
--

CREATE TABLE `fdata` (
  `id` int(11) NOT NULL,
  `opd` varchar(255) NOT NULL,
  `date0` varchar(100) NOT NULL,
  `time0` varchar(6) NOT NULL,
  `relative` varchar(400) NOT NULL,
  `emergency` varchar(50) NOT NULL,
  `modeofarr` varchar(50) NOT NULL,
  `allergic` varchar(50) NOT NULL,
  `descallergy` varchar(400) NOT NULL,
  `complaints` varchar(300) NOT NULL,
  `timevs` varchar(400) NOT NULL,
  `tempvs` varchar(500) NOT NULL,
  `bpvs` varchar(500) NOT NULL,
  `respvs` varchar(500) NOT NULL,
  `hrvs` varchar(500) NOT NULL,
  `spovs` varchar(500) NOT NULL,
  `bslvs` varchar(500) NOT NULL,
  `mass` varchar(400) NOT NULL,
  `triage` varchar(255) NOT NULL,
  `past` varchar(1000) NOT NULL,
  `labreports` varchar(1000) NOT NULL,
  `phyexam` varchar(1000) NOT NULL,
  `head` varchar(255) NOT NULL,
  `heart` varchar(255) NOT NULL,
  `chest` varchar(255) NOT NULL,
  `abdomen` varchar(255) NOT NULL,
  `spine` varchar(255) NOT NULL,
  `neuroexam` varchar(255) NOT NULL,
  `anyother` varchar(255) NOT NULL,
  `pain` varchar(50) NOT NULL,
  `vascale` int(11) NOT NULL,
  `nopain` varchar(50) NOT NULL,
  `worstpain` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `characterlbr` varchar(100) NOT NULL,
  `aggfactor` varchar(500) NOT NULL,
  `relivfactor` varchar(100) NOT NULL,
  `treatment` varchar(500) NOT NULL,
  `proceduregiven` varchar(500) NOT NULL,
  `provisional` varchar(500) NOT NULL,
  `advice` varchar(500) NOT NULL,
  `discharge` varchar(100) NOT NULL,
  `timecomp` varchar(6) NOT NULL,
  `phyname` varchar(100) NOT NULL,
  `nursesname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_english`
--

CREATE TABLE `feedback_english` (
  `id` int(11) NOT NULL,
  `r_1` text DEFAULT NULL,
  `r_2` text DEFAULT NULL,
  `r_3` text DEFAULT NULL,
  `r_4` text DEFAULT NULL,
  `r_5` text DEFAULT NULL,
  `r_6` text DEFAULT NULL,
  `r_7` text DEFAULT NULL,
  `r_8` text DEFAULT NULL,
  `r_9` text DEFAULT NULL,
  `r_10` text DEFAULT NULL,
  `r_11` date DEFAULT NULL,
  `r_12` text DEFAULT NULL,
  `r_13` text DEFAULT NULL,
  `r_14` text DEFAULT NULL,
  `r_15` text DEFAULT NULL,
  `r_16` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_marthi`
--

CREATE TABLE `feedback_marthi` (
  `id` int(11) NOT NULL,
  `r_1` text DEFAULT NULL,
  `r_2` text DEFAULT NULL,
  `r_3` text DEFAULT NULL,
  `r_4` text DEFAULT NULL,
  `r_5` text DEFAULT NULL,
  `r_6` text DEFAULT NULL,
  `r_7` text DEFAULT NULL,
  `r_8` text DEFAULT NULL,
  `r_9` text DEFAULT NULL,
  `r_10` text DEFAULT NULL,
  `r_11` date DEFAULT NULL,
  `r_12` text DEFAULT NULL,
  `r_13` text DEFAULT NULL,
  `r_14` text DEFAULT NULL,
  `r_15` text DEFAULT NULL,
  `r_16` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `floor_cleaning`
--

CREATE TABLE `floor_cleaning` (
  `id` int(11) NOT NULL,
  `location` text DEFAULT NULL,
  `month` varchar(50) NOT NULL,
  `yes_no` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`yes_no`)),
  `remark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fumigation`
--

CREATE TABLE `fumigation` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `ot` varchar(255) DEFAULT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `s_time` time DEFAULT NULL,
  `s_sign` varchar(255) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `f_time` time DEFAULT NULL,
  `f_sign` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_consent`
--

CREATE TABLE `general_consent` (
  `id` int(11) NOT NULL,
  `name_1` text DEFAULT NULL,
  `name_2` text DEFAULT NULL,
  `name_3` text DEFAULT NULL,
  `name_4` text DEFAULT NULL,
  `name_5` text DEFAULT NULL,
  `sign_1` text DEFAULT NULL,
  `sign_2` text DEFAULT NULL,
  `sign_3` text DEFAULT NULL,
  `sign_4` text DEFAULT NULL,
  `sign_5` text DEFAULT NULL,
  `date_1` date DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `time_1` time DEFAULT NULL,
  `time_2` time DEFAULT NULL,
  `time_3` time DEFAULT NULL,
  `time_4` time DEFAULT NULL,
  `time_5` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_info_consent`
--

CREATE TABLE `general_info_consent` (
  `id` int(11) NOT NULL,
  `sign1` text DEFAULT NULL,
  `sign2` text DEFAULT NULL,
  `sign3` text DEFAULT NULL,
  `sign4` text DEFAULT NULL,
  `name1` varchar(400) DEFAULT NULL,
  `name2` varchar(400) DEFAULT NULL,
  `name3` varchar(400) DEFAULT NULL,
  `name4` varchar(400) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `date3` date DEFAULT NULL,
  `date4` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gynec_discharge`
--

CREATE TABLE `gynec_discharge` (
  `id` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handover`
--

CREATE TABLE `handover` (
  `id` int(11) NOT NULL,
  `element1` varchar(500) DEFAULT NULL,
  `element2` varchar(500) DEFAULT NULL,
  `element3` varchar(500) DEFAULT NULL,
  `transfer` varchar(200) NOT NULL,
  `recipient` varchar(200) NOT NULL,
  `nurse` varchar(400) NOT NULL,
  `wit1` varchar(400) NOT NULL,
  `rel` varchar(400) NOT NULL,
  `wit2` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `highrisk_consent`
--

CREATE TABLE `highrisk_consent` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name_1` text DEFAULT NULL,
  `name_2` text DEFAULT NULL,
  `name_3` text DEFAULT NULL,
  `name_4` text DEFAULT NULL,
  `name_5` text DEFAULT NULL,
  `sign_1` text DEFAULT NULL,
  `sign_2` text DEFAULT NULL,
  `sign_3` text DEFAULT NULL,
  `sign_4` text DEFAULT NULL,
  `sign_5` text DEFAULT NULL,
  `date_1` date DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `time_1` time DEFAULT NULL,
  `time_2` time DEFAULT NULL,
  `time_3` time DEFAULT NULL,
  `time_4` time DEFAULT NULL,
  `time_5` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histopath`
--

CREATE TABLE `histopath` (
  `id` int(11) NOT NULL,
  `specimen` varchar(100) NOT NULL,
  `clinical` varchar(300) NOT NULL,
  `exam` varchar(500) NOT NULL,
  `investi` varchar(500) NOT NULL,
  `imaging` varchar(500) NOT NULL,
  `diagno` varchar(500) NOT NULL,
  `ref` varchar(500) NOT NULL,
  `opnote` varchar(400) NOT NULL,
  `refered` varchar(100) NOT NULL,
  `rcontainer` varchar(50) NOT NULL,
  `relative` varchar(50) NOT NULL,
  `relsign` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hiv_consent`
--

CREATE TABLE `hiv_consent` (
  `id` int(11) NOT NULL,
  `sahi1` text DEFAULT NULL,
  `sahi2` text DEFAULT NULL,
  `sahi3` text DEFAULT NULL,
  `name1` varchar(400) DEFAULT NULL,
  `name2` varchar(400) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `add1` text DEFAULT NULL,
  `add2` text DEFAULT NULL,
  `add3` text DEFAULT NULL,
  `vay1` varchar(400) DEFAULT NULL,
  `vay2` varchar(400) DEFAULT NULL,
  `varsh1` varchar(400) DEFAULT NULL,
  `varsh2` varchar(400) DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `im_reval`
--

CREATE TABLE `im_reval` (
  `id` int(11) NOT NULL,
  `t` varchar(500) DEFAULT NULL,
  `bp` varchar(500) DEFAULT NULL,
  `p` varchar(500) DEFAULT NULL,
  `r` varchar(500) DEFAULT NULL,
  `osat` varchar(500) DEFAULT NULL,
  `fbs` varchar(500) DEFAULT NULL,
  `a` varchar(500) DEFAULT NULL,
  `wbc` varchar(500) DEFAULT NULL,
  `hct` varchar(500) DEFAULT NULL,
  `pits` varchar(500) DEFAULT NULL,
  `na` varchar(500) DEFAULT NULL,
  `cl` varchar(500) DEFAULT NULL,
  `glucose` varchar(500) DEFAULT NULL,
  `bun` varchar(500) DEFAULT NULL,
  `k` varchar(500) DEFAULT NULL,
  `co` varchar(500) DEFAULT NULL,
  `cr` varchar(500) DEFAULT NULL,
  `inr` varchar(500) DEFAULT NULL,
  `pt` varchar(500) DEFAULT NULL,
  `ptt` varchar(500) DEFAULT NULL,
  `upt` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lft` varchar(500) DEFAULT NULL,
  `ca` varchar(500) DEFAULT NULL,
  `cxr` varchar(500) DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `ecg` varchar(500) DEFAULT NULL,
  `date3` date DEFAULT NULL,
  `echo` varchar(500) DEFAULT NULL,
  `date4` date DEFAULT NULL,
  `stress` text DEFAULT NULL,
  `date5` date DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `nbm` varchar(100) DEFAULT NULL,
  `ad` varchar(100) DEFAULT NULL,
  `consent` varchar(100) DEFAULT NULL,
  `risk` varchar(100) DEFAULT NULL,
  `hp` varchar(100) DEFAULT NULL,
  `I` varchar(400) DEFAULT NULL,
  `II` varchar(400) DEFAULT NULL,
  `III` varchar(400) DEFAULT NULL,
  `IV` varchar(400) DEFAULT NULL,
  `caps` varchar(100) DEFAULT NULL,
  `overbite` varchar(100) DEFAULT NULL,
  `loose` varchar(100) DEFAULT NULL,
  `rom` varchar(100) DEFAULT NULL,
  `lungs` varchar(300) DEFAULT NULL,
  `heart` varchar(300) DEFAULT NULL,
  `asa` varchar(200) DEFAULT NULL,
  `ga` varchar(10) DEFAULT NULL,
  `regional` varchar(30) DEFAULT NULL,
  `spinal` varchar(30) DEFAULT NULL,
  `sed` varchar(30) DEFAULT NULL,
  `plan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incident_register`
--

CREATE TABLE `incident_register` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `incident` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `sign` text DEFAULT NULL,
  `action` text DEFAULT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indoor_case`
--

CREATE TABLE `indoor_case` (
  `id` int(11) NOT NULL,
  `doa` varchar(700) DEFAULT NULL,
  `doo` varchar(700) DEFAULT NULL,
  `dod` varchar(700) DEFAULT NULL,
  `refby` text DEFAULT NULL,
  `diagnosis` varchar(2000) DEFAULT NULL,
  `treatment` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indoor_case_register`
--

CREATE TABLE `indoor_case_register` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ipd` text DEFAULT NULL,
  `uhid` text DEFAULT NULL,
  `date_of_addmission` date DEFAULT NULL,
  `date_of_discharge` date DEFAULT NULL,
  `name` text DEFAULT NULL,
  `contact_no` text DEFAULT NULL,
  `sex` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `professional` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inform_consent`
--

CREATE TABLE `inform_consent` (
  `id` int(11) NOT NULL,
  `sahi1` text DEFAULT NULL,
  `sahi2` text DEFAULT NULL,
  `sahi3` text DEFAULT NULL,
  `name1` varchar(400) DEFAULT NULL,
  `name2` varchar(400) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `add1` text DEFAULT NULL,
  `add2` text DEFAULT NULL,
  `add3` text DEFAULT NULL,
  `vay1` varchar(400) DEFAULT NULL,
  `vay2` varchar(400) DEFAULT NULL,
  `uda` varchar(800) DEFAULT NULL,
  `doctor` varchar(1000) DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_sur_consent`
--

CREATE TABLE `info_sur_consent` (
  `id` int(11) NOT NULL,
  `sign` text DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `date` varchar(1000) DEFAULT NULL,
  `time` varchar(1000) DEFAULT NULL,
  `doctor` text DEFAULT NULL,
  `pro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_transfusion_consent`
--

CREATE TABLE `info_transfusion_consent` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `dr` text DEFAULT NULL,
  `dr_1` text DEFAULT NULL,
  `red` text DEFAULT NULL,
  `platelets` text DEFAULT NULL,
  `plasma` text DEFAULT NULL,
  `cryo` text DEFAULT NULL,
  `name_1` text DEFAULT NULL,
  `name_2` text DEFAULT NULL,
  `name_3` text DEFAULT NULL,
  `name_4` text DEFAULT NULL,
  `name_5` text DEFAULT NULL,
  `sign_1` text DEFAULT NULL,
  `sign_2` text DEFAULT NULL,
  `sign_3` text DEFAULT NULL,
  `sign_4` text DEFAULT NULL,
  `sign_5` text DEFAULT NULL,
  `date_1` date DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `time_1` time DEFAULT NULL,
  `time_2` time DEFAULT NULL,
  `time_3` time DEFAULT NULL,
  `time_4` time DEFAULT NULL,
  `time_5` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `initial_counselling`
--

CREATE TABLE `initial_counselling` (
  `id` int(11) NOT NULL,
  `r_1` text DEFAULT NULL,
  `r_2` text DEFAULT NULL,
  `r_3` text DEFAULT NULL,
  `r_4` text DEFAULT NULL,
  `r_5` text DEFAULT NULL,
  `r_6` text DEFAULT NULL,
  `r_7` text DEFAULT NULL,
  `r_8` text DEFAULT NULL,
  `r_9` text DEFAULT NULL,
  `r_10` text DEFAULT NULL,
  `r_11` text DEFAULT NULL,
  `r_12` text DEFAULT NULL,
  `name_1` text DEFAULT NULL,
  `name_2` text DEFAULT NULL,
  `name_3` text DEFAULT NULL,
  `name_4` text DEFAULT NULL,
  `name_5` text DEFAULT NULL,
  `sign_1` text DEFAULT NULL,
  `sign_2` text DEFAULT NULL,
  `sign_3` text DEFAULT NULL,
  `sign_4` text DEFAULT NULL,
  `sign_5` text DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `time_1` time DEFAULT NULL,
  `time_2` time DEFAULT NULL,
  `time_3` time DEFAULT NULL,
  `time_4` time DEFAULT NULL,
  `time_5` time DEFAULT NULL,
  `date_1` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `injection_consent`
--

CREATE TABLE `injection_consent` (
  `id` int(11) NOT NULL,
  `guardian_name` varchar(400) DEFAULT NULL,
  `translator` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investigation_view`
--

CREATE TABLE `investigation_view` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `dr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invest_sheet`
--

CREATE TABLE `invest_sheet` (
  `id` int(11) NOT NULL,
  `date` text DEFAULT NULL,
  `a` text DEFAULT NULL,
  `b` text DEFAULT NULL,
  `c` text DEFAULT NULL,
  `d` text DEFAULT NULL,
  `e` text DEFAULT NULL,
  `f` text DEFAULT NULL,
  `g` text DEFAULT NULL,
  `h` text DEFAULT NULL,
  `i` text DEFAULT NULL,
  `j` text DEFAULT NULL,
  `k` text DEFAULT NULL,
  `l` text DEFAULT NULL,
  `m` text DEFAULT NULL,
  `urine` text DEFAULT NULL,
  `pus` text DEFAULT NULL,
  `vaginal` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `in_reg`
--

CREATE TABLE `in_reg` (
  `id` int(11) NOT NULL,
  `ward` varchar(300) DEFAULT NULL,
  `nurse` varchar(300) DEFAULT NULL,
  `billing` varchar(400) DEFAULT NULL,
  `yn` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `in_view`
--

CREATE TABLE `in_view` (
  `id` int(11) NOT NULL,
  `instruction` varchar(3300) NOT NULL,
  `dr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_bill1`
--

CREATE TABLE `ipd_bill1` (
  `id` int(11) NOT NULL,
  `stay_charge` varchar(50) NOT NULL,
  `t_days` varchar(50) NOT NULL,
  `t_stay` varchar(50) NOT NULL,
  `cd_fee` varchar(50) NOT NULL,
  `c_days` varchar(50) NOT NULL,
  `t_fee` varchar(50) NOT NULL,
  `visit` varchar(50) NOT NULL,
  `no_visits` varchar(50) NOT NULL,
  `t_visits` varchar(50) NOT NULL,
  `nursing` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `total_nc` varchar(50) NOT NULL,
  `ot` varchar(50) NOT NULL,
  `ot_charge` varchar(50) NOT NULL,
  `total_ot` varchar(50) NOT NULL,
  `ana` varchar(50) NOT NULL,
  `ana_cd` varchar(50) NOT NULL,
  `total_ana` varchar(50) NOT NULL,
  `su_fee` varchar(50) NOT NULL,
  `s_visits` varchar(50) NOT NULL,
  `total_su` varchar(50) NOT NULL,
  `treat_charges` varchar(50) NOT NULL,
  `treat_days` varchar(50) NOT NULL,
  `total_treat` varchar(50) NOT NULL,
  `c_arm` varchar(50) NOT NULL,
  `count_carm` varchar(50) NOT NULL,
  `total_carm` varchar(50) NOT NULL,
  `ecg_charge` varchar(50) NOT NULL,
  `total_ecg` varchar(50) NOT NULL,
  `total_ecg_charge` varchar(50) NOT NULL,
  `description` varchar(7000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_bill2`
--

CREATE TABLE `ipd_bill2` (
  `id` int(11) NOT NULL,
  `xray` varchar(50) NOT NULL,
  `t_xray` varchar(50) NOT NULL,
  `t_xfee` varchar(50) NOT NULL,
  `m_charge` varchar(50) NOT NULL,
  `m_days` varchar(50) NOT NULL,
  `t_mcharge` varchar(50) NOT NULL,
  `v_sfee` varchar(50) NOT NULL,
  `v_visits` varchar(50) NOT NULL,
  `t_sfee` varchar(50) NOT NULL,
  `i_charge` varchar(50) NOT NULL,
  `n_imp` varchar(50) NOT NULL,
  `t_icharge` varchar(50) NOT NULL,
  `p_charge` varchar(50) NOT NULL,
  `n_tests` varchar(50) NOT NULL,
  `t_pcharge` varchar(50) NOT NULL,
  `med` varchar(50) NOT NULL,
  `med_quant` varchar(50) NOT NULL,
  `med_tot` varchar(50) NOT NULL,
  `plaster` varchar(50) NOT NULL,
  `plaster_quant` varchar(50) NOT NULL,
  `plaster_tot` varchar(50) NOT NULL,
  `other` varchar(50) NOT NULL,
  `quant` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `tot_pay` varchar(50) NOT NULL,
  `adv` varchar(50) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_due` varchar(50) NOT NULL,
  `discount` int(11) NOT NULL,
  `payable` int(11) NOT NULL,
  `payment_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laser`
--

CREATE TABLE `laser` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `emr` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `eye` varchar(50) DEFAULT NULL,
  `laser` varchar(50) DEFAULT NULL,
  `shot` varchar(50) DEFAULT NULL,
  `energy` varchar(50) DEFAULT NULL,
  `surgeon` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `sign` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `drawing` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_error_record`
--

CREATE TABLE `medical_error_record` (
  `srno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `uhid` varchar(400) DEFAULT NULL,
  `ipd` varchar(400) DEFAULT NULL,
  `bed` varchar(400) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `error` text DEFAULT NULL,
  `description_error` text DEFAULT NULL,
  `action` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(500) NOT NULL,
  `sender_type` varchar(100) NOT NULL,
  `r_id` int(11) NOT NULL,
  `r_type` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_body` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `minor_pro_consent`
--

CREATE TABLE `minor_pro_consent` (
  `id` int(11) NOT NULL,
  `input_1` text DEFAULT NULL,
  `input_2` text DEFAULT NULL,
  `input_3` text DEFAULT NULL,
  `input_4` text DEFAULT NULL,
  `input_5` text DEFAULT NULL,
  `input_6` text DEFAULT NULL,
  `input_7` text DEFAULT NULL,
  `input_8` text DEFAULT NULL,
  `input_9` text DEFAULT NULL,
  `input_10` text DEFAULT NULL,
  `input_11` text DEFAULT NULL,
  `input_12` text DEFAULT NULL,
  `input_13` text DEFAULT NULL,
  `dr_name_1` text DEFAULT NULL,
  `dr_name_2` text DEFAULT NULL,
  `name_1` text DEFAULT NULL,
  `name_2` text DEFAULT NULL,
  `name_3` text DEFAULT NULL,
  `name_4` text DEFAULT NULL,
  `name_5` text DEFAULT NULL,
  `sign_1` text DEFAULT NULL,
  `sign_2` text DEFAULT NULL,
  `sign_3` text DEFAULT NULL,
  `sign_4` text DEFAULT NULL,
  `sign_5` text DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `time_1` time DEFAULT NULL,
  `time_2` time DEFAULT NULL,
  `time_3` time DEFAULT NULL,
  `time_4` time DEFAULT NULL,
  `time_5` time DEFAULT NULL,
  `date_1` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mlc`
--

CREATE TABLE `mlc` (
  `id` int(11) NOT NULL,
  `mlc` varchar(300) NOT NULL,
  `date1` varchar(100) NOT NULL,
  `vay` varchar(100) NOT NULL,
  `mo` varchar(100) NOT NULL,
  `mupu` varchar(300) NOT NULL,
  `date2` varchar(100) NOT NULL,
  `time1` varchar(6) NOT NULL,
  `msg` varchar(700) NOT NULL,
  `thikar` varchar(300) NOT NULL,
  `yn` varchar(50) NOT NULL,
  `nav` varchar(255) NOT NULL,
  `date3` varchar(100) NOT NULL,
  `time2` varchar(6) NOT NULL,
  `sign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `needle_injury_record`
--

CREATE TABLE `needle_injury_record` (
  `srno` int(11) NOT NULL,
  `exposure` text DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `date_of_exposure` date DEFAULT NULL,
  `date_of_reporting` date DEFAULT NULL,
  `hiv` text DEFAULT NULL,
  `types_of_pep` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `sign` varchar(400) DEFAULT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_gynec_form`
--

CREATE TABLE `new_gynec_form` (
  `id` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nurses_daily_record`
--

CREATE TABLE `nurses_daily_record` (
  `allergy` text DEFAULT NULL,
  `special_care` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `date` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`date`)),
  `time` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`time`)),
  `nursing_note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`nursing_note`)),
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`name`)),
  `signature` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`signature`)),
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`remarks`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nurse_intial_assesment`
--

CREATE TABLE `nurse_intial_assesment` (
  `id` int(100) NOT NULL,
  `mode_of_arrival` text DEFAULT NULL,
  `accompanied` text DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `relation` text DEFAULT NULL,
  `contact_person` text DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `language` text DEFAULT NULL,
  `interpereter` varchar(255) DEFAULT NULL,
  `economic_status` text DEFAULT NULL,
  `education_status` text DEFAULT NULL,
  `compliant` text DEFAULT NULL,
  `resperation` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `allergy_drug` text DEFAULT NULL,
  `allergy_food` text DEFAULT NULL,
  `allergy_blood` text DEFAULT NULL,
  `tab1` text DEFAULT NULL,
  `tab2` text DEFAULT NULL,
  `tab3` text DEFAULT NULL,
  `submit_name` varchar(255) DEFAULT NULL,
  `submit_date` date DEFAULT NULL,
  `submit_sign` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nursing_assessment`
--

CREATE TABLE `nursing_assessment` (
  `id` int(11) NOT NULL,
  `a` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nutritional_ass`
--

CREATE TABLE `nutritional_ass` (
  `id` int(11) NOT NULL,
  `allergy` varchar(300) NOT NULL,
  `namediet` varchar(100) NOT NULL,
  `diagnosis` varchar(300) NOT NULL,
  `complaints` varchar(400) NOT NULL,
  `csymptm` varchar(400) NOT NULL,
  `treatment` varchar(400) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `bmi` varchar(100) NOT NULL,
  `wenou` varchar(50) NOT NULL,
  `weichange` varchar(100) NOT NULL,
  `dietprior` varchar(200) NOT NULL,
  `appetite` varchar(200) NOT NULL,
  `foodaller` varchar(200) NOT NULL,
  `vegnon` varchar(100) NOT NULL,
  `hofood` varchar(100) NOT NULL,
  `proper` varchar(50) NOT NULL,
  `junk` varchar(50) NOT NULL,
  `cookm` varchar(100) NOT NULL,
  `waterin` varchar(50) NOT NULL,
  `saltin` varchar(50) NOT NULL,
  `recomm` varchar(400) NOT NULL,
  `nameofdiet` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nutri_assessment`
--

CREATE TABLE `nutri_assessment` (
  `id` int(11) NOT NULL,
  `weight` varchar(200) DEFAULT NULL,
  `height` varchar(200) DEFAULT NULL,
  `bmi` varchar(200) DEFAULT NULL,
  `a` varchar(200) DEFAULT NULL,
  `b` varchar(200) DEFAULT NULL,
  `c` varchar(200) DEFAULT NULL,
  `d` varchar(200) DEFAULT NULL,
  `e` varchar(200) DEFAULT NULL,
  `f` varchar(200) DEFAULT NULL,
  `point1` varchar(400) DEFAULT NULL,
  `point2` varchar(400) DEFAULT NULL,
  `point3` varchar(400) DEFAULT NULL,
  `tt` text DEFAULT NULL,
  `hepatitis` text DEFAULT NULL,
  `adult` text DEFAULT NULL,
  `hepatitis_ad` text DEFAULT NULL,
  `sis` text DEFAULT NULL,
  `sign` text DEFAULT NULL,
  `dpt` varchar(200) DEFAULT NULL,
  `polio` varchar(200) DEFAULT NULL,
  `mmr` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `observe1`
--

CREATE TABLE `observe1` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `temp` varchar(50) DEFAULT NULL,
  `pulse` varchar(50) DEFAULT NULL,
  `resp` varchar(50) DEFAULT NULL,
  `bp` varchar(50) DEFAULT NULL,
  `spo2` varchar(50) DEFAULT NULL,
  `bsl` varchar(50) DEFAULT NULL,
  `oral` varchar(50) DEFAULT NULL,
  `intra` varchar(50) DEFAULT NULL,
  `urine` varchar(50) DEFAULT NULL,
  `asp` varchar(50) DEFAULT NULL,
  `sign` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `observe2`
--

CREATE TABLE `observe2` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `drug` varchar(50) DEFAULT NULL,
  `dose` varchar(50) DEFAULT NULL,
  `sign` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ocu`
--

CREATE TABLE `ocu` (
  `id` int(11) NOT NULL,
  `sur` varchar(100) DEFAULT NULL,
  `ass` varchar(100) DEFAULT NULL,
  `nurse` varchar(100) DEFAULT NULL,
  `hca` varchar(100) DEFAULT NULL,
  `visit` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `s_time` time DEFAULT NULL,
  `e_time` time DEFAULT NULL,
  `proc` varchar(2200) DEFAULT NULL,
  `ana` varchar(100) DEFAULT NULL,
  `com` varchar(100) DEFAULT NULL,
  `refer` varchar(100) DEFAULT NULL,
  `eye` varchar(100) DEFAULT NULL,
  `ot` varchar(100) DEFAULT NULL,
  `case_no` varchar(100) DEFAULT NULL,
  `emr` varchar(100) DEFAULT NULL,
  `asd` varchar(2200) DEFAULT NULL,
  `record` varchar(2200) DEFAULT NULL,
  `pos` varchar(100) NOT NULL,
  `inc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `op`
--

CREATE TABLE `op` (
  `name` varchar(2200) NOT NULL,
  `op` varchar(2200) NOT NULL,
  `sur` varchar(2200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_admin`
--

CREATE TABLE `opd_admin` (
  `id` int(11) NOT NULL,
  `opd_sign` text DEFAULT NULL,
  `bottom` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_bill`
--

CREATE TABLE `opd_bill` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_bill_pay`
--

CREATE TABLE `opd_bill_pay` (
  `patient_id` int(11) NOT NULL,
  `pay_method` varchar(500) NOT NULL,
  `payment_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_charges`
--

CREATE TABLE `opd_charges` (
  `id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_register`
--

CREATE TABLE `opd_register` (
  `id` int(11) NOT NULL,
  `uhid` text DEFAULT NULL,
  `date` date NOT NULL,
  `name` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_no` text DEFAULT NULL,
  `time` time DEFAULT NULL,
  `appointment` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `doctor` text DEFAULT NULL,
  `payment` float DEFAULT NULL,
  `refer_by` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_tracker`
--

CREATE TABLE `opd_tracker` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `opd_no` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operation_record`
--

CREATE TABLE `operation_record` (
  `id` int(11) NOT NULL,
  `inp_array` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`inp_array`)),
  `dyn_array` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dyn_array`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opto_ascan`
--

CREATE TABLE `opto_ascan` (
  `id` int(11) NOT NULL,
  `k1_1` text DEFAULT NULL,
  `k1_2` text DEFAULT NULL,
  `k2_1` text DEFAULT NULL,
  `k2_2` text DEFAULT NULL,
  `avg_1` text DEFAULT NULL,
  `avg_2` text DEFAULT NULL,
  `axl_1` text DEFAULT NULL,
  `axl_2` text DEFAULT NULL,
  `acd_1` text DEFAULT NULL,
  `acd_2` text DEFAULT NULL,
  `aconst_1` text DEFAULT NULL,
  `aconst_2` text DEFAULT NULL,
  `formula_1` text DEFAULT NULL,
  `formula_2` text DEFAULT NULL,
  `iol_1` text DEFAULT NULL,
  `iol_2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opto_examination`
--

CREATE TABLE `opto_examination` (
  `id` int(11) NOT NULL,
  `wnl` text DEFAULT NULL,
  `lids_1` text DEFAULT NULL,
  `lids_2` text DEFAULT NULL,
  `conjunctive_1` text DEFAULT NULL,
  `conjunctive_2` text DEFAULT NULL,
  `cornea_1` text DEFAULT NULL,
  `cornea_2` text DEFAULT NULL,
  `ac_1` text DEFAULT NULL,
  `ac_2` text DEFAULT NULL,
  `pupil_1` text DEFAULT NULL,
  `pupil_2` text DEFAULT NULL,
  `lens_1` text DEFAULT NULL,
  `lens_2` text DEFAULT NULL,
  `fundus_1` text DEFAULT NULL,
  `fundus_2` text DEFAULT NULL,
  `sac_1` text DEFAULT NULL,
  `sac_2` text DEFAULT NULL,
  `iop_1` text DEFAULT NULL,
  `iop_2` text DEFAULT NULL,
  `diagnosis_1` text DEFAULT NULL,
  `diagnosis_2` text DEFAULT NULL,
  `vision_1` text DEFAULT NULL,
  `vision_2` text DEFAULT NULL,
  `via_spect_1` text DEFAULT NULL,
  `via_spect_2` text DEFAULT NULL,
  `via_ph_1` text DEFAULT NULL,
  `via_ph_2` text DEFAULT NULL,
  `at_1` text DEFAULT NULL,
  `at_2` text DEFAULT NULL,
  `ar_sph_1` text DEFAULT NULL,
  `ar_sph_2` text DEFAULT NULL,
  `ar_cyl_1` text DEFAULT NULL,
  `ar_cyl_2` text DEFAULT NULL,
  `ar_axis_1` text DEFAULT NULL,
  `ar_axis_2` text DEFAULT NULL,
  `dig` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opto_images`
--

CREATE TABLE `opto_images` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `img_add` varchar(500) NOT NULL,
  `img_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opto_pres`
--

CREATE TABLE `opto_pres` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `med_name` varchar(250) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `morning` varchar(50) NOT NULL,
  `afternoon` varchar(50) NOT NULL,
  `night` varchar(50) NOT NULL,
  `days` varchar(100) DEFAULT NULL,
  `eat` varchar(500) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opto_surgery`
--

CREATE TABLE `opto_surgery` (
  `id` int(11) NOT NULL,
  `surgery_advice` text DEFAULT NULL,
  `surgery_plan_date` date DEFAULT NULL,
  `surgery_status` text DEFAULT NULL,
  `surgery_re` text DEFAULT NULL,
  `surgery_le` text DEFAULT NULL,
  `lens` text DEFAULT NULL,
  `power` text DEFAULT NULL,
  `batch` text DEFAULT NULL,
  `other_1` text DEFAULT NULL,
  `other_2` text DEFAULT NULL,
  `final_diagonsis` text DEFAULT NULL,
  `condition_discharge` text DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `admission_time` time DEFAULT NULL,
  `surgery_date` date DEFAULT NULL,
  `surgery_time` time DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `discharge_time` time DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortho_cont`
--

CREATE TABLE `ortho_cont` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `treat` varchar(50) DEFAULT NULL,
  `sign` varchar(500) NOT NULL,
  `pulse` varchar(100) NOT NULL,
  `temp` varchar(100) NOT NULL,
  `bp` varchar(100) NOT NULL,
  `sp` varchar(100) NOT NULL,
  `pa` varchar(100) NOT NULL,
  `cns` varchar(100) NOT NULL,
  `bb` varchar(100) NOT NULL,
  `dmtb` varchar(100) NOT NULL,
  `resp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortho_discharge`
--

CREATE TABLE `ortho_discharge` (
  `id` int(11) NOT NULL,
  `mlc` varchar(100) NOT NULL,
  `department` varchar(400) NOT NULL,
  `religion` varchar(200) NOT NULL,
  `occupation` varchar(300) NOT NULL,
  `dateofs` varchar(100) NOT NULL,
  `timeofs` varchar(6) NOT NULL,
  `dateofd` varchar(100) NOT NULL,
  `timeofd` varchar(6) NOT NULL,
  `ptc` varchar(400) NOT NULL,
  `typeofd` varchar(100) NOT NULL,
  `diagnosis` varchar(700) NOT NULL,
  `icd` varchar(1500) NOT NULL,
  `followup` varchar(1000) NOT NULL,
  `date0` varchar(100) NOT NULL,
  `sign` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortho_initial_counselling`
--

CREATE TABLE `ortho_initial_counselling` (
  `patient_id` int(11) NOT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `patient_sign` varchar(255) DEFAULT NULL,
  `patient_date` date DEFAULT NULL,
  `patient_time` time DEFAULT NULL,
  `witness_name` varchar(255) DEFAULT NULL,
  `witness_sign` varchar(255) DEFAULT NULL,
  `witness_date` date DEFAULT NULL,
  `witness_time` time DEFAULT NULL,
  `councellor_name` varchar(255) DEFAULT NULL,
  `councellor_sign` varchar(255) DEFAULT NULL,
  `councellor_date` date DEFAULT NULL,
  `councellor_time` time DEFAULT NULL,
  `description` text DEFAULT NULL,
  `emr` text NOT NULL,
  `surgeon` text NOT NULL,
  `proc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortho_observe1`
--

CREATE TABLE `ortho_observe1` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `temp` varchar(50) DEFAULT NULL,
  `pulse` varchar(50) DEFAULT NULL,
  `resp` varchar(50) DEFAULT NULL,
  `bp` varchar(50) DEFAULT NULL,
  `spo2` varchar(50) DEFAULT NULL,
  `bsl` varchar(50) DEFAULT NULL,
  `oral` varchar(50) DEFAULT NULL,
  `intra` varchar(50) DEFAULT NULL,
  `urine` varchar(50) DEFAULT NULL,
  `asp` varchar(50) DEFAULT NULL,
  `sign` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortho_observe2`
--

CREATE TABLE `ortho_observe2` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `drug` varchar(50) DEFAULT NULL,
  `dose` varchar(50) DEFAULT NULL,
  `sign` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortho_pre_op_checklist`
--

CREATE TABLE `ortho_pre_op_checklist` (
  `patient_id` int(11) NOT NULL,
  `input1` varchar(255) DEFAULT NULL,
  `input2` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortho_p_general`
--

CREATE TABLE `ortho_p_general` (
  `g_condition` varchar(100) NOT NULL,
  `skin` varchar(100) NOT NULL,
  `ana` varchar(100) NOT NULL,
  `nai` varchar(100) NOT NULL,
  `cya` varchar(100) NOT NULL,
  `any` varchar(100) NOT NULL,
  `oed` varchar(100) NOT NULL,
  `jaun` varchar(100) NOT NULL,
  `thro` varchar(100) NOT NULL,
  `toun` varchar(100) NOT NULL,
  `lymp` varchar(100) NOT NULL,
  `pain` varchar(100) NOT NULL,
  `rs1` varchar(100) NOT NULL,
  `cvs1` varchar(100) NOT NULL,
  `cns1` varchar(100) NOT NULL,
  `pa` varchar(100) NOT NULL,
  `other` varchar(100) NOT NULL,
  `p_diag` varchar(2200) NOT NULL,
  `f_diag` varchar(2200) NOT NULL,
  `p_care` varchar(2200) NOT NULL,
  `num_pain_scale` varchar(220) NOT NULL,
  `id` int(11) NOT NULL,
  `name_sign` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortho_p_init`
--

CREATE TABLE `ortho_p_init` (
  `p_his` varchar(2200) NOT NULL,
  `resp` varchar(50) NOT NULL,
  `cvs` varchar(50) NOT NULL,
  `rs` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `r_his` varchar(2200) NOT NULL,
  `m_his` varchar(2200) NOT NULL,
  `habit` varchar(2200) NOT NULL,
  `invest` varchar(2200) NOT NULL,
  `nutrition` varchar(2200) NOT NULL,
  `id` int(11) NOT NULL,
  `img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ortho_p_insure`
--

CREATE TABLE `ortho_p_insure` (
  `id` int(11) NOT NULL,
  `uhid` varchar(50) NOT NULL,
  `ipd` varchar(50) NOT NULL,
  `ward/icu` varchar(50) NOT NULL,
  `bed/room` varchar(50) NOT NULL,
  `aadhar` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `occ` varchar(50) NOT NULL,
  `em_c` varchar(50) NOT NULL,
  `mlc/nmlc` varchar(50) NOT NULL,
  `i_company` varchar(100) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `ad_c` varchar(2200) NOT NULL,
  `s_discharge` varchar(50) NOT NULL,
  `icd` varchar(50) NOT NULL,
  `p_diagnosis` varchar(2200) NOT NULL,
  `f_diagnosis` varchar(2200) NOT NULL,
  `c_death` varchar(2200) NOT NULL,
  `insure` varchar(50) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_images`
--

CREATE TABLE `patient_images` (
  `uhid` text NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `patient_id` int(11) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `pulse` varchar(15) NOT NULL,
  `bp` varchar(100) NOT NULL,
  `temp` int(11) NOT NULL,
  `history` varchar(2000) NOT NULL,
  `diagnosis` varchar(2500) NOT NULL,
  `fluid` varchar(2200) NOT NULL,
  `examination` varchar(1000) NOT NULL,
  `chief_complaint` varchar(1000) NOT NULL,
  `family_history` varchar(1000) NOT NULL,
  `procedure_done` varchar(1000) NOT NULL,
  `ortho_fluid` text NOT NULL,
  `investigation` text DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `investigation_imaging` text DEFAULT NULL,
  `personal_history` text DEFAULT NULL,
  `medical_history` text NOT NULL,
  `pregDate` date DEFAULT NULL,
  `pregDetails` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_records`
--

CREATE TABLE `patient_records` (
  `id` int(11) NOT NULL,
  `is_old_patient` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `taluka` varchar(250) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('Male','Female','Other') NOT NULL,
  `dob_date` date NOT NULL,
  `reg_date` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `consultant` varchar(250) NOT NULL,
  `type_of_visit` varchar(50) DEFAULT NULL,
  `name_pwp` varchar(100) DEFAULT NULL,
  `address_pwp` varchar(250) DEFAULT NULL,
  `taluka_pwp` varchar(250) DEFAULT NULL,
  `district_pwp` varchar(50) DEFAULT NULL,
  `age_pwp` int(11) DEFAULT NULL,
  `relation` varchar(250) DEFAULT NULL,
  `sex_pwp` enum('Male','Female','Other') DEFAULT NULL,
  `mobile_pwp` varchar(20) DEFAULT NULL,
  `referred_by` varchar(100) DEFAULT NULL,
  `patient_complaints` varchar(500) DEFAULT NULL,
  `is_admited` int(11) NOT NULL DEFAULT 0,
  `is_registered` int(11) NOT NULL DEFAULT 1,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_eye` int(11) NOT NULL DEFAULT 0,
  `is_ortho` int(11) NOT NULL DEFAULT 0,
  `is_refered` int(11) NOT NULL DEFAULT 0,
  `refered_by` text NOT NULL DEFAULT ' ',
  `is_visited` int(11) NOT NULL DEFAULT 0,
  `is_followup` int(255) NOT NULL,
  `follow_visit` tinyint(1) NOT NULL,
  `follow_approve` tinyint(1) NOT NULL,
  `follow_date` date DEFAULT NULL,
  `follow_reg` tinyint(1) DEFAULT 0,
  `skip` tinyint(1) NOT NULL DEFAULT 0,
  `review` tinyint(1) NOT NULL DEFAULT 0,
  `is_viewed` tinyint(1) NOT NULL DEFAULT 0,
  `is_billed` tinyint(1) NOT NULL DEFAULT 0,
  `opd_no` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `delete_reason` text DEFAULT NULL,
  `visit_count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_register_ot`
--

CREATE TABLE `patient_register_ot` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `uhid` varchar(255) DEFAULT NULL,
  `ipd` varchar(255) DEFAULT NULL,
  `surgery_date` date DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `surgery_name` varchar(255) DEFAULT NULL,
  `surgeon_dr` varchar(255) DEFAULT NULL,
  `asstt_dr` varchar(255) DEFAULT NULL,
  `anesthesia_dr` varchar(255) DEFAULT NULL,
  `sister` varchar(255) DEFAULT NULL,
  `hca` varchar(255) DEFAULT NULL,
  `ot_in_time` varchar(255) DEFAULT NULL,
  `ans_type` varchar(255) DEFAULT NULL,
  `ans_induced` varchar(255) DEFAULT NULL,
  `surgery_start` varchar(255) DEFAULT NULL,
  `surgery_end` varchar(255) DEFAULT NULL,
  `ot_out_time` varchar(255) DEFAULT NULL,
  `reschedule_surgery` varchar(255) DEFAULT NULL,
  `change_plan` varchar(255) DEFAULT NULL,
  `return_ot` varchar(255) DEFAULT NULL,
  `reexploration` varchar(255) DEFAULT NULL,
  `details_adverse` varchar(255) DEFAULT NULL,
  `ans_plan` varchar(255) DEFAULT NULL,
  `unplanned_ventilation` varchar(255) DEFAULT NULL,
  `adverse_ans` varchar(255) DEFAULT NULL,
  `ans_related` varchar(255) DEFAULT NULL,
  `p_np` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `input_1` text DEFAULT NULL,
  `input_2` text DEFAULT NULL,
  `input_3` text DEFAULT NULL,
  `input_4` text DEFAULT NULL,
  `input_5` date DEFAULT NULL,
  `input_6` text DEFAULT NULL,
  `input_7` text DEFAULT NULL,
  `input_8` text DEFAULT NULL,
  `input_9` date DEFAULT NULL,
  `input_10` text DEFAULT NULL,
  `input_11` text DEFAULT NULL,
  `input_12` text DEFAULT NULL,
  `input_13` text DEFAULT NULL,
  `t_1` text DEFAULT NULL,
  `t_2` text DEFAULT NULL,
  `t_3` text DEFAULT NULL,
  `t_4` text DEFAULT NULL,
  `t_5` text DEFAULT NULL,
  `t_6` text DEFAULT NULL,
  `t_7` text DEFAULT NULL,
  `t_8` text DEFAULT NULL,
  `t_9` text DEFAULT NULL,
  `t_10` text DEFAULT NULL,
  `t_11` text DEFAULT NULL,
  `t_12` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postpone_surgery_record`
--

CREATE TABLE `postpone_surgery_record` (
  `srno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `uhid` varchar(500) DEFAULT NULL,
  `ipd` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `date_of_admission` date DEFAULT NULL,
  `date_of_scheduled` date DEFAULT NULL,
  `date_of_surgery` date DEFAULT NULL,
  `reason_for_postpone` text DEFAULT NULL,
  `sign` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_consent`
--

CREATE TABLE `post_consent` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `sign` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_operative_surgical`
--

CREATE TABLE `post_operative_surgical` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `uhid` text DEFAULT NULL,
  `ipd` text DEFAULT NULL,
  `ward` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `digonsis` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `complication` text DEFAULT NULL,
  `no_treatment` text DEFAULT NULL,
  `medical` text DEFAULT NULL,
  `surgical` text DEFAULT NULL,
  `icu` text DEFAULT NULL,
  `death` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_opnotes`
--

CREATE TABLE `post_opnotes` (
  `pt_id` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `pulse` varchar(200) DEFAULT NULL,
  `bp` varchar(200) DEFAULT NULL,
  `fluid` varchar(500) DEFAULT NULL,
  `relaxant` varchar(500) DEFAULT NULL,
  `drug` varchar(500) DEFAULT NULL,
  `urine` varchar(500) DEFAULT NULL,
  `urine_output` varchar(500) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `med_name` varchar(250) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `morning` varchar(50) NOT NULL,
  `afternoon` varchar(50) NOT NULL,
  `night` varchar(50) NOT NULL,
  `days` varchar(100) DEFAULT NULL,
  `eat` varchar(500) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pres_back`
--

CREATE TABLE `pres_back` (
  `id` int(11) NOT NULL,
  `past_history` text DEFAULT NULL,
  `Add_data` text DEFAULT NULL,
  `pgp_od` text DEFAULT NULL,
  `pgp_os` text DEFAULT NULL,
  `allergic_to` text DEFAULT NULL,
  `vision_refraction` text DEFAULT NULL,
  `distant_od` text DEFAULT NULL,
  `distant_os` text DEFAULT NULL,
  `near_od` text DEFAULT NULL,
  `near_os` text DEFAULT NULL,
  `flash_od` text DEFAULT NULL,
  `flash_os` text DEFAULT NULL,
  `unaided_od` text DEFAULT NULL,
  `unaided_os` text DEFAULT NULL,
  `cyclo_flash_od` text DEFAULT NULL,
  `cyclo_flash_os` text DEFAULT NULL,
  `slit_lamp_examination_od` text DEFAULT NULL,
  `slit_lamp_examination_os` text DEFAULT NULL,
  `ocular_adnexa_od` text DEFAULT NULL,
  `ocular_adnexa_os` text DEFAULT NULL,
  `roplas_od` text DEFAULT NULL,
  `roplas_os` text DEFAULT NULL,
  `lids_od` text DEFAULT NULL,
  `lids_os` text DEFAULT NULL,
  `conjuctiva_od` text DEFAULT NULL,
  `conjuctiva_os` text DEFAULT NULL,
  `anti_chamber_od` text DEFAULT NULL,
  `anti_chamber_os` text DEFAULT NULL,
  `iris_od` text DEFAULT NULL,
  `iris_os` text DEFAULT NULL,
  `pupil_od` text DEFAULT NULL,
  `pupil_os` text DEFAULT NULL,
  `lens_od` text DEFAULT NULL,
  `lens_os` text DEFAULT NULL,
  `iop_od` text DEFAULT NULL,
  `iop_os` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_anas_checkup_record`
--

CREATE TABLE `pre_anas_checkup_record` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `uhid` text DEFAULT NULL,
  `ipd` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `dept` text DEFAULT NULL,
  `date_of_checkup` date DEFAULT NULL,
  `checkup_done` text DEFAULT NULL,
  `sign` text DEFAULT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_operative_anesth`
--

CREATE TABLE `pre_operative_anesth` (
  `id` int(11) NOT NULL,
  `date_assessment` datetime DEFAULT NULL,
  `date_surgery` datetime DEFAULT NULL,
  `name_surgery` varchar(255) DEFAULT NULL,
  `name_anesthetist` varchar(255) DEFAULT NULL,
  `name_surgeon` varchar(255) DEFAULT NULL,
  `allergic` varchar(700) DEFAULT NULL,
  `habit` varchar(700) DEFAULT NULL,
  `history` text DEFAULT NULL,
  `medication` text DEFAULT NULL,
  `pre_anaesthesia` text DEFAULT NULL,
  `vital` varchar(2500) DEFAULT NULL,
  `sys_exam` text DEFAULT NULL,
  `airway` varchar(100) DEFAULT NULL,
  `mpc` varchar(100) DEFAULT NULL,
  `mouth` varchar(100) DEFAULT NULL,
  `im_distance` varchar(100) DEFAULT NULL,
  `teeth` varchar(100) DEFAULT NULL,
  `asa` varchar(100) DEFAULT NULL,
  `date` varchar(300) DEFAULT NULL,
  `blood_grp` text DEFAULT NULL,
  `hb` text DEFAULT NULL,
  `wbc` text DEFAULT NULL,
  `lnebm` text DEFAULT NULL,
  `platelet` varchar(700) DEFAULT NULL,
  `bsl` varchar(700) DEFAULT NULL,
  `cr` varchar(700) DEFAULT NULL,
  `na` varchar(700) DEFAULT NULL,
  `lft` varchar(700) DEFAULT NULL,
  `sgot` varchar(700) DEFAULT NULL,
  `pt` varchar(700) DEFAULT NULL,
  `inr` text DEFAULT NULL,
  `fib` text DEFAULT NULL,
  `abg` text DEFAULT NULL,
  `mark` text DEFAULT NULL,
  `xray` varchar(700) DEFAULT NULL,
  `ecg` varchar(700) DEFAULT NULL,
  `echo` varchar(700) DEFAULT NULL,
  `other` text DEFAULT NULL,
  `pre_advice` text DEFAULT NULL,
  `nbm` text DEFAULT NULL,
  `investigations` text DEFAULT NULL,
  `reference` text DEFAULT NULL,
  `medication2` text DEFAULT NULL,
  `blood_request` text DEFAULT NULL,
  `icu` text DEFAULT NULL,
  `anaethesia_plan_ex` varchar(100) DEFAULT NULL,
  `post_operative_plan` varchar(100) DEFAULT NULL,
  `post_operative_pain` varchar(100) DEFAULT NULL,
  `anae_plan` text DEFAULT NULL,
  `premedication` text DEFAULT NULL,
  `typelasa` text DEFAULT NULL,
  `special_req` text DEFAULT NULL,
  `possibility_vent` text DEFAULT NULL,
  `post_icu` varchar(100) DEFAULT NULL,
  `identify` varchar(100) DEFAULT NULL,
  `nbm3` text DEFAULT NULL,
  `fresh_comp` text DEFAULT NULL,
  `consent` text DEFAULT NULL,
  `pac_chart` text DEFAULT NULL,
  `comorbid` text DEFAULT NULL,
  `investigation_review` text DEFAULT NULL,
  `blood_arranged` text DEFAULT NULL,
  `change_plan` varchar(100) DEFAULT NULL,
  `describ` text DEFAULT NULL,
  `pre_op_advice` text DEFAULT NULL,
  `name_sign` text DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_room_urinary`
--

CREATE TABLE `pre_room_urinary` (
  `id` int(11) NOT NULL,
  `a` longtext DEFAULT NULL,
  `b` longtext DEFAULT NULL,
  `detail_urinary` longtext DEFAULT NULL,
  `c` longtext DEFAULT NULL,
  `detail_room` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pt_image`
--

CREATE TABLE `pt_image` (
  `id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `img_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pt_rel_feedback`
--

CREATE TABLE `pt_rel_feedback` (
  `id` int(11) NOT NULL,
  `a` text DEFAULT NULL,
  `b` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_general`
--

CREATE TABLE `p_general` (
  `g_condition` varchar(100) NOT NULL,
  `skin` varchar(100) NOT NULL,
  `ana` varchar(100) NOT NULL,
  `nai` varchar(100) NOT NULL,
  `cya` varchar(100) NOT NULL,
  `any` varchar(100) NOT NULL,
  `oed` varchar(100) NOT NULL,
  `jaun` varchar(100) NOT NULL,
  `thro` varchar(100) NOT NULL,
  `toun` varchar(100) NOT NULL,
  `lymp` varchar(100) NOT NULL,
  `pain` varchar(100) NOT NULL,
  `rs1` varchar(100) NOT NULL,
  `cvs1` varchar(100) NOT NULL,
  `cns1` varchar(100) NOT NULL,
  `pa` varchar(100) NOT NULL,
  `other` varchar(100) NOT NULL,
  `p_diag` varchar(2200) NOT NULL,
  `f_diag` varchar(2200) NOT NULL,
  `p_care` varchar(2200) NOT NULL,
  `id` int(11) NOT NULL,
  `num_pain_scale` int(11) NOT NULL,
  `name_sign` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_init`
--

CREATE TABLE `p_init` (
  `p_his` varchar(2200) NOT NULL,
  `resp` varchar(50) NOT NULL,
  `cvs` varchar(50) NOT NULL,
  `rs` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `r_his` varchar(2200) NOT NULL,
  `m_his` varchar(2200) NOT NULL,
  `habit` varchar(2200) NOT NULL,
  `invest` varchar(2200) NOT NULL,
  `nutrition` varchar(2200) NOT NULL,
  `id` int(11) NOT NULL,
  `img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_insure`
--

CREATE TABLE `p_insure` (
  `id` int(11) NOT NULL,
  `uhid` varchar(50) NOT NULL,
  `ipd` varchar(50) NOT NULL,
  `ward/icu` varchar(50) NOT NULL,
  `bed/room` varchar(50) NOT NULL,
  `aadhar` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `occ` varchar(50) NOT NULL,
  `em_c` varchar(50) NOT NULL,
  `mlc/nmlc` varchar(50) NOT NULL,
  `i_company` varchar(100) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `ad_c` varchar(2200) NOT NULL,
  `s_discharge` varchar(50) NOT NULL,
  `icd` varchar(50) NOT NULL,
  `p_diagnosis` varchar(2200) NOT NULL,
  `f_diagnosis` varchar(2200) NOT NULL,
  `c_death` varchar(2200) NOT NULL,
  `insure` varchar(50) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_log`
--

CREATE TABLE `p_log` (
  `id` int(11) NOT NULL,
  `is_opd` int(11) DEFAULT NULL,
  `is_ipd` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `opd_discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate_charges`
--

CREATE TABLE `rate_charges` (
  `id` int(11) NOT NULL,
  `input_1` text DEFAULT NULL,
  `input_2` text DEFAULT NULL,
  `input_3` text DEFAULT NULL,
  `input_4` text DEFAULT NULL,
  `input_5` text DEFAULT NULL,
  `input_6` text DEFAULT NULL,
  `input_7` text DEFAULT NULL,
  `input_8` text DEFAULT NULL,
  `input_9` text DEFAULT NULL,
  `input_10` text DEFAULT NULL,
  `input_11` text DEFAULT NULL,
  `input_12` text DEFAULT NULL,
  `input_13` text DEFAULT NULL,
  `input_14` text DEFAULT NULL,
  `input_15` text DEFAULT NULL,
  `input_16` text DEFAULT NULL,
  `input_17` text DEFAULT NULL,
  `input_18` text DEFAULT NULL,
  `input_19` text DEFAULT NULL,
  `input_20` text DEFAULT NULL,
  `input_21` text DEFAULT NULL,
  `input_22` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `taluka` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('Male','Female','Others') NOT NULL,
  `dob` date NOT NULL,
  `reg_date` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refr_temp_register`
--

CREATE TABLE `refr_temp_register` (
  `srno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `temp_am` varchar(500) DEFAULT NULL,
  `time_am` time DEFAULT NULL,
  `temp_pm` varchar(500) DEFAULT NULL,
  `time_pm` time DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `sign` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_consent`
--

CREATE TABLE `ref_consent` (
  `id` int(11) NOT NULL,
  `patient_1` text DEFAULT NULL,
  `patient_2` text DEFAULT NULL,
  `invest_1` text DEFAULT NULL,
  `invest_2` text DEFAULT NULL,
  `d_1` text DEFAULT NULL,
  `d_2` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `name_1` text DEFAULT NULL,
  `name_2` text DEFAULT NULL,
  `name_3` text DEFAULT NULL,
  `name_4` text DEFAULT NULL,
  `name_5` text DEFAULT NULL,
  `sign_1` text DEFAULT NULL,
  `sign_2` text DEFAULT NULL,
  `sign_3` text DEFAULT NULL,
  `sign_4` text DEFAULT NULL,
  `sign_5` text DEFAULT NULL,
  `date_1` date DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `time_1` time DEFAULT NULL,
  `time_2` time DEFAULT NULL,
  `time_3` time DEFAULT NULL,
  `time_4` time DEFAULT NULL,
  `time_5` time DEFAULT NULL,
  `p_sign` text DEFAULT NULL,
  `p_time` text DEFAULT NULL,
  `wit_name` text DEFAULT NULL,
  `wit_details` text DEFAULT NULL,
  `wit_rel` text DEFAULT NULL,
  `wit_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relative_images`
--

CREATE TABLE `relative_images` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repeat_surgery_record`
--

CREATE TABLE `repeat_surgery_record` (
  `srno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `uhid` varchar(400) DEFAULT NULL,
  `ipd` varchar(400) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `dept` text DEFAULT NULL,
  `date_of_initial_surgery` date DEFAULT NULL,
  `indication` text DEFAULT NULL,
  `date_of_repeat` date DEFAULT NULL,
  `sign` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_consent`
--

CREATE TABLE `room_consent` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `inp_1` text DEFAULT NULL,
  `inp_2` text DEFAULT NULL,
  `inp_3` text DEFAULT NULL,
  `name_1` text DEFAULT NULL,
  `name_2` text DEFAULT NULL,
  `name_3` text DEFAULT NULL,
  `name_4` text DEFAULT NULL,
  `name_5` text DEFAULT NULL,
  `sign_1` text DEFAULT NULL,
  `sign_2` text DEFAULT NULL,
  `sign_3` text DEFAULT NULL,
  `sign_4` text DEFAULT NULL,
  `sign_5` text DEFAULT NULL,
  `date_1` date DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `time_1` time DEFAULT NULL,
  `time_2` time DEFAULT NULL,
  `time_3` time DEFAULT NULL,
  `time_4` time DEFAULT NULL,
  `time_5` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `samtipatra1`
--

CREATE TABLE `samtipatra1` (
  `id` int(11) NOT NULL,
  `a` longtext DEFAULT NULL,
  `b` longtext DEFAULT NULL,
  `c` longtext DEFAULT NULL,
  `d` longtext DEFAULT NULL,
  `e` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scan`
--

CREATE TABLE `scan` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `emr` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `eye` varchar(50) DEFAULT NULL,
  `test` varchar(50) DEFAULT NULL,
  `advise` varchar(50) DEFAULT NULL,
  `opt` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `pn` varchar(50) DEFAULT NULL,
  `sign` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `taluka` varchar(250) NOT NULL,
  `district` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('Male','Female','Others') NOT NULL,
  `dob` date NOT NULL,
  `reg_date` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surgery_safety`
--

CREATE TABLE `surgery_safety` (
  `id` int(11) NOT NULL,
  `a` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surgical_site_injection_register`
--

CREATE TABLE `surgical_site_injection_register` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `uhid` text DEFAULT NULL,
  `ipd` text DEFAULT NULL,
  `ward` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `surgical_proc` text DEFAULT NULL,
  `date_of_surgery` date DEFAULT NULL,
  `date_of_ssi` date DEFAULT NULL,
  `wound` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `sign` text DEFAULT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms_view`
--

CREATE TABLE `symptoms_view` (
  `id` int(11) NOT NULL,
  `desc_sym` text NOT NULL,
  `dr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `complaints` text DEFAULT NULL,
  `examination` text DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `prescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_advice`
--

CREATE TABLE `test_advice` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `title` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `logo` longblob DEFAULT NULL,
  `rm` varchar(100) DEFAULT NULL,
  `ro` varchar(100) DEFAULT NULL,
  `dm` varchar(100) DEFAULT NULL,
  `do` varchar(100) DEFAULT NULL,
  `sm` varchar(100) DEFAULT NULL,
  `so` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_employee`
--

CREATE TABLE `vaccination_employee` (
  `srno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `designation` varchar(700) DEFAULT NULL,
  `employeeid` varchar(500) DEFAULT NULL,
  `typeofvacc` text DEFAULT NULL,
  `batchno` varchar(300) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `sign` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ventilator_pneumonia`
--

CREATE TABLE `ventilator_pneumonia` (
  `srno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `uhid` varchar(300) DEFAULT NULL,
  `ipd` varchar(300) DEFAULT NULL,
  `bed` varchar(300) DEFAULT NULL,
  `name` varchar(400) DEFAULT NULL,
  `diagnosis` varchar(700) DEFAULT NULL,
  `date_of_putting_ventilator` date DEFAULT NULL,
  `date_of_removal_ventilator` date DEFAULT NULL,
  `date_of_onset` date DEFAULT NULL,
  `total` varchar(300) DEFAULT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `sign` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `video_name` text NOT NULL,
  `video_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vr_surgery`
--

CREATE TABLE `vr_surgery` (
  `id` int(11) NOT NULL,
  `sur` varchar(100) DEFAULT NULL,
  `ass` varchar(100) DEFAULT NULL,
  `nurse` varchar(100) DEFAULT NULL,
  `hca` varchar(100) DEFAULT NULL,
  `visit` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `s_time` time DEFAULT NULL,
  `e_time` time DEFAULT NULL,
  `proc` varchar(2200) DEFAULT NULL,
  `ana` varchar(100) DEFAULT NULL,
  `com` varchar(100) DEFAULT NULL,
  `refer` varchar(100) DEFAULT NULL,
  `eye` varchar(100) DEFAULT NULL,
  `ot` varchar(100) DEFAULT NULL,
  `case_no` varchar(100) DEFAULT NULL,
  `emr` varchar(100) DEFAULT NULL,
  `asd` varchar(2200) DEFAULT NULL,
  `conj` varchar(2200) DEFAULT NULL,
  `mus` varchar(100) DEFAULT NULL,
  `imp` varchar(100) DEFAULT NULL,
  `per` varchar(100) DEFAULT NULL,
  `anchor` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `vit_l` varchar(100) DEFAULT NULL,
  `vit_i` varchar(100) DEFAULT NULL,
  `par` varchar(100) DEFAULT NULL,
  `close` varchar(100) DEFAULT NULL,
  `dur` varchar(100) DEFAULT NULL,
  `med_l` varchar(100) DEFAULT NULL,
  `med_s` varchar(100) DEFAULT NULL,
  `peri` varchar(100) DEFAULT NULL,
  `mus1` varchar(100) DEFAULT NULL,
  `anchor1` varchar(100) DEFAULT NULL,
  `bb` varchar(100) DEFAULT NULL,
  `sb` varchar(100) DEFAULT NULL,
  `scl` varchar(100) DEFAULT NULL,
  `can` varchar(100) DEFAULT NULL,
  `lens` varchar(100) DEFAULT NULL,
  `vit` varchar(100) DEFAULT NULL,
  `base` varchar(100) DEFAULT NULL,
  `fge` varchar(100) DEFAULT NULL,
  `lpfc` varchar(100) DEFAULT NULL,
  `c3f8` varchar(100) DEFAULT NULL,
  `sili` varchar(100) DEFAULT NULL,
  `mp` varchar(100) DEFAULT NULL,
  `el` varchar(100) DEFAULT NULL,
  `loc_m` varchar(100) DEFAULT NULL,
  `sys_m` varchar(100) DEFAULT NULL,
  `dur1` varchar(100) DEFAULT NULL,
  `remark` varchar(2200) DEFAULT NULL,
  `pos` varchar(100) NOT NULL,
  `inc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wrong_side_record`
--

CREATE TABLE `wrong_side_record` (
  `srno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `uhid` varchar(500) DEFAULT NULL,
  `ipd` varchar(400) DEFAULT NULL,
  `bed` text DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `surgery` text DEFAULT NULL,
  `name_patient` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_maternity`
--
ALTER TABLE `acc_maternity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acq`
--
ALTER TABLE `acq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_invest_imaging`
--
ALTER TABLE `add_invest_imaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulance_register`
--
ALTER TABLE `ambulance_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ana`
--
ALTER TABLE `ana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anes_reco`
--
ALTER TABLE `anes_reco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anumati_consent`
--
ALTER TABLE `anumati_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `an_record`
--
ALTER TABLE `an_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_register`
--
ALTER TABLE `appointment_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth`
--
ALTER TABLE `birth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cc_glass_rx`
--
ALTER TABLE `cc_glass_rx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cc_glass_rx1`
--
ALTER TABLE `cc_glass_rx1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_label`
--
ALTER TABLE `change_label`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_rate`
--
ALTER TABLE `change_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chief_complaints`
--
ALTER TABLE `chief_complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_print`
--
ALTER TABLE `config_print`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cont`
--
ALTER TABLE `cont`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cor1`
--
ALTER TABLE `cor1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cor2`
--
ALTER TABLE `cor2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counsel`
--
ALTER TABLE `counsel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counselling_consent`
--
ALTER TABLE `counselling_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dama_dis`
--
ALTER TABLE `dama_dis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_notes`
--
ALTER TABLE `delivery_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge`
--
ALTER TABLE `discharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge_file_register`
--
ALTER TABLE `discharge_file_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge_routine_register`
--
ALTER TABLE `discharge_routine_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge_sum`
--
ALTER TABLE `discharge_sum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dis_sum`
--
ALTER TABLE `dis_sum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_initail_assesment`
--
ALTER TABLE `doctor_initail_assesment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_inpatient`
--
ALTER TABLE `doctor_inpatient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_round_register`
--
ALTER TABLE `doctor_round_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_administration`
--
ALTER TABLE `drug_administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_reaction_record`
--
ALTER TABLE `drug_reaction_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dr_images`
--
ALTER TABLE `dr_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eye_pre_op_checklist`
--
ALTER TABLE `eye_pre_op_checklist`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `fdata`
--
ALTER TABLE `fdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor_cleaning`
--
ALTER TABLE `floor_cleaning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fumigation`
--
ALTER TABLE `fumigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_info_consent`
--
ALTER TABLE `general_info_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gynec_discharge`
--
ALTER TABLE `gynec_discharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiv_consent`
--
ALTER TABLE `hiv_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `im_reval`
--
ALTER TABLE `im_reval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_register`
--
ALTER TABLE `incident_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indoor_case`
--
ALTER TABLE `indoor_case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indoor_case_register`
--
ALTER TABLE `indoor_case_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inform_consent`
--
ALTER TABLE `inform_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_sur_consent`
--
ALTER TABLE `info_sur_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `injection_consent`
--
ALTER TABLE `injection_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigation_view`
--
ALTER TABLE `investigation_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invest_sheet`
--
ALTER TABLE `invest_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_reg`
--
ALTER TABLE `in_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_view`
--
ALTER TABLE `in_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_bill1`
--
ALTER TABLE `ipd_bill1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_bill2`
--
ALTER TABLE `ipd_bill2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laser`
--
ALTER TABLE `laser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_error_record`
--
ALTER TABLE `medical_error_record`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minor_pro_consent`
--
ALTER TABLE `minor_pro_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needle_injury_record`
--
ALTER TABLE `needle_injury_record`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `new_gynec_form`
--
ALTER TABLE `new_gynec_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses_daily_record`
--
ALTER TABLE `nurses_daily_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_intial_assesment`
--
ALTER TABLE `nurse_intial_assesment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nursing_assessment`
--
ALTER TABLE `nursing_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutri_assessment`
--
ALTER TABLE `nutri_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `observe1`
--
ALTER TABLE `observe1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `observe2`
--
ALTER TABLE `observe2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocu`
--
ALTER TABLE `ocu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `op`
--
ALTER TABLE `op`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_admin`
--
ALTER TABLE `opd_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_bill`
--
ALTER TABLE `opd_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_bill_pay`
--
ALTER TABLE `opd_bill_pay`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `opd_charges`
--
ALTER TABLE `opd_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_register`
--
ALTER TABLE `opd_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_tracker`
--
ALTER TABLE `opd_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_record`
--
ALTER TABLE `operation_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opto_ascan`
--
ALTER TABLE `opto_ascan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opto_examination`
--
ALTER TABLE `opto_examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opto_images`
--
ALTER TABLE `opto_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opto_pres`
--
ALTER TABLE `opto_pres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opto_surgery`
--
ALTER TABLE `opto_surgery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ortho_cont`
--
ALTER TABLE `ortho_cont`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ortho_initial_counselling`
--
ALTER TABLE `ortho_initial_counselling`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `ortho_observe1`
--
ALTER TABLE `ortho_observe1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ortho_observe2`
--
ALTER TABLE `ortho_observe2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ortho_pre_op_checklist`
--
ALTER TABLE `ortho_pre_op_checklist`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `ortho_p_general`
--
ALTER TABLE `ortho_p_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ortho_p_init`
--
ALTER TABLE `ortho_p_init`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ortho_p_insure`
--
ALTER TABLE `ortho_p_insure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_register_ot`
--
ALTER TABLE `patient_register_ot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postpone_surgery_record`
--
ALTER TABLE `postpone_surgery_record`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `post_consent`
--
ALTER TABLE `post_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_operative_surgical`
--
ALTER TABLE `post_operative_surgical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_opnotes`
--
ALTER TABLE `post_opnotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pres_back`
--
ALTER TABLE `pres_back`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_anas_checkup_record`
--
ALTER TABLE `pre_anas_checkup_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_operative_anesth`
--
ALTER TABLE `pre_operative_anesth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_room_urinary`
--
ALTER TABLE `pre_room_urinary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pt_image`
--
ALTER TABLE `pt_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pt_rel_feedback`
--
ALTER TABLE `pt_rel_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_general`
--
ALTER TABLE `p_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_init`
--
ALTER TABLE `p_init`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_insure`
--
ALTER TABLE `p_insure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_log`
--
ALTER TABLE `p_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refr_temp_register`
--
ALTER TABLE `refr_temp_register`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `relative_images`
--
ALTER TABLE `relative_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repeat_surgery_record`
--
ALTER TABLE `repeat_surgery_record`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samtipatra1`
--
ALTER TABLE `samtipatra1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan`
--
ALTER TABLE `scan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgery_safety`
--
ALTER TABLE `surgery_safety`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgical_site_injection_register`
--
ALTER TABLE `surgical_site_injection_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms_view`
--
ALTER TABLE `symptoms_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_advice`
--
ALTER TABLE `test_advice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccination_employee`
--
ALTER TABLE `vaccination_employee`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `ventilator_pneumonia`
--
ALTER TABLE `ventilator_pneumonia`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vr_surgery`
--
ALTER TABLE `vr_surgery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wrong_side_record`
--
ALTER TABLE `wrong_side_record`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_maternity`
--
ALTER TABLE `acc_maternity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_invest_imaging`
--
ALTER TABLE `add_invest_imaging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ambulance_register`
--
ALTER TABLE `ambulance_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anes_reco`
--
ALTER TABLE `anes_reco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anumati_consent`
--
ALTER TABLE `anumati_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `an_record`
--
ALTER TABLE `an_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_register`
--
ALTER TABLE `appointment_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_label`
--
ALTER TABLE `change_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_rate`
--
ALTER TABLE `change_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chief_complaints`
--
ALTER TABLE `chief_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config_print`
--
ALTER TABLE `config_print`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cont`
--
ALTER TABLE `cont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselling_consent`
--
ALTER TABLE `counselling_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dama_dis`
--
ALTER TABLE `dama_dis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discharge_file_register`
--
ALTER TABLE `discharge_file_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discharge_routine_register`
--
ALTER TABLE `discharge_routine_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discharge_sum`
--
ALTER TABLE `discharge_sum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dis_sum`
--
ALTER TABLE `dis_sum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_inpatient`
--
ALTER TABLE `doctor_inpatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_round_register`
--
ALTER TABLE `doctor_round_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug_reaction_record`
--
ALTER TABLE `drug_reaction_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dr_images`
--
ALTER TABLE `dr_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floor_cleaning`
--
ALTER TABLE `floor_cleaning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_info_consent`
--
ALTER TABLE `general_info_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hiv_consent`
--
ALTER TABLE `hiv_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `im_reval`
--
ALTER TABLE `im_reval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incident_register`
--
ALTER TABLE `incident_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indoor_case`
--
ALTER TABLE `indoor_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indoor_case_register`
--
ALTER TABLE `indoor_case_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inform_consent`
--
ALTER TABLE `inform_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_sur_consent`
--
ALTER TABLE `info_sur_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `injection_consent`
--
ALTER TABLE `injection_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investigation_view`
--
ALTER TABLE `investigation_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invest_sheet`
--
ALTER TABLE `invest_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_reg`
--
ALTER TABLE `in_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_view`
--
ALTER TABLE `in_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laser`
--
ALTER TABLE `laser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_error_record`
--
ALTER TABLE `medical_error_record`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `minor_pro_consent`
--
ALTER TABLE `minor_pro_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `needle_injury_record`
--
ALTER TABLE `needle_injury_record`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nursing_assessment`
--
ALTER TABLE `nursing_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nutri_assessment`
--
ALTER TABLE `nutri_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `observe1`
--
ALTER TABLE `observe1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `observe2`
--
ALTER TABLE `observe2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ocu`
--
ALTER TABLE `ocu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opd_admin`
--
ALTER TABLE `opd_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opd_bill`
--
ALTER TABLE `opd_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opd_bill_pay`
--
ALTER TABLE `opd_bill_pay`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opd_charges`
--
ALTER TABLE `opd_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opd_register`
--
ALTER TABLE `opd_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opd_tracker`
--
ALTER TABLE `opd_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operation_record`
--
ALTER TABLE `operation_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opto_images`
--
ALTER TABLE `opto_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opto_pres`
--
ALTER TABLE `opto_pres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ortho_cont`
--
ALTER TABLE `ortho_cont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ortho_observe1`
--
ALTER TABLE `ortho_observe1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ortho_observe2`
--
ALTER TABLE `ortho_observe2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_records`
--
ALTER TABLE `patient_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_register_ot`
--
ALTER TABLE `patient_register_ot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postpone_surgery_record`
--
ALTER TABLE `postpone_surgery_record`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_consent`
--
ALTER TABLE `post_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_operative_surgical`
--
ALTER TABLE `post_operative_surgical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_opnotes`
--
ALTER TABLE `post_opnotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_anas_checkup_record`
--
ALTER TABLE `pre_anas_checkup_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_operative_anesth`
--
ALTER TABLE `pre_operative_anesth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_room_urinary`
--
ALTER TABLE `pre_room_urinary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pt_image`
--
ALTER TABLE `pt_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pt_rel_feedback`
--
ALTER TABLE `pt_rel_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refr_temp_register`
--
ALTER TABLE `refr_temp_register`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repeat_surgery_record`
--
ALTER TABLE `repeat_surgery_record`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `samtipatra1`
--
ALTER TABLE `samtipatra1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scan`
--
ALTER TABLE `scan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surgery_safety`
--
ALTER TABLE `surgery_safety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surgical_site_injection_register`
--
ALTER TABLE `surgical_site_injection_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `symptoms_view`
--
ALTER TABLE `symptoms_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_advice`
--
ALTER TABLE `test_advice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccination_employee`
--
ALTER TABLE `vaccination_employee`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ventilator_pneumonia`
--
ALTER TABLE `ventilator_pneumonia`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vr_surgery`
--
ALTER TABLE `vr_surgery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wrong_side_record`
--
ALTER TABLE `wrong_side_record`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
