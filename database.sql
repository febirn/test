CREATE DATABASE db_library_v1;

USE db_library_v1;

CREATE TABLE librarian (id INT(11) PRIMARY KEY AUTO_INCREMENT,user_id VARCHAR(255), name VARCHAR(255),
	gender VARCHAR(255), username VARCHAR(255), password VARCHAR(255), 
	phone_number VARCHAR(255), address TEXT, date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	date_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	libraian_status INT(11) DEFAULT 1, deleted INT(11) DEFAULT 1);

CREATE TABLE members (id INT(11) PRIMARY KEY AUTO_INCREMENT, librarian_id INT(11),
	FOREIGN KEY (librarian_id) REFERENCES librarian (id), name VARCHAR(255), 
	gender VARCHAR(255), photo VARCHAR(255), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	date_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
	date_expired DATETIME, deleted INT(11) DEFAULT 1);

INSERT INTO `librarian` (`id`, `user_id`, `name`, `gender`, `username`, `password`, `phone_number`, `address`,`libraian_status`, `deleted`) 
VALUES (1, 'SA001', 'Febi Adrian', 'Laki-Laki', 'admin', 'admin', '085678493877', 'Yogyakarta', 0, 0);

