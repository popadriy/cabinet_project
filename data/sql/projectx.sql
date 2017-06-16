-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 07:12 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectx`
--

-- --------------------------------------------------------

--
-- Table structure for table `analiza`
--

CREATE TABLE `analiza` (
  `id_analiza` int(11) NOT NULL,
  `tip_analiza` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `analiza`
--

INSERT INTO `analiza` (`id_analiza`, `tip_analiza`) VALUES
(1, 'Uree, creatina'),
(2, 'Glicemie'),
(3, 'ASAT, ALAT, Bilirubina'),
(4, 'Acid uric'),
(5, 'Examen sumar de urina');

-- --------------------------------------------------------

--
-- Table structure for table `cabinet_medical`
--

CREATE TABLE `cabinet_medical` (
  `id_cabinet` int(11) NOT NULL,
  `nume_cabinet` varchar(100) COLLATE utf8_bin NOT NULL,
  `logo_cabinet` varchar(100) COLLATE utf8_bin NOT NULL,
  `nr_inregistrare` varchar(100) COLLATE utf8_bin NOT NULL,
  `cui` varchar(100) COLLATE utf8_bin NOT NULL,
  `cod_iban` varchar(100) COLLATE utf8_bin NOT NULL,
  `banca` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cabinet_medical`
--

INSERT INTO `cabinet_medical` (`id_cabinet`, `nume_cabinet`, `logo_cabinet`, `nr_inregistrare`, `cui`, `cod_iban`, `banca`) VALUES
(1, 'GinoCab', 'public/foto/', 'j12/543/2011', 'ro455676', 'ro24btrl76454265xx', 'Banca transilvania');

-- --------------------------------------------------------

--
-- Table structure for table `consult`
--

