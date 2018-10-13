CREATE TABLE classes
(
    id SERIAL PRIMARY KEY
    , courseCode VARCHAR(7) NOT NULL   
);


CREATE TABLE assistants
(
    id SERIAL PRIMARY KEY
    , name VARCHAR(50) UNIQUE NOT NULL
    , course_code INT NOT NULL REFERENCES classes(id)
);

CREATE TABLE tempStudents
(
    id SERIAL PRIMARY KEY
    , name VARCHAR(50) NOT NULL
    , course_code INT NOT NULL REFERENCES classes(id)
    , ast_name INT REFERENCES assistants(id)
);
