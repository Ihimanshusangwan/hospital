-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 09:47 AM
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
-- Database: `hospital_db`
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
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin@webifly.com', '123'),
('admin@webifly.com', '123'),
('admin@webifly.com', '123'),
('admin@webifly.com', '123');

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
  `remarks` text DEFAULT NULL
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
  `new` text DEFAULT NULL
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
  `sign` text DEFAULT NULL
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

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `address`, `taluka`, `district`, `age`, `sex`, `dob`, `reg_date`, `mobile`, `email`, `password`, `type_of_visit`, `signature`) VALUES
(1, 'Dr. Himanshu Sangwan', '', '', '', 0, 'Male', '0000-00-00', '0000-00-00', '', 'ortho@gmail.com', '123', 'Ortho', ''),
(2, 'Dr. Tanya Mishra', '', '', '', 0, 'Male', '0000-00-00', '0000-00-00', '', 'eye@gmail.com', '123', 'Eye', ''),
(3, 'Dr. General general', '', '', '', 0, 'Male', '0000-00-00', '0000-00-00', '', 'general@gmail.com', '123', 'General', '');

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
-- Table structure for table `incident_register`
--

CREATE TABLE `incident_register` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `incident` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `sign` text DEFAULT NULL,
  `action` text DEFAULT NULL
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
  `bill_no` int(11) DEFAULT NULL,
  `receipt_no` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
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
  `description` text NOT NULL
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
  `instruction` varchar(3300) NOT NULL
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
  `id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
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
  `sign` varchar(400) DEFAULT NULL
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

--
-- Dumping data for table `opd_charges`
--

INSERT INTO `opd_charges` (`id`, `description`, `amount`, `qty`) VALUES
(1, 'xray', 300, 1),
(2, 'ct scan', 1000, 1);

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
  `investigation_imaging` text DEFAULT NULL
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
  `follow_reg` tinyint(1) DEFAULT 0
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
  `sign` text DEFAULT NULL
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
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `name`, `address`, `taluka`, `district`, `age`, `sex`, `dob`, `reg_date`, `mobile`, `email`, `password`) VALUES
(1, 'reception', '', '', '', 0, 'Male', '0000-00-00', '0000-00-00', '', 'reception@gmail.com', '123'),
(2, 'reception 2', '', '', '', 0, 'Male', '0000-00-00', '0000-00-00', '', 'r2@gmail.com', '123'),
(3, 'reception 3', '', '', '', 0, 'Male', '0000-00-00', '0000-00-00', '', 'rec3@gmail.com', '123');

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
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `address`, `taluka`, `district`, `age`, `sex`, `dob`, `reg_date`, `mobile`, `email`, `password`) VALUES
(1, 'staff', '', '', '', 0, 'Male', '0000-00-00', '0000-00-00', '', 'staff@gmail.com', '123');

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
  `sign` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms_view`
--

CREATE TABLE `symptoms_view` (
  `id` int(11) NOT NULL,
  `desc_sym` text NOT NULL
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

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`title`, `address`, `mobile`, `logo`, `rm`, `ro`, `dm`, `do`, `sm`, `so`, `id`) VALUES
('Webifly Solutions Private Limited title', 'Webifly Solutions Private Limited address', '123456789', 0xffd8ffe000104a46494600010101006000600000ffe126544578696600004d4d002a00000008000d000b000200000026000008b6010e00020000000b000008dc011200030000000100010000011a000500000001000008e8011b000500000001000008f00128000300000001000200000131000200000026000008f801320002000000140000091e013b00020000001200000932021300030000000100010000829800020000001200000944876900040000000100000956ea1c00070000080c000000aa000011da1cea00000008000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000057696e646f77732050686f746f20456469746f722031302e302e31303031312e31363338340077616c6c75702e6e657400000000006000000001000000600000000157696e646f77732050686f746f20456469746f722031302e302e31303031312e313633383400323032333a30363a30332030383a35383a303500687474703a2f2f77616c6c75702e6e657400687474703a2f2f77616c6c75702e6e65740000069003000200000014000011b09004000200000014000011c4929100020000000332320000929200020000000332320000a00100030000000100010000ea1c00070000080c000009a4000000001cea000000080000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000323032333a30363a30322032323a32353a323500323032333a30363a30322032323a32353a32350000000006010300030000000100060000011a00050000000100001228011b000500000001000012300128000300000001000200000201000400000001000012380202000400000001000014140000000000000060000000010000006000000001ffd8ffdb004300080606070605080707070909080a0c140d0c0b0b0c1912130f141d1a1f1e1d1a1c1c20242e2720222c231c1c2837292c30313434341f27393d38323c2e333432ffdb0043010909090c0b0c180d0d1832211c213232323232323232323232323232323232323232323232323232323232323232323232323232323232323232323232323232ffc00011080090010003012100021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f9fe8a0029d40051400b4b400ea29885c52d301714b8a0400518a007528a6018f4a69148a10ae6936d161098a6e2800a422900da290c4a4a004a2800a2801696800a75002d14c4380a5c5310ec514c029d8a005c5262800ed4e14c07814c239a56283349d6810857bd308a4c04a6e290084521a062525201292800a2801d45002d2d02169c05303a7d25edd74b8fcc4b00c588ccb210e79ef81d2aedbc6653e4dadbd95cc68558912005465f0a4903392c39c60607b576476563cc9e92776ce7b5689e3bd0248561631a1daac083f28e78f5ebf8d51c0ae696ecefa7f0a0c52d22c78148d4c42638a5c7340c7f6a6e32698c6e3069452003d31519a4c634d36a404a69a004a4a4025250014b400b45002d385310a29e0531337b4e9ade3820f30dc2a01972a0e33bc671e9f216ad11a63b5a6fbbb1d444d19218891577753c0dbd060f35d5057479f525caf56636b56a2d6fc45e5dcc6446b95b820b671eddbb7e159f8ac66ad2675d2778262014e02a4d0762908a63140a523071400bb4d006298c8cf34520148a6114ac03714c239a918c229b8a402525200a4a004a750014b4c05a5140855a9453426751a2d9c975610c3f636944a485c5e08f3cf7527f0ad75d3ef8acd34a2f618562c46a9761b2470464e7a06e9f5aec8276479556a4549dd9ccf8820b8875778ee5a56955406323ef6c8e0f23df359a471cd613f89dcefa56e4560029db6a4d45c526298c704a704e69d801947e3519140098f5a4dbcd2b0c3ad376d00371cd31b06a580c229a6a406d25263129290052d0014b40870a515421c2a4514211d2697710258431fee9640c72ef74c98c9eb81d38fe75a06e6ccaf10db83e61c62f5bd47239e9ef5d716ac79d5232e66ff430b50956ef52fdc4382e170ab219393db279cf3f9d685ae8098592e4caff0026e7845bc808fc40fd6a147999bca7ece09752e8d36d2031b7d859518ec7596de5620e0b71c0e7802a7934eb372910b6f284ed8898d948a5b2320024e3d7f9d68a28e7f6d2def732f50d1628eea486192284c6ecb891db73007838dbc67afe358af1b452156ec7008e87e9594a363b28d55356ea28c96000c9adeb7f0fa6e8a49b50b128769643363826aa11b8ead5e45b1a0ba3694cc5835b95e47377f5190319a745a35be7642904a922ff00cb3532b273c6e38f949e315b28238e55e56f7ae507f0e42893398aedd154b070a401e9c6dcd63c9a636516d1daea46ce52389b206339e9cd672a76d8e8a588bead9431b4e08a6939ac4ea1ad519e950c630d348a960369290c6d14804a5a0029d4c428a70a621e053853133a4d33c94d3e32f2dc86c1621205603e618e48fafe55aeb7c91c4cdf69bb2c06d51f628c678cfa715d71764797562e527a7e20d0da4af2dd4297eed285d99b301319ebc29e00c53c5c08903182578b8b8463bd7071d490002318edf8f268b8926f77fa9a8758b992413620f39013192729cf5f978ed9efdcd568352b877f2a0587c9846c4277108ca40c8f700b2fe27da9f35ccd50496a57bd78e3f3ae1d972c72e4c927cac47ca38c7bf6ed595a8795a818d223079cec0e7738d83078cbf00527d8eaa4dab3ec59b0b64d3a30f1dd45e63e37159616c91e9bbeb5712669f4f55babd444795a362122002eec647cb96e33f3038154b456227694b99a7725f27493750a49ad3c45919999248f8381f2ee000f5e4f1f2fbd11b69124f69709aa98cc2aa26ccc15a5e4e091f5ebe83f3a778f727f7ad7c256b675b9462ae1a324464904e4f7cfcdedd7deacdb46d25cb66686082211e54e4300cc41da4b10081c7b8a57454a3249ab18fe20d26d96d52eacd918e5536c7c97ca86ce00e38233ee715cbe0f7ac6a2b3d0ecc3cdca167ba1b9a69e9591b91914d352c634d36a4625252012968016945021c29c2a843854aa05344b3a3d2e4b71602292661bb01879c557196ea003d3dbd6ae1bd89a56926919a47270ed70c4e08039f97d18fe55d29e879f34f99ea5092e2da0b769218d6393002ee76707a762319acc9aea5b89379c20c636a0c0fcaa24fa1d14a0b764400cd5882ea6b575789c8da7201e47e5509d8ddc535666f69d7735ed9dc426563bd7f78a23503b81ce47ad6da5b6a3f69fb4c8be532816eb8453b812083f7fdb9c702b75aea70cd2836ac568a1bb29a6a42923c36e4bc4c61c649e4670fc8e7dbb5635fddcd6056dadeea40c99dc0280002777504d36ec8aa4b9a76fd4c3662cd963927a9a5db9ac8f4108aef0baba6320e79191f956cd84ef79060ce3cc56ff00571d8ab9c7ae40a7193bd8c6bc135cd62f25b496a046ccf19914050b6b2839c6781903271fa71581ab5b7d9ae33b5d4483700d13263e9bbafd69cd6865464dc8cd03bd211cd62750c61519a9631b4da431292a404a5a005a514c4385385310f1520eb4d12ce874949dece364b99d141236a3281fa9cfe95ab6e8e1231e6df12a8802908bced181cf38c11f9d744763ceaadddd9185addc3c97090196491631b8ef03ef3727a7e159bdab396e765156821e0734fdb9a46a59d3e75b4bb495d3cc5070c84901beb8aed9a48143b450e9bd493e65cee1866cf007700e3e95b43639712b54caf6be5cc0b4b3d944f16e50aadf29f98f4f98762001e82b22fb40c5cc8d1ea366ea5883fbd190719e07a76aa6ae88a7579256b19cda39568c1bb85b7b053b0e4ae7bfe1fd2ad2e80bf6f302dd8923e42491804310327b818c67bd4729bfd63b222bbd1248618e489d9d644debbc05dc32a38e4f76156744b46d3af0dddc44d70b10613db2c6c4919da4640c71d739a56b31caaf342cf46cea62bf4b8909fec70b1e43b22b46c43146ddd5b8e5f8f4000c76accf1541f69f0edb8874c86dbec7123cae19491c88c8c83ce58eee956ddd1c94e3cb516a703da90d739e991b5466a58869a6d218949523129680145385310a29d4c4c78a7ad344b3add0b5216ba3884c764f23bb04795fe6418e38c7f7b0df856ac5ab5aaac123fd9d9a13c0f333ff002cf61c00bd73ce4e7a574465a1e4d6a49cdb4d9c9eb5289f59b995420576c8d872318fa0fe5d6a977acdeacf4a96904bc878f4a901e284680065801d49ee6bbc4bc8bcb6db6d6a85a21182b22924fc9c91bbafca7f3e95a40e5c4a6ed6269239e0984505bdab2acd2c87cce1833ee5507078505b9e9d07b0aa7751412c090c88b1b4b1c4e3691c90172011ec3afbd59c91924d34c4ba296c9b6586e9c46c3714b9dd9390ac074e326aa379125cdb3cba7df0756059a57dc36f23eef5fbc4719e831cd4f537836f54cd486d6d5b4f2b2d887ba527f7b1db045e9c60153df1db1edde9b05d5845e6c1169d70db008e48cdb12c708ff3123a124a1edcd0f7314a77dca9762ce6852dad6da6fdd398897471bc2e1412546724e7f8b0338c565ea502c5a7dc0fb334642e4b6e9783b87f79b07fcfb54b3a29b69a573952726986b13bc69a8cd201a69b4804a4a91894b400a29d4d08514e14c4c70eb4fa68474fa2595c5c5846634bd23772d14caaaa09c038233d73f91ab896d7716ef26de57409c7997614839ed8c7a8ebd715699e7d4a91e669b32b5bb1bdb59927b9b731c726511b7960c54e0f279acc046299d54a4a514d0a2954f341a172c2ddeeaf15235ddb3e76f9770c0f515d35bdbb46645962877a80ea709160138cfcc39fc2ae2ce7af257b1575168123798cd7444870523ba4619ebd00e95ce1bab900a1b89b68c0c6f3dba50d974526b5433ed5707e533cb839c8de7bf27f5a5dec57ef313f5a9b9d0a31ec3b7381f7dbf3a45ba9c1244f2a9ee431a6c3963d8635c4e3813ca14f3f78fae6a196e269386964618e72c4d430e58f62234d2690c61a69a901a4530d218949520252d0014e1408752834c07034f14d12ce8f4c4074f89f68241db8170573cf191db07bff00faead156282389a404931362e492181193f8e0fe7ed56704be27fe42cda6adcc182eecc0021e4bb570bbb1cf03d4d73f736ef693b43215665ee8d91f9d1735a33bfba440d3e357760a8accc78000a6746c749a2413d8cab3471894cc9b4c52db3907241f4c70475ada3aacd198730d9b48b23c999636407ef03ffa1fe82852382aa8ce776ca4b2ab46c495f36557959a398aa72d9c00074e47e558771a55d98e4b9e2551cc8e18753ce39ea68e636a338c5eaccb911a3936b29561d4118a4183de99da9dd5d1280f238545248ad78f42f32052f71125c1ce50c8807b73bbfa5331a957976332f6d64b37f2e4d84919ca3061fa55023bd2669195d5c61e2a326a1942134c26a404cf14d34804a4a431296800a75002d14c43c1a7ad3423a4d24dc8d313cab48e41b8fccd0ee27db39ad3b9f35a1554816342401b2d47cde9fc67d68b9e6ce3efdff52ac50c924ef1c68a36c619835b2af19c0ea7e94e934a65606648d774bb09754e0ed6f46c632a7d318a39acc6a5cafccb10e97341233887631e5b7471e31c9e033751cfe1539b49618192ee3789d0e5a44312af07f848e71c52e625cf998823923bb83ecd26a0d0aa9dca8ea7e5e30011eb81f8014cbad4afb4131c901b81e6c46322e483b464100631e829c752e1153767d49e2f113dc5bdac76ad0ace2131bf9acc793b476c2af0a3daacbdeea7b9c2ea1a7638247cc41393d324e7a93fe4526d2d189d38c749153c8b49a5696f1f4d9a66246e69d800002319c9e781eb4369ba55c2b102ce3542a59a29b711d781cf3d076cf34733e83f6935f09325ac36de5ac49be0f31d1bec72387200393cb11ce53f5f4a9cc3a7c2a65921bbc065cbb7cce54119279e3233d7e83d6b4e6d4872a927a19bad5c5879536f50d097cc4a2705b763db3c727ad718c79fad36ee7661d49475186a36a96740c34d352c634d2520128a40369d400528a0075029a10e14e1d6988d8b3d42da0b64472e586411e5a9039ed9fc6ae47a9e9e4c6f2194483ef6d89319fc47ad4f2b38e7464db69142e6f145eacf66ee3e519dca073dc6070455c8358131896edd861b07e45da3279381d4e2aada152a378a7d4d8b59ad2e24551a83c994f990478ebb7d4638f9bfc9a749751292b24ca913a925650b93f37038fc49acecefb1cea0efb199a96b4247448d8ce221b0195548c71d31f4ac892569642eddce703a0fa56b1563b29535157162b89ad9fcc82468d88c654e38ad4835c2f3a79c8501e0c8b2b8207e67f9536ae54e1cdaa3561d56d11447f6c022dc5946ecf249c96263e6a61245790973344f1076742c88496c600e4ae4658f6ede82b3b34724a9c96a66dc6a1a6a2322cf336d1b557c95033b812719c7406b36e75245706cb781c83e622e7939c715693ea6b0a2dbf7919d23b4b2b4ae4166393818a61c551d4959588c9a8da9318c3486a0630d14804a4a004a5a005a2801d4a2810b9a78aa10ea5069887034f069dc42e4519a0690a0f34fcd031d1433dc31482279582962114b100753c76a27b79eda5f2ee219229300ed910a9c1e9c1a2eaf61732bdba8ca4c531e8298251079fe5bf93bb66fda76eef4cfad47cd204d0734c26806d123d9dd2c3e735b4c22e3e7319dbce71cfbe0e3e9514f0cb6f33453c4f148bc323a9047d41a1a6898ce2f6635a0996059da2710b315590a9da48ea01f5e47e7509a96ac5269ec368a9284a4a004a5a005a28014538502169c2a807034b9a04381a5dd4c42e6806818ecd2e6802fe91a8be95aadb5f2a96f25f2541c6e1dc7e22ba1ff0084d6ddd49b9d252795e5667919c64a96278f9786c10b9e98038a89d3e67739aae1fda4b993b15a3f14da26ab7575fd94be54d0c71222ba868f601c82548e71cf1deae278daca1b68e38b448d1d2211862eaddd72795ff64fe7532a6df52278594bed14acfc5b6f670de4474b49527b879d23671b1770c05236f207b11d0512f8b6d24d7ad7501a44423851d5a12cbceecf43b71c678c83d2b683e507846e4e5cdbff009161bc756a648dbfb0adb0970646fbb964da405fbb8c82c5b38eb8e2a487c7160f7999b4b862b5092168846ac64738d9c803182327f1ae98e212dd1cf3cbe56d26c8878f94dbdbc72e9de614444903382ae1430e06de33bbf4a7c7e3bb06b83e6e8b10899b393b58a1dfbb23e5eb8e3fce29fd657544bcb65bc6462f8ab5eb4d62754b28648a046dca1b001f91149c01c1ca935cde6b9aacd4a4da3d0c35274a928bdc4a4ac8e80a6d00145002d2d002d283400b4b9a621734034c07669734085cd2e4d003b3c5381a005ce693bd3186ea42d45c061e68a4021a6e680133484d0034d3690052521894940051400b4b40052d002e69734c419a5a00752d020c739a7530169c0d002e714ddd9a0619a4cd00266901a4004d34d003693340099a6d200a4a06251401ffd9ffe133a8687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f003c3f787061636b657420626567696e3d27efbbbf272069643d2757354d304d7043656869487a7265537a4e54637a6b633964273f3e0d0a3c783a786d706d65746120786d6c6e733a783d2261646f62653a6e733a6d6574612f2220783a786d70746b3d22496d6167653a3a45786966546f6f6c2031302e3039223e0d0a093c7264663a52444620786d6c6e733a7264663d22687474703a2f2f7777772e77332e6f72672f313939392f30322f32322d7264662d73796e7461782d6e7323223e0d0a09093c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a64633d22687474703a2f2f7075726c2e6f72672f64632f656c656d656e74732f312e312f223e0d0a0909093c64633a7375626a6563743e0d0a090909093c7264663a4261673e0d0a09090909093c7264663a6c693e77616c6c75702e6e65743c2f7264663a6c693e0d0a090909093c2f7264663a4261673e0d0a0909093c2f64633a7375626a6563743e0d0a0909093c64633a7469746c653e0d0a090909093c7264663a416c743e0d0a09090909093c7264663a6c6920786d6c3a6c616e673d22782d64656661756c74223e77616c6c75702e6e65743c2f7264663a6c693e0d0a090909093c2f7264663a416c743e0d0a0909093c2f64633a7469746c653e0d0a09093c2f7264663a4465736372697074696f6e3e0d0a09093c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a7064663d22687474703a2f2f6e732e61646f62652e636f6d2f7064662f312e332f223e0d0a0909093c7064663a417574686f723e687474703a2f2f77616c6c75702e6e65743c2f7064663a417574686f723e0d0a09093c2f7264663a4465736372697074696f6e3e0d0a09093c7264663a4465736372697074696f6e20786d6c6e733a786d703d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f223e3c786d703a43726561746f72546f6f6c3e57696e646f77732050686f746f20456469746f722031302e302e31303031312e31363338343c2f786d703a43726561746f72546f6f6c3e3c786d703a437265617465446174653e323032332d30362d30325432323a32353a32352e3232323c2f786d703a437265617465446174653e3c2f7264663a4465736372697074696f6e3e3c2f7264663a5244463e0d0a3c2f783a786d706d6574613e0d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020203c3f787061636b657420656e643d2777273f3efffe003c43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763830292c207175616c697479203d2039300a00ffdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110802cf04fe03012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fcaaa28a2800a28a2800a28a2800a28a2800a28a2800a28a280179a16979a4fbdf5a003f8a8db4bed474eb4001e6940cd0bd68e734000e99a7527414b4005145140828a28a06145145001451450014a0518c50050028ed4b480628e7d69d805a2908cd2e09a4014bd4e722930476a753b807a7ad2f61ed4801cf22807da8b8ae14a38383f952f4231499f5e4d51238e4939a423f0fa5264007d694e3f0a0038ee697bf02803752f4c6050020e9d697273c5046290e49a005e4f5eb4a0639ef49cfa1a5ce29d8039a5c8c0f5a060034aaa0af3eb4c007cc6958638eb8f4a36f3c53972578e327140ae464d19a7118273da908a062f2060fd68efdb8a3a9e4538723a50011b0504e3f1a50ebb48e4669a30d9ce48a5c97238c0ec0501a09bb383d0d393d320526065874a776c76a09179cd211f85281b475a56c73d714008149ce0fe54bb7071d7eb49b4f23b9a391d3a5002e327b0fa5263fc8a5efcd2f43eb4c06eda0019cf4a7638f6f7a4c153c72290063f1a439e38e297a1f6a5ebcfe9400c2bbb8270290a85200fc0d498c0f4a3fc28284562060f6e869c09e79a40a4a6314282a7140ae3f3b8f24702948e68db9ff000a5e9df35632361f35373b481ef4f6e39a69f980e0e735021db40ef4dc01cfad3bd292aac21ca78c76f4a711951d6999e734fdc71d298074e0504631c75a55c6d1de8614ec3b8200ab4e8946dddd1a98bd85394707e94801c6d2a31b89ed4e444dc33c63d29236f9c646ee39a93ca0ee48ce40ef405c6aaaee2300e69c7057ef119a6a3aa3138c1e9cd48a1142f39fa76a00accc4720f4f5a72ee2bc2f5e94e68cb3f07e5269514853c719a5618d1b5579279ed4b80abdf3d8d35d791edd29382a79eb4ac317ceda30067dcd0082c3e51f4cd21c638cd0aa7d714ec5092a10e3914d0006c33607ad0e581c1c1cd35b71c7a0a9015db8c29c8f5a6c6028e724d38f341241e7f4a40054e79fc298a0e3f4a7b36304934121beefd68b011903918fad46c3f002a73f779ebed4d2aa010334c0894678fd6820f03a0a794046e00fd077a4fe3c0ce3140ae1b4670694a82a78c6453707711fad3c700d0490c63a7af4a4236b11d853e35a732e1fb50318391eb4a7e6ed8f5a7e4b1c74148ca324558866401ed4cdd96f5a94a9500839f5a615e7a7bd48063e6a66d218f3cd4841dbc1a630c39fe9414830411c628febd286e1700d237dd1d690c5068ebd281818a70e7ad040dc647b8a0afe74a57ae7068fbc7ad0037fa51f514a78a45193520371c51fc269ccbb4d348fd680131ce28c7ffa8d29001ef499ed8fc682c438c7a5232e29cdd3b52633d2801add68228a32714000345149d2a6c02d140f9a948a403768a0e2968a006ff0d1f7a9d49d3de8013a9a4a295a80128a28a0046a1ba52d21fad002753494fa650027f152f3451cd00271494bb692800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a5db499a7734007349eb4b49c5002fd6971c669297a7d6800eb4bf7a85a5a0029077a5a2800a28a2800a506928a0028a28a005db49d2976d1fc54ec0253e9368a00c516001c0a5a2976d30129c172681819cd2e78c548ae26303da80dc934529f614122f1da85a3ab734018a602375a76075fd283ebd71467a55008485edf9d2e78a08a76d18fc28014f3401403c7b5078c734c90c7381cd27f3a716e28e3bfe94c771bb79a52dedc52b2e28ea718340c43c0fad39168fbb4e5e7da810aa3b8a0e49079fc28272bc71da9ca073dcf7f4a0433cbc0ce73ebed470a724f4a56249cd2f45a006038c60734a3a673db9a366075c66902f140c40d8ce3bf5a954164cf60324d460707fce6a60c8b1a85c918e41f5a008c9c6314833de9e7a8e8693a77c934087500714d5e0f3d29c3ad001b4d3a931cfa53bf86826e25146334a1680b898cd38af3d307de85057b53f071ea3d69d8a23c7bd007b53881eb49d7da9d804da7bf1470334adc75a4ec7038a910ab4e908c74a40005a50b923bfa555863776ce0f39ef4b93d4f34ac9d734d071f2e4531dc01a4e718f7a70c0eff008527d295805da053090a47a53f71e2953af407d8d31098f9476cd381553c138f5a42a573499f5e9e940128da46338a6392074e4719a14647bd2b60e00e4d55c00f20702861b723ae3b521cf5269c31bbebda9808bf5fca9c99dde981d682b9e734b8073cf6e4d2b00718e7a75068726418031eb8a4da07dd3b877a9186d0bd411de95808d1bf87a1cf43eb4f4c1dc091907a5322c316dd8cf34a9205520819cf5a68a11b20f2739a8c273cd4b286c01c628c00b9ff002691486ed1db39a46e8491cd4bb9768ec6a16538f5a431bc3007de9e000b4cc6c51cf00d49b703ef75ef52046ca01c52918f7a5230dc74a037239cd3b00c0015e79a180c027d7b5487a923a7614c74ca139e9cd315c0a9039e7f0a6852a460633c735305cafa5300cf3d853b05c8954f4ce00a400963dbf0ab0aa4363000ebf4a6151d41c827ad16248907ccde87ad0c993daa609d0f147944924918f4a5ca2b94d51c77ef4e39dd9a9101dc73ebd29cc9966cd4d8640ccc0e7bd3949ce71cfad38a0e39cfbd3891923bd501131f418f7a6e32b82724d4cc80ae71f8d37cbe318a5601a32abcd324f99877a76df9704f4a6b2ede948a4002907b0ed9a4084b7ca451bb039a382063814863991c1e471eb4838e31484b13824934ec9073de815846524f5e3d0537ad499e3b934d38e9da8246e71dff001a4cfa8a701ce290e08eb4805c1e3f953580edf9d29078a45a4034fe74846297a352d055c6e71494e6a43d05318c228a76334878514804a2948e9ce4d2639a0000a5e4d2a8ea28e82a6c0368a5c7cb494804eb487ad3a9adf768006a41cd2edc8a3d680128a28a0028a28a004db499c9eb4bfc54da0028a5fe2ed494009fc34351f8d18f9a80128a7734da0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a005c73ed4bcd27a52f340051f5a3a0a28017ad0bd685e453a80116968028a0028a28a0028a28a0028a28a7600a28eb4bb68b002d28e685e94a066a804e94b4a38eb4bf873537004f7a70e78a45eb4beb48913f0fc69781da83da823da9d840796a1a8db4b8e68b0051d68a31c5300ebed4ec60f6149fca8cf1eb4c031cf2695971d39a4e4e29ddfda9d8029dc6ea4e8697ae0d3243af07b5381017a0a42bc76eb4a3fbdef4006dedc5215ec29703ad3b3fe3400c23d39e3bd2af071eb4b825b9fd29c07e7400ddbf97bd3c0f94fe78f4a3207349d00e7eb5560060303b527de39a72fcc49e7a600a319e4631eb458069e0f4f6c5205c81eb4e2bdfad3e35f9b381fe14ac043839006726a452c3e41c834b8eea7a7348180c363f034ec02905893d299fa0f7a909e3d4f7a419e41a2c020f94e29d48ad81f4a5a600793ce69d9c2903bd211cf5a0119eb4103c28da7919ed4671c6293208231467008f5a0070e98ef4a0e05341c934019a658b8dd8c520e84714a4e17a9a6e7a7b52006c9ed4de57b5484e47f3a69c9a007a3052700d05831e9c8a3951c1eb426dfc4d00213950723e94dc06ef4e2064f4140c28e832280198c60668e69dd56930571e868014b103a534b0a539c60d038a00109da452ed348a0839c52fd4d00007e343b7ca38c7be3ad395a9a5c1e319aab00acdbc0ce49cf3522a95048e9d32698cdbd9410060f514e2e49c678a602ed054e475a746a761e415039f5a8cfa67eb532a111ae0ee27d38a0071088a300fa935248caaa718e57bd57421586e240eb4e91831c31c927a8a63b10f96dcb08f03b52ec1ceddc47424fad5845cef52d903807d6922621648fa835231b1f0554a8240ce4d4a72d010571c9c0a11be5c738e99a77cdf29273c720f7a928aeaa76924fcdde99fc27afe3539f97a8c63b5324532484118623ad032b63e43cf7a7ab1c0c0ce28287e71f7b1d683f2e36f5a4026091eb4980318e29eabbb1edde860376324fd69a0055039fd294f19e339ed4f09b782706948db41046a014cf3f8d30310718e33d2a7d800ea4546f18203633cd5809b5b6b2f4cf6a8f1b5003d8e054e233d083f4a6b2169381919e99a0040720f23a74a672a78209f4a7f97863c01cf4cd2f959246060f4a0562be70cd9e0d05b007e7815230db20c9e4ff09a1a3e70474a56020dfea29c7ae7f5a7489c29c00695a324f5fd2a40873f301d7bd38739c9e29de5e0e73f953578007eb405c6ed073cf4a638cbe39c54e00c9c5366001c526344614374a0a023a5386324e31f4a5db9c1dd5255c8954af639eb4b804f5e7ad3c8287383cd34648c8ede940c456c53493bb95cd388a01233e940ac31989627183ed4831dc669c400471cd3776474a09178c7a1a6919e69cb9f5a69cb1e7bd2b00da29cc00efcd3690075a3a518f7a5dbc55163077a4e8467a53f1ef4d3c638a40215e3da9a0669e41c66931c9f6a401ce28a70e47f852375a0042693ef52f3498c7353601290f34b45201bed494efe2a465cd001fc349451400514638a2800c7348452d1400dc9a4c629d8e7da90f38a004239f5a4fe1a5a09a0046a4a5fe1a3f8680128a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a77349b68001cb52f5eb4514007438a55eb49d4fad1400bf5a752639a5a0028c734514005145140051452fdda000600a4a28ab01739a1697f8a9d8c11eb5370055ee45281d3fc681c8fa7b518f4a2e4036297ad3723d294739e290c7018a169318ef4bf8d0202334b49ba96ac031cd1b4d1d694734007f151d80a3d7838a01e78a61a02f2793c52af4a4029de94008a3f5a71347dea53cb67a76aa1015f97fc680324632694e7000341ce41ce2908523200c8e7d6947bf414607ff00ae94283c019f7a09b8c3d334aa0d2a8f5e94bb4eec6682839cfb52b75c71c75348415383c1a50368edeb400edbc0c9c9ef49b7e5a7a9c1e7e95345179b95dea303396e2ad1372b85c0cd38a8181fa1a7c8368047e751ff0008f5ef405c33c63bfb5049c1a0f5a1c13dfad3286e0526704fbf7a5c138f7a73201907a8a40341c71d69c54629b9c75a51cad201460d03d2918e0e7ad2f34c0503736075c6693a528eb4a467de90074fc69f8ed8c1a8ca8e29e3dce3e94c9b099e714bfce82016f5cfa528031414206c83c52639cd4bb02d21071822801a14e3b629849f5a976771d3de908db8cf7ed41371aad9e324fb538a9c11d714e040603a1a73052b8039f5a02e46c858e7693f4a5319001e73e9527cec000d9fc29ac71d41cfa9aab0c6e00190c3e94d1d3ad380ebefe9408c9f4a2c3181be6c1eb8ef4bcf51d6958007f9d2038cf71e945805049e69553773919a41f29c773fa53829c600e73de8b00833bb19143e0919e0fa8a50093c75f5a4c9dd8ea33de98015c1cb0047a7ad2ec50327934d98861f2e411eb422b6dc96cfa0a001b6aae47ffae9e0164562df85232e47d054a983102076a008d87032dc8e829c1cab2a9db8fa538005bb00073488bbd893903b52285da4b12b803a1cf4a58430278191d7de8580973b09fc69f1446371b87519ebd68b301541c95e33c71e94e60c71c0240eb9eb4d284c9c0edd8f5a363230014f4fc28b15723924c31183bfd334e1b002591b776a50c51b04618f39c75152b6d61c00307834ac1729371231078a42f9ce7a7ae2a475c39c63047f0d35b3c0c0c1a2c313781ce778ec291dc13e953c644687e5c96fd2a168c9cb6383d71da9201a1b7e3f4352a4aa081d7de9980c47603d69e718c0229d8815dd5c8c114336e5c7180690e36e368a46219863819ef54049e60553f3631fad42ac3821bbf22a508a41c80298a10ce46dca814000c6581e49e69239957208391fad366554e0753d0d470a8dd961f2ff002a40137cd2024f6ec29ead84e38344d185507031d985023565c9071d8038a2e31acc0af23a51c9f7f734e11e3903af6cd2edfa8a9023db9ef838a8e318c01f366a510ab31ebc535621c1248c0e94080a90c3681923ad46d8c127afa8a7f2a7b824e066875391b5b763da900c280719c534e08ef4fc99307393ef4c2ac0e78c1eb5255815c80464f3d690e026690ab038c6682c4678fc68182e48cf073e948460f3f9526ecf41cfad05c9ce47b5002f5ea29381eb8a51f37b51d45048c033f4a0a9c74a76d2fea68e067f51408615e320714d0064e6a456c718e7da818073dcf6a4031579e38fad2e339c529e49f6a69071d30282ae2703a73498ce281f953bb71c8a02e348c9ce69b9eb9c1cd28e7dbde9a472690c5fe23d2939f5a0039cff003a5239f4a05713ef7ff5a908e69c4d35a801291ba529e68a8189fc34374a3f8a96801bd47a5253e9b8e6800fe2a4a56a4a0028a28a0046a6d389a36d0027349475ef46d14009f76979a39cd211c5002514bf7692800a28a2800a28a2800a28a2800a28a2800a28a2800a28a5e868001ed4bcd27dea5028001d697a914019a3a5001d78a5c7342d1b680168a28a0028a28a002976d1f7a8fbb400745a4a2940a6003f2a7520c0a51f29fad1700f5e697a76a40b4ea42b852b7ddf4a31ce2928244e33cd2a0ed4639a503340c52771a4c9a3ad3a810520e9fd69693af19ab0173d2806865a28017afe142f5a4a7631542140a28a5fc68005a70e47a9a38c7ad3d632cdc1a6bc80693c71471c734efb3b609c8e94a2d9877e28b5c9b8d18c734e0405273806956d981ce452f92cdc64015562741ab8e371c0a52472475cf14e36ed9ea338a5f24b2e3231eb4790f997422e0939efeb4a39e4d49f6562dd41a77d9dbd452716174346ddded4ad9627a7b0a3eccd919233eb52c709484c848c67a6393549315d75212188271c0e290640a7b13b475f5a71dbb411d3a67de901111f951f7d8127eb4ac3b8e0522ae68283a31ebf4a307190323d6978da41c73de8fba31cfe340c671f85283c50dc839a456c103b52014f3d2940e3ebe94b80680334008a30477a7d348c1cf5a5c006826e291cd2e3d28e323bd48cc78c71ef4c2e44300d48b8f618f5a4fe219193480ed381c1f5a0a240a370e3eb4bd7a1a424b104f18ef4fda33cf5ec6826e20396e06298e7eef208f7a90fe9ef4dd98faf5a761085413d8d08a38a5ddce318a70f4cfe54580429b58f60698d91db8a9ca127ae4537a83dfe956322eabc641a15be6f6c54a8370e7f1a8f6f3d3f3a2c31a791d79a4fa734a140078e4d0c31da90c45196e79a774eff002fa53694fbf18a40389191c76e334d0738cf6ed46dc023a8a4070471ff00d6a600dd4f1f4a9f6e0639a818f7ea7d054f8c8048c63a66981196c6ec0f6e6a58c06894377ec298ea0e70688d884519c63d69887ee5667214003a0f4a9adc9c16da381c93deab485b69c1001ef56217c83c1fc3bd218f8726690e70b8cf1c7e151ccaf1c8081f786466a446d8d93c8e78342c864b85040c63a1a650cddb8123ef0ea054d2611883c90290c0cc772e037a546e7748429ce383401232ac9186e0b7603ad42d93c81bbd454c2431a92001938e6a18e423900127b1a008ce31903351b6eddd724f7a7b92a4fafb546f9c7afbd400066c91f98a439c107e5f5f7a031ff134b839247714cb18300720d395fa9e8290e0678fc68390473f85040ee8c0f5feb4d23728148cdc1cf6e8290f27eb40c9563c81f367d726a31b95c9045284e339e7d282bcb63271cd020752e38007e34b085653c85c7ad290c48f9473dc5357e597247ca7d6a40942868bae33c52469941dbda9d1e0670bf89a53285423853d0629d806a6392a7e63ebda8f94f03907d6910edc28fc4d4db7838208f4a6558842e14e78cd3640157383c6315330f90f604751509041ee474cd4d892293a0c9ce0f6a500af0bc0cf5ef4b2ee452429000a5dc7cb4cfde2739f4a455881148c907f034bb49cf3c53d47723049a6b3633e86a46348e0e4fe34d61dc53d9c11803f2a8c3738c1fad48081480303834848ec3ffaf4ad9c2e0fe3484e464e063b500201c8feb4a0f51d28207ad22f1ffd7a043b3b473d69a467de949f5e68ce79ef54161992a01e94d18ce7205484f181cfad30af3d39a448c3c9f5a5c7cb9e69f8c74229a4e579eb5200140e7d28603029d8cd348c1a6037d698cbd69e473d78a43df8e69157100c5211ef4ee477a46a091b4847e14b4374a6313d691bf2a56a4ed516280fb526734b49914805a6eea752374a004e29297d6928003cd14631450014dda69d48d4008dd690f5a56eb41ebeb4009c67ad14a7d693f950023527ad2e3e5a4a0028a28a0028a28a0028a28a0028a28a0028a28a00297e949d6976d001ed4b48386a5a005da68c77a4a7d0014522d2d0014518f9bde8a0028a28a0028a297a7d68002292971c528f5c714c009c53bf4a6f3e94a063fc690ae2f606940a17a52afca28243da9d49fe79a1573400639eb4b8edd3348d4a0f1cd0027d68c7340347dda760168a5db495402fdea5da2907dde2957269808b4f5a4dbba955734c9179a4efedef4a07e34ec038a1008dc0afa0be0ffc35f0c789ff00677f89be24d4b4d173ae68de4fd86e7cf957cadc39f91582b7fc081af9f5b9c0afb1bf657f136a5e09fd9a3e2c6b9a2ceb67aad8bc32c17063593636dc676b02a7a9ea0d7ad96c212acfda6d667ce67f56b52c246541da5cd0eb6d3996f6bdae701e0df867e19d4bf649f1c78c6ef4a32f8a74ed561b7b5be33c8045133db82bb036c3feb1f92a4f3ec2ba6f0b7847e1b784bf662d1bc7de25f02bf8b356bad524b0641aa5c59e46e948394257811e3eef39ebc575cdf147c4bf163f625f88daa78a7551aa5f5b6a76d6f1c9f678a1da826b560311aa83cb37519aea3e0fa7c426fd8efc34df0b71ff0009236a9399439b7c7d9fcc9b763cff0093af97d39fd6bd9a34a9737bb1bfeefb26ef7deccf91c462b15ece4eacb97f7d6f8da5cbc9b735934afe47cf9f07f41f057c60fda5342d353c23fd89e12bd5955b443a8cf3e0a5ac8d9f372afcba06c647a74af38f8a5a1da787be2878ab47d3e1fb2d8596ad736b6f0ee2de5c4b33aaaee6249c000649cfad7d0df095bc791fedade1b1f11806f14797309bfd47dcfb14bb3fd47c9f771d3f1ae0bf69cf82de32f05f8e7c4be2cd5f49169a0eabafdc7d8eebed50bf99e64924a9f223965ca027e60318e706bcda945ba0e518eaa4efa256db7b1ef61f16a38f54a55159d38d9735d37796a9bdf4ebb9f4b6b1fb30fc39b8f8856be11b3f865a941a5dde9a6ee4f175a6a57263b39017fdd912168cb1d8bdc9fde0f971cd786fece7f0a7c17accdf15a6f126971f8aecbc2b6af7167b6ee5b713f97e71e1a261c388c72776339ae93f6f1f19f88349f1f697a3d96b9a859e8d79a242f3d85bddc91c12932cc09740db5890aa324761e9543f628d62e741f0dfc5ebdb1716f796ba11bb827da1bcb9234999382083ce0e08c715ebb9509631508c348defa2edd8f9ba51c743289626555b7351fb52df995ddeedaba76d343cdac2ebc0bf133e2ef80f4cd13c07ff00089e9171a9dbda6a167fdad3ddfdad1e7553f3b6d64f9491f29ef9cd77da7fc1ff0007cffb6cbf811f470fe1257917fb396ea6ed60d28fde6ff33fd600df7bdba715e6f6ff001ebc45e30f8abe09f1278e355fed08743d46de6f352d228ca4293248f85891777dd3d79afaba3f863a859fed50df197edba6a7c3bfb2b5e8d6fedd118d95accc1b40ce73b8939c6ddbdf3c572e1e9c2bfbd157b4d744b4f348f4f1d5ab60af0949c6f4a697bd27efdd5ad27ab976ea78afc0ef841e0ef17fed1be3bf0c6b1a39bcd0f4b5be36964d733218f65d2469f3ab863856239273df9af99ee311abaedc907bd7d83fb1a6a9178bbf69ff001d6b16cac2df50b1bebb855c73b5eee26507fefa15f3c7c56f829e33f843f61ff84b749fecbfed1f30db7fa54336ff002f6eff00f56ed8c6f5eb8ebed5c98aa6bd846705d5ebf758f532ec4c963e742acf5e585937adfdee6b7ea79d2938a09cae3b52053938e9dcd2806bc267d68e11961c64fbd331c7bfad4a0e00029555a419ec29a02254c9a51190339a70193fcaa4f2c74fe2140ee42613b88ce4530c7ce7a806ac3602f0091dcd30af1da801a071f5ed4acbb4f181ec29557700075a5fba48e334c2e376f5147d69c5be5c607d7bd31b93482c283820e69f9dddf9f4a8e9db4501617b818ce0f5a0c786f4c51c6460f152331006707d0d328685dac3d3d0d49b7a1047bd4592695411c8e73488275246075f7346c2cc31d4f6a883e07a1a9518281c1f5ab01ad19dc734830a48278f7a91db2e79ebeb40c139ce40a00002c3ad2b0f9b1d3e9de97a753c50176b7438fad500d0bb8e7f014dd9838cf07a9152676e79e0530907bf5ed40885d403c7233411f3038c8f7ef4e38ee06076a4c8dc39da31c639c52b1571b9cf2063da8c1ebd314a1324f5c9e053940d99f43e94582e31cfcc33d68ce471c76229db73272318e94ac8010491934582e46796033ce6a5da0367777e94c4009c9ea2a5c06e319a65030c67b0ef51a365bd001c0a94291d3f5a8946c6038e98fad1d043dce00e0633dea45396e7ee93d6a22599972471ed532a931900f19c953de92290a060f5ca1e87143a812a9e48c702a333952ab8200f5352655a555079f7a63262a372819ebce69ac0233edfbb8cf14f8b3bd4e3201c1c51bca6e0c30a7b5558085a5daec08e08cf3daa251efd0f7a7ca3727392477a897ef1ce7f1a8b00edf96c8efea2a1209a9b765b23b526028c7e74c08d63dd93da9c7007a6453d4638c7e34150727b0e99a9020600a0f5ef4d523d38a93856c9cf1da90f1d07e3400d0303a1a705c9c9e01ef49d71cf1eb4f2acc0311f29e334086edf98e1b81d33de9e06d902f50792734c68f69c1fd695233d97a9eb5431597939604fe94ac1432f380bd4e3bd3caf23284f34b92a4e50e7d4f6a60180464100f7a8e61d78e3d715203fc40f3dc53d14331eeb8c52b5c0af03919c1ce7b51bf83b4e4fa7a54cb0ab3b0033cd35a1daa18000039cd2b32ae3d90a45d39c714c39cfcc703d2a45708a7249dc7a75c5232f9997c8cfa77a4162b32e0104e7eb4cc60ab1fba3b7ad4b3c4c3271d3bfad44bca118e73d735030127cc381d73c530afca4119cf4a70529920679ef4103039e33d690118f7a6b1001c7eb4e2c03127934d2e0e7b9a9010e4e738a476e71fad072d9db800d1b33ff00d6a4000839e3ea6909dadc8c67a8a70e0f23f0a6374e4d301a703a66959891c8149c73de800e7d05201464e79e7d29b9cf24538738a6b8c1183f5a6489c77ce690907e94a7245378148439475c0e3b521e6908ff00eb500629801c74a610326a4edd3f1a637f4a402eef971494bfc3484d201add69297a9a6b532ac1fc54706928a430a423347f1503eb53615c01f5eb41fce93f8a95b2290c3d69b4ee73487ad000d494a4525001451450027349d29d4d2bc50023628c628a2800e693f1a5ef49b680128a5231df9a4a0028a28a0028a28a0028a28a0028a28a0029dc9149ba8e49a005a28ebda97a5000bd6947eb47dda5a0028a28a0028a28a0028a28a00503349d68a29d8077f0d04600e693a1a5c9ce68b00e6a5036f5a6d19a2c2b0edb934abd69a0d2d1624763f3a33c52d22d1601d8cf147e14838a70e9d68b0867f0d041029cd4954000f6a5039e29718f6a39ce7f5a63d05fa75a285eb4a79f6a62140c5388cd2678c51fc269085206695475a4029e169a018fc62ba6f0d782bc43e2e8ee5b42d1351d612d103dc7d82d649844a7382fb01da0e0f27d0fa5734cb935f47fecc3f103c3be0ff0ff00882cfc4de3bbcf0de9778559b4bb0b4b9fb4dd158d8078ae2175f29812061f72374618aecc1d38d6abc93972fe079b98622a61b0eea528f33bed66ff0005fd773ca2cfe15f8cefb4bfed2b6f09eb971a7343f69175169f2b4462e7f78182e36f079ce38350681e03f14789f4fb9bdd1b40d5354b2b527cfb8b2b49668e138ce1995485e39e7b57da363f11740f00783be10eadabfc41d63c376563a47da5742b3b37962d5d0311b18a1daadc007cc047cc3695396acaf00fed45e0497c2ba709359ff841eeb4dbfbcbbfece1657d3c572b2cef3205fb34f123603052250cb9e802f5f75e5f4212b3a967e76f2fbbe67c9ff6d6367173861dc95dabd9f76bb6bb2d568afa9f22787fc07e27f145adcdde8ba06a9aac16f9f3e5b1b396658b8cfccc8a42f1eb5a937c3796e3c09a16b76971a85eea7aa6a125947a5ae97384257ee98ee31b246278f2d7e615f45f83fe3ef85bc45e12d320bcf885a8fc2ebdd3f5bbcd4aee1d1f4c91e3d51269da650026f09b436c092175000c8700622f01fed19e0ed02d7c3afa86b175753ff6eead71737325991776d1dc2308ee4855f2f7e4e59509c6e6c038c128e0f0af49d45aaebdf4dacff335ad98e3d734a18777527a24f5494bab8dacecb6d765b9e2fe03fd9efc4de2af1d68fe1ed6f4fd57c2905fdc35ab6a17da64bb639442d284c36c058aae76ee07073d0579bdeda7d86faeadb7799e4cad1eee99c12335f68e8ff1ebc09e1eb5f0658defc4cbff00194fa5f889efae756d434eba471035a4c83019598aabb85c125b25880140c783fecf5f0774ff008f3f152ff49bed4e4b0d361826bf90da85134ea2455091efe013bc1c907001e39ac6b6129da14e8caf26fbf4b2ff00826b87ccebc7dad7c645c294637d9a5bcaef549ec969d0f2bd17c3fa978a356834cd234fbad5351b8c98ed6ce069a57c2966da8a0938504f1d813daa1bab59f4fb99ed2e639ada681cc52dbcca55d1d4e19581e41041041afab3e11f82fc31e05fdaebc17a77870f8820fdc5e35d58f892d561b8b67fb2ce02965c2b820672a36e08c3364e347c41f02fe1cfc4ff00127c538b44d7f583e39d164bad4a7f3a28d6c1dcc8ecf1c6a017c237eecb161c904061c54472d9b85d3f7af6b5fcae39e7d469d6e59c5f272a95edde4d6bdba1f1feece78230300fad13ef4b525bd38f5eb5ee7e24f80d6373f037c1fe3bf09bea17f3df5d7f676a96533aca52e492a9e584452aa5d48c3163fbc8c673d72ff69af84be1ff0082fab685e1dd3752b9d535e360973abcad2a34092bf0b1c6a1032fdd66c31270c95cb3c254a70736b4567f7ec7a94732c3622ac6941de4dc97a72ef73c414153b7f4a7aec6ce783d80e94806e61d86704d28e09f6af34f70784e99e0523e586070a3b5072c09eded46372f3ebcd242b8cd983907f2a7a9e41cfbe694805703a8a683f37ad3181ca70298d8c7352bb163f31e4d300f9bd3df148605769cfbd00e1718c8eb9a71e9fd28ce0741d39a04357041c0c1f6a681cf7a7f6e3ad34e4f4381416348a701eb40273d78a51c50003dbffd74e0495200e3d290e48e98a724793c9c62a806719e680c72000314e29cf5a55419cf7a56205719c104fd3d6a74c2b0c7381518209507d7ad4cb85722ad003019079c52b45bba2e3342e76f4c7ad2f985b8ed55a0ae2797c9cf6e299860c40e474e6a5de33df029b193b8b10393d0f7aa0b8c9130b83c93dea200edc66ad4c429c8e0fa55395b0781814810bfd78cd33cbc739a72f634ad96e38fa548c236da783819a1588cf3f2f348918dbc70dde8008ce070298120181914d2e0fa73524676e7938148e8304f01a9d808d5063a104f4268fa1cd2e095c007029e157e9f8522c6c646e19cd24d82c08ee69e70afb8751fad2caa19573ce7d287b086aa664e7247bd4a1594120e31d88e691136aa9c83f5a994fcad9c1cf6cf4a11456923326d2471daa454f9941fc3353201f2027249e39a57f95802b9e7a1a2c30543bb83c8a8a4f9c60f352bb18db8056a360db7924eeed54046c485e9cfbd31c7cc0e7af04d3f9d84139cd0319e98a8019b718c74cf14bb769c8033ef41049500673da80b96e1b18ee6801c1448848e181fce9445e6642f03191405e37ff0e7915242d96c0008c1e9eb4c0aac720f183d7269986ce318c75c55831ee0095cb63a542e36fcd83cf6a9b5844649d8476ed4aa4b0ebcf614e50482d818fe54e0ff00302a4061d8f7a41a0df29b04b71491820e08c1eb8352b4c5c65b071fc3d29b9e8594283dc9aa01771500ef3ec334e7072a0b1c1193cd26781c019e3eb4d276f63f5a063d54a1ce300f4a7ba36dce72dd78ed559a62cc060d5b4ddb3bf23045340431c8c8c433609a7b1054273d698e0c9c11cf6229ab232e233c807af7a2e048e7f5ee6a071ce776e3534b8201e7daa27dcb850303348ab8c0ee7be7d334d00a104633e952ed01f904f14c3f2ae71d4e2b3b0c15030396f9b3da98d192323a83d3d687e188e3f0a4563c91c1a9b80d651cfafa526dee0734fc33e40e7d69a4e3208e6a406842720718a69257a76f4a71239fa51b72b9ea28019bf7f3c8f5a67dedc4703de9ec719c0c0f7a68604738e3da8010f7e29323803a0a5640c339c50578e280138a6c83dc52f5e28233412c4cf2290e7238e29d904d2670b4084e727340e00c67349df9340fce8003fa52370dc734a48a6d200a6934139a4ce2916147345235002514514009d28db934b4502b05145267d4540c5a293228e94009d0d25295e292800f4a28a2800a4db4b450035bad18e33494119a00290fa52d079a004fc69297eed1f7680128a28a0028a28a0028a28a002956900cd3b9a0000a28a3f1a002940cd25380a005a2908cd2d0014514500145145001451453017f86929db4526da2e0252fd2948cd2d301322968a295c029cbd29b4b822a85624a2907ff005a940a09600f34fa41fa507d28244229294ae0e28fe1a630229dc6314d1c2d28fd698c3241a72b03d690fde5a7aaf1ef4100061a9c063a74a45c9e4538718a057140c62957ad2814e18c0e063b9aab05c695058715e8be03f86e3c6de0ff00196b5fda1f611e1bb18af041e4799f69dd204dbbb70d98ce7386fa579d13cfd057a6fc33f881a6f847c13f10349be8ae64b8d7f4d8ad2d1add54a23aca1c99096040c0ec0fd2bab09c9ed396a6d67f96870e35d454bf73f15d7dd757fc0c8d3746f1afc4cb58adb4fb2d73c4f6fa444238e1b78e5bb4b38c9242a850c235383c7038ac3d3f45d43559a782cb4fb9bc9a189e79520899da38d065dd80070aa06493c0ef5eb5f0dfe2cf8734df87ba6f85f5f9358d2c697e204d7a1bcd0e18e57b921154c6e1e58f630da36ca0b633f778e72ed7e34ac5f1f9fe211d312d2cee75279eeb4d84070f6f265668f9c06668d9c12700b36702badd3a52e57293bbdce055b109d48c2968af6f37ff0007f03856f06788161321d0f51f2d6cc6a25bec92605a938171d3fd5678dff773deb76ebe1b8b3f84161e381a817fb56ad2e966c3c8c6cd91093ccf337739ce36edfc6bd7fe2efed49a478ebe19ea5e1ad17427d22e66b98ec2de6f2d001a34277c10310c48937804a805719f98e6bccefbe2269d75f00b49f04225c2ea96bae4da9c92322f90637842280dbb76ec83c6dc63bd6ae961a12718cf9b4f4d4c296231b5a1194e9f27bd66b47a5b77db53933e05f1225e0b46d0353175f64fb7884d949bfecd8dde76dc67cbc73bfa63bd755f02efb42d2fc6a97dad78b752f0549046cf69aae9b6c6729374024553b8a119ca853b81c1c039af4ad7be305b58fecc7a0d879b6371e36d52de4d124bb82657bab7d2619b7ac5285398f73108148f99013debe71c1c819cd4c9430d384a93bbdffe01ad2f6b8fa3529d55c8aee2bcd756ae9ab7a9f69ebdfb4a781f51f8e9f0b7569b5cfb7d9f876cef21d53c4c74e92117524b6a51710aa9703782718c0329c7009ae1fe0e7c5af077867e2c7c55d4b53d69acf4cd72def60b0ba16b3334de64c597e5542572bcfcc063bd7cca738069e9f3b92327f1adff00b4aaf3a9a4b477fc2ddce08f0fe169d27494a4938f2f4e9272bed6bddfa763ecdfd843c546c3c23f10e3d660fb4f8434710eb32493005609a3dcd955c6598889587a1857b9af94fe2678dafbe2478d35df135e2959b50b96976673e52e709183e8aa1547b28ab5a57c52f1368be04d57c1d63aa7d9bc3baa4a27bcb3482306671b719936efc7c8bc06c71d3939e4896f2c85c92bc9e78ac7118af6b421497d9dfd4e9c1658b0f8daf8c95af3b25e892bfcdf5f9151f391c703814f1824f71eb49b771dc4923af34ee586476e6bc73e8ee22fca08fe13fad2b63b734b8e727ffd7484e47bd04811c138a660faf4a7a9024e7914a40008c66a8ab91f07ebfca978f5ef49d4640a705ddea68b05c4e339fe548e7b0e94107a8a46393cfeb4ac300481460eda90f2c3b67d7a5294c01c53b0ee42a09c7ad3c0ed8071d69c176b0c0a5da428fe7490c6f0b1e303839fad3948c0fe54dd84ae40e33d4f7a902f3eb4c5710024e697caddc8c539411d8f34fdb85183f80ab111918c0ef53280d938c9f4a611dfdea48c124e2840347cbc7715220c83f2827d69ad8ea4734ab9ce38f5a62b0103a91c0eb4fb791618946413f4e6a190e001d79e94065dc0e79f6a77d6c16269089006fd6a94c00638ce3deacb12bc1c938aaee72003c9a43891ae091cd4d1b0c6081b7afbd42a76d4f1a820903e61ce73490ec376ede31ef9ed4deadc7427a5481d8a3007e527273eb51670e4e39f6a6162ca8da54360a9a618d0bbf2783d7d6a589f0a7391c64e69a8bfbbc6d0371c803ad5011e0c7d06f07b1ed4edd9382a541ef4f75032429c74fc69a325864120718348a1ca8181e0ed14d931b42a8c0cd4b1c8bb82b1200eb4d9635e3692727a9a62114954e314cf2e45cb7073ea38a99dc2263e5c8a14fc849a562c698d240a5b823d0512c65594a8239eb9a7bf2a01c81eb4c99892080300fe269806dcb13b88c0ee7a53941c0f9891e829b8604631cd3f853cf07a75e94011b163fd0d2104000f7a79038ea07ad2141bbae7e953602301948f51dfd286fdd9c1186ef523465b731cf5c629ac852439e7b9a76603d43ee036800f5cd3812a76800f35677c4d1ae5893d01a82620b82807039356d0ae0ca2443b787e8455678de31c0c803a8e7152a6e55fba7af4a5690ed38f949fe2cd2dc0aea4f94233f2f39c9a8491e681f757b9ab8cca3a6181eedeb554c40920f0dd8fad43d061903760672300d3d0168f2707071f376a8802abf7803fca9dcb6792ab9e87d6901279ea0e31c814336e53e869a00c92319a900c2938e2801a14b640e8054cc7647cf07b62a3c904761492b0dbeadd85300382c7b669ac02b05c313edfd69c8bb9c0e33eb4a9116673b8b63ab0e94808118fddc9ebd69e48dbef9ce69760c1046e19c034cff63a7a9f4a9006dc4673803f3a611f2f2323b7352ee2073c8fe55110339c703ad0cab91050d9ce7348490bf4a9e51e5b8603151329e09f4a818de4718a46a932c540edd29a40cd2b011b1c92077e29c3fba09e3b534290f9f5e94fda73d81a560227e3af228fd052b6e2c062959323ad2018edc13d7b629841231c7d2a52a00029bbba8e9c52111f5cf1d2865e29477fe749d4e298c6a8ca8a1973428c0a56ce7d28206e3149d053b3cd04505586b714c069e78ed4ce8dcd0211bad25141152509d7ad2d149fc34007e1f85253b9a4005002514efbb4de9c5001487ae29734375a9b00514514009fc549eb4a579a1ba5201b4529fba292800a28c668a0069ebd2929db68233400de9de8a5c9a4c73fd6800a4229691a8013e9451450014514500145145003b9a4c639a16940a002971d6928a0056eb4b8ed406e680280168a28a0028a28a0028a2956801280297a9a077a6025387d68eb4a0e3eb4801874a4da29c0507d2a857128a28a57000dc52fa526ee94ee68b85c55eb4f0dc5301cfd69d9aa258e073467da85e9413ef4c91b4abd69295718a65011d29c3eed19e39e68c74a0078eb9a7014c5191cd3d471ce71410c5db4e1f97b5183c0a5e01ff0a091719f6a500839ea31494e1c73daac06f4273d3dabeb3fd8c7f67bf0ff00c50d07c4de22f166813eb9a75994b5d3ed60bcf27ce982179546d910ee0a6100b32a7ef0f3c12bf2637def6afafbf635d7b52d3fe0dfc6e16da85cdb8b0d1cde5af972b279131b6b9ccb1e0fcaff00bb8fe6183f22f3c0af472d8c1e22d515f47f933e6f88675e197cbeaf3e59371d75eb24b75a9f38fc43d26db42f885e25d3acec67d36cad353b8b78acae1d5e5811656558dd95981650002433024704f5af4efda8bc09e1ef03df78563d07c19a978405de9fe74eba85fc573f686c8c3aec964c639ce4ae72308b8e7c5ef2fae356bf9eeef2e25bbbbb895a69a79dcbbc8ec4966663c92492493d735f51fedeed9d5be1f9e72745191dbef57552a709e1ebd4b6aaddbab33c456a94b1f83a0dfc5cd7d5f44ba75f999dfb21fecf363f16347f16eabaf683fda7a6c36ed6da75c7db1a1db7c1436dda92293f2ba1cb0dbcfd6be7bf14786afbc23e20bed1355b7fb2ea56331b79e10eb26c70791b94907f026bea2fd82bc497f671fc41b25bcb916b0694d7b15a89984493720c8141c06c2a8dc0670a3d2be56d6354bdd73549f50bfb99af2f2e64324d717121924918f566624924fa9abc4469ac1d09f2eaefafcccb0357133cd3170a92f722a365d9b5d3f53e896fd95746f09e99e0dd6b56f881665755b8b167b61a5cd2c46398923ca9412b311b4ee5c2e01c9c6e40ddbfc7afd98bc1d75e2cf1a78a62f17da785343d265b586f34eb3d0d8c76b2bc2bb638d51943962626caa81fbd3939535e6537ed49670fc33b7f08e93e08b5d233259c977731dfcb2c531b7757cc50b822277641b9c162d925b7120883e247ed3cdf10b45f1c699ff08e369ebe25d42d2fc38bff00305af931c71edc79637eef2f39cae33d0e39edf6980f66e36f96bba4ff00af99e47b0ce6588551c9a4aebec7c2e51d6de9cddde86869dfb25d8ac7a2e95aef8fb4ff000f78e75a805c58787e7b39240430fddacb303b6366c1182a4e781b8d4fe17fd9374f93c2765aaf8a7c7917852eaf3579b43fb1be9ad7045d24ad1ec0eb2004128d9620280393dea2d37f6aeb35b5f0fea3aff8074ff10f8d341b716da7f8866bc923c2affab69610b8959492725872491b4f3587ac7ed2379ae782bc35a35f68e93dfe95afcbafcfa8fda00fb5bc92bcac9e584c272e79c9e9d2b24f009ddafcfcb7fc763a7973b95a2a4d6babf776d7e1df4f877d4d18bf6558f45bef18c9e2ef19597877c3be1dbb4b16d623b57bbfb4cceaaeaa91290d9d8e848e705b1ce091ca7c74f82907c1ed3fc357369e228bc4969af5b35cc57305b7951850571b49762d90c0f418af6ef01fc5ad3be336a5e3c5f10a784ed3c39ad5d4178de1ef126b7358491ca91468258ae5202a410832061b81d0677705fb63f8dbc3be20bff08e83e1bbbd3ef2d740d37ecd21d29cc96913315c45139fbe1420f9bbe7ae720557a584fabcea52b5fa6f7dff00c88c1e2b3378fa54710ddbed691e55eeaf9a7cdf23e720415c7bf7a50b8233d7da9a07b54a08c7bfad7cd1f7626dddeb46d038eb4b819f5cd264af7c7d28002a073f852be01c0c0c77f5a719376338c0f6a02eec924127a53b0108538a5030c7b0f5a9b67182307d2a3231d451601bc6071cd21f9881dc9a5dbc71c7b9a06011cd49618278fca9fb81500e4d314f3c03529f93a820ff003a602053b4f3d29c02807200e3bd0ab85e41c7a52af1efef4c434263a1e29e8a0b7a0a00c0ce297db3c6698c5e8319ef42a81c114a3238c64e3d2970724f5fa50046c318c0273da9f0b647a0cf6a7052082dc71f9d088a57d3d07a53b020700af4c5353960338f7a0a9dd8cf1ef474e9c521864176e3e99a48e0f98939cd3d10a1e49049a63e58f714fadc4291b9b00118a8245efc55838c0e39a634671c0f7a761a203191f5eb46703b9a936e142f27d051b4b01d734ac509bca907838e808e95222632e48627b0a8ff001a923881c9072a3a8f4a7610e57d848033b86314d93860a3391c669cc01c01da94101c606dc7eb4c42f98429079fc2a48d778f991b70e4e29c88c64556c7cd52cc0039527774e3b8abe8515762ee62464fbd248bc2b6ee33d29ec08ea33cfad365c6e1d33ed5000e14300067de9a1f0afc734ddc3777a43c31cf19a0a1af967ea4a8c539b70741ce33daa5232bc1cf3d29cd0f2bc7be7340ae46c0865e08c53d001c607d4f7a561f373fa521ce719c8a02e1212339c93fa5353a1e707de9f82c9c034c750b8c36efc2aac21586e3ce4607f0d10b299086276114e5184e8467d2924001c86cf1ce28027652d12e006f6a85810e4f18c8181d054d0be22239e7d7b0a809da38232d9e3b814c04b976c85e9ee2a163ebc8f7ed4a1b796079c545c73c1c7a7ad43650f0e0f1f90f5a6b004823927b7a53d547944b2fca781eb4c917e5042e17a66a406c8a197de9f0a2484863b57079a68236e7a91da972cbc91c0f4a40017630e4b8f5a9071938e29abca91d39e08a91ced5fd6a8646576ed3c60fbd1e5967c9f5e293a804753c7152210bdb8a2c03645c6e2323e9403b236393cd2b657395cf1d2990c88cd8231b79a43b1248cb8503a9e99e83dcd42d900aa738e49a78208660d9ddd722955b002e38fe741241164f24138e70689724374f9b078a95b7367b161cd44ca403f4ce6900f9d5b6aee607be2a12390382318a9780b8c1ce475a53838231c74c8a5602b943d7181eb46cc721864f6a706c9cb73f4a1b9c1e9f5ed5162ae46d85e30327b9a5c63241c9ee050d19ca9247b67bd29ca1c11d7b0a06478c8271f95072bdea50769e9c6280370e9c0e94808482dc63151b2e06075ef53b0ca9cff3a6841b060f34ac320dbe9cf14846319a9385e47a535f202f1c516246851cff00234846de3f4a7edc13939349b49e31f8d492376e7a0a0ae481da97b7e94a090add30282ae46ca00c8fcaa365c559ce139e6a07e4e2812636936d3870694f4a0771841c50052b70a29a4e1aa462919a6edf7a5cf507f3a427d8500149b68039e68ea68013f8ba519a77349c5002526452d35a90833cd0793494678a90b8bf7a928a280b80345145030a4fe1a5a4db400981474a5fbd4da001ba51cd29e6928013eed252e3ad2f3400da28a2800a7734d145003b9a4fc29681c5001d73da8a297a9a003f5a7537a53a800a28a2800a28a2800a51f74d2519e3eb4ec014e5e94da5c67eb458571718a5039cf4a41c0a76ea41715ba5368a2ac90a293f8a96a062ad2d2014a3de98817af4a7d3718a755006edb4514beb5401f8518e28dd403ce2810abd29c0ee1499cd3870338eb400e1da9c05228cfd69f410c17fc9a70148385a5a62148c2e69ca7e5e6933851fce9d1f20d501137dec62bb4f067c50f13780f43d7b4ad0f52fb0d8ebd6df65d462f22293ce8f6baedcba92bc48e32a41f9baf02b8e917e6af75fd9bfe0cd87c66d23c61a7cde4dbeab0c5642c2fe799952d4c972ab21da080e4c7b80539c9c018241aeac2539d6a9cb4b7ff873cec756a14687b4c42bc15afa5fae9f768cf1519dd9fc6babf881f14fc4ff0013e6d3a5f136a9fda5269f07d9ed8fd9e28bcb8fae3e455cfd4e4d7b049fb3a787e6f065b6af26bd2e9b656965a85e4f70ba3c9f6db8582f56dc2c90bdd6c5625b80bb318c364e5868e8ff00b2ae93e19f895a4e9fe26d724d5b4fb8d746970416162ecb74aa91c8e2775954dbe524030bbcf0c7ee8dd5e8c705898c7916ced7d57c8f2659b65edfb47aca1cd6f75dd5b7b3b1e2df0c7e2278b3c07a85cdb7853515d3ee3598d6c6732450b09158e029694108327ef6463d6a1f881f0c3c4ff0bf5d8749f13696da76a13c4b3470f9b1cbba3666504346cc0f2a475cf158baf5bc5a7ebda8c112ec8a1b991235c93850c40193f4afd03f08785ec3f697f0bfc20f1d5f3ac973a04cd1eaaac46e94c4a7ef7ae658a36da7f8656abc2e1de2d3a57d63b76df539733cc96552862f91724efccedadd2bc7d7b1f0b78e3e18f897e1b78821d13c45a4c9a76a934293476fbd252e8e48520a160724118ce7208af7afd9ff00e0e6aff0e7e322e9be3df8771f88e4b8d226b8b7d2cdc595c328f31544e524984671f32e1981e4900edafa5b53f0b785ff0068cf11f81fc79a5cf1cb6de1cd56e619f76333a44cde5f4ce479891b807f82539e78af26f82ff110fc50fdb37c49ab2cc27b086c2e6d2c8a9f93c88da34423d9b97fab9af4a397d3a3562f99be66adb6d6d7a1f39533ec4e3b0b523c96708373df495ec92d535b5cf9defbe10789fe257c52f1669de0ff0008cf0c767a8dc2b69eb24623b20246022694b79608da4001883838c8ae5bc79f0c7c4df0bf545b1f13e8f71a45c48a5a2f330e92018c94914956c646704e32335f57fc35f8ebe19f06fc41f8afe0df12dddc7876db56f105fbc1adda6e0f133c8d1905d4168c8daacaf8c0258922b37e23fc29d6a3f8d1f0adbc4de336f1cf82f51bc486c27bc21f0a18388a4c7cb279b941e6725c75c0515cf2c153a94f9e9bbb6ecf6b2d6db1e8d3ce6bd1c47b2af151a6a375bde568df47aabf96e786785ff660f89de34d0e1d5f49f0bcf369d70bbe196e2e21b7f314f465595d58a9ea081839e0d79e78bbc1fac7823529b4ad774eb9d2f518806686e6328704f047a83d88e0d7e86fc72f1d781b4bf1445a6788be26f8b3c177f6c8922e9da289618595b90e592ddbcccf4e5d80c1180735e07fb5d7c4df875f11fc03a02683e2193c43e26d32e16337575692c53496c51b797630c684ef58cf0075381c9a31581c3d1a72b4fde8f9ad7e44e579ee3b195a93a947f7753aa8cbddecdb7a3fc0f9494118cf23de940e4e3b53013d3dfbf7a915796cf6e95f347e84285206719f6a00efde9ff2e339c1f4a798f29b891b7b63bd38810f07249a43c6077eb5222e724b614f7a531edf9bb76cd315c62ab6d3fa9a1b072541d83b9a423b6ecfa629fb9594025bdf14868898ee61838039e69a7191d853cc61877149e5066f41e948b1b19c1ef8f6a91705be63cd2a2607539cfa538aeefc3a714ec022b303d72b4ee31c00314846092703d2940665fba78ee2801464a63d7ad0a99149918c8a7ab617af1e9540281bb91dbd7b53989f5c9a475dabd090477a8f68c7f7b3eb54c093ef3019e31d69ca001c2fe27bd336e39ce78a9548318e68040ddb381f4a6b636b7cb8c7eb526370538e9de993297c7a7a50219c94c8a76ef947006680bb460f1fe1432907008dbea282ac34fca4e3bf34c653c739cd2f39233c5274ef9a430c7518a32718f4fc2972413d73de90e7814c6200acf804a923f0a90c65093807b7d69027272324f4f6a78cb4b9eb81c64d310d1953eb436091f2ed3eb4edc41c83c83d6931b5ce7f4a4558b11b67014863dc9ed525c42a013b81edc1aac8e7af4fa549212abdf27bd3b88859f1c0f4ef5131e013f9d2eee793c52b0e00ec4d48ec0aa700e3934ec6e38e32477a76d61d48cf6cd2a4037039e7ae08c0a63152318042eced9f5a7bc7b1d320e0f7cd4ed16e55c8c903ee8ed50ca8e4af3ef835a5891acb9c630ded4a626232074ed49bb6b7ce0127a53c484f5c8f634010b2150413f91eb46d001c8db8ed52175fa9c63e6a876863c310dfce9012ab0f2fd48e7149f79474f5a6364818047d2827181db39e477a063d860e189c0ec2a0621e56c72bfdea91989247033d5bd6a36908254818a40860e4903e5c0ce4d3769273d73fa53987ef3d7229f24ca1b76debc01ef50323c95ea09a6171c641c6781ef52725863834a230ec0eeda07e669011290c7918a7303183d40ed4870ad93cf7a50061b7127fba31480048a536f5c90734ac77024823dcd302fcb9c60fbf6a5d8480376dfaf7a602c79f333b80e3241a9701f85e58f623a54201ea467d6a5562583afca3d7da9dc05f28b28cb7cbd29b02461ce46454b24864c051b5076229a9d0aeded8e3d2995715f0a38552c7a7a2d359949e7f1c535fb6381e9e948aa5d86d002fa9a091a7990e3f4ed48ca523e7900609a9194e4f53e98a8c8fdd3753839c1a00636d55dcb9071cd030c983900f7f5a4915995ce463d2a50cbe5a8f97e51cd48116d2dd3851de97692e78e077a5dc43020045ebf5348c1c31c00149a4043229ce09e698396ce33eb524a413903ebe94de993d7b54b8dcab829551c0e7f9538295f9b920f51e948b9272179a7a93cb3039079c77a9b05c631193f293e86a323819eb53b382c38e0f3d3a542460a13dcf53482e47264b014c9072067f1153edf989cf5f5ef519186519e7a83eb400c0393ce3eb4a005ce7f4a696f9c83485be5e0f350486edb91e94dc73cf069547258fe749f4c5000578a89876a909ce074a63003f1a0017a507a52023b9a71e718fd68019d293033f5a7b608a61f5cfe748ab86c18a4231d69ddb93f9533f88d20136d2fe3401d690f3da81803c52d148d40ae0d4d6e94b487bd00368a28e9504851451d2818514514141451450023526734ad4b400ca28a09f7a004fe54350d48dd6800a28a2800a7734da5fbd400bef463db1451400bd692947a77a51c35001eb4b45140051451400514514c028a28aa2029473494aab8a00752e3e5a6e45396a6c0078fa525292714dda2a805a28a5f5a9b002d28348b4b5560141ef4a0e69b4abd6801d45007345500d2714f06a3929e80919a95bd81ec3b760d3c1f940ef4d504d3c2f4fe75448f5fba29c07b520e29d8f7a091cbd7a5386091d8530673914e5ab42148c771d7f2a728c0eb8cd21e71fd29c3ef018a76018d804f39ae9bc3fff000935af87b56bed217558b468fc95d46e6cc4a2053bc1884acbf28f9c02bbbf880c735cc36327fce2bea2fd9dafb43d2ff677f8b179e23d2a4d6b4749f4a69ac219cc067fdf7c8a641ca8dfb7247380715dd83a7ed6a72ded64dfe079199627eab47da72735dc55bd649697d2fd8f0cd4fe2378b75ab7962bff00136af7b1491bc5225c5fcaeae8ec1d9482c720b2ab107a9507b54f6ff15bc69a75c5d4f67e2ed72da6bc7596e658b50951a675002b390d962000013e82bea6b8fd9dbc0567e32f15ea763e19d47c45a758e8763aad9f84ad6f1c492bdc17565120264213603c163f39c06e14ea41fb39f80b52f127c3b59bc097de1e5d734cd4eeef346bbbf99ae1258fca312962e30577b632149046f19040f5bfb3f157b732bfabef63e7259ee5e95fd93b5afb474f779ad6bdf6ebb5fa9f0fcb2497133cb2c8d24aec599dce4b1272493debd7fe11fed19aa7c27f87be2df0b5a591bd8f5a43f669fcff002cd8c8d198de50bb4ef25767718283ad7b747f00fc13af68fe11d62f7c01a9780276f13dbe913e91a95ecf27f6a40f8cb02e55d48009ca60615baf0553c77f03fc0f6fe1df8852afc3bd53c16be15713d96b57b7b3cd6fab0de408b6b30015f8506362c372e581e0aa783c4d097b484927f3dbee157cdf018d8aa15e936aeb4d34b3496cf5d6db5cf11f847fb476adf09fc07e2ef0c5b59b5e2eb89fe8d3f9fe5fd8242851e50bb4ef25767718318eb59df017e321f829e3c7f111d27fb5d5ed64b53682e7c8e18a9ddbb637f77a62bd87c75f053c03e0ef02f88be22fd904de1fd6f4db54f0be982e65cdbde4e84c9bdb76e6316c670189072c08240af00f873f0d759f8a5e2eb1f0e6836eb737d74c7324ac5638500cb3bb60e140ef8f400124038d4facd19c237bb5b7cffcceca3fd9d8ca388adecf9632f8dbd364bcfa6cedd6e7ab7833f6a8b0f0dea5e2f7d53e1de91e20d37c43aa4da9bc176ea6552eeccb1b48d1b2c88993b7e418258ff171ccfc6bfda4357f8bda968d25bd8a78674ad170da7d8d949930b8c61f780bc80aa170005c703935e99f0f7f63ff00ecbf1e784ae7c4daa7877c5be12d52f2e2c4ae87a94b2acb22dacf28fde22a602b458386ce4608c579c784ff00656f14f8af4cd22f5753d0b499b573bf4fd3b54bff002aeae62ef2a4614964032dc73819c7233a72e35d3e4e8fa7ddfe672d3964d1c43afa73456edbb6b75b5f74a2efa6c77ba7fedb89ac69d65178dfe1ee8fe32d42d0058ef26291b023abed78a40ac70092bb467a01dbc87e38fc6fd47e366b56b7d79a6d86956d650fd9edadeca200aae47de7fbce780074000e00c9cf63f0c7f662d5359d5b46bed76f745b3d1e6d58598b2bed40dbcfa92453849840b805ba38eaade9dabccbe2f68369e17f89be2dd234eb736b6163aadc5bdbc3b99b6469332aae58927000e4926b3c44f16e8fef9fbafd3a7a7ea756030f954316fea71f7d5def74b5d6caf65f238f5ebf7471dc54a58e7245401486001f7a9c119f53e95e21f5801f691d08a9d1cec50081cf43e95030cf42326a550a01cb04f7c55201e4f561865fa74a468f2172e0e474a52db00761c30e17b1a146e2a4000f5fa559240570c450171cf4c53a452b2107afad017d4d268a136f18e69553e76c8e83ad3c6013dcd01b71623a74c51601b1ae38ebcd4cb0921b8f9876a69519001ce7f4a40b91d7914c04656de3cc1d7a77a722a84dd960738c0a51823e638c74a77cca7e62327b0e8295806e0150700ee27f0a445da08c06e7b1a56caa152783ce280b95047d2828560060027de86519519c8f5a146d1d739ea314af890a93c60e314d8c1f8539071d29cac3cb5c6327ad0c8581001183dfbd285c0c700d003b761b19e0f4c5358e3d7fad01b0e318033d69afc4831c827f2a063d88231d3fad30fef339e38a90b0519ea7bd3554ee19c05f4ef405c679601e7818fce9a5718e3f1a9d8b10002726a3601813c9f5a45218464fb9a615cbf22a71c93c640ef4d6dbbbd46698ec2796719e7d79a55e0eee33eb4fdbb93b7278a77de40586003d2a843012782473d6970064e39a7e032927b7a5202a096e94ac3b8dddb8e540269ccc50027393eb4290ca36823e82918838041f4e68b085d8a467afd6985143af3ef806a6551d4118a0c6af264a9fe469a48077d9e376ce7069ef6fb5906e56f714a2dd30a73b48a474618e411e82aca11b25b7672c29646320404e1ba54f6d089ce73b78faf345cdbb2b640041ea73d4d55b4b92674aa030f93da9a41e9cfd2af35be22058649e001d734c6b6624e3e6c76a9022584988b79810038c75a824e242532ea3fbc2a47ea372fe14e8e19665760b803839e39a2dd808527195ea314672793c751521b490f3c05ce0f3dea060127393903a9a9d8a2555599d133b01ea6a365cbf5c8ed4e04ee529c6debc507063395392786a40843260a0440187524f5a4521890c381dc547e4b83e629f969cd85c91939f5a918e5880048f988e40269bf32e718071ce6a52af1aa36002c32306a33967c9e7d69d844663c9ce4fe34ec63a6734fc75feb48c02af0496cf5ed40c80b0008634a1f271d47bd3c80db871f3724d3554374e48a910a87739e3a7514fc855ea73fa544aa5b3d739e6a68d46e033c63afa5301a8c7ca24e0b1e39a0ae1b729cbd293c67b03f9d111632824e33d453b0c692e140cf39cd3c3b91c8503b1f4a732966181ceee9da9ae06ee01623ae68b086798c3a2f5efdea3965ed800771528cb738ce38c9e2a3202b39c613a73ce690ae45bb1bc13d7a05142b158f390a3e9cd4b1465620fc03dbd40a8837ca587507818a8287e58ae70307a7a9a461b412dc0231827914c58d80dc5ba1e3d41a90c6738f2f2c47de27a53110fa8500678e69a410a0702a775c6c0c39ee6a26183c0ef480404367d473c9a942f4ddd3afd2a0127cd80391dc8a90b065cb363da9580796da5b18c11ce3bd30a95da072793cd39597040c1c0c8cd0a33220cf2064e680237e17e61cfa8ed513a0de483ca8eb560b2b061c9e7815138de0b63007a77a86ac55cad2fc8e08a615c1fc7bd4b372a71d2907dce7ad6648d3f2e73cd34e474a7805fa2e49a1b8c907af1401131f7a6b1ed4f3f30e0702984679a0051e98a40029feb4bd5b029324e45000718ebf9534727269d80a31de9a57e5e31cd001b4034dc724538719e6933b5a90c41edfad1fd6948cd203eb4142374a4c639a7375a6b531584a282291ba54922639a4a763f0a4e6a6c0252f4e6929f48637f0a4a56a4a0a0a28a2800a653e93f86801b47e14a7f5a1bad0027eb48d4b4773400da28a7734009b6979a4f4a5a00297f1a4a5fe13400638cd3a907de347dea005a28a2800a28a2800a28a2980377a338a297a9aa24077a5da28e94b408297f2a4a2801d4da7514009b69719a28a630a338a28a6217f8681cd18e334e55e39a06285e28db4bd29719ebd28111e338a70ef4d6382314f4e9d2a56f70dd58729e2a451c0a611f80a72ae4551249d334a39eb4d19a7afbd04005ff00f5d3d7d3d29a39a72aee3daad0ac2ff2a76ed85703a1eb4d60471da97a9fad585c6c8724fb9cd743a7f89355d3f41bbd22d753ba834bbdd8f756314ceb0dc1539432203b58a9e4641c76ae7b6ed24e0f5af7afd9d3f67297e3343a86ada9ea8be1ff000a69607daf517032582ee64524855c2f2ccc70b91c1cd7461a9ceb4f921bb3cec762686168bab897eea7ebaf43cda2f883e26b7d722d593c49ab47a9c300b78af45eca258e203840dbb705ff00641c5763e01fda13c45e13f120d5f5dbad43c5d1ad95dda456d7fa8c8c21f3c0deea5c3e092a09000dd8e4d7a7f883e0afc04d4349d64786fe2b4b69aa69e8ce4eacbba1948ce1500851a4c904662de790429efcf7ecff00fb33d97c4af0ceade2ff0014ebff00f08ef83f4b90c324a8556499c2ab3619c155501979c3649c01915eac28e2a1522a0f5df75d0f9fab8ecbaae1a752bc1a8ecef169bbec9697d7c8f3df0efc66f10d9f8ebc39e24d7751d47c50744ba4ba82db50bf91f015812aacfbb66768e80f41c557f881f16bc43f11354d464bed4f515d1ae6fa6bc874796fa496dedb7bb30555242fcbbc8c851f415f507c3ffd90fe10fc4ab7d5757f0cf8f354d7344b38712da42162b9865c120bf9910255b071fbb1d0e18e0d739e0dfd997e1949f05fc3fe3ef19789f56d16cee159af7ca28ea58c8c88912885981c804f0dc03c0ea2beab8a71b5d59eb7be9e672acdb2b8d4e6e46a6ad1b72bba6eed2b7c99e25e3af8ab278bbc1fe13f0d5858b691a1787ad8c696ff0068f3bceb8762d2dc31dabcb13c2e0ede7079abdfb3b78d6f7c1bf14f4ebbb3d474ad3a39964b6b86d72478ad6589d7e64924547299c0c36300819e320fa0fc23fd98345f18f84f51f883e2bd62e3c33f0f6399d6ce4664fb44d1ac8532cdb4a83bb0830a4b3640038dc78f3f671f056afe04d4bc5df0a3c5573e20b3d1f0da958df29132c7c9322feee32a000c70c98215886f9706634713ccab6ed6cbad97976369e3b2eb4f029349bb3766d733e8df76df7dcf5ef1578c6c3e05f827c1facf857c256dab695a7eaf71aa4c9e1ebd9af74f8d5ade4b6264be78882e5a50705780a171c027c27c2dfb50695a4e9de129757f00daebde24f0c810586b326a3242c200dc218829562aa48566ced38206739fa1be3e6ade18f0cfeccfa6e95a4f88afadf4dbed323b7d253eceac7528c042a252d092995f9b23cb39fcabc0bf68bfd9ff0041f831a0f80aeb4b9af67bbd7ace49ef52f258e4489d5202045b5178ccadd73d07e3e9633dbd2929527a24afa2eb6ff23e7b26fa96261cb8a83e69ca693bcaed46ef5d57f33f5d992f847f684b5d4af348b4d53e1caf8c357d335096eb4430de4a9340659bcdf2ca22379c431f9723b0f978af1df8b57da9eadf10bc4ba86aba45d6857f7b7b25e4ba65e2b2cb6fe6b79815832a9e8e3070323071cd7d5da97c01f0b7c1bf8c5f0527d26e350bf935cbe32dd477d346fb593c92bb4222e3990e4127a0fc7c73f6ddb58a3fda53c6688b80ab65b71ff5e70570632357d8b9577ef27d9763dcca711849e352c242d1945caedbfe6b3493d16b76780a9c376c0e6a4006589efd07a5302960540f735651577648ca11c71d4d7807dc11a02cdc0cfd29c39e0e7d874a7a031ab301f374e9c8a788433aa9076fa9a1262b91a74248dc7d2a65dac311a9dc4eefa526d014a2a90a4f269db8ed01804e38dbe95a08827cf9dc8e452263ccc9e82a4b921c82bf3678f7a6a02a7e5c13d39a18c578fe5258753c0cd228237ae7077720d39571f305e7142b6092e370ce71ea695c6213b7a727f953907030307dfbd35c8247043e791daa5474661c11ee6980246480d8c91fc348b1804ee278e7f1a91654dc54166146e5330cae437452791408684db93fcea41865ea00fbbee2957e5383851e9d69bbc29c80039ea47614142e32bf2800018dc7d2a37e08232c7a01e9532ed1191b896f53da9aea3ccc6ec2f7607ad22903c6cac3ae3f88e694284553c92c3bd2c5cc5db7649e69d3fcfb4ed24e3040ed4c060f932a7f0a63603e33ba9ca793d4fd690af1bc638a004c6327271d39a68e9c938a9513782c7a0e9cf4a45c738049a006313c0dd4833bb39da07eb4e2b8f98f6f5a0279873d09e334ec5a045e586703af14b12abb1e4f5e7348a181c025803d69ca03018e38c11548a1ed8ddecb4e0418f3dbde9ac8a14d3add063258639aa2440bc11d29235001279041a982ab066ce38e31491a9da00239ce71413718178f9723da9523dcf8c1623d6a6006d62003c7427a53a38f629623240e83be69d8a2378761e4024fa540e5f38c1ebd0d5d9247f297230a3a28ed50c887cce4904e3a0a24876239404c61f79039c74a922433b11b4f4e9d3352a431b6e1c0da7e639e687cb3a85e36f01c7f2a06229f291882131c6d1d4fad447e7e092403c0a9bcb7456538c9e39143c71c7bb9dce46131d2a85608d195590b845273cf526a096365241c8e3afad2b3e1b6ff0009e78a56b96d8413b94f0148e9408ace0a73bb3e87bd2196503249c7af6cd39fef03820039e69a58ab6470c7938a8d80617c824e771fe2f4a19016c8f9c1e3269db8367271efef51905c00bc9cfdd145efb8c72a95dc30768eaa0f5a14044ea327b1ed4c28cdb40ce5b3c5298fca3b5c8c91d476a402b15daabc9feb48eaa55770c1f6a9fecd6e2dcca1d9b0318f7a8002700b0c63ad0011aae36927239e053b2858b63776c1e29840048e4fb8a1d4018e01fe75231e1048cd8185eded4320dabf5c919e69a9963863904f634855b71c1385e3239cd1601acbc9040da6936853e8c0704538ae5f2cbcf407d29cca232a7a6e5ee3b52020e72707dfda9c92601247e34e689403d4823f3a68ced19f4e68d8050bbf9ddb57d29e3e46f9464af5c54258ab0c2fe152282e383b57bfa9a62116731e41041c1a76e590205078fbd9a4d858e41217a52a4aabf29c8f7c7e94d00ae5782c32318da3bd46e1304af276e02d4caca037f128ee7b542e464e0e3bd0c411a128030c71fc3d69bb40739c05f5f4a9570582f4cf3cd35d4263f88e7a81d2a4630ed2ac3181d0e3a914808441bb240fb99e94e0ea31bbef01c8a72a6597041dbd01ed53619032b18cee2086393ed51b00db86783e9531551b95b9239a8ca821893b71c95f5a4046d181c67af7a72001572bc8ea5a9769243607f3a1f3d4f4ce72477a7615c6b7cc31804f504530b2af4eb8fd6a76dc067b91e955db3f31c74ef52c622a8539032734f55dcc413922983703d0e4f4e690b9030463b7150035d777dd071d286017f0ef4e25768e7814d5eb8fbc3b0a90230b96e3b73c534a673d8d498c671f9d2331e7d695808c800120631fad46c08cd485b83cf1ed4d6e41e739ed4806118c9ed4bb71df228503b52b62900dceee9d69074f4a5cf6a07039a004db8348c33c91f8529391d293f8680138c0a42b4a4e0e28a0b1add6929c70471c5369009eb494ad41148561bed4b460e68c6280b08dd293bfbd3a9318a818da2971cd1b680128a28a00290f34b450037f8a86eb4ea6ff0008a004268a28a006d1451400bb6968e6936d002af4a51c9e9494bfe79a005068fe2a5a2800a28a2800a28a2800a28a07340ae14ab494fa7710514515420fad2ad253a8013f86948f7a28a0029db6917ad28e3e95448b48474c734b45002018a78e79c507914e18f4c9a004c13f4143ae169e3a0e314019a5726e44147e39a9178ebfa52aa60640c5285f4a61714601a55a3aad005021dd295475a4fd69dcd000b8a7a3118a6003d69cbee2ae204872dce79a500a8e3193de81c8c51f780f4e78ab2460cb3671cf4afb1ff647f14787fc59f08fc65f0a355d6e3f0eea1ac33dc5a5dccc02c9be38d0a8c90095312929905958e3a123e383c367a738e2ba3d2bc3baa6a7a5df6a567a6dedde9f60a8d7773040ef15beec853230184ce0e338ce2bb7095a54aa5d2bff0091e466984863687b294b97669f669e9ea7d2fad7ec2fac783fc3baceb5e21f1bf87749b4b58f75bc8fe69494e7eeb92aa509e301048493803d7a5fd9d6ef42f8d5f01754f8417baa47a0eb31cad2daca48ff00494f35660c14b0f30abab0651fc3b48e4123e54b5f08f882f34fb0be8b46d4a6d3f50b816769711dac862b89c920451b018772411b412783c52bf84fc4104dab5bb687a924da50dfa846d6b26eb45f59463f763ddb15e8d3aea9cb9a9d3d367adef73c2ab97d4c55274ebe2139c5a71692566b4dafaea7dfbfb387ecfb37c02d3fc4efaceb9637dae6a56aa12cb4c919963853710e4b056258b63ee8036f04e78f25f8aec62fd83fe1eef95652f7a840031819b9383ebffd6af9764f879e2cdba73b786f5af2753216c18d94bfe9448dc045f2fce71cfcb9e2b42ebe0ff8eed6eeced25f06f882dae6e158dbc3269932bcbb465b6a94cb607271d2b6962dfb2f650a76566b7eff00238619445627eb55f12a52728cb64be14d5b77dff03ed1fd923e2a4be26f81b65e0bf0e6a1a4da78d7487984165acc6fe4cf13cad2ef023656c7ce5495dc548c953b867a2f8f1f10be21fc3ff85fa84fe2ad5be1cc77576af6a9a5dadbdd969e265da7ca2d2e59be6e418f68ea5bb57c230fc24f1c0d4534f1e0ed7975330fda3ec7fd993f9a61ddb7cc09b73b7710338c678aa375e03f12dadf6a56971e1cd512eb4b8fed17d6f259caaf6d1633be55db945c60e5b029c717354e31e5774acb522590e1678b9568d58da52e669a4dfc9bd95fc8fa63f69c8923fd98fe0e346e72d690337fe02af7af41f187c38b7fdb03e15fc32bff000af88b4eb6bbd1ad45bea16f317c425e3884a0800b6f56886d520060d9dc0609f89b47f87be2af15d8cf79a3f87f56d5acad8ed967b0b19668d0e324332290bc7ad645868baa5e437b2c16577730d8af9972d0c4cc902e71ba4207c833c64e2b378a776e5076692fb8ea59446308aa55d29c25269daff13d55afe67deff163c45e1ed7bf6a8f83fe1dd1aec5e4da15c94bc30906289df66d5c8fe3022cb0ed91df207ce3fb705bac3fb4878d1464b7fa11049ffa7382bceacfc0de2796eb49b55d03557b9d561371610258cad25e461776f886dcc8b8e72b918e6b2fc41a3ea7a1cf7361ab58dce9b7d095125a5e42d14a99c11b9580232083c8e8454e22bceb41de3bbbfe07465995d2c0d784a9d5bf2c5c7d6f2bb7f79cc206518030c7927b54d1a34876e7eef45f4a9d502a03fc3f4ab0630a0ed5ce78e2bc548faf7220589620ced92dfdeec696424e001c0c74a525b722202539ce7a52386f94a3608ce4f63ed4f6111aab6e2091183c0039c0a637eec86e48181cd3e70413824a2e38f5a81d4b93b14e01e4e7806a4a1257569189c75e82a22e724118f6a1976019fbdd9453a381df3c609f5a92b443b7b8c7395a7222b0032720d4b1daa2fdf7639e30b5ada0f85f51d7ee1ad748d32eb529a3569da2b485e6711af2cc55412147735718b93b2dc894e315cd27646238c163c93d29ca03eeca903b6066ba6f0af85f54f1c788acf43d0ed3ed9aa5eca52dad8c891ef3824fccc428e01ea6ba4d4be0478e34bbdb0b49343f3ae2f6e64b384d95e41748268c6648dde2919637501890e5480ac4f00e378d19c973456873cf15469cb927349faa3cd111a37e14e31c8c53d4838db1b9e7a28af498fe02f8def7508eca2d1e39b7d949a88bd86fed9ecbecf19c4929b9590c2154f0d97e0900f51535ff00c03f1a69faafd827d220b79458c7a99b89352b54b45b776291c8d7065f28062a40058138e053f6153f9591f5ec35eded15fd4f35f9a360194a8f61fd697e52bb9c6370c73dabd1b4ff0081be34d42f350b68f49895ec2ea3b191aeafeda08cdc38dcb146f248ab2b91c8542c7047a8ae8ee7f676d56c7e1ee91e20b795ee356bc5be9aeb45758626b386d0b099d99e60ccc0819458fe5390483b435c70b55df4d8ce798e160d45d45ae9f85ff23c582a9c64862474f4f4a6aa22c981d8678af58d43e05eada3fc38bef15eae3fb3da25b0b8b6b6644905d5bdd890c72f98ae767119f948cf3ce2bcd25b788ac854ec201c7bd673a52a76e65b9d7471546bf37b395eda32a946d8b82083cf35217675cb26dcf4c7a7a5573f22a0197c73cf14ef32452d952a18823d056563ab47b085d063031e8295800a0f7cd46b22b1209dc09e07715219176b63e5e3b8cd48f7d8742bd06edc0d230c0ff681eb446c4ee5242ece714331ddc1383c9ab4214e1d58f4ed8ee69aa763e17239cf1da9ca40e3183ef519c87e8493ef4cb2738c1201cf5c1ef4c45c213c6698adb473c01dfdfd2a40c1403c5310f54e78e7e94409fbc20019cd3d59980008f7ed4c8557cc7dcc063918aa249a65da09638c0e314cc9500e067da95e501402377fb5ea68109de141c965a6048ad9ca83ce3a0a6ab383b7a0e98a6a8c6032f2bc6477a595d637db82adeb9a6ca1eebb4066ce41e0668de0c9e6939c71d28620a6472c0f7a8a595d97073b78a4fccb1701a520af0067eb5273ca202a0ae4f34c046480770a95223212eaa509fbd938c50909d96e3d43155dcc4b1e78e82abb49134a38d9bb819e99abd1d83648de006e9b79aad35baf983285b03a3718aa7162e644424091938da57393ff00d7aaa250c7f1c8f7ad58443e5856897cbcee200ce7daa5b7b5859e611a1cbe08dc785f5a7ecdbd852925b98cf1bedc843eb9ea29be54b80444c7f0adbba852147524e40cae3f8fdaaaf95330dab1901b8e693a7ad89e633f322460988f27a9f4a49199d701368ec14608aec3c1fe08bff1cebfa6f87f4483ced46fee4411f98e0216c6493e8000493e80d7651feced7d756b7f7f6de32f09cfa1d842925e6af15f4ad0c0ef3185237510f9aaccc0904a6d2bf36ec56f1c34e5b238eb63a8507cb52567fe7a23c71c3c6c876b6e23bf5a8df1c646dfad7d39ae7ec6ba9693a3e979d7f4db0d562176faa5d5fdcc82d008e78a28bc82b097c9f346770e4f4f7f35f8adf04757f84e90cba9ea3a66a824ba9ac646d3a5793c89e354668df7a2738914fcb91d7906aea606b53579239b0d9c60b17250a55136ef6f91e5e5b62e17a119c531c28c153cf422adcab1940a13e627827b8aab24203370547a1ae27168f66e34b7500fe34dc8ce5c9fc2a4589b7101b008fe214811f9fddefe391492dc048c8240e052be524f9393d40a8d177b0cf63f952aee69195324ff004a9561fcc746c41e99c1c9269fe60137ef075eedcd465c1db81b7d87afad488430e412c3a00339fc6ab4b807058ae57af18a8e45e38209a9e388957000183fe79a59937c71f9602e4720f5fad2e5028c8c4a8e3be334e48cef40db727a64d4884a824f38e31e94ad033ba8c75e49a815c6ee69242a08ebd7d3daa5d8814ee3bb1dc76a8f68772a3ae79f6a531852aaa08f7f5aa5711214565e4e07439e94cf2b1ce01c724fa53f186c1c6fc65b75471c6097fe2db9200ef400d2b96249e587dec7f2a4540a8f93b980e063bd5870c1a338c1c738ed4d1f393d7bf03bd16115fce0fb015040ea40eb48842756eb9e4d07018a739e831da9f1a29771b4e3a65bb0accab8938dd1f070474c557ce49ea31d6adedca055c03d8d4217e639c1c75c8eb4dee1722db97c8ce3b0a5f337292e30c3b538e0ec23b64f151615c93c649efd690585f3f2e303ff00af51f981a3c13d49cd483687e9918e3daa358f080f41d79a818c9179c673e94c2368c1ceded56249010405cb63ad317278240c8ea6a1a021900e8391d81a6c381c67a77a7632bedebeb4c8c1dac318a90240372e0f51c9a63617ae4d3cfdd0db7f1a6b8dbdf3c53b00c915700835191daa5c601e33ea0d46700e3007152c04c671d08f7a36f1eb463d075eb4118e2a40695dc38233ef49b4b7f3a71f948273d7a5373c673400854e3ae6938ed4bd7bd073f4a006d18c8ff1a5e4fa50303eb416264527414ac3e6a4db400d6e9480d38f46a674f7a40281863494a39cd27f4a401451454005329f4ca0056a4a28a0028a28a006fe34375a5fbd4da003ae68e94bfc2293da801b4514a7d2800fe1a5a4fe2a5fad002f4a4a5f7a07d28017bfbd2d22d2d0014514500145145001451401fad021569d49ed4b41214526d14b56014ea45a5a002940c74a369a51914002d2d201b714b54485387029a05387e7400bc60d3863bfe148ab9a5ce4e334137140cfbfbd38f19e33483a51fc3408693c67bd3d093d69001c678a51cd00397a503d7d69a0fb5380cb5002f3b7eb4a073d40149f7a940f6e280142fa73cd3d33f5a4504e4f5c53d01c8ad50ae3fab73d053f008c600e698a3249c75a9637f988246053332131e091cfbd7dc5fb26e9ba658fc097d3f598bca83c77adcda1a5cc8d8554fb1bec61ea7cc0c831ce5857c44cb9c927f2ef5e83e13b6f885e2dd2ed2cfc391788f57b1d1255b882df4d171345633312cb22aa6444e48621860e4135e8606afb1a9cd6bf91e1e718578dc37b273e557dff002fc6c7d5ff001c34bd1b41fd9cf53f0569f74b1eb5f0ee4d2ae6e1ad3728fb55c6e0eea7af26676f627dab83fda07e245c6bdf05fc097367a7c76bac78e3f7fad5c420092ee4b4d90a2b71cab310c076da07ad7cfcde24f15eada86a962fa96b173a8eb12a437d6c6695e5bd915b0892ae732303d0364e68f1b69be33f0fdb695a578aacf5cd3a0b6473a7d9ead1cb1ac48c417f292400282719da3ad7a15319cca4e31b2692fc7fcb43c4c2e4ca94a9aab5149a9396bd6f1ffe4bde3ea2f8dd79f1035df8597fe2bbdb9d77c0fab68f7b66fa8e8af29fb2cd210228e7b1954e5065f2d1ab1504e49dcb93d6f8835ed5b51fdac3c39a75cdceab716b6fe1532456b0ca59fcc6b57def12938121c01bba9207a57c7ba937c46f14d9d869d7c7c49ac5a8b5fb759d9ce279905b80479d1a3646c03237a8c75e6a3ff8493c7f67ad69faeb6a7e21b5d5ae2d44361a83cf3acf3439d8161933b993395c29c76add632cf9945db4fc2fff0000cbfb1f9a9ba7cf1da495ba73597e167b9f5e7c2dbab7b6f897e2e9b50d43e22697650f832e5e5bcf17395d4608c4e9bded880485519208070c0f15b7e38bcbab7f177c55d367b5ba921d37e1fad941a8df4be6cb7f1ed77fb4336d009264652475319fa0f8f3c5179f14bc3d71f69f145c78b2c64bfb56b05b8d55ee62fb440df33c1ba4c6e439c94e47a8a9bc46ff00153c33e1fb793593e2dd23459ad974d8deff00ed315b49015256dd4be14a6d04841c601e2a638be58b5cbfd59913c9fda55553daad6df834eff85be67d1ff184fc45f33c0d1fc20fed55f014ba5db8d3ce80584625cfcff69239ce76eef37e5fbd9e77d6a6b1630eabaefc56d174cd3e0d53c653783eccead1d80dc66be5244c6341c93868f851d40e326be57f0bc9f143c3be139b52d01fc55a5f86640d2cb7ba77da62b4600ed67674c21e460927b63b563f87b4df1a695a9695aae896faed9dd5fbc8b63a85824a925cb0c890452272e47218293df342c6b8caea2eefee5a74fbcafec8f7797dac572ecfab774fded7cb5fbcfb57fb73c51e00bcf847a6f877c2d37887c4567e0e9ffb5f4c57f2af6dad1da2dc5790c922b210a304e72a067a7cff00fb5f787b59d0fc71a65ceadae6a3ad26a1a3dadc59ff006c2ac7796b012cab04c83a3a956c9c0dcc589cb6eaf27d2fc45e36d43c45a8789acf50d7db57b442f75aac12ce6e214fb84c9283b947f0e49f6acaf126bdab7886e26d4f56bebad46edb6ab5cdeced348c0600cbb124f1815cd5f15ed60d5b73d0c06572c2e2154e64ec9dfbbbb6fbf9ff00995368c6dc75ebdeac0ff56086000ef8e9590b281cb12c5be6ce7bd5a595a62d19f94f040f6af22e7d5b896249547cb8dd9e727a815082b95031d718f4a6bcd97f9792c70cc476f6ae97e1e7838fc40f1af87f4092e4d826ada843642e047e618bcc9153795c8dd8ce71919f5aa517376444a4a9c5ce6f44735129932a3323863914f8ad1a6059ce005fb9d3f3afa757f63c365e286d2d7c417ef12e9b7fa90846878d41fecb288b6adaf9f92b3673136ff9fd0560eb3fb320d1fe1ceb5e2bbcd6f52d3e2b5b878bec57da13473c4eb1a3225d2acae6dda42ff212197698d9997cc02bafea7523a5bf23c959c60e566a7a3f27bec73bfb38fc39d0bc71ac7882e358d36e75e5d174e6be83c3da7ca639b5170c176061f36d19e76fcd92b8cf43e9da77c15f097883c7f1dc49f0e75cf0dc30787a4d5bfe10fb8be7697529924d9e5c5237ef1460e483b5f38c281d62b8fd932efc1baaf866ef4bf19ea1a6de5f5fd8da417c74e6b325ae63dfbed5d67266d99c30f931cf3581e20f855e23b1f186a3e20d4fc59e2ad2d7c3f6ff0068bff12ebda7cb6d783f7862885a0fb43b4dbdb853bd075c91dfd185374a2a33a7afcbfafd0f06ae2218aab29d1c4349ad15a5a74db45abf9f63af8ff67ff05eb1e38f06dc4be1ed4fc389aae997ba85c781e4bb66bb692d88090ac9210ebe68dc7e6c1c21c6dede81f0cfe1be81a0eb5a2f8a34cf0dde7c3bbed6b4bd56c9fc33a8cf25c3858d0626532e2403a677003e65c0c72df3cf86fc33a7fc48f1f417d0fc52d76ff548eca5d413509f4e91afedcdbab3b2485ae70a76ae50c72bfbecaece3f863e25f1143e10f16a7c43f195fea1e259174f8756fece95e3b3b792f05b85b8b9fb5131e436e118c82c76e79dd5b53a8a12e754b6f4f2febb6a7162694e5fb9a9886b4eaa5d799dacf47eaf5d3ccf24f81be2ad3bc17f193c2fad6af76d65a7595d6e9ee151a4f2d3630fbaa093d7b03d6bd0349fda7e3f01dddb59f843406b6d063d5aef52b98aeafda596eccd1987e490468d08087e5e1981c124e0e64f0cfeca71788754b0b0ff0084b0417173afea1a133269fbd54da40f2f9d9f34677ec036f18dd9c9c62bcf3e044de12b3f8b5e1b9bc6f1acde195998dd2c8a5a2ddb1bcbde07253ccd848e98ce411915c71957a3cb05a5dff91edd68e0718aa569273718eab55a6bd3abbdec7a4783fe36dff8f3c6d69e17163ab6a5a56bf66740920d77c4735ccde64d20226170622b110563e1612a42f2ac7a59f8b3f1720d175cd5bc05ab785236d12cb4eb2d0e686c7573e779b68f23c534770f6f8191332b2b4473d78af5df12d8c1e13f8c7f0bb52d2bc17e099342d53533696dafe890e229164957cb3e5a90a9346a091202f9209057951a1e2ebef0edd59fc6bf12eade0cf0e6aba8786ef6286d7ed1a729f3597056494fde6259c6ec11b950035dfecea469b4e7affc03e73eb78775a138d16e0d6dcdadf992efff0004f9cfc25fb495bf83f49d4346d33c357da5787df565d52ded345f10cf67709fbb58de09270acd2c4c11491f2b039208e313dbfed473436ba0dbdde80352b5b5b6d5ecef925d45da5bb8efa4dee04acacc8e98003317271935d4694ba07c39f80b65f14e6f06689e24f10f8a3579a24b6d42d03e9d60a24986c4801000c44703208dc39c2e0f6fa5fc29f0a78a353f837f1097c2d67a3c3e26bf7b4d4b405815ad247f2e5224489b809fbb2700608643d7938c5567a29abe9d3a3677d5ad81a6e539d1764e4af7fb4a2efd6fb5d5cf0af1afed0171e34f07ea5e1c6d185969ad1e996f620ddf98f6f059a48888e760f319bcc24b7cb8f4ae6fe04dc6916bf163459bc436d6777a5a999a483507458588864d9b8c80afdeda403d4815f5968f17803e207c40f8b3f0faebe1d681a6d9689693bd9ea1a7daa45791b46fb6573201c12cc194000281b48606b80b1b4f0d7c12fd9bbc37e2787c15a1f8bbc47e26ba6f3ef75cb71756d6a83795455246d6dab8c02093bc924002a5d2a8e71ab2774bf466b4f30a0a84b0b4a938ca76ebfcd1def7e891836ff09be145bd95f6bfa86b56f7d6c6c1f52b3d3a0d6618649952d6177858052627370f2a04da1b0a70bc547e30f87ff06fc396372963a8beb32dbeebd325beb31319614d4961fb38455e5daddcb06073fbb0c0609a77ed4da3f870fc38f85daf681e18b2f0cc5aac13dc4b0dbc0aafca4240670019002cdb4b7639c0cd7cdf1c8b0b24919657461b581e9ef9a8af5234e7c9c88ebcbe854c6d18e21d69ad5ab37d9dadf87ccedfe357c3dd1fe1e78d9fc37a45d4979269f1edbcbc76fbf2b3332a85c0da56368d587f783579e4f03c1bbe52e3d6b4aeaee6bbb895de4795e572ef34ac599989c9249e4927bd3242ce84b70633b7a7535e6d54a526e2ac7d5504e8d38c2a4b99ed7eefa99ac0670cf9cf5c7534a3f7401e4fd4f4abcd024a4f00311c9f7aa3346506d65cb76615cfcae274a69e971aa773649e3d4f5a9597e5da791d706a3520771c54abf7867249e9422de830bedda4f2738e956228449d06493dea2d84819c633eb53a71819ea320569142258818f014a939c7d6a24004a727ef1e4e39a9625624617677ce2a26ff0059271c8e7835a087b81f281803d334aa764e08f9b02a1924d88a08ce7bd240ed34cc063a746ed51702c2cca0af1939efeb4c9c15970f8c9e703b542c4ef002f53dabb7f877f04fc6bf159ae1fc37a1dc6ab1db3059a4122451a13fc3be4655cf7c039ab8c653768ab9956ad4f0f1e7ad2515ddbd0e3d1b70202966a7c768d331662700e4815eb3aa7ecd3f123c370a4f7de186b185ef23d3d5e6ba8173348e1107face85980dff00779ce715909f063c64bf113fe107fec373e292a5cd8f9f1636f97e66ef3377978dbce77633c75e2ba7eaf35f1459cb1ccb09515e1562f77bf45b9c5410476f2ab2a827191dcd7d43fb3ef836c7e207c1abbd0752d7352b6d3351f165b5b5c69f602dc23968948937bc4ce186dc70c178e54d786f877e14f8abc556be239b4bd219e2f0e44d26acf2cf143f6551bf3bb7b0c9fddbf0327e53c575bf0b7e16fc5cf12e81f6ef04da6b30e95f691324b6da88b289e65caf989be440ccb82bb9738c119aebc3a709fbd06d1e6e6952956a0e30ad1834d6adafeae7acdbfecf5f0db54b5d26484f8aa337be2a9bc2fb1f51b6ca347bf139c5b720841f276dc7e638c9c68bf673f0769f75e07d2b561e26d4b53f146a3a969925fe9b2c290db35b5c3c2b2794d0b12a428661bc6143b678c57946a1a7fc51d0bc6969e12b86f105a7888dff00dbad2cfed526f6ba7c83711b06da58fcd9941ecd96e0d769f1425f8dff000ebc17a2e9fe231a9681a5dab5c426fec352666be92e24695c5d4914ccaed92f8c81c16ebc9adb9a367783feac78d2a789e7a7186297bde7d2cecd77b3b7a9d168bfb32f84edb5bf0b785352d4f55bfd4fc4a9a81875cd2a488e9d6c6067542d1942d2f29970244dbb80cf39aeebe19fc3ff0009fc2bd68dbe971eadaa6afabfc38975ababa1a844202250bbe3857c8c8fb84abb3360119535e29e08f849f1cf59f034f1f876c75db7f0cdd44ed2590d4c5ac5728c3e6fdc3caa5c30ff0064861d335ce781fc3bf14fc7be2dbad23c3f2eb12ebda6696d6735acda81b696dec91951adcf98ebb6305d47959c73f77ad0a4a328b8c2d709d19e2213a73c5c5a4b5d7cf77dbb5bc8f56f0cfecede0ed53c41a1f877549bc4571737de191e216d56c6e615b55279f2d50c2c4a8c81bcbf271f28ddc57d77f677f025aa6b56b6d3f88dafb4bf0ddb78964692ee1f2e64620cb00510650ede15f2d82d92a42e1b9493c05f1f7c13e08b7b858fc57a6f871f62456969a93aecf35b0abf664937a6e66c60a0e5b07ad6778fbc01f19be1ee96fae78a175eb3b1bbb74d366b97d4bce2d6e47cb04bb246223ec15f0b9e319e2b5bc7975a6ee4c6352557ddc645a76495f769ff0097436bf6aed6a6f0bfed31aa6a9a24973a5eab62d652acc660e44ab6d115741b46d1b7602adbb2431ce1b68e6743f8a5f167c697978fa1f9facf9502dbcd63a7e8304f6c11a63282d6e9098c3799960e577673cd3744f827f153e374173e27b5d1b53f101b870a756d4af111a7da028c3cee0c80050b919036e3b62ba0f05ff677c1df08fc4ff0c78ff4ebcb3d735086c61b6d2e391a096e144cc5ca4e2391140186c905580c739aca2e729b6eea3a9dd2fab53c3430f151ab561caada37d13d3cb733af3c71f1bfc712ea3a7c96faeea925b3186fa08743567819e549b6b8487284bc51b60e3eee070482df1ef843e256bde0f875af14de79b6d7f25ceb6966da74cb3f9c658ede42fe5dbed8c9c44406654c15c72d83dc5bfc79d6b538cf8ae7f86bacdcf87f4fd660d5ed2f2c2f668e086486de3b5d93dc792eb282b1ae4fca7248270c454371f1cbc57e01b7b6b8d4be1cea3a2893735a5cea4658a2918ea5f6f03e6897781c21008c8f9b23a56c95392929546ce0e6c4d2941d0c3c22d3d5271bedadb5e9a1e1937c2bf1a5bea76f60fe11d71751b889a686d5f4d9c4b246b8dccaa57240c8c91d322ae5e7c13f1658f8275af135fe9573a75ae91791595ddb5e5bcb15c46eea183152980a03264923fd6271f30af6af11fc7ef1626b1ac69f1f80b56d2e54d3b52b8bbd3de28d26b43728337798ace27544077167c96c82cf900d73de21f1978c7e2afc39b4d0f4cf877addc4335be9e23beb68e6ba5956ca3781dd42c5c8667e70c769183926b95d1a0b9acdfddd4f4e38fc7c9c79e3149b57d577ff00231be1a7ecd17de3df065b789ae75ab5d3ec26171711d9f97234f3dbdb1559dd5c294460ccaaaac72724e3039dcd67f649d4a3d4756b7d3759b74c5e14b4b3b88e56716cfa87d8e0796758fcb049cb32825805cede70392d27e3378f7c13e02baf86fa744ba7c57175247246b6852fe395c84922c8c1dc48dbf329719c023031d6d8f80fe3cc5a7be8e97fa95cdbdf6a2f0bd9c1e228245fb6056ba712289cf9727eeda43bb073cf5619d22b0ee318a836fa985696614eaca757111845bbc6f6f87faff87386f8c5f0a748f877a2f84a7d3756975a975386e9ee2e8c0f0c04c570d1af968e8ae38183bb392320e08af2e08222c227fbdf7b3debd43e2568fe3cbad7b43d27c5f3ea5ad6afa843149a524da8aea0268e66223685d1dd487652060f38abb07ecb3f11658659d344b336b6ef325c5c8d66c7ca84c5feb448fe76d429cee0c463073d2b86b517527fbb8e87b387c5430b422f155936efab6b5d74b6de9b1e3cdb04423914afcd905476a3fd4a4803643636b03cd7bf6bdfb2af8834e36369a148de20d4afedece60b08b4586333412ccd1998dc9c955858860a5587395ca86e3fc69f03ae3c23f0bb43f17cba95a4afa95fdc583d95bcf04c11a238de92472b7980e0e4a8c0f979f997394f075a3adb63a29e6984aae318544dcb4b75bff499e602420019f6c52ee037a92589e98350480c6e559718e86a450720a8391ce3d6b8b9bb9ea8e70d131c2e071906a5964f3d00caa04e71eb4d31ab60ee3239fbdec6a391082b8c1c03cd30159b6b8c1ea396c55a1d338c71c1ef5515caa0520b2f514e121236e70dfca8b8ac48e439dc0138c0c8ef4d561b9b0067181ef4924bb406d8793c81fce9b130685b3c13ce4f5c531085c951b5c9761c83da84e400846ef4f5a4750318c0181cd3183281c9c763eb5370000abb923a6738fe742f44666ce39e7d28595a3383ca0e4fb535d85c367a2e7822a740154961f310067e5a702acc3b0c609fa537cadbc67bf14ee254c1c02a7008a4044ce36b303919e334d78773312a3763f84d3642bb30bb8b7d3a5303151b738f6a9b9412a6d5273926976b70320e3d2a363b8819ce4e314a18a9c81cf419e95202b261d881c5348e724838f4a7232f2a7241a5386270383f740140103280d86ce0d3171b8907f0a95d4919cf3e9518001241edcd480b9ce403c7a535978e78fa8a68caf23f2a7094bc654e793537023ce41e48351b600e0f27bd48ddc0f5a418c1f5ed520220e3af3430c9f614e4f98526d20fa54808dc83dc7f2a8f6fcb8a7e729edeb4de41c773400cdbfe45078a7114d279e9814008473d7f0a4a715e73f9d1b703fc282ae21fbc3bd26dcb0ef4e2a768cfe74d61cf5e6818603629a54027d3f9518e714bfc27ad0033eed2f341edeb487f4a9003cfd29297a8a4a9010f146d14b4ddb4800f5a4c6694f0b41eb4009451450026da4c9a75211f850021f7a4a56eb494009eb4bcd3697eed002d14503f3a005fe1a5069b4e5e9400b45145001451450014638f5a28a002976d2514c91df8d0bd28fe2a5a420a28a2ac055a5e879a28a003bd2ff4a4029cb4c4c5c668a294752698836d0bd69768a5c7e5408067b53a8e829189a091dbb228fe1342f4cd046281d872b734bf769a06de94bb7da80b0e3f4a50b81ef483838e94e50319271408169c3df834d45e7dea4ce477ce6aac01d3231f9539490791483a9c7a5394f07d453440e4e463071522a02de82a2f7a914e467a7d2ac91646f97d79afa63f66dd7ad7c23f05fe24f88ae6c26d423d32f744b9fb3c3702dcbc8b72e532e51f03705ce0648c8046723e64dbb815ee0e78ad32cdf6689384e01c7ad75e1eaba52e64ba35f7a3cdc7e1562a92a3276574fee69dbe67b87c17f17b78a7e25f8e3532f6ba7f8bfc43a75f7f63c81844b1df4ce18244e4feedca97556241e719cb72ebdd1753f077ece7e21d2fc711cb617d73aadab787f4ad432973148a5fed3308d8065899085cf42dee413e1f0d8cd7925bc36d0bcb3cd208d218d4b3c8e4e0000724938181eb4dd42cee2c6f2e2daee192d6e217292c12a9478dc1c32953c82083906bae359a86ddff001f23865818baa9c6692bc5dbfc3d9df45df4efdcfb53e04f8d345d0fe0af867c59a9bc46e6c2e9bc21279c49f3619eee2988ff00b670ee2060e42f5eb5e69f1eede18ff684f08f83b4ef324b4d0a1d33478f7100b9cabe7d013e68c9f51ed5f3932c9e587ce037455ab4b0b2b1206edc3827b7d6ba258d954a6a0e3b5bfe09c34726861f133c42a8fdee6d3a2bebf86bf79ebdfb50787db4af899adea0fe17d6f48136a938fed2be9736b783770611e426077fbefc1ebdebe81fda59a093e1178d27d155aeaf66b8d161d6e29a55616b6eb6ead6d3c2830543bb08cb1c92430e838f97bc13f03758f1b7859f5e8b59d1f47d1bfb523d29ee756b868523919436e66d854200c32739f6ae3b52d2e5d1753d474bfb4dbdf9b1ba96dc5d5949e6413ed72bbe37e3721c641ee0834d569c232bc7e325e069d69518c6aeb4747e7b79f91eb9f132e746b6fd9ffe164579617f73aa4b6ba87d9aeadef923820c5e36e0f11898c84fb3a63debd2be0ecabe22f02fc13368a26b7f0eeafa94daccec3f75a7c25fcd0f33f48c152482d804f039af9ebc23f0c350f1d7867c51add95d59c16fe1db75baba86777124884b01e5855209f979c91d473547e1df81751f899e34b3f0f69f25bdbdd5e97447bc6658b2b1b39c955623853d8f24528d59c6a29b8fc564be56fcec556c1d1961e549d5b723949bedcc9fe923da7e0baaeb5a4fc70b5d0966d49eff004d73616b1dbb4b24e1a73b4aa819dd8238c77f6af9e75a8a7d3e3bab2be864b4bf8e468a68268ca346cad820a9e41041041e4525c59cf0ea135a12a5e1768cb0e149538eff004a86ed50daa94625870c0f41cd71d6ace71516ad6bfe67b184c32a15275232ba959f9e89233155f0b92a8319ce3b54e4b5c056505dbee96353adaa5f5c0639098073d2a58d4a4acd1742701bb9ae0517bb3d57246ad8f847576f0acfe215b656d1a2ba5b192e8c8bf2cce8cea8133bb954639c638eb9adef07eb971f0efc75e16d7deda1be6d3aead7554b782ee36122ab8708cc85bcb63b705586e5cf2b5e81f027e3e69bf0bfc23a8e8b79a6dcbdd5dea5f6a8f51b58e3696c94db4b099a2ded8f354b82a08c105b953835de5bfed61a3f876cec62d2db5f13aae870dcde3431c52dcc566f21b8e933101d580c6486f9831c75f5a952a5caa4a7667cde23178ae79d2f61cd17e7ba7fe447a5fed15aa7c54f1c6ad709e0d6d46f6ebc37a9e8f76b0eb096ee6c5dccca55a488a87863deb920efe0e06369e2fc23f1d342f00687afe9be1ff095e42355d3ee2c2e1ef75c33a4a92a00ad711792a9234677ec2823e1c86ddc93e81a0fed49e0fd2d64f2adf5ad234cfb2ea76e740d36ce0fb25dc97323b453cc4ca08755655202b636e1481956bdfb3efecafe1c9bc127e22fc53ba165e1c310be82ce594c3198338124a4618ef38d88bf7b20f3b80aebb4a6ff00773bf77d8f1252c3612949e268b84345149b6dbbbd37ff00807936b1f1ddb54f8dda37c411a308469a6cd869a2ef76f16e8ab8126cf9436dfee9c67bd55bef8c1a4c7a8789a4b5f0e5dff61789d49d634bbdd5565677f3bcd492095204f2ca374dcae3939cd7d3b37c7cfd983fb5a7d2ff00e107b66d39f10aea4be1d8042063ef03febfdb3b339fceaa4df003e15dafc6af86d71e13d534dd474ef10f9f21f0e5c117d09816da53e70ddbb0bb931b6427e6071f74811cb524f4a89dd93f5ec3538dabe1a504a3a6faf2ebbf7fc8f953c33f14fc3fe0bf1441a9689e1196ded934ebab0921b8d51a69ee1a68d90c8f2796a836eee15235ce3939e6b52e3e35dc1b1f86315be9d1dbcbe09dd2413bca5c5d39b8130dca14150080a464fd457d75e25d4be0769ff156dfe186abe05d3adb55bb921816f21d1edd2dfcc930635122112024955ced0327938e68f855fb35f837c17f1cbc69a4dee9765ade8f2e956ba869969a9dba5d1b6124b223283203d1a3383d76900924126beaf557baa6ade5fd79197f6d60e51f6d5a8493e5e65777ba7a6f7fef33e7cd27f6acb3d07c59e1fd474cf09b45a6586a5a86ab716571aa79b25cdcdd44f1b112792022207f941463c72d924d7977853e20a7c39f1fc1e26f0b580b68adc9f22d75874be2014dae199638f3925b0555480719ea4fd61ab7ed15fb3be8baa5ee9f71f0a924bab599eddfc9f0f586c66462a4a93202471e95e11fb35fc3bb2f8b1f1fb4eb4fecf59f40b49a4d52ead59176ac11b655190e4329768d08f46358d4e694e31e7bbbfdc7a986a942342ad6a941c22a3adddf996afbf9999e22fda63c49af6b1e13bc8b4dd0b46d3bc33762f6c347d2ecda0b4f383eedcc81f3c9cf461d4e30493506a9fb46788757d1fc75a73e9fa4a47e30b84b9bf748e5dd1b2edc088990ed1f2f460dd4d7d43fb6b7c11f0c43f0960f14f85741d2f4bb9d22f4ade36936b1409240ede5b6ff002d46e659020c7f0e5fdeb99fd967c65f0a3c65a6f873c0b7de03b3bff140b795ae351bed1ad2449194b3e4ca4973f2e072bdbd2b474eaaabeca53b37b1c70c7e05e0963a8e1eea2f54b756f7aefe7667cf9f0d7f681f107c37d06f7c3d1da697e20f0e5eb0925d1f5db3fb45b2c99077aaee539f941c671919c679ab3ab7ed35e33d7be21685e2abb6b1964d0811a669496e63b1b5523690b1ab03d31ceecf0a3380057dbba447f08f58f8b5ad7c3b83e1d68d16b5a4da0bb9e59343b4f2194888808dcb671327054743cf4cf17e26f869e10f895f09fe23e85e1ff0b68b65e28d0b53bc8a3b8b3d3a1867de9279d12abaa83b59088f19c707b0ad3eaf5946d1a9b74f439639d6027579eb619c79acdb76da5a5fe67ca3e1cfda2b5cf0af8f7c53e2cb1d374c9b50f11c53c37d05cc52b40a2570ec6302404608e3713c7ad7b0fecfde28ff008b3a7431e38f045d5b7dacbcbe18f88567e5416d962dbe194487cc04e1b1b700927e53d7e76f857e099fe247c42d07c310b321d4ae92296440329103ba46ff0080a063f857e865d7833e1d41fb4059f82edbc15e1c922b2f0d4da95d45fd956ccad23dc409167e4ce5544879ed28ac30caa4d7337a5edf79e8677570b8571a0a0ef6e6d2ceca3b7f92b58f9a3f6b6f8a5a0789b52f02e83637f6be255d0119f53bcb140b6b712379598e2c1c05c467a12006037120d743e20fda0344b7b3f88f7da5f8f05c47a95b5a7fc235a1ad8dca1d39a264250068bca8b6951c23156dbb89cd761e34f8ddf00bc37e2cd4b439be18a3dd69b7335add490f87ac0a34b1b946d99901db9538c8071dabe4cb1f0ab7c60f8a92e8de1a8ed7498b58d4e77b18ae87931c31b33ba2b040c1405c0c282063038adaa549c66e5069b7d3531cbf0946be1d42ad39421057bbb59eaa4ff2f23e8bbcfda5be1a4715c4fa6e99f64d5238dfc4f69208a4206bb346f1c91302bc85de8dbfeee5383c0aabf0dbe3ff0086341d47c177ff00f09bbe87a2e9ba13d9eade1c9acee5daeb5021f7dcfeee368d8bbb07f30b6fe3040dcd8f31befd93f5c86ded6e878b3c2f750dc47673a4b0dc5c63c8ba9fc88663980610c9f29ee30491819ac8f0bfc07bc6f899e0cf0c789655b17d6e4679ad21942dcdbc4b248877161b033794fb402d9c8e32402bdb62135ee9b7d4b2a74a69567d6fadf449ded74fbdcf4ed2ff00686f0dc3e27b28eeb50dd6f6be13b7d3b4ed4264ba10e9b7c230252638b6c8a5f1b0cd17cc001824671e3bf1cbc6d078fbc4d637105d69fa89b5b18e09350b1b7ba4f3db9243bdcc8d2ca5738123e091d4715ddbfeca7a8dfc6b6da6dc69f79abea135abdac10eae661656f711cb3209d96d824c7cb89c978a4c7cb90ac18566db7ec93e2e8ef25b5bbd5349d3d5bec7e44b79f6a8bed0d732491c28a8d0798adbe32a4488b8c83d0e6a6a2c454828ca3a1d7859e5985abed2356cd24acffcac7833db98d89539fa53a1f991c6ddec7a0af70b0fd9ddb4cf0febf7be29d56ded351b4d065d62cf48b398fda462658d2490988c662387e15f7729d01af187b5fba570c4d704e8ce95aeac7d461f194712daa4ef62a332820720f7cd4e877c5ce46d1807d698a8253216e303a7a548177018cedf4ed58a3ac95594e029c9c7241e950b109b87500e4e4753532a80a59703d7daaacd2ed56da073dcd53602dc80c15b3838ce69228249581e36e39268851a72ad26421e3eb57a30a0a28214742288c79b55b13cc8961b31163cb6cb11924d7da1f0f6d7c53e2bfd90348d3fe17ea02cbc456ba8caba9476b72b6f70e3cc918aac871b588685b395f94633d8fcede0bf831a978d7c1dff0009347ab68ba4e8ebaa2e90f3ea970f088e564570ee761509861c939f6ae6ed759d67e1ef88353b7d0fc4525a4f6b3bdb3df6877ce91dc056237248854b21c641ee0835e9d1bd0f7adf12b687cde654a199c552a334a54e49eaaeb4e8fef3ebff008c5a3f8c743fd8e4c5e38d49ee3c476f776ede679fe6cea3ce1b164901f99c03f7b27a0e4e327a5b3f881e1cd27e1cd87c7bb94fb66b6fa241a4c904642799389b122a83df7e79ebb12be4af0d68be3cf8a9e0bf1a5d2f8a6eae344d1211a9ea56ba96a170cb70c7710ca9f32b3feecf2d8e839ae7fe1df867c47f14f59d2be1fe9dacb436f753c93dbda5e5cc8b671cab13b1728a1b0c55586e0b9e71debb5e29a6ad17b7e5d4f99fec3a72a53854ac938cdca5cba2e569371f9d8fac3f6acd4f48f86ff0a7538fc37731f9df113525d464684e3741e546d2b2b0eaacc109f5f3debd2279b52d5fe0ff00812ebc11e1e9bc59a50b18625b6d37c52fa44b6fb630b86642a24da5595816c861d0f247e79f8a750d6a4b81a56afaadcea6ba3eeb2b7496e5e58a0553b76c618fcabf28e001d0714681e3bf127844347a0f88f55d1a395b7c89a7df4b0076c70484619acfeb6f9de96febf53abfd5bf6986a718d4bca2ef777b3be8af669e88fafbe28f8dfc716bf1bfe1fd9597c3fb7b8f13e90934d6d141adfdb0dd5acb198e457768d1a3c60e1e4e37027e6e735be3b7817c2577e16f087c43d4b4fd67c210cde2589b57d0756dea92ef90fda2410124072b196dc98de9c9193c7caeb69e34b8f1c02f0ebcfe3167170a364dfda05b66f0e3fe5a13b3e6cff779e959be26f1b788bc68f0b6bfafea7adb5b8610ff00695e4971e586c676ef276e70338eb81532c4df99496e7550c839254bd8d451e55676bdda77eede9add1f757c52f08fc6ed7be32695acfc3fd7d57c10cb6f25acd05e22da448546f33c5b879c18ee6180fc30008ae87c15aa687ac7edc1e238f4c9e0530784fecfa94d6c000f72b710e4123ef3043129f4db83f7703e0ad2fc69e3df0df86603a76b1e22d27c33348f046b6d79710d94926373a8da4216e72475e79eb5e9137c19f197c3df0fe87e2af056b77d25cea5a65adcdf49a65e4566f66b752ac704395b8f3240f22e09d8ab951c9dadb6bdb39a6e2afaff0056386593c28c7d956ab18e8e11b46d7d55dc9ebafeacf61fd997e3278c3c51e0ff008c9ab6afad5d6ad71a7580d42ccdcb6f8ed2531dc36114f0ab98d3e41c7cbd3ad64782fc6badfc42fd8e7e25dd78a357bad66e2daecc715c5f48649157f70eabb8f380c4903b6702bc7adfe0e7c5df06687ac1b482f747b2b88ee9350b7b3d6e18daea3b62c93868526dd304cb0202b70dc7dee65ff852ff0018b41d366f0fdb5b5e5bd85f5cfd9ee34bb5d6a0314b3184cc1658926c6e3147b86e1ce140c92a2aa352ad9271e8d7de5d4cbf02eaca74aac15e516b6d146d7b1f6c788355bad7be1ef82aefe1ff008467f186822d11608b4cf154ba2b5b204000608543818da416ca918dbd6be5ff00db6fc65aa6b5e2cd0744d67c2367e1cd534d81e4135b6aa2fc5cc32eddb93e5a32ed646c0619f989e8727c816f3c75f0a349d28db6b5aaf86edf5c83fb46de3b1d4da133464ed595a28dc15ddb700b019038c815eb3fb15b586bbf1435fd5f5b173adf896d74f96eec2198a4b713cd901dd1a53b4ca0600dcc07ce49e0645caa7b67ecddd5cce8e5b1c9d3c7dd5450bdb7bdde9aeb6f5d3cc9fe187c66f08f84fe004fe19d5b558a1bfb88b54b7b9b586de77b9649d142085f6187e62a33bcf007041adff1b7c70f85be30d4bc2a5b57fb3d869fab5bea7aadbbd95c4a6fda0b1021281936aaef53032606edc1b3819aeabe306b1e1bf187867c17178c7c2fe3288dc7886d638f5ef15d8d9d9b2c4665171048606468d0c7bc8ca0ced0d93b723b4f06ea1f109fe3e789f46bcd096dfe1fe9f68cba54a962a90c436a08c45280092c376e5c90318c0c57545ce4953e9a74d74f99e3579d28ca58ae569fbcdfbe92e89dbdd777aec7817883f68ef0c78afc75e05f8812896cb54b79e7d275dd26f0b5c0934d94b10eae912a3aaacd2aed203e426436371957e32781ef357f17688badda278420f0f5ae85a18d5adaf7c9ba11b0776945ba0954b3972580527e5fa5755e07f117c4ff000d7eca32dd0b3d5f59d4f5454d3bc3f6761a664e9f66aa435c334481f246763313d2361904d69783dbc61e1dd0fe10587c2dd16deebc1dab5a432ebd77159a4e93dc3102e7ed4e77797b46efe21c8283ee85ac94a4dab3f3dbe5dcec97b18a9454348be55efe9a7bdbb5bad97cfa1f30f877c09aaea5a578a3c7de1dd434db3b0f08ea3048ad0bcfd649f10bdbaca858a29c1fde90d8033939af48f167c7cf10fc2ff165cd969f65e03d62ebeda759b9d4b417b9b9b7bdb89ada581d998cb8ced99c9550a03738e4e7d7f58f1047f0d3c0bf1ef4bf07ea514565a2ea56434f8ed2389e2b76b968d6ee341b48c06691307ee6dc0c115dbfc4ab5934df1ffc52f11783ad6df50f89967a369dfd9b0cf02cb2c31316134b0a9eafb777001e55060efc366a8b8a76959eeffe01bcf3355a7fed1494a2f4577d1a8fc5a68bdebdff0003e11d4be2c6bd75e24f096b245bdb5ff856cadacac1ad91b0cb03b3a1932c7249620e3008e315d5de7ed25af7f60eaba2d9787f40d1f4ed4cde1bb5b486e06e92e9024aff0034cd86000da3ee8c00060629bf1f35af895e20b5f0b5f7c47d063d3a630ca96b7f258a5b5cdda86191301820ae7842a9c3670739a4f873f0397e25fc25d53c4763a90b3d52c35636f71f6a976da4164b6af3493c98467c8650a08cf5c63b8e28fb4e66a9b7f71f532582786857c4c5249db4775bfcafaf9156dff69cf115be9fa7dabe9da5cf0d8fd8c23235dc123fd96078222648a7471f2b927695c903b654e07c44f8d5af7c4ed3d2db54b7d3e145d46e7535fb142d195927da1d70588da360c719ea4962735dbdd7ecb3a85fdae8f7165ad68ba75bddd969926fbebd9e5f3a6bc67588204b5529b8a7dc21b66725c8c90782ff0066379afa35f166ab6fa5b4d63a85dc3a3dbccdf6f945b0750e0189a3d86443d583328620719072e264ecde8cca35b28a2fdb452e64fcefb7e763c1f68cec61dba1a8a485a28f7060c99c15cf35f657ecb37d69a27ece7e3cbab517b69aadc6a96f626fad2181d9bcd31c70a032ab0237c8dbf2090ad95e6bbafda32c741d2fe0afc4eb5d4aeb5bd56ea3f11dbffc4ca65b75792fcda4063cac691a88846501c286c838cf5a9fa9274d4ee672e2070c57d5fd9e97b5effe1d6d6f3ee7e7b070ac0e381c0551dfdea6770bce30d8e98e2a69d11c8e0198f3c77fad42e4bb1461b08ea7d2bca71e53ec53bea571f740c671de9c770438201cf1c734d24a37ccbc03d69e1b91c03ede95031a4b056e7181cfbd42e781b0e548c71dbdaa497f7cbf7b6ede80546aa36b02c0fa28a421570ca034bc8e02814e2e03261b72e3073d8d41d1f3bb200ec29c072003853d0f7a5710bb0e1812776727d2a474d8a01c8f97903b50aaeaa406f9872a7192d4ab7180cb2773cfb51a0092b2e172492067db34b1c8aeb91d8f34e9634688ee6381d31512c2adb955c95c640ef4810afcb160a4961daa028a8bc9c3d4f6f2bb22671e83de9ae776380cf536d0a2b800bae3800e49a47c34858918eca29cd130720f27af1da9ac877920723bd48119dcaa08e39ebdf14fc8c0ea3d0d3081b4752c4e29ec9b723bd0034ca377ddce3a8a8dcfcc7038f5a9238f76fcf619a87396c0e9dea06215c8cfe9460020e3ad386003eb4d63c91fad2b088dc11827183e940395c1e9e94e63d29a492b9ee6a40338e79fca80a49cf53ef460f1cd264af4e86a4042c15a8fbc3a7e343297c6474ef47dd3cf6a60263777e69ad8db8a7381eb4d273da900d2bcd3867b743d69a477a4cf43cd000e38cf5a4a76ee79e7da987b5055c1b1b47ad27f0d18e941e68189b79a3073452b70290ae37da929437ad2548c293a0a5a2a40652ff0d2b74a4fe2a004a28a2800a4c734b487b50026483494bb4d0dd6801bf76979a39a4f7a005ea28a3fcf14bd68005eb4ab49f85281400b45145001451450018cd1451400ab4ea6ff000d2f4a6407f152d27f152d1600a39a285eb54028e3de96917de968017a1a51c5369dfc55448b40e68a5db400ea3b526dc9a503838c5048ab4b4638f6a5fc681074a3eb4a30452edfd681dc01e29549cd201cd38649cd585c519fa1a71c63fc05317ef7a54a8a58e0609a0420c834ec00320f7e94863dad834bb7283eb40ae0085f5a782081c6299e5e4f15201f8fd684487720726949c7519f6a02fbd26dc8c0e9ed5602abe58e38af78f81fe22f0668fa0dfa6b3368d61af35e5abc777afe8efa9dbbd9aee33451c4a8db642769cfcb91c0743f30f0738dc428e7debb9f0ffc31f136bde08d4bc5b63a71b8d074b611ddddf9f12f96485e36160c7efaf407ad75e19c949f2ab9e763a14e74946a4f936d6ffe7dcf7fd07e24fc2db1d2ec6e43685a7086c625162da148d7ab7eb761de75b8f2dcaa18c1dabe6b6d181818e69eb9f193e1ea8d6e4b3b1d0750bc92da7b9b69aef42599def5f5191b0ed245961f666cfcdc76ea303c52ebe16789a1f01daf8c9f4c1ff08d5d4ff668af05c444b49b9976f97bb78e55b92b8e2bacb5fd933e2c35f4d6c3c212992240e7fd2edf61ce7015fccdac78e5412471c722bd5f6f889479630f3d8f9996132f84b9aa623af5925b6e8f58f84de2ad1f41d43e3d6bfe17960b7b286d7edba508edb1129f32430b2c522f0158a90a57038e302bd97e01eb56bae7c3ff000d5ef87e4d52f2eafa479fc4474d3a7ed96e9df331bc170449824b11b39d98c71b6be0f83e13f8b2eb4ff10dfa6932f93e1d709aa89654496d5b247cd1b307fe13d01fba7d2ab4de05f10d8f826dbc59369d247e1ebbb936705f6f5c3cc036542e777f0b72463e52334e9e32a412f7345fe66189ca30f8ae651aeaedc77b3da36b3d55f4d57de7d9fe07b9d124d3ee2e3c396e34cd39fe2541e4da6e8d910f9118744f29de3dbbcbed28c576e31c7156b4b9bc52ba4f8961f84634b3e25ff84b350ff8497ed1e579fe59b993cadc65e3cad9d76f3d76f3babe3ed63e0ff8bf459fc3f6379a24dfda1ae44b369f6303a4d713a30041f2d18b275e8c01e0fa1c743e26fd9afe257823439352d5bc2f756d636ea5e69ade58ae3628192ceb1bb15007249000e73d2b58e22a35fc3db7feada1cb532cc2f35feb31f79ab27669db4d75f7bfccfb77568f553f15fe235be8b3e9e9adaf86b4f5b58ae80f28bee98a9f4da091d7b95ae3b437d4a4f1a7c248fe21c9a7afc505bcbe0df641179e2c3ecd3e3cef2be4cefc6dc71f7b1ceeaf93bc2bfb3afc42f1c68763e21d1f40375a45f799e45cfdae040c636656c86901500a30f980cf18ea336dbf66bf8876de1b4f12ddf8624fec31663537b9fb7dba86b62bbc11f393b8af3b705bfd9ad7eb352566a9e9bfe37ec72acaf094dca9fd6a37b72f4e64f95c6d7e6fc0fadbe07e97a6cde02d2c786a3d45a59350ba4d60e8ff00d9c642e266c8bafb4fcdb76e31b3e6dbd3a8af8bbe38d8e9327c55f128d0acce99a57da7e5b56688f94e14798aa62774c6fdf8dac40040e318aee3e3f7c30b7d1fe24681e1ff0009f82356f0fde5ee9e9226953dc25dc934864906f4f2e5978f908e587dd276a8e4e1f8a3f663f89fe0dd0eeb57d63c2b3c3a7c09be69a2b88672abdc958dd9801d49c703938ae6c4ce75a3c8a3b76ff863d3caa961f0753eb13aeaf5364dabbbbef769f979157e01e9ba15f6bdafa7882cf4f9eca0d1ae2e629353f38c10caa50ac8e213bd80e410bce09aefefae3e0add59f885b4db6b51397992d6168eec4cf218a210b5ab676a41e6f9cce25f9f6903d057997c37f829e33f8b0d763c2ba14da9adb63ce977a451a13d177c8cab93e99cd7b16adfb3947e05fd993c61aef89fc313699e35d33538e08a79ae24ca42d25b8ca057f29d48771bb07a9e7238ca8f3aa7a476eacebc754c3ac426eb4b99b51b45ad2fdd1378e34bf837a5f89f59d0a57d2b4fd45a5bfb38a7b182f0dad8912c261f3f76e265056e177440ae1876c117d7c5ff0005f5cbeb34ba6d3469d687c8b78b53b3bc6486c8ea57b2cb146b0f497ca7b7da5b200c83d48af3f9be08695ff0aaec35fb4835ad6249b48fed2b8d7ad278134cb19bcd086d64565dccea0fcc03efc90563619c7a14ff00b27f8465d422b17d5f54d12d575282cedb56bfb9b66875d47b76959acd42aed2582aa92ce3e70092c0a8de2ea4a5a411e7d48e1a9c12a95e7757d7d346fbf5d8f0cf8c1ab785b52f11e9abe10b6b4b7d3a1d32da397ecb0c91ef9f6e652dbf92c0f19031c7d4d7d57fb665e4b27ecebe02b7d276cbe1e692d03cb6fc28516ade4a81fdcc64f3dc2f7c57936a5f08f43f04fc35f12ead269d7563abdd6802e5343d79239afb4b65d4238965dfe5a10245ced3b14e370e45747fb3bfed3fe146f87adf0dfe29da0bad1f6793677d711b491088f48a40bf32953f75c7418fbbb012a368f342764e5f70f15cd5634b13868b9aa0ecd3d5bd356bbd8f95ad9b742d238d91af0a4f6c57b4fec685a4fda5fc20c0704dd2eee809fb24d5edf79f02ff0066a7bc4d5dbc716c2cb0255d2a3d7e0f202edfbbb71e7fbe37eecfe5562dfe387c25d63e3cfc32b2f0d5a69fa5695e1c5b989fc43330b1b6587ecd301080f8dca5d81dcf83b89db9de4b654e83a32529496eadf79d18bcdfebd87a9468509eb095db564b4dbd4f6bd73e1bfc3fd63e245ef8ae6d1a2d53c67a388e597cb9646922758c3c3b612e1092a06d6c751d720e3cbbf670f8c527c68f8ebe36d756d9ac2ca1d32decececa420bac292b9cb11c6e2cced8edbb1938c9e1fc49fb42e97e13fdb16f7558355b3d47c23ac5adad85ddd59dcac9020d8bb65dca48cc6d9cfa29715dc7c399be1dfc37f8e1e2ed5ec3c69e188342d7ac63b88847aadb85827121f363fbfc024871d3ef1007cb5e9c6ac6538b8b4926eff00d753e23ea35f0f869c6b465372a71e4dddb5578dbfad0e735dfda33e02693e24d5ad351f86cd77736d752c32c9ff0008fd831690310cd93264e4827279f5ae83f61df084ba0fc3cf1878d6d2c9ae6f35b9648f4eb50a91b3c3097c2a9242aee90b29e40fdd8e6b9bbdfd9eff0067dd7351bbd42e3e298fb4dd4b24f315f10d8637b31240cc64e39f5a77c6efda12d7e0bfc2df05f853e1778aec2f751b74114b7da73dbdd2c71469821810ea1a476ddebf2b7ad73a93849d5a8d69dac7a92a71c4518e0b2f8cf9a6d7373f3595b5ebd0f4cf80be01f1c5e7c35f17f843e2ae957105aea93cf34372b7b04cd71f690c665511b36c2b266404f794fa57cb7fb22e8979e13fda920d1efd0417da7fdbad678cff000ba23a919fa8ab5f0c7f6d1f8829e3dd0478b3c46b75e1b6ba48af637b2b6882c6df297dc91ab0d99dfc1fe1c7435ea1797de08d17f6c7d17c6165e2bd024d1f58d3e77bbb98f5381a382e5613190ec1f0bbc6c2338dc4b7a5429d3a8a138b7a3ea754a863705f5aa35e2ad560dae5bdb992b5bd59d17836f24bcfdbe7e21b98c2c8da2c41953feb9d97cdfa7eb5c7fc13f1dcbe18fdb33e21f87a67096be20bdb98c0070be7c4cd221ffbe7cd1f56157fc13f103c2f65fb6bf8f75b9fc4ba4c1a2dd68f1c506a8fa844b6d2b84b3f95642db58fc8dc03fc27d0d7ce9f10bc6cba2fed21ae78af42b8b6d423b1d75b50b699240f0ce1240c3e653cab631c1e4134a55542d25fccdfc8785cbe78a94a94a2d5e8c56abaaff267d47f043e02c3e01fda0be21ebd750ad9e8ba40274d76f9630b723cd2549ed1a650e7fbded5cc7ecafe3cb9f8a5fb5778e3c513a8852f74999e047e36c2b3db244a7dc22ae7df35e8ff00b46fed29e13bef813abcde1ed6b4cbdd5359b64b482cacef11ee235997e72f1a9dc9b63de39030d807935f3afec3fe22d27c2bf16351bad7b57b0d16d5b4592049f52b948236733db90819c804e0138eb806ae72842a4210daf730c3d0c4e2b038ac5e260f9f954177b2dfef67b178dff686f819a178db5cd3f57f879fda7a9d9dfcd05e5e8d0ac5fcf9d246591c33481981604ee6009ce4f35f1fdff8e9f45f8a97fe2bf081fec255d46e2ef4c4f223ff004789dd8a2f978641856036f2076e95f5f78b7e02fc02f16f89356d6ef3e2940b7b7f752decf1c3e20b058f7cae5d826509001638049fad7967c07b4d3bc31a97c6eb5d1f5f5b1b6b1d3a68b4fd71dcca62896e0ac736e894939014ee8d491d546702b0ab1a939ae66979a3d8cb6ae170d879ca9c2527649a95edae9a5ff43c664f8b5e28bbd262d26f3537974afb1db69b25b471c5196b582733c718709904484b07e4f38248e2b43c5df18f5ef10fc58bcf8816d28d2b576ba135a0016616caaa12351bd70db5400495e4e4e066bdaf5ef8f1e1fb1f01f896d749f17dd5d78de4d0f4db21ad5bc1710bea37093bb4ccae5030d91395f324dacf93e82b5a3f8f9e159acfc552a78cd2d3c3f7de107d2b4bf06b58dc8fb1dd9836e3e58cc43e60ff00386e7ccc1c0514b97457a87a4b1324dc9613baebadf96ff67afe9d0f9e74ef8d9e38d29ad4daeb6d0b5b2daa46e96f1642dbc6f142a4ece40491d4839dc18eedd5db78f93c7bf0df52d65af3c55e1db5d4f4bd434c67d3f4d86085e578e3f3eda68a01020291f9a41380327043002b6fc6bf1a6d752b4d4af3c2df105fc37a2ff665bdbd8f8362d3a567825429940767928c1d5a4170afe60e00e95e83e20fda4bc03aaebbac4faa5ecde20d30ebda6dd5a5bcd6f330fb34769b1d955d4001272cfb0e371c900e726e118c938fb439eb55abcf19c30ba7556d7471b2bb56eaff00cf43e6abaf8e1e33d434bbcd2ae35759ed2f207b499a4b2b732b42d2190c7e6f97e604dcc4850d81d80acdf873e01d43e2678d74ef0de97716b05e5d2c9b24bb665886c8de43b8aab1e8840c0eb8fad7b4e89f17b4dd3fe20f84756f197c415f881a6da6ad7376f6eba4c87ec21e22b1cc1a68d1800e51fc98c154f2f2b93815daf82be3f786745d23c3c9e28f88dff093eab69e22babd96ff00ec7787cbb57b19e24fbf1027f79228c0076efc0f95734a308cda75277b7f5dceaa98bad87a728e170d66d744f7d7fbbd2dd6dbe973e35784b06da4e4f5f7a8a16c360862a0918f7ab6b20da70c08ee48a63c2d2461972581c9c77af3648faf8b76572262c13680371e4d2a5992ac64c64636a9ad0f0f787750f11eb369a769b692df6a3772ac36f6f10cb3b13802bd26d3f667f88779237d9f46b59ffd30d8bb43ac594816e4024c2c566215c6d3953c8381d48ad214e53d545b39ab62f0f8776a9351f56767fb29df5ef873c2bf16754b1d897763a2adc4524a82458e452ec8c14820904023208c815f477c15d52df5af869e1fd47c329a8df5c4acf73e211a38d38196e998198de7da487f989623673b3a606daf8a6d7e0bf8ceeac6caee3d06686d6f2cee751825b89a3881b7b7204f236f61b02923ef633918ce455d9bf67bf886b637b33684911b6b45beb8b66d42d96e6de12bb83490193cc4c80701941e0f19af569d6a94e2a1c8f4ff0033e3730cbf098c9ceabc424e4d3e96d172d9eabafdccfaa7e1cb68ba9697752f856d4693a137c47b768ecd9a26f28fd9e3f302989dd36efddb76311b718f4a75a0f12c3a7f88cfc221a53f8abfe130d45bc4a6e4c467117da66f24b79bc795b319dbcf5dbcefaf94ef3e00f8df4bd4752b0bcd32d6d2e74c8239ef5a6d52cd62b5121db189a532ec8d9cfdd4660c472011cd725e22f09eafe0dd6ae348d6ece4d3b52b7c79d04b824020152082430208208241cd29626564a5033864b46b49fb3c4295ecedbdecbaebaef7fb99fa397bfdad75f137e271d10da36b43c3ba69b25b951f67136e9ca673c6376319ef8ae43435d5a4f1afc221f10dac3fe169ade5f799f663119cd87d96e31e6f95f27ded9b71c7dec73bebe17f0c787750f156a96ba3e93673ea5a95e49b61b6b74dcee7afe400249e80024f02bdef4ffd817e245edaa4d2dd683a748ca1cdb5d5e485e3c80704c7132e474e188c8f4e6b55889d4b3841d91c388ca70b81f77118951e656db5f8797bedd6c7d19f0a6e74c5f0469c7c296da9066bfb97d6d7463a7eff003c4cdbc5d7da4eed847ddd9f3ecdb83d2be12f8dd71a15d7c5af124de1eb16d2f4b7b91b2cf744c227da3cd00c4ee9b77ef236b1182071d2ac7c4ef837e2bf847a94167e23d2ded96704dbdd464496f363aec71c6477538619048e455cf857fb3bf8c3e32c735c685631c1a7c72f96da95f49e55bab63eee402cc79e76a9c77c645615aa4ebbe4e4b347b39760f0b96a963a5884e12ebff06eefe5a1ef1ab7c56f83bad78af4dbf967d2e486ce556d524d574396e9f5351a7ac31792e62631ac72280d1b050c46f04f43cdc1f11be0d5e5ba5b6aba46973dad9dbe86d02d968fe44d2ceac7fb40b4ab1867182bb95db6b6df97939acbbcfd83fe2541ab69f6226d16e20bbdc1efe1bb7f26dc852c3cc0630fce300aab0c919c57217dfb35f89b47f8c1a57c389351d1db59d46dcdcc170934a6d82849188663186071137453d455b9d6ddc17dc614696552f769e29e8afbeca2ef7dbe5e86ff00c6df1f786f5ef85fa0687a46b1a3ea3a8daeb179752c5a1e8d269d6f142e008be568a352db4004819e0025b1b8f39a4fed29e23d363b6b69b4dd2350b1b7d2ecf4afb15cc537952ada4e66b7958a4aade62bb1e842907056ba8d4bf62df1f68f6de25bbbcbdd12d34dd0e369e5bc9ae64115caac225630feeb240076e5828dc08cf04d70ff000a7e0278c3e345cc92e81651a69f13f9736a578fe55bc6d8cedce0b3103190a0e32338c8aca4eb3926959f91e9d19652b0cdba8a508bbb6ded777f235eebf69cf15de4b6f73716ba55c4f045aac48f245292dfda0fba727f79d54f098c003821ab774dfda13c43e26f1b69efa858432fdb3c41a6eab729a35b3b5db4d6e890a242ad26096518da73963d4038ab3e2cfd897e24f847c3efab5bae97afc51ee2f6fa54eef3ed0092551e342dd3eeae58f606a9fec7fe069bc6bf1cb496f321b48f4353ac5cacf90d208d955428c1cb07743838e01e72055c5d5525193dccea3caa785a989c3da4a09edd3adbe6cd2fda5be17fc4cd4b55d7be22788fc2e746f0fb4891dbab5ddbb9b480158a0431a4ac54e3667031b989e335e05a7ea179a24969a869d7773a7ea113174bbb795a29538c7caca411f857e817edc90f8d2ebe1acd369faa585a78360822fed3b19907daef253731f94cb98ce02b6c3c3af7ce7a57ca5f1aff00660f157c13f0ee9bae6bba9e8fa85ade5c0b545d3e695dd58a338c8789001853d09ed4eb539466dc7a196459a53c4e0e9c2bb8a726e318abecada3f3fd19e79aa78f75bf125f5a5c788755bff132d9b6520d62f269d19720b26778650d800ed653ee3ad7d49f0cbe2f78c7c65e17d521f84ff0e2f2da6b6816c7ed579e2d92ee1b2dcbf2f976f74e1410071b7a63072383e2df08ff00665f15fc66f0ddf6bda25fe936f6f6570d6cf1dfcd2a4859515f80b1b0c61c753d735f457fc13b6cc3783fc6d2b12256bc836276cec6e7f5a7878cf9b57a33973fad838e1672a494a549abc6ed2d5f549abfccf997c03e22f8b3e34d423f0b785fc5bae3dd5b42561d33fe12036a8b1c600d91079554ed5fe05c9daa4e30a7163c25e0ff008ada7e87736de1cd4af74ed36eae24b6586c3c450dbc5a84aa3122c0a2602e78e098b7fa550f83fe3ab0f85bf18b4df115fc13cb69632dc09e3b4556998bc52460a8665079707a8e335bfa3fc40f056ada2f81d7c511eb9677be13dea8ba4c514b0dfa79a65404bc88606dc70cc03e40cf07a650e56bde97f5747af5bdbc276a5462e2d277b5f577f357b597de617847c07f11350d06e6d74a59f4cd2afee858cd6b79aac5a7477b711b6444239a54f35d5b1c00486e3ad683f847e29cd79ff0984dab5d585ea4f369ff00db1a9f8960b5b9334476c912c934eae76f23038c56adc7c7ff000d78db52d0f51f14585de9d79a56a57d75f67b3d3adf52b6bbb7ba9cccf0b25cb2aa382cca24dadc60e32055ff0012fc76f0df8a3e15df6850d91f0e5ecda95edec1a7dae8165776891ca816286391dd5a0200199634dd9248147ee9ded2f432f698d725cd452bbb3d36f9f5be8715f103e16fc4d68f56d6bc60f36a7268f15b2dddc5ceb905f4b6e93b6200c04cec03139031d0e7a735b3a2f86fe317c1dd1f526b79a1f0cd969da96fb96b8d42c1737496dbb62877ccd9866ff56bb836ec6d2471d0ea7fb43e93bbe21cda558dc3dc6bd068b15a47a969f6d730c7f6455598cb1ca5d0e707610add8fca456bfc52fda2fc1df10344f155a5a2ea7a7cba8eacfa85a7db742b2bd0633650c1e59324b9818bc64f9b1e594608e780f969c5b929bfbffaf232f6b9854e5a5570f170f4f28bdbd5cbee38cf8937bf193e1d69b672f888c7636b0dd5a4509b61632c76f3daaf9d6f1b080308caa4a5c236372b03820575da4db7c708fc1b2ebb6dac59368f268177afb6a171a746e1609a5267b5599adced91c92fe4ab05c0c8c60565fed2ff001f3c2ff19b43b3b5d0ed354d2a6b3bf370f0cd14490dea9b68e3134db1c9f390a18d7ef0f2f1f30fba3cf6d7e38f88edb474b04b7d3da0ff008471bc31bcc6e5c5abcc252d9df8f332319c631fc3de8756309b5ccd97470d5f1187a73746119df55ca7a347f0e7e287c2bd36e3c236be25d3ad74ebb8dfc412c02ca7f25dad123b8052796d42bb0c27cb1bb0cae1f1de4d73c37f173e2c7c239bc59aaf8a34db9f0f6b9a9c57d3dac96e21964b81325823e52dc20c6d4f915f9519da4e6b85bffda4354b8f19dd788e5f0ce811ea77d63269ba895177b6f2078521c38371f210880031ec3c92735eefe30fd9ff005bfec5f8376d61ae697e4ff6a30d3accd94d1c700b8df78e1ddae246902797b140dacc3196cf35a4546a5f92f6f5f33871139e0e54e588e58ce5adf953bd9372fc9599e2da87ecade2fd1f54d52d5ef74d7b8d364b28e5cc7770876b9b936d198ccb02798a1c64bae571f74b1e2b93f889f07357f87fa5adf6a779613249a9df693b2d1dd9926b4902484ee451b4920af3923a81d2bdf3c1f74478c3c61e25b3d462d474ad56d6e7c45abdb6a9e1cb981a17b3bd564fb3c6b72a64c4a41ff5fb546e1280462aef8d7e1ede789fc2f069de2bd76d1ecf56f1021d1f56b7d1a6378975a82a5cc8d2c3f694489790a432cac01380319a978784a3a237a79b57a5562ab4b4f47dbd3bfe1a9f1748c7e6538571d71d08ed4d2e4a0f95548e09ea735eb7f1dbe1f695e00b3f075ada476df6db8d2e47d42e2de679239ee12e65899d4b1e988c6368038ce39af223988b1185c7735e356a6e94f959f5f86c4c3154fdac361ce0a80bb467ad3517041db9f502a38da51364b2b2f6cd398f031d72738ed5cf73a824ca1298db918cfb519daa18723a6def4d2d81d300f734c0dd01c1f7348562c461576b16e4823d3029bfbb20b05f9c0f9bda9abb3e618dc17d7b53d64c636e32dd49f4f4aa10b24bb7a9c003a546eecd271920f4c7a52cdb642db4e770c01d314c6544c63258f6f5a4c113292b271d00fce91fe4046383dc5376a6463231c807b53d954217ce3d493c0a43b91420159300907a64f39a8d998ee55209ee454b0c23cbdcd9248278ef500cee5e085073ef5221517a6e1f28383eb4f75080a820f3c9f5a41c8566619ec3d2937b118efea3a9a760136f95b73ce4738a8b602dc10304823dbd69cee446339c66a3dc4483e51c8e6a1811b21d848e467001fe7487d074a9a6556395e3daa365c7b8a450c6f978ed5182077cd48473d3f3a6e38e9d6a2c037231cf3cd18e47f2a4e4741d69739cfad2b001ee707f0a6e78f5c53d9428ea7dcd30f03b0cf6a000b739c669bfc54fcfcb8eff00ce99838fc6a406b73eb9a08e7de94fb5201e99e280118719cd27d69cdd01181ed4de0d055846ebde931c669cdd3da9a064139a0626de68a5da6939e9da90ac14da76de6908a43129319cd2d1500329f48dd293d68010f145145001451450035bad253e99400da5fe2a168cf1400b47eb4014aa7bf4c50018cd2ff15369df7680168a4e79cd2d001451450014518cd14102fdda753739fad2ff0015002d145156014a0671494b8cf3400bd48a00a338a5e768fe74c03ad3a900ebc52d3242957ad253871de80147f914aab8a4033c938a70c7e34100062940db4ab4b4009f7694649a0024fbd18c7d7d2a900e1f71b8fc681c023bd2af43d852aae78a60007cc00a774248eb4ab8ce7bfa50a401d3767d680062d9e7afe94e55dc320f4fd695705871ebc7a500819e0827a50408010c4d48bd29a318e9c53578e29d8094e00cf53480657ae3bd371bbae6a455e831903a55008b1939c73cfe55f69fecb7a23fc44fd997e24782b496866f10cb289a3b691b66e5648f67cc78e5a2619cf0719c6735f174673215ef9cd7a6f847c3fe38d0bc1b71f10bc3d25e695a3d8dc8b09755b1be16f2c7290876615c4841de9c818e7af15dd83a9ece6ddae7839be1feb341414945f3269bee9e9a799f44fc58f06defc29fd927c1be16f100860f124daef98f631ce92322ee99c91b4907019012320170335d47c6ef891e27f0efed59f0ebc3d61aa5d58e933c96425b28dcac7389ae19242ea387f940037676e32306be2cd6bc5fab789b5037dacead7daa5ef016eefae5e69401d3e6624feb57b53f1b78875cd6edb58d475fd4b50d62cf67d9f50babc9249e1d8db93648cc5976b12c30783cd7a2f19a7b9e5f81e0c321bc94eb3526f9efa6979db6f4b1f56c3ace9fa37eda9e2ff0e6a68b3697e2a8a2d26685db119792da26427d493b93feda57a05ae83e14d5b55bbfd9ee789668747d36d2e4dc4600792649449363a805832371ff003d24ec2be0ad43c49ab6a5af2eb779aa5f5c6b81d261a94d72ed70244c6c6f309ddb976ae0e723031d29d6be2cf1159f890f8862f106a506baccccfaac77722dd31230732e771c8e0f3d2ae18f71bdd6977f73e8655b86dd650b55b38c22b4fe68ed2fbb43ec8f857f12b47f157eda7e229751b8860167652e8fa199f18124522ab043eaff00bf61d38623a9ae9fe07f867e30782fc71e26d57e2578855fc2304734d753dedf2cf0be093e6c099fdca819272a8369036f1f2fe7c2ab7da3cd0e4396de5d4f20e7afd6bd33546f89fe22f863ff000906afab6b3a9f829ee859afdb3553244661c85f25a42dc63aedc7bd14f15ccdc9abb4dbdff3162f24e54a9c6a45464a31d56ba7f2bbeecfa1bc7de226f0dfec5da36a1e0dbbb9d2ac2fb5fba86dde391a2956d5aeaed9572a7238440467a6474358bfb5578935ed13e10fc1ed32d355bab4d3afb46ff4b86de62a938582db6ab81f780dedf29e39f615f315cf8a35ab8f0cc1a1cfad6a0fa25bc9e743a6bdd39b68df24e52227683966e40fe23eb553c41e2fd73c450dadaeafabdfea50d8a797690de5d3ca96cb851b503121461546063a0f4ace78ce68b8f925e87550c8fd9d58d46d3b4e72db7bab2fb8fd19bcd674db3fdb0b498ef5a26bb9fc2220b169703327da646655f46281ff0000c3bd4d0eb9f10bc2373e24d64fc3dd90594124ef26a5e3b92e2de7404b1f2a39559620064fccb18038e3a57e6feade2cd6fc51a9437baceb17fa9de428123b9beb879a4450490aacc490012481ea4d6aeadf13bc67afe92da5ea9e2ad6b50d3a40bbaceeafe696221482a0a3311c1008e3b56df5e56764ff0003ce970cb6e0a534d2493bf374ed66bf13eddf86326bbe3efd936ead3e114f1689e261aa5c4b7b6704a229a28de691d61494edc3f966102438e1080463867c56d0fc77a17ec59afdafc45d40ea1ae2cf6bb0b4c2696387ed306d49640489181dc4b64f0472719af893c29e2fd6bc277725d787f59d4346bb68fcb33d8dd3dbbb2ff74b210719156b52f88be2bd66d2eac6fbc4fab6a36ba84a25bcb6b9be9a48a671b70eea5b0e7e44e4f3f28f4159bc55e2db5adadff04e9fec39aae9c66b954d4f6f7bd2e6e7c2cf85363e3ad1fc5bad6a5e209b43d33c396b1ddcff0067d3fed6f26f62a102f9880124003271cf24004d753ad7ece56be1cd36e7c41ab78a9adfc28f676377657f6da6996e6e85deed80c0655119508e5bf7878031b89c0e57e187c5cd47e12e97e2db0d36d63b87d7acd6d9a59446f1c38624968a4474954a9652ac31cd687867e22fc53f166b9aa5d6822fbc4777756f12ded9c1a3c77d02c513030ffa3794d1a2a37ddc20da49c6326b9e2e972c534f9be67ad5a38e7567284d285d5af6db4bf4d1defaea7a2da7ecb3e17f06f8f344b5d7fc4f3eb36573e2187474b5b7d34a2dd6e861949793ed01a253e76dcaee618c81d8798e93f0a6c3c4df10fc65616faabe97e1bf0f25dde4d7ad6de6cc9044fb55638bccf9d8b15500b818c92dc62aeeabf103e30f88913c53731ea57769a6ea43541ab2e8c82082ed1122deceb16cc858d14ab7191c8c935cb683aa78d3c35aa43e27b38b5082e35e79ede1b9fb16f83512edb658823218e6058e0a608ce38c814a4e93768c34bfe0187a78c8c5caa574e6d5b4daff0077f5d8f53b8f831e19f08fc22f177886fef3fb7a49ecb4ebcd0ef0dbc90b451dc3cc877c6b38024dd13020f98aa15586fdc40e4fc31fb3fdf78bbc07a3788f4cbe6bb9b55d4534cf2618636b7b395e61120b997cdf3232721862261865e72c0565ea5e20f897e326d674996d352d456e27b4b1beb0b7d300f2a584badbc02348c79383e6011a85c90dc122a1bdf12fc40f86ba5b785ef6dae3c289218aebc9934d4b1bc9364a5e27697cb599c2c809525880578fbbc129526d7baec9154e9e323176ac9cdbbf7d2c9356b2f53d0341fd97ec7c51af4363a3f8bdee2cd7569f44be9ae34a313c1711c124caf1c7e69f3236f25d72591871f2f35513f671d1f54f0f69fa8e8de32b8beb9d4f47bcd56cad6e34710ef5b5244b1c8c276d8c4a90a406ce0e76f19ea7501f13acf5ab2f11bfc42f0e430e9f6a35d7d52dac4c16d07db10c71cd3462cd7cd9a652e17f76eff2b676f7e76df41f887e0fb784cfe2cd1f46f0ce93a6182c35c9d3ccb59edaf99db643b607964672253ca6e4d8d9db8ad7d9d3ff009f7fd7de707b6c5c9dfdbad3a79ebe5fe1dba0dd63f669d33c1b6f31d5bc6ba7c1abd935a35e68a5ed4cb2aca54c896e05d79af222b676bc7106fe127835de78dbf675f024d7d71a3e992dd7873529fc5d2e8da75c34125c2e3ecb13ac2e1a7e230ee7f7bf339dc3e5c74e32d7c37f10fc5da26ba078af46d574bd025b68a6bdb2b192f25baf2e332c27ce82d5e57440319948553c1c5749ac7867e33f883c48d35b78b74ff10ea561ac58eaf21b0b2726dee6ee10b15c329b55f90451a16e0aa8c719c8aa51a695b93fafbcc6a54c47345cf109349f92bbb5ba5befbee73fe20fd9e748b5d0d356d535a5d16d2c7c3fa4df5d7f65e9925cb48f752cb1e5bccbac6e0506594aa11d1148c35087f669b4d27c4d65a3788bc58fa54fa9eb73689a64969a61ba598c6c8a649332a7960b4b1ae06e3927b0cd6ddf7c38f8b3a9f8563b2bdf12d949a66b5756be1d318b2999716b7ed6d007992d4a44ab333302ceacca7a31c2d5bd7be22788fe00f8b7c9f19467c57af5e4e35e8a48a6822b51236e883793358f9b13feecee31b445976e3a8352e34a2eee2d6db9b42b6366f969d55296b64add12daebbdf7b9e0f0780753d6bc7b3784b458a4d5f52fb6c9670246a14ca55986ec13851852c493800124e066bbcf16fecc9e22f08e83aa6a4bae78675a7d1d43ea5a7e97aa096eacc6707cc8caae30782013c8e33591f05fe2e27c39f8c965e31d4addaee179a66bc8add46e0250c19901ee0b671919031919cd6d78d3c33f096cb4dd6754d1fe206adaeea77077d86983499226818b6489e59301c6382cb839e70dd2b18c69ca2dfaf53d6ad88c553c4469ecacb551bddf55a6c4be15fd96bc59e24f0fe95aabea3a16867585dfa6586b37ff0067b9bf5c0c189369073904720e083d08abf27ec95e2c8750f10c173aef86ec63d024822bcbebdbd922823f36359158334438c300490393c03d6ba8d43c65f0bfe2ee97e03d4bc55e2ad4fc31acf8674f874fbbd320b092e16f2388e55a1741b632d93cb7a818f97277be2d7c65f09fc41f0ffc52d1bc397f2ea9aa788afb4bfec9b7b7b0b8f32f7cb16e195418f820a3000e09c719c8aea54a872b77d56daf91e24b1d997b550516937afbaecbde4b7eba7f99e43e13fd99fc43e2fd0ed35abbd7fc37e1ad3afe464b0975ed43eccd7bb4eddd12ec24827a6402720e3041af5bfd9dfe07bf852e3e248f16e99e163afe8b6a91dbdb789d84b6d0920b89dc723c961b3f780e461871cd6af833f68ed36ebe1bf84f42bef1fdefc31d63c3d1ae9f7f6a3405bf5bb8e30114a928c6370aa01ce30c5be52306b9bb3fda0345d7edbe33beb5e29b8d4ef353d263d37439eff4c58a6bb8d04df2b2dba6c520b8c33e3208ce318154e1460e32bebebe4635abe678a8d4a4e368dd6c9dfe25d6d67a6fabf91e457ff04b5cb1baf002bdd69ee3c6de59d392079310798e8804c4a718320fbbbb807f1f5293e18e97e0efd98be27c3aad8e997be2bd23c47169e9aa4108792250d6fb9639194385397f4ce4f157bc17f133e1df89f40f8577de24f135d786b58f024b9fece4d364b85d4023a3c7b64404267cb50777ab0e986ac7f177c69f0ef893e0ff00c4db196e64b2f10788bc4c352b3d39a173badb744416700a06014e46eea38a230a50bb4f75fa7f99d72ad8ec44a14e5169464af64d7dbfc572ee78d7863e157897c716697da4d946d69f6a5b48e6babc82d5269d8711466675123f4f9572791c735a5a3fc0df19f88564367a3ec537cda7a0bcbc82d8cd72b90d14425753230c1c84ce306ad787fe27e8e7c15a6f863c4fe19935fb1d32f9afec8da6a1f627c381e6c321f2df7c6c429f976b8ecc2ba9f0efc72d1f4cb1f0f5bea1e143776fe17d4e4d4f46163a9b5b9b7df279a6193747279aa1c2e0e55be51927273cd08d195af2febee3daad5b318b92a70beba7a7dfe97d88b54fd99f5a1e15f0a1d274eb9b8f12dd47aacbaad9cf776eb15b0b3b958094625471bbe6f99b3d4715cf6adfb3b78f743d146b179a440d67f627d443dbea369397b650a5a644494b3c603ae59410370e6bbcd57f6ae3ab585f423c2ed1c97761ae58999b50cecfed1b8136ec79433e5e36e3f8b39caf4ac18ff68410b698e74366fb0f8424f0a6d37bfeb77eefdfff00abe00ddfeafdbef56bfecef667250966f1569c13777bef6bbb6b7ed63c72284cb1a6304019c7a54d6f12e0756e735a1e1cd165f1278834bd1adca8b8d42e23b58b3ddddc28cfe2457d6fe2cf807f0e34bf0ef8cf5cd1ec92ec34325ce85633dd4fb235d3a609a8ab11206612608193901b2a47188a745d45cd1d8f4f199952c0ce30a89b72ecbfaf3fb8f963c03e31bdf87be34d2bc43a6a24975613f9aab367638c10ca71ce0a92323d6bd1a7fda034fd2fc2771a3f863c2d3689336bf16beb7775aa0bb114e8c1822a7929f20da00c927d49af59b1f867f0bb52f8abe18d1b4ef045f5ce95a8e85fdbd379da8ca64896e595a1528b2ab32428483e59673bb2776c24d6d37e11f826f35df0969371e0cb556bfbcd7a1ba3677b7b7064fb0ab2c4233e726f0588270a858a8c6c04ad76429558ab464bfaf91f3d89c7e02bd453af4657b5fa74bb5a27aecce03e227ed71ac78f349f166949a5269f6bab1852d0adc6e7d3a10104f0a9d80b2ca6304f4c64f073c3ae3f69fb0baf1078a3c44de0a9078a7c45a40d2afaf63d5c8b707cb543247098495cf96876976fba0023249f48b8f80de0cbaf02c5aa278427b6d766958ae9b2c7776976b0a5cdbc6d2b42f752f971a2c8db812ec448ac1900c5626a5f06fc3167e20b64d33c167c45a1cfaeea167ab6a87509d46890c374f1aa65640b1ec842c9ba7ddbf3c75a7cb5d34dc8e4a753277074e9d16926d76dad7ebd6df3fbce2e3fda92f27f1678dafdb4dd474fd3fc4f2417061d1f576b4bcb49a250aa52e044721802194a60e474c73e53f10bc6577e3df165e6af2b5e88ddc2c515f5f4b7b2c5181c21964259b9c9fc4e00af74ff008533e16ff844e3d76df4d92f34a7d0e1106ac2f1a28eeb516d51e138767d8aed085054fcabf7881d6b8dfda6be1fe97e05f19697fd89a3ae85617d63e6ad8493c8f3ab895d59a449198a1e0282acc8fb7721c3606356352516e6cf632fad808e21430f06a4f4d76d12e97df63df3fe09f3e13b38fc2fe28f154d087d44dd25842c305e3895048e077018bae79e760f4af9e3c59fb4d7c47f1478beeb568bc51aa6936fe71782c6c6e1a28614dd95428b81263804b839ef5d1fecaff1e97e08f892fadf558e49fc37aaa20b9688167b69173b6555ee30c4301c9182325429f73d63e15fece3f1175a8bc5bff09a58e9a2f241713e9f16b30daa4a4b6e62f14a3cc8f77390bb7db06b6d6a518a84ad63c3aca381cd2b57c7517514d2e5695d2eebc8f97be267ed03e32f8b9a4d969de22d5126b5b32856dade1589259554af9cf8eac72781851938515f5ffc78d7b55fd9e7f671f0e69fe1468ad6f19adb4c17b0a8fdd8689e4925518c6e7287923ab93d6be71fda5aff00e10ccf63a7fc38b0097f6aa23b9beb26616af128daa8437324990099075e725c9f97d83e12fed01e02f8b5f0cecfc01f132582ca7b6862b5f3efa431c574918023904d91e5c8a00072467a8241205527cb2945cfde7d4598d155b0f86c551c33f650936e16efd6c711fb23fc72f1aea5f16b4ef0c6b5af5e6bba56ac93065d4a769e485d62670eaec4b0ff00578db9db862719e6bd23c7112ffc37a780c1ddff002087e48c7fcb1bce95a3f0c347f803f037c5903695e2fb4d435abd12450ea17ba9433adbc7b72c0c91858a2076632d8625b00e0e2b98f1978f3c3375fb6c78275b8bc47a44da1dbe96d14ba8aea1135b44e62bb1b5a50db41cb2f04f561ea2b78fbb4d294baaea7915f93158ead5b0b45c62e9496d6bbb3ff86399fdbb7e236bf6be3eb5f0b596a57565a27f64a4935ac32944b9691dc379801f9c611400738c1c7535f54d87c36d474df853a5784fc1fadc3e179aded61853545b15b92a000646085946f739258ff789c67047c3ff00b6c789749f147c5bb7bbd0f54b3d62ce2d2a184dc69d7093c7bc49292bb90919191c7d2bd57e10fc70f87ff1abe18d97817e2bcf159de59a4689797b3b4493940552559b3f2481786dc46ec9ea1880a1563eda716f563c5e5d5bfb2b072a51b28eb2495df4d5aebf33ddfe11fc17f1bfc35d70de6a3f14eefc65a41cb4f61aad8b16dd8f95a395e77642081c608233c670478e788b4783c0bfb79680fa2cf36991788556fb51f2e5291c8ce25f31085c6e577855c86ce58e7d319b79f07bf668f00e8ba85dea1e2d8fc46367c88baca5ccc87b7971daed24938e5811eb819af03f819aee85a57ed01e1bd462ba3a3f87d3526649354b84062870c17cd7c2a8c82327a73f8d0e4a3ca9dbefb9ae07073adf59c445c9fb8d3fdda8a7a69b3d5fc8f61fdbf7c41ace9df132c746fed3bd8749bbd121ba9f4f49dd6de463733ed63167696f913923f847a0af52fdbea343f07f41cc658aead0e371f5b798835e13fb7178b745f177c5cd22f346d5ec75bb68f4486079b4db94b888389ee0ed2ca480406538f715edfe15f8c1f0c7f6a0f84507867e21eb36fa16ad67e53c8b717696445c22141731c8ff00236416f939c6e208e849195dcd37b9afd5e786c3e0312a9bb43e2b2d75ff00862a7ec371c763f03fc4f213cc7ab5c3cc7b05fb2c3ffd7aafff0004ed8d7fe11af1a095c2462e6d88ee4fc8dd2a6f88df13be18fecfbf03752f06f81b5ab5d7753d5639a256b2bb4ba6df22047b99a54f9010b8c28ea428000048e73f607f1d681e11f0ff008b5758f11e91a2cf2dc41e4aead7915b97508c0950ec3775ed56a6938c3b1cb5b0f5b1185c662e306954946c9ad5a4cf1bf813e0df08f89b56f1f6a1e2bb2b59f4dd22d56e95ef26ba48e1537015d88b721d8ed240183ce38a9358f0c782340d33c35a8e89e119bc69a6789b58bd8a16b8b9b98e4b7823b831c56f1089d7133261f3206ea3e535e417dac6a3a6dd6af159ea7710dbdec8d0dda5b4e523b88f7e42b853865c8070722bb9f827a178b3c511f8b6cfc37e2dbef0d5ae9da54daacf05b5ff009097453680ae0ca802904e64390b819ea2bcfe75f072ab9f735f0b569df112acd474d2eedb5ba6daea7b5f82ff00663f86ba95c6b4da9ea256cfc3fac5e6877370f70c5e79269208ec5db6300a63699d5b0002c872300d52d7be0df80bc0fe1bf144d73a7e8ffda5e1d934bd3a7bed66e3526b596e64b6125c32adab97cb330006368dbdabcf3c03f00fe23cdafdb68b35c4fe1ad266bbb66bc68afe295ed6764325bb4d6a9307593baee019739e2a9693a7fc6ed374d7f11d9ea7af5ba6ae21bd964b7d77cbb899247f2e2b896212893631e04aebb7fdac55f34796dc963cb54e72a8dac6dd2b697b6eeff8eba7a687bde83fb3cfc3ad43c27f0beeaefc3fe73eb8fa4c734b6b7b71ba59a5b7925b859c1936a2101197cbdadbb2385ae7b47f82be06f13dd5a9b6d2b4abd11f8e2df479c6853ea2156cfc991a48dc5c36e0d951975e38f95b15c9780be09fc5fb8d62facf51f13ea5e11b5b5b29425d2eb91c90896c903c76acc970162281c150c46c5dcc06d56238cd27c03f18bc2324d3e8926b16377aacb6cb749a4eaea2e19ae09fb39b98a297cc40e58e0ca00cb1ee6a9c9597eec88425294e2b1b77d3576d7ceff9163f683f047867c23e18f06dc683a70b397529f56f39fcf92469238af9e2873b9881b5171f2e33d4e4d75bf00ff65dd13c69f0df51f1e78e35abcd2bc290a4b227f668066291122491c947e0104055524e09f4cf0ff133e1ff008e3e1cfc21d0975ef135d0d3eef52b9b21e1b8b515b9b5b73090c5ff007733c79f319c15c02aca73c9af5ffd92fc51f18be1dfc39bcd7744f0c7fc257e056ba3b34f73b6ea47e44925af059901501861816fba321c8ce1cb2af6946da1d38bad5e9e589d0aeaea4d5efab57d937d7fc8f2cfda1be07f837e1e68de1ef107833c6906bfa6eb519782cae195ae4a02419728a06d0414219548604724305fb47c7df096d7e297c1cf05c1ab7893fe116b2d2e4b4d46eb53e1248238ed99721d8809cb83bc9e319c1af16fdb3be17f852fbe1e695f11749f0fc9e15d6aee5896fac6484405cccacdfbd886424ca464e304e5b764818ea7f6d4ba96d7f666f08dbc53b4314d796314d1c6e712a0b595867d46e5538f500f6ae98c634bda5d69a1f335ab4f31fa8a8557cdcf257695d6df2650f8bdfb374907856fbe237807e26789f5dd4f46b29658f52b9d645df9f6ca099162b888295f9779c0c824638ce6b91f04fc2f5f167ece7adfc45f07f8d7c64df10648dffb5215d5498a6961397570a82472623b9017246f51cf39ebff00632d4ee17f65df880a271fb9b8bf31c246ef97ec911200f4c9271ea4d79e7ec1df16edfc39e39d47c17a8c8f1e9fafc5bedb2c768ba8c1207a2ef4dc0fa944152b93dc7b731d1cd8ca74713152e774249decb58eed33cebf677f84775fb4378d23d375ed5351fec0d22c4ef9a397734284911411170cb18672cd8c630afc64e6b89f8e7e13f0d783fe266b1a0f852e2f6f74dd31c5abdc5f4ab2334ea3128055106d56caf439db9cf22beeff001ae9ba17ec79f067c61a9689285d4b59bd965d39563002492922185477589016e4f3b18f7c57e6d492990bc8599dd8ee66639249eb935cb898c29c141fc4f73e8b25c5d5ccebd4c545b5455a315d2fbb6fe65064c939fe138e946e3c9c631daac4ec648fd31d47ad56cfcea01cfb1ef5e2b563ed57a84632e4eddc3a919a59232c99e83b8279c54b047f236f240c7f0d2a0600f01547f7bae29580896250c3190a47cbbbbd0d1f42369e7d6a628241866de3aa1cf5fad465554e300375e2a892305b8423a9e71d69b30d99040c81806a40e80e58fca78c9eb50ca449855078ea4d4b011653b76e3df26a5660d0c801f94fafad578fe66c3648e800a5c9da55460e460d4dc09a39b6a90d92471f4a74aa0c45908cf7f5151cd22ae0103777c52ab2ac67e4dd93ce3a5002c4236c00a3207e751b0c3657e5f614e336dc055e318a5663b72c319c703f9d3020931e6363eef6a6b85e198e58f18a7bb053c64e3b530925767ebe950c050c1728475a89fe53819cf5a7edd849e4e29857a1f51d2a463793cf63de90f1c727d69cb8039fca90f503047bfad0323e87d68c907dfda83919e7f3ef4bc60e41cd40013904e300d300e3ae4d3f3807069b8f7a0031f2e4761da9a47cb93ce7b8a53f4a68203739a9011c0070334cc72476352300390723b5260ab6319a40348ce698460f435232f71d298727f1a0ab8522ae68e68e83ad03108c71499c7b52f5a4a40148d4b4734806d27f152d15203739a36d2b74a4cf3ed4804a2976d2500148d4b450027a5274a7537f9d003568fe1a16968001cd2feb4945003bda969bd169d4005145140051fca8a280026978a4a282455a55e947e947f150216917a52d14ee02e3f1a53c1eb4da7a8c9aa01297ad22e69df7698680bd29693f1a5a648bb6940c5369c3f2a00705e2947ddec69a0f5ef9a507e6a09b0f0697d79a653e810034bd0e71474f4a43fca98122e4a93ee29013bb9e73e949fc3f5a7281d33540394edcfa1ec684191d7f1a4c73d29f18cb75a00566058601c63bd2e38c52edc8e4669c17763d3142d481aaa69db307e94e0082727ad4a31b73dbbd58ae423201cf3ed4190ae08efd2a420e453bcbe6827988633f316ee6bea5f08ca3fe1847c53195c6ff001326d23feb9db706be5dda7d792735eb9a2fc5f163f01354f8723492ed7faa2ea4353fb5604784886cf2b673feabaee1f7ba71cf6e16a28ca4df67f89e3e6746a568d3505b4e2fe499bbfb2efc1bd37e2ff8daea0d7279ad744d2ac9efaebc8c07980202c60ff0e7249383c290304823d2b43f00fc2bf8fde0ef1a47e0cf0d5ef81fc45e1eb77beb6966d424ba8ef6150d8120724464e3042fdd254866008af10f837f18357f82be308b5ed1c4572248dadaead6e0663b885882c87b8e554823a151d4641f41d73f69ed2ac7c2bafe8be01f0159f811b5edcba9dec77cf772491b020a461914443e66000e1431da01391df4674634fdedf5b9e363b0f984f12e549bb7bbcad3b25aeb757d6fd346719fb3fdaf85f59f8abe1fd2bc5f62ba8e8ba84df62913cd9632924836c4c0c6ca47ef0a03938c139f6fa1acff0062dd3ad3c07e3f8aee3966f14477172fe1d26625dedadc82b84042b34b9da7703b72a460d7c6503cb6f309e076866460e8e87057072083eb5f45ebdfb676bfaefc46f05f8b5b4c5b74d02dda19b4e4b93b2f1a45db3b6767c81c05c290db4a0393461ead18c6d516a2cd30b984eac25829d93dfd56abefd9f91cefed2be02f0dfc2cbaf08786b4ab058bc476fa54771ae5e0b8924135cc807cbb598aaeddac7e50321d7d2ba6b7768ff61697729ddff0940fbdfdddbdbdabca7e27788b5bf8afe26d7fc7973a4dc4363797bb649d236786d81502284ca1402c11547382719c55b5f8c0abf039be1c9d24c9ff001321a88d4cdd74e31b3cad9faeefc292a908ce6d689ad0d5e16bcf0d87849f34e324e577f37f9e874bfb36f837c29f12bc47af78575db359f58d4b4e9068574f3ca82deed158e36a300dc12ff3023f758ef577c49f08b45f863fb3bbeb1e2ad2849e3ad73537b5d3a19a7951ece189b6c8e51582b1ca38e770f9e33eb5c5feceba6ea9ac7c70f05c1a3cbf67bc5d4239bce5c90a8877c84e3a8d8ac08efd3bd767fb657c467f885f18b50b4b699db45d059b4fb68ff87cc0dfbe71ee5c119ee11688b8fb0726b526b47112ccd52a737c8d293d76b74f47a5fd1997f087e21d87867e1cf8a34487c43ff085f892fae6de6875cf2666dd0237cf6fe6428f247fdef9461bee93835eb37dfb4a78224f1d7882e2f6f3fe121d32d6cecb55d16e6e2da58d1f55b684a0fdded05771719270a3cbebd2be49b1d1751d724b88f4fb2b8be782169e54b789a529128cb3b05070a07249e0550d87cb24671ed594715529c524bfad7fccedad9461b13525293777e7b5edf3e9fd5cfb22ebf680f87b73e2cb7b5d1efbfb0348fec2bfb8b6d4dace473a7eb778de63caea1771080796ac8ac46f207cbcd588ff00690d1b49f04c56f2fc459b58f1343e16d434d1aa595a5d239ba92685a10af246ad9da8479a70729b890c457c651e70432e4e3802bd13e17fc351adfc5ad2bc23e2b82fb44591d8ddc5344d05c46a216940dac84aee01704af46cd690c5d4a8f952dce2ad93e168c39a527ee2bf46ddafd6d7ebb1ef375fb41784dbe1fa5869175a658d847e1cfb049e1dd52cf50b8966bbff009699092a5a9dc497170c3cc07a824f1e7ffb32fc4fd13e1b6a5e289f53bfb5b29aead6dfec86fa1b8781e48ee1241bbc8567180a48ed903391c507f6629a2b8d6e5bff001159697a4e991adc7db268e5943c6d6f15c6576a65f0b32a9200c90703b54de22fd956f7c3b662e352f146976f389099a168e5c436eb7a2d1ee0b6ddbb433c6d8241c3371f2f3a72d7e653e5d8e65fd9beca587f6aed3b7af7d1dbef3bcd6be397802efe1df8ab4db0d764875dd427d69edf50bab398b79775223346ea8bb333a060ad8fdded0485cd735f11be2f7813c49f0eef7c09a4c9756969e1bb6b49bc3faac9b825ddc447129f29625789a512cac4b3104a293b0f07c6fe26fc33d4be18ea963a56ad35b9d56487ce9ed606dc60fde3aa063eaca81c7fb2eb5c6b3ac790f263279cf39ac2a6267f0c923d1c364f84928d5a739495f996bd7baf2e9f367d5f71f1fbc1971e30f006a56f74d686f757875ff1537d9a4d96f751c2910540ab975c89a4f94373267af03c23e2c5d68da878c2e6eb447d1e4b29b749bb46fb6842c647397fb5fcfe66319dbf274c739ae196ec3b960a3601d4d202ceaa0fcbb88e6b09e21cd72b48f4f0b96d2c2cf9e127b58f51b7f8fdae2db3d95dd86917da4cda4da68d73a65cc52186e61b607c8772b20712a924ee465e4f4ab571fb4df882eaf375dd9e9377a5c70dac369a57932c50588b62c6ddadde391268dd0bbfce24dc779c93c63c855c2970416c9381e98f5a40a08da78e3ad63ede7dcdff00b3f0adddc17f5fd23d575efda2f57f1743afdbf8874bd335b8356b886e88bafb4a9b678a268a2f28c7329c2ab1fbe5f2796dc7348bfb477881f5096edacf4e7925bad2ee997ca93697b04db08c799d187dff005ec56bcabcb0cd9fbdc5481338c81f853f6f53b8e3976162b95434ff0086ff00247adde7ed1daaeaf26877179a0e8b36a5a26a92ea9617cc974b24524979f6b74da2708c85fe5c15242f420fcd5cefc42f89179f1575eb3d6b5c8ac9b5182d12d1e5b68d91ae0213b5e5258ee70a42eeee1573c8cd70cca5b07a76cd2ac258e41ce3d050eb4a5a3d4d29e0a851929d38d9abfe27b4feccf6161a878f3589751b7d32782db41bfb956d5ac45d5bc0c916e590c455b76dc670013d715dac9e2ff86b1dc482d350f0e45e203a658472eb575e196934d92759a437422b510fcacd198807f2573b1b1e596dd5f33234906f50793cf35325d90c81d5771f4eff005ade15f963cb638b11972c45575253693b68bcbfcfee3ec07d5be17e91a178735f1a7685a6784efb58d58496ba8e87f69bcbfb45da152291636688ab382b974da197e6f9483ce7847e207c29d0c685ac896cad2f5534287ec71e94fe7d94b6d741eeee5a411ed3be341f32333befc1518af9d3494b2bbd62ce2d42668ac1e645b89a21968e32c379030790b93d0d7d75e1df06f81bc1f149e27b2b6d0b4ab48759bed26c756b4d6dae527b47d32e8a194b4ce892b3f9795c236481b403f376d3a92a8f6491f3d8cc2d3c0c6d394e4df6f2774b5fb8e57fe1627c32bab3bf9e43e1f8e19b48d4125b4bed05e6be975292491a2b95b8f25b08432ed0641b73ca8c02be2df16fc43a5788be246bd7be1c82cedf401394b04b1b25b48cc23ee9d8114e4f392c33eb5ed527843e0d49a2ddbcefa3d9690a9a40b3d62df5b79353b8df344b7ed25a194ec6552fc7943032406fe1c5f8d32f86f47f83f67a3e8bfd836a7fe128b9b986cb46d63edc5adfc9091cef991d94b0550470381f2a92542a9cd28be668db0356952af174e336de9ef5b4babffc0efdcf52f82be0dd4bc65fb0febda46850fdaf59d435096286df7841feba2cb162401c035e3ff12bf635f881f0c7c1d73e25d43fb3750b0b623ed496170ef2c0a7fe5a32ba2e541c03b49c75c60123da3e13f8aae7c33fb0df882f748b892c2f6317710b889b6bee79154b061cab056e08e41008aa5fb31ea1757dfb24fc57b5bcbc925b286db524820662c509b2dd851fc20b1cfa6493dcd6f2a709a8c5f6b9e2d1c5e2b0957115e9b5c9ed6d66b7bdbadf43e368616110cf0a403d3afd2bd53e127ecd9e30f8d31ddde6816f6f67a340e633a8ea4ed1c064e32830accc79cf0a40ee4719f27532f93229cf5c649e40afb6be2436aadfb12f835bc1d24c74cfb2c0baa8d381c94f2dfcff00331fc1e7677fbf5e335c7460a77e6e87d766b8dab8654a9d1b2751daef65d4f03f8b5fb2ef8e7e0fe99fda3ab5b5a6a1a40758df51d32632451b370a1832ab2824e325719c0ce48cf925cc0368dc872060007927d4d7db9fb287f695bfecf3f114f8b04ade0f5b69459add6ec04f264fb47959e767fabc6de376ec739af8aa77df01ca9196e58d5d5a6a2a325d432bc6d6af3ad42b34dd36bde5a27747b7f833f636f1d78ebc1ba1f897489f469f4fd539446b9749605cb02f2031e300aff0963c8c03507c60fd96fc65f06bc3569ad6aeba7ea3a4cb288a6bbd266792389bf87ccde8846ee704023230482467d87c67af5de8bfb03f86934eb99a1fb6f976772d11da4c4d2ca59723b36d00fa8241e0d25aea173a87fc13a7506bc9dae0412c76f107624a22ea31ed5fa00703d06076ae9e484534b7b5cf0219a63dd48d59b4e0eafb3b5ba77b9f1933348ec54155ce028e6bdcbe1ffec79e3ef89de1f875fb58b4fd1f4fb9f9adc6af3bc6f32769151118853db76323919041af1cd04da26b9a736a2fff0012f17519b841da3dc37f4e7a66bf42bf69af127c3ed2e1d3a1f1ff0084fc45e21d2d94bdbdd697248b671b938dac16e235df8e4120f0783d4563460a69ca5d0f4f3ccc71184ab4a86197c5d7476b793693fbcf897e29fc0af177c1c7b41afe9b1adadcccd1dbdf5acbe6433e3a80782bc738600919c0e0d79d7d9fcc7010167638f2d4649f4c57d85f1c3e30784750f80bff0008859f837c5fa42cde4cba2deebd685a252b2063b259267623cbdea319c06c0e2be48d3ef64b0bbb7bdb791a2bb8184a8e00f95d4e54f3e8456756318cf962f73bf2ac4e231586753110b4937f34baeecf7ad3ff0061df8997fe1d1a9a2e931cc22f37fb2e5b965b91fec1f93606f62f8f535e0f3d9cd6b792c12c4629e3728ca48f9482411f98afbab46d4343fda5a18f4fd6acb5cf037c45b7d1ccbf69b532c1e6db4846e74ecf0b965ca38070d852796af88bc5da2c9e19f10ea9a34ce935c69f77259c92447e5dd1b94247b122b7af4a308ae538325c7e231552a53c5b4a71e96b69e4eeee8fb8bf64ff00863acde7ecede264fb4d9c67c5705c7d91cc8c3cbcc6f00f306de3e604fcbbb8fcabe3793e18eb9278f754f0859c115feaba5cb711dc3c73ac702ac24f9921925d8aa8304ee6dbdbb9c57d11fb26aecf809f17a4de5a3fb24ff283d0fd95f9af9f7e14f8dad3c17e2a9ee6fa59134dbab19f4fbb8d2c7ed6b3c522e1a364f3e0383c1dcb202081d6aea72ca30e638f01ede18bc74a0d4acf44d1d65c7ecbbe2e87c323527455d5bedc206d344d01892d7ecc67fb53dd097cb54c29182476e7900d6d17f662f1d6a1e25d374dd474f8b49b3b8bab689f5192f6d9e30931255a3225026608acfe5a3162076c8aea3c51fb564a9aa4961e1ad16d47845ade3b47b1d4a1753731ada7d9da3658e63b23e7202b961b14ef3c8ac56fda8bc4af716467f0f787e7b4d3a5b49f4eb19219c41652dbc652278c0983676900862c3e504004512fabe8aececa7533a942f28c75f2d57caff81e4de21d2db45d7f52d3cca6516b7125bf9c5366fdac5738c9c6719c66a8925a2071c7ad49adeb92eb9aaddea3305f3af2e1ee2544c840ccc58e3249c64f1cd53f35f6900ec52781d735c2e4aeec7d5d34f91732d41ae52276c1c8f6ed514778c5d76aa803a679c546e0af047e9cd3467071c0f6ac7999b2ec4cd2c8776e639e9c0ef47cdb589049c75cd0cc58039c37f3a529c9df93ed40ec969d08944b9254ed2173d3b5222ba2e4c85401c01fc46a63b8ef3d0b61411daa36400f19201efde979f51e9b58579649576077f979e4f5a9e0bd9d9136b0665ce030e40aac226e486f9ba014c918a11804606091d68e692d7a872adba168ea4aa3f791f254e40efe95d1f80be225f7c3ff00edff00ecf58247d6b499f4998dc07cc70ca54b321565c3828304e47a835c8b287dcc73b8e1471fce9a235f31491b82372bd9a9aa8d3b933a50ab1e492d0f70b1fdacbc49a5ea979a9c1a07879757bcb8b6babdbf36f71e65dc90a14467026da3863908aa0924e326a08ff696f185e7852d7c3323432dbdbdb5b406ed6e2ec318a0756446884e21390a159bcbdccbd4e79af1e8ae188dd2c6ad1eec6e27e6c7a0abd6f736e038b7551293f71b815bfb79cb791e6aca7049f32a6afa7e1b7dc7ad37ed19e21b1d3f5db54b0d2b6ead7d7fa8caf24731292de43e54aa83cdc050bca820e0f52471534ffb58f8f561d1f75d4367776af6d39bc8ae2ef3398061049019cc186eac1635dc704f201aeb7e157c10f046b9f0d7c39e24f124ceb33dfdcea17c5a678c4fa7c3988c498207faff002c6e183fbd233c0aa76bf0c7c0ba5e876b06a9e1dd4352d7478b9fc2f2c36b7c54c8b04a649258c3301bdd1e28b6921782576b1cd755aad97bc7cfcab658ea4a2a8b938bb3d3fcdaeda9e5de3ef8c37be3ad074ed20685a2e87a7d9dddc5f247a4c53297966c6f2e6495f3d0600c607038000daf84bfb5278efe10e9efa6e993daea3a5924c561ab46f2c5092493e5ed6565049c900e33ce324d7bcc7f027c0726afa1595cf83eda28eebc42f66ed1ea17a25680580bb4468d9c346e4b852846e5c01939dc547c01f875a94500ff008456e34dbeb8d66dd16d7ccbd8a78ad0dd41148cd1cd26e11ed7209c1606542085aaf615afcca5a9cb5334cb254a387a9424e2fa593ddfaf933e74f8c9fb43f8cfe34c56d06bf7d041a5dbc9e743a569f118a012631e66096666c1232cc71938c64e65f8a5fb48f89fe2c782748f0ceb16ba65bd8698f1c90b594322c8e52331aef2d230e8c7a01cd7a4e9df067c2da87856d1e6f0e5d5af87d7407d46e3e219be631c7762367f27c9ff0056d89716fe501e61ea0f7aea758f807e03b2f1859e9d6de1b9244d493529ad16def26942db87b55b59dd55cc8623be602440d827732baa1023d9d569fbdbd8e8faee5945c231a0d72b6d592d2dbf5dfcb7f23c37e18fed1de24f853e01d6bc21a5d9e9ef63aa3ccf34d730c8f3032c4b13056591400154119079cfd2b47f64ff008637df103e3368725bccd0da68f2aea97571f7762c4c19573eaefb571d7058f6ac087e1adb47f0a3c4be2669ae5b52d2b5c8b4c5314c8f6de5b2b166276e58e546082060f4a5f01f87fe29dbe86d7fe0eb8d5349b1d49dc2a58ea62d25d45a1dc5bca8bcc57b8d996fb8ad825875cd631e684a3ceae91e8d65879d0aff00576a129e8dbdaf6fceccf78fda835c8fe387c7af0e7c37b5d6a3b1d2ec2416d2dd38dc9f6a71b9f0b91b885091a838f9cb0cf359f7dfb25683a7f876ced4dc6a706a3772c57a24bcb509a8f93f67bc90d925bf99b0cac6dd31939ce79c707e73f0959f8baf353d43c4fa1c97126a3a1e351b9bc5b85fb44599029970c773fccc37601fbdf3706ba0f8a9e1ff0089d75abeb3adf8e12ea4bed326b6b6bbbaba9e2c44f22178638c2b60fcb96c46085c92719adbdb2a9cd3941b67994f035308a960f0d89508c62bb5dcafbfceebf03d8fc37fb28e83a76b9a84daa4dac6af676f0498b33662330b1d316e55aed965dd11df2854550d968c8390735f29b5b6d9010a0a7505bb9f4af50f1b7806c7c3be07f877acdadedc4d7de26b7b892e85cce8238da39846a1490bb571d4b31e9d40acdd73e10f8ab4793c489a86946d9bc3a216d4d8dc4452dbcec7943707c396dc301093515a0a714a31b58f572fa9283752bd7e6e6d15f4f85b4f4f367071868ce401cf539e94491a65b0c7247201c9346372039e07418eb4f8c03cf209e0e4735e5a3e8886180205e3240cf3ebe951306d8589c7a9ab5244324ee03ea6aa4c554f961b20f7152222f24c8cd2ff00cb35e738ea69a195bab05c7241ef53f9cb24691fcc769f5a80aa316050e073926a1d809946d4dc5428db80d9eb5132edc0e800ce29ce9139032cbc7dd5a044a47cccd91c647a5003300b8cf43dfda88dd94edc8c548d1a90b92783c669194ee63c7a71da95c08d8ee04f0b8fd4d47bb7753cd3d448149c647a8a6ee05b8207d4548800dc9cfaf5a64ca5d4b6791d2a42719c37d40149229f2b014f3cf3da98ae472eee39cf1c9a8fbe0f200cd48235e31f36477a411f5e7777a828676c7f3a6b91dfa0a7b1e79e49a610300d0319d320e7f1a3a8cd3db0cde9c5379f4fc6a062671f8d37a669cd914d39ddc74c500216faf148d8c7347507ae69a79037706900d20ad3837f9f5a37714c5c8271dfb5480f605782314ce14fa53f8ffebd201f364027eb4008df32af7f6a6e39c75a5c85e31f8d34b67da82c318ce4d0791f4a3a9a326801b8c73415f4e69c78a4a4027e74dda2968a800a6b53a9948056a4a28a0028a28a006b75a3f4a753769a006ad2d22d2e734007a5140f7a51fad001934abd29b4e5a005a2931cd2d001476c51450028e5681f74d00d1f4ed4c9141cd2f5348bd2957ad21051475f7a56a7600f5a720f9a9a0d3bef31aa00e38c75ef4b93f5f6a6d3864639a05a0b452034b9e47154217d297ad0bf31a7019c814007e94a00ce78cd039a55c0efd2826e38f078c519cd19cfbd2ad021461873cfa52371da85e7ad2919a0007cc38c7d2942f3d695703e878e29796e4d5a10bce08e94a802f38e3da91461f9cd3b710000319a02e3d57807f5a907dd34c5276d48303af5a68cc7050a093d7b629738fca90af00f41eb4053f51d4d6803d54371fad4aaa037241c76a8d7200c02054cab839231c53248768e722be92f80ff000efc33f103e1525aeb301b7babcf1443669a9dbc90a5c051653ca2052e87fd618ca01b802ef1b63e42aff39756c71c57b07c33fd9ef5bf899e19b3d634dd5b47b35bcd41f49b5b5bd966496e2e160f38a2ed89917284e0b3282463d33d387f8f6b9e4e64e2e85a53e47dfb7fc31e9ba5fecc3a06a1a90096be2392692db4c926f0e47710ff006869c6e6692391e663160a46b1abe3cb43891776c0334df137ecd5e0cf0af87f59d525d4f54be8f4fbdbe4262dee8a20bb30a5b4852d9916491072ed22052c088d94135e63f06e0f15dadf6b17da1cda4e8b6da4aa5cea1ad6b76104f1e9e518f9643490c8e9217e15621bd980c03b78c6f8a1e01d6b458e0f14deea969e25d37c42f25c47add8c8f2473cdbb322bef4474901392aca0f3c7438f439a2a1750feae789ecabcabfb3789b2bafcb6fd7b9f487c53f85fe03f174977656ba73784ee6c6df58bd8ae6d1208e00b05daa6245112975f99b6e18796aa07cdc9ac0f13fece3e02f0ada6a97777a86bd77069d6179731430b18bedc611094749a4b558d50972085f3472a55db0c2bcbb5afd993c57a549e2243369f756fa06956fab4b716d2c8e934332174311d80b1c06ce401f21e6b026f82fae43f11f49f02bdd580d7af9613c49279501962122ac87664305233807af04d54ea5f574f7b230c3d0504a10c5bb46edaf2defdf668f5cfd9c7c13a678cfe1f4906acb2deda5e78aec2c9ec16f6e228e446462c5a3475527a6188dc30704575fa7fc2ff87da85a68134be03b3b57bdf194de179a25d46f5808949db203e77fad1c027ee9e4ede46df96af3c1b1d9f89ac745d3b5ed375a9af265b7f3ad12e638a1919f600e668636ebce54118fcaba5f889f06f5af873a5bea3757fa76af630ea72e8f73369cd2ff00a35e46a18c4e248d0e4a92415054e0f3d2a235572eb0d8e8a98473ace4b10d73ea96bdbd4fa221fd9e7c2fa3c7e0cb48bc0c7c436977a86a969adebd35edd442c60b7bb922499992458a33b173965c36cc0196cd61693f073c0d258f87a0b3d34788fc3d7e6f8eb1e363792c7fd97e5b308f85710c5b542b7ef55bccdff2e05794fc50d27c47e1df87fe0bb0d7fc4fa55d5b47a7adfe8fa2c11cbf6882deedbcc2ccfe42a1cb29c869188c71c553b4fd9f7c4b7d369318bad3b7ea3a0bf8862569641b6d941243feef87c0e00c8e7ef568e6afcaa1fd6873430d53939ea62ad7bdb7d77eefa26bcb4ea7b9f857c3fe16f03f88b4fb6d2bc3d6f2bea1f0de5d5ae6ea5b8ba2d732c909de197ce0ab1b043c28046f382303143c07f047c31a95c6916fff00086c7aff00876e3c387519bc50d7d72abf6cd859a3ca48235dadf27945778c6493835f3ad87c3fbfd57c07ad78b61b8b71a76933c36d3c2eec262f2e76951b70471ce483ec6ab781fc1f73e36f11e9fa25adcdbdb4f79bf6cb745bcb4da8ce49da09e8a474ef59aaa938a70dff00aec754f02dc6a4a3886ada37af457beeb6bfa1f48eb1f0c7c09a7ff6c5bc1e128639749f095a78856f3edb74ed2dc168cbc4ebe6ed1138382000c32c430caede27f6b2f12496ff00b496b97564c34abfb58ad54dcd93c8b2c84dac7f31258e0ed6d9f2e06d51c64b13c6587c09f1bea16625b3d0eea7b933346d62b0389a2511c2e1df236a822e23e33bb9c9007359f6ff0007bc493f85f59f11dd69771a6e97a6445dee2f2174f35c4e90346995fbe19ce41c7dc71d4114aa4a528f2c616fe98f0b468d3aaaa54c473d972d9bef6f37d998da87c44f146a7676b6575e20d4a7b0b5b76b382de5ba7648a03806355270148551b4718503b0abb7df123c4faa2ca6ff005ed4b508a688c1225d5d4922c919944ac8c0b7dd2ea188ee4035cbf94b10cb93953939350c97066240c05f4ae0e7925ab3e97eaf4746a2b436fc71e38d47c71e25bfd6f539c4fa8de4be64ae0600e30aaa3b2aa80a07600573db4c8df377eb9ef4a63ddd463e9481487dc724fb565294a4eeceaa708d38a8455921ca18657df1f855989589daaf8e38cf514c5276a923a7526a40de6201b391d1bde92458d1b9198fde2a71cf7a550b9da63ce073eb4e48764a0b6724d4bb446eed8182280215c61895c91d569c85622a08009e738a404aae4e338c329eb4a14191555080791ef4c07611b961bbbe7a0a1b278505477c53e472a47cb8c7518ef4c946ec92791815430973e59e87dfd6902b1f4c018f94d48400deb8e9f5a8c0db2636f0dd714ac5125adccd65711dd412b5bcf0b0759226c32b0e41047bd6d6b5e3df10f8c228a3d7b5fd4b59f209308d42f249c2138ced0e4edce05606cda0827040ede99a84c67e628b9e786ed54a4e3a23395284da9496a8d8fb3a078d8b281b7807bf14c58dd99b07000e7d6abc444522891c1603820f4fad7d21f0397c2fa5fc21d4f5bd6a6d02c661e23b4b67bed73451a913018cbcb0a288e42a59558838038c65490c3a69c79fc8e2c657fa9d35350bbba5a1e6fa6fc76d7b4bf843a87c3bb6b3d35b45bb76792e248a4fb4e4bab1c36f0bd547f0d747e04f887e3cf85ff0bbc45a0c5e1a1178735e85bcfd46fec270ca9710796a5240ca837202cb907382464577ba1f8d3e0ec7245f664d134bd1a39f5537961aae82f777971e63b7d89a19bca7d8a88506ddcb82a721b3b86cc3f193e12eaf6fe186f124769ad49689a5c3711ae8bb0c6b1d9ccb22e444331a4ef196419040c2ab0005764636de67cbd5adbc2384766f99e9d6fbfae9f91f27dc7971a3aa8f947cca49e47b57b17c1dfda03e21fc06d1526d2e25b8f0edfb48b6d0ead6cef66661b7798d815218023215b1f30c8ce2bb1d73e277c33d26cfc4575a4e8de1cbbd74e976b6f6b24da52dd4135c0b93e632c6d650471bac5925bca556f947241ce5fed07f103c1be24f09e9da0f82a4b14d36d75bbdbd4821d34c2522916328433c6a402c65f941e81411854c4a87226d48f42789963650c3d7c3be57df65a6ff00e473ff00163f6acf1cfc5fd2ff00b3f5392cf4fd2d8879ec74b8da28e72bf74b96666600f38ce33838c818f1fdc259519f2a80e587635ee1f07fc5c7c37f057e29da4baec96924b2698d6da6c57de449701ae36dd1853702498942b951f7701b8aef3c4de2cb29350f1a4fa8789f43d47e185d691247a2787edef226292320fb3245640f990491be373b22f42493472fb449b9154f10b00e542850b4576eba2f2df5fc0f1cd5fe3c6b9e23f84fa4fc3a9ecf4b8b43d3e65961b98e2905cb15672033172b8f9cf01476a9e7f8fdadc7f0726f866965a6be87249bdae44320b9cf9eb30f9b7edfbca07dde9efcd7b5eb9e2ed1752bdf12c92f8ad6dfe1a49a22ff0065693a26ad691ed5f2940b46d35e291fcf321ff5d85da3277f61d2eadf12ad9be2b7802fadbc506cfc3e23b48ee9a3f185b358a016afbd64b2521e360c002eedb4918c65856ca2f6e6f2f91e7fd669f2ab6195aee7bed2dfb7c47c3ac446ec7cbcff00b39e95eddf0cff006c1f883f0dbc3b16876f2d86aba75bae201ab42f23c29d915d1d0951d8127038180001ebff000bfe227852e2cfe105df89b5c4935e823f1079b7f79ad4605a3c85f6fda95d5998c8bb4265d3fe05d2b5b41f1ae8c9e31f8313bf8a201a3d8e8d66b75e778a6d458dadc2d84eacaf65f7e39412a0cacd81bb6e32454c2938bf7656fe90f178e58a8ca188c2f328ddabbed7db4f2fc4f99be2b7ed05e33f8d1776a35fb9b782caddbcc834db28cc56cae4637e09259b1900b138c9c63273c2d95eb69b751dcc186ba8a412a3aa021581c8e0f5e477af4ffda6fc45a67893c7d6777a66a306b160747b28a0d484c26bb9d563c16bb61cfda376436e00e1578af50d2dbe1f78b741f0745a8ffc23f77ad69fe1ad36de382ff5a7b385d5af6617424904ca1648e301d5321bf7ce76b808a2545ca5ac9687a50c4d2c26169b851b465d16ebfaea73171fb747c4ff00ec23a7ca3465ba31951a97d89bed2b9fe2c6ff002f3ff00c7b57cf57b7d36a378f732b3cf73333493bb925a462725989ea4924d7d5ba7fc33f85daff008535f7d1e0b0d5adecf4dd72f64d4a6d5a4fed0b7304ac2ccadb2c8a193cbdadb8a10c48c95fbada90da7c1bf00eb96da8f876e34f9269adf51b7566d515a392d8e9ec54cb8bc67123cb98c7c9170eebb0308d8eae9ca564e479b471d82c1f3fd570cd49defa6f6e8f5fb8f00f87ff001e7c41f0e7c0be27f0ce9ba7e9b7165af23477325d45234b1868ca1d8564500e093c83cd799f9cd2ca3f767271807b9afb27c5163f07be21f8ceff005ad66f74a86f97567b5f2e1d5b29a8c62c11d1e53e72aaa894150ead12e4052d939af3af8c9a27c2ed07e1d4971e13b6b27f103ea505b4a3fb504cf6f1fd9d247304715d4aa63320da59da4c3348a18e1089a94a56d64ac8ebc1669465552546519d4b37a69f79f3e1b858983302703eee39cd3659cddcc0b7dd65f5e8698fbe707270c5b39f41413e5ed2b83c6de0722b8399dcfae5dcaf19640e366e3d4fd29cd279840ddf201f97b52ac6ece01c03d39e3351f95b642093bbae3b54ec592310990086c1cd303b649e002738ed42c855812a1874e6933bc0c630076a421ccdb7079cfe94aca557cccf53de985588e0f5353952d852483d2a80029665e7073c81d85324c7241c0ec3d6a564ccefc80a38cf4a4f28b121413c1201ec3bd160228f3ca800e7904d0ea4af24390d8fc2a6e54f5c606411d85232e5918107fbc68b5d14552cc6220038ceea7230249fba49c83d85398807a9229a413cf38f5accb2199fcb6e07279c9a876b9572bfc3c9f6ff00ebd58914b210093ee6a24655460158a77a818e92fbcc823832422f4cfe748cd2339decc5c9c92c79cfad473da96c6c1b40ee7b55982511c6aaebe6aee1cf7a69ddd99972aec4ab34e137a48ecc58b13b8e727be6a269ee049f3bbef5393963d7ebf857a8fc06f86967f16fe22268f7b3dd43651da4f79711d88537332c49bbcb883705c9c6320e3938e2be91f817f0a7c29a778360f196876facdadeeb9e1fd6eda4b1d56e629d2328bb46d64863249c139c77c638aeea74655168cf0330cd30d97de1257969f8ddfe8cf879eea59711972220c1bca5fbb9f5c54978f2c91c7312230a3e539e71e95f594ffb2ef8174fd43c5fe1a8c78aae357f0df859b5f9b5967852c6e67116f0889e49658f2460f9849d920e36e4ecdafc31f0afc1fd73e20f862c535cd4f5d83c09732dc6ad3c91fd82e1a5895984312c7b9573b40632364ac831f2e4dc70f2d9b309e7786e5e6846ef74bcb4d7f13e5cd3fe222597c2ad6bc1d2e9a661a8ea10dfc77c2e36881a352b8f2f6fcd904f3b863d2ba5f09fc765d16d3c2d35ff0087ff00b535bf0989468f70b7be45b85725944f108c993631246d78f3c039addf01fc23f00bfc1d6f1c78cef3c468c3576d385ae84217dc36065fbeb8539272c5b070001922ba6d53f657f0e783f5af17ea9e21d63577f05e87676778b1584083537174ccb1a3ab8da854a36ec81c60fcbce050abba396ae332de6953a9177bbefabd13b7de9763c7fe14fc62bef86df128f8ba5b45d64dc09d2fac5dc44976b283b958ed200de55b18fe115bbf16bf68cd7fe30783742d0b56b68524b2b99aeaf2ea0c0fb6ccc48898aed1b7cb8c941c9ce726bbd4fd9a7c1767e30d1ee2ff0057d7e0f06eb9a1beafa709218a1bc0e191443348c3ca8c1f314891b6a1240dc3827d0bc07f0ded3c0579a2e9926a9aec9a458fc4a1696f633410424ca2ccbc3336537f2db0121c2b467704048c5461579791bb239abe372d75162634f9aa455d6eb4575f9ff5a1f2bf8d7e2249e2bf097833416b0fb30f0d5acf6c26f3b779fe64a64ddb768db8ce31939c66bd0be31fc7493c51f0bfc09e0eb0d4c6a3059d84371abdc240d134976aa52389cb805fcb8f00b7218b672715ed7e3bf07f84bc691c3a55e6bfe22b6d1355f1e5ed88b693ecc121bc68dc1994884bb299c95019fee3827041af3fd17f643d357c4de0ff00076b9ad5c58f8b7527bbbdd4a3864468adec616654f2d4ae4c9295cab96da006254e306b92aa6d277b931c765f3f6752ac795c39a496afbddfcb5d3bdbc8f99a56de1594e083c8c53637e37672a7dba57d07f193e07f817c2bf0ed3c4be13f13ccb225e35a4ba36aba9585e5c4c00526585ad64653b77a650fcd87c9da00ddf3bb4bb304afcc7a035e7d68f24accfacc2e2a9e329fb4a57b6db12cd123327ef086f4159f2006738c907b9eb57d6459029e873d6aa4f85723f8bdfbd612d4edb116dc38638e3ae29769d8304a8cf34ac98619cf4e314fc1c63ae79c9ac8646bf238182c4739f5a72afcc41efd41a729c827000e840f5a565191b5bea3d6980e58b706e8581e01351ed65602419c8fe1ed4ae38c2939149b768cb64b638a05618a8adf3b29ceec01ed48130d9c67248fa5290cd90c4b1ea71dbda8653bb0c79c678a8131aaa7951824fad3645010004fb91521190a4024531be5007e38154409b542800fcb8c74a616e0838f4c538b6f0371e7b5472125f1d08a92c638dc140c67ad33257dea723a0ff22a36c8f4c7ad4811630c73d3d28ce460f4eb8a1b86ef41605b8cfa935361dc42475c633de80bb9b814a39619c63b0a68666ce5b34806b2f1cd478ea304fbd4bd578a418c74c8fe740c8c7279ed428c7614f6c1ff000a60f94fd6a405ebcf39cf514dce0fa1fd29f9207079e94c6e839cd201ae7f5e78a6f6fad3b8e9fa535bad05894714eea3e94d3c8c50019efde8a09c0a4ce1a80128a3bd19acc029ad4add29b48028a56a4fd2800a28a28011a9295a938a004e68dbef49e94b4007f3a28ff3cd2ed34002f5a55a45eb4ea0028a28a0028ce28a2800a7d341c5253207e78a28278145200a28a2a805029c0f5a6ad2f4cd301718a5ec39ed49d4d3bfbbeb8a05a08bd29473483f5a701ebd6a842f4a703c5354f6ed4fc738ef4000e7bf6ef4f0369feb4d5ebcf14ec8e9f9d040a061a81eb9a0b7cc40fce957eef4e077a0000c52d2039fa7ad2d000b520c641a628c9a76393daa9087283cf342afa9c9a500e28e09e6992480ed07834e4c823b7a520cf1da971c8ed8e98aa4493b3a282a79cf6a616523e5e3da9a07049e4d2e3041f5ab026539e7afb54a8490dc73559073e99a9a273bf9fba475a62149e01e84d7bbf847e353f80ff67c8348d07595b1f158f10cb75e58b3124b1db3da088cb1cae8446d9cae5183e09e809af0624ec1f5ed5eb1f0ff00e04ea5e3df87b77afe9b7d135fff006941a4d86939855eea690063979254d8029c8c2b13827002b30e8c3b9733e4dcf2f1f1c3b847eb0ed14d6e58f853e30d113c0be34f03eb979fd8b6fafa5bcf06b06279a3b79e072ea92a202e51f38dca0953ced39e27f1b78a7c37a3fc1ed23c01a15fb78827fed26d6b52d5521922b7598c7e5ac302c8aae405e4b328e7a75c0c7f0ffc0bf1bebcb6cd65a3a491dca5d490b35edbc60adb3aa4ed969000119d4738ce723201abd63fb3bf8fb50bcbdb58345b72d6a96af24cfa95a240c2e49101495a50920908214a31c9e3a902bad7b4b5b97cb6f99e73fa9fb573f6ab7bb575bfc37fd0f6af0cfed25e16d37c21f0c34bbf9da47f24e99e284f2642a9631473410a3617e75227f330993f2e0f3c5799587c5ad1ef7f6b67f1d6a37a22d08ead248977e4c8716caad1c2db02eefb8138c67dab9c5f803e3d9352d2ec57c3f27dab52b9bbb2b68dae611ba6b6cf9e8c4be10aed27e72320657239aec7f67ff829a3fc56f02fc4c37b0db26b5a64368d61a8dd5dbc30599669bcd924656da536c6092c1b0178ad79eacdc63db5fb8f3a587cb7070ab594afccacecefa4a56fcf4f45e4721ae7892c9be26687a95c6b7a1ead636f7714b25c685a49b158e313063bd3ecd0977c739c31ed9ed5ddfed2ff0015bc2df133478a6f0f6a696f716dacdd99b4b82d1e086f637398afbee81e66d0236de7793ce00ebe6bf10be06f88fe1bf89748d1e66b4d664d6a38df4dbad26533c37bbc80a23620127257b73904641ae8bc49fb2ef8afc3ba3ea177f6fd0f53bdd320171a8e8da6ea026bdb24c649922c0e80e78278e464566a556ce36f53b651cbdce8577576d23e7d3513e37fc4eb1f1868fe0dd334a9aceeacf4ff000f58dadd3ff6746b709731a30913cf78c4bb471c2b6c3d4679aedbc3bf19fc2fa5f87b46d5e4d508d534cf08dc787ce8ed6f319a699d9c232c814c623c36492e08c6029ae17c03fb33ebde3ff055af8a20d6fc3fa46957172d6a1b56bc78089036d03fd591f31c00012493d2b2ff00e142f8c25f8ad71e008eca2935db73f3c8b2ff00a3a45b43f9c5f1c26d6539c679031bb8a7cd563ef72ee4ce9e5d521ec3da7c17beabe7f99b3e07f10787afbe0af8a7c2f7fe22b4f0fea379a95addc02f2dae64491230db816862931d46322b81f0278c2f3c05e2ab0d7ac238a5bdb3669615b8525092a579008f5ae87c79f0535af03e8ebacaeaba2f89347f385b4b7fe1fbe1731c329195490e015240e0e31d39c902b73c6dfb34f8a3e1df828788758bcd1a3d91c0f3e9715e86bc812624465e3c007255beeb37dd63d15b116a8e49a5b1d54ea60a0a5173baa8f67f25ebd86dc7ed23af5c69ba95a8d2f4a45d46e4de5dbaa4a0cd705ed9de423ccc0dc6d5320003e66c019188fc51fb436b1e2dd1b5bb5d4348d2fed3aa42f6f26a08b2acc9035dfda842bfbcd9b5642704a96c1c127ad74ff1cbe0b687e00f847f0fb5cd36f34a1a85f44c2fcdb5ec933df332ab2c912b7cbb130cac542e0ba8c1cf1f3ddd4c5e4083a1eb9a556a54a7eec9860b0f82c5c3dad286cddbbde2edfa092c86e06d1c28ebee698a31b4af5cf5a002a001ce4d4c06c0463248eb5c1bee7d0ec348c29e9cfe66a4408c793c019fc69081eb4abce7031e9c53290b8e8064e3d294b1519cf03b7ad00111839e3d051bf1132f000e9c75a063f79099cf18e31cd223654678047e94d85c1600751ea2957e65193c73907b7b5201caa37bbb8c8ed4e8f0bb48ce474a6630c4f5ed826a58f002e1875e41a007ee0493d703273ce29c8a0a6e6e4939e29ae9d81fc5683191bb9f948aa5a0d0e62173d093cf1da9879d831b8e7a1e334c25b206ee3f951b76c6cd93d7a8ef41412265886e0f7f4a8d50b640ebedd2a61b589241cb531a5f2d70149238a5718d55dc06077c7d6aed9488a42ca848e808f5f7aaaadf26f2a7af4a74818fcca78071807f9569176d896aeac74ba7591d4efed6caced64b8bbb9956186da25dcf248c40550072492401f5af6bbffd90fc5d656f344dacf85cebb6b6bf6c9fc3ebaba8bf862c649752a100191f36fdbef5e49f0abc7c7e1e78fb40f119b45be934bbb8ee1a26c1f3141f980ce70719c1ec707b57b4fc5683e0b78cb5ff001078c7fe13dd685deac925e268034990dc4774e33b4ccffbb281b3f28230380fc0af429a8ca37b1f3f8eaf88a35a34e9a6a2faf2b96b7d9f6f5389f03fecebaef8ebc249e233ace83e1cd1a7b836d6f79e20befb2a5d480905633b5b27208e71920e33835dadbfec5be3a83c4173a2cfaa7872dae2df4e8f549649eea611246eeeb8dde570ca63627b63a1355f45f147c3bf899f077c27e15f18789af3c19abf85e59d62b88ac24bb82f2295b71c220e1f80324f18279dc40f57f127c74f870748f145b699e2ab992dee3c0c9a158dbdcda5c79d3dca8b80a8cde5e0300e996c85f98f3c1ad214e9f53c5c463b325371a717bb5f0e895f4d7ae9f71e1be1bfd9c75ed79b54bd6f10f8674fd02ceecd8aebfa96a46dec2f661d7c890a65d47f7b6807b13835eb1fb3b7ecd12f87be346a163e38b2d0f55b3b5d21af6c927945c5b5f6f60ab3441971222fcc1b701b4b21c720d55f819fb41699a5fc1787c1777e339be1c6b9a4ddbcd6fab47a40d4a3b9864769191936310c19c8fe1e88413f30adff000afed29e1cb7f8e171a87893c67a8ebbe18b7d02e2cacf52d4b4c48646b891e267554b7883142230417518c11eeda4634d599862ab66b57dad1e5b2d6cd27776b59a76b5dfafe47847c50f84fab687e177f888d73e1f1a56afaddd69f141e1e91cc0b22492826152bb7c8fdd314218fca578f4f51f01fc0b8bc0ba1fc70d2fc556fa56afab68be1f86e60ba8a2f3d62692299c346f220656e172401d3ad73be0ff0014f813c79f02b4df0378d3c4173e139344d5dafadaea2b192e96e6170e59004076365db92303e53f372074b79fb4d785b5dd5be355dcb34da6db7887458b4ed2a1681da4ba78e292305b0084c97cfcc47047706a5282776ffab1be22a63ea41e1f91e8fb74e68dacfd2f7fc4f9f3c19f0f7c49f1275a3a5786f4b9757bd8a332944744544040cb3b10abc903935d1db7ecf3f11b55d7359d220f0ddc3ea9a49845edb79d0868c4b9f2c825c070db4f2b903192456f7ecbfe226d2bc51acb0f12787744b7bcb16b69ec3c4db85a6a51961989dbeea7cbbbe6393ce02382d8f68f16f883c0fa3ffc2f9ff844fc57687fb4f4cb01035cea4aff00699b6ce278edd9d8b4aa1594601382d818000a5084649391dd8ecc31742bca8d28a6ad1b68deada4efaaeefee3c161fd93fe2bc975776fff000894e27b75479375cdbaa61b380b21936b9f94e429247190323389e06f827e39f1e5e6a96da1787e59e6d25cc37427923b7f265c9050995946e041cae722bddf59f899a4df37ecd66df5fb5ff8967909aa2adfa15b6da6de32671bbe4f93cc197c705bdeaff8a2e3c2ff0013bc3ff107c1ba578e343f0ede1f15cbabadc6a77a22b3d5607e31e6af070df37f173121c7395d55385f46724734cc546f522927d795d95a4d6d7f9f43cb7fe14ffc788ed21f06f91ac4167756935ec5a1ff006ba0864851d04a445e6ed1f3ca9c6324b6403cd68dff00ec9bad786fe07ebbe27d66c2eacfc53a75e3eeb48ef6da4b71648abbe46da49dc1bcc180f9f947cbebf45d8f8b3c31a5eb1e0cb71f12746bfb9d3fc1d7fa7cdabb6a7100d3092d76658bf0cdb5c804ee2149e704d7cc7a1ebfa347fb20f88f497d52cceb13f8963992c1a7517063f2a11e62c79dc57e52338c706adc60ae8e6a18ec762395c62a2b9a37b45eb76d37bf6478660792a5c85520e73fceb2df748643bb3ce401daae5fca0858860ed032c3f4a8218f70271c91c7bd797295ddba1fa0adacc618cc6b825b27a8f6a7a802150bcb29ceea95401028721483d6a362a14a819cf3531ee68888b1598337cc339fc2a127d4e79cf02a4665c77607b8e295f72a86c1c6782681908f9971c8c74cd3446147071ef4f6924727395f6ed4edfc0c9c8239e3a5480b19cec07b7eb5287da772af19fd6ab96c328ce39ea4d48c096387fba41da3bd3b95627525836e18192707b9a76032be4e495edfcaa177c124b6577026a4320793603b54ff001d50c9556353bd0039ed9cf14d908541851866c9cd103aed452983b4e49e291d02a3051b141e58d03b15e4c2b9c7427a9eb4ace5606d806ddf8fc697e566ca862c39e9d69df3072429c1382a0719a8b145720b26d56ca039e9dfb8a82478e2b925be552318c74ab4e0e546d3b73ce3ad45e4ef7903f393c8c67159c90c8199bca0ca0b1c924e38c544848e41cefcf1e9565edbf72c9b882070a0f19f5a8d2cc2c5e72bee18e401fcaa350b1abe06f184be0df13596ad15bc77335b3128925c4f00c904677c124722919e36b8fc457a078cbf688f1a78d174c2daacfa445a6a4d1dbfd82f6e7cc0b2e3ccdf2cb2c92c9b8003e6720018000af238963382467200fc6bb6f86fa98d17c75a16b01f4db64b3b9499a5d5a391ed54a9cfceb1ab3e3fdd52735bd29c96973cec4e1a8c9baf287349219ff0b7bc6b0e86742b7f18ebf0e85e4b5b8d39354985b98986190c7bb6ed20905718c1aab0fc4af175ae956da6c5e29d60697146d08b15d42610ac6c0ab204dd8da41208c60835f40f8f3e3b7866cedfe235cf847c47a943acead168c6da559aee70d344d21b916f3cc8b22c4a1c01bc2139601429c0d1f16fc7ef05788b5ef8846e6e8f88bc3cda96877da26973dac8627586456be11a3a058cb832062db77ee3d735d3c89ef3feb5ff0023e77eb951bbac269a7afd9f2fef77fb2ce07c2dfb4a5e7c3df835a7e81e119aeb46f13c3aec9a84ba879114b0c9034253610fbb2dbb69c14c700e722aa699e3af8a1a0e8bac7c5db3f16ba497fa9ae8d7a642259a698c26652627431ec55042f75e8a0035f4be83fb41f82f4ebaf164bae7c4b8fc4169aa788b4ed474fb35d2ef556c2d22b9491954b420295518d8b91fbbc8259c8af20f8bbf1eb4df1cfc1ff15e87ff000935e6afabde78ee6bf82098ce77e93e4b79432c3688c4810888904100ed18cd744af6bf36c70d1bd4a924f0b6526aedabdd3dd6b15b7e8791a7ed25f134f8d6e3c583c5774dadcb6c2d6499e389a3308e88222be5800e48017a927a926b4bc37f133e2b7c43d524874ed61b50bab3bf6f15bbdc2dac4b1cf0c410dc349280a1523006c276000616be8ef07c7fb3c3fecd332ea30e8875cfec77171bcc63555bfdb9263ddfbcc6fc6ddbf2e319e3757cb9f06fe243fc35d43c4d393789fda1a0de69d1b5936d78e6910796e4ee5c05700e4648c6403593528b4a53df5dcefa33a3888567470aa3287baae92bff00c0f230f5ef8a5e27f1268f369ba9ea86e2d24d525d60c4208a322ee4c979032a8619dc7e50768ec062ac5e7c61f1aeb1f102d3c6773af5cb78a2d8a7917e8151902aed0a15405da46415c61b73641dc73f4268ff00b52782ec3c696de22b8d2f5bb9fb7ea16da86a168d6d0ed81e1d3a4b55485bcdfde66570fb9826146304d50d17f6b0834af08c91c6faf1f1acda7e9b6971ab011991fc8bd96697f7864dd86864d8091cf208039a7c8bacc855eadb4c1ae8b7fe6f8ba74ebdcf18f1f7c7cf1c7c5eb2b4b0f15f8866d56dace469a1b6f2628225908c6f2b1aa866032016048c9c63273e7922eddcc06e2debdbd6bec1f157c7ad0f55f869e2ad6ece0b78b5d9b57d474ef0f094c497b69637a526b977891895e448ab2827e69880719af92aee1df132c6b88c7cc585635e1a26ddd9eae5b514a0e9aa3ecd27b2fc76feae554757c845208f9f3e955ee4e26248c7d6a57765619e8c38db51dd91360af249e87b579ef63d9212c4cc08e40153951b7242939e99a821df19ed52c781921429231480520ee6467da14fcc3b523b8dc00e0f53f4a52fb5b2c370c6428f5a46c9238c39ea4f4fa520142ed5c81b08e69be5b361c925876ed4a8439f418e79a7023385ce3ad30218d0443e6c96eb9cd274048ebc6569770f301e086fe13d01a68620e3391e828131dbb70e4e00e36d31c9f2d87dd18ebdf148eeca71dc8e4e39c52b71177e9d4f6a0822248e579edcf6a1be56ebd3a9f534f640005e80771de9157e5e477cf35050c6c4617d4f5cd2121411f97b548ebb8e47271cd43db1522236e5867934ce99e71ef4e9003f3679f4a685ca939c638a06333903f9522fa648a76327d4d267d7f5a560140e7d2918f6cf7ed4bdbeb4c2467e9eb5250ee0ae3a7ad34b00d8ce71de9491b463b0a8c90335203d80dbd40279a693f28f5f534b918ff3c530e0520039007bd34f229739fa5275cd05887af5a4239a5fe11494001e68e68a4f7a4025141e68a8602374a46eb4b9146334806d14ad494005145078a0029a73de94f349cd0037f4a3e942d2f340052af5a4a33cd003876a5a653e800a28a2800a28a2800a5ff3cd253e8204c8a322968a0029473d6928aa01c0f4c0a3a9349e94e1c641a601d697d2917ad3cf6fa5000077a3a1cd0091f8d28c63a550814fe54e18cf03f2a68c7423f1cd48063de8240734ee98e3b50c4633ebd68ce68245514bcfe1498e6940dd4006452e78a4e3bf26973400e51b71cd2ab71efef4dddc7bd2eef5aa01fbb273d3dc5281c1efc75a606c8c0e05380ce3a9aa209437403ae3f2a78e0654f3ef4cc0eb8e69ebf8d32478e474e3b63bd1dfa76ed4e27241033ede9411c1c6013efdaac0455f5e323a54910c72391e86980fcb8cfe7e94e50704af1cd2024007a1af51f87ff1a6efc03e14d3f4db6d352e67b4d7edf5c49e497084c51b2184a05ce1837deddc7a77af2a570ac49c902b6a3d1ef0e829aa8b39ff00b37cdfb3fda8c67caf376eed9bba6edbce3d2b7a32945be538b134a9568a8d54ac7b1b7ed1f6f6b6eb63a6785dadb495d2756d3e1827d47cd9564be6cc9299044a0aa10a15368381cb64e69d71fb4bb4fe178b465f0f153159e8f6df6817bf7bec1248fb8af97ff2d3ccc633f2edead5e33a969f79a3de5c58df5acd63770b15961b8431c911ee0a9e41a57d175258ec11aceec9d4006b1531366e14b9405063e6f9d5978cf208aebf6d53fafb8f37fb3f056575a5efbbdef7bfdfa9f40c9fb4e799e04f89cd062cf57f156a9e759699b5a43631cb1b2dcca26daa0ee4db18c61b3ce315cd7c21f889a1785fe117c59d1b51d41acf53d72d6ce2d3a21148df686469778dcaa42f0e3ef119cd65dd7ecb9f14ad7426d5ee7c2379f65540c56292279b07fe98ab9933edb735ce7c3ef837e33f89d1dd1f0c68736a315a902597cd8e18909fe1df232a96e9c039ef8ad1ceb7326d6b6671c6865bec66a15128dd36eeb4b5acaff247a6f893e33e8b671fc15d434dbcfedad47c2f6e12fed4c2e9e561a3c20675009da18065c804035d427c48f865e01f1278c7c7fe1ef125f6b7e21f105accb6da0dc69ef08b392760d279b2b7cae15bb2f41c7cc70d5e45a97ece3f11b48b8d260bbf0eb5b4faadcb59d9ac9750032caa1895fbff0028c2920b6011d09c8aa9ac7c09f1ef8775cd2f47bdf0ecff00dadaa2bbda59432473cceaa70cc55189551ead81c13d01a6aa555bc7f030faae5d34a31afa59fda5ef272bbf927dac761aa78fbc3d27ecbfe19f0ac1a93ffc2436be207bfbab3f264f922db280e1f6ed3f7978073cf4af4897f690f0ae85fb506b7e28b2bd9efbc3bab6971e9e354b78184b6cdb23fde88e54cb0564c152bcf500e307c33c75f01be20fc37d29751d7fc3d7163a73308cdc473453c6849c00c63660b92401bb19cf15ecff0019ff0066987c27f0efe1f697a0783da5f18ea8d0c1a8ea6dab0f96e8c2ced6de5b3f964121c875c00220327773a45d55b2dac7356a7963718ba9ccaa73aba6adada4eefcac647c73f8ddfdb9e076f0f59fc50bcf1c1bdb856bbc787e1b0b6585583aae4c6b2070eaa72a482339c743b1f10fe2af81356f8072f8797c4b77e31d7163b45d2bfb4f49f26f34e2bb3cf067036b290a4000b1e429671f30f09d37e11f8af56f106bda0da69624d53448e59750b717308f256360b21dc5f6b6091f749cf6cd771f133c05a0787fe05fc34d7b4eb1306b3ab0b9fb75cacd2309b6b617e5662171fec8152aa5497349ae9e7fe66b2c260294a85184b5e6be9cab56aeaf64b74ba10fc6cf885a1789be16fc2ed2b49bf3737fa2d84f15f43e4baf92ede56065942b67637dd27a57878c921cf38e79ab3779136dc8c20ec7ad4320563fecfa579f5aa3a92bb3ea70986861697b286d76fef771d02fcb9e39e82a4fbc71c118e98a8b9514f2467824639c8ac8eb1eacbb79241fe118ef4ef3084e4e0e3180324d351c8247183d8d0b8538039c75a0a418dc99c9fc7b5295dcb9e76f4ce2819523007e34bf32c6e38041ce076a061e590a406c328e98fbd4e1938dfb89c648ec29fb4f94b95e3aeeef4d2463fbbeb8ef40c645ea4704f4353a2e54923073cd42a31b706ac2a6eddb793ea7a5026481fe740aa31e879cd0d82d92b819e326991e402368fa8a7b1db8ee3be6ac108e06fc81cfb547248554f4c74f7a98afa03efcf4a8fcbca96c9cf618a0bb90095c8d8001df3de9f2402351c924f76a76d242f34aca170cd939cf5a9b0c8d98a9032081f95059449c8239edd452b1040c75c77eb4b14264048e9dd89ab402c370229c3206041fe1ee2b653242cb96273fc5cf35925368dcbd31b48ef5ada64dba2646ceee802fa56d0decc89689d8f68fda37e0ce8bf0974bf01dee9936a12cdaf69e6eeea3be7465470b11f936a2e06643c1c9e9cd55f8fdf0974af85cbe0c7d325d42ee5d634b5be9d6ee4460ac421c26d45c2fcc7ae7b735f4cfc64fda0fc4bf03fc27f0e6df47d3f4fb992fb4757953548249366c8e1036949139f98e7af6ae3ff6c2d3352f89be34f8436d6d11fed3d7ac1114c48420690c59f52157713c9e057a72a71d6de47e7d81cc716e78775b483e7d6fbdafd3c8ccf81ffb1b5afc4ef83573e29d4ae2f2c75bbe173fd911473a25bed51b6332ab4658e6456ced3f770475af06f851e08d3fc7df153c3fe1ad5bed36b69797060b836c447300158f1b8300723b8afd07f1159f86bc3be2ef0359c7f14345f0969fe0e88dabf87af6f62124c8d12a0136e9d48223c15dcadc9ddce6bc1f5cf8729e00fdbaf43960883699acdd36a76ce72c33247279a07fdb40e71d832d54a9ad2dd08c266f889aaee727ef45ca1a5ad6be9e7a5991f8a3f658f86dab68fe2db3f0378a355bbf15f86a0792eb4fd4769405413b33e4c79ced2372b30048cd719f0ffe037c29b8f833a178dbc75e24d6f469354bc92cc3da32b4024124aaa02881d86562249271c751915d7fed0dfb4e41e15d73c73e0ff0c78334dd0f54bc77b1d47c41148be6ddae082c556353bf0ed82ccd8c9ab1e13f885a4fc35fd8fbc15aa6b1e15b1f19da4baacf0c7617c502c72196e984a0b46e320211c007e73cfacda0ddadb19bab99c30d4dca52f7e51b6aaff0b7bedb9e79aafece3e1bf05fed03a47817c4bac5fc9e1dd6ed964d3b50b168e2955dd8ac6926e47072c8c9c0fe343c0c8addf08fec976167ae7c42baf88175a8e9de10f0aab6cbfb364496ec91be32859194feecae540cee755ea08af13f8c1f17f58f8b9e3a3e26d4bcbb2b88638e1b48acc90b6d1a92ca01ea4ee62777a9e303007d25fb537c50d7353fd9e7e19c134a33e26b48ef752741b4cf247144c32071b4bc9bb18eaab8e9531e4f7ac7a7556654e54294a7ef545697935ab6be5a1f30f86fc07ad78eae7547f0fe9c4e9fa621b99ee2eeee2862b588b617cd9e431c793d39c6ec1c0e0e3a6d37f67af8897d7d7d6b0e831c7776b742c9927bdb784b4fe5f9a2188bc804ac63f9f09bbe5e7a1aa3e14f1a6b5f0d6cb55d22ef42b3d434bf11d940f79a66b56f2ac573103e64132b23238c649565600e7bf18eae7f8e9e2bf00ea17163a8784f42b4bab5d463d6acb4abad2e4b75d36e1a1508f0c6ae9b46cd8c03ee04e1f1bb9a20a2926cf66bd4c5f338d151696df86bbaf998507c05f1b5c58da5ccda5ad9413c31cf209a78bed5140f288bcf36dbc4a230c7ef6d038ce71cd717f12bc2ff00f0ae3c5baff875e717474cba7b3f3fcbf2cc854e036dc9c67ae326bd5cfc7cf1cea5a46a3a87f6559ea17b67a5c5a65f78996ce569d6d1e70cb14a43f94a19be4ddb0311c06cf35e3be3dd7b57f8a9e3bbdd51ed96e755d66efcc3058c4c43cce400b1a9258f2400324d2ad64af1dc783a98b9567f59e5515dbbe9fa1caa7ce8c31f31e77fbd4cbfc077608ec074a6b59dd412490cb0bc72a12acaea41561c1041e8451b9b0308772e33815e7599f41d2e4b78c5c201ca2e4f1eb55d58ab20272bea29eeadb54e5b9ebc1c533ca936e4231c739aab34511b49850ab8566ea08e948d2b7960b1ce0e297ecedb4f0d92339c74a8b6c8b9214e17b62a3de188f26ec75e383934be63918073fd286577e91b03f4a8f6c89c6dc13d46296a3dc736e2dce07a5491cbdb1f32f4a8b6b97cec6207714fc346bb8a13bba1f4a5a976ea49237cc02f43d7342fcac38e40eb51f95317662ad8c6464549e549b5495273ed55a858b0b280598824038e4f14b2c9b94855e7d07434c10caa1804cb1eb814b287200c30cd56a52d6e019917e51838cb1a5470a1460907a82726abb090762e4f00548a2691b2b1e0e70703a0a57015880ecc085ec4e73f85352676c37183c64f4a531c8b91e4920f6c545977ce10bf63e8290c74877491c8ab90a0f27a5417b30fb3af1c93f2e3a01419da2cc4148c7a0cee3ed550975258c6c54e471daa24c2e4fc471c7d58b21233fd2a4b298f98a8e032c839c9e83d6a19a36768b7a3c640c8c0c6053a359190111156070d85c524da62f43ef5fd87345f01fc56f869e29f0cf887c33a1de6b3a7cbfb8d46e74e80dc7d9e6538c4854b165757c313c6e403a0af22f801fb3f9d57f69a9fc1dacdaa5c5878727b8b8d4d644f9278e06da995618647768b83d558d63fec81f1257e1d7c71f0fcf711a8b2d5b3a45d2baf694808ded8944649f406bf443c41e1bd03e16ea1e3bf88f78f224b7d630cfa949191f32db46c170bea5768c0ea5477af5a9a5349b5b1f97e6d8aaf95e2abd385daad15cbe4dbb7eacf903f6f9f837a5782f54f09f89bc3ba45ae93a35f5bb585c43616896f024e84ba36d4006e75661d3fe5957a67c46f84be08f807fb22b4baaf85347bbf185c69e9626f2fad207b917d7009729294c9310690ae390221e99aeb7e1a6a5a67ed4df033c37a8f88e64b9bdb5d4a2b8b88d14148ae6da60c54af61247c11fdd98d78a7fc144be28b6a9e2af0df81edee84b16956bfda177146e08334bc22b8eccb1aee1ed35692514b9ba1c580c4e271956865b51b52a4db979a4775f0ff00e157842e3f61bbdd6e6f0a68b77af3787354b95d526d3a16b912209f6bf9a5776e5dab839c8c0c541fb35fc05f871e10f80765e3df1869763ab5d5d5a4ba95ddedf45f6b82da152d8458b69190a013f296dc481d00aed7e13ccf27fc13defda41807c2fac050dc7ca05cd7cf9fb357c70f893f05fe1ccdaabf84eefc55f0b52e9e2739c1b3908dd2346c01223e496dcbb3771b958b65c5c6eb4e839471388a5888d3a96b54ef6baec9bea74bfb4c7873e067883e0d278bfc353e99a4eb124be56969a040b12ddb82a5e396dfe508155833310acb95eb908dc0fec73fb2cda7c6abed4bc47e24328f0a69b32dbb47049b1ef67c0631e472aaaaca588c13b8007a91ed3f1c3f67df00fc61f81b37c5af01690de15bd8ec24d51ad4c1f668ae218c132abc43e556011caba70ddcb060c3bffd81357b6bafd9fec6d74f45dd677f771ea002852652c1d79ee763c7cfb63b51caa53bb468f1d530794c9509c9cb9acefbc6ff00f0c375fd73f65ef03eb30f856fec7c1b1dfc6c2dcc67484b9f29836c659ae046c1181043798e0af56c75af0ffdac3f649d034ff04dcfc49f87ad047a667ed179a669ee66b57b672089edd8670a3764a8f9361caed0b86edfc51f1cbe077877c511687a8fc0cbfd3f59dfe5ada4fe11d3bcd99998a8d8be67cf960402b907b669df147f6a0f05f867e1eeabe0fb8f87be31f06e9ba9e99756ba769f71a141a7c07cd8d83328f387cbba4c9da38ddeb43b493b9cb8658cc3d6a53c329bbbd6ed34d7de7e6fb610f7183b7ad421c3b373939c0c77ab37281e47d8aaa33c827bfb554f2768e4e5c74c1af065b9fae20c1f35f3edc54c108e8d95f4a82323e6cf24f615323aab00db893d81e94801221bf192d838a59176293cbf61934d01d9be538556cf1de9e496e83683fdeee29010aa86ca1271fca8ddb070c30a304529223407a9ec69190bae3a6de4d301bc6d042e7d8520fdc819e149e314e94e5c018cf6f4a68e73821bfa500211bc0271cf5f5a5c0c727271cd00856f954f2314d236e0760792699026064039e9d452edcf20e54fad39e41b4f622a1f38a8fbb9c7ad6631c412a33d4f6a8598637631da9fe631049ee739a6160430f53d28110bf4ce793e9480138c9ce7af14ac3e66c9fc8519201c9c15e82b3b95618c06cfa1eb4103079e687c718e9dc7bd18207afad508427e6e38a43c8e9d694f1f5a6900104fe95050878cf34d600b1e29db872734dcfcc79c6695803ae074a46e7eb412338a323d3a5480d2290f00d3ba7b9a691ed41627248148781ef4bd0d263d690099e47a51ed4a78a08c66815c6d145150c029bfc34add293a77a430fe1a43c52b525001451450027dda6d388cd2375a006e78a5c1148b47f5a00506973ce6929769a0017ad2ad22f5a7500145145001451450014e1cf6a6d2ad040ea2917a52d00145140e6ac055a7af43ea69b4e07ad001b78ce697ae3d2901e315203ce78f4e2801a4e724702937fe34a4719e05205e6a8341ea375397a939a6aa8f4a7018e87eb410c76da5c74e718a4c8edde82d93412381a5cfad34124e694038e6801738a46a36d2f6f71400bfa52f3dc5253874ab40380dbd29dcf1cd376e1b1d29eabc671834d103e3fad3c1c124f34c53cfa1a5ea3d31e95421d9da33d29f90703b0a8d07ca39ea697a6ee71ef408997e605b3d0f4f4a7ac382493d3d7b5320902c58c16627bf7ab0e50904f5154845393e61d79f6af72f85ff0016740f0e7c26d6bc29a9db5daea57d7324d6b7f0dac570b681e011b3aa3b0cb300d1e460aab96072307c436062c146e3d735ea1f037c0ba478f35cd520d66ea5b5b1d3b47b9d49da294c4efe4a06dbb8452e07727613807009c03be1f9949f29e6e610a72a1fbcbf2aede47afea5fb427c35bed623175e1437fa2472c570d68fa65b249e68d45e5762e18923ecefb4213b49ca90012699e1af8c5e0fbcf8edf0ff0055b9bb9ae34ed36ca6b19b52bed3e1b2559a49276494c511288a3cd5c918c72c7a571ba67ecade2ad4bc4975a2a5fe8cb716f7b058bc924d2888bcb6ad74ac088b3b4229078cee238239a8e1fd9af589ac64d463f11f87c68eb6b6b769a93cb722195679de040a3c8df9f32320e546320e4f38f4b9ab5ef63e5dd0cb541c235775dff995bf1e876de36fd9f7e2bc7e2df17f89c6bd6f67a54d1cb37fc2413eb49025e5bb60a43bb76e00aed5dac027cb8ce003573c23a35d7c5afd93ec7c1de0a9a17f12e99aa3cba9e9bf695824ba85a494a9f9880cbf3c5f788198f19ca8af33d43f674f13e970ddcf3dde989696297ed7d77e7bb4768d68e11d1c84fbee5e3d8a012c245e9ce39bf05fc11f1c7c46d1eef57f0e787ae752d3ed58acb3c6e89960324206605c81d9413c8f5152a4e327cb1e9fd7434f654ea505cf5e2b91a69dacae9595f5d6fea8fb2b44f0f6ade1bf0efc0fd235abd8f53d56d7589a39a68e6132aed86e088f7f7283087dd3dabcefe0df8e34bd0ff6a2f8a916ad730c57da8cf7d65a7cf79726042cb7076c3e77263c855008e9b001ce01f997c09e03d53e2278a22d134cf2609d9649649af24f2e1823452cef2360e0000e7827dabb4b5fd9c759d534bd3f51d2fc41a16ab6da8c3792597d964b80f70d6c9be48955e1522420361580ced3c818274f6d36d38c7fab58e5965787a2aa42b56579aed6de4e5dff000ec8f7ff00194d37c23f857e2f8e7f85f67e19b2d6d1eda58eebc666ee4b99194a89e289d58332960c7055ce067a7181e2cd7acfc2fe32fd9d755d56e162d361d16c9a491f858d4c71aee63fdd1904fb035e3f7ffb32f8cf4db7f32e52d2366b5b3b88a2691834b25ccbe5456cb95c79c1c10c0901704eec73572d7f661d6f539b5282c7c4de1ebeb9d36fedf4cbcb7866b8dd05c4d288941cc0010189c95247cad8c918a4e751bd23fd7c82186c1a8f33ae9eaeef577bae5eae5dcf7ab3f07df7c27f1a7c5ef885aecd636de1dd52c6ed74bb81728e6f5e7612224601ce780bc81c9c8c8e6bcb3e365c6efd987e0db8db851781b8e7ef572da1fecc7e26f1049a81b1d4ac2e2c6cefbfb3bedd045793c535c01f3aa08e0670aa783232ac79e8c6bcbbc63e1fd43c23ae6a1a36a90f917d65335bcd1839f981ec47041ea0fbd454aaf95d968cecc16069cabc5aaca528b4f6b689592dfcf5fc8c5889c313c64e4d48aa304fe34c504700035329e303826bccea7d9b230a083daa453f2f5fca914f3cf24d28c903dbf9d1610a98e380587734f00a3601ce3ab0a6852dcf61d6a50446418f2a47e669168698f00e3e66cfa7351e5578e739e462a62c46e918118e98f5a88e4846e49639e3b9a068b3b8f971b02515b82314a88aad8248cf1923229aaee230acb907f8bdea712f961c850c48e01ed568656886e5da178248156632d1676f1b970d50296e18a11b8f07a66a445f9707d79a043a300607b76f5a730f30104ed23a63a522a8c820003b63a5382e06ecf238c75cd0342a1237127691df14870c324815328c7cc5baf53d714dcf7c0603afbd3b0111dc768c0191c0ee69648db09b87af4ec6a4277bb3aaf40303fa52b16c609e09ced1eb4586570a55a3271d79e2a660c59402b9e4f1d3da9a647da0f09b4f414a0ee639c8e33c8aa450f589b27320cf56f7a740de55ca1070b9c669b2a6d891ba93d81e950b8f2dc65f83d3eb45ecc4d5cf44f187c4ef147c4b874783c45abfdba2d22230592343147e54642823e4552dc22f2d9e9ef5d137ed17f106f75af0eea9278951f50d0227b7d327fb15be6d9190230c79786ca8032c091d8e6bccf4abfb9d32f2cf51b297ecf736f224d1cb11cba3a90cac3dc100d7e8369da7f81eea687c6ba82ed83e2bdbdae8c2240336d23c2eb32ee1d999235247f1a835e953bcb5b9f2999d6a197a85e829475b596cfae96eaaed9f05f89f5ed43c45e20bdd6352bd6bbd4efe669ee677c65dd8e49c0181ec00000e000057573fc7bf1d5cea9e18bc9bc40d2ddf8690c3a64cf6b0335ba945420b6cfde65540f9f774cf5e6bea45d1fc29a7fc78f02fc302d6ba8daf83f409258239d36c577abc816472ca7233b3320ebb4938e4559f0debdf143c49f077e312fc48d366d35174f945819ac52df6e2394c8884005e31f26d73bb393f3376d141ef7382a66d4a514e5422e2ad6bef6936b456dadbf63e20f157886ffc5de21bed5f569bed5a8ddcad34f31454dec7a9daa001f402b4b50f881afea1e05d3fc1973a86ef0d58dc1bbb6b4f22302394efc9de1779ff005afc1247cdd3815f717c46f1c6b8dfb5b7c3af09bdc22e8f0dbaea06dd224cbdcf91749e616c6ee138c671ed9ae72c7e306bde26d27e394ba947a7dd47e0ebcf3f45867b08d92d1d649d51b18f99818d5831c9dc5b9c1c52f66aef51ace652a74dac3ab2516b5daef955b4e87c379608e795257680457b37c2fd2f5dfda42f34af03eb3e2836ba7683a6cd269c1ece37f2c2f96be5e54a310401f3333636f4e6bb8f8cb7b0fc4ff859f073c53e2dbf5d3f51d4e5bab4d435a8acfcc22159368768d305b1b73b57182cd8033563f65ed17c3be16f8e9723c37e25ff0084bac23f0fdc4ef75fd9d259a893cc50622921248c053bba7cd8ec6a6304a49743af15987b5c1caaf272d58deda5d269d9eb6b16fc2bfb4c7802cd34a9b53d335017761a769f67733c7a65ace6ec43032c900dcc3cb4f3984a1d793b40214015675bfda5be17ebde0fd4e1b8f075edfea935c5931b8bbb685a49cc71429e6193ccca1411b80a320f19fbce0247e3a87e337c03b4d5bc78b6af0d9f8caded7cf82dc40b6968de5191014c614248e39ec1739201af78d53c451e8faddd7868f82fc5daaf85a2b70aba4d8691a7b688f0ed1f7246dac4f5f90b839e8bd2baeeedb9f2b51e1e9d4f7a93e74dded3b2d2db3b6bb9e0375fb53783bfb1f50807864dcb5d5ee6e524d32d5639ec975112c50b80704adb1913907e639c9fbd4dbbfda13e1949e3ab9d72cf469b4955360d1dd5a68568f34eb0c92bcd19569088f786847988777ee87f756b73c33797de15f80371af7c16d3666d62ff00c413c57e6dacd2f2fa1b40f218119087e91f9391f301bd98752d5edb6971753f8abc0373ad5a4767acff00c21d7d2de58c71858e393ccb22cbb413819dc31cd176fa8ab4f0d4252e4a7a372fb567a24f6b3d34d3c8f86a4f85b6de2cf85be35f89f06a725adb58eb46de1d364b4f9a5123c6431903e14812f4da7eef5e6bc98f01fae703e95f63e9ff001cbc55e33fd90fe20eabadeb466bf93535d384a9690aff00a3ca2159230a1403f2c920cf519e08c035edbbb4af08de683a0785bc39e27d67c3573a76f8acfc3fa7d8cda55ca146c99e69b0fbc8c124baeef97ef12738fb28cba9ee53ceb1184e6855a7ccf99a5ae8924bab5aee7e64481976024103902bbaf1afc2dff843fe1df82bc55fda46ecf88d6e1bec62df67d9bcb651f7f71df9dde831ef5f44f8266b9d0fe16f8f35bf83ba1490f89ffe1227b79edee2d639751b0b2da084487e7c80f95c7cd9f9ba95e39cfdaca5d76f3e15fc289fc51a7c5a66bd2adebddc1146231bc988ee2a3856604330eccc781d2a3d9a5193b9e82cdab57c5d2a54e364e566afabf75bdbb7ccf9aa2d36eafed2eef20b1ba96cecd55ae2e1222c908660aa5d80c282dc0cf5356c7807c4af690dda787b557b4b98fcc86e16c6531c89b5df72b6dc11b6391b23b231e80d7d53e1df89df0634ad2254d564d3de3bcb3b2b7b9d374cd264364b2c5700872c60864994616575977742aacf9c566dafc5df877a078674fd2a2d534ffb688a57bc7d3f4b9ade09e76b3d4a22fb5614fbc67b75e830180e029c2f671d2ecb966d8bf7b930ef4f27d8f97b56f0f6a9e1ed412c356d32ef4cbd7457482f60789cab7dd60ac01c1ec7bd55d4f4db8d1f519ecafed24b3bc818c72413c6d1c91b0ea195b0411e86bea6f1afc44f847e28baf126a8c6c575449b50fb233e9b33c97a25b38e3b79159a33b764a19b0e5769e5474af03f8c9e20b0f157c54f12eafa5cff0069d3ef35196682e3cb640e84e41dac011f4205653825b1e96071d5b1528c2ad371b2bbbf7ec7aefeca3f0274ef889e18f17f89b58f0c7fc250b61b2df4bd3c6a46cc5cdc052f2a1756054e1a1c337cbf39ea41c743e1df803a078b3c4ff0a16dfc037f61a55fe9526a1adcd79a9a18af6358a11e7461272ea3cc9a3e3087120f9786c737fb375e2e9ff037e3db863b5b4cb58b2a016cb0b903f0e6bdb6c6e3ccf117eca3b024adfd91720e47fd394009fa8ada11872c6ebfab9f299857c553c5d7e49bb6b6d5e96a6df7b7fc13e3bf8d1e017f877f1335bd19ac858dbfda6592ca0f3c4bb2d5a4630927731e536fde3bbd79ae5b47b582f756d3ed6eee7ec56935ca4735c119f290b00cdf80c9aeafe34c31ff00c2e2f1d32b3646b97f92dc71f687af54f8900afec67f08b2990751bfc153d3f7f71c563caaefc8fab58a9d2c3d08cf594ec9bf54ddfaf63d0f5cf82fe14d1743f89f7cff000da3834bf0cc16b73a26b126a17863d510ed3212e25d8fb8778c00bbf07919ad5bdfd9efe0ce8f6d737cf70da8c76b6ede2f96dda7990c9a3c914a21b58c8719c48233bfef9c804fcc2be6ef827f03f50f8c9a96ad9d46d7c3ba0e9307dab52d62f7e68ed53048e323248563c900056248e01ddf1e7ecfb67a7fc3b97c71e07f17dbf8f3c39673791a84a965259cd66c480a4c4ec4919619e87e653820923652d2f63c2a987e4abec278c6a57b75b6a924afaa4f7fbcf59f877f00fc23e26d4be1f6cf0226b3e1ad6b437d4750f122ea17416daf30e5adc18e508a237023084173d4b128c4d1b7f847f0f21f17689a1ffc238d71731f82e1d70dadacd7335c6ab7922fcc369b88c32a28de2289a3663bbe6c0c5786fc17f8523e31ebfa9e856fab8d3b57874f96f2ca192dc48b76e98fdd6edebb09c839c37018e38e759ff66bd7ff00e144d9fc49f3d9d2e6f96d534af2487f25a4312ca5cb7532e1426de8c1b3daa2edaba45d6a3ec6b4a35316d376496bd6ed75ebb69619fb43785bc3be12f1168d0683a1eafe1996e34c8ae6f6cb55558c798d9c3c69f689de30c01cc723965c7bd7909990970c4bbedec30057a2fc74f85b6ff07bc6ebe195d6975bbdb7b4866bc64b630ac12b82de581bdb700bb5b7719ddd057a0fc69d456f3f658f8311c985941bc0a40eaa1f18fe559495db7d8f728e2d51a7878a7cfed1daff002bdecee7cd6cc1664e0e41ce3d295ca1827183966ce3d3debd1fc21f06e7f1c7c32f18789acb5066bff0df973dc692b6f967b66eb2893771b42c848dbd13af34cd73e108f0c7c21d0bc67a86b6d0ea9af4ef158e8ab69cbdbae4199a52fc0e071b4fdf439e78e4e57b9df2c7505374b9bdebf2dadd6d7fcbaec74de20fd977c4f1fc41d3f41b586e6feceea28becb7d1a4114b7123592dd32c514b3a07081b0cc1f0319ea429c2b5fd9efc7f6ba3dbdf9d00dc4570d68638ed6eede7980b938b76689242e8ae41019940c8233915d5d8fed71e32ff008492db5bbbd3b41bbd474a8d63d3e4b8b597fd047d9becd2088aca0ed74e5958b2eef9805acfd0ff0069df16f87eeb506d3a2d3a1bbbb874a896e56072c82c3fd56d05c8f986438208209c05adfdcdcf2e32ce236bc62f45bfaebf810fc44f81facfc2ff0002e87e25d4aea08ef6f752b8b0fb15acf0dc085a100eef3e195d4b6e2ca5782a50e6bd8fe3efedafa6fc54f82a9e11b1d36f6d35dd492d5758b8b989160fdd80f2080ac85b06555c6e51f2e73cd78efc5ef889e22d6343b3f046ade0ed37c0d0e95792df9d3ed2cae6de613cea198ca2691db9041038c0200f94003c8c219a4c316c8fe21c1fff00553e7e56d2ea6d0c0ac62a75b18939c1b6adb5ba1f45fec8bfb4f69ff0261d6f4ed7ec750d4b44bb74b9863b048ddd2700ab1c3ba0c32edc9cff00cb35e3935e49f13bc7575f113c7fadf8899584ba9ddc932acadb9a1889c47193df6a055fc2bb4f86ff00b3cdbeb9e0193c77e33f16da780fc1cb3fd96dafa7b592ee7bc97246d8a1420b0055b241fe0638c292327c55f06eced756f0e5a7837c63a778e97c433adbd9416686dee9642c142cd0b93e502c4637303d4900734ef2e5e533a4b2fa38da95e1f1cb77676d37d763e82f07fed7de0df0ff00ecaf27c36b8d3b5c975e9344bfd345cc50426d84b309b61dc650db479833f2e783806aff00eceffb7868bf0dbc0765e14f17786ee24834d8843697ba24711322f3feb227641b87770c77649233927cee4fd8ff0041d37c5567e11d53e2de9767e39952379344834c9658e2ddc9413ef552fb7e608c159b2bc0041a82dff63dd3d6f3c75fda3e3d8ac6c3c2b71125c5f49a5b3ac919852677dab2e54a862368ddb8a81919e37bd456d0f0eaff0062d45385493f79f36cfabb69a6b7bf43d17f686fdbdedbe207c3fbef0af8374cbdd3edf53430df6a3aa2c692080fde8e38d19c7ce32a58b7009c0c9057c13e00fed0de20f801e27b8bdd2a18b50d2ef951751d2ee1b6a4ea09da430c9471b8ed6c1c64e411c569f807f673d3bc5f6fe28d7f55f1d5b786be1e693732436de24bab072fa89538063b60e1b04638dc5b240009ddb7b1f0bfecd3a4e89e3cf86be25b5f175b78afe19eadacc16f36b6ba73a9f3c3964b692dcb16512b208f713f2963b80006e5cd2934ceb83ca70b427858eab5be8f576bdafdfc8fa1acff00e0a53f0e8db40f71e1bf12dbdc85daf1c305bc91a1f40c66527ebb47d2be67fda47f6bed47e3a69bff0008de9d60da4786e3b9fb448b3b892e6edc6761761c228cfdc19e792c7803de7e3efc328ff691fda19fc1c9f10d608f46d2e6bf5d33fb0b71d2b2b663cb32ee4f3fcdf33ccdd93b36edc735f2cfc31f80327c40f847e3bf1cff006dff006745e19e7ec6f69e67da4ec2d8dfbc6ce807dd6eb55272d8e1cb70f95d351c5b8da4aced76ed7dba2fc8f12bc8779de78c02082391f5aa0bf78f0303d38afb43f6f9b6957c23f06dae1a1ccba1b4cde57273b201c9ee3ffaf5f1b4cbb48217391c1af32b4796763ebf018afaee1d576ad7be9becc819c173d07a814d0df3e31c75c7a53c8c2fbf73dcd468db6456e0fb56173bc99492d904804e052484e71e8719f4a0920ee0c59cf39a790b90b8cb8fc8d30221c2800fff005a8cb0fe1e7d68cf23bfa8f53417c855c1c75c9a006b6e655c60678cfbd34160b950bb8751dcd0c4303c9eb40524a8fe552024ac4306047a6da665864b60fa0f7a7952aa338e698c7db241ebed4c060660cc3193e94dc63e6e08ef9a908dcc50600ee7350ecc138e545664887a7068087152641e7148dc9c2fca0d3b0103a6323072292440a79627d6a47c9193c107031dea3dd92703a8ef5161dc4c05e734ccf3fecd3b861b71f37ad33a31fe54ee214f19a6f38a5618029bf8d494000381df34670723b507b534839a401df9a4c7bf146ea4cfa77ed52019e7b7e34991c51f53483aff0085055c08c1e7ad251f4a2905c00e0d1d0e4d263e5a4a0903f9d1476a46e950ca42d3294fff005e86a43128a28a0028a28a0046a4fd695a90f1400d1cf5a5a40296800a28a503340094fa6ed34ea0028a28a041451450317f0a75329f41022f4a3ad0bd28fe2a760169ca371a39a07154014e51d7b714da72923229d8055c1ebd29fc70318a6afebeb475cd003a93b74cd0bd285e94c051d79f5a70fba7d7a0a67f153ff1fd28218a0819c0a7638e98f6a6818e9cd3fa3504880f1d3934a38ef4bc0a3a7e340099f5a5273f5f5a0f3f85038fad00387519fca9771c7b5357b53883d3dead00e51b8e48a7a92171d7148170314a0f1c8aa207fcbc9279a4c8c014d23247a526cc2ff8d30254700738c52b61c822a1f9973c714fdbb5776707d281589d5fa12720f18a9a36ee49ebd077aad9dbb4e3a9e95610ee3923e627b55225805c9eebf4af61f82bf0e7e24f8ab4fd62f7e1f59adcc525ac9a56a0de7daab795327ce85666040603ef01d8e0f06bc795b19e096afa7bf613f8809e17f8a5268971379565e20b5fb3e1b1b44f1e5e327f0f3147bb8aeac3454a693ea78d9b56ab43073ab4a29ca3ad9ede670571f1c7e24e83aad8d9c9ab18351d16e762a7d86dcc82e12136f990f97999c464c60b9638e86aff00c437f8b1f09f43b2d03c54b2693a75edb4715b42cb6b2878ade6f39143a6e20a4926ee4e4ee00e4715ef5e20f80ab7dfb685b5e240aba0dc22f88a40a0edde842b2e7a12670ac47f75ebd07f6c4f0041f10be0cdeeab6bfe93a968139bb88c64366353b2e109ec00f98f7cc4057a3ec27c9377feba9f19fdb5848e230d4a34e3cb349c9db67d3ee773e6af0a2fc57f8c9f087c4761a268cdaa5a6b1aeb5eeadaa3dedb40b348a91b7962272817e6d8e59783851c60e7befd967c71f1374ef84b7963e19f0241e27d36d6ea54b6be6d561b4104a40764647399065c1e0af5233e9daf8d02fecebfb1f5be97fea759beb35b320f0c2e6e4179b9f5453260ff00b02a7fd82c3b7c13bd190546b5393edfba86b5845aa918b93bd8e1c663156c0d6adec62e9aa89477d7cf7fbac7c95f0724f1ceadf10a6d5fc23a41d73567321bb824841b59239b2ae9364aaaa364f561ec78af42f1c5efc55f85367e11bbbcf0269fe16d23c377ad7b66fa7f997106f90e192693cf9490dc8c160c43601e98f58fd85fc51a33fc39d7741b36b6b7f14477525d98ee5f699d4a288db8e4a02bb4e33b739fe219adf19bf680f883e0ef00ea9a178bbc116b69aa6a01ed2db55b41e7698f0b860c76b16f9f038463ce7240c6d6ce308c6973731dd5b1b5ab662f0f1a116934b5766d59eaba34aefa33e76d73f692f1bf89b4f86c2e2e2dd3cad71b5eb6961889922b82c595177120c6accc55483c9e4918af65d0edfe36de5bddeafa57c2ed174d9353d42df53ba925dd6b2dccf0c82556649ae41505b390140f99b18249aa7fb09fc33b0f106b9ac78b35385276d25a382c51d43049d812d263fbcaa1403fed93d40af75f891e32f8cf1f8826b4f06fc3bd3ae747864db1de6a77f097b823fe5a2a2ce9b01e700e4e304ed3c0ba54dca3cf36f5ec6199e3a952c4bc0e1294172eadc9a4ba3eebcbe67c7dae78bbc5ff000de6b9d0fc63e0dd3ee219f517d66dacf58b794c50dc37de6859255df19e0142ce876f2339cf8f6b1746fafa5b968e387ce91a431c0811132738551c051d00ed5fa67ae782ef7e387c22bcd23c67e1d5f0e6b8c1cc5134f15cac370a3f77344f1b1c29ce083838dca720e4fe635f4645d10fd5460ee1c822b931349c12ecfe47d1f0fe614f1caa2e5519c74959dd7c9ec3171b873f4e69e0640c8c7e348a837027b0fca9c71d3b579e7d70ee548c75ef9a76e25703a2f6a6843b467a1ef5260ab65403cf1ec6a8040777cffc5edde8036f04f3eb4302c0f719fa5213b8820707b54948734618f24e0738a4e576aa7e549f7780339a739d854f39cf4a450f2c176e4f3dc54c8a1f6a7f113d4f6a85130c09c313c9cf6a955448d84fbdd579e94ec31d34671b81caa1c727bd2c64a942792ddc0a66e0c36ae46382c4fdea7f98415cf3838c76aa10e6dce081f90e29e3e6032769efe94d0e4e79008ed4f0d93f781f514d021514ed38c804f4f5ab070880f2c4f047a536351e58527041c8a40c725c907b56831b85da581da7d09eb4c55f972bf360fd2a451e632a82304f5348570bcb0f6005260472c653d0e79cd466504f2c49cf381560ed65cb6491c13fcaa12809600127d68b1571655f957fbbfecf6fad579307920e01e2ac7488f3903b7ad44b266104a9183e952c2e5db327c96dbc1f61d6bb9b1b1f1f6a5e15b1bdb7b5f105c786b49324d69771c570f6764776e9191c0d919dc3248239193cd70d62c0c6c0704b7435f747c1ed1ef7c41fb10ebf636169717b772417c915bdac65de56de480a0724fb0aeda31e65a33e7f36c67d4a109f2a77924efd2fd4f8f74e87c41e2ff110974ffed4d6fc4524867f3605927ba6907cc5f232e586339ea319aea751f15fc4a9b5493c3babeb7e2dfed8b955b39347bcbabaf3671201b626858ee60c1c6148e777039af4cfd91fe1a78c3c37f1b349bed6bc27ae699a7c76f72af757ba74d1420981c2e59940192401ef49f156395bf6e8b39650571e20d1971dfee5b574462d4798e396614678b961e30525187327e8f6380baf08fc68bad76df5c9f48f1e4fadc2be5417ed697ad751ae08c2ca46e030cc300ff11f5ae76eec7c7fa1eb579a0cd6be25b1d5b5e01ee74b74b88e7d4012d82f11c34b93bce483fc5ef5f717c7cf8c7f147e1ef8d34fb3f02f83878874d7b0499ee7fb2eeaeb6cc6491593744e1461550e0f3f367a115e17e1df889e34f881fb5b781b54f1a787d7c39ae2a0856d5eca5b606102621f64ac5b92ce339c71ed4e51d773830999d6ad4655e54a16e56d24f5d355a1e05e2887c55a1c569e1df103eaf611d9af9b6ba5ea9e746b6e1ce498e27c05dc73c81cd5df03689e3a99ae2ffc1ba7f88a47d8d6f7173a14139650704a3bc5d8e01da4f615eb9fb74ee7f8e22299428fecbb7da40c11cbff00f5ebd4bf610d461d1fe11f8eaf1866e6dae9a54de0b212b002bb80ea38e82a6314e7ca7662333f65954718a0bdeb69eacf9475ed1bc7fe09f0c7f676afa7f88341d027944af677b04f6f6b34b818628c02b3614738cfcbed4fd1756f887e32d35bc3ba3def8a758d262882c9a4d849733c11c7d0030a12a17b74c57dbbf027e2e5e7ed49e07f15d878cbc39670d94423b46b8b58dd2d6e03862502b9621d30adb831c6f5381c13e3bfb01c463f89de2b4495658e1b10373749312f0453e4d559e8ce2fed871a38875a94554a56f34ef6b7ccf1bd07c1bf163c062eaeb47d07c69a08788b4f756769776bba35c925d940f947279e95574cd6be296b563278834fd4bc617567a75bcb6edaa5b4d772450438569233283844c2a330c81c027b57d1df127f682f8e17517883496f87057493f69b637e342be0441f32ef0fe66dc6ce738c77e947c01568ff00639f888032ae535501877ff444a6a09bd1952cc6a468ac456a506db4b4d747dcf943c37ff09578874e9bc3da01d6353b7918dccfa369de6ca8e5768f35a14c824617e6238c0ad3d075af88fa5df1f0968f7fe28b2bcdee8da1d8cb72926769675f214e7ee8248c7419af50fd859b1f19ee0332ab7f64ce071c93be2ae97c1ea5bf6fa9c64002faf882460e7ec52d28c744d1d989cc234ebd6a0e9a6a10e7f567ce36ba878abe196b9750453eb1e15d6117cb9e34796cee1558060ac06d600820e0fa835d67c2bd5b5cf887f15bc21a4eb3ab9d6e0176fe4c1e20126a1688cc096261691776e232406193835abfb5b3bdcfed11e2ec901bfd17e6231c7d921af30f0f788352f06ebd63ace9373f64d4ecdfcdb7b831abec6c633b58153d4f51512bc5d99eb528fd7b071af082539c559db66d77dcf72b1fd98b4dd7aef478ae7c6274ed4bc416f7ba84167168b98205818ee52de7e402012b853d083db39fa7feccba76aba7db6b71f8c2e17c353787eef5d5bb934902e02db4a91c909844e4670e0821ce7a6075ae0acfe34f8ceceff4abe8f5826e34cb79ed2d656b584f971cd9f3570530d9dc796c91d88aea7e15fc6ef16e8ed0f876ded975c9ae34c9fc3fa2d9c9e4c696af75346db8ee42b282ea3e590e0e79206693942faa3ce9d0cda8c39bdaad37db6d76d3d3f12e49fb3b5bb6830f8a63f12b49e077d21f53fed53a6e2e832482236ff66f3705f790b9f336753bb1d6a5e7ecff0061a5784359f155d78a663a15ae9f61a9594906981e7b94ba9248951e3699444c8f1e0e19c60e4138c56a6ad07c75b1bbd7b5abab69161f0c592e95a8c490d9b59db5ab22bf91f665061913632b305460060b6315e59ae7c58f166b763ac59de6ae66b2d5a3b686eadd60896331dbb168238d554089509242c7b472720d44a5134a2b30c447dcaf16aeb6b6d74fb6f6ebf81ec9f1abe15786350f1878935fb5beff008463c2fa369fa619a0d3f488cc925c4f12ed58a159514e546f66665c12400d8c9a1ae7eccba2f86f4fbbd4efbc733ae9908d3de29e1d177c937daf3b708671b42e32727a678ce01e3bc03e24f8a1f137c5dab8d01a1d6b54b9b18c5f5add41666096da0d891ef8a6511314ca01c16e49f53583e24f8e1e36f175bde43aaeb26ee2ba781e64fb2c118260cf95f750636ee3d319ef9a4a70d4ca186cc62e34a15d7bb6bed7b69d2deba9eb9f12be13e87f0e3e01eb96b7132def8834ff0019fd886a51d846ad22fd9b7ac4642fbd63319121eb893e5da47ef2b9ef1a7c50f0f6abfb307c3ff07db5ef99e20d2f50ba9ee6cd60907948f2ceca77950ad90ea7e527deb9df891aa7c4abef09e9b7de2f9cb683e2bbc6d66d9c2db8fb54f1c4b134988c6e4c232aed3b4739c6726bce56d923c3052c4707279155cdafba7761306eb5384abd4e6719735d3d2f6b35b77be87bbfecddf183c3be11d2fc5fe0cf18b5dd9f85fc516c219b51b45dd2da38565ddb4024821bb06c151f2904e37354f88de06f84df02bc43e07f057892e3c67abf89e70d7ba9369f259436d00c0d8239392c40238cfde2491800fce0502bab302f230f94e78af7af837fb1c78c7e2ce8e35db8b887c37a04c0343777885e5b853fc51c43195f762a0e411915717292b233c761705879bc56266e316d3b6966d6de7f71e69f087c7527c31f897e1df1322b15b1bb579d54659a16052551ee519c0fad7d6f1fed89e0c7f8d12d85ddcabfc305d3638ada41632145bd8dfce59bcad9bc0dc4a7ddea8adc0e6b96d57fe09d9abda69b2be95e35b5bcbd070b0dfd835b447fe06b24841ff80d703f0b7f638d77c7be26f13681e20be97c23aae8496ecd13d98b9f3925f330ea44aa0afeef8604839f6a694e3a23c9c657c9333e6c555a9f0ab3d1df75adad7f47e678c7c43f19df7c45f1a6b3e25be6613ea17124ac49ced4270883d9542a8f602bb0f88de3fd0bc41f027e17e81a75f19b59d14de2dfc3e548a210ef94f98a856c8e7e527debd77e207fc13d75dd0f4bc689e2db5d675058cc8ba74f646d0c9e8aafe638dcdce33819c6481c8e57e177ec5f75f10be1fd97892ebc4afa0dc35e4f673696da6192481e272adbc9950e723a638ae79f3abdfa9db2cd328952a75bdada349f44f7b34b4b5f630ff635d76f6c7e33e99a74501bdb2d5e3974fd42065dca6dca962cc0f180501e7b123f8aab7ed61e3ed3fc65f152e74dd0e2169e19f0e20d1ac6046f90f95f2bba81c60b0c023aaa257a46bdfb38ebbfb3b7857c4fe37f0efc4202eeced7cb65fec645695249114aa3bc8fb0f20ee519e3ad791fecf1f00af3e3f788751b51ac8d1e0b2b613bdc9b5fb47ef19c048caef5c1601db39fe0353ef5943a9951c4606b62279c29feee2adb3dfbb4d6faa4779e39f857a6e91e11dfe1df00ff00c247a0c9e1d8f526f1b2eab3458b838f31892fe47c8db93ecdb3cd38ce6bb4b3f80fe178c78cfcaf03b6a9e17d1fc2326a5a678ca3bcbadb7975e4060d959042d862ff0022a8c797f3021abc53e2f7c09baf83bf15a0f08dcea22eadaec4125beaaf6fe5078e43b59cc7b9b1b5c3ae3773b73c66be8eb5ff008269b5d6a52dac7f127fd1415c4e343f9727dbed15a72bbdac6789c4e1e952a75278b694f54ed2d76ecffc9791d37c6cf03f83f58f1ceadad6bbe16b7f116b1ab7c40d2fc37e6dc5f5cc090db49a6dab92161910161f3e09eed9390315e03f1e7c03e0dd27c17e31bed03c310e8979e1ff001a3f87d6e60bdb8b8f3edd226fbe25918072ebbb2a00c71838c9f479ff00e09d6ba6e89ac5ebfc47578b4b59647ff892f54452c4922e091d3b035e51fb4d7ecadff0a1343d0b58b6f11ffc24fa76a933c4f711d87d9844c14347ff002d1f7075de474fb86895dabd89cbb1185954a74a9629c9ed6b49276df7d3a1d2e87e28f0bfc68fd97bc37f0c2e7c55a5f83fc51e1fd464bb4975c90dbd9dd44c656e65e8a71311d09ca74c364725258685fb33fc44f037886c3c71a378daeadae52eafad3430668ed94100849beeb92a5b19da41032b8e6b85f817f08aefe3678f174382ebec36e2196e2e2f0c3e6f93128fbc5372e72c517aff00167b57bbf87bf609b6f186abaed8c3f117c91a45efd8659db45f91dc410ca71fe91dbcedb8f553531726af6d4eac4d6c165f56a51ad5da4fde71b5fe2d374bb9b1ad683e05f12fc7fd2be2837c54f0e8d0efafedf5136b2dcf977d1cf1eddb1b4447c91964525df6ed048238dc747c71e38d0b5af0dfed06b278cb438a5d49e092c2186fa1637aab6d10022c37ce4ed0a76e7907deb94f887fb03dbf823c09ab788ad7e210bf974bb29ef25b79b49f244a2352db15bcf6e4e3038ef5f274e62b8ba476c95db93bbb51293ea8e6c260b0b995aa52aee6a168ed6b59a6b74afb1f5cfc0bf8e315e7c058bc0ba478bac3e1f78e74bb995ad352d5d63fb2ddc2ced215779119539761d377ca98ce4809e22f8c9e26d0fc45e00d13c41f1b347f1958cbad595e6b167a5e9f6ff64b248ee63756176a8a1f1b7247cb8c1c8c75f90033acecd1ff0019255cf522a31349bb0a55483d475a9f6b2b58f53fb0b0fed6755356936f64dddad6ced7f33ee7d27e3c7857c3ff00b7978a3c4173aad99f0e6b167069a9ac5bccb2db231b7b5218ba1202ee84a12385279c0048c35bef0e7eceff00b3cfc4df0dc5e3ff000f78cb5bf13dd2db58dbe83762ea35838532498ff56db0b9c648c85009e4d7c73e63ac4ebcb313d0ff003a9239b677531af3d3bd69ed1f52bfb1e92e56a6ec9453f3e5d99f547edb1e36d07c5de1bf851068dabe99aa9d3741f2af12c2e126304a561f9642a4e0fca78383c1af93dc6371c71c74abd232309132766df3339ea7d2a8cdb446eca58b37451dab96acb99dd9ebe070d1c25054a0ee95f5f56432aef84b75c1cf02abe0336ee78abb1ffab1183924723d2aa3004819c28ac0ec26dd84009f971c7b53032860431030454418772588e9cd05b71c123278153701eae300b74f635196064e0e303a53c101b18040fd2909f94900312739352558877e78185f634aad96c1191ed511258fa0cd3892a4e720fa0a92473bfcc401db19a6c9270a15318ea0f7a5320d800e71cd46ec4e003c77c55301d80a3e7e5476a36ed3c82011c1cf5a74df7f23b0a634464718cf4c9fad48ac372d927181d29acd83c0c1cd05580da58000e71ef43afcd92493ea2810c738ce3d2a33f2a9047e54f3904f7fc38a8db94e3926a004c641eb4d1d6948c0193f852719f514ec038e76b0e0e7a546c40eb4eedeb485739e3a52283ef0e7b5349a08390683eb4980d3d702929c7b7a521e7ad480d239148462958e29a7a8f6a00286e94514009d3a521fce948a0f1d2a404231de8a0f5a2a4a10fe948d4ea46e948623525145001451450023527d697f4148dd6801ab467b500528fd2800f414bfca93a1c51400efc285a3f8a96800a28a28105145140c55a5f4a6d3baf5a0800314bd4d27d296ac029718e6929c7f2a0055eb4a7ef13d2917ad386003c550003806941149cfe540383d2801f452018a5cd0019a729c669bd4d2f4140870fbd8fd2979a6ab734ee0522003734f033d69a40e0d009a621d8246280391ed4038249a339a00728cb0efed4ef6a6a7a1a7638cf515480556c2d281cfae69bba9ea3815648eea3a647ad0403fe346eedde972376314c401720e3a50433119e9ebe94e45e3b8fa538f27e5e2801cea0b019fad491e01009e334991bf91da924209079e2a88143919c1ef5b9e1cd7aefc39ab69dab593f9777633c77303f50ae8c1949f5e40ac1505873dfb55c871e52f5191574ef7d0c6a46328b52d9e87eb15c7c44d265f86abf107621b55d24ea0a323784281cc79f52c02e3d40af05fd897e284fe3987c65e1ed6654b9bd9ae5f5655979f35666c4c029fe10e54e3fe9a9af97ee3c6df1022f8396ba3497b20f005c5cbda4309480ee95196664dd8f37019d5b938e71db15cc7833c79aefc38d7e3d67c397d269ba9a46d12cca89202ac30c0ab82a47d47a1ed5ebbc53e78bec7e71478620b0988a0a69ca4fdd7dacf4f9f73e88fdbd7c7dfdade38d23c2904c648749b7fb45c61bacf2e08523fd940a41ffa686bd6ff0060b6ddf066f833671ad4f851ff005ca1af8d7c61e1bf1c7897c596d77acd85dea9af7882d5357885bc6b34b7103a92b2048b3b46d43f2e06d03902ba0f0dfc4cf8b5f02742874db06d43c35a5dec8d7712dee951e2662aa0b2b4d11246157a1c5671adcb59d491dd88ca554caa9e5d4271e656eba3b6e775f007f661bdf895e0dbcf175a789db41d4e1b8f2b4c6b56dcc9227df690a90c99c8030411f7b04119fa9347f0aeb7a7fc1bd6749f8b1ac59788235b69ccd7508242db84c82cecabb9d482c1b682081c92335f08f87f58f89df056d9758b08b5cf0c59de32e27b8b475b5b86c6578917639c671c1e33eb5dbdc6b5f14be2f788748f0d7c42d6bc45a3693aac4f245b7419584e2343202b6f0221986707201db907b55d3a918c76d7f039731cb7178baded275a3ecd3bad3de56e8acbf53b2fd84fe2669fa0eb1ad784b50b88eda6d55e29ec1a63b55e65cab479fef1054a8efb48ea403ee3e3af04fc70935cb897c29f1234d4d326958a5b6a3a7c28f6e3390819607de074dc70781d6be52d23f66998e8fe0bd5efb55d52ced75f82e67325b6833dcb5ab47f344a563259bcd4cb838185527903352693f1abe3b787e683c3d6b79ae4b7a63fb4c76977a5adcdd3458c871e6c4d215c0ce7a5542af243967d3b332c665b1c662e58bc0ce0dbd1a9ad34d34baf2fe933de7e3047f197e14f82a4f10cbf1634ebb16f813dacda3db425989c2ac27cb6f318fa10bc027b57c21792cb757d2cd21dd2484b31000c93c9e057a178a352f88ff14ec9fc49acaebdaee956fb9bedcf6f235a40338720aaf9683239c63a579dcd8f388ea3dfe95c988a9ed2d6bdbccfa9c9706f074e51a8e2e6f7e5497c9dad71b18c76c1c538a1383c127b0a446f980ed8e29dc924f7f6ae3b1f462ae4123a914f524919c74ed4c5040c91907d29e0150063afe754007e6ce7bd213c800014ac3e600f5f5eb49f2b367a52290f0cdf2e002d9e29428f3c1ea49e7da9b192b28f6f4a5463e729f7a562c591379e833d6a450cc439232e3d318a796e9b80c1e9c75a6120f1ce3b5513700e44c4e41ed9f4a964385563dcf5a8401b88c70dd2a59118140c739ee3ad002ae4e493c8f5a7c5c6ece0fd69ab1e41209c669ca307af00d5a044824cf0578a569379000c13e9516ddbd1b3ee6a68cf43c0229dca0002b1caee183c669ac70d8ec070288d77af0c00f5f5a46e58e48fad0c07aa12aec49dddb8a6a1603af7e49a3cef99589271d8544b264100657b1a604cd828fd3006491558c6cc30a38e9c76ab19386c618819da7a5401c2abeec9c9fba0e28025b0558cc8491f7ba93cf4afbe7f677f17dff823f642d4bc41a7c705c5e69bf6c9e38670591cabf4600838f60457c13639c4846d073db9c702be8ff04fed01e1ef0efecd9ac7c3db8b2d4bfb6ae62b858a78e18cdb9323641663206e07fb26bae8fbba9f2f9fe16a63295284237f7d37e87ac7c03fdae7c65f143e28e99e1ed5346d0edf4fb88e7777b3b799641b2267032d2b0eaa3b1af3ef8b03ccfdba2cb6a858dbc43a3b8e7a0db6dc5798fecfbf10f4bf853f1534cf126b1677777a6db47324b15905697e7899032866507923a9adaf1e7c5ed0b5efda52cbe20d9417d16891ea7a7de98268905c79702c21c6d0e5727cb6c7cd8e4648edd0a7ee1e7472c787c7d4961e9da0e9b5f3b9f46fed3ffb4d7897e0b78f6c344d134fd1eead67d312f0b6a10caeeaed2ca84029228c6231dbb9e6bc4fe1b7c5ed47e307ed3be08d73c43a758c777162d2386ce3758f68595958ee7639cb93d71c0e2bd5bc4dfb61fc14f17ddadd6b7e02bed6ae1104493dfe8d653c81012428679490b924e33dcfad790eaff1c3c016ff00b41f85fc67e1df0e4da0f86f4f8552e2c2d2c6dede4793f7b9758d1f61243a0c9607e5f614e52d534cf3f03839430d2a4f0ae33e592e6efa13fedd532dcfc700ca242eba5dbac8243904e5f1b7db18fd6bd53f61abf1a37c2cf195d88924f22f4ca14be33b6004a9e0e01c75a4d73f6b9f829e2dbcfb4eb1e03bdd5ee11447f68bfd16ca69028ce17734a4e393dfbd707f08bf690f087c3bd0fc7fa63e99a91b4d66f6e2e6c22b4b68408a2752a88e3cc50b818e172076a1594ee8ce74f1788ca9605d16a51b7cf5e84df12bf6e7d7bc5de189f4ad1fc390f8726bd43135f3de1b87589810447f22056ff68e71ce067044dff04f6b52fe3bf1609216731e9f18c2faf99d0d7cacc5a461b9cbe061464fcbe86bda3f65ef8dda3fc14f136bba9eb706a77115fdaac28ba7a23b6f56c8cef750063eb50a779a94ba1eee3b2aa587cb6ad0c1c2ce56d3abd7bb3b7f885fb66f8dee2f7c4be1f3a468634f596e6c83343399563dcd1fdef3b1bb1df18cf6aeb7f6796177fb1bfc45b48089260754f9307764d9a1da3d7a8af913c55a90d5fc45aaea4a65482f6ea5b848df0180772c0363bf35e9ff00b3d7ed117ff04aeaeed2e6c8ea9a1de9df35a870ae920e3cc424119c60107ae07231446a372b488c6652a197a8e129a524e326bbdba1d3fec2b1799f18ef192307cad2262cc7de48875adbf08b0b8fdbe2e4c6e1b1a85f0c93dc59ca0fe441ae9352fdb43c0fe19d2ef9bc07e087b2d5aef26479eceded21693b492792cccf8c93838cfa8ce6be77f837f1461f05fc68b0f1af889aef505596ea7bb6b65469a592686552c01655fbf264f238cfd2af9a31b24717d5b178c962b155293873537149f576367f6b3cd9fed19e2b0c164f30599c83ff004e90d747fb2afc3af08fc437f1ac9e31d365bfb2d234afb6a7913bc72458dc59976b004e0701b22bd5b53fda9fe08ebda94ba86aff000eee355bc9e3024babbd16c6595f002ae59a524e000073d001dabe7bf833f19a0f858be331fd84da92eb964f6118fb5f902056ddf363636efbc38e3a75a4edcf7dee7661e58cad96fd5152709c14629ded7b5af67f23d7fe0dfc15f0b7c4ef0f7897c7b0781ee6f6d3cffb268fe0bb7d61a3425523dd23dd48cadcb313d46006c2b65456a78abf673b1f08ea9f0cfc65a5787eebc1b7d2788ac2db51d02e2fd6fa38374e364a93066241200393fc4385c1cf857c33f8e0be07f0beabe15d6bc3969e2ff096a5209e4d3ae276b778a6c01be395412bc2ae78cfca304739875ef8b5a01f15784efbc3de01b0f0cd9685771ddf9105e4934f75b64572924ec3904af04a9233d48e2a5c972ad09960f3175e6949b874d6ead6db597fedb7eb73e8cf8ade13b7bf97f68abfb892e84d69fd9e52282fa78a063f668ce64891c2498e08dead8af36f881e0ef853f01ae342f0a789fc35a9789756bab68ee752d620d41edcdb8662a7c98c7caf828d80c0718f9893c739af7ed3cdad5bfc4a807875a21e333063fe261bbec4228c27fcf21e66719fe1c74e68bcfda734ad7b4bd1e5f1afc3eb1f17789f478961b3d62e2fa48032a9caf9b12ae25c1c9209c124f0326b2949330a180cc694629a938e9751924f48c52ebb277ba3e82f85bf0ebc31f0dff6a6d4f4fd0b4f3a5e9cfe136b958fce9262aed73182c4bb31e8bd335e5df0efc07f0a3f682b3f13786bc33e18bff0bf88f4db17bcd3752b9d49e7178a842e6653f2479674caa83c31c1e31591a6fed8ab63f18ae3c7cbe121fe91a37f64ff00671d4b38fdeac9e6799e57fb38dbb7df358d3fed33a468be1cd7acbc1df0ef4ff09eb3aec661bfd5a2be79ced6cef10c654088727014e071c12010d4a36d49a797e6317ced3e7718ae6e6d2eb7e6d75fc4f52bdf86bff0b7fc2dfb37f86eeee24b1b192c75192e6e6d802fe4c6b0311183c6e380b920e09ce0e315de37ec7be19f156a1ae787e3f86f7fe0ab38e22da678b7fe1204bb69dd70034b6c656daadd718c91fdc3d3e5d5fda6f55b187e18b69562b61a9781e39e18279a6f3a2ba49422b2b47b57682a854e189f9b82a466ba2d77f682f026a963addc5a7c19d1ed35fd62278e6d42e35296e22476fbd2c70ed511b6790519483dcf34e328d8d7ea19a45c634db4b5b5ba3736eef55d2ddfd0e1be107c3e8fc55f1afc35e17d5625f29f53115e404fde48d8991323d4230c8f5afa2bf6eaf8cdace81e20b2f017872fa4d2b4a8ec92e2f5ac58c4f2b3960b11230422aa8381c1ddcf415f2cfc3ef1f37c3af883a07896346924d32f639d923600ba06fde203db72965cfbd7db7fb417c0cd3bf6a4b1d0bc79f0f756b49f5092d16265958ac371082c465802525566652ac3d8ed2bcb8bf75a8bd4eaccdc28e6542b6335a6a2d7929773e23f027c42f127c37d6e3d57c39aacfa75c21566589ff75363f8648cfcae3d981afb4bf62af895af7c58f17fc46d77c41786eafe44b158d14623b78f75c91146bfc2a33d3a9ea49249af19f047ec1df11f5fd5f66bd696be18d36365f36e26ba8ae246539c88d226604f03ef151cf535ee1fb31fc3db4f84bf143e27f8734ad6a2d62c235d3dd6e91c3490e4dc7ee26c70241c838e08c1f973b45d3e6525cc7071062b2eaf85aaa834ea24b55db99697ff00824bf037f67cd7be05f8e3c59e28f13f8934d5d3ae6da664b78257f2557cc1279f233aa0528aa4743c39e4639a9e0ef0d9f8e9f04fc5d30be6b0b3f146b5a94d6972b1993cb8e4ba670c63cafbf191547c3bae43fb537c07f137847527697c61a24cd145219c9cec626de66cf50c018d8f3d19ba9155be13f85f51d47f62ff0011f862d6c247f103cb7b686c242b14825f37050ef202e0839c91d2a67cad791f2d595471954c45450aaaa416c92492767e678d7c50fd8b1be1af8135af128f187f691d3515c5bff66f9624cbaafdff0039b1f7bd0f4af5ef843e57eccbfb20ea5e30bb0abe25d693edd6f1c8aa773c9fbbb303fbca14f9a47a3b57ceda0fec87f139f5cd320d4bc38f65a7dcddc504d709796d298d1dc2b3ed591890a093c03d2bea3f8d3f1d3e197c31d4b4ef03f88b4193c430585ac2c96cb630ddc106032a71338c3851e9d1873cd72424a9a7247bb8ead56bc2960a351626f2e6972a8ecada68fb9cd7ed81a4db7c5af82be0df8a1a544be6431c4f721640e238a7550cac4778e6013d8b353ffe09ef3b58f857c7976a4acbf69b7dce390dfbb9303d8735dc7c36f8cdf0dbe3e784fc49f0fb40d2ee3c3f64fa73c62d1ac61b655593706923589d97e5760c7a72c0f3ce394fd81f459ec7c3ff00127c3d70acbaa43a94569716d9fba556456ebe841adf99395e271cab4e195d7c1548b8b849349ff2b7a20fd872e2793f661f8956e226783ed17c43e300b1b28b2b9fc07e7577c3f731fed29fb12dfe8924ab37883c316db04623df2092d46e84a92739787099ee59ea2fd8a9a35fd947e20dbee915d6f75128d1705c8b0878fad79a7fc13f7e255b7867e276afa0ea379f66d3f5cb4125bc4c73e65dc272a98ed946949f5da07a525a249f53bab5172962b114fe2a538c97dda9d67ec4fa0d87c3bf853e36f89faea98ad30d042d8018db42a5e403d77b95503bb478aea7f63cd2a7f8b5fb3e7c43b6d42f960bdf136b9aa5b493b2798637b8b3841936e46eda5f38c8ce319156ff006d2b9d1fe11feceba2f80b43b48ec175abb2b15ba9cfee237f3a423feda3479f5dc6b9efd8efc2d77e2afd91be22e99a7c26eb58bc9755b4b388b840d23e9f028196214649032481ea714f54d25d0cab2962f0b57307a39ce36bf48a7a3391f1e7fc13a5fc0fe08f10f88c7c405bc5d1f4fb8d43ecb268fe534a2242fb4379e76e718ce0fd0d733a1fed2ba268da1fc36f0b5cdad9eade13b7b7b39b5df32de696782e219a62362c8447c6f47628a4b81b4b10368e0bc4bfb1ff00c5df09681a96afabf84ded74bb281ae2e2e7fb42d64c46a3731c2ca49c004e0026ba2f863fb2cdb78efc1fe11d567f12dde93a878a2f6ef4eb1b58f4537300920566265984abb14852321091c9c10ac4636b3d158fa451c3ca82963310aa24f4e54959dbfbbf79d2693f1b742d2b52d19bc4de375f88f7526b5711c97ef6372a965a4cf6f25bceade6c6af861287f2235645f2b839c03afa7fed0ff0eecfc4de13d42ceedf4cff0089cb7f6acdf6694a4365691dc4361c2a65b74770b90a09053903a9f3fd77f65fd3bc3fa3ea9abdf78aeea2b0d2f49d3752be16fa3ac9329be204090a1b802403e7dee4a630b80c5b88f5cfd9461f0edd4eb7de28b996cdb58b7d12ca5d3f447b89649e4b58ee49921597746a0481405df2360909c52774cc25432ba8eeea4afaed75a7a5add53fb99e9fe1bfda0bc2517c31f1ce8dad78a6de6d775ab9bafb3cd67fdab736b26ed3a3850cad721a574dcac989376d6dac1768046478cbf684f0bfc4af1e78f34dd43c430586877b058c7a56a92457f25bba43756d3488613bcc6c562603cb89149525b920d31ff66bf0cf8d3c13a3a785dedf4dd66eb48d1ccf26a51cfc4d71753c324d1bfda76ab3794c1a26898611366d6738f27b7f825a3dddd5ccf65e29d464d2b4eb2bdbcbe9ae3c3ef0dc46b6f224644511976cbb9a45ff00968bb003bc29c02a526ac89a3472e9d49ce339f35faf4d9f6f23b1fda3be287863e2e787b4e9b49d7616934dd5f579574dbab6b88ee2586e6e51a231b08cc7f750b10ce08ce304f15f352ca5616671803803d2be81f88bf05f45f86ff09351bd4f3b57d526b9d2ee2cb53bcb792d248e0b982691a2f27cd6527e45c96e41c818eff3bcc4b27cc3710300f4c563524cfa2ca7d82a0e38693714defe7af916610412e70370fbdd066a09d7f780330e46714e8e6cecc91c0c90453262cc37b00476358b67b231b08c0f6a1a2fde91d4638148ff00746e001f6a48ca80324e47afad400fda42919ebd4d34c7945c8dcbdb07ad48e709d0ee6a898ed5c723d3de8288d46d63cf3e9e94aec5f048e7a7148a32bcf7e697057dea49180633efd69b281b79c8f4152a8249604003b1a8e67f317257bf414c071c9219885fad31b863ce467afad2ec2c179f6a571f360b83b452018c06fce7e94d62491ce294a0c6075ed9a4c00080493e98e281318e3f3a68057de9fcf1d0fb9a673939ebd2a0435864f3c1a4dbed8a7648046282463269dc7618a3e6f5c537a647af5a711dfbd31a90c077c8cd35ba53b9c7a8a6919a900ed8a6d000ff00ebd047e14804639ef9a6e78eb4e39eff008527f0d00250dd28e829491b6801ad494a79e94bcd480da28a2a4b1bf7a86a7537e94804a28a2800a28a2800a6e734bfc54da0039a4ce38a5e681d2800e33eb4a39a4edeb4a3f4a0017ad3a994e5e9400b4514500140e28a28158294e33494abd6810b9c52e6917a52819aa10ee68f6a4db4a3e5a602e39c5488a30c09e94c1d31d0fad2938e375500bf5fc694a81e9c7a5369d9c8f4f4a00021eb9a17a52a8e7269cc78a006d281edf9d2e73f87b5281eb8a04017f1a7018cd3738e9d3de9d9e322aac4317b007ad00e7f0a43f9521c81c51610f1d2807f0a676c548a30bebf5a900ddc81d29d4c0314e53c55201e179eb4e0dd81e2999c0e9c9ef5229e7f4a0962eddc4d27714e1ef9c50ebcfa55887a9c8e3f3a76ec8fad314600cf1ed4e5e84629889158e49e87a034bc13ce39ef51f5cd28c8fafb53b8837609c1afa37f6716d5352f03ebba4f86ae2fb40f1249a85a4edaed8e9d71741ed54306b666863768fe62aff3615f69562057cde3818fc6bd37e19fc15d7be2859db4da1cd64ed36a29a73c32bb87859a27944ae021023c4720dc093952315ad276679798c69ca835567cab477f4d7a9f4678cfe33784749f1dea105ceaf11bf8b59d50c57b0dbb4eb61249690c50dd0c290fb248d86149618271d33c94ff00197458f4fd2ada7f1b7f6a78963d06eec13c55f67b9ff43b87b80eadb9a212f31029e62a971d71c9af349bf67bf1169f199757bdd3743861b37bfbd92fa493fd0a213b409e6aa46cc5a4753b020627be29bac7c01d5b43d3f5abfb8d6f463a769b67657bf698e49d92e12e83f9222c459258a639000dc0e7192379546dbba3e7a960f2f84609556edf8f4ede7b753dbfc0fe39d3fc61fb497802e74dd77fb7e4d3bc30d6777a8c76f2465ee1219cc876caaa5bef039239cfae6b1f53f8e9e14d03c2f616571e29d53e294f2ebb6baac9fda768d11b186260cd129949cb9195c29d9c9fba3ef72167fb3bf8a3c1dac34961e3ad134cd4ed6fa2d226b8b3bbbb8a482e2751b232cb083870d8257206486230d8f28b5f08cb67e3e8fc33aa068a68f521a7dd885812ac25f2df6b608eb9c1e69f3b8e8854f0384af3e78d46e314b45a6d77dbcd5ad63e8df1e7c6af0acde1cf1b795e3cd5bc6bff0009305169a25dd8cb1c5a3fef379706460a4a0e17cbc64a8ce7ef0ece6fda0be1faf8cbc11a94fe3bd475836371753dccd3584f145124966f12f9b1ed20cbbf60061509f339da092cde09e2bfd9cf55b5f197f66785eeadb5cb49f5cb8d1e045958cd04918dfb272d1a2ee11fcccc995f95bb8c53352fd987c5fa6ea1630caf68967749712b5fdc2dc5b436c900dd2b48b34492000720843b87ddcd68aa3bdec62f0796ca3152acd5d3b6cb46addbb2d3bd8f55f00fed01e1ad2f49f85d69a9789aea34d274ed4e2d4e3923b8916295814b5e0290e421655233b4123201ae562f8efa3dbfc0a580e5be22c366fe1c8ee0a313fd9acc1f706c051b5731819dc0f3d0d7270fecebaa4da6c5a9c7e26f0fc9a33e9b2eaa352492e7ca10c52ac4f91e46fdfb9beeedcf0475e2ba4d7ff65b9ef3578e2f0a6a2351d3e2d22cafef6ea68ae6631c93a9da12386dcc8cac433285424283bca9a7cd2921fb0cb633bb9bdefe5a37a3f572b5bd0f58d23f698f05c1e1fd0f53b5d7bfb16fb4ed1d6d3fe11d9b4fbe9d1a548d946d115c476eca4e31bd3381cb29c6df8ab54b8175a8cf32c4900958b88a30422649e141c9c0e839ed5ec71fecdfaf699ad5e5bf89aff4df0f58d9ea10e986eaee770b7134aa1d521d91b1e6360db9c2aae7e6230c0707f183c2b6be06f897af6856324f2da69f74f6f135c95691947f78800679ec054d59394753d4cb29e170f5651c3cdcaeafdf4f5b79f5d4e414e0edcf6a7a9e47a53766d6cf0491da9e17246ee3d41ae389f464848755c0208ef4a484eff31a7295da323006493fe148bd8e38f7ab108d93c738c77a00e33ffeaa70f9b001e734aa9ce0f507a0a0b12324c8718e06334f44225620e40fd6900db21e3bf4a915f0cc42e3dea82e28624283920741e94c6c87ce40069de61520e067b7bd34317663c67f950086be7ccea18803a76a9d816c65b38e98a81e4df29703031daa6f3061476ec692192a3a31200c72320f4cd3a62a64ca801b350a1f98b0fe54f760c03640fa55a2351fc61b0dd3b9eb4316c0e39278f4a89496cf6f5a443b776e3db834cb2d0f2c85ebbb1c8c714c918328dbc13de981b9c938e318142e32085181da8182a8c1cb61ba67d682bfbb5e807dda55fbd90739f4a72ae3af41c9e6921dc6bb6573c823d293ccc464003afe26959f86c700f3cf7a81fb0c9ea324fad31a3b1f84fe0e4f1f78f743f0e4b77f648b51bc581e655c9453d703bb63803d715ee5a3fc19f8737da5de6a5791f8af4ab6b5f132f87a7373796e4aa312be767c850a43152c9ced008c9c8af9bb4f12592a4b1bbc3386de9244f86520f0411d0f15bdacfc42f15f89accd96afe27d6355b4cab182f6fe59a324743b5988c8c9fceb78bb23c6c661b115ea274aa72aff00827d21ad7ec9ba1782fc0f7fad6b5e279a79345b1b8fed7b7b4951317ade59b285331b6d575917716c9ce3180788b51fd9bfc236fe28f1af859ffe1259352f0c6849a849a9acd0ad9dd4c63560aa9e4928a4b71f3b13b5c67e5c9f9d2e7c59e22d5e3d452f75ad46ed7509229ae967bc91fed0d18c219013f3951c02d9c76ad583e2878c96c574a87c57ad45a6f926dd2c86a33087cbc63cb081b00606318c62b7524d6c79bf51cc1475af77f97ddf33d935cf801e04d175af1f9bad4353b2d33c28d6b6cd1dc5e8f3269a6c1f35da1b390c51007681e5bee6192ca38a83e14fc34f0d59fed6fe1ff09daa7fc247a148b396b7d7b4f688ee3672b849629a34c95201076007e5200af183e3ff0015586bf73ad5bf88b56b7d5ee90473df457f28b895781879036e61f28e09ec3d2bd2bf652d46e354fda4fc33777b79737d7923ddc92dd5c3991e43f649b24b12493ef4d5ae9582b61f1587c3559d4aadfb8fefb7fc06fe67bc7c4bf877e19f18f80be258b8f8669e019fc2a6e3fb3b568edd204d40c5bcaba6d8e3dcafb00c10cbfbc18627a43f05fc2366dfb35f85358d37e15e83e3dd7ae26b94b94bb1696f2f962e2702469a643bb1b5176f5c118e0533e37f8aafbe3a7c25f1b697a5dddd45ab784b5c9c5fe9d11c2dedb472c82362a3ae117701fde85b8ceda4f87be11f1878ebf64bf02d878235d1e1cd520beb99e5ba6bb9ad77c3e7dd294df12963966438c63e5f502b44e37d0f8fe6a8b06a3527cbfbc5a36ecbddeaef7b3df71bf0e7c1de1df11fc6af1743e26f00e8fe1af135b69105c691e1012db4b6d704231720aa888b3623ea0ed0cc4838c8f17f8e537842f3c65a02693e109fc21e248e645d6f4896254b685b780b1840a03647cdb94052aca704920757e1ef815a9eb5f1335cd1bc53f125a0f89769690cfa4ceb732cbe69c6e5fdfc9873b471b54646e0c32148ae93f696d360d37c3ff0d6cbc4f77a7ea3f13a1bd8a1ba9f4f38325b6e6e5c100e3779782c0024c854004809ea8f4e9d4852c643926e4dc6d65cd6f877d778bfbee7aa6bdf0fbc2faafc427f06cbf07ac9743b8b23249e25b5b1482385c83fba0e912ed6e982afbb91c6324792fecc1e07d157c23f111bfe110d2bc77a9693aab5be9f16a11405ae028c00b2c8ac101c673d2b37f6b6f8e5e3ff00047c4abff0c699af5d69ba44d6913b456f146b26581dc44bb778e98e1a8fd926c356f117c17f883a4787f51fec8d6eeae516daf4caf0f94db073bd0165e87a0a5ccb9ce0586c4d1cb1e2273b2972f593ebab7db4dec55f89bf0bf57f891f123c13e1a9fe1ae9ff000b45f9ba924934fb8b59c4f0a047918f908b82a0614375320e9cd33c55f137e10fc22d62e7c1fa4fc30b3f138d3e436d7ba96a1e5b48655387dad246e5b07703f71723818c1aab71278dbf673f8bbe09d77e22f895fc516337da63045fcf76d6f132ac7230f3541046f46c2fded98addf1d7ec88ff0012bc5175e23f01f8c743d5748d66792f0b4d2be62676dccaa63570df316e1b695fba7a1353bdedb9e8465453a50c5547ec79747172b395ddeeef7bfab38abdf895f083c3de3ed275df0cf821b57b3bcb0920d4345d5c20b582669176b461d65f9c056cedf970cb820ee15e9dfb4a5ff813c2be2ef0e7822c3c09a059dc6a22c6f5f59b6b68623129ba2ad1796b16482b1904ee190dd38e7e7ff8cdf0d341f867abe8fa5689e2883c47a8796bfda421518b79b7f182091823f872586dc9fbc00f52fdb11c3fed0fe0b79634465b1b10c4703fe3ea6e69dda4ce89d1a33af4254a5271719bd5c95edb69ff000353d9fe347846cfc3706a90f877e07f8675cd1ffb32491f5a8a4b1b36b67dafb888da3de4a001b20f39e3915f37fc66f0ce8b65fb39fc2bd5ac34bb4b2d46e8482eaf2ded91259f0a7efb8196e9dcd755fb6bf8cbc43a2fc4c8f49d37c43a958e9b2e91179d676b792c70c859e50c5915829c8c03c722b5f41f01db7ed29fb3d783342f0f6b7a6597893c3b2325dd8de48c988f2cbb8850cdc82841c1072464114e5ab691c783f6d84a187c55697bae5adb9b6b3deedfe873de3af08e810bfecdd0c5a0d8db47aac76475078eda2437bbbec9bbcdc2fef33b9fef67ef1f535e73fb5f787748f0efc74d734cd234d874ab18a3b668edad6248a35cc119242a80064927eb5ea3f1df53d22c7e297c15f07e99ab7f6b4fe16fb1595d5c5b901438920400609dad88b2464e370149fb5dfc03f11ea1e28f117c4986f34ffec58e2b72f6f24b21b9f9638e23f2f97b7ef7fb5d3f2ae693b5d1e8e5d8af6388a12af269494ed7f39e9f86c7ce3e1bf87be27f165b493689e1bd5b57b685c46f3d8594b3aa31190a4a2900e39c547a4fc3cf14788a6bd8f4af0f6aba83d9cbe4dcada58cb2b42f9236b8553b4e41e0fa1af56f86fe27d16dbf67df14691acebb75a59b8d76d2748b4a3149772045c92227910b282a3e6cfcac14f38c56f9fda4bc3be24f11dadfeaf69ab68b0e9fe284d7ade3d2628e6374ab1c71849b7488164fdd03bc6ee1d863b9cf4b1f415330c5fb49c69d3d22ecb7ecb6ef7f2d8f3bf057eccfe3ef1deb2ba747a06a1a5e5666379aa58dc436c8620db90b88ce1b7232018fbdc570d6fe17d6f56d40e99a4e997da8dfa86dd67676cf2cca14e18955048c1e0f1c57d2537ed31e1cb8f1df85f5c92d75996df4c4d6c4e8f1c459cde4b2b45b57ccc702450d923a719c0af29f877f10342d17c0fe34f0aeb82fed6db5f369226a5a4c4934d1496f21708637740c8c18ff0018c1507073c5ca3a68147158f94253ab4fb5979dda7f8599cac9f0a75bb5f87f71e30bb45b3d36df503a63413c5289cca002c71b3685049525987cc08e4f15d37c3bd7fe297c2db6b3d53c2fff00090e8b63acce91dac896921b7bf909f9151594a4ac71c00093c8e84d5cf8c3f1a34ff899e1d96d20d3ef2cae8eb6d7ead2ed60f00b486dd0bb039329f2b73718f9b826bb8f047ed19e19f0f47f0f2e353d2aeb5bd73c3edf669f565b08acae23b236cf0f908eb2bf9cd1970c8ec23e230382ecd59d36ee4d4a98ba9874eb51e6bdfdd6beef2f98cd7be327ed1fe20d41bc377775e28875636c6ecd959e8bf65bbf209dbe662285640b9e3774cf15c8f84750f8bff01acf58d574ad375df0dd95db44b7f797da2ee8f7293e58669a2214e643e99dc3dabb4d2ff683f0af867c2b71e13b24d7756b287c37ab69b6ba9df4314571f6abd92375051656090a797c90ec4963f28ad9d3ff006aaf0fc36f73f68d3b54d52fdbc3da2d828ba48c4525dd94c657de779c46c48c360b752545745ef6d4f3b96b538b843091e56f556df5fe99c47c25f0ff00c61f0afc45d27fe11eb1d4bc31adf894b59c57faa694c20995bf7ae48789815013792aa70149e95d8f8b758fda23c07a0cbad8d51eeed2faeaf65be7d2f468a416cf04a62964b8ff00460220c50b024f2012707356f56fda83426f16691a95addeb6fa57fc24d1ebd7da61d0f4db6112a007092c5fbc9a6072be63baee5c0604e49cc6fda83c3124b60a74ed5c5ac361e22b570b147b9db509d9e12479982002bbbd08e377143b7c2635a9e271152339e1a32ef757e8fbf9d8a337c4efda4acf5abdb0b19758d624b29512596cbc2ff2ab98d64da44968aea42ba9c328ea08c8209f20bcf0cf8efe2b4f73e2bb9d075bf115cdf5d149753b6d3a47899957900c69b06d55e83a01d2be8ef157ed6be16d63c456d7d6563ad410c7e39b0f1249ba18958dac3650dbc91f129cb968d885ced208cb0e95d37877e227823c55ae68fe38d6f5493c316fa3e91a9da43a6c3a958791709234a63636eb706e1666127cc8223b9d233b805e67912561d1a9530115563858c1b5ba567e9a7767c63e07f19f88be18f883fb53c337ff0061d51e27b73308639731b63236bab2f61dbb576be16fda47e2378535ed7358d37c451d8ea7aa491c97cf1e9f6a7ce745d80ed3115538ebb40c9249c9e6bcddecd5590976ca9ce47535f6add788f4597e1dc6be13f1ff0081f40f00bf86dd2e7c33aa5aa49a81bed84307840f31e42c07ef01209f9b63f530a2d34d1ed6633a549c672a2a6e5a36d745d367f23e65f05fc70f1afc39f06ea7e19f0f6b874ed12fe5926bb816d2090bb3a08dc87742cb94551c11d38e6b94d135abdf09ebba7eb5a45c8b3d4ece759eda70031571c83b58107e8460f4afb93e1efc46f0ad9f8374127c5fe0fd3fe17c7e1e68356f04dd4519d46e6f04643b18f6ef772f83bc1f9b190a73b852f84fe34f0a5afc3ef064763e34f08f87bc11676329f17786f588e36d4752bbd877944652d2ab1c6dd8578e3e7fb8b6d5d1e6ff006972aa8e386df7f3df47eeefa6daefb9f35fc7897e20ebd69e07f1278efc476fadc3aa69ad2e9a2d5550dbc3bb255d163450e4b0c91bb38193c0acef869fb43fc46f84ba0cda4784bc43fd97a64d72f732c26cede6dd232aa962d246c7911a0c671c74eb5d0fed31e26d035af0e7c368b43b9b59a3b6d2245fb1c170b2bd8832e521930490eab807772715edd6f2fc33d6be2268be24975ad29665d91eada93f889ec6e6d50690a9125bf95320915a41b5d812c1894200cd669eb7ea691c5429e0e9c2be1f9a2f99dadb59e8ade7f99e13af7ed6df17bc53a3ea1a36a1e2f6bad36f6d9edae6dce9d68a1e3914ab2e562046413c820fa564da7c75f1969bf0ff0048f07e93abdde8ba4e9ed72de66997535bc975e7b02cb36d7daea08381b463736739af57b5f06fc11d456d2cefeef4ed0d2dadf419a6beb1d5a49a6bb7b8245ec6ead2b2854f9776c50d1f249c7cb55be3bdf786ecfe08787347d153c37a65cc7e20beb8fecdd075dfed3f2e02a16291d8cb230dcaabdfa8ce1492aba296ba9a51ad8494a34a9e1ad77d925b7e3a687110f83fe31ffc22a9f122caf75a5d3bfb35922d52d75a1f6a1650c82271e5acbe708636001f976a8009c0e6aadee85f193c31e1dd47c6abadeb51585e5b59dd6a37765af0799a09976db497091cc64dac3e552ea3a638c62bdfbc03f103c311fecebe15d1eeb58d1edcb786f5ed3f55bafed089751b2f36e03c51456c5f3209b67236670148651f7a97c44f12f87b53f81369a0f85fc53a3d8f89a6f0ae84baac8f7f128bc81772b5a02d2058e485c97750371560083da66baa391e3aaa9b5ec55b9ad7b7d9bdb5fbbf2e9a9f32de58fc44d3be1ee9be24b8b8d621f086a6e9616b746f9bc994dbbbba46103e4047123282000c18af39adab9d0fe2e9f8a50e912ea3ad1f19d9da19e3b87d672f0db18bcd2cb7265d8a850e787c738ebc57b878cfc59e06f1678675df85fa6f8bd5ec746d0e05d21eee3b7b6d39af6d72ef2c772673ba49cc8ea728a0f6278278dd43e2968b37ecf835a5d4ade4f1dbe949e0b92d9651e70b5594b990c79dc54c21537e31b8e093d2b09245ac6559abaa2b576dba35a37f2d19e6de38d17e23c7e198751f16eb535c69d7d6f6fa8c506a1e218669ae226c88255b7698cac06f603e4f972fd306bc89dcb2fccd8e338afa23e346a165ae7c3bf074f670786756369e16d3ed26d4975a5fed0b39558ee856d85c8ce370ce616237b7236fcbf3b721930bd4e067d6b1a8ef63dfcbe6ea526e492777a243c120e4f029e4e14ae0d05648d9b705e78e7b5192707ef1159d8f4c639f9491df834623c10b956e98eb9a428c0907f9508de5caa480714801c14c02a41278cd214e4e707ebda92495e493e63802936b019ce41f5a10c157e5c1c52150d9041c0f4a5fbabc91ed9a8e438e9c914f610a32074c9a8e456cf423eb4f552c339e686c48c8a7240eb52c0619446471c74cd21033c9e290a92c323206694ae546ec9f6a90020ae738cfa5341e4704afa538fce0e0e08fd69aa4f1838f4a04c46c153d69a4f1ef4e90ec1ee7d2984719efd8548584c76c1348d8c6318f6a79eb904e3d299ce01c7e26818c27e5527bd34827934e600003a63a5047bfe35203783f4a61c93526de09feb484f4a4046076346334e3c03c75f5a4704e00e4e28018c09a55183ce6918e483d68f4ea31de82ac21079a3b73dbd286eb4bb680b0da39a3f9fa527ad4b0b09820e28a28a9185349a1a8fbb4804a28a2800a28a2800a6e4d2fe349fc3400ddb46ea3ef52f340052af5a41ef4a063d28005eb4abd29339a5f5a005a28a2800a28a28005f7a7d3297eefd2810ea00c9c52018a72d505852281ed46781c63de9474e3f9d3245fe1c7bf4a701f2e0f0450b8eb9e869bbb24915403b8a5031dff000348a381fd28c71efea2801dbb6d05b3cd331cf06977738a00781923afe7410738efd29320e7d69d8e718a0428e067b529fba29030fc3d2973f5c55921fad38631da9a39c538f14121f74e29c1b8a419cf340196a80176e45394534924629c33b734c04f73daa651d0d40e095a962cedebd05313251d460605283c7a0a6027bd05b1c7ad5124a067ae734bba981b685e3f1a5cf5e78aa1003b47734bb80a6fbe38347f15016149c9fa5775f0ff00e286bbf0e74ed6ed7469d618f59b436972581ca2e78742082ae01600f3c39e33823835e39c66bd3be16fc2eb1f881a2eb37f79e235d1469aaa56de2b196f26972ac777971fcca836f2f82077c77a8bb1c58c746145fd615e3d74bfe1ea686a7fb4078835ff0014eb7adead67a76a50eb7691d95fe973a482da58e3dbb080b207560c81f2ae08627b1c541e24f8f1ac789349d674c7d374bb2b2d4a0b1b6686d63940823b32c6111ee90e3ef10739e00c62bafd0ff66fd0aff45f09cd7ff10adf4bd63c4f6de6e9da5c9a63c85a42c542348af8504e00620649200e2adf83ff00641d4b5dd0e0bbd575b6d26eef2e67b6b4b7b7d2e7bd42d148d1b19a58fe5894ba9c33718e7dab6b9e03c4e554d6ba5ac968fa7656e96dd7638b93f682f10dd6a9a95f4969a6996fb58b6d6dc79726d59e0fb8abf3fdc3dc1c9f422b1af3e2e789af35ebfd44dfcd05b5f6a87589f4b8e6916c5ee0c824c98b7608caaf24e70a39e2bb4d2ff677b3d2f4c8ee3c6be36b1f074d777b7161630496cf75e7c904a62919994811a07046f3c7738ad6d0fe08cbe31f03f86ec6df51d0a38a4d575049b5686c8f99e440b9795a7dc0cb1e0651362fde193cf0ae6af1197d2f7a2b4daf676d17a6bb1c943fb42f8a6daf1af2d16c6d2e5f5f9fc42668a2627ce96331bc786623ca2a586082793f3552b3f8c171a5788ad354d27c39a1e9090c33dbcb616f04a60bb8a6cf98936f919dc10480370da30171815eb1f0cfe02f862dfc4be0ff0010d978a6cfc69a05deb4fa63db4da53448585b3b9de9293ce401b76e3055b3dab86fd9e756b2f0ff00c5ebb9eeafa0d3215b2bf8a399eed2cf0e62608ab2bfca8c4e0027a1c1ed5717ad8cfdbe1651a8e8c2ee31bb5aabefa6debd0a5a87c7cd5ef7433a35ae87a3697a58d2e5d2a3b6b48a7c470c92acacc0bcac4bee5cee627a9c8279a24f8f9ad5e25c417fa5e95aa699716167a75c69d3c5308645b518824ca4aae1c64f2ac01dc78c57d25a1fc43f08e9fabf8d674f106910de6a57d15c4566b7b125acb39b070d05c38256584bf0f22fca5d94e4579a595f78161f8349f0e64d7ed5757bed39f5b7ba558beca97fc49144d71e67c8e228fc92bb71993ef06f96aeefa33829e2294f4fab5b55dfaeadedd3f13ccb47f8e5a8e93757ab2e85a1dfe9971a8a6a91e973daba5a5adc20c2bc491c8840db852ac4ab01c83cd721f103c5d79e3ef156a7e23d41208ef350b86b8952d94ac6ac7a85049207d49af76b9f1ff87ffe106d2fc4e9a95b378c35f8ac744d4edcc8a25b78ada5fdecefce409522b619231f7bf0e77f6aef102f893c733cf6da9cdaae9c679dad643e228352842129fea618c66d94e3eeb125b031f74d4bd627a784aa9e2572d1e5dd5fd2d7dffa763c355b183c71daac632a38ca9e84d551965e2ac89730a8cfdd3d07a56299f476147ca8a5b9c923e94bbb19e07b9f4a6311b07b1ce3da9e01f980e491d2a80500672cd8e7a54a065776d3b7763de88140594b2ee078e7b1a7290ad87c91d401eb5485d6c05b130206703bf7a8f38763fc47b52b8612edc81c0382298c0073cf41cd3290bc9273c76cf6a71391b47ca29a0ee18f41daa5455550cdf747eb40c870cadf74e3a71521dad129c1ce7934af26583123e8291c9553c71e9400e5607d71480606d39c0e9ef4d4ce33dfb0a5663bb96c9ed8aa0b0abb9473ca9a0a9da38c0149cb0183c7a1a4770abec476a63248b0546ec6493c8356010bd89355d30bb5768c01daa651c1ed8a402a003a7af414185fe6380b839eb4e1b7a9ee3b714a080b82783f9d502219828501ba939069b33ee408f8007a77a732fcc54e33ef4c401e555eb93cfd29148f58fd9fbe1d68ff0011fc632695ae49a80b3b6d32e2f847a5ed13ccf1a8211772b024f3c639f5aeef41f805e14f10e93a778aa4d4752d13c3f2e8b75aacda65f4e1ee91a09845912c76ec7c93b836f1031017a1ce47967c39f893a97c30f103eb1a4c503debdacb661ae15c88d64182cbb594861d8e78f4aa727c42f135d78886b72788f577d6513cb8f526be94dc2a73f2890b6e0393c67b9ae94b43e7f1187c655af274ea72c6cbe7dfefd353d66e7e0df82b4bb1f106bb06a9ad6b9a5d8c7a76cd3ac91adee964b92412d24f6ea5e301728c215126f51f2e0d6ff8cbe017843e1ede6a97970de26d6ec21d7ed742b6b0d31e15be4325ac53bc8c4c4c2462642a91854c918ddcf1e1ba7fc48f14e9bae5e6ad69e26d5edf57b950b717f15f4ab3cca00003c81b730181d4f615e97f0af47f1e78e3c37f10fc5da4f8d75bb1d574ab78279d23bb9c4daa00b212a650e0931c71b10086ea00c75ad63b58e2ad4713874ea54afee68befb25d3bdf5f3d4dad2fe00f82bfe119d2b52d7b5ad5f4d9f599b525b58becd33dcdb25b3b22892de1b6977c80ae64532c5b4138ce09adaf899f0b7c31a97c2eb3b9d26c66b5d4f47f07695ab42ba7a439bc92ea7f2e469b10ac921554ce4b6391855f9b745a97c13f16f867c532fc3fb4f895796da86b3a20d696cd67961b3bfba6664b8b69184a4170a8e77953b829042d62e9be01bdb2f097893c6da1fc56d6254f0e4dfd8905de9f0cc656b54d8429d93930c2497f2fac67cb196427026fa9c3ed5ca4aa7d61bedbdb7f4f97e233f68cf859a1fc34f055bd96950995ad3c433db0bdb958dae654fb25bc9b5e4555c85676c0c607d735f3dc637b10304119c66be9cd47f673975ad3756d9e36f14f88a3d360b3d6a6d3edf413752c8f7f92248e2fb5fcef852646e381d5b15807f65312784f45d661f144b10d4a7b1884779a5f93b7ed373e46d56f34ef953efb4781f2f7a97bb67a381c7e170f4542b55e6937bd9eadfc8f01678d2262e99724053d87353940ea1a3e013f364f7f4af4ed47e0c691e1bb88bfe126f15c9a54777a8dd5958fd9f4b37059209da16b897f7abe5aef53c2ef6ebc574163fb2aea0bac68ba36a3ae4769a86a52eab0b88adbce488d9286054ef5de240463852a3a8278a49df63d29665828abb977e8fa6ff71e11725ce59b9c8e0fa5631b8908c963bba60815eb7f107e15c7e05f04f873575d5ffb506b90f9c163b365817e404ec9833062ac4a32b046057eee0e6bc89507cdbce0e7191d2b2a97d1a3d2c3d6a58a87353d56c2c924858166c37700539259635cacac18729c0eb4aa9c647cc4f1bbd69c55999be40060739acf54ee74349ee86bdc4fe5bb96cf4cf0289649b63125c8c641c8c0a79522d988c0e40a568cb21e72a07033c51a8d593db61bfda1222e7ccc06ec178a74b752303b4f6ec05568d098d73f4a9363ed2071ce29733b5ee5595ac44d3b6e3963f95247713602ab1099cf229ebcb31c7ce4703de9143346df2fbf3dcd4a6d8f9624eb70ebf2b12003e9c53e313327cadb771e38eb48e0ab90002170496fe542cadb8f5f6f63565a279669821c49855e0f03342f99b131dbb1038148fd06efbcc31d7ad5a48cb2af20e702ab7199b3f9eabb8be4eee028a586ee653b4be431e41039353dcb05561fc3cee03a9aaeb0e421246ce39349efa0c78b99cca1c282198f0d8c0a58e69033c9bfe66ebc0c63d29d223280cdc0f4a81a27f3c61f0cdc9f4028d6e24594967540bbc229e9de991cf7110c3601e80803a54de5ef047001342a9da00c95f5aad47ea33cf9b69f9f181dc0e698b7b2918f3324faa8a98c400dd9000ea4d557b6752e5701ce0820f6f4a77682c877da25dcdb1b2c07181d69a6e6647dc1c038c6e23f3a94425cf3c331ceda6988b6036300e08ea714b501b14f346a06f01b393d39a74b3cad26f0c0b1e067150aa0467f94b00380694465e58c13f281d41e09a80d08ee8b950036e1bb731da3f9d13dc4cb16198ed030c702a79edb7b331fbaa7a13c7e02aadd6e556c9036f1b71d7d2a5de2c3950d4bc915f890e07462326945c79b1ec371b5540201518cd43e41316ef51dba530c2f9036f98c46062b3e662e544b15dce65c9b96e7e5dca054c2f1b6b8dec02f4e074acf6899242adc107bd5c5885bc677ae5460a9ee7ffad426c9b2092fdd892aed93df039aa86e1c2fdfc953c80306a795328589e58e72455678d5917919f4a5ef059760f3a4ddd40c739a4085ee00190c727f0f6a6150b91d7d6a4122898b36785231ef53ea3f424dd951c0383f769081b72ac57f98a1f1e5ae782c474f6a576058ed04939383da9886c8c700e7240c1cd4640c7d79a57f989f4a4550e493e950c63411bba1273d4529cb26d3d73d076a5c64807927d290824a9cd048f49138dd92718e4531c907ef75ef8a454e09fbd83d7da87e0ba138ee3de9b183af1f2f4e955e56c347537cca704673cd319497e7938e952c00b71d78ea0546d9c9e94abd0fa53198039238cf6a9602f2bd38a4ea87192d9a1dc8c1cf5f5a42e09183818a8015930873c5333c63f1e2955f70c139cf6a68ced3f5a602919248ce3b5379e94e03e53dfd2865e983ce68019f5a4c77a7bfdde9de9846071935000d82324530f507a53b1f9d31baff004a00180e4fe79a695240ff003914a7a9e09e7ad263b500308e946da5c80477fad2376a0b1369a3af7a56a6f34007f3a6d38f1d693f954b010f3451824d150037f1a0fdd14a7f4a6d002f1494a4525001451450027dea4271475a302801bc52f348b403400b4bfc3494b9cd00253968539a1680168a28a0028a28a0051cd28ef483b50d400e228a4edcd2834ee2b8b9ce29693a1a5fbd5448a79a4a523bf34638cd500ecfb629168ff3cd2e76f6e680157ad2af4a68e4629cbd2800ef914ab9a285e01f7a00500fe54fce39e94d1d3eb4a38ef4103b9dd4b8fc29bd0fb5280702a891cbd39fc2969abfa7d694371934c0503269c0e08fe54d1cfb5386318a8014f352a00807a1a8c639c707de9ec0484678c551239463a1fa5006580ed463a7a50a796a621fb7381498041ec697760a8a198ed6c74a77013a00286233c52e381ce7de82bdcf1540338c9c57a37c2df8b97df0ad6e24d3b45d0efef6521a3bdd4acfce9ed9b691989f70dbd7dc1af381d78e86bdb3e047ecf32fc6cd075cbab7d723d2ee74e31a470c96c644959d588dce1c141f2f5dadd7a71551d4f3730ab86a38773c5bb434fccec752fda6d7c2fe10f045bf86edb45d5355d3f4d31cd71a86985e6d36e4b1cb42e4280482338dcbc0f7ae1b41fda43c43a2e82ba5df697a17894472cd35b5ceb9a78b99ed5e562f218d8918dce4b720f3edc54aff00b3ecbac7c501e0ef087882cfc4e91db25c5d6ab1a84b6b7cfde04abbeec65470724b630306bb5b8fd8eedefa39ecf41f88ba26b3e23813749a4e151b207cc32b23b039e06e41d79c55f323e7d4f27c3a519bdf5d53babdecde9a2d5ee72bf0bbe2e78eed7437d2b49f0b58f8bac74c91ef615bad21aece9aee4b1923d98f286ec91d81ce2a3d17e2e7c41f0ff86f4ad62d74654d2ac355b8ba1ab7f67b8b79a69c112c0ec31115209f914023b63031e95fb1d69779a2cbf14f4ebe81edaf2df4f16d3c1270c8c0ca181f70462b3ae5bc496ffb17c4d26b56a7429eeb62587d80f9c545d9f97cff003318de0bff00abdddb7629e8ac61531187facce8aa71b394575d79937fd7e672137ed45e213268c2d740f0e6976da5df9d4aded6c6c9e184486268c828b2720ef66f5c9eb8e2bc7a590dcdc3bb001e462e71d012735ee5e07fd9567d63c256be23f1678aec3c15a7de057b6fb6a2b12adf74b169115770e40c938ec2a4f881fb2b4de00f869a878b1fc4d6da8a5bb466286cedcb453c5248888e25dfc677e71b48e3827ad352476d2c765986a9ece9c926df2ecf577dafd77e878cea1e1ad5f4bb1b5d42f349beb3b0bb00dbdd5c40e914e319051c8c371cf04f159c338231c57db7e30f8503e277c0ef8630cbac58786f49b1b2b69af754be7c2448d022820120139ec5947bd78b7c57fd976f3c03e125f14e87e21b4f17f87d48f36eecd0214527687003bab2670090d9048e31921c6f616173ac357f72abe595dab6bd1e9aed73c8b50f09eb7a4e9365aa5fe8d7f67a65e63ecd793db3a433e4646c7236b71cf04d528a353fc5ef9c57d43f1cade497f65af8531471b3cacd0855032c4985b007ae6a9e8dfb19fd8746b1baf1b78f748f045e5e0062b1b908ee49fe16669631b87190bbbaf5ad22b9b62e9e7143d97b4c43e5d5a5d5e8fb2b9f304b16c9d801d7918a5dbb58a9e3e86bd23e387c0ad7be0bea76716a8f05ed95e2192cf50b524c53818c8e790465723dc609af3352723a7d0d6528d9d8f7b0f88a789a6aad295e2fa8f2a481ce3079ab11c4fe486e083dfbd440e53900734f0e45baf6ea0e684743d49e325d09c81eb83d6860cdcfaf4c1a8233f911c5480b16008c7715489eb71c58c8e48c9e314c24ac878e0f6a726e3bcf033c0e69ab9ddf7723d0d32854ddbf047d7b53a4264c018403b01c5260264b1ebdf3d29048598e791f4a062a020af7ebf8d4850ec3ce7de99bfa1ddd07a74a911b271d09e8334098c551c30f9b1d7de90e549a50cb86c118ec2984f2d8e69dca1d1c8464e323de9ae59ce318a132aa01e07b9a746b9607393eb4809223853f5eb53024a83cf03a7ad31d311e548209e69d17dc6dd90c71b7da9adc07a1054f623a8a76fdb8e06714d6da871d7bb1150bc9bd8ed39039aa1a42c8363292dd475aee7e05f812d3e23fc4dd0fc3fa95cc96b617b2b2492c242c800466c292ac013b40e4639ae0049e61db82c7b62bd63c3be04f1b782758f0a6ada2ac9f6abcb48351b7beb2b596e96ce39a47855a651136092ac3015b39017278a23dce3c6d450a3282972c9a69791bb37ece7ad6a9ac18f4ad474b6b19eced353b577b899bfd1aeae7c8801630212c0905be45e39033f2d4f71fb2debd6d73745bc45e1d7b6b78afe5b9bc8e7b8315b9b3645b8461e46e2c378c6d5208079e99a136bdf15fc35e1716f1dbea8be1cd2648d13526d1488c2dbdc978834f2421cc6b3024248700f0541e2b467b9f8b7a7fc3fd635fd427b8d3348b8965b7961bfd38432de7f687cd3345ba1c32b18c64ab0dbc6dc66b74cf05d6c6ab5ab46d7b2febb8cff865df14497e6dd350d1e72b7515b4d730cf279502496df694b89098c1584c61be6233b908c74ce27c3ef8ddaffc2786d2db444b0996d7553a92cf3c52379ee207b7dac372feeca48e7180d939cf6ad6bff895e3cf05e91e2bd37c47a76a961abf8a34fb5b03737d09b40b67102981098c072c9f26fe0805ba9391d07c32f861e1ef177c05f12dfc5e0dbfd5bc5f67f689a2d52e2e6e6dada3811073032a1864743c989c866f9b07a015aa454aa4d516f1d69c1b495bae9abf4be872173fb45788e5d53c39a8cb6ba5dcdce8535fdcc3249138fb43ddc8f249e680e3215a46da176e3be6b17c2bf16f53f06784b54d0ec34dd295f50b5b8b29751681fed6209c289232cae15c610637ab15c9da466be9bd6bf67af009d79bc3d17c3ed534ab39f4637e7c6875198da5a4a232769576298c8e771dd93f742fcc20d1ff00679f8796ff000d74637da35e5e1d47435d46e3c4d6c7519a5b795a3dff002470dbb5b955f4770d8eaa4f2654948e18e6597727bb49eb6dade7d9f7bf9f91e1727ed19adea1a6eab61a8e8da3ea9a7eab63a7e9f736b742e513cbb207c820c732306c9cb7382474038ab737c72f1a683e1df0dd8de7876ce0d2eccda5de8cd7b673aa86b699a449a26693e6cef28c4120ae07079aef749f837e1bb3f08f8553fe15eebde34935bd18ea573e22d36f9a34b294c6cde4a2e44595231fbcc13d839f96af786fe15f87fc53e0ff00076a57fa76a3e23934ff000a4fa92e829a94fbaf2412850b182c4a28cf2b101cb2f07a1cdd52aa62f00b5f65a5fcb749ebbe9b5b53c8f4af8b9e26f166a37225f0ae9be2e6b2b8b9d6a18a5b19e5fecef32432ccca22901f2b7b6e225dea0f5eb4db0fda3bc5b67672acc2cf50d47cdbd9adf57ba8dfed568d74a167f28abaa0ce380c8d8cf181815ef7a3f827c3de0bb78f57d2fc2f75e11bed6bc1dae3dde9d7d752cd342ca61d8adbcf180c71c29c11b86457c5b24bb41fd569c26ba1dd81faa660e56a564bbfab4f67dfef3b8f117c5abff147826cfc2dfd97a5699a7c37497ae74e85e369e7587c912382e51495e4ec550c4924135e7776be55c11c60f63daacf9857ee824f1c83505eb196157c7cc0e4d54ad63e929528505c9056446b1e5370c8c714e4f92463b467df9a8619800c0a9de7807b0a91491b9813bbdbbd65737b0a78465382bd70280a0018e17838a6b170a0f24118240ef4cf3085191cd20b088a448c99c8ce40ec2a438de0004f18ebdeabb7329c13823af434adb98f3d07bf4a9e9628490b7cc0e719ce01a92098c90b67ab100540c18b0db8f414f4531131b2ed2a7a54228b2242e4872054b6fb491f2070e71c9aad183e6820f3efcd4d036d5604ed39c8cd5a63275411b6ec7193b493d29c59ad91f0d9008c67dfa9a6cd298d8e570578e0f1cf7a1a5568d83e0e30011dcd69b0ee4775315fdee55811801b8fa9a64077672031f527802a09e0dee464e17d7a7bd588a3018305de3d7daa756c2e5bf2f3b72dbbbe3b5288c47c80327d680c57b669fc337b8ad8444379cb606581a6ed919721883b718c63f0a99884da0e724e053430901c1e43114f41dcad7339b70c180284e083d7154c5e9926f98603f418e87daae5d2ed8e66e1b241c1155af102dca2100284e00e80f5cd612badc6299ca21248930301ba60f70454a8cd2872aeb9200dbdbf3aab22816f1e400e0e381d47634b6ec636d98cefe808e3eb53ccc57345a33b572d86c741de9af11524853ce39c702aba5d4acae594bede36e39a95af18db82c15198e02e7240aae60b8b2308a1ecac0fdeeb54a62b2396e4eee9bbb1f5a9518c8a4b9cb270147f3a6cc804ac474da4e6a5ddabb114fe64053218766356235db2a38c8e291e030aa1623e6ebea2a36930319ebc86acd1439a784b12c4c8e0f4c546eed231ce49f4348e7ee63038cf1d69a0152bb8ed27be68d881f3b80383b830fcaabc9200370e48a466c12739f6a6eddc01c0c54ea03f6b3b2e579eb81508521f939238e29e729920e4e3ad0338ce31fd696e04870836a9233d28dec338fbcbd01fd692257c264641e01f4a3cb54721b3c9e066980c272cea32714aa4aa3671b8750693cc0cd95f4c5206207a9c61aa06286d8d8fe54ceebc7be69ce3e75083008cfd4d47b8e79ea3ad310f7276e076fd69b237eef9eb4d23393ce3a734923ed3f7b3f4ef52c0707ca93b81c71485c31cf61d8546832dcf427914a76c648feb4801b0aa71cfa5215039dd83d852336ec91ebd695f0bc8219a9010b0382738f514c3cff4a99c823d334c3827d854008833d791d68240240fd68dc31d09a6eec1381edcd301eac3a1c734dc9c671c8a0373c7143753eb400d2dd0e0f1da8f333cf0290e460d2824d400139eddfbd31c60938152632bef4d6e17d0f6a008cf43c9c52163e667bd48572075071de98c723f9d0035c60f1ce79a61c86f434f72415f5c7e74d6e571415710f38c526734a31d3afb536905c0f349ef4bd451cd48c46a4a3348dd2a400f34da7d373cf4a004a0f14bd0d25001451487eb8a005a6d251400991e942d2f349fc3400b4bd2928a0055eb4ea6af5a55a005a28a2800ce28a28e9400668279a297f8a8014734a318a6ad381a080a556c520ebd2956ac0796e3d28ff3c5369ca7af1d6a800feb4bfd293b7a50391400b4e069aab9f5a51c1a007503839a45e94718a007670d4f1f740ed51f0569c0e78e948863c0e6941c9c75a6e7f2a50322aae48bc8cf514a31cd2eedd8078029a4edce2901273499c63bd465c934aad9a0761eadf9fb54aa738e3926a15e33fa548a0608e3e955710fe391f951b8af1d6a3576ce076a5ceeea3f2a62b1306c81e94a4e7f1a8d79a4dc7760f1ed4c44a0703dbd69429c7273fce9a3ae303069f8da71ed54411e70e3d6bebcfd8f5de1f843f159d0b065b5cae3b1fb3cd8c7bd7c86c32cbc74af41f0ec3e37d17c017faf68f79a869fe1792e469f7925adf79292cc533b1e3570cdf2bf5da46188cd5d3696a7919b61beb787f63cea2db5abf5d8f6cfd86fc4ba5e9de26f1368d7725bc3a96a70426cc5cbed594c664dd18383c9de0e3d14f0715ecba469bad697ad4b736bf037c35a5bda23cb16a49aada460951fc0c906f52467190bee457e7e47218dd1918a48a72194e083ea0d745a87c48f166a5a78d3af3c4dac5d586c086d66bf95e2da0602ed2d8c63b629ca37773c4c6644f11899d78495a76ba7cdd15b4b4974ef73eb0f811e306f1e7c4af8bbae7f66c5a435cd844af6b0dd2dcc68e88d1b112a80ae18a16c8e39e09eb5c7dca9ff00861ab42e0b6dd40ed23809fe96d5f3a687e29d67c32b73fd8fab5f6942e504730b2b8787cd5feeb6d2370e4f07d69bff000956b5fd80341fed8be3a286f33fb34dcbfd9f76739f2f3b739e738eb4f96e3792fef79a12b454a0d2eca0adf89f5b7c74f87faafed05e13f06f883c04d1ea9610dbba1d3c4e91188b6dcf2c42860576b29208da319a9bc65e04d57e1cfec69aa685ac5d46fa8c324324b1ac9bd610f751b08d4f7c67271c649c67ad7c95e1ef197887c2be6268bad6a3a3ac87320b1bb921de7df6919a59bc69e20bad267d2a6d7352974db87f365b27ba90c323e436e642704e403923a8069f23325936222a9d25557b3a72e65a6bbded7b9f617c43f85de20f8a1fb3afc3ab4f0fbacd7969616b39b179846b3afd9d5720b10bb9723a9030c79f5cdd0fc3d7bfb3efeccfe2fb3f195cc50deeb62582cf4c4944a524922f2c7209527f88edc8014739af9cbc5579f107c0771a2d8eb5abead60f6f6b1dde9b18d4d9c430b02a8d16c7223e148c0c10074ae5f5ef13eade2ab849f57d52f355b841b566bd9de5703d01624e29abd89a394d6a90507562e9737368b5def64eff00a1f5df8db5bb3f0efc0ff80facdeee7b1b3d4ecae66ea7e48d7738c77e01af66f881707c41369faae89f0afc3ff13ec6e2d97cad4a4bfb5491572485fdf44d95e491b58f24e40eff009c5a8f8b35bd5b4bb2d2efb58bfbcd36cffe3dacee2e5de183031f2213b578e3802b43c3fe3ff14784e178345f116aba3c2c77347637b2c2ac7d485619ea7f3ad15e2f422a70fce4a328cfde4e4fad9f33bf469e9ea7d25fb6278dafd7c37e1ff066a5e0dd2bc36b14897b692e99aaa5d24712c6e8d1089628cc632e392003b085ce091f23ba88988ec7a135ab79aa5ceb17125d5edd4b7777336f92e2e242eeedeacc79354e58c48a41207a1a52d51f4997e156068c6926afd77b5fe6db2a87050e09a721c42413c66a30a4641e0e718a54e0302703359f91ead8904a63cf4e7b5396621b9279f5a8c8241239c53558100f5f7345ca2d2b6589ce73f951bb2a7691c1e2a1593119518feb4b9c20e82ac825508c490771f43de92460a7e56e6a152c1b391c8ee69d96c018e87f4a8dca244249396e3de9eb7010038c91eb508ebc7ffaa94600c918eff5a2e03f236f4ce41fce84c7393c9ef4cc160580e3b519c8c727e9563242cacf803b77a914e3d320735589390492295a5f9be55e3a73d68b8ec5c5cb29dbce0f5cf4a702aa096c938a8a37f9412a5b271c700d0d2ee5248da0760734dec162477211d81c363038ed55db8e8d963532ce4c671d31c83504485dc919c524c7b1bbe10f0aea1e2dd7ec749d2615bad4ef1fcab784ca91076f4dce428fc48afa0bc4df1735df8656fe1af0578cbc16d03f87e1b0bab78e3d5112492682577491a4447578d8315f2ce76904860735f3ce91a9dc687ab586a166e60bcb2992785d7f85d58329fc0815f7d78fbe19e9ff00b41eb5f0a3c6b6a919d31f6c9a886196fb36cf39636f60eaf19f796aa52b2b33e4738c4468d6a7f588de9eaefadd3dd6b7ebb1e2ff0010be26f8b7e1dc96771af7829f488f56d1751b4b159b518e78d85cdd8b832ed55232994528d82dc138e95abaf6bde325f07dbf8a2dbc01269b1788b5fd3b5a8af6fb5f867826b90418923b7215d11c807049217a9da063d9fe3a7c38d3bf685f08456ba0ddacda968bae2d9c922e09886f54b95e7a6d575723fe99815c3fed55e24b3b5f895f0b3c03a5a1b7b0d2ee2d6e66b74c6d04c8b1c2bec5515ff090538db96e7cce17154b14a9c634929eadfc5b2d575ea703fb5ef883c79e33bff09dbf897c12be175413a595ac17f1dfcd75231883e0c7c81feac05c6492793db966f81bf1db41f05cd0c7a4ebb6fe1e950c9269b69a8864915ba836c921624f71b33ed5f47fed61e31b4f867f16be11f89eeadbedf6d6125ebcf00c6eda44285941e0b2862c07720723ad75baf49aa7c52b4bdf187c20f888b777c6cbca3a15c3892d47ca76b794d86b79b3960cc30c540236e6b76efb1bd1cc6b51c25050a515077d5dda4f99ab6edad3ab3e2df8adf1abc43f19b5c860d26df54d32de7b582c5f43b3bd9278eee45f97718d428666f9463693f28e4d6b597c01f8ef6be0b9acadb4cd72dfc3b3297974c5d55238dc13f3036de6f24f71b735ebff00b0f7824ffc24fe37f13eb96f249e22d3e75b2692f3e696091cc867624ff192b827afdee7935e8d71e2cbb9bc44d7b1fed0de0b8b4f04c8347fb15a3c0c3a60b1baf33d0f0e33fa542d353ab11993c354faa60e9c79616776a4eefcac9fe27c113788fc5be17b3bcf0db6abace8f69868ee7493713431f3f791e2c81cf7045755e17f04fc51d6343d07c41a34f7ff00658c4d6da44abaca4330d809923b68da50f9c03f2a0e79e0d7affedcd7de0ef113786b5df0d6b5a3eaba9664b4bcfecdbc8e776400346582312029de013fde033c0af30d07f6824f07fc3df08695a7e896973afe87737d711dfea50b38b669b6ec6876ca0160376448a46421032295f43dca788ab8ac242b50a294a5a34d764fd3a910f04fc5cd73498f559b50d49ed9ec5ae99eeb5f8d255b39dc0791e37983ac521192480ad8c9ce3352f8d3f667f1078675abad3b4d126b2609ae564bc6fb3db5b08618e37695a469cecc09543070a1490371248105d7c66f13e8fe174d3754f0e69f05e6a3a2c7a7aeb175693c77773a76731953e60465f9400e13e608325b15a2dfb5678cd6f67d4123d3616b86bb32c36eb3c5b96e0441d43aca1d4030c654a306047de20e2a5297404b328c93a2a36f2febd4e5ecbe00f8e6f9ee117458d160b88adbcc96feda349659137c4236690093729054a120e783553e207c31b8f00e8be17bcb9b98e66d72c9ae9ad86c125b3072a51943b1ec392179dcb8ca363a3bbf8dde3786d74cd5eff4a536371ad41acd85d5f2dd4b1c92da298c4514924a4bc60b1dc3716c9fbc335c6f8d3e206a3e3dfece3a8a5bc0fa740f0422dd5c6e5695e525b731e77484718e31f5ab8b7d4edc3cb1d52a45d471e45dbd3e7d4e2a4b611cc005f933c126a44daadc8e48c135626b732c39e4647af7aac926c6c15c803a13d0d4cb467beb527255d085e98e4554545c75233dea68272790b91d49f4a4de4799918f9b2a48a9ba1904b1e4a1e00ce09a66376405181c7d69f26475049eb481475ce31cf1dea408372895149206793562355dee0f2a783cf6aa92732a9ce4039a99776ef41d78a94ca1e2301810c401c107b53e3f9c824027d69606d9387f4e48f5a5655cab01f231e71d8fa5500f70c5b695036ae30dc669d1ca2256dd1e4e00a8ee5816c11c0fbbcf229ad2aac676ee272321a9dc07cec643b8a95dbced35621984bf746d1dd6a8b33480b60e4fbf6a96d83093838e3e66f6a69bb88d3db95ed4bd3a7e46a08e4c8ebb8119e6a52481c0cfe35b08866980fe20c54e4aff008d2c6fe64798f69057af5e7d2aa4a9e4cec37050c36e0fa54964ca164c30c038541fcea13bb02c05dd8f9324ae33d2abcd66f1989c6e62a7e60076abd13e5d82f217827d0d2c8c517a65bd09c55b49ad4773015a45b86c8e73c67b0f6ab36d72ab3365431c7de1e9576e218e773bd71f4ac83118ae8a01b792326b0b72ea57996cee595e643b73c9148b831ab3101b9c81dc7f8d3125dc78e54f18f7ab10261d032953dc919a7a3d806c23ecf1b0f2982921893dfda9d3b8b860ca182819c01d0fd2a690399b1b8648c00c381f4a89a378d82ed2c49c061c7e745b4b088a38d25053e63cefcfa1f435548214b6de872062b51621182a594e3076af02ab5c47b4923a291803bd2b0ae67bb02f9ce4e3bf63512a6ecf1c6339356fcb50e319233926a278889308720f24566172b6ddb8247e54d085b953f81a930d9231927a50a372af63523018c03b7381dea340c5811d071d7f5a729f95b83e833415631f655c77a5b008a1b664364af214734498dec724ee1d075a62398d49271cf41dc50263e6655727181480550bb41c1fe98a08c8dc4727b0a6a311c9e1719a7a8f9c1c718ef485723dc78ebc719f4a456f98e476c507a90b900f273eb46ee739e94801fa8c7de3519c93d064fe94e39e493c7bd44090786fc69318f6e80753ef510186249ef5206e0faf5a62f53ef40073bb148724d19f9be9474ce79cd400e6edc71de86c0ea39f4a6e7de8df83d07d450021fcbfa544fd481d3d6a49723af5a89b81ed400ab952474cf7a4dc437afd69807ffaa94af5cf514ae58e6047a629a580c6383eb413b47201a69e49f5a915895719c83d292439c77e69824c63dfd2973b875ef41239972067a9ed51b8c0e383dea66f942e302a3930ca3d7d680222707ae3038a4396f6cd285c39c0edd2976e5475140118e33ed41e83de940e09f6a4c6723349809cd26ea5a43c74a45884d2374a5a2a00427149fc34ea4233400da297f1a4f4a0028a291a8011bad2fe747b5275a004e69073d69297d6800cf34a39f6a2957ad002f3f8d2d27f0d0b400b45145001452af5a36d00252fad1f7a8cf34000e39a7535a9474a0561c073c52014bb68fad3b922d2f4a4fc6957ad3e6001c53bf9521e685aab80a0714ab494bfc5400a339a466c7147e34100d301569c3818e0e2929472d48917afd697f86901eb45310e0d918a5a686a0b73da818b826a45a629e4f5a91406ef40094ece69bebce297ebdc5040d52779f5a900cf7a8cae1d4f7cf352fd78a0628e3da946770f5cd3be5c039c1a443b5ab410f0c371c81d3f3a7f5c1ef4d003af41f85038c7f7bbd3218d65c49ec3d2be9cf85be2883c23fb2aea7a9cfa3e9dae14f13aac767aac66580b1b78fe664046ec0ddc1ee41ed5f32b0ff0e6ba8b5f1b6b36fe0993c2a97a06832dd8be7b5f250e670a177efdbb870a0601c7b5528dcf2b1f86fad538417469fdccfa335af853e11d7bf69ed0f4b4b18ec343d4b4f4d4df4bb7fdda48fe5bb79498c6d0760240c701b18cd645fc5a4fc56f873e3fbebff0469be0ab9f0cb29b1bad36d8db65b79536f37692418009c03960703bf99699ad7897e2978a63d4efbc57a7e93aa68f62af6d7d7f32590d911f92288c683327cc71dce0f3c551f197c68f1b7c40d2e3d335fd766beb0460e2dfcb8e242c3a1608abb8fd734f96573c2581c4f3423ed1371514ddde967776ef75a6a7d0fe1f9fc39e1cf0efc16b197c0fe1fd424f14ff00a35e5e5ed923cc17cc8d3729c72d9901dcd9e06075cd66fc30f857e10b1f1f7c57bfd4adeddf4cf0c5c347670de5ac97b0c0acf262492153ba554080633d324918c8f0093e27789e6ff84655f51dc3c3583a56208bfd18ee56feefcfca29f9f3d29da5fc54f15687e34baf1469faccb6dadddb3bdc5d468804a5ce5832636104e0e318c81c5572325e5789e49c6152ce57eaff009aebbdb4d2ff0099eb5f1c97e1bdf58f85f56d18da4da835d04ba8347d16e34cb7bdb504e5e34932a1948d9956c92f93d0635ff683d2f4383c2ba17893c2be1ed063d1ad75316eed1d93db5dc322a64dadd42d8dfcab12c793f28c01f33f9d5d6a5e3df8d5a6eb5e32d4bc46b39f08a4338f30f90e9bd8ed302448143663c93f29e17938e39ef1b7c61f187c48b1b4b4f116b736a16d6adbe287ca8e350d8c648451b8e0919393c9f5a2c3a383abcd4d2a97706f9b5befadb44bf4b1eb1fb5c6a327893c5de0ad320d2ec6d669349824492de111bb34cc54465b3fead4a7ca3f877373cd70bae7c23d1f4bd7ae3c336be2bfb678b20bc82c7ec1269cf15bcb348e118453876c842792e899fe1cd71fe2cf1d6b9e3abfb3bcd72fbed973696c9690482248f64484955c2000e0b1e4f3cf5ad4d5be2ff8b35cb092daf3550fe73c324d711dac315c4cf17faa692644124857b16638aa519451db430988c2d2a54a9c92b6feb75aea9fe87a4693fb35e93afea7ad69763e329e4d4345d46cf4dbd8df48da8249ae1602d1b79ff32ab16ea149dbd0020d57d37f675d3ef21d635197c5cb6fa1d8eacda2c775716f6d6f2cb3a2e646d935d46aa83b61d9c8c9d8315c9a7ed0fe3e8fcf09acc31c934b04f2cb1e9b6ab2cd2c2eaf1bc8e22dcec1914e58927183904d66e87f163c53a0b6a22d7528de1bfb9179730dd59c173134e0922511ca8caaf93f79403d3d052e59dc88d1ccd735ea2e96fc2fd3d4f77d37e06e85aa7837c25e0fb5d62c0eabab6b97d1c9e20b1b08aed2748a22ea126f30304da1785206e66047cb9387f09fe10d9c1e0fbef135ec96da9a6a9e16d7a786d2eacd585acb6ac91aba3313f37cdb8300a571d4f5af296f8b9e2f68749d9acca8749bd96fed2558e3578e791b2edb82e5b3fdd248c718c71562e3e3678cef64766d5d2256b1b8d37c9b7b3b78615b79ce67558d1022973c9600313de8e5918fd531c938ba8acdddfe3e5e9f71c14f0f9a38c6477aa9f75886ebd0835ddf823e1cea5e3cd3bc4977617167047a1d83ea372b74ceacf1a02484daa72dc74381ef5c64d1ac801e873806adeaf43e8e9d6836e09eab71990abc9f97a734d68d76654fd314d6528c370c8f5a729f4e7f9566746bb92c31a8405fe6c0e71de999dcb9cfe1434815718031e9518624135570b1229dbbbb0239a0bfb8c9ed4eddb80f4e94eda3ccdc00fc450037e676e3e503ae0549b7a7b77a68700b73c0ef4d9243b46338f614864bb828ea78ec299e6e074c67f4a42d81eb9a4c91db3ee69dc6491857386ce4f4a685041006e6cf14f428a4312318ce3ae29a8e39c0033d68b944fe69f2769cef0d9dbd8546cc02907a7a0a84c9b01209c9ea3d2a5b585e7cb12001420d8742865241385e33eb57e3da130176fa015d87c0dd206b5f14fc3960b1d84866ba0a1753b4fb55bb7ca4e1e2dcbbc71d322bd2ad3f674d2f58bad1927f173586a5aedade6a305ac3a3e60856066dca5bcec804292b853d083db27b48d3f88f2b119851c3d4f6751db4bf57dfb7a1e06c76b807bf5afad3f672fda6b43f86ff0007b57d1b5abdd9ab69c679748b678247172194bac5b95485fdeeec9623871e95e6d67fb3ce9fa9dadbead078a2e0e83368375ae25cb69405c05b794472c46113119f9b20ef39e981d6a3b5fd9fed6e3481e25ff84a597c1834993546d49b4fff004bdc927946dc5b79b82fe610b9f336e327751ed69c9d8f2f1d572fcc69aa55a4f47d9eff0076fe475dfb267ed01a77c3dd6bc430f8c75592df4cd4cfdb56e5a3925ff4add86cac6ac72e189271ff002cc7ad79cebdf12078cbe3a378c3529deded66d622ba2eca58c76e92284040193b63551c75c56ddcfecff65a7784758f13de789a61a0dad8586a36525b6961e6b94ba9248d55e3699444caf1e0e19c60e4138c5755f183e0ef87e6f14f8975e1a83787bc35a458e9ab2c7a76931b3bdc4f1a8558e159517040dececcb82c400dd4bf6904edd19cd1965d4f153ab06ef3566fb6da2d37d55cedfe3efc7ff86fe2df891f0e758b763e32d134592e5f50b24b7960c86f2b61fdea287c152db7a1db824035dcdafed0bf01fc0faf6a5e35f0fc52b789b51b768e78ad2cee229240c433290c04218b282cc0e49e726bc275cfd96746f0bd8de6a57fe3b99f4a8058059edb46deee6e890a7619c602e013ce719c0c800bbe237c2dd1be1bfc0bd6acae274bed7f4ff18fd8d7528f4f456917ecbbd62f30bef1198c8908e7127cbb48fde552ad0d9753cffaa65d5a34a8d3a936969a6974ddf5d3a5ccff00845fb4b5c7c3bf8adaf7896f2cde5d1bc417724da8d8db30dc9be467568f3805937b000e010c4719c8f66bff001afecb9a86a93f89a4b4b697582e65fb349a7de0491b9cee840f2189e4f3c6792735f13f98438e015c77e950147de46300f422b5b23e82be4d86af53da466e0ed6f75daf6d353bbf8d9e2ef0cf8e3c653ea7e12f0f43e1ad24a85fb3c7f2995b2732322929193c0da9c0c67924d7d1de12fd9ffc1326a3e1ad0aefc03a96bd6977a3a6a571e325d4264b4925642db36a3040bd30036efbb904658fc6913491b0e38ce6bdfbc21fb535bf817c2f6b61a67839a1d460b592de2ba7d7aee6b58e460419d6ce42c8ad924f047538c0245635149af7199e6385afec214f0727a69bdbd1b774cf4793e1be85e368742bfd5347baf155ce89f0eb4ab8b4f0e59ccd0c97cccd306c14f9b0b81c2e4fcc382700d49be03f829b52d12e8f83b51b298f876e75793c22d7b31b9bbb812205819c9dc0287230a15b85c8cee15f3059f8e3c436ba85bdf5af88f5582fac2dc5a5a5c477922c9040bd228d83655064e14703278ae875387e28b5ee897d7ebe2efb7dc393a35cdc2dd79aecff00331b763c92d9c9d9d739a974e56f88e79e5f888356afca9f9bedd93f9df73d27f695b1b7d3be157c2f86d7c3579e1080b6a722e897b2b4b2da969226237380c412491b8670466be7b56dee86439cfa706badf1045f107c49e20b4d035c4f126a9ada33c96da5ea0b7135c8661b9ca44f96cb05c9c0e42e4f4ae6ff00b2efd74e9af5ec6e12c52e05bc972d13796b2e0b08cb6301b009dbd700fa56d0768eacf772fa7f55a0a94a6a4eedbd7bbbaf321555312866248638fa5457963ba369147ce39ff7abab9be1af8c2decef2e25f09eb4b69681bed533e9d32a5bed5dcdbdb6e170304e7a0ae76198ac4792d8c8c7f76b4ba91e942719eb07732a1c468b95da4751ed41607a12475c558b987e518e5c73f5aa310092b739e3079fd2b16ad637b93ba864c8cb7af34de163f94e001d47ad2a6554a800e4e79a63ca1612bb006191bcd240575dad2738dc3918a748a5883ce0f7a12dc851200760e334f62c7e4e0f39cd4a010808c79e053c4bb880ac40cd46bb8678c914c1b8be3185ce4d2b813cfcb1e700e3af5a43097cb2a81b7f8477a591bcd7000391d7153449f3a151b40eb93cd52020662ac38cb11c81daa4487ef027385e80f06a578ccd819014839f5db46d013611c13f7877f6ad101242182f2a012bd6ac06c741c11d7d2abab30ca852a4f76ef4934cb0b6e7ce3a62aae4115d30903672ded490c054a30db975381d292496365f302b313d01a8cdc6e1b188c1e58fa0f4145d0cb4973b08c64aa8c863c64fa0f5a6c976cc4295287afcd59d2dcf99198d373956f941390a2ae69f14728796f59e575c2aa0ee4d4c5f36887d2e68db235c4665dbb5474cf3bbd6a4d7f45bdd1350b9b2d4ac2e6c75025775bde42d0cb102030cab0046410464720835f50fecf7e1ad0b52f86f657573a269cb6b610eab71adddeb5a134e930f2bfd1de0bc689a38c478e50ba9241f94920d6e78cbe2f7c21f126b9f6efb5683708e9729a94bac787e5b9bbd41fec70c76af0c8616312a32952329ca938390d47b4fb363e5aa6715238874a145b4af7b797f99f1c5af86754b8b4babfb7b39e7b0b1f2c5d5d471168a02e4840ec0614b1040c919c1c74a67c801dc187192a6be9bf197c4af022fc1ff0018689e1abfd2218f564d27fb3b48b5d22482ea2f2029985cdc79416660c5c862edd5b079c57cee6d56f23cc800c8ed5ac23cc99eae0f153c446539c1c75b6be89ffc033164db2a38c600fe2352a49b8b2eec107271de92facde250b180e07a8e4fd2ab885a0f97e656feed4b4e3d0f4799134ebf7403b4039207a55490ae24906580c74a72e55586e38191f37423bd471ccac80afc9b410013d6a1bb8f52b13b14307c061e9cd354e31ce05586cbc4782e80e40c556950a7cd9e73c8ac9e831ad95cec27e6ea314d689846769e57afad3800c0ed3cfad217669304e31c7e3523b881b646c0ee3c6291106013f523fc69e46d0c0b76fccd47ca8538ebc12690c8fe56278c0cf7ef51c9946caf4f635630412570231eb511255b90063b1a90181f7f4038eb4e3f2a8e327de891b729c1e3d05018f047403a1f5a0900e141038f5a8b2171ebed4be66130b8273e9518e4e052188c73f7a9b8cd0ed8f71499c8e3f1153b0c466c1a6ae7914e0bce69aadbb27afbd2b80a38e318f7a3393d734280a07a9ec691a900acdb4f22a3f3bfd92053c7cc79e9eb48cb827f2a00619971919cd2970c73904d2b44afd473ed509b70320655bdfa5003ce43f4c9f434a1581c900035192d91b81fad49b431e718f635059148e18fddc63bd064e7a0fc687c738f5c53491ffd7a00338a729e7af151f56a5538ff001a00b0c7e4feb4cdd9ebd29039da7a7d2903700706820539dcc4753ce69ac0ee3cf18a4e467d7e9433601a0069054118cf6a6f4a56e4f5cd377526306a09c0eb403918343545ca128a28a4021e690f6a7537eed00251451400514527e340084fa52539a9b400da5fe1a5e68e68013eed3bd69281d6800a7d37ad2fb5002d14514000e28a28a005c7149451400a0669d4ca51d6801cbd68a01e94ab40ac2f41451fe141e4734122ff0009a7534714ab5402d14500605002f55a38a037140fba6ac403e5e6972719a4e7ff00af499c5021c3a5395b151ae334e1df8eb4ae50ee40a55c834de8b8f7a5e7b669887e772f269c06318a629ee7f2a7eecf4a041938c52afcdd7ad2630dd79a728f9b34003e028e4e69e1b70c7eb470fc0e29a08084fa55589245249e79c53bb1e0903ad4458f63f5a923906493d3a5310f19da0faf4a5471d68472dc2a83c75a02e7a8c9f6e8282045e49fcf9afa53e154da1784ff0066bd63c5579e16d235fd5e0d796ded9b53b512a806288e18f0cca32c76671939af9af27764f4e9c575763e34d72d7c153785a2bedba0dc5c8bd7b43121cca14286de46e1c28e01c71d2b48ab9e66618796229c61176d537adaeae7d52de0cf0a5d7c407bf8fc3ba7436faa7805b586d3d6d91a08ae59970f1a11842071918efea6b94d71b47f823f0fbc092699e03d1fc5571e21b35bcbbd575ab43741e4600f9110e3632eec71e832a4e4d78fc3f1b3c696b7705d47ac626874afec389becb0fcb679cf9582983d07cdf7bdea7f05fc78f1efc3ed21b4dd0bc417167a764badb491c73a21272760915b6f249c2e3939eb4d53927767cf7f66e2a36bcd4ad6d399abefd6de6bee3d73e0a7847c25e28f157c40f116b1e1c87418f4448a48341bcb79ef22b466dfbe4920187902f97ca741bcf0005c66fed01ff0ae358f04e9fabf87a5d3e3d7cdc9446d2341b8d32d2ea1e4300926e4dca71c87cf518f4f25d33e2b78bb47f174de2ab3d7aee3d766e66bc67ded28e3e570c0ab2f030a4606d181c0a93c75f163c5bf139ad8f89b589b515b7c98a3d89146a4f53b115573ef8cd572bbdcd6397e2162d57751f22b69cdb595adaa77bbf347af7ecebe22fec9f82ff1549d234dbffb1456f727ed96de679dbf72f972f23722ecdcabd8b31ef5a3aa41a27c2ad37c01a3695e01d37c5fff00091d8c37579a95f5b1b896e2493ef456edff002cca839e01e1938c824f80687e38d6bc35a2eb5a369d7a6df4ed6a348afe11123f9c884951b9812b82c7ee91d79af40f823f10be25ddea963e05f0978a3fb362be691605bb5478a2c233b6d631bb26403f77b9cfbd44a1adefa19e2b0352352ae214928b77b36d68a36d6dd9dd9cf7c75f07e99e02f8afaee87a4beed3ede4468919cb18c3c6ae532724ed2c579e78e79af7cf1a6a9a4f80fc4fe04d1ecfe15e83ac5beb7a65a79f3c9a78692e19b2184240c2b8ce4b6093b86700035f3078cb4fd4749f196b563ab5d8bed52d6f6686eae7cc693cd951d95db73004e48272464e79af66f1dfed5dafcf71a643e0ad4ef745d361d26decae60b8b784ee9d378674cefda082a32083f2f238143529256d4bc461abd68d0843ded1ddddabbb2d743d03c2bf07fc09e13f14fc4ed4e75b2b8b2f0fdc40b6d1ea1672ea30592491ac8cd24319dd2052c5324fca23624f5359de30f09fc2cf885e26f00c7a6ddda59dfea7a82db5e8d2b47b9d32d6f2dc8621a24901556dcaa995624993273818f9f3c2bf13fc55e0ad72e759d175bbab5d4ee8937331224f3c9392640e0873924fcc0d4be33f8a7e2af881a85adf6bdae5cdfdcdaf3030db12c278e51100553c0e40c9c0a234e77d599472cc67b5e7759eddfaf2db6b77d77f91f4958e99e1df883e3bf19fc38baf873a4f87746d2a19becdacd9db98af2d0c5c24d34c4fceae3e700f0411cb0e6b1f54d6347f86bf087e18ead67f0e3c3fe22bcd4a1961b9bcd474f12862197e53b71ba46e76b364808400726bc73c45fb427c43f147874e8ba9f89eeae34e64f2e4458e346917a10f22a8760475dc4e7be6bb4b9fda7755f0ff00817c13a4782af6f346bdd2ace6835233dbc32433b33214281b7e7186e4aa91bbdcd2709a68c2597e2e0e0b469bd5733b689eadefae9a5ba1eb573e0dd0bc13abfc518f46b46d2a1d4bc0ada849a5b367ec52b890344076c6d071db7718181525bf85fe18fc39d17c25a55fc3a2cadab5845712c97fe1ab8d4aeafb78cb3413c6d88faf0a012b9538e467e558fe2a78b63bcd7eebfb62696e75fb76b4d4a69912579e2230532ca4a8c7036e3030074ad3f0d7ed03f10bc1fa17f63695e25b9b7d3554a242d1c7298d7d119d4b201d82918ed59ca8d496a5cb29c5b8ab55d5efadafa5b769f531be2759f87b4ff1deb16fe179e49f414b8cdb1992446452012844803fcac4a7cc33f2f7eb5c9b44572633919e9deae5f5f5c6a9793ddde4d2dd5d5c319259e572ceee4e4b1279249ee6ab81b41c9c7b7ad7628e891f5d4a2e9423193bb4adddb2a963c83918ec7ad3c72bebc55891430c11903b9ed51b5b0dbdc1f5a56374c6a31ce00dd8a7339e32723da9b15aca490ac307d683149b87cb8fc6a350b0e560ccc40e2877fcc547b66c9fdd9e7b6296449719d9827ae28f52f4ea481b38e71472db86703dfa5096f2b7381b474e454ff647e37b05cf71cd52570e65d19007c2b7e829d1a3cc3e404f1d456e689e0bd47c41a76af7b616a6e60d2a01757927988a218b38dd82413ce06064d518e40b82bdf8354a2bb91ed22db49ec538adc2fdfe7d8558042823af1815b5e2bf096a7e0dd79f48d62d96c751508cd119124015d4329dc848e4303d6bde3e296a1e19fd9c7c41a7784b44f07e81e2964b08ae350d4bc4160d3cd3cac5b223cb611703b6473ec739ca6a36e5d6e79f5b1aa0e1082e6725756dacbadcf01f0d789751f07eb369ac69571f66d46cdfcd827f2d5f6374ced6041ebdc57516bf19bc616b7da55e45ac0177a6dbcf6b6b27d9613e54536ef357053073b9b939233c62bbff0082be1bf087c54f895e24d6afbc36ba6f87749d39f51fec1b5b87915dc10002c704afde381819c0c6322bbef811e2cf087c66d73c5363aa7c3af0d691359e9735d58cd63a7a6d48c32aed9148219c174c380a786e066b29d5517f0edb9e5e2b1b4a1294a742ee2937b697d91e39e01f8f5af7826d24b5709a8c30e9173a5e9a9224416cfce91246720c6c26194e51f20e719c715951fc64f1636a51ea8755433adb1b05b516507d8fece7ac3f66d9e4ecefb7663233d457ae78c2eb42f01fecebe07bfb7f0a68779ad6b56935a49a8dd5823c91820e645e39941d9b59b3b707d6bd3c7c2bf0c7c23f0be8da5c36ff000e26d4a4413ea375e3eb9d97171c60fd9d0a9d8b9dc3238181956393511ad4eff0ee727d770b1f7bd86b36d7af2efe87817826fbe22fed01af6a9e17b4d66d59758b687edb1dd451c16b1dbda9cc2aa238ff00748acfc2c4a012dc8e4d67f8b7e2478c3c23e37d76da5f12697af4b710c1677b716905b5ee9f791c68a62011e2f2db60c00c532086ef9afa77e12f87fc1de18fda0ae22f045de897765aa686f792258dd2de7d86e239543c71c80e56370e0952392a3180001e411dae95e38fd97be2178c25f0ee87a6eb035d86388e9b60910b74ff004452911396453b98900f259bd6b48d6e6934a3a19d3c6d3a95daf64943dd4b45bc9dbf438bd2be24fc43f8dde24b5f0acfaedb4b36b7776d1eeb9b58628fcc889f28b18e2c80b93d0739e41aa7f18bc49e34d2fc43e21f0878af59b6d49e3d546a17a6d214114b76211189158468c3f7640c600ef8cf35ee5e11f0be8fa7f857f678d56db4eb0b5d4af3583f6abb8edd1269f0cd8deea3736303a93dabc6ff0068ad3aebc41fb44f8a2cec2ddee2f2ef514822880f9e4764455503d49c56909a72b25b1db84c450a98bf670828c529745ba76bfe07af693f1c3c23ba5b987c6ada3f868f850e971784c59dc9f22f76104e163311c9c9f3776e3bb070293c37f1fbe1adee8ba19f1347e6eadab410cbe24ba30485d6eac0a7d8cb6148712846cedc81bb0d8e6ad68bfb16f83bc1da0d8ddfc49f1b9d1ef2f1b0a905e416b0c6d8cec0f2ab798473c80bf4e32792f8cdfb21c1e15f074be30f03eb8de24d0638fce9d5ca48e22ef2a491fcaea0727006002791d315eca4ec9b3ca8bcaeb55f66aa495de8f64fe76efafc8bde06fda0349bc3e13d4af7c6ff00f0875ec1addeea1e24b4fb1dc4a35559650f1e3ca46570a98880908da14151f2ae6c6a1fb41783a6f895e0e99b549b54f0e585ceab717486de510dbcf35cccd6d70d110a64daaeadc7ccb938c3715e77fb3a7ecd77ff001ca6d42ee7befec8f0e5848126bb48c3c92c9807cb8d4e064020927a6e1c1cf1ebf6ff00b1afc35f156b6da6f86fe203cfa95b4ffe9b64d7b6d7129855807016350636c670cc18671914aa3a5195a4d9b62a39650aee13949b49decae95efd9799e27f1cbe235a78c34fd12c61d4b47d6a7b569647bfb0835032a066f96333dec8d2caa47cd82a029e0122bdbaff00e3ef82268fc09e7788213069baae9d78e96b6b75be33159186579c3c7838202a8889ce7241eb5e7bf1a3f674f09fc30f89de05d09357be8346d6a402faf350ba854c082455660fe5aaa80a49cb022bd7fc35fb1afc1af18c32cba278e755d605bb2adc47a6ea9677062dd9da58a42700ed38cf5c1f4a729d37057d83115b2e787a729ca5cbad9a5ddd9df43ccafbe34f8274ef156a1e2fb0bb9ae6e6d741b5d2f40d1ecc4904f61bd9bed19b8922705e3f9c87c36e136074c8abe16f88ff000e17e2578967d5750993c19af2daebbf666b791dedf538e4598db9f90f566990b28da55c0cf71cff008f7e02e9d7df1d22f86bf0da6bcd5aea2022bbbbd4ae2368e39402d212c91aed48d7018e09dd95033807d993f625f865e1ab582c7c59f11258bc413be6d912f2d6c926e40c24522b331c9c6437391c53e5a714ae6951e5d4211e694af28ab2eb6d1a7b69b7a9e39af7c44d07c69f0865fed5bdd267f1636aba8ea52db6a51dfef8ccc01436ed00f2f7646009495181918cd269bfb35ff697ecef3fc52ff8488429e44b20d31ac7ef325c1871e6f99df1bb3b3dbdea3fda2bf662d4be07cd67a9dbdfaeb5e17d41fcb8ef153649049c911cab92338070c383b4f0bc0afb2e1f877f0f61fd9b67f0adb78abcff000329643e201790676b5c191ff7c17cbe2425738f6eb5a392a6938138acc29e068d2a9829b6a73f5d3aaf23e39d2bf651d4751fd9fa5f898be22b5da2092ed74ef2720c71b156065dfc3615885da79c0241271e0b70b1bb4600c63ef63b57d8573f03b4287f66ef11eb7a6f8afc5136968d7f35b58c5a92369970b0de491452346a986dcb1a3120f27918e057997c09fd96752f8b1a61d7751be3a2787a390aa5c345b9ee08386db920055c1058e790460e0e146b41294a4f63d4c2e6b4e14ead6c455ba8c9adb55e56ea7814b03412673bd73d40a8a6954b852376476e95f7247fb1b7c28f191bbb0f08f8feeaef5945276a5f5adfac6471978e2546033ea457c85f113c137be00f156a5a0ea9e43dfd8486da492d5c3c6c7a8653f43d0804742010455c6719eccf53079a61f1d274e936a4ba3563948588888c9c13903b53c4876fae29c2d5a02a6360d8e314d208908946c27b81c0aa3d71c1c13ce79f4a6ab02c319da29196555385254f71de9865d84e465bd290c984bf39c1c9f5c54f23a2b868cfcd8fad5067ded9c6de3a7ad3d1c018dc57279a770f22efda1235c370a0703144456e90c9b8efdd82be82a834c30ca5be5c6011deac594a521d91c4dbcf3f31ebef4e2dbd857b6acb4176ca5831183803a802a95d100025897cf39ed578249292db7078fbdc015bbf0ebe1a6a3f14fc73a778634cb8b582fb50919127bd76589484663b88563d14f406b46999cea469c5ce4f44724934925c119392303e953c500322f99f710e08e86bd3b4cf805ac4f309f4ed6b43bad156daf2eae35a134df67852d8aacc18188484e648c0088dbb78c679c7a7f837f65382f2ce41aaeb565a8ea3732697269f0e957724504d05d9931be57b57d8c4212a429c6d6c8e573119c3ab3c9ad9ae169c6ee478d7c23f00d8f8d7e23f87bc3b772dc476babdda5abc96e556401ba0058119ce3a835ea3e13fd9cb439b49b9bfd625d63659d86b7a85ddadbcf14721fb0dc431222968db19dee09c1e40c6304182dbf657f1e5bd8e97ac59cd65626e161ba804d34ea618a4942c5219c4422dc321caabf98170760e95daf877e0d7892e75dd625f16fc4879ec21b3d5348bcd4ac355bb919278221235a4acf092f11cee6550ca4230ceeda093b4a4aced63c7c663a1525cd46bd92dd7dffe6bee32ecff00667f046b9ae5c5a5a6b3aae9d6b6f6da7ebd34ba84f093169335bb3ce091181e6232afcff770e01438c96f8a3f667f0af822df5e4d4aff0055d52f3c3fa5cba9df5869d730ac93a4976d15a7964c6db15635f325243637ae05780dc78a359669dffb67509659ad069ceff6a930d6c318809cf31e157e43c7038e2b53c29a878efc45e295b9f0ddc788b51f10c707371a63cf2ddac2a153964cb84036afa0e07a557b39a77be86ef078c8be775fddff0086ebf79f42e95fb2bf82ace1f0fcfa95f6bec9af6b961a65b5bc773043358a5cdb09f1700c2d99130c081b73b90e077eaf4ffd9a7c1fe22d3f41b58352bfb3d16ccf88279d4c36cf793ad8cf1c4aa2786d7cd62e5cbe1966daa36a29ea7e608ed7e29be9b7baa14f17ad9d8ea0d7f737c56ebca82f22ca34cf2745953054b12186319ab76771f145b47b2f145b7fc25efa6e9f24f796bac5bfdabc8b67909f3a54987ca858e77b023273935a5352496a73fd5b11a5f12aff00f0e7b26b1fb3efc378fc3baef8b6cb5af10eafa4e8da359ea0da35ba4905cc935c4ac8b225c5c5a461ed8052de62c1c8c938c60f13fb5fe83a67877e2a41a6699a241a159a68f64eb6c96e90333b4796675400093fbdee2a9d968bf1d24d7d75d874df882faf4f06d4d4d60be372f0f048f340dc53953d71c8ae4fc69e1cf881e22d55ae75fd2fc4faa6a8a96fba5d4adee269f64adb20c9705b0ed954fef1e066b56fab67461e138d653a95d492bf5ef6ff008270135b3328d8ca571f306aca2de54d80a437fb5c0c57a18f857e3b96ea5b41e09f1119ada259658574a9cba46e582bb2ecc804a3804f07637a1ae1a4ccd1af980f190038e9ef5949297c27d0d3ad19fc2ee54dcc63ff00598dbc852280e1c155ce7be6a6fb106c6d73b871cf6f7aa437c6edb8f538e3bd6124e3b9b92b80a091db8148a9cb1ce4fa9a56285323e9b48a6e41da0062c7b9a8191ba10a3907273c528048206473d7b0a7c877944ced3d4d444e5b60c7aee3da81dc9786e072bdc91504cedb8938618c7d29e5805ce72178c0a848eb9e01fce9300046d66ce47b534e4019fe2ec2973ba319e36ff0d27985b073c8efdaa4434918c60547fc5fd6a466dc391d2902b75238352046c30319e6983e5073f5a94e509c2e4fa629832d938c522843cf3d29ab92847427ad29c9c9078a686c750723a63bd480f28cab93d2987803fce694b1c609cd2331c7278140081896032334107772d49d49e302948c2678fa7a5000c79c8e0526376093b71da9ac76f14d7e839fc052b9561c5b78c16e3f9540c7c97e1be53fa54854823838a6cbb72315231a7dba7ad37ef5281d403807b678a339a4027734bb7bd27d281eb480771f89f5a01c838a4a2a881480074cd22b63d28a4fe2a57016a3e29c5b8a652281bad04d04d15030cd2134b48dd280169bf7a95ba526ea004a28a2800a28a4fe1a000f6a423147f9e68fe1a00652eda4a7734006deb467b51cd1400a0fe147f9c503dfa503eb400ab4b45140051452ad0018cf4a38c7bd0b4940052ff0d19e292801cbd29d9e79a6af27fad2f045003a957ad376d00e3bd040a7da957e514ddd4e56cd05585069739a45a072d4d122d14515a08291bef503ef1a3ef77a0a13a1f4a78fa8c5376d2a2f39a910f3ef4e56cfad377668078f4a61a0fcfe14b8c60f5cd3179e7d29d9e453247afe19a01c1c5342e0f23a52efe47142024fd69ae7b9e3347240a7315ee0eefa559034316e9cd394104e79a76d05463bf5a07dcfeb40ee4b1be3d4b7a76a973c70a73f4a8108c7524d4cce76f1c67ad067223ddbcf391fd2be86fd92b49f0a6afac6b96facc7a65cf8824b555d1adf5a844b6b2390fbb28480e41f2f8ce71bb1ea3e7a52304823a7435dff00c3bf1b787fc231dd41aff83ad7c596f74aa3325d496d3438ec922e76e78c9033db38e29b52e4d0f2f32a33ad86953a4df369b5afdfab5f99f47783fe1f473fed4d61a6f887c0fe1fd32d5b4b924fb1da4627b2bb2011e7aa38c2fcd91b76aedc0ce4f2763c3f1fc2bf8a979e35f04c7e09b7d120d17cd9935481505cca12421d8305dc986c6172c0838c0c62bc9edbf6b6b95f8ad078c26f0e46f6b67a7be9d69a6a5e1568d1b9ded314259b3df68e31df24f2bf0bfe39ff00c2b8f16789b5c93451ab36b904b0185aebcbf2bcc93793bb636ef4e82a7966e36ea7c8d4cb71f562e724d494636b4b4bdf5ebdbb9ec36edf0f3e347c17f1c4ba47822dbc317be198564b6ba8b6995d42332b3c814162c2360cac5ba83b89e40d07813f679f85de0dd4352f05daf8d758f12db7dada5bd09b631b2362a1991c2e3cc5002af3824915e31f0dfe327fc2bbf0378d7c3aba40d40f8920107da4dcf97f661b244cedd877ff00accf51d2baff0003fed4d2685e0bb4f0c789fc27a7f8cf4eb2016cbedc5418947dd0c191c36d1c038040e334e509c5f91557018b85d413953e6db9acdae5ef7befe68f6a9fc23e07d6a6f835a868fe14d3ec74cd62ee67960b8b18d9e51e4b9f2e52412e030e3248e011547c37e34f08691fb4cd9784348f00e9fa6b5b49776dfda512a2ca257512975511e405d8f1a80dc2c871b47cb5e6fab7ed8126b9a9f83ef66f09431bf87ae649fcbb6bd291c8ac8d18455f2cec0011cfcdd3b66b81d3fe350b0f8ecff117fb1f7837525cff00661bae9be364dbe6ecedbb39dbdaa7d9b95eeba58e4a395e2e7092ae9db92492e6beadbb6cf5d1f53bfd775ab7f187ed81650693603c2f2d9eab2584975602269259a39650d73868f6ef7efb95ba724d4fa77c15f066ad77e1d8350b8d765d575fb2d435192e60b884471b40efc08cc596dc14ff0010c11df3c787f88fc6779ab7c40d57c55a7b4fa3de5eea135f45f669c892dcc9233e1641b4e46ec6e007e15557c67e21865b591359d4964b58e48addd6ea4cc28f9dea873f286c9c81d72735a7b3969667d17d46af2c1529f2d95bcfaf5f53db344f81de14d634a8bc40c35c83489fc3779acc5622ea179ccd6f3ac653ccf2402ac1bfb8083ebd299ff0a47c2cde1f87c54b2eb03453a03eaefa23cf11bf2eb288b024f2f6f92490de6797f779dbcf1e5fe15f8b7e26f05dadcc5637f33a4ba7cba743e74b21fb24723ac8cd0618796db901c8e3be2b362f1c7891b5a5d6cebba97f6ca8daba81bc93cf0318c7999dc38e3ad38aa976ae2585c65ddeae97fbd76ff83e47b0eabf05fc25a1782b5df14cb2eaf35bc7a5e9ba95969bf698a29a137524b11499cc4c1c0281832aa6e048c0eb5d37c64f03787b5ad77c59e2bd421d4e5b6d0f4ed2236d3aceee3496679a250aed2344c23455007dc6dcc09ca8e07ce579e2ad7350fed2175abdf5c7f69323df09ae1dbed4539432e4fce57a8dd9c76ab16de3df13d8eaefaa5b788756875478c42f7b1decab334600010b86ced000e338e052e49f596a3fa8e21cd4dd5bb5f97bba7e0f5f33dd7c61f01fc0be09d2f51d4ee8f88ae6184e9a23b3175043329b90dbb7930900ae3818ed83d7229fc4af0d699e03f81baf7872117372d63e34f2a2b87990027ecb9566509c8f2ced2a08f9be6c81f25791d9eb5e32f1feaf0e8d1eafaa6b57da94d144b6d3debb79cebc47b8bb63e5c9c163f2f3d2aaeb571e23bcb5d546a3ac497d0437c1ee62975549bcdb9c14f3553cc265e011e628618c7cd822b2e4973479e414b0b5d4a2ab56bb5afe497ebea741a5785f4abaf817afebf25b6758b5d62dad61b91230db13c6c5976e769e475233ef50f877e0e6ade24d3349b94d434bb2bbd60c8ba5e9b7933adc5f6cc8253085141605419193711c66b06d7c6b7b6be0abff000ba436ed6179791dec92956f343a295001ce31f31ed9f7aec7c0bf113c4d0e9510d3f47d33569bc2b6b35eda6a578a7cfd3616755665fde2ac98790150eb2105b206071ac9cd5ecceba9f59a6a4e0d5dcbf0b7f99ca787fe1eeabe2c5d723b35437ba3db1b99ac640c279115d51c2285392a5812091c6719adef1c7c0ef127c3bb0d4eeb5bfb2c10595cc168183b9fb4c92c664c45f2f3b541dd9c60f033583e0bf881ac7807c61078974e9566d4616767fb482e936f043070082c0ee27af5c1ea2b47c69f167c41e3ef0ee89a3eb374b756fa4999a29707cc99a46dc4c8738257eeae00c0e29fef79ee9fba69378cf6f1b35ecfaf7feb4fc4d2f1c785b4bd1fc03f0e6feced45a5dead67712dedd348ee2465b828ac464edc281c28fc0d1e27f823aef846dfc45737f7562b69a2fd981ba595cc77a675dd18b63b3f79f2e58e71800e6b0bc41e37bef12f86bc33a35cc36d15be830cb05b3428c1dd6493792e4b104e4f18038ae9fe24fc546f17783fc1be15b392e8e9da159aaccf76aa1a6b92082405241445c2213ce3391cd52f689ad4c63f59a6e11beee5cd7ed7bafc34ff008623fd9decbfb53e2869f12f86a1f15b08a63fd9f74d16cfb846fdb2b2a3edce76b119f507047d2367f0ce6b6b3f1e0d2bc17e0bf11789e1d66de3b5b66b58e1b64536e8cc888f21dac06498fccc6edc413800fcc1e35f84d7de007d661d4358d1cde6993c1049670dd319e512c4b2878d190164018063c60f1cf5aa3a7fc44d434ff87fa97842386dce99a85d477b2cceade72c8830029ddb40e39ca93ef58d483a8f9e32d0e6c561e58c92ab87a9a3b2ebebdfb74fc4facf42f875e07ff8581e2b8b4fd0f43bff0017c1a6d937fc23fe545776905cb6ff00b50861926851f6e23cfcebb33c7276d6647e01f0a4df107c5f1e8fe11d266f1b59e9766f69e17d51a15b39aed99fed2e9124ce802a7947cb671824f383babe5cf87be07bff0088fe2cb3d034d96de1bcbbf30c6f76e5631b23690e4aab1e887a0eb8ac9d36c67f10eaf65611ba2cd75325bc6cf908accc146700f193e869aa36fb660b2d9a9493aedd92f97e3b69ebbea7d3d75e04d2a1d5bc77ff00093786741d0264f0fd9dcdddbe8c56e52ca4697123a0c1f264dbfc0bd8020b6771eafc4bf0ff004bb3d1fc75b7c13e13b7f085ae83712e81add988e5bab8611290fbb73331071f3900838c13b89af0dd67f65df16e97e336f0cbea5a14d796f6cd757f3457e4c1a7c23043dc3140537060cab82c54e700035abe03fd9ce4d3fe2a7842cbc491e9fe27f0a6b2d70b1df68d7ad25acef1c32314f3536b06565071c670719c1c73cd457dbfeb438aa53a515ed3eb17b2bd95fa24f4d7776eb7d0c2fda96311fc65d44119c59d9f20f53f668eb463fda0b47f1369fa5278fbc0169e33d474c856183511a849652b2039024d8a7cce7b1e39271c9a9f52f80b7fe2687c13a7786b43b3b2bfd4c5fc935f0d426955e28a451e64eae9b6008180f90b6eddeb806b1fd9b752d0174ed6aeb5df0f6b9e1e9355b6b2964d1efde6f34c922ab282106319c1e4119ada32a5282e67aa3d0a55302f0f4e9d596b15656767dba77b6d739bf0ff00c6fbcf077c4cbbf16e85a1e9ba441768d04da3408c2d9a138ca633904950d918191d31915dd7863f6a0f0df8265d63fe11df8636ba426af0b4775e56aaeee58e71b4b464220c9f914019c74c54ff00163f654d434bf1278967f0d5c686d65671b5ec1e1f4d48cba8a5b0032fe5b6491d48cb64f4ea71597e29f80bfdb927c3fb3f0ad8c36571a8786e2d5b54bcbab971046481be591989d832470a3bf02b39cb0f2b73fe6129657895194fed2eef64aeafafddb9c478cbe2f7fc261f0dfc21e13fecc3687c3fe66dbc373bfcfddfec6c1b71f535dcdafed31a7f88bc2ba3e99f113c1369e3abad230b637ef7d25a4e147f0ca555bcc1c0e0e01c6482726bcdfe227c25d53e1edbd8df4d7ba66b3a5deb3470ea7a2dd0b9b66917ef47bb030c3d08f5c7435d27c2bf81b1f8dfc13a978b758f11c7e1bd02cae8599b816325e397c292cc8846c41bd7e7271cf380335bf3518c13fb277d4a5972a0aa3f853766af7bb7e5aefd0dbf02fed243c17f17b53f1ac3e13d3ad63bcd3dec63d234961650c4acc877642365be4e781927b018ac2f85bf1a9fc03a1eb5e19d5f42b6f14f853576592e74cb89da065917187491412a78527827e45c15239f5bfd9c3c27049e14f8e1e1bb5d6f4db984dadbdb1d754b7d9447b2e83480900ed03393d383824735c178abe01e97a4f83747f1868fe3487c41e11b9be5b1bdd423d39e092d497da5bca77cb0183c12a4e571c1cd66aa51727192ec70aad80955a942a46df0aebae975e8f5d3a936bffb4cbeb1e32f036a369e1bb7d27c3fe10656d3f45b6ba66c81b776e94ae493b14676f1cf5249373e1dfc4cb1f177ed5da4f8cf57b34d32d350d4c37d99e6f3161778cc7192f819c39539c0c550d53f665d5749f8e5a57c39b7bd4befed211cf6faa2dbed0d6e549925f2f71fb9b24e3773b472335c17c47f0a597827c75ace8361a91d721d36e5ad5afbc8f204922f0e026e6c00c19739e719ef5d318d39ab47b1d54e8e06bc5d2c3bb3942cb7f85feb7f99f7bfed01ad5c693e23d3ee1be08dbfc47b4681513508d52e268c82c4c4d1fd9e4750339073b4eef5cd713aefc64f10f807e1ade5c7fc2826f0d7862fd64170963a8450ec0e9b0bcb0a5bee4e3033228ec2bc2fc11fb637c43f0569f069ad3e9faf5b5b00b09d5e079248c0030bbd1d0b01eac49e7af4c72df173f68cf1afc60b4fb2eb57505be92b209069da7c5e543b8742c492edf466207602b9561e77b4a278986c96bc5c68d682705d79a5afcafa1f4f7ecd52278a3f651d7744f0f5efd9bc42a97d6ccde61429712026339ec0ab28dddb071c8af02f82ff0002fe22dafc5df0fcade1ed4f464d3afa29e7bfb989a1896347064c39e24cae46d52739f4cd751fb26f82f53d52c752d5fc21f10d7c37e25b6052e3459b4d1709710f5473990065c9232172873ea33f4c689a4fc65d47c4f612ebbadf8674cd06dee165ba6f0fc13bdc5d2821846de764206c609539c1239ae4ab59d19ca117a3ee72622bbc056c4d2a528b52bb77bdd5ff003f23c23f6ff1f6df16782aded4493cc6d255112265998c8a0018e493d315ebbe1ff09ea3fb35fece11c7a0f87eff0059f1a6a00cd3c5656af72cd7722e002a81be488639e01287a17af13fda77e3858e9ff1dbc2b7ba0c5a56bcde1488e5ef15a5b77ba6666da7632ee31e23230dc3820f4c5668fdbebe21c72154d23c3614eee0db5c9ebe9fbfade30ab5294125ea6f0c0e3abe030f46105cab569bb5f5d3f03a3fd8c6daefc0ff001dafec7c65a5ea5a5ebbabe9333da0d56092de69cf9aaef80e016dc11ceeff00a666b8ff00da0be02fc4bbbf8bfae6a4740d475ab4d6af6496c2f6c2269e2f2491e5a3b0ff0057b14aa7cfb47c991c0cd79efc52f8f3e23f8b9e29d33c4b7c2df4dd5b4db75b6b7b8d23cd84a6d76756059d98302c79047415e99a1fede3f14743d0a1d3a45d0b55100e2eaf6cdda63c7562922a93f87d6bb5c6a465cf1b1ec4b078e85758ba518b94959a7e5d8f61f8dda437c35fd8a34df0f78aae55fc533a5a5ac5097dec92aceb2ec18ce7644a57774e3af2338da0f976dff04fab9262ded716b728189e17fe260d922be56f893f17bc53f1775a5d5fc55a949a8cf1a948a3da238a107a88d170074193d4e0649c57436bfb4778a2cbe089f85a2cb49fec355913ed26093ed655e6331f9bccdbf7891f77a7e74bd83e45eb730fec7af1a14e1a397b4e77ff0000fa37c3b1eeff00827ce235398acaf73b4f38fb74b9cfb5685d787eebe267ec4da55a782af14dd3d94304f691cc15e492071e7c079e0b105c038c823b357cc3a4fed1de25d0be1249f0eadecb497d166b796dde796190dc05925691886f336e72c40f97a63bf35cefc3bf8c5e2bf8592cd2787b51fb2c0cd992d66412c331ec4a1efee307b671c5613c3ce49cbadcca5936265cf5135ccaa73aecfd4eb3e1f7c09f8af7de2241a3687ab786ef2dd58ff695df99a788fe56042ca402770257e4cfdee78c9af3fb8f0078861f12ea1a0368b793eb36024373696f134ef105e4b1d99ca8041dc38c1073835ebbe27fdb7fe24788ac5ede04d1f48527fd7d8da3ef1c6300492381f976aabfb24f8b2d34ff008adad6afe22d76db4c63a45e3adfea1709197b83b48f9a43866273c724f356a75e3cd39c57c8f5e35330a31a95ebc23b6897f9f63caed3e19f8b2eb55bbd2edfc31acdd6a767b4dcd943a7ccf341b86577a05dcb91c8c8e6ba0f03fc1d6f17f863c6bab5cea6fa44be1afb32cd6b259b4af29964642b8dc0a952a78c127a715f427ecfbf15743d4be13dc69da96b9676fe2b5d4deeef1f59f125c68cf74187cb3fda630cd33636a1427a264f0066d6adf167c35e26d4be2eca6eb41d3a492df4ab70f6da9874d4e48679774d1b4891972a8514ed0c06c0773020d612c456bb8a8ec71d6cd31979d354dae5b6bf357fd4f9af5ef863ab697e3ad4bc33a059eafe29362b1be468b716f7051915b7340c0c91805f1f375e08e08adff867fb3c5efc46f165ee85acaddf82ee2df4a9f53492ff004e71e6ac654602b14e096fbc338c74afa07c4ff12b45f146a3f13743f0b78fb49f09f88eff0051b3bd8f5b9af96182f2d52cedd0c2b7684e0ababf0bcf240e0be2ec3e3bd02c7e287835f50f885a1dfcf69e14bab6bbf1025e46ea6e094c0639e5b2090adc9c74a5f5aa9ca95b5309e698cf64a318d9dbe7b5fb5bc8f9061f835e21b1f16786747f10e8da9f86e3d76ea2b5b7b9d42c648810eeaa5d03eddf8dc0e01f4e4669bae7c25d66cfc6daf787b47d3efbc44749b868249ac6c6490b007018aa6edb9c7726be93baf115bf853c33a4e8de2df88ba4fc41d52fbc4d637b6325bea1f6c1a65bc7323492492b1c420a6e1b7381b8e323711bba3fc5bf0b4f7de38d1e0d534986f65d7a5bc32bf8825d2adee612abb248ee610c588dbb7603838cd15313563ef289acb36c647de8d3bafc375aebf71f0fddd8b595db5bdc5b3c1711b147866528d1b03d181e41f6ae97c27a15f78cb59b1d1b4a83ed7a9de131c36caeb1ef6009fbcc401c03d4d7ab7c4c1a17c5efda3342b0cdbadb5e7d9ec2e6eb44bd6b9170df362412c912e5c29453c30f97ef1ab9e24f0ee85fb2a7ed1fe19bab59b53bed26d204be9e3692392e487f363641811ae381c1c704d764713b41af79ab9ea7f6939414145aab28f325e6785cd6f2dbde4f049b19e27319314ab22920e3e56525587a10483d41aeafe1578cd7e1dfc40d0bc4b3d836a69a64e66fb12cfe4998ed2305b6b6073e87a62bdbb45fda73c3b0d8695a86a70eb779e274b1d334bbc6f2e3787cab5befb4493aca65def23a606d65003649622b6dbf6bed26f2c7599b76bcfae343aedbe99a83245e65b25dc91bda287f337288fcbe42e76e06ddd5d719ced6944e6ad8ac5548ba53c3dd3d37f2f43c2ee3e3b78de6bf8ae575582de3860b8b61670e9b6a96de4cec1a657816211b872016dca724026ac1fda2fc7f1ea63555f102a5d0fb2e1a2b0b65506df7f91851185f97cc7e00e73ce702bdc97f68ef0e6ad63e36f11c96c8f79629a7ea1a2a6a0d125d3eaff656b4926f2839f3507cb2139e3cb538dc45667ecd1a5f86fe31fc24f1b784b52d134a97c508c4da6b72d946f76be7062ae65c6f256456cf3d180a9738c5394a3638a788a5468caa6230c928b49ecf7d7b7de7cfd7df18bc5771a5c7652dddbca22684477171a7db3dced8a40f1af9c63f3362b0185ddb70318c71535b7c7ef1f5adaea16d0ebfe4c17f7177757518b580ac935ca7973b729c6e5e30300751835f527ec53f01fc37e24f0a788f55f17e8967a9dcdd5c7d82ced751b70e6258c112ba9604ab166db91820c66b9ffd9c7f678b7d1be277c444f1569567a8e93e1d2fa7aff695b24d13b16de260ac08c8890367d2515329423aa42a999e5d07561ecd3f676e8b5bff0091c9feccfe13f82be22f04f8826f895a94706b314e44492dfb5b186dfca044b0a823cd90b6f1b70ff757e5e79f2ff83be3cd33e19fc4bd27c497f0dc5d5a597da07976f1a99583c1246bc160339704f3c73d6bea4fd98f4cf0b7c50d1fc75ad6a1e0ed02488eaccd6b6d26916e3ecd00897cb44f978e00c818c9c9ea4d51fd947e18f84aebe086a9e2d7f0c69be3af154d3ca23d2ef5a362190fcb001206442cb87dc4670e3b62a55652524ce29e654e0f13edb99df955afa2e64f6ec798785fe3f78734fd4bc19e259adb5d4d67c33a33692ba2dbac474ebc2236457690b868c3eedcebe5b6481cf1535c7c6ef04ea16373a9eaba56b975adcde1d8f444d2d66920b0b778d3cb1e54b0dcc645bbe03bc0f13e5b3861924d4fda4f57f87fac6a7a25b784fc0ba8f837c59b49d5ac5e1fb3471b138588420619b237074da0ab0c8627e4fa6fc37fb3e7823f679f0469b7de28f04de7c41f12de20334369a4b6a989303291c78f2d1464fccf82dcf3d00de31872a2ab54c2d2a50ab284b9a5a249eb64ff002f33c1357fda4bc2f73e20d4b57b74d4c7dbfc37368c2cce85670cb1c8d68b0876bb598cb2a6e5ced71f283c03802ade9dfb5678696ca1b5bbd375278a187c351c7247656cb329b0991ee4348183bab04fdd8624024f09926bd8bc55f037c01f1ffc217cfa0781754f871e25b38d9a1fb768ada5fce73b55d00f2e443b79da59941078ce0f88fc05f1078320f84cde0cf1a4d636516a5e3048b51b6babe96da4f2059b98ddc47229f2d6e12304b028a5b2790a566f1db731a73c1d6a5292a72e68349ad2f65aa6bbec69f83ff69ef07784fc61e37d4a58f54b9b6d79e192da5b3d06c2ca6b22ad764bed494a492a7da232266cb3e18360019f92246da3007ca0fc8ce3048afaa34df0afc1ef0bf86cbeb36ba0eb9e21d3f4cd2fed96b1f885cc335ccd79225cec786701ca43b198212ab807fbd5a3abf81fe08b58c9616efa0cf2cf6de209a3d45b5f93ccb66824ff0041545136c3bd5b0a194970a08c9c92f9d2d91e9e1f1587c25494a9d39de4d27a2e8bfc8f90d73f360e71cb0f5155a60acafb73c0cf22be80f8ede12f871e10f06e8b79e1cb66fed9f14476fabc50c934a7fb22cc40a1a1c33fef19e73210ec0fcb1e063a9f9e2e64791f83f20f4a529a713e970b888e2a9fb48a69798c8cf98c13b75a99c125481919c73504519120ce1837383561711e0753d73d856513b4aa5cf9c471f5c722918a89b8f4efc528d8d2eec12d9e476a6c837ce491c76a431d2310368e467f0a8d86403c820e39ed4ed9cf0d8f6151b2945033ce7d2a4048c0f6c67193e94fdaa1704e40e7834c006ec15041a52467a13fd69008dcb0e38f6a6b3151c13f29a50fb5874c7bd3090475a901564524861963dcd31be507d0d358f3c53b031c907bf1da82866ec03f2e7eb51e37633c669eeddf3cff003a69f9980e0639a8602a83c0e9430f4fce8c64e49fc29010339ce6801b91ce7ae691b03d08f5148a4b1618c9cfe74d232401f80a5700e33ede948c393dcd292540c8a1d81c5496264e3ae0534f23fa9a53f36475c5263e539a003032077a61edfca9d8e31487ad20128a3340348028e940201f7a42d485611bad35a824e68ce714c2c25145140c28a28a80133ce28c8a3de90ff9340094514500145145001451450034fe5487ad14500357ad3b9a6d2f1400b40e68a17a5002f5eb47d68fe2a32280173cd2d22d2d0014beb4945002e78a4a28a002978a4a5fa9a00551ce3bd1d38a075c9a3b77cf5a0072d18cf342d07a628204fa52ab629578a41cf5a0ab8eea334bd7a74a4ef8ed4a38a64811d2971c52352f19fa558063e60318a6918a7023349f7a9807dda51ed48b483daa4070e06077a504b75ea2987ad3938e7d28024fbbc714edc49a8c1cd281b4673da9923f927ad031c9efeb48bc91ef4e03819a604cb8031c01436322985bae08a713b54609aab9048aa323d31c62942e178a851b0afeb8a940c29248e71c0a063b6919c7191f9d391b9e4678a60932a4f7e8050558f5ebd698876006e983e95ec9f02ffe1119b4df10dbf8acda442e1ec208ee2e1903c5134c44c63dca4838db965c15033915e32a0e5b9c1aeebe1ffc25f177c4cb5b99fc37a436a71dbba412b2cd126c66048cef61c601e7a0ef4a56e5d5d8f3f1d184e85a73e45a6bb75b9e9b1fc3ff0086b6fa545677ba946bad3c6639a7b7d5a2682de65b4798b8c02245322ac780d8cb633918a9e6f867f0e35cf10c1a5691a84b6e2ea7d42d56e3fb412e562f21219d2e9c2a8c46ca674ee3e5ce720d79b5bfc0df1d5f78caebc310f876ebfb6ad63f326b76645544ecde61609b4f63bb07b669d0fc21f1e5bf8d1fc2b16897916bbe4167b757550613c16f3376c287a6eddb49e339e2b3b2bfc6787ece176e389d6d7dd75ebbecbee2ff00c37974cff85fde193a4ac8ba52f886dfecab3365c45f685dbb8faedc66be9ebabc96ff00c78d79a643a9ea366de15d5dacaf239cb6a53ce273e640b2aa92ad1be123c2b6d057af4af96750f80be3dd2b58d334cb8f0edc0d4752328b5b78e58e46711101d8ed63b54647ccd8041c838e69352f81de3dd0fc4da7f87ef3c39751eaba8826d618d9244940fbc448ac530a082c4b7ca0827029cf92766a5fd7de2c450c3e2a71a8abad177fbdeeb6ff0033dcb4f6d6f5af86fe36b0d52c75df0c144b8bcfed2d5ae45d493158620d6d7c59148761b3ca76456c11b3383bf63c41f11a36f8bde0af072d9cd2a8bed1af3ed17777e6ac18813e5823da3caddbbe63b9b77b66bca7e1ff00ecc3e22bff0089ba7f877c5fa6de6916135bcd7524f6d342c5a34007c8e0b213bde304724060718e6b99d67e0578b2d7c67168f61a34c0ea125d3e9b15d5d5b79af0c2cc18b95936060179e4648e322b24a9f35b98f3fd860ea56927596cdad74d7adefadac7b06a33ead75e20f1918f4ff105978ee3b427c3a7c47786e2574fb41f3dacb7c51ed6f2fee05dcdf7b69acff865aefc48d17c6de478b2f752b2b99b41bf9634b99025e3aa44e51a71feb4ed6c9432f239dbdebc8be2b781ecbc0ade11fb0cb732ff006b68169aacff0069656db34bbf72a6146146d180727dcd36f7e10f896d3c443487b5925c244cd796b6b713c0ad25b8b844252366ddb0f40bea7a026b651838eeb53bd61294a9b4e4ad25d56d656d35fe9b3dbe3f88034dd03e0c47ab5eeac05f5c2dddcce753d968db7522ef24f1321f35b82db8bae0f3ce2bb7f0059c9e1bf1478634dbf89adaf6ebc57addec16f20c3cb6e6ce4559557a9527a3743d89af8fef7c0fe24d3ec6daf6f3c3faa5b5a5cb224171359c891cace328158ae18b0e463ad69f88be17f883c23e19b1d6b59b4934b8eeeea4b44b3bb8e486e5591558b14751f290e30727a1e28f6316fdd96a65532fa538f246adb9aff7bbf9f4b973c0ba94bf09fe2a6937de22d3efecdf4bb9596e2cda0293a82b90363ede486079c706bd3dbf69a9ee346b3b44b9d427d623b1d3d629afbcbf27fb421bdf35e7762ff75a10b1ee3c9190405e6bc5fe1fa9ff0084f3c39d49fed1b71c7fd745afa53e307c13bef8a1f1cfc537d717e9a0786f4bb381efb59b88f7a464401b62ae57736393c80a393d541aaae119f2d42b1cf0b1c446389fe5bdfd1f6f3b9c16bff143c3fe18f8f9a35e69116ef06f86276b7b68ac824a2452ced33c7b8856dcf23ed6c8f942107815b1a6fed3ba4c575a4bea5617b7f058ae9a52d7c9892189e0b59a29a48e3560abfbc951d1542e7600766062a78521b8b3fd9d3e26a68baadade787e1bf8d0bde69456e6e0168943abf9c447d410a55f1ce0824d6a5b7ec6b6ad1e933defc42b0d36d754823780dd5a8495e770088511a601ce0f639ff66b9e52a1f6ddada1c952597a5c98976b7bbd6eedabd96fa95edbf699d374fd5a5b9b74bf4f36e74a335d43018e7bab7b796669d65325ccaccccb2041973951862001597a87c76f0edd781f52d1adbfb66d16e349934f8f488ade2162b31b8328b92c24c8765201013824f24018c23fb33f89a4f8bb27812096de6962845dbea3c8856d8e3f7a475ce485dbfde38ce3e6af75f819f00ecbe1dfc4c6d4b4af1b697e2736f6d35b5e5adaed59add988c6e5591f8ca90724107b1ed137429c5493bfea2c4d4cbb0f4fda45f33b2696baf6e9a795cf16fd9cae5ad34ef8873c7aaff62caba2e5350c39f20f9c987f90161838e54161d40245761e24f8e5a2db781f5fb1d375e9ee7c59268b6164daec114d135fcc93b34b825437cb1b95f324dacdcfb57ce9ad173aedf060370b893dbf88d7da9f137e12dafc56f86ff09e7bbf12e9be15b4b5d2e2b6df7643493cd24306c48d599431f91b8dd9f406b6ab18466a73ea563950a55e156bb769bbfa595fb36f638c5f8cfe1596dfc412c3e2efb1f87ef3c28fa6e9de13367703ec974610b8f963310cb063e606c9f3307016b91f1e7c50b3d52cef2ebc39e386d17436d3ada1b5f08c7632ee8268fcbca83b044843a9904eafbfa0c573dae7ecd7e24d2fe2cc3e02b59adefeee7885d417d92909b739fdebf52b8da411cf23033919edf50fd906d6e2dae2d7c3ff0011743d77c49021dda321447dca3e65c8958839e06e503d4ad1fecf1d5cb7febb0ef96d09465ed5fbd66bae9dde9a7abd4ea75bf8fde09bef116a9717fab49af69275cd36eeded64b495c1823b429232ac8a000933336c38c9c900e735c7693f12b4dd37c7de15d4fc53e3dff0084f74cb1d56e2e4a1d2a561648f1ed8e6ccc8ac30e55fc940553cbcae4e05737f08ff66fd4fe23697aa6b7aaead6be12f0f69aed0dc5f5faf22451f300a594614900966182703241c6d78f3f65f4f06fc31d63c656be33b2d774eb596316bfd9f0878eee369638f7190484210ced951b87cbd79e212c3d37c9cdb828e5d427ec15577768fcdab68eda33d13c2df1f3c3da2e9be15b6f10fc40ff00849ef2c75cbbbc96f56c6eff00756d259cf120cbc4198f98ebc60eddf81f2ae6be56f0aead1689e28d27519919a0b3bc86e1e34c1665470c40048e702bdf3c55fb22693e089ad7fb73e2669da6c3772451da9bab458de4cb012b6d69861501073939ce0ede09ee3f6aef84373f10be257874e8fa9dabebd7d6e2d3fb2a4215a0823f364374edb8b08f961f73aae01278a9a75a8d395e0f495f5f4161b1581a356d4e4dc6a2777aaf85bf25dcf3dd27f6a2b6d17e3478cfc4f059ea0ba1788f6465e3110bdb508a023a2bef8d88f9be56c8391cf183b3a8fed696171f103c237a6efc4da8f87349965b9b94d460b11712ccd0cb1a94485100c0948397c11fc391939127ec876f796f2d9687f11b45d63c4d0a33b68ea511b2a32c32256618e3aa0ebce2b8ff0083dfb3b6abf14aef5692fefe3f0c68fa4bb437ba8dda6e58a55e59369651951cb12c00c8f5a77c2d44e69e88d3d9e515232add959e8ef67a2b697dbb1d6e85fb4d68fa1cde15864d2af2fac20b5d4b4ed66170b1996deea48dbf72c1cfcc0463aedf4079c87df7c5cf85be1bf02af873c23a4f89829d6ed754926d63c8769163752cb947007cab8031cf735e8da57c2d83e1dfecebf14d34ef10e9fe2cd16f22061d4b4d2a46e50032b85660083e8c7f0e95e43fb3649e119b4df1ae9be37d5d34cd12f21b18dd438596702ed1884fe2c0c0dc5412ab96ed4a11a528c9c55d26634e384a94e7529424d41adafaeb7bdbcafb1d7eb5fb427c35b1f176bfe37f0ef87f5e5f195f5ac96f0477cf10b1476017ce215d9b76d1caf23b719dd51785bf6a8d1bc2f79e18586c753fb25bf86a2d17509234844d1ce841134018b2b807380e0673c8e3151ea9a6f8074ff04c1fda51e8ba9df69761aa496fa4c5e249ae2d12737d1885620b71bb062666c2952e324f23236fc31e1ff85de15f88d6b77a05d6857715a6beb24d77a96bbe4ff67da88a39236b63e6859ff785c12de611b402072d59bf64d6b064fb3c1ba6d4a949eeb5db4d17fc03cdbe3f7c7887e29699a7e91a75debb73a7dbcbe7c8fae45651b3c80305216de25c101d87dec118f973cd6f7eca5af5f787e2b99e0f1df87346d385da7dbb41d7ae0c1e744701a6898e0799818014907037700579047e1bd4fe21f8f65d33c3f6b26afa8dfdeca2de2b7c1326589ce7a018c9249c00092715d35f7ecc7f12f49be5b5bbf0c4915cbdc3db4711bbb72649162699953127cdf2239e339da47518ae9952a4a97b2bd91edd5c3e0e386584728c2eaf676fc9fe67b07873c69e0d853f6865d1b53d3f4ad3752d3e28f4eb732a41f6b905bdc2c9e4a310581918e028e8e381915cbe9be26d213f635d43459356b28f576d704cba6bdca79ec994f98479dc47079c638af2ed27e11f8bf548f497b6d164d9ac5b4f79672c92c71a490c3feb5cb3300807fb58ce5719c8cf43a0fecd5f11fc4da2d8eada7f86259ecaf13ccb7964b98222cb82436d77055481904800e463a8c91a74a0afcfdbf039de1b074ece5596e9ead7d956efe47d3be0bf8bb69e1ffd9874ef8817d0bc7e30d2ac2e3c3da55f48b833333aaa15cfdf0046ac49e731c83b9cfc412bb4ad248f2b3b49f3316e493d724f735ee5e34f09fc56f167827e1df876e7c2b6b69a32a04d1e0d32642d785e20e659079cdceddcc5c85505db38ce2bccbe217c2cf157c2dbeb5b6f1468f2e952dd219203e624a920079c3a332e4646467232323915d187e485d732bb35cae3430f29fef1734db69277d2fb7ea7248db99b764739c8eb514d3a5a8c93bc93c29ef48f2889b1c127f9d50605dc96e79e4575b67d347b9d4785da7bff00116970dade4d6534f711c09730121e3dec1491823d4f1915edbaff0080fe2cc77fe29d1eff00c53e27d4349b3b7be96166d447fa7456f3088c8f04b72acb1127ef00fe8a1f923e7ad07539744d62cb50b74567b5992758e4c952cac1867a7191eb5ecba97ed5be2ad6e7d52f2fec347bdd4afed2e74f37ad04ab2c3693482430295940288c3e4de18ae48c906b92b46a49de093f53c7c6d2af2a919518a7ea8c4befd9fbc79a4ea7a7e9f73a0c66eee2e64b4458efeda554992312ba4ae9211111190ffbc2bf2f3d2ab7c50f84f7df0c2dfc3136a37714d26b7a71bfd96ef1c91c63cc6501258ddd2405406dca40f9b15b8dfb4c7899352babb7b3d264fb66a971aadd5ac9048d14cd35b88258594c9cc65074cee079dd5cc78ebe265c7c408f44b2974bd3746b0d22d4d9d95ae9c9284542c5b93248ec4e49e49cfae4f355075e4ed3b5ba9547ebb29c5558a51eb6f42e78e7e0c6b3f0efc19e18f136a17364da7f88e01736496f2bb4a8bb55b12028003861d09ae9e5fd98fc4d07c43d07c246fb463a86bb66d7b6f32cf2f951a2ab310e7cadc1b0a780a7b735ed7ff0af1bf69cfd9ffe1b41e1fd634cd3f50f0c29b0d420bc76cae1426e2177104aa2b00400dbbaaf4ae9f59d7f49d77f6daf0769fa45fdbeab168da3cd04d25b3831898c33b326470485299c138248ea0d713c554b5974e6bfe87872cd7136715f1479efa76f87faea785eb7fb107c47d0f40d4b507fec8bc6b457912d60bb769e64527e68c6c0a7206e0a58376c678af35d73e11eb5a57c33d13c7e2e2c6f347d5ee4d8a0b691ccd0cc37fcb2294001fddbf427a7b8afa4ff00673d7afeff00f6b0f8a324d35c5c45e5df99519cb03e55e471c5907b2292a3d07038ac1fd8c759d2fc5ba27887c07e21113d95adcc1e23b4f38fc91985d0ca493d002b171dc33fa9a8fad56826deb6b3f93296618da309caa5a5c9caf45ada5d3e47906bdfb3678c3c3df10f40f045da59c9abeb91acd6ed14ae618f96de1d8a8e5029660a0e06319c8a3c2bfb35f8dbc79e38d63c2ba1259de49a24ed0ea1a92cccb676ecb90417650c4e55860293f29c0c0cd7d53e19f8dba178dfe1ff0088fe266a3690b6bde0e9b504d3448fb311cd8fb38603a961b23cf72ac71cd79cfece3ab59fc4ef80fe36f86c9e2487c3be33d62f4ddc17573214fb66ff0028b0dc0866dde53a38193b64ce1b914a189af24db56b5aff003ff8028e658ef67294e36e5693d34df57e891e35f14bf66df187c2ab35d4f56b7b7bcd099846352d32469224723e50fb95597278c918cf19c915d7ebbfb1178f3c331db35edff87c2dc4f6b6d6f225dcacb33cf288801fbacfca5833640e3a6e208aefb54d24fecd3fb36f8cfc19e27f10e9dafeade20758ecb49b799a48e0e7fd6c618061d37962a06e551c93ccff0019ee3517fda83e13595f48de5c4d69244a0f0aed74c188edcec504f7da2a562eb49a51f3d6dd8859962ea38aa724d7bdadb7e549e88e57c13fb35f883e18fc48f0bcde21d3fc33e258351bbbab2b7d2af2ea5f2a62b6d23994fee18041b78dcac7257e519dc381d3be0478a3e2d7c58f18699a0e95a76916fa66a33c572565616368448c046afb7730ca9c0099c738515ec6d35cdc7fc143608de42eb1379481c9c2aff661240f41924fd493debb5f83fe31d2f51b8f8b9e07b29b448bc493789f50bab6b4f1147e6da5f234a176b2065327dc652a09c655b0dc8a3db554f9deada4fef319e3b17457b6de4e1177b3d137dbc91f31fc5efd963c6df07b4d4d5b558ec750d298a892fb4b95e48e06270aae1d15864f19c63240ce480747c07fb1dfc42f1e7846df5eb6874fb0b4b84f36da0d46768e69d48c8655084007b6e233907a1cd7b87c74f10789fe147c1dd4342d523f87360bacb3c32687a369b710bed6ff0096b07ce14b2f0c59900520724900a7c57f03dd7ed33a6f85fc55e07f17e9f69a2d85aa99b4fbb9da3fb0c8096672101db201f2f3b4611483839ad1e2aa28abe8b5d4a59a62a54a0e6d24dbf7aceda5acade7f71e6dfb5b783f4af06784fe155b41a358e89aaff664916a4d656f1c724d2a476e0991907cec18bf249e49e79aef23fd9dfe167c33f00e9faa78b349d57c4b15e04171ade9ed33c56a193779cc913aed8874c90c7a71ce2b8afdb62fd2483e18582ea8359f2749901d4861bed2488479991904b6ddd919fbd5eb1f07fe1efc6af86ba2785f4e55d37c5da05e055bab36bb11dce9084f3b65270eaab83b46fe8caa3186384aa4e5421252d6efcae71d5ad5965d467ed795de5a5f96fabd9bfc99e03e11d07c29a6fed5de19b3f05eb93ea9a20bf465bb963ddb24c12d1c6dfc6bc001b03af7c6e3f4dfc78f87ff0007e3f1e69fe21f8a1a949657575671d9c3a6b34a8adb59c990f9237ff18f989551800f5af3ef889e07d07c1ffb65fc3c6f0ec56fa649a879573716b6e8238d2405d77ed1c2ee0bc80072a4f526b8ff00f82844de77c6cb0fde34acba1c1d4743e74d5d108aad3834fa13678fc5d0e4a928de1bf5ebd4dbfdaa3f674f097c2cd0b42f1c784a1693439af62b59f4a927925866464322c8b26ede1582153863f7c152293f692f827e02d2fe0df87be217c38d364b3b19648dae94dccb2ee82651b19848ec54a3e10818e64e7a71d7fed0f3993f627f0109a72e62b5d219401fc46dbb9f6155bf635d674df89ff067c57f0c75e95a5102b35ba7cbbfecf36777979ce4a4996c91c1916bb23566a1cf17b0a9e23134b091c539b6a9c9a7abd637ebe6ba1c47c12f83de0ed3fe0a6bff0011fe23e91fda76603cba7db7dae581bcb4ca8c796cb92f21da3767eea91d4e7ccbf661f89917c3ff008e1a75ecc91da596a85b4f9562276c4b291e590589202c823c924f00e6bd93f6c1d425b77f09fc19f095a324937938b3de14141f25bc459881924163923eea9ef5f3c78afe00fc41f03e8f2eb3abf866eac34eb4da1a759a26311dd8dcdb1c9037630c4639183c8a8a751d58cbdabb5f647a7839471987a92c5d4b7b6f862df4d9591f627ed35f1d22f8233780f46f0e43f63ba6d44eb3abc31a806584ca59873da56794fd54d68fed4df13acfc33f08753b8f0f5dc66efc5452d92ee350ad709244034ac3a9cc08141ed94af8ff00c55f083e2ceb9e186f1c78974dd5f56d3a3b6522f750bf59ee1611cf31b399428049fbb80324e066b4ff00e14ffc47d56d7c1171e2cb2d7750f07cf2da5bd8a43a84523c10ce5046b1ac92158770d8a0b855ced07b51cb1b45f36c79f1ca3054fd849d58b706effdeea96e7d1bff0004ef92dbfe102f1a477d199643780227397221e84feb5c3fecd3f06bc4b278463f19f81bc7f0e8de299a7da9a7b625b311aee531dd2e1b0e7865f94ed5238cb655de03f83fad7857456d434abff1ce93a75d789e5b0bdb1d235cb6b7985a2bbdbab92184466f382c6496db8c9036e1abc89fc05e39f06f8ca34f081d6b4d875fbebbb2d18daea912dcdd2412956595e0936864e376485c8247157cca69da56d6e57b38d7ab5e54ab457335ba4f6bdd33e83fdb46ea3d33c27e09d57567d2dbc7f6b7f1b2b592908d12c6cd36d527718bcd11e3773cfb9af70f1578a3c55f1d7e17f87fc55f0abc716fa15d93b6782e2da29a332103314bba37689d0f751839e841047c0567f047e2bfc4c92ff591a55f6bed0b491497b777d1b995a362ae237924ccd860c32858120807358df0cecfc652f8f2dbc2de1bd5effc2fabde4e6da522ea5b331b206dfe6ed21b2a03fcb827a8c64e2b48d953b736a8afecaa2f0d1846b45ce9ddbbeb1b3dd5b5d11f617c404f8d3e00f87177e25d73e346971ead69933597f635bfd9db93b5126308669180185f2fae4671cd7cc9a7fc1b5f13f85f4af166bbe25b882fbc51737c6c6dac34792fb749086691a631b031e5b38088fc1dd8001c76dadfecd7e33f88134539f883178bcfd896fe26beb8b9f30c52ac9f67c098654c8f094c1c60f5e955f43f81be28d06c6ff47b0f898ba7a5e493a2e9b632dda437cb14a2da666da021c4994c364b0191c565ede2937ceae6985a9470d4ddaac54dbe90b696d16df3d4a3a07ec9b77e29b38a1d3b5f56d79f48b2d6248ae2c592c121b9902228bbde43483767013070c1492a71abe1dfd9cfc37a3dc6af7936a9378a2c74f1abe9b35a5d59c9a7c897b6d6c655963d92b7991e41e495e400579e2bfc42f829e38f07fc1fd4eedbe220d57c21a65d185b458afee1621b6e3c92eb03e172260dc63a0dc0f6af08d57e2a78b7549d65baf146b77770903daa4f36a133bac4e30f1862d908c382bd08e0d6bcd297c323d3a2b138e8b952af78deda2dbf0b997af6bf7bad5c42f7b7b3debc5125ba49732b48c9128c246a4938551c00381dab2c9dd1ed27927afad2ac5bbe5397e33c52efd8dea36e3f1abdcfab845412512360506028e79c9a6efdae32707b53dd7cc60589c62ab03b9b0df4fad49487f9819a4c03bb3c1cd2060727906922c062481c9c62a52815830200ff006b9cd4ee3228f865c9c31ed523460f439cd46c0bb138e3b93d6853f2907907a1ef4d3011be571ce33c1a4248380723d48e4d3a42728703038cd31db7363a1148431970d8e4d3718ce3069e72b8c1e7da93663a30a9022fbc33d29ac319e07d69f9dbcfbf3519003f1d3b50506edc401ce69a4619811934eea32703da99bb27b543014918fe4052156f439a4fe1fc691b3cd00046d507a73d69339e690b100671c77a03e0f5c9ed9a818eda49edc76a8d80cd389e79e7d8d34f7ed9a0a1a3f5a338e683d1a8fc38ef4008d8e69b4a70292a40338a3af6a2931cd0004e0734c20e7eb4ff00bdc7a530e48eb9c5001839e99a4a09a2800a28a290052119a5a2a404e2823347f0d0dd28013da86a1a92800a28a2800a6934bf7a8dd834009d38a1bad251400d0334a39eb49475a0070eb451cd1ed40073ff00d6a5da6939c528c8e68017bf0696901a5a0028a28a0028a28a0028a28a00506941c66933cd1f76801c38eb4bc53722941cfd68158763ae697029a0d3b208a0903d697a77a071d68dd4c04e94a01a3e9d28ce47b55002f19a383463df9a3b7ad500761eb4631c52ae297bfad301bb7db9a5c63da9f498fd6a6c02281522aee1924f14c1c7b548725490303d68b0988bf787d6a453d698a79c9a51d2810ee09a5fe2f7149df8a55c93d314c9b0b81d7353070cc4601ee3155a4c934ec9da7079ef8aa0266e5c003d294e4b0e3049a896401f07a7a7ad4a081b00e71eb5421b91839eb9afa1be085d6816bf043c7bff000922ea4da29bdb149db4a95527192d82bbbe56e7190dc63f0af9f08c2be0038c73eb5edbe16f0b782adfe09c5ad6bf04316a57b25f416d73bee4ced2a4686158d5098800c4eef307dd3c735cd5da71b3db4478b9a253a518cafac96dbf7fd0ec60fda63c392ebda8d85d695a88f09cba559e9304a520b8bd096cd2323c8930689cb798d90720601eb58b2fed05a45f78ab53b6bdb7d56e7c1d79a5ae8e9b52da1bd8215218346b12246bce7e4e473d7036d3750f00f86078c357f060d00dadb58e9725e45e29fb44de6b9483cd59dd4b793e4c840500203f30c366bb7d0fe01781b5db5d2ae95442fac0b4d5adedfed0fb61b1892017b1b317ce4b4b2e0f51e5f07ad723fabc7569ea7812fecfa3694a0f54bfe1fee5f81876ff00b42f83344ff84774dd274ed79b41b5d32fb48bd6b99635bb104ee8cb24522b6378d9923e503381c006b2bc3bf1b3c1bf0f7c5fa44de1bd3bc4175a05bd85cd8dd36af711493b2ccc1b3145cc49b48e8386cf233926faf81fc11710fc3709a6e956cde20b9b76b8b79e7bf3792c4d7c632b195630aaf97f29dc437048e706ba4d7be13f80b43d6bc4119d2b4b8859689f6f569aeafe4d394b5e7971b868dcccc7cbc2b81901fa0e0d52f60b4b3337f5282e57097bd7bf9ead77eecc3b7fda3bc35a6f8cbc3ed630eb47c2da643779b792cac21733cd13a0658e048d001bf9f98e78380412d5fc17fb42785741f0d7872e2ff4ad525f16f872c2eac6c5adde31692acb901a4dc770201ec0f7eb9184baf857e1897c3736a10e99181ff0878d516786e67f2bed46f1a32ebbdb3f700011bf119ae57c55f0ff00c35a7fed1d3f852693fb17c303538edd9bce27ca888538dee4e339c6e62719c9e95b423465a599b468e02b734395dd5dbf45beddf98c2f8a9e3eb1f1d49e113630dc45fd93a05a6953fda155774b16fdccb863953b8609c1f615e9765fb455cf8bbc4da31b7f03dc6a7a8e9c1bfb3ed34ebd73230367e44be622c4de69c2ef0d80ca0632545568be1ae9179e38d0b4bf11f830f81349b8d625b4fed11a84bb6e625425136cacc5b73051e7210877600cf35ea3f09fe1ee9fa1ea1a16bf75e07ff843b5d8f5cbab0487ed172fbadbec172c0ed9646ce587de1c1db918071454a947d9a5662c657c2468ae6a6dd93b6bdd3ecfadba1e3367fb49dc69b70d710e8113ce21d2638fcfb932227d873ce360ff005993d08dbd724d72ff00113e2858f8a3c21a7e89a5e8d77a641697d717c66bcd4fed9248f315dc3fd5260023df39e72724facdaf807c0d6d1e99673f8460b991fc0c7c4935cb5fdd2c8f70a09c0024daaadb0e463f8b8c639f2bf8dde17d1f4183c277fa359269b06b5a1c17f35a472492471cc5983ec323336d381c1638e79ad29ca94e568a773af0bf5575972d269f4f92b2eafa7f5739af86fab258f8efc397724b15b0b6d46de66966202205954ee39e3031cd7d7ff117e2e783be2378a7c47f0eb5dd7ededb42d41219f4fd7ec6e54dbc738456292b06da5438cfcc71d8e08523e125ce72bc55b8ae41e180ddf4eb5b54a4ab4939743bb1b95d3c5d58d693b38ad2dd1dd3bfe07d1da4c7a7f82bf67bf899e1ab9f1268d77a8c9a8426de3b3bf8a5fb5a0784f991056cb0201278c8c1c8041a77ed15e26d2354d43e189d2f5ab4bf8ed34e845c2dadda4a209331eeddb49dadc77c7ddf6a3e037c25d135ed27c35e24b9b49aee6fed5fb3ddc3aa204b292221820851a222e0e54eec480a6395239aded0be13f87bc3ba4f893642750b486c9a4b4bcd42dada54bd2da65ccbf6981bcbde89bd06d50e402a4b7cc06de172a71a8f5bb47ce4a5429e227295dc936de9bb6b97f4b9d7eb1f1bbc2be1ff00da3af64b8d5ad6e7c3fabe891e9efaa58ce264b760cc465a3271dc1c742ca4e0034cf83fe05f867f06fc7571aac5f15349d524bab7922b68da78a348909527cc712152dc0033b727240e38c8f897f08f41f14430e9ba3e9ab6baa42752b9b7b6d2ace18649d975258402c14b3aa46cd85180bb41f503c7fe3af85748f09cde1db0d2110db450dec26e884f32e426a1711a48ec80076d8aa33e806302953842aa4a2f7d19cd87c3d0c54552a53947995a4acb5e5dbfa4798eb005c6b579324aaf1b5c484327391b8f23dabdaff68cf11d8eb1e0bf854b61acda6a325ae8ea93c369749235b48238061d549d8df291ce0fca7d2abfc3bf849e1dd63c2de0fbed46df5dbabef116af269424d3a68961b60080242ad1316c6492b9190ac7231ce8687f017c376dac683a0ead2eafa9cfabb5f91a9e9334496d0adb48e98dad1b9627cbcb1dc36ef5183d6ba6ad4a4a49bde373dcaf88c33a90949bfdddfa6fa34feeb33d47c59f1cbc39e12fda4b49d6ff00b4ed752d12e7c3cba75cdf69b32dcadb933bbe4ec27a154c81ce1b383d0ec6b7e361a358eb3adbfed056935ac516fb0b1b2d36c2e2e4b1e514a28cbfa1f953dcad795dafc3ef05f85743f12db7f655eea979ff00085c1ab1babdb985962925f2cfee57c8ca104f0db89c1231ce6b84f877f0cf44d73c1f65adeb0354be6d435d8f438adb499123681990319642c8fbb3b80540173b5be6f4e654a95af77a7e27911c1e1a5153bb4a368ec9dd6fd6f63d3fe1978e7c33f18be14eb1e02f19f89a3f0c6b73ea12ea516a93ec8e09dddcc8cce4ed4fbccdf265782bb4f1c6878a21f02f80ff00661f17785343f1ce9de23d49afa19dd56e234799ccd6f91145b89650880e54b0e1b9e081e75f1d3c29a67813c07e09d16d2d2ddeed6e3515bad5638a20f7661ba787258207238242ef214601dc406ad1bdf80be1a8ee22d56c6f6ef53f0a2e8b77ab45736b7d1c93ea26031ab468861536ecad202c184981ee0e2a4a1a4aed2bdede8747b0a12946a29b8c1c9b4b4dd3efbeb6d877ed9be28d23c4fe3ed026d1b57b2d5ed62d25119ec2e92e1237f3642412a48071838ebd2bd47c6bfb40787fc1dfb50695e208351b3d5f4293415d32e6f34f916e921dd2c8dbbe4ce482109039c1e01e87ccd7e05f84f44f0d6b1e2bd44eb7368f069ba5ea505847730c77308bb99e2292398983e0a6e560ab90718ef5b1a87ecd7e17d4352bdd3746d5355b296cfc430e8f71717d2c52acd13dbb4c59116352ad9010025b71e7033813cd439545b7649f4feb60e5c12a71a3393e58292dbbdbf2ba3d435af1f5be9369a86b07f682b63a73c4ef696163a5d85c5d23119452a0167c74c6d4ed92bd6bcbfe0dfc44f0f7c45f87be34f01f8df5d1a1deebda8b6a6bad481218e4918c6c770e114ee881209008620104537c03f0d7e1d43e35d35ade59f5c82e74fd4c496178923223451311224b359c4ae46181509947da72d820eaff00c2a5f06f8b753f0e25a5a5de91a95a68da05ec8d08b66b69c4f3c5149ba268487930fb8bb1218f0c981ce51f6515caefd2cce68d1c35284a93bf477e54ad67a6cb536749d3fc01f0c3e077c4cf0d587c44d375cd4750b4f30f97347189640bf224281db713d1b6b376e9d2be3e91803f2860474c7f5afa82ebf67df075e6b1059dcde6b10ea5ae4be20fb35c5bbdb476b03d8c92ecdd0ac232aca832a85003f7400401cbea9f05fc29a6db78a34e075dbad5f44f0ec5adaeab1cb10d3ee9e458d82aa7945b67ef300ef3b8a3fdddbcf650ad0a6aee4db67ad80af428397bce4e5abbaf97e6765fb3efc03f0df88fe0dea7e29f13786aef5cbdba9a55d362b4bd1149e4a610c88be6c6b90e25c890f48f80723754d0fe07e93e27d57e13dbd8780b50b38750b217faccf77a9a3477d6ea21f3254db316519954e008dbe7e1783893e1ef8a353d37f629f1abd9ea5776f7565ab2456d35bdc3a496f1b496a5d1083f2a9324990300ef6f535d7de6a97fa7ea1fb317d8b51b9b3fb559a433793294124452cc98db18ca9c0c83c702b86a4eafb5934f4d7f23cba95712aad56a5a39492d5e968dfbff004cf3dd7917f657fda1e5d413429adbc2b771c91dac105d0795ad1d763346c5cb2b07048dc4138c719c8a579f1dbc23e0cf0c78734ef01d8f8823b8d17c489ad89f5b689ccf1f96cb227c8d85ceedbb40c63273926b2fe3b25d78e3f69abed0b54d4ee1ac5b5686c237791a416b13b20611a9ce07cc4e00c66ae8fd97eeb5cf145f58e8babdb5be9718f3ad66be6766f28cf71100cc117e61f66662303861e86ba7f732509621eb6f91ea46387f654aa631be6714df67ebf79d1f8f3f6bcb1f13785fc65a2e95a2cb630de46963a248f0c6ad6966e912dcc4fb5b8dde56405cfdee4fca3373c33fb4e78057c49a078c359d1bc449e2cb1d2bfb2678f4f788d81508cbe62a175624e47c848519cf25413e737dfb34df59e8d2ea91f8934b9ed64824bab20239d4dec69669764a829f21f299b87c72b8ef5cafc48f84f77f0c61d3deef53b3bd1a93c9259fd909226b50a8d1dc7b2bef2003ce51bd2b4853c2d4b4632d7d4ba783cb2a25469bdeff009599ea765fb4d693a6fc46f0beb6ba65edc69b63e1487c3d788f1c4260ebb8b49082cca79db8dd8c8c8205719f1b3e2e68be32d3743d0fc35fda51687a68795a1d4ad2c6d733bb13b963b5895578241e7078f94104b78fcf73b4108417aad1f0d961c77dddeba950a74e4a515a9ecd1cb30f4aa46a456abfafd49572cccce4373d7b6695467e63c03c71fca9f19ce43e001c85f5a77d9cc51ae08f9b3d7b5749eb5c8828646383c1c039a896568773820e7823d454e1311aa9248ce4ff00f5aa2950953b460e31cd229762eacc268d18a96618c1f4e2bdd6cfe07f879be00c3e37bab8bfb6b892c2e2e3ed6d7709b65b95baf261b610797e61322863bf7e14a9cf0715f3c6f92072a1b95c703bf15e996bf1db5d5f00c3e1092db4e9f464d3e6d3fc89a272583cde78949de3f788f9287181dc356359549a8fb3ef767998d86226a3f5776b3d7d0f5fbefd9efc0f0fc4db2f084b7f77a7dbdc6df26f2efc4764f2ddcad6be6c709b7487ccb6dce4289240c0800052644acef0f7c09f0acb278926d7df57d02d34bd6a1d2dbfb4b53b3b57b585e132348e590accc08f944646f520815e79e20f8e0de26d7df58d4bc17e19bcd4e64115ccd2c776e278c43e5052ad705530a14878c2382a086e4e743c79e3ef1978abc093eadac58e9d6fa1ebda9c4d14914804a5eda1f282468652e63552016653c9196c9e78dd3ae9abcadfd7e278fec7171e5e69dae926fcfadbd51d15cfc0fd017c1fe149f4a7b9d4b54f116e4b7ba9f5cb4b2851cdd18232b692466694118242b646793c56078c341f869e0dd6f5af0c5d278a6eb53d1a66b76d4209edd61bcb889f6c882131ee85090c049e64a4704a374ae7350f8b17b79e11d0b41bad234cf374189e3d375446b94ba83748642c0acc232dbba12871526b5f19ae3c511eab717de1bf0ecbaf6ab0086eb5c366ed72e723748aad2189246c72e91ab7248209cd6d18d5bda4eeb5ebf71d50a5888e9377577d577d1fdc7adb7c03f065c789356b24875a8d34af0e43ae30bcd72d2dc4f24be51488cb25baa44aa1d8166ce4e0fcb8c1afe16fd9f7c2fadde78152e9f58b58b5cb7d6e79a1b7beb7b801ad247585629962d8eb851b9c021baaed04579b5ffc6dd6b54b8d6a7b8b5b069b55d1e2d12e488e4c08630815d7e7e1fe45c9391d78153f867f680f127857c31a5e93691583cda345796da6ea52c4e6e6c63ba3998478708727272e8c46e3820547b2aea368cbfab7f998bc363b93dd96bebe56fccc5f8b1e06b3f02b78612cbed24ea9a059eab31b9208f3260c5b66147c9c003393d7935a763fb3b7c46d4bc169e2983c2574fa33db7dad26478f7b43fdf116ef308239042f239e9cd66f8ebe295cfc40d1f43d3b53d1f4d8ae345b1b7d2e0d4adbcf170d6d0ab048d95a5319c962c484073dc0e2beb2d0743bcf177c064ff84fad2cacacb4ef0d85d2fc59a4eaeabb61dbb45a4aaad976c2aee5f9918f1c38a752ad4c3c20a5aeb6ff00862b138aaf82a54f992bb7677d5fcb63cebc67fb26eb36bf063c0f79a3784d93c5b7127fc4d253a829dc2490ac1c34be58c868c7cbf8e39af17f13fc0bf1c784f58d274bd57c3f3c1aa6a923a59d924b1cd34c54e18848d988193c1200239048e6bea4f86fbe6f877fb389922214eb57437b1f94a069f23ebd71585f0fbc71a3786ff6d8f19dceb5771da7dadeeec2c6eef5804b79434623dccdf77f771b20cfa81deb1a75aac5c93d524df5ee79587c762a93a89da5cbccf6d7e2b5b7fe91e0fe37fd9e7e22fc3cd0ff00b575ef0d5d59e9981be78e58a74879c032796cc50648196c0cf1d6a4d3ff00660f899e24d234fd4f4bf0c4b7361a8c02e6dae45ddbaa3a1c7249906d272301b04f3c706be83f867e18f12fecf36bf10b5df89da9d99d135ad3ee2d96ce6be4b87d6a663feb11724b160587cc03624cb00066b95f8c7ac5f43f00fe03456d7d34716d773140e547991f97e5b71dd77360f6c9ad962273f7636f5b3b6c74accb13392a74f95ddef676dafb5fa58f9c47c31f14c9e363e141a25cff00c2451b94360146f076eece738dbb79dd9c639ce2be81d06cbf698f85fe0eb886c5aeec742d36ddae5de69ac6e1608901242bb963c007e4539c741d2bd9bc437da768dfb59788f4cbabf8345d4f59f0e476ba65e4870b1ca4e4213ea4a823d4a63a902b95f843f06bc67f0c7c0df16a2f185fc514377a45d491e96b78b70f70e21973744293b437404e19b1c81b45734b11296928ae9baefd8e2af99cab417b58474517692bdefbdbb1f272fc49f13378d17c6326ad24be2559bed2350995646120e070c0ae00e02e3000000c0ab9e3ff00899e24f89fab43ab78a2fdb52d4a1b75b649fc88e23b03330188d541c17639c679f6ad9f87de01d1354f877adf89b58b7d63536b6d4ad74bb5d3743744915e50c7ce959a37f97e5daaa00dce40c8ce6bd9357fd9fbc36e17c3912df25b697a96a77125ca244753bb860b2825f211b680cc599b68c103938eb5e84b114a94ace3a9ee55c66168558c5c3de5a5edb24bf2d4f11d7fe3678d7c51e03b2f086a5acf9de1eb058920b1fb2c09b3ca4db1e64540ed81c724e7be6be8dfd877c0ff00f088f86fc51f13f5794595843672430cf283b56043be7900fe2f9915463bab8ef5e683e0af836ebc33a6789e287c496fa6cde1ebbd6ae34ab8ba85eea5686710a2c72084058fe6de6428df290768cd739fb4968fa3e87a97825345d3bfb2acae3c2b633b452448929763265a628aa1e4200dcf804e3f0a9954a75d2a50d1338b11ec71d4fea587bc149eba76dffe1c77847c757ff143f6a0d07c51a8b1fb5ea1e21b79523fbde5461d44718ff7542ae7db35de7c4df8ade11f05eb1f13acb47d3f5d9fc5dad5f4d677cfaa5c46f630f972bab18829dcdd380c3e5040040183c9fc7a8c5d7827e0c5bb4d05b993c3a91991ce140329019b1d00ee6a7f1c7c09f0d6810f8fb4bb1bfd561d6fc170db4b3deea52462d750df80c238c2068892414cbbeee9c75a1aa751c5cfee3374f0d55d39554d2b72d97f76565f8d8d4bff00da2fc1eba86ade36b4d175c7f881ab69cda7cb6d71346da644590219179de71b41da460f3d0f35621fda23c0f1f827c1562da778825d4b47b9d3659bed4f0c8910b4937379526e124a195a40b1c9844dff00204039e73e0bfc13f0d7c4af08b6b97dad5ce9e348be78b5a81678d0881e326de48b721da4c80a10dbb38246315c8fc4cf86f6bf0b7c53a1787d6f25d435af222bad5943298ade679094890019184d84e49ceecf1d2a3930fcce9abdc4a865f2aaf0d1bf3c75ebd168bfaee7a6f87ff698f0a58cd1cb3e9daa044f1c5cf8a1d05bc447d9e4494220cc9f7c175ca9f97afcd597a2fed34ba2e9be3811d85c4baa5fea373a97872efcb40d62f725d652d963b30ac1805dc0b1607839aa1f11741f0ff88ff6b0d6f46f105ddc5b6997f7a2dcddd9b81e54af128889dcac0aef2a1ba7049c8c5725f183e1bd97c2b8fc3fa35c4f3bf8c5e092e3558a39d1ed6056722044c286dc506e6dc7bae0734e34e8c924d6acaa787c154708b8be69a4edf8ff00c07eb6ea7ae7c3ff008d96b6769e13f0d788fc2be20b7f14786933616da5e95697524eb812ab94b989a488ec00931f51f364718f9e35ef196a9e20f1a5ef894dddc45a9cf766f16e95d52647dd90dba3541b871f32aaf233815f446a9f107e126abe30d2f5196e34e78e00a3536bed2a5b96be034f58a2f299a22516394619081b8fce09000aa3a5fc44f838d6c906b1a569f7767691688d0259e93e44cf3292350f3251186718c6559b6b63e5e4e6b2a52f6726d537a91859ac3b738e1e5792d747d5ebfe7e878ddef8dbc7b34717886f75bf103a5cbac29aa4b7131491a17f3551642704a3b07001f949cf19aa163f123c51a1e9bf61b3f11eab6564673706082f2444f309ceec038ce4039f6af4ff008e5e3ef0f6b5f0c3c39a3e9bade87a9ea169aade5cbc3a1e8d269d0c50c81445f298a352d85c120678192d8dc7e7d9a76b8ebc0ec335dd171947589efe1211c453bce972ead6abb3b7637f58f887e23d4b4dbbd325f10ea973a65d4e6ea7b496ee4314d3336e691909c162dce48ce79ae71263d3a8a5dbbbda9f1c79931df14ac96c7a90a71a6ad0562f44db541e83182debf5aac773330dc36f514f6529858c924719ed4c9158328c678fd7deb4286ef08ff37dd2bd335149205653dc0e2a75556627683db9fe550cd9cf4c9e98f4152ca228c90b92383522825b838cfe94855940fe1f51407e401f31cf6a900914a31e801e78ed4c1212c718a7192490ee238ee053b6a222f259f9c01c50046ce594281c13f8536553d76e07bd39cfc839e00e714e691654276955c63341240abc818fce9acc40c54a47a0e9d2a23824f5a9010b7b734c6cb02464114e6ea08a6364907348631b207d69485e3ae71c8a693475c548c0b6063bfad34900e3bd2f5c74a4239ee7d314ae0349c81da908383c734ee87da9a4f27d0d49483da9187d49f6a5232723a50e368c1c64fa52b8c61ef401c7538a42734e032a45480d3f745253b1b8f0319a472413fc85301b83914134714d6fca80066a6e6973de92a6e01d0d2374a5a420e68b807414b4dfd29d480291ba52d2374a003eb41f6a5a6b500251451400514514008d484e697a9eb4878a004268a28a006d1451400a0d2d1cd22d002e38a5e949de8f5a0076da16901a5dd400b452034b40051452eda0000a00eb494bbbe5c50019e692978a5c64134ee01fc54a0f4c5376e453a90052ad1c0a77434100bd39a5fbd48bd69d4c04c7142d1cd29e28b8098fc69693ef505b1f4ab014f1c500520e5a957bd301f4537a734efe2ff1a003047b5382f0734e2e09f4a1476a091318fc680a476a5e0f34e1de9937019cf228073cd29e694371d2905c691c8a701ed429cb505b8a7710c3f2c982383562219fc7bd46cbba9e9f281c9c13d3da980f930bf2a9ef5dfe8ff0ff00c6be24f87c353b482e2f3c3362d34fe57dad0ac650279d22c05f77ca193732af03193815e7f29072474e95ef5f0f7e33e81e14f83afe1cba4d4a5d4e5fb724b0456f17912c73c48a8be7f98248f0c9b982a90c00073595694d2bc55cf331d3ad4e119518dddfa9cb78cbc3bf123c2fe19b6b0d76eb501a03c91c31592ea8b71046e54491a989246084a90ca08191c8a9752f05fc49f0df883fb02e7fb4acf53b1d2e6b88ed97501f2589567944643e0a91bf2884e70c31906bbff107ed01e0ef105ef85e5974bd496df44b98ae5e18ede151a83476aab1b4c44992c93260751e5b918c8c1c5d63f689b6f117893c1be27bcd2becbe20d16ee58eed6d3735bdd58bb6f64ccb23386cc93aed276e24e081f28e68cab35ef411e4d3a98c94573515b3e9d7a75fbfd579985a0787fe286a5e1ab18ec352beb5d06383fb4ad92e75b4b58218d27dab305925554c4a3e53c73c8f5aa9e0bf0ff8e7e23f88a7f09e9dabdc5c32c7325cf99a8b35a24224dd2333ab32b466421b2b90cc4119ce6bb65f8f1e1e6f15789e48edef34dd06e748b7d1f4785ac20befb2c313211e64334811f2439c12796cd737f087e21685e1bf16f8a6df5e9ae23d03c476571a7cf7d696a90c90ac8d91208932a8319ca2e40c8032060e97a9cb2972abf42b9b11ece72f66b996ab4d75efdda3a2bcf81fe37b4f075b5bc7e3bd1aff00c2736a305944965ac4d35919e59000db550a8dacd9638c8ebcd61f8b3e1afc45d72cfc57a9ebda8dceb29e109c59dc4b7b772cecdb9b930ef072a015739dbf2b038eb8ded7fc45e03f09fc0ed5fc27e19f164faeeab36a705f2dc496135b2be368fdd86cedda146493927a76af4b87f6a8f0b4dab784adee4c6da4ea966ede2c66b49181b868123008db97c796012a082a463a62b28d4c44758c6fbf43cdfac63e3efd3a5cdabfb3caecacf6df5575ea78a5bfecd7e2c9fc563447b9d32de48b4c8b54bdbbb8b868e0d3e2704859dca7caf81c801bd738048d3b8fd967c4f01d1a58b59d06f6d357be16169776b76f2c4ede5bb87dcb1fdcc46c3239cf6ef5b3a5fc68f0f78b3c51f146cbc4f753697a2f8c1a3f2354862695ad440edf670c83e6652bb4103d31800923aaf0efc48f86be03d07c11a3699e2d9b568f48d7cdf5ddd4fa7cf1031b43229754da70a199405c96ce4e31cd5cead78e96d7d0aab8ac7c74e5d6cb68dd7c377aff008b4b1e5cbfb387885bc497da426b1a01feceb7171a95f7dbbfd1ac32ec8239e42bf2be509da01e39ae5be257c2dd57e1cc1672dddcd86a9a6df29369a9e9371e7daca5480c15f03919e4115ec3f0c7e3b68fe1cf137c43b36d767d02d75dd424bbd3fc470d90b8688f98e54c90b292caca471b7232dd09c8e3ff00683f8a1ff09a5ae97a55b78d2ebc65696c3ce9ae2e34986c631374cc61515f182721b8e0609edac2a57e7e592d3d3c8e9c3d6c77d6942a25c9a6b67dbd2cb5f33c4c74c7e8681fbce7a01fad0a72f834fd8a2bb2dadcfab1d1dc18c8ddd3a7d2a659038241c81d0d54653907ae2915ca1e3839aae63374d4b73bcd23e1d6b1ad781af3c5368a92d9da5d1b7308573231588cb238c2950aa8324923daa63f0a7c64d08b9ff846f51f25a54877f9071bdd82a8fc4b28ff00810f5aafe0df8b7a8783b4a6d360b3b3b9b479e59678ee11889d2484c2f1310c0852a4f4c1cf7aebad7f696f1143ae47aa1b0d326957cc0b1b47279615ee219f180e0e01851473f7739c9e6b072ae9fbab43c5a9f5d8546a9c535fa17cea5f157c35e17d2fc1b69a5ea7a1456d36e06cc4d05c5c7dac90892957c32931b8030305483cd64780741f1dde7c3ef156ade1ff0014dc68fa3683892f6c63d42784cacc0f28880ab1c2f3923b54fa37ed01ade976fa83a4115bdd3e953e996bf6652151a5ba69ccadb893b93cc90291d38f7cfa3fecab3e936bf097e26c9e22b596fb408c42f796b6e7124918490b2a9dcbcffc087d6b0ab39d2a6e528f55ff0004f3b113ad85a329ca9abdd6dab777aefea796f853c2fe30f1c7837c55e25b7f109163a2d9476b7915d5ecde6cb6f8ca44a0021906c1f2b10060567fc22d33c5de20f1547a078435bbbd1aef5156f3e58aea5b788a22b366431f240e40e0f2d8ef5f4758eaff000f35af809f13dfe1d681a86870a5b20bd5bf90bb484e7695ccb27006ecf4ebdeb13f64cf03eafa7f80fc5be31d22c9af75e9a0934ed22162880b00199f7390bb7714ee3fd5b0ef58cb12d529b6ad6dae612cc6d46bc9c545a6924ecb5696e783fc4af0d788be1ff8897c29afdf3dcb69480dac69348f6e892624261dc06012727007cc0f715ec9e19f807f15fe2269be1ff19c7e3884dd4b6fe658dc5f6ab766ee05391b43f967677e8d8e6b47f6abf07eb371e03f06f8cf5bb0361e238614d375385996419c3157054918dc1cf53feb1476aececf4ff87f61f077e116ade3df10ea1a58b28bed5609621cf9d282ac55b646e40e17a153c9c1f4ca58a9ca8c250f89b69e9733a9984ea61694a9a5ccdb4ecafad9decbccf0cf0ffc2df88de3af891e24f045ceb525aeb8d12dcea7fda57f318ae96229e5b48ca1fccc6f42a48381d315a3f173e0c7c51f867e1db8d6758d79f57d365bc8a7bc9ec7519e50b38f9629650e1496ce007c1c640c8c8af5ef81bf116cfe2cfed61e26d76c606b3d39b43682d84c00764478177363b93938ec081dab80f881f10fe19f833e05eb3e04f006a5a97889f5bbd8e696e6f9197ecaaac8c71ba38faf9600017b924f00552ab5a5554397b5f4fbcb8e23172c4c29727f2dd72dd2befaf4b58e33e23782be24784f56f0bea57de25baf11dcebf06dd3354d3b50b89ccab2003ca0ee1586e0ebf2f421beb553e25687e30f833e22b5d26ffc606eb546b2809fecad4a7630428d986262c171b4a0655190b804638af6bfd937c696ba97c33d6ecf5bb47d46dbc10e75bb2908dc501494ed507f8811260ffb7db15f2eebdaa6aff12fc717ba87d9a6bed5f56ba6956dada23239663c468a0124018007a0ade84ea4aa4a134ad1fe91dd85a956a579d2ab14953ddd96b7dbf03bdd43c17f15ec7ecf7cf36a524f090f12dbeb093dc5bfdb5b1bbcb4959d04ecf82c40de5b04926badff008baebe1393c1561e1fb6b5d3e5b49ada7b8835892e208a284833a3b4976f6f6ec0e3700118671c6715b7e36f1cf8beeb58d7f56d1fc211782bec3a669f777177ac58cd6f7d731da3c0a155599a3204db7a2ae555431e315c95e7c45f1ef8623d33555f87c342d1adaf24d46258acf50b6b696ea7da3ce6904c189206d550fb3692369158f3cea25a2febe7dcc94ead64af18dd7e76bf7ee2f83fe0cf8a35ef87f770dbf88efac74eb878657d1e3b9b7fb2df48d7a2d898bfd2c24a418c105c2ee654553cab1c2d57c0bf142db5682d61975abd8b418de5d2e66be52d6b125c0b60220b2bac72798aa9e546c5b20000800d773ae7c41f895e10f01dbf88f5cd074ed2a31ac2411da5f595cdbdd3482ecea41f61217ca32029907a0200cfcd5e7573fb44f8ba4d2e6b18ae2deda37d70f881668e225e39cc9e6ec5dc48f284987da41f98753cd3a6ebcdb92e56ae6f43ebb55ca6945abb5e853f1cf83fc71e0dbc8bc43afbccda83df3447538f518ef244ba8b69292491c8e5255e0ed721b8e9c1ac8ff8585e2686dd625f10ea6b125cc97891addc815677ddbe4033f78ee6c9ea771f535b7f153e3c6bdf156ced6db552b0db4772f7a6186eeee48de5618cec9a691542f21550285dcc0000d79cb5f2c99da0920707b0af469c5ca1fbd8ab9ed50a52a94d7d622ae7467c7be238eceda26f10ea6d6d044d0c509bb936468d1792c8a33800c602607f0f1d2a8f8b3c6d7fe32bcb49af0a2ad9d9c1616f1460858a18902aaa824e3b93ea589ef58465321cc80f03f01470c7e5fc0d572c6f748ea8d1a7192928aba0db907d71d69ea3774e011d293762339279ed4a9265954838e95763624560c3239da71d29ca43b2ab3e3f90cd43bb68618c738e0d4eafbda3e02ededeb5480748024442be4e48da3d2a352095ee47506965c6f014e7dcf0292456475feeb77f434148ad7071282bc11ce7daa3660ca49c8e38ab53c6af8e31c73559e3d8bb41dc7b63bd4b2fa0e8ee4c4a1186474047535ef5e0cf8f561a4fc3bd27c2578dab1b2161ab586a0d0059163175b0c32471b48a1ca10f90c5701db07935e0522151900edce314df991b8dca0fbd65529c6a24a4726230b4f12929f477fd0fa87fe1a9347b3b980d947acdbd92eb16534eab1c61ee74f82c96dda39079982ceca18a7ddc63e6c8acc93f692b78fc3f0e99a59d4ad85ae89616b630cb1c7f678b50b7bb1379fb77e00da1406c678c118e6be771727182b96e3915684a5d026173d77562b0544f3d653868ec8fa07e2f78d746f107c4ef0d78734086c8e81a7ea0971711c0e93dadd5e5d4cb25c1de3e591065621d80420706bd13c49f013c391f883c6979a62cf2dabe99abdcc975696f6ad616b711dc8516091bc2c61744232e0ab7f70819af8fb6b94e0ee07b815eebff000ceb79e28f09e87ab587f62f86ade1f0d9d6efefeef51b997ed11894a99190424a38e9e5a06071c124e2b1ab4bd928c14ec8e1c4e1e38654e11aae2b6ef76755ae7ecd7e0c6f178b2b2b9d7a186cb57bad22e61b9b981a5be921b35b85481bca558ddc928036ece01ea76d70bfb40784f4ff0008687f0f60b6d0a7f0fcd369324d3dade0437658cefcceea89b980c004a83800103a533c49fb32789748b1d467fedad0753b8b1d363d5dacecae2632359330513a168954af5e0b06c0cede4660f127ecd1e21d027f10d8dbeafa1eb7ae68114736a1a4e9b34ed731c6e461d43c48ae06e5276b12370c819144251728b954ba5fd6a451953e784a788e651ff86fbb53abd2ff00659b7d63c1fe1cd521d76eac9f535d399ee2f2d952cc9ba7d9e4c2fbf2f320f98a600c63919adad3bf64ed1f53d4af20fed3f1023ecd3f16aba6c46eac5aebcf04dda79a022c7e52bb107ee38e39c8e2352f81fe36f115e41a74bae695aadde8b25868d796b0dcb93a42cce238565fdd8565577dac62321539cf4ae9a3f839770fc2af13e8f67aa596b1e275f16da698cb632dcec96511bc7e57ef2355c8324997385c2b7cdd330ea4a3afb5dfc8e7a95aa455e388ddf65a26d6ff0099268ffb39e8ba5e9c357bdbc3aa69d75a43cd6970180b79a6fecdbc9a568d9482de54d0c43fe05f30e69be21fd97f45f09f86356d627d675a0ba7c576c1a6b08e34bb68441b6484f98d9864331c3139e0f071cf3ba6fecade25d76d2edb47f13f877544b0d4d347b94b6b8b9c4171230520ee8002bcf2cb9079c13835b9f0aff673127c48f0d41e25bdd27c4be17bbbabdd3e74d3eeae82fdaa089c9872111830237820ed2233f31ca86a95451f7955fc099d6e46e6b137b6e92edf95d1e51f0a7c4175e1ff00175b341e14b3f199b9060fec7bab117465c9cfeec6d62afc70403df835eabe3af8af77e01f076afe12d0be124ff0bdbc451e2fa7d4a7b8967b987054aa79c8a42e091dc0dcd8009cd5bfd996f5adf43f88fe1ff0c6a761078fefe38e1d1f50918a2dcc2acde62406455652c3046e00e4a1206c38935bb5f1ff008275af868bf1935d8eef408b5b4b83a75fdf477b776eaae37492e0b33c7827f89c0008c02403ace519d4775b5b4d75d3ee35af3a75712f9a1f0db46deba5f6d99c3fc2f87e23fc359bedda4f8035bbb92ff6f913adbea90875505be5fb34b1090632486dc303d33581afeb5f1375cbeb8f185ec7e24b7b67b97d492f618ae21b789db0a658d8615380abb81e800cd7db9e0df0ff00c515fda1354d6ef3c4d05dfc38d444ad691dbea4925bcf132930c7044092aea0296700676b1c9cd7817c56d79749f00fc0d87529e78fc2f725df54b38dcedba8629a0243a8fbd852d807b9ae6fac375172c53ff86bb3969e3dd5c425ece2dc96faed66daf5d0f1c9ef3e2b4d6b6fe2e9e5f194905bc4cd6fae48d76c9146df7cace780a7be0e0f7af45d63e15de7893e00e99f107c4177e2ff001378bf529c5a58c641b986284cdb63f3378326d725b6956c16950007393f51f8abc75e21d2b529b5fd2fc2965a978724b2f32df5f9bc66d169b2c1b7054da9062563d376d23beeaf11d53e231d3ff679f869ac2b4da4e91278b5a56b486e1e458ace2b9965481c71bd536a6d18ff00966a40040a4b1339d9c636d57fc3192c7d6afc8e9d351f796de8ddbc8f9aeeb48f17eaf76ba4ddda6b7a85e6856cc4e9d34534925840a413fbb2098d06e04f000c8f5af4bf8c5e1bbbd1fe1e7c2e4b5d7fc43ad7f6e69e2e9f4cd42f1a6820942c615208b0368f9c81d4f4c57b7eb3a2c3e1df8a1f16be25dd5d58a783b54f0e4d0e9d7d05cc656ee678a10ab1807392d1b0e71924633938f2cfda035886c3e1efc01be85a557b5d27cd335bca239b7af907e56c1da4638620e0f3835d51c47b5a90b2dbfc8eaa78d9e2ab5254e3a7eae2db5f26799c3f0c7c7da6f857551f62d56c3cfbe86c6ebc3e239e3bab83e5c9711bbc1b7e64511bb027a1e40ef5d0de7c01f1b78af58b6d55b5d8351d42fb6b8babe9aee39e521ad23527ce895faddc3827821588246d2dbb77fb554373a7eb3603c1eb1596b036ea72437cb15c5ce6068de4678e15512b39572c10290a54a1dc4d4d17ed651fdbac2e17c26f1bdac291646a98de55ec581ff53c7fc78e31ff004d7fd9f9aef8a6db50fc8d652ccef785249fcbb1c058f827c5f37c5ad3dae616f10df36a5096d43548ae64b2ba22e161592491943b4464c465bbf41dab8df1d7886ffc61e34d6359d6d95b51babb924b9f2f2115b38da809242a800007a00057b459fed516f6f1dadc5c7851efb52b79503dd3ea8556485751fb76ddbe5121cb00a642c7d76f38af05d6b554d4750bcba1088fcf95e5f2f39c6e62719ef8cd7452e74dca6ad63d4c1471129b96229f2d9596c5378f616ce0afbd4267119c464367bd472b12b962477f6a10118c01903a9ec2b472b9edf28d7677625ba134854951ce00e71560aaae1f3824fe0682738e7001eb8a9b143447f296e0ff00b3de923f94e720fafb548321c81c123393d4d42abb9c8c7519cd30260c72cf9c6fe40079a691860b9217d09fd698e08c6700fa0a7619d0b74503a9a0561fb541c8528b8efdea295371db9ce71838a7a333b8673bb238f6a470300ee193da95c918c9be32064b7ad001c36090318ce3341c6f2074f5f5a43c02a723e9520364665c67014f20773f5a6b2b602fcb9eb9a8cb28ea727b8eb433824b1eff00c23b5050aca57285b181c8a6861b727eef4c0a48986e39ce3f5a48f1838c838340891f0304f4078a8dd096ce3029bc32a9c75a7372a4e79ef52c444c475e8299dfda83efce2932571f9d41630e37b761ed410091477cfad1d4f4cd000c38e3ad34b64e7de97b629a7e5eb4ac02f055f2071d0d37f879cd19fc697919cf5a928338520f4a61214e49ce3a0c53b3c7d69a4639209a43109c9340e3be28ce49e947d39a4019271d78a639ebce29d8f6fce924519fc3b7ad003338f7a6d3c0f97de9a464e7a500349a01a31fe4d27f0d400bd7e947f1520fba6957a50023528ef47ad1914007f9cd2d14806280169bf76973d69339a004a297eed25001451450026da4f5a39a1bad00271f5a3f9d2e7149cd00368a28a00297b7bd252ad001f7a97e949c51fad003b1d285eb49f4a5e28017eed2d14500145145002ad252ff000d250028fba68e680714a0e6800fc3f1a07d3f0a09c51d0f4a0070e9ed4bbb269b4ea080a5f5f4a07734ea0028a41de8effd28016931f8d006def4a79aa0115b14e033498cf145500f0b9e29e0024e7f3a68e1a824e4f6a648f0178c1cfbfad294218e0f34d0bc291c134fddc10c33ef400c53fe453b3b467b522819edc7ad0476cf1ef41361cbc0f5a5f7a4076e07e940ee68100eabd69541e9405a53f2e3de801c0f271c5381a671cd3bf84d580ea72cfb4818ce063ad478eb4a140c03dfd692935b0127da71d573f434bf6ae73b71f5351ac7dcd0cbb8e79cd57331589bed1cfddfd6956e33fc3fad41b3069c1723ad5dd85ba137dabb6dfa734bf69dc3eefeb5095f7fca8dd8200a3998b951616ebd883f5a93ed5ce36f1f5aa8509c1c8a70523e94f99a279532d7da7270578ce739e94d7b8322152bd4f5cd438f7eb52c2aa4118c1cf069f35c2d60550ab9c1248eb4a79c60e334e248241e08e3140f94f1c9a42b8817f1a6b28e71d7da9cb9ce3afb51d3f1a6047b4a104f6ed4e491831d8d8f6ed4e518a5110520e73de8b5b606efb92add1cf23071d457a37c3df8bebe0cf0178bfc3234bfb61f1122c5f6bfb4f97f67c2b0cecd8777def515e68818ef38ce07e54d0372af1dea67155172cf639eae1e9d78f24d5d7f96bf99ea9e05f8acbe0df87fe33f0b9d27ed87c451a20bbfb4f97f66db9e766c3bfafa8e95a9ad7ed11abaf80fc31e15f0b8bef09c3a3c6cb35cd9ea2e24bc91b92c762a6d058bb6dcb72c39e39f1d1b94e149fcf8a57771e84fd2b374694a5cdcbaff0048e6780a12973ca3777bfced6b9ecba1fed0daa37803c51e15f15a5ef8be3d623516d75a86a4ed25948b921977ab961b846db72bca1e79aeb1ac7c4ff1e3e0cf8534fd2743b1b4b6f0ccd269c97573aac6b26a1706257114513053bb602700b6707d2be748e6d80160c5b3d01e2bd1bc33f1cf5df05f80e5f0c690b1da99b513a89be68a39248d8c3e5613729d8d8e43a90c32403cd6752828ae6a11f7af739abe0393f798582e6bdf5ef6b5ec7a5fc06d07c5ff0007bc5f6baf368563a9ff006969f341f6793578ad7ecbfba5ba1f682437944c31960ae0707248c1af30d43e09f8a74f9628ee2ded96090cce934374924724715b0ba69119490ca6260c083c9e3a8353e8bfb4378974bb8d3daea68f508ac2d67b7863960886e67b66b749253b7f7c511801e66ee063a1359975f1ebc5f78b7f1bea83cbbc408c8b670a8857cb116d8405fdc831a84223db9030735828d78d473d2ef7dcca1471d1ab2a89475df7ee7bdfc36f04f89be15afc45d034fd36cfc410eba27d16da59b538ed27f2d277b5fb48b7c3b32f9926dcf0015233c8af1cf85f74de05f89b79a7de188f996f77a55d4f05f410b41be36469219a5758c3a9e84b007900f3515a7ed21e3cb579668b57413cb72d74676b0b769159a713955728484328dfb01db9ed5e7ba96ab71a9ea1737b71892e2e6469a47e06e6639270000392781554e94df3fb56bde2f0f83c4395475adef755f77f563e9df177c43f0c7c37f0be81e1fb0d565f13cf0f87dadc906099629dafa39c472bc52ba050b191b51df682a0d53ff8680f0ae9fa9f8875ab31af6a1a86adaed8eb4da7ea50c42de0f264dcd12b8958938242bec180918c7cb5f327daa4dabc8047a0a8e490b9e5d8e7de9ac1d3b599ac328a56f79bd77fbee7b67c46f899e18d63e1cdcf87f46bad7af6eee7c472ebaf2ead0448aaaf1ba94ca4ae4b02c096c0dd96381c0af1a374c71b57f3a83eee36e71df9a7236e6507818c0ae8a54e34972c4f530f87861e368892ee6906f24e0703daa4048438e38a46f9e407ef0cd39d7629f5ce2b6f33a440bbc00c0f3ef5326d8971b7763a134601e3a1f63d28519006319e99a4215dbcdfbdff007c814d24fde1d0538f5ce71432ae3924fe1400d203a8c7e34e73b70793c669bca8518e69720af3818eddea80707dd80b963d4fad19320daadcf5e69a1c99723a8a54612ceec7e5c742290c241d17209eb9f5a6200092f8048e36f634aecd91dc6680a0b7ddc67814d1621e33e86a39231d00e9d6a7f2d470c09f4a615c038a0642a76b2f1c8ef4a42b1eb83eb4fd81473cfad40c0e47514b615c9e2bc9a0380432f6cd7aa49fb44ebd75e115f0fbd969d15b7f628d0bce48e4f31adc49bf39f331bf3df18c76af2b404648191485ce7fc694a9c676e6e861570f4ebdbda2bdb63d7e4fda2fc4179773bc967a593378713c2f27eea4e2d57a483f79feb7dfeeff00b35d2fc5afda524f11f8d3c4fa978374ab7d0135a8a1824d5a48197529614450518f9af1a02cbd514121572722be7a62adb586411d8f7a734ac07cb210dd3af6f4acbeaf49bbb89c8f2dc339f3f2ff00974ff247b643fb4b7892df519355b7d3745b2d4ae6f6cafb53bbb7b79036a525b3abc6260642aaa5d43308847b8e73d4d6549f1f7c471c7a91b41656935f788878a1a78226df1dd824855cb11e5fcc7e5607dcd79635ccde5053b4fa0c520b97c7fabf9873c1c56aa8525b44a581c3a5a40fa3f49fdaeb5bf0dda5ea697e16f0a694ba8ea69ac5e1820ba265b9560db8eeb8385247dd5c019380326b90f0cfed19e23f08dd59cd63069b2b59eaf75ad47e745263ce9e2689c10241f2857240e0e71c91c578fb5db4ec3cc4fa628fb446a412ac73d8f4c537428bfb267fd9d86d7dcdf73e81fd9f3e05f87fe2d787352bdd6750beb0952fd2c606b7b8895559e191d58c6e85a56dc8a022104ee38e95a1e38fd9cf46f0d7c0dd1bc5c26d5a3d76fe0b4305b5c491b4775732cac925ba42231229545de09639e46322bc7bc1ff00197c4bf0f2cee2c740d416ced659d2e5924b3827c4ca085914c88c558027054835aa9fb45f8ee2b1d3ad4ebaf3dbd8fd9c5ba4d6904a17c894cd113b90e583b13b8e49ce09238ae5953afed1ca3256febc8f36a6131eebba909ae54d597976d8f4cf88ff00b36687f0c6f7c0f2ea775ac8d1ef6f174bd76e8a2c620b9288dbeddd930d11dee470dfea5c67355f49fd98ec6c7c4ba6f87fc4b77790eb3749aa5e496f14f15b2adb5b02b139791182f9ae8e431e3660fbd78d5dfc4ef115f68dae6933ea32dc69bab5f2ea57b6f3223092e4163e68246518ee392b8c8c039000ad2bbf8f9e36b8f15c5e279f58375ada599b0175716d0483ecf82a50a321420866ce464e4fad44a9d6697beae57d531ca2a3ed3bddfe5f9bfb9181e29b3b4d37c457905940f6b6a8544709d461d4368da09fdfc2ab1be4e4fca063a1e41acd51d70377a52eb1e20b8d63549ef2e60b58ae25da48b4b68eda218000db1c4aa8bc0ec064e4f526aa7da9d89c95438ec2bd0a72514ae7bb4e9b504a5b931f998e4608f4a47555058b6dc1fc6aab4c5860b73ebd29abf373d33d7deab9917cab72d1b8c6006ce7fbbcfe7513dd39fba02f1d4ff4a87795c803afaff3a5232a300f03919a9bb1f28a18b3039273cb53b76154818249e3ff00af48a4707a63d7d282cdf2e4027b0a9b9631802a78cfb669db7694e324f186ed41db8246581ea01e94d38c28c6727ef66a463918a12bc313c52af2d86e4293939eb46ed80e31c1ea45292108248241fcc530244556600919c707d6a26c16cab63771834ab85518276f217146153b64763da9dc08d98004641e7d290382b8c707a0f4f7a7e7aaf033c8cd34b2eeea7a7eb52035418ca927696078a03069f19271c0f6a5ce369ea7be7b5349dd34986183804fa7b54924acc21f99b9c71c75a85e65d99e002700679a7b6d76e8578ce4f5155c80791c83ed54001f04e3033ea2907de1c0e3ad208f3d881de9390308738a005efc8f7c5301daf9238e7e534996661c034bb88cf73ea695c06edeb9e39a7381918fad3049ce33cf19cd3b209271c8acc0493241e706a13919a9598ede0546f818e9432862e4819ed4a005a4eab430f43c13d28006fa629a483d69d9c0f9b9a46c6781c54dc061e293ef5291cf1498cb522ae237dda18647b5291c0a4da3e940c46ebd690e3bf268fbb42d48013b71d79a6b1cf0385a1c8da7fbd9a6120500293c533f8a94b71499140013cfbd26ea37525400bb681f74d251400fa6e3340e69722800e8286e948bd68cf140094bf7686eb46ea004a28a28002693752d2119a00424d252b75a4e9f4a002936d2d267da80128a28a00285eb451400ee68ebfe347342e2800a5eb494ab81400a0e714b49fe714119a005a28a2800a28a280154e2928a28017f4a5ce2939a0f5a007034e0d814dfe2f5cd0464f1dbd281587ff1500e6901c8a5ce28245ea338a36d264fd69568002293af14ea29dc0456c52d039a300d500ece09231cd28e69bfa52a9e703b5048edd4a1be5a42793cd2d5008188c9ef4e07b521e3a7229168025ebf8518cfb77a6034e0718a09b0e5fad1bb2681d852ed3f81e39a621d4bd303d29b8c734b9e7246735403f232734bb86e8fd71cd3401f5a3193f876a56025914a31f426998e87f9d2b36e45cf5149e839cf5a6019c7bd2a9c718a6b719cf34abd69dc093775a3680c0ff3a1714600a403ba0a70e10e477e293f3eb48c73c5512079a7af2879c73519e314aac064114ee27a9397dea33f7c7427b8a4523af20fa5301190694719e6a80706c633fa53b3bb9351f7c914abf7b2314c5624c0e9cd3b3c7b74a6ae0124b7e14071d7a01eb4ee8072f21b1c0f4a976ee1171d89a862931b86339152a64055032dce695c18291c1c50992c78e01a72a2329e7041e2991e433a9c10690587aa19661c6517a8cd248cdb89da41ed4f276edc678f4a4ddb8f079eb543b7520933e87ea453220dbce57f4ab2ca36fd475a862c95c924fb9acddca5b58910631c9a73c784272777b7a511e4b8503b6ea4ba72cc002071d053b8c6c61be73903de875e873b8f718c52c63f30334d2df81cd00480ae7be690360ee5e4609c537236fab52676ae29963e3392a3a0eb52a91cf7c75aac0e307b9a98312bd739ed41362c28f9f00609eb8a52d83c1c8f4a8c39fc694b1238ea6985871e71c71de98d961c0e941278e723bd22962587507a8148054db800f193ce292452e79e31c6299b8a9190703d3b53c163dc73557102fc8f91da9d181fbcc1a61520919e7da88dc200d8e09f4a402ede14f7ef49bf0befeb4b7370a4214c74e7eb5595c9dd8e49ed4168b3e69c6720a8a715f30e179623241e95503610e06053f7f98a79294ee3b93edda3819cf7f7a8c90a791c7ad476d33157ce779e07348f2b49855500938a007f98d8e4ed5eea3d29d1a8967017eea0273eb5196c93f3e180e9ef4919669013800739f7a61727963e3a7b9c50613215c75ec0544f261cf1b81ea0d48f26ec88c9dbebde80b8b212076c0e29bf36dc8fbc392286c32fdeff001a76d2c085207d6ab410d5725795f989cfd299bb2d82a714a519146d279ec7d6930db9b0dd062a0046cb3a8c7029c496007552738a8d771383c8eb9f434e2af9c839e3a8ef4c5d6e3906f63918f5c531b82307007f11f4a17712412016ed4acce18e71c8c71daa0646a857192320e08a561bb2c280bf332921b72fe445348c8049c1ec3d453b6a35610805b9ebd29d9048e00ed91da99b72770a72304538393d05218e6505c85271d32450b841b48c1ea4fb5359cb95cf04719028790e31d47ad55c42b751c3000f5143b063c678f7a0b0553f36091e94ae72bf28c8c608f7a9188a15b39e3be694822355521475e3bd46301b39c7f434bb82e78079a57192315656009e79e2a20d98f18193fc5407dc0afccb9ee7b50c8f191839c8ebeb48761c0e718fe1ef9a56619dbd3032403c5452128c140c714d5c97c1e0628112eedc40381c70692401940cfcc7f4a693f291efd69ac4b8e474e9ef5421ece63723a81c0c5468dbd989e4e73d291b31aee038f4cd2f99b49c655715221ea483918e7a77a8a4676c0c82bd88a70278dbc13d3151f03e604e07427a53b8815d80ebd0f19a566c824af18ed4dc82338249a693c7068b80a0fcc08500fa0a400316c601ec293eeb900f4ef4c5c727906a6e00ebd0f7e8694601c8e291c95038efcd18e7daa4042377b9a8dfaf4fcea4e77719cd44c5b3cf34d8d0ec63818c7b5358139ec16948273c6291883ce2a6e31801e7b834e1df2714de7f5e9464f38a900c67eb4375a4fa71411939fe54009c5252ff001527434008dd29a475ed4e3f311c71e9487ad0031b93cd34f1d29cdc9a4efed5250dc641a420e3ad29c1c519a063295a83c50dd6a0036d252e79e949400e03149d0d28181ef40e68013752b74a5a46e94009fa52519f6a2800a338a28ce2800a69f6a75328003cd14119a28013a9cfad0d4034bcd00368a28a0028a28a005cfa50d494bfc3400b4bfc54945002f5a75329cb400b4514500145145001452838a4a005268ce7e947f1525301e39f7a5e69a38a5a402edfff005d286e3da93da851b45040e5eb4bdb8a6f1450029e2947228fbb4678a0055f7a3ef7e149c52afd2ac0556cd3a9b8c7140340ac38018a5078a68c934bdea84009e69cbd2980e01a5dd40ec3f1c669548ed4dddc73d697278078140876e3bbd29ea71ef5186a776cf14c9b0fdc29dd3a5463390075a7a70411d6a84382ee07a02053776df5c7b53812c493de9392d8c50038007b8a55ee49e2a300fe34e0e554af041f5148079e01ef40c15f4a8f79001e9ec6955891f5a00914e3eb4aa4f4e3351805589ce7da9431539233f5a6049ec7b51f77be6a3dac4124d07af5cfbd201c5b1dc9a68919dbbe2959491da9635c647f2a00915be8053be6ed4d1d3d3da9437af38aab903f19039ed4aa3181d453036de3ad3f7903a73540481588c91c7bd1850a77039f53da904a78ed8a721dcd83dea8023ce5b03381522c84e090010b8150c32150c077e0e6a4590b12783c6003d6a400b8e48a585fe625867d314c6628bc827dc50645deb93bb8a77027693e6208c0cfad0180dc4631fcaabcb236e39039a44666ff000a5cc04a240ea704f1ef51c6ff002e3f3e29420008e871cd47f7703d3a66a6eca448ac54923ad2b12d939e6a2e57b9a1db80050684ea3e6ebda9319271c03e951abb003a63de9cc481907f2a2e4d87639273923f4a4241405bae7a520040c608f5f7a74870c3047e35450de430c1e454ead86c9edea2a1ced6c0e952a0241c027340128639c673de8070a0e71eb415c7bfd29bb86680250ddf2734d270d9ec3ad26fc83d29a7040e48feb544831192403903a0a5031df1c53108cb363193dba528396eb8a042e7683c9e3d29243b7693c71d283270c718c7ad2b6187271919c7ad302029b86718f4348b9460471ef4e1c2b118fa522b1dc33c0f4a9ba34ba42952380323ad3829c807f974a01c81d80a50bc03c7d29dd11ccbb888e6266e00534c655c92430f4029c58ab2961b876a566dead9ce01c8aadf634f3436355ddb86723a8a955cb4678e3dbbd4624321c121463b0a962e5401d076a2e469b0ddac10657e6069c876c7b82ed34f6191fcf14a46d047248e78a63f3239199ce73c9ef4239693e5214e3afa5260b11d327a535a13b89cf4f4a570f524562ea09f4eb42856dcd8c9f5a306343b88f618a608f18dad8c76a2e1be839e31c65b8fd69922a9276e540e2a680c64b19400a3803fad3ee23802ab23609f5ef4f7d83529a465980ce4f7a98be18921700700f7a8d721fa10334f3f38048ce0e2a6c2232b9657c0561cd0d1edc1c6475fad030c40c7cf92093e9430db1a91df2a73414b6bb237cf2381dfa75a6ca498f0d8201e0e314f65caf1d3bd23918383b87539a16a1a7410becc0ce78e0fa534e4005b07d68c051807f2ed43281b86739ed48159e8295c71eb4fc3aab6dc60fbf26a31c32e0e001de9589958e464b71c52b8fc86a9c303d6949279c007dcd3953605e31ce0fb5058a9db9f9bd40ce6a3d0a8ea314b6d2a7ae7ae283b8807771de9c18863ebf4a419030580ea29f618d08382724fa9a76e2243d391d314fc12482ca0638c546c0071d8d3f2258a3afa734d6215c63f1a538239e839a877ee239207a914efd005de5bb1c939f6a7138cf1803af7e6a30c091d4807ad26d0776738f51de912f5076248ea0639a19cedda4f02914e0e0e40eb4aa402dce38e295fa8866e0381d31484e47ff5e95be6248e3eb49b79e7f2a7e7d0571acfc9c8e9e948589e7a9c53fcb66c900edec314d61f3018e6a6c2ba7b08f9c75fc29031393d38a70078f5cf4a6b46cbcb2903a74a2da5c775d45c1f527fa5464114e6c8e3f5a4c90b90739e286509ce0fbd201cf43475c7278a01233cf5f5ed5035ae8252746a0f4ef9a6a866e80fbd2b06db8a4f7349f77f1a5607b8c534f4f7f4a36dc0376d6f4c5267814532801475c734375a3f8a92801a46ea6b53b8fad33352520a4fe2a5a4c8a9b8c3bfb526334679a50314804db4bb452d1400537f8a95ba536801f4d6a5c8a6d001452f5eb49400527dea1ba5275a0009a426972693ad00149f8d2d1cd001cd3695a933400514514005145140052fe1494ee68001f951487f5a5cf38a005c9a5fbb4de4d2f45a00507a52d27dda5a0028a28a0028a28a00297a62928a603fde8f5f4a4fe2a5a402e703da979c7b5378cd29ec681587375a4a39a50682475228ed4b49eb400b4527dea5ab0141e051d39ee6900a55a0001e3268fbb814adf741f5a6e413e9ef4c62e33ef4abd29a300d3835310e5e868e08a4ddc62956815870e99a78ef8a68fbbed4a33bb03f5a043c0cb0e9d6800673b88fa5354e0f1f9d2839ab20767ebcfbd3b1b7b76cd3475f71de9db830e140f534200ebcf734bc00290e001d3f0a70381f2d30020118c649a028038a76076e33d79a08ce3b0a901141e9fca9476f51c521c2e48cf4e29776dc1c8cfa536005723a7b669023649f4e94f076f5e4fa528618e68023c16ee7e94f40771e7814a30a73eb48bd483eb4807f6e2971ea79a6af383fe4d3c1ebcfe14c811739eb9a704271838fad0071ee6a4c01d4fe1400dc13dce7ad291b40e79f5a03819fe748c4633fce9dc06a004739cd3d5f0180e69919c93d3f0a5e0af18ebcd170149e983934e45f55c8fae0534124fb5395b90bdbd69dcab092360e7bf6a62b73d8678e952b012719200ed4817673c52b31006dabd0fe34a0f39ee38a6bb707078a5e0f4e86914809c2d378efcd2e3f3f7a45eb9c8c7bd058a1b9a702582e3ad3470df4a5c1278381fce801f92c4753dfeb484fcc777eb4aadb58ff00b23348a773823ae7ad3b8ec3d172caab8271dea48d861831031d727bd3594a382fd076ed5192acc7a8047345c2c4e5f0b80473e94d1807d45341daa1875c75a18e01edc76aa1122c8093cf1d80a376173dea289d4b61b8f7c54add3ae79a2e4d86eeca0cd05778041fad35b2380393c9a58c90df4a4215b0720e7d3153794581624f1d7350f5208e4e7d3ad4aec491c73d6ad01115caf425b3dabeeffd897e2c378d3c272f82f52b853aae8880da190fcd2da67007fdb3242ffbac83b57c279f9589ddb9bf5ae9be19f8ef50f863e37d27c4ba6b66e6ca60ed1670268cf0f19f665247e39ed5c38dc3471349c7aa3c9cd702b30c2ca0be2dd7a9f5ff00eda5fb3cdf78bb58f0b789bc37666e2fefa78f46bf08b80cc4e2199b03850328cc4f00257d11e1cf0ee8df087e1cd9698932da68da1d8969ae64e000a0b492b7b93b98fb935d1f87f5dd33c6de0bd3fc43a55d79b617d0a4f6ee47deddd88ec41e08ec4115f25fede1f17069d6365f0fb4eb8c5d5c85bad5cc6c0e220731427dd88de4707013a86af988fb5c44a3867d0fcce84b15994a965d2da17bff005e47ccdf167c77ac7c7ef8a57fac5bd95cddcb74de4d869d6f1349247026422855c9c9e58e3f8998f7ae775cf875e2bf0bd99b8d63c2dad6956dd0cf796134283f16502bf4c7e17fc33f0f7eceff000ae47f26359ad2ca4bed6750540659cc685dce7aed5f9b6af61ee493c5fc01fda5acbf683d7b57d1e6d13fb16e2d2037114667f3d678370462df2ae082c9eb9dded5e9fd7aa462fd8d3bc23b9f4f1cf6ad3849e168de9434bdcfcebd17c3fa8f893538b4ed22c6e754d465cf976967034d2be14b1daaa0938009381d013dab5fc45f0efc57e0fb34bbd73c33ac68b692388527d42c25b74690824286750092149c7b1f4afb5f51f82da47c30fdb0be1c6a7a241169da76bf0ea3235947c2432c56926f2a07dd560e876f63bb1c10059ff828112ff05f48558ff7635e85bcc27aff00a35cf02bad661cd569c22b497e07a11cfbdae22852a71f766aff009a6bf03e27d0fe1678d7c51616f7da2f8475fd5acae09115c58e9934d1498254ed65520e0820e3b823b561ea9a6de693a95d585f412d9df5acad0cf04e85248a452559194f20820820f422bf50ff0061836b0fecdbe1491a193cf0b78c8cad80dfe993d7e76fc7668e4f8d1f100c6a50ff00c241a81f98e491f6992bb68d77526e2fa5ceec0e653c5e2aad094748b6bf1b1c2edc3e40c0c7415d1786fe1df8a7c61199341f0c6b1acc60953269d612dc286f42514f35defeca9f0af4ff008bbf172cf4dd632da358dbc9a85e47b8a99910aaac631d8bba03ed9e86bee0f8fbf1d74ffd98741d0574fd116e66bc262b4d322716f0a45185dc410a4285dc80003f8bdaa3118c74e6a942376cc730cda787c44709868734dfc8fcd3f1378475ef0934506b9a2ea3a34b293b1351b59206703ae03819c566436ed34d1c10c724d2c8c15123525989e8001d4d7e8b7fc34c7c22f8b9e058ed7c657b6b6915fdb9175a3dfa3c8d6ef920ed755e08232aeb83d0f0781e2dfb2bf8ebc1bf0d75ef13da69fe16d73c6dafb5fc9059ea7a3e9c9758b153b518167531973b89e00236e4f1818c71d3e497341a68ca966f88951a92ab41a9c7e49fccf9f97e0bfc429230ebe05f11c9091c3ae937041fc765737a9e89a96837a6cf56b0bad3aee35c9b7bc85a29147bab007d6bf4e34ff881f12b58f1cdbc76bf0e4e95e0a4da27bed76f6286ef1fc4de546efc839dab83bb032cb9e38ffdb7345b0f137c0dbcd5ee2d95352d266b79229027cd9699226c1fee9590e474240f415cd1cca5ed2309adfccf3a8f1155788851ad05ef7669fe47c35aa7c1ef1d68b65737f7fe0af11d8d95baf993dcdd6953c7144beacc50003dcd5587e19f8c6e3475d5e3f0a6b72698d1f9ab7a9a74cd014c677070bb718ef9afd65f17eada469be1bf11ea1e22b33a8e896b6b2cb34663de19225321dc87ef0217a77e95c1fecd3fb4227ed0b0f8866b6d27fb16eb4892213c52cc254f2e4ddb1836d5e4f96e0ae38c0e4e692cca728b946374888f11e2674a556343dd8bd5dcfcad62ab820fcde95da7c0d936fc68f01139046bf60c00e7fe5e63af52fdbb3c1da6784fe393cba540b126b1611ea53a050a8266925472a07af9418fa9627bd7977c073b7e397c3c720b94f10e9ff2819ddfe931f15eb42a7b4a4a7b1f5b1c42c5609d68e978b3f427f6ce047ece7e300010c459e547fd7e418cfbd7e6e6a1f0dfc57a4e8e354bdf0c6b369a66377db27b09522c763bcae31f8d7eaffc4ff19691f0fbc19aa788bc4d1f9f616ad1dc4f1aa2c92165957ca555381bb7ecdb92307072319ae5be08fc74f0dfc7af0eea92e9b69756cf673f9373a75d2ab158dc1d872090cac030f5cab0c6393cf46ab923f30cab38c4e598394e3479a1cd76feed0fca8e07b13d6ba6f0ff00c33f1878aad56eb47f0aeb5aada303b67b1d3e695188eb864522becff0e7ec93e185fda7f5996e74c47f095ad841ab5ae96c03442699e4454753f7a30d0cedb7a7dc0720107dafe28f8a3e23784ee34ab3f87be04b7f115b8b70269e6bf86da18b048589119d4f00673d0640e79c7ab469f3fbd23e9715c551f690a3858a94a493f79a495d5f767e576b1a0ea3e1fbe369aad85d69972ab930ddc2d1480648c95600f507f2aa2b92c00c01ed5fae1e28f86361f1e3e18dbd978ef40fec7d52e6dcb2c092457171a7dc74dd1ca84a91900f5f99480c07207e4d6bfa3dc78735cd474abbe2eec2e64b59540230e8c55bafb834ebd174ad6774cf6325cea39ac6719c79671df54fee68aec379392471c103ad759a47c1df1e6bba7437ba6f82bc437d6732f9915cdbe973bc722fa8654208f715f4ff00fc13e7e09e83e261abf8e7c476a9a9fd82e8596976d346b246b7015649246523058078c29ed9638c8523ea3f899e3cf8b1a1f8a20b0f057c2db7d7b478f693a85d6b36d6fe68232d1c68ce0a6d271b981c907031827b28e0954a6aa4defe479798f12ba18b960f0d05271ddc9a8afc4fc9dbaf0eeaf0eba344934dbb4d66499605d3cc0e2e0cac4054f2f1bb7124003193915b7acfc1df1f787b4eb8d4b55f05f8834dd3edc0335ddde953450c409032cec800e481c9ef5fa8bf1dfe0969df18be1fff00683d81d2bc65a7da8bdd36eb720b9b4ba55de216910905777ca705973f32f201ad1d36eadfe3efc0966b668e34f11e84d1cb24677ac32cb11471f549370faad75472b4db5cde8796f8c9a842a2a496b69ebb766bd75fb8fc96f0bf80fc4fe366b95f0e787355d78dbedf3bfb32ce5b8f2b7676eed8a76e76b633d707d2ab789fc2baff0083b505b2d7f44bfd0ef8c6255b5d46d9e090a12406dae01c12a467d8d7e967ec07f0f67f07fc11b8d46e50457fadea73caf94daf1a40de4046f5c3c729ff008157987c33f07e8ffb557ed55f113c63af795abf87bc333456f6b64e43c17582f144cc0f0632219242bdd9c672320e7fd9b78435f7a5fe47a3feb4255f13787eea8ad5f56ef6b7de7c6ba0fc2bf1a78a6c45de8be12d7356b36c95b8b1d3a69a338383865523ad60eb9a0ea7e1cd41ecb56d3eef4cbb51936f790343201eeac01f5afd75f8a7e26f88be15bbd3ac3e1f7c3ab7f11da0855da79f53b7b48a01bb1e52c6cca49c0ce78032319e71178dbe1b69ff001e3e1cc763e39f0c0d13549e021adda68ae26d367e9ba29a3241e403c1c3290187256bba5934649c6137ccbcb4fbcf1a9f1a4e3cb52bd15ece4fa49392f55bfe47e5668bf09fc71e28d36db52d1fc21ae6a7a7cf9f2aeecf4d9a58a4c3153b5d508386041c1ea08a8f41f863e2ff00161b93a1f85b59d596090c529b1d3e6996371d51b6a9c11e879afd3afd953c3373e13f813a0e8f7be5ade69b75a859cc15b237477f3a363db2a6b37e25fc74f877f00f4dbaf0cdbeb3696fabe9f6464b3d1edd2473e66dde892b22908ce4824b904efc9eb9aa8e4f4634a152ad5e5d35265c638a9e2ea60f0b86e7945b4acfa276bbd0fcd7f137c29f1af83ec5af75ef09eb5a3d92b2ab5c5fe9d3411827a0dcea064f6151786fe1af8bbc656525de83e17d635bb4493ca79f4fb0967457001da5914807041c7b8f5afd45f8e1a1dafc60fd9ffc436fa639b9fed0d2c6a164d190448c81678429e9f31551ff0002ac9fd91fc276ff000d7f678d065bd78eda5bdb79357ba91890a564f9918e7d21118ff80d2791af6dcbcef96d7b8971acfea2f112a4bda29f2f2dfcaf73e5afd8d7e01ddea1f12f588bc7be04bc7d2e2d2e408bad69f2244b71e6c25402ea06fd8cc40eb824f4ae9bf6d8fd9fe1d2e2f09cbf0fbc092ac7fe98d7dfd8ba7bc9b401079665280e07facc67fdaf7aed3f645fda3b58f8a5f14bc53a0dcdadbae8eff6ad62de5656fb52e678d12366de576ac6d8e173f28e7d7a4fdb33e3f6bdf0534df0edae8d63a6dfc3af2dec7707518e5664541081e59491319f35b39cf41f8f646960d65f2b4bddef6d77479b531d9aff00ac74a0d25271f8799f2b567afafc8dff00d8b7caff008669f051242362ef25bfebf27af82fe2d7c3ff0013f8bfe347c469f42f0f6a9acdbc3e21bff326d3ece49957f7f21c31452071cf35f777ec5ea17f66ff00066572ae2f38ee31793f3577c29fb48783f53f8b7aa7c32d2aceeadf5486e2e4198408904d7085e49c0c36edd90ec588e4863e84f455c1d2c561b0f19ceda2b79b68f2f079ae2f2dcd331ab428fb4b4a57d744949ee7e6ff00c309eefc17f18bc237379a56a125de9badd9cd269d0db13752324c8de5a46704bb630178c92057da3fb53fc78ff84cbe04f8ab463f0f7c75a19ba16b9bed6745fb3dac5b6ea17fde49bcedcedda38e5881debb7fda5bc25a5cde30f837e2916e91eaf078c74ed3dae1570cd0bc864dadfde0ad1647a6e6c7535adfb6c37fc63478df77247d8fe6c7fd3e415c30c0cf0b4f114e32d12bede47b15b3ba19a6272fc4ce8fbd2969ef3d1a925f3f99f9b11fc19f1f5ce8f1eab1782bc432e9b2422e63bc8f4b9cc4d115dc240e13054af3bb38c7355740f857e31f1469ed7fa3f8535ad56c7247da6cac259a3c8e08dcaa471f5afd61f84b6f16abf02fc076b7312bc32f86ec62742701d4db46083f85703fb3a7ed39e1df8c9e26d67c29a2e82fa2c1a3dbf9b60cae3cb9ad91d6327605022c6e8f0993c37b5651c9a8a8c1ceab4e5b1df2e31c6c9621d1c2f32a4fde77d95daedf91f971716f24133c32a3452a3156471b5811d4107a1aeab4df845e3ad6b494d4b4ff0006ebb7ba7c89e625ddbe9b33c2c9ea1d50823df35fa2ff0013bf67cf0f78ebf698f04ebd7d6505c45fd9d7779a859b20d9786d9a048b78fe23bae5739ce5630a78ae93f690fda5b4efd9df47d16e1b476d56f75199e3b6b48a7f215638c2ef62fb5b18de8318e7776ac3fb1e30e79d79da31ea74cb8c2788787a382c3f3d4a8af66fd7afc9fc8fcbff000ffc27f1bf8a74e5bed1bc23ae6ab64e5905c5969d34d1920e1806552320f07d2bebaff8270dbcda55e7c4db0bc8a5b3bd824b18e5b69d0a488ca6e432b29e4107820f43d6beb4f84fe31d13e20f80b4df15f87ed859e9dabf9974d0b4411c4dbd965dc0705b7ab648ea79ef5f257ecadac0b5fdaebe2be972b0115ecf7f2ed2700c91de7cbff8ebc95db432fa581c4d1a8a574eff0091e56373baf9ee5d8fc2ca8fb39534baeba495d3fb8e47fe0a41710c9f11bc2a8b2879974825d31f754cf2053f8e1bf2af914f5c678af7bfdb8b5c6d5ff686d6adb7ac90e9b041691329e31e589081f4691abc0faf19cd7ce667353c6d4713f41e1ca2e8e51868cb7e54fefd44ce29ac09efd29e739e6995e59f46267a1a5a28ea3ad002119a61e3a54879a8d860d49484a28a2a4626d14b45148028a28a002994bfe341fba2800f7a1a86a4a0028a28a0029bdb8a56a43da8003f5a43fce8a2800a4ce78a1a86a004a28a2800a28a2800a28a2800a5dd4945003b9a33cfff005a93ef52f34000f5a5fe1348dd281fa50028e7e94bf76933ce695680168a28a0028a28a00297eed251400a08a5037522d3a801077fa528c77a4feb475a007638fad2d3739a771d714102af5a5fca9b4abd68017753c7ddf7a6d28231fceac05fcbf0a4fbb42d1f7a8002dd3dbd682463eb4a4ee3fd2919734009d3ad4800cf1c0a62f5a7edaa01339a14f341e3eb40f4340122e197f4a551b59a90282b8ce281c36334123b76719ef41240e94801078269c00ea6ac91aa481cd3d4f3d28a3bd0843c640c76a507904f14ce681d41f4e68024cf3c1ce7a1a7641eb9cd3172282dc71480713ebeb40254f03fc69377f2a18e4ff853603c800023bf7a55386fa7151e4a9eb8f6a7e777279f6a0053fdeea7a520c2e7d6918e39a236f94e7ef67f4a00903138ed9a55fd69a0ee5fe54e5c81c91f5a081ea70090466959f7633d7dea20727d8539640467bff3a0ab0edc01205319bb1e82937718e334311b78c163fa503245c08f8193d69aac707b1cd315f190c32a3bd2a49bb8e8077a0095542a9ce727a5349db8349d738edc628dc48fbddfa7ad00481b3d38a5dc3bfe15182410475340e3f1a77603f39e2954e063f5a6061dfafa9a68932481cd03b12373cd04e475c5203b464f5ed40341428fbc3b0a7280475c679a686cd1dc77a403ff00e599f535247fbb1c8ea3f2a6ae4f038c727d281d319cd03b8e2dbc9c939c74a8e550a80743de9a3218e09cd3faa7a50171cb928a7af18a5eabc9e9d298870807f3a13a9aab8857900da0607f5a50c70707b7eb4cd9f39c609a02e0f1480981010647d69c0a85c751ea6a1c91907ffd54ecf39f6e6a89b0f8df0558f6f435399392f92081dfbd55c9098edef528391ef8e0550584f33bb1a72b65436703b66a3543206ed8e94290b8e281a47ea57ec63e55c7eccfe0a89a5c7ef2f094c75ff4c9f8af8aff006d08121fda63c611e320359e09eb8fb1c18af36d0fe2b78d7c3761069da478c35ed2ac2024c36b63a9cd0c5192c58ed4560064924e3b926b1b5af126a7e29d6ae352d6753bbd5b539c8335edf4cd3cd26d0146e76249c0000c9e800ed5e7d0c2ba55a555bdee7cde0f299e171b5715292b4aff008bb9fab9f0ff00e24784bf688f83b7ab69344f3dee9e6d358d3fccc4b6cee851d31d707e6dad8c11cfad79cfecfbfb2cd9fc0ad6b53d61b5ff00edbbbbd87ecca5adc40b043b83b03f3b6492a9cf03e5e9cd7e72d8eb97ba45ec37ba75ecf617909f92e2d2568a453ecca4115a5ad7c4cf18f892d5ecb55f156b5a8d937ccf6f79a84d34671d32acc457254c054f7a309da2cf2e7c3f5973d2c3d6e5a73dd58faf3e21fed0de15d73f6aef017d9750865f0e787dee6d25d53cc06069ae6231b10dd362feec17ce3863d064fd11f1c3e0de9bf1f3c027c3b71aa368d243751dedb5dc5179a11d55930c991b8157718c8e707b62bf26036485048c76ae9ed7e2878c74dd2d34cb4f166b96ba62a796b650ea5324417fba103600f6c53965fcae32a2ed636adc3cd4a94f0b5395c15b5f5bfea7ea87c1bd0741f87df0f6d7c2fa36a26fa0d1e46b36b8dc3124db8bca1b1c03bdce476e9d41afcc1f8e52337c68f1f64e776bfa81caf3ff002f32564e93f133c5de1dd352c34af15eb9a5d8a96716b67a84d144189e4ed560327b9c573f777d3ea37b35e5d4f2dcdccf234b34f3397791d8e59998f24924924f5adf0b86a9466e5277b9dd95e5357015ea55a93e6e63d9bf64df8b7a7fc23f8bd6da96a87c9d2750b76d3ae6e7afd9d5d918498ee03c699f4049e7183f71fc74f803a5fed2be17d0dedf5d8ec26b676b9b2d52341731491481770c060086da84107f86bf2cc10dd78ec0d6fe83f107c4fe0f8da0d13c47ab68f0b7263d3efa58149f5211853c461652a8ab539598f1f944f11888e330d3e5a88fd0293f66df841f063e1ca5c78bac2cb52361116bcd66fa468dae64249f9103f7e8a8327a0e4f276ff639d63c31aa7c2f92ebc316b6b63249ab5e5c5cd8263740cd3b9851b3c9c41e50049fe1ebc1afcd6f10789f5cf15dcacdadeafa86b13203b65bfba79d97e8589c52787fc4dabf85ef7ed7a36af7da4dcedda67b1b9782423ae3729071ed5cd2c0d59c1f34db6ce0a990d7af4250ab5db9c9dfcbee3f4d3c51e17f8a537c523aceafe3ed2f4af8791dcc771fd9f044b1ceea186d89d9d3a33614912720e028ce2b3ff6c5d3cc3fb39f8b8a3091116cd8bf71fe990715f9d9ad7c48f1278b1ed9f5ef116b3ab4f6ec1e296fafa59cc64742a5d8e08f515735af8bde36d734f9b4fbcf1af88af6c2e1765c5adcea93c91cabe8ca5c823d8d65fd9d2738cdbdbc8e68f0dd5556955738fb96d95b63f4ff00e3247711fc25f889e7fef15f40d419727a7fa3c841af98bfe09bea92cff1141919640b60c33d1bfe3e7835f2e5f7c65f881ab58cd6377e39f115dd94d13412dbcfaadc3a491b0c323297c15209041e2b1fc37e36f10f833cff00ec1d7f52d13ed257cffecebc92dfcddb9dbbb630dd8dcd8cf4c9f5ad21809468ca95f567451c8274b055b09ceaf377fc51f45ffc144ae04bf19b42619f97c3b0063ea7ed1735e23f033737c6cf00147f29bfb7ec70dfdd3f698f9ae77c49e2cd6fc617c97baf6b17fad5da44214b8d42e9e791630490a19c92002cc71ee7d6b3ec751b9d2afadef6c6e66b2bbb6956682e20729244ea4157561c86040208e457a14a9ba749536cfa3c361254706b0cddda563f5b3e37783f44f1af84eebc2dafdd359dbebef1c16f202037da3fd6a152782731e71df0477ae57f676f80f65fb3be93a82dbeb0758bebf96396e2796dc42b88c304509b9b18defcee3f7bb57e6e788be2878c7c556b1da6b3e2dd7357b78e412ac37fa8cd3a2b0e8c159880464f3506a5f143c63ac69a74dbef156b57da7eddbf64b8d426922c7a6c66c63f0ac2187a907a3d0f8d5c338a541e1a35ed093bb563edcd17f6b2f0e5cfed3dafd9dededba7872f2dad74bb6d5c3810acb03cae32dd0465a79943f4e10f4248f57f8cbf0ffc7be32bfd2ef7c05f1066f0c6d8c2bdb91bade65c922456504eec123a10463a639fca85191d7b7e75d4f87fe2978d3c33631d968be2cd734ab38d894b7b2d46686304f5c2ab002bd2a751c1599be2785d7b4856c34d294525ef24d3b2b6ccfd21f10786d7e15782bfb7fc5bf19bc5a5eca2264b88a5b48a3b89b04ec862785c9638e17731f7ef5f991afeb575e22d72ff0054bc965b8bcbfb992ea696620bc923b16666200049249e00fa0a5d7bc4bac789af05d6b3aa5dea9727a4d7d72f33fe6c49acfdc027cadce70491d3e95ad4abed2c8f7727cae596c652a924e6fb452fc8fb6ffe09eff1bbc3be1ab3d5bc05e209a2d36eafaf45fe9f753ca12395d91237872780dfbb42bfdef9875033f437c5df849f12fc49e2e8b55f047c4b97c2da64a91c73d85c5b895148e0c90f1d48c654e3904eee703f2715bef617afb77aecb4df8d1e3dd174e8ac2c3c6de23b2b3846d8ededf569e38a31e8aa1c002bb68e3953a6a9d45b799e2e61c34ebe3258dc3cd272dd4926bf13f40be385bffc28df873a96b1aafc5cf189d68c4c34fb36bcb506f2e76e1404fb3eed81882dcfcabdf38cf39ff04ddf88526b9f0ff5ef08dc4e5e5d16e05cc08cc00f226c92a3d42c88ec7feba8afcfbd73c45aa78975296ff54bfbad52fa73f3dd5f4ed34b263d598926a6f0e78c35ef035ebde681ad6a1a1ddcb1985e6d36ea4b79190904a1642095c8071ec2a96636ad19a5a2f31cb8679f2f9e12534e7269dec95ade9f3fbcfd74fda07c7f17c1ff00823e2ad72ca3fb0cd15b3c561f675184ba99b6230078e1df79f606be19fd82fe3768df0b7c67ae68dafcab6361e248a2417f2c812386688b940e4f015848e37678217b124780f893e2b78cfc69a68d3b5df176b9acd80904a2d750d4669e20e0101b6bb11900919c7735cb81bb38c018c64d3ad99395785582f87a0b01c2f4e865f5b075e7ccea3d5adfcbee3f5cbe37fc3df1ff008c3ec177e04f1dbf85a7b75c4f6b244b2c33ae72ae1b04ab004f1c83c74c73cf78ab489be17fc3c1adf8cfe2ff0089a17b787334d09b2856e25c13b218dadd98b120e17713ea78cd7e6be83f16fc71e15d3d2c346f18ebda55927ddb5b2d4a68a31f4557005647893c5dae78bee92eb5cd62fb58b955dab35fdcbccea3d01724e2bd296754ece4a2eefcddbee3c8c3f07e229b852a95a3ece2ff0091733f9bb9faa3fb276b53f883f67bf0beb57972d3de6a177a8dd4ef2e19de46be9d8962000724e49000f615f9b1fb42dcc975f1d7c7f23b348dfdbb7c80939c2aceeaa07b00001ec2b2f41f8b9e39f0be8f0e97a478c75ed2b4e8377956767a9cf1429b98b36d4560064924e072493deb9abed42eb56d467bcbcb896f2eee246966b89dcbc92bb1259998e492492493c9cd79b8ac72c451a54baa3dfcab21795e3b118c724d546da5db5b9fa4dfb05fc406f1b7c1e5d0a79524d43419dad1958e4fd9d817899bdb9741ed156a7ed85e348be1afecfba8d8d984864d491345b25519558d8112003d042b2007b12b4df845a97c0ff84be1c33683e22f0ce9136a10c0f7fb75b59657755e321e566182cdf28f53c57c8dfb687c7ad37e30f8cb4fd3fc3b72d75e1cd191d62b8dacab3cce4798ea1b07680a8a3207463d08afa8c462beab80e59cd39dada7f5d8fcd705954f33e22788a74a51a2a5ccf995b6fc357f81b5ff0004efd4adec7e376a714f2a472dde8b34302b3006471342e557d4ed47381d94d7d4dfb5e7c02b7f8d1e10b3d50eb1368f2f86edef2ed545b09d254645664237295398570727193c1e31f97da76a175a55ec37965712d9ddc0c1e29eddca3a30e8558720fb8aec67f8e1f116eace6b597c79e2492da5429242dabcec8ea460820be08238c57cee1b30a54f0ce85685d33f40ccb87f1388cd2199e1ab284924b6fbfef4cfd15fd8adb6fecdde0e23e62b1de1c1ff00afc9f9af973e12b13ff0506d4c8201fedcd739ff00b67755f3f68df17bc6de1ad360d3348f186bda669f0ee11dad9ea5345126e62cdb51580196249c0ea49ef59163e2ed6f4cf1136bf67ac5fdb6b8f24931d4a2b974b9323821dbcd0776583364e79dc73d69d4cce138d04a3fc3b7e0461b866a51a98e9ba8bf7ea56d36e6beff0079fa89fb4a4a5acfe1392b8ff8aff49391ff006da8fdb5b2dfb3378d189049167d3febf20afcd3d53e2f78e75e5b3fed2f196bd7df63b84bbb6175a94d2793326764a9b9ced75c9c30c119383cd1af7c60f1d789b4bb8d2f58f196bfaa69b3edf36cef3529a5864dac19772339070c01191d403daba2ae710a9edbdc7efab7e079986e0fab45e16f553f62eef4df5b9fab3f06f7cdf05fc03188d40ff847ac0fa96ff478ebe27ff8270b7fc5ecf1074246813707bffa4dbd781e9ff1bfe21691656f6563e39f11d9d9dbc6b0c36f6faace891c6a0055550e005000000e80560f86fc65af7832fa4bed0359bfd16f648cc2f71a7dcbc1234648250b21076e554e3a640f4ae7ab9ac2a4e84b95fb9f8edfe47761785ea50a38da4ea27edf6d36dffccfd35fda1be30597c18f8b5f0b358d50345a1df45aae9f7b2052ed146ff6460e00e485748c9ea7686c02715bbf183e16f803f68af08d8dceab7ff68d3ecc9b9b4d574abc8fe456c07c484326d6da33907ee8e98afcd5d17e28cfe22f1968175f136ef57f1cf872ca5713d8df6a33c8e2375c39898c80ab708d80ca18a282715f5bc7f0b7f654f885e1a8a4d235db2f0d49290ed336baf6d71181d50c774ecbff008efd0d7af87c77d69d4ba8b8bb7badd9ede87cbe3721594ac2b8cea2a904d73c21ccbe27bea9adfe68fa83e11e9be18d1fe1fe97a6f84648ae3c3b6a925bdb4b04be6212b23ac8778e189903e48ea735f1d7c0ff0080be12f8d9f16be34af8ae0b99db4dd6b65bbc172d195f327b9de4e3ef67cb5eb5ed1a87ed09f08ff676f86769a278775fb4d6ce9d6ed1d8e9fa6dc2dd3cf2649264923ca296725998e3a9201e057e75e9ff00157c5da1eadabea3a3788f53d16e7559bcfbb6d32eded84cfb9981611b0ce0bb633d371c75a798632852951e64a5cbbae9b587c3d9463eb43192a72953736b9672d1bb4aedfcd6e7a7fed91f08bc35f067e23697a3f86239e0b3b8d2a3bb916e2632b798d2cc8793db11af15e04a3a8cd6d78a3c63ae78daf92fb5fd62ff005bbc48c44b71a8dcbdc48a80921433927196638f73eb58bc57c6622a42ad694e0ad73f5ec0d1ab86c353a55a7cd24b57dc5eb8e79a67e14e23af6a6b5739dc1d3140341e3ad36801d914d24519c523366a4a128a28a9185149b452d200a4da28e286e94009f7a83c52ff0011a46a0039a4a28a0028a28a0029b9cf4a09a4a0039a4e697774a39a0039a39a4fbb4940051451400514514005145140051451400b8cf3403494ee68013f952d1450028cd2ad20e2956800269693f8696800a28a2800a297f869280157ad1ba928a007639cd19148d46da00767f3a0371451400ea5c9a603f95383714ec2b0abd6947b1a4eab4e032b4c9173f91a33f85263f3a5c7191de980abcb0e69719ed834d5a3391ce680140fc734bdff00ad21393efd29739c74e94c0503a5280377634838e4f6a556e739e4d17247939393fa53411f5a01ea4f346ecfff005a980a3914fe833dcd301201c1fce9e70081d4fad588696e08fca9ca4fe54d2720e0723a530649fad40c94e48c53bef7d698a49a42e57b504d8941c74a339fc6a2de547228f3053192e7938fd6947ca6a11260f07f3a76e1d4914db287f427ad395b3eb5186078a556c5171129191ee28079c014dddd39a5518193c669900a78f4a7eeebda9a70c47a773402a01e0d301ffad21395c7e949907d33499e6801e49c0cfa718f4a6b30edd3d68dd9eb8a6642d201f907800e052a9c0183ee698bc739c669dca904f4c76a0b1dbb6e4e0d387bfeb51ed14e192bebeb9a04395f69ea7da9c0923ae0f6a8f81fe1401f9502b12b7cd9c724d42bf7aa40703b8a45e1cf407ad22878ce3e9406c631480f524f3428ef40871e7bf3522e19b9e951f523d6943119e314c0972bb0e33f5a4c80bea4d3178518a776c8ed40c41c31e3f1a3185ea293d79e9d68c601f4a0761cb92314a0edea79a8d79c639a7738f5e680b0f1c5217cf5fa537a01d29467764e2810f42bd0d29e5b239cf7a68e3a8a7ae3e5c1c0ee4f6aab80142a47f4a91f1cf191f9546ec39208c679f7a52f961cfcbe94ae04a832d862403d8534e11be53914170c5b23e98151e4839078ed577014b938c1031cf342e412491bbd69a652c4f009c534301ce79a41a21dddb34d6cb1037727d69ca46727e6e291881263b118e94d00a8a554927934ddb8070def9a562368e78f5a100661df14b401645e07723ad2ab64360f4e8289941381dfd29a1446a3248cf6a760db41e793804fae693a93c74ea691413c0e98e4520c87eb8c0e94f40f32565e09ce48ea45376607b8a54259718e9c9a09dd8e4b7b51e6033690dc0e4d2e06783907a1140fbbfc409e98a42f850b8e0763fce900d3ce3039e9c52a2e54ef38f4a491fa918073da9accbb39196f5f4a34dcae961ce47002e38e6a33cb1cfe58a0e4700e47afa529da7e5271ef521e647bb924f39e95190acd4fc01270720719fe751e02923a807148078c819c814e232003d46715107edc8079e681263031d38a4038bec5c63807838a9378761d0e79c54264c05cf4cd2a7ca4e082bd88e295c3cc9149c6707ae45231392707e82818ec793df34edca3bf4e81698c660282c4106a32c5b92793eb4f67de55b249f4a8d8f04e38cf5353776b08339c123a526e047a9cf4a0fcbdb39ef498e3d7da8db61bd7562b310739a696e3eb477c668620f4a2ef7006271d4e28cf239a4e33c9a4cfcd8fd69dc5aee2ee2010690f5cd35739eb4a793d68beb715900245381ce38cd260104e707d2931b875c8a2e3f4132379c83cd1c03c73de8da3a9383eb49c9e80d48099181d8fa504f1fe14dc9c9c8a737d29808a06339ffebd1c1079a36f009a0a91d3bfad170109eb8cd34311f7694939c77a6b5177b07909927af3483f9d073f8d3771ec2906db0e271cfad349c1f51499268ce41eb45c62e7d293aff851cd3681031e28a293d280109a29368a1ba54157168a4fad2d485c28a45e94b40c2932286e948d400945145001451450014514dc9a001bad2528c52500149fc347f152f34008d499a566cd25001451450014514500145145001451450014bf8d251400ef6a293ef52834007f3a5fe54993476f6a005f4a753726957a5002d148b4b4005145039a002978a3eed1ba8001f74d0d42d28e05000786e697230293f9d1f85002d1406e28cd580aad8a7ab7bd474520250783ef4bd17d6a30d83eb4fa648bd31cd1fc540ebeb4bb45021b4e1d29b45003d49c9e7f3a728dc6a2ddeb4e53c0a092471824d18ff229b9c8e38142d3b88701f4e29d8e7934d51b8e29d8cf538e698c7d314e0e714a0f6f4a338e7a50019c9f6a6939fc29769a677f4a005c6eeb4018078cd253b01ba52b95a0d0327b8a79031f5a600776052e4739a602f4e9dbd695493d29a002463f1a7861d31c7a8a421fc83c8a7863d7a9a8b783c775f5ef48dbb20f414c44d9c1208a339c5354ee1ed453207e76f51485bd3bd274a3a9a63b0a0f1cd070693a5193e945c43938279c7bd3863f014d527ea29dbb27a5328500373c9f6a53c9c7f914ab26c604707dbb52cb2efea013eb8a05719b8119a729c723d3b5460f27d29473d3bd0172456ef4027766a304fa8a42e7af6a02e4c4d05881ea6a3de78a40e49cf5a0449b88e7d4679a76eddf8d4664046e2403e8282c43039e9401601c76a15b923db351231c64e7fc29c8a4b139e9e94163f3c9e314d2e33b7b504f040e4fb54401241ceda07724442ad93c62a42f86e3838ed4c5391d7ad382e5b9c6680b8bb8b1a48d7273ce73d4d3b03d7f134aa428c502241ce769fc6930319e0e3d293231cf22980939c639e28024de02e31f852eef98f18f4151ae41a4049071c53193a36edc08ebd067ad32540a7239ed51464af39e73d29ed219011c6deb542230ecafc0e053bb7ca07e748c3e949818c6281e81bb1ce3ad286cf5e7d07a546cc7763f3a722e483d075c9a403c157ebc76a747c1e38a66c033814f070a46381cd310e663dce31d8530f04f704e719a6972c3340930b8007e34ee31e1b6e7d3d69cdf2e7239a883eec8e001eb4bbba9cf3fce97305896320b13ebd29c72c46768cf38f4a891860647ca3b53c36e040180be94730584ced1c01cfad46f9cf279ed4f2c46d240e79e7b5460e18e47143620c8ebebda93391b7b1a8ddb0491ebc1347984e0f5ed81537287f43cf34c92424e314d6739381807b9a6e7e6e4f4f4a403597693da9727ea4f19a0b720f39f7a368d800ce473cd40081b8ec7da8238c9a52081fe34d19e7d2aae03d8e338ff00f552aa800b127eb8a40a00c9ce49cf1e94a48e073cd480ee9818e7dea32d87cfe82977e49e0e48a6ab8c907f4aab80a5b9c819fad3598a927b76a5271938e7da99bb7007a5480aad93c8e45285c83ce0fbd349c734a4f1902801a08c9a6b1dcdc0e9c5292290904d002e3bf5a4392324528249c9fc85358e178ce3be280100c77147381cf141da473f5a4ddc75c6290033138e94e5269b9007039a33863d2980ad96f7a4e7a13f8d0d80726928011bee9a407907a9e94ecf5f7e8290f071d69001e063a1f4a466c36077f5a370c7539f5a463819ce69803367b534f20114a0f19efe94d61c8e680026907ca00a09a4a003f88d1d78eb499c0c5079a006e3b51477a42690c093484e7de8a2a4a0a4c8a5a6f4ef4880dd4abd29b4e5e94862d1452678a0a03e949f7697a5368014f1494514005145235001ba93f868fe1a319a004ee3342fd28edd28e68010f2d4351e949400514514005145140051451400514514005145140051451400529e7a5252fdda005f4ef4a4e718a4e7d68a005c9a50693f8a8efc5003a8a45e94b40052ad25140052fdda3751f7a8001c1a56e949d0d0cb9a005c7e347f1521cf734671400a1b9a51c5206a51d69dc05c61a82be940141ebed5402639eb4ffe2a68ebeb42e3bd021e1860d28271e94c5385a71279a09168a4079c52d00200334f009cfb0a605fce9dcf38a042b60631cfad34311f4a55a53ee2810e53dfbd383722994aad8a603f77e0694723151ab6694673ed45c07671f8533764fd6971d734dcf3eb4c685ddcf078a0b6075a46fbb4d639a063c3647a7140383d8f3d2983e5e314e0303af1400f07d540a5186c60e3349bb270714ee3b0fc05002eddc39c52e3340ed416e6824764e0501b8a6af4a5a005ce4f5a5cf1fd29b4acc14649c0a005a318ef4c122f3839fa526f638c0a09b128ce38a5048a453d3f9d2e73df9a0635ee443d7f9524770b2f7e7d295915c72b92298b6ea8fb8647b66819293839a507bd2753c818a58d739cd55c811b27eb474241eb4f5da4e0123eb4be583b8ee04d1701839a5e8050a842e48e286271d28b942038ed4aa777f5a606e29ca71cd17247e093cf14e46201fca8054f24fe142fcabe805172c563b47f850c770e0734879c9ee687046549c91de8b80231069d9ca819fc299b4919a7f000cfe945c0786dc08238f6152291ea38a841f4a7819a9024ce79231f4a69c67ae00e98a14e7383ef4d90f3c0ebfa568807860cd914848da4823834c66e9cf14a147d68287e0e33f8d2a1db8f4a43c81db14b83803b75a61a0e9605c0643903afb5463be013f5a7872a0f38cd213c640c0f5a0923623a763e9da98bbc9e78f634e0a704f19a760fde0d9a9280676f3f9505f6000fd7140e7ad18cf24e698ac376f3d68cfca79e7dcd29c6698791d31f4a9b8c7038e4f5a0107183f5a68504f5e280bc5003f760f1433679fd051c01cf4a4dd939c6d1ed4c05dc76e3272682723f4a68257273d7d697276e0f3ede94c064a72b8e318a4672d8270081ce3bd1dc7719ea29ac030e9f8d4dc0114b1f5cf38a1f2b9c8fad2c4c50923d3143658119ebd7de980a23c72ce171c0ef4d0dc73cae7ad2105703ae39a5c705b239f6a801a41f5e0503393dfeb41cb0c9e5ba6076c53c285239f7a004c6c6c3119a42fce7201f4ed51e18ee069db495e7a8a0030703ebd0d1dbbf1d69546793cfd694f523b77a0ab0ce98fe949d334ec8c7a7e14d639c64647ad016118f1c74a0313c67a76a0a8ea7b76a060f5c8f4c5048dce07bd348dab4303f89a4619383d6801d9c8348a76f41c1ef42e3e6cf3f4a6f036e3b1a0073038040c83e9480ed19c5286031dc771519c73803db140c50d838c9a693f3607e748474ef5267763f91a450c3d714aa68cedef4c5c531121e83a7348c70c36fe349ba90104d048a7a03d69bd3bd293c525000dd69090694ff003a43839cff00fae801338a6f40318a19ba8239a419ef400add2932683eb4948614d26958f6a4a430a28a2a42e3297ffd7494fa448dfc29722968a0a0a6fad1f7692818a7ee8a4a28a0028a28a00293b7347f0d27f0d001c9a1bad1fc228edeb40098ef498f4a5a46a003ef5251450014514500145145001451450014514500145145001451450014ab494b93e9400734ab9a4fc285a0051f952af5a41cd2f6e28017eed2d373e94ea0028a28a0028a28a00297ef5251400a4e6928a72f4a006f5a55a5c77a3f8a80168cf638a00a3f1a7701cbc93eb498f9734741f5a0f4f6aa01472452e703a71499c8a50011eb4102919fae3b50071fe349d38c75a4cf38a0078fca955b8c0a6af4e7f5a55fca80141c5380c0e69beb47f0d02b0ea06714858e6909a04389c679a50ca57d0fafad30f231d680bc503b0f246df7a6e79a518cf3d2907e6298c3a8a43c9edf85079c528c739eb4805190003da86fbb81411d3d290f0334c051dbfad3d477a68c7e1481f7360671ef4c0994f5cd26efc4fa1a4070bf5a4c9a421e01cf4c50ec550b019a4562063afa53e9886a12ca09ea7d2891032e0fe94abd29695c06470ac67201cd3c7dda2827239a601bb3de9dc679a6760460fb53948a007138c6383ed48cdb549346ee382293d7279a0085ee82498da6a549448bc1cd359039e707dea38a310c873d0d4ea05b59360cf5f6c52821704f43d6a3ed9fd69ec0a819e2b4b1361eac0672411e9d2872bb3b64f4c1a8df1eb9a6f514582c4c141073951eb4d036838e474cd440fe5522b6dfc7b5485829e0839ce7f0a60619e41fad3bbf07f3a0649b972a072734d623764671df34d20f0d8a0f23ae066aac2b8e46dc01ed8a93829d7351f0aa7078a703e99ebd2a42e491b6e1ef4e3dea35c723047bd38be393d474a6914397be39fa5231c7738f6a4dbb58f4e69ca06dc1393ef4c111e39c8e94f2d92b8e87af141fbbc0a0823a9c64505003b7239a553b8f1fad006dfa52fd38feb42014669db4cbce0f03a7ad317ef0e40fad1b886fbd8aad056185806c50c490306918b6e3c8c1ef4de58804f39e2a6e325dc7a1fc31485b9a6e71cf3f4a4790e70179fe74c070c9ed4ce57209e452073df8a5760475e6a00377ff00ae94e4741f89a1403cd26e1da98084fcdee3d6977b7ad21381db1484f5cf3ed5402ae73d33e849a566efedc0a6b12c39e9dbda9cadf28e41a5700c9da31f80a66d20639e7a8a7b0f9467af7a66ece47bd480c2493d7a538e48c1fc69063d8528ce490381d68000878c75f6a3cb78f2c08f4a567c800018ce698b8dc7078f5a00370e0fdd2476ee69cc46e5cf03da987820fa7eb4d90e0e73c75a06484839c9006739a09ce4f5cd314679ede94f53c8e71408555caeee714ec73ec282485eb9c76a320a01d4532c89dc21e9d7a1a52030cf3c0e94e6dafc5341f2f81cff004a40249dbe9da9854b11b7ad01ce41eb9f5a47ce78ebde820424b38f6e6918eeea003ed4039724f5a5e8d48060186271c0f7a493ae0d3db013f1a8837af39a005538ed4a54e32307e9da9a32adf851bb9ee053001f4c9a46cf7a0301eb48ad8e948ab8b90463bd373cd2ef23bd23364e4fe940809a01e78a4ea0d00e00fd68b887668a4c8a32298077fa5349c1a5e2928010fdd14b4de9494805fe1a6b52d35bad21851451537284fd286e94374a6d2207d356928a0071349eb4945050a78a4a56a4a061451450014523521e28006eb494beb4019a004a28a46a003752529f7a42314005145140051451400514514005145140051451400514514005145140051451400bba979a45a4a0077634a0d37fa50d400b4efbb48381de92801f45148b400b451450014bba928c71400bf7a9d4de86971c62800e946ec9a17a51b45002fad1480628e9400fe693d293bfb514ee0283c7bd28e3fc693a74a4fe1e9542b0ef7f5a06053697767ad0161f8c633dff004a5c77a606e69ebca8fe541207da973cf5c0f7a6eda56f9892050014537ad2e7daa6e316954f7a4c838a28b88377cd4bbc8c638a4a4c7cd9a60381dc7a51b7d450385a39c7ad30173b7a5387cd9e3029b818e33f8d2818278fc680171f352e30471c7e9483e9c53b3ffeba602b74a68e69c4e460741481b03a521683829229c3a5337734bbbde9887638c522d1c52f14805a29322807de800e47ff005a8e94bb722995402e09393d282a411e94ec71eb41c904f4a006e0e7fad283938e053880463bfb51b3b6298003d4668c96ea6865c5006714ee03b071d339a36904f18a4dbf2d387d4f34c041ce314a477a539069571bb91daa406631fe34e1c81cf4a5db9f4e79a029ec38a762417e53c645395f028551b893da90f63d45171122e021ef8ee2941e09a68ca9382403d7de978c6013d690084923827f3a4573bb20f3e94a58b37b8a41f330cd32c7ac985c05e7a1a70c280a7d3bd4641dd90703b54b8e339a6b50143eecf61416dcc31d4521383d7ad35c64f1ebcf34c63ddb900038f5f4a5c9031c7d69acc7a6339a465cd218e386ebd477a6961d4f4348bf2af71ed4dc02ad93d2a40687cb9273d3b501b0724673e94290413c1cf6a764ee20f5a4048c31b083ed4c5c312483907bd2e4edc0cf5a8d998f5e99aab80e932c307a8e78a455f9738e0f4ef48cdd7dc75a40c41c718f5a902556c021ba53770f4c6294618e71edc527193d8f4cfad00230069982a49fd29c73d00e7d2866c7a9cd59561a5816cfad2ee0147193eb4839519a5ce38fe752161e794079c73d4546c71ed4f77c2a80323d2a3279ff001a09141207407eb41277127a9eb8a45386ce3af3480f52738f4a400ec7249ea7bd26e018606291f3d78a6ee217a71401216dcc4f43e951b9078e30297d69ac7e6e39cf5a063a23b80e707bd3831538e98fd6a3562a4703278a5079c7bf5a0448b26ef97ae4d2e49e00c54458e4528279eb5255c7e79233cd0edd467f1a629cb7e1cd2328c8e706a82e26ee07eb431cf7a4c825863028c704f634084dbb9473c6680a7140e39e79fe746485a42199f948238a68041069fefda9a467bd22ae190473c5370703ad2b051df34ac70bc734c9199c51cd2f3da861951da8013193cd2352f4eb46463fad0027f0f1494ffa1c629831839a4028008e4e2929b9ef4efe2c5055828268e94c6271ed4842839a4a6934a09a076169b4134501613a52d14d6a90b8352f149c52504851451400528ff26929568290945145030a4269691a800cf14da297a50019c52507ad1c500149fc34bcd235001d47bd2514500145145001451450014514500145145001451450014514500145145001451450014668a2801dcd1cd369473d68017a0eb8a1714806697d68017f0a7530734bfc3400a0e69693752d00145145002ad252eea16801d48bd2969bf76801d49fc547f150bd28016914f5a3ad18f7a005a39a28cd500519e68a2980ecf51da949db818a60e69d40ac28eb41271f5a4a42c71ed405876ea5c73c1a8e943115360b0ecf18a70e6a3dde94e0dffeba2c48bba94134de33db34e1f7bad301475e69463bd3738a50c3be7d2980a39f6a5cfcb4dcf14e038e28014100f39a503271cf34d5e2973f35004bb7e5e98cd340393ce2865f9783922919874a05a0bbb0693f8452039cd2e680d051d2941e0fad329cb40c5ebde94e45201c5141238638a50a1693d334bc7ad3017e5cf1d69df85317bf1834e19279a600063340031c71452af5a6018ebcd28057ff00ad48c0a9ff000a503f3a005c60707f3a7ec2bce3b75a6fdd5c91cd0cc5bd85510078f5142f39a453db1473c64f148771e38e9fad2a7078e7e94dea783ffd7a7ac676f6c67a1a2e218d70c88d820fe1d29903165e4735295f947bd34478079a2c5128c3038233ef4d6273e9ed4c5cb372dd295a4e0e3340ac0c0b371c9a954055e4fb540189239a9172dd78a6512606481834990060fe54c6731f27b7a53339c73d7b628404f805d71d450ff303eddea304efcf71c0a46660a477a009460f6e691be5e71cd30b6e6e33c734adf3633c1f5a0771af22ab71daa30ff2e3b7a535bae01a6fcdb8d485c9908c838cb7a52a925867e9512839193f8d48ead1b2e0fbd2192ab6475c63f5a680383cf3d8547b99b76491ec2955ce718c1a0072e5b233c0f6a473db80291b7963cd3190edeb93eb4012f4e46462937772471da99e5e3a1a4f2c753919e0d0048cc0b023f3a46e413ef48aa0719ed413d3d4f7a0b14f53db14d6edc74343679ed49e60393926900f6607bf41d699c74068ddbba74c77a6ee0ad820f3dc52158713c605373cd319f6f4e99a3cc1b8d048fe4afa522af2467ad03e6e41fc29a18ab734c0713824d341cb673d3a528c521c014c05206319a1b03dfeb4c078c7a538b7b74ef4800738ef4ec1e79cfb533d077f514e0c31df22900aa36934313eb42fcd9ed49d3bd500991ebcd2b76c71ed4dcfcc3d714e6538e3f9d021920e33fa7a537394f6a3ef0248e6838639200a0638e1400299f5fd29cfc9ed9a4dcc7d2a4050064d271f4a4e793c0a4edd7eb400bdf9fd298ed8070334f3c1eb4d71e9400d5240e79a33cf41c76a43c521e940c5ed9ebed4dcfad0bc0148c7935371d8539edfad251dbd690f6145c61ba826909a28b8828a28a4310f34b487f4a5a0570a652fb8a750485328a280177525140e6800a3f5a5e9d29282828a28a062374a46eb4bcd27f0d001d29338a2826800279349df9a51d693df140011c51f7a8cf6a4a0028a28a0028a28a0028a28a0028a28a00fffd9, 'Webifly Solutions Private Limited', 'Webifly Solutions Private Limited', 'Webifly Solutions Private Limited', 'Webifly Solutions Private Limited', 'Webifly Solutions Private Limited', 'Webifly Solutions Private Limited', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'Eye'),
(2, 'Ortho'),
(3, 'General');

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
-- Indexes for table `general_info_consent`
--
ALTER TABLE `general_info_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiv_consent`
--
ALTER TABLE `hiv_consent`
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
-- Indexes for table `pt_image`
--
ALTER TABLE `pt_image`
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
-- Indexes for table `repeat_surgery_record`
--
ALTER TABLE `repeat_surgery_record`
  ADD PRIMARY KEY (`srno`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opd_register`
--
ALTER TABLE `opd_register`
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
-- AUTO_INCREMENT for table `pt_image`
--
ALTER TABLE `pt_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `scan`
--
ALTER TABLE `scan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
