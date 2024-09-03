CREATE USER 'brandonADIP'@'%' IDENTIFIED BY 'contr4s3n4s3gur4';
CREATE DATABASE USUARIOS;
USE USUARIOS;

CREATE TABLE Registros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    correo VARCHAR(50) NOT NULL
);

GRANT ALL PRIVILEGES ON USUARIOS.* TO 'brandonADIP'@'%';
FLUSH PRIVILEGES;

DELIMITER //

CREATE PROCEDURE ActualizarRegistro(
    IN p_id INT,
    IN p_nombre VARCHAR(50),
    IN p_edad INT,
    IN p_correo VARCHAR(50)
)
BEGIN
    DECLARE v_sql TEXT;

    SET v_sql = 'UPDATE Registros SET ';

    IF p_nombre IS NOT NULL AND p_nombre <> '' THEN
        SET v_sql = CONCAT(v_sql, 'nombre = "', p_nombre, '"');
    END IF;

    IF p_edad > 0 THEN
        IF LENGTH(v_sql) > LENGTH('UPDATE Registros SET ') THEN
            SET v_sql = CONCAT(v_sql, ', ');
        END IF;
        SET v_sql = CONCAT(v_sql, 'edad = ', p_edad);
    END IF;

    IF p_correo IS NOT NULL AND p_correo <> '' THEN
        IF LENGTH(v_sql) > LENGTH('UPDATE Registros SET ') THEN
            SET v_sql = CONCAT(v_sql, ', ');
        END IF;
        SET v_sql = CONCAT(v_sql, 'correo = "', p_correo, '"');
    END IF;

    SET v_sql = CONCAT(v_sql, ' WHERE id = ', p_id);

    PREPARE stmt FROM v_sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END //

CREATE PROCEDURE ContarUsuarios()
BEGIN
    SELECT COUNT(*) FROM Registros;
END //

CREATE PROCEDURE EliminarUsuario(
    IN p_id INT
)
BEGIN
    DELETE FROM Registros WHERE id = p_id;
END //

CREATE PROCEDURE InsertarUsuario(
    IN p_nombre VARCHAR(50),
    IN p_edad INT,
    IN p_correo VARCHAR(50)
)
BEGIN
    INSERT INTO Registros (nombre, edad, correo) 
    VALUES (p_nombre, p_edad, p_correo);
END //

CREATE PROCEDURE ObtenerIDs()
BEGIN
    SELECT id FROM Registros;
END //

CREATE PROCEDURE ObtenerUsuarioPorID(
    IN p_id INT
)
BEGIN
    SELECT * FROM Registros WHERE id = p_id;
END //

CREATE PROCEDURE ObtenerUsuarios()
BEGIN
    SELECT * FROM Registros;
END //

DELIMITER ;
