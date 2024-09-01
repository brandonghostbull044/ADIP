# CRUD API

Este proyecto es una API CRUD que permite gestionar una base de datos de usuarios. La API soporta las operaciones básicas de Crear, Leer, Actualizar y Eliminar usuarios a través de diferentes métodos HTTP. Los usuarios tienen los siguientes atributos: nombre, edad y correo electrónico.

## Descripción del Proyecto

La API CRUD está diseñada para manejar una base de datos de usuarios con los siguientes campos:
- **Nombre** (string)
- **Edad** (integer)
- **Correo** (string)

La API permite las siguientes operaciones:
- **GET**: Obtener todos los usuarios o un usuario específico.
- **POST**: Crear un nuevo usuario.
- **PUT**: Actualizar la información de un usuario existente.
- **DELETE**: Eliminar un usuario.

## Instrucciones para Ejecutar el Proyecto

1. **Ejecutar el archivo `init.php`**

   Para iniciar el proyecto, ejecuta el archivo `init.php` con el siguiente comando:

   ```bash
   php init.php

2. **Seleccionar una opción:**

    El script te solicitará que elijas entre las dos opciones disponibles. Puedes optar por iniciar un solo servidor con middleware que incluye autenticación por token y básica, o cuatro servidores separados para los métodos HTTP GET, POST, PUT y DELETE (solo con autenticación básica).

3. **Revisar la documentación:**

    El script te proporcionará la opción de abrir la documentación del proyecto. Es altamente recomendable que revises la documentación para entender cómo interactuar con la API y cómo realizar las operaciones CRUD.


Descripción del CRUD
El CRUD (Crear, Leer, Actualizar, Eliminar) es una funcionalidad básica para gestionar datos en una base de datos. En este proyecto, la API permite realizar las siguientes operaciones:

Crear (POST): Agregar un nuevo usuario a la base de datos.
Leer (GET): Obtener la información de los usuarios existentes.
Actualizar (PUT): Modificar los datos de un usuario específico.
Eliminar (DELETE): Eliminar un usuario de la base de datos.
La base de datos de usuarios incluye los siguientes campos:

Nombre: Nombre del usuario.
Edad: Edad del usuario.
Correo: Correo electrónico del usuario.
Cada operación está protegida por autenticación básica o autenticación por token, dependiendo de la configuración que elijas al iniciar el servidor.

Requisitos
PHP 7.4 o superior
Acceso a la línea de comandos (CLI)
Dependencias necesarias especificadas en el archivo composer.json (si aplica)
Contribuciones
Si deseas contribuir al proyecto, por favor, envía un pull request con tus cambios o mejoras. Asegúrate de seguir las mejores prácticas de desarrollo y de incluir pruebas para nuevas funcionalidades.


