CREATE DEFINER=`cmpt370_rdynam`@`%` PROCEDURE `create_members_table`()
BEGIN
CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `firstname` char(50),
  `lastname` char(50),
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `loginAttempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





END