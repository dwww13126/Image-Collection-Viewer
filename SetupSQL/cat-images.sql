CREATE TABLE `cat-images` (
  `filename` varchar(128) NOT NULL,
  `label` varchar(128) NOT NULL,
  `category` INT(1) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `rating` INT(2) NOT NULL,
  `favorite` INT(1) NOT NULL,
  PRIMARY KEY (`filename`)
)
