CREATE TABLE accounts (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    newsletter BOOLEAN DEFAULT FALSE,
    role VARCHAR(20) DEFAULT 'user'
);