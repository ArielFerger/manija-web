CREATE DATABASE IF NOT EXISTS manija_web CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE manija_web;

CREATE TABLE IF NOT EXISTS usuarios(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS productos(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    descripcion VARCHAR(1000) NOT NULL,
    CONSTRAINT precio_valido CHECK(precio >= 0)
) ENGINE=InnoDB;

-- El usuario de prueba es el mismo de las entregas anteriores.
INSERT INTO usuarios(usuario, password)
SELECT 'fcytuader', '$2y$10$AQMbGisLWAvOXE3Xlx2ybe6sk5zYGgJfJFsAC8.ru1FYMNx.DAPWy'
WHERE NOT EXISTS(SELECT id FROM usuarios WHERE usuario='fcytuader');
