CREATE TABLE classes
(
    id SERIAL PRIMARY KEY
    , courseCode VARCHAR(7) NOT NULL   
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
    , courseCode INT REFERENCES classes(id)
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
