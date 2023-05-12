--password 'test'
INSERT INTO users (pseudo,lastname, firstname,password, email, earned_points, id_role) VALUES
('johnny','Doe', 'John','$2y$10$oQFAKP0DzrAoTWQzF4NhGeCpxC/r/12Avl4UK3lIDBNHqDS7s73k2', 'john.doe@example.com', 100, 1);
--
INSERT INTO users (lastname, firstname,password, email, earned_points, id_role) VALUES
('Smith', 'Jane','$2y$10$oQFAKP0DzrAoTWQzF4NhGeCpxC/r/12Avl4UK3lIDBNHqDS7s73k2', 'jane.smith@example.com', 50,2),
('Wilson', 'Alex','$2y$10$oQFAKP0DzrAoTWQzF4NhGeCpxC/r/12Avl4UK3lIDBNHqDS7s73k2','alex.wilson@example.com', 200,2);