-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2023 at 11:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esguerraga_canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryId` tinyint(1) unsigned NOT NULL,
  `CategoryName` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryId`, `CategoryName`) VALUES
(1, 'Meal'),
(2, 'Snack'),
(3, 'Drink');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`ProductId` smallint(5) unsigned NOT NULL,
  `CategoryId` tinyint(1) unsigned NOT NULL,
  `StatusId` tinyint(1) unsigned NOT NULL,
  `ProductName` varchar(40) NOT NULL,
  `ProductPrice` float unsigned NOT NULL,
  `Dietary` varchar(14) NOT NULL,
  `Ingredients` varchar(700) NOT NULL,
  `Image` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductId`, `CategoryId`, `StatusId`, `ProductName`, `ProductPrice`, `Dietary`, `Ingredients`, `Image`) VALUES
(1, 1, 1, 'Ham and Cheese Sandwich', 3.5, 'GF, NF', 'Water, Modified Tapioca Starch (1442), Rice Flour, Corn Fibre, Canola Oil , Sugar, Egg White Powder, Defatted Soy Flour, Baker''s Yeast, Potato Fibre, Vinegar, Iodised Salt, Thickeners (464, 466, 1412, 407A, 415), Psyllium, Vegetable Gum (412), Maize Starch,  Pork, Dextrose, Mineral Salts (451, 452, 450, 500), Antioxidant (316), Rennet, Milk, Emulsifiers (331, 339), Acidity Regulator (330), Preservative (250, 200)', 'hamandcheese.jpg'),
(2, 1, 1, 'Chicken Wrap', 4, 'DF, NF', 'Wheat Flour, Water, Vegetable Oil (Antioxidant (307)), Rice Flour, Salt, Emulsifier (471), Raising Agents (500, 450, 341), Preservatives (282, 200, 385), Acidity Regulator (297), Dextrose , Stabilisers (466, 415), Chicken, Liquid Egg, White Vinegar, Sugar, Lemon Juice, Spices, Lettuce, Carrot', 'chickenwrap.jpg'),
(3, 1, 1, 'Tofu Salad', 5, 'VG, NF', 'Soybeans, Lettuce, Onions, Malt Vinegar, (Caramel 150), Sugar, Honey, Spices, Salt, Acidity Regulator (270), Edamame, Corn, White Vinegar, Water, Wheat, Colour (150c), Flavour Enhancer (621), Preservative (211,202), Citrus Fruit Juice (Orange Juice Concentrate, Lemon), Canola Oil, Ginger Paste, Stabiliser (415), Sesame Oil', 'tofusalad.jpg'),
(4, 2, 1, 'Up and Go Choc Ice', 2.5, 'V, NF', 'Filtered Water, Skim Milk Powder, Cane Sugar, Maltodextrin (wheat, corn), Soy Protein, Vegetable Fibre, Vegetable Oils (sunflower, canola), Corn Syrup Solids, Fructose, Cocoa (0.5%), Oat Flour, Mineral (calcium), Acidity Regulator (332), Flavours, Vegetable Gums (460, 466, 407), Stabiliser (452), Salt, Vitamins (C, niacin, A, B12, B6, B2, B1, folate)', 'upandgo.jpg'),
(5, 2, 1, 'Apple', 2, 'GF, DF, VG, NF', 'Apple', 'apple.jpg'),
(6, 2, 1, 'Ready Salted Chips', 2.5, 'GF, VG, NF', 'Potatoes, Canola Oil , Sunflower Oil, Salt, Antioxidants (Tocopherols, Ascorbic Acid, Rosemary Extract, Citric Acid)', 'chips.jpg'),
(7, 3, 1, 'Coke Zero Sugar', 2, 'VG, DF, GF, NF', 'Carbonated water, colour (150d), food acids (338, 331), sweeteners (951, 950), flavour, caffeine', 'cokezerosugar.jpg'),
(8, 3, 1, 'Sprite No Sugar', 2, 'VG, DF, GF, NF', 'Carbonated Water, Food Acids (330, 331), Flavour, Sweeteners (951, 950), Preservative (211)', 'spritenosugar.jpg'),
(9, 3, 1, 'Bottled Water', 2, 'VG, DF, GF, NF', 'Water', 'water.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE IF NOT EXISTS `specials` (
`SpecialsId` smallint(5) unsigned NOT NULL,
  `ProductId` smallint(5) unsigned NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `SpecialPrice` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`SpecialsId`, `ProductId`, `StartDate`, `EndDate`, `SpecialPrice`) VALUES
(1, 5, '2022-08-22', '2022-08-26', 1),
(2, 8, '2022-08-22', '2022-08-26', 1),
(3, 1, '2022-08-29', '2022-09-02', 2),
(4, 7, '2022-08-29', '2022-09-02', 1),
(5, 6, '2022-09-05', '2022-09-09', 1),
(6, 9, '2022-09-05', '2022-09-09', 1),
(7, 1, '2022-09-12', '2022-09-16', 2),
(8, 8, '2022-09-12', '2022-09-16', 1),
(9, 6, '2022-09-19', '2022-09-23', 1),
(10, 7, '2022-09-19', '2022-09-23', 1),
(11, 5, '2022-09-26', '2022-09-30', 1),
(12, 9, '2022-09-26', '2022-09-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `StatusId` tinyint(1) unsigned NOT NULL,
  `Description` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusId`, `Description`) VALUES
(1, 'Available'),
(2, 'Out of Stock');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`ProductId`), ADD KEY `CategoryId` (`CategoryId`,`StatusId`), ADD KEY `StatusId` (`StatusId`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
 ADD PRIMARY KEY (`SpecialsId`), ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`StatusId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `ProductId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
MODIFY `SpecialsId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`CategoryId`),
ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`StatusId`) REFERENCES `status` (`StatusId`);

--
-- Constraints for table `specials`
--
ALTER TABLE `specials`
ADD CONSTRAINT `specials_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
