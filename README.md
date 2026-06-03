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

create table usuario(
id_usuario int auto_increment primary key,
roles enum('admin', 'superadmin') default 'admin',
nombre_usuario varchar (150) not null,
clave varchar(250) not null
);

CREATE TABLE proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    direccion VARCHAR(150)
);

CREATE TABLE compras (
    id_compra INT AUTO_INCREMENT PRIMARY KEY,
    id_proveedor INT NOT NULL,
    fecha_compra DATE NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_proveedor) REFERENCES proveedores(id)
);

CREATE TABLE recibidos (
    id_recibido INT AUTO_INCREMENT PRIMARY KEY,
    id_compra INT NOT NULL,
    fecha_recibido DATE NOT NULL,
    estado VARCHAR(50),
    FOREIGN KEY (id_compra) REFERENCES compras(id_compra)
);

CREATE TABLE devoluciones (
    id_devolucion INT AUTO_INCREMENT PRIMARY KEY,
    id_compra INT NOT NULL,
    motivo VARCHAR(200),
    fecha_devolucion DATE NOT NULL,
    FOREIGN KEY (id_compra) REFERENCES compras(id_compra)
);

CREATE TABLE stocks (
    id_stock INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);


INSERT INTO proveedores(nombre,telefono,direccion)
VALUES
('Juan','987654321','Pucallpa'),
('Carlos','999888777','Lima');

INSERT INTO compras(id_proveedor,fecha_compra,total)
VALUES
(1,'2026-01-12',250.00),
(2,'2026-01-15',500.00);

INSERT INTO recibidos(id_compra,fecha_recibido,estado)
VALUES
(1,'2026-01-13','Recibido'),
(2,'2026-01-16','Pendiente');

INSERT INTO devoluciones(id_compra,motivo,fecha_devolucion)
VALUES
(1,'Producto defectuoso','2026-01-14');

INSERT INTO stocks(producto,cantidad,precio)
VALUES
('Martillo',50,25.00),
('Taladro',20,180.00),
('Destornillador',100,12.00);
```
