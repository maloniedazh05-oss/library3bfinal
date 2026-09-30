-- INSTALLATION
Download & Install: "https://www.apachefriends.org/"

Put the files into "xampp directory/htdocs/projectname" // projectname or the folder name

-- INSTRUCTIONS

Run Xampp as admin -> In the Xampp control Panel -> Click button 'Start' for 'Apache' AND 'MySQL' rows.

Access db in browser "localhost/phpmyadmin".
In 'phpMyAdmin' main sidebar -> Click New -> In Main window -> Click 'SQL' Column -> Paste the DATABASE and click button 'Go':

-- DATABASE -- MYSQL 
-- #Simple CRUD
create database library;
use library;

create table session (
    id int PRIMARY key AUTO_INCREMENT,
    student_id varchar(10),
    start_time varchar(10),
    end_time varchar(10)
);

--==================================================

Access the system in browser: "localhost/projectname"