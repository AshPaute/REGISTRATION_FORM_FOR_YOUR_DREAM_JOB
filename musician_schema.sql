CREATE DATABASE musician_db;
USE musician_db;

CREATE TABLE musicians (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    instrument VARCHAR(100) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    debut_year INT NOT NULL
);

INSERT INTO musicians (name, instrument, genre, debut_year) VALUES
('John Coltrane', 'Saxophone', 'Jazz', 1955),
('Jimi Hendrix', 'Guitar', 'Rock', 1966);
