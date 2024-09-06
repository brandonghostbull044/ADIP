# Documentación de la Estructura del Proyecto

Este archivo describe la estructura de carpetas y archivos del proyecto, incluyendo las clases y funciones utilizadas.

## Estructura de Carpetas

- **`abstract/`**: Contiene las clases abstractas.
- **`doc/`**: Documentación de la estructura del proyecto.
- **`functions/`**: Contiene las funciones auxiliares utilizadas en el proyecto.
- **`interfaces/`**: Contiene las interfaces definidas en el proyecto.
- **`reports/`**: Carpeta donde se generan los archivos `.txt` con los reportes.
- **`src/`**: Carpeta donde se almacenan los archivos JSON con los datos de los empleados.

## Estructura de Archivos

### `abstract/Person.php`

- **Descripción**: Clase abstracta que sirve como base para las clases que representan a personas en el sistema.
- **Métodos**:
  - **`getFullName()`**: Método abstracto que debe ser implementado en las clases derivadas para obtener el nombre completo de la persona.

### `functions/validate_data.php`

- **Descripción**: Contiene funciones para validar los datos ingresados por el usuario.
- **Funciones**:
  - **`transform_name($name)`**: Transforma el nombre completo en un array asociativo.
  - **`validate_name($name)`**: Valida el nombre completo.
  - **`validate_age($age)`**: Valida la edad del empleado.
  - **`validate_type($type)`**: Valida el tipo de empleado.

### `functions/request_data.php`

- **Descripción**: Solicita datos del usuario para crear o actualizar empleados.
- **Funciones**:
  - **`request_data()`**: Solicita y valida datos del empleado, incluyendo nombre, edad, departamento, salario y tipo.

### `functions/save_employees_to_json.php`

- **Descripción**: Guarda la lista de empleados en un archivo JSON.
- **Funciones**:
  - **`save_employees_to_json($employees)`**: Guarda los datos de los empleados en un archivo JSON en la carpeta `src`.

### `functions/search_employee.php`

- **Descripción**: Busca empleados por nombre.
- **Funciones**:
  - **`search_employee($employees, $name)`**: Busca y retorna empleados cuyo nombre coincide con el criterio de búsqueda.

### `interfaces/Reporteable.php`

- **Descripción**: Interface para clases que generan reportes.
- **Métodos**:
  - **`generateReport($data)`**: Método que debe ser implementado para generar un reporte a partir de los datos.

### `src/`

- **Descripción**: Carpeta donde se almacenan los archivos JSON con la información de los empleados.

### `reports/`

- **Descripción**: Carpeta donde se generan los archivos `.txt` con los reportes.

### Clases y Funciones Adicionales

#### `SalariesReport.php`

- **Descripción**: Clase que implementa la generación de reportes de salarios. 
- **Métodos**:
  - **`generateReport($data)`**: Implementa la generación de un reporte con los datos de salarios, siguiendo la interfaz `Reporteable`.

#### `Person.php`

- **Descripción**: Clase abstracta que define el comportamiento básico para las clases de personas.
- **Métodos**:
  - **`getFullName()`**: Método abstracto para obtener el nombre completo.

### `init.php`

- **Descripción**: Archivo principal que inicia la aplicación y proporciona la interfaz de usuario.
- **Comportamiento**:
  1. **Inicio de Sesión**: Pregunta al usuario si desea iniciar sesión como administrador o como empleado. 
     - **Administrador**: Solicita las credenciales (`admin` / `password123`).
     - **Empleado**: Proporciona acceso limitado.
  2. **Menú Principal**: Ofrece opciones para agregar, eliminar, buscar empleados, y generar reportes.
  3. **Interacción con el Usuario**: Solicita datos al usuario y ejecuta las funciones correspondientes según la opción seleccionada.
  4. **Gestión de Archivos**: Maneja la selección y actualización de archivos JSON para empleados y generación de reportes en formato `.txt`.

## Notas

- **Archivos Generados**:
  - Los archivos de reportes se generan en la carpeta `reports`.
  - Los archivos JSON con los datos de los empleados se almacenan en la carpeta `src`.
