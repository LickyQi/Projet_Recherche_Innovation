create database pri_1;

use pri_1;

CREATE TABLE `Users` (
`id` int(11) NOT NULL auto_increment,
`name` varchar(100) NOT NULL,
`password` text NOT NULL,
PRIMARY KEY  (`id`)
);
