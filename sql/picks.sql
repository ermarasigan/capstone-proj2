CREATE TABLE IF NOT EXISTS `picks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `songid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `deleted` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `songid` (`songid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

ALTER TABLE `picks`
  ADD CONSTRAINT `picks_ibfk_1` FOREIGN KEY (`songid`) 
    REFERENCES `songs` (`id`) 
    ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `picks_ibfk_2` FOREIGN KEY (`userid`) 
    REFERENCES `users` (`id`) 
    ON DELETE SET NULL ON UPDATE CASCADE;