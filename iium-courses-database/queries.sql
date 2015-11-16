SELECT course_id, course_name, lec_name
FROM courses, lecturers
WHERE courses.lec_id = lecturers.lec_id;

SELECT course_registration.stud_id, stud_name
FROM course_registration, students
WHERE course_registration.stud_id = students.stud_id
AND course_registration.course_id = 'INFO2301';