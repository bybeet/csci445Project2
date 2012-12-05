CREATE DATABASE team06;

CREATE TABLE IF NOT EXISTS `USERS` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `FRIENDS` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `friendid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
  ) AUTO_INCREMENT=1 ;
  
CREATE TABLE IF NOT EXISTS `STATUS UPDATES` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `status` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
  ) AUTO_INCREMENT=1 ;
  
CREATE TABLE IF NOT EXISTS `USER_INFORMATION` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `information` varchar(200) NOT NULL,
    PRIMARY KEY (`id`)
  ) AUTO_INCREMENT=1 ;
