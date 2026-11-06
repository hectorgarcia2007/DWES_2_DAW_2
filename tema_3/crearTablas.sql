-- 1.- Creamos la base de datos si no existe
CREATE DATABASE IF NOT EXISTS proyecto
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Seleccionamos la base de datos "proyecto"
USE proyecto;

-- 2.- Creamos las tablas

-- 2.1.- Tabla tiendas
CREATE TABLE IF NOT EXISTS tiendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tlf VARCHAR(13) NULL
);

-- 2.2.- Tabla familias
CREATE TABLE IF NOT EXISTS familias (
    cod VARCHAR(6) PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL
);

-- 2.3.- Tabla productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    nombre_corto VARCHAR(50) UNIQUE NOT NULL,
    descripcion TEXT NULL,
    pvp DECIMAL(10, 2) NOT NULL,
    familia VARCHAR(6) NOT NULL,
    CONSTRAINT fk_prod_fam
        FOREIGN KEY (familia)
        REFERENCES familias(cod)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- 2.4.- Tabla stocks
CREATE TABLE IF NOT EXISTS stocks (
    producto INT,
    tienda INT,
    unidades INT UNSIGNED NOT NULL,
    CONSTRAINT pk_stock PRIMARY KEY (producto, tienda),
    CONSTRAINT fk_stock_prod
        FOREIGN KEY (producto)
        REFERENCES productos(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_stock_tienda
        FOREIGN KEY (tienda)
        REFERENCES tiendas(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- 3.- Creamos el usuario si no existe
CREATE USER IF NOT EXISTS 'gestor'@'localhost'
IDENTIFIED BY 'secreto';

-- 4.- Concedemos permisos sobre la base de datos
GRANT ALL PRIVILEGES ON proyecto.*
TO 'gestor'@'localhost';

-- 5.- Comprobamos los permisos del usuario
SHOW GRANTS FOR 'gestor'@'localhost';
