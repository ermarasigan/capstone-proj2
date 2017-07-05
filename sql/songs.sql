-- Create mysql table for songs

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `year` char(4) NULL,
  `bpm` int(11) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

ALTER TABLE `songs`
	add fulltext index `fulltext`
	(`title` asc, `artist` asc)
;