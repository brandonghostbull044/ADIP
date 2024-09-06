# Documentación de Estructura del Código

## Estructura de Archivos

1. **`src/`**
   - Directorio donde se almacenan los archivos JSON con datos de empleados.

2. **`classes/`**
   - Contiene las definiciones de las clases `Employee` y `Manager`.

## Clases

1. **`Employee.php`**
   - **Descripción**: Define la clase `Employee` con atributos y métodos básicos.
   - **Métodos Clave**:
     - `getFullName()`: Devuelve el nombre completo del empleado.
     - `getAnnualSalary()`: Calcula el salario anual.

2. **`Manager.php`**
   - **Descripción**: Extiende la clase `Employee` y añade el atributo `bonus`.
   - **Métodos Clave**:
     - `getAnnualSalary()`: Calcula el salario anual incluyendo el bono.

## Interfaces

1. **`Reporteable.php`**
   - **Descripción**: Define la interfaz `Reporteable` que requiere la implementación del método `generateReport`.

## Funciones en Scripts

1. **`generate_report.php`**
   - **Función Principal**: `generate_salary_report_txt($employees)`
   - **Descripción**: Genera un archivo de reporte en formato `.txt` con los datos de los empleados.

2. **`list_employees.php`**
   - **Función Principal**: `list_employees($employees)`
   - **Descripción**: Lista todos los empleados con su ID y nombre.

3. **`load_employees_from_json.php`**
   - **Función Principal**: `load_employees_from_json()`
   - **Descripción**: Carga empleados desde archivos JSON y crea instancias de `Employee` o `Manager`.

4. **`request_data.php`**
   - **Función Principal**: `request_data()`
   - **Descripción**: Solicita datos del usuario para crear un nuevo empleado.

5. **`save_employees_to_json.php`**
   - **Función Principal**: `save_employees_to_json($employees)`
   - **Descripción**: Guarda la lista de empleados en un archivo JSON.

6. **`search_employee.php`**
   - **Función Principal**: `search_employee($employees, $name)`
   - **Descripción**: Busca un empleado por nombre y muestra los resultados.

## Validaciones

1. **`validate_data.php`**
   - **Funciones**:
     - `transform_name($name)`: Transforma el nombre completo en un array asociativo.
     - `validate_name($name)`: Valida que el nombre contenga al menos un nombre y un apellido.
     - `validate_age($age)`: Valida que la edad sea un número entre 18 y 65.
     - `validate_type($type)`: Valida el tipo de empleado.
