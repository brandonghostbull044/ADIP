<?php
// Generar documentación de uso de la API
header('Content-Type: text/html');

echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Documentación de la API</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; margin: 20px; }";
echo "h1 { color: #333; }";
echo "h2 { color: #555; }";
echo "pre { background-color: #f4f4f4; padding: 10px; border-radius: 5px; }";
echo "code { color: #d14; }";
echo "</style>";
echo "</head>";
echo "<body>";

echo "<h1>Documentación de la API</h1>";
echo "<p>Esta API permite realizar solicitudes para obtener información sobre pacientes. A continuación se detalla cómo realizar peticiones a la API.</p>";

echo "<h2>Encabezados Requeridos</h2>";
echo "<p>Para realizar una petición a la API, debes incluir los siguientes encabezados:</p>";
echo "<ul>";
echo "<li><strong>X-HASH</strong>: El hash HMAC generado con el timestamp y el UID. Debe coincidir con el hash calculado en el servidor.</li>";
echo "<li><strong>X-TIMESTAMP</strong>: El timestamp que se usó para generar el hash.</li>";
echo "<li><strong>X-UID</strong>: El identificador del usuario, por defecto debe ser <code>1</code>.</li>";
echo "</ul>";

echo "<h2>Generar Hash y Timestamp</h2>";
echo "<p>Cuando inicies el servidor, se generarán un timestamp y un hash. Usa estos valores para tus peticiones. Aquí está un ejemplo:</p>";
echo "<pre>";
echo "<code>";
echo "Timestamp: [Timestamp generado por el servidor]\n";
echo "Hash: [Hash generado por el servidor]";
echo "</code>";
echo "</pre>";

echo "<h2>Realizar Peticiones</h2>";
echo "<p>Las peticiones a la API deben incluir los siguientes parámetros:</p>";
echo "<ul>";
echo "<li><strong>resource_type</strong>: Parámetro obligatorio. Actualmente, el valor permitido es <code>patients</code>.</li>";
echo "<li><strong>resource_id</strong>: Parámetro opcional. Actualmente, el valor permitido es <code>1</code>.</li>";
echo "</ul>";

echo "<h3>Ejemplo de Solicitud</h3>";
echo "<p>A continuación se muestra un ejemplo de cómo hacer una solicitud a la API usando <code>curl</code>:</p>";
echo "<pre>";
echo "<code>";
echo "curl -X GET 'http://localhost:8000?resource_type=patients&resource_id=1' \\\n";
echo "     -H 'X-HASH: [Hash generado]' \\\n";
echo "     -H 'X-TIMESTAMP: [Timestamp generado]' \\\n";
echo "     -H 'X-UID: 1'";
echo "</code>";
echo "</pre>";

echo "<h2>Respuestas</h2>";
echo "<p>Las respuestas de la API se devolverán en formato JSON. Aquí hay un ejemplo de una respuesta:</p>";

echo "</body>";
echo "</html>";
?>
