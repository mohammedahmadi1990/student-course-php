CREATE SCHEMA `gss_university_db` ;

use `gss_university_db`;

drop table courses;

CREATE TABLE courses (
  id INT NOT NULL AUTO_INCREMENT,
  Course VARCHAR(255) NOT NULL,
  Program VARCHAR(255),
  Department VARCHAR(255),
  level VARCHAR(255),
  Essentials VARCHAR(255),
  Date DATE NOT NULL,
  Price DECIMAL(10,2) NOT NULL,
  Description VARCHAR(255),
  PRIMARY KEY (id)
);

INSERT INTO courses (Course, Program, Department, level, Essentials, Date, Price, Description)
VALUES ('Introduction to Computer Science', 'Computer Science', 'Engineering', 'Undergraduate', 'None', '2022-01-01', 300,''),
('Software Engineering', 'Computer Science', 'Engineering', 'Graduate', 'Introduction to Computer Science, Algorithms and Data Structures, Object-Oriented Programming', '2022-01-01', 250,''),
('Statistics for Data Science', 'Data Science', 'Statistics', 'Undergraduate', 'Calculus and Linear Algebra', '2022-01-01', 100,''),
('Digital Signal Processing', 'Electrical Engineering', 'Engineering', 'Graduate', 'Introduction to Signal Processing', '2022-01-01', 250,'ready'),
('Algorithms and Data Structures', 'Computer Science', 'Engineering', 'Undergraduate', 'Introduction to Computer Science, Discrete Mathematics', '2022-01-01', 300,''),
('Data Mining', 'Information Systems', 'Business', 'Graduate', 'Introduction to Database Systems, Statistics for Data Science', '2022-01-01', 500,''),
('Machine Learning', 'Data Science', 'Computer Science', 'Graduate', 'Linear Algebra, Probability and Statistics', '2022-01-01', 145,''),
('Digital Image Processing', 'Electrical Engineering', 'Engineering', 'Graduate', 'Introduction to Signal Processing', '2022-01-01', 400,''),
('Business Analytics', 'Business Analytics', 'Business', 'Graduate', 'Statistics for Data Science', '2022-01-01', 300,''),
('Operating Systems', 'Computer Science', 'Engineering', 'Undergraduate', 'Algorithms and Data Structures, Computer Organization and Assembly Language', '2022-01-01', 248,'morning times'),
('Database Systems', 'Information Systems', 'Business', 'Undergraduate', 'Introduction to Database Systems', '2022-01-01', 189,'not definite');


SELECT * FROM gss_university_db.user_form;

SELECT * FROM courses ORDER BY program;

SELECT * FROM courses WHERE id IN (1, 2, 5, 6, 10, 21);

SELECT SUM(Price) FROM courses WHERE id IN (1, 2, 5, 6, 10, 21);