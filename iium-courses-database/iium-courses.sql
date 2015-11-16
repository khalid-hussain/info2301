DROP TABLE IF EXISTS `course_registration`;
DROP TABLE IF EXISTS `students`;
DROP TABLE IF EXISTS `courses`;
DROP TABLE IF EXISTS `lecturers`;

-- ------------------
-- CREATION OF TABLES
-- ------------------

CREATE TABLE `students` (
stud_id CHAR(7) PRIMARY KEY,
stud_name VARCHAR(32),
stud_kulliyah CHAR(5),
stud_country VARCHAR(32)
);

CREATE TABLE `courses` (
course_id CHAR(8) PRIMARY KEY,
course_name VARCHAR(32),
course_kulliyah CHAR(5),
lec_id CHAR(3)
);

CREATE TABLE `course_registration` (
reg_id CHAR(3) PRIMARY KEY,
stud_id CHAR(7),
course_id CHAR(8)
);

CREATE TABLE `lecturers` (
lec_id CHAR(3) PRIMARY KEY,
lec_name VARCHAR(32),
lec_kulliyah CHAR(5)
);

-- -------------
-- FOREIGN KEYS
-- -------------

ALTER TABLE `courses` 
ADD CONSTRAINT FK_courses_lecturers 
FOREIGN KEY (lec_id) 
REFERENCES `lecturers` (lec_id);

ALTER TABLE `course_registration`
ADD CONSTRAINT FK_course_reg_students
FOREIGN KEY (stud_id)
REFERENCES `students` (stud_id);

ALTER TABLE `course_registration`
ADD CONSTRAINT FK_course_reg_courses
FOREIGN KEY (course_id)
REFERENCES `courses` (course_id);

-- --------------------
-- INSERTING FAKE DATA
-- --------------------
-- LECTURERS
-- id, name, kulliyah
INSERT INTO `lecturers` VALUES ('001','Dr. Fatzilah','KICT');
INSERT INTO `lecturers` VALUES ('002','Dr. Akram','KICT');
INSERT INTO `lecturers` VALUES ('003','Dr. Emad','KICT');
INSERT INTO `lecturers` VALUES ('004','Dr. Abu Laith','IRKHS');

-- STUDENTS
-- id, name, kulliyah, country
INSERT INTO `students` VALUES ('G1429715', 'Khalid Hussain', 'KICT', 'Pakistan');
INSERT INTO `students` VALUES ('0913091', 'Mohammad Khalid', 'KICT', 'Egypt');
INSERT INTO `students` VALUES ('1367291', 'Amine Bekkai', 'KAED', 'Algeria');

-- COURSES
-- id, name, kulliyah, lecturer_id
INSERT INTO `courses` VALUES ('INFO2301', 'Web Programming I', 'KICT', '001');
INSERT INTO `courses` VALUES ('HS2000', 'Islamic Politics', 'IRKHS', '004');
INSERT INTO `courses` VALUES ('CS4321', 'Cryptography', 'KICT', '003');

-- COURSES REGISTRATION
-- reg_id, stud_id, course_id
INSERT INTO `course_registration` VALUES ('001','G1429715','INFO2301');
INSERT INTO `course_registration` VALUES ('002','0913091','INFO2301');