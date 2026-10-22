-- Ejecutar como administrador de MySQL después de crear la base.
CREATE USER IF NOT EXISTS 'manija'@'localhost' IDENTIFIED BY 'manija123';
GRANT SELECT, INSERT, UPDATE, DELETE ON manija_web.* TO 'manija'@'localhost';
