DROP TABLE IF EXISTS acct_activation_request;
CREATE TABLE `acct_activation_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(255) NOT NULL COMMENT 'User id | Foreign Key',
  `subject` varchar(100) NOT NULL,
  `request_status` tinyint(10) NOT NULL DEFAULT 1 COMMENT '1=NEW | 0=OLD',
  `date_request` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`request_id`),
  KEY `admin_id` (`users_id`),
  CONSTRAINT `admin_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
INSERT INTO acct_activation_request VALUES("7","109","Account activation request","0","2023-04-03 01:19:31");
DROP TABLE IF EXISTS barrowed_equipment;
CREATE TABLE `barrowed_equipment` (
  `barrow_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `costumer_id` int(11) NOT NULL COMMENT 'Foreign Key',
  `equipment_id` int(11) NOT NULL COMMENT 'Foreign Key',
  `barrow_status` tinyint(5) NOT NULL COMMENT '1 = Pending| 0 = Complete',
  `barrow_date` datetime NOT NULL DEFAULT current_timestamp(),
  `return_date` datetime DEFAULT NULL,
  `barrow_qty` int(11) NOT NULL,
  `subtotal_amount` int(100) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Issued by | Foreign Key',
  PRIMARY KEY (`barrow_id`),
  KEY `barrower_id` (`costumer_id`),
  KEY `equipment_id` (`equipment_id`),
  KEY `user_admin_id` (`user_id`),
  CONSTRAINT `barrower_id` FOREIGN KEY (`costumer_id`) REFERENCES `costumers` (`costumer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `equipment_id` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_admin_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;
INSERT INTO barrowed_equipment VALUES("58","212","80","0","2023-05-05 12:35:17","2023-05-05 12:35:48","0","0","109");
INSERT INTO barrowed_equipment VALUES("60","211","83","0","2023-05-05 12:41:07","2023-05-05 12:42:51","0","0","109");
DROP TABLE IF EXISTS categories;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL COMMENT 'Must be Unique',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL COMMENT 'Foreign key',
  `category_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=Available | 0=NOT',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`),
  KEY `users_id` (`user_id`),
  CONSTRAINT `users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;
INSERT INTO categories VALUES("19","Office","2023-03-12 21:02:20","109","1");
INSERT INTO categories VALUES("38","STEM","2023-03-22 21:48:56","109","1");
INSERT INTO categories VALUES("39","Clinic","2023-03-22 21:51:16","109","1");
INSERT INTO categories VALUES("40","TVL-HE","2023-03-22 21:52:49","109","1");
INSERT INTO categories VALUES("56","TVL-ICT","2023-04-05 16:09:14","109","1");
INSERT INTO categories VALUES("67","test1","2023-04-06 03:31:07","109","0");
DROP TABLE IF EXISTS codes;
CREATE TABLE `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `expire` (`expire`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=386 DEFAULT CHARSET=utf8mb4;
INSERT INTO codes VALUES("17","sample@yahoo.com","56516","1676734217");
INSERT INTO codes VALUES("63","teemo@gmail.com","21941","1678281451");
INSERT INTO codes VALUES("268","hannahpalatan@gmail.com","35863","1678447465");
INSERT INTO codes VALUES("270","erwindagoc93@gmail.com","85808","1678447772");
INSERT INTO codes VALUES("271","cedricjamesresurreccion27@gmail.com","65246","1678448160");
INSERT INTO codes VALUES("272","maureeenalejandreamahor@gmail.com","97516","1678450831");
INSERT INTO codes VALUES("273","shikalo444@gmail.com","27095","1678453947");
INSERT INTO codes VALUES("385","jeromesavc@gmail.com","50723","1683347526");
DROP TABLE IF EXISTS costumers;
CREATE TABLE `costumers` (
  `costumer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `school_id` int(50) NOT NULL COMMENT 'Foreign Key',
  `role_position` text NOT NULL,
  `costumer_status` tinyint(11) NOT NULL COMMENT '1=Allowed | 0=Block',
  `admin_id` int(100) NOT NULL COMMENT 'Added by | Foreign Key',
  PRIMARY KEY (`costumer_id`),
  KEY `schoolBranch_id` (`school_id`),
  KEY `id_admin` (`admin_id`),
  CONSTRAINT `id_admin` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `schoolBranch_id` FOREIGN KEY (`school_id`) REFERENCES `location_branch` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8mb4;
INSERT INTO costumers VALUES("211","testbarrower1","test1@gmail.com","09887625544","test address","19","Student","1","109");
INSERT INTO costumers VALUES("212","test","test@gmail.com","09887264455","test","21","Student","1","109");
DROP TABLE IF EXISTS equipment;
CREATE TABLE `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `category_id` int(50) NOT NULL COMMENT 'Foreign key',
  `equipment_name` varchar(100) NOT NULL COMMENT 'Must be Unique',
  `type_id` int(10) NOT NULL COMMENT 'Foreign key',
  `location_id` int(10) NOT NULL COMMENT 'Foreign key',
  `unit_id` int(10) NOT NULL COMMENT 'Foreign key',
  `price` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `in_use` int(100) NOT NULL COMMENT 'Equipment Used',
  `quantity` int(100) NOT NULL COMMENT 'Equipment Available',
  `amount` int(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '1=Available | 0=NOT',
  `equipment_img` varchar(255) NOT NULL,
  `img_extension` varchar(10) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `user_id` int(100) NOT NULL COMMENT 'Added By | Foreign key',
  `admins_id` int(100) DEFAULT NULL COMMENT 'Updated by | Foreign Key',
  PRIMARY KEY (`id`),
  UNIQUE KEY `equipment_name` (`equipment_name`),
  KEY `catergory` (`category_id`),
  KEY `equipment_type` (`type_id`),
  KEY `equipment_unit` (`unit_id`),
  KEY `user_id` (`user_id`),
  KEY `location_rack` (`location_id`),
  KEY `admins_id` (`admins_id`),
  CONSTRAINT `admins_id` FOREIGN KEY (`admins_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `catergory` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `equipment_type` FOREIGN KEY (`type_id`) REFERENCES `equipment_type` (`equip_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `equipment_unit` FOREIGN KEY (`unit_id`) REFERENCES `equipment_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `location_rack` FOREIGN KEY (`location_id`) REFERENCES `location_branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4;
INSERT INTO equipment VALUES("79","19","Monitor","8","22","21","399","10","0","10","3990","1","monitor","png","2023-05-04 03:57:57","","109","");
INSERT INTO equipment VALUES("80","39","Wound Kit","13","21","23","500","10","0","10","5000","1","woundkit","jpg","2023-05-04 03:59:30","","109","");
INSERT INTO equipment VALUES("83","56","test","8","19","21","200","10","0","10","2000","1","mouse","png","2023-05-05 12:40:11","","109","");
DROP TABLE IF EXISTS equipment_type;
CREATE TABLE `equipment_type` (
  `equip_id` int(11) NOT NULL AUTO_INCREMENT,
  `equip_type` varchar(100) NOT NULL COMMENT 'Must be Unique',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL COMMENT 'Foreign key',
  `equip_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=Available | 0=NOT',
  PRIMARY KEY (`equip_id`),
  UNIQUE KEY `equip_type` (`equip_type`),
  KEY `et_user_id` (`user_id`),
  CONSTRAINT `et_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
INSERT INTO equipment_type VALUES("8","Computer Peripherals","2023-03-12 21:02:38","109","1");
INSERT INTO equipment_type VALUES("12","Science Laboratory Equipment","2023-03-22 21:48:42","109","1");
INSERT INTO equipment_type VALUES("13","Medical Equipment","2023-03-22 21:51:25","109","1");
INSERT INTO equipment_type VALUES("14","Cleaning Materials","2023-03-22 21:53:04","109","1");
INSERT INTO equipment_type VALUES("17","Faculty Materials","2023-03-27 20:45:32","109","1");
INSERT INTO equipment_type VALUES("26","test","2023-04-06 02:24:53","109","0");
INSERT INTO equipment_type VALUES("30","test1","2023-05-04 03:39:12","109","0");
DROP TABLE IF EXISTS equipment_unit;
CREATE TABLE `equipment_unit` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `unit_type` varchar(50) NOT NULL COMMENT 'Must be Unique',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL COMMENT 'Foreign key',
  `unit_status` int(2) NOT NULL DEFAULT 1 COMMENT '1 = Available | 0 = NOT',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit_type` (`unit_type`),
  KEY `ut_user_id` (`user_id`),
  CONSTRAINT `ut_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
INSERT INTO equipment_unit VALUES("21","Each(s)","2023-03-22 21:49:07","109","1");
INSERT INTO equipment_unit VALUES("23","Bundle(s)","2023-03-27 20:43:12","109","1");
INSERT INTO equipment_unit VALUES("29","test","2023-04-05 14:15:20","109","0");
INSERT INTO equipment_unit VALUES("33","Package(s)","2023-04-19 19:16:21","109","1");
DROP TABLE IF EXISTS location_branch;
CREATE TABLE `location_branch` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `location` varchar(200) NOT NULL COMMENT 'Must be Unique',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Foreign key',
  `location_status` int(2) NOT NULL DEFAULT 1 COMMENT '1 = Available | 0 = NOT',
  PRIMARY KEY (`id`),
  UNIQUE KEY `location` (`location`),
  KEY `lb_user_id` (`user_id`),
  CONSTRAINT `lb_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
INSERT INTO location_branch VALUES("19","Golden Minds Colleges Sta. Maria, Bulacan","2023-03-12 21:02:55","109","1");
INSERT INTO location_branch VALUES("21","Golden Minds Colleges Balagtas, Bulacan","2023-03-13 01:05:10","109","1");
INSERT INTO location_branch VALUES("22","Golden Minds Academy Guiguinto, Bulacan","2023-03-13 01:05:25","109","1");
INSERT INTO location_branch VALUES("32","test","2023-04-06 02:31:13","109","0");
DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `acct_name` varchar(255) NOT NULL,
  `uname` varchar(100) NOT NULL COMMENT 'Must be Unique',
  `pword` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 = Active| 0 = Inactive',
  `school_branch` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` text NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `img_extension` varchar(50) NOT NULL,
  `acct_created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_logged_in` tinyint(10) NOT NULL COMMENT '1=Account LoggedIn | 0=NOT',
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `session_id` varchar(200) NOT NULL COMMENT 'User SID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4;
INSERT INTO users VALUES("109","Jerome Avecilla","admin","$2y$10$DfV7o9khtxXElebULbK9cenWgZUFvyUx6Ne8IIDeBNYYQm.r5qpTG","1","Golden Minds Colleges Sta. Maria, Bulacan","Bulacan, Philippines","9469595286","jeromesavc@gmail.com","2004-03-24","Male","adminn","png","2023-03-11 02:12:18","1","2023-05-06 13:25:06","2023-05-06 13:15:47","h59hhem2nfrevctoql6jn29hvk");
