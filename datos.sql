DROP TABLE IF EXISTS empleado CASCADE ;

DROP TABLE IF EXISTS departamentos CASCADE ;

CREATE TABLE departamentos (
    id           BIGSERIAL    PRIMARY KEY,
    codigo       VARCHAR(2)   NOT NULL UNIQUE,
    denominacion VARCHAR(255) NOT NULL,
    localidad    VARCHAR(255) 
);

CREATE TABLE empleado(
    id                  BIGSERIAL    PRIMARY KEY NOT NULL,
    numero              VARCHAR(255) NOT NULL UNIQUE,
    nombre              VARCHAR(255) NOT NULL,
    apellidos           VARCHAR(255) NOT NULL,
    departamento_id     BIGINT       NOT NULL
                                     REFERENCES departamentos (id)
);


-------------------

INSERT INTO departamentos (codigo, denominacion, localidad)
VALUES ('10', 'Informática', 'Sanlúcar'),
       ('20', 'Administrativo', NULL),
       ('30', 'Matemáticas', 'Chipiona');

-------------------

INSERT INTO empleado (numero, nombre, apellidos, departamento_id)
VALUES ('626', 'Pedro', 'OxSmall Pérez', '1'),
       ('172', 'Juanjo', 'Melan Sáncchez', '3'),
       ('554', 'Gustavo', 'Melame Lamano', '2');