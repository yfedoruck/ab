drop database ab;
create database ab;
use ab;
set foreign_key_checks = 0;

CREATE TABLE user (
    id int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE ugroup (
    id int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id int(10) unsigned NOT NULL,
    groupname VARCHAR(128) NOT NULL,
    CONSTRAINT `FK_group_usr` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE contact (
    id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id int(10) unsigned NOT NULL,
    group_id int(10) unsigned NOT NULL,
    firstname VARCHAR(128) NOT NULL,
    lastname VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    phone VARCHAR(128) NOT NULL,
    UNIQUE KEY(firstname, lastname),
    CONSTRAINT `FK_cnt_usr` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `FK_cnt_grp` FOREIGN KEY (`group_id`) REFERENCES `ugroup`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




INSERT INTO user (username, password, email) VALUES ('test1', 'test1', 'test1@example.com');

INSERT INTO ugroup (user_id, groupname) VALUES (1, 'General');
INSERT INTO ugroup (user_id, groupname) VALUES (1, 'Friends');
INSERT INTO ugroup (user_id, groupname) VALUES (1, 'Family');


INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test1', 'lastname1', 'test1@example.com', '1234567890');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test2', 'lastname2', 'test2@example.com', '4645654646');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test3', 'lastname3', 'test3@example.com', '3232323232');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test4', 'lastname4', 'test4@example.com', '4545454545');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test5', 'lastname5', 'test5@example.com', '6767676767');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test6', 'lastname6', 'test6@example.com', '8787878787');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test7', 'lastname7', 'test7@example.com', '8282828282');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test8', 'lastname8', 'test8@example.com', '1111111111');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test9', 'lastname9', 'test9@example.com', '2222222222');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test10', 'lastname10', 'test10@example.com', '3333333333');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test11', 'lastname11', 'test11@example.com', '4444444444');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test12', 'lastname12', 'test12@example.com', '5555555555');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test13', 'lastname13', 'test13@example.com', '6666666666');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test14', 'lastname14', 'test14@example.com', '7777777777');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test15', 'lastname15', 'test15@example.com', '8888888888');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test16', 'lastname16', 'test16@example.com', '9999999999');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test17', 'lastname17', 'test17@example.com', '1010101010');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test18', 'lastname18', 'test18@example.com', '2020202020');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test19', 'lastname19', 'test19@example.com', '3030303030');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test20', 'lastname20', 'test20@example.com', '5656565656');
INSERT INTO contact (user_id, group_id, firstname, lastname, email, phone) VALUES (1, 1, 'test21', 'lastname21', 'test21@example.com', '9898989898');

update contact set group_id=2 where id >7 and id <12;
update contact set group_id=3 where id >=12;

set foreign_key_checks = 1;
