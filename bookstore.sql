CREATE DATABASE IF NOT EXISTS bookstore;
USE bookstore;

CREATE TABLE book
(id_book INT PRIMARY KEY AUTO_INCREMENT,
isbn VARCHAR(13) NOT NULL,
namebook VARCHAR(100) NOT NULL,
year INT NOT NULL,
id_editorial INT NOT NULL);

CREATE TABLE author
(id_author INT PRIMARY KEY AUTO_INCREMENT,
name_author VARCHAR(100) NOT NULL,
nationality VARCHAR(100) DEFAULT "UNKNOWN");

CREATE TABLE bookauthors
(id_book INT NOT NULL,
id_author INT NOT NULL,
PRIMARY KEY (id_book, id_author));

CREATE TABLE editorial
(id_editorial INT PRIMARY KEY AUTO_INCREMENT,
name_editorial VARCHAR(100) NOT NULL,
address VARCHAR(100));