CREATE TABLE `consult` (
  `id_consult` int(11) NOT NULL,
  `motiv_control` varchar(100) COLLATE utf8_bin NOT NULL,
  `observatii` varchar(100) COLLATE utf8_bin NOT NULL,
  `recomandari` varchar(100) COLLATE utf8_bin NOT NULL,
  `tratament` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `ultima_menstruatie` varchar(100) COLLATE utf8_bin NOT NULL,
  `climax` varchar(100) COLLATE utf8_bin NOT NULL,
  `ciclu_menstrual` varchar(100) COLLATE utf8_bin NOT NULL,
  `nasteri` varchar(100) COLLATE utf8_bin NOT NULL,
  `avorturi` varchar(100) COLLATE utf8_bin NOT NULL,
  `data_consult` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `consult`
--

INSERT INTO `consult` (`id_consult`, `motiv_control`, `observatii`, `recomandari`, `tratament`, `id_pacient`, `ultima_menstruatie`, `climax`, `ciclu_menstrual`, `nasteri`, `avorturi`, `data_consult`) VALUES
(1, 'Sarcina saptamana 18', 'dezvoltare normala', 'repaus la pat, odihna, fara efort', 'ceai la dureri', 2, '2017-01-23', 'nu', 'normal', 'nu', 'nu', '2017-05-29'),
(2, 'Dureri abdominale', 'respiratie grea', 'sport, saltea tare', 'calmante', 4, '2017-14-04', 'da', 'da', 'da', 'nu', '2017-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `consult_analiza`
--

CREATE TABLE `consult_analiza` (
  `id_analiza` int(11) NOT NULL,
  `id_consult` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `consult_analiza`
--

INSERT INTO `consult_analiza` (`id_analiza`, `id_consult`) VALUES
(5, 1),
(2, 2),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `consult_examinari`
--

CREATE TABLE `consult_examinari` (
  `id_examinare` int(11) NOT NULL,
  `id_consult` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `consult_examinari`
--

INSERT INTO `consult_examinari` (`id_examinare`, `id_consult`, `id_pacient`) VALUES
(2, 1, 2),
(1, 2, 4),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `examinare`
--

CREATE TABLE `examinare` (
  `id_examinare` int(11) NOT NULL,
  `tip_examinare` varchar(100) COLLATE utf8_bin NOT NULL,
  `pret_examinare` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `examinare`
--

INSERT INTO `examinare` (`id_examinare`, `tip_examinare`, `pret_examinare`) VALUES
(1, 'Electrocardiograma', 100),
(2, 'Filmare copil', 150);

-- --------------------------------------------------------

--
-- Table structure for table `facturi`
--

CREATE TABLE `facturi` (
  `id_factura` int(11) NOT NULL,
  `factura` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `data_factura` date NOT NULL,
  `nr_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `judete`
--

CREATE TABLE `judete` (
  `id_judet` int(11) NOT NULL,
  `nume_judet` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `judete`
--

INSERT INTO `judete` (`id_judet`, `nume_judet`) VALUES
(1, 'Cluj'),
(2, 'Iasi');

-- --------------------------------------------------------

--
-- Table structure for table `orase`
--

CREATE TABLE `orase` (
  `id_orase` int(11) NOT NULL,
  `nume_oras` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_judet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orase`
--

INSERT INTO `orase` (`id_orase`, `nume_oras`, `id_judet`) VALUES
(1, 'Iasi', 2),
(2, 'Harlau', 2),
(3, 'Cluj-Napoca', 1),
(4, 'Gherla', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pacienti`
--

CREATE TABLE `pacienti` (
  `id_pacient` int(11) NOT NULL,
  `nume_pacient` varchar(100) COLLATE utf8_bin NOT NULL,
  `prenume_pacient` varchar(100) COLLATE utf8_bin NOT NULL,
  `cnp` int(13) NOT NULL,
  `data_nastere` date NOT NULL,
  `id_judet` int(11) NOT NULL,
  `id_orase` int(11) NOT NULL,
  `adresa` varchar(100) COLLATE utf8_bin NOT NULL,
  `ocupatie` varchar(100) COLLATE utf8_bin NOT NULL,
  `loc_munca` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefon` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `stare_civila` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pacienti`
--

INSERT INTO `pacienti` (`id_pacient`, `nume_pacient`, `prenume_pacient`, `cnp`, `data_nastere`, `id_judet`, `id_orase`, `adresa`, `ocupatie`, `loc_munca`, `telefon`, `email`, `stare_civila`, `id_user`) VALUES
(2, 'Buta', 'Cristina', 292587985, '1992-05-08', 1, 1, 'str. Potaisa, nr.4', 'Ziarist', 'Antena 12', 752892589, 'jfrhtd@gmail.com', 'casatorita', 1),
(4, 'Abat ', 'Diana', 564549844, '1990-05-01', 1, 3, 'str. Republicii, nr. 1', 'psiholog', 'Sc.Pshio.SRL', 752892478, 'qwer@gmail.com', 'necasatorita', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scrisoare_medicala`
--

CREATE TABLE `scrisoare_medicala` (
  `id_vizite` int(11) NOT NULL,
  `scrisoare_medicala` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_consult` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `upload_fisier`
--

CREATE TABLE `upload_fisier` (
  `id_upload` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `fisier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nume_utilizator` varchar(100) COLLATE utf8_bin NOT NULL,
  `parola` varchar(100) COLLATE utf8_bin NOT NULL,
  `nume_doctor` varchar(100) COLLATE utf8_bin NOT NULL,
  `specialitate` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nume_utilizator`, `parola`, `nume_doctor`, `specialitate`) VALUES
(1, 'dr_marcel', '81dc9bdb52d04dc20036dbd8313ed055', 'Pop Marcel', 'Ginecolog'),
(2, 'dr_mihai', '81dc9bdb52d04dc20036dbd8313ed055', 'Posto Mihai', 'Ginecolog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analiza`
--
ALTER TABLE `analiza`
  ADD PRIMARY KEY (`id_analiza`);

--
-- Indexes for table `cabinet_medical`
--
ALTER TABLE `cabinet_medical`
  ADD PRIMARY KEY (`id_cabinet`);

--
-- Indexes for table `consult`
--
ALTER TABLE `consult`
  ADD PRIMARY KEY (`id_consult`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexes for table `consult_analiza`
--
ALTER TABLE `consult_analiza`
  ADD KEY `id_consult` (`id_consult`),
  ADD KEY `id_analiza` (`id_analiza`);

--
-- Indexes for table `consult_examinari`
--
ALTER TABLE `consult_examinari`
  ADD KEY `id_consult` (`id_consult`),
  ADD KEY `id_pacient` (`id_pacient`),
  ADD KEY `id_examinare` (`id_examinare`);

--
-- Indexes for table `examinare`
--
ALTER TABLE `examinare`
  ADD PRIMARY KEY (`id_examinare`);

--
-- Indexes for table `facturi`
--
ALTER TABLE `facturi`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `nr_factura` (`nr_factura`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexes for table `judete`
--
ALTER TABLE `judete`
  ADD PRIMARY KEY (`id_judet`);

--
-- Indexes for table `orase`
--
ALTER TABLE `orase`
  ADD PRIMARY KEY (`id_orase`),
  ADD KEY `id_judet` (`id_judet`);

--
-- Indexes for table `pacienti`
--
ALTER TABLE `pacienti`
  ADD PRIMARY KEY (`id_pacient`),
  ADD UNIQUE KEY `cnp` (`cnp`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `judet` (`id_judet`),
  ADD KEY `localitate` (`id_orase`);

--
-- Indexes for table `scrisoare_medicala`
--
ALTER TABLE `scrisoare_medicala`
  ADD PRIMARY KEY (`id_vizite`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_consult` (`id_consult`);

--
-- Indexes for table `upload_fisier`
--
ALTER TABLE `upload_fisier`
  ADD PRIMARY KEY (`id_upload`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analiza`
--
ALTER TABLE `analiza`
  MODIFY `id_analiza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cabinet_medical`
--
ALTER TABLE `cabinet_medical`
  MODIFY `id_cabinet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `consult`
--
ALTER TABLE `consult`
  MODIFY `id_consult` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `examinare`
--
ALTER TABLE `examinare`
  MODIFY `id_examinare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `facturi`
--
ALTER TABLE `facturi`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `judete`
--
ALTER TABLE `judete`
  MODIFY `id_judet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orase`
--
ALTER TABLE `orase`
  MODIFY `id_orase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pacienti`
--
ALTER TABLE `pacienti`
  MODIFY `id_pacient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `scrisoare_medicala`
--
ALTER TABLE `scrisoare_medicala`
  MODIFY `id_vizite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload_fisier`
--
ALTER TABLE `upload_fisier`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `consult`
--
ALTER TABLE `consult`
  ADD CONSTRAINT `consult_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `pacienti` (`id_pacient`);

--
-- Constraints for table `consult_analiza`
--
ALTER TABLE `consult_analiza`
  ADD CONSTRAINT `consult_analiza_ibfk_1` FOREIGN KEY (`id_consult`) REFERENCES `consult` (`id_consult`),
  ADD CONSTRAINT `consult_analiza_ibfk_2` FOREIGN KEY (`id_analiza`) REFERENCES `analiza` (`id_analiza`);

--
-- Constraints for table `consult_examinari`
--
ALTER TABLE `consult_examinari`
  ADD CONSTRAINT `consult_examinari_ibfk_1` FOREIGN KEY (`id_consult`) REFERENCES `consult` (`id_consult`),
  ADD CONSTRAINT `consult_examinari_ibfk_2` FOREIGN KEY (`id_pacient`) REFERENCES `pacienti` (`id_pacient`),
  ADD CONSTRAINT `consult_examinari_ibfk_3` FOREIGN KEY (`id_examinare`) REFERENCES `examinare` (`id_examinare`);

--
-- Constraints for table `facturi`
--
ALTER TABLE `facturi`
  ADD CONSTRAINT `facturi_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `pacienti` (`id_pacient`);

--
-- Constraints for table `orase`
--
ALTER TABLE `orase`
  ADD CONSTRAINT `orase_ibfk_1` FOREIGN KEY (`id_judet`) REFERENCES `judete` (`id_judet`);

--
-- Constraints for table `pacienti`
--
ALTER TABLE `pacienti`
  ADD CONSTRAINT `pacienti_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pacienti_ibfk_2` FOREIGN KEY (`id_judet`) REFERENCES `judete` (`id_judet`),
  ADD CONSTRAINT `pacienti_ibfk_3` FOREIGN KEY (`id_orase`) REFERENCES `orase` (`id_orase`);

--
-- Constraints for table `scrisoare_medicala`
--
ALTER TABLE `scrisoare_medicala`
  ADD CONSTRAINT `scrisoare_medicala_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `scrisoare_medicala_ibfk_2` FOREIGN KEY (`id_consult`) REFERENCES `consult` (`id_consult`);

--
-- Constraints for table `upload_fisier`
--
ALTER TABLE `upload_fisier`
  ADD CONSTRAINT `upload_fisier_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `pacienti` (`id_pacient`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
