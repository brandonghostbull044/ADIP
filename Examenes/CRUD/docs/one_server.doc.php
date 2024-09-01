<?php
header("Content-Type: text/html; charset=UTF-8");
echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentación API CRUD - Un Solo Servidor</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2, h3 { color: #333; }
        pre { background: #f4f4f4; padding: 10px; border-left: 4px solid #ccc; }
        code { background: #f4f4f4; padding: 2px 4px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Documentación API CRUD - Un Solo Servidor</h1>
    <p>Esta documentación describe el funcionamiento de la API CRUD que opera en un solo servidor con un Middleware para manejar los métodos HTTP: GET, POST, PUT y DELETE. La autenticación se realiza mediante un token.</p>
    
    <h2>Servidor</h2>
    <p>El servidor se ejecuta en el siguiente puerto:</p>
    <ul>
        <li><strong>Servidor</strong>: <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></li>
    </ul>
    
    <h2>URI Base</h2>
    <p>Todas las peticiones se realizan sobre la siguiente URI base:</p>
    <pre>/usuarios</pre>
    
    <h2>Autenticación</h2>
    <h3>Token</h3>
    <p>Para realizar peticiones a la API, se requiere autenticación mediante un token. El token se debe incluir en el encabezado de la petición como <code>X-Token</code>. Además, se deben proporcionar las credenciales de Basic Auth en el apartado correspondiente de la petición.</p>
    <p>Para obtener el token, se debe hacer una peticion POST al servidor <a href="http://localhost:8001">http://localhost:8001</a>, el cual le solicitara los siguientes dato: <code>Auth ID</code> (un entero) y <code>Secret Auth</code> (una cadena de texto). Estos podrán ser enviados como encabezados (X-Client-Id y X-Secret respectivamente), o en caso de no incluirlos se le solicitarán por terminal, es por ello que se recomienda hacer la petición mediante terminal y no mediante software de terceros. Una vez validados estos datos, el servidor imprimirá el token.</p>
    <p>Ejemplo de cómo enviar el token y las credenciales Basic Auth con <code>curl</code>:</p>
    <pre>
curl http://localhost:8001 -X "POST" -H "X-Secret: [TU_SECRET]" -H "X-Client-ID: [TU_CLIENT_ID]"
    </pre>

    <h3>Basic Auth</h3>
    <p>Adicional a la autenticación por Token, se requiere autenticación básica http, ya que esta API consume otras 4 APIs que son las que requieren el Basic Auth. Estas credenciales se deben enviar en el apartado Auth de tu petición.</p>
    <p>Ejemplo de cómo enviar el token y las credenciales Basic Auth con <code>curl</code>:</p>
    <pre>
curl http://localhost:8000/usuarios -H "X-Token: [TU_TOKEN_ANTES_GENERADO]" -u "usuario:contraseña"
    </pre>
    
    <h2>Endpoints</h2>
    <h3>1. GET /usuarios</h3>
    <p><strong>URL:</strong> <a href="http://localhost:8000/usuarios" target="_blank">http://localhost:8000/usuarios</a></p>
    <p><strong>Descripción:</strong> Obtiene una lista de todos los usuarios registrados o un usuario específico si se proporciona un ID.</p>
    <p><strong>Parámetros:</strong></p>
    <ul>
        <li><code>id</code> (opcional, en la URI): ID del usuario que se desea obtener.</li>
    </ul>
    <p><strong>Respuesta:</strong> JSON con los detalles del usuario o la lista de todos los usuarios.</p>
    
    <h3>2. POST /usuarios</h3>
    <p><strong>URL:</strong> <a href="http://localhost:8000/usuarios" target="_blank">http://localhost:8000/usuarios</a></p>
    <p><strong>Descripción:</strong> Crea un nuevo usuario.</p>
    <p><strong>Body requerido:</strong></p>
    <ul>
        <li><code>nombre</code> (string): Nombre del usuario (obligatorio).</li>
        <li><code>edad</code> (int): Edad del usuario (obligatorio).</li>
        <li><code>correo</code> (string): Correo electrónico del usuario (obligatorio).</li>
    </ul>
    <p><strong>Respuesta:</strong> Mensaje de actualización exitosa..</p>
    
    <h3>3. PUT /usuarios/{id}</h3>
    <p><strong>URL:</strong> <a href="http://localhost:8000/usuarios/{id}" target="_blank">http://localhost:8000/usuarios/{id}</a></p>
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
    <p><strong>Respuesta:</strong> Mensaje de actualización exitosa</p>
    
    <h3>4. DELETE /usuarios/{id}</h3>
    <p><strong>URL:</strong> <a href="http://localhost:8000/usuarios/{id}" target="_blank">http://localhost:8000/usuarios/{id}</a></p>
    <p><strong>Descripción:</strong> Elimina un usuario existente.</p>
    <p><strong>Parámetros:</strong></p>
    <ul>
        <li><code>id</code> (requerido, en la URI): ID del usuario que se desea eliminar.</li>
    </ul>
    <p><strong>Respuesta:</strong> Mensaje de eliminación exitosa.</p>
    
    <h2>Ejemplo de Uso</h2>
    <p>Ejemplos de cómo realizar peticiones a la API:</p>
    <pre>
# Realizar una petición GET para obtener todos los usuarios
curl http://localhost:8000/usuarios -H "X-Token: [TU_TOKEN]" -u usuario:password

# Realizar una petición POST para crear un nuevo usuario
curl -X POST http://localhost:8000/usuarios \
     -H "X-Token: [TU_TOKEN]" \
     -u usuario:password \
     -d \'{"nombre": "Juan", "edad": 30, "correo"\: "juan@example.com"}\'

# Realizar una petición PUT para actualizar un usuario
curl -X PUT http://localhost:8000/usuarios/1 \
     -H "X-Token: [TU_TOKEN]" \
     -u usuario:password \
     -d \'{"nombre": "Juan Pérez", "edad": 31}\' 

# Realizar una petición DELETE para eliminar un usuario
curl -X DELETE http://localhost:8000/usuarios/1 \
     -H "X-Token: [TU_TOKEN]" \
     -u usuario:password
    </pre>
</body>
</html>
';
?>
