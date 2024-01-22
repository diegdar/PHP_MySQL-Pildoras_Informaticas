<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paginacion.css">
    <title>Document</title>
</head>

<body>
    
<?php
    try{
        $base = new PDO("mysql:host=localhost; dbname=prueba", "root", "");

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $base->exec("SET CHARACTER SET utf8");

        $numRegistrosPagina = 10;

        // Solo ejecutará este codigo si '$_GET["paginaActual"]' ha sido inicializada (osea si el usuario le ha dado click a uno de los links de pagina)
        if(isset($_GET["paginaActual"])){

            if($_GET["paginaActual"]==1){

                header("Location:index.php");
            }else{
                $paginaActual=$_GET["paginaActual"];
            }
        }else{ // En caso contrario la paginaActual sera la 1ra

            $paginaActual= 1;
        }

        $empezarDesde = ($paginaActual - 1) * $numRegistrosPagina;

        // Consulta SQL solo para saber el numero de registros totales
        $sql_total = "SELECT * FROM registro_banco WHERE CONCEPTO = 'MERCADO'";

        // Preparacion consulta
        $resultado = $base->prepare($sql_total);

        // Ejecucion consulta
        $resultado->execute(); 

        // Obtiene el numero de registros que tiene la consulta
        $numFilas = $resultado->rowCount();
        // Obtiene el numero total de paginas
        $totalPaginas = ceil($numFilas / $numRegistrosPagina);
        
        echo "<table class='nums_registros'>";
        echo "<tr><td>Numero de registros totales de la consulta: " . $numFilas . "</td><br>";
        echo "<td>Mostramos: " . $numRegistrosPagina . " registros por página </td><br>";
        
        echo "<td>Mostrando la página: " . $paginaActual . " de " . $totalPaginas . "</td><br>";

        echo "</tr></table>";
        
        // Consulta SQL para obtener cada registro y ordenarlos por el numero de paginas y registros deseados
        $sql_limite = "SELECT * FROM registro_banco WHERE CONCEPTO = 'MERCADO' LIMIT $empezarDesde, $numRegistrosPagina";
        
        // Preparacion consulta
        $resultado = $base->prepare($sql_limite);

        // Ejecucion consulta
        $resultado->execute(); 

        echo "<table>";
        echo "<tr>";
        // Obtiene el número de columnas que tiene la consulta
        $columnas = $resultado->columnCount(); 
        for ($i = 0; $i < $columnas; $i++) {
            // Obtiene el nombre de cada columna
            $nombreColumna = $resultado->getColumnMeta($i)['name']; 
            echo "<th>$nombreColumna</th>";
        }
        echo "</tr>";
    // Obtiene cada registro de la consulta SQL como un arreglo asociativo. Luego, podemos recorrer ese arreglo para imprimir los valores de cada columna en el HTML. 
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            foreach ($registro as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";        

        // cierra el cursor y evita consumir mas recursos de los necesarios
        $resultado->closeCursor();
        
    }catch(Exception $e){

        echo "Línea de error: " . $e->getLine();
    }

    // -------------------------PAGINACION--------------------//
    echo "<br><div class='paginacion'>";
    // Imprime y asigna los links a cada una de la paginas que hay
    for($i=1; $i<=$totalPaginas; $i++){
        echo "<a href='?paginaActual=" . $i . "'>" . $i . "</a> &nbsp &nbsp";

    }
    echo "</div>"
?>
</body>
</html>