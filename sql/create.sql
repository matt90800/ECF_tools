-- CREATE DATABASE ECF_tools_mb;

CREATE TABLE role(
   Id_role SERIAL,
   name VARCHAR(50)  NOT NULL UNIQUE,
   PRIMARY KEY(Id_role)
);

CREATE TABLE category(
   Id_category SERIAL,
   name VARCHAR(50) ,
   PRIMARY KEY(Id_category)
);

CREATE TABLE users(
   id_users SERIAL,
   pseudo VARCHAR(50),
   lastname VARCHAR(50)  NOT NULL,
   firstname VARCHAR(50)  NOT NULL,
   password VARCHAR(255)  NOT NULL UNIQUE,	--password UNIQUE avec le hash ?
   email VARCHAR(255)  NOT NULL,
   earned_points SMALLINT,
   Id_role INTEGER,
   PRIMARY KEY(Id_users),
   UNIQUE(email),
   FOREIGN KEY(Id_role) REFERENCES role(Id_role)
);

CREATE TABLE good(
   Id_good SERIAL,
   name VARCHAR(50)  NOT NULL,
   visual VARCHAR(255) ,
   description TEXT,
   points SMALLINT NOT NULL,
   Id_category INTEGER,
   Id_user INTEGER NOT NULL,
   PRIMARY KEY(Id_good),
   FOREIGN KEY(Id_category) REFERENCES category(Id_category),
   FOREIGN KEY(id_users) REFERENCES person(id_users)
);

CREATE TABLE lend(
   Id_lend SERIAL,
   begining_date DATE NOT NULL,
   end_date DATE NOT NULL,
   id_users INTEGER NOT NULL,
   Id_good INTEGER NOT NULL,
   PRIMARY KEY(Id_lend),
   FOREIGN KEY(id_users) REFERENCES person(id_users),
   FOREIGN KEY(Id_good) REFERENCES good(Id_good)
);
