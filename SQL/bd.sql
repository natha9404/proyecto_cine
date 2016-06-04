CREATE TABLE IF NOT EXISTS  usuarios (
     usuario  varchar(50) NOT NULL,
     nombres  varchar(50) NOT NULL,
     apellidos  varchar(50) NOT NULL,
     contrasena  varchar(50) NOT NULL,
     email  varchar(50) NOT NULL,
     fecha_nacimiento  date NOT NULL,
    PRIMARY KEY ( usuario )
);

CREATE TABLE IF NOT EXISTS  peliculas (
     id_pelicula  int(10) NOT NULL,
     nombre  varchar(50) NOT NULL,
    PRIMARY KEY ( id_pelicula )
);

CREATE TABLE IF NOT EXISTS  genero (
     id_pelicula  int(10) NOT NULL,
     nombre_genero  varchar(15) NOT NULL,
    PRIMARY KEY ( id_pelicula ,  nombre_genero ),
    FOREIGN KEY ( id_pelicula ) REFERENCES  peliculas ( id_pelicula )
);

CREATE TABLE IF NOT EXISTS  pelicula_categoria (
     id_categoria  int(10) NOT NULL,
     nombre_categoria  varchar(50) NOT NULL,
     id_usuario  varchar(50) NOT NULL,
     id_pelicula  int(10) NOT NULL,
    PRIMARY KEY ( id_categoria ),
    FOREIGN KEY ( id_usuario ) REFERENCES  usuarios ( usuario ),
    FOREIGN KEY ( id_pelicula ) REFERENCES  peliculas  ( id_pelicula )
);

CREATE TABLE IF NOT EXISTS  comentar_pelicula (
     id_usuario  varchar(50) NOT NULL,
     id_pelicula  int(10) NOT NULL,
     comentario  text,
    PRIMARY KEY ( id_usuario ,  id_pelicula ),
    FOREIGN KEY ( id_usuario ) REFERENCES  usuarios ( usuario ),
    FOREIGN KEY ( id_pelicula ) REFERENCES  peliculas  ( id_pelicula )
);

CREATE TABLE IF NOT EXISTS  calificar_pelicula (
     id_usuario  varchar(50) NOT NULL,
     id_pelicula  int(10) NOT NULL,
     calificacion  int(2),
    PRIMARY KEY ( id_usuario ,  id_pelicula ),
    FOREIGN KEY ( id_usuario ) REFERENCES  usuarios ( usuario ),
    FOREIGN KEY ( id_pelicula ) REFERENCES  peliculas  ( id_pelicula )
);