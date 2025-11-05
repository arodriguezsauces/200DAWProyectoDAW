<?php
/**
 * Script: info_servidor.php
 * Descripción: Muestra información detallada sobre el servidor HTTP y PHP.
 * Autor: ChatGPT (GPT-5)
 */

echo "<h1>🖥️ Información del Servidor HTTP</h1>";
echo "<hr>";

// Información básica del servidor HTTP
echo "<h2>🔹 Datos del servidor</h2>";
echo "<ul>";
echo "<li><b>Software del servidor:</b> " . ($_SERVER['SERVER_SOFTWARE'] ?? 'No disponible') . "</li>";
echo "<li><b>Nombre del host:</b> " . gethostname() . "</li>";
echo "<li><b>Dirección IP del servidor:</b> " . ($_SERVER['SERVER_ADDR'] ?? 'No disponible') . "</li>";
echo "<li><b>Puerto:</b> " . ($_SERVER['SERVER_PORT'] ?? 'No disponible') . "</li>";
echo "<li><b>Protocolo:</b> " . ($_SERVER['SERVER_PROTOCOL'] ?? 'No disponible') . "</li>";
echo "</ul>";


// --- Intentar mostrar módulos de Apache ---
echo "<h2>🔥 Módulos activos de Apache</h2>";

$comando = null;
if (shell_exec('which apache2ctl')) {
    $comando = 'apache2ctl -M 2>&1';
} elseif (shell_exec('which httpd')) {
    $comando = 'httpd -M 2>&1';
}

if ($comando) {
    $salida = shell_exec($comando);
    if ($salida) {
        echo "<pre style='background:#f9f9f9; padding:10px; border:1px solid #ccc;'>";
        echo htmlspecialchars($salida);
        echo "</pre>";
    } else {
        echo "<p>⚠️ No se pudieron obtener los módulos. Puede que PHP no tenga permiso para ejecutar comandos del sistema.</p>";
    }
} else {
    echo "<p>❌ No se encontró el comando <code>apache2ctl</code> ni <code>httpd</code> en el sistema.</p>";
}



// Información sobre PHP
echo "<h2>🐘 PHP</h2>";
echo "<ul>";
echo "<li><b>Versión de PHP:</b> " . phpversion() . "</li>";
echo "<li><b>Archivo php.ini cargado:</b> " . php_ini_loaded_file() . "</li>";
echo "<li><b>Extensiones cargadas:</b> " . count(get_loaded_extensions()) . "</li>";
echo "</ul>";

// Información de rutas
echo "<h2>📁 Rutas y archivos</h2>";
echo "<ul>";
echo "<li><b>Directorio raíz del documento:</b> " . ($_SERVER['DOCUMENT_ROOT'] ?? 'No disponible') . "</li>";
echo "<li><b>Script actual:</b> " . ($_SERVER['SCRIPT_FILENAME'] ?? 'No disponible') . "</li>";
echo "<li><b>Ruta actual:</b> " . getcwd() . "</li>";
echo "</ul>";

// Información del cliente (navegador o herramienta)
echo "<h2>🌐 Cliente conectado</h2>";
echo "<ul>";
echo "<li><b>Dirección IP del cliente:</b> " . ($_SERVER['REMOTE_ADDR'] ?? 'No disponible') . "</li>";
echo "<li><b>Agente del usuario:</b> " . ($_SERVER['HTTP_USER_AGENT'] ?? 'No disponible') . "</li>";
echo "<li><b>Método de solicitud:</b> " . ($_SERVER['REQUEST_METHOD'] ?? 'No disponible') . "</li>";
echo "<li><b>URL solicitada:</b> " . ($_SERVER['REQUEST_URI'] ?? 'No disponible') . "</li>";
echo "</ul>";

// Mostrar resumen de extensiones PHP
echo "<h2>🧩 Extensiones PHP cargadas</h2>";
$ext = get_loaded_extensions();
sort($ext);
echo "<div style='columns:3; -webkit-columns:3; -moz-columns:3;'>";
foreach ($ext as $e) {
    echo "<li>$e</li>";
}
echo "</div>";

echo "<hr><p><small>Generado el " . date("Y-m-d H:i:s") . " desde {$_SERVER['SERVER_NAME']}</small></p>";
?>
