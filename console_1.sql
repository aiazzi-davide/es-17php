CREATE TABLE user (
                      id INT NOT NULL AUTO_INCREMENT,
                      nome VARCHAR(100) NOT NULL,
                      cognome VARCHAR(100) NOT NULL,
                      email VARCHAR(100) NOT NULL UNIQUE ,
                      password VARCHAR(100) NOT NULL,
                      PRIMARY KEY (id)
);
