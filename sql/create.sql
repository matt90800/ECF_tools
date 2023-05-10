--CREATE DATABASE ECF_tools_mb;

CREATE TABLE IF NOT EXISTS role(
   id SERIAL,
   name VARCHAR(50)  NOT NULL UNIQUE,
   PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS category(
   id SERIAL,
   name VARCHAR(50) ,
   PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS users(
   id SERIAL,
   pseudo VARCHAR(50),
   lastname VARCHAR(50)  NOT NULL,
   firstname VARCHAR(50)  NOT NULL,
   password VARCHAR(255)  NOT NULL UNIQUE,	--password UNIQUE avec le hash ?
   email VARCHAR(255)  NOT NULL,
   earned_points SMALLINT,
   id_role INTEGER,
   PRIMARY KEY(id),
   UNIQUE(email),
   FOREIGN KEY(id_role) REFERENCES role(id)
);

CREATE TABLE IF NOT EXISTS tool(
   id SERIAL,
   name VARCHAR(50)  NOT NULL,
   visual VARCHAR(255) ,
   description TEXT,
   points SMALLINT NOT NULL,
   id_category INTEGER,
   id_users INTEGER NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_category) REFERENCES category(id),
   FOREIGN KEY(id_users) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS lend(
   id SERIAL,
   begining_date DATE NOT NULL,
   end_date DATE NOT NULL,
   id_users INTEGER NOT NULL,
   id_tool INTEGER NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_users) REFERENCES users(id),
   FOREIGN KEY(id_tool) REFERENCES tool(id)
);
