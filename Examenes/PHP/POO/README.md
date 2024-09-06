# Documentación de Uso del Proyecto

Este archivo explica cómo usar el proyecto, incluyendo la ejecución de scripts, la generación de reportes, y la gestión de archivos JSON.

## Requisitos

- PHP 7.4 o superior
- Acceso a la línea de comandos

## Uso General

1. **Ejecutar el Sistema**
   - **Descripción**: Ejecuta el archivo principal `init.php` para comenzar la interacción con el sistema.
   - **Comando**:
     ```sh
     php init.php
     ```
   - **Instrucciones**: El script `init.php` guiará al usuario a través de una serie de opciones, incluyendo agregar, eliminar, y buscar empleados, así como generar reportes.

## Funcionalidades

1. **Agregar Empleados**
   - **Descripción**: Permite agregar nuevos empleados al sistema.
   - **Proceso**: El script solicitará información como el nombre, edad, departamento, salario y tipo de empleado. Los datos se validan y se almacenan en archivos JSON.

2. **Eliminar Empleados**
   - **Descripción**: Permite eliminar empleados existentes.
   - **Proceso**: Se debe buscar al empleado por nombre, y luego se puede proceder a eliminarlo del sistema. Los cambios se reflejan en los archivos JSON.

3. **Buscar Empleados**
   - **Descripción**: Permite buscar empleados por nombre.
   - **Proceso**: Se ingresa un nombre y el sistema muestra los resultados, permitiendo seleccionar un empleado específico si hay varias coincidencias.

4. **Generar Reportes**
   - **Descripción**: Genera un archivo de reporte en formato `.txt` con los datos de los empleados.
   - **Proceso**: Se selecciona la opción para generar reportes y el sistema crea un archivo `.txt` en el directorio correspondiente con la información de los empleados.

## Gestión de Archivos JSON

1. **Archivos de Empleados**
   - **Descripción**: Los datos de los empleados se almacenan en archivos JSON. Estos archivos se pueden seleccionar para actualizar o para agregar nuevos datos.
   - **Proceso**: Durante la ejecución del script `save_employees_to_json.php`, se puede elegir entre actualizar un archivo existente o crear uno nuevo.

## Notas Adicionales

- **Archivos Generados**: Los reportes se generan en el formato `.txt`, y los datos de los empleados se guardan en archivos `.json` en el directorio `/src`.
