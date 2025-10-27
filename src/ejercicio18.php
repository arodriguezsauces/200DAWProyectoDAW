<!DOCTYPE html>
<html lang="es">
<body>
    <div id="aviso">CURSO 2025/2026 -- DAW 2 -- I.E.S. LOS SAUCES</div>
    <nav>
        <div><a href="../indexProyectoTema3.php">Volver</a></div>
        <h2> <a href="../indexProyectoTema3.php">Tema 3</a> - Ejercicio 18</h2>
        <h2>Gonzalo Junquera Lorenzo</h2>
    </nav>
    <main>
       <?php 
       /**
        * @author: Gonzalo Junquera Lorenzo
        * @since: 19/10/2025
        * 18.Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
        */
       /* es usar las funciones Recorrer un array con funciones
        reset() Sitúa el puntero interno al comienzo del array
        next() Avanza el puntero interno una posición
        prev() Mueve el puntero interno una posición hacia atrás
        end() Sitúa el puntero interno al final del array
        current() Devuelve el elemento de la posición actual
        key() Devuelve la clave de la posición actual*/
       
       // Creacion de función que recorrerá el array y mostrará el nombre de cada asiento 
       function mostrarAsientos($aTeatro){
            print '<table>';
            
            $fila = 0;
            $numAsiento = 0;
            foreach ($aTeatro as $numFila=>$aFila) {
                echo "<tr>";
                $fila++;
                //echo "<th>Pasillo ".$fila."</th>";
                echo "<th>Pasillo ".$numFila."</th>";
                foreach ($aFila as $numAsiento=>$asiento) {
                    //$numAsiento++;
                    if(is_string($asiento)){
                        echo '<td class="ocupado">'.$asiento.'</td>';
                    } else {
                        echo '<td>'.$fila.'-'.$numAsiento.'</td>';
                    }
                }
                $numAsiento = 0;
                echo "</tr>";
            }
            echo "</table>";
        }

        // Constantes con datos iniciales
        const FILAS = 20;
        const ASIENTOS = 15;
        
        // Creación de array teatro bidimensional de 20*15
        for($iFila=1;$iFila<=20;$iFila++){
            for($iColumna=1;$iColumna<=15;$iColumna++){
                $aTeatro[$iFila][$iColumna]=null;
            }
        }

        // Adjudicación de algunos asientos.
        $aTeatro[1][1]="Juan";
        $aTeatro[8][13]="Pepe";
        $aTeatro[3][8]="Alfredo";
        $aTeatro[7][11]="Miguel";
        $aTeatro[2][2]="Miguel";
        $aTeatro[20][15]="Maria";
        
        // Llamada de la función mostrarAsientos()
        echo "<h2>Teatro mostrado desde una función</h2>";
        mostrarAsientos($aTeatro);

       ?>
    </main>
</body>
<head>
    <meta charset="UTF-8"> 
    <link rel="icon" type="image/png" href="../webroot/media/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="../webroot/css/estilos.css">
    <title>Gonzalo Junquera Lorenzo</title>
    <style>
        h2{text-align: center}
        td{
            border: 1px solid black;
            border-radius: 5px;
            max-width: 60px;
            width: 60px;
            height: 40px;
            text-align: center;
            background-color: rgba(189, 121, 121, 1);
        }
        th{
            padding-right: 10px;
        }
        .ocupado{
            background-color: greenyellow;
        }
    </style>
</head>

</html>
