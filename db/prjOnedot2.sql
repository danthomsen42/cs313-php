CREATE TABLE classes
(
    id SERIAL PRIMARY KEY
    , course_code VARCHAR(7) NOT NULL   
);


CREATE TABLE assistants
(
    id SERIAL PRIMARY KEY
    , ast_name VARCHAR(50) UNIQUE NOT NULL

);

CREATE TABLE assistant_classes
(
    id SERIAL PRIMARY KEY
    , ast_name INT REFERENCES assistants(id)
    , course_code INT REFERENCES classes(id)
);

CREATE TABLE students
(
    id SERIAL PRIMARY KEY
    , student_first_name VARCHAR(50) NOT NULL
    , student_last_name VARCHAR(50) NOT NULL
    , i_number INTEGER UNIQUE NOT NULL 




);

CREATE TABLE queue
(
    id SERIAL PRIMARY KEY
    , student_name INT NOT NULL REFERENCES students(id)
    , course_code INT NOT NULL REFERENCES classes(id)
    , ast_name INT REFERENCES assistants(id)
    , enter_time TIMESTAMP NOT NULL
    , start_time TIMESTAMP
    , end_time TIMESTAMP
    , comments VARCHAR(200)
);

INSERT INTO classes(course_code) VALUES ('CIT-111');
INSERT INTO classes(course_code) VALUES ('CIT-225');
INSERT INTO classes(course_Code) VALUES ('CIT-325');
INSERT INTO classes(course_Code) VALUES ('CIT-425');

INSERT INTO assistants(ast_name) VALUES ('William');
INSERT INTO assistants(ast_name) VALUES ('Brooke');
INSERT INTO assistants(ast_name) VALUES ('Andrew');


INSERT INTO assistant_classes(ast_name, course_Code) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(2, 3),
(3, 1),
(3, 2);

SELECT 
assistants.ast_name,
classes.course_code
FROM
assistants, classes, assistant_classes
WHERE assistant_classes.ast_name = assistants.id and assistant_classes.course_code = classes.id;

/*
ALTER TABLE queue
ADD COLUMN notes VARCHAR(200);
*/