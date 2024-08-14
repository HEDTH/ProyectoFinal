CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    domicilio VARCHAR(255) NOT NULL
);


CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    imagen VARCHAR(100) NOT NULL
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    producto_id INT,
    cantidad INT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);
INSERT INTO usuarios (username, password, nombre, fecha_nacimiento, domicilio) VALUES 
('user1', 'password1', 'Juan Pérez', '1990-05-10', 'Calle Falsa 123'),
('user2', 'password2', 'Ana Gómez', '1985-11-22', 'Avenida Siempre Viva 456'),
('user3', 'password3', 'Luis Rodríguez', '1992-08-17', 'Boulevard de los Sueños 789'),
('user4', 'password4', 'María López', '1988-03-30', 'Calle de la Esperanza 101'),
('user5', 'password5', 'Carlos García', '1995-07-14', 'Callejón del Beso 202');

select * from usuarios;
