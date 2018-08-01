

use id6644766_mutestore;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `notelp` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saran` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);