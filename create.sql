CREATE TABLE `item` (
  `Id` bigint NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Available` varchar(500) NOT NULL,
  `List Price` decimal(65,2) DEFAULT NULL,
  `Discount` varchar(400) NOT NULL,
  `Amount` varchar(5000) NOT NULL,
  `Remarks` varchar(6000) NOT NULL,
  `UpdatedDiscount` varchar(1000) NOT NULL,
  `UpdatedPrice` varchar(1000) NOT NULL,
  `LastSend` datetime DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LessThanQty` bigint NOT NULL DEFAULT '5',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

