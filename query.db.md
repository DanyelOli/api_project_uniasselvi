CREATE DATABASE db_project_uniasselvi;

CREATE TABLE request (
    ordernumber int NOT NULL AUTO_INCREMENT,
    name varchar(50),
    email varchar(50),
    telephone varchar(20),
    message varchar(500),
    PRIMARY KEY (ordernumber)
);