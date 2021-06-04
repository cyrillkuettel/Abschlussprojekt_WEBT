create database db1;

use db1;

create table guestbook(indes int NOT NULL AUTO_INCREMENT , cur_date time DEFAULT current_timestamp(), namep varchar(100), veloType varchar(1000) );
