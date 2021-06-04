create database db1;

use db1;

create table guestbook (indes int NOT NULL AUTO_INCREMENT, cur_date time DEFAULT current_timestamp(), namep varchar(50), email varchar(320), veloType varchar(1000), PRIMARY KEY (indes));
