
CREATE DATABASE php10amproject;


CREATE TABLE tbl_users(
uid int AUTO_INCREMENT PRIMARY KEY,
name varchar(100) not null,
username varchar(100) UNIQUE not null,
email varchar(100) UNIQUE not  null,
user_type ENUM('user','admin') DEFAULT 'user',
password varchar(100) not null

);

CREATE TABLE tbl_images(
id int AUTO_INCREMENT PRIMARY KEY,
image_name varchar(100) not null,
users_id int,
FOREIGN KEY (users_id) REFERENCES  tbl_users(uid)

);




