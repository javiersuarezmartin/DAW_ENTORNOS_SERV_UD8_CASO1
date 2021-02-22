<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actores - Game of Thrones</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>
<body>
    <div class="container">
        <a href="./index.php" class="btn">VOLVER</a>
        <h1>Actores</h1>
        <table>
            <tr>
                <th>Nombre personaje</th>
                <th>Nombre actor</th>
             
            </tr>
            
            <!-- Comienza código PHP -->
            <?php
                // Incluimos las clases necesarias para manejar la BBDD y sus tablas.
                include '../models/thronesDB.php';
                include '../models/thronesTablesDB.php';
                
                // Creamos el objeto para manejar la tabla.
                $conn = new thronesTablesDB();

                // Comprobamos si hay error de conexión.
                if($conn->hayError()) {
                    // ERROR CONEXIÓN
                    echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');    
                } else {
                    // CONEXIÓN CORRECTA -> MOSTRAMOS TABLA ACTORES
                    
                    // Almacenamos el resultado en una variable.
                    $tabla_actores = $conn->mostrarTodo('cast');
                    
                    // Recorremos el resultado y se imprime.
                    foreach ($tabla_actores as $actor) {
                        
                        echo ('<tr>');
                        echo('<td>' . $actor['serie_name'] . '</td>');
                        echo('<td>' . $actor['name'] . '</td>');
                        echo ('</tr>');  
                    };
                };
            ?>          
            <!-- Finaliza código PHP -->

        </table>
    </div>
</body>
</html>