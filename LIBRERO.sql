CREATE DATABASE librero;
USE librero;

CREATE TABLE autor (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150),
    activo BIT(1)
);

CREATE TABLE editorial (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150),
    activo BIT(1)
);

CREATE TABLE libro (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(200),
    num_paginas INT,
    tipo VARCHAR(70),
    idioma VARCHAR(50),
    editorial_id INT,
    activo BIT(1),
    FOREIGN KEY (editorial_id) REFERENCES editorial(id)
);

CREATE TABLE libro_autor (
    id INT PRIMARY KEY AUTO_INCREMENT,
    autor_id INT,
    libro_id INT,
    FOREIGN KEY (autor_id) REFERENCES autor(id),
    FOREIGN KEY (libro_id) REFERENCES libro(id)
);
INSERT INTO autor (nombre, activo) VALUES
('Gabriel García Márquez', 1),
('Isabel Allende', 1),
('Mario Vargas Llosa', 1),
('Julio Cortázar', 1),
('Jorge Luis Borges', 1);


INSERT INTO libro (titulo, num_paginas, tipo, idioma, editorial_id, activo) VALUES
('Cien años de soledad', 417, 'Novela', 'Español', 1, 1),
('La casa de los espíritus', 433, 'Novela', 'Español', 2, 1),
('La fiesta del chivo', 523, 'Novela', 'Español', 3, 1),
('Rayuela', 599, 'Novela', 'Español', 4, 1),
('El Aleph', 157, 'Cuento', 'Español', 5, 1);

INSERT INTO libro_autor (autor_id, libro_id) VALUES
(1, 1),  -- Gabriel García Márquez - Cien años de soledad
(2, 2),  -- Isabel Allende - La casa de los espíritus
(3, 3),  -- Mario Vargas Llosa - La fiesta del chivo
(4, 4),  -- Julio Cortázar - Rayuela
(5, 5);  -- Jorge Luis Borges - El Aleph



 
