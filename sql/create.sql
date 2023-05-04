-- CREATE DATABASE ECF_tools_mb;

CREATE TABLE role(
   Id_role SERIAL,
   name VARCHAR(50)  NOT NULL,
   PRIMARY KEY(Id_role)
);

CREATE TABLE category(
   Id_category SERIAL,
   name VARCHAR(50) ,
   PRIMARY KEY(Id_category)
);

CREATE TABLE person(
   Id_user SERIAL,
   name VARCHAR(50)  NOT NULL,
   firstname VARCHAR(50)  NOT NULL,
   email VARCHAR(255)  NOT NULL,
   earned_points SMALLINT,
   Id_role INTEGER,
   PRIMARY KEY(Id_user),
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
   FOREIGN KEY(Id_user) REFERENCES person(Id_user)
);

CREATE TABLE lend(
   Id_lend SERIAL,
   begining_date DATE NOT NULL,
   end_date DATE NOT NULL,
   Id_user INTEGER NOT NULL,
   Id_good INTEGER NOT NULL,
   PRIMARY KEY(Id_lend),
   FOREIGN KEY(Id_user) REFERENCES person(Id_user),
   FOREIGN KEY(Id_good) REFERENCES good(Id_good)
);
