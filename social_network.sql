CREATE DATABASE team06;

CREATE TABLE IF NOT EXISTS `USERS` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `age` int(3),
  `gender` varchar(6),
  `image_filename` varchar(60),
  PRIMARY KEY  (`id`)
) AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `FRIENDS` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `friendid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
  ) AUTO_INCREMENT=1 ;
  
CREATE TABLE IF NOT EXISTS `STATUS_UPDATES` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `status` text NOT NULL,
  `lastUpdated` TIMESTAMP,
  PRIMARY KEY (`id`)
  ) AUTO_INCREMENT=1 ;
  
CREATE TABLE IF NOT EXISTS `STATUS_COMMENTS` (
  `id` int(11) NOT NULL auto_increment,
  `statusid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text NOT NULL,
    PRIMARY KEY (`id`)
  ) AUTO_INCREMENT=1 ;
