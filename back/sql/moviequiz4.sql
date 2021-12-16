CREATE DATABASE IF NOT EXISTS moviequiz4;

CREATE TABLE IF NOT EXISTS moviequiz4.users (
    id TiNYINT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(300),
    apellido VARCHAR(300),
    correo VARCHAR(300),
    contrasena VARCHAR(300)
<<<<<<< HEAD
=======
);

CREATE  TABLE IF NOT EXISTS moviequiz4.peliculas (
    imdbId TiNYINT AUTO_INCREMENT PRIMARY KEY,
    nombre_pelicula VARCHAR(300),
    poster VARCHAR(300),
    anyo INT(4)
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111
);

CREATE  TABLE IF NOT EXISTS moviequiz4.peliculas (
    imdbId VARCHAR(500) PRIMARY KEY,
    nombre_pelicula VARCHAR(300),
<<<<<<< HEAD
    poster VARCHAR(300),
    anyo INT(4)
);

CREATE  TABLE IF NOT EXISTS moviequiz4.valoracion (
=======
    anyo INT(4),
    valoracion INT,
    comentario VARCHAR(300),
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111
    id_user TiNYINT,
    id_pelicula VARCHAR(500),
    puntuacion INT,
    comentario VARCHAR(300),
    PRIMARY KEY (id_pelicula, id_user),
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_pelicula) REFERENCES peliculas(imdbId)
);