
-- DATABASE
#Simple CRUD
create database library;
use library;

create table session (
	id int PRIMARY key AUTO_INCREMENT,
    student_id varchar(10),
    start_time varchar(10),
    end_time varchar(10)
);