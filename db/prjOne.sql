CREATE TABLE classes
(
    id SERIAL PRIMARY KEY
    , course_Code VARCHAR(7) NOT NULL   
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
    , course_Code INT REFERENCES classes(id)
);

CREATE TABLE students
(
    id SERIAL PRIMARY KEY
    , studentName VARCHAR(50) NOT NULL
    , course_code INT NOT NULL REFERENCES classes(id)
    , ast_name INT REFERENCES assistants(id)
    , enter_time TIMESTAMP NOT NULL
    , start_time TIMESTAMP
    , end_time TIMESTAMP
);

INSERT INTO classes(course_Code) VALUES ('CIT-111');
INSERT INTO classes(course_Code) VALUES ('CIT-225');
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