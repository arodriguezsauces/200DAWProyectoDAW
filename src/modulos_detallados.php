<?php
/**
 * Script para listar los módulos de PHP instalados,
 * su versión, estado y agrupación funcional.
 */

echo "<h1>📦 Módulos PHP instalados</h1>";

// Obtener lista de módulos cargados
$modules = get_loaded_extensions();
sort($modules);

// Obtener configuración PHP
$iniPath = php_ini_loaded_file();
echo "<p><b>Archivo php.ini cargado:</b> $iniPath</p>";

// Mostrar módulos y versiones
echo "<h2>🧩 Detalle general de módulos</h2>";
echo "<table border='1' cellspacing='0' cellpadding='6'>
<tr style='background:#ddd; font-weight:bold;'>
  <td>Módulo</td>
  <td>Versión</td>
  <td>Estado</td>
</tr>";

foreach ($modules as $m) {
    $ver = phpversion($m);
    $ver = $ver ? $ver : "—";
    $estado = extension_loaded($m) ? "✅ Activo" : "❌ Inactivo";
    echo "<tr><td>$m</td><td>$ver</td><td>$estado</td></tr>";
}
echo "</table>";

// Clasificación de módulos
$grupos = [
    "Bases de datos" => ["mysqli", "pdo_mysql", "pdo_pgsql", "sqlite3", "pgsql", "odbc"],
    "Compresión" => ["bz2", "zip", "zlib"],
    "Gráficos" => ["gd", "imagick"],
    "XML y DOM" => ["xml", "dom", "simplexml", "xmlreader", "xmlwriter", "xsl"],
    "Texto y codificación" => ["mbstring", "iconv", "intl"],
    "Red y APIs" => ["curl", "openssl", "soap"],
    "Seguridad y cifrado" => ["mcrypt", "openssl", "sodium"],
    "Utilidades varias" => ["json", "session", "tokenizer", "fileinfo", "phar"]
];

echo "<h2>📂 Módulos agrupados por tipo</h2>";
foreach ($grupos as $tipo => $lista) {
    $encontrados = array_intersect($modules, $lista);
    if ($encontrados) {
        echo "<h3>🔹 $tipo</h3><ul>";
        foreach ($encontrados as $m) {
            echo "<li>$m  </li>";
        }
        echo "</ul>";
    }
}

// Total
echo "<p><b>Total de módulos activos:</b> " . count($modules) . "</p>";

echo "<hr><small>Generado el " . date("Y-m-d H:i:s") . "</small>";
?>
