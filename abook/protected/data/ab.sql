CREATE TABLE user (
    id int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE contact (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id int(10) unsigned NOT NULL,
    firstname VARCHAR(128) NOT NULL,
    lastname VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    phone VARCHAR(128) NOT NULL,
    CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO user (username, password, email) VALUES ('test1', 'test1', 'test1@example.com');
INSERT INTO user (username, password, email) VALUES ('test2', 'pass2', 'test2@example.com');
INSERT INTO user (username, password, email) VALUES ('test3', 'pass3', 'test3@example.com');
INSERT INTO user (username, password, email) VALUES ('test4', 'pass4', 'test4@example.com');
INSERT INTO user (username, password, email) VALUES ('test5', 'pass5', 'test5@example.com');
INSERT INTO user (username, password, email) VALUES ('test6', 'pass6', 'test6@example.com');
INSERT INTO user (username, password, email) VALUES ('test7', 'pass7', 'test7@example.com');
INSERT INTO user (username, password, email) VALUES ('test8', 'pass8', 'test8@example.com');
INSERT INTO user (username, password, email) VALUES ('test9', 'pass9', 'test9@example.com');
INSERT INTO user (username, password, email) VALUES ('test10', 'pass10', 'test10@example.com');
INSERT INTO user (username, password, email) VALUES ('test11', 'pass11', 'test11@example.com');
INSERT INTO user (username, password, email) VALUES ('test12', 'pass12', 'test12@example.com');
INSERT INTO user (username, password, email) VALUES ('test13', 'pass13', 'test13@example.com');
INSERT INTO user (username, password, email) VALUES ('test14', 'pass14', 'test14@example.com');
INSERT INTO user (username, password, email) VALUES ('test15', 'pass15', 'test15@example.com');
INSERT INTO user (username, password, email) VALUES ('test16', 'pass16', 'test16@example.com');
INSERT INTO user (username, password, email) VALUES ('test17', 'pass17', 'test17@example.com');
INSERT INTO user (username, password, email) VALUES ('test18', 'pass18', 'test18@example.com');
INSERT INTO user (username, password, email) VALUES ('test19', 'pass19', 'test19@example.com');
INSERT INTO user (username, password, email) VALUES ('test20', 'pass20', 'test20@example.com');
INSERT INTO user (username, password, email) VALUES ('test21', 'pass21', 'test21@example.com');



INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test1', 'lastname1', 'test1@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test2', 'lastname2', 'test2@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test3', 'lastname3', 'test3@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test4', 'lastname4', 'test4@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test5', 'lastname5', 'test5@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test6', 'lastname6', 'test6@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test7', 'lastname7', 'test7@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test8', 'lastname8', 'test8@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test9', 'lastname9', 'test9@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test10', 'lastname10', 'test10@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test11', 'lastname11', 'test11@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test12', 'lastname12', 'test12@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test13', 'lastname13', 'test13@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test14', 'lastname14', 'test14@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test15', 'lastname15', 'test15@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test16', 'lastname16', 'test16@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test17', 'lastname17', 'test17@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test18', 'lastname18', 'test18@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test19', 'lastname19', 'test19@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test20', 'lastname20', 'test20@example.com', '1234567890');
INSERT INTO contact (user_id, firstname, lastname, email, phone) VALUES (1,'test21', 'lastname21', 'test21@example.com', '1234567890');