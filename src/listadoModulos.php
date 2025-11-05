<?php
echo "<h2>📦 Módulos PHP cargados</h2>";

$modules = get_loaded_extensions();
sort($modules);

echo "<ul>";
foreach ($modules as $m) {
    echo "<li>$m</li>";
}
echo "</ul>";

echo "<h3>🔍 Total de módulos cargados: " . count($modules) . "</h3>";

// Clasificación por tipo (opcional)
$grupos = [
    "Bases de datos" => ["mysqli", "pdo_mysql", "pdo_pgsql", "sqlite3"],
    "Compresión" => ["bz2", "zip", "zlib"],
    "Gráficos" => ["gd", "imagick"],
    "XML y DOM" => ["xml", "dom", "simplexml", "xmlreader", "xmlwriter", "xsl"],
    "Texto y codificación" => ["mbstring", "iconv"],
    "Red y APIs" => ["curl", "openssl"],
    "Utilidades" => ["intl", "json", "session"]
];

echo "<h2>📂 Clasificación por tipo:</h2>";
foreach ($grupos as $tipo => $lista) {
    $encontrados = array_intersect($modules, $lista);
    if ($encontrados) {
        echo "<h4>$tipo</h4><ul>";
        foreach ($encontrados as $m) echo "<li>$m</li>";
        echo "</ul>";
    }
}
?>
