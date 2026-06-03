# Sistema de Gestión de Inventario — Ferretería Bayron
**RUC:** 20614052903

---

## ¿De qué trata esto?

Ferretería Bayron lleva tiempo manejando su inventario de forma manual, lo que ha generado algunos dolores de cabeza: productos malos que se mezclan con los buenos, artículos que se acaban sin que nadie se dé cuenta, y otros que llevan meses acumulando polvo en el almacén. Este sistema nació para resolver exactamente eso.

---

## Descripción del negocio

Ferretería Bayron es un negocio dedicado a la venta de productos ferreteros. Como cualquier ferretería, maneja un volumen considerable de productos distintos, y mantener ese inventario ordenado es clave para que todo funcione bien día a día.

---

## El problema y la solución

El mayor problema hasta ahora ha sido la falta de control sobre el inventario. No había forma clara de saber qué productos estaban en mal estado, cuáles se estaban acabando o cuáles simplemente tenían demasiado stock sin moverse.

La solución es un sistema que le da visibilidad a todo eso, sin complicaciones.

---

## Antes de arrancar — Preanálisis

### ¿Qué necesita la ferretería?

- Saber qué productos están defectuosos para no venderlos por error
- Recibir avisos cuando algo está por agotarse
- Identificar qué productos tienen demasiado stock y no rotan

### ¿Es viable hacerlo?

Sí. La información necesaria ya existe dentro del negocio; solo falta un sistema que la organice y la haga visible de forma práctica.

### ¿Hasta dónde llega el sistema?

El sistema cubre únicamente la gestión interna del inventario de Ferretería Bayron. No incluye ventas, facturación ni manejo de proveedores (al menos por ahora).

---

## Análisis

### Qué debe hacer el sistema

#### Requisitos funcionales

| # | Qué hace | Descripción |
|---|----------|-------------|
| RF01 | Control de productos defectuosos | Permite marcar un producto como defectuoso y apartarlo del inventario disponible para la venta. También lleva un registro de cuántos productos se pierden así y por qué. |
| RF02 | Avisos de stock bajo | Alerta cuando la cantidad de un producto cae por debajo de un mínimo definido previamente, para hacer el pedido a tiempo y evitar quedarse sin ese artículo. |
| RF03 | Control de exceso de inventario | Muestra qué productos llevan mucho tiempo sin moverse o cuya cantidad supera lo que normalmente se vende, para poder tomar decisiones al respecto. |

#### Requisitos no funcionales

| # | Condición | Descripción |
|---|-----------|-------------|
| RNF01 | Facilidad de uso | Tiene que ser simple de manejar, sin necesidad de conocimientos técnicos. |
| RNF02 | Rapidez | Debe responder sin demoras que interrumpan el trabajo del día a día. |
| RNF03 | Seguridad | La información debe estar protegida y solo accesible para el personal autorizado. |
| RNF04 | Estabilidad | No debe fallar en momentos críticos como cierres de día o toma de inventarios. |

### Análisis de los requisitos

Cada uno de los tres problemas identificados tiene un impacto directo en la operación:

- Los productos defectuosos generan pérdidas y pueden dañar la confianza del cliente si llegan a venderse.
- La falta de avisos de stock bajo provoca quiebres que hacen perder ventas.
- El exceso de inventario amarra capital que podría usarse mejor, y ocupa espacio de almacén innecesariamente.

Los tres casos se pueden resolver con un sistema de seguimiento en tiempo real que registre movimientos, calcule cantidades disponibles y emita alertas automáticas cuando algo sale de los rangos normales.

## Base de datos
```sql
CREATE DATABASE ferre_bayron;
USE ferre_bayron;

CREATE TABLE usuario(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    roles ENUM('admin','superadmin') DEFAULT 'admin',
    nombre_usuario VARCHAR(150) NOT NULL,
    clave VARCHAR(250) NOT NULL
);

CREATE TABLE cargo(
    id_cargo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cargo VARCHAR(100) NOT NULL
);

CREATE TABLE empleado(
    id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    dni VARCHAR(8) UNIQUE NOT NULL,
    celular VARCHAR(20),
    correo VARCHAR(100),
    id_cargo INT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cargo) REFERENCES cargo(id_cargo)
);

CREATE TABLE asistencia(
    id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
    id_empleado INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);

CREATE TABLE proveedores(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    direccion VARCHAR(150)
);

CREATE TABLE compras(
    id_compra INT AUTO_INCREMENT PRIMARY KEY,
    id_proveedor INT NOT NULL,
    fecha_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_proveedor) REFERENCES proveedores(id)
);

CREATE TABLE recibidos(
    id_recibido INT AUTO_INCREMENT PRIMARY KEY,
    id_compra INT NOT NULL,
    fecha_recibido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado VARCHAR(50),
    FOREIGN KEY (id_compra) REFERENCES compras(id_compra)
);

CREATE TABLE devoluciones(
    id_devolucion INT AUTO_INCREMENT PRIMARY KEY,
    id_compra INT NOT NULL,
    motivo VARCHAR(200),
    fecha_devolucion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_compra) REFERENCES compras(id_compra)
);

CREATE TABLE stocks(
    id_stock INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);

INSERT INTO usuario(roles,nombre_usuario,clave)
VALUES
('superadmin','admin','123456');

INSERT INTO cargo(nombre_cargo)
VALUES
('Administrador'),
('Empleado');

INSERT INTO empleado(nombre,apellido,dni,celular,correo,id_cargo)
VALUES
('Kevin','Pinedo Benites','76543210','987654321','kevin@gmail.com',1),
('Maria','Gomez Rios','74125896','912345678','maria@gmail.com',2);

INSERT INTO proveedores(nombre,telefono,direccion)
VALUES
('Juan','987654321','Pucallpa'),
('Carlos','999888777','Lima');

INSERT INTO compras(id_proveedor,total)
VALUES
(1,250.00),
(2,500.00);

INSERT INTO recibidos(id_compra,estado)
VALUES
(1,'Recibido'),
(2,'Pendiente');

INSERT INTO devoluciones(id_compra,motivo)
VALUES
(1,'Producto defectuoso');

INSERT INTO stocks(producto,cantidad,precio)
VALUES
('Martillo',50,25.00),
('Taladro',20,180.00),
('Destornillador',100,12.00);
```

### Diagrama Entidad-Relacion (DER)
Falta integrar

 
### Modelo Relacional (MR)
![MODELO_RELACIONAL](https://cdn.phototourl.com/free/2026-06-03-f08342cb-cfc3-42d5-bd37-d7ca8e920713.png)

### Cardinalidades

Las cardinalidades describen cuántos registros de una tabla se relacionan con cuántos de otra.
