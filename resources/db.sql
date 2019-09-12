/*create database plantoes; */

CREATE TABLE cidade(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255)
);

CREATE TABLE feriado(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255),
    data DATE,
    cidade_id INTEGER REFERENCES cidade(id)
);

CREATE TABLE juiz(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255),
    cidade_id INTEGER REFERENCES cidade(id)
);

CREATE TABLE usuario(
    id SERIAL PRIMARY KEY,
    login VARCHAR(32),
    password VARCHAR(32)
);

CREATE TABLE diaindisponivel(
    id SERIAL PRIMARY KEY,
    data DATE,
    juiz_id INTEGER REFERENCES juiz(id)
);

CREATE TABLE diaprefererivel(
    id SERIAL PRIMARY KEY,
    data DATE,
    juiz_id INTEGER REFERENCES juiz(id)
);

CREATE TABLE plantao(
    id SERIAL PRIMARY KEY,
    data DATE,
    juiz_id INTEGER REFERENCES juiz(id)
);