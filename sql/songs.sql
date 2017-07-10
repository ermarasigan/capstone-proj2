-- Create mysql table for songs

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `year` char(4) NOT NULL,
  `bpm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

ALTER TABLE `songs`
  ADD UNIQUE KEY `uniquesong` (`title`,`artist`,`year`);
ALTER TABLE `songs` ADD FULLTEXT KEY `songs_fulltext` (`title`,`artist`);


-- ALTER TABLE `songs`
-- 	add unique index `uniquesong`
-- 	(`title`, `artist`, `year`)
-- ;

-- ALTER TABLE `songs`
-- 	add fulltext index `fulltext`
-- 	(`title` asc, `artist` asc)
-- ;


