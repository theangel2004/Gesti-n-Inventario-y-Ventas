# 📦 Sistema de Gestión de Inventario y Ventas

## Distribuidora El Surtidor

Sistema web desarrollado con **Laravel**, diseñado para optimizar la gestión de inventario, productos, categorías, proveedores, clientes y ventas de la empresa **Distribuidora El Surtidor**.

El sistema permite controlar las existencias disponibles, registrar transacciones comerciales, administrar la información de los proveedores y clientes, además de generar reportes para apoyar la toma de decisiones empresariales.

---

# 📋 Tabla de Contenido

- [Descripción General](#-descripción-general)
- [Objetivos](#-objetivos)
- [Arquitectura del Sistema](#-arquitectura-del-sistema)
- [Modelo Entidad Relación (MER)](#-modelo-entidad-relación-mer)
- [Requisitos del Sistema](#-requisitos-del-sistema)
- [Instalación y Configuración](#-instalación-y-configuración)
- [Módulos Implementados](#-módulos-implementados)
- [Rutas Principales](#-rutas-principales)
- [Seguridad y Validaciones](#-seguridad-y-validaciones)
- [Tecnologías Utilizadas](#-tecnologías-utilizadas)
- [Autor](#-autor)

---

# 📝 Descripción General

El Sistema de Gestión de Inventario y Ventas fue desarrollado como una solución integral para la administración de productos y ventas de una empresa distribuidora.

Entre sus funcionalidades principales se encuentran:

- Gestión de productos.
- Gestión de categorías.
- Gestión de proveedores.
- Gestión de clientes.
- Registro y control de ventas.
- Actualización automática del inventario.
- Dashboard con información relevante.
- Exportación de datos.
- Reportes administrativos.

---

# 🎯 Objetivos

## Objetivo General

Desarrollar una aplicación web que permita gestionar eficientemente el inventario y las ventas de la empresa Distribuidora El Surtidor, garantizando la integridad y disponibilidad de la información.

## Objetivos Específicos

- Administrar productos y categorías.
- Gestionar proveedores y clientes.
- Registrar ventas y actualizar automáticamente el inventario.
- Controlar niveles mínimos de stock.
- Generar reportes para la toma de decisiones.
- Aplicar validaciones para garantizar la calidad de los datos.

---

# 🏗️ Arquitectura del Sistema

La aplicación fue desarrollada utilizando el patrón de arquitectura **MVC (Modelo - Vista - Controlador)**.

## Modelo (Model)

Gestiona la interacción con la base de datos utilizando **Eloquent ORM**.

### Modelos Principales

- Producto
- Categoria
- Proveedor
- Cliente
- Venta
- DetalleVenta

## Vista (View)

Implementada mediante:

- Blade Templates
- Tailwind CSS
- JavaScript

Características:

- Diseño responsive.
- Componentes reutilizables.
- Formularios dinámicos.
- Ventanas modales.
- Paginación y filtros.

## Controlador (Controller)

Gestiona la lógica de negocio y las solicitudes HTTP.

### Controladores Principales

- ProductController
- CategoriaController
- ProveedorController
- ClienteController
- VentaController

---

# 🗄️ Modelo Entidad Relación (MER)

El Sistema de Gestión de Inventario y Ventas está diseñado sobre una base de datos relacional que permite administrar productos, categorías, proveedores, clientes y ventas, garantizando la integridad de la información mediante claves primarias y foráneas.

## Diagrama MER

Guarda la imagen del diagrama dentro de la carpeta `docs/` con el nombre `MER.png`.

```html
<p align="center">
  <img src="docs/MER.png" alt="MER Sistema de Inventario y Ventas" width="900">
</p>
```

---

# 📋 Entidades del Negocio

## Categorías

Permite clasificar los productos según su tipo o grupo.

| Campo       | Tipo       | Restricción |
| ----------- | ---------- | ----------- |
| id          | BigInteger | PK          |
| nombre      | String     | Requerido   |
| descripcion | Text       | Nullable    |
| created_at  | Timestamp  | Automático  |
| updated_at  | Timestamp  | Automático  |

---

## Proveedores

Almacena la información de los proveedores encargados del abastecimiento de productos.

| Campo           | Tipo       | Restricción |
| --------------- | ---------- | ----------- |
| id              | BigInteger | PK          |
| nombre          | String     | Requerido   |
| contacto_nombre | String     | Nullable    |
| telefono        | String     | Requerido   |
| email           | String     | Nullable    |
| direccion       | String     | Nullable    |
| created_at      | Timestamp  | Automático  |
| updated_at      | Timestamp  | Automático  |

---

## Clientes

Almacena la información de los clientes registrados en el sistema.

| Campo           | Tipo       | Restricción |
| --------------- | ---------- | ----------- |
| id              | BigInteger | PK          |
| nit_cc          | String     | Único       |
| nombre_tienda   | String     | Requerido   |
| nombre_contacto | String     | Requerido   |
| telefono        | String     | Requerido   |
| direccion       | String     | Requerido   |
| created_at      | Timestamp  | Automático  |
| updated_at      | Timestamp  | Automático  |

---

## Productos

Contiene la información de los artículos disponibles para la venta.

| Campo         | Tipo          | Restricción |
| ------------- | ------------- | ----------- |
| id            | BigInteger    | PK          |
| codigo_barras | String        | Único       |
| nombre        | String        | Requerido   |
| descripcion   | Text          | Nullable    |
| precio_venta  | Decimal(10,2) | Requerido   |
| stock_actual  | Integer       | Requerido   |
| stock_minimo  | Integer       | Requerido   |
| unidad_medida | String        | Requerido   |
| proveedor_id  | BigInteger    | FK          |
| categoria_id  | BigInteger    | FK          |
| created_at    | Timestamp     | Automático  |
| updated_at    | Timestamp     | Automático  |

---

## Ventas

Registra las transacciones comerciales realizadas.

| Campo          | Tipo          | Restricción                        |
| -------------- | ------------- | ---------------------------------- |
| id             | BigInteger    | PK                                 |
| numero_factura | String        | Único                              |
| fecha_venta    | DateTime      | Requerido                          |
| total          | Decimal(10,2) | Requerido                          |
| metodo_pago    | Enum          | contado / credito                  |
| estado         | Enum          | pendiente / despachado / cancelado |
| cliente_id     | BigInteger    | FK                                 |
| created_at     | Timestamp     | Automático                         |
| updated_at     | Timestamp     | Automático                         |

---

## Detalle_Ventas

Entidad asociativa encargada de relacionar productos con ventas.

| Campo           | Tipo          | Restricción |
| --------------- | ------------- | ----------- |
| id              | BigInteger    | PK          |
| venta_id        | BigInteger    | FK          |
| producto_id     | BigInteger    | FK          |
| cantidad        | Integer       | Requerido   |
| precio_unitario | Decimal(10,2) | Requerido   |
| created_at      | Timestamp     | Automático  |
| updated_at      | Timestamp     | Automático  |

---

# 🔗 Relaciones del Sistema

## Categorías → Productos

**Cardinalidad: 1:N (Uno a Muchos)**

Una categoría puede contener múltiples productos, mientras que un producto pertenece únicamente a una categoría.

---

## Proveedores → Productos

**Cardinalidad: 1:N (Uno a Muchos)**

Un proveedor puede suministrar múltiples productos, mientras que cada producto está asociado a un único proveedor.

---

## Clientes → Ventas

**Cardinalidad: 1:N (Uno a Muchos)**

Un cliente puede realizar múltiples compras, mientras que cada venta pertenece a un único cliente.

---

## Ventas ↔ Productos

**Cardinalidad: N:M (Muchos a Muchos)**

Una venta puede incluir múltiples productos y un producto puede estar presente en múltiples ventas.

Esta relación se implementa mediante la entidad asociativa **detalle_ventas**, generando dos relaciones:

* Una venta tiene muchos detalles de venta.
* Un producto aparece en muchos detalles de venta.

---

# 📐 Diagrama MER en Mermaid

```mermaid
erDiagram
    CATEGORIAS ||--o{ PRODUCTOS : clasifica
    PROVEEDORES ||--o{ PRODUCTOS : surte
    CLIENTES ||--o{ VENTAS : compra
    VENTAS ||--o{ DETALLE_VENTAS : contiene
    PRODUCTOS ||--o{ DETALLE_VENTAS : se_registra_en

    CATEGORIAS {
        bigint id PK
        string nombre
        text descripcion
    }

    PROVEEDORES {
        bigint id PK
        string nombre
        string contacto_nombre
        string telefono
        string email
        string direccion
    }

    CLIENTES {
        bigint id PK
        string nit_cc UK
        string nombre_tienda
        string nombre_contacto
        string telefono
        string direccion
    }

    PRODUCTOS {
        bigint id PK
        string codigo_barras UK
        string nombre
        text descripcion
        decimal precio_venta
        integer stock_actual
        integer stock_minimo
        string unidad_medida
        bigint proveedor_id FK
        bigint categoria_id FK
    }

    VENTAS {
        bigint id PK
        string numero_factura UK
        datetime fecha_venta
        decimal total
        enum metodo_pago
        enum estado
        bigint cliente_id FK
    }

    DETALLE_VENTAS {
        bigint id PK
        bigint venta_id FK
        bigint producto_id FK
        integer cantidad
        decimal precio_unitario
    }
```

---

# ⚙️ Tablas del Núcleo de Laravel

Además de las tablas de negocio, el sistema utiliza tablas nativas de Laravel para autenticación, sesiones, caché y procesamiento de tareas.

## users

Gestiona las credenciales de acceso de los usuarios del sistema.

Campos principales:

* id
* name
* email
* password

---

## password_reset_tokens

Almacena los tokens temporales utilizados para la recuperación de contraseñas.

---

## sessions

Gestiona las sesiones activas de los usuarios autenticados.

Puede relacionarse lógicamente con la tabla `users` mediante el campo `user_id`.

---

## cache y cache_locks

Utilizadas para optimizar el rendimiento de la aplicación mediante almacenamiento temporal de información.

---

## jobs

Gestiona tareas asíncronas ejecutadas en segundo plano.

---

## job_batches

Agrupa conjuntos de tareas para ejecución masiva.

---

## failed_jobs

Registra errores ocurridos durante la ejecución de trabajos en cola.

Estas tablas forman parte de la infraestructura interna de Laravel y garantizan la seguridad, estabilidad y rendimiento de la aplicación.


# ⚙️ Requisitos del Sistema

## Backend

- PHP 8.2 o superior
- Composer 2.x
- Laravel 12

## Frontend

- HTML5
- CSS3
- Tailwind CSS
- JavaScript

## Base de Datos

- MySQL 8+
- SQL Server (Opcional)

## Herramientas

- Git
- GitHub
- Node.js 18+
- NPM

---

# 🚀 Instalación y Configuración

## 1. Clonar el repositorio

```bash
git clone <https://github.com/theangel2004/Gesti-n-Inventario-y-Ventas>
cd <Gesti-n-Inventario-y-Ventas>
```

## 2. Instalar dependencias PHP

```bash
composer install
```

## 3. Configurar variables de entorno

```bash
cp .env.example .env
```

Editar el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_inventario
DB_USERNAME=root
DB_PASSWORD=
```

## 4. Generar clave de la aplicación

```bash
php artisan key:generate
```

## 5. Ejecutar migraciones

```bash
php artisan migrate
```

o

```bash
php artisan migrate:fresh --seed
```

## 6. Instalar dependencias frontend

```bash
npm install
```

## 7. Compilar recursos

```bash
npm run dev
```

## 8. Iniciar servidor

```bash
php artisan serve
```

La aplicación estará disponible en:

```text
http://127.0.0.1:8000
```

---

# 📊 Módulos Implementados

## Dashboard

**Ruta:** `/dashboard`

### Funciones

- Métricas principales del negocio.
- Acceso rápido a módulos.
- Resumen del inventario.
- Navegación a reportes.

---

## Gestión de Inventario

**Ruta:** `/inventario`

### Operaciones CRUD

#### Crear Producto

- Registro de nuevos productos.
- Validación de SKU único.
- Asociación de categoría y proveedor.

#### Consultar Producto

- Consulta dinámica mediante AJAX.
- Visualización en modal.

#### Editar Producto

- Actualización dinámica de información.

#### Eliminar Producto

- Confirmación de seguridad.

### Filtros

- Categoría.
- Estado de inventario.
- Stock mínimo.

### Exportación

- CSV.
- Excel.

### Paginación

- Conserva filtros activos.
- Mantiene búsquedas realizadas.

---

## Categorías

**Ruta:** `/categorias`

Permite administrar la clasificación de productos.

---

## Proveedores

**Ruta:** `/partners`

Permite administrar la información de proveedores.

---

## Clientes

Gestión completa de clientes registrados.

---

## Ventas

**Ruta:** `/ventas`

### Funciones

- Registro de ventas.
- Generación de facturas.
- Asociación de clientes.
- Actualización automática del inventario.

---

## Reportes

**Ruta:** `/reportes`

### Funciones

- Reporte de ventas.
- Reporte de inventario.
- Productos con stock bajo.
- Información estadística.

---

# 🛣️ Rutas Principales

| Método | Ruta | Nombre |
|---------|---------|---------|
| GET | /inventario | inventory |
| POST | /inventario | products.store |
| GET | /inventario/{id} | products.show |
| PUT | /inventario/{id} | products.update |
| DELETE | /inventario/{id} | products.destroy |

---

# 🔒 Seguridad y Validaciones

El sistema implementa:

- Validación de formularios.
- Restricción de valores negativos.
- Integridad referencial mediante claves foráneas.
- Protección CSRF de Laravel.
- Validación de SKU únicos.
- Control de stock mínimo.
- Validación de datos obligatorios.

---

# 🛠️ Tecnologías Utilizadas

| Tecnología | Uso |
|------------|-----|
| Laravel 12 | Framework Backend |
| PHP 8.2 | Lenguaje Backend |
| MySQL | Base de Datos |
| Tailwind CSS | Diseño UI |
| Blade | Motor de Plantillas |
| JavaScript | Interactividad |
| Eloquent ORM | Acceso a Datos |
| Git | Control de Versiones |
| GitHub | Repositorio |

---

# 👨‍💻 Autor

**Angel Correa Vega**

Tecnólogo en Análisis y Desarrollo de Software (ADSO) - SENA

---

# 📄 Licencia

Proyecto académico desarrollado con fines educativos para el programa ADSO del SENA.