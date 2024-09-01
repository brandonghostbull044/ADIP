<?php
header("Content-Type: text/html; charset=UTF-8");
echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentación API CRUD - Cuatro Servidores</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2, h3 { color: #333; }
        pre { background: #f4f4f4; padding: 10px; border-left: 4px solid #ccc; }
        code { background: #f4f4f4; padding: 2px 4px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Documentación API CRUD - Cuatro Servidores</h1>
    <p>Esta documentación describe el funcionamiento de la API CRUD que opera en cuatro servidores independientes, cada uno encargado de un método HTTP específico: GET, POST, PUT y DELETE. La API utiliza autenticación Basic Auth.</p>
    
    <h2>Servidores</h2>
    <p>Los servidores se ejecutan en los siguientes puertos:</p>
    <ul>
        <li><strong>GET Server</strong>: <a href="http://localhost:8001" target="_blank">http://localhost:8001</a></li>
        <li><strong>POST Server</strong>: <a href="http://localhost:8002" target="_blank">http://localhost:8002</a></li>
        <li><strong>PUT Server</strong>: <a href="http://localhost:8003" target="_blank">http://localhost:8003</a></li>
        <li><strong>DELETE Server</strong>: <a href="http://localhost:8004" target="_blank">http://localhost:8004</a></li>
    </ul>
    
    <h2>Autenticación</h2>
    <p>Para realizar peticiones a la API, se requiere autenticación mediante Basic Auth. Las credenciales deben ser proporcionadas en cada solicitud.</p>
    
    <h2>Endpoints</h2>
    <h3>1. GET /usuarios</h3>
    <p><strong>URL:</strong> <a href="http://localhost:8001/usuarios" target="_blank">http://localhost:8001/usuarios</a></p>
    <p><strong>Descripción:</strong> Obtiene una lista de todos los usuarios registrados o un usuario específico si se proporciona un ID.</p>
    <p><strong>Parámetros:</strong></p>
    <ul>
        <li><code>id</code> (opcional, en la URI): ID del usuario que se desea obtener.</li>
    </ul>
    <p><strong>Respuesta:</strong> JSON con los detalles del usuario o la lista de todos los usuarios.</p>
    
    <h3>2. POST /usuarios</h3>
    <p><strong>URL:</strong> <a href="http://localhost:8002/usuarios" target="_blank">http://localhost:8002/usuarios</a></p>
    <p><strong>Descripción:</strong> Crea un nuevo usuario.</p>
    <p><strong>Body requerido:</strong></p>
    <ul>
        <li><code>nombre</code> (string): Nombre del usuario (obligatorio).</li>
        <li><code>edad</code> (int): Edad del usuario (obligatorio).</li>
        <li><code>correo</code> (string): Correo electrónico del usuario (obligatorio).</li>
    </ul>
    <p><strong>Respuesta:</strong> JSON con los detalles del usuario creado.</p>
    
    <h3>3. PUT /usuarios/{id}</h3>
    <p><strong>URL:</strong> <a href="http://localhost:8003/usuarios/{id}" target="_blank">http://localhost:8003/usuarios/{id}</a></p>
    <p><strong>Descripción:</strong> Actualiza la información de un usuario existente.</p>
    <p><strong>Parámetros:</strong></p>
    <ul>
        <li><code>id</code> (requerido, en la URI): ID del usuario que se desea actualizar.</li>
    </ul>
    <p><strong>Body permitido:</strong></p>
    <ul>
        <li><code>nombre</code> (string): Nombre del usuario (opcional).</li>
        <li><code>edad</code> (int): Edad del usuario (opcional).</li>
        <li><code>correo</code> (string): Correo electrónico del usuario (opcional).</li>
    </ul>
    <p><strong>Respuesta:</strong> JSON con los detalles actualizados del usuario.</p>
    
    <h3>4. DELETE /usuarios/{id}</h3>
    <p><strong>URL:</strong> <a href="http://localhost:8004/usuarios/{id}" target="_blank">http://localhost:8004/usuarios/{id}</a></p>
    <p><strong>Descripción:</strong> Elimina un usuario existente.</p>
    <p><strong>Parámetros:</strong></p>
    <ul>
        <li><code>id</code> (requerido, en la URI): ID del usuario que se desea eliminar.</li>
    </ul>
    <p><strong>Respuesta:</strong> JSON confirmando la eliminación del usuario.</p>
    
    <h2>Ejemplo de Uso</h2>
    <p>Ejemplos de cómo realizar peticiones a cada servidor de la API:</p>
    <pre>
# Realizar una petición GET para obtener todos los usuarios
curl -u usuario:password http://localhost:8001/usuarios

# Realizar una petición POST para crear un nuevo usuario
curl -X POST http://localhost:8002/usuarios \
     -u usuario:password \
     -d \'{"nombre": "Juan", "edad": 30, "correo": "juan@example.com"}\'

# Realizar una petición PUT para actualizar un usuario
curl -X PUT http://localhost:8003/usuarios/1 \
     -u usuario:password \
     -d \'{"nombre": "Juan Pérez", "edad": 31}\' 

# Realizar una petición DELETE para eliminar un usuario
curl -X DELETE http://localhost:8004/usuarios/1 \
     -u usuario:password
    </pre>
</body>
</html>
';
?>
