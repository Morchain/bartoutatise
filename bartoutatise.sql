-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2025 at 10:11 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bartoutatise`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `Id_avis` int(10) NOT NULL,
  `Id_profil` int(5) NOT NULL,
  `Nom_bar` varchar(64) NOT NULL,
  `note` int(1) NOT NULL,
  `avis` varchar(255) NOT NULL,
  `date_avis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`Id_avis`, `Id_profil`, `Nom_bar`, `note`, `avis`, `date_avis`) VALUES
(9, 2, 'VERDE', 2, 'Clientèle jeune et dynamique.', '2024-12-18'),
(10, 9, 'PDD', 3, 'Service un peu lent mais bonne musique.', '2025-05-01'),
(11, 12, 'AQUARIUM', 5, 'Prix raisonnables, je recommande.', '2024-11-05'),
(12, 10, 'AQUARIUM', 1, 'Ambiance incroyable, j y retournerai !', '2025-03-20'),
(13, 11, 'OASIS', 2, 'Décevant cette fois-ci.', '2025-02-10'),
(14, 2, 'SEVEN', 4, 'Décevant cette fois-ci.', '2024-10-18'),
(15, 10, 'OASIS', 5, 'Cocktails originaux et délicieux.', '2025-04-22'),
(16, 12, 'VERDE', 1, 'Cocktails originaux et délicieux.', '2025-01-30'),
(17, 7, 'PDR', 5, 'Déco sympa, mais pas assez de places.', '2025-05-01'),
(18, 2, 'IMPREVU', 3, 'Déco sympa, mais pas assez de places.', '2024-10-20'),
(19, 3, 'PDR', 4, 'Clientèle jeune et dynamique.', '2025-01-25'),
(20, 9, 'VERDE', 4, 'Cocktails originaux et délicieux.', '2025-02-05'),
(21, 13, 'AQUARIUM', 5, 'Clientèle jeune et dynamique.', '2024-10-11'),
(22, 9, 'AQUARIUM', 5, 'Clientèle jeune et dynamique.', '2025-01-16'),
(23, 3, 'VERDE', 2, 'Déco sympa, mais pas assez de places.', '2025-04-08'),
(24, 7, 'SEVEN', 2, 'Déco sympa, mais pas assez de places.', '2025-02-04'),
(25, 3, 'IMPREVU', 4, 'Un peu trop bruyant à mon goût.', '2024-10-31'),
(26, 11, 'OASIS', 3, 'Un peu trop bruyant à mon goût.', '2024-10-22'),
(27, 13, 'OASIS', 5, 'Un peu trop bruyant à mon goût.', '2025-04-21'),
(28, 3, 'FALUCHE', 2, 'Parfait pour un vendredi soir.', '2024-11-04'),
(29, 1, 'OASIS', 4, 'Décevant cette fois-ci.', '2024-12-13'),
(30, 6, 'PDR', 1, 'Parfait pour un vendredi soir.', '2025-01-15'),
(31, 5, 'AQUARIUM', 1, 'Service un peu lent mais bonne musique.', '2025-02-04'),
(32, 3, 'SEVEN', 4, 'Service un peu lent mais bonne musique.', '2025-04-22'),
(34, 5, 'PDR', 2, 'Très bonne expérience dans l ensemble.', '2025-01-10'),
(35, 6, 'FALUCHE', 3, 'Un peu trop bruyant à mon goût.', '2025-04-12'),
(36, 1, 'FALUCHE', 4, 'Décevant cette fois-ci.', '2025-02-07'),
(37, 7, 'PDR', 4, 'Décevant cette fois-ci.', '2024-12-29'),
(38, 4, 'PDR', 3, 'Très bonne expérience dans L ensemble.', '2024-11-08'),
(39, 7, 'IMPREVU', 2, 'Un peu trop bruyant à mon goût.', '2024-12-10'),
(40, 11, 'OASIS', 1, 'Parfait pour un vendredi soir.', '2025-01-04'),
(41, 6, 'OASIS', 1, 'Service un peu lent mais bonne musique.', '2025-03-29'),
(42, 9, 'PDR', 3, 'Parfait pour un vendredi soir.', '2025-04-27'),
(43, 12, 'FALUCHE', 4, 'Clientèle jeune et dynamique.', '2024-11-12'),
(44, 2, 'OASIS', 2, 'Un peu trop bruyant à mon goût.', '2024-10-28'),
(45, 10, 'VERDE', 4, 'Ambiance incroyable, j y retournerai !', '2024-10-12'),
(46, 3, 'AQUARIUM', 1, 'Un peu trop bruyant à mon goût.', '2025-01-10'),
(47, 1, 'VERDE', 3, 'Décevant cette fois-ci.', '2025-01-16'),
(48, 5, 'FALUCHE', 1, 'Déco sympa, mais pas assez de places.', '2025-03-03'),
(49, 4, 'SEVEN', 3, 'Un peu trop bruyant à mon goût.', '2024-12-06'),
(50, 7, 'AQUARIUM', 5, 'Clientèle jeune et dynamique.', '2025-02-19'),
(51, 13, 'SEVEN', 2, 'Clientèle jeune et dynamique.', '2024-11-17'),
(52, 13, 'AQUARIUM', 5, 'Déco sympa, mais pas assez de places.', '2024-10-05'),
(53, 10, 'VERDE', 2, 'Décevant cette fois-ci.', '2024-11-12'),
(54, 2, 'PDR', 1, 'Déco sympa, mais pas assez de places.', '2025-04-27'),
(55, 7, 'SEVEN', 3, 'Clientèle jeune et dynamique.', '2024-11-10'),
(56, 1, 'AQUARIUM', 1, 'Cocktails originaux et délicieux.', '2025-01-10'),
(57, 6, 'SEVEN', 5, 'Clientèle jeune et dynamique.', '2025-03-06'),
(58, 7, 'VERDE', 2, 'Service un peu lent mais bonne musique.', '2024-12-11'),
(59, 2, 'SEVEN', 2, 'Un peu trop bruyant à mon goût.', '2025-01-17'),
(61, 9, 'AQUARIUM', 4, 'Parfait pour un vendredi soir.', '2024-10-05'),
(62, 8, 'OASIS', 2, 'Déco sympa, mais pas assez de places.', '2024-12-15'),
(64, 1, 'OASIS', 2, 'Un peu trop bruyant à mon goût.', '2025-01-21'),
(65, 13, 'SEVEN', 5, 'Un peu trop bruyant à mon goût.', '2024-12-20'),
(66, 8, 'IMPREVU', 3, 'Cocktails originaux et délicieux.', '2025-03-09'),
(67, 10, 'VERDE', 4, 'Service un peu lent mais bonne musique.', '2025-04-23'),
(69, 13, 'OASIS', 2, 'Décevant cette fois-ci.', '2025-01-10'),
(70, 5, 'IMPREVU', 3, 'Ambiance incroyable, j y retournerai !', '2024-12-24'),
(71, 10, 'SEVEN', 3, 'Ambiance incroyable, j y retournerai !', '2024-11-04'),
(72, 1, 'AQUARIUM', 3, 'Déco sympa, mais pas assez de places.', '2024-12-26'),
(73, 7, 'FALUCHE', 3, 'Prix raisonnables, je recommande.', '2025-04-21'),
(74, 12, 'SEVEN', 4, 'Décevant cette fois-ci.', '2024-10-20'),
(75, 4, 'OASIS', 2, 'Un peu trop bruyant à mon goût.', '2025-04-11'),
(76, 10, 'PDD', 3, 'Prix raisonnables, je recommande.', '2025-04-26'),
(77, 13, 'OASIS', 5, 'Un peu trop bruyant à mon goût.', '2025-02-06'),
(78, 10, 'IMPREVU', 1, 'Prix raisonnables, je recommande.', '2024-11-21'),
(79, 2, 'VERDE', 1, 'Prix raisonnables, je recommande.', '2025-04-05'),
(80, 5, 'IMPREVU', 4, 'Déco sympa, mais pas assez de places.', '2025-04-30'),
(81, 12, 'IMPREVU', 5, 'Clientèle jeune et dynamique.', '2024-10-26'),
(82, 11, 'AQUARIUM', 5, 'Cocktails originaux et délicieux.', '2025-02-12'),
(83, 5, 'VERDE', 1, 'Clientèle jeune et dynamique.', '2024-10-27'),
(84, 1, 'AQUARIUM', 5, 'Clientèle jeune et dynamique.', '2025-03-02'),
(85, 11, 'OASIS', 3, 'Parfait pour un vendredi soir.', '2025-01-24'),
(86, 4, 'IMPREVU', 4, 'Déco sympa, mais pas assez de places.', '2025-03-23'),
(87, 13, 'SEVEN', 1, 'Décevant cette fois-ci.', '2025-02-25'),
(88, 6, 'SEVEN', 4, 'Cocktails originaux et délicieux.', '2025-01-17'),
(89, 11, 'VERDE', 1, 'Parfait pour un vendredi soir.', '2025-01-15'),
(90, 1, 'OASIS', 1, 'Décevant cette fois-ci.', '2024-10-04'),
(91, 5, 'VERDE', 5, 'Très bonne expérience dans l ensemble.', '2025-04-13'),
(92, 3, 'PDR', 2, 'Parfait pour un vendredi soir.', '2024-11-22'),
(93, 10, 'AQUARIUM', 4, 'Service un peu lent mais bonne musique.', '2025-03-19'),
(94, 5, 'AQUARIUM', 4, 'Prix raisonnables, je recommande.', '2025-02-26'),
(95, 8, 'FALUCHE', 4, 'Décevant cette fois-ci.', '2025-04-02'),
(96, 7, 'OASIS', 2, 'Très bonne expérience dans l ensemble.', '2025-04-18'),
(98, 8, 'OASIS', 1, 'Très bonne expérience dans l ensemble.', '2024-11-28'),
(99, 1, 'FALUCHE', 4, 'Prix raisonnables, je recommande.', '2024-11-28'),
(100, 4, 'PDD', 5, 'Cocktails originaux et délicieux.', '2025-03-04'),
(101, 5, 'VERDE', 5, 'Ambiance incroyable, j y retournerai !', '2025-03-23'),
(102, 4, 'PDD', 3, 'Prix raisonnables, je recommande.', '2024-12-01'),
(103, 6, 'PDR', 5, 'Déco sympa, mais pas assez de places.', '2025-01-31'),
(104, 8, 'PDD', 3, 'Ambiance incroyable, j y retournerai !', '2025-02-14'),
(105, 4, 'IMPREVU', 2, 'Décevant cette fois-ci.', '2025-02-21'),
(106, 3, 'FALUCHE', 5, 'Service un peu lent mais bonne musique.', '2025-04-25'),
(107, 5, 'IMPREVU', 3, 'Ambiance incroyable, j y retournerai !', '2025-02-16'),
(108, 12, 'PDD', 5, 'Ambiance incroyable, j y retournerai !', '2025-03-13'),
(109, 13, 'VERDE', 4, 'Service un peu lent mais bonne musique.', '2024-10-20'),
(110, 3, 'IMPREVU', 2, 'Un peu trop bruyant à mon goût.', '2025-01-11'),
(111, 10, 'PDR', 5, 'Ambiance incroyable, j y retournerai !', '2024-12-17'),
(112, 12, 'AQUARIUM', 5, 'Décevant cette fois-ci.', '2024-12-01'),
(113, 8, 'PDR', 3, 'Parfait pour un vendredi soir.', '2024-10-26'),
(114, 11, 'VERDE', 5, 'Décevant cette fois-ci.', '2025-03-19'),
(115, 2, 'PDD', 4, 'Déco sympa, mais pas assez de places.', '2025-03-24'),
(116, 3, 'OASIS', 5, 'Prix raisonnables, je recommande.', '2025-04-30'),
(117, 1, 'PDD', 4, 'Décevant cette fois-ci.', '2024-11-02'),
(118, 6, 'IMPREVU', 3, 'Déco sympa, mais pas assez de places.', '2025-03-01'),
(119, 2, 'OASIS', 4, 'Service un peu lent mais bonne musique.', '2024-11-27'),
(120, 10, 'PDR', 3, 'Déco sympa, mais pas assez de places.', '2024-12-20'),
(121, 5, 'IMPREVU', 4, 'Parfait pour un vendredi soir.', '2024-10-25'),
(122, 8, 'IMPREVU', 2, 'Ambiance incroyable, j y retournerai !', '2025-04-01'),
(123, 2, 'SEVEN', 2, 'Très bonne expérience dans l ensemble.', '2025-03-02'),
(124, 3, 'PDD', 2, 'Prix raisonnables, je recommande.', '2025-04-09'),
(126, 5, 'VERDE', 2, 'Très bonne expérience dans l ensemble.', '2024-10-08'),
(127, 1, 'IMPREVU', 3, 'Décevant cette fois-ci.', '2025-04-04'),
(128, 7, 'OASIS', 4, 'Ambiance incroyable, j y retournerai !', '2025-01-21'),
(129, 4, 'OASIS', 1, 'Prix raisonnables, je recommande.', '2025-02-14'),
(130, 6, 'VERDE', 5, 'Cocktails originaux et délicieux.', '2024-12-28'),
(131, 1, 'IMPREVU', 3, 'Clientèle jeune et dynamique.', '2025-03-02'),
(132, 9, 'PDR', 5, 'Cocktails originaux et délicieux.', '2024-10-29'),
(133, 12, 'AQUARIUM', 3, 'Cocktails originaux et délicieux.', '2024-11-14'),
(134, 5, 'AQUARIUM', 4, 'Prix raisonnables, je recommande.', '2025-01-25'),
(135, 13, 'OASIS', 4, 'Cocktails originaux et délicieux.', '2025-04-11'),
(136, 6, 'FALUCHE', 4, 'Déco sympa, mais pas assez de places.', '2025-01-24'),
(137, 3, 'AQUARIUM', 5, 'Ambiance incroyable, j y retournerai !', '2024-10-21'),
(138, 6, 'SEVEN', 5, 'Décevant cette fois-ci.', '2025-01-10'),
(139, 13, 'PDR', 2, 'Un peu trop bruyant à mon goût.', '2025-02-06'),
(140, 11, 'PDR', 1, 'Déco sympa, mais pas assez de places.', '2025-03-24'),
(142, 4, 'IMPREVU', 4, 'Parfait pour un vendredi soir.', '2024-12-11'),
(143, 4, 'SEVEN', 2, 'Décevant cette fois-ci.', '2025-01-04'),
(144, 8, 'FALUCHE', 1, 'Cocktails originaux et délicieux.', '2024-10-22'),
(145, 8, 'IMPREVU', 2, 'Déco sympa, mais pas assez de places.', '2025-03-15'),
(146, 2, 'IMPREVU', 4, 'Prix raisonnables, je recommande.', '2025-01-13'),
(147, 7, 'SEVEN', 4, 'Prix raisonnables, je recommande.', '2025-01-05'),
(148, 13, 'PDR', 4, 'Service un peu lent mais bonne musique.', '2025-01-27'),
(149, 10, 'OASIS', 2, 'Un peu trop bruyant à mon goût.', '2025-03-16'),
(150, 9, 'OASIS', 1, 'Parfait pour un vendredi soir.', '2025-03-08'),
(151, 12, 'IMPREVU', 2, 'Parfait pour un vendredi soir.', '2025-02-17'),
(152, 9, 'VERDE', 4, 'Ambiance incroyable, j y retournerai !', '2024-10-16'),
(153, 13, 'AQUARIUM', 5, 'Déco sympa, mais pas assez de places.', '2025-04-12'),
(154, 2, 'PDR', 2, 'Ambiance incroyable, j y retournerai !', '2025-02-03'),
(155, 10, 'SEVEN', 2, 'Cocktails originaux et délicieux.', '2024-10-21'),
(156, 9, 'OASIS', 5, 'Parfait pour un vendredi soir.', '2025-01-12'),
(157, 13, 'FALUCHE', 1, 'Décevant cette fois-ci.', '2024-11-13'),
(158, 9, 'VERDE', 3, 'Un peu trop bruyant à mon goût.', '2025-04-20'),
(159, 9, 'FALUCHE', 1, 'Service un peu lent mais bonne musique.', '2025-02-07'),
(160, 1, 'IMPREVU', 5, 'Déco sympa, mais pas assez de places.', '2025-03-22'),
(161, 7, 'PDR', 4, 'Déco sympa, mais pas assez de places.', '2025-04-06'),
(162, 3, 'AQUARIUM', 1, 'Service un peu lent mais bonne musique.', '2024-12-20'),
(163, 10, 'OASIS', 4, 'Déco sympa, mais pas assez de places.', '2024-11-17'),
(164, 10, 'FALUCHE', 1, 'Parfait pour un vendredi soir.', '2025-01-03'),
(165, 9, 'IMPREVU', 1, 'Déco sympa, mais pas assez de places.', '2024-12-03'),
(166, 10, 'VERDE', 4, 'Clientèle jeune et dynamique.', '2024-11-15'),
(167, 7, 'SEVEN', 3, 'Un peu trop bruyant à mon goût.', '2025-02-04'),
(168, 9, 'FALUCHE', 3, 'Ambiance incroyable, j y retournerai !', '2025-03-06'),
(169, 2, 'IMPREVU', 3, 'Un peu trop bruyant à mon goût.', '2025-01-03'),
(170, 12, 'PDD', 2, 'Prix raisonnables, je recommande.', '2025-02-04'),
(171, 3, 'SEVEN', 4, 'Clientèle jeune et dynamique.', '2024-11-04'),
(172, 3, 'OASIS', 3, 'Clientèle jeune et dynamique.', '2025-03-31'),
(173, 6, 'IMPREVU', 3, 'Un peu trop bruyant à mon goût.', '2025-01-31'),
(174, 7, 'AQUARIUM', 3, 'Cocktails originaux et délicieux.', '2024-12-01'),
(175, 3, 'SEVEN', 3, 'Très bonne expérience dans l ensemble.', '2025-03-07'),
(176, 2, 'FALUCHE', 5, 'Décevant cette fois-ci.', '2025-02-17'),
(177, 1, 'AQUARIUM', 2, 'Prix raisonnables, je recommande.', '2025-02-06'),
(178, 13, 'PDD', 4, 'Cocktails originaux et délicieux.', '2025-01-24'),
(179, 13, 'IMPREVU', 5, 'Décevant cette fois-ci.', '2025-02-23'),
(180, 11, 'PDR', 1, 'Prix raisonnables, je recommande.', '2025-02-18'),
(181, 8, 'PDD', 3, 'Clientèle jeune et dynamique.', '2025-02-18'),
(182, 9, 'IMPREVU', 1, 'Déco sympa, mais pas assez de places.', '2024-12-10'),
(183, 13, 'PDD', 5, 'Parfait pour un vendredi soir.', '2024-11-01'),
(184, 12, 'PDR', 4, 'Un peu trop bruyant à mon goût.', '2025-04-18'),
(185, 4, 'VERDE', 1, 'Prix raisonnables, je recommande.', '2024-12-16'),
(186, 10, 'SEVEN', 1, 'Parfait pour un vendredi soir.', '2024-10-11'),
(187, 3, 'AQUARIUM', 4, 'Prix raisonnables, je recommande.', '2024-12-08'),
(188, 9, 'PDD', 4, 'Déco sympa, mais pas assez de places.', '2024-12-13'),
(189, 4, 'VERDE', 1, 'Très bonne expérience dans l ensemble.', '2024-11-16'),
(190, 11, 'PDR', 2, 'Déco sympa, mais pas assez de places.', '2025-02-03'),
(191, 3, 'AQUARIUM', 5, 'Clientèle jeune et dynamique.', '2025-04-19'),
(193, 4, 'PDD', 4, 'Ambiance incroyable, j y retournerai !', '2024-10-02'),
(194, 12, 'VERDE', 1, 'Service un peu lent mais bonne musique.', '2024-12-10'),
(195, 2, 'PDR', 1, 'Service un peu lent mais bonne musique.', '2024-10-27'),
(196, 13, 'IMPREVU', 4, 'Parfait pour un vendredi soir.', '2025-03-23'),
(197, 6, 'IMPREVU', 4, 'Déco sympa, mais pas assez de places.', '2025-02-06'),
(198, 8, 'OASIS', 3, 'Décevant cette fois-ci.', '2025-02-09'),
(199, 12, 'AQUARIUM', 3, 'Ambiance incroyable, j y retournerai !', '2024-12-30'),
(200, 6, 'VERDE', 3, 'Un peu trop bruyant à mon goût.', '2024-12-13'),
(201, 8, 'FALUCHE', 5, 'Parfait pour un vendredi soir.', '2024-11-07'),
(203, 10, 'OASIS', 2, 'Un peu trop bruyant à mon goût.', '2024-10-21'),
(204, 9, 'VERDE', 2, 'Prix raisonnables, je recommande.', '2025-03-10'),
(205, 1, 'PDR', 4, 'Très bonne expérience dans l ensemble.', '2025-02-14'),
(206, 4, 'PDR', 3, 'Déco sympa, mais pas assez de places.', '2025-01-22'),
(207, 1, 'OASIS', 2, 'Décevant cette fois-ci.', '2024-12-23'),
(208, 12, 'IMPREVU', 4, 'Clientèle jeune et dynamique.', '2024-12-21'),
(209, 12, 'PDR', 1, 'Décevant cette fois-ci.', '2024-11-20'),
(210, 7, 'PDR', 4, 'Décevant cette fois-ci.', '2024-12-18'),
(211, 10, 'PDR', 1, 'Service un peu lent mais bonne musique.', '2024-12-17'),
(212, 13, 'VERDE', 3, 'Très bonne expérience dans l ensemble.', '2025-02-15'),
(213, 6, 'OASIS', 3, 'Ambiance incroyable, j y retournerai !', '2024-11-04'),
(214, 8, 'VERDE', 1, 'Déco sympa, mais pas assez de places.', '2025-03-17'),
(215, 1, 'SEVEN', 1, 'Déco sympa, mais pas assez de places.', '2024-11-17'),
(216, 12, 'PDD', 5, 'Prix raisonnables, je recommande.', '2024-10-13'),
(217, 5, 'FALUCHE', 3, 'Très bonne expérience dans l ensemble.', '2025-03-07'),
(218, 6, 'FALUCHE', 2, 'Clientèle jeune et dynamique.', '2024-10-06'),
(219, 11, 'PDR', 1, 'Parfait pour un vendredi soir.', '2024-10-31'),
(220, 6, 'AQUARIUM', 5, 'Très bonne expérience dans l ensemble.', '2024-10-20'),
(221, 6, 'OASIS', 1, 'Parfait pour un vendredi soir.', '2024-11-24'),
(222, 12, 'PDR', 4, 'Parfait pour un vendredi soir.', '2024-10-14'),
(223, 12, 'PDR', 1, 'Prix raisonnables, je recommande.', '2024-10-20'),
(224, 3, 'FALUCHE', 2, 'Service un peu lent mais bonne musique.', '2025-01-18'),
(225, 8, 'IMPREVU', 5, 'Service un peu lent mais bonne musique.', '2025-04-12'),
(226, 3, 'OASIS', 3, 'Décevant cette fois-ci.', '2025-04-13'),
(227, 10, 'SEVEN', 2, 'Déco sympa, mais pas assez de places.', '2024-11-06'),
(228, 12, 'PDR', 4, 'Service un peu lent mais bonne musique.', '2025-01-25'),
(229, 12, 'AQUARIUM', 5, 'Très bonne expérience dans l ensemble.', '2024-11-20'),
(230, 2, 'PDR', 1, 'Ambiance incroyable, j y retournerai !', '2024-12-13'),
(231, 8, 'FALUCHE', 5, 'Clientèle jeune et dynamique.', '2025-04-25'),
(232, 1, 'VERDE', 1, 'Déco sympa, mais pas assez de places.', '2025-01-14'),
(233, 9, 'FALUCHE', 3, 'Parfait pour un vendredi soir.', '2025-02-01'),
(234, 9, 'PDR', 4, 'Parfait pour un vendredi soir.', '2024-12-13'),
(235, 6, 'VERDE', 3, 'Un peu trop bruyant à mon goût.', '2024-12-02'),
(236, 6, 'OASIS', 2, 'Service un peu lent mais bonne musique.', '2025-02-23'),
(237, 4, 'PDR', 5, 'Décevant cette fois-ci.', '2025-02-20'),
(238, 3, 'AQUARIUM', 4, 'Ambiance incroyable, j y retournerai !', '2024-10-07'),
(239, 3, 'AQUARIUM', 1, 'Très bonne expérience dans l ensemble.', '2025-04-14'),
(240, 2, 'PDD', 2, 'Clientèle jeune et dynamique.', '2024-11-24'),
(241, 12, 'SEVEN', 5, 'Très bonne expérience dans l ensemble.', '2025-02-27'),
(242, 8, 'AQUARIUM', 5, 'Ambiance incroyable, j y retournerai !', '2025-02-27'),
(243, 9, 'AQUARIUM', 4, 'Très bonne expérience dans l ensemble.', '2025-04-05'),
(244, 11, 'AQUARIUM', 3, 'Déco sympa, mais pas assez de places.', '2024-10-26'),
(245, 10, 'PDD', 4, 'Décevant cette fois-ci.', '2025-01-16'),
(246, 8, 'AQUARIUM', 5, 'Ambiance incroyable, j y retournerai !', '2025-03-09'),
(247, 9, 'AQUARIUM', 2, 'Déco sympa, mais pas assez de places.', '2024-12-15'),
(249, 9, 'PDD', 2, 'Cocktails originaux et délicieux.', '2025-02-26'),
(250, 3, 'PDR', 5, 'Parfait pour un vendredi soir.', '2024-11-21'),
(251, 6, 'SEVEN', 2, 'Ambiance incroyable, j y retournerai !', '2024-11-29'),
(252, 9, 'PDR', 3, 'Déco sympa, mais pas assez de places.', '2025-03-01'),
(253, 11, 'VERDE', 5, 'Cocktails originaux et délicieux.', '2024-11-11'),
(254, 5, 'PDR', 5, 'Décevant cette fois-ci.', '2024-12-08'),
(255, 1, 'PDD', 4, 'Ambiance incroyable, j y retournerai !', '2025-01-25'),
(256, 7, 'IMPREVU', 5, 'Très bonne expérience dans l ensemble.', '2024-11-24'),
(258, 6, 'VERDE', 2, 'Cocktails originaux et délicieux.', '2025-01-26'),
(259, 3, 'PDD', 3, 'Cocktails originaux et délicieux.', '2024-11-06'),
(261, 9, 'SEVEN', 1, 'Très bonne expérience dans l ensemble.', '2025-01-19'),
(262, 12, 'VERDE', 1, 'Prix raisonnables, je recommande.', '2025-04-18'),
(263, 12, 'AQUARIUM', 2, 'Prix raisonnables, je recommande.', '2024-12-11'),
(264, 3, 'PDD', 3, 'Très bonne expérience dans l ensemble.', '2024-11-28'),
(265, 8, 'PDR', 2, 'Cocktails originaux et délicieux.', '2024-12-25'),
(266, 13, 'IMPREVU', 3, 'Parfait pour un vendredi soir.', '2024-11-24'),
(267, 3, 'IMPREVU', 1, 'Ambiance incroyable, j y retournerai !', '2025-03-31'),
(269, 12, 'OASIS', 4, 'Ambiance incroyable, j y retournerai !', '2025-03-20'),
(270, 4, 'SEVEN', 3, 'Très bonne expérience dans l ensemble.', '2024-10-29'),
(271, 4, 'FALUCHE', 4, 'Déco sympa, mais pas assez de places.', '2025-04-16'),
(272, 12, 'IMPREVU', 1, 'Déco sympa, mais pas assez de places.', '2025-02-13'),
(273, 2, 'AQUARIUM', 2, 'Déco sympa, mais pas assez de places.', '2024-10-06'),
(274, 4, 'IMPREVU', 3, 'Cocktails originaux et délicieux.', '2024-11-27'),
(275, 9, 'VERDE', 3, 'Clientèle jeune et dynamique.', '2025-04-01'),
(276, 3, 'PDD', 4, 'Cocktails originaux et délicieux.', '2025-01-22'),
(277, 12, 'FALUCHE', 4, 'Service un peu lent mais bonne musique.', '2024-12-22'),
(278, 7, 'PDD', 5, 'Déco sympa, mais pas assez de places.', '2025-01-27'),
(279, 5, 'SEVEN', 3, 'Déco sympa, mais pas assez de places.', '2025-04-06'),
(280, 13, 'PDR', 1, 'Ambiance incroyable, j y retournerai !', '2024-12-28'),
(281, 3, 'AQUARIUM', 1, 'Prix raisonnables, je recommande.', '2024-12-23'),
(282, 1, 'AQUARIUM', 2, 'Service un peu lent mais bonne musique.', '2024-12-23'),
(283, 11, 'FALUCHE', 2, 'Service un peu lent mais bonne musique.', '2024-11-13'),
(284, 4, 'OASIS', 2, 'Prix raisonnables, je recommande.', '2025-01-11'),
(285, 8, 'SEVEN', 3, 'Très bonne expérience dans l ensemble.', '2025-02-10'),
(286, 12, 'VERDE', 3, 'Service un peu lent mais bonne musique.', '2024-10-28'),
(287, 4, 'SEVEN', 5, 'Très bonne expérience dans l ensemble.', '2025-04-09'),
(288, 1, 'VERDE', 3, 'Un peu trop bruyant à mon goût.', '2025-02-23'),
(289, 3, 'OASIS', 5, 'Décevant cette fois-ci.', '2024-11-12'),
(290, 8, 'AQUARIUM', 3, 'Service un peu lent mais bonne musique.', '2024-11-06'),
(291, 9, 'OASIS', 4, 'Service un peu lent mais bonne musique.', '2024-10-07'),
(292, 2, 'VERDE', 3, 'Un peu trop bruyant à mon goût.', '2024-10-10'),
(293, 1, 'PDR', 3, 'Cocktails originaux et délicieux.', '2024-12-01'),
(294, 11, 'PDD', 2, 'Prix raisonnables, je recommande.', '2025-02-12'),
(295, 5, 'PDR', 3, 'Cocktails originaux et délicieux.', '2025-02-14'),
(296, 13, 'AQUARIUM', 2, 'Parfait pour un vendredi soir.', '2025-03-21'),
(297, 8, 'VERDE', 5, 'Service un peu lent mais bonne musique.', '2024-12-06'),
(298, 1, 'PDD', 3, 'Un peu trop bruyant à mon goût.', '2024-10-19'),
(299, 12, 'VERDE', 5, 'Un peu trop bruyant à mon goût.', '2024-12-26'),
(300, 1, 'PDR', 5, 'Ambiance incroyable, j y retournerai !', '2025-02-05'),
(301, 12, 'OASIS', 1, 'Service un peu lent mais bonne musique.', '2025-04-17'),
(302, 13, 'SEVEN', 2, 'Déco sympa, mais pas assez de places.', '2025-04-21'),
(303, 6, 'SEVEN', 3, 'Prix raisonnables, je recommande.', '2024-12-17'),
(304, 1, 'SEVEN', 3, 'Décevant cette fois-ci.', '2025-03-17'),
(305, 10, 'VERDE', 3, 'Clientèle jeune et dynamique.', '2025-04-23'),
(306, 13, 'AQUARIUM', 4, 'Clientèle jeune et dynamique.', '2025-04-24'),
(307, 5, 'PDD', 5, 'Parfait pour un vendredi soir.', '2025-01-21'),
(308, 6, 'PDD', 4, 'Ambiance incroyable, j y retournerai !', '2024-11-30'),
(309, 5, 'FALUCHE', 5, 'Cocktails originaux et délicieux.', '2025-03-28'),
(310, 1, 'PDR', 5, 'Prix raisonnables, je recommande.', '2025-04-23'),
(311, 7, 'IMPREVU', 5, 'Service un peu lent mais bonne musique.', '2025-02-14'),
(312, 9, 'FALUCHE', 4, 'Parfait pour un vendredi soir.', '2024-10-29'),
(314, 9, 'IMPREVU', 1, 'Prix raisonnables, je recommande.', '2025-04-28'),
(315, 8, 'FALUCHE', 4, 'Ambiance incroyable, j y retournerai !', '2024-11-11'),
(316, 4, 'SEVEN', 2, 'Service un peu lent mais bonne musique.', '2025-01-14'),
(317, 9, 'OASIS', 4, 'Un peu trop bruyant à mon goût.', '2024-12-15'),
(318, 13, 'PDR', 4, 'Prix raisonnables, je recommande.', '2025-04-15'),
(319, 12, 'FALUCHE', 2, 'Cocktails originaux et délicieux.', '2024-12-08'),
(320, 12, 'IMPREVU', 4, 'Prix raisonnables, je recommande.', '2025-03-09'),
(321, 5, 'AQUARIUM', 4, 'Ambiance incroyable, j y retournerai !', '2024-11-05'),
(322, 12, 'OASIS', 1, 'Déco sympa, mais pas assez de places.', '2024-12-08'),
(323, 12, 'OASIS', 4, 'Ambiance incroyable, j y retournerai !', '2024-12-16'),
(324, 10, 'VERDE', 3, 'Ambiance incroyable, j y retournerai !', '2025-03-16'),
(325, 3, 'VERDE', 5, 'Parfait pour un vendredi soir.', '2025-02-05'),
(326, 2, 'OASIS', 2, 'Décevant cette fois-ci.', '2025-01-08'),
(327, 4, 'VERDE', 1, 'Très bonne expérience dans l ensemble.', '2025-02-06'),
(328, 3, 'OASIS', 2, 'Parfait pour un vendredi soir.', '2024-10-17'),
(329, 10, 'IMPREVU', 5, 'Un peu trop bruyant à mon goût.', '2025-01-24'),
(330, 11, 'IMPREVU', 3, 'Service un peu lent mais bonne musique.', '2025-01-07'),
(331, 4, 'AQUARIUM', 1, 'Cocktails originaux et délicieux.', '2025-03-01'),
(332, 12, 'AQUARIUM', 5, 'Prix raisonnables, je recommande.', '2025-02-06'),
(333, 1, 'AQUARIUM', 1, 'Déco sympa, mais pas assez de places.', '2024-12-29'),
(334, 4, 'SEVEN', 4, 'Ambiance incroyable, j y retournerai !', '2024-12-03'),
(335, 6, 'OASIS', 4, 'Ambiance incroyable, j y retournerai !', '2025-04-07'),
(336, 7, 'IMPREVU', 5, 'Cocktails originaux et délicieux.', '2024-10-14'),
(337, 6, 'AQUARIUM', 3, 'Prix raisonnables, je recommande.', '2024-10-28'),
(338, 13, 'VERDE', 3, 'Service un peu lent mais bonne musique.', '2024-10-09'),
(339, 11, 'VERDE', 4, 'Parfait pour un vendredi soir.', '2024-11-25'),
(340, 11, 'VERDE', 5, 'Décevant cette fois-ci.', '2024-11-10'),
(341, 3, 'OASIS', 5, 'Prix raisonnables, je recommande.', '2025-03-30'),
(342, 12, 'IMPREVU', 5, 'Service un peu lent mais bonne musique.', '2025-03-19'),
(343, 5, 'AQUARIUM', 3, 'Parfait pour un vendredi soir.', '2024-11-04'),
(344, 8, 'VERDE', 5, 'Ambiance incroyable, j y retournerai !', '2025-04-25'),
(345, 1, 'SEVEN', 4, 'Parfait pour un vendredi soir.', '2025-02-09'),
(346, 9, 'AQUARIUM', 2, 'Déco sympa, mais pas assez de places.', '2024-11-04'),
(347, 2, 'FALUCHE', 2, 'Service un peu lent mais bonne musique.', '2025-04-25'),
(348, 7, 'AQUARIUM', 3, 'Déco sympa, mais pas assez de places.', '2024-11-05'),
(349, 7, 'VERDE', 2, 'Ambiance incroyable, j y retournerai !', '2024-10-19'),
(350, 6, 'PDR', 5, 'Très bonne expérience dans l ensemble.', '2025-01-23'),
(351, 8, 'FALUCHE', 5, 'Un peu trop bruyant à mon goût.', '2025-04-22'),
(352, 1, 'PDR', 2, 'Ambiance incroyable, j y retournerai !', '2025-03-31'),
(353, 3, 'IMPREVU', 4, 'Un peu trop bruyant à mon goût.', '2025-03-05'),
(354, 2, 'OASIS', 2, 'Ambiance incroyable, j y retournerai !', '2025-03-23'),
(355, 12, 'VERDE', 4, 'Très bonne expérience dans l ensemble.', '2025-01-28'),
(356, 4, 'SEVEN', 1, 'Ambiance incroyable, j y retournerai !', '2024-12-08'),
(357, 3, 'AQUARIUM', 4, 'Décevant cette fois-ci.', '2025-02-02'),
(358, 9, 'IMPREVU', 2, 'Très bonne expérience dans l ensemble.', '2024-11-19'),
(359, 7, 'AQUARIUM', 5, 'Prix raisonnables, je recommande.', '2024-10-08'),
(360, 10, 'PDR', 1, 'Clientèle jeune et dynamique.', '2025-03-09'),
(361, 11, 'AQUARIUM', 2, 'Clientèle jeune et dynamique.', '2025-03-28'),
(362, 2, 'PDD', 4, 'Déco sympa, mais pas assez de places.', '2025-04-06'),
(363, 9, 'FALUCHE', 1, 'Clientèle jeune et dynamique.', '2025-04-13'),
(364, 10, 'PDD', 2, 'Un peu trop bruyant à mon goût.', '2025-02-22'),
(365, 8, 'OASIS', 4, 'Prix raisonnables, je recommande.', '2025-02-10'),
(366, 12, 'FALUCHE', 4, 'Très bonne expérience dans l ensemble.', '2024-11-11'),
(367, 7, 'SEVEN', 1, 'Cocktails originaux et délicieux.', '2024-11-16'),
(369, 10, 'VERDE', 2, 'Ambiance incroyable, j y retournerai !', '2025-04-17'),
(370, 12, 'AQUARIUM', 5, 'Très bonne expérience dans l ensemble.', '2025-04-03'),
(371, 7, 'VERDE', 3, 'Décevant cette fois-ci.', '2025-04-17'),
(372, 11, 'PDD', 3, 'Déco sympa, mais pas assez de places.', '2025-02-05'),
(373, 2, 'AQUARIUM', 2, 'Prix raisonnables, je recommande.', '2024-12-05'),
(374, 13, 'OASIS', 5, 'Décevant cette fois-ci.', '2025-03-27'),
(375, 12, 'IMPREVU', 2, 'Clientèle jeune et dynamique.', '2025-04-06'),
(376, 11, 'SEVEN', 1, 'Déco sympa, mais pas assez de places.', '2024-10-17'),
(377, 9, 'OASIS', 3, 'Prix raisonnables, je recommande.', '2024-10-01'),
(378, 8, 'IMPREVU', 2, 'Très bonne expérience dans l ensemble.', '2025-03-12'),
(379, 6, 'IMPREVU', 2, 'Prix raisonnables, je recommande.', '2025-03-23'),
(380, 10, 'SEVEN', 4, 'Déco sympa, mais pas assez de places.', '2025-04-06'),
(381, 10, 'PDR', 3, 'Un peu trop bruyant à mon goût.', '2024-12-02'),
(382, 9, 'AQUARIUM', 2, 'Un peu trop bruyant à mon goût.', '2024-11-22'),
(383, 9, 'PDR', 5, 'Très bonne expérience dans l ensemble.', '2025-04-23'),
(384, 7, 'VERDE', 2, 'Déco sympa, mais pas assez de places.', '2025-01-14'),
(385, 10, 'PDR', 1, 'Un peu trop bruyant à mon goût.', '2024-10-13'),
(386, 12, 'PDR', 4, 'Un peu trop bruyant à mon goût.', '2025-04-18'),
(387, 10, 'VERDE', 3, 'Parfait pour un vendredi soir.', '2025-03-27'),
(388, 2, 'PDR', 1, 'Décevant cette fois-ci.', '2025-02-15'),
(390, 2, 'SEVEN', 5, 'Clientèle jeune et dynamique.', '2024-12-02'),
(391, 13, 'VERDE', 2, 'Décevant cette fois-ci.', '2024-10-06'),
(392, 2, 'SEVEN', 2, 'Déco sympa, mais pas assez de places.', '2024-10-25'),
(393, 5, 'PDR', 5, 'Cocktails originaux et délicieux.', '2024-12-25'),
(394, 12, 'OASIS', 2, 'Décevant cette fois-ci.', '2024-11-05'),
(395, 6, 'PDD', 4, 'Service un peu lent mais bonne musique.', '2025-02-11'),
(396, 11, 'PDR', 1, 'Parfait pour un vendredi soir.', '2024-12-10'),
(397, 10, 'OASIS', 5, 'Un peu trop bruyant à mon goût.', '2025-03-20'),
(398, 2, 'PDR', 2, 'Cocktails originaux et délicieux.', '2025-01-20'),
(399, 8, 'FALUCHE', 3, 'Ambiance incroyable, j y retournerai !', '2024-12-24'),
(400, 4, 'AQUARIUM', 2, 'Un peu trop bruyant à mon goût.', '2025-04-13'),
(401, 9, 'PDR', 1, 'Service un peu lent mais bonne musique.', '2024-10-26'),
(402, 10, 'IMPREVU', 5, 'Clientèle jeune et dynamique.', '2025-01-16'),
(403, 6, 'PDR', 4, 'Décevant cette fois-ci.', '2025-04-21'),
(404, 5, 'VERDE', 4, 'Un peu trop bruyant à mon goût.', '2024-10-25'),
(405, 6, 'IMPREVU', 4, 'Service un peu lent mais bonne musique.', '2025-01-04'),
(406, 6, 'PDD', 4, 'Prix raisonnables, je recommande.', '2024-12-28'),
(407, 7, 'IMPREVU', 3, 'Très bonne expérience dans l ensemble.', '2024-11-10'),
(408, 9, 'FALUCHE', 5, 'Parfait pour un vendredi soir.', '2024-10-30'),
(409, 4, 'PDD', 5, 'J\'ai adoré !', '2025-05-21'),
(410, 4, 'PDD', 5, 'Toujours autant incroyable !', '2025-05-21'),
(411, 4, 'PDD', 5, 'INSANE §', '2025-05-21'),
(412, 4, 'PDD', 5, 'Chapeau !', '2025-05-21'),
(413, 4, 'PDD', 5, 'SHEESH !', '2025-05-21'),
(422, 4, 'verde', 4, 'Ambiance Super !', '2025-05-22'),
(423, 4, 'Zytho', 5, 'Ambiance incroyable !', '2025-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `bar`
--

CREATE TABLE `bar` (
  `Id_bar` int(10) NOT NULL,
  `Nom` varchar(64) NOT NULL,
  `Adresse` text NOT NULL,
  `Avis` int(11) NOT NULL,
  `Horaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bar`
--

INSERT INTO `bar` (`Id_bar`, `Nom`, `Adresse`, `Avis`, `Horaire`) VALUES
(1, 'Verde', '21 Rue Masséna, Lille', 3, 'Mar-Sam: 22h-00h'),
(2, 'SEVEN', '124 Rue Solférino, Lille, France', 3, 'Lun-Sam: 19h-02h'),
(3, 'PDR', '43 Rue Masséna, Lille', 3, 'Dim-Mer: 10h-01h, Jeu-Ven: 10h-02h'),
(4, 'PDD', '48 Rue Solférino, Lille', 4, 'Lun-Jeu: 15h-00h, Ven: 15h-01h, Sam: 14h-01h, Dim: 14h-22h'),
(5, 'Oasis', '1 Av. Mathias Delobel, Lille', 3, 'Lun-Sam: 10h30-23h30, Dim: 10h30-21h'),
(6, 'Imprevu', '18 Rue Masséna, Lille', 3, 'Dim-Mer: 15h-01h, Jeu-Sam: 15h-02h'),
(7, 'Faluche', '39 Rue du Port, Lille', 3, 'Lun: 10h-21h, Mar: 10h-00h, Mer: 10h-21h, Jeu: 10h-00h, Ven: 10h-00h30'),
(8, 'Aquarium', '29 Rue Ernest Deconynck, Lille', 3, 'Dim-Mer: 18h-01h, Jeu-Ven: 18h-02h'),
(11, 'Zytho', 'à préciser', 5, 'à préciser');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `Id` int(5) NOT NULL,
  `Pseudo` varchar(15) NOT NULL,
  `Mail` varchar(64) NOT NULL,
  `Mdp` varchar(15) NOT NULL,
  `Admin` int(3) NOT NULL DEFAULT '0',
  `Id_avatar` int(11) NOT NULL DEFAULT '0',
  `Ami1` int(5) DEFAULT NULL,
  `Ami2` int(5) DEFAULT NULL,
  `Ami3` int(5) DEFAULT NULL,
  `Ami4` int(5) DEFAULT NULL,
  `Ami5` int(5) DEFAULT NULL,
  `Ami6` int(5) DEFAULT NULL,
  `Ami7` int(5) DEFAULT NULL,
  `Ami8` int(5) DEFAULT NULL,
  `Ami9` int(5) DEFAULT NULL,
  `Ami10` int(5) DEFAULT NULL,
  `Tribu` varchar(255) NOT NULL DEFAULT '?',
  `Force` varchar(255) NOT NULL DEFAULT '?',
  `Compagnon` varchar(255) NOT NULL DEFAULT '?',
  `Phrase` varchar(255) NOT NULL DEFAULT '?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`Id`, `Pseudo`, `Mail`, `Mdp`, `Admin`, `Id_avatar`, `Ami1`, `Ami2`, `Ami3`, `Ami4`, `Ami5`, `Ami6`, `Ami7`, `Ami8`, `Ami9`, `Ami10`, `Tribu`, `Force`, `Compagnon`, `Phrase`) VALUES
(1, 'Bart', 'corentin.bondeau@gmail.com', 'Bart', 0, 7, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Les Helvètes', 'Courage exceptionnel', 'Assurancetourix', 'Tu vas voir ce que tu vas voir !'),
(2, 'aaa', 'Angus@student.junia.com', 'aaa', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(3, 'aaz', 'Angus@student.junia.com', 'aaa', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(4, 'Alice01', 'alice01@example.com', 'mdpAlice', 2, 0, 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, '?', '?', '?', '?'),
(5, 'Bob02', 'bob02@example.com', 'mdpBob', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(6, 'Charlie03', 'charlie03@example.com', 'mdpCharlie', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(7, 'Diane04', 'diane04@example.com', 'mdpDiane', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(8, 'Eric05', 'eric05@example.com', 'mdpEric', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(9, 'Fiona06', 'fiona06@example.com', 'mdpFiona', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(10, 'Greg07', 'greg07@example.com', 'mdpGreg', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(11, 'Hana08', 'hana08@example.com', 'mdpHana', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(12, 'Ian09', 'ian09@example.com', 'mdpIan', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(13, 'Julia10', 'julia10@example.com', 'mdpJulia', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?', '?', '?', '?'),
(14, 'Admin', 'Admin@admin.com', 'admin', 2, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Les Germains', 'Force surhumaine', 'Assurancetourix', 'La potion magique, c’est sacré !');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`Id_avis`);

--
-- Indexes for table `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`Id_bar`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `Id_avis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `bar`
--
ALTER TABLE `bar`
  MODIFY `Id_bar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
