/*create database plantoes; */

CREATE TABLE cidades(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255)
);

CREATE TABLE feriados(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255),
    data DATE,
    cidade_id INTEGER REFERENCES cidades(id)
);

CREATE TABLE juizes(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255),
    telefone VARCHAR(16),
    cidade_id INTEGER REFERENCES cidades(id)
);

CREATE TABLE usuarios(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(32) NOT NULL,
    login VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
);

CREATE TABLE dias_indisponiveis(
    id SERIAL PRIMARY KEY,
    data DATE,
    juiz_id INTEGER REFERENCES juizes(id)
);

CREATE TABLE dias_disponiveis(
    id SERIAL PRIMARY KEY,
    data DATE,
    juiz_id INTEGER REFERENCES juizes(id)
);

CREATE TABLE plantoes(
    id SERIAL PRIMARY KEY,
    data DATE,
    ano INT,
    semana INT,
    juiz_id INTEGER REFERENCES juizes(id)
);

CREATE TABLE plantoes_juizes(
    id SERIAL PRIMARY KEY,
    coeficiente_de_plantoes INT,
    ano INT,
    numero_de_plantoes_realizados INT,
    semana_ultimo_plantao INT,
    juiz_id INT REFERENCES juizes(id)
);

CREATE TABLE agendas(
     id SERIAL PRIMARY KEY,
     data_inicio DATE,
     data_fim DATE,
     semana INT,
     ano INT,
     juiz_id INT REFERENCES juizes(id)
  );