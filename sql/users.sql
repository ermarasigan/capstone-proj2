CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`,`birthday`) VALUES
(1, 'Emman', '4f26aeafdb2367620a393c973eddbe8f8b846ebd', 'admin','1992-10-03'),
(2, 'Sano', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'regular','1993-12-15')